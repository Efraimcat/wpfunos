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
  <tr><th colspan="2"><h2>Códigos postales</h2></th></tr>
  <tr><td>Total: </td><td><?php echo apply_filters( 'wpfunos_estadisticas_date', 'cpostales_wpfunos', 'all' ); ?></td></tr>
</table>
<hr/>
<hr/>
<?php //IMPORTAR ENTRADAS DIRECTORIO ?>
<h3><?php esc_html_e( 'Importación WpFunos', 'wpfunos' )?></h3>
<hr/>
<p>
  <?php esc_html_e( 'Importar actualización del Directorio', 'wpfunos' ); ?>
  <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">
    [0] => ID [1] => Title [2] => wpfunos_tanatorioDirectorioNombre [3] => wpfunos_tanatorioDirectorioDireccion [4] => wpfunos_tanatorioDirectorioTelefono [5] => wpfunos_tanatorioDirectorioCorreo [6] => wpfunos_tanatorioDirectorioPoblacion [7] => wpfunos_tanatorioDirectorioProvincia [8] => wpfunos_tanatorioDirectorioNotas [9] => wpfunos_tanatorioDirectorioFuneraria [10] => Slug [11] => Tanatorio [12] => Funeraria [13] => Marca funeraria [14] => Content
  </h6>
</p>
<form action="" method="post">
  <input type="hidden" name="importdirectorio" id="importdirectorio" value="1" >
  <div class="wpfunos-importdirectorio">
    <input type="submit" value="<?php _e( 'Importar directorio', 'wpfunos' ); ?>" style="background: #135e96;color: #fff;padding: 5px;font-weight: 700;margin-top: 10px;border-radius: 3px;">
  </div>
</form>
<?php //IMPORTAR CÓDIGOS POSTALES ?>
<hr/>
<p>
  <?php esc_html_e( 'Importar actualización códigos postales', 'wpfunos' ); ?>
  <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">
    [0] => ID [1] => Title [2] => Post Type [3] => wpfunos_cpostalesPoblacion [4] => wpfunos_cpostalesCodigo [5] => Status
  </h6>
</p>
<form action="" method="post">
  <input type="hidden" name="importcodigospostales" id="importcodigospostales" value="1" >
  <div class="wpfunos-codigospostales">
    <input type="submit" value="<?php _e( 'Importar códigos postales', 'wpfunos' ); ?>" style="background: #135e96;color: #fff;padding: 5px;font-weight: 700;margin-top: 10px;border-radius: 3px;">
  </div>
</form>
<hr/>
<?php do_action('wpfunos_import'); ?>
<hr/>
<div id="wpfunos-intro">
  <p><?php esc_html_e( 'WpFunos.', 'wpfunos' ); ?></p>
  <p>
    <?php esc_html_e( 'La configuración es una parte importante del funcionamiento correcto y debe recibir la atención necesaria. Puedes encontrar toda la ayuda necesaria en', 'wpfunos' ); ?>
    <a href="mailto:hola@funos.es">hola@funos.es</a>
  </p>
</div>
