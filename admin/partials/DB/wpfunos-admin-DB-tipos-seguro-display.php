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
<div class="tipos_seguro_wpfunos_containers">
  <ul class="tipos_seguro_wpfunos_data_metabox">
    <li class="tipos_seguro_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_tipoSeguroNombre' ); ?>"> <?php esc_html_e('Nombre', 'wpfunos');?></label> 
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_tipoSeguroNombre','name' => $this->plugin_name . '_tipoSeguroNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="tipos_seguro_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_tipoSeguroDisplay' ); ?>"> <?php esc_html_e('Display', 'wpfunos');?></label> 
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_tipoSeguroDisplay','name' => $this->plugin_name . '_tipoSeguroDisplay','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="tipos_seguro_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_tipoSeguroOrden' ); ?>"> <?php esc_html_e('Orden', 'wpfunos');?></label> 
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'number','id' => $this->plugin_name . '_tipoSeguroOrden','name' => $this->plugin_name . '_tipoSeguroOrden','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="tipos_seguro_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_tipoSeguroActivo' ); ?>"> <?php esc_html_e('Activo', 'wpfunos');?></label>
      <?php  $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_tipoSeguroActivo','name' => $this->plugin_name . '_tipoSeguroActivo','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?>
    </li>
    <?php
    $notes_tipoSeguroComentario = get_post_meta( $post->ID, $this->plugin_name . '_tipoSeguroComentario', true );
    $args_tipoSeguroComentario = array( 'textarea_name' => $this->plugin_name . '_tipoSeguroComentario',  'wpautop' => false,);
    ?>
    <li><label for="'.$this->plugin_name.'_tipoSeguroComentario" style="font-size: 32px;">Notas</label>
      <?php	wp_editor( $notes_tipoSeguroComentario, $this->plugin_name . '_tipoSeguroComentario',$args_tipoSeguroComentario); ?>
    </li>
  </ul>
</div>
<?php
