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
<h3><?php esc_html_e( 'ENTRADAS', 'wpfunos' )?></h3>

<table>
	<tr>
		<th colspan="2" style="width:225px;"><h2>Usuarios que han entrado al comparador</h2></th>
	</tr>
	<tr>
		<td>Usuarios total: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'pag_serv_wpfunos', 'all' ); ?></td>
	</tr>
	<tr>
		<td>Usuarios últimos 30 dias: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'pag_serv_wpfunos', 'month' ); ?></td>
	</tr>
	<tr>
		<td>Usuarios últimos 7 dias: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'pag_serv_wpfunos', 'week' ); ?></td>
	</tr>
	<tr>
		<td>Usuarios ayer: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'pag_serv_wpfunos', 'ayer' ); ?></td>
	</tr>
	<tr>
		<td>Usuarios hoy: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'pag_serv_wpfunos', 'day' ); ?></td>
	</tr>
</table>