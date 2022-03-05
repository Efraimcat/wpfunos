<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage Wpfunos/public
 * @author     Efraim Bayarri <efraim@efraim.cat>
 */
/**
 * Acciones:
 * 0 - Usuario visuliza resultados servicios
 * 1 - Usuario puls botón "que me llamen" en resultados servicios
 * 2 - Usuario puls botón "llamar" en resultados servicios
 * 3 - Usuario visuliza resultados aseguradoras
 * 4 - cold lead aseguradoras
 */
class Wpfunos_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_shortcode( 'wpfunos-resultados', array( $this, 'wpfunosResultadosShortcode' ));
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-public.js', array( 'jquery' ), $this->version, false );
	}

	/*********************************/
	/*****  SHORTCODES          ******/
	/*********************************/
	
	/**
	 * Shortcode [wpfunos-resultados]
	 */
	public function wpfunosResultadosShortcode( $atts, $content = "" ) {
		$a = shortcode_atts( array(
		    'boton'=>'',
	    ), $atts );
		$IDusuario = $this->wpfunosGetUserid($_GET['referencia']);
		$seleccion = get_post_meta( $IDusuario, $this->plugin_name . '_userSeleccion', true );
		$CP = get_post_meta( $IDusuario, $this->plugin_name . '_userCP', true );
		$respuesta = (explode(',',$seleccion));
		switch ( $a['boton'] ) {
			case '1':	//cuando
				switch($respuesta[2]){
					case '1': esc_html_e( 'Ahora mismo' ); break;
					case '2'; esc_html_e( 'Proximamente' ); break;
					case '3'; esc_html_e( 'En el futuro' ); break;
				}
				break;
			case '2':	//población
				esc_html_e( strtr($respuesta[0],"+",",") ); break;
			case '3':	//Destino
				switch($respuesta[3]){
					case '1': esc_html_e( 'Entierro' ); break;
					case '2'; esc_html_e( 'Incineración' ); break;
					case '3'; esc_html_e( 'Traslado' ); break;
				}
				break;
			case '4':	//Ataúd
				switch($respuesta[4]){
					case '1': esc_html_e( 'Económico' ); break;
					case '2'; esc_html_e( 'Gama media' ); break;
					case '3'; esc_html_e( 'Premium' ); break;
				}
				break;
			case '5':	//Velatorio
				switch($respuesta[5]){
					case '1': esc_html_e( 'Si' ); break;
					case '2'; esc_html_e( 'No' ); break;
				}
				break;
			case '6':	//Despedida
				switch($respuesta[6]){
					case '1': esc_html_e( 'No' ); break;
					case '2'; esc_html_e( 'Solo sala' ); break;
					case '3'; esc_html_e( 'Ceremonia civil' ); break;
					case '4'; esc_html_e( 'Ceremonia Religiosa' ); break;
				}
				break;
// ASEGURADORAS
			case '7': switch($respuesta[2]){ case '1': esc_html_e( 'Hombre' ); break; case '2'; esc_html_e( 'Mujer' ); break; } break; //Sexo
			case '8': esc_html_e( $respuesta[3] );break; //Año de nacimiento
		}
	}

	/*********************************/
	/*****  HOOKS               ******/
	/*********************************/

	/*********************************/
	/*****                      ******/
	/*********************************/
	/**
	 * ID usuario página resultados
	 *
	 */
	public function wpfunosGetUserid( $referencia ){
		$ID = 0;
		$args = array(
			'post_type' => 'usuarios_wpfunos',
			'meta_key' =>  'wpfunos_userReferencia',
			'meta_value' => $referencia,
		);
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ) :
			while ( $my_query->have_posts() ) : $my_query->the_post();
				$ID = get_the_ID();
			endwhile;
		endif;
		wp_reset_postdata();
		return $ID;
	}
}
