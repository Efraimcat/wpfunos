<?php 
/**
 * Posts Locator "default" search form template file. 
 * 
 * The information on this file outputs the search form.
 * 
 * You can modify this file to apply custom changes. However, it is not recomended
 * since your changes will be overwritten on the next update of the plugin.
 * 
 * Instead you can copy-paste this template ( the "default" folder contains this file 
 * and the "css" folder ) into the theme's or child theme's folder of your site 
 * and apply your changes from there. 
 * 
 * The template folder needs to be placed under:
 * your-theme's-or-child-theme's-folder/geo-my-wp/posts-locator/search-forms/
 * 
 * Once the template folder is in the theme's folder you will be able to select 
 * it in the form editor. It will show in the "Search form" dropdown menu as "Custom: default".
 *
 * @param $gmw_form ( object ) the entire form object
 * @param $gmw      ( array )  the form settings and values only
 * 
 * @author Eyal Fitoussi
 * 
 */
?>
<?php do_action( 'gmw_before_search_form_template', $gmw ); ?>

<?php do_action( 'wpfunos-entrada-servicios' ); ?>

<div class="gmw-form-wrapper default gmw-pt-default-form-wrapper <?php echo esc_attr( $gmw['prefix'] ); ?>">
	
	<?php do_action( 'gmw_before_search_form', $gmw ); ?>

	<form class="gmw-form" name="gmw_form" action="<?php echo esc_attr( $gmw_form->get_results_page() ); ?>" method="get" data-id="<?php echo esc_attr( $gmw['ID'] ); ?>" data-prefix="<?php echo esc_attr( $gmw['prefix'] ); ?>">
		
		<div id="wpfunos-search-form-start"  name="wpfunos-search">
		
			<?php do_action( 'gmw_search_form_start', $gmw ); ?>
		
		</div>
		
		<div id="wpfunos-search-form-address">
			
			<?php gmw_search_form_address_field( $gmw ); ?>
			
		</div>
		
		<div id="wpfunos-search-form-medio">
			<p>
				O
			</p>
		</div>
		
		<div id="wpfunos-search-form-locator-button">
			
			<?php gmw_search_form_locator_button( $gmw ); ?>
			
		</div>

		<?php do_action( 'gmw_search_form_filters', $gmw ); ?>

		<?php gmw_search_form_post_types( $gmw ); ?>
				
		<?php gmw_search_form_taxonomies( $gmw ); ?>		
				
		<?php do_action( 'gmw_search_form_before_distance', $gmw ); ?>
		
		<div id="wpfunos-search-form-mensaje-radius">
			Compara funerarias en un radio de
		</div>
		
		<div id="wpfunos-search-form-radius">
        
			<?php gmw_search_form_radius( $gmw ); ?>
        
			<?php gmw_search_form_units( $gmw ); ?>
			
		</div>
		
        <div id="wpfunos-comentario"    		>
			Actualmente solo disponible en Cataluña. Próximamente en más ciudades españolas.
		</div>
		
		<div id="wpfunos-search-form-submit">
			
			<?php gmw_search_form_submit_button( $gmw ); ?>
		
		</div>
		
		<?php do_action( 'gmw_search_form_end', $gmw ); ?>
		
		<input type="hidden" name="CP" id="CP" value="" >
		
	</form>

	<?php do_action( 'gmw_after_search_form', $gmw ); ?>

</div>	

<?php do_action( 'gmw_after_search_form_template', $gmw ); ?>