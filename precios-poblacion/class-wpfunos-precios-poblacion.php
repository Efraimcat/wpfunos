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
    add_shortcode( 'wpfunos-provincia-desde', array( $this, 'wpfunosProvinciaDesdeShortcode' ));

    add_shortcode( 'wpfunos-prefun-enlace-ahora', array( $this, 'wpfunosEnlaceAhoraShortcode' ));
    add_shortcode( 'wpfunos-prefun-enlace-proximamente', array( $this, 'wpfunosEnlaceProximamenteShortcode' ));
    add_shortcode( 'wpfunos-prefun-enlace-ver-precios', array( $this, 'wpfunosEnlaceVerPreciosShortcode' ));

    add_shortcode( 'wpfunos-prefun-incineracion-enlace-ahora', array( $this, 'wpfunosEnlaceIncineracionAhoraShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-enlace-proximamente', array( $this, 'wpfunosEnlaceIncineracionProximamenteShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-enlace-ver-precios', array( $this, 'wpfunosEnlaceIncineracionVerPreciosShortcode' ));

    add_shortcode( 'wpfunos-prefun-entierro-desde-enlace', array( $this, 'wpfunosEntierroDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-desde-enlace', array( $this, 'wpfunosIncineracionDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-entierro-velatorio-desde-enlace', array( $this, 'wpfunosEntierroVelatorioDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-velatorio-desde-enlace', array( $this, 'wpfunosIncineracionVelatorioDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-entierro-velatorio-ceremonia-desde-enlace', array( $this, 'wpfunosEntierroVelatorioCeremoniaDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-velatorio-ceremonia-desde-enlace', array( $this, 'wpfunosIncineracionVelatorioCeremoniaDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-entierro-premium-desde-enlace', array( $this, 'wpfunosEntierroPremiumDesdeEnlaceShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-premium-desde-enlace', array( $this, 'wpfunosIncineracionPremiumDesdeEnlaceShortcode' ));

    //add_shortcode( 'wpfunos-prefun-incineracion-basico-enlace', array( $this, 'wpfunosIncineracionBasicoEnlaceShortcode' ));
    //add_shortcode( 'wpfunos-prefun-incineracion-ceremonia-enlace', array( $this, 'wpfunosIncineracionCeremoniaEnlaceShortcode' ));
    //add_shortcode( 'wpfunos-prefun-incineracion-velatorio-enlace', array( $this, 'wpfunosIncineracionVelatorioEnlaceShortcode' ));

    add_shortcode( 'wpfunos-prefun-entierro-desde-texto', array( $this, 'wpfunosEntierroDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-desde-texto', array( $this, 'wpfunosIncineracionDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-entierro-velatorio-desde-texto', array( $this, 'wpfunosEntierroVelatorioDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-velatorio-desde-texto', array( $this, 'wpfunosIncineracionVelatorioDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-entierro-velatorio-ceremonia-desde-texto', array( $this, 'wpfunosEntierroVelatorioCeremoniaDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-velatorio-ceremonia-desde-texto', array( $this, 'wpfunosIncineracionVelatorioCeremoniaDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-entierro-premium-desde-texto', array( $this, 'wpfunosEntierroPremiumDesdeTextoShortcode' ));
    add_shortcode( 'wpfunos-prefun-incineracion-premium-desde-texto', array( $this, 'wpfunosIncineracionPremiumDesdeTextoShortcode' ));

    //add_shortcode( 'wpfunos-prefun-incineracion-basico-texto', array( $this, 'wpfunosIncineracionBasicoTextoShortcode' ));
    //add_shortcode( 'wpfunos-prefun-incineracion-ceremonia-texto', array( $this, 'wpfunosIncineracionCeremoniaTextoShortcode' ));
    //add_shortcode( 'wpfunos-prefun-incineracion-velatorio-texto', array( $this, 'wpfunosIncineracionVelatorioTextoShortcode' ));

    add_shortcode( 'wpfunos-prefun', array( $this, 'wpfunosPrefunShortcode' ));
    add_shortcode( 'wpfunos-prefun-texto-libre', array( $this, 'wpfunosPrefunTextolibreShortcode' ));
    add_shortcode( 'wpfunos-prefun-poblaciones-cercanas', array( $this, 'wpfunosPrefunPoblacionesCercanaShortcode' ));
    add_shortcode( 'wpfunos-prefun-paginas-relacionadas', array( $this, 'wpfunosPrefunPaginasRelacionadasShortcode' ));

    add_shortcode( 'wpfunos-prefun-zona-funeraria-entierro', array( $this, 'wpfunosPrefunZonaFunerariaEntierroShortcode' ));
    add_shortcode( 'wpfunos-prefun-zona-funeraria-incineracion', array( $this, 'wpfunosPrefunZonaFunerariaIncineracionShortcode' ));
    add_shortcode( 'wpfunos-prefun-zona-incineracion-incineracion', array( $this, 'wpfunosPrefunZonaIncineracionIncineracionShortcode' ));

    add_shortcode( 'wpfunos-prefun-mapa', array( $this, 'wpfunosPrefunMapaShortcode' ));
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
  * Shortcode [wpfunos-provincia-desde]
  */
  public function wpfunosProvinciaDesdeShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID(), 'SeoDesde', true );
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
  * Shortcode [wpfunos-prefun-incineracion-enlace-ahora]
  * add_shortcode( 'wpfunos-prefun-incineracion-enlace-ahora', array( $this, 'wpfunosEnlaceIncineracionAhoraShortcode' ));
  */
  public function wpfunosEnlaceIncineracionAhoraShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID(), 'wpfunos_precioIncineracionEnlaceAhora', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-enlace-proximamente]
  * add_shortcode( 'wpfunos-prefun-incineracion-enlace-proximamente', array( $this, 'wpfunosEnlaceIncineracionProximamenteShortcode' ));
  */
  public function wpfunosEnlaceIncineracionProximamenteShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID(), 'wpfunos_precioIncineracionEnlaceProximamente', true );
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-enlace-ver-precios]
  * add_shortcode( 'wpfunos-prefun-incineracion-enlace-ver-precios', array( $this, 'wpfunosEnlaceIncineracionVerPreciosShortcode' ));
  */
  public function wpfunosEnlaceIncineracionVerPreciosShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID(), 'wpfunos_precioIncineracionEnlaceVerPrecios', true );
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
    echo esc_html__('Entierro en', 'wpfunos_es').' '.get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ).' '.esc_html__('desde', 'wpfunos_es').' '.number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-desde-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-desde-texto', array( $this, 'wpfunosIncineracionDesdeTextoShortcode' ));
  */
  public function wpfunosIncineracionDesdeTextoShortcode( $atts, $content = "" ) {
    echo esc_html__('Incineración en', 'wpfunos_es').' '.get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ).' '.esc_html__('desde', 'wpfunos_es').' '.number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-entierro-velatorio-desde-texto]
  * add_shortcode( 'wpfunos-prefun-entierro-velatorio-desde-texto', array( $this, 'wpfunosEntierroVelatorioDesdeTextoShortcode' ));
  */
  public function wpfunosEntierroVelatorioDesdeTextoShortcode( $atts, $content = "" ) {
    echo esc_html__('Entierro con velatorio en', 'wpfunos_es').' '.get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ).' '.esc_html__('desde', 'wpfunos_es').' '.number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroVelatorioDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-velatorio-desde-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-velatorio-desde-texto', array( $this, 'wpfunosIncineracionVelatorioDesdeTextoShortcode' ));
  */
  public function wpfunosIncineracionVelatorioDesdeTextoShortcode( $atts, $content = "" ) {
    echo esc_html__('Incineración con velatorio en', 'wpfunos_es').' '.get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ).' '.esc_html__('desde', 'wpfunos_es').' '.number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionVelatorioDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-entierro-velatorio-ceremonia-desde-texto]
  * add_shortcode( 'wpfunos-prefun-entierro-velatorio-ceremonia-desde-texto', array( $this, 'wpfunosEntierroVelatorioCeremoniaDesdeTextoShortcode' ));
  */
  public function wpfunosEntierroVelatorioCeremoniaDesdeTextoShortcode( $atts, $content = "" ) {
    echo esc_html__('Servicio completo de entierro en', 'wpfunos_es').' '.get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ).' '.esc_html__('desde', 'wpfunos_es').' '.number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-entierro-velatorio-ceremonia-desde-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-velatorio-ceremonia-desde-texto', array( $this, 'wpfunosIncineracionVelatorioCeremoniaDesdeTextoShortcode' ));
  */
  public function wpfunosIncineracionVelatorioCeremoniaDesdeTextoShortcode( $atts, $content = "" ) {
    echo esc_html__('Servicio completo de incineración en', 'wpfunos_es').' '.get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ).' '.esc_html__('desde', 'wpfunos_es').' '.number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-entierro-premium-desde-texto]
  * add_shortcode( 'wpfunos-prefun-entierro-premium-desde-texto', array( $this, 'wpfunosEntierroPremiumDesdeTextoShortcode' ));
  */
  public function wpfunosEntierroPremiumDesdeTextoShortcode( $atts, $content = "" ) {
    echo esc_html__('Servicio completo premium de entierro en', 'wpfunos_es').' '.get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ).' '.esc_html__('desde', 'wpfunos_es').' '.number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroPremiumDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-premium-desde-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-premium-desde-texto', array( $this, 'wpfunosIncineracionPremiumDesdeTextoShortcode' ));
  */
  public function wpfunosIncineracionPremiumDesdeTextoShortcode( $atts, $content = "" ) {
    echo esc_html__('Servicio completo premium de incineración en', 'wpfunos_es').' '.get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ).' '.esc_html__('desde', 'wpfunos_es').' '.number_format(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionPremiumDesde', true ), 0, ',', '.');
    return;
  }



  /**
  * Shortcode [wpfunos-prefun-incineracion-basico-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-basico-texto', array( $this, 'wpfunosIncineracionBasicoTextoShortcode' ));
  */
  public function wpfunosIncineracionBasicoTextoShortcode( $atts, $content = "" ) {
    echo esc_html__('Servicio de incineración básico en', 'wpfunos_es').' '.get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ).' '.esc_html__('desde', 'wpfunos_es').' '.number_format(get_post_meta( get_the_ID() , 'wpfunos_precioIncineracionBasicoDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-ceremonia-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-ceremonia-texto', array( $this, 'wpfunosIncineracionCeremoniaTextoShortcode' ));
  */
  public function wpfunosIncineracionCeremoniaTextoShortcode( $atts, $content = "" ) {
    echo esc_html__('Servicio de incineración con velatorio y ceremonia en', 'wpfunos_es').' '.get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ).' '.esc_html__('desde', 'wpfunos_es').' '.number_format(get_post_meta( get_the_ID() , 'wpfunos_precioIncineracionCeremoniaDesde', true ), 0, ',', '.');
    return;
  }
  /**
  * Shortcode [wpfunos-prefun-incineracion-velatorio-texto]
  * add_shortcode( 'wpfunos-prefun-incineracion-velatorio-texto', array( $this, 'wpfunosIncineracionVelatorioTextoShortcode' ));
  */
  public function wpfunosIncineracionVelatorioTextoShortcode( $atts, $content = "" ) {
    echo esc_html__('Servicio de incineración con velatorio en', 'wpfunos_es').' '.get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ).' '.esc_html__('desde', 'wpfunos_es').' '.number_format(get_post_meta( get_the_ID() , 'wpfunos_precioIncineracionVelatorioDesde', true ), 0, ',', '.');
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

  //[wpfunos-prefun style='<h1 style="text-align: center; color: #ff9c00;">' styleend='</h1>' ]Precios de Funerarias en {nombre-provincia} - Desde {precio-desde}[/wpfunos-prefun]
  //[wpfunos-prefun style='<h1 style="text-align: center; color: #ff9c00;">' styleend='</h1>' ]Precios de incineración en {nombre-provincia} - Desde {precio-desde}[/wpfunos-prefun]

  //
  public function wpfunosPrefunShortcode( $atts, $content = "" ) {
    $a = shortcode_atts( array(
      'style'=>'',
      'styleend'=> '',
    ), $atts );
    $content = str_replace( '{titulo-provincia}' , get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaTitulo', true ) , $content );
    $content = str_replace( '{nombre-provincia}' , get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true ) , $content );
    $content = str_replace( '{precio-desde}' , get_post_meta( get_the_ID() , 'SeoDesde', true ) , $content );

    $content = str_replace( '{precio-entierro}' , number_format( floatval(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroDesde', true )), 0, ',', '.') , $content );
    $content = str_replace( '{precio-incineracion}' , number_format( floatval(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionDesde', true )), 0, ',', '.') , $content );
    $content = str_replace( '{precio-entierro-velatorio}' , number_format( floatval(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroVelatorioDesde', true )), 0, ',', '.') , $content );
    $content = str_replace( '{precio-incineracion-velatorio}' , number_format( floatval(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionVelatorioDesde', true )), 0, ',', '.') , $content );
    $content = str_replace( '{precio-entierro-completo}' , number_format( floatval(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde', true )), 0, ',', '.') , $content );
    $content = str_replace( '{precio-incineracion-completo}' , number_format( floatval(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde', true )), 0, ',', '.') , $content );
    $content = str_replace( '{precio-entierro-premium}' , number_format( floatval(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaEntierroPremiumDesde', true )), 0, ',', '.') , $content );
    $content = str_replace( '{precio-incineracion-premium}' , number_format( floatval(get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaIncineracionPremiumDesde', true )), 0, ',', '.') , $content );

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
    if( strlen( get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPaginasRelacionadas', true ) ) < 1 ) return;
    $paginas = (explode(',',get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPaginasRelacionadas', true )));
    foreach( $paginas as $pagina ){
      if( get_post_type( $pagina ) == 'precio_funer_wpfunos'){
        $pos = strpos( get_post_permalink( $pagina ), 'funerarias' );
        $tipopagina = ($pos === false) ? 'inicineración' : 'funerarias';
        echo '<li><a href="'.get_post_permalink( $pagina ).'"> '.esc_html__('Precios', 'wpfunos_es').' '.$tipopagina.' '.esc_html__('en', 'wpfunos_es').' '.get_post_meta( $pagina , 'wpfunos_precioFunerariaPoblacion', true ).' '.esc_html__('desde', 'wpfunos_es').' '.get_post_meta( $pagina , 'SeoDesde', true ).'</a></li>';
      }
    }
  }

  /**
  * Shortcode [wpfunos-prefun-zona-funeraria-entierro]
  * add_shortcode( 'wpfunos-prefun-zona-funeraria-entierro', array( $this, 'wpfunosPrefunZonaFunerariaEntierroShortcode' ));
  */
  public function wpfunosPrefunZonaFunerariaEntierroShortcode( $atts, $content = "" ) {
    // WPML
    $expiry = strtotime('+1 day');
    if (isset($_COOKIE['wp-wpml_current_language'])){
      setcookie('wpf_obj_id_01', apply_filters( 'wpml_object_id', 47448, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Enviar Email
      setcookie('wpf_obj_id_02', apply_filters( 'wpml_object_id', 56672, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicio Detalles
      setcookie('wpf_obj_id_03', apply_filters( 'wpml_object_id', 56676, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicio Presupuesto
      setcookie('wpf_obj_id_04', apply_filters( 'wpml_object_id', 56680, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Llamar
      setcookie('wpf_obj_id_05', apply_filters( 'wpml_object_id', 56684, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Llamame

      setcookie('wpf_obj_id_06', apply_filters( 'wpml_object_id', 89340, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Multistep (1)
      setcookie('wpf_obj_id_07', apply_filters( 'wpml_object_id', 89344, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Multistep (2)
      setcookie('wpf_obj_id_08', apply_filters( 'wpml_object_id', 89348, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Multistep (3)
      setcookie('wpf_obj_id_09', apply_filters( 'wpml_object_id', 89351, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Multistep (4)
      setcookie('wpf_obj_id_10', apply_filters( 'wpml_object_id', 89354, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Multistep (5)

      setcookie('wpf_obj_id_11', apply_filters( 'wpml_object_id', 84639, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Ventana Popup Esperando (loader2)
      setcookie('wpf_obj_id_12', apply_filters( 'wpml_object_id', 77005, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Ventana Popup Esperando (entrada datos GTM)
      setcookie('wpf_obj_id_13', apply_filters( 'wpml_object_id', 111301, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Financiación
      setcookie('wpf_obj_id_14', apply_filters( 'wpml_object_id', 111305, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Financiación Genérico
      setcookie('wpf_obj_id_15', apply_filters( 'wpml_object_id', 89948, 'post', TRUE ),  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios cambiar distancia V3
    }else{
      setcookie('wpf_obj_id_01', 47448, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Enviar Email
      setcookie('wpf_obj_id_02', 56672, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicio Detalles
      setcookie('wpf_obj_id_03', 56676, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicio Presupuesto
      setcookie('wpf_obj_id_04', 56680, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Llamar
      setcookie('wpf_obj_id_05', 56684, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Llamame

      setcookie('wpf_obj_id_06', 89340, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Multistep (1)
      setcookie('wpf_obj_id_07', 89344, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Multistep (2)
      setcookie('wpf_obj_id_08', 89348, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Multistep (3)
      setcookie('wpf_obj_id_09', 89351, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Multistep (4)
      setcookie('wpf_obj_id_10', 89354, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Multistep (5)

      setcookie('wpf_obj_id_11', 84639, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Ventana Popup Esperando (loader2)
      setcookie('wpf_obj_id_12', 77005, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Ventana Popup Esperando (entrada datos GTM)
      setcookie('wpf_obj_id_13', 111301, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Financiación
      setcookie('wpf_obj_id_14', 111305, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios Financiación Genérico
      setcookie('wpf_obj_id_15', 89948, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'samesite' => 'Lax',] ); //Servicios cambiar distancia V3
    }
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_01'] ); //Servicios Enviar Email
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_02'] ); //Servicio Detalles
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_03'] ); //Servicio Presupuesto
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_04'] ); //Servicios Llamar
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_05'] ); //Servicios Llamame

    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_06'] ); //Servicios Multistep (1)
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_07'] ); //Servicios Multistep (2)
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_08'] ); //Servicios Multistep (3)
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_09'] ); //Servicios Multistep (4)
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_10'] ); //Servicios Multistep (5)

    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_11'] ); //Ventana Popup Esperando (loader2)
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_12'] ); //Ventana Popup Esperando (entrada datos GTM)
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_13'] ); //Servicios Financiación
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_14'] ); //Servicios Financiación Genérico
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $_COOKIE['wpf_obj_id_15'] ); //Servicios cambiar distancia V3
    // WPML
    $codigo_provincia = get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaCodigoPoblacion', true );
    if( strlen($codigo_provincia) > 1 ){
      $args = array(
        'post_type' => 'prov_zona_wpfunos',
        'meta_key' =>  'wpfunos_provinciasCodigo',
        'meta_value' => $codigo_provincia,
      );
      $post_list = get_posts( $args );
      if( $post_list ){
        foreach ( $post_list as $post ) :
          $check = get_post_meta( $post->ID, 'wpfunos_provincias' . 'EESS_ck', true );
          $precio = get_post_meta( $post->ID, 'wpfunos_provincias' . 'EESS', true );

          // WPML
          $servicioTrad = apply_filters( 'wpml_object_id', $post->ID, 'post', TRUE );
          $titulo = get_post_meta( $servicioTrad, 'wpfunos_provinciasTitulo', true );
          $comentarios = get_post_meta( $servicioTrad, 'wpfunos_provinciasComentarios', true );
          // WPML

          if( $check == '1'){
            $_GET['prov_zona_titulo'] = $titulo;
            $_GET['prov_zona_comentarios'] = $comentarios;
            $_GET['prov_zona_precio'] = number_format($precio, 0, ',', '.');
            echo do_shortcode( get_option('wpfunos_seccionPreciosMedioZona') ); //[elementor-template id="52324"]
          }
        endforeach;
        wp_reset_postdata();
      }else{
        $texto = esc_html__('No hay datos de precio medio para la zona de', 'wpfunos_es');
        ?><h6 style="text-align: center;margin-top: 20px;border-style: solid;border-width: thin;padding: 20px;border-radius: 4px;"><?php echo $texto;?> <?php echo $address;?></h6><?php
      }
    }
    return;
  }

  /**
  * Shortcode [wpfunos-prefun-zona-funeraria-incineracion]
  * add_shortcode( 'wpfunos-prefun-zona-funeraria-incineracion', array( $this, 'wpfunosPrefunZonaFunerariaIncineracionShortcode' ));
  */
  public function wpfunosPrefunZonaFunerariaIncineracionShortcode( $atts, $content = "" ) {
    $codigo_provincia = get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaCodigoPoblacion', true );
    if( strlen($codigo_provincia) > 1 ){
      $args = array(
        'post_type' => 'prov_zona_wpfunos',
        'meta_key' =>  'wpfunos_provinciasCodigo',
        'meta_value' => $codigo_provincia,
      );
      $post_list = get_posts( $args );
      if( $post_list ){
        foreach ( $post_list as $post ) :
          $check = get_post_meta( $post->ID, 'wpfunos_provincias' . 'IESS_ck', true );
          $precio = get_post_meta( $post->ID, 'wpfunos_provincias' . 'IESS', true );

          // WPML
          $servicioTrad = apply_filters( 'wpml_object_id', $post->ID, 'post', TRUE );
          $titulo = get_post_meta( $servicioTrad, 'wpfunos_provinciasTitulo', true );
          $comentarios = get_post_meta( $servicioTrad, 'wpfunos_provinciasComentarios', true );
          // WPML

          $comentarios = get_post_meta( $post->ID, 'wpfunos_provinciasComentarios', true );
          if( $check == '1'){
            $_GET['prov_zona_titulo'] = $titulo;
            $_GET['prov_zona_comentarios'] = $comentarios;
            $_GET['prov_zona_precio'] = number_format($precio, 0, ',', '.');
            echo do_shortcode( get_option('wpfunos_seccionPreciosMedioZona') ); //[elementor-template id="52324"]
          }
        endforeach;
        wp_reset_postdata();
      }else{
        $texto = esc_html__('No hay datos de precio medio para la zona de', 'wpfunos_es');
        ?><h6 style="text-align: center;margin-top: 20px;border-style: solid;border-width: thin;padding: 20px;border-radius: 4px;"><?php echo $texto;?> <?php echo $address;?></h6><?php
      }
    }
    return;
  }

  /**
  * Shortcode [wpfunos-prefun-zona-incineracion-incineracion]
  * add_shortcode( 'wpfunos-prefun-zona-incineracion-incineracion', array( $this, 'wpfunosPrefunZonaIncineracionIncineracionShortcode' ));
  */
  public function wpfunosPrefunZonaIncineracionIncineracionShortcode( $atts, $content = "" ) {
    $codigo_provincia = get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaCodigoPoblacion', true );
    if( strlen($codigo_provincia) > 1 ){
      $args = array(
        'post_type' => 'prov_zona_wpfunos',
        'meta_key' =>  'wpfunos_provinciasCodigo',
        'meta_value' => $codigo_provincia,
      );
      $post_list = get_posts( $args );
      if( $post_list ){
        foreach ( $post_list as $post ) :
          $check = get_post_meta( $post->ID, 'wpfunos_provincias' . 'IESS_ck', true );
          $precio = get_post_meta( $post->ID, 'wpfunos_provincias' . 'IESS', true );

          // WPML
          $servicioTrad = apply_filters( 'wpml_object_id', $post->ID, 'post', TRUE );
          $titulo = get_post_meta( $servicioTrad, 'wpfunos_provinciasTitulo', true );
          $comentarios = get_post_meta( $servicioTrad, 'wpfunos_provinciasComentarios', true );
          // WPML

          if( $check == '1'){
            $_GET['prov_zona_titulo'] = $titulo;
            $_GET['prov_zona_comentarios'] = $comentarios;
            $_GET['prov_zona_precio'] = number_format($precio, 0, ',', '.');
            echo do_shortcode( get_option('wpfunos_seccionPreciosMedioZona') ); //[elementor-template id="52324"]
          }
        endforeach;
        wp_reset_postdata();
      }
      else{
        $texto = esc_html__('No hay datos de precio medio para la zona de', 'wpfunos_es');
        ?><h6 style="text-align: center;margin-top: 20px;border-style: solid;border-width: thin;padding: 20px;border-radius: 4px;"><?php echo $texto;?> <?php echo $address;?></h6><?php
      }
    }
    return;
  }

  /**
  * Shortcode [wpfunos-prefun-mapa]
  * add_shortcode( 'wpfunos-prefun-mapa', array( $this, 'wpfunosPrefunMapaShortcode' ));
  */
  public function wpfunosPrefunMapaShortcode( $atts, $content = "" ) {
    echo get_post_meta( get_the_ID() , 'wpfunos_precioFunerariaPoblacion', true );
    return;
  }



}
