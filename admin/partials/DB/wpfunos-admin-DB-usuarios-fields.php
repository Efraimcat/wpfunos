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
$TimeStamp = sanitize_text_field( $_POST['wpfunos_TimeStamp'] );
$userMail = sanitize_text_field( $_POST['wpfunos_userMail'] );
$userReferencia = sanitize_text_field( $_POST['wpfunos_userReferencia'] );
$userName = sanitize_text_field( $_POST['wpfunos_userName'] );
$userSurname = sanitize_text_field( $_POST['wpfunos_userSurname'] );
$userPhone = sanitize_text_field( $_POST['wpfunos_userPhone'] );
$userSeguro = sanitize_text_field( $_POST['wpfunos_userSeguro'] );
$userLead = sanitize_text_field( $_POST['wpfunos_userLead'] );
$userSeleccion = sanitize_text_field( $_POST['wpfunos_userSeleccion'] );
$userCP = sanitize_text_field( $_POST['wpfunos_userCP'] );
$userDifunto = sanitize_text_field( $_POST['wpfunos_userDifunto'] );

$userServicioEnviado = sanitize_text_field( $_POST['wpfunos_userServicioEnviado'] );
$userServicioTitulo = sanitize_text_field( $_POST['wpfunos_userServicioTitulo'] );
$userServicioEmpresa = sanitize_text_field( $_POST['wpfunos_userServicioEmpresa'] );
$userServicioPoblacion = sanitize_text_field( $_POST['wpfunos_userServicioPoblacion'] );
$userServicioProvincia = sanitize_text_field( $_POST['wpfunos_userServicioProvincia'] );

$userComentarios = wp_kses_post( $_POST['wpfunos_userComentarios'] );
$userFuneraria = wp_kses_post( $_POST['wpfunos_userFuneraria'] );
$userContratado = sanitize_text_field( $_POST['wpfunos_userContratado'] );

$userNombreAccion = sanitize_text_field( $_POST['wpfunos_userNombreAccion'] );
$userNombreSeleccionUbicacion = sanitize_text_field( $_POST['wpfunos_userNombreSeleccionUbicacion'] );
$userNombreSeleccionDistancia = sanitize_text_field( $_POST['wpfunos_userNombreSeleccionDistancia'] );
$userNombreSeleccionServicio = sanitize_text_field( $_POST['wpfunos_userNombreSeleccionServicio'] );
$userNombreSeleccionAtaud = sanitize_text_field( $_POST['wpfunos_userNombreSeleccionAtaud'] );
$userNombreSeleccionVelatorio = sanitize_text_field( $_POST['wpfunos_userNombreSeleccionVelatorio'] );
$userNombreSeleccionDespedida = sanitize_text_field( $_POST['wpfunos_userNombreSeleccionDespedida'] );

$userAccion = sanitize_text_field( $_POST['wpfunos_userAccion'] );
$userPrecio = sanitize_text_field( $_POST['wpfunos_userPrecio'] );
$userServicio = sanitize_text_field( $_POST['wpfunos_userServicio'] );

$userDesgloseBaseNombre = sanitize_text_field( $_POST['wpfunos_userDesgloseBaseNombre'] );
$userDesgloseBaseEmpresa = sanitize_text_field( $_POST['wpfunos_userDesgloseBaseEmpresa'] );
$userDesgloseBasePrecio = sanitize_text_field( $_POST['wpfunos_userDesgloseBasePrecio'] );
$userDesgloseBaseDescuento = sanitize_text_field( $_POST['wpfunos_userDesgloseBaseDescuento'] );
$userDesgloseBaseTotal = sanitize_text_field( $_POST['wpfunos_userDesgloseBaseTotal'] );

$userDesgloseDestinoNombre = sanitize_text_field( $_POST['wpfunos_userDesgloseDestinoNombre'] );
$userDesgloseDestinoPrecio = sanitize_text_field( $_POST['wpfunos_userDesgloseDestinoPrecio'] );
$userDesgloseDestinoDescuento = sanitize_text_field( $_POST['wpfunos_userDesgloseDestinoDescuento'] );
$userDesgloseDestinoTotal = sanitize_text_field( $_POST['wpfunos_userDesgloseDestinoTotal'] );

