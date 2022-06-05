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
  <h2 id="wpfunos-inicio"><?php esc_html_e( get_admin_page_title() .' '.$this->version); ?></h2>
  <h2><?php esc_html_e( 'Correo WpFunos', 'wpfunos' ); ?></h2>
  <li><a href="#wpfunos-llamen-admin">Correo al administrador Botón "Quiero que me llamen"</a></li>
  <li><a href="#wpfunos-llamar-admin">Correo al administrador Botón "Llamar"</a></li>
  <li><a href="#wpfunos-llamen-servicio">Correo Lead al Servicio. Botón "Que me llamen"</a></li>
  <li><a href="#wpfunos-llamen-aseguradora">Correo Lead a la aseguradora. Botón "Que me llamen"</a></li>
  <li><a href="#wpfunos-llamar-servicio">Correo Lead al Servicio. Botón "Llamar"</a></li>
  <li><a href="#wpfunos-llamar-aseguradora">Correo Lead a la Aseguradora. Botón "Llamar"</a></li>
  <li><a href="#wpfunos-datos-entrados">Correo Datos Usuario Entrados</a></li>
  <li><a href="#wpfunos-datos-entrados-aseguradora">Correo Datos Usuario Entrados Aseguradora</a></li>
  <li><a href="#wpfunos-popup-detalles">Correo Popup Detalles</a></li>
  <li><a href="#wpfunos-popup-detalles-aseguradora">Correo Popup Detalles Aseguradora</a></li>
  <li><a href="#wpfunos-lead-colaboradores">Correo Envio Lead Colaboradores</a></li>
  <li><a href="#wpfunos-pedir-presupuesto">Correo Pedir presupuesto Servicios</a></li>
  <li><a href="#wpfunos-pedir-presupuesto-aseguradora">Correo Pedir presupuesto Aseguradora</a></li>
  <li><a href="#wpfunos-api-preventiva">Correo Aviso Envio API Preventiva</a></li>
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
