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
$servicioNombre = sanitize_text_field( $_POST['wpfunos_servicioNombre'] );
$servicioEmpresa = sanitize_text_field( $_POST['wpfunos_servicioEmpresa'] );
$servicioPoblacion = sanitize_text_field( $_POST['wpfunos_servicioPoblacion'] );
$servicioProvincia = sanitize_text_field( $_POST['wpfunos_servicioProvincia'] );
$servicioDireccion = sanitize_text_field( $_POST['wpfunos_servicioDireccion'] );
$servicioPrecioConfirmado = sanitize_text_field( $_POST['wpfunos_servicioPrecioConfirmado'] );
$servicioLogo = sanitize_text_field( $_POST['wpfunos_servicioLogo'] );
$servicioEmail = sanitize_text_field( $_POST['wpfunos_servicioEmail'] );
$servicioTelefono = sanitize_text_field( $_POST['wpfunos_servicioTelefono'] );
$servicioMapa = sanitize_text_field( $_POST['wpfunos_servicioMapa'] );
$servicioLead = sanitize_text_field( $_POST['wpfunos_servicioLead'] );
$servicioLead2 = sanitize_text_field( $_POST['wpfunos_servicioLead2'] );
$servicioValoracion = sanitize_text_field( $_POST['wpfunos_servicioValoracion'] );
$servicioActivo = sanitize_text_field( $_POST['wpfunos_servicioActivo'] );

$servicioBotonesLlamar = sanitize_text_field( $_POST['wpfunos_servicioBotonesLlamar'] );
$servicioBotonPresupuesto = sanitize_text_field( $_POST['wpfunos_servicioBotonPresupuesto'] );
$servicioBotonFinanciacion = sanitize_text_field( $_POST['wpfunos_servicioBotonFinanciacion'] );
$servicioTextoPrecio = sanitize_text_field( $_POST['wpfunos_servicioTextoPrecio'] );
$servicioImagenPromo = sanitize_text_field( $_POST['wpfunos_servicioImagenPromo'] );
$Dummy = sanitize_text_field( $_POST['wpfunos_Dummy'] );

$servicioImagenSlider1 = sanitize_text_field( $_POST['wpfunos_servicioImagenSlider1'] );
$servicioImagenSlider2 = sanitize_text_field( $_POST['wpfunos_servicioImagenSlider2'] );
$servicioImagenSlider3 = sanitize_text_field( $_POST['wpfunos_servicioImagenSlider3'] );
$servicioImagenSlider4 = sanitize_text_field( $_POST['wpfunos_servicioImagenSlider4'] );
$servicioImagenSlider5 = sanitize_text_field( $_POST['wpfunos_servicioImagenSlider5'] );

$servicioPackNombre = sanitize_text_field( $_POST['wpfunos_servicioPackNombre'] );
$servicioPrecioBase = sanitize_text_field( $_POST['wpfunos_servicioPrecioBase'] );
$servicioDestino_1Nombre = sanitize_text_field( $_POST['wpfunos_servicioDestino_1Nombre'] );
$servicioDestino_1Precio = sanitize_text_field( $_POST['wpfunos_servicioDestino_1Precio'] );
$servicioDestino_2Nombre = sanitize_text_field( $_POST['wpfunos_servicioDestino_2Nombre'] );
$servicioDestino_2Precio = sanitize_text_field( $_POST['wpfunos_servicioDestino_2Precio'] );
$servicioDestino_3Nombre = sanitize_text_field( $_POST['wpfunos_servicioDestino_3Nombre'] );
$servicioDestino_3Precio = sanitize_text_field( $_POST['wpfunos_servicioDestino_3Precio'] );
$servicioAtaudEcologico_1Nombre = sanitize_text_field( $_POST['wpfunos_servicioAtaudEcologico_1Nombre'] );
$servicioAtaudEcologico_1Precio = sanitize_text_field( $_POST['wpfunos_servicioAtaudEcologico_1Precio'] );
$servicioAtaudEcologico_2Nombre = sanitize_text_field( $_POST['wpfunos_servicioAtaudEcologico_2Nombre'] );
$servicioAtaudEcologico_2Precio = sanitize_text_field( $_POST['wpfunos_servicioAtaudEcologico_2Precio'] );
$servicioAtaudEcologico_3Nombre = sanitize_text_field( $_POST['wpfunos_servicioAtaudEcologico_3Nombre'] );
$servicioAtaudEcologico_3Precio = sanitize_text_field( $_POST['wpfunos_servicioAtaudEcologico_3Precio'] );
$servicioVelatorioNombre = sanitize_text_field( $_POST['wpfunos_servicioVelatorioNombre'] );
$servicioVelatorioPrecio = sanitize_text_field( $_POST['wpfunos_servicioVelatorioPrecio'] );

$servicioVelatorioNoNombre = sanitize_text_field( $_POST['wpfunos_servicioVelatorioNoNombre'] );
$servicioVelatorioNoPrecio = sanitize_text_field( $_POST['wpfunos_servicioVelatorioNoPrecio'] );

$servicioDespedida_1Nombre = sanitize_text_field( $_POST['wpfunos_servicioDespedida_1Nombre'] );
$servicioDespedida_1Precio = sanitize_text_field( $_POST['wpfunos_servicioDespedida_1Precio'] );
$servicioDespedida_2Nombre = sanitize_text_field( $_POST['wpfunos_servicioDespedida_2Nombre'] );
$servicioDespedida_2Precio = sanitize_text_field( $_POST['wpfunos_servicioDespedida_2Precio'] );
$servicioDespedida_3Nombre = sanitize_text_field( $_POST['wpfunos_servicioDespedida_3Nombre'] );
$servicioDespedida_3Precio = sanitize_text_field( $_POST['wpfunos_servicioDespedida_3Precio'] );

