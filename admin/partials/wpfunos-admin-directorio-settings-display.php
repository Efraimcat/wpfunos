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
  <div id="icon-themes" class="icon32"></div>
  <h2><?php esc_html_e( get_admin_page_title() .' '.$this->version); ?></h2>
  <h2><?php esc_html_e( 'Ajustes Directorio WpFunos', 'wpfunos' ); ?></h2>
  <hr/>
  <?php settings_errors(); ?>
  <form method="POST" action="options.php">
    <?php
    settings_fields('wpfunos_directorio_settings');
    do_settings_sections('wpfunos_directorio_settings');
    ?>
    <hr />
    <?php submit_button(); ?>
  </form>
  <p>
    <?php esc_html_e( 'Actualizar ubicaciones gmw', 'wpfunos' ); ?>
  </p>
  <form action="" method="post">
    <input type="hidden" name="actualizargmw" id="actualizargmw" value="1" >
    <div class="wpfunos-actualizar-gmw">
      <input type="submit" value="<?php _e( 'Actualizar', 'wpfunos' ); ?>" style="background: #135e96;color: #fff;padding: 5px;font-weight: 700;margin-top: 10px;border-radius: 3px;">
    </div>
  </form>
  <?php $this->wpfunosActualizargmw(); ?>
</div>
