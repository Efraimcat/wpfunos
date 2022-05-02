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
            <form id="wpfunos-servicios-confirmado-boton-presupuesto" target="POPUPW" action="<?php echo get_option('wpfunos_paginaPresupuesto'); ?>" method="get" onsubmit="POPUPW = window.open('about:blank', 'POPUPW', 'width=800, height=500, top=400, left=500');">
              <?php require $this->plugin_name . '-servicios-formulario-campos-display.php'; ?>
              <input type="submit" value="Pedir presupuesto" style="background-color: #1d40d3; font-size: 14px;width: 100%; margin-top: 10px;">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
