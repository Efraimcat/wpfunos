<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Aseguradoras.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/aseguradoras
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
class Wpfunos_PreciosPoblacion {

  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
    add_shortcode( 'wpfunos-precios-funerarias', array( $this, 'wpfunosPreciosFunerariasShortcode' ));
    add_shortcode( 'wpfunos-nombre-provincia', array( $this, 'wpfunosNombreProvinciaShortcode' ));
  }
  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-precios-poblacion.css', array(), $this->version, 'all' );
  }
  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-precios-poblacion.js', array( 'jquery' ), $this->version, false );
  }

  /**
  * Shortcode [wpfunos-precios-funerarias]
  */
  public function wpfunosPreciosFunerariasShortcode( $atts, $content = "" ) {
    echo do_shortcode( get_option( $this->plugin_name . '_PlantillaPreciosPoblacionFuneraria' ) );
  }
  /**
  * Shortcode [wpfunos-nombre-provincia]
  */
  public function wpfunosNombreProvinciaShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID(), $this->plugin_name . '_precioFunerariaPoblacion', true );
    return;
  }
}
