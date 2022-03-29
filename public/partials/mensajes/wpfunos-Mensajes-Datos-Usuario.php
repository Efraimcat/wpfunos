<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Servicios.
 *
 * @link       https://github.com/Efraimcat/wpfunos/
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage WpFunos/public/partials/mensajes
 * @author     Efraim Bayarri <efraim@efraim.cat>
 */
$mensaje = str_replace( '[Email]' , $_GET['Email'] , $mensaje );
$mensaje = str_replace( '[referencia]' , $_GET['referencia'] , $mensaje );
$mensaje = str_replace( '[Nombre]' , $_GET['Nombre'] , $mensaje );
$mensaje = str_replace( '[Telefono]' , $_GET['Telefono'] , $mensaje );
$mensaje = str_replace( '[address]' , $_GET['address'] , $mensaje );
$mensaje = str_replace( '[CP]' , $_GET['CP'] , $mensaje );
$mensaje = str_replace( '[Destino]' , $_GET['Destino'] , $mensaje );
$mensaje = str_replace( '[Ataud]' , $_GET['Ataud'] , $mensaje );
$mensaje = str_replace( '[Velatorio]' , $_GET['Velatorio'] , $mensaje );
$mensaje = str_replace( '[Despedida]' , $_GET['Despedida] , $mensaje );
