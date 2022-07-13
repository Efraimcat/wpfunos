<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
do_action('wpfunos_log', '==============' );
do_action('wpfunos_log', '2. - Botón llamar servicio' );
do_action('wpfunos_log', 'userIP: ' . $IP );
do_action('wpfunos_log', 'Nombre: ' .  $transient['wpfn'] );
do_action('wpfunos_log', 'referencia: ' . $transient['wpfref'] );
do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
