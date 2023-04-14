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

class Wpfunos_Visitas_List_Table extends WP_List_Table {

  /*
  *
  */
  public function get_columns() {
    $table_columns = array(
      'cb'		=> '<input type="checkbox" />', // to display the checkbox.
      'time'	=> __( 'Fecha', 'wpfunos' ),
      'version'	=> __( 'Versión', 'wpfunos' ),
      'tipo' => __( 'Tipo', 'column name', 'wpfunos' ),
      'wpfn' => __( 'wpfn', 'wpfunos' ),
      'wpfe' => __( 'wpfe', 'wpfunos' ),
      'wpft' => __( 'wpft', 'wpfunos' ),
      'nombre' => __( 'Nombre', 'wpfunos' ),
      'email' => __( 'Email', 'wpfunos' ),
      'telefono' => __( 'Teléfono', 'wpfunos' ),
      'ip' => __( 'IP', 'wpfunos' ),
      'referer' => __( 'referer', 'wpfunos' ),
      'mobile' => __( 'mobile', 'wpfunos' ),
      'logged' => __( 'logged', 'wpfunos' ),
      'wpfresp1' => __( 'resp1', 'wpfunos' ),
      'wpfresp2' => __( 'resp2', 'wpfunos' ),
      'wpfresp3' => __( 'resp3', 'wpfunos' ),
      'wpfresp4' => __( 'resp4', 'wpfunos' ),
      'postID' => __( 'postID', 'wpfunos' ),
      'servicio' => __( 'servicio', 'wpfunos' ),
      'poblacion' => __( 'pobl', 'wpfunos' ),
      'nacimiento' => __( 'nac', 'wpfunos' ),
      'cuando' => __( 'cuando', 'wpfunos' ),
      'cp' => __( 'cp', 'wpfunos' ),
      'contador' => __( 'contador', 'wpfunos' ),
    );
    return $table_columns;
  }

  /*
  *
  */
  public function no_items() {
    _e( 'No hay visitas disponibles.', 'wpfunos' );
  }

  /*
  *
  */
  public function get_sortable_columns() {
    return $sortable = array(
      'time'	=> 'time',
      'version'	=> 'versión',
      'tipo' => 'tipo',
      'wpfn' => 'wpfn',
      'wpfe' => 'wpfe',
      'wpft' => 'wpft',
      'nombre' => 'nombre',
      'email' => 'email',
      'telefono' => 'teléfono',
      'ip' => 'ip',
      'referer' => 'referer',
      'mobile' => 'mobile',
      'logged' => 'logged',
      'wpfresp1' => 'resp1',
      'wpfresp2' => 'resp2',
      'wpfresp3' => 'resp3',
      'wpfresp4' => 'resp4',
      'postID' => 'postID',
      'servicio' => 'servicio',
      'poblacion' => 'poblacion',
      'nacimiento' => 'nacimiento',
      'cuando' => 'cuando',
      'cp' => 'cp',
      'contador' => 'contador',
    );
  }

  /*
  *
  */
  public function fetch_table_data() {
    global $wpdb;
    $wpdb_table = $wpdb->prefix . 'wpf_visitas';

    $orderby = ( isset( $_GET['orderby'] ) ) ? esc_sql( $_GET['orderby'] ) : 'id';
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
  *
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
    $visits_per_page = $this->get_items_per_page( 'visits_per_page' );
    $table_page = $this->get_pagenum();

    // provide the ordered data to the List Table
    // we need to manually slice the data based on the current pagination
    $this->items = array_slice( $table_data, ( ( $table_page - 1 ) * $visits_per_page ), $visits_per_page );

    // set the pagination arguments
    $total_visits = count( $table_data );
    $this->set_pagination_args( array (
      'total_items' => $total_visits,
      'per_page'    => $visits_per_page,
      'total_pages' => ceil( $total_visits/$visits_per_page )
    ) );

    // check if a search was performed.
    $visits_search_key = isset( $_REQUEST['s'] ) ? wp_unslash( trim( $_REQUEST['s'] ) ) : '';

    // check and process any actions such as bulk actions.
    $this->handle_table_actions();

    // filter the data in case of a search
    if( $visits_search_key ) {
      $table_data = $this->filter_table_data( $table_data, $visits_search_key );
      $this->items = $table_data;
    }

  }

  /*
  *
  */
  public function column_default( $item, $column_name ) {
    switch ( $column_name ) {
      case 'referer': return substr( $item[$column_name],0,50 );
      //		case 'user_registered':
      //		case 'ID':
      //			return $item[$column_name];
      default:
      return $item[$column_name];
    }
  }

  /*
  *
  */
  protected function column_cb( $item ) {
    return sprintf(
      '<label class="screen-reader-text" for="visita_' . $item['id'] . '">' . sprintf( __( 'Select %s' ), $item['id'] ) . '</label>'
      . "<input type='checkbox' name='visita[]' id='visita_{$item['id']}' value='{$item['id']}' />"
    );
  }

  /*
  *
  */
  // filter the table data based on the search key
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
      // Your html code to output
      global $wpdb, $wp_locale;

