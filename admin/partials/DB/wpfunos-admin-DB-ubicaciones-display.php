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
?><div class="ubicaciones_wpfunos_containers"><?php
?><ul class="ubicaciones_wpfunos_data_metabox">
 <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_ubicacionIP' ); ?>"> <?php esc_html_e('IP', 'wpfunos');?></label> <?php
    $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubicacionIP','name' => $this->plugin_name . '_ubicacionIP',
      'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
  ));
 ?></li>
 <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_ubicacionwpf' ); ?>"> <?php esc_html_e('wpf', 'wpfunos');?></label> <?php
     $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubicacionwpf','name' => $this->plugin_name . '_ubicacionwpf',
         'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
   ));
  ?></li>
  <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_ubicacionReferencia' ); ?>"> <?php esc_html_e('Referencia', 'wpfunos');?></label> <?php
     $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubicacionReferencia','name' => $this->plugin_name . '_ubicacionReferencia',
         'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
   ));
  ?></li>
  <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_ubicacionDireccion' ); ?>"> <?php esc_html_e('Dirección', 'wpfunos');?></label> <?php
     $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubicacionDireccion','name' => $this->plugin_name . '_ubicacionDireccion',
         'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
   ));
  ?></li>
  <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_ubicacionCP' ); ?>"> <?php esc_html_e('CP', 'wpfunos');?></label> <?php
     $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubicacionCP','name' => $this->plugin_name . '_ubicacionCP',
         'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
   ));
 ?></li></ul></div><?php