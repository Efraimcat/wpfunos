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
	?><div class="crematorio_directorio_wpfunos_containers"><?php
	?><ul class="crematorio_directorio_wpfunos_data_metabox">
	<li class="crematorio_directorio_wpfunos_list">
		<label for="<?php esc_html_e($this->plugin_name . '_crematorioDirectorioNombre' ); ?>"> <?php esc_html_e('Nombre', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          	'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_crematorioDirectorioNombre','name' => $this->plugin_name . '_crematorioDirectorioNombre',
          	'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    	));
		?>	
		<label for="<?php esc_html_e($this->plugin_name . '_crematorioDirectorioDireccion' ); ?>"> <?php esc_html_e('Dirección', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_crematorioDirectorioDireccion','name' => $this->plugin_name . '_crematorioDirectorioDireccion',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    	));
		?>
		<label for="<?php esc_html_e($this->plugin_name . '_crematorioDirectorioCorreo' ); ?>"> <?php esc_html_e('Correo', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_crematorioDirectorioCorreo','name' => $this->plugin_name . '_crematorioDirectorioCorreo',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    	));
		?>
    	<label for="<?php esc_html_e($this->plugin_name . '_crematorioDirectorioTelefono' ); ?>"> <?php esc_html_e('Telefono', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_crematorioDirectorioTelefono','name' => $this->plugin_name . '_crematorioDirectorioTelefono',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    	));
		?>
	</li>
	</ul></div><?php