$servicioBloquearComentario = sanitize_text_field( $_POST['wpfunos_servicioBloquearComentario'] );
$servicioActualizarComentario = sanitize_text_field( $_POST['wpfunos_servicioActualizarComentario'] );

$servicioPrecioBaseComentario = wp_kses_post( $_POST['wpfunos_servicioPrecioBaseComentario'] );
$servicioDestino_1Comentario = wp_kses_post( $_POST['wpfunos_servicioDestino_1Comentario'] );
$servicioDestino_2Comentario = wp_kses_post( $_POST['wpfunos_servicioDestino_2Comentario'] );
$servicioDestino_3Comentario = wp_kses_post( $_POST['wpfunos_servicioDestino_3Comentario'] );
$servicioAtaudEcologico_1Comentario = wp_kses_post( $_POST['wpfunos_servicioAtaudEcologico_1Comentario'] );
$servicioAtaudEcologico_2Comentario = wp_kses_post( $_POST['wpfunos_servicioAtaudEcologico_2Comentario'] );
$servicioAtaudEcologico_3Comentario = wp_kses_post( $_POST['wpfunos_servicioAtaudEcologico_3Comentario'] );
$servicioVelatorioComentario = wp_kses_post( $_POST['wpfunos_servicioVelatorioComentario'] );
$servicioVelatorioNoComentario = wp_kses_post( $_POST['wpfunos_servicioVelatorioNoComentario'] );
$servicioDespedida_1Comentario = wp_kses_post( $_POST['wpfunos_servicioDespedida_1Comentario'] );
$servicioDespedida_2Comentario = wp_kses_post( $_POST['wpfunos_servicioDespedida_2Comentario'] );
$servicioDespedida_3Comentario = wp_kses_post( $_POST['wpfunos_servicioDespedida_3Comentario'] );

$servicioPosiblesExtras = wp_kses_post( $_POST['wpfunos_servicioPosiblesExtras'] );

