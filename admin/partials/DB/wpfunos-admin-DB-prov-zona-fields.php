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
$provinciasProvincia = sanitize_text_field( $_POST['wpfunos_provinciasProvincia'] );
$provinciasCodigo = sanitize_text_field( $_POST['wpfunos_provinciasCodigo'] );
$provinciasISO31662 = sanitize_text_field( $_POST['wpfunos_provinciasISO31662'] );
$Dummy = sanitize_text_field( $_POST['wpfunos_Dummy'] );
//Entierro + Ataúd económico + Sin velatorio + Sin ceremonia
$provinciasEESS = sanitize_text_field( $_POST['wpfunos_provinciasEESS'] );
$provinciasEESS_ck = sanitize_text_field( $_POST['wpfunos_provinciasEESS_ck'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala
$provinciasEESO = sanitize_text_field( $_POST['wpfunos_provinciasEESO'] );
$provinciasEESO_ck = sanitize_text_field( $_POST['wpfunos_provinciasEESO_ck'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil
$provinciasEESC = sanitize_text_field( $_POST['wpfunos_provinciasEESC'] );
$provinciasEESC_ck = sanitize_text_field( $_POST['wpfunos_provinciasEESC_ck'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa
$provinciasEESR = sanitize_text_field( $_POST['wpfunos_provinciasEESR'] );
$provinciasEESR_ck = sanitize_text_field( $_POST['wpfunos_provinciasEESR_ck'] );
//Entierro + Ataúd económico + Con velatorio + Sin ceremonia
$provinciasEEVS = sanitize_text_field( $_POST['wpfunos_provinciasEEVS'] );
$provinciasEEVS_ck = sanitize_text_field( $_POST['wpfunos_provinciasEEVS_ck'] );
//ntierro + Ataúd económico + Con velatorio + Con ceremonia solo sala
$provinciasEEVO = sanitize_text_field( $_POST['wpfunos_provinciasEEVO'] );
$provinciasEEVO_ck = sanitize_text_field( $_POST['wpfunos_provinciasEEVO_ck'] );
//Entierro + Ataúd económico + Con velatorio + Con ceremonia civil
$provinciasEEVC = sanitize_text_field( $_POST['wpfunos_provinciasEEVC'] );
$provinciasEEVC_ck = sanitize_text_field( $_POST['wpfunos_provinciasEEVC_ck'] );
//Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa
$provinciasEEVR = sanitize_text_field( $_POST['wpfunos_provinciasEEVR'] );
$provinciasEEVR_ck = sanitize_text_field( $_POST['wpfunos_provinciasEEVR_ck'] );
//Entierro + Ataúd medio + Sin velatorio + Sin ceremonia
$provinciasEMSS = sanitize_text_field( $_POST['wpfunos_provinciasEMSS'] );
$provinciasEMSS_ck = sanitize_text_field( $_POST['wpfunos_provinciasEMSS_ck'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala
$provinciasEMSO = sanitize_text_field( $_POST['wpfunos_provinciasEMSO'] );
$provinciasEMSO_ck = sanitize_text_field( $_POST['wpfunos_provinciasEMSO_ck'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil
$provinciasEMSC = sanitize_text_field( $_POST['wpfunos_provinciasEMSC'] );
$provinciasEMSC_ck = sanitize_text_field( $_POST['wpfunos_provinciasEMSC_ck'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa
$provinciasEMSR = sanitize_text_field( $_POST['wpfunos_provinciasEMSR'] );
$provinciasEMSR_ck = sanitize_text_field( $_POST['wpfunos_provinciasEMSR_ck'] );
//Entierro + Ataúd medio + Con velatorio + Sin ceremonia
$provinciasEMVS = sanitize_text_field( $_POST['wpfunos_provinciasEMVS'] );
$provinciasEMVS_ck = sanitize_text_field( $_POST['wpfunos_provinciasEMVS_ck'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala
$provinciasEMVO = sanitize_text_field( $_POST['wpfunos_provinciasEMVO'] );
$provinciasEMVO_ck = sanitize_text_field( $_POST['wpfunos_provinciasEMVO_ck'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia civil
$provinciasEMVC = sanitize_text_field( $_POST['wpfunos_provinciasEMVC'] );
$provinciasEMVC_ck = sanitize_text_field( $_POST['wpfunos_provinciasEMVC_ck'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa
$provinciasEMVR = sanitize_text_field( $_POST['wpfunos_provinciasEMVR'] );
$provinciasEMVR_ck = sanitize_text_field( $_POST['wpfunos_provinciasEMVR_ck'] );
//Entierro + Ataúd premium + Sin velatorio + Sin ceremonia
$provinciasEPSS = sanitize_text_field( $_POST['wpfunos_provinciasEPSS'] );
$provinciasEPSS_ck = sanitize_text_field( $_POST['wpfunos_provinciasEPSS_ck'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala
$provinciasEPSO = sanitize_text_field( $_POST['wpfunos_provinciasEPSO'] );
$provinciasEPSO_ck = sanitize_text_field( $_POST['wpfunos_provinciasEPSO_ck'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil
$provinciasEPSC = sanitize_text_field( $_POST['wpfunos_provinciasEPSC'] );
$provinciasEPSC_ck = sanitize_text_field( $_POST['wpfunos_provinciasEPSC_ck'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa
$provinciasEPSR = sanitize_text_field( $_POST['wpfunos_provinciasEPSR'] );
$provinciasEPSR_ck = sanitize_text_field( $_POST['wpfunos_provinciasEPSR_ck'] );
//Entierro + Ataúd premium + Con velatorio + Sin ceremonia
$provinciasEPVS = sanitize_text_field( $_POST['wpfunos_provinciasEPVS'] );
$provinciasEPVS_ck = sanitize_text_field( $_POST['wpfunos_provinciasEPVS_ck'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala
$provinciasEPVO = sanitize_text_field( $_POST['wpfunos_provinciasEPVO'] );
$provinciasEPVO_ck = sanitize_text_field( $_POST['wpfunos_provinciasEPVO_ck'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia civil
$provinciasEPVC = sanitize_text_field( $_POST['wpfunos_provinciasEPVC'] );
$provinciasEPVC_ck = sanitize_text_field( $_POST['wpfunos_provinciasEPVC_ck'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa
$provinciasEPVR = sanitize_text_field( $_POST['wpfunos_provinciasEPVR'] );
$provinciasEPVR_ck = sanitize_text_field( $_POST['wpfunos_provinciasEPVR_ck'] );
//Incineración + Ataúd económico + Sin velatorio + Sin ceremonia
$provinciasIESS = sanitize_text_field( $_POST['wpfunos_provinciasIESS'] );
$provinciasIESS_ck = sanitize_text_field( $_POST['wpfunos_provinciasIESS_ck'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala
$provinciasIESO = sanitize_text_field( $_POST['wpfunos_provinciasIESO'] );
$provinciasIESO_ck = sanitize_text_field( $_POST['wpfunos_provinciasIESO_ck'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil
$provinciasIESC = sanitize_text_field( $_POST['wpfunos_provinciasIESC'] );
$provinciasIESC_ck = sanitize_text_field( $_POST['wpfunos_provinciasIESC_ck'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa
$provinciasIESR = sanitize_text_field( $_POST['wpfunos_provinciasIESR'] );
$provinciasIESR_ck = sanitize_text_field( $_POST['wpfunos_provinciasIESR_ck'] );
//Incineración + Ataúd económico + Con velatorio + Sin ceremonia
$provinciasIEVS = sanitize_text_field( $_POST['wpfunos_provinciasIEVS'] );
$provinciasIEVS_ck = sanitize_text_field( $_POST['wpfunos_provinciasIEVS_ck'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala
$provinciasIEVO = sanitize_text_field( $_POST['wpfunos_provinciasIEVO'] );
$provinciasIEVO_ck = sanitize_text_field( $_POST['wpfunos_provinciasIEVO_ck'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia civil
$provinciasIEVC = sanitize_text_field( $_POST['wpfunos_provinciasIEVC'] );
$provinciasIEVC_ck = sanitize_text_field( $_POST['wpfunos_provinciasIEVC_ck'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa
$provinciasIEVR = sanitize_text_field( $_POST['wpfunos_provinciasIEVR'] );
$provinciasIEVR_ck = sanitize_text_field( $_POST['wpfunos_provinciasIEVR_ck'] );
//Incineración + Ataúd medio + Sin velatorio + Sin ceremonia
$provinciasIMSS = sanitize_text_field( $_POST['wpfunos_provinciasIMSS'] );
$provinciasIMSS_ck = sanitize_text_field( $_POST['wpfunos_provinciasIMSS_ck'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala
$provinciasIMSO = sanitize_text_field( $_POST['wpfunos_provinciasIMSO'] );
$provinciasIMSO_ck = sanitize_text_field( $_POST['wpfunos_provinciasIMSO_ck'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil
$provinciasIMSC = sanitize_text_field( $_POST['wpfunos_provinciasIMSC'] );
$provinciasIMSC_ck = sanitize_text_field( $_POST['wpfunos_provinciasIMSC_ck'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa
$provinciasIMSR = sanitize_text_field( $_POST['wpfunos_provinciasIMSR'] );
$provinciasIMSR_ck = sanitize_text_field( $_POST['wpfunos_provinciasIMSR_ck'] );
//Incineración + Ataúd medio + Con velatorio + Sin ceremonia
$provinciasIMVS = sanitize_text_field( $_POST['wpfunos_provinciasIMVS'] );
$provinciasIMVS_ck = sanitize_text_field( $_POST['wpfunos_provinciasIMVS_ck'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala
$provinciasIMVO = sanitize_text_field( $_POST['wpfunos_provinciasIMVO'] );
$provinciasIMVO_ck = sanitize_text_field( $_POST['wpfunos_provinciasIMVO_ck'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia civil
$provinciasIMVC = sanitize_text_field( $_POST['wpfunos_provinciasIMVC'] );
$provinciasIMVC_ck = sanitize_text_field( $_POST['wpfunos_provinciasIMVC_ck'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa
$provinciasIMVR = sanitize_text_field( $_POST['wpfunos_provinciasIMVR'] );
$provinciasIMVR_ck = sanitize_text_field( $_POST['wpfunos_provinciasIMVR_ck'] );
//Incineración + Ataúd premium + Sin velatorio + Sin ceremonia
$provinciasIPSS = sanitize_text_field( $_POST['wpfunos_provinciasIPSS'] );
$provinciasIPSS_ck = sanitize_text_field( $_POST['wpfunos_provinciasIPSS_ck'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala
$provinciasIPSO = sanitize_text_field( $_POST['wpfunos_provinciasIPSO'] );
$provinciasIPSO_ck = sanitize_text_field( $_POST['wpfunos_provinciasIPSO_ck'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil
$provinciasIPSC = sanitize_text_field( $_POST['wpfunos_provinciasIPSC'] );
$provinciasIPSC_ck = sanitize_text_field( $_POST['wpfunos_provinciasIPSC_ck'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa
$provinciasIPSR = sanitize_text_field( $_POST['wpfunos_provinciasIPSR'] );
$provinciasIPSR_ck = sanitize_text_field( $_POST['wpfunos_provinciasIPSR_ck'] );
//Incineración + Ataúd premium + Con velatorio + Sin ceremonia
$provinciasIPVS = sanitize_text_field( $_POST['wpfunos_provinciasIPVS'] );
$provinciasIPVS_ck = sanitize_text_field( $_POST['wpfunos_provinciasIPVS_ck'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala
$provinciasIPVO = sanitize_text_field( $_POST['wpfunos_provinciasIPVO'] );
$provinciasIPVO_ck = sanitize_text_field( $_POST['wpfunos_provinciasIPVO_ck'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia civil
$provinciasIPVC = sanitize_text_field( $_POST['wpfunos_provinciasIPVC'] );
$provinciasIPVC_ck = sanitize_text_field( $_POST['wpfunos_provinciasIPVC_ck'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa
$provinciasIPVR = sanitize_text_field( $_POST['wpfunos_provinciasIPVR'] );
$provinciasIPVR_ck = sanitize_text_field( $_POST['wpfunos_provinciasIPVR_ck'] );

$provinciasComentarios = wp_kses_post( $_POST['wpfunos_provinciasComentarios'] );
$provinciasTitulo = sanitize_text_field( $_POST['wpfunos_provinciasTitulo'] );


update_post_meta($post_id, 'wpfunos_provinciasProvincia', $provinciasProvincia);
update_post_meta($post_id, 'wpfunos_provinciasCodigo', $provinciasCodigo);
update_post_meta($post_id, 'wpfunos_provinciasISO31662', $provinciasISO31662);
update_post_meta($post_id, 'wpfunos_Dummy', $Dummy);
//Entierro + Ataúd económico + Sin velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_provinciasEESS', $provinciasEESS);
update_post_meta($post_id, 'wpfunos_provinciasEESS_ck', $provinciasEESS_ck);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_provinciasEESO', $provinciasEESO);
update_post_meta($post_id, 'wpfunos_provinciasEESO_ck', $provinciasEESO_ck);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_provinciasEESC', $provinciasEESC);
update_post_meta($post_id, 'wpfunos_provinciasEESC_ck', $provinciasEESC_ck);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_provinciasEESR', $provinciasEESR);
update_post_meta($post_id, 'wpfunos_provinciasEESR_ck', $provinciasEESR_ck);
//Entierro + Ataúd económico + Con velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_provinciasEEVS', $provinciasEEVS);
update_post_meta($post_id, 'wpfunos_provinciasEEVS_ck', $provinciasEEVS_ck);
//ntierro + Ataúd económico + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_provinciasEEVO', $provinciasEEVO);
update_post_meta($post_id, 'wpfunos_provinciasEEVO_ck', $provinciasEEVO_ck);
//Entierro + Ataúd económico + Con velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_provinciasEEVC', $provinciasEEVC);
update_post_meta($post_id, 'wpfunos_provinciasEEVC_ck', $provinciasEEVC_ck);
//Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_provinciasEEVR', $provinciasEEVR);
update_post_meta($post_id, 'wpfunos_provinciasEEVR_ck', $provinciasEEVR_ck);
//Entierro + Ataúd medio + Sin velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_provinciasEMSS', $provinciasEMSS);
update_post_meta($post_id, 'wpfunos_provinciasEMSS_ck', $provinciasEMSS_ck);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_provinciasEMSO', $provinciasEMSO);
update_post_meta($post_id, 'wpfunos_provinciasEMSO_ck', $provinciasEMSO_ck);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_provinciasEMSC', $provinciasEMSC);
update_post_meta($post_id, 'wpfunos_provinciasEMSC_ck', $provinciasEMSC_ck);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_provinciasEMSR', $provinciasEMSR);
update_post_meta($post_id, 'wpfunos_provinciasEMSR_ck', $provinciasEMSR_ck);
//Entierro + Ataúd medio + Con velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_provinciasEMVS', $provinciasEMVS);
update_post_meta($post_id, 'wpfunos_provinciasEMVS_ck', $provinciasEMVS_ck);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_provinciasEMVO', $provinciasEMVO);
update_post_meta($post_id, 'wpfunos_provinciasEMVO_ck', $provinciasEMVO_ck);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_provinciasEMVC', $provinciasEMVC);
update_post_meta($post_id, 'wpfunos_provinciasEMVC_ck', $provinciasEMVC_ck);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_provinciasEMVR', $provinciasEMVR);
update_post_meta($post_id, 'wpfunos_provinciasEMVR_ck', $provinciasEMVR_ck);
//Entierro + Ataúd premium + Sin velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_provinciasEPSS', $provinciasEPSS);
update_post_meta($post_id, 'wpfunos_provinciasEPSS_ck', $provinciasEPSS_ck);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_provinciasEPSO', $provinciasEPSO);
update_post_meta($post_id, 'wpfunos_provinciasEPSO_ck', $provinciasEPSO_ck);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_provinciasEPSC', $provinciasEPSC);
update_post_meta($post_id, 'wpfunos_provinciasEPSC_ck', $provinciasEPSC_ck);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_provinciasEPSR', $provinciasEPSR);
update_post_meta($post_id, 'wpfunos_provinciasEPSR_ck', $provinciasEPSR_ck);
//Entierro + Ataúd premium + Con velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_provinciasEPVS', $provinciasEPVS);
update_post_meta($post_id, 'wpfunos_provinciasEPVS_ck', $provinciasEPVS_ck);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_provinciasEPVO', $provinciasEPVO);
update_post_meta($post_id, 'wpfunos_provinciasEPVO_ck', $provinciasEPVO_ck);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_provinciasEPVC', $provinciasEPVC);
update_post_meta($post_id, 'wpfunos_provinciasEPVC_ck', $provinciasEPVC_ck);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_provinciasEPVR', $provinciasEPVR);
update_post_meta($post_id, 'wpfunos_provinciasEPVR_ck', $provinciasEPVR_ck);
//Incineración + Ataúd económico + Sin velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_provinciasIESS', $provinciasIESS);
update_post_meta($post_id, 'wpfunos_provinciasIESS_ck', $provinciasIESS_ck);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_provinciasIESO', $provinciasIESO);
update_post_meta($post_id, 'wpfunos_provinciasIESO_ck', $provinciasIESO_ck);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_provinciasIESC', $provinciasIESC);
update_post_meta($post_id, 'wpfunos_provinciasIESC_ck', $provinciasIESC_ck);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_provinciasIESR', $provinciasIESR);
update_post_meta($post_id, 'wpfunos_provinciasIESR_ck', $provinciasIESR_ck);
//Incineración + Ataúd económico + Con velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_provinciasIEVS', $provinciasIEVS);
update_post_meta($post_id, 'wpfunos_provinciasIEVS_ck', $provinciasIEVS_ck);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_provinciasIEVO', $provinciasIEVO);
update_post_meta($post_id, 'wpfunos_provinciasIEVO_ck', $provinciasIEVO_ck);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_provinciasIEVC', $provinciasIEVC);
update_post_meta($post_id, 'wpfunos_provinciasIEVC_ck', $provinciasIEVC_ck);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_provinciasIEVR', $provinciasIEVR);
update_post_meta($post_id, 'wpfunos_provinciasIEVR_ck', $provinciasIEVR_ck);
//Incineración + Ataúd medio + Sin velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_provinciasIMSS', $provinciasIMSS);
update_post_meta($post_id, 'wpfunos_provinciasIMSS_ck', $provinciasIMSS_ck);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_provinciasIMSO', $provinciasIMSO);
update_post_meta($post_id, 'wpfunos_provinciasIMSO_ck', $provinciasIMSO_ck);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_provinciasIMSC', $provinciasIMSC);
update_post_meta($post_id, 'wpfunos_provinciasIMSC_ck', $provinciasIMSC_ck);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_provinciasIMSR', $provinciasIMSR);
update_post_meta($post_id, 'wpfunos_provinciasIMSR_ck', $provinciasIMSR_ck);
//Incineración + Ataúd medio + Con velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_provinciasIMVS', $provinciasIMVS);
update_post_meta($post_id, 'wpfunos_provinciasIMVS_ck', $provinciasIMVS_ck);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_provinciasIMVO', $provinciasIMVO);
update_post_meta($post_id, 'wpfunos_provinciasIMVO_ck', $provinciasIMVO_ck);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_provinciasIMVC', $provinciasIMVC);
update_post_meta($post_id, 'wpfunos_provinciasIMVC_ck', $provinciasIMVC_ck);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_provinciasIMVR', $provinciasIMVR);
update_post_meta($post_id, 'wpfunos_provinciasIMVR_ck', $provinciasIMVR_ck);
//Incineración + Ataúd premium + Sin velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_provinciasIPSS', $provinciasIPSS);
update_post_meta($post_id, 'wpfunos_provinciasIPSS_ck', $provinciasIPSS_ck);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_provinciasIPSO', $provinciasIPSO);
update_post_meta($post_id, 'wpfunos_provinciasIPSO_ck', $provinciasIPSO_ck);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_provinciasIPSC', $provinciasIPSC);
update_post_meta($post_id, 'wpfunos_provinciasIPSC_ck', $provinciasIPSC_ck);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_provinciasIPSR', $provinciasIPSR);
update_post_meta($post_id, 'wpfunos_provinciasIPSR_ck', $provinciasIPSR_ck);
//Incineración + Ataúd premium + Con velatorio + Sin ceremonia
update_post_meta($post_id, 'wpfunos_provinciasIPVS', $provinciasIPVS);
update_post_meta($post_id, 'wpfunos_provinciasIPVS_ck', $provinciasIPVS_ck);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, 'wpfunos_provinciasIPVO', $provinciasIPVO);
update_post_meta($post_id, 'wpfunos_provinciasIPVO_ck', $provinciasIPVO_ck);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia civil
update_post_meta($post_id, 'wpfunos_provinciasIPVC', $provinciasIPVC);
update_post_meta($post_id, 'wpfunos_provinciasIPVC_ck', $provinciasIPVC_ck);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, 'wpfunos_provinciasIPVR', $provinciasIPVR);
update_post_meta($post_id, 'wpfunos_provinciasIPVR_ck', $provinciasIPVR_ck);


update_post_meta($post_id, 'wpfunos_provinciasComentarios', $provinciasComentarios);
update_post_meta($post_id, 'wpfunos_provinciasTitulo', $provinciasTitulo);
