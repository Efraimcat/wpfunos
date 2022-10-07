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
			do_action('wpfunos_v3_crear_trans_resultados', $gmw['results'] );

			$transient_id = get_transient('wpfunos-wpfid-v3-' .$IP );

			$mas_barato = $transient_id['wpfprice'];
			$wpfunos_confirmado = $transient_id['wpfcon'];
			$wpfunos_sinconfirmar = $transient_id['wpfsin'];
			ElementorPro\Modules\Popup\Module::add_popup_to_location( '84639' ); //Ventana Popup Esperando (loader2)
			$contador = count($wpfunos_confirmado)+count($wpfunos_sinconfirmar);

			$texto_contador = ($contador == '0') ? 'Ampliando el radio de búsqueda...' : 'Hemos encontrado ' .$contador. ' resultados para ti.';
			?>

			<div id="wpfunos-resultados-contador">

				<h6 style="text-align: center;"><?php echo $texto_contador; ?></h6>

				<script type="text/javascript">

				var contador = <?php echo $contador; ?>;
				var mejor = <?php echo $mas_barato; ?>;

				document.getElementById("wpf-resultados-referencia").setAttribute("wpfcount",contador);
				document.getElementById("wpf-resultados-referencia").setAttribute("wpfmejorprecio",mejor + '€');

				console.log('contador ' + contador);
				// No hay resulados
				if ( contador == '0' ){
					var params = new URLSearchParams(location.search);
					if( params.get('distance') !== '300') {
						jQuery( window ).on( 'elementor/frontend/init', function() { //wait for elementor to load
							elementorFrontend.on( 'components:init', function() { //wait for elementor pro to load
								elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup Esperando (loader2)
								params.set('distance', '300' );
								window.location.search = params.toString();
							});
						});
					}
				}
				// END No hay resulados

				</script>

			</div>

			<div id="wpfunos-resultados">

				<?php
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
