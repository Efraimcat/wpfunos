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

				<h6 style="text-align: center;">Hemos encontrado <?php echo (count($wpfunos_confirmado)+count($wpfunos_sinconfirmar)) ?> resultados para tí.</h6>

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
