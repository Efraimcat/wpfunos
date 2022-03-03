<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Directorio.
 *
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage Wpfunos/directorio
 * @author     Efraim Bayarri <efraim@efraim.cat>
 */
class Wpfunos_Servicios {

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
		add_shortcode( 'wpfunos-actulizar-mapas-servicios', array( $this, 'wpfunosActualizarMapasServiciosShortcode' ));
		add_shortcode( 'wpfunos-pagina-servicios', array( $this, 'wpfunosPaginaServiciosShortcode' ));
		add_shortcode( 'wpfunos-pagina-resultados-servicios', array( $this, 'wpfunosPaginaResultadosServiciosShortcode' ));
		add_shortcode( 'wpfunos-acciones-botones-confirmado', array( $this, 'wpfunosAccionesBotonesConfirmadoShortcode' ));
		add_shortcode( 'wpfunos-resultados-empresa', array( $this, 'wpfunosResultadosEmpresaShortcode' ));
		add_shortcode( 'wpfunos-resultados-telefono-usuario', array( $this, 'wpfunosResultadosTelefonoUsuarioShortcode' ));
		add_shortcode( 'wpfunos-resultados-telefono-servicio', array( $this, 'wpfunosResultadosTelefonoServicioShortcode' ));
		add_shortcode( 'wpfunos-resultados-llamar-telefono-servicio', array( $this, 'wpfunosResultadosLamarTelefonoServicioShortcode' ));
		add_shortcode( 'wpfunos-resultados-estrellas', array( $this, 'wpfunosResultadosEstrellasShortcode' ));
		add_action( 'wpfunos_result_user_entry', array( $this, 'wpfunosResultUserEntry' ), 10, 1 );
	}
	
	/*********************************/
	/*****  SHORTCODES          ******/
	/*********************************/

	/**
	* Shortcode [wpfunos-actulizar-mapas-servicios]
	*/
	public function wpfunosActualizarMapasServiciosShortcode( $atts, $content = "" ) {
		if ( get_post_type( get_the_ID() ) != 'servicios_wpfunos' ) return;
		$this->gmw_update_post_type_post_location( get_the_ID() );
	}
	
	/**
	* Shortcode [wpfunos-pagina-servicios]
	*/
	public function wpfunosPaginaServiciosShortcode( $atts, $content = "" ) {
		return do_shortcode( get_option('wpfunos_paginaComparador') );
	}

	/**
	* Shortcode [wpfunos-pagina-resultados-servicios]
	* https://funos.es/compara-precios-nueva?address%5B%5D=[field id="address"]&post%5B%5D=[field id="post"]&distance=[field id="distance"]&units=[field id="units"]&page1=&per_page=50&lat=[field id="lat"]&lng=[field id="lng"]&form=4&action=fs&referencia=[field id="referencia"]&CP=[field id="CP"]
	*/
	public function wpfunosPaginaResultadosServiciosShortcode( $atts, $content = "" ) {
		echo get_option('wpfunos_paginaURLResultadosServicios');
	}
	
	/**
	* Shortcode [wpfunos-acciones-botones-confirmado]
	*/
	public function wpfunosAccionesBotonesConfirmadoShortcode( $atts, $content = "" ) {
		if( strlen( $_GET['telefonoUsuario'] ) > 3 ) {
			$this->wpfunosResultUserEntry();
			$this->wpfunosResultCorreoAdmin();
			$this->wpfunosResultCorreoLead();
		}else{
			do_action('wpfunos_log', '==============' );
			do_action('wpfunos_log', 'Error 3 Nuevo Usuario: ' . $this->getUserIP() );
			do_action('wpfunos_log', 'referencia: ' .  do_action( 'wpfunos_dumplog', $fields['referencia']  ) );
		}
	}

	/**
	 * Shortcode [wpfunos-resultados-empresa]
	 */
	 public function wpfunosResultadosEmpresaShortcode( $atts, $content = "" ) {
	 	$a = shortcode_atts( array(
			 'boton'=>'',
		), $atts );
	 	switch ( $a['boton'] ) {
		 	case 'logo': echo $_GET['logo'] ; break;
		 	case 'confirmado': echo $_GET['confirmado'] ; break;
			case 'mapa': $idempresa = $_GET['servicio']; $shortcode = '[gmw_single_location object="post" object_id="' . $idempresa . '" elements="distance,map,address,directions_link" units="k" map_height="300px" map_width="100%"]'; echo do_shortcode($shortcode); break;
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
		$tel = str_replace(" ","",$_GET['telefonoEmpresa']);
		$tel = str_replace("-","",$tel);
		return substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
	 }
	
	/**
	 * Shortcode [wpfunos-resultados-llamar-telefono-servicio]
	 */
	 public function wpfunosResultadosLamarTelefonoServicioShortcode( $atts, $content = "" ) {
		 return '<a href="tel:' . $_GET['telefono'] . '">Llamar</a>';
	 }
	
	/**
	* Shortcode [wpfunos-resultados-estrellas]
	*/
	public function wpfunosResultadosEstrellasShortcode( $atts, $content = "" ) {
		return (int)$_GET['valoracion'];
	}
	
	/*********************************/
	/*****  HOOKS               ******/
	/*********************************/
	
	/**
	* Entrada acción usuario
	*
	* add_action( 'wpfunos_result_user_entry', array( $this, 'wpfunosResultUserEntry' ), 10, 1 );
	*/
	public function wpfunosResultUserEntry(){
		// if(get_option($this->plugin_name . '_Debug')) $this->custom_logs('Fields: ' . $this->dumpPOST($_POST));
		mt_srand(mktime());
		$_GET['referencia'] = 'funos-'.(string)mt_rand();
		$userIP = $this->getUserIP();
		$my_post = array(
   			'post_title' => $_GET['referencia'],
			'post_type' => 'usuarios_wpfunos',
			'post_status'  => 'publish',
			'meta_input'   => array(
				$this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
				$this->plugin_name . '_userReferencia' => sanitize_text_field( $_GET['referencia'] ),
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
				
				$this->plugin_name . '_userIP' => sanitize_text_field( $userIP ),
			),
		);
		if( strlen( $_GET['telefonoUsuario'] ) > 3 ) { 
			$post_id = wp_insert_post($my_post);
			do_action('wpfunos_log', '==============' );
			do_action('wpfunos_log', 'Nuevo usuario: ' .  $userIP  );
			do_action('wpfunos_log', 'ID: ' . $post_id  );
			do_action('wpfunos_log', 'referencia: ' .  $_GET['referencia']  );
			do_action('wpfunos_log', 'telefonoUsuario: ' . $_GET['telefonoUsuario']  );
		}else{
			do_action('wpfunos_log', '==============' );
			do_action('wpfunos_log', 'Error 2 Nuevo Usuario: ' . $userIP );
			do_action('wpfunos_log', 'referencia: ' .  $_GET['referencia']  );
		}
	}

	/*********************************/
	/*****                      ******/
	/*********************************/
	
	/**
	* Enviar Correo Admin
	*/
	public function wpfunosResultCorreoAdmin( ){
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		if($_GET['accion'] == 1 && get_option($this->plugin_name . '_activarCorreoBoton1Admin')){
			$mensaje = get_option('wpfunos_mensajeCorreoBoton1Admin');
			require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Calculos.php';
			if(!empty( get_option('wpfunos_mailCorreoCcoBoton1Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1Admin' ) ;
			if(!empty( get_option('wpfunos_mailCorreoBccBoton1Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1Admin' ) ;
			wp_mail ( get_option('wpfunos_mailCorreoBoton1Admin'), get_option('wpfunos_asuntoCorreoBoton1Admin') , $mensaje, $headers );
		}
		if($_GET['accion'] == 2 && get_option($this->plugin_name . '_activarCorreoBoton2Admin')){
			$mensaje = get_option('wpfunos_mensajeCorreoBoton2Admin');
			require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Calculos.php';
			if(!empty( get_option('wpfunos_mailCorreoCcoBoton2Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2Admin' ) ;
			if(!empty( get_option('wpfunos_mailCorreoBccBoton2Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2Admin' ) ;
			wp_mail ( get_option('wpfunos_mailCorreoBoton2Admin'), get_option('wpfunos_asuntoCorreoBoton2Admin') , $mensaje, $headers );
		}
	}
	
	/**
	* Enviar Correo Lead
	*/
	public function wpfunosResultCorreoLead( ){
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		if($_GET['accion'] == 1 && get_option($this->plugin_name . '_activarCorreoBoton1Lead')){
			$mensaje = get_option('wpfunos_mensajeCorreoBoton1Lead');
			require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Calculos.php';
			if(!empty( get_option('wpfunos_mailCorreoCcoBoton1Lead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1Lead' ) ;
			if(!empty( get_option('wpfunos_mailCorreoBccBoton1Lead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1Lead' ) ;
			//wp_mail (  get_post_meta( $_GET['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoBoton1Lead') , $mensaje, $headers );
		}
		if($_GET['accion'] == 2 && get_option($this->plugin_name . '_activarCorreoBoton2Lead')){
			$mensaje = get_option('wpfunos_mensajeCorreoBoton2Lead');
			require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Calculos.php';
			if(!empty( get_option('wpfunos_mailCorreoCcoBoton2Lead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2Lead' ) ;
			if(!empty( get_option('wpfunos_mailCorreoBccBoton2Lead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2Lead' ) ;
			//wp_mail ( get_post_meta( $_GET['servicio'], 'wpfunos_servicioEmail', true ), get_option('wpfunos_asuntoCorreoBoton2Lead') , $mensaje, $headers );
		}
	}
	
	/**
	 * Actualizar datos gmw mapa ficha servicios
	 */
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
		$address = get_post_meta( $post_id, 'wpfunos_servicioDireccion', true );
		if( strlen( $address) < 5 )$address = get_post_meta( $post_id, 'wpfunos_servicioPoblacion', true );
		// varify that address exists.
		if ( empty( $address ) ) {
			return;
		}
		// verify the updater function.
		if ( ! function_exists( 'gmw_update_post_location' ) ) {
			return;
		}
		//run the udpate location function
		gmw_update_post_location( $post_id, $address );
	}
	
	/**
	 * Formatear texto comentarios
	 */
	public function wpfunosFormatoComentario( $customfield_content ){
  		$customfield_content = apply_filters( 'the_content', $customfield_content );
  		$customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content );
  		return $customfield_content;
	}
}