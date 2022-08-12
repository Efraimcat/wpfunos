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
$IP = apply_filters('wpfunos_userIP','dummy');

?>
<div class="gmw-results-inner">

	<div class="gmw-ajax-loader-element gmw-ajax-loader"></div>

	<div class="wpfunos-search-results">

		<div id="wpfunos-search-form-results"  name="wpfunos-v3-results"></div>

		<?php if ( apply_filters('wpfunos_email_colaborador','dummy') ){ echo '<div id="wpf-es-colaborador" name="si"></div>'; }	?>

		<div class="gmw-results">

			<?php

			$transient_id = get_transient('wpfunos-wpfid-v3-' .$IP );

			if( $transient_id === false || $transient_id['wpfadr'] != $_GET['address'][0] || $transient_id['wpfdist'] != $_GET['distance'] || $transient_id['wpflat'] != $_GET['lat'] || $transient_id['wpflng'] != $_GET['lng']
			|| $transient_id['wpfresp1'] != $_GET['cf']['resp1'] || $transient_id['wpfresp2'] != $_GET['cf']['resp2'] || $transient_id['wpfresp3'] != $_GET['cf']['resp3'] || $transient_id['wpfresp4'] != $_GET['cf']['resp4'] ){

				?><script>console.log('results.php: Transient not existent or not valid.' );</script><?php

				do_action('wpfunos_v3_crear_trans_resultados', $gmw['results'] );

				$transient_id = get_transient('wpfunos-wpfid-v3-' .$IP );

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

				document.getElementById("wpf-resultados-referencia").setAttribute("wpfcount",<?php echo (count($wpfunos_confirmado)+count($wpfunos_sinconfirmar)); ?>);
				document.getElementById("wpf-resultados-referencia").setAttribute("wpfmejorprecio",<?php echo $mas_barato; ?> + '€');

				</script>

			</div>

			<div id="wpfunos-resultados">

				<?php

				//do_action( 'wpfunos_v3_confirmado_dummy', $wpfunos_confirmado );
				//do_action( 'wpfunos_v3_sinconfirmar_dummy', $wpfunos_sinconfirmar );
				do_action( 'wpfunos_v3_confirmado', $wpfunos_confirmado );
				do_action( 'wpfunos_v3_sinconfirmar', $wpfunos_sinconfirmar );

				?>

			</div>

			<div class="wpfunos-search-results-map">

				<?php echo do_shortcode( '[gmw_ajax_form map="8"]' ); ?>

			</div>

			<div id="wpfunos-resultados-despues-mapa" style="margin-bottom: 40px;"></div>

		</div>

	</div>

</div>
