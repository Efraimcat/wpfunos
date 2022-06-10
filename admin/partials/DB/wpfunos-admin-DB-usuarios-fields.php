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
$userDifunto = sanitize_text_field( $_POST[$this->plugin_name . '_userDifunto'] );

$userServicioEnviado = sanitize_text_field( $_POST[$this->plugin_name . '_userServicioEnviado'] );
$userServicioTitulo = sanitize_text_field( $_POST[$this->plugin_name . '_userServicioTitulo'] );
$userServicioEmpresa = sanitize_text_field( $_POST[$this->plugin_name . '_userServicioEmpresa'] );
$userServicioPoblacion = sanitize_text_field( $_POST[$this->plugin_name . '_userServicioPoblacion'] );
$userServicioProvincia = sanitize_text_field( $_POST[$this->plugin_name . '_userServicioProvincia'] );

$userComentarios = wp_kses_post( $_POST[$this->plugin_name . '_userComentarios'] );
$userFuneraria = wp_kses_post( $_POST[$this->plugin_name . '_userFuneraria'] );
$userContratado = sanitize_text_field( $_POST[$this->plugin_name . '_userContratado'] );

$userNombreAccion = sanitize_text_field( $_POST[$this->plugin_name . '_userNombreAccion'] );
$userNombreSeleccionUbicacion = sanitize_text_field( $_POST[$this->plugin_name . '_userNombreSeleccionUbicacion'] );
$userNombreSeleccionDistancia = sanitize_text_field( $_POST[$this->plugin_name . '_userNombreSeleccionDistancia'] );
$userNombreSeleccionServicio = sanitize_text_field( $_POST[$this->plugin_name . '_userNombreSeleccionServicio'] );
$userNombreSeleccionAtaud = sanitize_text_field( $_POST[$this->plugin_name . '_userNombreSeleccionAtaud'] );
$userNombreSeleccionVelatorio = sanitize_text_field( $_POST[$this->plugin_name . '_userNombreSeleccionVelatorio'] );
$userNombreSeleccionDespedida = sanitize_text_field( $_POST[$this->plugin_name . '_userNombreSeleccionDespedida'] );

$userAccion = sanitize_text_field( $_POST[$this->plugin_name . '_userAccion'] );
$userPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_userPrecio'] );
$userServicio = sanitize_text_field( $_POST[$this->plugin_name . '_userServicio'] );

$userDesgloseBaseNombre = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseBaseNombre'] );
$userDesgloseBaseEmpresa = sanitize_text_field( $_POST[$this->plugin_name . '_userDesgloseBaseEmpresa'] );
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
$userAPImessagebody = sanitize_text_field( $_POST[$this->plugin_name . '_userAPImessagebody'] );
$userAPImessageresponse = sanitize_text_field( $_POST[$this->plugin_name . '_userAPImessageresponse'] );
$userAPImessagecode = sanitize_text_field( $_POST[$this->plugin_name . '_userAPImessagecode'] );
$userAPImessagemessage = sanitize_text_field( $_POST[$this->plugin_name . '_userAPImessagemessage'] );

$userwpf = sanitize_text_field( $_POST[$this->plugin_name . '_userwpf'] );
$userURL = sanitize_text_field( $_POST[$this->plugin_name . '_userURL'] );

$userIP = sanitize_text_field( $_POST[$this->plugin_name . '_userIP'] );
$userAceptaPolitica = sanitize_text_field( $_POST[$this->plugin_name . '_userAceptaPolitica'] );
$userLAT = sanitize_text_field( $_POST[$this->plugin_name . '_userLAT'] );
$userLNG = sanitize_text_field( $_POST[$this->plugin_name . '_userLNG'] );
$userPluginVersion = sanitize_text_field( $_POST[$this->plugin_name . '_userPluginVersion'] );
$userVisitas = sanitize_text_field( $_POST[$this->plugin_name . '_userVisitas'] );
$Dummy = sanitize_text_field( $_POST[$this->plugin_name . '_Dummy'] );
$IDstamp= sanitize_text_field( $_POST['IDstamp'] );

