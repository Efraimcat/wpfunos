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
ElementorPro\Modules\Popup\Module::add_popup_to_location( '84626' ); //Ventana Popup Esperando (loader1)
?>
<?php do_action( 'gmw_before_search_form', $gmw ); ?>

<?php // do not remove the $action_data variable. ?>
<form id="wpfunos-servicios-form-v2" class="gmw-form" <?php echo $action_data; // WPCS: XSS ok. ?>>

  <div id="wpfunos-search-form-start"  name="wpfunos-v2-search">
    <?php do_action( 'gmw_search_form_start', $gmw ); ?>
  </div>

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
  <input type="hidden" name="wpfref" id="wpfref" value="dummy" >
  <input type="hidden" name="orden" id="orden" value="dist" >
  <input type="hidden" name="dest" id="dest" value="dummy" >
  <input type="hidden" name="wpfvision" id="wpfvision" value="dummy" >

</form>

<div id="wpfunos-enviando">
  <h2 style="text-align: center;">Buscando resultados </h2>
  <h6 style="text-align: center;">Estamos obteniendo precios entre varias compañías que mejor se ajusten a tus necesidades</h6>
</div>

<?php
//1. - Entrada comparador servicios v2
$ipaddress = apply_filters('wpfunos_userIP','dummy');
$referer = sanitize_text_field( $_SERVER['HTTP_REFERER'] );
do_action('wpfunos_log', '==============' );
do_action('wpfunos_log', '1. - Entrada comparador servicios v2' );
do_action('wpfunos_log', 'IP: ' . $ipaddress);
do_action('wpfunos_log', 'referer: ' . apply_filters('wpfunos_dumplog', substr($referer,0,150) ) );
do_action('wpfunos_log', 'cookie wpfe: ' . $_COOKIE['wpfe']);
do_action('wpfunos_log', 'cookie wpfn: ' . $_COOKIE['wpfn']);
do_action('wpfunos_log', 'cookie wpft: ' . $_COOKIE['wpft']);
//$args = array(
//  'post_status' => 'publish',
//  'post_type' => 'pag_serv_wpfunos',
//  'posts_per_page' => -1,
//  'meta_key' =>  'wpfunos_entradaServiciosIP',
//  'meta_value' => $ipaddress,
//);
//$post_list = get_posts( $args );
//$contador = 1;
//if( $post_list ) $contador=count($post_list)+1;
//$my_post = array(
//  'post_title' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
//  'post_type' => 'pag_serv_wpfunos',
//  'post_status'  => 'publish',
//  'meta_input'   => array(
//    'wpfunos_entradaServiciosIP' => $ipaddress ,
//    'wpfunos_entradaServiciosReferer' => $referer,
//    'wpfunos_entradaServiciosVisitas' => $contador,
//    'wpfunos_Dummy' => true,
//  ),
//);
if( ! apply_filters('wpfunos_reserved_email','dummy') ) $post_id = wp_insert_post($my_post);
?>

<script>

jQuery( document ).ready( function() {
  document.getElementById('gmw-submit-7').addEventListener('click', function(){
    console.log('click');
    if( document.getElementById("gmw-address-field-7").value != ''){
      $('#gmw-submit-7').hide();
      $('#wpfunos-enviando').show();
      console.log('Enviando. Botón envio desactivado.');
      console.log(new Date());
      elementorFrontend.documentsManager.documents['84626'].showModal(); //show the popup
    }
  }, false);
  document.getElementById("gmw-cf-resp1-7").value = "2" ;
  document.getElementById("gmw-cf-resp2-7").value = "2" ;
  document.getElementById("gmw-cf-resp3-7").value = "2" ;
  document.getElementById("gmw-cf-resp4-7").value = "2" ;
})

</script>

<?php do_action( 'gmw_after_search_form', $gmw ); ?>
