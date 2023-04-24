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
$excep_provProvincia = sanitize_text_field( $_POST['wpfunos_excep_provProvincia'] );
$excep_provDistancia = sanitize_text_field( $_POST['wpfunos_excep_provDistancia'] );
$excep_provLat = sanitize_text_field( $_POST['wpfunos_excep_provLat'] );
$excep_provLng = sanitize_text_field( $_POST['wpfunos_excep_provLng'] );
$Dummy = sanitize_text_field( $_POST['wpfunos_Dummy'] );

update_post_meta($post_id, 'wpfunos_excep_provProvincia', $excep_provProvincia);
update_post_meta($post_id, 'wpfunos_excep_provDistancia', $excep_provDistancia);
update_post_meta($post_id, 'wpfunos_excep_provLat', $excep_provLat);
update_post_meta($post_id, 'wpfunos_excep_provLng', $excep_provLng);
update_post_meta($post_id, 'wpfunos_Dummy', $Dummy);
