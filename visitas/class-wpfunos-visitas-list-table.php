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
      'wpfads' => __( 'wpfads', 'wpfunos' ),
      'wpfana' => __( 'wpfana', 'wpfunos' ),
      'wpffun' => __( 'wpffun', 'wpfunos' ),
      'wpfnec' => __( 'wpfnec', 'wpfunos' ),
      'wpfnon' => __( 'wpfnon', 'wpfunos' ),
      'wpfoth' => __( 'wpfoth', 'wpfunos' ),
      'wpfper' => __( 'wpfper', 'wpfunos' ),
      'hutk' => __( 'hutk', 'wpfunos' ),
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
      'wpfads' => 'wpfads',
      'wpfana' => 'wpfana',
      'wpffun' => 'wpffun',
      'wpfnec' => 'wpfnec',
      'wpfnon' => 'wpfnon',
      'wpfoth' => 'wpfoth',
      'wpfper' => 'wpfper',
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
      case 'referer': return substr( $item[$column_name],0,50 );break;
      case 'hutk': if( strlen ($item[$column_name]) > 1) return substr( $item[$column_name],0,10 ).'..';break;
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

      $wpfads = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT wpfads FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY wpfads ASC" ));
      $wpfana = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT wpfana FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY wpfana ASC" ));
      $wpffun = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT wpffun FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY wpffun ASC" ));
      $wpfnec = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT wpfnec FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY wpfnec ASC" ));
      $wpfnon = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT wpfnon FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY wpfnon ASC" ));
      $wpfoth = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT wpfoth FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY wpfoth ASC" ));
      $wpfper = $wpdb->get_results( $wpdb->prepare( "SELECT DISTINCT wpfper FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY wpfper ASC" ));

      $m = isset( $_GET['m'] ) ? (int) $_GET['m'] : 0;
      $d = isset( $_GET['d'] ) ? (int) $_GET['d'] : 0;
      $t = isset( $_GET['t'] ) ? $_GET['t'] : 0;
      $b = isset( $_GET['b'] ) ? $_GET['b'] : 0;
      $l = isset( $_GET['l'] ) ? $_GET['l'] : 0;
      $i = isset( $_GET['i'] ) ? $_GET['i'] : 0;

      $n = isset( $_GET['n'] ) ? $_GET['n'] : 0;
      $o = isset( $_GET['o'] ) ? $_GET['o'] : 0;
      $p = isset( $_GET['p'] ) ? $_GET['p'] : 0;
      $q = isset( $_GET['q'] ) ? $_GET['q'] : 0;
      $r = isset( $_GET['r'] ) ? $_GET['r'] : 0;
      $u = isset( $_GET['u'] ) ? $_GET['u'] : 0;
      $v = isset( $_GET['v'] ) ? $_GET['v'] : 0;

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

        <select name="n" id="filter-by-wpfads">
          <option<?php selected( $n, 0 ); ?> value="0" data-rc="">Todas wpfads</option>
          <?php
          foreach ( $wpfads as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $n, $arc_row->wpfads, false ),
              esc_attr( $arc_row->wpfads ),
              esc_attr( '&n='.$arc_row->wpfads ),
              sprintf( __( '%1$s' ), $arc_row->wpfads )
            );
          }
          ?>
        </select>
        <select name="o" id="filter-by-wpfana">
          <option<?php selected( $o, 0 ); ?> value="0" data-rc="">Todas wpfana</option>
          <?php
          foreach ( $wpfana as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $o, $arc_row->wpfana, false ),
              esc_attr( $arc_row->wpfana ),
              esc_attr( '&o='.$arc_row->wpfana ),
              sprintf( __( '%1$s' ), $arc_row->wpfana )
            );
          }
          ?>
        </select>
        <select name="p" id="filter-by-wpffun">
          <option<?php selected( $p, 0 ); ?> value="0" data-rc="">Todas wpffun</option>
          <?php
          foreach ( $wpffun as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $p, $arc_row->wpffun, false ),
              esc_attr( $arc_row->wpffun ),
              esc_attr( '&p='.$arc_row->wpffun ),
              sprintf( __( '%1$s' ), $arc_row->wpffun )
            );
          }
          ?>
        </select>
        <select name="q" id="filter-by-wpfnec">
          <option<?php selected( $q, 0 ); ?> value="0" data-rc="">Todas wpfnec</option>
          <?php
          foreach ( $wpfnec as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $q, $arc_row->wpfnec, false ),
              esc_attr( $arc_row->wpfnec ),
              esc_attr( '&q='.$arc_row->wpfnec ),
              sprintf( __( '%1$s' ), $arc_row->wpfnec )
            );
          }
          ?>
        </select>
        <select name="r" id="filter-by-wpfnon">
          <option<?php selected( $r, 0 ); ?> value="0" data-rc="">Todas wpfnon</option>
          <?php
          foreach ( $wpfnon as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $r, $arc_row->wpfnon, false ),
              esc_attr( $arc_row->wpfnon ),
              esc_attr( '&r='.$arc_row->wpfnon ),
              sprintf( __( '%1$s' ), $arc_row->wpfnon )
            );
          }
          ?>
        </select>
        <select name="u" id="filter-by-wpfoth">
          <option<?php selected( $u, 0 ); ?> value="0" data-rc="">Todas wpfoth</option>
          <?php
          foreach ( $wpfoth as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $u, $arc_row->wpfoth, false ),
              esc_attr( $arc_row->wpfoth ),
              esc_attr( '&u='.$arc_row->wpfoth ),
              sprintf( __( '%1$s' ), $arc_row->wpfoth )
            );
          }
          ?>
        </select>
        <select name="v" id="filter-by-wpfper">
          <option<?php selected( $v, 0 ); ?> value="0" data-rc="">Todas wpfper</option>
          <?php
          foreach ( $wpfper as $arc_row ) {
            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $v, $arc_row->wpfper, false ),
              esc_attr( $arc_row->wpfper ),
              esc_attr( '&v='.$arc_row->wpfper ),
              sprintf( __( '%1$s' ), $arc_row->wpfper )
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
        jQuery('#filter-by-wpfads option:selected').data('rc') +
        jQuery('#filter-by-wpfana option:selected').data('rc') +
        jQuery('#filter-by-wpffun option:selected').data('rc') +
        jQuery('#filter-by-wpfnec option:selected').data('rc') +
        jQuery('#filter-by-wpfnon option:selected').data('rc') +
        jQuery('#filter-by-wpfoth option:selected').data('rc') +
        jQuery('#filter-by-wpfper option:selected').data('rc') +
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

    if (!empty($_REQUEST['n'])) {
      $user_query .= ' AND wpfads = "' . $_REQUEST['n'] . '"';
    }
    if (!empty($_REQUEST['o'])) {
      $user_query .= ' AND wpfana = "' . $_REQUEST['n'] . '"';
    }
    if (!empty($_REQUEST['p'])) {
      $user_query .= ' AND wpffun = "' . $_REQUEST['p'] . '"';
    }
    if (!empty($_REQUEST['q'])) {
      $user_query .= ' AND wpfnec = "' . $_REQUEST['q'] . '"';
    }
    if (!empty($_REQUEST['r'])) {
      $user_query .= ' AND wpfnon = "' . $_REQUEST['r'] . '"';
    }
    if (!empty($_REQUEST['u'])) {
      $user_query .= ' AND wpfoth = "' . $_REQUEST['u'] . '"';
    }
    if (!empty($_REQUEST['v'])) {
      $user_query .= ' AND wpfper = "' . $_REQUEST['v'] . '"';
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
