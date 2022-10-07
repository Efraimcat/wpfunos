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
    add_shortcode( 'wpfunos-precios-incineracion', array( $this, 'wpfunosPreciosIncineracionShortcode' ));
    add_shortcode( 'wpfunos-nombre-provincia', array( $this, 'wpfunosNombreProvinciaShortcode' ));

    add_shortcode( 'wpfunos-prefun-enlace-ahora', array( $this, 'wpfunosEnlaceAhoraShortcode' ));
    add_shortcode( 'wpfunos-prefun-enlace-proximamente', array( $this, 'wpfunosEnlaceProximamenteShortcode' ));
    add_shortcode( 'wpfunos-prefun-enlace-ver-precios', array( $this, 'wpfunosEnlaceVerPreciosShortcode' ));

    add_shortcode( 'wpfunos-prefun-entierro-desde-enlace', array( $this, 'wpfunosEntierroDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-desde-enlace', array( $this, 'wpfunosIncineracionDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-entierro-velatorio-desde-enlace', array( $this, 'wpfunosEntierroVelatorioDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-velatorio-desde-enlace', array( $this, 'wpfunosIncineracionVelatorioDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-entierro-velatorio-ceremonia-desde-enlace', array( $this, 'wpfunosEntierroVelatorioCeremoniaDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-velatorio-ceremonia-desde-enlace', array( $this, 'wpfunosIncineracionVelatorioCeremoniaDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-entierro-premium-desde-enlace', array( $this, 'wpfunosEntierroPremiumDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-premium-desde-enlace', array( $this, 'wpfunosIncineracionPremiumDesdeEnlaceShortcode' ));

    add_shortcode( 'wpfunos-prefun-incineracion-basico-enlace', array( $this, 'wpfunosIncineracionBasicoEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-ceremonia-enlace', array( $this, 'wpfunosIncineracionCeremoniaEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-velatorio-enlace', array( $this, 'wpfunosIncineracionVelatorioEnlaceShortcode' ));

    add_shortcode( 'wpfunos-prefun-entierro-desde-texto', array( $this, 'wpfunosEntierroDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-desde-texto', array( $this, 'wpfunosIncineracionDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-entierro-velatorio-desde-texto', array( $this, 'wpfunosEntierroVelatorioDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-velatorio-desde-texto', array( $this, 'wpfunosIncineracionVelatorioDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-entierro-velatorio-ceremonia-desde-texto', array( $this, 'wpfunosEntierroVelatorioCeremoniaDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-velatorio-ceremonia-desde-texto', array( $this, 'wpfunosIncineracionVelatorioCeremoniaDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-entierro-premium-desde-texto', array( $this, 'wpfunosEntierroPremiumDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-premium-desde-texto', array( $this, 'wpfunosIncineracionPremiumDesdeTextoShortcode' ));

    add_shortcode( 'wpfunos-prefun-incineracion-basico-texto', array( $this, 'wpfunosIncineracionBasicoTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-ceremonia-texto', array( $this, 'wpfunosIncineracionCeremoniaTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-velatorio-texto', array( $this, 'wpfunosIncineracionVelatorioTextoShortcode' ));

    add_shortcode( 'wpfunos-prefun', array( $this, 'wpfunosPrefunShortcode' ));
    add_shortcode( 'wpfunos-prefun-texto-libre', array( $this, 'wpfunosPrefunTextolibreShortcode' ));
    add_shortcode( 'wpfunos-prefun-poblaciones-cercanas', array( $this, 'wpfunosPrefunPoblacionesCercanaShortcode' ));
    add_shortcode( 'wpfunos-prefun-paginas-relacionadas', array( $this, 'wpfunosPrefunPaginasRelacionadasShortcode' ));
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
    echo do_shortcode( get_option( 'wpfunos_PlantillaPreciosPoblacionFuneraria' ) );
  }
  /**
  * Shortcode [wpfunos-precios-incineracion]
  */
  public function wpfunosPreciosIncineracionShortcode( $atts, $content = "" ) {
    echo do_shortcode( get_option( 'wpfunos_PlantillaPreciosPoblacionIncineracion' ) );
  }

  /**
  * Shortcode [wpfunos-nombre-provincia]
  */
  public function wpfunosNombreProvinciaShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID(), 'wpfunos_precioFunerariaPoblacion', true );
    return;
  }


  /**
  * Shortcode [wpfunos-prefun-enlace-ahora]
  * add_shortcode( 'wpfunos-prefun-enlace-ahora', array( $this, 'wpfunosEnlaceAhoraShortcode' ));
  */
  public function wpfunosEnlaceAhoraShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID(), 'wpfunos_precioFunerariaEnlaceAhora', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-enlace-proximamente]
  * add_shortcode( 'wpfunos-prefun-enlace-proximamente', array( $this, 'wpfunosEnlaceProximamenteShortcode' ));
  */
  public function wpfunosEnlaceProximamenteShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID(), 'wpfunos_precioFunerariaEnlaceProximamente', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-enlace-ver-precios]
  * add_shortcode( 'wpfunos-prefun-enlace-ver-precios', array( $this, 'wpfunosEnlaceVerPreciosShortcode' ));
  */
  public function wpfunosEnlaceVerPreciosShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID(), 'wpfunos_precioFunerariaEnlaceVerPrecios', true );
    return;
  }

  /**
  * Shortcode [wpfunos-prefun-entierro-desde-enlace]
  * add_shortcode( 'wpfunos-prefun-entierro-desde-enlace', array( $this, 'wpfunosEntierroDesdeEnlaceShortcode' ));
  */
  public function wpfunosEntierroDesdeEnlaceShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID(), 'wpfunos_precioFunerariaEntierroDesdeEnlace', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-desde-enlace]
  * add_shortcode( 'wpfunos-prefun-incineracion-desde-enlace', array( $this, 'wpfunosIncineracionDesdeEnlaceShortcode' ));
  */
  public function wpfunosIncineracionDesdeEnlaceShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionDesdeEnlace', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-entierro-velatorio-desde-enlace]
  * add_shortcode( 'wpfunos-prefun-entierro-velatorio-desde-enlace', array( $this, 'wpfunosEntierroVelatorioDesdeEnlaceShortcode' ));
  */
  public function wpfunosEntierroVelatorioDesdeEnlaceShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroVelatorioDesdeEnlace', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-velatorio-desde-enlace]
  * add_shortcode( 'wpfunos-prefun-incineracion-velatorio-desde-enlace', array( $this, 'wpfunosIncineracionVelatorioDesdeEnlaceShortcode' ));
  */
  public function wpfunosIncineracionVelatorioDesdeEnlaceShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionVelatorioDesdeEnlace', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-entierro-velatorio-ceremonia-desde-enlace]
  * add_shortcode( 'wpfunos-prefun-entierro-velatorio-ceremonia-desde-enlace', array( $this, 'wpfunosEntierroVelatorioCeremoniaDesdeEnlaceShortcode' ));
  */
  public function wpfunosEntierroVelatorioCeremoniaDesdeEnlaceShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesdeEnlace', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-velatorio-ceremonia-desde-enlace]
  * add_shortcode( 'wpfunos-prefun-incineracion-velatorio-ceremonia-desde-enlace', array( $this, 'wpfunosIncineracionVelatorioCeremoniaDesdeEnlaceShortcode' ));
  */
  public function wpfunosIncineracionVelatorioCeremoniaDesdeEnlaceShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesdeEnlace', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-entierro-premium-desde-enlace]
  * add_shortcode( 'wpfunos-prefun-entierro-premium-desde-enlace', array( $this, 'wpfunosEntierroPremiumDesdeEnlaceShortcode' ));
  */
  public function wpfunosEntierroPremiumDesdeEnlaceShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroPremiumDesdeEnlace', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-premium-desde-enlace]
  * add_shortcode( 'wpfunos-prefun-incineracion-premium-desde-enlace', array( $this, 'wpfunosIncineracionPremiumDesdeEnlaceShortcode' ));
  */
  public function wpfunosIncineracionPremiumDesdeEnlaceShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionPremiumDesdeEnlace', true );
    return;
  }



  /**
  * Shortcode [wpfunos-prefun-incineracion-basico-enlace]
  * add_shortcode( 'wpfunos-prefun-incineracion-basico-enlace', array( $this, 'wpfunosIncineracionBasicoEnlaceShortcode' ));
  */
  public function wpfunosIncineracionBasicoEnlaceShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID() , 'wpfunos_precioIncineracionBasicoDesdeEnlace', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-ceremonia-enlace]
  * add_shortcode( 'wpfunos-prefun-incineracion-ceremonia-enlace', array( $this, 'wpfunosIncineracionCeremoniaEnlaceShortcode' ));
  */
  public function wpfunosIncineracionCeremoniaEnlaceShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID() , 'wpfunos_precioIncineracionCeremoniaDesdeEnlace', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-velatorio-enlace]
  * add_shortcode( 'wpfunos-prefun-incineracion-velatorio-enlace', array( $this, 'wpfunosIncineracionVelatorioEnlaceShortcode' ));
  */
  public function wpfunosIncineracionVelatorioEnlaceShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID() , 'wpfunos_precioIncineracionVelatorioDesdeEnlace', true );
    return;
  }



  /**
  * Shortcode [wpfunos-prefun-entierro-desde-texto]
  * add_shortcode( 'wpfunos-prefun-entierro-desde-texto', array( $this, 'wpfunosEntierroDesdeTextoShortcode' ));
  */
  public function wpfunosEntierroDesdeTextoShortcode( $atts, $content = "" ) {
    echo 'Entierro en ' .get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ). ' desde ' .number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-desde-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-desde-texto', array( $this, 'wpfunosIncineracionDesdeTextoShortcode' ));
  */
  public function wpfunosIncineracionDesdeTextoShortcode( $atts, $content = "" ) {
    echo 'Incineracio en ' .get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ). ' desde ' .number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-entierro-velatorio-desde-texto]
  * add_shortcode( 'wpfunos-prefun-entierro-velatorio-desde-texto', array( $this, 'wpfunosEntierroVelatorioDesdeTextoShortcode' ));
  */
  public function wpfunosEntierroVelatorioDesdeTextoShortcode( $atts, $content = "" ) {
    echo 'Entierro con velatorio en ' .get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ). ' desde ' .number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroVelatorioDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-velatorio-desde-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-velatorio-desde-texto', array( $this, 'wpfunosIncineracionVelatorioDesdeTextoShortcode' ));
  */
  public function wpfunosIncineracionVelatorioDesdeTextoShortcode( $atts, $content = "" ) {
    echo 'Incineración con velatorio en ' .get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ). ' desde ' .number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionVelatorioDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-entierro-velatorio-ceremonia-desde-texto]
  * add_shortcode( 'wpfunos-prefun-entierro-velatorio-ceremonia-desde-texto', array( $this, 'wpfunosEntierroVelatorioCeremoniaDesdeTextoShortcode' ));
  */
  public function wpfunosEntierroVelatorioCeremoniaDesdeTextoShortcode( $atts, $content = "" ) {
    echo 'Servicio completo de entierro en ' .get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ). ' desde ' .number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-entierro-velatorio-ceremonia-desde-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-velatorio-ceremonia-desde-texto', array( $this, 'wpfunosIncineracionVelatorioCeremoniaDesdeTextoShortcode' ));
  */
  public function wpfunosIncineracionVelatorioCeremoniaDesdeTextoShortcode( $atts, $content = "" ) {
    echo 'Servicio completo de incineración en ' .get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ). ' desde ' .number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-entierro-premium-desde-texto]
  * add_shortcode( 'wpfunos-prefun-entierro-premium-desde-texto', array( $this, 'wpfunosEntierroPremiumDesdeTextoShortcode' ));
  */
  public function wpfunosEntierroPremiumDesdeTextoShortcode( $atts, $content = "" ) {
    echo 'Servicio completo premium de entierro en ' .get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ). ' desde ' .number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroPremiumDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-premium-desde-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-premium-desde-texto', array( $this, 'wpfunosIncineracionPremiumDesdeTextoShortcode' ));
  */
  public function wpfunosIncineracionPremiumDesdeTextoShortcode( $atts, $content = "" ) {
    echo 'Servicio completo premium de incineración en ' .get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ). ' desde ' .number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionPremiumDesde', true ), 0, ',', '.');
    return;
  }



  /**
  * Shortcode [wpfunos-prefun-incineracion-basico-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-basico-texto', array( $this, 'wpfunosIncineracionBasicoTextoShortcode' ));
  */
  public function wpfunosIncineracionBasicoTextoShortcode( $atts, $content = "" ) {
    echo 'Servicio de incineración básico en ' .get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ). ' desde ' .number_format(get_post_meta( get_the_ID() , 'wpfunos_precioIncineracionBasicoDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-ceremonia-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-ceremonia-texto', array( $this, 'wpfunosIncineracionCeremoniaTextoShortcode' ));
  */
  public function wpfunosIncineracionCeremoniaTextoShortcode( $atts, $content = "" ) {
    echo 'Servicio de incineración con velatorio y ceremonia en ' .get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ). ' desde ' .number_format(get_post_meta( get_the_ID() , 'wpfunos_precioIncineracionCeremoniaDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-velatorio-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-velatorio-texto', array( $this, 'wpfunosIncineracionVelatorioTextoShortcode' ));
  */
  public function wpfunosIncineracionVelatorioTextoShortcode( $atts, $content = "" ) {
    echo 'Servicio de incineración con velatorio en ' .get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ). ' desde ' .number_format(get_post_meta( get_the_ID() , 'wpfunos_precioIncineracionVelatorioDesde', true ), 0, ',', '.');
    return;
  }



  /**
  * Shortcode [wpfunos-prefun]Precios de funerarias en {nombre-provincia}[/wpfunos-prefun]
  */
  //[wpfunos-prefun style='<h1 style="text-align: center;color: #ff9c00;font-size: 64px;" >' styleend="</h1>"]Precios de funerarias en {nombre-provincia}[/wpfunos-prefun]
  //[wpfunos-prefun style='<h2 style="text-align: center;color: white;font-size: 28px;font-weight: 600;" >' styleend="</h2>"]Compara precios de funerarias en {nombre-provincia} y ahorra[/wpfunos-prefun]
  //[wpfunos-prefun style='<h2 style="text-align: center;color: rgb(57, 194, 243);font-size: 36px;font-weight: 700;" >' styleend="</h2>"]Comparador de precios de funerarias en {nombre-provincia}[/wpfunos-prefun]
  //[wpfunos-prefun style='<h2 style="text-align: center; color: #ff9c00; font-size: 36px; font-weight: 700;" >' styleend="</h2>"]Comparador de precios de cremación en distintas funerarias de {nombre-provincia}[/wpfunos-prefun]
  //[wpfunos-prefun style='<h2 style="text-align: center; color: #39c2f3; font-size: 36px; font-weight: bold;">' styleend="</h2>"]Comparador de precios de funerarias en {nombre-provincia}[/wpfunos-prefun]

  // OLD
  ////[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Entierro en {nombre-provincia} desde {precio-entierro}€[/wpfunos-prefun]
  ////[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Incineración en {nombre-provincia} desde {precio-incineracion}€[/wpfunos-prefun]
  ////[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Entierro con velatorio en {nombre-provincia} desde {precio-entierro-velatorio}€[/wpfunos-prefun]
  ////[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Incineración con velatorio en {nombre-provincia} desde {precio-incineracion-velatorio}€[/wpfunos-prefun]
  ////[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Servicio completo de entierro en {nombre-provincia} desde {precio-entierro-completo}€[/wpfunos-prefun]
  ////[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Servicio completo de incineración en {nombre-provincia} desde {precio-incineracion-completo}€[/wpfunos-prefun]
  ////[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Servicio completo premium de entierro en {nombre-provincia} desde {precio-entierro-premium}€[/wpfunos-prefun]
  ////[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]Servicio completo premium de incineración en {nombre-provincia} desde {precio-incineracion-premium}€[/wpfunos-prefun]
  //// END OLD
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]<a href="{enlace-entierro}">Entierro en {nombre-provincia} desde {precio-entierro}€</a>[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]<a href="{enlace-incineracion}">Incineración en {nombre-provincia} desde {precio-incineracion}€</a>[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]<a href="{enlace-entierro-velatorio}">Entierro con velatorio en {nombre-provincia} desde {precio-entierro-velatorio}€</a>[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]<a href="{enlace-incineracion-velatorio}">Incineración con velatorio en {nombre-provincia} desde {precio-incineracion-velatorio}€</a>[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]<a href="{enlace-entierro-completo}">Servicio completo de entierro en {nombre-provincia} desde {precio-entierro-completo}€</a>[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]<a href="{enlace-incineracion-completo}">Servicio completo de incineración en {nombre-provincia} desde {precio-incineracion-completo}€</a>[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]<a href="{enlace-entierro-premium}">Servicio completo premium de entierro en {nombre-provincia} desde {precio-entierro-premium}€</a>[/wpfunos-prefun]
  //[wpfunos-prefun style='<h4 style="text-align: center; color: #444444; font-size: 32px; font-weight: bold;">' styleend="</h4>"]<a href="{enlace-incineracion-premium}">Servicio completo premium de incineración en {nombre-provincia} desde {precio-incineracion-premium}€</a>[/wpfunos-prefun]
  //
  public function wpfunosPrefunShortcode( $atts, $content = "" ) {
    $a = shortcode_atts( array(
      'style'=>'',
      'styleend'=> '',
    ), $atts );
    $content = str_replace( '{titulo-provincia}' , get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaTitulo', true ) , $content );
    $content = str_replace( '{nombre-provincia}' , get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ) , $content );
    $content = str_replace( '{precio-entierro}' , number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-incineracion}' , number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-entierro-velatorio}' , number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroVelatorioDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-incineracion-velatorio}' , number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionVelatorioDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-entierro-completo}' , number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-incineracion-completo}' , number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-entierro-premium}' , number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroPremiumDesde', true ), 0, ',', '.') , $content );
    $content = str_replace( '{precio-incineracion-premium}' , number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionPremiumDesde', true ), 0, ',', '.') , $content );

    $content = str_replace( '{enlace-entierro}' , get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroDesdeEnlace', true ) , $content );
    $content = str_replace( '{enlace-incineracion}' , get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionDesdeEnlace', true ), $content );
    $content = str_replace( '{enlace-entierro-velatorio}' , get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroVelatorioDesdeEnlace', true ), $content );
    $content = str_replace( '{enlace-incineracion-velatorio}' , get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionVelatorioDesdeEnlace', true ), $content );
    $content = str_replace( '{enlace-entierro-completo}' , get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesdeEnlace', true ), $content );
    $content = str_replace( '{enlace-incineracion-completo}' , get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesdeEnlace', true ), $content );
    $content = str_replace( '{enlace-entierro-premium}' , get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroPremiumDesdeEnlace', true ), $content );
    $content = str_replace( '{enlace-incineracion-premium}' , get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionPremiumDesdeEnlace', true ), $content );

    echo $a['style'] . $content . $a['styleend'];
  }

  /**
  * Shortcode [wpfunos-prefun-texto-libre]
  */
  public function wpfunosPrefunTextolibreShortcode( $atts, $content = "" ) {
    $texto = apply_filters('wpfunos_comentario', get_post_meta( get_the_ID(), 'wpfunos_precioFunerariaTextoLibre', true ) );
    $texto = str_replace( '{precio-imagen1}' , wp_get_attachment_image ( get_post_meta( get_the_ID(), 'wpfunos_precioFunerariaImagenPortada', true ) ,'full' ) , $texto );
    $texto = str_replace( '{precio-imagen2}' , wp_get_attachment_image ( get_post_meta( get_the_ID(), 'wpfunos_precioFunerariaImagen2', true ) ,'full' ) , $texto );
    $texto = str_replace( '{precio-imagen3}' , wp_get_attachment_image ( get_post_meta( get_the_ID(), 'wpfunos_precioFunerariaImagen3', true ) ,'full' ) , $texto );
    $texto = str_replace( '{precio-imagen4}' , wp_get_attachment_image ( get_post_meta( get_the_ID(), 'wpfunos_precioFunerariaImagen4', true ) ,'full' ) , $texto );
    echo $texto;
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-poblaciones-cercanas]
  */
  public function wpfunosPrefunPoblacionesCercanaShortcode( $atts, $content = "" ) {
    echo apply_filters('wpfunos_comentario', get_post_meta( get_the_ID(), 'wpfunos_precioFunerariaPoblacionesCercanas', true ) );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-paginas-relacionadas]
  */
  public function wpfunosPrefunPaginasRelacionadasShortcode( $atts, $content = "" ) {
    $paginas = (explode(',',get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPaginasRelacionadas', true )));
    foreach( $paginas as $pagina ){
      if( get_post_type( $pagina ) == 'precio_funer_wpfunos'){
        echo '<li><a href="'.get_post_permalink( $pagina ).'">'.get_post_meta( $pagina , 'wpfunos_precioFunerariaTitulo', true ).'</a></li>';
      }
    }
  }


}
