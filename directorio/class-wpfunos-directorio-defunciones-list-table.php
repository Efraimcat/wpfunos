<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* The admin-specific functionality of the plugin.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/admin
* @author     Efraim Bayarri <efraim@efraim.cat>
*
*wpfunos-visitas-list-table.php
*/

class Wpfunos_Defunciones_List_Table extends WP_List_Table {

  /*
  *
  */
  public function get_columns() {
    $table_columns = array(
      'cb' => '<input type="checkbox" />', // to display the checkbox.
      'nombre'            => __( 'Nombre', 'wpfunos' ),
      'defuncion'	        => __( 'Fecha defunción', 'wpfunos' ),
      'velatorio'         => __( 'Velatorio', 'wpfunos' ),
      'velatorio_inicio'  => __( 'Inicio', 'wpfunos' ),
      'velatorio_final'   => __( 'Final', 'wpfunos' ),
      'ceremonia'         => __( 'Ceremonia', 'wpfunos' ),
      'ceremonia_fecha'   => __( 'Fecha', 'wpfunos' ),
      'time'	=> __( 'Fecha creacion entrada', 'wpfunos' ),
    );
    return $table_columns;
  }

  /*
  *
  */
  public function no_items() {
    _e( 'No hay defunciones disponibles.', 'wpfunos' );
  }

  /*
  *
  */
  public function get_sortable_columns() {
    return $sortable = array(
      'nombre' => 'nombre',
      'defuncion' => 'defuncion',
      'velatorio'	=> 'velatorio',
      'velatorio_inicio'	=> 'velatorio_inicio',
      'velatorio_final'	=> 'velatorio_final',
      'ceremonia'	=> 'ceremonia',
      'ceremonia_fecha'	=> 'ceremonia_fecha',
      'time'	=> 'time',
    );
  }

  /*
  *
  */
  public function fetch_table_data() {
    global $wpdb;
    $wpdb_table = $wpdb->prefix . 'wpf_defunciones';

    $orderby = ( isset( $_GET['orderby'] ) ) ? esc_sql( $_GET['orderby'] ) : 'defuncion';
    $order = ( isset( $_GET['order'] ) ) ? esc_sql( $_GET['order'] ) : 'DESC';

    //$user_query = "SELECT * FROM $wpdb_table ORDER BY id DESC";
    $user_query = "SELECT * FROM $wpdb_table WHERE 1=1";

    $user_query = $this->procesar_args( $user_query );

    //$user_query .= ' ORDER BY id DESC';
    $user_query .= ' ORDER BY ' .$orderby. ' ' .$order;

    // query output_type will be an associative array with ARRAY_A.
    $query_results = $wpdb->get_results( $user_query, ARRAY_A  );

    // return result array to prepare_items.
    return $query_results;
  }

  /*
  * Query, filter data, handle sorting, pagination, and any other data-manipulation required prior to rendering
  */
  public function prepare_items() {
    // code to handle bulk actions

    //used by WordPress to build and fetch the _column_headers property
    $this->_column_headers = $this->get_column_info();
    $table_data = $this->fetch_table_data();

    // code to handle data operations like sorting and filtering

    // start by assigning your data to the items variable
    $this->items = $table_data;

    // code to handle pagination
    // code for pagination
    $defunciones_per_page = $this->get_items_per_page( 'defunciones_per_page' );
    $table_page = $this->get_pagenum();

    // provide the ordered data to the List Table
    // we need to manually slice the data based on the current pagination
    $this->items = array_slice( $table_data, ( ( $table_page - 1 ) * $defunciones_per_page ), $defunciones_per_page );

    // set the pagination arguments
    $total_defunciones = count( $table_data );
    $this->set_pagination_args( array (
      'total_items' => $total_defunciones,
      'per_page'    => $defunciones_per_page,
      'total_pages' => ceil( $total_defunciones/$defunciones_per_page )
    ) );

    // check if a search was performed.
    $defunciones_search_key = isset( $_REQUEST['s'] ) ? wp_unslash( trim( $_REQUEST['s'] ) ) : '';

    // check and process any actions such as bulk actions.
    $this->handle_table_actions();

    // filter the data in case of a search
    if( $defunciones_search_key ) {
      $table_data = $this->filter_table_data( $table_data, $defunciones_search_key );
      $this->items = $table_data;
    }
  }

