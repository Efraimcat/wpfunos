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

			<!-- gmw-results-items class is required. You can add additional classes -->
			<ul class="gmw-results-items gmw-results-list">
				<?php gmw_ajaxfms_search_results_list( $gmw ); ?>
			</ul>

			<?php gmw_ajaxfms_search_results_pagination( $gmw ); ?>

		</div>

	</div>

</div>
