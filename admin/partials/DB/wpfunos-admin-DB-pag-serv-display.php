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
?><div class="entradaServicios_wpfunos_containers"><?php
?><ul class="entradaServicios_wpfunos_data_metabox">
  <li class="entradaServicios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_entradaServiciosIP' ); ?>"> <?php esc_html_e('IP', 'wpfunos');?></label> <?php
  $this->wpfunos_render_settings_field(array(
    'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_entradaServiciosIP','name' => $this->plugin_name . '_entradaServiciosIP',
    'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
  ));
  ?></li>
  <li class="entradaServicios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_entradaServiciosReferer' ); ?>"> <?php esc_html_e('Referer', 'wpfunos');?></label> <?php
  $this->wpfunos_render_settings_field(array(
    'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_entradaServiciosReferer','name' => $this->plugin_name . '_entradaServiciosReferer',
    'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
  ));
  ?></li>
  <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_Dummy' ); ?>"> <?php esc_html_e('', 'wpfunos');?></label> <?php
  $this->wpfunos_render_settings_field(array(
    'type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_Dummy','name' => $this->plugin_name . '_Dummy',
    'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
  ));
  ?></li>
</ul>
</div><?php
