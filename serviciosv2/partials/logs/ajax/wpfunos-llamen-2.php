<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
do_action('wpfunos_log', '==============' );
do_action('wpfunos_log', '1. - Botón Que me llamen servicio' );
do_action('wpfunos_log', 'userIP: ' . $IP );
do_action('wpfunos_log', 'Nombre: ' .  $transient_ref['wpfn'] );
do_action('wpfunos_log', 'referencia: ' . $transient_ref['wpfref'] );
do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
