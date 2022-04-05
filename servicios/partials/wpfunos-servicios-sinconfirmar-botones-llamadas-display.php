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
?>
<div class="elementor-container elementor-column-gap-default">
  <div class="elementor-row">
    <div class="elementor-column-wrap">
      <div class="elementor-widget-wrap">
        <div class="wpfunos-botones-resultados" style=" margin-right: 10px; ">
          <div class="wpfunos-boton-llamada" style=" margin-right: 10px; ">
            <form id="wpfunos-servicios-sinconfirmar-boton-llamen" target="POPUPW" action="<?php echo get_option('wpfunos_paginaLlamen'); ?>" method="get" onsubmit="POPUPW = window.open('about:blank', 'POPUPW', 'width=800, height=500, top=400, left=500');">
              <input type="hidden" name="accion" id="accion" value="1" >
              <input type="hidden" name="telefono" id="telefono" value="<?php echo $_GET['telefonoUsuario']?>" >
              <?php require $this->plugin_name . '-servicios-formulario-campos-display.php'; ?>
              <input type="submit" value="Quiero que me llamen" style="background-color: #1d40d3; font-size: 14px;">
            </form>
          </div>
          <div class="wpfunos-boton-llamar">
            <form id="wpfunos-servicios-sinconfirmar-boton-llamar" target="POPUPW" action="<?php echo get_option('wpfunos_paginaLlamar'); ?>" method="get" onsubmit="POPUPW = window.open('about:blank', 'POPUPW', 'popup, width=800, height=500, top=400, left=500');">
              <input type="hidden" name="accion" id="accion" value="2" >
              <input type="hidden" name="telefono" id="telefono" value="<?php echo $_GET['telefonoEmpresa']?>" >
              <input type="hidden" name="wpfunos-hacer-llamada" id="wpfunos-hacer-llamada" value="1" >
              <?php require $this->plugin_name . '-servicios-formulario-campos-display.php'; ?>
              <input type="submit" value="Llamar" style="background-color: #1d40d3; font-size: 14px;">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
