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
		<th colspan="2" style="width:225px;"><h2>Usuarios que han enviado ubicación</h2></th>
		<th style="width:25px;"></th><th colspan="2" style="width:65px;"><h2>CP total</h2></th>
		<th style="width:25px;"></th><th colspan="2" style="width:65px;"><h2>CP mes</h2></th>
		<th style="width:25px;"></th><th colspan="2" style="width:65px;"><h2>CP sem.</h2></th>
		<th style="width:25px;"></th><th colspan="2" style="width:115px;"><h2>Población total</h2></th>
		<th style="width:25px;"></th><th colspan="2" style="width:115px;"><h2>Población mes</h2></th>
		<th style="width:25px;"></th><th colspan="2" style="width:115px;"><h2>Población semana</h2></th>
	</tr>
	<tr>
		<td>Ubicaciones total: </td><td><?php echo $this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'all' ); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(1,'dato','cp'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(1,'numero','cp'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(1,'dato','cp', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(1,'numero','cp', 'month'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(1,'dato','cp', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(1,'numero','cp', 'week'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(1,'dato','poblacion'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(1,'numero','poblacion'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(1,'dato','poblacion', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(1,'numero','poblacion', 'month'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(1,'dato','poblacion', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(1,'numero','poblacion', 'week'); ?></td>
	</tr>
	<tr>
		<td>Ubicaciones últimos 30 días: </td><td><?php echo $this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'month' ); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(2,'dato','cp'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(2,'numero','cp'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(2,'dato','cp', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(2,'numero','cp', 'month'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(2,'dato','cp', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(2,'numero','cp', 'week'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(2,'dato','poblacion'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(2,'numero','poblacion'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(2,'dato','poblacion', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(2,'numero','poblacion', 'month'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(2,'dato','poblacion', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(2,'numero','poblacion', 'week'); ?></td>
	</tr>
	<tr>
		<td>Ubicaciones últimos 7 días: </td><td><?php echo $this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'week' ); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(3,'dato','cp'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(3,'numero','cp'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(3,'dato','cp', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(3,'numero','cp', 'month'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(3,'dato','cp', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(3,'numero','cp', 'week'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(3,'dato','poblacion'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(3,'numero','poblacion'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(3,'dato','poblacion', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(3,'numero','poblacion', 'month'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(3,'dato','poblacion', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(3,'numero','poblacion', 'week'); ?></td>
	</tr>
	<tr>
		<td>Ubicaciones hoy (24h): </td><td><?php echo $this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'day' ); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(4,'dato','cp'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(4,'numero','cp'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(4,'dato','cp', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(4,'numero','cp', 'month'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(4,'dato','cp', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(4,'numero','cp', 'week'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(4,'dato','poblacion'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(4,'numero','poblacion'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(4,'dato','poblacion', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(4,'numero','poblacion', 'month'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(4,'dato','poblacion', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(4,'numero','poblacion', 'week'); ?></td>
	</tr>
	<tr>
		<td></td><td></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(5,'dato','cp'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(5,'numero','cp'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(5,'dato','cp', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(5,'numero','cp', 'month'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(5,'dato','cp', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(5,'numero','cp', 'week'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(5,'dato','poblacion'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(5,'numero','poblacion'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(5,'dato','poblacion', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(5,'numero','poblacion', 'month'); ?></td>
		<td></td><td><?php echo $this->wpfunos_stats_CP(5,'dato','poblacion', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(5,'numero','poblacion', 'week'); ?></td>
	</tr>
</table>
