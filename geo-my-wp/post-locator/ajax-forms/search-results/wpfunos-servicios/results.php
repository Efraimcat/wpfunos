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

	<div class="gmw-ajax-filters">

		<?php gmw_ajaxfms_per_page_filter( $gmw ); ?>

		<?php gmw_ajaxfms_search_results_orderby_filter( $gmw ); ?>

	</div> 

	<div class="gmw-results">

		<?php gmw_ajaxfms_search_results_message( $gmw ); ?>

		<?php gmw_results_map( $gmw, false ); ?>

		<!-- gmw-results-items class is required. You can add additional classes -->
		<ul class="gmw-results-items gmw-results-list">
			<?php gmw_ajaxfms_search_results_list( $gmw ); ?>
		</ul>

		<?php gmw_ajaxfms_search_results_pagination( $gmw ); ?>

	</div>

</div>
