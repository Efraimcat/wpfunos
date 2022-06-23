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

		<div class="gmw-results">

			<?php
			$wpfunos_confirmado = [];
			$wpfunos_sinconfirmar = [];
			foreach ($gmw['results'] as $key=>$resultado) {
				//echo $resultado->post_title .' =>' .$resultado->ID. '<br/>';
				$servicioID = get_post_meta( $resultado->ID, 'wpfunos_servicioPrecioID', true );
				$servicioPrecio = get_post_meta( $resultado->ID, 'wpfunos_servicioPrecio', true );
				$activo = (get_post_meta( $servicioID, 'wpfunos_servicioActivo', true ) == 1) ? 'si' : 'no' ;
				$confirmado = (get_post_meta( $servicioID, 'wpfunos_servicioPrecioConfirmado', true ) == 1) ? 'si' : 'no' ;
				//echo $resultado->ID. ' => ' .$activo. ' => ' .$confirmado. '<br/>';
				if( 'si' == $activo && 'si' == $confirmado ) $wpfunos_confirmado[] = array ($servicioID, $resultado->ID, $servicioPrecio );
				if( 'si' == $activo && 'no' == $confirmado ) $wpfunos_sinconfirmar[] = array ($servicioID, $resultado->ID, $servicioPrecio );
			}
			?>
			<div id="wpfunos-resultados-contador">

				<h6 style="text-align: center;">Hemos encontrado <?php echo (count($wpfunos_confirmado)+count($wpfunos_sinconfirmar)) ?> resultados para tí.</h6>

			</div>
			<?php
			if ( $_GET['wpfunos-vision'] == 'clear' ){
				do_action( 'wpfunos_resultv2_grid_confirmado', $wpfunos_confirmado );
				do_action( 'wpfunos_resultv2_grid_sinconfirmar', $wpfunos_sinconfirmar );
			}else{
				do_action( 'wpfunos_resultv2_blur_confirmado', $wpfunos_confirmado );
				do_action( 'wpfunos_resultv2_blur_sinconfirmar', $wpfunos_sinconfirmar );
			}

			?>

			<?php if ( $_GET['wpfunos-vision'] == 'clear' ){ ?>

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
