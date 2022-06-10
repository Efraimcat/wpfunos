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
$servicioNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioNombre'] );
$servicioEmpresa = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEmpresa'] );
$servicioPoblacion = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPoblacion'] );
$servicioProvincia = sanitize_text_field( $_POST[$this->plugin_name . '_servicioProvincia'] );
$servicioDireccion = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDireccion'] );
$servicioPrecioConfirmado = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioConfirmado'] );
$servicioLogo = sanitize_text_field( $_POST[$this->plugin_name . '_servicioLogo'] );
$servicioEmail = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEmail'] );
$servicioTelefono = sanitize_text_field( $_POST[$this->plugin_name . '_servicioTelefono'] );
$servicioMapa = sanitize_text_field( $_POST[$this->plugin_name . '_servicioMapa'] );
$servicioLead = sanitize_text_field( $_POST[$this->plugin_name . '_servicioLead'] );
$servicioLead2 = sanitize_text_field( $_POST[$this->plugin_name . '_servicioLead2'] );
$servicioDescuentoGenerico = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDescuentoGenerico'] );
$servicioValoracion = sanitize_text_field( $_POST[$this->plugin_name . '_servicioValoracion'] );
$servicioActivo = sanitize_text_field( $_POST[$this->plugin_name . '_servicioActivo'] );

$servicioBotonesLlamar = sanitize_text_field( $_POST[$this->plugin_name . '_servicioBotonesLlamar'] );
$servicioBotonPresupuesto = sanitize_text_field( $_POST[$this->plugin_name . '_servicioBotonPresupuesto'] );
$servicioTextoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioTextoPrecio'] );
$servicioImagenPromo = sanitize_text_field( $_POST[$this->plugin_name . '_servicioImagenPromo'] );
$Dummy = sanitize_text_field( $_POST[$this->plugin_name . '_Dummy'] );

$servicioImagenSlider1 = sanitize_text_field( $_POST[$this->plugin_name . '_servicioImagenSlider1'] );
$servicioImagenSlider2 = sanitize_text_field( $_POST[$this->plugin_name . '_servicioImagenSlider2'] );
$servicioImagenSlider3 = sanitize_text_field( $_POST[$this->plugin_name . '_servicioImagenSlider3'] );
$servicioImagenSlider4 = sanitize_text_field( $_POST[$this->plugin_name . '_servicioImagenSlider4'] );
$servicioImagenSlider5 = sanitize_text_field( $_POST[$this->plugin_name . '_servicioImagenSlider5'] );

$servicioPackNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPackNombre'] );
$servicioPrecioBase = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioBase'] );
$servicioPrecioBaseDescuento = sanitize_text_field( $_POST[$this->plugin_name . '_servicioPrecioBaseDescuento'] );
$servicioDestino_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1Nombre'] );
$servicioDestino_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_1Precio'] );
$servicioDestino_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2Nombre'] );
$servicioDestino_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_2Precio'] );
$servicioDestino_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3Nombre'] );
$servicioDestino_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDestino_3Precio'] );
$servicioAtaud_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1Nombre'] );
$servicioAtaud_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_1Precio'] );
$servicioAtaud_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2Nombre'] );
$servicioAtaud_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_2Precio'] );
$servicioAtaud_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3Nombre'] );
$servicioAtaud_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaud_3Precio'] );
$servicioAtaudEcologico_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Nombre'] );
$servicioAtaudEcologico_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Precio'] );
$servicioAtaudEcologico_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Nombre'] );
$servicioAtaudEcologico_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Precio'] );
$servicioAtaudEcologico_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Nombre'] );
$servicioAtaudEcologico_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Precio'] );
$servicioVelatorioNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNombre'] );
$servicioVelatorioPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioPrecio'] );

$servicioVelatorioNoNombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoNombre'] );
$servicioVelatorioNoPrecio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioVelatorioNoPrecio'] );

$servicioDespedida_1Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1Nombre'] );
$servicioDespedida_1Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_1Precio'] );
$servicioDespedida_2Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2Nombre'] );
$servicioDespedida_2Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_2Precio'] );
$servicioDespedida_3Nombre = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3Nombre'] );
$servicioDespedida_3Precio = sanitize_text_field( $_POST[$this->plugin_name . '_servicioDespedida_3Precio'] );

$servicioPrecioBaseComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioPrecioBaseComentario'] );
$servicioDestino_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_1Comentario'] );
$servicioDestino_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_2Comentario'] );
$servicioDestino_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDestino_3Comentario'] );
$servicioAtaud_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_1Comentario'] );
$servicioAtaud_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_2Comentario'] );
$servicioAtaud_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaud_3Comentario'] );
$servicioAtaudEcologico_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_1Comentario'] );
$servicioAtaudEcologico_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_2Comentario'] );
$servicioAtaudEcologico_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioAtaudEcologico_3Comentario'] );
$servicioVelatorioComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioComentario'] );
$servicioVelatorioNoComentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioVelatorioNoComentario'] );
$servicioDespedida_1Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_1Comentario'] );
$servicioDespedida_2Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_2Comentario'] );
$servicioDespedida_3Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioDespedida_3Comentario'] );

$servicioPosiblesExtras = wp_kses_post( $_POST[$this->plugin_name . '_servicioPosiblesExtras'] );

//Entierro + Ataúd económico + Sin velatorio + Sin ceremonia
$servicioEESS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEESS'] );
$servicioEESS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEESS_Comentario'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala
$servicioEESO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEESO'] );
$servicioEESO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEESO_Comentario'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil
$servicioEESC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEESC'] );
$servicioEESC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEESC_Comentario'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa
$servicioEESR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEESR'] );
$servicioEESR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEESR_Comentario'] );
//Entierro + Ataúd económico + Con velatorio + Sin ceremonia
$servicioEEVS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEEVS'] );
$servicioEEVS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEEVS_Comentario'] );
//ntierro + Ataúd económico + Con velatorio + Con ceremonia solo sala
$servicioEEVO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEEVO'] );
$servicioEEVO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEEVO_Comentario'] );
//Entierro + Ataúd económico + Con velatorio + Con ceremonia civil
$servicioEEVC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEEVC'] );
$servicioEEVC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEEVC_Comentario'] );
//Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa
$servicioEEVR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEEVR'] );
$servicioEEVR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEEVR_Comentario'] );
//Entierro + Ataúd medio + Sin velatorio + Sin ceremonia
$servicioEMSS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMSS'] );
$servicioEMSS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMSS_Comentario'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala
$servicioEMSO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMSO'] );
$servicioEMSO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMSO_Comentario'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil
$servicioEMSC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMSC'] );
$servicioEMSC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMSC_Comentario'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa
$servicioEMSR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMSR'] );
$servicioEMSR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMSR_Comentario'] );
//Entierro + Ataúd medio + Con velatorio + Sin ceremonia
$servicioEMVS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMVS'] );
$servicioEMVS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMVS_Comentario'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala
$servicioEMVO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMVO'] );
$servicioEMVO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMVO_Comentario'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia civil
$servicioEMVC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMVC'] );
$servicioEMVC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMVC_Comentario'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa
$servicioEMVR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEMVR'] );
$servicioEMVR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEMVR_Comentario'] );
//Entierro + Ataúd premium + Sin velatorio + Sin ceremonia
$servicioEPSS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPSS'] );
$servicioEPSS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPSS_Comentario'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala
$servicioEPSO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPSO'] );
$servicioEPSO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPSO_Comentario'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil
$servicioEPSC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPSC'] );
$servicioEPSC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPSC_Comentario'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa
$servicioEPSR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPSR'] );
$servicioEPSR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPSR_Comentario'] );
//Entierro + Ataúd premium + Con velatorio + Sin ceremonia
$servicioEPVS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPVS'] );
$servicioEPVS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPVS_Comentario'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala
$servicioEPVO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPVO'] );
$servicioEPVO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPVO_Comentario'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia civil
$servicioEPVC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPVC'] );
$servicioEPVC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPVC_Comentario'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa
$servicioEPVR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioEPVR'] );
$servicioEPVR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioEPVR_Comentario'] );
//Incineración + Ataúd económico + Sin velatorio + Sin ceremonia
$servicioIESS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIESS'] );
$servicioIESS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIESS_Comentario'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala
$servicioIESO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIESO'] );
$servicioIESO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIESO_Comentario'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil
$servicioIESC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIESC'] );
$servicioIESC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIESC_Comentario'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa
$servicioIESR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIESR'] );
$servicioIESR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIESR_Comentario'] );
//Incineración + Ataúd económico + Con velatorio + Sin ceremonia
$servicioIEVS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIEVS'] );
$servicioIEVS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIEVS_Comentario'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala
$servicioIEVO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIEVO'] );
$servicioIEVO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIEVO_Comentario'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia civil
$servicioIEVC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIEVC'] );
$servicioIEVC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIEVC_Comentario'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa
$servicioIEVR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIEVR'] );
$servicioIEVR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIEVR_Comentario'] );
//Incineración + Ataúd medio + Sin velatorio + Sin ceremonia
$servicioIMSS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMSS'] );
$servicioIMSS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMSS_Comentario'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala
$servicioIMSO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMSO'] );
$servicioIMSO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMSO_Comentario'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil
$servicioIMSC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMSC'] );
$servicioIMSC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMSC_Comentario'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa
$servicioIMSR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMSR'] );
$servicioIMSR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMSR_Comentario'] );
//Incineración + Ataúd medio + Con velatorio + Sin ceremonia
$servicioIMVS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMVS'] );
$servicioIMVS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMVS_Comentario'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala
$servicioIMVO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMVO'] );
$servicioIMVO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMVO_Comentario'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia civil
$servicioIMVC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMVC'] );
$servicioIMVC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMVC_Comentario'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa
$servicioIMVR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIMVR'] );
$servicioIMVR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIMVR_Comentario'] );
//Incineración + Ataúd premium + Sin velatorio + Sin ceremonia
$servicioIPSS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPSS'] );
$servicioIPSS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPSS_Comentario'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala
$servicioIPSO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPSO'] );
$servicioIPSO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPSO_Comentario'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil
$servicioIPSC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPSC'] );
$servicioIPSC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPSC_Comentario'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa
$servicioIPSR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPSR'] );
$servicioIPSR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPSR_Comentario'] );
//Incineración + Ataúd premium + Con velatorio + Sin ceremonia
$servicioIPVS = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPVS'] );
$servicioIPVS_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPVS_Comentario'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala
$servicioIPVO = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPVO'] );
$servicioIPVO_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPVO_Comentario'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia civil
$servicioIPVC = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPVC'] );
$servicioIPVC_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPVC_Comentario'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa
$servicioIPVR = sanitize_text_field( $_POST[$this->plugin_name . '_servicioIPVR'] );
$servicioIPVR_Comentario = wp_kses_post( $_POST[$this->plugin_name . '_servicioIPVR_Comentario'] );







