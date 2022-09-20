<?php
/**
* This file outputs the search form.
*
* This file can be overridden by copying it to
*
* your-theme's-or-child-theme's-folder/geo-my-wp/posts-locator/ajax-forms/search-forms/
*
* @see
*
* @param $gmw ( array ) the form being useds.
*
* @package gmw-ajax-forms
*/
//document.getElementsByClassName('gmw-radius-slider')[0].value
//id input población = gmw-address-field-8
?>
<?php do_action( 'gmw_before_search_form', $gmw ); ?>

<?php // do not remove the $action_data variable. ?>
<form id="wpfunos-servicios-form-v3" class="gmw-form" <?php echo $action_data; // WPCS: XSS ok. ?>>

  <div id="wpfunos-search-form-start"  name="wpfunos-v3-search">
    <?php do_action( 'gmw_search_form_start', $gmw ); ?>
  </div>

  <?php if ( apply_filters('wpfunos_email_colaborador','dummy') ){ echo '<div id="wpf-es-colaborador" name="si"></div>'; }	?>

  <?php gmw_search_form_address_field( $gmw ); ?>

  <?php gmw_search_form_locator_button( $gmw ); ?>

  <?php do_action( 'gmw_search_form_filters', $gmw ); ?>

  <?php gmw_search_form_post_types( $gmw ); ?>

  <?php gmw_search_form_taxonomies( $gmw ); ?>

  <?php do_action( 'gmw_search_form_before_distance', $gmw ); ?>

  <?php gmw_search_form_radius( $gmw ); ?>

  <?php gmw_search_form_units( $gmw ); ?>

  <?php do_action( 'gmw_search_form_before_submit', $gmw ); ?>

  <?php gmw_search_form_submit_button( $gmw ); ?>

  <?php do_action( 'gmw_search_form_end', $gmw ); ?>
  <input type="hidden" name="CP" id="CP" value="" >
  <input type="hidden" name="orden" id="orden" value="dist" >

</form>

<div id="wpfunos-enviando">
  <h2 style="text-align: center;">Buscando resultados </h2>
  <h6 style="text-align: center;">Estamos obteniendo precios entre varias compañías que mejor se ajusten a tus necesidades</h6>
</div>

<?php do_action( 'gmw_after_search_form', $gmw ); ?>
