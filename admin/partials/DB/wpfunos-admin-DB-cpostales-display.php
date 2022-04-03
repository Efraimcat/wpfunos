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
		?></li>
    <li class="ubicaciones_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_Dummy' ); ?>"> <?php esc_html_e('', 'wpfunos');?></label> <?php
    $this->wpfunos_render_settings_field(array(
      'type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_Dummy','name' => $this->plugin_name . '_Dummy',
      'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID
    ));
    ?></li>
	</ul>
</div><?php
