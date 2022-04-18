<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Servicios.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/servicios/partials
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
$onsubmit = 'return false;';
$action = '#';
if( get_option($this->plugin_name . '_activarCorreoPopupDetalles')) $onsubmit = "POPUPW = window.open('about:blank', 'POPUPW', 'width=800, height=500, top=400, left=500');";
if( get_option($this->plugin_name . '_activarCorreoPopupDetalles')) $action = get_option('wpfunos_paginaEmail')
?>
<div class="elementor-container elementor-column-gap-default">
  <div class="elementor-row">
    <div class="elementor-column-wrap">
      <div class="elementor-widget-wrap">
        <div class="wpfunos-botones-resultados" style=" margin-right: 10px; ">
          <div class="wpfunos-boton-correo" style=" margin-right: 10px; ">
            <form id="wpfunos-servicios-confirmado-boton-email" target="POPUPW" action="<?php echo $action; ?>" method="get" onsubmit="<?php echo $onsubmit; ?>">
              <input type="hidden" name="accion" id="accion" value="1" >
              <input type="hidden" name="telefono" id="telefono" value="<?php echo $_GET['telefonoUsuario']?>" >
              <?php require $this->plugin_name . '-servicios-detalles-formulario-campos-display.php'; ?>
              <input type="submit" value="Enviar detalles por correo" style="background-color: #1d40d3; font-size: 14px;">
            </form>
          </div>
          <div class="wpfunos-boton-llamar">
            <form id="wpfunos-servicios-email" action="javascript:window.print()">
              <input type="hidden" name="accion" id="accion" value="1" >
              <input type="hidden" name="telefono" id="telefono" value="<?php echo $_GET['telefonoUsuario']?>" >
              <?php require $this->plugin_name . '-servicios-detalles-formulario-campos-display.php'; ?>
              <input type="submit" value="Imprimir información" style="background-color: #1d40d3; font-size: 14px;">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
