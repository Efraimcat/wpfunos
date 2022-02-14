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
		add_shortcode( 'wpfunos-compara-inicio', array( $this, 'wpfunosComparaInicioShortcode' ));
		add_shortcode( 'wpfunos-compara-futuro-inicio', array( $this, 'wpfunosComparaInicioFuturoShortcode' ));
		add_shortcode( 'wpfunos-compara-resultados', array( $this, 'wpfunosComparaResultadosShortcode' ));
		add_shortcode( 'wpfunos-compara-futuro-resultados', array( $this, 'wpfunosComparaResultadosFuturoShortcode' ));
		add_shortcode( 'wpfunos-resultados', array( $this, 'wpfunosResultadosShortcode' ));
		add_shortcode( 'wpfunos-resultados-empresa', array( $this, 'wpfunosResultadosEmpresaShortcode' ));
		add_shortcode( 'wpfunos-resultados-telefono-usuario', array( $this, 'wpfunosResultadosTelefonoUsuarioShortcode' ));
		add_shortcode( 'wpfunos-resultados-telefono-servicio', array( $this, 'wpfunosResultadosTelefonoServicioShortcode' ));
		add_shortcode( 'wpfunos-resultados-llamar-telefono-servicio', array( $this, 'wpfunosResultadosLamarTelefonoServicioShortcode' ));
		add_shortcode( 'wpfunos-resultados-acciones', array( $this, 'wpfunosResultadosAccionesShortcode' ));
		add_shortcode( 'wpfunos-resultados-estrellas', array( $this, 'wpfunosResultadosEstrellasShortcode' ));
		add_shortcode( 'wpfunos-acciones-botones-confirmado', array( $this, 'wpfunosAccionesBotonesConfirmadoShortcode' ));
		add_shortcode( 'wpfunos-resultados-detalles', array( $this, 'wpfunosResultadosDetallesShortcode' ));
		add_action( 'elementor_pro/forms/new_record', array( $this, 'wpfunosFormNewrecord' ), 10, 2 );
		add_action( 'elementor_pro/forms/validation', array( $this, 'wpfunosFormValidation' ), 10, 2 );
		add_action( 'wpfunos_new_log', array( $this, 'wpfunosNewLog' ), 10, 1 );
		add_action( 'wpfunos_result_grid_confirmado', array( $this, 'wpfunosResultGridConfirmado' ), 10, 1 );
		add_action( 'wpfunos_result_grid_sinconfirmar', array( $this, 'wpfunosResultGridSinConfirmar' ), 10, 1 );
		add_action( 'wpfunos_result_grid_sinprecio', array( $this, 'wpfunosResultGridSinPrecio' ), 10, 1 );
		add_filter( 'wpfunos_get_userid', array( $this, 'wpfunosGetUserid' ) );
		add_action( 'wpfunos_result_user_entry', array( $this, 'wpfunosResultUserEntry' ), 10, 1 );
		add_filter( 'wpfunos_get_results', array( $this, 'wpfunosGetResults' ),10, 2 );
		add_filter( 'wpfunos_results_confirmado', array( $this, 'wpfunosResultadosConfirmado' ), 10, 3 );
		add_filter( 'wpfunos_results_sinconfirmar', array( $this, 'wpfunosResultadosSinConfirmar' ), 10, 3 );
		add_filter( 'wpfunos_results_sinprecio', array( $this, 'wpfunosResultadosSinPrecio' ), 10, 3 );
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
		switch ( $a[boton] ) {
			case '1':	//cuando
				switch($respuesta[2]){
					case '1':
						esc_html_e( 'Ahora mismo' );
						break;
					case '2';
						esc_html_e( 'Proximamente' );
						break;
					case '3';
						esc_html_e( 'En el futuro' );
						break;
				}
				break;
			case '2':	//población
				esc_html_e( $respuesta[0] );
				break;
			case '3':	//Destino
				switch($respuesta[3]){
					case '1':
						esc_html_e( 'Entierro' );
						break;
					case '2';
						esc_html_e( 'Incineración' );
						break;
					case '3';
						esc_html_e( 'Traslado' );
						break;
				}
				break;
			case '4':	//Ataúd
				switch($respuesta[4]){
					case '1':
						esc_html_e( 'Económico' );
						break;
					case '2';
						esc_html_e( 'Gama media' );
						break;
					case '3';
						esc_html_e( 'Premium' );
						break;
				}
				break;
			case '5':	//Velatorio
				switch($respuesta[5]){
					case '1':
						esc_html_e( 'Si' );
						break;
					case '2';
						esc_html_e( 'No' );
						break;
				}
				break;
			case '6':	//Despedida
				switch($respuesta[6]){
					case '1':
						esc_html_e( 'No' );
						break;
					case '2';
						esc_html_e( 'Solo sala' );
						break;
					case '3';
						esc_html_e( 'Ceremonia civil' );
						break;
					case '4';
						esc_html_e( 'Ceremonia Religiosa' );
						break;
				}
				break;
// FUTURO
			case '7':	//Sexo
				switch($respuesta[2]){
					case '1':
						esc_html_e( 'Hombre' );
						break;
					case '2';
						esc_html_e( 'Mujer' );
						break;
				}
				break;
			case '8':	//Año de nacimiento
				esc_html_e( $respuesta[3] );
				break;
		}
	}

	/**
	 * Shortcode [wpfunos-resultados-empresa]
	 */
	 public function wpfunosResultadosEmpresaShortcode( $atts, $content = "" ) {
	 	$a = shortcode_atts( array(
			 'boton'=>'',
		), $atts );
	 	switch ( $a[boton] ) {
		 case 'logo':	//logo
			 echo $_GET['logo'] ;
			 break;
		 case 'confirmado':
			 echo $_GET['confirmado'] ;
			 break;
		case 'mapa':
			 $idempresa = $_GET['servicio'];
			 $shortcode = '[gmw_single_location object="post" object_id="' . $idempresa . '" elements="distance,map,address,directions_link" units="k" map_height="300px" map_width="100%"]';
			 echo do_shortcode($shortcode);
			 break;
	 	}
 	}

	/**
	 * Shortcode [wpfunos-resultados-telefono-usuario]
	 */
	 public function wpfunosResultadosTelefonoUsuarioShortcode( $atts, $content = "" ) {
	 	return $_GET['telefonoUsuario'];
	 }

	/**
	 * Shortcode [wpfunos-resultados-telefono-servicio]
	 */
	 public function wpfunosResultadosTelefonoServicioShortcode( $atts, $content = "" ) {
	 	return $_GET['telefonoEmpresa'];
	 }

	/**
	 * Shortcode [wpfunos-resultados-llamar-telefono-servicio]
	 */
	 public function wpfunosResultadosLamarTelefonoServicioShortcode( $atts, $content = "" ) {
		 return '<a href="tel:' . $_GET['telefono'] . '">Llamar</a>';
	 }

	/**
	* Shortcode [wpfunos-compara-inicio]
	*https://funos.es/compara-precios-resultados?address%5B%5D=[field id="address"]&post%5B%5D=[field id="post"]&distance=[field id="distance"]&units=[field id="units"]&page1=&per_page=50&lat=[field id="lat"]&lng=[field id="lng"]&form=1&action=fs&referencia=[field id="referencia"]&CP=[field id="CP"]
	*/
	public function wpfunosComparaInicioShortcode( $atts, $content = "" ) {
		$_GET['direccion'] = $_GET['address'][0];
		$_GET['tipo'] = $_GET['post'][0];
		mt_srand(mktime());
		$_GET['referencia'] = 'funos-'.(string)mt_rand();
		// CP = 'undefined'
		if( $_GET['CP'] == 'undefined' || $_GET['CP'] == '' ){
			$poblacion = ucwords( $_GET['direccion'] );
			$id=0;
			$args = array(
		  		'post_type' => 'cpostales_wpfunos',	//
		  		'meta_key' =>  $this->plugin_name . '_cpostalesPoblacion',
		  		'meta_value' => $poblacion,
			);
			$my_query = new WP_Query( $args );
			if ( $my_query->have_posts() ) :
		  		while ( $my_query->have_posts() ) : $my_query->the_post();
		    		$id = get_the_ID();
		  		endwhile;
			endif;
			wp_reset_postdata();
			$_GET['CP'] = get_post_meta( $id, 'wpfunos_cpostalesCodigo', true );
		}
		//
		require_once 'partials/' . $this->plugin_name . '-public-ComparaInicioShortcode-display.php';
	}

	/**
	* Shortcode [wpfunos-compara-futuro-inicio]
	*https://funos.es/compara-precios-resultados-futuro?address%5B%5D=[field id="address"]&post%5B%5D=[field id="post"]&distance=[field id="distance"]&units=[field id="units"]&page1=&per_page=50&lat=[field id="lat"]&lng=[field id="lng"]&form=1&action=fs&referencia=[field id="referencia"]&CP=[field id="CP"]
	*/
	public function wpfunosComparaInicioFuturoShortcode( $atts, $content = "" ) {
		$_GET['direccion'] = $_GET['address'][0];
		$_GET['tipo'] = $_GET['post'][0];
		mt_srand(mktime());
		$_GET['referencia'] = 'funos-'.(string)mt_rand();
		// CP = 'undefined'
		if( $_GET['CP'] == 'undefined' || $_GET['CP'] == '' ){
			$poblacion = ucwords( $_GET['direccion'] );
			$id=0;
			$args = array(
		  		'post_type' => 'cpostales_wpfunos',	//
		  		'meta_key' =>  $this->plugin_name . '_cpostalesPoblacion',
		  		'meta_value' => $poblacion,
			);
			$my_query = new WP_Query( $args );
			if ( $my_query->have_posts() ) :
		  		while ( $my_query->have_posts() ) : $my_query->the_post();
		    		$id = get_the_ID();
		  		endwhile;
			endif;
			wp_reset_postdata();
			$_GET['CP'] = get_post_meta( $id, 'wpfunos_cpostalesCodigo', true );
		}

		require_once 'partials/' . $this->plugin_name . '-public-ComparaInicioFuturoShortcode-display.php';
	}

	/**
	* Shortcode [wpfunos-compara-correo]
	*/
	public function wpfunosComparaResultadosShortcode( $atts, $content = "" ) {
		// if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('Resultados $_GET: ' . $this->dumpPOST($_GET));
		if (!isset($_GET['referencia'])) return;
		$IDusuario = $this->wpfunosGetUserid($_GET['referencia']);
		if($IDusuario == 0) return;
		require_once 'partials/' . $this->plugin_name . '-public-ComparaResultadosShortcode-display.php';
	}

	/**
	* Shortcode [wpfunos-compara-futuro-resultados]
	*/
	public function wpfunosComparaResultadosFuturoShortcode( $atts, $content = "" ) {
		// if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('Resultados $_GET: ' . $this->dumpPOST($_GET));
		if (!isset($_GET['referencia'])) return;
		$IDusuario = $this->wpfunosGetUserid($_GET['referencia']);
		if($IDusuario == 0) return;
		require_once 'partials/' . $this->plugin_name . '-public-ComparaResultadosFuturoShortcode-display.php';
	}

	/**
	* Shortcode [wpfunos-resultados-acciones]
	*/
	public function wpfunosResultadosAccionesShortcode( $atts, $content = "" ) {

	}

	/**
	* Shortcode [wpfunos-acciones-botones-confirmado]
	*/
	public function wpfunosAccionesBotonesConfirmadoShortcode( $atts, $content = "" ) {
		$this->wpfunosResultUserEntry();
		$this->wpfunosResultCorreoAdmin();
		$this->wpfunosResultCorreoLead();
	}

	/**
	* Shortcode [wpfunos-resultados-estrellas]
	*/
	public function wpfunosResultadosEstrellasShortcode( $atts, $content = "" ) {
		return (int)$_GET['valoracion'];
	}

	/**
	* Shortcode [wpfunos-resultados-detalles]
	*/
	public function wpfunosResultadosDetallesShortcode( $atts, $content = "" ) {
		if(
			$_GET['desgloseBaseDescuento'] == '0%' &&
			$_GET['desgloseDestinoDescuento'] == '%' &&
			$_GET['desgloseAtaudDescuento'] == '%' &&
			$_GET['desgloseVelatorioDescuento'] == '%' &&
			$_GET['desgloseCeremoniaDescuento'] == '%'){
				$_GET['desgloseBaseDescuento'] = ''; $_GET['desgloseBaseTotal'] = '';
				$_GET['desgloseDestinoDescuento'] = ''; $_GET['desgloseDestinoTotal'] = '';
				$_GET['desgloseAtaudDescuento'] = ''; $_GET['desgloseAtaudTotal'] = '';
				$_GET['desgloseVelatorioDescuento'] = ''; $_GET['desgloseVelatorioTotal'] = '';
				$_GET['desgloseCeremoniaDescuento'] = ''; $_GET['desgloseCeremoniaTotal'] = '';
				$_GET['desgloseDescuentoGenericoTotal'] = '';
		}
		if( $_GET['desgloseBaseDescuento'] == '0%' ) $_GET['desgloseBaseDescuento'] = '';
		if( $_GET['desgloseDestinoDescuento'] == '%' ) $_GET['desgloseDestinoDescuento'] = '';
		if( $_GET['desgloseAtaudDescuento'] == '%' ) $_GET['desgloseAtaudDescuento'] = '';
		if( $_GET['desgloseVelatorioDescuento'] == '%' ) $_GET['desgloseVelatorioDescuento'] = '';
		if( $_GET['desgloseCeremoniaDescuento'] == '%' ) $_GET['desgloseCeremoniaDescuento'] = '';
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
		// if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('Fields: ' . $this->dumpPOST($fields));
		if( $this->wpfunosGetUserid( $fields['referencia'] ) != 0 ) {mt_srand(mktime()); $fields['referencia'] = 'funos-'.(string)mt_rand(); }
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
				),
			);
		}
		//
		// ToDo: Comprobar si "cuando" es futuro y cambiar destino de la página de datos a la página de datos de futuro. Hacer que la redirección sea dinámica y apunte acorde con los datos.
		//
		if( strlen( $fields['Telefono']) > 3 ){
			$post_id = wp_insert_post($my_post);
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('==============');
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('Nuevo Usuario: ' . $this->dumpPOST( $this->getUserIP() ));
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('ID: ' . $this->dumpPOST( $post_id ));
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('referencia: ' . $this->dumpPOST( $fields['referencia'] ));
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('Telefono: ' . $this->dumpPOST( $fields['Telefono'] ));
		}else{
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('==============');
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('Error 1 Nuevo Usuario: ' . $this->dumpPOST( $this->getUserIP() ));
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('referencia: ' . $this->dumpPOST( $fields['referencia'] ));
		}
		if(is_wp_error($post_id)){
			echo $post_id->get_error_message();
			exit;
		}
	}

	/**
   	 * Hook Elementor Form Validate entry
   	 *
   	 * add_action( 'elementor_pro/forms/validation', array( $this, 'wpfunosFormValidation' ), 10, 2 );
   	 *
   	 * #13-Feb-2022 13:26:43: $field:
   	 * [id] = String: 'nacimiento'
   	 * [type] = String: 'text'
   	 * [title] = String: 'Año de nacimiento'
   	 * [value] = Number: 1957
   	 * [raw_value] = Number: 1957
   	 * [required] = TRUE
   	 *
   	 * https://dev.to/renzoster/validate-form-fields-in-elementor-54cl
   	 */
   	public function wpfunosFormValidation($record, $ajax_handler){
		if( $field = $this->wpfunos_elementor_get_field( 'nacimiento', $record ) ){
			if( (int)$field['value'] < 1920 || (int)$field['value'] > 2010){
				$ajax_handler->add_error( $field['id'], 'Año de nacimiento inválido. Introduce tu año de nacimiento p.ej: 1990' );
       		}
     	}
		if( $field = $this->wpfunos_elementor_get_field( 'Telefono', $record ) ){
			if ( 1 !== preg_match( '/^[9|8|6|7][0-9]{8}$/', $field['value'] ) ) {
				$ajax_handler->add_error( $field['id'], 'Introduce un número de teléfono válido' );
			}
		}
   	}

	/**
     * This function allows to obtain a field by ID, if it does not exist it returns FALSE.
     */
	public function wpfunos_elementor_get_field( $id, $record ){
		$fields = $record->get_field( [ 'id' => $id, ] );
		if ( empty( $fields ) ) {
			return false;
      	}
      	return current( $fields );
  	}

	/**
	* Entrada acción usuario
	*
	* add_action( 'wpfunos_result_user_entry', array( $this, 'wpfunosResultUserEntry' ), 10, 1 );
	*/
	public function wpfunosResultUserEntry(){
		// if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('Fields: ' . $this->dumpPOST($_POST));
		mt_srand(mktime());
		$referencia = 'funos-'.(string)mt_rand();
		$my_post = array(
   			'post_title' => $referencia,
			'post_type' => 'usuarios_wpfunos',
			'post_status'  => 'publish',
			'meta_input'   => array(
				$this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
				$this->plugin_name . '_userReferencia' => sanitize_text_field( $referencia ),
				$this->plugin_name . '_userName' => sanitize_text_field( $_GET['nombreUsuario'] ),
				$this->plugin_name . '_userPhone' => sanitize_text_field( $_GET['telefonoUsuario'] ),
				$this->plugin_name . '_userSeleccion' => sanitize_text_field( $_GET['seleccion']),
				$this->plugin_name . '_userAccion' => sanitize_text_field( $_GET['accion']),
				$this->plugin_name . '_userPrecio' => sanitize_text_field( $_GET['precio']),
				$this->plugin_name . '_userServicio' => sanitize_text_field( $_GET['servicio']),
				$this->plugin_name . '_userCP' => sanitize_text_field( $_GET['CPUsuario']),
				$this->plugin_name . '_userMail' => sanitize_text_field( $_GET['Email']),

				$this->plugin_name . '_userDesgloseBaseNombre' => sanitize_text_field( $_GET['desgloseBaseNombre']),
				$this->plugin_name . '_userDesgloseBasePrecio' => sanitize_text_field( $_GET['desgloseBasePrecio']),
				$this->plugin_name . '_userDesgloseBaseDescuento' => sanitize_text_field( $_GET['desgloseBaseDescuento']),
				$this->plugin_name . '_userDesgloseBaseTotal' => sanitize_text_field( $_GET['desgloseBaseTotal']),

				$this->plugin_name . '_userDesgloseDestinoNombre' => sanitize_text_field( $_GET['desgloseDestinoNombre']),
				$this->plugin_name . '_userDesgloseDestinoPrecio' => sanitize_text_field( $_GET['desgloseDestinoPrecio']),
				$this->plugin_name . '_userDesgloseDestinoDescuento' => sanitize_text_field( $_GET['desgloseDestinoDescuento']),
				$this->plugin_name . '_userDesgloseDestinoTotal' => sanitize_text_field( $_GET['desgloseDestinoTotal']),

				$this->plugin_name . '_userDesgloseAtaudNombre' => sanitize_text_field( $_GET['desgloseAtaudNombre']),
				$this->plugin_name . '_userDesgloseAtaudPrecio' => sanitize_text_field( $_GET['desgloseAtaudPrecio']),
				$this->plugin_name . '_userDesgloseAtaudDescuento' => sanitize_text_field( $_GET['desgloseAtaudDescuento']),
				$this->plugin_name . '_userDesgloseAtaudTotal' => sanitize_text_field( $_GET['desgloseAtaudTotal']),

				$this->plugin_name . '_userDesgloseVelatorioNombre' => sanitize_text_field( $_GET['desgloseVelatorioNombre']),
				$this->plugin_name . '_userDesgloseVelatorioPrecio' => sanitize_text_field( $_GET['desgloseVelatorioPrecio']),
				$this->plugin_name . '_userDesgloseVelatorioDescuento' => sanitize_text_field( $_GET['desgloseVelatorioDescuento']),
				$this->plugin_name . '_userDesgloseVelatorioTotal' => sanitize_text_field( $_GET['desgloseVelatorioTotal']),

				$this->plugin_name . '_userDesgloseCeremoniaNombre' => sanitize_text_field( $_GET['desgloseCeremoniaNombre']),
				$this->plugin_name . '_userDesgloseCeremoniaPrecio' => sanitize_text_field( $_GET['desgloseCeremoniaPrecio']),
				$this->plugin_name . '_userDesgloseCeremoniaDescuento' => sanitize_text_field( $_GET['desgloseCeremoniaDescuento']),
				$this->plugin_name . '_userDesgloseCeremoniaTotal' => sanitize_text_field( $_GET['desgloseCeremoniaTotal']),

				$this->plugin_name . '_userDesgloseDescuentoGenerico' => sanitize_text_field( $_GET['desgloseDescuentoGenerico']),
				$this->plugin_name . '_userDesgloseDescuentoGenericoPrecio' => sanitize_text_field( $_GET['desgloseDescuentoGenericoPrecio']),
				$this->plugin_name . '_userDesgloseDescuentoGenericoDescuento' => sanitize_text_field( $_GET['desgloseDescuentoGenericoDescuento']),
				$this->plugin_name . '_userDesgloseDescuentoGenericoTotal' => sanitize_text_field( $_GET['ddesgloseDescuentoGenericoTotal']),
			),
		);
		//$IDusuario = $this->wpfunosGetUserid($referencia);
		//if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('$IDusuario: ' . $this->dumpPOST($IDusuario));
		if( strlen( $_GET['telefonoUsuario'] ) > 3 ) {
			$post_id = wp_insert_post($my_post);
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('==============');
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('Nuevo usuario: ' . $this->dumpPOST( $this->getUserIP() ));
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('ID: ' . $this->dumpPOST( $post_id ));
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('referencia: ' . $this->dumpPOST( $referencia ));
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('telefonoUsuario: ' . $this->dumpPOST( $_GET['telefonoUsuario'] ));
		}else{
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('==============');
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('Error 2 Nuevo Usuario: ' . $this->dumpPOST( $this->getUserIP() ));
			if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('referencia: ' . $this->dumpPOST( $referencia ));
		}
	}

	/**
	* Entrada acción usuario Correo Admin
	*
	* add_action( 'wpfunos_result_user_entry', array( $this, 'wpfunosResultUserEntry' ), 10, 1 );
	*/
	public function wpfunosResultCorreoAdmin( ){
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		if($_GET['accion'] == 1 && get_option($this->plugin_name . '_activarCorreoBoton1Admin')){
			require 'partials/mensajes/' . $this->plugin_name . '-ResultadosAcciones-MailBoton1Admin.php';
			if(!empty( get_option('wpfunos_mailCorreoCcoBoton1Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1Admin' ) ;
			if(!empty( get_option('wpfunos_mailCorreoBccBoton1Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1Admin' ) ;
			wp_mail ( get_option('wpfunos_mailCorreoBoton1Admin'), get_option('wpfunos_asuntoCorreoBoton1Admin') , $mensaje, $headers );
		}
		if($_GET['accion'] == 2 && get_option($this->plugin_name . '_activarCorreoBoton2Admin')){
			require 'partials/mensajes/' . $this->plugin_name . '-ResultadosAcciones-MailBoton2Admin.php';
			if(!empty( get_option('wpfunos_mailCorreoCcoBoton2Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2Admin' ) ;
			if(!empty( get_option('wpfunos_mailCorreoBccBoton2Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2Admin' ) ;
			wp_mail ( get_option('wpfunos_mailCorreoBoton2Admin'), get_option('wpfunos_asuntoCorreoBoton2Admin') , $mensaje, $headers );
		}
	}

	/**
	* Entrada acción usuario Correo Lead
	*
	* add_action( 'wpfunos_result_user_entry', array( $this, 'wpfunosResultUserEntry' ), 10, 1 );
	*/
	public function wpfunosResultCorreoLead( ){
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		if($_GET['accion'] == 1 && get_option($this->plugin_name . '_activarCorreoBoton1Lead')){
			require 'partials/mensajes/' . $this->plugin_name . '-ResultadosAcciones-MailBoton1Lead.php';
			if(!empty( get_option('wpfunos_mailCorreoCcoBoton1Lead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1Lead' ) ;
			if(!empty( get_option('wpfunos_mailCorreoBccBoton1Lead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1Lead' ) ;
			//wp_mail (  get_post_meta( $_GET['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoBoton1Lead') , $mensaje, $headers );
		}
		if($_GET['accion'] == 2 && get_option($this->plugin_name . '_activarCorreoBoton2Lead')){
			require 'partials/mensajes/' . $this->plugin_name . '-ResultadosAcciones-MailBoton2Lead.php';
			if(!empty( get_option('wpfunos_mailCorreoCcoBoton2Lead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2Lead' ) ;
			if(!empty( get_option('wpfunos_mailCorreoBccBoton2Lead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2Lead' ) ;
			//wp_mail ( get_post_meta( $_GET['servicio'], 'wpfunos_servicioEmail', true ), get_option('wpfunos_asuntoCorreoBoton2Lead') , $mensaje, $headers );
		}
	}

	/**
	 * Hook filter ID usuario página resultados
	 *
	 * add_filter( 'wpfunos_get_results', array( $this, 'wpfunosGetResults' ),10, 2 );
	 */
	public function wpfunosGetResults( $postID, $userID ){
		require 'partials/' . $this->plugin_name . '-public-ComparaResultadosGetResults.php';
		return $resultados;
	}

	/**
	 * Hook mostrar entrada con precio confirmados
	 *
	 * add_action( 'wpfunos_result_grid_confirmado', array( $this, 'wpfunosResultGridConfirmado' ), 10, 1 );
	 */
	public function wpfunosResultGridConfirmado( $wpfunos_confirmado ){
		if(count($wpfunos_confirmado) != 0){
			?><div class="wpfunos-titulo"><p></p><center><h2>Precio confirmado</h2></center></div><?php
			// if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('$wpfunos_confirmado: ' . $this->dumpPOST($wpfunos_confirmado));
			foreach ($wpfunos_confirmado as $value) {
				?><div class="wpfunos-busqueda-contenedor"><?php
				$_GET['nombre'] = get_the_title( $value[0] );
				$_GET['logo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioLogo', true ) ,'full' );
				$_GET['confirmado'] = wp_get_attachment_image ( 1217 , array(45,46));
				$_GET['textoconfirmado'] = "Precio confirmado";
				$_GET['direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );
				$_GET['precio'] = number_format($value[1], 0, ',', '.') . '€';
				if( $value[1] != $value[2] ){
					$_GET['preciodescuento'] = number_format($value[2], 0, ',', '.') . '€';
				}else{
					$_GET['preciodescuento'] = '';
				}
				$porcentaje = 100 - ((float)$value[2] * 100) / $value[1];
				$_GET['descuento'] = round($porcentaje, 0);
				$_GET['logodescuento'] = '';
				$_GET['telefonoEmpresa'] = get_post_meta( $value[0], 'wpfunos_servicioTelefono', true );
				$_GET['valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
				$_GET['servicio'] = $value[0];
				$_GET['nombrepack'] = get_post_meta( $value[0], 'wpfunos_servicioPackNombre', true );
				if($value[1] == $value[2]){
					echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultados') ) ;
				}else{
					echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosDescuento') ) ;
				}
				require 'partials/' . $this->plugin_name . '-public-ComparaResultadosDetalles-display.php';
				require 'partials/' . $this->plugin_name . '-public-ComparaResultadosBotonesConfirmado-display.php';
				if($value[1] == $value[2]){
					echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosInferior') ) ;
				}else{
					echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosDescuentoInferior') ) ;
				}
				?></div><?php
			}
		}
	}

	/**
	 * Hook mostrar entrada con precio sin confirmar
	 *
	 * add_action( 'wpfunos_result_grid_sinconfirmar', array( $this, 'wpfunosResultGridSinConfirmar' ), 10, 1 );
	 */
	public function wpfunosResultGridSinConfirmar( $wpfunos_sinconfirmar ){
		if(count($wpfunos_sinconfirmar) != 0){
			?><div class="wpfunos-titulo"><p></p><h2><center>Precio sin confirmar</center></h2></div><?php
			foreach ($wpfunos_sinconfirmar as $value) {
				?><div class="wpfunos-busqueda-contenedor"><?php
				$_GET['nombre'] = get_the_title( $value[0] );
				$_GET['logo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioLogo', true ) ,'full' );
				$_GET['confirmado'] = wp_get_attachment_image ( 1216 , array(45,46));
				$_GET['textoconfirmado'] = "Precio no confirmado";
				$_GET['direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );
				$_GET['precio'] = number_format($value[1], 0, ',', '.') . '€';
				$_GET['valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
				$_GET['preciodescuento'] = '';
				echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosSin') );
				require 'partials/' . $this->plugin_name . '-public-ComparaResultadosDetalles-display.php';
				?></div><?php
			}
		}
	}

	/**
	 * Hook mostrar entrada con sin precio
	 *
	 * add_action( 'wpfunos_result_grid_sinprecio', array( $this, 'wpfunosResultGridSinPrecio' ), 10, 1 );
	 */
	public function wpfunosResultGridSinPrecio( $wpfunos_sinprecio ){
		if(count($wpfunos_sinprecio) != 0){
			?><div class="wpfunos-titulo"><p></p><center><h2>Sin precio</h2></center></div><?php
			foreach ($wpfunos_sinprecio as $value) {
				?><div class="wpfunos-busqueda-contenedor"><?php
				$_GET['nombre'] = get_the_title( $value[0] );
				$_GET['logo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioLogo', true ) ,'full' );
				$_GET['confirmado'] = '';
				$_GET['textoconfirmado'] = '';
				$_GET['direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );
				$_GET['precio'] = '';
				$_GET['valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
				$_GET['preciodescuento'] = '';
				echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosSin') );
				?></div><?php
			}
		}
	}

	/**
	 * Hook array resultados confirmados
	 *
	 * add_filter( 'wpfunos_results_confirmado', array( $this, 'wpfunosResultadosConfirmado' ), 10, 3 );
	 */
	public function wpfunosResultadosConfirmado( $wpfResultados, $wpfunos_confirmado, $postID ){
		if( !$wpfResultados[2] && get_post_meta( $postID, 'wpfunos_servicioPrecioConfirmado', true ) == true && $wpfResultados[0] != 0 && get_post_meta( $postID, 'wpfunos_servicioActivo', true )){
			// if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('1-Confirmado : ' .  );
			// print_r ($wpfResultados[3]);
			$wpfunos_confirmado[] = array( $postID, $wpfResultados[0], $wpfResultados[1], $wpfResultados[3] );
		}
		return  $wpfunos_confirmado;
	}

	/**
	 * Hook array resultados sin confirmar
	 *
	 * add_filter( 'wpfunos_results_sinconfirmar', array( $this, 'wpfunosResultadosSinConfirmar' ), 10, 3 );
	 */
	public function wpfunosResultadosSinConfirmar( $wpfResultados, $wpfunos_sinconfirmar, $postID ){
		if( !$wpfResultados[2] && get_post_meta( $postID, 'wpfunos_servicioPrecioConfirmado', true ) != true && $wpfResultados[0] != 0 && get_post_meta( $postID, 'wpfunos_servicioActivo', true )) {
			$wpfunos_sinconfirmar[] = array( $postID, $wpfResultados[0], $wpfResultados[1], $wpfResultados[3] );
		}
		return $wpfunos_sinconfirmar;
	}

	/**
	 * Hook array resultados sin precio
	 *
	 * add_filter( 'wpfunos_results_sinprecio', array( $this, 'wpfunosResultadosSinPrecio' ), 10, 3 );
	 */
	public function wpfunosResultadosSinPrecio( $wpfResultados, $wpfunos_sinprecio, $postID ){
		if( !$wpfResultados[2] && $wpfResultados[0] == 0 && get_post_meta( $postID, 'wpfunos_servicioActivo', true )){
			$wpfunos_sinprecio[] = array( $postID, 0, 0 );
		}
		return $wpfunos_sinprecio;
	}

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

	/**
	 * Case loops
	 *
	 * $postID = $postID,
	 * $servicioPrecio = get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Precio', true )
	 * $servicioDescuento = get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Descuento', true )
	 * $NA = $NA
	 * $preciototal = $preciototal
	 * $preciodescuento = $preciodescuento
	 *
 	 * list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Precio', true ),
	 *				get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Nombre', true ) );
	 */
	private function wpfunos_case( $postID, $servicioPrecio, $servicioDescuento, $NA, $preciototal, $preciodescuento, $servicioNombre ){
		if ($servicioPrecio == '' ) $NA=true;
		$preciototal += (int)$servicioPrecio ;
		if( (int)$servicioDescuento > 0 ){
			$preciodescuento += (int)$servicioPrecio - ((int)$servicioPrecio*((int)$servicioDescuento/100));
			$desglose = (int)$servicioPrecio - ((int)$servicioPrecio*((int)$servicioDescuento/100));
		}else{
			$preciodescuento += (int)$servicioPrecio;
			$desglose = (int)$servicioPrecio;
		}
		return array( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioPrecio, $servicioDescuento, $desglose );
	}

	/*********************************/
	/*****  UTILIDADES          ******/
	/*********************************/

	/** **/
	/** **/
	/** **/
	// Function to get the user IP address
	public function getUserIP() {
    	$ipaddress = '';
    	if (isset($_SERVER['HTTP_CLIENT_IP']))
        	$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    	else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        	$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    	else if(isset($_SERVER['HTTP_X_FORWARDED']))
        	$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    	else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        	$ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    	else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        	$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    	else if(isset($_SERVER['HTTP_FORWARDED']))
        	$ipaddress = $_SERVER['HTTP_FORWARDED'];
    	else if(isset($_SERVER['REMOTE_ADDR']))
        	$ipaddress = $_SERVER['REMOTE_ADDR'];
    	else
        	$ipaddress = 'UNKNOWN';
    	return $ipaddress;
	}
	/**
	 * Utility: New log message HOOK: add_action( 'wpfunos_new_log', array( $this, 'wpfunosNewLog' ), 10, 1 );
	 */
	public function wpfunosNewLog($message){
		if(get_option($this->plugin_name . '_Debug')) $this->custom_logs( $this->dumpPOST($message));
	}

	/**
	 * Utility: dump array for logfile.
	 */
	 public function dump($data, $indent=0) {
		 $retval = '';
		 $prefix=\str_repeat(' |  ', $indent);
		 if (\is_numeric($data)) $retval.= "Number: $data";
		 elseif (\is_string($data)) $retval.= "String: '$data'";
		 elseif (\is_null($data)) $retval.= "NULL";
		 elseif ($data===true) $retval.= "TRUE";
		 elseif ($data===false) $retval.= "FALSE";
		 elseif (is_array($data)) {
			 $indent++;
			 foreach($data AS $key => $value) {
				 $retval.= "</br>$prefix [$key] = ";
				 $retval.= $this->dump($value, $indent);
			 }
		 }
		 elseif (is_object($data)) {
			 $retval.= "Object (".get_class($data).")";
			 $indent++;
			 foreach($data AS $key => $value) {
				 $retval.= "</br>$prefix $key -> ";
				 $retval.= $this->dump($value, $indent);
			 }
		 }
		 return $retval;
	 }

	/**
	 * Utility: dump array for logfile.
	 */
	public function dumpPOST($data, $indent=0) {
		$retval = '';
		$prefix=\str_repeat(' |  ', $indent);
		if (\is_numeric($data)) $retval.= "Number: $data";
		elseif (\is_string($data)) $retval.= "String: '$data'";
		elseif (\is_null($data)) $retval.= "NULL";
		elseif ($data===true) $retval.= "TRUE";
		elseif ($data===false) $retval.= "FALSE";
		elseif (is_array($data)) {
			$indent++;
			foreach($data AS $key => $value) {
				$retval.= "\r\n$prefix [$key] = ";
				$retval.= $this->dump($value, $indent);
			}
		}
		elseif (is_object($data)) {
			$retval.= "Object (".get_class($data).")";
			$indent++;
			foreach($data AS $key => $value) {
				$retval.= "\r\n$prefix $key -> ";
				$retval.= $this->dump($value, $indent);
			}
		}
		return $retval;
	}

	/**
	 * Utility: create entry in the log file.
	 */
	public function custom_logs($message){
		$upload_dir = wp_upload_dir();
		if (is_array($message)) {
			$message = json_encode($message);
		}
		if (!file_exists( $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs') ) {
			mkdir( $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs' );
		}
		$time = current_time("d-M-Y H:i:s");
		$ban = "#$time: $message\r\n";
		$file = $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs/' . $this->plugin_name .'-publiclog-' . current_time("Y-m-d") . '.log';
		$open = fopen($file, "a");
		fputs($open, $ban);
		fclose( $open );
	}

	private function wpfunos_simple_crypt( $string, $action = 'e' ) {
		$secret_key = 'WpFunos_secret_key';
		$secret_iv =  'WpFunos_secret_iv';

		$output = false;
		$encrypt_method = "AES-256-CBC";
		$key = hash( 'sha256', $secret_key );
		$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

		if( $action == 'e' ) {
			$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
		}
		else if( $action == 'd' ){
			$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
		}
		return $output;
	}
}
