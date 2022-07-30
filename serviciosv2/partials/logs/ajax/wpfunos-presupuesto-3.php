<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
do_action('wpfunos_log', '==============' );
do_action('wpfunos_log', 'Enviado correo pedir presupuesto ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
//do_action('wpfunos_log', 'Enviado correo pedir presupuesto efraim@efraim.cat' );
do_action('wpfunos_log', 'Enviado CCO ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ) );
do_action('wpfunos_log', 'Enviado BCC ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ) );
do_action('wpfunos_log', 'userIP: ' . "IP" );
do_action('wpfunos_log', 'Nombre: ' . $transient_ref['wpfn'] );
do_action('wpfunos_log', '$referencia: ' . $transient_ref['wpfref'] );
