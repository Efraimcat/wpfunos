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
	<h3><?php esc_html_e( 'Configuración WpFunos', 'wpfunos' )?></h3>
	<img
		src="<?php esc_html_e( plugin_dir_url( __DIR__ ) . 'img/' ); ?>funos-logo-450x450.png"
		alt="nic-app" width="350" height="350">
	<hr />
	<p><strong>Bases de datos de funos.es</strong></p>
	<ul>
		<li><strong><a href="/wp-admin/edit.php?post_type=usuarios_wpfunos">Usuarios</a></strong>:Entradas de usuarios que han dejado sus datos en el comparador de precios.</li>
		<li><strong><a href="/wp-admin/edit.php?post_type=servicios_wpfunos">Servicios</a></strong>:Definición de los servicios del comparador de precios.</li>
		<li><strong><a href="/wp-admin/edit.php?post_type=aseguradoras_wpfunos">Aseguradoras</a></strong>:Definición de las aseguradoras del comparador de seguros.</li>
		<li><strong><a href="/wp-admin/edit.php?post_type=tipos_seguro_wpfunos">Tipos de seguro</a></strong>:Definición de los diferentes tipos de seguros.</li>
		<li><strong><a href="/wp-admin/edit.php?post_type=ubicaciones_wpfunos">Ubicaciones</a></strong>:Entradas de ubicaciones que han usado los usuarios en el comparador de precios.</li>
		<li><strong><a href="/wp-admin/edit.php?post_type=cpostales_wpfunos">Códigos postales</a></strong>:Definción de los diferentes códigos postales de España.</li>
		<li><strong><a href="/wp-admin/edit.php?post_type=funerarias_wpfunos">Funerarias</a></strong>:Definición de funerarias.</li>
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
