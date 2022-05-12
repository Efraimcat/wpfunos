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
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala
$provinciasEESO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEESO'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil
$provinciasEESC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEESC'] );
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa
$provinciasEESR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEESR'] );
//Entierro + Ataúd económico + Con velatorio + Sin ceremonia
$provinciasEEVS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEEVS'] );
//ntierro + Ataúd económico + Con velatorio + Con ceremonia solo sala
$provinciasEEVO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEEVO'] );
//Entierro + Ataúd económico + Con velatorio + Con ceremonia civil
$provinciasEEVC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEEVC'] );
//Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa
$provinciasEEVR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEEVR'] );
//Entierro + Ataúd medio + Sin velatorio + Sin ceremonia
$provinciasEMSS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMSS'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala
$provinciasEMSO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMSO'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil
$provinciasEMSC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMSC'] );
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa
$provinciasEMSR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMSR'] );
//Entierro + Ataúd medio + Con velatorio + Sin ceremonia
$provinciasEMVS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMVS'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala
$provinciasEMVO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMVO'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia civil
$provinciasEMVC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMVC'] );
//Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa
$provinciasEMVR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEMVR'] );
//Entierro + Ataúd premium + Sin velatorio + Sin ceremonia
$provinciasEPSS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPSS'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala
$provinciasEPSO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPSO'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil
$provinciasEPSC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPSC'] );
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa
$provinciasEPSR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPSR'] );
//Entierro + Ataúd premium + Con velatorio + Sin ceremonia
$provinciasEPVS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPVS'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala
$provinciasEPVO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPVO'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia civil
$provinciasEPVC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPVC'] );
//Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa
$provinciasEPVR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasEPVR'] );
//Incineración + Ataúd económico + Sin velatorio + Sin ceremonia
$provinciasIESS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIESS'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala
$provinciasIESO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIESO'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil
$provinciasIESC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIESC'] );
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa
$provinciasIESR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIESR'] );
//Incineración + Ataúd económico + Con velatorio + Sin ceremonia
$provinciasIEVS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIEVS'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala
$provinciasIEVO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIEVO'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia civil
$provinciasIEVC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIEVC'] );
//Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa
$provinciasIEVR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIEVR'] );
//Incineración + Ataúd medio + Sin velatorio + Sin ceremonia
$provinciasIMSS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMSS'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala
$provinciasIMSO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMSO'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil
$provinciasIMSC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMSC'] );
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa
$provinciasIMSR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMSR'] );
//Incineración + Ataúd medio + Con velatorio + Sin ceremonia
$provinciasIMVS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMVS'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala
$provinciasIMVO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMVO'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia civil
$provinciasIMVC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMVC'] );
//Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa
$provinciasIMVR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIMVR'] );
//Incineración + Ataúd premium + Sin velatorio + Sin ceremonia
$provinciasIPSS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPSS'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala
$provinciasIPSO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPSO'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil
$provinciasIPSC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPSC'] );
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa
$provinciasIPSR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPSR'] );
//Incineración + Ataúd premium + Con velatorio + Sin ceremonia
$provinciasIPVS = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPVS'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala
$provinciasIPVO = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPVO'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia civil
$provinciasIPVC = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPVC'] );
//Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa
$provinciasIPVR = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasIPVR'] );

$provinciasCK001 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK001'] );
$provinciasCK002 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK002'] );
$provinciasCK003 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK003'] );
$provinciasCK004 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK004'] );
$provinciasCK005 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK005'] );
$provinciasCK006 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK006'] );
$provinciasCK007 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK007'] );
$provinciasCK008 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK008'] );
$provinciasCK009 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK009'] );
$provinciasCK010 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK010'] );
$provinciasCK011 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK011'] );
$provinciasCK012 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK012'] );
$provinciasCK013 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK013'] );
$provinciasCK014 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK014'] );
$provinciasCK015 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK015'] );
$provinciasCK016 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK016'] );
$provinciasCK017 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK017'] );
$provinciasCK018 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK018'] );
$provinciasCK019 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK019'] );
$provinciasCK020 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK020'] );
$provinciasCK021 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK021'] );
$provinciasCK022 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK022'] );
$provinciasCK023 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK023'] );
$provinciasCK024 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK024'] );
$provinciasCK025 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK025'] );
$provinciasCK026 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK026'] );
$provinciasCK027 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK027'] );
$provinciasCK028 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK028'] );
$provinciasCK029 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK029'] );
$provinciasCK030 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK030'] );
$provinciasCK031 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK031'] );
$provinciasCK032 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK032'] );
$provinciasCK033 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK033'] );
$provinciasCK034 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK034'] );
$provinciasCK035 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK035'] );
$provinciasCK036 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK036'] );
$provinciasCK037 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK037'] );
$provinciasCK038 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK038'] );
$provinciasCK039 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK039'] );
$provinciasCK040 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK040'] );
$provinciasCK041 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK041'] );
$provinciasCK042 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK042'] );
$provinciasCK043 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK043'] );
$provinciasCK044 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK044'] );
$provinciasCK045 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK045'] );
$provinciasCK046 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK046'] );
$provinciasCK047 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK047'] );
$provinciasCK048 = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasCK048'] );

$provinciasComentarios = wp_kses_post( $_POST[$this->plugin_name . '_provinciasComentarios'] );
$provinciasTitulo = sanitize_text_field( $_POST[$this->plugin_name . '_provinciasTitulo'] );


