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
?><div class="entradaServicios_wpfunos_containers">
  <ul class="entradaServicios_wpfunos_data_metabox">
    <li class="entradaServicios_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_entradaServiciosIP' ); ?>"> <?php esc_html_e('IP', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaServiciosIP','name' => 'wpfunos_entradaServiciosIP','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="entradaServicios_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_entradaServiciosReferer' ); ?>"> <?php esc_html_e('Referer', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaServiciosReferer','name' => 'wpfunos_entradaServiciosReferer','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="entradaServicios_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_entradaServiciosVisitas' ); ?>"> <?php esc_html_e('Visitas', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaServiciosVisitas','name' => 'wpfunos_entradaServiciosVisitas','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="entradaServicios_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_entradaServiciosVersion' ); ?>"> <?php esc_html_e('Version', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_entradaServiciosVersion','name' => 'wpfunos_entradaServiciosVersion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="entradaServicios_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_Dummy' ); ?>"> <?php esc_html_e('', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_Dummy','name' => 'wpfunos_Dummy','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="entradaServicios_wpfunos_list">
      <label for="<?php esc_html_e( 'IDstamp' ); ?>"> <?php esc_html_e('IDstamp', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'IDstamp','name' => 'IDstamp','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
  </ul>
</div>
<?php