update_post_meta($post_id, $this->plugin_name . '_servicioNombre', $servicioNombre);
update_post_meta($post_id, $this->plugin_name . '_servicioEmpresa', $servicioEmpresa);
update_post_meta($post_id, $this->plugin_name . '_servicioPoblacion', $servicioPoblacion);
update_post_meta($post_id, $this->plugin_name . '_servicioProvincia', $servicioProvincia);
update_post_meta($post_id, $this->plugin_name . '_servicioDireccion', $servicioDireccion);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecioConfirmado', $servicioPrecioConfirmado);
update_post_meta($post_id, $this->plugin_name . '_servicioLogo', $servicioLogo);
update_post_meta($post_id, $this->plugin_name . '_servicioEmail', $servicioEmail);
update_post_meta($post_id, $this->plugin_name . '_servicioTelefono', $servicioTelefono);
update_post_meta($post_id, $this->plugin_name . '_servicioMapa', $servicioMapa);
update_post_meta($post_id, $this->plugin_name . '_servicioLead', $servicioLead);
update_post_meta($post_id, $this->plugin_name . '_servicioLead2', $servicioLead2);
update_post_meta($post_id, $this->plugin_name . '_servicioDescuentoGenerico', $servicioDescuentoGenerico);
update_post_meta($post_id, $this->plugin_name . '_servicioValoracion', $servicioValoracion);
update_post_meta($post_id, $this->plugin_name . '_servicioActivo', $servicioActivo);

