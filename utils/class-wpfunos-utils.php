<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Utilidades.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/utils
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
class Wpfunos_Utils {

  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
    add_action( 'wpfunos_log', array( $this, 'wpfunosLog' ), 10, 1 );
    add_action( 'wpfunos_import', array( $this, 'wpfunosImport' ), 10, 1 );
    add_action( 'wpfunos-entrada-servicios', array( $this, 'wpfunosEntradaServicios') );
    add_action( 'wpfunos-entrada-aseguradoras', array( $this, 'wpfunosEntradaAseguradoras') );
    add_action( 'wpfunos_update phone', array( $this, 'wpfunosUpdatePhone' ), 10, 1 );
    add_filter( 'wpfunos_reserved_email', array( $this, 'wpfunosReservedEmailAction' ) );
    add_filter( 'wpfunos_ip_visits', array( $this, 'wpfunos_visitas_IP' ), 10, 3 );
    add_filter( 'wpfunos_count_visits', array( $this, 'wpfunos_contador_visitas' ), 10, 3 );
    add_filter( 'wpfunos_dumplog', array ( $this, 'dumpPOST'), 10, 1);
    add_filter( 'wpfunos_userIP', array( $this, 'wpfunosgetUserIP' ) );
    add_filter( 'wpfunos_userID', array( $this, 'wpfunosGetUserid' ), 10, 1 );
    add_filter( 'wpfunos_comentario', array( $this, 'wpfunosFormatoComentario' ), 10, 1 );
    add_filter( 'wpfunos_crypt', array( $this, 'wpfunosCrypt' ), 10, 2 );
    add_filter( 'wpfunos_shortener', array( $this, 'wpfunosShortener' ), 10, 1 );
    add_filter( 'wpfunos_message_format', array( $this, 'wpfunosMessageFormat' ), 10, 2 );

