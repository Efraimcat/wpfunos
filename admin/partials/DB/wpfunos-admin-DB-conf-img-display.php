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
      <label for="<?php esc_html_e('wpfunos_imagenConfirmado' ); ?>"> <?php esc_html_e('Imagen Confirmado', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_imagenConfirmado','name' => 'wpfunos_imagenConfirmado','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
      <?php echo wp_get_attachment_image(  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenConfirmado', true ) ); ?>
    </li>
    <li class="conf_img_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_imagenNoConfirmado' ); ?>"> <?php esc_html_e('Imagen No Confirmado', 'wpfunos');?></label> 
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_imagenNoConfirmado','name' => 'wpfunos_imagenNoConfirmado','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
      <?php echo wp_get_attachment_image(  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenNoConfirmado', true ) ); ?>
    </li>
    <li class="conf_img_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_imagenEcologico' ); ?>"> <?php esc_html_e('Imagen Ecológico', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_imagenEcologico','name' => 'wpfunos_imagenEcologico','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
      <?php echo wp_get_attachment_image(  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenEcologico', true ) ); ?>
    </li>
    <li class="conf_img_wpfunos_list">
      <label for="<?php esc_html_e('wpfunos_imagenPromo' ); ?>"> <?php esc_html_e('Imagen Promo', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_imagenPromo','name' => 'wpfunos_imagenPromo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
      <?php echo wp_get_attachment_image(  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenPromo', true ) ); ?>
    </li>
  </ul>
</div>
<?php
