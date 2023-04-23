<?php
if ( ! defined( 'ABSPATH' ) ) {
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
class Wpfunos_Directorio_Shortcodes extends Wpfunos_Directorio {

  public function __construct( ) {
    add_shortcode( 'wpfunos-directorio-tanatorio-mapa', array( $this, 'wpfunosDirectorioTanatorioMapaShortcode' ));
    add_shortcode( 'wpfunos-directorio-funeraria-mapa', array( $this, 'wpfunosDirectorioFunerariaMapaShortcode' ));
    add_shortcode( 'wpfunos-directorio-tanatorio-incineracion-desde', array( $this, 'wpfunosDirectorioTanatorioIncineracionDesdeShortcode' ));
    add_shortcode( 'wpfunos-directorio-funeraria-incineracion-desde', array( $this, 'wpfunosDirectorioFunerariaIncineracionDesdeShortcode' ));
    add_shortcode( 'wpfunos-directorio-tanatorio-entierro-desde', array( $this, 'wpfunosDirectorioTanatorioEntierroDesdeShortcode' ));
    add_shortcode( 'wpfunos-directorio-funeraria-entierro-desde', array( $this, 'wpfunosDirectorioFunerariaEntierroDesdeShortcode' ));
    add_shortcode( 'wpfunos-directorio-tanatorio-categoria', array( $this, 'wpfunosDirectorioTanatorioCategoriaShortcode' ));
    add_shortcode( 'wpfunos-directorio-tanatorio-servicios', array( $this, 'wpfunosDirectorioTanatorioServiciosShortcode' ));
    add_shortcode( 'wpfunos-directorio-funeraria-servicios', array( $this, 'wpfunosDirectorioFunerariaServiciosShortcode' ));
    add_shortcode( 'wpfunos-directorio-funeraria-lista', array( $this, 'wpfunosDirectorioFunerariaListaShortcode' ));
    add_shortcode( 'wpfunos-directorio-tanatorio-cercanos', array( $this, 'wpfunosDirectorioFunerariaCercanosShortcode' ));
    add_shortcode( 'wpfunos-directorio-tanatorio-titulo', array( $this, 'wpfunosDirectorioTanatorioTituloShortcode' ));
    add_shortcode( 'wpfunos-directorio-tanatorio-link-buscador', array( $this, 'wpfunosDirectorioTanatorioLinkBuscadorShortcode' ));

  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-mapa', array( $this, 'wpfunosDirectorioTanatorioMapaShortcode' ));
  */
  public function wpfunosDirectorioTanatorioMapaShortcode(){
    $post_id = get_the_ID();
    $poblacion = get_post_meta( $post_id, 'wpfunos_entradaDirectorioPoblacion', true );
    $direccion = get_post_meta( $post_id, 'wpfunos_entradaDirectorioDireccion', true );
    echo $direccion. ',' .$poblacion;
  }
  /**
  * add_shortcode( 'wpfunos-directorio-funeraria-mapa', array( $this, 'wpfunosDirectorioFunerariaMapaShortcode' ));
  */
  public function wpfunosDirectorioFunerariaMapaShortcode(){
    $post_id = get_the_ID();
    $poblacion = get_post_meta( $post_id, 'wpfunos_funerariaDirectorioPoblacion', true );
    $direccion = get_post_meta( $post_id, 'wpfunos_funerariaDirectorioDireccion', true );
    echo $direccion. ',' .$poblacion;
  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-incineracion-desde', array( $this, 'wpfunosDirectorioTanatorioIncineracionDesdeShortcode' ));
  */
  public function wpfunosDirectorioTanatorioIncineracionDesdeShortcode(){
    $post_id = get_the_ID();


    $paginas = ( explode( ',',  get_post_meta(  $post_id , 'wpfunos_entradaDirectorioLandings', true ) ) );
    $incineracionDesde = 0;
    foreach( $paginas as $pagina ){
      $incineracion = (int)str_replace(".","",get_post_meta( $pagina, 'wpfunos_precioFunerariaIncineracionDesde', true ));
      if( $incineracionDesde == 0 ) $incineracionDesde = $incineracion;
      if( $incineracionDesde > $incineracion ) $incineracionDesde = $incineracion;
    }
    $precioIncineracion = ( $incineracionDesde == 0 ) ? '' : number_format($incineracionDesde, 0, ',', '.') . '€' ;


    $URLlink = get_post_meta( $post_id, 'wpfunos_entradaDirectorioURLLandings', true );
    $URLbuscador = get_post_meta( $post_id, 'wpfunos_entradaDirectorioURLBuscador', true );
    if( strlen($URLlink ) > 9){
      $link = '<a href="' .esc_url( $URLlink ). '">aquí</a>';
    }else{
      $link = '<a href="' .esc_url( $URLbuscador ). '">aquí</a>';
    }
    echo 'Consiga el precio de <strong>incineración desde</strong> <span style="color: #ff0000;"><strong>'.$precioIncineracion.'</strong></span> en este u otros tanatorios y funerarias de la zona <strong>'.$link.'</strong>.';
  }
  /**
  * add_shortcode( 'wpfunos-directorio-funeraria-incineracion-desde', array( $this, 'wpfunosDirectorioFunerariaIncineracionDesdeShortcode' ));
  */
  public function wpfunosDirectorioFunerariaIncineracionDesdeShortcode(){
    $post_id = get_the_ID();


    $paginas = ( explode( ',',  get_post_meta(  $post_id , 'wpfunos_funerariaDirectorioLandings', true ) ) );
    $incineracionDesde = 0;
    foreach( $paginas as $pagina ){
      $incineracion = (int)str_replace(".","",get_post_meta( $pagina, 'wpfunos_precioFunerariaIncineracionDesde', true ));
      if( $incineracionDesde == 0 ) $incineracionDesde = $incineracion;
      if( $incineracionDesde > $incineracion ) $incineracionDesde = $incineracion;
    }
    $precioIncineracion = ( $incineracionDesde == 0 ) ? '' : number_format($incineracionDesde, 0, ',', '.') . '€' ;


    $URLlink = get_post_meta( $post_id, 'wpfunos_funerariaDirectorioURLLandings', true );
    if( strlen($URLlink ) > 9){
      $link = '<a href="' .esc_url( $URLlink ). '">aquí</a>';
    }else{
      $landings = explode(',',get_post_meta(  $post_id , 'wpfunos_funerariaDirectorioLandings', true ));
      $link = '<a href="' .esc_url( get_permalink( $landings[0]) ). '">aquí</a>';
    }
    echo 'Consiga el precio de <strong>incineración desde</strong> <span style="color: #ff0000;"><strong>'.$precioIncineracion.'</strong></span> en este u otros tanatorios y funerarias de la zona <strong>'.$link.'</strong>.';
  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-entierro-desde', array( $this, 'wpfunosDirectorioTanatorioEntierroDesdeShortcode' ));
  */
  public function wpfunosDirectorioTanatorioEntierroDesdeShortcode(){
    $post_id = get_the_ID();

    $paginas = ( explode( ',',  get_post_meta(  $post_id , 'wpfunos_entradaDirectorioLandings', true ) ) );
    $entierroDesde = 0;
    foreach( $paginas as $pagina ){
      $entierro = (int)str_replace(".","",get_post_meta( $pagina, 'wpfunos_precioFunerariaEntierroDesde', true ));
      if( $entierroDesde == 0 ) $entierroDesde = $entierro;
      if( $entierroDesde > $entierro ) $entierroDesde = $entierro;
    }
    $precioEntierro = ( $entierroDesde == 0 ) ? '' : number_format($entierroDesde, 0, ',', '.') . '€' ;


    $URLlink = get_post_meta( $post_id, 'wpfunos_entradaDirectorioURLLandings', true );
    $URLbuscador = get_post_meta( $post_id, 'wpfunos_entradaDirectorioURLBuscador', true );
    if( strlen($URLlink ) > 9){
      $link = '<a href="' .esc_url( $URLlink ). '">aquí</a>';
    }else{
      $link = '<a href="' .esc_url( $URLbuscador ). '">aquí</a>';
    }
    echo 'Consiga el precio de <strong>entierro desde</strong> <span style="color: #ff0000;"><strong>'.$precioEntierro.'</strong></span> en este u otros tanatorios y funerarias de la zona <strong>'.$link.'</strong>.';
  }
  /**
  * add_shortcode( 'wpfunos-directorio-funeraria-entierro-desde', array( $this, 'wpfunosDirectorioFunerariaEntierroDesdeShortcode' ));
  */
  public function wpfunosDirectorioFunerariaEntierroDesdeShortcode(){
    $post_id = get_the_ID();


    $paginas = ( explode( ',',  get_post_meta(  $post_id , 'wpfunos_funerariaDirectorioLandings', true ) ) );
    $entierroDesde = 0;
    foreach( $paginas as $pagina ){
      $entierro = (int)str_replace(".","",get_post_meta( $pagina, 'wpfunos_precioFunerariaEntierroDesde', true ));
      if( $entierroDesde == 0 ) $entierroDesde = $entierro;
      if( $entierroDesde > $entierro ) $entierroDesde = $entierro;
    }
    $precioEntierro = ( $entierroDesde == 0 ) ? '' : number_format($entierroDesde, 0, ',', '.') . '€' ;


    $URLlink = get_post_meta( $post_id, 'wpfunos_funerariaDirectorioURLLandings', true );
    if( strlen($URLlink ) > 9){
      $link = '<a href="' .esc_url( $URLlink ). '">aquí</a>';
    }else{
      $landings = explode(',',get_post_meta(  $post_id , 'wpfunos_funerariaDirectorioLandings', true ));
      $link = '<a href="' .esc_url( get_permalink( $landings[0]) ). '">aquí</a>';
    }
    echo 'Consiga el precio de <strong>entierro desde</strong> <span style="color: #ff0000;"><strong>'.$precioEntierro.'</strong></span> en este u otros tanatorios y funerarias de la zona <strong>'.$link.'</strong>.';
  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-categoria', array( $this, 'wpfunosDirectorioTanatorioCategoriaShortcode' ));
  */
  public function wpfunosDirectorioTanatorioCategoriaShortcode(){
    $post_id = get_the_ID();
    $term_list = wp_get_post_terms( $post_id, 'directorio_poblacion', array( 'fields' => 'all' ) );
    $provincia = strtolower( get_the_category_by_ID( $term_list[0]->parent ));
    $poblacion = strtolower( get_the_category_by_ID( $term_list[0]->term_taxonomy_id ));

    $link_poblacion = '<a href="'.home_url().'/tanatorios/'.$provincia.'/' .$poblacion. '">'.ucfirst( $poblacion ).'</a>';
    $link_provincia = '<a href="'.home_url().'/tanatorios/'.$provincia. '">'.ucfirst( $provincia ).'</a>';

    echo 'Ver todos los tanatorios de la población de '.$link_poblacion.' o de la provincia de '.$link_provincia.'.';
  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-servicios', array( $this, 'wpfunosDirectorioTanatorioServiciosShortcode' ));
  */
  public function wpfunosDirectorioTanatorioServiciosShortcode(){
    $post_id = get_the_ID();
    $servicios = explode(',',get_post_meta(  $post_id , 'wpfunos_entradaDirectorioServicios', true ));
    if ( $servicios[0] ){
      echo '<ul>';
      foreach( $servicios as $servicio ){
        echo '<li id='.$servicio.'>'.get_post_meta( $servicio , 'wpfunos_servicioDirectorioNombre', true ).'</li>';
      }
      echo '</ul>';
    }
  }

  /**
  * add_shortcode( 'wpfunos-directorio-funeraria-servicios', array( $this, 'wpfunosDirectorioFunerariaServiciosShortcode' ));
  */
  public function wpfunosDirectorioFunerariaServiciosShortcode(){
    $post_id = get_the_ID();
    $servicios = explode(',',get_post_meta(  $post_id , 'wpfunos_funerariaDirectorioServicios', true ));
    if ( $servicios[0] ){
      echo '<ul>';
      foreach( $servicios as $servicio ){
        echo '<li id='.$servicio.'>'.get_post_meta( $servicio , 'wpfunos_servicioDirectorioNombre', true ).'</li>';
      }
      echo '</ul>';
    }
  }

  /**
  * add_shortcode( 'wpfunos-directorio-funeraria-lista', array( $this, 'wpfunosDirectorioFunerariaListaShortcode' ));
  */
  public function wpfunosDirectorioFunerariaListaShortcode(){
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
        array( 'key' => 'wpfunos_entradaDirectorioFuneraria', 'value' => $post_id, 'compare' => 'LIKE', ),
      ),
    );
    $post_list = get_posts( $args );
    if( $post_list ){
      echo '<ul id="ul-list">';
      foreach ($post_list as $post ) {
        //$link = the_permalink($post);
        echo '<li><a href="' .get_permalink($post->ID). '">' .get_the_title($post->ID). '</a></li>';
      }
      echo '</ul>';
    }
  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-cercanos', array( $this, 'wpfunosDirectorioFunerariaCercanosShortcode' ));
  */
  public function wpfunosDirectorioFunerariaCercanosShortcode(){
    /**
    *#ul-list {
    * columns: 3;
    * -webkit-columns: 3;
    * -moz-columns: 3;
    *}
    */
    $post_id = get_the_ID();
    $servicios = explode(',',get_post_meta(  $post_id , 'wpfunos_entradaDirectorioTanatoriosCercanos', true ));
    if ( $servicios[0] ){
      echo '<ul id="ul-list">';
      foreach( $servicios as $servicio ){
        //echo '<li id='.$servicio.'>'.get_post_meta( $servicio , 'wpfunos_servicioDirectorioNombre', true ).'</li>';
        echo '<li><a href="' .get_permalink($servicio). '">' .get_the_title($servicio). '</a></li>';
      }
      echo '</ul>';
    }
  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-titulo', array( $this, 'wpfunosDirectorioTanatorioTituloShortcode' ));
  */
  public function wpfunosDirectorioTanatorioTituloShortcode(){
    $post_id = get_the_ID();
    //$nombre = get_post_meta( $post_id, 'wpfunos_entradaDirectorioNombre', true );
    echo get_the_title();
  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-link-buscador', array( $this, 'wpfunosDirectorioTanatorioLinkBuscadorShortcode' ));
  */
  public function wpfunosDirectorioTanatorioLinkBuscadorShortcode(){
    $post_id = get_the_ID();
    $link = esc_url( get_post_meta( $post_id, 'wpfunos_funerariaDirectorioURLLandings', true ) );
    echo $link;
  }

}
