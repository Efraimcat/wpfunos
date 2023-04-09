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
    add_shortcode( 'wpfunos-directorio-tanatorio-servicios', array( $this, 'wpfunosDirectorioTanatorioServiciosShortcode' ));
    add_shortcode( 'wpfunos-directorio-funeraria-servicios', array( $this, 'wpfunosDirectorioFunerariaServiciosShortcode' ));

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
    $desde = get_post_meta( $post_id, 'wpfunos_entradaDirectorioIncineracionDesde', true );
    $URLlink = get_post_meta( $post_id, 'wpfunos_entradaDirectorioURLLandings', true );
    if( strlen($URLlink ) > 9){
      $link = '<a href="' .esc_url( $URLlink ). '">aquí</a>';
    }else{
      $landings = explode(',',get_post_meta(  $post_id , 'wpfunos_entradaDirectorioLandings', true ));
      $link = '<a href="' .esc_url( get_permalink( $landings[0]) ). '">aquí</a>';
    }
    echo 'Consiga el precio de <strong>incineración desde</strong> <span style="color: #ff0000;"><strong>'.$desde.'</strong></span> en este u otros tanatorios y funerarias de la zona <strong>'.$link.'</strong>.';
  }
  /**
  * add_shortcode( 'wpfunos-directorio-funeraria-incineracion-desde', array( $this, 'wpfunosDirectorioFunerariaIncineracionDesdeShortcode' ));
  */
  public function wpfunosDirectorioFunerariaIncineracionDesdeShortcode(){
    $post_id = get_the_ID();
    $desde = get_post_meta( $post_id, 'wpfunos_funerariaDirectorioIncineracionDesde', true );
    $URLlink = get_post_meta( $post_id, 'wpfunos_funerariaDirectorioURLLandings', true );
    if( strlen($URLlink ) > 9){
      $link = '<a href="' .esc_url( $URLlink ). '">aquí</a>';
    }else{
      $landings = explode(',',get_post_meta(  $post_id , 'wpfunos_funerariaDirectorioLandings', true ));
      $link = '<a href="' .esc_url( get_permalink( $landings[0]) ). '">aquí</a>';
    }
    echo 'Consiga el precio de <strong>incineración desde</strong> <span style="color: #ff0000;"><strong>'.$desde.'</strong></span> en este u otros tanatorios y funerarias de la zona <strong>'.$link.'</strong>.';
  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-entierro-desde', array( $this, 'wpfunosDirectorioTanatorioEntierroDesdeShortcode' ));
  */
  public function wpfunosDirectorioTanatorioEntierroDesdeShortcode(){
    $post_id = get_the_ID();
    $desde = get_post_meta( $post_id, 'wpfunos_entradaDirectorioEntierroDesde', true );
    $URLlink = get_post_meta( $post_id, 'wpfunos_entradaDirectorioURLLandings', true );
    if( strlen($URLlink ) > 9){
      $link = '<a href="' .esc_url( $URLlink ). '">aquí</a>';
    }else{
      $landings = explode(',',get_post_meta(  $post_id , 'wpfunos_entradaDirectorioLandings', true ));
      $link = '<a href="' .esc_url( get_permalink( $landings[0]) ). '">aquí</a>';
    }
    echo 'Consiga el precio de <strong>entierro desde</strong> <span style="color: #ff0000;"><strong>'.$desde.'</strong></span> en este u otros tanatorios y funerarias de la zona <strong>'.$link.'</strong>.';
  }
  /**
  * add_shortcode( 'wpfunos-directorio-funeraria-entierro-desde', array( $this, 'wpfunosDirectorioFunerariaEntierroDesdeShortcode' ));
  */
  public function wpfunosDirectorioFunerariaEntierroDesdeShortcode(){
    $post_id = get_the_ID();
    $desde = get_post_meta( $post_id, 'wpfunos_funerariaDirectorioEntierroDesde', true );
    $URLlink = get_post_meta( $post_id, 'wpfunos_funerariaDirectorioURLLandings', true );
    if( strlen($URLlink ) > 9){
      $link = '<a href="' .esc_url( $URLlink ). '">aquí</a>';
    }else{
      $landings = explode(',',get_post_meta(  $post_id , 'wpfunos_funerariaDirectorioLandings', true ));
      $link = '<a href="' .esc_url( get_permalink( $landings[0]) ). '">aquí</a>';
    }
    echo 'Consiga el precio de <strong>entierro desde</strong> <span style="color: #ff0000;"><strong>'.$desde.'</strong></span> en este u otros tanatorios y funerarias de la zona <strong>'.$link.'</strong>.';
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

}
