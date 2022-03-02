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
	?><div class="tanatorio_directorio_wpfunos_containers"><?php
	?><ul class="tanatorio_directorio_wpfunos_data_metabox">
	<li class="tanatorio_directorio_wpfunos_list">
		<label for="<?php esc_html_e($this->plugin_name . '_tanatorioDirectorioNombre' ); ?>"> <?php esc_html_e('Nombre', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          	'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_tanatorioDirectorioNombre','name' => $this->plugin_name . '_tanatorioDirectorioNombre',
          	'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    	));
		?>	
		<label for="<?php esc_html_e($this->plugin_name . '_tanatorioDirectorioDireccion' ); ?>"> <?php esc_html_e('Dirección', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_tanatorioDirectorioDireccion','name' => $this->plugin_name . '_tanatorioDirectorioDireccion',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    	));
		?>
		<label for="<?php esc_html_e($this->plugin_name . '_tanatorioDirectorioCorreo' ); ?>"> <?php esc_html_e('Correo', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_tanatorioDirectorioCorreo','name' => $this->plugin_name . '_tanatorioDirectorioCorreo',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    	));
		?>
    	<label for="<?php esc_html_e($this->plugin_name . '_tanatorioDirectorioTelefono' ); ?>"> <?php esc_html_e('Telefono', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_tanatorioDirectorioTelefono','name' => $this->plugin_name . '_tanatorioDirectorioTelefono',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    	));
		?>
	</li>
	<li class="tanatorio_directorio_wpfunos_list">
		<label for="<?php esc_html_e($this->plugin_name . '_tanatorioDirectorioFuneraria)' ); ?>"> <?php esc_html_e('Funeraria', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          	'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_tanatorioDirectorioFuneraria','name' => $this->plugin_name . '_tanatorioDirectorioFuneraria',
          	'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    	));
		?>
		<label for="<?php esc_html_e($this->plugin_name . '_tanatorioDirectorioPoblacion)' ); ?>"> <?php esc_html_e('Poblacion', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          	'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_tanatorioDirectorioPoblacion','name' => $this->plugin_name . '_tanatorioDirectorioPoblacion',
          	'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    	));
		?>
		<label for="<?php esc_html_e($this->plugin_name . '_tanatorioDirectorioProvincia)' ); ?>"> <?php esc_html_e('Provincia', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          	'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_tanatorioDirectorioProvincia','name' => $this->plugin_name . '_tanatorioDirectorioProvincia',
          	'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    	));
		?>
		<?php
		$notes_tanatorioDirectorioNotas = get_post_meta( $post->ID, $this->plugin_name . '_tanatorioDirectorioNotas', true );
 		$args_tanatorioDirectorioNotas = array( 'textarea_name' => $this->plugin_name . '_tanatorioDirectorioNotas', 'wpautop' => false, ); 
		?>
		<li><label for="'.$this->plugin_name.'_aseguradorasNotas" style="font-size: 32px;">Notas Tanatorio</label>
   			<?php	wp_editor( $notes_tanatorioDirectorioNotas, $this->plugin_name . '_tanatorioDirectorioNotas',$args_tanatorioDirectorioNotas); ?>
 		</li> 
		
	</li>
	</ul></div><?php

