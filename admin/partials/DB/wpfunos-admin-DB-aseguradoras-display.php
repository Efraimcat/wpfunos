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
  ?><div class="aseguradoras_wpfunos_containers"><?php
  ?><ul class="aseguradoras_wpfunos_data_metabox">
  <?php //poblacion, //direccion //precio_confirmado //logo ?>
  <li class="aseguradoras_wpfunos_list">
	<label for="<?php esc_html_e($this->plugin_name . '_aseguradorasNombre' ); ?>"> <?php esc_html_e('Nombre', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_aseguradorasNombre','name' => $this->plugin_name . '_aseguradorasNombre',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    ));
	?>
    <label for="<?php esc_html_e($this->plugin_name . '_aseguradorasDireccion' ); ?>"> <?php esc_html_e('Dirección', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_aseguradorasDireccion','name' => $this->plugin_name . '_aseguradorasDireccion',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    ));
	?>
    <label for="<?php esc_html_e($this->plugin_name . '_aseguradorasCorreo' ); ?>"> <?php esc_html_e('Correo', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_aseguradorasCorreo','name' => $this->plugin_name . '_aseguradorasCorreo',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    ));
	?>
    <label for="<?php esc_html_e($this->plugin_name . '_aseguradorasTelefono' ); ?>"> <?php esc_html_e('Telefono', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_aseguradorasTelefono','name' => $this->plugin_name . '_aseguradorasTelefono',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    ));
	?>
 </li>
 <li class="aseguradoras_wpfunos_list">	
    <label for="<?php esc_html_e($this->plugin_name . '_aseguradorasActivo' ); ?>"> <?php esc_html_e('Activo', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_aseguradorasActivo','name' => $this->plugin_name . '_aseguradorasActivo',
          'required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    ));
	?>
    <label for="<?php esc_html_e($this->plugin_name . '_aseguradorasLogo' ); ?>"> <?php esc_html_e('Logo', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_aseguradorasLogo','name' => $this->plugin_name . '_aseguradorasLogo',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    ));
	?>
 </li>


  </ul></div><?php

