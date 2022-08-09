<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Servicios.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/servicios/partials
* @author     Efraim Bayarri <efraim@efraim.cat>
*/

if( strlen( get_post_meta( $_GET['servicio'], 'wpfunos_servicioImagenSlider1', true ) ) < 1
&& strlen(  get_post_meta( $_GET['servicio'], 'wpfunos_servicioImagenSlider2', true ) ) < 1
&& strlen(  get_post_meta( $_GET['servicio'], 'wpfunos_servicioImagenSlider3', true ) ) < 1 ) return;

$img1 = wp_get_attachment_image (  get_post_meta( $_GET['servicio'], 'wpfunos_servicioImagenSlider1', true ) , array(130,130));
$img2 = wp_get_attachment_image (  get_post_meta( $_GET['servicio'], 'wpfunos_servicioImagenSlider2', true ) , array(130,130));
$img3 = wp_get_attachment_image (  get_post_meta( $_GET['servicio'], 'wpfunos_servicioImagenSlider3', true ) , array(130,130));

$url1 = wp_get_attachment_url ( get_post_meta( $_GET['servicio'], 'wpfunos_servicioImagenSlider1', true ) );
$url2 = wp_get_attachment_url ( get_post_meta( $_GET['servicio'], 'wpfunos_servicioImagenSlider2', true ) );
$url3 = wp_get_attachment_url ( get_post_meta( $_GET['servicio'], 'wpfunos_servicioImagenSlider3', true ) );

?>
<div class="elementor-container elementor-column-gap-default">
  <div class="elementor-row">
    <div class="elementor-column-wrap">
      <div class="elementor-widget-wrap">
        <div class="wpfunos-slider-resultados">
          <div class="wpfunos-slider-imagenes">

            <a href="<?php echo $url1; ?>" style="margin: 3px;"><?php if( strlen( get_post_meta( $_GET['servicio'], 'wpfunos_servicioImagenSlider1', true ) ) > 1 ) echo $img1 ?></a>
            <a href="<?php echo $url2; ?>" style="margin: 3px;"><?php if( strlen( get_post_meta( $_GET['servicio'], 'wpfunos_servicioImagenSlider2', true ) ) > 1 ) echo $img2 ?></a>
            <a href="<?php echo $url3; ?>" style="margin: 3px;"><?php if( strlen( get_post_meta( $_GET['servicio'], 'wpfunos_servicioImagenSlider3', true ) ) > 1 ) echo $img3 ?></a>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
