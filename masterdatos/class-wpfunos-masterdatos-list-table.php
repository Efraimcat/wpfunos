<?php
if (!defined('ABSPATH')) {
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
 */

class Wpfunos_Masterdatos_List_Table extends WP_List_Table
{

  /*
  *
  */
  public function get_columns()
  {
    $table_columns = array(
      'cb' => '<input type="checkbox" />', // to display the checkbox.
      'nombre'             => __('Nom.', 'wpfunos'),
      'idrefencia'         => __('Ref.', 'wpfunos'),
      'tipo'               => __('Tipo', 'wpfunos'),
      'latitud'            => __('Lat.', 'wpfunos'),
      'longitud'           => __('Long.', 'wpfunos'),
      'distancia'          => __('Dist.', 'wpfunos'),
      'preciobase'         => __('Base', 'wpfunos'),
      'precioincineracion' => __('Inc.', 'wpfunos'),
      'precioentierro'     => __('Ent.', 'wpfunos'),
      'precioataudeco'     => __('Eco.', 'wpfunos'),
      'precioataudmed'     => __('Med.', 'wpfunos'),
      'precioataudpre'     => __('Pre.', 'wpfunos'),
      'preciovelsi'        => __('VSi', 'wpfunos'),
      'preciovelno'        => __('VNo', 'wpfunos'),
      'preciocersol'       => __('Solo', 'wpfunos'),
      'preciocerciv'       => __('Civ', 'wpfunos'),
      'preciocerrel'       => __('Rel', 'wpfunos'),
      'incinc'             => __('Inc1', 'wpfunos'),
      'incvel'             => __('Inc2', 'wpfunos'),
      'incvelcer'          => __('Inc3', 'wpfunos'),
      'incpremium'         => __('Inc4', 'wpfunos'),
      'entent'             => __('Ent1', 'wpfunos'),
      'entvel'             => __('Ent2', 'wpfunos'),
      'entvelcer'          => __('Ent3', 'wpfunos'),
      'entpremium'         => __('Ent4', 'wpfunos'),
    );
    return $table_columns;
  }

  /*
  *
  */
  public function no_items()
  {
    _e('No hay datos disponibles.', 'wpfunos');
  }

  /*
  *
  */
  public function get_sortable_columns()
  {
    return $sortable = array(
      'nombre'             => 'nombre',
      'idrefencia'         => 'idrefencia',
      'tipo'               => 'tipo',
      'latitud'            => 'latitud',
      'longitud'           => 'longitud',
      'distancia'          => 'distancia',
      'preciobase'         => 'preciobase',
      'precioincineracion' => 'precioincineracion',
      'precioentierro'     => 'precioentierro',
      'precioataudeco'     => 'precioataudeco',
      'precioataudmed'     => 'precioataudmed',
      'precioataudpre'     => 'precioataudpre',
      'preciovelsi'        => 'preciovelsi',
      'preciovelno'        => 'preciovelno',
      'preciocersol'       => 'preciocersol',
      'preciocerciv'       => 'preciocerciv',
      'preciocerrel'       => 'preciocerrel',
      'incinc'             => 'incinc',
      'incvel'             => 'incvel',
      'incvelcer'          => 'incvelcer',
      'incpremium'         => 'incpremium',
      'entent'             => 'entent',
      'entvel'             => 'entvel',
      'entvelcer'          => 'entvelcer',
      'entpremium'         => 'entpremium',
    );
  }

  /*
  *
  */
  public function prepare_items()
  {
    // code to handle bulk actions

    //used by WordPress to build and fetch the _column_headers property
    $this->_column_headers = $this->get_column_info();
    $table_data = $this->fetch_table_data();

    // code to handle data operations like sorting and filtering

    // start by assigning your data to the items variable
    $this->items = $table_data;

    // code to handle pagination
    // code for pagination
    $masterdatos_per_page = $this->get_items_per_page('masterdatos_per_page');
    $table_page = $this->get_pagenum();

    // provide the ordered data to the List Table
    // we need to manually slice the data based on the current pagination
    $this->items = array_slice($table_data, (($table_page - 1) * $masterdatos_per_page), $masterdatos_per_page);

    // set the pagination arguments
    $total_masterdatos = count($table_data);
    $this->set_pagination_args(array(
      'total_items' => $total_masterdatos,
      'per_page'    => $masterdatos_per_page,
      'total_pages' => ceil($total_masterdatos / $masterdatos_per_page)
    ));

    // check if a search was performed.
    $masterdatos_search_key = isset($_REQUEST['s']) ? wp_unslash(trim($_REQUEST['s'])) : '';

    // check and process any actions such as bulk actions.
    $this->handle_table_actions();

    // filter the data in case of a search
    if ($masterdatos_search_key) {
      $table_data = $this->filter_table_data($table_data, $masterdatos_search_key);
      $this->items = $table_data;
    }
  }

  /*
  *
  */
  public function fetch_table_data()
  {
    global $wpdb;
    $wpdb_table = $wpdb->prefix . 'wpf_masterdatos';

    $orderby = (isset($_GET['orderby'])) ? esc_sql($_GET['orderby']) : 'id';
    $order = (isset($_GET['order'])) ? esc_sql($_GET['order']) : 'DESC';

    //$user_query = "SELECT * FROM $wpdb_table ORDER BY id DESC";
    $user_query = "SELECT * FROM $wpdb_table WHERE 1=1";

    $user_query = $this->procesar_args($user_query);

    //$user_query .= ' ORDER BY id DESC';
    $user_query .= ' ORDER BY ' . $orderby . ' ' . $order;

    // query output_type will be an associative array with ARRAY_A.
    $query_results = $wpdb->get_results($user_query, ARRAY_A);

    // return result array to prepare_items.
    return $query_results;
  }

  /*
  *
  */
  public function column_default($item, $column_name)
  {
    switch ($column_name) {
      case 'referer':
        return substr($item[$column_name], 0, 50);
      default:
        return $item[$column_name];
    }
  }

  /*
  *
  */
  protected function column_cb($item)
  {
    return sprintf(
      '<label class="screen-reader-text" for="masterdatos_' . $item['id'] . '">' . sprintf(__('Select %s'), $item['id']) . '</label>'
        . "<input type='checkbox' name='masterdatos[]' id='masterdatos_{$item['id']}' value='{$item['id']}' />"
    );
  }

  /*
  * filter the table data based on the search key
  */
  public function filter_table_data($table_data, $search_key)
  {
    $filtered_table_data = array_values(array_filter($table_data, function ($row) use ($search_key) {
      foreach ($row as $row_val) {
        if (stripos($row_val, $search_key) !== false) {
          return true;
        }
      }
    }));
    return $filtered_table_data;
  }

  /*
  *
  */
  public function procesar_args($user_query)
  {

    return $user_query;
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
}