//Entierro + Ataúd económico + Sin velatorio + Sin ceremonia
$servicioEESS = sanitize_text_field( $_POST['wpfunos_servicioEESS'] );
$servicioEESS_texto = sanitize_text_field( $_POST['wpfunos_servicioEESS_texto'] );
$servicioEESS_Comentario = wp_kses_post( $_POST['wpfunos_servicioEESS_Comentario'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala
$servicioEESO = sanitize_text_field( $_POST['wpfunos_servicioEESO'] );
$servicioEESO_texto = sanitize_text_field( $_POST['wpfunos_servicioEESO_texto'] );
$servicioEESO_Comentario = wp_kses_post( $_POST['wpfunos_servicioEESO_Comentario'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil
$servicioEESC = sanitize_text_field( $_POST['wpfunos_servicioEESC'] );
$servicioEESC_texto = sanitize_text_field( $_POST['wpfunos_servicioEESC_texto'] );
$servicioEESC_Comentario = wp_kses_post( $_POST['wpfunos_servicioEESC_Comentario'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa
$servicioEESR = sanitize_text_field( $_POST['wpfunos_servicioEESR'] );
$servicioEESR_texto = sanitize_text_field( $_POST['wpfunos_servicioEESR_texto'] );
$servicioEESR_Comentario = wp_kses_post( $_POST['wpfunos_servicioEESR_Comentario'] );
//Entierro + Ataúd económico + Con velatorio + Sin ceremonia
$servicioEEVS = sanitize_text_field( $_POST['wpfunos_servicioEEVS'] );
$servicioEEVS_texto = sanitize_text_field( $_POST['wpfunos_servicioEEVS_texto'] );
$servicioEEVS_Comentario = wp_kses_post( $_POST['wpfunos_servicioEEVS_Comentario'] );
//ntierro + Ataúd económico + Con velatorio + Con ceremonia solo sala
$servicioEEVO = sanitize_text_field( $_POST['wpfunos_servicioEEVO'] );
$servicioEEVO_texto = sanitize_text_field( $_POST['wpfunos_servicioEEVO_texto'] );
$servicioEEVO_Comentario = wp_kses_post( $_POST['wpfunos_servicioEEVO_Comentario'] );
//Entierro + Ataúd económico + Con velatorio + Con ceremonia civil
$servicioEEVC = sanitize_text_field( $_POST['wpfunos_servicioEEVC'] );
$servicioEEVC_texto = sanitize_text_field( $_POST['wpfunos_servicioEEVC_texto'] );
$servicioEEVC_Comentario = wp_kses_post( $_POST['wpfunos_servicioEEVC_Comentario'] );
//Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa
$servicioEEVR = sanitize_text_field( $_POST['wpfunos_servicioEEVR'] );
$servicioEEVR_texto = sanitize_text_field( $_POST['wpfunos_servicioEEVR_texto'] );
$servicioEEVR_Comentario = wp_kses_post( $_POST['wpfunos_servicioEEVR_Comentario'] );
//Entierro + Ataúd medio + Sin velatorio + Sin ceremonia
$servicioEMSS = sanitize_text_field( $_POST['wpfunos_servicioEMSS'] );
$servicioEMSS_texto = sanitize_text_field( $_POST['wpfunos_servicioEMSS_texto'] );
$servicioEMSS_Comentario = wp_kses_post( $_POST['wpfunos_servicioEMSS_Comentario'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala
$servicioEMSO = sanitize_text_field( $_POST['wpfunos_servicioEMSO'] );
$servicioEMSO_texto = sanitize_text_field( $_POST['wpfunos_servicioEMSO_texto'] );
$servicioEMSO_Comentario = wp_kses_post( $_POST['wpfunos_servicioEMSO_Comentario'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil
$servicioEMSC = sanitize_text_field( $_POST['wpfunos_servicioEMSC'] );
$servicioEMSC_texto = sanitize_text_field( $_POST['wpfunos_servicioEMSC_texto'] );
$servicioEMSC_Comentario = wp_kses_post( $_POST['wpfunos_servicioEMSC_Comentario'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa
$servicioEMSR = sanitize_text_field( $_POST['wpfunos_servicioEMSR'] );
$servicioEMSR_texto = sanitize_text_field( $_POST['wpfunos_servicioEMSR_texto'] );
$servicioEMSR_Comentario = wp_kses_post( $_POST['wpfunos_servicioEMSR_Comentario'] );
//Entierro + Ataúd medio + Con velatorio + Sin ceremonia
$servicioEMVS = sanitize_text_field( $_POST['wpfunos_servicioEMVS'] );
$servicioEMVS_texto = sanitize_text_field( $_POST['wpfunos_servicioEMVS_texto'] );
$servicioEMVS_Comentario = wp_kses_post( $_POST['wpfunos_servicioEMVS_Comentario'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala
$servicioEMVO = sanitize_text_field( $_POST['wpfunos_servicioEMVO'] );
$servicioEMVO_texto = sanitize_text_field( $_POST['wpfunos_servicioEMVO_texto'] );
$servicioEMVO_Comentario = wp_kses_post( $_POST['wpfunos_servicioEMVO_Comentario'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia civil
$servicioEMVC = sanitize_text_field( $_POST['wpfunos_servicioEMVC'] );
$servicioEMVC_texto = sanitize_text_field( $_POST['wpfunos_servicioEMVC_texto'] );
$servicioEMVC_Comentario = wp_kses_post( $_POST['wpfunos_servicioEMVC_Comentario'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa
$servicioEMVR = sanitize_text_field( $_POST['wpfunos_servicioEMVR'] );
$servicioEMVR_texto = sanitize_text_field( $_POST['wpfunos_servicioEMVR_texto'] );
$servicioEMVR_Comentario = wp_kses_post( $_POST['wpfunos_servicioEMVR_Comentario'] );
//Entierro + Ataúd premium + Sin velatorio + Sin ceremonia
$servicioEPSS = sanitize_text_field( $_POST['wpfunos_servicioEPSS'] );
$servicioEPSS_texto = sanitize_text_field( $_POST['wpfunos_servicioEPSS_texto'] );
$servicioEPSS_Comentario = wp_kses_post( $_POST['wpfunos_servicioEPSS_Comentario'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala
$servicioEPSO = sanitize_text_field( $_POST['wpfunos_servicioEPSO'] );
$servicioEPSO_texto = sanitize_text_field( $_POST['wpfunos_servicioEPSO_texto'] );
$servicioEPSO_Comentario = wp_kses_post( $_POST['wpfunos_servicioEPSO_Comentario'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil
$servicioEPSC = sanitize_text_field( $_POST['wpfunos_servicioEPSC'] );
$servicioEPSC_texto = sanitize_text_field( $_POST['wpfunos_servicioEPSC_texto'] );
$servicioEPSC_Comentario = wp_kses_post( $_POST['wpfunos_servicioEPSC_Comentario'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa
$servicioEPSR = sanitize_text_field( $_POST['wpfunos_servicioEPSR'] );
$servicioEPSR_texto = sanitize_text_field( $_POST['wpfunos_servicioEPSR_texto'] );
$servicioEPSR_Comentario = wp_kses_post( $_POST['wpfunos_servicioEPSR_Comentario'] );
//Entierro + Ataúd premium + Con velatorio + Sin ceremonia
$servicioEPVS = sanitize_text_field( $_POST['wpfunos_servicioEPVS'] );
$servicioEPVS_texto = sanitize_text_field( $_POST['wpfunos_servicioEPVS_texto'] );
$servicioEPVS_Comentario = wp_kses_post( $_POST['wpfunos_servicioEPVS_Comentario'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala
$servicioEPVO = sanitize_text_field( $_POST['wpfunos_servicioEPVO'] );
$servicioEPVO_texto = sanitize_text_field( $_POST['wpfunos_servicioEPVO_texto'] );
$servicioEPVO_Comentario = wp_kses_post( $_POST['wpfunos_servicioEPVO_Comentario'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia civil
$servicioEPVC = sanitize_text_field( $_POST['wpfunos_servicioEPVC'] );
$servicioEPVC_texto = sanitize_text_field( $_POST['wpfunos_servicioEPVC_texto'] );
$servicioEPVC_Comentario = wp_kses_post( $_POST['wpfunos_servicioEPVC_Comentario'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa
$servicioEPVR = sanitize_text_field( $_POST['wpfunos_servicioEPVR'] );
$servicioEPVR_texto = sanitize_text_field( $_POST['wpfunos_servicioEPVR_texto'] );
$servicioEPVR_Comentario = wp_kses_post( $_POST['wpfunos_servicioEPVR_Comentario'] );
//Incineración + Ataúd económico + Sin velatorio + Sin ceremonia
$servicioIESS = sanitize_text_field( $_POST['wpfunos_servicioIESS'] );
$servicioIESS_texto = sanitize_text_field( $_POST['wpfunos_servicioIESS_texto'] );
$servicioIESS_Comentario = wp_kses_post( $_POST['wpfunos_servicioIESS_Comentario'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala
$servicioIESO = sanitize_text_field( $_POST['wpfunos_servicioIESO'] );
$servicioIESO_texto = sanitize_text_field( $_POST['wpfunos_servicioIESO_texto'] );
$servicioIESO_Comentario = wp_kses_post( $_POST['wpfunos_servicioIESO_Comentario'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil
$servicioIESC = sanitize_text_field( $_POST['wpfunos_servicioIESC'] );
$servicioIESC_texto = sanitize_text_field( $_POST['wpfunos_servicioIESC_texto'] );
$servicioIESC_Comentario = wp_kses_post( $_POST['wpfunos_servicioIESC_Comentario'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa
$servicioIESR = sanitize_text_field( $_POST['wpfunos_servicioIESR'] );
$servicioIESR_texto = sanitize_text_field( $_POST['wpfunos_servicioIESR_texto'] );
$servicioIESR_Comentario = wp_kses_post( $_POST['wpfunos_servicioIESR_Comentario'] );
//Incineración + Ataúd económico + Con velatorio + Sin ceremonia
$servicioIEVS = sanitize_text_field( $_POST['wpfunos_servicioIEVS'] );
$servicioIEVS_texto = sanitize_text_field( $_POST['wpfunos_servicioIEVS_texto'] );
$servicioIEVS_Comentario = wp_kses_post( $_POST['wpfunos_servicioIEVS_Comentario'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala
$servicioIEVO = sanitize_text_field( $_POST['wpfunos_servicioIEVO'] );
$servicioIEVO_texto = sanitize_text_field( $_POST['wpfunos_servicioIEVO_texto'] );
$servicioIEVO_Comentario = wp_kses_post( $_POST['wpfunos_servicioIEVO_Comentario'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia civil
$servicioIEVC = sanitize_text_field( $_POST['wpfunos_servicioIEVC'] );
$servicioIEVC_texto = sanitize_text_field( $_POST['wpfunos_servicioIEVC_texto'] );
$servicioIEVC_Comentario = wp_kses_post( $_POST['wpfunos_servicioIEVC_Comentario'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa
$servicioIEVR = sanitize_text_field( $_POST['wpfunos_servicioIEVR'] );
$servicioIEVR_texto = sanitize_text_field( $_POST['wpfunos_servicioIEVR_texto'] );
$servicioIEVR_Comentario = wp_kses_post( $_POST['wpfunos_servicioIEVR_Comentario'] );
//Incineración + Ataúd medio + Sin velatorio + Sin ceremonia
$servicioIMSS = sanitize_text_field( $_POST['wpfunos_servicioIMSS'] );
$servicioIMSS_texto = sanitize_text_field( $_POST['wpfunos_servicioIMSS_texto'] );
$servicioIMSS_Comentario = wp_kses_post( $_POST['wpfunos_servicioIMSS_Comentario'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala
$servicioIMSO = sanitize_text_field( $_POST['wpfunos_servicioIMSO'] );
$servicioIMSO_texto = sanitize_text_field( $_POST['wpfunos_servicioIMSO_texto'] );
$servicioIMSO_Comentario = wp_kses_post( $_POST['wpfunos_servicioIMSO_Comentario'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil
$servicioIMSC = sanitize_text_field( $_POST['wpfunos_servicioIMSC'] );
$servicioIMSC_texto = sanitize_text_field( $_POST['wpfunos_servicioIMSC_texto'] );
$servicioIMSC_Comentario = wp_kses_post( $_POST['wpfunos_servicioIMSC_Comentario'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa
$servicioIMSR = sanitize_text_field( $_POST['wpfunos_servicioIMSR'] );
$servicioIMSR_texto = sanitize_text_field( $_POST['wpfunos_servicioIMSR_texto'] );
$servicioIMSR_Comentario = wp_kses_post( $_POST['wpfunos_servicioIMSR_Comentario'] );
//Incineración + Ataúd medio + Con velatorio + Sin ceremonia
$servicioIMVS = sanitize_text_field( $_POST['wpfunos_servicioIMVS'] );
$servicioIMVS_texto = sanitize_text_field( $_POST['wpfunos_servicioIMVS_texto'] );
$servicioIMVS_Comentario = wp_kses_post( $_POST['wpfunos_servicioIMVS_Comentario'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala
$servicioIMVO = sanitize_text_field( $_POST['wpfunos_servicioIMVO'] );
$servicioIMVO_texto = sanitize_text_field( $_POST['wpfunos_servicioIMVO_texto'] );
$servicioIMVO_Comentario = wp_kses_post( $_POST['wpfunos_servicioIMVO_Comentario'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia civil
$servicioIMVC = sanitize_text_field( $_POST['wpfunos_servicioIMVC'] );
$servicioIMVC_texto = sanitize_text_field( $_POST['wpfunos_servicioIMVC_texto'] );
$servicioIMVC_Comentario = wp_kses_post( $_POST['wpfunos_servicioIMVC_Comentario'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa
$servicioIMVR = sanitize_text_field( $_POST['wpfunos_servicioIMVR'] );
$servicioIMVR_texto = sanitize_text_field( $_POST['wpfunos_servicioIMVR_texto'] );
$servicioIMVR_Comentario = wp_kses_post( $_POST['wpfunos_servicioIMVR_Comentario'] );
//Incineración + Ataúd premium + Sin velatorio + Sin ceremonia
$servicioIPSS = sanitize_text_field( $_POST['wpfunos_servicioIPSS'] );
$servicioIPSS_texto = sanitize_text_field( $_POST['wpfunos_servicioIPSS_texto'] );
$servicioIPSS_Comentario = wp_kses_post( $_POST['wpfunos_servicioIPSS_Comentario'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala
$servicioIPSO = sanitize_text_field( $_POST['wpfunos_servicioIPSO'] );
$servicioIPSO_texto = sanitize_text_field( $_POST['wpfunos_servicioIPSO_texto'] );
$servicioIPSO_Comentario = wp_kses_post( $_POST['wpfunos_servicioIPSO_Comentario'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil
$servicioIPSC = sanitize_text_field( $_POST['wpfunos_servicioIPSC'] );
$servicioIPSC_texto = sanitize_text_field( $_POST['wpfunos_servicioIPSC_texto'] );
$servicioIPSC_Comentario = wp_kses_post( $_POST['wpfunos_servicioIPSC_Comentario'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa
$servicioIPSR = sanitize_text_field( $_POST['wpfunos_servicioIPSR'] );
$servicioIPSR_texto = sanitize_text_field( $_POST['wpfunos_servicioIPSR_texto'] );
$servicioIPSR_Comentario = wp_kses_post( $_POST['wpfunos_servicioIPSR_Comentario'] );
//Incineración + Ataúd premium + Con velatorio + Sin ceremonia
$servicioIPVS = sanitize_text_field( $_POST['wpfunos_servicioIPVS'] );
$servicioIPVS_texto = sanitize_text_field( $_POST['wpfunos_servicioIPVS_texto'] );
$servicioIPVS_Comentario = wp_kses_post( $_POST['wpfunos_servicioIPVS_Comentario'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala
$servicioIPVO = sanitize_text_field( $_POST['wpfunos_servicioIPVO'] );
$servicioIPVO_texto = sanitize_text_field( $_POST['wpfunos_servicioIPVO_texto'] );
$servicioIPVO_Comentario = wp_kses_post( $_POST['wpfunos_servicioIPVO_Comentario'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia civil
$servicioIPVC = sanitize_text_field( $_POST['wpfunos_servicioIPVC'] );
$servicioIPVC_texto = sanitize_text_field( $_POST['wpfunos_servicioIPVC_texto'] );
$servicioIPVC_Comentario = wp_kses_post( $_POST['wpfunos_servicioIPVC_Comentario'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa
$servicioIPVR = sanitize_text_field( $_POST['wpfunos_servicioIPVR'] );
$servicioIPVR_texto = sanitize_text_field( $_POST['wpfunos_servicioIPVR_texto'] );
$servicioIPVR_Comentario = wp_kses_post( $_POST['wpfunos_servicioIPVR_Comentario'] );

//==============================================================================

update_post_meta($post_id, 'wpfunos_servicioNombre', $servicioNombre);
update_post_meta($post_id, 'wpfunos_servicioEmpresa', $servicioEmpresa);
update_post_meta($post_id, 'wpfunos_servicioPoblacion', $servicioPoblacion);
update_post_meta($post_id, 'wpfunos_servicioProvincia', $servicioProvincia);
update_post_meta($post_id, 'wpfunos_servicioDireccion', $servicioDireccion);
update_post_meta($post_id, 'wpfunos_servicioPrecioConfirmado', $servicioPrecioConfirmado);
update_post_meta($post_id, 'wpfunos_servicioLogo', $servicioLogo);
update_post_meta($post_id, 'wpfunos_servicioEmail', $servicioEmail);
update_post_meta($post_id, 'wpfunos_servicioTelefono', $servicioTelefono);
update_post_meta($post_id, 'wpfunos_servicioMapa', $servicioMapa);
update_post_meta($post_id, 'wpfunos_servicioLead', $servicioLead);
update_post_meta($post_id, 'wpfunos_servicioLead2', $servicioLead2);
update_post_meta($post_id, 'wpfunos_servicioValoracion', $servicioValoracion);
update_post_meta($post_id, 'wpfunos_servicioActivo', $servicioActivo);

update_post_meta($post_id, 'wpfunos_servicioBotonesLlamar', $servicioBotonesLlamar);
update_post_meta($post_id, 'wpfunos_servicioBotonPresupuesto', $servicioBotonPresupuesto);
update_post_meta($post_id, 'wpfunos_servicioBotonFinanciacion', $servicioBotonFinanciacion);
update_post_meta($post_id, 'wpfunos_servicioTextoPrecio', $servicioTextoPrecio);
update_post_meta($post_id, 'wpfunos_servicioImagenPromo', $servicioImagenPromo);
update_post_meta($post_id, 'wpfunos_Dummy', $Dummy);

update_post_meta($post_id, 'wpfunos_servicioImagenSlider1', $servicioImagenSlider1);
update_post_meta($post_id, 'wpfunos_servicioImagenSlider2', $servicioImagenSlider2);
update_post_meta($post_id, 'wpfunos_servicioImagenSlider3', $servicioImagenSlider3);
update_post_meta($post_id, 'wpfunos_servicioImagenSlider4', $servicioImagenSlider4);
update_post_meta($post_id, 'wpfunos_servicioImagenSlider5', $servicioImagenSlider5);

update_post_meta($post_id, 'wpfunos_servicioPackNombre', $servicioPackNombre);
update_post_meta($post_id, 'wpfunos_servicioPrecioBase', $servicioPrecioBase);
update_post_meta($post_id, 'wpfunos_servicioPrecioBaseComentario', $servicioPrecioBaseComentario);
update_post_meta($post_id, 'wpfunos_servicioDestino_1Nombre', $servicioDestino_1Nombre);
update_post_meta($post_id, 'wpfunos_servicioDestino_1Precio', $servicioDestino_1Precio);
update_post_meta($post_id, 'wpfunos_servicioDestino_2Nombre', $servicioDestino_2Nombre);
update_post_meta($post_id, 'wpfunos_servicioDestino_2Precio', $servicioDestino_2Precio);
update_post_meta($post_id, 'wpfunos_servicioDestino_3Nombre', $servicioDestino_3Nombre);
update_post_meta($post_id, 'wpfunos_servicioDestino_3Precio', $servicioDestino_3Precio);
update_post_meta($post_id, 'wpfunos_servicioAtaudEcologico_1Nombre', $servicioAtaudEcologico_1Nombre);
update_post_meta($post_id, 'wpfunos_servicioAtaudEcologico_1Precio', $servicioAtaudEcologico_1Precio);
update_post_meta($post_id, 'wpfunos_servicioAtaudEcologico_2Nombre', $servicioAtaudEcologico_2Nombre);
update_post_meta($post_id, 'wpfunos_servicioAtaudEcologico_2Precio', $servicioAtaudEcologico_2Precio);
update_post_meta($post_id, 'wpfunos_servicioAtaudEcologico_3Nombre', $servicioAtaudEcologico_3Nombre);
update_post_meta($post_id, 'wpfunos_servicioAtaudEcologico_3Precio', $servicioAtaudEcologico_3Precio);
update_post_meta($post_id, 'wpfunos_servicioVelatorioNombre', $servicioVelatorioNombre);
update_post_meta($post_id, 'wpfunos_servicioVelatorioPrecio', $servicioVelatorioPrecio);
update_post_meta($post_id, 'wpfunos_servicioVelatorioNoNombre', $servicioVelatorioNoNombre);
update_post_meta($post_id, 'wpfunos_servicioVelatorioNoPrecio', $servicioVelatorioNoPrecio);
update_post_meta($post_id, 'wpfunos_servicioDespedida_1Nombre', $servicioDespedida_1Nombre);
update_post_meta($post_id, 'wpfunos_servicioDespedida_1Precio', $servicioDespedida_1Precio);
update_post_meta($post_id, 'wpfunos_servicioDespedida_2Nombre', $servicioDespedida_2Nombre);
update_post_meta($post_id, 'wpfunos_servicioDespedida_2Precio', $servicioDespedida_2Precio);
update_post_meta($post_id, 'wpfunos_servicioDespedida_3Nombre', $servicioDespedida_3Nombre);
update_post_meta($post_id, 'wpfunos_servicioDespedida_3Precio', $servicioDespedida_3Precio);

update_post_meta($post_id, 'wpfunos_servicioBloquearComentario', $servicioBloquearComentario);
update_post_meta($post_id, 'wpfunos_servicioActualizarComentario', $servicioActualizarComentario);

update_post_meta($post_id, 'wpfunos_servicioDestino_1Comentario', $servicioDestino_1Comentario);
update_post_meta($post_id, 'wpfunos_servicioDestino_2Comentario', $servicioDestino_2Comentario);
update_post_meta($post_id, 'wpfunos_servicioDestino_3Comentario', $servicioDestino_3Comentario);
update_post_meta($post_id, 'wpfunos_servicioAtaudEcologico_1Comentario', $servicioAtaudEcologico_1Comentario);
update_post_meta($post_id, 'wpfunos_servicioAtaudEcologico_2Comentario', $servicioAtaudEcologico_2Comentario);
update_post_meta($post_id, 'wpfunos_servicioAtaudEcologico_3Comentario', $servicioAtaudEcologico_3Comentario);
update_post_meta($post_id, 'wpfunos_servicioVelatorioComentario', $servicioVelatorioComentario);
update_post_meta($post_id, 'wpfunos_servicioVelatorioNoComentario', $servicioVelatorioNoComentario);
update_post_meta($post_id, 'wpfunos_servicioDespedida_1Comentario', $servicioDespedida_1Comentario);
update_post_meta($post_id, 'wpfunos_servicioDespedida_2Comentario', $servicioDespedida_2Comentario);
update_post_meta($post_id, 'wpfunos_servicioDespedida_3Comentario', $servicioDespedida_3Comentario);
update_post_meta($post_id, 'wpfunos_servicioPosiblesExtras', $servicioPosiblesExtras);



//Entierro + Ataúd económico + Sin velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_servicioEESS', $servicioEESS);
update_post_meta($post_id, 'wpfunos_servicioEESS_texto', $servicioEESS_texto);
update_post_meta($post_id, 'wpfunos_servicioEESS_Comentario', $servicioEESS_Comentario);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_servicioEESO', $servicioEESO);
update_post_meta($post_id, 'wpfunos_servicioEESO_texto', $servicioEESO_texto);
update_post_meta($post_id, 'wpfunos_servicioEESO_Comentario', $servicioEESO_Comentario);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_servicioEESC', $servicioEESC);
update_post_meta($post_id, 'wpfunos_servicioEESC_texto', $servicioEESC_texto);
update_post_meta($post_id, 'wpfunos_servicioEESC_Comentario', $servicioEESC_Comentario);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_servicioEESR', $servicioEESR);
update_post_meta($post_id, 'wpfunos_servicioEESR_texto', $servicioEESR_texto);
update_post_meta($post_id, 'wpfunos_servicioEESR_Comentario', $servicioEESR_Comentario);
//Entierro + Ataúd económico + Con velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_servicioEEVS', $servicioEEVS);
update_post_meta($post_id, 'wpfunos_servicioEEVS_texto', $servicioEEVS_texto);
update_post_meta($post_id, 'wpfunos_servicioEEVS_Comentario', $servicioEEVS_Comentario);
//ntierro + Ataúd económico + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_servicioEEVO', $servicioEEVO);
update_post_meta($post_id, 'wpfunos_servicioEEVO_texto', $servicioEEVO_texto);
update_post_meta($post_id, 'wpfunos_servicioEEVO_Comentario', $servicioEEVO_Comentario);
//Entierro + Ataúd económico + Con velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_servicioEEVC', $servicioEEVC);
update_post_meta($post_id, 'wpfunos_servicioEEVC_texto', $servicioEEVC_texto);
update_post_meta($post_id, 'wpfunos_servicioEEVC_Comentario', $servicioEEVC_Comentario);
//Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_servicioEEVR', $servicioEEVR);
update_post_meta($post_id, 'wpfunos_servicioEEVR_texto', $servicioEEVR_texto);
update_post_meta($post_id, 'wpfunos_servicioEEVR_Comentario', $servicioEEVR_Comentario);
//Entierro + Ataúd medio + Sin velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_servicioEMSS', $servicioEMSS);
update_post_meta($post_id, 'wpfunos_servicioEMSS_texto', $servicioEMSS_texto);
update_post_meta($post_id, 'wpfunos_servicioEMSS_Comentario', $servicioEMSS_Comentario);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_servicioEMSO', $servicioEMSO);
update_post_meta($post_id, 'wpfunos_servicioEMSO_texto', $servicioEMSO_texto);
update_post_meta($post_id, 'wpfunos_servicioEMSO_Comentario', $servicioEMSO_Comentario);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_servicioEMSC', $servicioEMSC);
update_post_meta($post_id, 'wpfunos_servicioEMSC_texto', $servicioEMSC_texto);
update_post_meta($post_id, 'wpfunos_servicioEMSC_Comentario', $servicioEMSC_Comentario);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_servicioEMSR', $servicioEMSR);
update_post_meta($post_id, 'wpfunos_servicioEMSR_texto', $servicioEMSR_texto);
update_post_meta($post_id, 'wpfunos_servicioEMSR_Comentario', $servicioEMSR_Comentario);
//Entierro + Ataúd medio + Con velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_servicioEMVS', $servicioEMVS);
update_post_meta($post_id, 'wpfunos_servicioEMVS_texto', $servicioEMVS_texto);
update_post_meta($post_id, 'wpfunos_servicioEMVS_Comentario', $servicioEMVS_Comentario);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_servicioEMVO', $servicioEMVO);
update_post_meta($post_id, 'wpfunos_servicioEMVO_texto', $servicioEMVO_texto);
update_post_meta($post_id, 'wpfunos_servicioEMVO_Comentario', $servicioEMVO_Comentario);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_servicioEMVC', $servicioEMVC);
update_post_meta($post_id, 'wpfunos_servicioEMVC_texto', $servicioEMVC_texto);
update_post_meta($post_id, 'wpfunos_servicioEMVC_Comentario', $servicioEMVC_Comentario);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_servicioEMVR', $servicioEMVR);
update_post_meta($post_id, 'wpfunos_servicioEMVR_texto', $servicioEMVR_texto);
update_post_meta($post_id, 'wpfunos_servicioEMVR_Comentario', $servicioEMVR_Comentario);
//Entierro + Ataúd premium + Sin velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_servicioEPSS', $servicioEPSS);
update_post_meta($post_id, 'wpfunos_servicioEPSS_texto', $servicioEPSS_texto);
update_post_meta($post_id, 'wpfunos_servicioEPSS_Comentario', $servicioEPSS_Comentario);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_servicioEPSO', $servicioEPSO);
update_post_meta($post_id, 'wpfunos_servicioEPSO_texto', $servicioEPSO_texto);
update_post_meta($post_id, 'wpfunos_servicioEPSO_Comentario', $servicioEPSO_Comentario);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_servicioEPSC', $servicioEPSC);
update_post_meta($post_id, 'wpfunos_servicioEPSC_texto', $servicioEPSC_texto);
update_post_meta($post_id, 'wpfunos_servicioEPSC_Comentario', $servicioEPSC_Comentario);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_servicioEPSR', $servicioEPSR);
update_post_meta($post_id, 'wpfunos_servicioEPSR_texto', $servicioEPSR_texto);
update_post_meta($post_id, 'wpfunos_servicioEPSR_Comentario', $servicioEPSR_Comentario);
//Entierro + Ataúd premium + Con velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_servicioEPVS', $servicioEPVS);
update_post_meta($post_id, 'wpfunos_servicioEPVS_texto', $servicioEPVS_texto);
update_post_meta($post_id, 'wpfunos_servicioEPVS_Comentario', $servicioEPVS_Comentario);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_servicioEPVO', $servicioEPVO);
update_post_meta($post_id, 'wpfunos_servicioEPVO_texto', $servicioEPVO_texto);
update_post_meta($post_id, 'wpfunos_servicioEPVO_Comentario', $servicioEPVO_Comentario);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_servicioEPVC', $servicioEPVC);
update_post_meta($post_id, 'wpfunos_servicioEPVC_texto', $servicioEPVC_texto);
update_post_meta($post_id, 'wpfunos_servicioEPVC_Comentario', $servicioEPVC_Comentario);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_servicioEPVR', $servicioEPVR);
update_post_meta($post_id, 'wpfunos_servicioEPVR_texto', $servicioEPVR_texto);
update_post_meta($post_id, 'wpfunos_servicioEPVR_Comentario', $servicioEPVR_Comentario);
//Incineración + Ataúd económico + Sin velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_servicioIESS', $servicioIESS);
update_post_meta($post_id, 'wpfunos_servicioIESS_texto', $servicioIESS_texto);
update_post_meta($post_id, 'wpfunos_servicioIESS_Comentario', $servicioIESS_Comentario);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_servicioIESO', $servicioIESO);
update_post_meta($post_id, 'wpfunos_servicioIESO_texto', $servicioIESO_texto);
update_post_meta($post_id, 'wpfunos_servicioIESO_Comentario', $servicioIESO_Comentario);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_servicioIESC', $servicioIESC);
update_post_meta($post_id, 'wpfunos_servicioIESC_texto', $servicioIESC_texto);
update_post_meta($post_id, 'wpfunos_servicioIESC_Comentario', $servicioIESC_Comentario);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_servicioIESR', $servicioIESR);
update_post_meta($post_id, 'wpfunos_servicioIESR_texto', $servicioIESR_texto);
update_post_meta($post_id, 'wpfunos_servicioIESR_Comentario', $servicioIESR_Comentario);
//Incineración + Ataúd económico + Con velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_servicioIEVS', $servicioIEVS);
update_post_meta($post_id, 'wpfunos_servicioIEVS_texto', $servicioIEVS_texto);
update_post_meta($post_id, 'wpfunos_servicioIEVS_Comentario', $servicioIEVS_Comentario);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_servicioIEVO', $servicioIEVO);
update_post_meta($post_id, 'wpfunos_servicioIEVO_texto', $servicioIEVO_texto);
update_post_meta($post_id, 'wpfunos_servicioIEVO_Comentario', $servicioIEVO_Comentario);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_servicioIEVC', $servicioIEVC);
update_post_meta($post_id, 'wpfunos_servicioIEVC_texto', $servicioIEVC_texto);
update_post_meta($post_id, 'wpfunos_servicioIEVC_Comentario', $servicioIEVC_Comentario);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_servicioIEVR', $servicioIEVR);
update_post_meta($post_id, 'wpfunos_servicioIEVR_texto', $servicioIEVR_texto);
update_post_meta($post_id, 'wpfunos_servicioIEVR_Comentario', $servicioIEVR_Comentario);
//Incineración + Ataúd medio + Sin velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_servicioIMSS', $servicioIMSS);
update_post_meta($post_id, 'wpfunos_servicioIMSS_texto', $servicioIMSS_texto);
update_post_meta($post_id, 'wpfunos_servicioIMSS_Comentario', $servicioIMSS_Comentario);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_servicioIMSO', $servicioIMSO);
update_post_meta($post_id, 'wpfunos_servicioIMSO_texto', $servicioIMSO_texto);
update_post_meta($post_id, 'wpfunos_servicioIMSO_Comentario', $servicioIMSO_Comentario);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_servicioIMSC', $servicioIMSC);
update_post_meta($post_id, 'wpfunos_servicioIMSC_texto', $servicioIMSC_texto);
update_post_meta($post_id, 'wpfunos_servicioIMSC_Comentario', $servicioIMSC_Comentario);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_servicioIMSR', $servicioIMSR);
update_post_meta($post_id, 'wpfunos_servicioIMSR_texto', $servicioIMSR_texto);
update_post_meta($post_id, 'wpfunos_servicioIMSR_Comentario', $servicioIMSR_Comentario);
//Incineración + Ataúd medio + Con velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_servicioIMVS', $servicioIMVS);
update_post_meta($post_id, 'wpfunos_servicioIMVS_texto', $servicioIMVS_texto);
update_post_meta($post_id, 'wpfunos_servicioIMVS_Comentario', $servicioIMVS_Comentario);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_servicioIMVO', $servicioIMVO);
update_post_meta($post_id, 'wpfunos_servicioIMVO_texto', $servicioIMVO_texto);
update_post_meta($post_id, 'wpfunos_servicioIMVO_Comentario', $servicioIMVO_Comentario);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_servicioIMVC', $servicioIMVC);
update_post_meta($post_id, 'wpfunos_servicioIMVC_texto', $servicioIMVC_texto);
update_post_meta($post_id, 'wpfunos_servicioIMVC_Comentario', $servicioIMVC_Comentario);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_servicioIMVR', $servicioIMVR);
update_post_meta($post_id, 'wpfunos_servicioIMVR_texto', $servicioIMVR_texto);
update_post_meta($post_id, 'wpfunos_servicioIMVR_Comentario', $servicioIMVR_Comentario);
//Incineración + Ataúd premium + Sin velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_servicioIPSS', $servicioIPSS);
update_post_meta($post_id, 'wpfunos_servicioIPSS_texto', $servicioIPSS_texto);
update_post_meta($post_id, 'wpfunos_servicioIPSS_Comentario', $servicioIPSS_Comentario);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_servicioIPSO', $servicioIPSO);
update_post_meta($post_id, 'wpfunos_servicioIPSO_texto', $servicioIPSO_texto);
update_post_meta($post_id, 'wpfunos_servicioIPSO_Comentario', $servicioIPSO_Comentario);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_servicioIPSC', $servicioIPSC);
update_post_meta($post_id, 'wpfunos_servicioIPSC_texto', $servicioIPSC_texto);
update_post_meta($post_id, 'wpfunos_servicioIPSC_Comentario', $servicioIPSC_Comentario);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_servicioIPSR', $servicioIPSR);
update_post_meta($post_id, 'wpfunos_servicioIPSR_texto', $servicioIPSR_texto);
update_post_meta($post_id, 'wpfunos_servicioIPSR_Comentario', $servicioIPSR_Comentario);
//Incineración + Ataúd premium + Con velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_servicioIPVS', $servicioIPVS);
update_post_meta($post_id, 'wpfunos_servicioIPVS_texto', $servicioIPVS_texto);
update_post_meta($post_id, 'wpfunos_servicioIPVS_Comentario', $servicioIPVS_Comentario);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_servicioIPVO', $servicioIPVO);
update_post_meta($post_id, 'wpfunos_servicioIPVO_texto', $servicioIPVO_texto);
update_post_meta($post_id, 'wpfunos_servicioIPVO_Comentario', $servicioIPVO_Comentario);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_servicioIPVC', $servicioIPVC);
update_post_meta($post_id, 'wpfunos_servicioIPVC_texto', $servicioIPVC_texto);
update_post_meta($post_id, 'wpfunos_servicioIPVC_Comentario', $servicioIPVC_Comentario);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_servicioIPVR', $servicioIPVR);
update_post_meta($post_id, 'wpfunos_servicioIPVR_texto', $servicioIPVR_texto);
update_post_meta($post_id, 'wpfunos_servicioIPVR_Comentario', $servicioIPVR_Comentario);
