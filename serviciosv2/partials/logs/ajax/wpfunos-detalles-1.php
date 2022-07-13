<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
do_action('wpfunos_log', '==============' );
do_action('wpfunos_log', 'Llegada ajax Servicio Boton detalles' );
do_action('wpfunos_log', 'Ajax: wpfnombre ' .$transient['wpfn'] );
do_action('wpfunos_log', 'Ajax: wpfemail ' .$transient['wpfe'] );
do_action('wpfunos_log', 'Ajax: wpftelefono ' .$transient['wpft'] );
do_action('wpfunos_log', 'Ajax: IP ' .$IP );
do_action('wpfunos_log', 'Ajax: Servicio titulo: ' . $titulo );
do_action('wpfunos_log', 'Ajax: Servicio ' . $servicio );
