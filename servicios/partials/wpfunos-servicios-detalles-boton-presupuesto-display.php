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
        <div class="servicios-popup-presupuesto">
          <h3>Comentarios</h3>
          <form id="wpfunos-servicios-colaborador-detalles-comentarios" method="GET">
            <textarea id="wpfunos-select-comentarios" name="wpfunos-select-comentarios" rows="10" cols="70"></textarea>
            <?php require $this->plugin_name . '-servicios-detalles-formulario-campos-display.php'; ?>
            <input type="submit" value="Pedir presupuesto" style="background-color: #1d40d3; font-size: 14px;">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
