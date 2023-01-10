<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Directorio.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/directorio
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
class Wpfunos_Directorio {

  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
    add_shortcode( 'wpfunos-contenido-tanatorio-directorio', array( $this, 'wpfunosContenidoTanatorioDirectorioShortcode' ));
    add_shortcode( 'wpfunos-actulizar-mapas-directorio', array( $this, 'wpfunosActualizarMapasDirectorioShortcode' ));
  }

  /*********************************/
  /*****  SHORTCODES          ******/
  /*********************************/

  /**
  * Shortcode [wpfunos-contenido-tanatorio-directorio]
  */
  public function wpfunosContenidoTanatorioDirectorioShortcode( $atts, $content = "" ) {

  }

  /**
  * Shortcode [wpfunos-actulizar-mapas-directorio]
  */
  public function wpfunosActualizarMapasDirectorioShortcode( $atts, $content = "" ) {
    if ( get_post_type( get_the_ID() ) != 'tanatorio_d_wpfunos' ) return;
    //$this->gmw_update_post_type_post_location( get_the_ID() );
  }


  /*********************************/
  /*****                      ******/
  /*********************************/

  public function gmw_update_post_type_post_location(  $post_id ) {
    // Return if it's a post revision.
    if ( false !== wp_is_post_revision( $post_id ) ) {
      return;
    }
    // check autosave.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
    }
    // check if user can edit post.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
      return;
    }
    // get the address from the custom field "address".
    //
    // _tanatorioDirectorioDireccion
    $address = get_post_meta( $post_id, 'wpfunos_tanatorioDirectorioDireccion', true );
    if( strlen( $address) < 5 )$address = get_post_meta( $post_id, 'wpfunos_tanatorioDirectorioPoblacion', true );
    // varify that address exists.
    if ( empty( $address ) ) {
      return;
    }
    // verify the updater function.
    if ( ! function_exists( 'gmw_update_post_location' ) ) {
      return;
    }
    //run the udpate location function
    //gmw_update_post_location( $post_id, $address );
  }
}
