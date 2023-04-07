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
    add_shortcode( 'wpfunos-directorio-tanatorio-incineracion-desde', array( $this, 'wpfunosDirectorioTanatorioIncineracionDesdeShortcode' ));
    add_shortcode( 'wpfunos-directorio-tanatorio-entierro-desde', array( $this, 'wpfunosDirectorioTanatorioEntierroDesdeShortcode' ));
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

}
