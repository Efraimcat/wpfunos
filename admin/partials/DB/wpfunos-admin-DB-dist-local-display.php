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
<div class="dist_local_wpfunos_containers">
  <ul class="dist_local_wpfunos_data_metabox">
    <li class="dist_local_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_dist_localLocalidad' ); ?>"> <?php esc_html_e('Localidad', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_dist_localLocalidad','name' => 'wpfunos_dist_localLocalidad','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="dist_local_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_dist_localDistancia' ); ?>"> <?php esc_html_e('Distancia', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_dist_localDistancia','name' => 'wpfunos_dist_localDistancia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
  </ul>
  <hr/>
</div>
<?php
