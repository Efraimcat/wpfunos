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
//%%cf_SeoDesde%%
//%%cf_SeoEntierro%%
//%%cf_SeoIncineracion%%

class Wpfunos_PreciosPoblacion {

  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
    add_shortcode( 'wpfunos-precios-funerarias', array( $this, 'wpfunosPreciosFunerariasShortcode' ));
    add_shortcode( 'wpfunos-nombre-provincia', array( $this, 'wpfunosNombreProvinciaShortcode' ));
    add_shortcode( 'wpfunos-prefun', array( $this, 'wpfunosPrefunShortcode' ));
    add_shortcode( 'wpfunos-prefun-texto-libre', array( $this, 'wpfunosPrefunTextolibreShortcode' ));
    add_shortcode( 'wpfunos-prefun-poblaciones-cercanas', array( $this, 'wpfunosPrefunPoblacionesCercanaShortcode' ));
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
  /**
  * Shortcode [wpfunos-prefun]Precios de funerarias en {nombre-provincia}[/wpfunos-prefun]
  */
  //[wpfunos-prefun style='<h1 style="text-align: center;color: #ff9c00;font-size: 64px;" >' styleend="</h1>"]Precios de funerarias en {nombre-provincia}[/wpfunos-prefun]
  //[wpfunos-prefun style='<h2 style="text-align: center;color: white;font-size: 28px;font-weight: 600;" >' styleend="</h2>"]Compara precios de funerarias en {nombre-provincia} y ahorra[/wpfunos-prefun]
  //[wpfunos-prefun style='<h2 style="text-align: center;color: rgb(57, 194, 243);font-size: 36px;font-weight: 700;" >' styleend="</h2>"]Comparador de precios de funerarias en {nombre-provincia}[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Entierro en {nombre-provincia} desde {precio-entierro}€[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Incineración en {nombre-provincia} desde {precio-incineracion}€[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Entierro con velatorio en {nombre-provincia} desde {precio-entierro-velatorio}€[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Incineración con velatorio en {nombre-provincia} desde {precio-incineracion-velatorio}€[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Servicio completo de entierro en {nombre-provincia} desde {precio-entierro-completo}€[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Servicio completo de incineración en {nombre-provincia} desde {precio-incineracion-completo}€[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Servicio completo premium de entierro en {nombre-provincia} desde {precio-entierro-premium}€[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Servicio completo premium de incineración en {nombre-provincia} desde {precio-incineracion-premium}€[/wpfunos-prefun]
  public function wpfunosPrefunShortcode( $atts, $content = "" ) {
    $a = shortcode_atts( array(
      'style'=>'',
      'styleend'=> '',
    ), $atts );
    $content = str_replace( '{nombre-provincia}' , get_post_meta( get_the_ID() , $this->plugin_name . '_precioFunerariaPoblacion', true ) , $content );
    $content = str_replace( '{precio-entierro}' , number_format(get_post_meta( get_the_ID() , $this->plugin_name . '_precioFunerariaEntierroDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-incineracion}' , number_format(get_post_meta( get_the_ID() , $this->plugin_name . '_precioFunerariaIncineracionDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-entierro-velatorio}' , number_format(get_post_meta( get_the_ID() , $this->plugin_name . '_precioFunerariaEntierroVelatorioDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-incineracion-velatorio}' , number_format(get_post_meta( get_the_ID() , $this->plugin_name . '_precioFunerariaIncineracionVelatorioDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-entierro-completo}' , number_format(get_post_meta( get_the_ID() , $this->plugin_name . '_precioFunerariaEntierroVelatorioCeremoniaDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-incineracion-completo}' , number_format(get_post_meta( get_the_ID() , $this->plugin_name . '_precioFunerariaIncineracionVelatorioCeremoniaDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-entierro-premium}' , number_format(get_post_meta( get_the_ID() , $this->plugin_name . '_precioFunerariaEntierroPremiumDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-incineracion-premium}' , number_format(get_post_meta( get_the_ID() , $this->plugin_name . '_precioFunerariaIncineracionPremiumDesde', true ), 0, ',', '.') , $content );

    echo $a['style'] . $content . $a['styleend'];
  }
  /**
  * Shortcode [wpfunos-prefun-texto-libre]
  */
  public function wpfunosPrefunTextolibreShortcode( $atts, $content = "" ) {
    echo apply_filters('wpfunos_comentario', get_post_meta( get_the_ID(), $this->plugin_name . '_precioFunerariaTextoLibre', true ) );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-poblaciones-cercanas]
  */
  public function wpfunosPrefunPoblacionesCercanaShortcode( $atts, $content = "" ) {
    echo apply_filters('wpfunos_comentario', get_post_meta( get_the_ID(), $this->plugin_name . '_precioFunerariaPoblacionesCercanas', true ) );
    return;
  }

}