$userDesgloseAtaudNombre = sanitize_text_field( $_POST['wpfunos_userDesgloseAtaudNombre'] );
$userDesgloseAtaudPrecio = sanitize_text_field( $_POST['wpfunos_userDesgloseAtaudPrecio'] );
$userDesgloseAtaudDescuento = sanitize_text_field( $_POST['wpfunos_userDesgloseAtaudDescuento'] );
$userDesgloseAtaudTotal = sanitize_text_field( $_POST['wpfunos_userDesgloseAtaudTotal'] );

$userDesgloseVelatorioNombre = sanitize_text_field( $_POST['wpfunos_userDesgloseVelatorioNombre'] );
$userDesgloseVelatorioPrecio = sanitize_text_field( $_POST['wpfunos_userDesgloseVelatorioPrecio'] );
$userDesgloseVelatorioDescuento = sanitize_text_field( $_POST['wpfunos_userDesgloseVelatorioDescuento'] );
$userDesgloseVelatorioTotal = sanitize_text_field( $_POST['wpfunos_userDesgloseVelatorioTotal'] );

$userDesgloseCeremoniaNombre = sanitize_text_field( $_POST['wpfunos_userDesgloseCeremoniaNombre'] );
$userDesgloseCeremoniaPrecio = sanitize_text_field( $_POST['wpfunos_userDesgloseCeremoniaPrecio'] );
$userDesgloseCeremoniaDescuento = sanitize_text_field( $_POST['wpfunos_userDesgloseCeremoniaDescuento'] );
$userDesgloseCeremoniaTotal = sanitize_text_field( $_POST['wpfunos_userDesgloseCeremoniaTotal'] );

$userDesgloseDescuentoGenerico = sanitize_text_field( $_POST['wpfunos_userDesgloseDescuentoGenerico'] );
$userDesgloseDescuentoGenericoPrecio = sanitize_text_field( $_POST['wpfunos_userDesgloseDescuentoGenericoPrecio'] );
$userDesgloseDescuentoGenericoDescuento = sanitize_text_field( $_POST['wpfunos_userDesgloseDescuentoGenericoDescuento'] );
$userDesgloseDescuentoGenericoTotal = sanitize_text_field( $_POST['wpfunos_userDesgloseDescuentoGenericoTotal'] );

$userAPITipo = sanitize_text_field( $_POST['wpfunos_userAPITipo'] );
$userAPIBody = sanitize_text_field( $_POST['wpfunos_userAPIBody'] );
$userAPIMessage = sanitize_text_field( $_POST['wpfunos_userAPIMessage'] );
$userAPImessagebody = sanitize_text_field( $_POST['wpfunos_userAPImessagebody'] );
$userAPImessageresponse = sanitize_text_field( $_POST['wpfunos_userAPImessageresponse'] );
$userAPImessagecode = sanitize_text_field( $_POST['wpfunos_userAPImessagecode'] );
$userAPImessagemessage = sanitize_text_field( $_POST['wpfunos_userAPImessagemessage'] );

$userwpf = sanitize_text_field( $_POST['wpfunos_userwpf'] );
$userURL = sanitize_text_field( $_POST['wpfunos_userURL'] );
$userURLlarga = sanitize_text_field( $_POST['wpfunos_userURLlarga'] );

$userIP = sanitize_text_field( $_POST['wpfunos_userIP'] );
$userReferer = sanitize_text_field( $_POST['wpfunos_userReferer'] );
$userAceptaPolitica = sanitize_text_field( $_POST['wpfunos_userAceptaPolitica'] );
$userLAT = sanitize_text_field( $_POST['wpfunos_userLAT'] );
$userLNG = sanitize_text_field( $_POST['wpfunos_userLNG'] );
$userPluginVersion = sanitize_text_field( $_POST['wpfunos_userPluginVersion'] );
$userVisitas = sanitize_text_field( $_POST['wpfunos_userVisitas'] );
$Dummy = sanitize_text_field( $_POST['wpfunos_Dummy'] );
$IDstamp= sanitize_text_field( $_POST['IDstamp'] );

