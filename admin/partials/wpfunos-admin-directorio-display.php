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
		<li><strong><a href="/wp-admin/edit.php?post_type=tanatorio_d_wpfunos">Tanatorios Directorio</a></strong>: Definición de los Tanatorios/Funerarias/Marcas del directorio.</li>
		<li><strong><a href="/wp-admin/edit-tags.php?taxonomy=poblacion_tanatorio&post_type=tanatorio_d_wpfunos">Categorias Tanatorio</a></strong>: Definición de las categorias de Tanatorios.</li>
		<li><strong><a href="/wp-admin/edit-tags.php?taxonomy=poblacion_funeraria&post_type=tanatorios_d_wpfunos">Categorias Funeraria</a></strong>: Definición de las categorias de Funerarias.</li>
		<li><strong><a href="/wp-admin/edit-tags.php?taxonomy=marca_funeraria&post_type=tanatorios_d_wpfunos">Categorias Marca Funeraria</a></strong>: Definición de las categorias de Marcas de Funerarias.</li>
		<li><strong><a href="/wp-admin/admin.php?page=wpfunos-settingsdirectorio">Configuración del directorio</a></strong>: Definición de los parámetrso del directorio.</li>
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