update_post_meta($post_id, $this->plugin_name . '_servicioBotonesLlamar', $servicioBotonesLlamar);
update_post_meta($post_id, $this->plugin_name . '_servicioBotonPresupuesto', $servicioBotonPresupuesto);
update_post_meta($post_id, $this->plugin_name . '_servicioTextoPrecio', $servicioTextoPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioImagenPromo', $servicioImagenPromo);
update_post_meta($post_id, $this->plugin_name . '_Dummy', $Dummy);

update_post_meta($post_id, $this->plugin_name . '_servicioImagenSlider1', $servicioImagenSlider1);
update_post_meta($post_id, $this->plugin_name . '_servicioImagenSlider2', $servicioImagenSlider2);
update_post_meta($post_id, $this->plugin_name . '_servicioImagenSlider3', $servicioImagenSlider3);
update_post_meta($post_id, $this->plugin_name . '_servicioImagenSlider4', $servicioImagenSlider4);
update_post_meta($post_id, $this->plugin_name . '_servicioImagenSlider5', $servicioImagenSlider5);

update_post_meta($post_id, $this->plugin_name . '_servicioPackNombre', $servicioPackNombre);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecioBase', $servicioPrecioBase);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecioBaseDescuento', $servicioPrecioBaseDescuento);
update_post_meta($post_id, $this->plugin_name . '_servicioPrecioBaseComentario', $servicioPrecioBaseComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Nombre', $servicioDestino_1Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Precio', $servicioDestino_1Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Nombre', $servicioDestino_2Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Precio', $servicioDestino_2Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Nombre', $servicioDestino_3Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Precio', $servicioDestino_3Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Nombre', $servicioAtaud_1Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Precio', $servicioAtaud_1Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Nombre', $servicioAtaud_2Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Precio', $servicioAtaud_2Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Nombre', $servicioAtaud_3Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Precio', $servicioAtaud_3Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Nombre', $servicioAtaudEcologico_1Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Precio', $servicioAtaudEcologico_1Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Nombre', $servicioAtaudEcologico_2Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Precio', $servicioAtaudEcologico_2Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Nombre', $servicioAtaudEcologico_3Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Precio', $servicioAtaudEcologico_3Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNombre', $servicioVelatorioNombre);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioPrecio', $servicioVelatorioPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoNombre', $servicioVelatorioNoNombre);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoPrecio', $servicioVelatorioNoPrecio);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Nombre', $servicioDespedida_1Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Precio', $servicioDespedida_1Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Nombre', $servicioDespedida_2Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Precio', $servicioDespedida_2Precio);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Nombre', $servicioDespedida_3Nombre);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Precio', $servicioDespedida_3Precio);

