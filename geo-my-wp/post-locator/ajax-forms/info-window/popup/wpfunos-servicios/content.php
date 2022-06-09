<?php
/**
 * Popup "default" info-window template file .
 *
 * The content of this file will be displayed in the map markers' info-window.
 *
 * This file can be overridden by copying it to
 *
 * your-theme's-or-child-theme's-folder/geo-my-wp/posts-locator/ajax-forms/info-window/popup/
 *
 * @param $gmw  - the form being used ( array )
 *
 * @param $post - the post being displayed ( object )
 *
 * @package gmw-ajax-forms
 */

?>
<?php do_action( 'gmw_iw_popup_template_before', $post, $gmw ); ?>  

<div class="buttons-wrapper">
	<?php gmw_element_dragging_handle(); ?>
	<?php gmw_element_toggle_button(); ?>
	<?php gmw_element_close_button( 'gmw-icon-cancel' ); ?>
</div>

<div class="gmw-info-window-inner popup gmw-pt-iw-template-inner">

	<?php do_action( 'gmw_info_window_start', $post, $gmw ); ?>

	<?php gmw_info_window_featured_image( $post, $gmw ); ?>	

	<a class="title" href="<?php gmw_info_window_permalink( get_permalink( $post->ID ), $post, $gmw ); ?>">
		<?php gmw_info_window_title( $post->post_title, $post, $gmw ); ?>
	</a>

	<?php do_action( 'gmw_info_window_before_address', $post, $gmw ); ?>

	<?php gmw_info_window_address( $post, $gmw ); ?>

	<?php gmw_info_window_directions_link( $post, $gmw ); ?>

	<?php gmw_info_window_distance( $post, $gmw ); ?>

	<?php do_action( 'gmw_info_window_before_excerpt', $post, $gmw ); ?>

	<?php gmw_info_window_post_excerpt( $post, $gmw ); ?>

	<?php do_action( 'gmw_info_window_before_location_meta', $post, $gmw ); ?>

	<?php gmw_info_window_location_meta( $post, $gmw, false ); ?>

	<?php gmw_info_window_directions_system( $post, $gmw ); ?>

	<?php do_action( 'gmw_info_window_end', $post, $gmw ); ?>	

</div>  
<?php do_action( 'gmw_info_window_after', $post, $gmw ); ?>
