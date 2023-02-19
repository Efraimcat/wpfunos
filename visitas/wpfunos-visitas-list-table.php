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

  public function no_items() {
    _e( 'No hay visitas disponibles.', 'wpfunos' );
  }

  public function get_sortable_columns() {
    return $sortable = array(
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
  }

  public function fetch_table_data() {
    global $wpdb;
    $wpdb_table = $wpdb->prefix . 'wpf_visitas';
    $orderby = ( isset( $_GET['orderby'] ) ) ? esc_sql( $_GET['orderby'] ) : 'id';
    $order = ( isset( $_GET['order'] ) ) ? esc_sql( $_GET['order'] ) : 'ASC';

    $user_query = "SELECT * FROM $wpdb_table ORDER BY id DESC";

    // query output_type will be an associative array with ARRAY_A.
    $query_results = $wpdb->get_results( $user_query, ARRAY_A  );

    // return result array to prepare_items.
    return $query_results;
  }

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

  public function column_default( $item, $column_name ) {
    switch ( $column_name ) {
      case 'referer': return substr( $item[$column_name],0,12 );
      //		case 'user_registered':
      //		case 'ID':
      //			return $item[$column_name];
      default:
      return $item[$column_name];
    }
  }

  protected function column_cb( $item ) {
    return sprintf(
      '<label class="screen-reader-text" for="visita_' . $item['id'] . '">' . sprintf( __( 'Select %s' ), $item['id'] ) . '</label>'
      . "<input type='checkbox' name='visita[]' id='visita_{$item['id']}' value='{$item['id']}' />"
    );
  }

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


  //https://wordpress.stackexchange.com/questions/223552/how-to-create-custom-filter-options-in-wp-list-table
  public function extra_tablenav( $which ) {
    switch ( $which ) {
      case 'top':
      // Your html code to output
      global $wpdb, $wp_locale;

      // FILTRO POR MES

      $sql = "SELECT DISTINCT YEAR( time ) AS year, MONTH( time ) AS month FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY id DESC";

      $months = $wpdb->get_results( $wpdb->prepare( $sql ));
      $m = isset( $_GET['m'] ) ? (int) $_GET['m'] : 0;

      $wp_query = add_query_arg();
      $wp_query = remove_query_arg('m');
      $link = esc_url_raw($wp_query);
      ?>
      <div class="alignleft actions">
        <select name="m" id="filter-by-date">
          <option<?php selected( $m, 0 ); ?> value="0" data-rc="<?php _e($link); ?>"><?php _e( 'Todos los meses (' .count( $months ). ')' ); ?></option>
          <?php
          foreach ( $months as $arc_row ) {
            $month = zeroise( $arc_row->month, 2 );
            $year  = $arc_row->year;

            $wp_query = add_query_arg('m', $arc_row->year . $month);
            $link = esc_url_raw($wp_query);

            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $m, $year . $month, false ),
              esc_attr( $arc_row->year . $month ),
              esc_attr( $link),
              /* translators: 1: Month name, 2: 4-digit year. */
              sprintf( __( '%1$s %2$d' ), $wp_locale->get_month( $month ), $year )
            );
          }
          ?>
        </select>
        <a href="javascript:void(0)" class="button" onclick="window.location.href = jQuery('#filter-by-date option:selected').data('rc');">Filtrar</a>
      </div>
      <?php

      // FILTRO POR DIA

      //SELECT DISTINCT YEAR( time ) AS year, MONTH( time ) AS month, DAY (time) AS day FROM `QV846n_wpf_visitas` WHERE 1 = 1;
      $sql = "SELECT DISTINCT YEAR( time ) AS year, MONTH( time ) AS month, DAY( time ) AS day FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY id DESC";

      $days = $wpdb->get_results( $wpdb->prepare( $sql ));
      $d = isset( $_GET['d'] ) ? (int) $_GET['d'] : 0;

      $wp_query = add_query_arg();
      $wp_query = remove_query_arg('d');
      $link = esc_url_raw($wp_query);
      ?>
      <div class="alignleft actions">
        <select name="d" id="filter-by-day">
          <option<?php selected( $d, 0 ); ?> value="0" data-rc="<?php _e($link); ?>"><?php _e( 'Todos los dias (' .count( $days ). ')' ); ?></option>
          <?php
          foreach ( $days as $arc_row ) {
            $day = zeroise( $arc_row->day, 2 );
            $month = zeroise( $arc_row->month, 2 );
            $year  = $arc_row->year;

            $wp_query = add_query_arg('d', $arc_row->year . $month . $day);
            $link = esc_url_raw($wp_query);

            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $d, $year . $month . $day, false ),
              esc_attr( $arc_row->year . $month . $day ),
              esc_attr( $link),
              /* translators: 1: Month name, 2: 4-digit year. */
              sprintf( __( '%1$s %2$s %3$d' ), $day, $wp_locale->get_month( $month ), $year )
            );
          }
          ?>
        </select>
        <a href="javascript:void(0)" class="button" onclick="window.location.href = jQuery('#filter-by-day option:selected').data('rc');">Filtrar</a>
      </div>
      <?php

      // FILTRO TIPOS
      $sql = "SELECT DISTINCT tipo FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY tipo ASC";

      $tipos = $wpdb->get_results( $wpdb->prepare( $sql ));
      $t = isset( $_GET['t'] ) ? $_GET['t'] : 0;

      $wp_query = add_query_arg();
      $wp_query = remove_query_arg('t');
      $link = esc_url_raw($wp_query);

      ?>
      <div class="alignleft actions">
        <select name="b" id="filter-by-tipo">
          <option<?php selected( $t, 0 ); ?> value="0" data-rc="<?php _e($link); ?>"><?php _e( 'Todos los tipos' ); ?></option>
          <?php
          foreach ( $tipos as $arc_row ) {
            $tipo  = $arc_row->tipo;

            $wp_query = add_query_arg('t', $tipo);
            $link = esc_url_raw($wp_query);

            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $t, $tipo, false ),
              esc_attr( $tipo ),
              esc_attr( $link),
              sprintf( __( '%1$s' ), $tipo )
            );
          }
          ?>
        </select>
        <a href="javascript:void(0)" class="button" onclick="window.location.href = jQuery('#filter-by-tipo option:selected').data('rc');">Filtrar</a>
      </div>
      <?php

      // FILTRO MOBILE
      $sql = "SELECT DISTINCT mobile FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY mobile ASC";

      $mobiles = $wpdb->get_results( $wpdb->prepare( $sql ));
      $b = isset( $_GET['b'] ) ? $_GET['b'] : 0;

      $wp_query = add_query_arg();
      $wp_query = remove_query_arg('b');
      $link = esc_url_raw($wp_query);

      ?>
      <div class="alignleft actions">
        <select name="b" id="filter-by-mobile">
          <option<?php selected( $b, 0 ); ?> value="0" data-rc="<?php _e($link); ?>"><?php _e( 'Todos dispositivos' ); ?></option>
          <?php
          foreach ( $mobiles as $arc_row ) {
            $mobile  = $arc_row->mobile;

            $wp_query = add_query_arg('b', $mobile);
            $link = esc_url_raw($wp_query);

            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $b, $mobile, false ),
              esc_attr( $mobile ),
              esc_attr( $link),
              sprintf( __( '%1$s' ), $mobile )
            );
          }
          ?>
        </select>
        <a href="javascript:void(0)" class="button" onclick="window.location.href = jQuery('#filter-by-mobile option:selected').data('rc');">Filtrar</a>
      </div>
      <?php

      // FILTRO LOGGED
      $sql = "SELECT DISTINCT logged FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY logged ASC";

      $loggeds = $wpdb->get_results( $wpdb->prepare( $sql ));
      $l = isset( $_GET['l'] ) ? $_GET['l'] : 0;

      $wp_query = add_query_arg();
      $wp_query = remove_query_arg('l');
      $link = esc_url_raw($wp_query);

      ?>
      <div class="alignleft actions">
        <select name="b" id="filter-by-logged">
          <option<?php selected( $l, 0 ); ?> value="0" data-rc="<?php _e($link); ?>"><?php _e( 'Todas las conexiones' ); ?></option>
          <?php
          foreach ( $loggeds as $arc_row ) {
            $logged  = $arc_row->logged;

            $wp_query = add_query_arg('l', $logged);
            $link = esc_url_raw($wp_query);

            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $l, $logged, false ),
              esc_attr( $logged ),
              esc_attr( $link),
              sprintf( __( '%1$s' ), $logged )
            );
          }
          ?>
        </select>
        <a href="javascript:void(0)" class="button" onclick="window.location.href = jQuery('#filter-by-logged option:selected').data('rc');">Filtrar</a>
      </div>
      <?php

      // FILTRO IP
      $sql = "SELECT DISTINCT ip FROM ".$wpdb->prefix."wpf_visitas WHERE 1 = 1 ORDER BY ip ASC";

      $ips = $wpdb->get_results( $wpdb->prepare( $sql ));
      $i = isset( $_GET['i'] ) ? $_GET['i'] : 0;

      $wp_query = add_query_arg();
      $wp_query = remove_query_arg('i');
      $link = esc_url_raw($wp_query);

      ?>
      <div class="alignleft actions">
        <select name="b" id="filter-by-ip">
          <option<?php selected( $i, 0 ); ?> value="0" data-rc="<?php _e($link); ?>"><?php _e( 'Todas las IP' ); ?></option>
          <?php
          foreach ( $ips as $arc_row ) {
            $ip  = $arc_row->ip;

            $wp_query = add_query_arg('i', $ip);
            $link = esc_url_raw($wp_query);

            printf(
              "<option %s value='%s' data-rc='%s'>%s</option>\n",
              selected( $i, $ip, false ),
              esc_attr( $ip ),
              esc_attr( $link),
              sprintf( __( '%1$s' ), $ip )
            );
          }
          ?>
        </select>
        <a href="javascript:void(0)" class="button" onclick="window.location.href = jQuery('#filter-by-ip option:selected').data('rc');">Filtrar</a>
      </div>
      <?php

      // FILTRO EMAIL


      break;

      case 'bottom':
      // Your html code to output
      break;
    }
  }



}
