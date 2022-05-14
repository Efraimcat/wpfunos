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
$provinciasProvincia = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasProvincia'] );
$provinciasCodigo = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCodigo'] );
$provinciasISO31662 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasISO31662'] );
$Dummy = sanitize_text_field( $_POST[$this->plugin_name . '_Dummy'] );
//Entierro + Ataúd económico + Sin velatorio + Sin ceremonia
$provinciasEESS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEESS'] );
$provinciasEESS_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEESS_ck'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala
$provinciasEESO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEESO'] );
$provinciasEESO_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEESO_ck'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil
$provinciasEESC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEESC'] );
$provinciasEESC_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEESC_ck'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa
$provinciasEESR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEESR'] );
$provinciasEESR_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEESR_ck'] );
//Entierro + Ataúd económico + Con velatorio + Sin ceremonia
$provinciasEEVS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEEVS'] );
$provinciasEEVS_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEEVS_ck'] );
//ntierro + Ataúd económico + Con velatorio + Con ceremonia solo sala
$provinciasEEVO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEEVO'] );
$provinciasEEVO_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEEVO_ck'] );
//Entierro + Ataúd económico + Con velatorio + Con ceremonia civil
$provinciasEEVC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEEVC'] );
$provinciasEEVC_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEEVC_ck'] );
//Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa
$provinciasEEVR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEEVR'] );
$provinciasEEVR_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEEVR_ck'] );
//Entierro + Ataúd medio + Sin velatorio + Sin ceremonia
$provinciasEMSS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMSS'] );
$provinciasEMSS_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMSS_ck'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala
$provinciasEMSO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMSO'] );
$provinciasEMSO_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMSO_ck'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil
$provinciasEMSC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMSC'] );
$provinciasEMSC_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMSC_ck'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa
$provinciasEMSR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMSR'] );
$provinciasEMSR_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMSR_ck'] );
//Entierro + Ataúd medio + Con velatorio + Sin ceremonia
$provinciasEMVS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMVS'] );
$provinciasEMVS_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMVS_ck'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala
$provinciasEMVO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMVO'] );
$provinciasEMVO_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMVO_ck'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia civil
$provinciasEMVC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMVC'] );
$provinciasEMVC_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMVC_ck'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa
$provinciasEMVR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMVR'] );
$provinciasEMVR_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMVR_ck'] );
//Entierro + Ataúd premium + Sin velatorio + Sin ceremonia
$provinciasEPSS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPSS'] );
$provinciasEPSS_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPSS_ck'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala
$provinciasEPSO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPSO'] );
$provinciasEPSO_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPSO_ck'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil
$provinciasEPSC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPSC'] );
$provinciasEPSC_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPSC_ck'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa
$provinciasEPSR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPSR'] );
$provinciasEPSR_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPSR_ck'] );
//Entierro + Ataúd premium + Con velatorio + Sin ceremonia
$provinciasEPVS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPVS'] );
$provinciasEPVS_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPVS_ck'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala
$provinciasEPVO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPVO'] );
$provinciasEPVO_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPVO_ck'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia civil
$provinciasEPVC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPVC'] );
$provinciasEPVC_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPVC_ck'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa
$provinciasEPVR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPVR'] );
$provinciasEPVR_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPVR_ck'] );
//Incineración + Ataúd económico + Sin velatorio + Sin ceremonia
$provinciasIESS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIESS'] );
$provinciasIESS_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIESS_ck'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala
$provinciasIESO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIESO'] );
$provinciasIESO_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIESO_ck'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil
$provinciasIESC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIESC'] );
$provinciasIESC_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIESC_ck'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa
$provinciasIESR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIESR'] );
$provinciasIESR_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIESR_ck'] );
//Incineración + Ataúd económico + Con velatorio + Sin ceremonia
$provinciasIEVS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIEVS'] );
$provinciasIEVS_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIEVS_ck'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala
$provinciasIEVO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIEVO'] );
$provinciasIEVO_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIEVO_ck'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia civil
$provinciasIEVC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIEVC'] );
$provinciasIEVC_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIEVC_ck'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa
$provinciasIEVR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIEVR'] );
$provinciasIEVR_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIEVR_ck'] );
//Incineración + Ataúd medio + Sin velatorio + Sin ceremonia
$provinciasIMSS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMSS'] );
$provinciasIMSS_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMSS_ck'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala
$provinciasIMSO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMSO'] );
$provinciasIMSO_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMSO_ck'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil
$provinciasIMSC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMSC'] );
$provinciasIMSC_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMSC_ck'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa
$provinciasIMSR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMSR'] );
$provinciasIMSR_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMSR_ck'] );
//Incineración + Ataúd medio + Con velatorio + Sin ceremonia
$provinciasIMVS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMVS'] );
$provinciasIMVS_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMVS_ck'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala
$provinciasIMVO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMVO'] );
$provinciasIMVO_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMVO_ck'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia civil
$provinciasIMVC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMVC'] );
$provinciasIMVC_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMVC_ck'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa
$provinciasIMVR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMVR'] );
$provinciasIMVR_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMVR_ck'] );
//Incineración + Ataúd premium + Sin velatorio + Sin ceremonia
$provinciasIPSS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPSS'] );
$provinciasIPSS_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPSS_ck'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala
$provinciasIPSO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPSO'] );
$provinciasIPSO_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPSO_ck'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil
$provinciasIPSC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPSC'] );
$provinciasIPSC_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPSC_ck'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa
$provinciasIPSR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPSR'] );
$provinciasIPSR_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPSR_ck'] );
//Incineración + Ataúd premium + Con velatorio + Sin ceremonia
$provinciasIPVS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPVS'] );
$provinciasIPVS_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPVS_ck'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala
$provinciasIPVO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPVO'] );
$provinciasIPVO_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPVO_ck'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia civil
$provinciasIPVC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPVC'] );
$provinciasIPVC_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPVC_ck'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa
$provinciasIPVR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPVR'] );
$provinciasIPVR_ck = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPVR_ck'] );

