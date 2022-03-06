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
 * 1 - Usuario pulsa botón "que me llamen" en resultados servicios
 * 2 - Usuario pulsa botón "llamar" en resultados servicios
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
		add_action( 'elementor_pro/forms/new_record', array( $this, 'wpfunosFormNewrecord' ), 10, 2 );
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
		$IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
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

	/**
	* Hook Elementor Form New Record
	*
	*add_action( 'elementor_pro/forms/new_record', array( $this, 'wpfunosFormNewrecord' ), 10, 2 );
	*/
	public function wpfunosFormNewrecord($record, $handler){
		global $wp;
		$form_name = $record->get_form_settings( 'form_name' );
		if ( 'FormularioDatos' !== $form_name  && 'FormularioDatosFuturo' !== $form_name ) {
			return;
		}
		$raw_fields = $record->get( 'fields' );
		$fields = [];
		foreach ( $raw_fields as $id => $field ) {
			$fields[ $id ] = $field['value'];
		}
		// do_action('wpfunos_log', 'Fields: ' . $fields );
		$IDusuario = apply_filters('wpfunos_userID', $fields['referencia'] );
		if( $IDusuario != 0 ) {mt_srand(mktime()); $fields['referencia'] = 'funos-'.(string)mt_rand(); }
		$tel = str_replace(" ","", $fields['Telefono'] );
		$tel = str_replace("-","",$tel);
		$fields['Telefono'] =  substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
		$userIP = apply_filters('wpfunos_userIP','dummy');
		if( $form_name == 'FormularioDatos' ){
			$my_post = array(
    			'post_title' => $fields['referencia'],
				'post_type' => 'usuarios_wpfunos',
				'post_status'  => 'publish',
				'meta_input'   => array(
					$this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
					$this->plugin_name . '_userMail' => sanitize_text_field( $fields['Email'] ),
					$this->plugin_name . '_userReferencia' => sanitize_text_field( $fields['referencia'] ),
					$this->plugin_name . '_userName' => sanitize_text_field( $fields['Nombre'] ),
					$this->plugin_name . '_userSurname' => sanitize_text_field( $fields['Apellidos'] ),
					$this->plugin_name . '_userPhone' => sanitize_text_field( $fields['Telefono'] ),
					$this->plugin_name . '_userSeguro' => sanitize_text_field( $fields['Seguro'] ),
					$this->plugin_name . '_userCP' => sanitize_text_field( $fields['CP'] ),
					$this->plugin_name . '_userAccion' => '0',
					$this->plugin_name . '_userSeleccion' => sanitize_text_field( str_replace(",","+",$fields['address']).', '.$fields['distance'].', 1, '. $fields['Destino'].', '.$fields['Ataud'].', '.$fields['Velatorio'].', '.$fields['Despedida']),
					$this->plugin_name . '_userIP' => sanitize_text_field( $userIP ),
				),
			);
		}elseif( $form_name == 'FormularioDatosFuturo' ){
			$my_post = array(
    			'post_title' => $fields['referencia'],
				'post_type' => 'usuarios_wpfunos',
				'post_status'  => 'publish',
				'meta_input'   => array(
					$this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
					$this->plugin_name . '_userMail' => sanitize_text_field( $fields['Email'] ),
					$this->plugin_name . '_userReferencia' => sanitize_text_field( $fields['referencia'] ),
					$this->plugin_name . '_userName' => sanitize_text_field( $fields['Nombre'] ),
					$this->plugin_name . '_userSurname' => sanitize_text_field( $fields['Apellidos'] ),
					$this->plugin_name . '_userPhone' => sanitize_text_field( $fields['Telefono'] ),
					$this->plugin_name . '_userSeguro' => sanitize_text_field( $fields['Seguro'] ),
					$this->plugin_name . '_userCP' => sanitize_text_field( $fields['CP'] ),
					$this->plugin_name . '_userAccion' => '3',
					$this->plugin_name . '_userSeleccion' => sanitize_text_field( str_replace(",","+",$fields['address']).', '.$fields['distance'].', ' . $fields['sexo']. ', '. (int)$fields['nacimiento']  ),
					$this->plugin_name . '_userIP' => sanitize_text_field( $userIP ),
				),
			);
		}
		if( strlen( $fields['Telefono']) > 3 ){ 
			$post_id = wp_insert_post($my_post);
			do_action('wpfunos_log', '==============' );
			do_action('wpfunos_log', 'Nuevo Usuario: ' .  $userIP  );
			do_action('wpfunos_log', 'ID: ' .  $post_id  );
			do_action('wpfunos_log', 'referencia: ' . $fields['referencia'] );
			do_action('wpfunos_log', 'Telefono: ' . $fields['Telefono'] );
		}else{
			do_action('wpfunos_log', '==============' );
			do_action('wpfunos_log', 'Error 1 Nuevo Usuario: ' .  $userIP  );
			do_action('wpfunos_log', 'referencia: ' .  $fields['referencia'] );
		}
		if(is_wp_error($post_id)){
			echo $post_id->get_error_message();
			exit;
		}
	}
	
	/*********************************/
	/*****                      ******/
	/*********************************/
}
