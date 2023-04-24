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
<div class="aseguradoras_wpfunos_containers">
  <ul class="aseguradoras_wpfunos_data_metabox">
    <li class="usuarios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Nombre', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Dirección', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Correo', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('API (DKV/PREVENTIVA/ELECTIUM)', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_aseguradorasNombre','name' => 'wpfunos_aseguradorasNombre','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_aseguradorasDireccion','name' => 'wpfunos_aseguradorasDireccion','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_aseguradorasCorreo','name' => 'wpfunos_aseguradorasCorreo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_aseguradorasAPI','name' => 'wpfunos_aseguradorasAPI','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="usuarios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Empresa', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Telefono', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Tipo de Seguro', 'wpfunos');?></td>
          <td style="width:5px;"></td>
          <td></td>
          <td style="width:5px;"></td>
          <td><?php esc_html_e('Orden', 'wpfunos');?></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_aseguradorasEmpresa','name' => 'wpfunos_aseguradorasEmpresa','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_aseguradorasTelefono','name' => 'wpfunos_aseguradorasTelefono','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_aseguradorasTipoSeguro','name' => 'wpfunos_aseguradorasTipoSeguro','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
          <td style="width:5px;"></td>
          <td style="width:250px;">
            <?php
            $tipoSeguroNombre = get_post_meta( get_post_meta( $_GET['post'] , 'wpfunos_aseguradorasTipoSeguro', true ), 'wpfunos_tipoSeguroNombre', true );
            update_post_meta( $_GET['post'], 'wpfunos_aseguradorasTipoSeguroNombre', $tipoSeguroNombre);
            echo $tipoSeguroNombre;
            ?>
          </td>
          <td style="width:5px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_aseguradorasOrden','name' => 'wpfunos_aseguradorasOrden','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7));?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <li class="usuarios_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Cold Lead', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td><?php esc_html_e('Lead', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td><?php esc_html_e('Lead2', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td><?php esc_html_e('Activo', 'wpfunos');?></td>
          <td style="width:15px;"></td>
          <td><?php esc_html_e('Logo', 'wpfunos');?></td>
          <td></td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_aseguradorasColdLead','name' => 'wpfunos_aseguradorasColdLead','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
          <td style="width:15px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_aseguradorasLead','name' => 'wpfunos_aseguradorasLead','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
          <td style="width:15px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_aseguradorasLead2','name' => 'wpfunos_aseguradorasLead2','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
          <td style="width:15px;"></td>
          <td><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_aseguradorasActivo','name' => 'wpfunos_aseguradorasActivo','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
          <td style="width:15px;"></td>
          <td style="vertical-align: middle;"><?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'text','id' => 'wpfunos_aseguradorasLogo','name' => 'wpfunos_aseguradorasLogo','required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID));?></td>
          <td style="vertical-align: middle;"><?php echo wp_get_attachment_image( get_post_meta( $_GET['post'], 'wpfunos_aseguradorasLogo', true ),'full' ); ?></td>
        </tr>
      </table>
    </li>
    <hr/>
    <?php
    $notes_aseguradorasNotas = get_post_meta( $post->ID, 'wpfunos_aseguradorasNotas', true );
    $args_aseguradorasNotas = array( 'textarea_name' => 'wpfunos_aseguradorasNotas', 'wpautop' => false, );
    ?>
    <li><label for="'.'wpfunos_aseguradorasNotas" style="font-size: 32px;">Notas Aseguradora</label>
      <?php wp_editor( $notes_aseguradorasNotas, 'wpfunos_aseguradorasNotas',$args_aseguradorasNotas); ?>
    </li>

    <li>
      <label for="<?php esc_html_e('wpfunos_aseguradorasDummy' ); ?>"> <?php esc_html_e('', 'wpfunos');?></label>
      <?php $this->wpfunos_render_settings_field(array('type' => 'input','subtype' => 'checkbox','id' => 'wpfunos_aseguradorasDummy','name' => 'wpfunos_aseguradorasDummy','required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7 ));?>
    </li>
  </ul>
</div>
<?php
