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
<div class="cpostales_wpfunos_containers">
  <ul class="cpostales_wpfunos_data_metabox">
    <li class="cpostales_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_cpostalesPoblacion' ); ?>"> <?php esc_html_e('Población', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_cpostalesPoblacion','name' => 'wpfunos_cpostalesPoblacion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="cpostales_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_cpostalesCodigo' ); ?>"> <?php esc_html_e('Código postal', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_cpostalesCodigo','name' => 'wpfunos_cpostalesCodigo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="ubicaciones_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_Dummy' ); ?>"> <?php esc_html_e('', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_Dummy','name' => 'wpfunos_Dummy','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
  </ul>
</div>
<?php
