<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage Wpfunos/public/partials
 */
?>
<div class="elementor-container elementor-column-gap-default">
	<div class="elementor-row">
		<div class="elementor-column-wrap">
			<div class="elementor-widget-wrap">
				<div class="wpfunos-botones-resultados" style=" margin-right: 10px; ">
					<div class="wpfunos-boton-llamada" style=" margin-right: 10px; ">
						<form id="wpfunos-servicios-sinconfirmar-boton-detalles" target="POPUPW" action="<?php echo get_option('wpfunos_paginaDetalles'); ?>" method="get" onsubmit="POPUPW = window.open('about:blank', 'POPUPW', 'width=600, height=400, top=400, left=600');">
							<input type="hidden" name="accion" id="accion" value="1" >
							<input type="hidden" name="telefono" id="telefono" value="<?php echo $_GET['telefonoUsuario']?>" >
							<?php 
								require $this->plugin_name . '-servicios-formulario-campos-display.php'; 
							?>
							<input class="wpfunos-boton-detalles" type="submit" value="Ver detalles" style="background-color: #1d40d3; font-size: 14px;">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php