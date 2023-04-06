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
    add_shortcode( 'wpfunos-directorio-tanatorio-descripcion', array( $this, 'wpfunosDirectorioTanatorioDescripcionShortcode' ));
    add_shortcode( 'wpfunos-directorio-tanatorio-horario', array( $this, 'wpfunosDirectorioTanatorioHorarioShortcode' ));
    add_shortcode( 'wpfunos-directorio-tanatorio-servicios', array( $this, 'wpfunosDirectorioTanatorioServiciosShortcode' ));
    add_shortcode( 'wpfunos-directorio-tanatorio-comollegar', array( $this, 'wpfunosDirectorioTanatorioComoLlegarShortcode' ));

  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-descripcion', array( $this, 'wpfunosDirectorioTanatorioDescripcionShortcode' ));
  */
  public function wpfunosDirectorioTanatorioDescripcionShortcode(){
    $post_id = get_the_ID();
    echo get_post_meta( $post_id, 'wpfunos_entradaDirectorioDescripcion', true );
  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-horario', array( $this, 'wpfunosDirectorioTanatorioHorarioShortcode' ));
  */
  public function wpfunosDirectorioTanatorioHorarioShortcode(){
    $post_id = get_the_ID();
    echo get_post_meta( $post_id, 'wpfunos_entradaDirectorioHorario', true );
  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-servicios', array( $this, 'wpfunosDirectorioTanatorioServiciosShortcode' ));
  */
  public function wpfunosDirectorioTanatorioServiciosShortcode(){
    $post_id = get_the_ID();
    echo get_post_meta( $post_id, 'wpfunos_entradaDirectorioDescripcionServicios', true );
  }

  /**
  * add_shortcode( 'wpfunos-directorio-tanatorio-comollegar', array( $this, 'wpfunosDirectorioTanatorioComoLlegarShortcode' ));
  */
  public function wpfunosDirectorioTanatorioComoLlegarShortcode(){
    $post_id = get_the_ID();
    echo get_post_meta( $post_id, 'wpfunos_entradaDirectorioComoLlegar', true );
  }

}
