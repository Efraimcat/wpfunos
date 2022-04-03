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
* @subpackage Wpfunos/admin/partials/admin-menu
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
?>
<h3><?php esc_html_e( 'DATOS', 'wpfunos' )?></h3>
<table>
  <tr>
    <th colspan="2" style="width:225px;"><h2>Usuarios que han enviado datos</h2></th>
    <th style="width:25px;"></th><th colspan="2" style="width:125px;"><h2>Servicio</h2></th>
    <th style="width:25px;"></th><th colspan="2" style="width:150px;"><h2>Ataúd</h2></th>
    <th style="width:25px;"></th><th colspan="2" style="width:150px;"><h2>Velatorio</h2></th>
    <th style="width:25px;"></th><th colspan="2" style="width:150px;"><h2>Despedida</h2></th>
  </tr>
  <tr>
    <td>Usuarios total: </td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date' , 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userAccion', '0', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td>Incineración:</td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date' , 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionServicio', 'Incineración', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td>Ataúd Económico:</td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionAtaud', 'Ataúd Económico', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td>Velatorio:</td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionVelatorio', 'Velatorio', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td>Sin ceremonia:</td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionDespedida', 'Sin ceremonia', '', 'wpfunos_userAccion', '0' ); ?></td>
  </tr>
  <tr>
    <td>Usuarios últimos 30 dias: </td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'month', 'publish', 'wpfunos_userAccion', '0', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td>Entierro:</td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionServicio', 'Entierro', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td>Ataúd Medio:</td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionAtaud', 'Ataúd Medio', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td>Sin Velatorio:</td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionVelatorio', 'Sin Velatorio', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td>Solo sala:</td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date','usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionDespedida', 'Solo sala', '', 'wpfunos_userAccion', '0' ); ?></td>
  </tr>
  <tr>
    <td>Usuarios últimos 7 dias: </td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'week', 'publish', 'wpfunos_userAccion', '0', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td></td><td></td>
    <td></td><td>Ataúd Premium:</td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionAtaud', 'Ataúd Premium', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td></td><td></td>
    <td></td><td>Ceremonia civil:</td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionDespedida', 'Ceremonia civil', '', 'wpfunos_userAccion', '0' ); ?></td>
  </tr>
  <tr>
    <td>Usuarios mes anterior (<?php echo $displaymesant;?>): </td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_semana_mes' , 'usuarios_wpfunos', 'mes_ant', '', 'wpfunos_userAccion', '0', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td></td>
    <td>Ceremonia religiosa:</td><td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionDespedida', 'Ceremonia religiosa', '', 'wpfunos_userAccion', '0'); ?></td>
  </tr>
  <tr>
    <td>Usuarios mes (<?php echo $displaymes;  ?>): </td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_semana_mes' , 'usuarios_wpfunos', 'mes', '',  'wpfunos_userAccion', '0', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
  </tr>

  <tr>
    <td>Usuarios semana anterior (<?php echo $displaysemanaant;  ?>): </td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_semana_mes' , 'usuarios_wpfunos', 'semana_ant', '',  'wpfunos_userAccion', '0', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
  </tr>
  <tr>
    <td>Usuarios semana (<?php echo $displaysemana;  ?>): </td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_semana_mes' , 'usuarios_wpfunos', 'semana', '', 'wpfunos_userAccion', '0', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
  </tr>

  <tr>
    <td>Usuarios ayer: </td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'ayer', 'publish', 'wpfunos_userAccion', '0', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
  </tr>
  <tr>
    <td>Usuarios hoy: </td>
    <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'day', 'publish', 'wpfunos_userAccion', '0', '', 'wpfunos_userAccion', '0' ); ?></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
    <td></td><td></td><td></td>
  </tr>
</table>
