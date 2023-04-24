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
<div class="provincias_wpfunos_containers">
  <ul class="provincias_wpfunos_data_metabox">
    <li class="provincias_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_provinciasProvincia' ); ?>"> <?php esc_html_e('Provincia', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasProvincia','name' => 'wpfunos_provinciasProvincia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="provincias_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_provinciasCodigo' ); ?>"> <?php esc_html_e('Código Provincia', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasCodigo','name' => 'wpfunos_provinciasCodigo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="provincias_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_provinciasISO31662' ); ?>"> <?php esc_html_e('ISO 3166-2', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasISO31662','name' => 'wpfunos_provinciasISO31662','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="provincias_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_Dummy' ); ?>"> <?php esc_html_e('Activo', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_Dummy','name' => 'wpfunos_Dummy','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
  </ul>
  <hr/>
</div>
<?php
