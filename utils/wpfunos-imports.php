<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if( !isset( $_POST['importdirectorio'] ) && !isset( $_POST['importservicios'] ) ) return;
//print_r($_POST);
//
if( isset( $_POST['importdirectorio'] ) ) include 'wpfunos-imports-directorio.php';


