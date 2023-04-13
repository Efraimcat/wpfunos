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
      'cb'		=> '<input type="checkbox" />', // to display the checkbox.
      'nombre' => __( 'Nombre', 'wpfunos' ),
      'tanatorio' => __( 'Tanatorio', 'wpfunos' ),
      'fecha'	=> __( 'Fecha', 'wpfunos' ),
      'time'	=> __( 'Fecha entrada', 'wpfunos' ),
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
      'tanatorio' => 'tanatorio',
      'fecha'	=> 'fecha',
      'time'	=> 'time',
    );
  }

  /*
  *
  */
  public function fetch_table_data() {
    global $wpdb;
    $wpdb_table = $wpdb->prefix . 'wpf_defunciones';

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
      case 'fecha': return date("d-m-Y", strtotime($item[$column_name]));
      default:
      return $item[$column_name];
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
  */
  public function procesar_args( $user_query ){
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