  /*
  *
  */
  public function column_default( $item, $column_name ) {
    switch ( $column_name ) {
      case 'referer': return substr( $item[$column_name],0,50 );
      case 'defuncion': return date("d-m-Y", strtotime($item[$column_name]));
      case 'velatorio_inicio': return date("d-m-Y H:i", strtotime($item[$column_name]));
      case 'velatorio_final': return date("d-m-Y H:i", strtotime($item[$column_name]));
      case 'ceremonia_fecha': return date("d-m-Y H:i", strtotime($item[$column_name]));
      default: return $item[$column_name];
    }
  }

  /*
  *
  */
  protected function column_cb( $item ) {
    return sprintf(
      '<label class="screen-reader-text" for="defunciones_' . $item['id'] . '">' . sprintf( __( 'Select %s' ), $item['id'] ) . '</label>'
      . "<input type='checkbox' name='defunciones[]' id='defunciones_{$item['id']}' value='{$item['id']}' />"
    );
  }

  /*
  * filter the table data based on the search key
  */
  public function filter_table_data( $table_data, $search_key ) {
    $filtered_table_data = array_values( array_filter( $table_data, function( $row ) use( $search_key ) {
      foreach( $row as $row_val ) {
        if( stripos( $row_val, $search_key ) !== false ) {
          return true;
        }
      }
    } ) );
    return $filtered_table_data;
  }