    add_action( 'wp_footer', array( $this, 'wpfunos_SIWG_init' ), 10, 1 );
    add_action( 'wp_ajax_nopriv_wpfunos-SIWG-google-login', array( $this, 'wpfunos_SIWG_google_login' ), 10, 1 );
  }
  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-utils.css', array(), $this->version, 'all' );
  }
  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-utils.js', array( 'jquery' ), $this->version, false );
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
  public function wpfunosReservedEmailAction() {
    if (! is_user_logged_in()) return false;
    $current_user = wp_get_current_user();
    $opcion = get_option( 'wpfunos_DireccionesIPDesarrollo' );
    $direcciones = explode ( ",", $opcion );
    $this->custom_logs( $this->dumpPOST('==============') );
    $this->custom_logs( $this->dumpPOST('ReservedEmailAction') );
    $this->custom_logs( $this->dumpPOST('current_user->user_email: ' . $current_user->user_email ) );
    foreach( $direcciones as $direccion ) {
      $direccion = trim( $direccion );
      if( $direccion == $current_user->user_email )return true;
    }
    return false;
  }

  /**
  * Utility: Si es un usuario conectado, actualizar su número de teléfono
  * do_action('wpfunos_update phone',$_GET['telefonoUsuario']);
  */
  public function wpfunosUpdatePhone( $telefono ) {
    if (! is_user_logged_in()) return;
    $user_id = get_current_user_id();
    //Solucion emergencia
    if( 7 == $user_id || 1 == $user_id) return;
    update_user_meta( $user_id, 'wpfunos_telefono', $telefono );
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
      while ( $my_query->have_posts() ) :
        $my_query->the_post();
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
  *
  */
  public function wpfunosEntradaServicios(){
    $userIP = $this->wpfunosgetUserIP();
    $referer = sanitize_text_field( $_SERVER['HTTP_REFERER'] );
    $this->custom_logs( $this->dumpPOST('==============') );
    $this->custom_logs( $this->dumpPOST('1. - Entrada Comparador Servicios') );
    $this->custom_logs( $this->dumpPOST('userIP: ' . $userIP) );
    $this->custom_logs( $this->dumpPOST('referer: ' . substr($referer,0,150) ) );
    $args = array(
      'post_status' => 'publish',
      'post_type' => 'pag_serv_wpfunos',
      'posts_per_page' => -1,
      'meta_key' =>  'wpfunos_entradaServiciosIP',
      'meta_value' => $userIP,
    );
    $post_list = get_posts( $args );
    $contador = 1;
    if( $post_list ){
      foreach ( $post_list as $post ) :
        $contador++;
      endforeach;
      wp_reset_postdata();
    }
    $my_post = array(
      'post_title' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
      'post_type' => 'pag_serv_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        $this->plugin_name . '_entradaServiciosIP' => $userIP ,
        $this->plugin_name . '_entradaServiciosReferer' => $referer,
        $this->plugin_name . '_entradaServiciosVisitas' => $contador,
        $this->plugin_name . '_Dummy' => true,
      ),
    );
    //$post_id = 'loggedin';
    $reserved = apply_filters('wpfunos_reserved_email','dummy');
    if( ! $reserved ) $post_id = wp_insert_post($my_post);
    $this->custom_logs( $this->dumpPOST('Post ID: ' . $post_id ) );
    $this->custom_logs( $this->dumpPOST('Visitas: ' . $contador ) );
    return;
  }

  /**
  *
  */
  public function wpfunosEntradaAseguradoras(){
    $userIP = $this->wpfunosgetUserIP();
    $referer = sanitize_text_field( $_SERVER['HTTP_REFERER'] );
    $this->custom_logs( $this->dumpPOST('==============') );
    $this->custom_logs( $this->dumpPOST('1. - Entrada Comparador Aseguradoras') );
    $this->custom_logs( $this->dumpPOST('userIP: ' . $userIP) );
    $this->custom_logs( $this->dumpPOST('referer: ' . substr($referer,0,150) ) );
    $args = array(
      'post_status' => 'publish',
      'post_type' => 'pag_aseg_wpfunos',
      'posts_per_page' => -1,
      'meta_key' =>  'wpfunos_entradaAseguradorasIP',
      'meta_value' => $userIP,
    );
    $post_list = get_posts( $args );
    $contador = 1;
    if( $post_list ){
      foreach ( $post_list as $post ) :
        $contador++;
      endforeach;
      wp_reset_postdata();
    }
    $my_post = array(
      'post_title' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
      'post_type' => 'pag_aseg_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        $this->plugin_name . '_entradaAseguradorasIP' => $userIP ,
        $this->plugin_name . '_entradaAseguradorasReferer' => $referer,
        $this->plugin_name . '_entradaAseguradorasVisitas' => $contador,
        $this->plugin_name . '_Dummy' => true,
      ),
    );
    $reserved = apply_filters('wpfunos_reserved_email','dummy');
    if( ! $reserved ) $post_id = wp_insert_post($my_post);
    $this->custom_logs( $this->dumpPOST('Post ID: ' . $post_id ) );
    $this->custom_logs( $this->dumpPOST('Visitas: ' . $contador ) );
    return;
  }

  /**
  *
  */
  public function wpfunos_contador_visitas( $cpt = 'pag_serv_wpfunos', $campoVisitas = "wpfunos_entradaServiciosVisitas", $campoIP = "wpfunos_entradaServiciosIP" ){
    $args = array(
      'post_status' => 'publish',
      'post_type' => $cpt,
      'posts_per_page' => -1,
    );
    $post_list = get_posts( $args );
    if( $post_list ){
      foreach ( $post_list as $post ) :
        $ip = get_post_meta( $post->ID, $campoIP, true );
        $argsip = array(
          'post_status' => 'publish',
          'post_type' => $cpt,
          'posts_per_page' => -1,
          'meta_key' =>  $campoIP,
          'meta_value' => $ip,
          'orderby' => 'date',
          'order'   => 'ASC',
        );
        $post_list_ip = get_posts( $argsip );
        $contador = 0;
        if( $post_list_ip ){
          foreach ( $post_list_ip as $post_ip ) :
            $contador++;
            update_post_meta( $post_ip->ID, $campoVisitas, $contador );
          endforeach;
          wp_reset_postdata();
        }
      endforeach;
      wp_reset_postdata();
    }
  }

  /**
  *
  */
  public function wpfunos_visitas_IP ( $ip, $cpt = 'pag_serv_wpfunos', $campoIP = "wpfunos_entradaServiciosIP" ){
    $argsip = array(
      'post_status' => 'publish',
      'post_type' => $cpt,
      'posts_per_page' => -1,
      'meta_key' =>  $campoIP,
      'meta_value' => $ip,
    );
    $post_list_ip = get_posts( $argsip );
    $contador = 0;
    if( $post_list_ip ){
      foreach ( $post_list_ip as $post_ip ) :
        $contador++;
      endforeach;
      wp_reset_postdata();
    }
    return $contador;
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
  public function wpfunosShortener($original_url){
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

  /*
  * Utility: Format email message: add_filter( 'wpfunos_message_format', array( $this, 'wpfunosMessageFormat' ), 10, 2 );
  * $message = message to be formated.
  * $title = title of the message
  *
  * $message = apply_filters( 'wpfunos_message_format', $message, $title );
  */
  public function wpfunosMessageFormat( $message, $title='funos' ){
    if( strpos( $message, '<head>' ) ) return;
    $contenido = '<!doctype html>
    <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>' . $title . '</title>
    </head>
    <body>' . $message . '</body></html>';
    return $contenido;
  }

  /*
  * Utility: Sign in With Google
  * Description: This utility is for one-tap google sign in.
  *
  * https://adnan-tech.com/develop-a-wordpress-plugin-to-sign-in-with-google-php/
  * https://developers.google.com/identity/gsi/web/guides/overview
  */
  public function wpfunos_SIWG_init(){
    $pagina = get_the_ID();
    if( 1734 !== $pagina ) return false;
    if (is_user_logged_in()) return false;

    echo '<script src="https://accounts.google.com/gsi/client" async defer></script>
    <div id="g_id_onload"
    data-client_id="336511646507-dejbd1hln47qavqi0ncnq6hd0v2pdafl.apps.googleusercontent.com"
    data-context="use"
    data-callback="wpfunos_SIWG_googleLoginEndpoint"
    data-close_on_tap_outside="false">
    </div>';
  }

  /*
  * Utility: Sign in With Google
  * Description: a function that will handle the AJAX request
  *
  */
  public function wpfunos_SIWG_google_login(){
    // secure credential value from AJAX
    $credential = sanitize_text_field($_POST["credential"]);
    // verify the ID token
    $curl = curl_init( 'https://oauth2.googleapis.com/tokeninfo?id_token=' . $credential );
    curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
    $response = curl_exec( $curl );
    curl_close( $curl );
    // convert the response from JSON string to object
    $response = json_decode($response);
    // if there is any error, send the error back to client
    if (isset($response->error)){
      wp_send_json_error($response->error_description);
    }else{
      // check if user already exists in WordPress users
      $user_id = username_exists( $response->email );
      if ( ! $user_id && !email_exists( $response->email ) ){
        // user does not exists
        // generate a random hashed password
        $random_password = wp_generate_password( $length = 12, $include_standard_special_chars = false );
        // insert the user as WordPress user
        $user_id = wp_insert_user([
          "user_email" => $response->email,
          "user_pass" => $random_password,
          "user_login" => $response->email,
          "display_name" => $response->name,
          "nickname" => $response->name,
          "first_name" => $response->given_name,
          "last_name" => $response->family_name
        ]);
        update_user_meta( $user_id, 'wpfunos_fecha_inicial', date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ) );
      }
      // do login
      $user = get_user_by('login', $response->email );
      if ( !is_wp_error( $user ) ){
        wp_clear_auth_cookie();
        wp_set_current_user ( $user->ID );
        wp_set_auth_cookie  ( $user->ID );
        update_user_meta( $user->ID, "SIWG_profile_picture", $response->picture);
        update_user_meta( $user->ID, 'wpfunos_fecha_ultima', date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ) );
      }
      wp_send_json_success( $response );
    }
  }

}