      $months = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT YEAR( time ) AS year, MONTH( time ) AS month FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY id DESC" ));
      $days = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT YEAR( time ) AS year, MONTH( time ) AS month, DAY( time ) AS day FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY id DESC" ));
      $tipos = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT tipo FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY tipo ASC" ));
      $mobiles = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT mobile FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY mobile ASC" ));
      $loggeds = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT logged FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY logged ASC" ));
      $ips = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT ip FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY INET_ATON(ip)" ));

      $m = isset( $_GET['m'] ) ? (int) $_GET['m'] : 0;
      $d = isset( $_GET['d'] ) ? (int) $_GET['d'] : 0;
      $t = isset( $_GET['t'] ) ? $_GET['t'] : 0;
      $b = isset( $_GET['b'] ) ? $_GET['b'] : 0;
      $l = isset( $_GET['l'] ) ? $_GET['l'] : 0;
      $i = isset( $_GET['i'] ) ? $_GET['i'] : 0;

      ?>
      <div class="alignleft actions">
        <select name="m" id="filter-by-date">
          <option<?php selected( $m, 0 ); ?> value="0" data-rc="/wp-admin/admin.php?page=wpfunos-visitas">Todos los meses</option>
          <?php
          foreach ( $months as $arc_row ) {
            $month = zeroise( $arc_row->month, 2 );
            $year  = $arc_row->year;
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $m, $year . $month, false ),
              esc_attr( $year . $month ),
              esc_attr( '/wp-admin/admin.php?page=wpfunos-visitas&m=' . $year . $month ),
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
        <select name="t" id="filter-by-tipo">
          <option<?php selected( $t, 0 ); ?> value="0" data-rc="">Todos los tipos</option>
          <?php
          foreach ( $tipos as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $t, $arc_row->tipo, false ),
              esc_attr( $arc_row->tipo ),
              esc_attr( '&t='.$arc_row->tipo ),
              sprintf( __( '%1$s' ), $arc_row->tipo )
            );
          }
          ?>
        </select>
        <select name="b" id="filter-by-mobile">
          <option<?php selected( $b, 0 ); ?> value="0" data-rc="">Todos dispositivos</option>
          <?php
          foreach ( $mobiles as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $b, $arc_row->mobile, false ),
              esc_attr( $arc_row->mobile ),
              esc_attr( '&b='.$arc_row->mobile ),
              sprintf( __( '%1$s' ), $arc_row->mobile )
            );
          }
          ?>
        </select>
        <select name="l" id="filter-by-logged">
          <option<?php selected( $l, 0 ); ?> value="0" data-rc="">Todas las conexiones</option>
          <?php
          foreach ( $loggeds as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $l, $arc_row->logged, false ),
              esc_attr( $arc_row->logged ),
              esc_attr( '&l='.$arc_row->logged ),
              sprintf( __( '%1$s' ), $arc_row->logged )
            );
          }
          ?>
        </select>
        <select name="i" id="filter-by-ip">
          <option<?php selected( $i, 0 ); ?> value="0" data-rc="">Todas las IP</option>
          <?php
          foreach ( $ips as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $i, $arc_row->ip, false ),
              esc_attr( $arc_row->ip ),
              esc_attr( '&i='.$arc_row->ip ),
              sprintf( __( '%1$s' ), $arc_row->ip )
            );
          }
          ?>
        </select>

        <a href="javascript:void(0)" class="button" onclick="window.location.href =
        jQuery('#filter-by-date option:selected').data('rc') +
        jQuery('#filter-by-day option:selected').data('rc') +
        jQuery('#filter-by-tipo option:selected').data('rc') +
        jQuery('#filter-by-mobile option:selected').data('rc') +
        jQuery('#filter-by-logged option:selected').data('rc') +
        jQuery('#filter-by-ip option:selected').data('rc') ;
        ">Filtrar</a>
      </div>
      <?php

      // FILTRO EMAIL


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
    if (!empty($_REQUEST['l'])) {
      $user_query .= ' AND logged = "' . $_REQUEST['l'] . '"';
    }
    if (!empty($_REQUEST['b'])) {
      $user_query .= ' AND mobile = "' . $_REQUEST['b'] . '"';
    }
    if (!empty($_REQUEST['t'])) {
      $user_query .= ' AND tipo = "' . $_REQUEST['t'] . '"';
    }
    if (!empty($_REQUEST['i'])) {
      $user_query .= ' AND ip = "' . $_REQUEST['i'] . '"';
    }
    if (!empty($_REQUEST['d'])) {
      $search = $_REQUEST['d'];
      $year = substr($search,0,4);
      $month = substr($search,4,2);
      $day = substr($search,6,2);

      if(!empty($year)){
        $user_query .= ' And YEAR(time)="' . $year . '"';
      }
      if(!empty($month)){
        $user_query .= ' And MONTH(time)="' . $month . '"';
      }
      if(!empty($day)){
        $user_query .= ' And DAY(time)="' . $day . '"';
      }

    }
    if (!empty($_REQUEST['m']) && empty($_REQUEST['d']) ) {
      $search = $_REQUEST['m'];
      $year = substr($search,0,4);
      $month = substr($search,4,2);

      if(!empty($year)){
        $user_query .= ' And YEAR(time)="' . $year . '"';
      }
      if(!empty($month)){
        $user_query .= ' And MONTH(time)="' . $month . '"';
      }
    }

    return $user_query;
  }

}
