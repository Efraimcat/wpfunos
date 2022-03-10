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
class Wpfunos_Utils {

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
		add_action( 'wpfunos_log', array( $this, 'wpfunosLog' ), 10, 1 );
		add_action( 'wpfunos_import', array( $this, 'wpfunosImport' ), 10, 1 );
		add_filter( 'wpfunos_reserved_ip', array( $this, 'wpfunosReservedIPAction' ) );
		add_filter( 'wpfunos_dumplog', array ( $this, 'dumpPOST'), 10, 1);
		add_filter( 'wpfunos_userIP', array( $this, 'wpfunosgetUserIP' ) );
		add_filter( 'wpfunos_userID', array( $this, 'wpfunosGetUserid' ), 10, 1 );
		add_filter( 'wpfunos_comentario', array( $this, 'wpfunosFormatoComentario' ), 10, 1 );
		add_filter( 'wpfunos_crypt', array( $this, 'wpfunosCrypt' ), 10, 2 );
		add_filter( 'wpfunos_shortener', array( $this, 'wpfunosShortener' ), 10, 1 );
	}
	
	/*********************************/
	/*****                      ******/
	/*********************************/
	
	/**
	 * Utility: Crypt/Decript HOOK: add_filter( 'wpfunos_crypt', array( $this, 'wpfunosCrypt' ), 10, 2 )
	 */
	public function wpfunosCrypt( $string, $action ){
		return $this->wpfunosSimpleCrypt( $string, $action );
	}
	
	/**
	 * Utility: New log message HOOK: add_action( 'wpfunos_log', array( $this, 'wpfunosLog' ), 10, 1 )
	 * do_action('wpfunos_log', 'referencia: ' .  $fields['referencia'] );
	 */
	public function wpfunosLog( $message ){
		if(get_option($this->plugin_name . '_Debug')) $this->custom_logs( $this->dumpPOST($message));
		return true;
	}
	/**
	 * Utility: Import HOOK: add_action( 'wpfunos_import', array( $this, 'wpfunosImport' ), 10, 1 )
	 * do_action('wpfunos_import');
	 */
	public function wpfunosImport(){
		include 'wpfunos-imports.php';	
	}
	
	/*********************************/
	/*****  UTILIDADES          ******/
	/*********************************/

	/** **/
	/** **/
	/** **/
	
	/**
	 * Utility: Comprobar si la dirección IP debe registrar eventos o es una dirección de test.
	 */
	public function wpfunosReservedIPAction() {
		$opcion = get_option( 'wpfunos_DireccionesIPDesarrollo' );
		$direcciones = explode ( ",", $opcion );
		foreach( $direcciones as $direccion ) {		
			$direccion = trim( $direccion );
			$userip = $this->wpfunosgetUserIP();
			if( $direccion == $userip )return true;
		}
		return false;
	}
	
	/**
	 * Utility: Function to get the user IP address: add_filter( 'wpfunos_userIP', array( $this, 'wpfunosgetUserIP' ) )
	 * $userIP = apply_filters('wpfunos_userIP','dummy');
	 */
	public function wpfunosgetUserIP() {
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
	 * ID usuario página resultados
	 * Utility: UserID HOOK: add_filter( 'wpfunos_userID', array( $this, 'wpfunosGetUserid' ), 10, 1 )
	 * $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
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
	 * Formatear texto comentarios
	 * Utility: Formato Comentario HOOK: add_filter( 'wpfunos_comentario', array( $this, 'wpfunosFormatoComentario' ), 10, 1 );
	 * $comentariosBase = apply_filters('wpfunos_comentario', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioPrecioBaseComentario', true ) );
	 */
	public function wpfunosFormatoComentario( $customfield_content ){
  		$customfield_content = apply_filters( 'the_content', $customfield_content );
  		$customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content );
  		return $customfield_content;
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
	
	/*
	 * Utility: Crypt/Decript HOOK: add_filter( 'wpfunos_crypt', array( $this, 'wpfunosSimpleCrypt' ), 10, 2 )
	 * $_GET['wpf'] = apply_filters( 'wpfunos_crypt', $_GET['referencia'] . ', ' . $_GET['CP'] , 'e' );
	 * $cryptcode = apply_filters( 'wpfunos_crypt', $_GET['wpf'], 'd' );
	 * $decode = partyo_simple_crypt( $code, 'd' );
	 * $codigo = partyo_simple_crypt( $link, 'e' );
	 */
	private function wpfunosSimpleCrypt( $string, $action = 'e' ) {
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
	
	/*
 	 * CUTTLY
 	 * https://cutt.ly/cuttly-api
 	 * add_filter( 'wpfunos_shortener', array( $this, 'wpfunosShortener' ), 10, 1 );
 	 * $newURL = apply_filters('wpfunos_shortener', $URL );
 	 */	
	function wpfunosShortener($original_url){
		$short_url = $original_url;
		$cuttly_url = 'https://cutt.ly/api/api.php';
		$link = urlencode($original_url);
		$key = 'af16985a82db578c3a7aa2830ba2ec0950411';
		$timestamp = time();
		$name = '';

		$json = file_get_contents($cuttly_url."?key=$key&short=$link&name=$name");
		$data = json_decode ($json, true);
		if($data["url"]["status"] == 7)	$short_url = $data["url"]["shortLink"];
		return $short_url;
	}
}