$resp1 = sanitize_text_field( $_POST['resp1'] );
$resp2 = sanitize_text_field( $_POST['resp2'] );
$resp3 = sanitize_text_field( $_POST['resp3'] );
$resp4 = sanitize_text_field( $_POST['resp4'] );

update_post_meta($post_id, 'wpfunos_TimeStamp', $TimeStamp);
update_post_meta($post_id, 'wpfunos_userMail', $userMail);
update_post_meta($post_id, 'wpfunos_userReferencia', $userReferencia);
update_post_meta($post_id, 'wpfunos_userName', $userName);
update_post_meta($post_id, 'wpfunos_userSurname', $userSurname);
update_post_meta($post_id, 'wpfunos_userPhone', $userPhone);
update_post_meta($post_id, 'wpfunos_userSeguro', $userSeguro);
update_post_meta($post_id, 'wpfunos_userLead', $userLead);
update_post_meta($post_id, 'wpfunos_userSeleccion', $userSeleccion);
update_post_meta($post_id, 'wpfunos_userCP', $userCP);
update_post_meta($post_id, 'wpfunos_userDifunto', $userDifunto);

update_post_meta($post_id, 'wpfunos_userServicioEnviado', $userServicioEnviado);
update_post_meta($post_id, 'wpfunos_userServicioTitulo', $userServicioTitulo);
update_post_meta($post_id, 'wpfunos_userServicioEmpresa', $userServicioEmpresa);
update_post_meta($post_id, 'wpfunos_userServicioPoblacion', $userServicioPoblacion);
update_post_meta($post_id, 'wpfunos_userServicioProvincia', $userServicioProvincia);

update_post_meta($post_id, 'wpfunos_userComentarios', $userComentarios);
update_post_meta($post_id, 'wpfunos_userContratado', $userContratado);
update_post_meta($post_id, 'wpfunos_userFuneraria', $userFuneraria);

update_post_meta($post_id, 'wpfunos_userNombreAccion', $userNombreAccion);
update_post_meta($post_id, 'wpfunos_userNombreSeleccionUbicacion', $userNombreSeleccionUbicacion);
update_post_meta($post_id, 'wpfunos_userNombreSeleccionDistancia', $userNombreSeleccionDistancia);
update_post_meta($post_id, 'wpfunos_userNombreSeleccionServicio', $userNombreSeleccionServicio);
update_post_meta($post_id, 'wpfunos_userNombreSeleccionAtaud', $userNombreSeleccionAtaud);
update_post_meta($post_id, 'wpfunos_userNombreSeleccionVelatorio', $userNombreSeleccionVelatorio);
update_post_meta($post_id, 'wpfunos_userNombreSeleccionDespedida', $userNombreSeleccionDespedida);

update_post_meta($post_id, 'wpfunos_userAccion', $userAccion );
update_post_meta($post_id, 'wpfunos_userPrecio', $userPrecio );
update_post_meta($post_id, 'wpfunos_userServicio', $userServicio );

update_post_meta($post_id, 'wpfunos_userDesgloseBaseNombre', $userDesgloseBaseNombre );
update_post_meta($post_id, 'wpfunos_userDesgloseBaseEmpresa', $userDesgloseBaseEmpresa );
update_post_meta($post_id, 'wpfunos_userDesgloseBasePrecio', $userDesgloseBasePrecio );
update_post_meta($post_id, 'wpfunos_userDesgloseBaseDescuento', $userDesgloseBaseDescuento );
update_post_meta($post_id, 'wpfunos_userDesgloseBaseTotal', $userDesgloseBaseTotal );

update_post_meta($post_id, 'wpfunos_userDesgloseDestinoNombre', $userDesgloseDestinoNombre );
update_post_meta($post_id, 'wpfunos_userDesgloseDestinoPrecio', $userDesgloseDestinoPrecio );
update_post_meta($post_id, 'wpfunos_userDesgloseDestinoDescuento', $userDesgloseDestinoDescuento );
update_post_meta($post_id, 'wpfunos_userDesgloseDestinoTotal', $userDesgloseDestinoTotal );

