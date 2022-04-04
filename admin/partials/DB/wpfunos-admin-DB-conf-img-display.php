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
<div class="conf_img_wpfunos_containers">
  <ul class="conf_img_wpfunos_data_metabox">
    <li class="conf_img_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_imagenConfirmado' ); ?>"> <?php esc_html_e('Imagen Confirmado', 'wpfunos');?></label> 
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_imagenConfirmado','name' => $this->plugin_name . '_imagenConfirmado','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
      <?php echo wp_get_attachment_image(  get_post_meta( get_option($this->plugin_name . '_postConfImagenes') , $this->plugin_name . '_imagenConfirmado', true ) ); ?>
    </li>
    <li class="conf_img_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_imagenNoConfirmado' ); ?>"> <?php esc_html_e('Imagen No Confirmado', 'wpfunos');?></label> 
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_imagenNoConfirmado','name' => $this->plugin_name . '_imagenNoConfirmado','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
      <?php echo wp_get_attachment_image(  get_post_meta( get_option($this->plugin_name . '_postConfImagenes') , $this->plugin_name . '_imagenNoConfirmado', true ) ); ?>
    </li>
    <li class="conf_img_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_imagenEcologico' ); ?>"> <?php esc_html_e('Imagen Ecológico', 'wpfunos');?></label> 
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_imagenEcologico','name' => $this->plugin_name . '_imagenEcologico','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
      <?php echo wp_get_attachment_image(  get_post_meta( get_option($this->plugin_name . '_postConfImagenes') , $this->plugin_name . '_imagenEcologico', true ) ); ?>
    </li>
    <li class="conf_img_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_imagenPromo' ); ?>"> <?php esc_html_e('Imagen Promo', 'wpfunos');?></label> 
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_imagenPromo','name' => $this->plugin_name . '_imagenPromo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
      <?php echo wp_get_attachment_image(  get_post_meta( get_option($this->plugin_name . '_postConfImagenes') , $this->plugin_name . '_imagenPromo', true ) ); ?>
    </li>
  </ul>
</div>
<?php
