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
			do_action( 'wpfunos_resultv2_grid_confirmado', $wpfunos_confirmado );
			do_action( 'wpfunos_resultv2_grid_sinconfirmar', $wpfunos_sinconfirmar );
			?>

			<div class="wpfunos-search-results-map">

				<?php echo do_shortcode( '[gmw_ajax_form map="6"]' ); ?>

			</div>

		</div>


	</div>

</div>
