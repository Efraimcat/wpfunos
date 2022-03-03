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
class Wpfunos_Aseguradoras {

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
		add_shortcode( 'wpfunos-acciones-botones-aseguradora', array( $this, 'wpfunosAccionesBotonesAseguradoraShortcode' ));
		add_shortcode( 'wpfunos-aseguradoras-page-switch', array( $this, 'wpfunosAseguradorasPageSwitchShortcode' ));
		add_shortcode( 'wpfunos-pagina-aseguradoras', array( $this, 'wpfunosPaginaAseguradorasShortcode' ));
		add_shortcode( 'wpfunos-pagina-resultados-aseguradoras', array( $this, 'wpfunosPaginaResultadosAseguradorasShortcode' ));
		
		add_action( 'wpfunos_aseguradora_user_entry', array( $this, 'wpfunosAseguradoraUserEntry' ), 10, 1 );
		add_action( 'wpfunos_aseguradoras_cold_lead', array( $this, 'wpfunosAseguradorasColdLead' ), 10, 1 );
		add_action( 'wpfunos-aseguradoras-resultados', array( $this, 'wpfunosAseguradorasResultados' ), 10, 1 );
		
	}

		
	/*********************************/
	/*****  SHORTCODES          ******/
	/*********************************/

	/**
	* Shortcode [wpfunos-acciones-botones-aseguradora]
	*/
	public function wpfunosAccionesBotonesAseguradoraShortcode( $atts, $content = "" ) {
		if( strlen( $_GET['telefonoUsuario'] ) > 3 ) {
			$this->wpfunosAseguradoraUserEntry();
			//$this->wpfunosResultUserEntry();
			//$this->wpfunosResultCorreoAdmin();
			//$this->wpfunosResultCorreoLead();
		}else{
			do_action('==============' );
			do_action('wpfunos_log', 'Error 4 Nuevo Usuario: ' .  $this->getUserIP() );
			do_action('wpfunos_log', 'referencia: ' .  $fields['referencia'] );
		}
	}
	
	/**
	 * Shortcode [wpfunos-aseguradoras-page-switch]
	 */
	public function wpfunosAseguradorasPageSwitchShortcode(){
		if( !isset( $_GET['form'] ) ){
			echo do_shortcode( get_option('wpfunos_paginaComparadorGeoMyWpAseguradoras') );
		}elseif( !isset( $_GET['referencia'] ) ){
			$_GET['direccion'] = $_GET['address'][0];
			$_GET['tipo'] = $_GET['post'][0];
			mt_srand(mktime());
			$_GET['referencia'] = 'funos-'.(string)mt_rand();
			$_GET['CP'] = $this->wpfunosCodigoPostal( $_GET['CP'], $_GET['direccion'] );
			echo do_shortcode( get_option('wpfunos_seccionComparaPreciosDatosAseguradoras') );
		}elseif( isset( $_GET['referencia'] ) ){
			$IDusuario = $this->wpfunosGetUserid($_GET['referencia']);
			if($IDusuario != 0){  
				echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosAseguradorasCabecera') );
				echo do_shortcode( get_option('wpfunos_formGeoMyWpAseguradoras') );
				echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosAseguradorasPie') );
			}
		}
	}
	
	/**
	* Shortcode [wpfunos-pagina-aseguradoras]
	*/
	public function wpfunosPaginaAseguradorasShortcode( $atts, $content = "" ) {
		return do_shortcode( get_option('wpfunos_paginaComparadorAseguradoras') );
	}
	
	/**
	* Shortcode [wpfunos-pagina-resultados-aseguradoras]
	*/
	public function wpfunosPaginaResultadosAseguradorasShortcode( $atts, $content = "" ) {
		echo get_option('wpfunos_paginaURLResultadosAseguradoras');
	}
	
	/*********************************/
	/*****  HOOKS               ******/
	/*********************************/
	
	/**
	* Entrada acción usuario
	*
	* add_action( 'wpfunos_aseguradora_user_entry', array( $this, 'wpfunosAseguradoraUserEntry' ), 10, 1 );
	*/
	public function wpfunosAseguradoraUserEntry(){
		mt_srand(mktime());
		$_GET['referencia'] = 'funos-'.(string)mt_rand();
		$my_post = array(
   			'post_title' => $_GET['referencia'],
			'post_type' => 'usuarios_wpfunos',
			'post_status'  => 'publish',
			'meta_input'   => array(
				$this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
				$this->plugin_name . '_userReferencia' => sanitize_text_field( $_GET['referencia'] ),
				$this->plugin_name . '_userName' => sanitize_text_field( $_GET['nombreUsuario'] ),
				$this->plugin_name . '_userPhone' => sanitize_text_field( $_GET['telefonoUsuario'] ),
				$this->plugin_name . '_userCP' => sanitize_text_field( $_GET['CPUsuario']),
				$this->plugin_name . '_userAccion' => sanitize_text_field( $_GET['accion']),
				$this->plugin_name . '_userSeleccion' => sanitize_text_field( $_GET['seleccionUsuario']),
				$this->plugin_name . '_userMail' => sanitize_text_field( $_GET['Email']),
				$this->plugin_name . '_userServicio' => sanitize_text_field( $_GET['nombre']),			
				$this->plugin_name . '_userSeguro' => sanitize_text_field( $_GET['seguro']),			
				
			),
		);
		if( strlen( $_GET['telefonoUsuario'] ) > 3 ) { 
			$post_id = wp_insert_post($my_post);
			$userIP = apply_filters('wpfunos_userIP','dummy');
			do_action('wpfunos_log', '==============' );
			do_action('wpfunos_log', 'Nuevo Usuario: ' .  $userIP  );
			do_action('wpfunos_log', 'ID: ' .  $post_id  );
			do_action('wpfunos_log', 'referencia: ' . $_GET['referencia'] );
			do_action('wpfunos_log', 'telefonoUsuario: ' . $_GET['telefonoUsuario'] );
		}else{
			do_action('wpfunos_log', '==============' );
			do_action('wpfunos_log', 'Error 5 Nuevo Usuario: ' . $userIP );
			do_action('wpfunos_log', 'referencia: ' . $_GET['referencia'] );
		}
	}
	
	/**
	 * Hook Cold Lead Aseguradoras
	 *
	 * add_action( 'wpfunos_aseguradoras_cold_lead', array( $this, 'wpfunosAseguradorasColdLead' ), 10, 1 );
	 */
	public function wpfunosAseguradorasColdLead( ){
		$IDusuario = $this->wpfunosGetUserid( $_GET['referencia'] );
		$seleccion = get_post_meta( $IDusuario, $this->plugin_name . '_userSeleccion', true );
		$CP = get_post_meta( $IDusuario, $this->plugin_name . '_userCP', true );
		$seguro = get_post_meta( $IDusuario, $this->plugin_name . '_userSeguro', true );
		$respuesta = (explode(',',$seleccion));
		//Si|1 , No|2
		if( $seguro == 1 && get_option( 'wpfunos_APIPreventivaColdLeadPreventiva') ){
			$this->wpfunosLlamadaAPIPreventiva( get_option( 'wpfunos_APIPreventivaURLPreventiva'), 'Preventiva Cold' , get_option( 'wpfunos_APIPreventivaCampainPreventiva'), 4 );
		}elseif( $seguro == 2 && get_option( 'wpfunos_APIPreventivaColdLeadElectium') ){
			$this->wpfunosLlamadaAPIPreventiva( get_option( 'wpfunos_APIPreventivaURLElectium'), 'Electium Cold' , get_option( 'wpfunos_APIPreventivaCampainElectium'), 4 );
		}
		
  	}
	
	/**
	 * Hook Resultados Aseguradoras
	 *
	 * add_action( 'wpfunos-aseguradoras-resultados', array( $this, 'wpfunosAseguradorasResultados' ), 10, 1 );
	 */
	public function wpfunosAseguradorasResultados( ){
		$IDusuario = $this->wpfunosGetUserid( $_GET['referencia'] );
		$_GET['telefonoUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userPhone', true );
		$seleccion = get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true );
		$respuesta = (explode(',',$seleccion));
		switch($respuesta[2]){ case '1': $sexo = 'Hombre'; break; case '2'; $sexo = 'Mujer'; break; }
		$_GET['edad'] =  date("Y") - (int)$respuesta[3];
		$_GET['seleccionUsuario'] = $seleccion;
		$_GET['CPUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userCP', true );
		$_GET['nombreUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userName', true );
		$_GET['Email'] = get_post_meta( $IDusuario, 'wpfunos_userMail', true );
		$_GET['idUsuario'] = $IDusuario;
		$_GET['seguro'] = get_post_meta( $IDusuario, 'wpfunos_userSeguro', true );
		$args = array(
			'post_status' => 'publish',
			'post_type' => 'tipos_seguro_wpfunos',
			'meta_key' => 'wpfunos_tipoSeguroOrden',
			'orderby' => 'meta_value_num',
			'meta_type' => 'TEXT',
			'order' => 'ASC'
		);
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ) :
			while ( $my_query->have_posts() ) : $my_query->the_post();
				$temp_query = $wp_query;  // store it
				$IDtipo = get_the_ID();
				?><div class="wpfunos-titulo-aseguradoras"><p></p><center><h2><?php echo get_post_meta( $IDtipo, 'wpfunos_tipoSeguroDisplay', true ); ?></h2></center></div><?php
				$args = array(
					'post_status' => 'publish',
          			'post_type' => 'aseguradoras_wpfunos',
                    'meta_query' => array(
                        array(
                            'key'     => 'wpfunos_aseguradorasTipoSeguro',
                            'value'   => $IDtipo,
                            'compare' => 'IN',
                        ),
                    ),
					'meta_key'   => 'wpfunos_aseguradorasOrden',
					'orderby'    => 'meta_value_num',
          			"order" => 'ASC'
              	);
    			$wp_query = new WP_Query($args);
    			while ($wp_query->have_posts()) : $wp_query->the_post();
					$IDaseguradora = get_the_ID();
					if( get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasActivo', true ) ){
						?><div class="wpfunos-busqueda-aseguradoras-contenedor"><?php
						$_GET['nombre'] = get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasNombre', true );
						$_GET['telefonoEmpresa'] = get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasTelefono', true );
						$_GET['logo'] = wp_get_attachment_image ( get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasLogo', true ) ,'full' );
						echo do_shortcode( get_option('wpfunos_seccionAseguradorasPrecio') );	// cabecera con logo
						?><div class="wpfunos-busqueda-aseguradoras-inferior"><?php
						// ToDo: sustituir [precio] en wpfunos_aseguradorasNotas
						echo  get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasNotas', true );
						require 'partials/' . $this->plugin_name . '-aseguradoras-botones-cabecera-display.php';
						?>
						<form target="POPUPW" action="<?php echo get_option('wpfunos_paginaAseguradorasLlamen'); ?>" method="get" onsubmit="POPUPW = window.open('about:blank','POPUPW','width=800,height=500,top=400,left=500');">
							<input type="hidden" name="referencia" id="referencia" value="<?php echo $_GET['referencia']?>" >
							<input type="hidden" name="accion" id="accion" value="5" >
							<input type="hidden" name="telefonoUsuario" id="telefonoUsuario" value="<?php echo $_GET['telefonoUsuario']?>" >
							<input type="hidden" name="telefono" id="telefono" value="<?php echo $_GET['telefonoUsuario']?>" >
							<input type="hidden" name="nombreUsuario" id="nombreUsuario" value="<?php echo $_GET['nombreUsuario']?>" >
							<input type="hidden" name="CPUsuario" id="CPUsuario" value="<?php echo $_GET['CPUsuario']?>" >
							<input type="hidden" name="seleccionUsuario" id="seleccionUsuario" value="<?php echo $_GET['seleccionUsuario']?>" >
							<input type="hidden" name="Email" id="Email" value="<?php echo $_GET['Email']?>" >
							<input type="hidden" name="nombre" id="nombre" value="<?php echo $_GET['nombre']?>" >
							<input type="hidden" name="seguro" id="seguro" value="<?php echo $_GET['seguro']?>" >

							<input type="submit" value="Quiero que me llamen" style="background-color: #1d40d3; font-size: 14px;">
						</form>
						</div>
						<div class="wpfunos-boton-llamar">
						<form target="POPUPW" action="<?php echo get_option('wpfunos_paginaAseguradorasLlamar'); ?>" method="get" onsubmit="POPUPW = window.open('about:blank','POPUPW','popup,width=800,height=500,top=400,left=500');">
							<input type="hidden" name="referencia" id="referencia" value="<?php echo $_GET['referencia']?>" >
							<input type="hidden" name="accion" id="accion" value="6" >	
							<input type="hidden" name="wpfunos-hacer-llamada" id="wpfunos-hacer-llamada" value="1" >
							<input type="hidden" name="telefonoUsuario" id="telefonoUsuario" value="<?php echo $_GET['telefonoUsuario']?>" >
							<input type="hidden" name="telefono" id="telefono" value="<?php echo $_GET['telefonoEmpresa']?>" >
							<input type="hidden" name="nombreUsuario" id="nombreUsuario" value="<?php echo $_GET['nombreUsuario']?>" >
							<input type="hidden" name="CPUsuario" id="CPUsuario" value="<?php echo $_GET['CPUsuario']?>" >
							<input type="hidden" name="seleccionUsuario" id="seleccionUsuario" value="<?php echo $_GET['seleccionUsuario']?>" >
							<input type="hidden" name="Email" id="Email" value="<?php echo $_GET['Email']?>" >
							<input type="hidden" name="nombre" id="nombre" value="<?php echo $_GET['nombre']?>" >
							<input type="hidden" name="seguro" id="seguro" value="<?php echo $_GET['seguro']?>" >

							<input type="submit" value="Llamar" style="background-color: #1d40d3; font-size: 14px;">
						</form>
						<?php
						require 'partials/' . $this->plugin_name . '-aseguradoras-botones-pie-display.php';
						?></div></div><?php
					}
        		endwhile;
				if (isset($wp_query)) $wp_query = $temp_query; // restore loop
				?> <div class="clear"></div><?php
				?><div class="wpfunos-busqueda-aseguradoras-contenedor"><?php
				$_GET['argumentario'] = get_post_meta( $IDtipo, 'wpfunos_tipoSeguroComentario', true );
				echo do_shortcode( get_option('wpfunos_seccionAseguradorasArgumentario') );
				?></div><?php
			endwhile;
		endif;
		wp_reset_postdata();
	}
	
	/*********************************/
	/*****                      ******/
	/*********************************/
	
	/**
	 * Llamada API Preventiva $this->wpfunosLlamadaAPIPreventiva( 'https://fidelity.preventiva.com/ContactsImporter/api/Contact', 'Preventiva' );
	 */
	public function wpfunosLlamadaAPIPreventiva( $URL, $tipo, $campain, $accion ){
		$IDusuario = $this->wpfunosGetUserid($_GET['referencia']);
		if( $IDusuario == 0 ) return;
		$local_time  = current_datetime();
		$current_time = $local_time->getTimestamp() + $local_time->getOffset();
		$fecha = gmdate("Ymd His",$current_time);
		$fechacarga = gmdate("Y-m-d H:i:s",$current_time);
		mt_srand(mktime());
		$nuevareferencia = 'funos-'.(string)mt_rand();
		$CP = get_post_meta( $IDusuario, $this->plugin_name . '_userCP', true );
		$email = get_post_meta( $IDusuario, $this->plugin_name . '_userMail', true );
		$nombre = get_post_meta( $IDusuario, $this->plugin_name . '_userName', true );
		$telefono =  str_replace(' ','', get_post_meta( $IDusuario, $this->plugin_name . '_userPhone', true ) ) ;
		$seguro = get_post_meta( $IDusuario, $this->plugin_name . '_userSeguro', true );
		$seleccion = get_post_meta( $IDusuario, $this->plugin_name . '_userSeleccion', true );
		$respuesta = (explode(',',$seleccion));
		switch($respuesta[2]){ case '1': $sexo = 'Hombre'; break; case '2'; $sexo = 'Mujer'; break; }
		$edad =  date("Y") - (int)$respuesta[3];
		$ubicacion = strtr($respuesta[0],"+",",");
		//
		$headers = array( 'Accept' => 'application/json', 'Content-Type' => 'application/json', 'Authorization' => 'Basic ' . base64_encode( get_option( 'wpfunos_APIPreventivaUsuarioPreventiva') . ':' . get_option( 'wpfunos_APIPreventivaPasswordPreventiva')  ), );
        $body = '{
			"phone": "' . $telefono . '",
			"campaign": "'. $campain .'",
			"initDate": "' . $fecha .'",
			"data": [
				{"key": "Direccion", "value": "' . $ubicacion . '" },
				{"key": "Nombre Y Apellidos", "value": "' . $nombre . '"},
				{"key": "CP", "value": "' . $CP . '"},
				{"key": "E-mail", "value": "' . $email . '"},
				{"key": "Edad", "value": "' . $edad . '"},
				{"key": "Sexo", "value": "' . $sexo . '"},
				{"key": "Id_cliente", "value": "' . $nuevareferencia . '"},
				{"key": "FechaCarga", "value": "' . $fechacarga . '"}
			]
		}';
		do_action('wpfunos_log', '==============' );
		do_action('wpfunos_log', 'Request: $URL: ' .  $URL );
		do_action('wpfunos_log', 'Request: $headers: ' .  $headers );
		do_action('wpfunos_log', 'Request: $body: ' .  $body );
        $request = wp_remote_post( $URL, array( 'headers' => $headers, 'body' => $body, 'timeout' => 45 ) );
        if ( is_wp_error($request) ) {
            esc_html_e('alguna cosa ha ido mal','wpfunos'); 
            esc_html_e(': ' . $request->get_error_message() );
			do_action('wpfunos_log', '==============' );
			do_action('wpfunos_log', 'Request: Error message: ' .  $request->get_error_message() );
			do_action('wpfunos_log', '==============' );
           return;
        }
		$this->custom_logs( 'Request: $request: ' . $this->dump($request) );
		$codigo = json_decode( $request['code'] );
		$my_post = array(
   			'post_title' => $nuevareferencia,
			'post_type' => 'usuarios_wpfunos',
			'post_status'  => 'publish',
			'meta_input'   => array(
				$this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
				$this->plugin_name . '_userReferencia' => sanitize_text_field( $nuevareferencia ),
				$this->plugin_name . '_userName' => sanitize_text_field( $nombre ),
				$this->plugin_name . '_userPhone' => sanitize_text_field( substr($telefono,0,3).' '. substr($telefono,3,2).' '. substr($telefono,5,2).' '. substr($telefono,7,2) ),
				$this->plugin_name . '_userSeleccion' => sanitize_text_field( $seleccion ),
				$this->plugin_name . '_userAccion' => sanitize_text_field( $accion ),
				$this->plugin_name . '_userCP' => sanitize_text_field( $CP ),
				$this->plugin_name . '_userMail' => sanitize_text_field( $email ),
				$this->plugin_name . '_userSeguro' => sanitize_text_field( $seguro ),
				$this->plugin_name . '_userAPITipo' => sanitize_text_field( $tipo ),
				$this->plugin_name . '_userAPIBody' => sanitize_text_field( $body),
				$this->plugin_name . '_userAPIMessage' => $request,
				),
		);
		$userIP = apply_filters('wpfunos_userIP','dummy');
		if( !strrpos($request,'Conflict') ){
			$post_id = wp_insert_post($my_post);
			do_action('wpfunos_log', '==============' );
			do_action('wpfunos_log', 'Nueva API: ' .  $userIP );
			do_action('wpfunos_log', 'ID: ' .  $post_id );
			do_action('wpfunos_log', 'referencia: ' . $nuevareferencia );
		}else{
			do_action('wpfunos_log', '==============' );
			do_action('wpfunos_log', 'Error 3 Nueva API: ' .  $userIP );
			do_action('wpfunos_log', 'referencia: ' . $nuevareferencia );
		}
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
	 * Buscar CP undefined
	 */
	public function  wpfunosCodigoPostal( $CodigoPostal, $Direccion ){
		// CP = 'undefined'
		if( $CodigoPostal == 'undefined' || $CodigoPostal == '' ){
			$poblacion = ucwords( $Direccion );
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
			$CodigoPostal = get_post_meta( $id, 'wpfunos_cpostalesCodigo', true );
		}
		return $CodigoPostal;
	}
}