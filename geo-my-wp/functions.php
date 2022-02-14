<?php
/*
 * This is the child theme for Astra theme, generated with Generate Child Theme plugin by catchthemes.
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */
add_action( 'wp_enqueue_scripts', 'astra_funos_enqueue_styles' );
function astra_funos_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
/*
 * Your code goes below
 */

function gmw_custom_get_zipcode_on_form_submission() {
	?>
	<script type="text/javascript">

	jQuery( document ).ready( function() {

		if ( typeof GMW != 'undefined' ) {

			// Executes when address is geocoded during form submission.
			GMW.add_filter( 'gmw_geocoder_result_on_success', function( results ) {

				// Check if zipcode exists.
				if ( results.postcode != '' ) {
					document.getElementById("CP").value = results.postcode;
				}

				return results;
			});

			// Executes when selecting an address from the address autocomplete suggested results.
			GMW.add_action( 'gmw_address_autocomplete_place_changed', function( place, autocomplete, field_id, input_field, options ) {

				// Get the location fields from the selected option.
				var results = GMW_Geocoders.google_maps.getLocationFields( place );

				// If zipcode exists.
				if ( results.postcode != '' ) {
					document.getElementById("CP").value = results.postcode;
				}
			});
		}
	});
	</script>
	<?php
}
add_action( 'wp_footer', 'gmw_custom_get_zipcode_on_form_submission', 50 );
