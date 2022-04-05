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
<h3><?php esc_html_e( 'UBICACIONES', 'wpfunos' )?></h3>
<table>
  <tr>
    <th colspan="2" style="width:225px;"><h2>Usuarios que han enviado ubicación</h2></th>
    <th><h2>Únicos</h2></th>
    <th style="width:25px;"></th><th colspan="2" style="width:65px;"><h2>CP total</h2></th>
    <th style="width:25px;"></th><th colspan="2" style="width:65px;"><h2>CP mes</h2></th>
    <th style="width:25px;"></th><th colspan="2" style="width:65px;"><h2>CP sem.</h2></th>
    <th style="width:50px;"></th><th colspan="2" style="width:115px;"><h2>Población total</h2></th>
    <th style="width:25px;"></th><th colspan="2" style="width:115px;"><h2>Población mes</h2></th>
    <th style="width:25px;"></th><th colspan="2" style="width:115px;"><h2>Población semana</h2></th>
  </tr>
  <?php for ($x = 0; $x <= 10; $x++) { ?>
    <tr>
      <?php
      if ( $x== 0 ) echo '<td>Ubicaciones total: </td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_date' , 'ubicaciones_wpfunos', 'all' ) . '</td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_date' , 'ubicaciones_wpfunos', 'all', 'publish', 'wpfunos_Dummy', true, "", 'wpfunos_Dummy', true, true ) . '</td>';
      if ( $x== 1 ) echo '<td>Ubicaciones últimos 30 días:  </td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_date' , 'ubicaciones_wpfunos', 'month' ) . '</td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_date' , 'ubicaciones_wpfunos', 'month', 'publish', 'wpfunos_Dummy', true, "", 'wpfunos_Dummy', true, true ) . '</td>';
      if ( $x== 2 ) echo '<td>Ubicaciones últimos 7 días: </td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_date' , 'ubicaciones_wpfunos', 'week' ) . '</td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_date' , 'ubicaciones_wpfunos', 'week', 'publish', 'wpfunos_Dummy', true, "", 'wpfunos_Dummy', true, true ) . '</td>';
      if ( $x== 3 ) echo '<td>Ubicaciones mes anterior (' . $displaymesant . '): </td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_semana_mes' , 'ubicaciones_wpfunos', 'mes_ant' ) . '</td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_semana_mes' , 'ubicaciones_wpfunos', 'mes_ant' ,"", 'wpfunos_Dummy', true,true ). '</td>';
      if ( $x== 4 ) echo '<td>Ubicaciones mes (' . $displaymes . '): </td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_semana_mes' , 'ubicaciones_wpfunos', 'mes' ) . '</td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_semana_mes' , 'ubicaciones_wpfunos', 'mes' ,"", 'wpfunos_Dummy', true,true ). '</td>';
      if ( $x== 5 ) echo '<td>Ubicaciones semana anterior ('. $displaysemanaant .'): </td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_semana_mes' , 'ubicaciones_wpfunos', 'semana_ant' ) . '</td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_semana_mes' , 'ubicaciones_wpfunos', 'semana_ant' ,'', 'wpfunos_Dummy', true,true ). '</td>';
      if ( $x== 6 ) echo '<td>Ubicaciones semana (' . $displaysemana . '): </td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_semana_mes' , 'ubicaciones_wpfunos', 'semana' ) . '</td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_semana_mes' , 'ubicaciones_wpfunos', 'semana' ,'', 'wpfunos_Dummy', true,true ). '</td>';
      if ( $x== 7 ) echo '<td>Ubicaciones ayer: </td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_date' , 'ubicaciones_wpfunos', 'ayer' ) . '</td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_date' , 'ubicaciones_wpfunos', 'ayer', 'publish', 'wpfunos_Dummy', true, '', 'wpfunos_Dummy', true, true ) . '</td>';
      if ( $x== 8 ) echo '<td>Ubicaciones hoy: </td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_date' , 'ubicaciones_wpfunos', 'day' ) . '</td>
      <td style="text-align: right;padding-left: 5px;">' . apply_filters( 'wpfunos_estadisticas_date' , 'ubicaciones_wpfunos', 'day', 'publish', 'wpfunos_Dummy', true, '', 'wpfunos_Dummy', true, true ) . '</td>';
      if ( $x >= 9 ) echo '<td></td><td></td><td></td>';
      ?>
      <td></td><td><?php echo apply_filters( 'wpfunos_estadisticas_cp',$x+1,'dato','cp'); ?></td>
      <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_cp',$x+1,'numero','cp'); ?></td>
      <td></td><td><?php echo apply_filters( 'wpfunos_estadisticas_cp',$x+1,'dato','cp', 'month'); ?></td>
      <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_cp',$x+1,'numero','cp', 'month'); ?></td>
      <td></td><td><?php echo apply_filters( 'wpfunos_estadisticas_cp',$x+1,'dato','cp', 'week'); ?></td>
      <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_cp',$x+1,'numero','cp', 'week'); ?></td>
      <td></td><td><?php echo apply_filters( 'wpfunos_estadisticas_cp',$x+1,'dato','poblacion'); ?></td>
      <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_cp',$x+1,'numero','poblacion'); ?></td>
      <td></td><td><?php echo apply_filters( 'wpfunos_estadisticas_cp',$x+1,'dato','poblacion', 'month'); ?></td>
      <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_cp',$x+1,'numero','poblacion', 'month'); ?></td>
      <td></td><td><?php echo apply_filters( 'wpfunos_estadisticas_cp',$x+1,'dato','poblacion', 'week'); ?></td>
      <td style="text-align: right;"><?php echo apply_filters( 'wpfunos_estadisticas_cp',$x+1,'numero','poblacion', 'week'); ?></td>
    </tr>
  <?php } ?>
</table>
