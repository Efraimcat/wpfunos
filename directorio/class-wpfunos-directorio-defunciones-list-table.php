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
  public function prepare_items() {

  }

}
