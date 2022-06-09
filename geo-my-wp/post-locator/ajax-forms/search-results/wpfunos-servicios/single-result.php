<?php
/**
 * Posts locator Ajax "default" single result template file.
 *
 * This file outputs each result of the list of results.
 *
 * This file can be overridden by copying the entire "default" folder with all its files into
 *
 * your-theme's-or-child-theme's-folder/geo-my-wp/posts-locator/ajax-forms/search-results/
 *
 * @param $gmw  ( array ) the form being used
 *
 * @param $post ( object ) post object in the loop
 *
 * @package gmw-ajax-forms
 */

?>	
<li id="gmw-single-post-<?php echo esc_attr( $post->ID ); ?>" class="<?php gmw_ajaxfms_search_results_class_attr( $post, $gmw ); ?>">

	<?php do_action( 'gmw_results_single_item_start', $post, $gmw ); ?>

	<div class="gmw-item-header">

		<div class="gmw-item-image gmw-item-column">
			<?php gmw_search_results_featured_image( $post, $gmw ); ?>
		</div>

		<div class="gmw-item-details gmw-item-column">

			<div class="gmw-item-title">
				<a href="<?php gmw_search_results_permalink( get_permalink(), $post, $gmw ); ?>">
					<h3><?php gmw_search_results_title( get_the_title(), $post, $gmw ); ?></h3>
				</a>
			</div>

			<div class="gmw-item-meta">
				<?php gmw_search_results_taxonomies( $post, $gmw ); ?>
			</div>

		</div>

		<div class="gmw-item-location gmw-item-column">

			<span class="gmw-item-address">
				<?php gmw_search_results_address( $post, $gmw ); ?>
			</span>

			<?php gmw_search_results_directions_link( $post, $gmw ); ?>

			<?php gmw_search_results_distance( $post, $gmw ); ?>

		</div>

		<?php do_action( 'gmw_results_single_item_header', $post, $gmw ); ?>

	</div>

	<div class="gmw-item-footer">

		<div class="gmw-item-description">
			<?php gmw_search_results_post_excerpt( $post, $gmw ); ?>
		</div>

		<?php do_action( 'gmw_results_single_item_footer', $post, $gmw ); ?>

		<div class="gmw-item-meta">
			<?php gmw_search_results_location_meta( $post, $gmw ); ?>
			<?php gmw_search_results_hours_of_operation( $post, $gmw ); ?>
		</div>

	</div>

	<?php do_action( 'gmw_results_single_item_end', $post, $gmw ); ?>
</li>