update_post_meta($post_id, $this->plugin_name . '_servicioDestino_1Comentario', $servicioDestino_1Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_2Comentario', $servicioDestino_2Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDestino_3Comentario', $servicioDestino_3Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_1Comentario', $servicioAtaud_1Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_2Comentario', $servicioAtaud_2Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaud_3Comentario', $servicioAtaud_3Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_1Comentario', $servicioAtaudEcologico_1Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_2Comentario', $servicioAtaudEcologico_2Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioAtaudEcologico_3Comentario', $servicioAtaudEcologico_3Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioComentario', $servicioVelatorioComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioVelatorioNoComentario', $servicioVelatorioNoComentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_1Comentario', $servicioDespedida_1Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_2Comentario', $servicioDespedida_2Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioDespedida_3Comentario', $servicioDespedida_3Comentario);
update_post_meta($post_id, $this->plugin_name . '_servicioPosiblesExtras', $servicioPosiblesExtras);



//Entierro + Ataúd económico + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_servicioEESS', $servicioEESS);
update_post_meta($post_id, $this->plugin_name . '_servicioEESS_Comentario', $servicioEESS_Comentario);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_servicioEESO', $servicioEESO);
update_post_meta($post_id, $this->plugin_name . '_servicioEESO_Comentario', $servicioEESO_Comentario);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_servicioEESC', $servicioEESC);
update_post_meta($post_id, $this->plugin_name . '_servicioEESC_Comentario', $servicioEESC_Comentario);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_servicioEESR', $servicioEESR);
update_post_meta($post_id, $this->plugin_name . '_servicioEESR_Comentario', $servicioEESR_Comentario);
//Entierro + Ataúd económico + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_servicioEEVS', $servicioEEVS);
update_post_meta($post_id, $this->plugin_name . '_servicioEEVS_Comentario', $servicioEEVS_Comentario);
//ntierro + Ataúd económico + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_servicioEEVO', $servicioEEVO);
update_post_meta($post_id, $this->plugin_name . '_servicioEEVO_Comentario', $servicioEEVO_Comentario);
//Entierro + Ataúd económico + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_servicioEEVC', $servicioEEVC);
update_post_meta($post_id, $this->plugin_name . '_servicioEEVC_Comentario', $servicioEEVC_Comentario);
//Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_servicioEEVR', $servicioEEVR);
update_post_meta($post_id, $this->plugin_name . '_servicioEEVR_Comentario', $servicioEEVR_Comentario);
//Entierro + Ataúd medio + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_servicioEMSS', $servicioEMSS);
update_post_meta($post_id, $this->plugin_name . '_servicioEMSS_Comentario', $servicioEMSS_Comentario);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_servicioEMSO', $servicioEMSO);
update_post_meta($post_id, $this->plugin_name . '_servicioEMSO_Comentario', $servicioEMSO_Comentario);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_servicioEMSC', $servicioEMSC);
update_post_meta($post_id, $this->plugin_name . '_servicioEMSC_Comentario', $servicioEMSC_Comentario);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_servicioEMSR', $servicioEMSR);
update_post_meta($post_id, $this->plugin_name . '_servicioEMSR_Comentario', $servicioEMSR_Comentario);
//Entierro + Ataúd medio + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_servicioEMVS', $servicioEMVS);
update_post_meta($post_id, $this->plugin_name . '_servicioEMVS_Comentario', $servicioEMVS_Comentario);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_servicioEMVO', $servicioEMVO);
update_post_meta($post_id, $this->plugin_name . '_servicioEMVO_Comentario', $servicioEMVO_Comentario);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_servicioEMVC', $servicioEMVC);
update_post_meta($post_id, $this->plugin_name . '_servicioEMVC_Comentario', $servicioEMVC_Comentario);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_servicioEMVR', $servicioEMVR);
update_post_meta($post_id, $this->plugin_name . '_servicioEMVR_Comentario', $servicioEMVR_Comentario);
//Entierro + Ataúd premium + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_servicioEPSS', $servicioEPSS);
update_post_meta($post_id, $this->plugin_name . '_servicioEPSS_Comentario', $servicioEPSS_Comentario);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_servicioEPSO', $servicioEPSO);
update_post_meta($post_id, $this->plugin_name . '_servicioEPSO_Comentario', $servicioEPSO_Comentario);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_servicioEPSC', $servicioEPSC);
update_post_meta($post_id, $this->plugin_name . '_servicioEPSC_Comentario', $servicioEPSC_Comentario);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_servicioEPSR', $servicioEPSR);
update_post_meta($post_id, $this->plugin_name . '_servicioEPSR_Comentario', $servicioEPSR_Comentario);
//Entierro + Ataúd premium + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_servicioEPVS', $servicioEPVS);
update_post_meta($post_id, $this->plugin_name . '_servicioEPVS_Comentario', $servicioEPVS_Comentario);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_servicioEPVO', $servicioEPVO);
update_post_meta($post_id, $this->plugin_name . '_servicioEPVO_Comentario', $servicioEPVO_Comentario);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_servicioEPVC', $servicioEPVC);
update_post_meta($post_id, $this->plugin_name . '_servicioEPVC_Comentario', $servicioEPVC_Comentario);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_servicioEPVR', $servicioEPVR);
update_post_meta($post_id, $this->plugin_name . '_servicioEPVR_Comentario', $servicioEPVR_Comentario);
//Incineración + Ataúd económico + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_servicioIESS', $servicioIESS);
update_post_meta($post_id, $this->plugin_name . '_servicioIESS_Comentario', $servicioIESS_Comentario);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_servicioIESO', $servicioIESO);
update_post_meta($post_id, $this->plugin_name . '_servicioIESO_Comentario', $servicioIESO_Comentario);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_servicioIESC', $servicioIESC);
update_post_meta($post_id, $this->plugin_name . '_servicioIESC_Comentario', $servicioIESC_Comentario);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_servicioIESR', $servicioIESR);
update_post_meta($post_id, $this->plugin_name . '_servicioIESR_Comentario', $servicioIESR_Comentario);
//Incineración + Ataúd económico + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_servicioIEVS', $servicioIEVS);
update_post_meta($post_id, $this->plugin_name . '_servicioIEVS_Comentario', $servicioIEVS_Comentario);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_servicioIEVO', $servicioIEVO);
update_post_meta($post_id, $this->plugin_name . '_servicioIEVO_Comentario', $servicioIEVO_Comentario);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_servicioIEVC', $servicioIEVC);
update_post_meta($post_id, $this->plugin_name . '_servicioIEVC_Comentario', $servicioIEVC_Comentario);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_servicioIEVR', $servicioIEVR);
update_post_meta($post_id, $this->plugin_name . '_servicioIEVR_Comentario', $servicioIEVR_Comentario);
//Incineración + Ataúd medio + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_servicioIMSS', $servicioIMSS);
update_post_meta($post_id, $this->plugin_name . '_servicioIMSS_Comentario', $servicioIMSS_Comentario);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_servicioIMSO', $servicioIMSO);
update_post_meta($post_id, $this->plugin_name . '_servicioIMSO_Comentario', $servicioIMSO_Comentario);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_servicioIMSC', $servicioIMSC);
update_post_meta($post_id, $this->plugin_name . '_servicioIMSC_Comentario', $servicioIMSC_Comentario);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_servicioIMSR', $servicioIMSR);
update_post_meta($post_id, $this->plugin_name . '_servicioIMSR_Comentario', $servicioIMSR_Comentario);
//Incineración + Ataúd medio + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_servicioIMVS', $servicioIMVS);
update_post_meta($post_id, $this->plugin_name . '_servicioIMVS_Comentario', $servicioIMVS_Comentario);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_servicioIMVO', $servicioIMVO);
update_post_meta($post_id, $this->plugin_name . '_servicioIMVO_Comentario', $servicioIMVO_Comentario);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_servicioIMVC', $servicioIMVC);
update_post_meta($post_id, $this->plugin_name . '_servicioIMVC_Comentario', $servicioIMVC_Comentario);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_servicioIMVR', $servicioIMVR);
update_post_meta($post_id, $this->plugin_name . '_servicioIMVR_Comentario', $servicioIMVR_Comentario);
//Incineración + Ataúd premium + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_servicioIPSS', $servicioIPSS);
update_post_meta($post_id, $this->plugin_name . '_servicioIPSS_Comentario', $servicioIPSS_Comentario);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_servicioIPSO', $servicioIPSO);
update_post_meta($post_id, $this->plugin_name . '_servicioIPSO_Comentario', $servicioIPSO_Comentario);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_servicioIPSC', $servicioIPSC);
update_post_meta($post_id, $this->plugin_name . '_servicioIPSC_Comentario', $servicioIPSC_Comentario);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_servicioIPSR', $servicioIPSR);
update_post_meta($post_id, $this->plugin_name . '_servicioIPSR_Comentario', $servicioIPSR_Comentario);
//Incineración + Ataúd premium + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_servicioIPVS', $servicioIPVS);
update_post_meta($post_id, $this->plugin_name . '_servicioIPVS_Comentario', $servicioIPVS_Comentario);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_servicioIPVO', $servicioIPVO);
update_post_meta($post_id, $this->plugin_name . '_servicioIPVO_Comentario', $servicioIPVO_Comentario);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_servicioIPVC', $servicioIPVC);
update_post_meta($post_id, $this->plugin_name . '_servicioIPVC_Comentario', $servicioIPVC_Comentario);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_servicioIPVR', $servicioIPVR);
update_post_meta($post_id, $this->plugin_name . '_servicioIPVR_Comentario', $servicioIPVR_Comentario);
