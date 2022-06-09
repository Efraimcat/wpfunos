<?php 
/**
 * Posts locator Ajax "default" results message template file.
 *
 * This file outputs the search results message.
 *
 * This file can be overridden by copying the entire "default" folder with all its files into
 *
 * your-theme's-or-child-theme's-folder/geo-my-wp/posts-locator/ajax-forms/search-results/
 *
 * @param $gmw  ( array ) the form being used
 */
?>
<div class="gmw-results-message">

	<?php if ( $gmw['results_message'] ) { ?>

		<span><?php echo $gmw['results_message']; ?></span>

	<?php } ?>

	<?php do_action( 'gmw_search_results_after_results_message', $gmw ); ?>

</div>