update_post_meta($post_id, 'wpfunos_userDesgloseAtaudNombre', $userDesgloseAtaudNombre );
update_post_meta($post_id, 'wpfunos_userDesgloseAtaudPrecio', $userDesgloseAtaudPrecio );
update_post_meta($post_id, 'wpfunos_userDesgloseAtaudDescuento', $userDesgloseAtaudDescuento );
update_post_meta($post_id, 'wpfunos_userDesgloseAtaudTotal', $userDesgloseAtaudTotal );

update_post_meta($post_id, 'wpfunos_userDesgloseVelatorioNombre', $userDesgloseVelatorioNombre );
update_post_meta($post_id, 'wpfunos_userDesgloseVelatorioPrecio', $userDesgloseVelatorioPrecio );
update_post_meta($post_id, 'wpfunos_userDesgloseVelatorioDescuento', $userDesgloseVelatorioDescuento );
update_post_meta($post_id, 'wpfunos_userDesgloseVelatorioTotal', $userDesgloseVelatorioTotal );

update_post_meta($post_id, 'wpfunos_userDesgloseCeremoniaNombre', $userDesgloseCeremoniaNombre );
update_post_meta($post_id, 'wpfunos_userDesgloseCeremoniaPrecio', $userDesgloseCeremoniaPrecio );
update_post_meta($post_id, 'wpfunos_userDesgloseCeremoniaDescuento', $userDesgloseCeremoniaDescuento );
update_post_meta($post_id, 'wpfunos_userDesgloseCeremoniaTotal', $userDesgloseCeremoniaTotal );

update_post_meta($post_id, 'wpfunos_userDesgloseDescuentoGenerico', $userDesgloseDescuentoGenerico );
update_post_meta($post_id, 'wpfunos_userDesgloseDescuentoGenericoPrecio', $userDesgloseDescuentoGenericoPrecio );
update_post_meta($post_id, 'wpfunos_userDesgloseDescuentoGenericoDescuento', $userDesgloseDescuentoGenericoDescuento );
update_post_meta($post_id, 'wpfunos_userDesgloseDescuentoGenericoTotal', $userDesgloseDescuentoGenericoTotal );

update_post_meta($post_id, 'wpfunos_userAPITipo', $userAPITipo);
update_post_meta($post_id, 'wpfunos_userAPIBody', $userAPIBody);
update_post_meta($post_id, 'wpfunos_userAPIMessage', $userAPIMessage);
update_post_meta($post_id, 'wpfunos_userAPIMessagebody', $userAPIMessagebody);
update_post_meta($post_id, 'wpfunos_userAPIMessageresponse', $userAPIMessageresponse);
update_post_meta($post_id, 'wpfunos_userAPIMessagecode', $userAPIMessagecode);
update_post_meta($post_id, 'wpfunos_userAPIMessagemessage', $userAPIMessagemessage);

update_post_meta($post_id, 'wpfunos_userwpf', $userwpf);
update_post_meta($post_id, 'wpfunos_userURL', $userURL);
update_post_meta($post_id, 'wpfunos_userURLlarga', $userURLlarga);

update_post_meta($post_id, 'wpfunos_userIP', $userIP);
update_post_meta($post_id, 'wpfunos_userReferer', $userReferer);
update_post_meta($post_id, 'wpfunos_userAceptaPolitica', $userAceptaPolitica);
update_post_meta($post_id, 'wpfunos_userLAT', $userLAT);
update_post_meta($post_id, 'wpfunos_userLNG', $userLNG);
update_post_meta($post_id, 'wpfunos_userPluginVersion', $userPluginVersion);
update_post_meta($post_id, 'wpfunos_userVisitas', $userVisitas);
update_post_meta($post_id, 'wpfunos_Dummy', $Dummy);
update_post_meta($post_id, 'IDstamp', $IDstamp);

update_post_meta($post_id, 'resp1', $resp1);
update_post_meta($post_id, 'resp2', $resp2);
update_post_meta($post_id, 'resp3', $resp3);
update_post_meta($post_id, 'resp4', $resp4);
