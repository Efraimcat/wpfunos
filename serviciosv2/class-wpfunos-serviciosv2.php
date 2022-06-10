<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Servicios.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/servicios
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
class Wpfunos_ServiciosV2 {
  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
    add_shortcode( 'wpfunos-nuevos-resultados', array( $this, 'wpfunosServiciosResultadosShortcode' ));
    add_shortcode( 'wpfunos-nuevos-datos', array( $this, 'wpfunosServiciosDatosShortcode' ));
  }
  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-serviciosv2.css', array(), $this->version, 'all' );
  }
  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-serviciosv2.js', array( 'jquery' ), $this->version, false );
    wp_localize_script( $this->plugin_name, 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
  }

  public function wpfunosServiciosResultadosShortcode($atts, $content = ""){
    echo do_shortcode( '[gmw_ajax_form search_form="6"]' );
  }

  public function wpfunosServiciosDatosShortcode($atts, $content = ""){
    echo do_shortcode( '[gmw_ajax_form search_results="6"]' );
    //require 'js/' . $this->plugin_name . '-serviciosv2.js';

    $popup_id = '56948'; //your Popup ID.
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $popup_id ); //insert the popup to the current page

    ?><script>
    jQuery( document ).ready( function() { //wait for the page to load
      /* You can do more here, this will just show the popup on refresh of page, but hey this is JQuery so you can do more things here depending on your condition to trigger the popup */
      jQuery( window ).on( 'elementor/frontend/init', function() { //wait for elementor to load
        elementorFrontend.on( 'components:init', function() { //wait for elementor pro to load
          elementorFrontend.documentsManager.documents[<?php echo $popup_id ;?>].showModal(); //show the popup
        } );
      } );
    } );
    </script>;
    <?php

  }

}