update_post_meta($post_id, $this->plugin_name . '_provinciasProvincia', $provinciasProvincia);
update_post_meta($post_id, $this->plugin_name . '_provinciasCodigo', $provinciasCodigo);
update_post_meta($post_id, $this->plugin_name . '_provinciasISO31662', $provinciasISO31662);
update_post_meta($post_id, $this->plugin_name . '_Dummy', $Dummy);
//Entierro + Ataúd económico + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasEESS', $provinciasEESS);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasEESO', $provinciasEESO);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasEESC', $provinciasEESC);
//Entierro + Ataúd económico + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasEESR', $provinciasEESR);
//Entierro + Ataúd económico + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasEEVS', $provinciasEEVS);
//ntierro + Ataúd económico + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasEEVO', $provinciasEEVO);
//Entierro + Ataúd económico + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasEEVC', $provinciasEEVC);
//Entierro + Ataúd económico + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasEEVR', $provinciasEEVR);
//Entierro + Ataúd medio + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasEMSS', $provinciasEMSS);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasEMSO', $provinciasEMSO);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasEMSC', $provinciasEMSC);
//Entierro + Ataúd medio + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasEMSR', $provinciasEMSR);
//Entierro + Ataúd medio + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasEMVS', $provinciasEMVS);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasEMVO', $provinciasEMVO);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasEMVC', $provinciasEMVC);
//Entierro + Ataúd medio + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasEMVR', $provinciasEMVR);
//Entierro + Ataúd premium + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasEPSS', $provinciasEPSS);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasEPSO', $provinciasEPSO);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasEPSC', $provinciasEPSC);
//Entierro + Ataúd premium + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasEPSR', $provinciasEPSR);
//Entierro + Ataúd premium + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasEPVS', $provinciasEPVS);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasEPVO', $provinciasEPVO);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasEPVC', $provinciasEPVC);
//Entierro + Ataúd premium + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasEPVR', $provinciasEPVR);
//Incineración + Ataúd económico + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasIESS', $provinciasIESS);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasIESO', $provinciasIESO);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasIESC', $provinciasIESC);
//Incineración + Ataúd económico + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasIESR', $provinciasIESR);
//Incineración + Ataúd económico + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasIEVS', $provinciasIEVS);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasIEVO', $provinciasIEVO);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasIEVC', $provinciasIEVC);
//Incineración + Ataúd económico + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasIEVR', $provinciasIEVR);
//Incineración + Ataúd medio + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasIMSS', $provinciasIMSS);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasIMSO', $provinciasIMSO);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasIMSC', $provinciasIMSC);
//Incineración + Ataúd medio + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasIMSR', $provinciasIMSR);
//Incineración + Ataúd medio + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasIMVS', $provinciasIMVS);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasIMVO', $provinciasIMVO);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasIMVC', $provinciasIMVC);
//Incineración + Ataúd medio + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasIMVR', $provinciasIMVR);
//Incineración + Ataúd premium + Sin velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasIPSS', $provinciasIPSS);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasIPSO', $provinciasIPSO);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasIPSC', $provinciasIPSC);
//Incineración + Ataúd premium + Sin velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasIPSR', $provinciasIPSR);
//Incineración + Ataúd premium + Con velatorio + Sin ceremonia
update_post_meta($post_id, $this->plugin_name . '_provinciasIPVS', $provinciasIPVS);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia solo sala
update_post_meta($post_id, $this->plugin_name . '_provinciasIPVO', $provinciasIPVO);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia civil
update_post_meta($post_id, $this->plugin_name . '_provinciasIPVC', $provinciasIPVC);
//Incineración + Ataúd premium + Con velatorio + Con ceremonia religiosa
update_post_meta($post_id, $this->plugin_name . '_provinciasIPVR', $provinciasIPVR);

update_post_meta($post_id, $this->plugin_name . '_provinciasCK001', $provinciasCK001);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK002', $provinciasCK002);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK003', $provinciasCK003);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK004', $provinciasCK004);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK005', $provinciasCK005);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK006', $provinciasCK006);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK007', $provinciasCK007);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK008', $provinciasCK008);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK009', $provinciasCK009);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK010', $provinciasCK010);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK011', $provinciasCK011);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK012', $provinciasCK012);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK013', $provinciasCK013);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK014', $provinciasCK014);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK015', $provinciasCK015);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK016', $provinciasCK016);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK017', $provinciasCK017);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK018', $provinciasCK018);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK019', $provinciasCK019);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK020', $provinciasCK020);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK021', $provinciasCK021);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK022', $provinciasCK022);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK023', $provinciasCK023);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK024', $provinciasCK024);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK025', $provinciasCK025);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK026', $provinciasCK026);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK027', $provinciasCK027);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK028', $provinciasCK028);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK029', $provinciasCK029);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK030', $provinciasCK030);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK031', $provinciasCK031);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK032', $provinciasCK032);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK033', $provinciasCK033);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK034', $provinciasCK034);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK035', $provinciasCK035);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK036', $provinciasCK036);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK037', $provinciasCK037);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK038', $provinciasCK038);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK039', $provinciasCK039);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK040', $provinciasCK040);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK041', $provinciasCK041);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK042', $provinciasCK042);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK043', $provinciasCK043);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK044', $provinciasCK044);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK045', $provinciasCK045);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK046', $provinciasCK046);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK047', $provinciasCK047);
update_post_meta($post_id, $this->plugin_name . '_provinciasCK048', $provinciasCK048);

update_post_meta($post_id, $this->plugin_name . '_provinciasComentarios', $provinciasComentarios);
update_post_meta($post_id, $this->plugin_name . '_provinciasTitulo', $provinciasTitulo);
