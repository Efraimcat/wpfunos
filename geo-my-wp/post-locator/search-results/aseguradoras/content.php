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
	<div class="funos-resultados-aseguradoras"><?php
		do_action('wpfunos_aseguradoras_cold_lead');
		do_action('wpfunos-aseguradoras-resultados');
		?><div class="clear"></div>
	</div>
</div>	