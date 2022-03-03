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
 $TimeStamp = sanitize_text_field( $_POST[$this->plugin_name . '_TimeStamp'] );
 $userMail = sanitize_text_field( $_POST[$this->plugin_name . '_userMail'] );
 $userReferencia = sanitize_text_field( $_POST[$this->plugin_name . '_userReferencia'] );
 $userName = sanitize_text_field( $_POST[$this->plugin_name . '_userName'] );
 $userSurname = sanitize_text_field( $_POST[$this->plugin_name . '_userSurname'] );
 $userPhone = sanitize_text_field( $_POST[$this->plugin_name . '_userPhone'] );
 $userSeguro = sanitize_text_field( $_POST[$this->plugin_name . '_userSeguro'] );
 $userLead = sanitize_text_field( $_POST[$this->plugin_name . '_userLead'] );
 $userSeleccion = sanitize_text_field( $_POST[$this->plugin_name . '_userSeleccion'] );
 $userCP = sanitize_text_field( $_POST[$this->plugin_name . '_userCP'] );

 $userAccion = sanitize_text_field( $_POST[$this->plugin_name . '_userAccion'] );
 $userPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_userPrecio'] );
 $userServicio = sanitize_text_field( $_POST[$this->plugin_name . '_userServicio'] );

 $userDesgloseBaseNombre = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseBaseNombre'] );
 $userDesgloseBasePrecio = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseBasePrecio'] );
 $userDesgloseBaseDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseBaseDescuento'] );
 $userDesgloseBaseTotal = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseBaseTotal'] );

 $userDesgloseDestinoNombre = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseDestinoNombre'] );
 $userDesgloseDestinoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseDestinoPrecio'] );
 $userDesgloseDestinoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseDestinoDescuento'] );
 $userDesgloseDestinoTotal = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseDestinoTotal'] );

 $userDesgloseAtaudNombre = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseAtaudNombre'] );
 $userDesgloseAtaudPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseAtaudPrecio'] );
 $userDesgloseAtaudDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseAtaudDescuento'] );
 $userDesgloseAtaudTotal = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseAtaudTotal'] );

 $userDesgloseVelatorioNombre = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseVelatorioNombre'] );
 $userDesgloseVelatorioPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseVelatorioPrecio'] );
 $userDesgloseVelatorioDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseVelatorioDescuento'] );
 $userDesgloseVelatorioTotal = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseVelatorioTotal'] );

 $userDesgloseCeremoniaNombre = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseCeremoniaNombre'] );
 $userDesgloseCeremoniaPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseCeremoniaPrecio'] );
 $userDesgloseCeremoniaDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseCeremoniaDescuento'] );
 $userDesgloseCeremoniaTotal = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseCeremoniaTotal'] );

 $userDesgloseDescuentoGenerico = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseDescuentoGenerico'] );
 $userDesgloseDescuentoGenericoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseDescuentoGenericoPrecio'] );
 $userDesgloseDescuentoGenericoDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseDescuentoGenericoDescuento'] );
 $userDesgloseDescuentoGenericoTotal = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseDescuentoGenericoTotal'] );

 $userAPITipo = sanitize_text_field( $_POST[$this->plugin_name . '_userAPITipo'] );
 $userAPIBody = sanitize_text_field( $_POST[$this->plugin_name . '_userAPIBody'] );
 $userAPIMessage = sanitize_text_field( $_POST[$this->plugin_name . '_userAPIMessage'] );

 $userIP = sanitize_text_field( $_POST[$this->plugin_name . '_userIP'] );


 update_post_meta($post_id, $this->plugin_name . '_TimeStamp', $TimeStamp);
 update_post_meta($post_id, $this->plugin_name . '_userMail', $userMail);
 update_post_meta($post_id, $this->plugin_name . '_userReferencia', $userReferencia);
 update_post_meta($post_id, $this->plugin_name . '_userName', $userName);
 update_post_meta($post_id, $this->plugin_name . '_userSurname', $userSurname);
 update_post_meta($post_id, $this->plugin_name . '_userPhone', $userPhone);
 update_post_meta($post_id, $this->plugin_name . '_userSeguro', $userSeguro);
 update_post_meta($post_id, $this->plugin_name . '_userLead', $userLead);
 update_post_meta($post_id, $this->plugin_name . '_userSeleccion', $userSeleccion);
 update_post_meta($post_id, $this->plugin_name . '_userCP', $userCP);

 update_post_meta($post_id, $this->plugin_name . '_userAccion', $userAccion );
 update_post_meta($post_id, $this->plugin_name . '_userPrecio', $userPrecio );
 update_post_meta($post_id, $this->plugin_name . '_userServicio', $userServicio );

 update_post_meta($post_id, $this->plugin_name . '_userDesgloseBaseNombre', $userDesgloseBaseNombre );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseBasePrecio', $userDesgloseBasePrecio );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseBaseDescuento', $userDesgloseBaseDescuento );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseBaseTotal', $userDesgloseBaseTotal );

 update_post_meta($post_id, $this->plugin_name . '_userDesgloseDestinoNombre', $userDesgloseDestinoNombre );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseDestinoPrecio', $userDesgloseDestinoPrecio );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseDestinoDescuento', $userDesgloseDestinoDescuento );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseDestinoTotal', $userDesgloseDestinoTotal );

 update_post_meta($post_id, $this->plugin_name . '_userDesgloseAtaudNombre', $userDesgloseAtaudNombre );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseAtaudPrecio', $userDesgloseAtaudPrecio );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseAtaudDescuento', $userDesgloseAtaudDescuento );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseAtaudTotal', $userDesgloseAtaudTotal );

 update_post_meta($post_id, $this->plugin_name . '_userDesgloseVelatorioNombre', $userDesgloseVelatorioNombre );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseVelatorioPrecio', $userDesgloseVelatorioPrecio );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseVelatorioDescuento', $userDesgloseVelatorioDescuento );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseVelatorioTotal', $userDesgloseVelatorioTotal );

 update_post_meta($post_id, $this->plugin_name . '_userDesgloseCeremoniaNombre', $userDesgloseCeremoniaNombre );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseCeremoniaPrecio', $userDesgloseCeremoniaPrecio );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseCeremoniaDescuento', $userDesgloseCeremoniaDescuento );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseCeremoniaTotal', $userDesgloseCeremoniaTotal );

 update_post_meta($post_id, $this->plugin_name . '_userDesgloseDescuentoGenerico', $userDesgloseDescuentoGenerico );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseDescuentoGenericoPrecio', $userDesgloseDescuentoGenericoPrecio );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseDescuentoGenericoDescuento', $userDesgloseDescuentoGenericoDescuento );
 update_post_meta($post_id, $this->plugin_name . '_userDesgloseDescuentoGenericoTotal', $userDesgloseDescuentoGenericoTotal );

 update_post_meta($post_id, $this->plugin_name . '_userAPITipo', $userAPITipo);
 update_post_meta($post_id, $this->plugin_name . '_userAPIBody', $userAPIBody);
 update_post_meta($post_id, $this->plugin_name . '_userAPIMessage', $userAPIMessage);

 update_post_meta($post_id, $this->plugin_name . '_userIP', $userIP);
