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
* @subpackage Wpfunos/servicios/partials
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
?>
<input type="hidden" name="referencia" id="referencia" value="<?php echo $_GET['referencia']?>" >
<input type="hidden" name="telefonoUsuario" id="telefonoUsuario" value="<?php echo $_GET['telefonoUsuario']?>" >
<input type="hidden" name="seleccionUsuario" id="seleccionUsuario" value="<?php echo $_GET['seleccionUsuario']?>" >
<input type="hidden" name="CPUsuario" id="CPUsuario" value="<?php echo $_GET['CPUsuario']?>" >
<input type="hidden" name="Email" id="Email" value="<?php echo $_GET['Email']?>" >
<input type="hidden" name="nombreUsuario" id="nombreUsuario" value="<?php echo $_GET['nombreUsuario']?>" >
<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_GET['idUsuario']?>" >
<input type="hidden" name="precio" id="precio" value="<?php echo $_GET['precio']?>" >
<input type="hidden" name="preciodescuento" id="preciodescuento" value="<?php echo $_GET['preciodescuento']?>" >
<input type="hidden" name="servicio" id="servicio" value="<?php echo $value[0]?>" >
<input type="hidden" name="seleccion" id="seleccion" value="<?php echo $_GET['seleccionUsuario']?>" >
<input type="hidden" name="nombrepack" id="nombrepack" value="<?php echo $_GET['nombrepack']?>" >

<input type="hidden" name="desgloseBaseNombre" id="desgloseBaseNombre" value="<?php echo $value[3][0][1] ?>" >
<input type="hidden" name="desgloseBasePrecio" id="desgloseBasePrecio" value="<?php echo number_format($value[3][0][2], 0, ',', '.') . '€' ?>" >
<input type="hidden" name="desgloseBaseDescuento" id="desgloseBaseDescuento" value="<?php echo $value[3][0][3] . '%' ?>" >
<input type="hidden" name="desgloseBaseTotal" id="desgloseBaseTotal" value="<?php echo number_format($value[3][0][4], 0, ',', '.') . '€' ?>" >

<input type="hidden" name="desgloseDestinoNombre" id="desgloseDestinoNombre" value="<?php echo $value[3][1][1] ?>" >
<input type="hidden" name="desgloseDestinoPrecio" id="desgloseDestinoPrecio" value="<?php echo number_format($value[3][1][2], 0, ',', '.') . '€' ?>" >
<input type="hidden" name="desgloseDestinoDescuento" id="desgloseDestinoDescuento" value="<?php echo $value[3][1][3] . '%' ?>" >
<input type="hidden" name="desgloseDestinoTotal" id="desgloseDestinoTotal" value="<?php echo number_format($value[3][1][4], 0, ',', '.') . '€' ?>" >

<input type="hidden" name="desgloseAtaudNombre" id="desgloseAtaudNombre" value="<?php echo $value[3][2][1] ?>" >
<input type="hidden" name="desgloseAtaudPrecio" id="desgloseAtaudPrecio" value="<?php echo number_format($value[3][2][2], 0, ',', '.') . '€' ?>" >
<input type="hidden" name="desgloseAtaudDescuento" id="desgloseAtaudDescuento" value="<?php echo $value[3][2][3] . '%' ?>" >
<input type="hidden" name="desgloseAtaudTotal" id="desgloseAtaudTotal" value="<?php echo number_format($value[3][2][4], 0, ',', '.') . '€' ?>" >

<input type="hidden" name="desgloseVelatorioNombre" id="desgloseVelatorioNombre" value="<?php echo $value[3][3][1] ?>" >
<input type="hidden" name="desgloseVelatorioPrecio" id="desgloseVelatorioPrecio" value="<?php echo number_format($value[3][3][2], 0, ',', '.') . '€' ?>" >
<input type="hidden" name="desgloseVelatorioDescuento" id="desgloseVelatorioDescuento" value="<?php echo $value[3][3][3] . '%' ?>" >
<input type="hidden" name="desgloseVelatorioTotal" id="desgloseVelatorioTotal" value="<?php echo number_format($value[3][3][4], 0, ',', '.') . '€' ?>" >

<input type="hidden" name="desgloseCeremoniaNombre" id="desgloseCeremoniaNombre" value="<?php echo $value[3][4][1] ?>" >
<input type="hidden" name="desgloseCeremoniaPrecio" id="desgloseCeremoniaPrecio" value="<?php echo number_format($value[3][4][2], 0, ',', '.') . '€' ?>" >
<input type="hidden" name="desgloseCeremoniaDescuento" id="desgloseCeremoniaDescuento" value="<?php echo $value[3][4][3] . '%' ?>" >
<input type="hidden" name="desgloseCeremoniaTotal" id="desgloseCeremoniaTotal" value="<?php echo number_format($value[3][4][4], 0, ',', '.') . '€' ?>" >

<input type="hidden" name="desgloseDescuentoGenerico" id="desgloseDescuentoGenerico" value="<?php echo $value[3][5][1] ?>" >
<input type="hidden" name="desgloseDescuentoGenericoPrecio" id="desgloseDescuentoGenericoPrecio" value="<?php echo number_format($value[3][5][2], 0, ',', '.') . '€' ?>" >
<input type="hidden" name="desgloseDescuentoGenericoDescuento" id="desgloseDescuentoGenericoDescuento" value="<?php echo $value[3][5][3] . '%' ?>" >
<input type="hidden" name="desgloseDescuentoGenericoTotal" id="desgloseDescuentoGenericoTotal" value="<?php echo number_format($value[3][5][4], 0, ',', '.') . '€' ?>" >
<?php
