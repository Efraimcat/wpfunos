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
 ?><div class="funerarias_wpfunos_containers"><?php
 ?><ul class="funerarias_wpfunos_data_metabox">

  <li class="funerarias_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_funerariaNombre' ); ?>"> <?php esc_html_e('Nombre', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_funerariaNombre','name' => $this->plugin_name . '_funerariaNombre',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    ));
  ?></li>

  <li class="funerarias_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_funerariaLogo' ); ?>"> <?php esc_html_e('Logo', 'wpfunos');?></label> <?php
     $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_funerariaLogo','name' => $this->plugin_name . '_funerariaLogo',
         'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
   ));
  ?></li>

  <li class="funerarias_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_funerariaEmail' ); ?>"> <?php esc_html_e('Email', 'wpfunos');?></label> <?php
    $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_funerariaEmail','name' => $this->plugin_name . '_funerariaEmail',
        'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
   ));
  ?></li>

  <li class="funerarias_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_funerariaTelefono' ); ?>"> <?php esc_html_e('Teléfono', 'wpfunos');?></label> <?php
   $this->wpfunos_render_settings_field(array(
     'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_funerariaTelefono','name' => $this->plugin_name . '_funerariaTelefono',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
   ));
  ?></li>

  <li class="funerarias_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_funerariaDireccion' ); ?>"> <?php esc_html_e('Dirección', 'wpfunos');?></label> <?php
   $this->wpfunos_render_settings_field(array(
    'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_funerariaDireccion','name' => $this->plugin_name . '_funerariaDireccion',
      'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
   ));
  ?></li>

  <li class="funerarias_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_funerariaMapa' ); ?>"> <?php esc_html_e('Mapa', 'wpfunos');?></label> <?php
   $this->wpfunos_render_settings_field(array(
    'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_funerariaMapa','name' => $this->plugin_name . '_funerariaMapa',
      'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
   ));
  ?></li>

  <li class="funerarias_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_funerariaValoracion' ); ?>"> <?php esc_html_e('Valoración', 'wpfunos');?></label> <?php
   $this->wpfunos_render_settings_field(array(
   'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_funerariaValoracion','name' => $this->plugin_name . '_funerariaValoracion',
     'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
   ));
  ?></li>

  <li class="funerarias_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_funerariaDescuentoGenerico' ); ?>"> <?php esc_html_e('Descuento genérico', 'wpfunos');?></label> <?php
   $this->wpfunos_render_settings_field(array(
   'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_funerariaDescuentoGenerico','name' => $this->plugin_name . '_funerariaDescuentoGenerico',
     'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
   ));
  ?></li>
 </ul></div>
