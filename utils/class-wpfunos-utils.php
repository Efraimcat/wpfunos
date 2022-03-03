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
		add_filter( 'wpfunos_userIP', array( $this, 'wpfunosUserIP' ) );
	}
	
	/**
	 * Utility: New log message HOOK: add_action( 'wpfunos_log', array( $this, 'wpfunosLog' ), 10, 1 );
	 * do_action('wpfunos_log', 'referencia: ' .  $fields['referencia'] );
	 */
	public function wpfunosLog($message){
		if(get_option($this->plugin_name . '_Debug')) $this->custom_logs( $this->dumpPOST($message));
		return true;
	}
	/**
	 * Utility: UserID HOOK: add_action( 'wpfunos_userIP', array( $this, 'wpfunosUserIP' ), 10, 1 );
	 */
	public function wpfunosUserIP( $dummy ){
		return $this->getUserIP();
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