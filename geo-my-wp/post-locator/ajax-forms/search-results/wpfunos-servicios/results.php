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

			$transient_id = get_transient('wpfunos-wpfid-' .apply_filters('wpfunos_userIP','dummy') );

			if( $transient_id === false || $transient_id['wpfadr'] != $_GET['address'][0] || $transient_id['wpfdist'] != $_GET['distance'] || $transient_id['wpflat'] != $_GET['lat'] || $transient_id['wpflng'] != $_GET['lng']
			|| $transient_id['wpfresp1'] != $_GET['cf']['resp1'] || $transient_id['wpfresp2'] != $_GET['cf']['resp2'] || $transient_id['wpfresp3'] != $_GET['cf']['resp3'] || $transient_id['wpfresp4'] != $_GET['cf']['resp4'] ){

				?><script>console.log('results.php: Transient not existent or not valid.' );</script><?php

				do_action('wpfunos_resultv2_resultados', $gmw['results'] );
				$transient_id = get_transient('wpfunos-wpfid-' .apply_filters('wpfunos_userIP','dummy') );

			}else{

				?><script>console.log('results.php: Valid transient.' );</script><?php

			}

			$mas_barato = $transient_id['wpfprice'];
			$wpfunos_confirmado = $transient_id['wpfcon'];
			$wpfunos_sinconfirmar = $transient_id['wpfsin'];

			?>

			<div id="wpfunos-resultados-contador">

				<h6 style="text-align: center;">Hemos encontrado <?php echo (count($wpfunos_confirmado)+count($wpfunos_sinconfirmar)) ?> resultados para ti.</h6>

				<script type="text/javascript">

				document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfcount",<?php echo (count($wpfunos_confirmado)+count($wpfunos_sinconfirmar)); ?>);
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

			<div id="wpfunos-resultados-despues-mapa" style="margin-bottom: 40px;"></div>

		</div>


	</div>

</div>
