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
<style>
.wpfunos-correos-admin h2 {
	font-size: 24px;
	background-color: greenyellow;
	font-weight: 700;
}
</style>
<div class="wrap">
  <div id="icon-themes" class="icon32"></div>
  <h2><?php esc_html_e( get_admin_page_title() .' '.$this->version); ?></h2>
  <h2><?php esc_html_e( 'Correo WpFunos', 'wpfunos' ); ?></h2>
  <hr/>
  <?php settings_errors(); ?>
  <div class="wpfunos-correos-admin">
    <form method="POST" action="options.php">
      <?php
      settings_fields('wpfunos_mail_settings');
      do_settings_sections('wpfunos_mail_settings');
      ?>
      <hr />
      <?php submit_button(); ?>
    </form>
  </div>
</div>
