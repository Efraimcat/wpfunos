<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    WpFunos
 * @subpackage WpFunos/public/partials
 */
 /**
  * public/partials/wpfunos-public-ComparaResultadosAcciones-MailBoton2Admin.php
  *
  * [servicio] = Number: 15979
  * [seleccion] = String: 'Passatge Alt del Turó- 26- 08041 Barcelona- España, 20, 2, 2, 2, 1, 3'
  * [idUsuario] = Number: 21936
  */
$mensaje = get_option('wpfunos_mensajeCorreoBoton2Admin');
$mensaje = str_replace( '[nombreUsuario]' , $_GET['nombreUsuario'] , $mensaje );
$mensaje = str_replace( '[nombreServicio]' , $_GET['desgloseBaseNombre'] , $mensaje );
$mensaje = str_replace( '[precio]' , $_GET['precio'] , $mensaje );
$mensaje = str_replace( '[telefono]' , $_GET['telefono'] , $mensaje );
$mensaje = str_replace( '[referencia]' , $_GET['referencia'] , $mensaje );

$mensaje = str_replace( '[desgloseBaseNombre]' , $_GET['desgloseBaseNombre'] , $mensaje );
$mensaje = str_replace( '[desgloseBasePrecio]' , $_GET['desgloseBasePrecio'] , $mensaje );
$mensaje = str_replace( '[desgloseBaseDescuento]' , $_GET['desgloseBaseDescuento'] , $mensaje );
$mensaje = str_replace( '[desgloseBaseTotal]' , $_GET['desgloseBaseTotal'] , $mensaje );

$mensaje = str_replace( '[desgloseDestinoNombre]' , $_GET['desgloseDestinoNombre'] , $mensaje );
$mensaje = str_replace( '[desgloseDestinoPrecio]' , $_GET['desgloseDestinoPrecio'] , $mensaje );
$mensaje = str_replace( '[desgloseDestinoDescuento]' , $_GET['desgloseDestinoDescuento'] , $mensaje );
$mensaje = str_replace( '[desgloseDestinoTotal]' , $_GET['desgloseDestinoTotal'] , $mensaje );

$mensaje = str_replace( '[desgloseAtaudNombre]' , $_GET['desgloseAtaudNombre'] , $mensaje );
$mensaje = str_replace( '[desgloseAtaudPrecio]' , $_GET['desgloseAtaudPrecio'] , $mensaje );
$mensaje = str_replace( '[desgloseAtaudDescuento]' , $_GET['desgloseAtaudDescuento'] , $mensaje );
$mensaje = str_replace( '[desgloseAtaudTotal]' , $_GET['desgloseAtaudTotal'] , $mensaje );

$mensaje = str_replace( '[desgloseVelatorioNombre]' , $_GET['desgloseVelatorioNombre'] , $mensaje );
$mensaje = str_replace( '[desgloseVelatorioPrecio]' , $_GET['desgloseVelatorioPrecio'] , $mensaje );
$mensaje = str_replace( '[desgloseVelatorioDescuento]' , $_GET['desgloseVelatorioDescuento'] , $mensaje );
$mensaje = str_replace( '[desgloseVelatorioTotal]' , $_GET['desgloseVelatorioTotal'] , $mensaje );

$mensaje = str_replace( '[desgloseCeremoniaNombre]' , $_GET['desgloseCeremoniaNombre'] , $mensaje );
$mensaje = str_replace( '[desgloseCeremoniaPrecio]' , $_GET['desgloseCeremoniaPrecio'] , $mensaje );
$mensaje = str_replace( '[desgloseCeremoniaDescuento]' , $_GET['desgloseCeremoniaDescuento'] , $mensaje );
$mensaje = str_replace( '[desgloseCeremoniaTotal]' , $_GET['desgloseCeremoniaTotal'] , $mensaje );

$mensaje = str_replace( '[desgloseDescuentoGenerico]' , $_GET['desgloseDescuentoGenerico'] , $mensaje );
$mensaje = str_replace( '[desgloseDescuentoGenericoPrecio]' , $_GET['desgloseDescuentoGenericoPrecio'] , $mensaje );
$mensaje = str_replace( '[desgloseDescuentoGenericoDescuento]' , $_GET['desgloseDescuentoGenericoDescuento'] , $mensaje );
$mensaje = str_replace( '[desgloseDescuentoGenericoTotal]' , $_GET['desgloseDescuentoGenericoTotal'] , $mensaje );