$resp1 = sanitize_text_field( $_POST['resp1'] );
$resp2 = sanitize_text_field( $_POST['resp2'] );
$resp3 = sanitize_text_field( $_POST['resp3'] );
$resp4 = sanitize_text_field( $_POST['resp4'] );

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
update_post_meta($post_id, $this->plugin_name . '_userDifunto', $userDifunto);

update_post_meta($post_id, $this->plugin_name . '_userServicioEnviado', $userServicioEnviado);
update_post_meta($post_id, $this->plugin_name . '_userServicioTitulo', $userServicioTitulo);
update_post_meta($post_id, $this->plugin_name . '_userServicioEmpresa', $userServicioEmpresa);
update_post_meta($post_id, $this->plugin_name . '_userServicioPoblacion', $userServicioPoblacion);
update_post_meta($post_id, $this->plugin_name . '_userServicioProvincia', $userServicioProvincia);

update_post_meta($post_id, $this->plugin_name . '_userComentarios', $userComentarios);
update_post_meta($post_id, $this->plugin_name . '_userContratado', $userContratado);
update_post_meta($post_id, $this->plugin_name . '_userFuneraria', $userFuneraria);

update_post_meta($post_id, $this->plugin_name . '_userNombreAccion', $userNombreAccion);
update_post_meta($post_id, $this->plugin_name . '_userNombreSeleccionUbicacion', $userNombreSeleccionUbicacion);
update_post_meta($post_id, $this->plugin_name . '_userNombreSeleccionDistancia', $userNombreSeleccionDistancia);
update_post_meta($post_id, $this->plugin_name . '_userNombreSeleccionServicio', $userNombreSeleccionServicio);
update_post_meta($post_id, $this->plugin_name . '_userNombreSeleccionAtaud', $userNombreSeleccionAtaud);
update_post_meta($post_id, $this->plugin_name . '_userNombreSeleccionVelatorio', $userNombreSeleccionVelatorio);
update_post_meta($post_id, $this->plugin_name . '_userNombreSeleccionDespedida', $userNombreSeleccionDespedida);

update_post_meta($post_id, $this->plugin_name . '_userAccion', $userAccion );
update_post_meta($post_id, $this->plugin_name . '_userPrecio', $userPrecio );
update_post_meta($post_id, $this->plugin_name . '_userServicio', $userServicio );

update_post_meta($post_id, $this->plugin_name . '_userDesgloseBaseNombre', $userDesgloseBaseNombre );
update_post_meta($post_id, $this->plugin_name . '_userDesgloseBaseEmpresa', $userDesgloseBaseEmpresa );
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
update_post_meta($post_id, $this->plugin_name . '_userAPIMessagebody', $userAPIMessagebody);
update_post_meta($post_id, $this->plugin_name . '_userAPIMessageresponse', $userAPIMessageresponse);
update_post_meta($post_id, $this->plugin_name . '_userAPIMessagecode', $userAPIMessagecode);
update_post_meta($post_id, $this->plugin_name . '_userAPIMessagemessage', $userAPIMessagemessage);

update_post_meta($post_id, $this->plugin_name . '_userwpf', $userwpf);
update_post_meta($post_id, $this->plugin_name . '_userURL', $userURL);

update_post_meta($post_id, $this->plugin_name . '_userIP', $userIP);
update_post_meta($post_id, $this->plugin_name . '_userAceptaPolitica', $userAceptaPolitica);
update_post_meta($post_id, $this->plugin_name . '_userLAT', $userLAT);
update_post_meta($post_id, $this->plugin_name . '_userLNG', $userLNG);
update_post_meta($post_id, $this->plugin_name . '_userPluginVersion', $userPluginVersion);
update_post_meta($post_id, $this->plugin_name . '_userVisitas', $userVisitas);
update_post_meta($post_id, $this->plugin_name . '_Dummy', $Dummy);
update_post_meta($post_id, 'IDstamp', $IDstamp);

update_post_meta($post_id, 'resp1', $resp1);
update_post_meta($post_id, 'resp2', $resp2);
update_post_meta($post_id, 'resp3', $resp3);
update_post_meta($post_id, 'resp4', $resp4);