  /*
  *
  * https://wordpress.stackexchange.com/questions/223552/how-to-create-custom-filter-options-in-wp-list-table
  *
  */
  public function extra_tablenav( $which ) {
    switch ( $which ) {
      case 'top':
      global $wpdb, $wp_locale;

      $months = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT YEAR( defuncion  ) AS year, MONTH( defuncion ) AS month FROM ".$wpdb->prefix."wpf_defunciones WHERE 1 = 1 ORDER BY id DESC" ));
      $days = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT YEAR( defuncion  ) AS year, MONTH( defuncion ) AS month, DAY( defuncion ) AS day FROM ".$wpdb->prefix."wpf_defunciones WHERE 1 = 1 ORDER BY id DESC" ));
      $velatorios = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT velatorio FROM ".$wpdb->prefix."wpf_defunciones WHERE 1 = 1 ORDER BY velatorio ASC" ));
      $inicios = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT YEAR( velatorio_inicio  ) AS year, MONTH( velatorio_inicio ) AS month, DAY( velatorio_inicio ) AS day FROM ".$wpdb->prefix."wpf_defunciones WHERE 1 = 1 ORDER BY id DESC" ));
      $finales = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT YEAR( velatorio_final  ) AS year, MONTH( velatorio_final ) AS month, DAY( velatorio_final ) AS day FROM ".$wpdb->prefix."wpf_defunciones WHERE 1 = 1 ORDER BY id DESC" ));
      $ceremonias = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT ceremonia FROM ".$wpdb->prefix."wpf_defunciones WHERE 1 = 1 ORDER BY ceremonia ASC" ));
      $fechaceremonias = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT YEAR( ceremonia_fecha  ) AS year, MONTH( ceremonia_fecha ) AS month, DAY( ceremonia_fecha ) AS day FROM ".$wpdb->prefix."wpf_defunciones WHERE 1 = 1 ORDER BY id DESC" ));
      /*
      *
      * nombre            Nombre
      * defuncion         Fecha defunción                 m-d
      * velatorio         Velatorio (tanatorio)           v
      * velatorio_inicio  Velatorio fecha y hora Inicio   a
      * velatorio_final   Velatorio fecha y hora final    b
      * ceremonia         Ceremonia (tanatorio)           c
      * ceremonia_fecha   Ceremonia fecha y hora inicio   e
      *
      */

      $m = isset( $_GET['m'] ) ? (int) $_GET['m'] : 0;
      $d = isset( $_GET['d'] ) ? (int) $_GET['d'] : 0;
      $v = isset( $_GET['v'] ) ? $_GET['v'] : 0;
      $a = isset( $_GET['a'] ) ? (int) $_GET['a'] : 0;
      $b = isset( $_GET['b'] ) ? (int) $_GET['b'] : 0;
      $c = isset( $_GET['c'] ) ? $_GET['c'] : 0;
      $e = isset( $_GET['e'] ) ? (int) $_GET['e'] : 0;

      ?>
      <div class="alignleft actions">
        <select name="m" id="filter-by-date">
          <option<?php selected( $m, 0 ); ?> value="0" data-rc="/wp-admin/admin.php?page=wpfunos-defunciones">Todos los meses</option>
          <?php
          foreach ( $months as $arc_row ) {
            $month = zeroise( $arc_row->month, 2 );
            $year  = $arc_row->year;
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $m, $year . $month, false ),
              esc_attr( $year . $month ),
              esc_attr( '/wp-admin/admin.php?page=wpfunos-defunciones&m=' . $year . $month ),
              sprintf( __( '%1$s %2$d' ), $wp_locale->get_month( $month ), $year )
            );
          }
          ?>
        </select>
        <select name="d" id="filter-by-day">
          <option<?php selected( $d, 0 ); ?> value="0" data-rc="">Todos los dias</option>
          <?php
          foreach ( $days as $arc_row ) {
            $day = zeroise( $arc_row->day, 2 );
            $month = zeroise( $arc_row->month, 2 );
            $year  = $arc_row->year;
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $d, $year . $month . $day, false ),
              esc_attr( $year . $month . $day ),
              esc_attr( '&d='.$year . $month . $day ),
              sprintf( __( '%1$s %2$s %3$d' ), $day, $wp_locale->get_month( $month ), $year )
            );
          }
          ?>
        </select>
        <select name="v" id="filter-by-velatorio">
          <option<?php selected( $v, 0 ); ?> value="0" data-rc="">Todos los velatorios</option>
          <?php
          foreach ( $velatorios as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $t, $arc_row->velatorio, false ),
              esc_attr( $arc_row->velatorio ),
              esc_attr( '&t='.$arc_row->velatorio),
              sprintf( __( '%1$s' ), $arc_row->velatorio )
            );
          }
          ?>
        </select>
        <select name="a" id="filter-by-velatorio-inicio">
          <option<?php selected( $a, 0 ); ?> value="0" data-rc="">Todos los dias inicio</option>
          <?php
          foreach ( $inicios as $arc_row ) {
            $day = zeroise( $arc_row->day, 2 );
            $month = zeroise( $arc_row->month, 2 );
            $year  = $arc_row->year;
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $a, $year . $month . $day, false ),
              esc_attr( $year . $month . $day ),
              esc_attr( '&a='.$year . $month . $day ),
              sprintf( __( '%1$s %2$s %3$d' ), $day, $wp_locale->get_month( $month ), $year )
            );
          }
          ?>
        </select>
        <select name="b" id="filter-by-velatorio-final">
          <option<?php selected( $b, 0 ); ?> value="0" data-rc="">Todos los dias final</option>
          <?php
          foreach ( $finales as $arc_row ) {
            $day = zeroise( $arc_row->day, 2 );
            $month = zeroise( $arc_row->month, 2 );
            $year  = $arc_row->year;
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $b, $year . $month . $day, false ),
              esc_attr( $year . $month . $day ),
              esc_attr( '&b='.$year . $month . $day ),
              sprintf( __( '%1$s %2$s %3$d' ), $day, $wp_locale->get_month( $month ), $year )
            );
          }
          ?>
        </select>
        <select name="c" id="filter-by-ceremonia">
          <option<?php selected( $c, 0 ); ?> value="0" data-rc="">Todas las ceremonias</option>
          <?php
          foreach ( $ceremonias as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $t, $arc_row->ceremonia, false ),
              esc_attr( $arc_row->ceremonia ),
              esc_attr( '&t='.$arc_row->ceremonia),
              sprintf( __( '%1$s' ), $arc_row->ceremonia )
            );
          }
          ?>
        </select>
        <select name="e" id="filter-by-ceremonia-fecha">
          <option<?php selected( $e, 0 ); ?> value="0" data-rc="">Todas las fechas ceremonia</option>
          <?php
          foreach ( $fechaceremonias as $arc_row ) {
            $day = zeroise( $arc_row->day, 2 );
            $month = zeroise( $arc_row->month, 2 );
            $year  = $arc_row->year;
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $e, $year . $month . $day, false ),
              esc_attr( $year . $month . $day ),
              esc_attr( '&e='.$year . $month . $day ),
              sprintf( __( '%1$s %2$s %3$d' ), $day, $wp_locale->get_month( $month ), $year )
            );
          }
          ?>
        </select>

        <a href="javascript:void(0)" class="button" onclick="window.location.href =
        jQuery('#filter-by-date option:selected').data('rc') +
        jQuery('#filter-by-day option:selected').data('rc') +
        jQuery('#filter-by-velatorio option:selected').data('rc') +
        jQuery('#filter-by-velatorio-inicio option:selected').data('rc') +
        jQuery('#filter-by-velatorio-final option:selected').data('rc') +
        jQuery('#filter-by-ceremonia option:selected').data('rc') +
        jQuery('#filter-by-ceremonia-fecha option:selected').data('rc') ;
        ">Filtrar</a>
      </div>
      <?php
      break;

      case 'bottom':
      // Your html code to output
      break;
    }
  }

  /*
  *
  */
  public function procesar_args( $user_query ){
    if (!empty($_REQUEST['d'])) {
      $search = $_REQUEST['d'];
      $year = substr($search,0,4);
      $month = substr($search,4,2);
      $day = substr($search,6,2);

      if(!empty($year)){
        $user_query .= ' And YEAR(defuncion)="' . $year . '"';
      }
      if(!empty($month)){
        $user_query .= ' And MONTH(defuncion)="' . $month . '"';
      }
      if(!empty($day)){
        $user_query .= ' And DAY(defuncion)="' . $day . '"';
      }
    }

    if (!empty($_REQUEST['m']) && empty($_REQUEST['d']) ) {
      $search = $_REQUEST['m'];
      $year = substr($search,0,4);
      $month = substr($search,4,2);

      if(!empty($year)){
        $user_query .= ' And YEAR(defuncion)="' . $year . '"';
      }
      if(!empty($month)){
        $user_query .= ' And MONTH(defuncion)="' . $month . '"';
      }
    }

    if (!empty($_REQUEST['v'])) {
      $user_query .= ' AND velatorio = "' . $_REQUEST['v'] . '"';
    }

    if (!empty($_REQUEST['a'])) {
      $search = $_REQUEST['a'];
      $year = substr($search,0,4);
      $month = substr($search,4,2);
      $day = substr($search,6,2);

      if(!empty($year)){
        $user_query .= ' And YEAR(velatorio_inicio)="' . $year . '"';
      }
      if(!empty($month)){
        $user_query .= ' And MONTH(velatorio_inicio)="' . $month . '"';
      }
      if(!empty($day)){
        $user_query .= ' And DAY(velatorio_inicio)="' . $day . '"';
      }
    }

    if (!empty($_REQUEST['b'])) {
      $search = $_REQUEST['b'];
      $year = substr($search,0,4);
      $month = substr($search,4,2);
      $day = substr($search,6,2);

      if(!empty($year)){
        $user_query .= ' And YEAR(velatorio_final)="' . $year . '"';
      }
      if(!empty($month)){
        $user_query .= ' And MONTH(velatorio_final)="' . $month . '"';
      }
      if(!empty($day)){
        $user_query .= ' And DAY(velatorio_final)="' . $day . '"';
      }
    }

    if (!empty($_REQUEST['c'])) {
      $user_query .= ' AND ceremonia = "' . $_REQUEST['c'] . '"';
    }

    if (!empty($_REQUEST['e'])) {
      $search = $_REQUEST['e'];
      $year = substr($search,0,4);
      $month = substr($search,4,2);
      $day = substr($search,6,2);

      if(!empty($year)){
        $user_query .= ' And YEAR(ceremonia_fecha)="' . $year . '"';
      }
      if(!empty($month)){
        $user_query .= ' And MONTH(ceremonia_fecha)="' . $month . '"';
      }
      if(!empty($day)){
        $user_query .= ' And DAY(ceremonia_fecha)="' . $day . '"';
      }
    }

    return $user_query;
  }
  /*
  *
  * nombre            Nombre
  * defuncion         Fecha defunción                 m-d
  * velatorio         Velatorio (tanatorio)           v
  * velatorio_inicio  Velatorio fecha y hora Inicio   a
  * velatorio_final   Velatorio fecha y hora final    b
  * ceremonia         Ceremonia (tanatorio)           c
  * ceremonia_fecha   Ceremonia fecha y hora inicio   e
  *
  */
}
