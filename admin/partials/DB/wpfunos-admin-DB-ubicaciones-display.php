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
* @subpackage Wpfunos/admin/partials/DB
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
?><div class="ubicaciones_wpfunos_containers"><?php
?><ul class="ubicaciones_wpfunos_data_metabox">
  <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_ubicacionIP' ); ?>"> <?php esc_html_e('IP', 'wpfunos');?></label> <?php
  $this->wpfunos_render_settings_field(array(
    'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubicacionIP','name' => $this->plugin_name . '_ubicacionIP',
    'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
  ));
  ?></li>
  <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_ubicacionwpf' ); ?>"> <?php esc_html_e('wpf', 'wpfunos');?></label> <?php
  $this->wpfunos_render_settings_field(array(
    'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubicacionwpf','name' => $this->plugin_name . '_ubicacionwpf',
    'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
  ));
  ?></li>
  <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_ubicacionReferencia' ); ?>"> <?php esc_html_e('Referencia', 'wpfunos');?></label> <?php
  $this->wpfunos_render_settings_field(array(
    'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubicacionReferencia','name' => $this->plugin_name . '_ubicacionReferencia',
    'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
  ));
  ?></li>
  <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_ubicacionDireccion' ); ?>"> <?php esc_html_e('Dirección', 'wpfunos');?></label> <?php
  $this->wpfunos_render_settings_field(array(
    'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubicacionDireccion','name' => $this->plugin_name . '_ubicacionDireccion',
    'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
  ));
  ?></li>
  <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_ubicacionDistancia' ); ?>"> <?php esc_html_e('Distancia', 'wpfunos');?></label> <?php
  $this->wpfunos_render_settings_field(array(
    'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubicacionDistancia','name' => $this->plugin_name . '_ubicacionDistancia',
    'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
  ));
  ?></li>
  <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_ubicacionCP' ); ?>"> <?php esc_html_e('CP', 'wpfunos');?></label> <?php
  $this->wpfunos_render_settings_field(array(
    'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubicacionCP','name' => $this->plugin_name . '_ubicacionCP',
    'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
  ));
  ?></li>
  <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_Dummy' ); ?>"> <?php esc_html_e('', 'wpfunos');?></label> <?php
  $this->wpfunos_render_settings_field(array(
    'type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_Dummy','name' => $this->plugin_name . '_Dummy',
    'get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
  ));
  ?></li>
</ul>
</div><?php
