<?php 
/**
 * Posts locator Ajax "default" pagination template file.
 *
 * This file outputs the search results paginations.
 *
 * This file can be overridden by copying the entire "default" folder with all its files into
 *
 * your-theme's-or-child-theme's-folder/geo-my-wp/posts-locator/ajax-forms/search-results/
 *
 * @param $gmw ( array ) the form being useds
 */
?>
<div class="gmw-pagination">
	<?php gmw_ajax_pagination( $gmw ); ?>
</div>
