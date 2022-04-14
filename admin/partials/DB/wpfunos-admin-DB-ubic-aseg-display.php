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
?>
<div class="ubic_aseg_wpfunos_containers">
  <ul class="ubic_aseg_wpfunos_data_metabox">
    <li class="ubic_aseg_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_ubic_asegIP' ); ?>"> <?php esc_html_e('IP', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubic_asegIP','name' => $this->plugin_name . '_ubic_asegIP','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="ubic_aseg_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_ubic_asegwpf' ); ?>"> <?php esc_html_e('wpf', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubic_asegwpf','name' => $this->plugin_name . '_ubic_asegwpf','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="ubic_aseg_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_ubic_asegReferencia' ); ?>"> <?php esc_html_e('Referencia', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubic_asegReferencia','name' => $this->plugin_name . '_ubic_asegReferencia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="ubic_aseg_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_ubic_asegDireccion' ); ?>"> <?php esc_html_e('Dirección', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubic_asegDireccion','name' => $this->plugin_name . '_ubic_asegDireccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="ubic_aseg_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_ubic_asegDistancia' ); ?>"> <?php esc_html_e('Distancia', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubic_asegDistancia','name' => $this->plugin_name . '_ubic_asegDistancia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="ubic_aseg_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_ubic_asegCP' ); ?>"> <?php esc_html_e('CP', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubic_asegCP','name' => $this->plugin_name . '_ubic_asegCP','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="ubic_aseg_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_ubic_asegVisitas' ); ?>"> <?php esc_html_e('Visitas', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_ubic_asegVisitas','name' => $this->plugin_name . '_ubic_asegVisitas','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="ubic_aseg_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_Dummy' ); ?>"> <?php esc_html_e('', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_Dummy','name' => $this->plugin_name . '_Dummy','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="ubic_aseg_wpfunos_list">
      <label for="<?php esc_html_e( 'IDstamp' ); ?>"> <?php esc_html_e('IDstamp', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'IDstamp','name' => 'IDstamp','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
  </ul>
</div>
<?php
