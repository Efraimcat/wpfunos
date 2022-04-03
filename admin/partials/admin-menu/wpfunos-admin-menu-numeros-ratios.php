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
?>
<h3><?php esc_html_e( 'RATIOS', 'wpfunos' )?></h3>
<table>
  <tr>
    <th colspan="3"><h2>Datos/Ubicación</h2></th>
    <th style="width:25px;"></th><th colspan="3"><h2>Ubicación/Entradas</h2></th>
    <th style="width:25px;"></th><th colspan="3"><h2>Datos/Entradas</h2></th>
    <tr>
      <td>Ratio últimos 30 dias:</td>
      <td style="width: 6px;"></td><td style="text-align: right;"><?php echo $ratio_DatUbi_month; ?></td>
      <td></td><td>Ratio últimos 30 dias:</td>
      <td style="width: 6px;"></td><td style="text-align: right;"><?php echo $ratio_UbiEnt_month; ?></td>
      <td></td><td>Ratio últimos 30 dias:</td>
      <td style="width: 6px;"></td><td style="text-align: right;"><?php echo $ratio_DatEnt_month; ?></td>
    </tr>
    <tr>
      <td>Ratio últimos 7 dias:</td>
      <td></td><td style="text-align: right;"><?php echo $ratio_DatUbi_week; ?></td>
      <td></td><td>Ratio últimos 7 dias:</td>
      <td></td><td style="text-align: right;"><?php echo $ratio_UbiEnt_week; ?></td>
      <td></td><td>Ratio últimos 7 dias:</td>
      <td></td><td style="text-align: right;"><?php echo $ratio_DatEnt_week; ?></td>
    </tr>
    <tr>
      <td>Ratio mes anterior (<?php echo $displaymesant;?>):</td>
      <td></td><td style="text-align: right;"></td>
      <td></td><td>Ratio mes anterior (<?php echo $displaymesant;?>):</td>
      <td></td><td style="text-align: right;"></td>
      <td></td><td>Ratio mes anterior (<?php echo $displaymesant;?>):</td>
      <td></td><td style="text-align: right;"></td>
    </tr>
    <tr>
      <td>Ratio mes (<?php echo $displaymes;  ?>):</td>
      <td></td><td style="text-align: right;"></td>
      <td></td><td>Ratio mes (<?php echo $displaymes;  ?>):</td>
      <td></td><td style="text-align: right;"></td>
      <td></td><td>Ratio mes (<?php echo $displaymes;  ?>):</td>
      <td></td><td style="text-align: right;"></td>
    </tr>
    <tr>
      <td>Ratio semana anterior (<?php echo $displaysemanaant;  ?>):</td>
      <td></td><td style="text-align: right;"></td>
      <td></td><td>Ratio semana anterior (<?php echo $displaysemanaant;  ?>):</td>
      <td></td><td style="text-align: right;"></td>
      <td></td><td>Ratio semana anterior (<?php echo $displaysemanaant;  ?>):</td>
      <td></td><td style="text-align: right;"></td>
    </tr>
    <tr>
      <td>Ratio semana (<?php echo $displaysemana;  ?>):</td>
      <td></td><td style="text-align: right;"></td>
      <td></td><td>Ratio semana (<?php echo $displaysemana;  ?>):</td>
      <td></td><td style="text-align: right;"></td>
      <td></td><td>Ratio semana (<?php echo $displaysemana;  ?>):</td>
      <td></td><td style="text-align: right;"></td>
    </tr>
    <tr>
      <td>Ratio ayer:</td>
      <td></td><td style="text-align: right;"><?php echo $ratio_DatUbi_ayer; ?></td>
      <td></td><td>Ratio ayer:</td>
      <td></td><td style="text-align: right;"><?php echo $ratio_UbiEnt_ayer; ?></td>
      <td></td><td>Ratio ayer:</td>
      <td></td><td style="text-align: right;"><?php echo $ratio_DatEnt_ayer; ?></td>
    </tr>
    <tr>
      <td>Ratio hoy:</td>
      <td></td><td><?php echo $ratio_DatUbi_24h; ?></td>
      <td></td><td>Ratio hoy:</td>
      <td></td><td style="text-align: right;"><?php echo $ratio_UbiEnt_24h; ?></td>
      <td></td><td>Ratio hoy:</td>
      <td></td><td style="text-align: right;"><?php echo $ratio_DatEnt_24h; ?></td>
    </tr>
  </table>
