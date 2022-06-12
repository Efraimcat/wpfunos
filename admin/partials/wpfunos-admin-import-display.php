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
* @subpackage Wpfunos/admin/partials
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
?>
<div class="wrap">
  <h2><?php esc_html_e( get_admin_page_title() .' '.$this->version); ?></h2>
  <?php settings_errors(); ?>
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
  <?php //IMPORTAR CÓDIGOS PROVINCIAS ?>
  <hr/>
  <p>
    <?php esc_html_e( 'Importar provincias', 'wpfunos' ); ?>
    <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">
      [0] => ID [1] => Title [2] => Post Type [3] => [4] => [5] =>
    </h6>
  </p>
  <form action="" method="post">
    <input type="hidden" name="importprovincias" id="importprovincias" value="1" >
    <div class="wpfunos-provincias">
      <input type="submit" value="<?php _e( 'Importar provincias', 'wpfunos' ); ?>" style="background: #135e96;color: #fff;padding: 5px;font-weight: 700;margin-top: 10px;border-radius: 3px;">
    </div>
  </form>
  <?php //IMPORTAR PRECIO FUNERARIAS ?>
  <hr/>
  <p>
    <?php esc_html_e( 'Importar precio funerarias', 'wpfunos' ); ?>
    <h6 style="font-style: italic;font-weight: 400;font-size: 12px;">
      [0] => ID [1] => Title [2] => Post Type [3] => [4] => [5] =>
    </h6>
  </p>
  <form action="" method="post">
    <input type="hidden" name="importpreciofuner" id="importpreciofuner" value="1" >
    <div class="wpfunos-precio-funer">
      <input type="submit" value="<?php _e( 'Importar precio funerarias', 'wpfunos' ); ?>" style="background: #135e96;color: #fff;padding: 5px;font-weight: 700;margin-top: 10px;border-radius: 3px;">
    </div>
  </form>
  <?php //IMPORTAR NUEVOS PRECIOS SERVICIOS ?>
  <hr/>
  <p>
    <?php esc_html_e( 'Importar Nuevos Precios Servicios', 'wpfunos' ); ?>
  </p>
  <form action="" method="post">
    <input type="hidden" name="importprecioservicios" id="importprecioservicios" value="1" >
    <div class="wpfunos-precio-funer">
      <input type="submit" value="<?php _e( 'Importar precio servicios', 'wpfunos' ); ?>" style="background: #135e96;color: #fff;padding: 5px;font-weight: 700;margin-top: 10px;border-radius: 3px;">
    </div>
  </form>
  <hr/>
  <?php do_action('wpfunos_import'); ?>
</div>
