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
      <label for="<?php esc_html_e($this->plugin_name . '_provinciasProvincia' ); ?>"> <?php esc_html_e('Provincia', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasProvincia','name' => $this->plugin_name . '_provinciasProvincia','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="provincias_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_provinciasCodigo' ); ?>"> <?php esc_html_e('Código Provincia', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasCodigo','name' => $this->plugin_name . '_provinciasCodigo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
    <li class="provincias_wpfunos_list">
      <label for="<?php esc_html_e($this->plugin_name . '_Dummy' ); ?>"> <?php esc_html_e('Activo', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_Dummy','name' => $this->plugin_name . '_Dummy','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
  </ul>
  <li class="provincias_wpfunos_list">
    <label for="<?php esc_html_e($this->plugin_name . '_provinciasTitulo' ); ?>"> <?php esc_html_e('Título', 'wpfunos');?></label>
    <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'Text','id' => $this->plugin_name . '_provinciasTitulo','name' => $this->plugin_name . '_provinciasTitulo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
  </li>
  <hr/>
  <?php
  $notes_provinciasComentarios = get_post_meta( $post->ID, $this->plugin_name . '_provinciasComentarios', true );
  $args_provinciasComentarios = array( 'textarea_name' => $this->plugin_name . '_provinciasComentarios', );
  ?>
  <li><label for="'.$this->plugin_name.'_provinciasComentarios" style="font-size: 32px;">Comentarios</label>
    <?php	wp_editor( $notes_provinciasComentarios, $this->plugin_name . '_provinciasComentarios',$args_provinciasComentarios); ?>
  </li>
  <hr/>
  <li class="usuarios_wpfunos_list">
    <table>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Sin velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEESS','name' => $this->plugin_name . '_provinciasEESS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK001','name' => $this->plugin_name . '_provinciasCK001','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEESO','name' => $this->plugin_name . '_provinciasEESO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK002','name' => $this->plugin_name . '_provinciasCK002','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEESC','name' => $this->plugin_name . '_provinciasEESC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK003','name' => $this->plugin_name . '_provinciasCK003','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEESR','name' => $this->plugin_name . '_provinciasEESR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK004','name' => $this->plugin_name . '_provinciasCK004','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Con velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEEVS','name' => $this->plugin_name . '_provinciasEEVS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK005','name' => $this->plugin_name . '_provinciasCK005','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Con velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEEVO','name' => $this->plugin_name . '_provinciasEEVO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK006','name' => $this->plugin_name . '_provinciasCK006','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Con velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEEVC','name' => $this->plugin_name . '_provinciasEEVC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK007','name' => $this->plugin_name . '_provinciasCK007','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEEVR','name' => $this->plugin_name . '_provinciasEEVR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK008','name' => $this->plugin_name . '_provinciasCK008','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Sin velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEMSS','name' => $this->plugin_name . '_provinciasEMSS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK009','name' => $this->plugin_name . '_provinciasCK009','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEMSO','name' => $this->plugin_name . '_provinciasEMSO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK010','name' => $this->plugin_name . '_provinciasCK010','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEMSC','name' => $this->plugin_name . '_provinciasEMSC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK011','name' => $this->plugin_name . '_provinciasCK011','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEMSR','name' => $this->plugin_name . '_provinciasEMSR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK012','name' => $this->plugin_name . '_provinciasCK012','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Con velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEMVS','name' => $this->plugin_name . '_provinciasEMVS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK013','name' => $this->plugin_name . '_provinciasCK013','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEMVO','name' => $this->plugin_name . '_provinciasEMVO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK014','name' => $this->plugin_name . '_provinciasCK014','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Con velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEMVC','name' => $this->plugin_name . '_provinciasEMVC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK015','name' => $this->plugin_name . '_provinciasCK015','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEMVR','name' => $this->plugin_name . '_provinciasEMVR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK016','name' => $this->plugin_name . '_provinciasCK016','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Sin velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEPSS','name' => $this->plugin_name . '_provinciasEPSS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK017','name' => $this->plugin_name . '_provinciasCK017','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEPSO','name' => $this->plugin_name . '_provinciasEPSO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK018','name' => $this->plugin_name . '_provinciasCK018','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEPSC','name' => $this->plugin_name . '_provinciasEPSC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK019','name' => $this->plugin_name . '_provinciasCK019','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEPSR','name' => $this->plugin_name . '_provinciasEPSR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK020','name' => $this->plugin_name . '_provinciasCK020','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Con velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEPVS','name' => $this->plugin_name . '_provinciasEPVS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK021','name' => $this->plugin_name . '_provinciasCK021','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEPVO','name' => $this->plugin_name . '_provinciasEPVO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK022','name' => $this->plugin_name . '_provinciasCK022','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Con velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEPVC','name' => $this->plugin_name . '_provinciasEPVC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK023','name' => $this->plugin_name . '_provinciasCK023','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasEPVR','name' => $this->plugin_name . '_provinciasEPVR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK024','name' => $this->plugin_name . '_provinciasCK024','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Sin velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIESS','name' => $this->plugin_name . '_provinciasIESS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK025','name' => $this->plugin_name . '_provinciasCK025','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIESO','name' => $this->plugin_name . '_provinciasIESO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK026','name' => $this->plugin_name . '_provinciasCK026','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIESC','name' => $this->plugin_name . '_provinciasIESC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK027','name' => $this->plugin_name . '_provinciasCK027','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIESR','name' => $this->plugin_name . '_provinciasIESR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK028','name' => $this->plugin_name . '_provinciasCK028','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Con velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIEVS','name' => $this->plugin_name . '_provinciasIEVS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK029','name' => $this->plugin_name . '_provinciasCK029','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIEVO','name' => $this->plugin_name . '_provinciasIEVO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK030','name' => $this->plugin_name . '_provinciasCK030','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Con velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIEVC','name' => $this->plugin_name . '_provinciasIEVC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK031','name' => $this->plugin_name . '_provinciasCK031','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIEVR','name' => $this->plugin_name . '_provinciasIEVR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK032','name' => $this->plugin_name . '_provinciasCK032','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Sin velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIMSS','name' => $this->plugin_name . '_provinciasIMSS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK033','name' => $this->plugin_name . '_provinciasCK033','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIMSO','name' => $this->plugin_name . '_provinciasIMSO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK034','name' => $this->plugin_name . '_provinciasCK034','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIMSC','name' => $this->plugin_name . '_provinciasIMSC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK035','name' => $this->plugin_name . '_provinciasCK035','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIMSR','name' => $this->plugin_name . '_provinciasIMSR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK036','name' => $this->plugin_name . '_provinciasCK036','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Con velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIMVS','name' => $this->plugin_name . '_provinciasIMVS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK037','name' => $this->plugin_name . '_provinciasCK037','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIMVO','name' => $this->plugin_name . '_provinciasIMVO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK038','name' => $this->plugin_name . '_provinciasCK038','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Con velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIMVC','name' => $this->plugin_name . '_provinciasIMVC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK039','name' => $this->plugin_name . '_provinciasCK039','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIMVR','name' => $this->plugin_name . '_provinciasIMVR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK040','name' => $this->plugin_name . '_provinciasCK040','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Sin velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIPSS','name' => $this->plugin_name . '_provinciasIPSS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK041','name' => $this->plugin_name . '_provinciasCK041','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIPSO','name' => $this->plugin_name . '_provinciasIPSO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK042','name' => $this->plugin_name . '_provinciasCK042','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIPSC','name' => $this->plugin_name . '_provinciasIPSC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK043','name' => $this->plugin_name . '_provinciasCK043','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIPSR','name' => $this->plugin_name . '_provinciasIPSR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK044','name' => $this->plugin_name . '_provinciasCK044','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Con velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIPVS','name' => $this->plugin_name . '_provinciasIPVS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK045','name' => $this->plugin_name . '_provinciasCK045','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIPVO','name' => $this->plugin_name . '_provinciasIPVO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK046','name' => $this->plugin_name . '_provinciasCK046','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Con velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIPVC','name' => $this->plugin_name . '_provinciasIPVC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK047','name' => $this->plugin_name . '_provinciasCK047','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_provinciasIPVR','name' => $this->plugin_name . '_provinciasIPVR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_provinciasCK048','name' => $this->plugin_name . '_provinciasCK048','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

    </table>
  </li>
  <hr/>
</div>
<?php
