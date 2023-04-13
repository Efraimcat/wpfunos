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
<p><strong>Comparador</strong></p>
<ul>
  <li><strong><a href="/wp-admin/edit.php?post_type=usuarios_wpfunos">Usuarios</a></strong>: Entradas de usuarios que han dejado sus datos en el comparador de precios.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=servicios_wpfunos">Funerarias</a></strong>: Definición de las funerarias del comparador de precios.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=aseguradoras_wpfunos">Aseguradoras</a></strong>: Definición de las aseguradoras del comparador de seguros.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=tipos_seguro_wpfunos">Tipos de seguro</a></strong>: Definición de los diferentes tipos de seguros.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=cpostales_wpfunos">Códigos postales</a></strong>: Definción de los diferentes códigos postales de España.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=provincias_wpfunos">Provincias</a></strong>: Definción de las diferentes provincias de España.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=prov_zona_wpfunos">Precio medio OCU</a></strong>: Precio medio OCU por provincia.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=excep_prov_wpfunos">Excepción provincias</a></strong>: Excepciones de localización y distancia de CP.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=dist_local_wpfunos">Distancia localidades</a></strong>: Distancia no estandard para localidades.</li>
</ul>
<hr />
<p><strong>Landings población</strong></p>
<ul>
  <li><strong><a href="/wp-admin/edit.php?post_type=precio_funer_wpfunos">Precios población funeraria</a></strong>: Entradas de poblaciones con landings genéricas.</li>
  <li><strong><a href="/wp-admin/edit-tags.php?taxonomy=landing_funeraria&post_type=precio_funer_wpfunos">Categorias landings</a></strong>: Categorias de landings de funerarias.</li>
  <li><strong><a href="/wp-admin/admin.php?page=wpfunos-settingspreciospoblacion">Configuración precios población</a></strong>: Parámetros de landings de funerarias.</li>
</ul>
<hr/>
<p><strong>Directorio</strong></p>
<ul>
  <li><strong><a href="/wp-admin/edit.php?post_type=directorio_entrada">Tanatorios</a></strong>: Entradas de tanatorios del directorio.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=directorio_funeraria">Funerarias</a></strong>: Entradas de funerarias del directorio.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=directorio_servicio">Servicios</a></strong>: Definición de los diferentes servicios de las entradas del directorio.</li>
  <li><strong><a href="/wp-admin/admin.php?page=wpfunos-defunciones">Defunciones</a></strong>: Listado de las defunciones recogidas de otras webs.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=directorio_shortcode">Shortcodes</a></strong>: Definición de los diferentes shortcodes de plantillas de las entradas del directorio</li>
  <li><strong><a href="/wp-admin/edit-tags.php?taxonomy=directorio_poblacion&post_type=directorio_entrada">Categorias tanatorios</a></strong>: Categorias de las entradas de tanatorios.</li>
  <li><strong><a href="/wp-admin/edit-tags.php?taxonomy=funeraria_poblacion&post_type=directorio_funeraria">Categorias funerarias</a></strong>: Categorias de las entradas de funerarias.</li>
  <li><strong><a href="/wp-admin/admin.php?page=wpfunos-import-export-directorio">Import-Export</a></strong>: Funciones de import-export del directorio.</li>
</ul>
<hr/>
<p><strong>Configuración</strong></p>
<ul>
  <li><strong><a href="/wp-admin/admin.php?page=wpfunos-settings">Configuración servicios</a></strong>: Parámetros de la página de búsqueda de servicios.</li>
  <li><strong><a href="/wp-admin/admin.php?page=wpfunos-aseguradoras">Configuración aseguradoras</a></strong>: Paŕámetros de la búsqueda de seguros.</li>
  <li><strong><a href="/wp-admin/admin.php?page=wpfunos-mail">Configuración correo</a></strong>: Definición de direcciones de envio, asunto y cuerpo entre otros de los correo que envia Funos.</li>
  <li><strong><a href="/wp-admin/admin.php?page=wpfunos-APIPreventiva">Configuración API Preventiva</a></strong>: Paŕámetros de la conexión a los WebServices de Preventiva.</li>
  <li><strong><a href="/wp-admin/admin.php?page=wpfunos-APIDKV">Configuración DKV</a></strong>: Paŕámetros de la conexión a los WebServices de DKV.</li>
  <li><strong><a href="/wp-admin/admin.php?page=wpfunos-direccionesIP">Configuración Direcciones IP</a></strong>: Definición de direcciones excluidas de ciertas funcionalidades.</li>
  <li><strong><a href="/wp-admin/admin.php?page=wpfunos-logs">Logs</a></strong>: Consulta de los ficheros de log de la aplicación.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=conf_img_wpfunos">Imagenes wpfunos</a></strong>: Imagenes utilizadas por algunas funcionalidades.</li>
  <li><strong><a href="/wp-admin/edit.php?post_type=precio_serv_wpfunos">Precios servicios</a></strong>: Indice de precios de funerarias.</li>
</ul>
<hr />
