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
?><div class="servicios_wpfunos_containers"><?php
?><ul class="servicios_wpfunos_data_metabox">

	<li class="servicios_wpfunos_list">
    	<table>
			<tr>
				<td><?php esc_html_e('Nombre', 'wpfunos');?></td>
				<td><?php esc_html_e('Población', 'wpfunos');?></td>
				<td><?php esc_html_e('Direccion', 'wpfunos');?></td>
			</tr>
			<tr>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
		       			'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioNombre','name' => $this->plugin_name . '_servicioNombre',
         				'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));
   					?>
				</td>
				<td>
					<?php
						$this->wpfunos_render_settings_field(array(
     					'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioPoblacion','name' => $this->plugin_name . '_servicioPoblacion',
      					'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));
					?>
				</td>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
     					'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDireccion','name' => $this->plugin_name . '_servicioDireccion',
      					'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID  ));
   					?>
				</td>
			</tr>
		</table>
	</li>

	<hr/>
	<li class="servicios_wpfunos_list">
		<table>
			<tr>
				<td><?php esc_html_e('Logo', 'wpfunos');?></td>	
				<td><?php esc_html_e('Email', 'wpfunos');?></td>	
				<td><?php esc_html_e('Teléfono', 'wpfunos');?></td>	
				<td><?php esc_html_e('Valoración', 'wpfunos');?></td>	
			</tr>
			<tr>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
     					'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioLogo','name' => $this->plugin_name . '_servicioLogo',
      					'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));
   					?>			
				</td>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
	     				'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioEmail','name' => $this->plugin_name . '_servicioEmail',
    	  				'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));
   					?>
				</td>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
						'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioTelefono','name' => $this->plugin_name . '_servicioTelefono',
    	  				'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20  ));
   					?>
				</td>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
     					'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioValoracion','name' => $this->plugin_name . '_servicioValoracion',
      					'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));
   					?>
				</td>
			</tr>
		</table>
	</li>		

	<hr/>
	<li class="servicios_wpfunos_list">
		<table>
			<tr>
				<td><?php esc_html_e('Nombre del pack', 'wpfunos');?></td>
				<td><?php esc_html_e('Texto precio', 'wpfunos');?></td>
				<td><?php esc_html_e('Descuento genérico', 'wpfunos');?></td>
			</tr>
			<tr>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
     					'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioPackNombre','name' => $this->plugin_name . '_servicioPackNombre',
      					'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20 ));
   					?>
				</td>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
     					'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioTextoPrecio','name' => $this->plugin_name . '_servicioTextoPrecio',
      					'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20 ));
   					?>
				</td>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
     					'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDescuentoGenerico','name' => $this->plugin_name . '_servicioDescuentoGenerico',
      					'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));
   					?>%
				</td>
			</tr>
		</table>
	</li>
	
	<hr/>
	<li class="servicios_wpfunos_list">
		<table style="width:100%">
			<tr>
				<td style="width:20%"><?php esc_html_e('Lead (entrada de datos)', 'wpfunos');?></td>
				<td style="width:20%"><?php esc_html_e('Lead (resultado busqueda)', 'wpfunos');?></td>
				<td style="width:20%"><?php esc_html_e('Precio confirmado', 'wpfunos');?></td>
				<td style="width:20%"><?php esc_html_e('Activo', 'wpfunos');?></td>
				<td style="width:20%"><?php esc_html_e('Botones llamar', 'wpfunos');?></td>
			</tr>
			<tr>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
     					'type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_servicioLead','name' => $this->plugin_name . '_servicioLead',
      					'required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));
   					?>
				</td>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
     					'type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_servicioLead2','name' => $this->plugin_name . '_servicioLead2',
      					'required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));
   					?>
				</td>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
     					'type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_servicioPrecioConfirmado','name' => $this->plugin_name . '_servicioPrecioConfirmado',
      					'required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7  ));
   					?>
				</td>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
     					'type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_servicioActivo','name' => $this->plugin_name . '_servicioActivo',
      					'required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));
   					?>
				</td>
				<td>
					<?php 
						$this->wpfunos_render_settings_field(array(
     					'type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_servicioBotonesLlamar','name' => $this->plugin_name . '_servicioBotonesLlamar',
      					'required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));
   					?>
				</td>
			</tr>
		</table>
	</li>		
	
	
 <hr/>
 <h3><?php esc_html_e('PRECIO BASE', 'wpfunos');?></h3>
 </li>
  <?php  //Precio base?>
  <li class="servicios_wpfunos_list">
    <table>
      <tr>
        <td></td><td>Precio</td><td>Descuento</td>
      </tr>
      <tr>
        <td>Precio Base</td>
        <td><?php $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioPrecioBase','name' => $this->plugin_name . '_servicioPrecioBase',
           'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
        ?>€</td>
        <td><?php $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioPrecioBaseDescuento','name' => $this->plugin_name . '_servicioPrecioBaseDescuento',
           'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
        ?>%</td>
      </tr>
    </table>
  </li>
 <hr/>
 <h3><?php esc_html_e('DESTINO', 'wpfunos');?></h3>
 <table style="width:100%">
   <tr>
     <td>Tipo</td><td>Nombre</td><td>Precio</td><td>Descuento</td><td>Precio prox.</td><td>Descuento</td>
   </tr>
   <tr>
     <td>Entierro</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_1Nombre','name' => $this->plugin_name . '_servicioDestino_1Nombre',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
     ?></td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_1Precio','name' => $this->plugin_name . '_servicioDestino_1Precio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_1Descuento','name' => $this->plugin_name . '_servicioDestino_1Descuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_1ProxPrecio','name' => $this->plugin_name . '_servicioDestino_1ProxPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_1ProxDescuento','name' => $this->plugin_name . '_servicioDestino_1ProxDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
   </tr>
   <tr>
     <td>Incineración</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_2Nombre','name' => $this->plugin_name . '_servicioDestino_2Nombre',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
     ?></td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_2Precio','name' => $this->plugin_name . '_servicioDestino_2Precio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_2Descuento','name' => $this->plugin_name . '_servicioDestino_2Descuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_2ProxPrecio','name' => $this->plugin_name . '_servicioDestino_2ProxPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_2ProxDescuento','name' => $this->plugin_name . '_servicioDestino_2ProxDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
   </tr>
   <tr>
     <td>Traslado</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_3Nombre','name' => $this->plugin_name . '_servicioDestino_3Nombre',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
     ?></td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_3Precio','name' => $this->plugin_name . '_servicioDestino_3Precio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_3Descuento','name' => $this->plugin_name . '_servicioDestino_3Descuento',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_3ProxPrecio','name' => $this->plugin_name . '_servicioDestino_3ProxPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDestino_3ProxDescuento','name' => $this->plugin_name . '_servicioDestino_3ProxDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
   </tr>
 </table>
 <hr/>
 <h3><?php esc_html_e('ATAÚD', 'wpfunos');?></h3>
 <table style="width:100%">
   <tr>
     <td>Tipo</td><td>Nombre</td><td>Precio</td><td>Descuento</td><td>Precio prox.</td><td>Descuento</td>
   </tr>
   <tr>
     <td>Económico</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_1Nombre','name' => $this->plugin_name . '_servicioAtaud_1Nombre',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
     ?></td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_1Precio','name' => $this->plugin_name . '_servicioAtaud_1Precio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_1Descuento','name' => $this->plugin_name . '_servicioAtaud_1Descuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_1ProxPrecio','name' => $this->plugin_name . '_servicioAtaud_1ProxPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_1ProxDescuento','name' => $this->plugin_name . '_servicioAtaud_1ProxDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
   </tr>
   <tr>
     <td>Medio</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_2Nombre','name' => $this->plugin_name . '_servicioAtaud_2Nombre',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
     ?></td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_2Precio','name' => $this->plugin_name . '_servicioAtaud_2Precio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_2Descuento','name' => $this->plugin_name . '_servicioAtaud_2Descuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_2ProxPrecio','name' => $this->plugin_name . '_servicioAtaud_2ProxPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_2ProxDescuento','name' => $this->plugin_name . '_servicioAtaud_2ProxDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
   </tr>
   <tr>
     <td>Premium</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_3Nombre','name' => $this->plugin_name . '_servicioAtaud_3Nombre',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
     ?></td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_3Precio','name' => $this->plugin_name . '_servicioAtaud_3Precio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_3Descuento','name' => $this->plugin_name . '_servicioAtaud_3Descuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_3ProxPrecio','name' => $this->plugin_name . '_servicioAtaud_3ProxPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaud_3ProxDescuento','name' => $this->plugin_name . '_servicioAtaud_3ProxDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
   </tr>
   <tr>
     <td>Económico (Ecológico)</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_1Nombre','name' => $this->plugin_name . '_servicioAtaudEcologico_1Nombre',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
     ?></td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_1Precio','name' => $this->plugin_name . '_servicioAtaudEcologico_1Precio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_1Descuento','name' => $this->plugin_name . '_servicioAtaudEcologico_1Descuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_1ProxPrecio','name' => $this->plugin_name . '_servicioAtaudEcologico_1ProxPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_1ProxDescuento','name' => $this->plugin_name . '_servicioAtaudEcologico_1ProxDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
   </tr>
   <tr>
     <td>Medio (Ecológico)</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_2Nombre','name' => $this->plugin_name . '_servicioAtaudEcologico_2Nombre',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
     ?></td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_2Precio','name' => $this->plugin_name . '_servicioAtaudEcologico_2Precio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_2Descuento','name' => $this->plugin_name . '_servicioAtaudEcologico_2Descuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_2ProxPrecio','name' => $this->plugin_name . '_servicioAtaudEcologico_2ProxPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_2ProxDescuento','name' => $this->plugin_name . '_servicioAtaudEcologico_2ProxDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
   </tr>
   <tr>
     <td>Premium (Ecológico)</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_3Nombre','name' => $this->plugin_name . '_servicioAtaudEcologico_3Nombre',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
     ?></td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_3Precio','name' => $this->plugin_name . '_servicioAtaudEcologico_3Precio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_3Descuento','name' => $this->plugin_name . '_servicioAtaudEcologico_3Descuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_3ProxPrecio','name' => $this->plugin_name . '_servicioAtaudEcologico_3ProxPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioAtaudEcologico_3ProxDescuento','name' => $this->plugin_name . '_servicioAtaudEcologico_3ProxDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
   </tr>
 </table>
 <hr/>
 <h3><?php esc_html_e('VELATORIO', 'wpfunos');?></h3>
 <table style="width:100%">
   <tr>
     <td>Tipo</td><td>Nombre</td><td>Precio</td><td>Descuento</td><td>Precio prox.</td><td>Descuento</td>
   </tr>
   <tr>
     <td>Velatorio</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioNombre','name' => $this->plugin_name . '_servicioVelatorioNombre',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
     ?></td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioPrecio','name' => $this->plugin_name . '_servicioVelatorioPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioDescuento','name' => $this->plugin_name . '_servicioVelatorioDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioProxPrecio','name' => $this->plugin_name . '_servicioVelatorioProxPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioProxDescuento','name' => $this->plugin_name . '_servicioVelatorioProxDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
   </tr>
   <tr>
     <td>Sin</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioNoNombre','name' => $this->plugin_name . '_servicioVelatorioNoNombre',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
     ?></td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioNoPrecio','name' => $this->plugin_name . '_servicioVelatorioNoPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioNoDescuento','name' => $this->plugin_name . '_servicioVelatorioNoDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioNoProxPrecio','name' => $this->plugin_name . '_servicioVelatorioNoProxPrecio',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>€</td>
     <td><?php $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioVelatorioNoProxDescuento','name' => $this->plugin_name . '_servicioVelatorioNoProxDescuento',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
     ?>%</td>
   </tr>
 </table>
 <hr/>
 <h3><?php esc_html_e('DESPEDIDA', 'wpfunos');?></h3>
 <table style="width:100%">
  <tr>
    <td>Tipo</td><td>Nombre</td><td>Precio</td><td>Descuento</td><td>Precio prox.</td><td>Descuento</td>
  </tr>
  <tr>
    <td>Solo sala</td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_1Nombre','name' => $this->plugin_name . '_servicioDespedida_1Nombre',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
    ?></td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_1Precio','name' => $this->plugin_name . '_servicioDespedida_1Precio',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
    ?>€</td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_1Descuento','name' => $this->plugin_name . '_servicioDespedida_1Descuento',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
    ?>%</td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_1ProxPrecio','name' => $this->plugin_name . '_servicioDespedida_1ProxPrecio',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
    ?>€</td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_1ProxDescuento','name' => $this->plugin_name . '_servicioDespedida_1ProxDescuento',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
    ?>%</td>
  </tr>
  <tr>
    <td>Civil</td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_2Nombre','name' => $this->plugin_name . '_servicioDespedida_2Nombre',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
    ?></td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_2Precio','name' => $this->plugin_name . '_servicioDespedida_2Precio',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
    ?>€</td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_2Descuento','name' => $this->plugin_name . '_servicioDespedida_2Descuento',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
    ?>%</td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_2ProxPrecio','name' => $this->plugin_name . '_servicioDespedida_2ProxPrecio',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
    ?>€</td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_2ProxDescuento','name' => $this->plugin_name . '_servicioDespedida_2ProxDescuento',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
    ?>%</td>
  </tr>
  <tr>
    <td>Religiosa</td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_3Nombre','name' => $this->plugin_name . '_servicioDespedida_3Nombre',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 20));
    ?></td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_3Precio','name' => $this->plugin_name . '_servicioDespedida_3Precio',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
    ?>€</td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_3Descuento','name' => $this->plugin_name . '_servicioDespedida_3Descuento',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
    ?>%</td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_3ProxPrecio','name' => $this->plugin_name . '_servicioDespedida_3ProxPrecio',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
    ?>€</td>
    <td><?php $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_servicioDespedida_3ProxDescuento','name' => $this->plugin_name . '_servicioDespedida_3ProxDescuento',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));
    ?>%</td>
  </tr>
 </table>
 <hr/>
 <h3><?php esc_html_e('Comentarios', 'wpfunos');?></h3>
 <?php // provide textarea name for $_POST variable
 $notes_servicioPrecioBaseComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioPrecioBaseComentario', true );
 $args_servicioPrecioBaseComentario = array( 'textarea_name' => $this->plugin_name . '_servicioPrecioBaseComentario', );
 $notes_servicioDestino_1Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDestino_1Comentario', true );
 $args_servicioDestino_1Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioDestino_1Comentario', );
 $notes_servicioDestino_1ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDestino_1ProxComentario', true );
 $args_servicioDestino_1ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioDestino_1ProxComentario', );
 $notes_servicioDestino_2Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDestino_2Comentario', true );
 $args_servicioDestino_2Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioDestino_2Comentario', );
 $notes_servicioDestino_2ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDestino_2ProxComentario', true );
 $args_servicioDestino_2ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioDestino_2ProxComentario', );
 $notes_servicioDestino_3Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDestino_3Comentario', true );
 $args_servicioDestino_3Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioDestino_3Comentario', );
 $notes_servicioDestino_3ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDestino_3ProxComentario', true );
 $args_servicioDestino_3ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioDestino_3ProxComentario', );
 $notes_servicioAtaud_1Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaud_1Comentario', true );
 $args_servicioAtaud_1Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaud_1Comentario', );
 $notes_servicioAtaud_1ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaud_1ProxComentario', true );
 $args_servicioAtaud_1ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaud_1ProxComentario', );
 $notes_servicioAtaud_2Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaud_2Comentario', true );
 $args_servicioAtaud_2Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaud_2Comentario', );
 $notes_servicioAtaud_2ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaud_2ProxComentario', true );
 $args_servicioAtaud_2ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaud_2ProxComentario', );
 $notes_servicioAtaud_3Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaud_3Comentario', true );
 $args_servicioAtaud_3Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaud_3Comentario', );
 $notes_servicioAtaud_3ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaud_3ProxComentario', true );
 $args_servicioAtaud_3ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaud_3ProxComentario', );
 $notes_servicioAtaudEcologico_1Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaudEcologico_1Comentario', true );
 $args_servicioAtaudEcologico_1Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaudEcologico_1Comentario', );
 $notes_servicioAtaudEcologico_1ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaudEcologico_1ProxComentario', true );
 $args_servicioAtaudEcologico_1ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaudEcologico_1ProxComentario', );
 $notes_servicioAtaudEcologico_2Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaudEcologico_2Comentario', true );
 $args_servicioAtaudEcologico_2Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaudEcologico_2Comentario', );
 $notes_servicioAtaudEcologico_2ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaudEcologico_2ProxComentario', true );
 $args_servicioAtaudEcologico_2ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaudEcologico_2ProxComentario', );
 $notes_servicioAtaudEcologico_3Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaudEcologico_3Comentario', true );
 $args_servicioAtaudEcologico_3Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaudEcologico_3Comentario', );
 $notes_servicioAtaudEcologico_3ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaudEcologico_3ProxComentario', true );
 $args_servicioAtaudEcologico_3ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioAtaudEcologico_3ProxComentario', );
 $notes_servicioVelatorioComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioVelatorioComentario', true );
 $args_servicioVelatorioComentario = array( 'textarea_name' => $this->plugin_name . '_servicioVelatorioComentario', );
 $notes_servicioVelatorioProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioVelatorioProxComentario', true );
 $args_servicioVelatorioProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioVelatorioProxComentario', );
 $notes_servicioVelatorioNoComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioVelatorioNoComentario', true );
 $args_servicioVelatorioNoComentario = array( 'textarea_name' => $this->plugin_name . '_servicioVelatorioNoComentario', );
 $notes_servicioVelatorioNoProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioVelatorioNoProxComentario', true );
 $args_servicioVelatorioNoProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioVelatorioNoProxComentario', );
 $notes_servicioDespedida_1Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDespedida_1Comentario', true );
 $args_servicioDespedida_1Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioDespedida_1Comentario', );
 $notes_servicioDespedida_1ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDespedida_1ProxComentario', true );
 $args_servicioDespedida_1ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioDespedida_1ProxComentario', );
 $notes_servicioDespedida_2Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDespedida_2Comentario', true );
 $args_servicioDespedida_2Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioDespedida_2Comentario', );
 $notes_servicioDespedida_2ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDespedida_2ProxComentario', true );
 $args_servicioDespedida_2ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioDespedida_2ProxComentario', );
 $notes_servicioDespedida_3Comentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDespedida_3Comentario', true );
 $args_servicioDespedida_3Comentario = array( 'textarea_name' => $this->plugin_name . '_servicioDespedida_3Comentario', );
 $notes_servicioDespedida_3ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioDespedida_3ProxComentario', true );
 $args_servicioDespedida_3ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioDespedida_3ProxComentario', );
	
 $notes_servicioDespedida_3ProxComentario = get_post_meta( $post->ID, $this->plugin_name . '_servicioPosiblesExtras', true );
 $args_servicioDespedida_3ProxComentario = array( 'textarea_name' => $this->plugin_name . '_servicioPosiblesExtras', );
 

 ?>
 <li><label for="'.$this->plugin_name.'_servicioPrecioBaseComentario" style="font-size: 32px;">Notas Precio Base</label>
   <?php	wp_editor( $notes_servicioPrecioBaseComentario, $this->plugin_name . '_servicioPrecioBaseComentario',$args_servicioPrecioBaseComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioDestino_1Comentario" style="font-size: 32px;">Notas Entierro</label>
   <?php	wp_editor( $notes_servicioDestino_1Comentario, $this->plugin_name . '_servicioDestino_1Comentario',$args_servicioDestino_1Comentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioDestino_1ProxComentario" style="font-size: 32px;">Notas Entierro Proximamente</label>
   <?php	wp_editor( $notes_servicioDestino_1ProxComentario, $this->plugin_name . '_servicioDestino_1ProxComentario',$args_servicioDestino_1ProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioDestino_2Comentario" style="font-size: 32px;">Notas Incineración</label>
   <?php	wp_editor( $notes_servicioDestino_2Comentario, $this->plugin_name . '_servicioDestino_2Comentario',$args_servicioDestino_2Comentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioDestino_2ProxComentario" style="font-size: 32px;">Notas Incineración Proximamente</label>
   <?php	wp_editor( $notes_servicioDestino_2ProxComentario, $this->plugin_name . '_servicioDestino_2ProxComentario',$args_servicioDestino_2ProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioDestino_3Comentario" style="font-size: 32px;">Notas Traslado</label>
   <?php	wp_editor( $notes_servicioDestino_3Comentario, $this->plugin_name . '_servicioDestino_3Comentario',$args_servicioDestino_3Comentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioDestino_3ProxComentario" style="font-size: 32px;">Notas Traslado Proximamente</label>
   <?php	wp_editor( $notes_servicioDestino_3ProxComentario, $this->plugin_name . '_servicioDestino_3ProxComentario',$args_servicioDestino_3ProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioAtaud_1Comentario" style="font-size: 32px;">Notas Ataud Económico</label>
   <?php	wp_editor( $notes_servicioAtaud_1Comentario, $this->plugin_name . '_servicioAtaud_1Comentario',$args_servicioAtaud_1Comentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioAtaud_1ProxComentario" style="font-size: 32px;">Notas Ataud Económico Proximamente</label>
   <?php	wp_editor( $notes_servicioAtaud_1ProxComentario, $this->plugin_name . '_servicioAtaud_1ProxComentario',$args_servicioAtaud_1ProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioAtaud_2Comentario" style="font-size: 32px;">Notas Ataud Medio</label>
   <?php	wp_editor( $notes_servicioAtaud_2Comentario, $this->plugin_name . '_servicioAtaud_2Comentario',$args_servicioAtaud_2Comentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioAtaud_2ProxComentario" style="font-size: 32px;">Notas Ataud Medio Proximamente</label>
   <?php	wp_editor( $notes_servicioAtaud_2ProxComentario, $this->plugin_name . '_servicioAtaud_2ProxComentario',$args_servicioAtaud_2ProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioAtaud_3Comentario" style="font-size: 32px;">Notas Ataud Premium</label>
   <?php	wp_editor( $notes_servicioAtaud_3Comentario, $this->plugin_name . '_servicioAtaud_3Comentario',$args_servicioAtaud_3Comentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioAtaud_3ProxComentario" style="font-size: 32px;">Notas Ataud Premium Proximamente</label>
   <?php	wp_editor( $notes_servicioAtaud_3ProxComentario, $this->plugin_name . '_servicioAtaud_3ProxComentario',$args_servicioAtaud_3ProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioAtaudEcologico_1Comentario" style="font-size: 32px;">Notas Ataud Ecológico Económico</label>
   <?php	wp_editor( $notes_servicioAtaudEcologico_1Comentario, $this->plugin_name . '_servicioAtaudEcologico_1Comentario',$args_servicioAtaudEcologico_1Comentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioAtaudEcologico_1ProxComentario" style="font-size: 32px;">Notas Ataud Ecológico Económico Proximamente</label>
   <?php	wp_editor( $notes_servicioAtaudEcologico_1ProxComentario, $this->plugin_name . '_servicioAtaudEcologico_1ProxComentario',$args_servicioAtaudEcologico_1ProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioAtaudEcologico_2Comentario" style="font-size: 32px;">Notas Ataud Ecológico Medio</label>
   <?php	wp_editor( $notes_servicioAtaudEcologico_2Comentario, $this->plugin_name . '_servicioAtaudEcologico_2Comentario',$args_servicioAtaudEcologico_2Comentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioAtaudEcologico_2ProxComentario" style="font-size: 32px;">Notas Ataud Ecológico Medio Proximamente</label>
   <?php	wp_editor( $notes_servicioAtaudEcologico_2ProxComentario, $this->plugin_name . '_servicioAtaudEcologico_2ProxComentario',$args_servicioAtaudEcologico_2ProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioAtaudEcologico_3Comentario" style="font-size: 32px;">Notas Ataud Ecológico Premium</label>
   <?php	wp_editor( $notes_servicioAtaudEcologico_3Comentario, $this->plugin_name . '_servicioAtaudEcologico_3Comentario',$args_servicioAtaudEcologico_3Comentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioAtaudEcologico_3ProxComentario" style="font-size: 32px;">Notas Ataud Ecológico Premium Proximamente</label>
   <?php	wp_editor( $notes_servicioAtaudEcologico_3ProxComentario, $this->plugin_name . '_servicioAtaudEcologico_3ProxComentario',$args_servicioAtaudEcologico_3ProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioVelatorioComentario" style="font-size: 32px;">Notas Velatorio</label>
   <?php	wp_editor( $notes_servicioVelatorioComentario, $this->plugin_name . '_servicioVelatorioComentario',$args_servicioVelatorioComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioVelatorioProxComentario" style="font-size: 32px;">Notas Velatorio Proximamente</label>
   <?php	wp_editor( $notes_servicioVelatorioProxComentario, $this->plugin_name . '_servicioVelatorioProxComentario',$args_servicioVelatorioProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioVelatorioNoComentario" style="font-size: 32px;">Notas Velatorio No</label>
   <?php	wp_editor( $notes_servicioVelatorioNoComentario, $this->plugin_name . '_servicioVelatorioNoComentario',$args_servicioVelatorioNoComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioVelatorioNoProxComentario" style="font-size: 32px;">Notas Velatorio No Proximamente</label>
   <?php	wp_editor( $notes_servicioVelatorioNoProxComentario, $this->plugin_name . '_servicioVelatorioNoProxComentario',$args_servicioVelatorioNoProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioDespedida_1Comentario" style="font-size: 32px;">Notas Despedida Sala</label>
   <?php	wp_editor( $notes_servicioDespedida_1Comentario, $this->plugin_name . '_servicioDespedida_1Comentario',$args_servicioDespedida_1Comentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioDespedida_1ProxComentario" style="font-size: 32px;">Notas Despedida Sala Proximamente</label>
   <?php	wp_editor( $notes_servicioDespedida_1ProxComentario, $this->plugin_name . '_servicioDespedida_1ProxComentario',$args_servicioDespedida_1ProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioDespedida_2Comentario" style="font-size: 32px;">Notas Despedida Civil</label>
   <?php	wp_editor( $notes_servicioDespedida_2Comentario, $this->plugin_name . '_servicioDespedida_2Comentario',$args_servicioDespedida_2Comentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioDespedida_2ProxComentario" style="font-size: 32px;">Notas Despedida Civil Proximamente</label>
   <?php	wp_editor( $notes_servicioDespedida_2ProxComentario, $this->plugin_name . '_servicioDespedida_2ProxComentario',$args_servicioDespedida_2ProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioDespedida_3Comentario" style="font-size: 32px;">Notas Religiosa No</label>
   <?php	wp_editor( $notes_servicioDespedida_3Comentario, $this->plugin_name . '_servicioDespedida_3Comentario',$args_servicioDespedida_3Comentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioDespedida_3ProxComentario" style="font-size: 32px;">Notas Religiosa Proximamente</label>
   <?php	wp_editor( $notes_servicioDespedida_3ProxComentario, $this->plugin_name . '_servicioDespedida_3ProxComentario',$args_servicioDespedida_3ProxComentario); ?>
 </li>
 <li><label for="'.$this->plugin_name.'_servicioPosiblesExtras" style="font-size: 32px;">Posibles extras</label>
   <?php	wp_editor( $notes_servicioPosiblesExtras, $this->plugin_name . '_servicioPosiblesExtras',$args_servicioPosiblesExtras); ?>
 </li>
</ul></div>
