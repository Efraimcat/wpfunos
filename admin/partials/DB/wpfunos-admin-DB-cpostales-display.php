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
?><div class="cpostales_wpfunos_containers"><?php
?><ul class="cpostales_wpfunos_data_metabox">
 <li class="cpostales_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_cpostalesPoblacion' ); ?>"> <?php esc_html_e('Población', 'wpfunos');?></label> <?php
    $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_cpostalesPoblacion','name' => $this->plugin_name . '_cpostalesPoblacion',
      'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
  ));
 ?></li>
 <li class="cpostales_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_cpostalesCodigo' ); ?>"> <?php esc_html_e('Código postal', 'wpfunos');?></label> <?php
     $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_cpostalesCodigo','name' => $this->plugin_name . '_cpostalesCodigo',
         'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
   ));
 ?></li></ul></div><?php
