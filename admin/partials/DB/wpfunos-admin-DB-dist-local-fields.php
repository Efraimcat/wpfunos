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
$dist_localLocalidad = sanitize_text_field( $_POST['wpfunos_dist_localLocalidad'] );
$dist_localDistancia = sanitize_text_field( $_POST['wpfunos_dist_localDistancia'] );

update_post_meta($post_id, 'wpfunos_dist_localLocalidad', $dist_localLocalidad);
update_post_meta($post_id, 'wpfunos_dist_localDistancia', $dist_localDistancia);
