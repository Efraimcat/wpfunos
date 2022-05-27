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
<hr/>
<table style="width:125px;">
  <tr><th colspan="2"><h2>Servicios</h2></th></tr>
  <tr><td>Total: </td><td><?php echo apply_filters( 'wpfunos_estadisticas_date', 'servicios_wpfunos', 'all' ); ?></td></tr>
</table>
<hr/>
<table style="width:125px;">
  <tr><th colspan="2"><h2>Precios</h2></th></tr>
  <tr><td>Total: </td><td><?php echo apply_filters( 'wpfunos_estadisticas_date', 'precio_funer_wpfunos', 'all' ); ?></td></tr>
</table>
<hr/>
<table style="width:125px;">
  <tr><th colspan="2"><h2>Códigos postales</h2></th></tr>
  <tr><td>Total: </td><td><?php echo apply_filters( 'wpfunos_estadisticas_date', 'cpostales_wpfunos', 'all' ); ?></td></tr>
</table>
<hr/>
<hr/>
<div id="wpfunos-intro">
  <p><?php esc_html_e( 'WpFunos.', 'wpfunos' ); ?></p>
  <p>
    <?php esc_html_e( 'La configuración es una parte importante del funcionamiento correcto y debe recibir la atención necesaria. Puedes encontrar toda la ayuda necesaria en', 'wpfunos' ); ?>
    <a href="mailto:hola@funos.es">hola@funos.es</a>
  </p>
</div>
