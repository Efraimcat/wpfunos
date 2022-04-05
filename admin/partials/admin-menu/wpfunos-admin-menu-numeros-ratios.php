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
//$percentage = ($portion / $total) * 100;
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'month', 'publish', 'wpfunos_userAccion', '0', '2022-03-19' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'month', 'publish', 'wpfunos_Dummy', true, '2022-03-19' );
$ratio_DatUbi_month = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'week', 'publish', 'wpfunos_userAccion', '0', '2022-03-19' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'week', 'publish', 'wpfunos_Dummy', true, '2022-03-19' );
$ratio_DatUbi_week = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'ayer', 'publish', 'wpfunos_userAccion', '0', '2022-03-19' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'ayer', 'publish', 'wpfunos_Dummy', true, '2022-03-19' );
$ratio_DatUbi_ayer = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'day', 'publish', 'wpfunos_userAccion', '0', '2022-03-19' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'day', 'publish', 'wpfunos_Dummy', true, '2022-03-19' );
$ratio_DatUbi_24h = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'month', 'publish', 'wpfunos_userAccion', '0', '2022-03-19', 'wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'month', 'publish', 'wpfunos_Dummy', true, '2022-03-19', 'wpfunos_Dummy', true, true );
$ratio_DatUbi_monthUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'week', 'publish', 'wpfunos_userAccion', '0', '2022-03-19', 'wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'week', 'publish', 'wpfunos_Dummy', true, '2022-03-19', 'wpfunos_Dummy', true, true );
$ratio_DatUbi_weekUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'ayer', 'publish', 'wpfunos_userAccion', '0', '2022-03-19', 'wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'ayer', 'publish', 'wpfunos_Dummy', true, '2022-03-19', 'wpfunos_Dummy', true, true );
$ratio_DatUbi_ayerUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'day', 'publish', 'wpfunos_userAccion', '0', '2022-03-19', 'wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'day', 'publish', 'wpfunos_Dummy', true, '2022-03-19', 'wpfunos_Dummy', true, true );
$ratio_DatUbi_24hUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
/* */
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'month', 'publish', 'wpfunos_Dummy', true, '2022-03-31' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'month', 'publish', 'wpfunos_Dummy', true, '2022-03-31' );
$ratio_UbiEnt_month = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'week', 'publish', 'wpfunos_Dummy', true, '2022-03-31' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'week', 'publish', 'wpfunos_Dummy', true, '2022-03-31' );
$ratio_UbiEnt_week = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'ayer', 'publish', 'wpfunos_Dummy', true, '2022-03-31' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'ayer', 'publish', 'wpfunos_Dummy', true, '2022-03-31' );
$ratio_UbiEnt_ayer = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'day', 'publish', 'wpfunos_Dummy', true, '2022-03-31' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'day', 'publish', 'wpfunos_Dummy', true, '2022-03-31' );
$ratio_UbiEnt_24h = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'month', 'publish', 'wpfunos_Dummy', true, '2022-03-31', 'wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'month', 'publish', 'wpfunos_Dummy', true, '2022-03-31', 'wpfunos_Dummy', true, true );
$ratio_UbiEnt_monthUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'week', 'publish', 'wpfunos_Dummy', true, '2022-03-31', 'wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'week', 'publish', 'wpfunos_Dummy', true, '2022-03-31', 'wpfunos_Dummy', true, true );
$ratio_UbiEnt_weekUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'ayer', 'publish', 'wpfunos_Dummy', true, '2022-03-31', 'wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'ayer', 'publish', 'wpfunos_Dummy', true, '2022-03-31', 'wpfunos_Dummy', true, true );
$ratio_UbiEnt_ayerUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'ubicaciones_wpfunos', 'day', 'publish', 'wpfunos_Dummy', true, '2022-03-31', 'wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'day', 'publish', 'wpfunos_Dummy', true, '2022-03-31', 'wpfunos_Dummy', true, true );
$ratio_UbiEnt_24hUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
/* */
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'month', 'publish', 'wpfunos_userAccion', '0', '2022-03-31' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'month', 'publish', 'wpfunos_Dummy', true, '2022-03-31' );
$ratio_DatEnt_month = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'week', 'publish', 'wpfunos_userAccion', '0', '2022-03-31' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'week', 'publish', 'wpfunos_Dummy', true, '2022-03-31' );
$ratio_DatEnt_week = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'ayer', 'publish', 'wpfunos_userAccion', '0', '2022-03-31' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'ayer', 'publish', 'wpfunos_Dummy', true, '2022-03-31' );
$ratio_DatEnt_ayer = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'day', 'publish', 'wpfunos_userAccion', '0', '2022-03-31' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'day', 'publish', 'wpfunos_Dummy', true, '2022-03-31' );
$ratio_DatEnt_24h = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'month', 'publish', 'wpfunos_userAccion', '0', '2022-03-31', 'wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'month', 'publish', 'wpfunos_Dummy', true, '2022-03-31', 'wpfunos_Dummy', true, true );
$ratio_DatEnt_monthUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'week', 'publish', 'wpfunos_userAccion', '0', '2022-03-31', 'wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'week', 'publish', 'wpfunos_Dummy', true, '2022-03-31', 'wpfunos_Dummy', true, true );
$ratio_DatEnt_weekUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'ayer', 'publish', 'wpfunos_userAccion', '0', '2022-03-31', 'wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'ayer', 'publish', 'wpfunos_Dummy', true, '2022-03-31', 'wpfunos_Dummy', true, true );
$ratio_DatEnt_ayerUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_date', 'usuarios_wpfunos', 'day', 'publish', 'wpfunos_userAccion', '0', '2022-03-31', 'wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_date', 'pag_serv_wpfunos', 'day', 'publish', 'wpfunos_Dummy', true, '2022-03-31', 'wpfunos_Dummy', true, true );
$ratio_DatEnt_24hUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
/* */
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'semana' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'semana' );
$ratio_DatUbi_semana = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'semana_ant' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'semana_ant' );
$ratio_DatUbi_semana_ant = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'mes' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'mes' );
$ratio_DatUbi_mes = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'mes_ant' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'mes_ant' );
$ratio_DatUbi_mes_ant = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'semana', '','wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'semana', '','wpfunos_Dummy', true, true );
$ratio_DatUbi_semanaUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'semana_ant', '','wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'semana_ant', '','wpfunos_Dummy', true, true );
$ratio_DatUbi_semana_antUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'mes', '','wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'mes', '','wpfunos_Dummy', true, true );
$ratio_DatUbi_mesUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'mes_ant', '','wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'mes_ant', '','wpfunos_Dummy', true, true );
$ratio_DatUbi_mes_antUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
/* */
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'semana' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'semana' );
$ratio_UbiEnt_semana = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'semana_ant' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'semana_ant' );
$ratio_UbiEnt_semana_ant = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'mes' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'mes' );
$ratio_UbiEnt_mes = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'mes_ant' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'mes_ant' );
$ratio_UbiEnt_mes_ant = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'semana', '','wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'semana', '','wpfunos_Dummy', true, true );
$ratio_UbiEnt_semanaUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'semana_ant', '','wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'semana_ant', '','wpfunos_Dummy', true, true );
$ratio_UbiEnt_semana_antUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'mes', '','wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'mes', '','wpfunos_Dummy', true, true );
$ratio_UbiEnt_mesUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'ubicaciones_wpfunos', 'mes_ant', '','wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'mes_ant', '','wpfunos_Dummy', true, true );
$ratio_UbiEnt_mes_antUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
/* */
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'semana' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'semana' );
$ratio_DatEnt_semana = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'semana_ant' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'semana_ant' );
$ratio_DatEnt_semana_ant = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'mes' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'mes' );
$ratio_DatEnt_mes = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'mes_ant' );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'mes_ant' );
$ratio_DatEnt_mes_ant = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'semana', '','wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'semana', '','wpfunos_Dummy', true, true );
$ratio_DatEnt_semanaUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'semana_ant', '','wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'semana_ant', '','wpfunos_Dummy', true, true );
$ratio_DatEnt_semana_antUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'mes', '','wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'mes', '','wpfunos_Dummy', true, true );
$ratio_DatEnt_mesUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
$num1 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'usuarios_wpfunos', 'mes_ant', '','wpfunos_Dummy', true, true );
$num2 = (int)apply_filters( 'wpfunos_estadisticas_semana_mes', 'pag_serv_wpfunos', 'mes_ant', '','wpfunos_Dummy', true, true );
$ratio_DatEnt_mes_antUnicos = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
/* */
?>
<h3><?php esc_html_e( 'RATIOS', 'wpfunos' )?></h3>
<table>
  <tr>
    <th colspan="3"><h2>Ubicación/Entradas</h2></th>
    <th colspan="2"><h2>Únicos</h2></th>
    <th style="width:25px;"></th>
    <th colspan="3"><h2>Datos/Ubicación</h2></th>
    <th colspan="2"><h2>Únicos</h2></th>
    <th style="width:25px;"></th>
    <th colspan="3"><h2>Datos/Entradas</h2></th>
    <th colspan="2"><h2>Únicos</h2></th>
  </tr>
  <tr>
    <td>Ratio últimos 30 dias:</td>
    <td style="width: 6px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_month; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_monthUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio últimos 30 dias:</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_month; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_monthUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio últimos 30 dias:</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_month; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_monthUnicos; ?></td>
  </tr>
  <tr>
    <td>Ratio últimos 7 dias:</td>
    <td style="width: 6px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_week; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_weekUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio últimos 7 dias:</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_week; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_weekUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio últimos 7 dias:</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_week; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_weekUnicos; ?></td>
  </tr>
  <tr>
    <td>Ratio mes anterior (<?php echo $displaymesant;?>):</td>
    <td style="width: 6px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_mes_ant; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_mes_antUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio mes anterior (<?php echo $displaymesant;?>):</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_mes_ant; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_mes_antUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio mes anterior (<?php echo $displaymesant;?>):</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_mes_ant; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_mes_antUnicos; ?></td>
  </tr>
  <tr>
    <td>Ratio mes (<?php echo $displaymes;  ?>):</td>
    <td style="width: 6px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_mes; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_mesUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio mes (<?php echo $displaymes;  ?>):</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_mes; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_mesUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio mes (<?php echo $displaymes;  ?>):</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_mes; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_mesUnicos; ?></td>
  </tr>
  <tr>
    <td>Ratio semana anterior (<?php echo $displaysemanaant;  ?>):</td>
    <td style="width: 6px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_semana_ant; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_semana_antUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio semana anterior (<?php echo $displaysemanaant;  ?>):</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_semana_ant; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_semana_antUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio semana anterior (<?php echo $displaysemanaant;  ?>):</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_semana_ant; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_semana_antUnicos; ?></td>
  </tr>
  <tr>
    <td>Ratio semana (<?php echo $displaysemana;  ?>):</td>
    <td style="width: 6px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_semana; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_semanaUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio semana (<?php echo $displaysemana;  ?>):</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_semana; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_semanaUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio semana (<?php echo $displaysemana;  ?>):</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_semana; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_semanaUnicos; ?></td>
  </tr>
  <tr>
    <td>Ratio ayer:</td>
    <td style="width: 6px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_ayer; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_ayerUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio ayer:</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_ayer; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_ayerUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio ayer:</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_ayer; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_ayerUnicos; ?></td>
  </tr>
  <tr>
    <td>Ratio hoy:</td>
    <td style="width: 6px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_24h; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_UbiEnt_24hUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio hoy:</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_24h; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatUbi_24hUnicos; ?></td>
    <td style="width:25px;"></td>
    <td>Ratio hoy:</td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_24h; ?></td>
    <td style="width: 16px;"></td>
    <td style="text-align: right;"><?php echo $ratio_DatEnt_24hUnicos; ?></td>
  </tr>
</table>
