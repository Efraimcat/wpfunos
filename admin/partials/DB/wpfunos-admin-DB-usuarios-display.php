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
 ?><div class="usuarios_wpfunos_containers"><?php
 ?><ul class="usuarios_wpfunos_data_metabox">
  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_TimeStamp' ); ?>"> <?php esc_html_e('Timestamp', 'wpfunos');?></label> <?php
     $this->wpfunos_render_settings_field(array(
       'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_TimeStamp','name' => $this->plugin_name . '_TimeStamp',
       'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
   ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userMail' ); ?>"> <?php esc_html_e('Correo electrónico', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userMail','name' => $this->plugin_name . '_userMail',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userReferencia' ); ?>"> <?php esc_html_e('Referencia', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userReferencia','name' => $this->plugin_name . '_userReferencia',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userName' ); ?>"> <?php esc_html_e('Nombre', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userName','name' => $this->plugin_name . '_userName',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userSurname' ); ?>"> <?php esc_html_e('Apellidos', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userSurname','name' => $this->plugin_name . '_userSurname',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userPhone' ); ?>"> <?php esc_html_e('Teléfono', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userPhone','name' => $this->plugin_name . '_userPhone',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userSeguro' ); ?>"> <?php esc_html_e('Seguro', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userSeguro','name' => $this->plugin_name . '_userSeguro',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userLead' ); ?>"> <?php esc_html_e('Lead', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userLead','name' => $this->plugin_name . '_userLead',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userSeleccion' ); ?>"> <?php esc_html_e('Selección', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userSeleccion','name' => $this->plugin_name . '_userSeleccion',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userCP' ); ?>"> <?php esc_html_e('Código Postal', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userCP','name' => $this->plugin_name . '_userCP',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userAccion' ); ?>"> <?php esc_html_e('Acción', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userAccion','name' => $this->plugin_name . '_userAccion',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userPrecio' ); ?>"> <?php esc_html_e('Precio', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userPrecio','name' => $this->plugin_name . '_userPrecio',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userServicio' ); ?>"> <?php esc_html_e('Servicio', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userServicio','name' => $this->plugin_name . '_userServicio',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>
	
  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userNombreAccion' ); ?>"> <?php esc_html_e('Nombre acción', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreAccion','name' => $this->plugin_name . '_userNombreAccion',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userNombreSeleccionUbicacion' ); ?>"> <?php esc_html_e('Nombre selección ubicación', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreSeleccionUbicacion','name' => $this->plugin_name . '_userNombreSeleccionUbicacion',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userNombreSeleccionDistancia' ); ?>"> <?php esc_html_e('Nombre selección distancia', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreSeleccionDistancia','name' => $this->plugin_name . '_userNombreSeleccionDistancia',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userNombreSeleccionServicio' ); ?>"> <?php esc_html_e('Nombre selección servicio', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreSeleccionServicio','name' => $this->plugin_name . '_userNombreSeleccionServicio',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userNombreSeleccionAtaud' ); ?>"> <?php esc_html_e('Nombre selección ataúd', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreSeleccionAtaud','name' => $this->plugin_name . '_userNombreSeleccionAtaud',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>

  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userNombreSeleccionVelatorio' ); ?>"> <?php esc_html_e('Nombre selección velatorio', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreSeleccionVelatorio','name' => $this->plugin_name . '_userNombreSeleccionVelatorio',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>
	
  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userNombreSeleccionDespedida' ); ?>"> <?php esc_html_e('Nombre selección despedida', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userNombreSeleccionDespedida','name' => $this->plugin_name . '_userNombreSeleccionDespedida',
          'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
    ));
  ?></li>
	
  <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userAceptaPolitica' ); ?>"> <?php esc_html_e('Acepta política privacidad', 'wpfunos');?></label> <?php
      $this->wpfunos_render_settings_field(array(
        'type' => 'input','subtype' => 'checkbox','id' => $this->plugin_name . '_userAceptaPolitica','name' => $this->plugin_name . '_userAceptaPolitica',
      'required' => '','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'size' => 7, 'disabled' => 'disabled'
    ));
  ?></li>
	
    <hr/>

    <?php  //Precio base?>
    <li class="servicios_wpfunos_list">
      <table>
        <tr>
          <td>Nombre</td><td>Precio</td><td>Descuento</td><td>Total</td>
        </tr>
        <tr>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseBaseNombre','name' => $this->plugin_name . '_userDesgloseBaseNombre',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20));
          ?></td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseBasePrecio','name' => $this->plugin_name . '_userDesgloseBasePrecio',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>€</td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseBaseDescuento','name' => $this->plugin_name . '_userDesgloseBaseDescuento',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>%</td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseBaseTotal','name' => $this->plugin_name . '_userDesgloseBaseTotal',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>€</td>
        </tr>

        <tr>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDestinoNombre','name' => $this->plugin_name . '_userDesgloseDestinoNombre',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20));
          ?></td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDestinoPrecio','name' => $this->plugin_name . '_userDesgloseDestinoPrecio',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>€</td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDestinoDescuento','name' => $this->plugin_name . '_userDesgloseDestinoDescuento',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>%</td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDestinoTotal','name' => $this->plugin_name . '_userDesgloseDestinoTotal',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>€</td>
        </tr>

        <tr>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseAtaudNombre','name' => $this->plugin_name . '_userDesgloseAtaudNombre',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20));
          ?></td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseAtaudPrecio','name' => $this->plugin_name . '_userDesgloseAtaudPrecio',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>€</td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseAtaudDescuento','name' => $this->plugin_name . '_userDesgloseAtaudDescuento',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>%</td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseAtaudTotal','name' => $this->plugin_name . '_userDesgloseAtaudTotal',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>€</td>
        </tr>

        <tr>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseVelatorioNombre','name' => $this->plugin_name . '_userDesgloseVelatorioNombre',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20));
          ?></td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseVelatorioPrecio','name' => $this->plugin_name . '_userDesgloseVelatorioPrecio',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>€</td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseVelatorioDescuento','name' => $this->plugin_name . '_userDesgloseVelatorioDescuento',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>%</td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseVelatorioTotal','name' => $this->plugin_name . '_userDesgloseVelatorioTotal',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>€</td>
        </tr>

        <tr>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseCeremoniaNombre','name' => $this->plugin_name . '_userDesgloseCeremoniaNombre',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20));
          ?></td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseCeremoniaPrecio','name' => $this->plugin_name . '_userDesgloseCeremoniaPrecio',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>€</td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseCeremoniaDescuento','name' => $this->plugin_name . '_userDesgloseCeremoniaDescuento',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>%</td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseCeremoniaTotal','name' => $this->plugin_name . '_userDesgloseCeremoniaTotal',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>€</td>
        </tr>

        <tr>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDescuentoGenerico','name' => $this->plugin_name . '_userDesgloseDescuentoGenerico',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 20));
          ?></td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDescuentoGenericoPrecio','name' => $this->plugin_name . '_useruserDesgloseDescuentoGenericoPrecio',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>€</td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDescuentoGenericoDescuento','name' => $this->plugin_name . '_userDesgloseDescuentoGenericoDescuento',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>%</td>
          <td><?php $this->wpfunos_render_settings_field(array(
            'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userDesgloseDescuentoGenericoTotal','name' => $this->plugin_name . '_userDesgloseDescuentoGenericoTotal',
             'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID, 'disabled' => '', 'size' => 7));
          ?>€</td>
        </tr>


      </table>
    </li>

	<hr/>
    
    <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userAPITipo' ); ?>"> <?php esc_html_e('Tipo API', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userAPITipo','name' => $this->plugin_name . '_userAPITipo',
            'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
      ));
    ?></li>
    <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userAPIBody' ); ?>"> <?php esc_html_e('Body API', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userAPIBody','name' => $this->plugin_name . '_userAPIBody',
            'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
      ));
    ?></li>
    <li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userAPIMessage' ); ?>"> <?php esc_html_e('Mensaje API', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userAPIMessage','name' => $this->plugin_name . '_userAPIMessage',
            'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
      ));
    ?></li>
	<li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userIP' ); ?>"> <?php esc_html_e('IP', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userIP','name' => $this->plugin_name . '_userIP',
            'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
      ));
    ?></li>
	<li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userLAT' ); ?>"> <?php esc_html_e('LAT', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userLAT','name' => $this->plugin_name . '_userLAT',
            'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
      ));
    ?></li>
	<li class="usuarios_wpfunos_list"><label for="<?php esc_html_e($this->plugin_name . '_userLNG' ); ?>"> <?php esc_html_e('LNG', 'wpfunos');?></label> <?php
        $this->wpfunos_render_settings_field(array(
          'type' => 'input','subtype' => 'text','id' => $this->plugin_name . '_userLNG','name' => $this->plugin_name . '_userLNG',
            'required' => 'required','get_options_list' => '','value_type' => 'normal','wp_data' => 'post_meta','post_id' => $post->ID,'disabled' => ''
      ));
    ?></li>



  </ul></div>
