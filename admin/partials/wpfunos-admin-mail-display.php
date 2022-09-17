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

  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button" onclick="openTab('V3')">Comparador nuevo</button>
    <button class="w3-bar-item w3-button" onclick="openTab('Aseguradoras')">Comparador aseguradoras</button>
    <button class="w3-bar-item w3-button" onclick="openTab('V1')">Comparador antiguo</button>
  </div>
  <div id="V3" class="w3-container wpftab" >
    <h6 style="font-weight: 600;font-size: 18px;">Comparador nuevo</h6>
    <li><a href="#wpfunos-entrada-admin-v2">Correo al administrador nuevos datos usuario</a></li>
    <li><a href="#wpfunos-llamen-admin-v2">Correo funeraria botón "Te llamamos"</a></li>
    <li><a href="#wpfunos-llamar-admin-v2">Correo funeraria botón "Llamar"</a></li>
    <li><a href="#wpfunos-presupuesto-lead-v2">Correo funeraria botón "pedir presupuesto"</a></li>
    <li><a href="#wpfunos-popup-detalles-v2">Correo usuario botón "copia detalles"</a></li>
    <hr />
    <div class="wpfunos-correos-admin">
      <form method="POST" action="options.php">
        <?php
        settings_fields('wpfunos_mail_settings_v3');
        do_settings_sections('wpfunos_mail_settings_v3');
        ?>
        <hr />
        <?php submit_button(); ?>
      </form>
    </div>
  </div>
  <div id="Aseguradoras" class="w3-container wpftab" style="display: none;">
    <h6 style="font-weight: 600;font-size: 18px;">Comparador aseguradoras</h6>
    <li><a href="#wpfunos-datos-entrados-aseguradora">Correo Datos Usuario Entrados Aseguradora</a></li>
    <li><a href="#wpfunos-api-preventiva">Correo Aviso Envio API Aseguradora</a></li>
    <hr />
    <div class="wpfunos-correos-admin">
      <form method="POST" action="options.php">
        <?php
        settings_fields('wpfunos_mail_settings_aseguradoras');
        do_settings_sections('wpfunos_mail_settings_aseguradoras');
        ?>
        <hr />
        <?php submit_button(); ?>
      </form>
    </div>
  </div>
  <div id="V1" class="w3-container wpftab" style="display: none;" >
    <h6 style="font-weight: 600;font-size: 18px;">Comparador antiguo</h6>
    <li><a href="#wpfunos-entrada-datos">Correo al usuario entrada datos</a></li>
    <li><a href="#wpfunos-envio-contacto">Correo al usuario envio contacto</a></li>
    <li><a href="#wpfunos-llamen-admin">Correo al administrador Botón "Quiero que me llamen"</a></li>
    <li><a href="#wpfunos-llamar-admin">Correo al administrador Botón "Llamar"</a></li>
    <li><a href="#wpfunos-llamen-servicio">Correo Lead al Servicio. Botón "Que me llamen"</a></li>
    <li><a href="#wpfunos-llamar-servicio">Correo Lead al Servicio. Botón "Llamar"</a></li>
    <li><a href="#wpfunos-datos-entrados">Correo Datos Usuario Entrados</a></li>
    <li><a href="#wpfunos-popup-detalles">Correo Popup Detalles</a></li>
    <li><a href="#wpfunos-lead-colaboradores">Correo Envio Lead Colaboradores</a></li>
    <li><a href="#wpfunos-pedir-presupuesto">Correo Pedir presupuesto Servicios</a></li>
    <hr />
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
  <script>
  function openTab(tabName) {
    var i;
    var x = document.getElementsByClassName("wpftab");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "block";
  }
</script>

<?php settings_errors(); ?>
<div class="wpfunos-correos-admin">
  <form method="POST" action="options.php">
    <?php
    //settings_fields('wpfunos_mail_settings');
    //do_settings_sections('wpfunos_mail_settings');
    ?>
    <hr />
    <?php //submit_button(); ?>
  </form>
</div>
</div>
