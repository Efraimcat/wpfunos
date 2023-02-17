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



}
