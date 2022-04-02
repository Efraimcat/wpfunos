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
$num1 = (int)$this->wpfunos_stats_date( 'usuarios_wpfunos', 'month', 'publish', '', '', '2022-03-19' );
$num2 = (int)$this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'month', 'publish', '', '', '2022-03-19' );
$ratio_DatUbi_month = sprintf ("%.2f",($num1/$num2)*100). '%';

$num1 = (int)$this->wpfunos_stats_date( 'usuarios_wpfunos', 'week', 'publish', '', '', '2022-03-19' );
$num2 = (int)$this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'week', 'publish', '', '', '2022-03-19' );
$ratio_DatUbi_week = sprintf ("%.2f",($num1/$num2)*100). '%';

$num1 = (int)$this->wpfunos_stats_date( 'usuarios_wpfunos', 'ayer', 'publish', '', '', '2022-03-19' );
$num2 = (int)$this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'ayer', 'publish', '', '', '2022-03-19' );
$ratio_DatUbi_ayer = sprintf ("%.2f",($num1/$num2)*100). '%';

$num1 = (int)$this->wpfunos_stats_date( 'usuarios_wpfunos', 'day', 'publish', '', '', '2022-03-19' );
$num2 = (int)$this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'day', 'publish', '', '', '2022-03-19' );
$ratio_DatUbi_24h = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
$num1 = (int)$this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'month', 'publish', '', '', '2022-03-31' );
$num2 = (int)$this->wpfunos_stats_date( 'pag_serv_wpfunos', 'month', 'publish', '', '', '2022-03-31' );
$ratio_UbiEnt_month = sprintf ("%.2f",($num1/$num2)*100). '%';

$num1 = (int)$this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'week', 'publish', '', '', '2022-03-31' );
$num2 = (int)$this->wpfunos_stats_date( 'pag_serv_wpfunos', 'week', 'publish', '', '', '2022-03-31' );
$ratio_UbiEnt_week = sprintf ("%.2f",($num1/$num2)*100). '%';

$num1 = (int)$this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'ayer', 'publish', '', '', '2022-03-31' );
$num2 = (int)$this->wpfunos_stats_date( 'pag_serv_wpfunos', 'ayer', 'publish', '', '', '2022-03-31' );
$ratio_UbiEnt_ayer = sprintf ("%.2f",($num1/$num2)*100). '%';

$num1 = (int)$this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'day', 'publish', '', '', '2022-03-31' );
$num2 = (int)$this->wpfunos_stats_date( 'pag_serv_wpfunos', 'day', 'publish', '', '', '2022-03-31' );
$ratio_UbiEnt_24h = sprintf ("%.2f",($num1/$num2)*100). '%';
/* */
$num1 = (int)$this->wpfunos_stats_date( 'usuarios_wpfunos', 'month', 'publish', '', '', '2022-03-31' );
$num2 = (int)$this->wpfunos_stats_date( 'pag_serv_wpfunos', 'month', 'publish', '', '', '2022-03-31' );
$ratio_DatEnt_month = sprintf ("%.2f",($num1/$num2)*100). '%';

$num1 = (int)$this->wpfunos_stats_date( 'usuarios_wpfunos', 'week', 'publish', '', '', '2022-03-31' );
$num2 = (int)$this->wpfunos_stats_date( 'pag_serv_wpfunos', 'week', 'publish', '', '', '2022-03-31' );
$ratio_DatEnt_week = sprintf ("%.2f",($num1/$num2)*100). '%';

$num1 = (int)$this->wpfunos_stats_date( 'usuarios_wpfunos', 'ayer', 'publish', '', '', '2022-03-31' );
$num2 = (int)$this->wpfunos_stats_date( 'pag_serv_wpfunos', 'ayer', 'publish', '', '', '2022-03-31' );
$ratio_DatEnt_ayer = sprintf ("%.2f",($num1/$num2)*100). '%';

$num1 = (int)$this->wpfunos_stats_date( 'usuarios_wpfunos', 'day', 'publish', '', '', '2022-03-31' );
$num2 = (int)$this->wpfunos_stats_date( 'pag_serv_wpfunos', 'day', 'publish', '', '', '2022-03-31' );
$ratio_DatEnt_24h = sprintf ("%.2f",($num1/$num2)*100). '%';
?>
<h3><?php esc_html_e( 'RATIOS', 'wpfunos' )?></h3>
<table>
	<tr>
		<th colspan="3"><h2>Datos/Ubicación</h2></th>
		<th style="width:25px;"></th><th colspan="3"><h2>Ubicación/Entradas</h2></th>
		<th style="width:25px;"></th><th colspan="3"><h2>Datos/Entradas</h2></th>
	<tr>
		<td>Ratio mes:</td><td style="width: 6px;"></td><td><?php echo $ratio_DatUbi_month; ?></td>
		<td></td><td>Ratio mes:</td><td style="width: 6px;"></td><td><?php echo $ratio_UbiEnt_month; ?></td>
		<td></td><td>Ratio mes:</td><td style="width: 6px;"></td><td><?php echo $ratio_DatEnt_month; ?></td>
	</tr>
	<tr>
		<td>Ratio semana:</td><td></td><td><?php echo $ratio_DatUbi_week; ?></td>
		<td></td><td>Ratio semana:</td><td></td><td><?php echo $ratio_UbiEnt_week; ?></td>
		<td></td><td>Ratio semana:</td><td></td><td><?php echo $ratio_DatEnt_week; ?></td>
	</tr>
	<tr>
		<td>Ratio ayer:</td><td></td><td><?php echo $ratio_DatUbi_ayer; ?></td>
		<td></td><td>Ratio ayer:</td><td></td><td><?php echo $ratio_UbiEnt_ayer; ?></td>
		<td></td><td>Ratio ayer:</td><td></td><td><?php echo $ratio_DatEnt_ayer; ?></td>
	</tr>
	<tr>
		<td>Ratio hoy:</td><td></td><td><?php echo $ratio_DatUbi_24h; ?></td>
		<td></td><td>Ratio hoy:</td><td></td><td><?php echo $ratio_UbiEnt_24h; ?></td>
		<td></td><td>Ratio hoy:</td><td></td><td><?php echo $ratio_DatEnt_24h; ?></td>
	</tr>
</table>