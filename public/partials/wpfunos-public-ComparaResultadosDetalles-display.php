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
 /* $value = Array (
  [0] => 15971
  [1] => 4927
  [2] => 3476.7
  [3] => Array (
   [0] => Array (
     [0] => Base
     [1] => Funeraria 1
     [2] => 1807
     [3] => 10
     [4] => 1626.3 )
   [1] => Array (
     [0] => Destino
     [1] => Destino entierro
     [2] => 200
     [3] => 2
     [4] => 196 )
   [2] => Array (
     [0] => Ataud
     [1] => Ataúd medio
     [2] => 1500
     [3] => 26
     [4] => 1110 )
   [3] => Array (
     [0] => Velatorio
     [1] => Velatorio
     [2] => 750
     [3] => 56
     [4] => 330 )
   [4] => Array (
     [0] => Ceremonia
     [1] => Despedida civil
     [2] => 670
     [3] => 68
     [4] => 214.4 )
   [5] => Array (
     [0] => Descuento genérico
     [1] => Descuento genérico
     [2] => 4927
     [3] =>
     [4] => 3476.7 )
   )
 )*/
?>
	<div class="elementor-container elementor-column-gap-default">
		<div class="elementor-row">
			<div class="elementor-column-wrap">
				<div class="elementor-widget-wrap">
					<div class="wpfunos-botones-resultados" style=" margin-right: 10px; ">
						<div class="wpfunos-boton-llamada" style=" margin-right: 10px; ">
							<form target="POPUPW" action="/compara-precios-acciones-detalles-popup" method="get" onsubmit="POPUPW = window.open('about:blank','POPUPW','width=600,height=400,top=400,left=600');">
								<input type="hidden" name="accion" id="accion" value="1" >
								<input type="hidden" name="telefono" id="telefono" value="<?php echo $_GET['telefonoUsuario']?>" >
								<input type="hidden" name="telefonoUsuario" id="telefonoUsuario" value="<?php echo $_GET['telefonoUsuario']?>" >
								<input type="hidden" name="seleccionUsuario" id="seleccionUsuario" value="<?php echo $_GET['seleccionUsuario']?>" >
                				<input type="hidden" name="CPUsuario" id="CPUsuario" value="<?php echo $_GET['CPUsuario']?>" >
								<input type="hidden" name="Email" id="Email" value="<?php echo $_GET['Email']?>" >
                				<input type="hidden" name="nombreUsuario" id="nombreUsuario" value="<?php echo $_GET['nombreUsuario']?>" >
                				<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_GET['idUsuario']?>" >
								<input type="hidden" name="precio" id="precio" value="<?php echo $_GET['precio']?>" >
								<input type="hidden" name="preciodescuento" id="preciodescuento" value="<?php echo $_GET['preciodescuento']?>" >

								<input type="hidden" name="servicio" id="servicio" value="<?php echo $_GET['servicio']?>" >
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

        	    	    		<input class="wpfunos-boton-detalles" type="submit" value="Detalles" style="background-color: #1d40d3; font-size: 12px;">
							</form>
						</div>
					</div>
        		</div>
	      	</div>
  		</div>
	</div>
