<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
do_action('wpfunos_log', '==============' );
do_action('wpfunos_log', 'Enviar correo detalles' );
do_action('wpfunos_log', '$IP: ' . $IP );
do_action('wpfunos_log', '$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
do_action('wpfunos_log', '$email: ' . $email );
