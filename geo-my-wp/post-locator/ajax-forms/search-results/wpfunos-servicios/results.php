<?php
/**
* Posts locator Ajax "default" results template file.
*
* This file outputs the main search results.
*
* This file can be overridden by copying the entire "default" folder with all its files into
*
* your-theme's-or-child-theme's-folder/geo-my-wp/posts-locator/ajax-forms/search-results/
*
* @param $gmw  ( array ) the form being useds
*/

?>
<div class="gmw-results-inner">

	<div class="gmw-ajax-loader-element gmw-ajax-loader"></div>

	<div class="wpfunos-search-results">
		<div id="wpfunos-search-form-results"  name="wpfunos-v2-results"></div>
		<div class="gmw-results">

			<?php

			$transient = get_transient('wpfunos-wpfid-' .apply_filters('wpfunos_userIP','dummy') );

			if( $transient === false || $transient['wpfadr'] != $_GET['address'][0] || $transient['wpfdist'] != $_GET['distance'] || $transient['wpflat'] != $_GET['lat'] || $transient['wpflng'] != $_GET['lng']
			|| $transient['wpfresp1'] != $_GET['cf']['resp1'] || $transient['wpfresp2'] != $_GET['cf']['resp2'] || $transient['wpfresp3'] != $_GET['cf']['resp3'] || $transient['wpfresp4'] != $_GET['cf']['resp4'] ){
				// Si no existe transient o no es la misma busqueda

				?><script>console.log('Search transient: Transient not existent or not valid.' );</script><?php

				$wpfunos_confirmado = [];
				$wpfunos_sinconfirmar = [];
				$wpf_search = [];
				$mas_barato = 0;

				$nonce = wp_create_nonce("wpfunos_serviciosv2_nonce".apply_filters('wpfunos_userIP','dummy'));
				//$respuesta = $this->wpfunosFiltros();
				$respuestat = [];
				switch($_GET['cf']['resp1']){
					case '1': $respuesta['resp1'] = array( 'desc' => 'Destino', 'inicial' => 'E', 'texto' => 'Entierro' ); break;
					case '2': $respuesta['resp1'] = array( 'desc' => 'Destino', 'inicial' => 'I', 'texto' => 'Incineración' ); break;
				}
				switch($_GET['cf']['resp2']){
					case '1': $respuesta['resp2'] = array( 'desc' => 'Ataúd', 'inicial' => 'M', 'texto' => 'Ataúd Normal' ); break;
					case '2': $respuesta['resp2'] = array( 'desc' => 'Ataúd', 'inicial' => 'E', 'texto' => 'Ataúd Económico' ); break;
					case '3': $respuesta['resp2'] = array( 'desc' => 'Ataúd', 'inicial' => 'P', 'texto' => 'Ataúd Premium' ); break;
				}
				switch($_GET['cf']['resp3']){
					case '1': $respuesta['resp3'] = array( 'desc' => 'Velatorio', 'inicial' => 'V', 'texto' => 'Velatorio' ); break;
					case '2': $respuesta['resp3'] = array( 'desc' => 'Velatorio', 'inicial' => 'S', 'texto' => 'Sin velatorio' ); break;
				}
				switch($_GET['cf']['resp4']){
					case '1': $respuesta['resp4'] = array( 'desc' => 'Ceremonia', 'inicial' => 'S', 'texto' => 'Sin ceremonia' ); break;
					case '2': $respuesta['resp4'] = array( 'desc' => 'Ceremonia', 'inicial' => 'O', 'texto' => 'Solo sala' ); break;
					case '3': $respuesta['resp4'] = array( 'desc' => 'Ceremonia', 'inicial' => 'C', 'texto' => 'Ceremonia civil' ); break;
					case '4': $respuesta['resp4'] = array( 'desc' => 'Ceremonia', 'inicial' => 'R', 'texto' => 'Ceremonia religiosa' ); break;
				}

				foreach ($gmw['results'] as $key=>$resultado) {
					//echo $resultado->post_title .' =>' .$resultado->ID. '<br/>';
					$wpf_search[] = array ( $resultado->ID, $resultado->distance );
					$servicioID = get_post_meta( $resultado->ID, 'wpfunos_servicioPrecioID', true );
					$servicioPrecio = get_post_meta( $resultado->ID, 'wpfunos_servicioPrecio', true );

					$activo = (get_post_meta( $servicioID, 'wpfunos_servicioActivo', true ) == 1) ? 'si' : 'no' ;
					$confirmado = (get_post_meta( $servicioID, 'wpfunos_servicioPrecioConfirmado', true ) == 1) ? 'si' : 'no' ;
					//echo $resultado->ID. ' => ' .$activo. ' => ' .$confirmado. '<br/>';
					if( 'si' == $activo && 'si' == $confirmado ){
						if( $mas_barato == 0 || (int)$servicioPrecio < $mas_barato ) $mas_barato = (int)$servicioPrecio;
					}
					//
					if( 'si' == $activo && 'si' == $confirmado ) $wpfunos_confirmado[] = array ($servicioID, $resultado->ID, $servicioPrecio, $resultado->distance );
					if( 'si' == $activo && 'no' == $confirmado ) $wpfunos_sinconfirmar[] = array ($servicioID, $resultado->ID, $servicioPrecio, $resultado->distance );

					$seccionClass_presupuesto = (get_post_meta( $servicioID, 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
					$seccionClass_llamadas = (get_post_meta( $servicioID, 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';
					$valor_precio = number_format($servicioPrecio, 0, ',', '.') . '€';

					$valores[] = array (
						'ID_servicio' => $servicioID,
						'valor_titulo' => get_post_meta( $servicioID, 'wpfunos_servicio' .$campo. '_texto' , true ),
						'seccionClass_presupuesto' => $seccionClass_presupuesto,
						'seccionClass_llamadas' => $seccionClass_llamadas,
						'valor_logo' => wp_get_attachment_image ( get_post_meta( $servicioID, 'wpfunos_servicioLogo', true ) ,'full' ),
						'valor_nombre' => get_post_meta( $servicioID, 'wpfunos_servicioNombre', true ),
						'valor_nombrepack' => get_post_meta( $servicioID, 'wpfunos_servicioPackNombre', true ),
						'valor_valoracion' => get_post_meta( $servicioID, 'wpfunos_servicioValoracion', true ),
						'valor_textoprecio' => get_post_meta( $servicioID, 'wpfunos_servicioTextoPrecio', true ),
						'valor_direccion' => get_post_meta( $servicioID, 'wpfunos_servicioDireccion', true ),
						'valor_precio' =>  $valor_precio,
					);

				}

				$transient_data = array(
					'wpfadr' => $_GET['address'][0],
					'wpfdist' => $_GET['distance'],
					'wpflat' => $_GET['lat'],
					'wpflng' => $_GET['lng'],
					'wpfresp1' => $_GET['cf']['resp1'],
					'wpfresp2' => $_GET['cf']['resp2'],
					'wpfresp3' => $_GET['cf']['resp3'],
					'wpfresp4' => $_GET['cf']['resp4'],
					'wpfid' => $wpf_search,
					'wpfprice' => $mas_barato,
					'wpfcon' => $wpfunos_confirmado,
					'wpfsin' => $wpfunos_sinconfirmar,
					'wpfcampo' => $respuesta['resp1']['inicial'] . $respuesta['resp2']['inicial'] . $respuesta['resp3']['inicial'] . $respuesta['resp4']['inicial'],
					'valor-logo-confirmado' => wp_get_attachment_image ( 83459 , array(66,66)),
					'valor-logo-no-confirmado' => wp_get_attachment_image ( 83458 , array(66,66)),
					'valor-servicio' => $respuesta['resp1']['texto']. ', ' .$respuesta['resp2']['texto']. ', ' .$respuesta['resp3']['texto']. ', ' .$respuesta['resp4']['texto'],
					'wpfvalor' => $valores,
				);
				set_transient( 'wpfunos-wpfid-' .apply_filters('wpfunos_userIP','dummy'), $transient_data, HOUR_IN_SECONDS );

			}else{
				// Si existe transient y es la misma busqueda

				?><script>console.log('Search transient: Valid transient.' );</script><?php
				$mas_barato = $transient['wpfprice'];
				$wpfunos_confirmado = $transient['wpfcon'];
				$wpfunos_sinconfirmar = $transient['wpfsin'];

			}
			// Fin transient

			?>
			<div id="wpfunos-resultados-contador">

				<h6 style="text-align: center;">Hemos encontrado <?php echo (count($wpfunos_confirmado)+count($wpfunos_sinconfirmar)) ?> resultados para ti.</h6>

				<script type="text/javascript">
				document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfcount",<?php echo (count($wpfunos_confirmado)+count($wpfunos_sinconfirmar)); ?>);
				document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfmejorprecio",<?php echo number_format($mas_barato, 0, ',', '.'); ?> + '€');
				document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfmejorprecio",<?php echo $mas_barato; ?> + '€');
				</script>

			</div>
			<?php
			if ( $_GET['wpfvision'] == 'clear' ){
				do_action( 'wpfunos_resultv2_grid_confirmado', $wpfunos_confirmado );
				do_action( 'wpfunos_resultv2_grid_sinconfirmar', $wpfunos_sinconfirmar );
			}else{
				?>
				<div id="wpfunos-resultados-contador-blur">
					<?php if (count($wpfunos_confirmado) > 4 ){ ?>
						<h6 style="text-align: center;font-weight: 500;font-size: 12px;">(Mostrando los primeros 5 resultados)</h6>
					<?php }?>
				</div>
				<?php
				do_action( 'wpfunos_resultv2_blur_confirmado', $wpfunos_confirmado );
				do_action( 'wpfunos_resultv2_blur_sinconfirmar', $wpfunos_sinconfirmar );
			}

			?>

			<?php if ( $_GET['wpfvision'] == 'clear' ){ ?>

				<div class="wpfunos-search-results-map">

					<?php echo do_shortcode( '[gmw_ajax_form map="7"]' ); ?>
				</div>

			<?php }else{ ?>

				<div class="wpfunos-search-results-map" style="-webkit-filter: blur(10px);filter: blur(10px); pointer-events: none;">

					<?php echo do_shortcode( '[gmw_ajax_form map="7"]' ); ?>
				</div>

			<?php } ?>

			<div id="wpfunos-resultados-despues-mapa" style="margin-bottom: 40px;">

			</div>

		</div>


	</div>

</div>
