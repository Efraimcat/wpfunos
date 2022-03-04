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
	$IDusuario = apply_filters('wpfunos_get_userid', $_GET['referencia']);
	$_GET['telefonoUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userPhone', true );
	$_GET['seleccionUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true );
	$_GET['CPUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userCP', true );
	$_GET['nombreUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userName', true );
	$_GET['Email'] = get_post_meta( $IDusuario, 'wpfunos_userMail', true );
	$_GET['idUsuario'] = $IDusuario;
	if ( $gmw_form->has_locations() ) :
		?><div class="gmw-results"><?php
		?><div class="clear"></div><ul class="gmw-posts-wrapper"><?php
		while ( $gmw_query->have_posts() ) :
			$gmw_query->the_post();
			global $post;
			echo do_shortcode( '[wpfunos-actulizar-mapas-servicios]' );
			$wpfResultados = apply_filters('wpfunos_get_results', $post->ID, $IDusuario );
			$wpfunos_confirmado = apply_filters('wpfunos_results_confirmado', $wpfResultados, $wpfunos_confirmado, $post->ID );
			$wpfunos_sinconfirmar = apply_filters('wpfunos_results_sinconfirmar', $wpfResultados, $wpfunos_sinconfirmar, $post->ID );
			$wpfunos_sinprecio = apply_filters('wpfunos_results_sinprecio', $wpfResultados, $wpfunos_sinprecio, $post->ID );
			?> <div class="clear"></div><?php
		endwhile;
		do_action( 'wpfunos_result_grid_confirmado', $wpfunos_confirmado );
		do_action( 'wpfunos_result_grid_sinconfirmar', $wpfunos_sinconfirmar );
		do_action( 'wpfunos_result_grid_sinprecio', $wpfunos_sinprecio );
		?></ul></div><?php
		?><div class="wpfunos-result-map"><?php gmw_results_map( $gmw );?></div><?php
	else :
		?><div class="gmw-no-results">
			<?php gmw_no_results_message( $gmw ); ?>
		</div>	<?php
	endif;
?>
</div>

