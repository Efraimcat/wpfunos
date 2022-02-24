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
	</ul></div><?php