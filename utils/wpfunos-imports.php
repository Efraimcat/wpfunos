<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if( !isset( $_POST['importdirectorio'] ) && !isset( $_POST['importcodigospostales'] ) ) return;
//print_r($_POST);
//
if( isset( $_POST['importdirectorio'] ) && $_POST['importdirectorio'] == 1 ) include 'wpfunos-imports-directorio.php';

if( isset( $_POST['importcodigospostales'] ) && $_POST['importcodigospostales'] == 1 ) include 'wpfunos-imports-codigospostales.php';

