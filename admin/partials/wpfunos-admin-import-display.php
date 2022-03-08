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
 * @subpackage Wpfunos/admin/partials
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
	<?php do_action('wpfunos_import'); ?>
</div>