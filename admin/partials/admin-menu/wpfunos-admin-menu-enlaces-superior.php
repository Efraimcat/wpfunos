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
* @subpackage Wpfunos/admin/partials/admin-menu
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
?>
<ul>
  <li><strong><a href="/wp-admin/edit.php?post_type=usuarios_wpfunos">Usuarios</a></strong>:Entradas de usuarios que han dejado sus datos en el comparador de precios.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=servicios_wpfunos">Servicios</a></strong>:Definición de los servicios del comparador de precios.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=aseguradoras_wpfunos">Aseguradoras</a></strong>:Definición de las aseguradoras del comparador de seguros.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=tipos_seguro_wpfunos">Tipos de seguro</a></strong>:Definición de los diferentes tipos de seguros.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=cpostales_wpfunos">Códigos postales</a></strong>:Definción de los diferentes códigos postales de España.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=provincias_wpfunos">Provincias</a></strong>:Definción de las diferentes provincias de España.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=funerarias_wpfunos">Funerarias</a></strong>:Definición de funerarias.</li>
</ul>
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
