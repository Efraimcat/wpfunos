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
class Wpfunos_Colaboradores {

  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;

    add_shortcode( 'wpfunos-servicios-colaborador-usuarios', array( $this, 'wpfunosServiciosColaboradorUsuariosShortcode' ));
    add_shortcode( 'wpfunos-servicios-colaborador-servicios', array( $this, 'wpfunosServiciosColaboradorServiciosShortcode' ));
  }

  /*********************************/
  /*****  SHORTCODES          ******/
  /*********************************/

  /**
  * Shortcode [wpfunos-servicios-colaborador-usuarios]
  */
  public function wpfunosServiciosColaboradorUsuariosShortcode( $atts, $content = "" ) {

    ?>
    <form id="wpfunos-servicios-colaborador-usuario">
      <input type="submit" value="Selecionar usuario" style="background-color: #1d40d3; font-size: 14px;">
      <table>
        <?php
        $args = array(
          'post_status' => 'publish',
          'post_type' => 'usuarios_wpfunos',
          'posts_per_page' => -1,
          'meta_key' =>  'wpfunos_userAccion',
          'meta_value' => '0',
        );
        $post_list = get_posts( $args );

        if( $post_list ){
          foreach ( $post_list as $post ) :
            ?>
            <tr>
              <td>
                <input id="wpfunos-select-<?php ?>" type="checkbox" name="<?php ?>" value="<?php ?>">
              </td>
              <td>
                <?php echo get_post_meta( $post->ID, $this->plugin_name . '_TimeStamp', true ); ?>
              </td>
              <td>
                <?php echo get_post_meta( $post->ID, $this->plugin_name . '_userSurname', true ); ?>
              </td>
              <td>
                <?php echo get_post_meta( $post->ID, $this->plugin_name . '_userMai', true ); ?>
              </td>
              <td>
                <?php echo get_post_meta( $post->ID, $this->plugin_name . '_userPhone', true ); ?>
              </td>
            </tr>
            <?php
          endforeach;
          wp_reset_postdata();
        }
        ?>
      </table>
    </form>
    <?php
  }

  /**
  * Shortcode [wpfunos-servicios-colaborador-servicios]
  */
  public function wpfunosServiciosColaboradorServiciosShortcode( $atts, $content = "" ) {

  }




}
