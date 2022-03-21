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
	<p><strong>Configuración</strong></p>
	<ul>
		<li><strong><a href="/wp-admin/admin.php?page=wpfunos-settings">Configuración servicios</a></strong>: Parámetros de la página de búsqueda de servicios.</li>
		<li><strong><a href="/wp-admin/admin.php?page=wpfunos-aseguradoras">Configuración aseguradoras</a></strong>: Paŕámetros de la búsqueda de seguros.</li>
		<li><strong><a href="/wp-admin/admin.php?page=wpfunos-mail">Configuración correo</a></strong>: Definición de direcciones de envio, asunto y cuerpo entre otros de los correo que envia Funos.</li>
		<li><strong><a href="/wp-admin/admin.php?page=wpfunos-APIPreventiva">Configuración API Preventiva</a></strong>: Paŕámetros de la conexión a los WebServices de Preventiva.</li>
		<li><strong><a href="/wp-admin/admin.php?page=wpfunos-direccionesIP">Configuración Direcciones IP</a></strong>: Definición de direcciones IP excluidas de ciertas funcionalidades.</li>
		<li><strong><a href="/wp-admin/admin.php?page=wpfunos-logs">Logs</a></strong>: Consulta de los ficheros de log de la aplicación.</li>
		<li><strong><a href="/wp-admin/edit.php?post_type=conf_img_wpfunos">Imagenes wpfunos</a></strong>: Imagenes utilizadas por algunas funcionalidades.</li>
	</ul>
	<hr/>
	<?php //IMPORTAR ENTRADAS DIRECTORIO ?>
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
	<?php //IMPORTAR CÓDIGOS POSTALES ?>
	<hr/>
	<p>
		<?php esc_html_e( 'Importar actualización códigos postales', 'wpfunos' ); ?>
		<h6 style="font-style: italic;font-weight: 400;font-size: 12px;">
			[0] => ID [1] => Title [2] => Post Type [3] => wpfunos_cpostalesPoblacion [4] => wpfunos_cpostalesCodigo [5] => Status
		</h6>
	</p>
	<form action="" method="post">
		<input type="hidden" name="importcodigospostales" id="importcodigospostales" value="1" >
		<div class="wpfunos-codigospostales">
			<input type="submit" value="<?php _e( 'Importar códigos postales', 'wpfunos' ); ?>" style="background: #135e96;color: #fff;padding: 5px;font-weight: 700;margin-top: 10px;border-radius: 3px;">
		</div>
	</form>
	<hr/>
	<?php do_action('wpfunos_import'); ?>
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
