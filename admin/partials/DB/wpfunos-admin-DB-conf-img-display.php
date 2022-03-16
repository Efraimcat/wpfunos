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
 ?><div class="conf_img_wpfunos_containers"><?php
 ?><ul class="conf_img_wpfunos_data_metabox">
	
	<li class="conf_img_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_imagenConfirmado' ); ?>"> <?php esc_html_e('Imagen Confirmado', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_imagenConfirmado','name' => $this->plugin_name . '_imagenConfirmado',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    ));
	?></li>
	<li class="conf_img_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_imagenNoConfirmado' ); ?>"> <?php esc_html_e('Imagen No Confirmado', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_imagenNoConfirmado','name' => $this->plugin_name . '_imagenNoConfirmado',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    ));
	?></li>
	<li class="conf_img_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_imagenEcologico' ); ?>"> <?php esc_html_e('Imagen Ecológico', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_imagenEcologico','name' => $this->plugin_name . '_imagenEcologico',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    ));
	?></li>
	<?php
