<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/Efraimcat/wpfunos/
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage Wpfunos/admin
 * @author     Efraim Bayarri <efraim@efraim.cat>
 *
 */
class Wpfunos_Directorio_Shortcodes extends Wpfunos_Directorio
{

  public function __construct()
  {
    add_shortcode('wpfunos-directorio-tanatorio-mapa', array($this, 'wpfunosDirectorioTanatorioMapaShortcode'));
    add_shortcode('wpfunos-directorio-funeraria-mapa', array($this, 'wpfunosDirectorioFunerariaMapaShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-incineracion-desde', array($this, 'wpfunosDirectorioTanatorioIncineracionDesdeShortcode'));
    add_shortcode('wpfunos-directorio-funeraria-incineracion-desde', array($this, 'wpfunosDirectorioFunerariaIncineracionDesdeShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-entierro-desde', array($this, 'wpfunosDirectorioTanatorioEntierroDesdeShortcode'));
    add_shortcode('wpfunos-directorio-funeraria-entierro-desde', array($this, 'wpfunosDirectorioFunerariaEntierroDesdeShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-categoria', array($this, 'wpfunosDirectorioTanatorioCategoriaShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-servicios', array($this, 'wpfunosDirectorioTanatorioServiciosShortcode'));
    add_shortcode('wpfunos-directorio-funeraria-servicios', array($this, 'wpfunosDirectorioFunerariaServiciosShortcode'));
    add_shortcode('wpfunos-directorio-funeraria-lista', array($this, 'wpfunosDirectorioFunerariaListaShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-cercanos', array($this, 'wpfunosDirectorioFunerariaCercanosShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-cercanos-ficha', array($this, 'wpfunosDirectorioFunerariaCercanosFichaShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-titulo', array($this, 'wpfunosDirectorioTanatorioTituloShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-link-buscador', array($this, 'wpfunosDirectorioTanatorioLinkBuscadorShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-precio-zona', array($this, 'wpfunosDirectorioTanatorioPrecioZonaShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-titulo-archive', array($this, 'wpfunosDirectorioTanatorioTituloArchiveShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-ficha-cercano-imagen', array($this, 'wpfunosDirectorioTanatorioFichaCercanoImagenShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-ficha-cercano-titulo', array($this, 'wpfunosDirectorioTanatorioFichaCercanoTituloShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-ficha-cercano-poblacion', array($this, 'wpfunosDirectorioTanatorioFichaCercanoPoblacionShortcode'));
    add_shortcode('wpfunos-directorio-tanatorio-ficha-schema-faq', array($this, 'wpfunosDirectorioTanatorioFichaSchemaFAQShortcode'));
  }

  /**
   * add_shortcode( 'wpfunos-directorio-tanatorio-mapa', array( $this, 'wpfunosDirectorioTanatorioMapaShortcode' ));
   */
  public function wpfunosDirectorioTanatorioMapaShortcode()
  {
    $post_id = get_the_ID();
    $poblacion = get_post_meta($post_id, 'wpfunos_entradaDirectorioPoblacion', true);
    $direccion = get_post_meta($post_id, 'wpfunos_entradaDirectorioDireccion', true);
    echo $direccion . ',' . $poblacion;
  }
  /**
   * add_shortcode( 'wpfunos-directorio-funeraria-mapa', array( $this, 'wpfunosDirectorioFunerariaMapaShortcode' ));
   */
  public function wpfunosDirectorioFunerariaMapaShortcode()
  {
    $post_id = get_the_ID();
    $poblacion = get_post_meta($post_id, 'wpfunos_funerariaDirectorioPoblacion', true);
    $direccion = get_post_meta($post_id, 'wpfunos_funerariaDirectorioDireccion', true);
    echo $direccion . ',' . $poblacion;
  }

  /**
   * add_shortcode( 'wpfunos-directorio-tanatorio-incineracion-desde', array( $this, 'wpfunosDirectorioTanatorioIncineracionDesdeShortcode' ));
   */
  public function wpfunosDirectorioTanatorioIncineracionDesdeShortcode()
  {
    $post_id = get_the_ID();
    $paginas = (explode(',',  get_post_meta($post_id, 'wpfunos_entradaDirectorioLandings', true)));
    $incineracionDesde = 0;
    foreach ($paginas as $pagina) {
      $incineracion = (int)str_replace(".", "", get_post_meta($pagina, 'wpfunos_precioFunerariaIncineracionDesde', true));
      if ($incineracionDesde == 0) $incineracionDesde = $incineracion;
      if ($incineracionDesde > $incineracion) $incineracionDesde = $incineracion;
    }
    $precioIncineracion = ($incineracionDesde == 0) ? '' : number_format($incineracionDesde, 0, ',', '.') . '€';
    $URLlink = get_post_meta($post_id, 'wpfunos_entradaDirectorioURLLandings', true);
    $distancia = get_post_meta($post_id, 'wpfunos_entradaDirectorioURLBuscadorDistancia', true);
    $latitud = get_post_meta($post_id, 'wpfunos_entradaDirectorioLatitud', true);
    $longuitud = get_post_meta($post_id, 'wpfunos_entradaDirectorioLongitud', true);
    $poblacion = get_post_meta($post_id, 'wpfunos_entradaDirectorioPoblacion', true);
    $args = array(
      'post_type' => 'precio_funer_wpfunos',
      'post_status'  => 'publish',
      'posts_per_page' => -1,
      'orderby' => 'title',
      'order' => 'ASC',
      'meta_query' => array(
        'relation' => 'AND',
        array('key' => 'wpfunos_precioFunerariaPoblacion', 'value' => $poblacion, 'compare' => '=',),
      ),
    );
    $landings = get_posts($args);
    if ($landings) {
      foreach ($landings as $landing) {
        if (get_post_meta($post_id, 'wpfunos_entradaDirectorioURLBuscadorDistancia', true) == '') $distancia = get_post_meta($landing->ID, 'wpfunos_EnlaceDistancia', true);
        if (get_post_meta($post_id, 'wpfunos_entradaDirectorioLatitud', true) == '') $latitud = get_post_meta($landing->ID, 'wpfunos_EnlaceLatitud', true);
        if (get_post_meta($post_id, 'wpfunos_entradaDirectorioLongitud', true) == '') $longuitud = get_post_meta($landing->ID, 'wpfunos_EnlaceLonguitud', true);
      }
    }
    $URLbuscador = home_url() . '/comparar-precios-resultados?address[]=' . get_post_meta($post_id, 'wpfunos_entradaDirectorioPoblacion', true)
      . '&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=' . $distancia . '&units=metric&paged=1&per_page=50&lat=' . $latitud
      . '&lng=' . $longuitud . '&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&destino=incineracion';
    if (strlen($URLlink) > 9) {
      $link = '<a href="' . esc_url($URLlink) . '">aquí</a>';
    } else {
      $link = '<a href="' . esc_url($URLbuscador) . '">aquí</a>';
    }
    echo 'Consigue el precio de <strong>incineración desde</strong> <span style="color: #ff0000;"><strong>' . $precioIncineracion . '</strong></span> en este u otros tanatorios y funerarias de la zona <strong>' . $link . '</strong>.';
  }
  /**
   * add_shortcode( 'wpfunos-directorio-funeraria-incineracion-desde', array( $this, 'wpfunosDirectorioFunerariaIncineracionDesdeShortcode' ));
   */
  public function wpfunosDirectorioFunerariaIncineracionDesdeShortcode()
  {
    $post_id = get_the_ID();
    $paginas = (explode(',',  get_post_meta($post_id, 'wpfunos_funerariaDirectorioLandings', true)));
    $incineracionDesde = 0;
    foreach ($paginas as $pagina) {
      $incineracion = (int)str_replace(".", "", get_post_meta($pagina, 'wpfunos_precioFunerariaIncineracionDesde', true));
      if ($incineracionDesde == 0) $incineracionDesde = $incineracion;
      if ($incineracionDesde > $incineracion) $incineracionDesde = $incineracion;
    }
    $precioIncineracion = ($incineracionDesde == 0) ? '' : number_format($incineracionDesde, 0, ',', '.') . '€';
    $URLlink = get_post_meta($post_id, 'wpfunos_funerariaDirectorioURLLandings', true);
    if (strlen($URLlink) > 9) {
      $link = '<a href="' . esc_url($URLlink) . '">aquí</a>';
    } else {
      $landings = explode(',', get_post_meta($post_id, 'wpfunos_funerariaDirectorioLandings', true));
      $link = '<a href="' . esc_url(get_permalink($landings[0])) . '">aquí</a>';
    }
    echo 'Consigue el precio de <strong>incineración desde</strong> <span style="color: #ff0000;"><strong>' . $precioIncineracion . '</strong></span> en este u otros tanatorios y funerarias de la zona <strong>' . $link . '</strong>.';
  }

  /**
   * add_shortcode( 'wpfunos-directorio-tanatorio-entierro-desde', array( $this, 'wpfunosDirectorioTanatorioEntierroDesdeShortcode' ));
   */
  public function wpfunosDirectorioTanatorioEntierroDesdeShortcode()
  {
    $post_id = get_the_ID();
    $paginas = (explode(',',  get_post_meta($post_id, 'wpfunos_entradaDirectorioLandings', true)));
    $entierroDesde = 0;
    foreach ($paginas as $pagina) {
      $entierro = (int)str_replace(".", "", get_post_meta($pagina, 'wpfunos_precioFunerariaEntierroDesde', true));
      if ($entierroDesde == 0) $entierroDesde = $entierro;
      if ($entierroDesde > $entierro) $entierroDesde = $entierro;
    }
    $precioEntierro = ($entierroDesde == 0) ? '' : number_format($entierroDesde, 0, ',', '.') . '€';
    $URLlink = get_post_meta($post_id, 'wpfunos_entradaDirectorioURLLandings', true);
    $distancia = get_post_meta($post_id, 'wpfunos_entradaDirectorioURLBuscadorDistancia', true);
    $latitud = get_post_meta($post_id, 'wpfunos_entradaDirectorioLatitud', true);
    $longuitud = get_post_meta($post_id, 'wpfunos_entradaDirectorioLongitud', true);
    $poblacion = get_post_meta($post_id, 'wpfunos_entradaDirectorioPoblacion', true);
    $args = array(
      'post_type' => 'precio_funer_wpfunos',
      'post_status'  => 'publish',
      'posts_per_page' => -1,
      'orderby' => 'title',
      'order' => 'ASC',
      'meta_query' => array(
        'relation' => 'AND',
        array('key' => 'wpfunos_precioFunerariaPoblacion', 'value' => $poblacion, 'compare' => '=',),
      ),
    );
    $landings = get_posts($args);
    if ($landings) {
      foreach ($landings as $landing) {
        if (get_post_meta($post_id, 'wpfunos_entradaDirectorioURLBuscadorDistancia', true) == '') $distancia = get_post_meta($landing->ID, 'wpfunos_EnlaceDistancia', true);
        if (get_post_meta($post_id, 'wpfunos_entradaDirectorioLatitud', true) == '') $latitud = get_post_meta($landing->ID, 'wpfunos_EnlaceLatitud', true);
        if (get_post_meta($post_id, 'wpfunos_entradaDirectorioLongitud', true) == '') $longuitud = get_post_meta($landing->ID, 'wpfunos_EnlaceLonguitud', true);
      }
    }
    $URLbuscador = home_url() . '/comparar-precios-resultados?address[]=' . get_post_meta($post_id, 'wpfunos_entradaDirectorioPoblacion', true)
      . '&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=' . $distancia . '&units=metric&paged=1&per_page=50&lat=' . $latitud
      . '&lng=' . $longuitud . '&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&destino=entierro';
    if (strlen($URLlink) > 9) {
      $link = '<a href="' . esc_url($URLlink) . '">aquí</a>';
    } else {
      $link = '<a href="' . esc_url($URLbuscador) . '">aquí</a>';
    }
    echo 'Consigue el precio de <strong>entierro desde</strong> <span style="color: #ff0000;"><strong>' . $precioEntierro . '</strong></span> en este u otros tanatorios y funerarias de la zona <strong>' . $link . '</strong>.';
  }
  /**
   * add_shortcode( 'wpfunos-directorio-funeraria-entierro-desde', array( $this, 'wpfunosDirectorioFunerariaEntierroDesdeShortcode' ));
   */
  public function wpfunosDirectorioFunerariaEntierroDesdeShortcode()
  {
    $post_id = get_the_ID();
    $paginas = (explode(',',  get_post_meta($post_id, 'wpfunos_funerariaDirectorioLandings', true)));
    $entierroDesde = 0;
    foreach ($paginas as $pagina) {
      $entierro = (int)str_replace(".", "", get_post_meta($pagina, 'wpfunos_precioFunerariaEntierroDesde', true));
      if ($entierroDesde == 0) $entierroDesde = $entierro;
      if ($entierroDesde > $entierro) $entierroDesde = $entierro;
    }
    $precioEntierro = ($entierroDesde == 0) ? '' : number_format($entierroDesde, 0, ',', '.') . '€';
    $URLlink = get_post_meta($post_id, 'wpfunos_funerariaDirectorioURLLandings', true);
    if (strlen($URLlink) > 9) {
      $link = '<a href="' . esc_url($URLlink) . '">aquí</a>';
    } else {
      $landings = explode(',', get_post_meta($post_id, 'wpfunos_funerariaDirectorioLandings', true));
      $link = '<a href="' . esc_url(get_permalink($landings[0])) . '">aquí</a>';
    }
    echo 'Consigue el precio de <strong>entierro desde</strong> <span style="color: #ff0000;"><strong>' . $precioEntierro . '</strong></span> en este u otros tanatorios y funerarias de la zona <strong>' . $link . '</strong>.';
  }

  /**
   * add_shortcode( 'wpfunos-directorio-tanatorio-categoria', array( $this, 'wpfunosDirectorioTanatorioCategoriaShortcode' ));
   */
  public function wpfunosDirectorioTanatorioCategoriaShortcode()
  {
    $post_id = get_the_ID();
    $term_list = wp_get_post_terms($post_id, 'directorio_poblacion', array('fields' => 'all'));
    $provincia = strtolower(get_the_category_by_ID($term_list[0]->parent));
    $poblacion = strtolower(get_the_category_by_ID($term_list[0]->term_taxonomy_id));

    $link_poblacion = '<a href="' . home_url() . '/tanatorios/' . $provincia . '/' . $poblacion . '">población de ' . ucfirst($poblacion) . '</a>';
    $link_provincia = '<a href="' . home_url() . '/tanatorios/' . $provincia . '">provincia de ' . ucfirst($provincia) . '</a>';

    echo 'Ver todos los tanatorios de la ' . $link_poblacion . ' o de la ' . $link_provincia . '.';
  }

  /**
   * add_shortcode( 'wpfunos-directorio-tanatorio-servicios', array( $this, 'wpfunosDirectorioTanatorioServiciosShortcode' ));
   */
  public function wpfunosDirectorioTanatorioServiciosShortcode()
  {
    $post_id = get_the_ID();
    $servicios = explode(',', get_post_meta($post_id, 'wpfunos_entradaDirectorioServicios', true));
    if ($servicios[0]) {
      echo '<ul>';
      foreach ($servicios as $servicio) {
        echo '<li id=' . $servicio . '>' . get_post_meta($servicio, 'wpfunos_servicioDirectorioNombre', true) . '</li>';
      }
      echo '</ul>';
    }
  }

  /**
   * add_shortcode( 'wpfunos-directorio-funeraria-servicios', array( $this, 'wpfunosDirectorioFunerariaServiciosShortcode' ));
   */
  public function wpfunosDirectorioFunerariaServiciosShortcode()
  {
    $post_id = get_the_ID();
    $servicios = explode(',', get_post_meta($post_id, 'wpfunos_funerariaDirectorioServicios', true));
    if ($servicios[0]) {
      echo '<ul>';
      foreach ($servicios as $servicio) {
        echo '<li id=' . $servicio . '>' . get_post_meta($servicio, 'wpfunos_servicioDirectorioNombre', true) . '</li>';
      }
      echo '</ul>';
    }
  }

  /**
   * add_shortcode( 'wpfunos-directorio-funeraria-lista', array( $this, 'wpfunosDirectorioFunerariaListaShortcode' ));
   */
  public function wpfunosDirectorioFunerariaListaShortcode()
  {
    $post_id = get_the_ID();
    /**
     *<style>
     *  ul {
     *    columns: 3;
     *    -webkit-columns: 3;
     *    -moz-columns: 3;
     *  }
     *</style>
     */

    //$funerarias = explode(',',get_post_meta(  $post_id , 'wpfunos_funerariaDirectorioServicios', true ));

    $args = array(
      'post_type' => 'directorio_entrada',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'meta_query' => array(
        array('key' => 'wpfunos_entradaDirectorioFuneraria', 'value' => $post_id, 'compare' => 'LIKE',),
      ),
    );
    $post_list = get_posts($args);
    if ($post_list) {
      echo '<ul id="ul-list">';
      foreach ($post_list as $post) {
        //$link = the_permalink($post);
        echo '<li><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></li>';
      }
      echo '</ul>';
    }
  }

  /**
   * add_shortcode( 'wpfunos-directorio-tanatorio-cercanos', array( $this, 'wpfunosDirectorioFunerariaCercanosShortcode' ));
   */
  public function wpfunosDirectorioFunerariaCercanosShortcode()
  {
    /**
     *#ul-list {
     * columns: 3;
     * -webkit-columns: 3;
     * -moz-columns: 3;
     *}
     */
    $post_id = get_the_ID();
    $servicios = explode(',', get_post_meta($post_id, 'wpfunos_entradaDirectorioTanatoriosCercanos', true));
    if ($servicios[0]) {
      echo '<ul id="ul-list">';
      foreach ($servicios as $servicio) {
        //echo '<li id='.$servicio.'>'.get_post_meta( $servicio , 'wpfunos_servicioDirectorioNombre', true ).'</li>';
        echo '<li><a href="' . get_permalink($servicio) . '">' . get_the_title($servicio) . '</a></li>';
      }
      echo '</ul>';
    }
  }


  /**
   * add_shortcode('wpfunos-directorio-tanatorio-cercanos-ficha', array($this, 'wpfunosDirectorioFunerariaCercanosFichaShortcode'));
   */
  public function wpfunosDirectorioFunerariaCercanosFichaShortcode()
  {
    /**
     *#ul-list {
     * columns: 3;
     * -webkit-columns: 3;
     * -moz-columns: 3;
     *}
     */
    $post_id = get_the_ID();
    $servicios = explode(',', get_post_meta($post_id, 'wpfunos_entradaDirectorioTanatoriosCercanos', true));
    if ($servicios[0]) {
      foreach ($servicios as $servicio) {
        $_GET['cercanosid'] = $servicio;

        echo '<div class="wpfunoscercanos">';
        echo '<a href="' . esc_url(get_permalink($servicio)) . '">';
        echo do_shortcode('[elementor-template id="146238"]');
        echo '</a>';
        echo '</div>';
      }
    }
  }
  /**
   * add_shortcode( 'wpfunos-directorio-tanatorio-titulo', array( $this, 'wpfunosDirectorioTanatorioTituloShortcode' ));
   */
  public function wpfunosDirectorioTanatorioTituloShortcode()
  {
    $post_id = get_the_ID();
    //$nombre = get_post_meta( $post_id, 'wpfunos_entradaDirectorioNombre', true );
    echo get_the_title();
  }

  /**
   * add_shortcode( 'wpfunos-directorio-tanatorio-link-buscador', array( $this, 'wpfunosDirectorioTanatorioLinkBuscadorShortcode' ));
   */
  public function wpfunosDirectorioTanatorioLinkBuscadorShortcode()
  {
    $post_id = get_the_ID();
    $URLlink = get_post_meta($post_id, 'wpfunos_entradaDirectorioURLLandings', true);
    $distancia = get_post_meta($post_id, 'wpfunos_entradaDirectorioURLBuscadorDistancia', true);
    $latitud = get_post_meta($post_id, 'wpfunos_entradaDirectorioLatitud', true);
    $longuitud = get_post_meta($post_id, 'wpfunos_entradaDirectorioLongitud', true);
    $poblacion = get_post_meta($post_id, 'wpfunos_entradaDirectorioPoblacion', true);
    $args = array(
      'post_type' => 'precio_funer_wpfunos',
      'post_status'  => 'publish',
      'posts_per_page' => -1,
      'orderby' => 'title',
      'order' => 'ASC',
      'meta_query' => array(
        'relation' => 'AND',
        array('key' => 'wpfunos_precioFunerariaPoblacion', 'value' => $poblacion, 'compare' => '=',),
      ),
    );
    $landings = get_posts($args);
    if ($landings) {
      foreach ($landings as $landing) {
        if (get_post_meta($post_id, 'wpfunos_entradaDirectorioURLBuscadorDistancia', true) == '') $distancia = get_post_meta($landing->ID, 'wpfunos_EnlaceDistancia', true);
        if (get_post_meta($post_id, 'wpfunos_entradaDirectorioLatitud', true) == '') $latitud = get_post_meta($landing->ID, 'wpfunos_EnlaceLatitud', true);
        if (get_post_meta($post_id, 'wpfunos_entradaDirectorioLongitud', true) == '') $longuitud = get_post_meta($landing->ID, 'wpfunos_EnlaceLonguitud', true);
      }
    }
    $URLbuscador = home_url() . '/comparar-precios-resultados?address[]=' . get_post_meta($post_id, 'wpfunos_entradaDirectorioPoblacion', true)
      . '&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=' . $distancia . '&units=metric&paged=1&per_page=50&lat=' . $latitud
      . '&lng=' . $longuitud . '&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&destino=entierro';
    if (strlen($URLlink) > 9) {
      $link = esc_url($URLlink);
    } else {
      $link = esc_url($URLbuscador);
    }
    echo $link;
  }

  /**
   * add_shortcode( 'wpfunos-directorio-tanatorio-precio-zona', array( $this, 'wpfunosDirectorioTanatorioPrecioZonaShortcode' ));
   * [wpfunos-directorio-tanatorio-precio-zona linea="titulo"]
   */
  public function wpfunosDirectorioTanatorioPrecioZonaShortcode($atts, $content = "")
  {
    //prov_zona_titulo
    //prov_zona_precio
    //prov_zona_comentarios
    $a = shortcode_atts(array(
      'linea' => '',
    ), $atts);

    $post_id = get_the_ID();

    //$term_list = wp_get_post_terms( $post_id, 'directorio_poblacion', array( 'fields' => 'all' ) );
    //$provincia = get_the_category_by_ID( $term_list[0]->parent );

    $poblacion = get_post_meta($post_id, 'wpfunos_entradaDirectorioPoblacion', true);
    $titulo = 'No hay datos de precio medio para la zona de ' . $poblacion;
    $tituloi = 'No hay datos de precio medio para la zona de ' . $poblacion;
    $precio = '';
    $precioi = '';
    $comentarios = '';
    $comentariosi = '';

    $codigos = (explode(',', get_post_meta($post_id, 'wpfunos_entradaDirectorioCodigoProvincia', true)));
    $codigo_provincia = $codigos[0];
    $args = array(
      'post_type' => 'prov_zona_wpfunos',
      'meta_key' =>  'wpfunos_provinciasCodigo',
      'meta_value' => $codigo_provincia,
    );
    $post_list = get_posts($args);
    if ($post_list) {
      foreach ($post_list as $post) {
        $check = get_post_meta($post->ID, 'wpfunos_provinciasEESS_ck', true);
        $checki = get_post_meta($post->ID, 'wpfunos_provinciasIESS_ck', true);
        if ($check == '1') {
          $precio = number_format(get_post_meta($post->ID, 'wpfunos_provinciasEESS', true), 0, ',', '.') . '€';
          $titulo = get_post_meta($post->ID, 'wpfunos_provinciasTitulo', true);
          $comentarios = get_post_meta($post->ID, 'wpfunos_provinciasComentarios', true);
        }
        if ($checki == '1') {
          $precioi = number_format(get_post_meta($post->ID, 'wpfunos_provinciasIESS', true), 0, ',', '.') . '€';
          $tituloi = get_post_meta($post->ID, 'wpfunos_provinciasTitulo', true);
          $comentariosi = get_post_meta($post->ID, 'wpfunos_provinciasComentarios', true);
        }
      }
    }

    switch ($a['linea']) {
      case 'titulo':
        echo $titulo;
        break;
      case 'tituloi':
        echo $tituloi;
        break;
      case 'precio':
        echo $precio;
        break;
      case 'precioi':
        echo $precioi;
        break;
      case 'comentarios':
        echo $comentarios;
        break;
      case 'comentariosi':
        echo $comentariosi;
        break;
    }
  }

  /**
   * add_shortcode('wpfunos-directorio-tanatorio-titulo-archive', array($this, 'wpfunosDirectorioTanatorioTituloArchiveShortcode'));
   */
  public function wpfunosDirectorioTanatorioTituloArchiveShortcode($atts, $content = "")
  {
    $titulo = category_description();
    if ($titulo == '') $titulo = '<p>Directorio</p>';
    return $titulo;
  }

  /**
   * add_shortcode('wpfunos-directorio-tanatorio-ficha-cercano-imagen', array($this, 'wpfunosDirectorioTanatorioFichaCercanoImagenShortcode'));
   */
  public function wpfunosDirectorioTanatorioFichaCercanoImagenShortcode($atts, $content = "")
  {
    $servicio = $_GET['cercanosid'];
    echo '<img src="' . esc_url(get_the_post_thumbnail_url($servicio, array(300, 300))) . '">';
  }

  /**
   * add_shortcode('wpfunos-directorio-tanatorio-ficha-cercano-titulo', array($this, 'wpfunosDirectorioTanatorioFichaCercanoTituloShortcode'));
   */
  public function wpfunosDirectorioTanatorioFichaCercanoTituloShortcode($atts, $content = "")
  {
    $servicio = $_GET['cercanosid'];
    echo '<span class="wpfunoscercanotitulo">' . get_the_title($servicio) . '</span>';
  }

  /**
   * add_shortcode('wpfunos-directorio-tanatorio-ficha-cercano-poblacion', array($this, 'wpfunosDirectorioTanatorioFichaCercanoPoblacionShortcode'));
   */
  public function wpfunosDirectorioTanatorioFichaCercanoPoblacionShortcode($atts, $content = "")
  {
    $servicio = $_GET['cercanosid'];
    echo '<span class="wpfunoscercanopoblacion">' . get_post_meta($servicio, 'wpfunos_entradaDirectorioPoblacion', true) . '</span>';
  }

  /**
   * add_shortcode('wpfunos-directorio-tanatorio-ficha-schema-faq', array($this, 'wpfunosDirectorioTanatorioFichaSchemaFAQShortcode'));
   */
  public function wpfunosDirectorioTanatorioFichaSchemaFAQShortcode($atts, $content = "")
  {
    /** 
     *  <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
     *   <h2 itemprop="name">What is the return policy?</h2>
     *   <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
     *    <div itemprop="text">
     *     Most unopened items in new condition and returned within <b>90 days</b> will receive a refund or exchange. Some items have a modified return policy noted on the receipt or packing slip. Items that are opened or damaged or do not have a receipt may be denied a refund or exchange. Items purchased online or in-store may be returned to any store.
     *     <br /><p>Online purchases may be returned via a major parcel carrier. <a href="https://example.com/returns"> Click here </a> to initiate a return.</p>
     *    </div>
     *   </div>
     *  </div>
     */
    $post_id = get_the_ID();
    $ubicacion = get_post_meta($post_id, 'wpfunos_entradaDirectorioFAQUbicacion', true);
    /**?><script>console.log('Ubicación: <?php  echo strlen($ubicacion); ?>' );</script><?php*/
    if (strlen($ubicacion) > 0){
      echo do_shortcode('[elementor-template id="146825"]');
    }
    
}
