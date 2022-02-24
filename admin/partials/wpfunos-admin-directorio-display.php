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
	<h3><?php esc_html_e( 'Directorios WpFunos', 'wpfunos' )?></h3>
	<img
		src="<?php esc_html_e( plugin_dir_url( __DIR__ ) . 'img/' ); ?>funos-logo-450x450.png"
		alt="nic-app" width="350" height="350">
	<hr />
	<p><strong>Directorio</strong></p>
		<ul>
			<li>Configuración parámetros directorio</li>
		</ul>
		<hr/>
	<div id="wpfunos-intro">
		<p><?php esc_html_e( 'WpFunos.', 'wpfunos' ); ?></p>
		<p>
			<?php esc_html_e( 'La configuración es una parte importante del funcionamiento correcto y debe recibir la atención necesaria. Puedes encontrar toda la ayuda necesaria en', 'wpfunos' ); ?>
			<a href="mailto:hola@funos.es">hola@funos.es</a>
		</p>
	</div>
	<hr />
</div>