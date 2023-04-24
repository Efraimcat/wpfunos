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
<div class="excep_prov_wpfunos_containers">
  <ul class="excep_prov_wpfunos_data_metabox">
    <li class="excep_prov_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_excep_provProvincia' ); ?>"> <?php esc_html_e('Provincia', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_excep_provProvincia','name' => 'wpfunos_excep_provProvincia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="excep_prov_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_excep_provDistancia' ); ?>"> <?php esc_html_e('Distancia', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_excep_provDistancia','name' => 'wpfunos_excep_provDistancia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="excep_prov_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_excep_provLat' ); ?>"> <?php esc_html_e('Latitud', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_excep_provLat','name' => 'wpfunos_excep_provLat','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="excep_prov_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_excep_provLng' ); ?>"> <?php esc_html_e('Longitud', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_excep_provLng','name' => 'wpfunos_excep_provLng','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="excep_prov_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_Dummy' ); ?>"> <?php esc_html_e('Activo', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_Dummy','name' => 'wpfunos_Dummy','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
  </ul>
  <hr/>
</div>
<?php
