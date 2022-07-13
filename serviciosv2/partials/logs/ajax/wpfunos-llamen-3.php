<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
do_action('wpfunos_log', '==============' );
//do_action('wpfunos_log', 'Enviado correo lead1 ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
do_action('wpfunos_log', 'Enviado correo lead1 efraim@efraim.cat' );
do_action('wpfunos_log', 'Enviado CCO ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoCcoBoton1v2Admin' ) ) );
do_action('wpfunos_log', 'Enviado BCC ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoBccBoton1v2Admin' ) ) );
do_action('wpfunos_log', 'userIP: ' . $IP );
do_action('wpfunos_log', 'Nombre: ' . $transient['wpfn'] );
do_action('wpfunos_log', '$referencia: ' . $transient['wpfref'] );
