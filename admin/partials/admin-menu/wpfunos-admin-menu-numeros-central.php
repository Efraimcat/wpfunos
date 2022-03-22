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
<table>
	<tr>
		<th colspan="2" style="width:225px;"><h2>Usuarios que han enviado datos</h2></th>
		<th style="width:25px;"></th><th colspan="2" style="width:125px;"><h2>Servicio</h2></th>
		<th style="width:25px;"></th><th colspan="2" style="width:150px;"><h2>Ataúd</h2></th>
		<th style="width:25px;"></th><th colspan="2" style="width:150px;"><h2>Velatorio</h2></th>
		<th style="width:25px;"></th><th colspan="2" style="width:150px;"><h2>Despedida</h2></th>
	</tr>
	<tr>
		<td>Usuarios total: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all' ); ?></td>
		<td></td><td>Incineración:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionServicio', 'Incineración' ) ?></td>
		<td></td><td>Ataúd Económico:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionAtaud', 'Ataúd Económico' ) ?></td>
		<td></td><td>Velatorio:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionVelatorio', 'Velatorio' ) ?></td>
		<td></td><td>Sin ceremonia:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionDespedida', 'Sin ceremonia' ) ?></td>
	</tr>
	<tr>
		<td>Usuarios últimos 30 dias: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'month' ); ?></td>
		<td></td><td>Entierro:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionServicio', 'Entierro' ) ?></td>
		<td></td><td>Ataúd Medio:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionAtaud', 'Ataúd Medio' ) ?></td>
		<td></td><td>Sin Velatorio:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionVelatorio', 'Sin Velatorio' ) ?></td>
		<td></td><td>Solo sala:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionDespedida', 'Solo sala' ) ?></td>
	</tr>
	<tr>
		<td>Usuarios últimos 7 dias: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'week' ); ?></td>
		<td></td><td></td><td></td>
		<td></td><td>Ataúd Premium:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionAtaud', 'Ataúd Premium' ) ?></td>
		<td></td><td></td><td></td>
		<td></td><td>Ceremonia civil:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionDespedida', 'Ceremonia civil' ) ?></td>
	</tr>
	<tr>
		<td>Usuarios hoy: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'day' ); ?></td>
		<td></td><td></td><td></td>
		<td></td><td></td><td></td>
		<td></td><td></td><td></td>
		<td></td><td>Ceremonia religiosa:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionDespedida', 'Ceremonia religiosa' ) ?></td>
	</tr>
</table>
