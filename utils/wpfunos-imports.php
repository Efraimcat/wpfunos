<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Utilidades.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/utils
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
if( !isset( $_POST['importdirectorio'] ) && !isset( $_POST['importcodigospostales'] ) && !isset( $_POST['importprovincias'] ) && !isset( $_POST['importpreciofuner'] ) && !isset( $_POST['importprecioservicios'] ) && !isset( $_POST['importprecioservicioscomentarios'] ) ) return;
//print_r($_POST);
//
if( isset( $_POST['importdirectorio'] ) && $_POST['importdirectorio'] == 1 ) include 'wpfunos-imports-directorio.php';

if( isset( $_POST['importcodigospostales'] ) && $_POST['importcodigospostales'] == 1 ) include 'wpfunos-imports-codigospostales.php';

if( isset( $_POST['importprovincias'] ) && $_POST['importprovincias'] == 1 ) include 'wpfunos-imports-provincias.php';

if( isset( $_POST['importpreciofuner'] ) && $_POST['importpreciofuner'] == 1 ) include 'wpfunos-imports-precios-funerarias.php';

if( isset( $_POST['importprecioservicios'] ) && $_POST['importprecioservicios'] == 1 ) include 'wpfunos-imports-precios-servicios.php';

if( isset( $_POST['importprecioservicioscomentarios'] ) && $_POST['importprecioservicioscomentarios'] == 1 ) include 'wpfunos-imports-precios-servicios-comentarios.php';
