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
	<h3><?php esc_html_e( 'WpFunos', 'wpfunos' )?></h3>
	<table style="width:100%">
		<tr>
			<td>
				<div class="w3-bar w3-black" style="position: relative;top:-300px">
  					<button class="w3-bar-item w3-button" onclick="openTab('Numeros')">Números</button>
  					<button class="w3-bar-item w3-button" onclick="openTab('Graficas')">Gráficas</button>
  					<button class="w3-bar-item w3-button" onclick="openTab('Enlaces')">Enlaces</button>
				</div>
				<div id="Numeros" class="w3-container wpftab" style="top: -300px;position: relative;" >
  					<p></p><h2>Números</h2>
					<div style="margin-top: 10px;margin-bottom: 10px;"><?php echo date_i18n( 'd F Y H:i:s', current_time( 'timestamp', 0 ) );?></div>
					<table>
						<tr>
							<th colspan="2" style="width:225px;"><h2>Usuarios que han enviado ubicación</h2></th>
							<th style="width:25px;"></th><th colspan="2" style="width:65px;"><h2>CP total</h2></th>
							<th style="width:25px;"></th><th colspan="2" style="width:65px;"><h2>CP mes</h2></th>
							<th style="width:25px;"></th><th colspan="2" style="width:65px;"><h2>CP sem.</h2></th>
							<th style="width:25px;"></th><th colspan="2" style="width:115px;"><h2>Población total</h2></th>
							<th style="width:25px;"></th><th colspan="2" style="width:115px;"><h2>Población mes</h2></th>
							<th style="width:25px;"></th><th colspan="2" style="width:115px;"><h2>Población semana</h2></th>
						</tr>
						<tr>
							<td>Ubicaciones total: </td><td><?php echo $this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'all' ); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(1,'dato','cp'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(1,'numero','cp'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(1,'dato','cp', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(1,'numero','cp', 'month'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(1,'dato','cp', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(1,'numero','cp', 'week'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(1,'dato','poblacion'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(1,'numero','poblacion'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(1,'dato','poblacion', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(1,'numero','poblacion', 'month'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(1,'dato','poblacion', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(1,'numero','poblacion', 'week'); ?></td>
						</tr>
						<tr>
							<td>Ubicaciones últimos 30 días: </td><td><?php echo $this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'month' ); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(2,'dato','cp'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(2,'numero','cp'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(2,'dato','cp', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(2,'numero','cp', 'month'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(2,'dato','cp', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(2,'numero','cp', 'week'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(2,'dato','poblacion'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(2,'numero','poblacion'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(2,'dato','poblacion', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(2,'numero','poblacion', 'month'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(2,'dato','poblacion', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(2,'numero','poblacion', 'week'); ?></td>
						</tr>
						<tr>
							<td>Ubicaciones últimos 7 días: </td><td><?php echo $this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'week' ); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(3,'dato','cp'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(3,'numero','cp'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(3,'dato','cp', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(3,'numero','cp', 'month'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(3,'dato','cp', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(3,'numero','cp', 'week'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(3,'dato','poblacion'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(3,'numero','poblacion'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(3,'dato','poblacion', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(3,'numero','poblacion', 'month'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(3,'dato','poblacion', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(3,'numero','poblacion', 'week'); ?></td>
						</tr>
						<tr>
							<td>Ubicaciones hoy (24h): </td><td><?php echo $this->wpfunos_stats_date( 'ubicaciones_wpfunos', 'day' ); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(4,'dato','cp'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(4,'numero','cp'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(4,'dato','cp', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(4,'numero','cp', 'month'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(4,'dato','cp', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(4,'numero','cp', 'week'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(4,'dato','poblacion'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(4,'numero','poblacion'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(4,'dato','poblacion', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(4,'numero','poblacion', 'month'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(4,'dato','poblacion', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(4,'numero','poblacion', 'week'); ?></td>
						</tr>
						<tr>
							<td></td><td></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(5,'dato','cp'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(5,'numero','cp'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(5,'dato','cp', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(5,'numero','cp', 'month'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(5,'dato','cp', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(5,'numero','cp', 'week'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(5,'dato','poblacion'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(5,'numero','poblacion'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(5,'dato','poblacion', 'month'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(5,'numero','poblacion', 'month'); ?></td>
							<td></td><td><?php echo $this->wpfunos_stats_CP(5,'dato','poblacion', 'week'); ?></td><td style="text-align: right;"><?php echo $this->wpfunos_stats_CP(5,'numero','poblacion', 'week'); ?></td>
						</tr>
					</table>	
					<hr/>
					<table>
						<tr>
							<th colspan="2" style="width:225px;"><h2>Usuarios que han enviado datos</h2></th>
							<th style="width:25px;"></th><th colspan="2" style="width:125px;"><h2>Servicio</h2></th>
							<th style="width:25px;"></th><th colspan="2" style="width:150px;"><h2>Ataúd</h2></th>
							<th style="width:25px;"></th><th colspan="2" style="width:150px;"><h2>Velatorio</h2></th>
							<th style="width:25px;"></th><th colspan="2" style="width:150px;"><h2>Despedida</h2></th>
						</tr>
						<tr>
							<td>Usuarios total: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all' ); ?></td>
							<td></td><td>Incineración:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionServicio', 'Incineración' ) ?></td>
							<td></td><td>Ataúd Económico:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionAtaud', 'Ataúd Económico' ) ?></td>
							<td></td><td>Velatorio:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionVelatorio', 'Velatorio' ) ?></td>
							<td></td><td>Sin ceremonia:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionDespedida', 'Sin ceremonia' ) ?></td>
						</tr>
						<tr>
							<td>Usuarios últimos 30 dias: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'month' ); ?></td>
							<td></td><td>Entierro:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionServicio', 'Entierro' ) ?></td>
							<td></td><td>Ataúd Medio:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionAtaud', 'Ataúd Medio' ) ?></td>
							<td></td><td>Sin Velatorio:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionVelatorio', 'Sin Velatorio' ) ?></td>
							<td></td><td>Solo sala:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionDespedida', 'Solo sala' ) ?></td>
						</tr>
						<tr>
							<td>Usuarios últimos 7 dias: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'week' ); ?></td>
							<td></td><td></td><td></td>
							<td></td><td>Ataúd Premium:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionAtaud', 'Ataúd Premium' ) ?></td>
							<td></td><td></td><td></td>
							<td></td><td>Ceremonia civil:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionDespedida', 'Ceremonia civil' ) ?></td>
						</tr>
						<tr>
							<td>Usuarios hoy: </td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'day' ); ?></td>
							<td></td><td></td><td></td>
							<td></td><td></td><td></td>
							<td></td><td></td><td></td>
							<td></td><td>Ceremonia religiosa:</td><td style="text-align: right;"><?php echo $this->wpfunos_stats_date( 'usuarios_wpfunos', 'all', 'publish', 'wpfunos_userNombreSeleccionDespedida', 'Ceremonia religiosa' ) ?></td>
						</tr>
					</table>
					<hr/>
					<table style="width:125px;"> 
						<tr><th colspan="2"><h2>Servicios</h2></th></tr>
						<tr><td>Total: </td><td><?php echo $this->wpfunos_stats_date( 'servicios_wpfunos', 'all' ); ?></td></tr>
					</table>
					<hr/>
					<table style="width:125px;">
						<tr><th colspan="2"><h2>Códigos postales</h2></th></tr>
						<tr><td>Total: </td><td><?php echo $this->wpfunos_stats_date( 'cpostales_wpfunos', 'all' ); ?></td></tr>
					</table>
					<hr/>
					
					
					
					
					
					
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
				<div id="Graficas" class="w3-container wpftab" style="display:none; top: -300px;position: relative;">
  					<h2>Gráficas</h2>
					
					
				</div>
				<div id="Enlaces" class="w3-container wpftab" style="display:none; top: -300px;position: relative;">
  					<h2>Enlaces</h2>
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
				</div>
				<script>
					function openTab(tabName) {
  						var i;
	  					var x = document.getElementsByClassName("wpftab");
  						for (i = 0; i < x.length; i++) {
    						x[i].style.display = "none";  
  						}
  						document.getElementById(tabName).style.display = "block";  
					}
				</script>
			</td>
			<td style="width:350px" >
				<img src="<?php esc_html_e( plugin_dir_url( __DIR__ ) . 'img/' ); ?>funos-logo-450x450.png" alt="nic-app" width="350" height="350">		
			</td>
		</tr>
	</table>
	<hr />
</div>
