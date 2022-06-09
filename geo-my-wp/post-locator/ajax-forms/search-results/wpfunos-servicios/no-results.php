<?php 
/**
 * Posts locator Ajax "default" no results template file.
 *
 * This file outputs the "No results" template.
 *
 * This file can be overridden by copying the entire "default" folder with all its files into
 *
 * your-theme's-or-child-theme's-folder/geo-my-wp/posts-locator/ajax-forms/search-results/
 *
 * @param $gmw  ( array ) the form being useds
 */
?>
<div class="gmw-no-results">

	<?php do_action( 'gmw_no_results_start', $gmw ); ?>

	<?php gmw_no_results_message( $gmw ); ?>

	<?php do_action( 'gmw_no_results_end', $gmw ); ?> 

</div>
