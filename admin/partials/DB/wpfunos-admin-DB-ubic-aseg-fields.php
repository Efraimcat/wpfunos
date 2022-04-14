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
$ubic_asegIP = sanitize_text_field( $_POST[$this->plugin_name . '_ubic_asegIP'] );
$ubic_asegwpf = sanitize_text_field( $_POST[$this->plugin_name . '_ubic_asegwpf'] );
$ubic_asegReferencia = sanitize_text_field( $_POST[$this->plugin_name . '_ubic_asegReferencia'] );
$ubic_asegDireccion = sanitize_text_field( $_POST[$this->plugin_name . '_ubic_asegDireccion'] );
$ubic_asegDistancia = sanitize_text_field( $_POST[$this->plugin_name . '_ubic_asegDistancia'] );
$ubic_asegCP = sanitize_text_field( $_POST[$this->plugin_name . '_ubic_asegCP'] );
$ubic_asegVisitas = sanitize_text_field( $_POST[$this->plugin_name . '_ubic_asegVisitas'] )
$Dummy = sanitize_text_field( $_POST[$this->plugin_name . '_Dummy'] );
$IDstamp= sanitize_text_field( $_POST['IDstamp'] );

update_post_meta($post_id, $this->plugin_name . '_ubic_asegIP', $ubic_asegIP);
update_post_meta($post_id, $this->plugin_name . '_ubic_asegwpf', $ubic_asegwpf);
update_post_meta($post_id, $this->plugin_name . '_ubic_asegReferencia', $ubic_asegReferencia);
update_post_meta($post_id, $this->plugin_name . '_ubic_asegDireccion', $ubic_asegDireccion);
update_post_meta($post_id, $this->plugin_name . '_ubic_asegDistancia', $ubic_asegDistancia);
update_post_meta($post_id, $this->plugin_name . '_ubic_asegCP', $ubic_asegCP);
update_post_meta($post_id, $this->plugin_name . '_ubic_asegVisitas', $ubic_asegVisitas);
update_post_meta($post_id, $this->plugin_name . '_Dummy', $Dummy);
update_post_meta($post_id, 'IDstamp', $IDstamp);
