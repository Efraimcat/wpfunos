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
      <label for="<?php esc_html_e('wpfunos_Dummy' ); ?>"> <?php esc_html_e('Activo', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_Dummy','name' => 'wpfunos_Dummy','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
    </li>
  </ul>
  <li class="provincias_wpfunos_list">
    <label for="<?php esc_html_e('wpfunos_provinciasTitulo' ); ?>"> <?php esc_html_e('Título', 'wpfunos');?></label>
    <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'Text','id' => 'wpfunos_provinciasTitulo','name' => 'wpfunos_provinciasTitulo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?>
  </li>
  <hr/>
  <?php
  $notes_provinciasComentarios = get_post_meta( $post->ID, 'wpfunos_provinciasComentarios', true );
  $args_provinciasComentarios = array( 'textarea_name' => 'wpfunos_provinciasComentarios', );
  ?>
  <li><label for="'.'wpfunos_provinciasComentarios" style="font-size: 32px;">Comentarios</label>
    <?php	wp_editor( $notes_provinciasComentarios, 'wpfunos_provinciasComentarios',$args_provinciasComentarios); ?>
  </li>
  <hr/>
  <li class="usuarios_wpfunos_list">
    <table>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Sin velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEESS','name' => 'wpfunos_provinciasEESS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEESS_ck','name' => 'wpfunos_provinciasEESS_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEESO','name' => 'wpfunos_provinciasEESO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEESO_ck','name' => 'wpfunos_provinciasEESO_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEESC','name' => 'wpfunos_provinciasEESC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEESC_ck','name' => 'wpfunos_provinciasEESC_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEESR','name' => 'wpfunos_provinciasEESR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEESR_ck','name' => 'wpfunos_provinciasEESR_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Con velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEEVS','name' => 'wpfunos_provinciasEEVS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEEVS_ck','name' => 'wpfunos_provinciasEEVS_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Con velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEEVO','name' => 'wpfunos_provinciasEEVO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEEVO_ck','name' => 'wpfunos_provinciasEEVO_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Con velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEEVC','name' => 'wpfunos_provinciasEEVC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEEVC_ck','name' => 'wpfunos_provinciasEEVC_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEEVR','name' => 'wpfunos_provinciasEEVR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEEVR_ck','name' => 'wpfunos_provinciasEEVR_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Sin velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEMSS','name' => 'wpfunos_provinciasEMSS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEMSS_ck','name' => 'wpfunos_provinciasEMSS_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEMSO','name' => 'wpfunos_provinciasEMSO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEMSO_ck','name' => 'wpfunos_provinciasEMSO_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEMSC','name' => 'wpfunos_provinciasEMSC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEMSC_ck','name' => 'wpfunos_provinciasEMSC_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEMSR','name' => 'wpfunos_provinciasEMSR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEMSR_ck','name' => 'wpfunos_provinciasEMSR_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Con velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEMVS','name' => 'wpfunos_provinciasEMVS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEMVS_ck','name' => 'wpfunos_provinciasEMVS_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEMVO','name' => 'wpfunos_provinciasEMVO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEMVO_ck','name' => 'wpfunos_provinciasEMVO_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Con velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEMVC','name' => 'wpfunos_provinciasEMVC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEMVC_ck','name' => 'wpfunos_provinciasEMVC_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEMVR','name' => 'wpfunos_provinciasEMVR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEMVR_ck','name' => 'wpfunos_provinciasEMVR_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Sin velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEPSS','name' => 'wpfunos_provinciasEPSS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEPSS_ck','name' => 'wpfunos_provinciasEPSS_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEPSO','name' => 'wpfunos_provinciasEPSO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEPSO_ck','name' => 'wpfunos_provinciasEPSO_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEPSC','name' => 'wpfunos_provinciasEPSC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEPSC_ck','name' => 'wpfunos_provinciasEPSC_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEPSR','name' => 'wpfunos_provinciasEPSR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEPSR_ck','name' => 'wpfunos_provinciasEPSR_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Con velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEPVS','name' => 'wpfunos_provinciasEPVS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEPVS_ck','name' => 'wpfunos_provinciasEPVS_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEPVO','name' => 'wpfunos_provinciasEPVO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEPVO_ck','name' => 'wpfunos_provinciasEPVO_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Con velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEPVC','name' => 'wpfunos_provinciasEPVC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEPVC_ck','name' => 'wpfunos_provinciasEPVC_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasEPVR','name' => 'wpfunos_provinciasEPVR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasEPVR_ck','name' => 'wpfunos_provinciasEPVR_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Sin velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIESS','name' => 'wpfunos_provinciasIESS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIESS_ck','name' => 'wpfunos_provinciasIESS_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIESO','name' => 'wpfunos_provinciasIESO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIESO_ck','name' => 'wpfunos_provinciasIESO_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIESC','name' => 'wpfunos_provinciasIESC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIESC_ck','name' => 'wpfunos_provinciasIESC_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIESR','name' => 'wpfunos_provinciasIESR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIESR_ck','name' => 'wpfunos_provinciasIESR_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Con velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIEVS','name' => 'wpfunos_provinciasIEVS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIEVS_ck','name' => 'wpfunos_provinciasIEVS_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIEVO','name' => 'wpfunos_provinciasIEVO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIEVO_ck','name' => 'wpfunos_provinciasIEVO_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Con velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIEVC','name' => 'wpfunos_provinciasIEVC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIEVC_ck','name' => 'wpfunos_provinciasIEVC_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIEVR','name' => 'wpfunos_provinciasIEVR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIEVR_ck','name' => 'wpfunos_provinciasIEVR_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Sin velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIMSS','name' => 'wpfunos_provinciasIMSS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIMSS_ck','name' => 'wpfunos_provinciasIMSS_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIMSO','name' => 'wpfunos_provinciasIMSO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIMSO_ck','name' => 'wpfunos_provinciasIMSO_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIMSC','name' => 'wpfunos_provinciasIMSC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIMSC_ck','name' => 'wpfunos_provinciasIMSC_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIMSR','name' => 'wpfunos_provinciasIMSR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIMSR_ck','name' => 'wpfunos_provinciasIMSR_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Con velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIMVS','name' => 'wpfunos_provinciasIMVS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIMVS_ck','name' => 'wpfunos_provinciasIMVS_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIMVO','name' => 'wpfunos_provinciasIMVO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIMVO_ck','name' => 'wpfunos_provinciasIMVO_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Con velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIMVC','name' => 'wpfunos_provinciasIMVC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIMVC_ck','name' => 'wpfunos_provinciasIMVC_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIMVR','name' => 'wpfunos_provinciasIMVR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIMVR_ck','name' => 'wpfunos_provinciasIMVR_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Sin velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIPSS','name' => 'wpfunos_provinciasIPSS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIPSS_ck','name' => 'wpfunos_provinciasIPSS_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIPSO','name' => 'wpfunos_provinciasIPSO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIPSO_ck','name' => 'wpfunos_provinciasIPSO_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIPSC','name' => 'wpfunos_provinciasIPSC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIPSC_ck','name' => 'wpfunos_provinciasIPSC_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIPSR','name' => 'wpfunos_provinciasIPSR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIPSR_ck','name' => 'wpfunos_provinciasIPSR_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Con velatorio + Sin ceremonia', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIPVS','name' => 'wpfunos_provinciasIPVS','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIPVS_ck','name' => 'wpfunos_provinciasIPVS_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIPVO','name' => 'wpfunos_provinciasIPVO','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIPVO_ck','name' => 'wpfunos_provinciasIPVO_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Con velatorio + Con ceremonia civil', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIPVC','name' => 'wpfunos_provinciasIPVC','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIPVC_ck','name' => 'wpfunos_provinciasIPVC_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>
      <tr>
        <td><?php esc_html_e('Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa', 'wpfunos');?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_provinciasIPVR','name' => 'wpfunos_provinciasIPVR','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?></td>
        <td style="width:5px;"></td>
        <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_provinciasIPVR_ck','name' => 'wpfunos_provinciasIPVR_ck','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
      </tr>

    </table>
  </li>
  <hr/>
</div>
<?php
