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
?><div class="entradaAseguradoras_wpfunos_containers">
  <ul class="entradaAseguradoras_wpfunos_data_metabox">
    <li class="entradaAseguradoras_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_entradaAseguradorasIP' ); ?>"> <?php esc_html_e('IP', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_entradaAseguradorasIP','name' => $this->plugin_name . '_entradaAseguradorasIP','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="entradaAseguradoras_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_entradaAseguradorasReferer' ); ?>"> <?php esc_html_e('Referer', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_entradaAseguradorasReferer','name' => $this->plugin_name . '_entradaAseguradorasReferer','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="entradaAseguradoras_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_entradaAseguradorasVisitas' ); ?>"> <?php esc_html_e('Visitas', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_entradaAseguradorasVisitas','name' => $this->plugin_name . '_entradaAseguradorasVisitas','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
    <li class="entradaAseguradoras_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_Dummy' ); ?>"> <?php esc_html_e('', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_Dummy','name' => $this->plugin_name . '_Dummy','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="entradaAseguradoras_wpfunos_list">
      <label for="<?php esc_html_e( 'IDstamp' ); ?>"> <?php esc_html_e('IDstamp', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'IDstamp','name' => 'IDstamp','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''));?>
    </li>
  </ul>
</div>
<?php
