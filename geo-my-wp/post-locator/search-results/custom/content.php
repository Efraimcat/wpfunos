<?php
/**
* Posts locator "custom" search results template file.
*
* The template folder needs to be placed under:
* your-theme's-or-child-theme's-folder/geo-my-wp/posts-locator/search-forms/
*
* @param $gmw  ( array ) the form being used
*
* @param $gmw_form ( object ) the form object
*
* @param $post ( object ) post object in the loop
*/
?>
<!--  Main results wrapper - wraps the paginations, map and results -->
<div class="gmw-results-wrapper custom <?php echo esc_attr( $gmw['prefix'] ); ?>" data-id="<?php echo absint( $gmw['ID'] ); ?>" data-prefix="<?php echo esc_attr( $gmw['prefix'] ); ?>">
	<?php
	$IDusuario = apply_filters('wpfunos_userID', $_GET['referencia']);
	$_GET['seleccionUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true );
	$respuesta = (explode(',',$_GET['seleccionUsuario']));
	$distanciaDirecto = get_option('wpfunos_distanciaServicioDirecto');
	if( $respuesta[5] == 2 && $respuesta[6] == 1 && $_GET['distance'] != $distanciaDirecto && (int)$_GET['distance'] < (int)$distanciaDirecto ){
		$new_url = home_url('/comparar-precios'.add_query_arg(array($_GET), $wp->request));
		$new_url = str_replace("&distance","&old", $new_url );
		$new_url = $new_url . '&distance=' . $distanciaDirecto;
		wp_redirect( $new_url );
		exit;
	}
	$_GET['telefonoUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userPhone', true );
	$_GET['CPUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userCP', true );
	$_GET['nombreUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userName', true );
	$_GET['Email'] = get_post_meta( $IDusuario, 'wpfunos_userMail', true );
	$_GET['idUsuario'] = $IDusuario;
	if ( $gmw_form->has_locations() ) :
		?>
		<div class="gmw-results">
			<?php
			?>
			<div class="clear"></div>
			<ul class="gmw-posts-wrapper">
				<?php
				while ( $gmw_query->have_posts() ) :
					$gmw_query->the_post();
					global $post;
					//echo do_shortcode( '[wpfunos-actulizar-mapas-servicios]' );
					$wpfResultados = apply_filters('wpfunos_get_results', $post->ID, $IDusuario );
					$wpfunos_confirmado = apply_filters('wpfunos_results_confirmado', $wpfResultados, $wpfunos_confirmado, $post->ID, $IDusuario );
					$wpfunos_sinconfirmar = apply_filters('wpfunos_results_sinconfirmar', $wpfResultados, $wpfunos_sinconfirmar, $post->ID, $IDusuario );
					$wpfunos_sinprecio = apply_filters('wpfunos_results_sinprecio', $wpfResultados, $wpfunos_sinprecio, $post->ID, $IDusuario );
					?>
					<div class="clear"></div>
					<?php
				endwhile;
				do_action( 'wpfunos_result_grid_confirmado', $wpfunos_confirmado );
				do_action( 'wpfunos_result_grid_sinconfirmar', $wpfunos_sinconfirmar );
				do_action( 'wpfunos_result_grid_sinprecio', $wpfunos_sinprecio );
				if ( count( $wpfunos_confirmado ) == 0 && count( $wpfunos_sinconfirmar ) == 0 && count( $wpfunos_sinprecio ) == 0 ){
					?>
					<div class="gmw-no-results" style="font-size: 18px;">
						<?php gmw_no_results_message( $gmw ); ?>
						<?php echo do_shortcode( get_option('wpfunos_seccionPedimosPresupuesto') ); ?>
					</div>
					<?php
				}
				?>
			</ul>
		</div>
		<?php
		?>
		<div class="wpfunos-result-map">
			<?php
			if ( count( $wpfunos_confirmado ) != 0 || count( $wpfunos_sinconfirmar ) != 0 || count( $wpfunos_sinprecio ) != 0 ) gmw_results_map( $gmw );
			?>
		</div>
		<?php
		else :
			?>
			<div class="gmw-no-results" style="font-size: 18px;">
				<?php gmw_no_results_message( $gmw ); ?>
				<?php echo do_shortcode( get_option('wpfunos_seccionPedimosPresupuesto') ); ?>
			</div>
			<?php
		endif;
		?>
	</div>