$provinciasComentarios = wp_kses_post( $_POST[$this->plugin_name . '_provinciasComentarios'] );
$provinciasTitulo = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasTitulo'] );


update_post_meta($post_id, $this->plugin_name . '_provinciasProvincia', $provinciasProvincia);
update_post_meta($post_id, $this->plugin_name . '_provinciasCodigo', $provinciasCodigo);
update_post_meta($post_id, $this->plugin_name . '_provinciasISO31662', $provinciasISO31662);
update_post_meta($post_id, $this->plugin_name . '_Dummy', $Dummy);
//Entierro + Ataúd económico + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasEESS', $provinciasEESS);
update_post_meta($post_id, $this->plugin_name . '_provinciasEESS_ck', $provinciasEESS_ck);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasEESO', $provinciasEESO);
update_post_meta($post_id, $this->plugin_name . '_provinciasEESO_ck', $provinciasEESO_ck);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasEESC', $provinciasEESC);
update_post_meta($post_id, $this->plugin_name . '_provinciasEESC_ck', $provinciasEESC_ck);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasEESR', $provinciasEESR);
update_post_meta($post_id, $this->plugin_name . '_provinciasEESR_ck', $provinciasEESR_ck);
//Entierro + Ataúd económico + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasEEVS', $provinciasEEVS);
update_post_meta($post_id, $this->plugin_name . '_provinciasEEVS_ck', $provinciasEEVS_ck);
//ntierro + Ataúd económico + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasEEVO', $provinciasEEVO);
update_post_meta($post_id, $this->plugin_name . '_provinciasEEVO_ck', $provinciasEEVO_ck);
//Entierro + Ataúd económico + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasEEVC', $provinciasEEVC);
update_post_meta($post_id, $this->plugin_name . '_provinciasEEVC_ck', $provinciasEEVC_ck);
//Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasEEVR', $provinciasEEVR);
update_post_meta($post_id, $this->plugin_name . '_provinciasEEVR_ck', $provinciasEEVR_ck);
//Entierro + Ataúd medio + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasEMSS', $provinciasEMSS);
update_post_meta($post_id, $this->plugin_name . '_provinciasEMSS_ck', $provinciasEMSS_ck);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasEMSO', $provinciasEMSO);
update_post_meta($post_id, $this->plugin_name . '_provinciasEMSO_ck', $provinciasEMSO_ck);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasEMSC', $provinciasEMSC);
update_post_meta($post_id, $this->plugin_name . '_provinciasEMSC_ck', $provinciasEMSC_ck);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasEMSR', $provinciasEMSR);
update_post_meta($post_id, $this->plugin_name . '_provinciasEMSR_ck', $provinciasEMSR_ck);
//Entierro + Ataúd medio + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasEMVS', $provinciasEMVS);
update_post_meta($post_id, $this->plugin_name . '_provinciasEMVS_ck', $provinciasEMVS_ck);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasEMVO', $provinciasEMVO);
update_post_meta($post_id, $this->plugin_name . '_provinciasEMVO_ck', $provinciasEMVO_ck);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasEMVC', $provinciasEMVC);
update_post_meta($post_id, $this->plugin_name . '_provinciasEMVC_ck', $provinciasEMVC_ck);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasEMVR', $provinciasEMVR);
update_post_meta($post_id, $this->plugin_name . '_provinciasEMVR_ck', $provinciasEMVR_ck);
//Entierro + Ataúd premium + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasEPSS', $provinciasEPSS);
update_post_meta($post_id, $this->plugin_name . '_provinciasEPSS_ck', $provinciasEPSS_ck);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasEPSO', $provinciasEPSO);
update_post_meta($post_id, $this->plugin_name . '_provinciasEPSO_ck', $provinciasEPSO_ck);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasEPSC', $provinciasEPSC);
update_post_meta($post_id, $this->plugin_name . '_provinciasEPSC_ck', $provinciasEPSC_ck);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasEPSR', $provinciasEPSR);
update_post_meta($post_id, $this->plugin_name . '_provinciasEPSR_ck', $provinciasEPSR_ck);
//Entierro + Ataúd premium + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasEPVS', $provinciasEPVS);
update_post_meta($post_id, $this->plugin_name . '_provinciasEPVS_ck', $provinciasEPVS_ck);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasEPVO', $provinciasEPVO);
update_post_meta($post_id, $this->plugin_name . '_provinciasEPVO_ck', $provinciasEPVO_ck);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasEPVC', $provinciasEPVC);
update_post_meta($post_id, $this->plugin_name . '_provinciasEPVC_ck', $provinciasEPVC_ck);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasEPVR', $provinciasEPVR);
update_post_meta($post_id, $this->plugin_name . '_provinciasEPVR_ck', $provinciasEPVR_ck);
//Incineración + Ataúd económico + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasIESS', $provinciasIESS);
update_post_meta($post_id, $this->plugin_name . '_provinciasIESS_ck', $provinciasIESS_ck);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasIESO', $provinciasIESO);
update_post_meta($post_id, $this->plugin_name . '_provinciasIESO_ck', $provinciasIESO_ck);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasIESC', $provinciasIESC);
update_post_meta($post_id, $this->plugin_name . '_provinciasIESC_ck', $provinciasIESC_ck);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasIESR', $provinciasIESR);
update_post_meta($post_id, $this->plugin_name . '_provinciasIESR_ck', $provinciasIESR_ck);
//Incineración + Ataúd económico + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasIEVS', $provinciasIEVS);
update_post_meta($post_id, $this->plugin_name . '_provinciasIEVS_ck', $provinciasIEVS_ck);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasIEVO', $provinciasIEVO);
update_post_meta($post_id, $this->plugin_name . '_provinciasIEVO_ck', $provinciasIEVO_ck);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasIEVC', $provinciasIEVC);
update_post_meta($post_id, $this->plugin_name . '_provinciasIEVC_ck', $provinciasIEVC_ck);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasIEVR', $provinciasIEVR);
update_post_meta($post_id, $this->plugin_name . '_provinciasIEVR_ck', $provinciasIEVR_ck);
//Incineración + Ataúd medio + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasIMSS', $provinciasIMSS);
update_post_meta($post_id, $this->plugin_name . '_provinciasIMSS_ck', $provinciasIMSS_ck);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasIMSO', $provinciasIMSO);
update_post_meta($post_id, $this->plugin_name . '_provinciasIMSO_ck', $provinciasIMSO_ck);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasIMSC', $provinciasIMSC);
update_post_meta($post_id, $this->plugin_name . '_provinciasIMSC_ck', $provinciasIMSC_ck);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasIMSR', $provinciasIMSR);
update_post_meta($post_id, $this->plugin_name . '_provinciasIMSR_ck', $provinciasIMSR_ck);
//Incineración + Ataúd medio + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasIMVS', $provinciasIMVS);
update_post_meta($post_id, $this->plugin_name . '_provinciasIMVS_ck', $provinciasIMVS_ck);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasIMVO', $provinciasIMVO);
update_post_meta($post_id, $this->plugin_name . '_provinciasIMVO_ck', $provinciasIMVO_ck);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasIMVC', $provinciasIMVC);
update_post_meta($post_id, $this->plugin_name . '_provinciasIMVC_ck', $provinciasIMVC_ck);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasIMVR', $provinciasIMVR);
update_post_meta($post_id, $this->plugin_name . '_provinciasIMVR_ck', $provinciasIMVR_ck);
//Incineración + Ataúd premium + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasIPSS', $provinciasIPSS);
update_post_meta($post_id, $this->plugin_name . '_provinciasIPSS_ck', $provinciasIPSS_ck);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasIPSO', $provinciasIPSO);
update_post_meta($post_id, $this->plugin_name . '_provinciasIPSO_ck', $provinciasIPSO_ck);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasIPSC', $provinciasIPSC);
update_post_meta($post_id, $this->plugin_name . '_provinciasIPSC_ck', $provinciasIPSC_ck);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasIPSR', $provinciasIPSR);
update_post_meta($post_id, $this->plugin_name . '_provinciasIPSR_ck', $provinciasIPSR_ck);
//Incineración + Ataúd premium + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasIPVS', $provinciasIPVS);
update_post_meta($post_id, $this->plugin_name . '_provinciasIPVS_ck', $provinciasIPVS_ck);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasIPVO', $provinciasIPVO);
update_post_meta($post_id, $this->plugin_name . '_provinciasIPVO_ck', $provinciasIPVO_ck);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasIPVC', $provinciasIPVC);
update_post_meta($post_id, $this->plugin_name . '_provinciasIPVC_ck', $provinciasIPVC_ck);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasIPVR', $provinciasIPVR);
update_post_meta($post_id, $this->plugin_name . '_provinciasIPVR_ck', $provinciasIPVR_ck);


update_post_meta($post_id, $this->plugin_name . '_provinciasComentarios', $provinciasComentarios);
update_post_meta($post_id, $this->plugin_name . '_provinciasTitulo', $provinciasTitulo);
