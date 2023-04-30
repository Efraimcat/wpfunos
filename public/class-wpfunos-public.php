<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* The public-facing functionality of the plugin.
*
* @link       https://github.com/Efraimcat/wpfunos/
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
* 5 - Usuario pide presupuesto servicios
* 6 - Usuario pulsa botón "que me llamen" en resultados aseguradoras
* 7 - Usuario pulsa botón "llamar" en resultados aseguradoras
* 8 - Usuario pide presupuesto aseguradoras
* 9 - Usuario pide correo detalles
*/

require_once 'class-wpfunos-public-form-validation.php';

class Wpfunos_Public {

  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
    add_shortcode( 'wpfunos-mensaje-usuario-correo-popup', array( $this, 'wpfunosCorreoUsuarioPopupShortcode' ));
    add_shortcode( 'wpfunos-financiacion', array( $this, 'wpfunosFinanciacionShortcode' ));
    add_shortcode( 'wpfunos-resultados', array( $this, 'wpfunosResultadosShortcode' ));
    add_action( 'elementor_pro/forms/new_record', array( $this, 'wpfunosFormNewrecord' ), 10, 2 );
    add_action( 'wpfunos-visitas-entrada', array( $this, 'wpfunosVisitasEntrada' ), 10, 1 );

    $this->form_validation = new Wpfunos_Public_Form_Validation();
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
  * Shortcode [wpfunos-mensaje-usuario-correo-popup]
  */
  public function wpfunosCorreoUsuarioPopupShortcode( $atts, $content = "" ) {
    if ( get_option('wpfunos_activarCorreoUsuarioContacto') ){
      $mensaje = get_option('wpfunos_mensajeCorreoUsuarioContacto');
      $nombreUsuario = do_shortcode ('[field id="nombre"]');
      $telefonoUsuario = do_shortcode ('[field id="telefono"]');
      $Email = do_shortcode ('[field id="email"]');
      $mensaje = str_replace( '[nombreUsuario]' , $nombreUsuario , $mensaje );
      $mensaje = str_replace( '[telefonoUsuario]' , $telefonoUsuario , $mensaje );
      $mensaje = str_replace( '[Email]' , $Email , $mensaje );
      return $mensaje;
    }
  }

  /**
  * Shortcode [wpfunos-financiacion]
  */
  public function wpfunosFinanciacionShortcode( $atts, $content = "" ) {
    ElementorPro\Modules\Popup\Module::add_popup_to_location( '111305' );
  }

  /**
  * Shortcode [wpfunos-resultados]
  */
  public function wpfunosResultadosShortcode( $atts, $content = "" ) {
    $a = shortcode_atts( array(
      'boton'=>'',
    ), $atts );
    $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
    $seleccion = get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true );
    $respuesta = (explode(',',$seleccion));
    switch ( $a['boton'] ) {
      case '2':	echo( '<span id="wpf-texto-poblacion">'.strtr($respuesta[0],"+",",").'</span>' ); break;
      case '8': echo( '<span id="wpf-texto-poblacion">'.$respuesta[3].'</span>' );break; //Año de nacimiento
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

    $raw_fields = $record->get( 'fields' );
    $fields = [];
    foreach ( $raw_fields as $id => $field ) {
      $fields[ $id ] = $field['value'];
    }

    if( "TeLlamamosGratisLandings" == $form_name || "AsesoramientoGratuito" == $form_name || "TeLlamamosGratis" == $form_name ){
      //https://funoslink.net/decM
      $userIP = apply_filters('wpfunos_userIP','dummy');
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - '.'Enviar SMS' );
      do_action('wpfunos_log', $userIP.' - '.'$IP: ' . $userIP );
      do_action('wpfunos_log', $userIP.' - '.'$Telefono: ' . $fields['telefono'] );

      $request = '{
        "api_key":"4b66b40a110c408e8651eb971591f03e",
        "report_url":"https://funos.es/",
        "concat":1,
        "messages":[
          {
            "from":"34606902525",
            "to":"[numero_SMS]",
            "text":"FUNOS, el comparador de precios de funerarias.\\nEn breve te contactamos.\\nNos puedes llamar a este teléfono\\nO contactar por WhatsApp: https://wa.me/message/TTW45ZJEQWZGK1",
            "send_at": "[fecha1]"
          },
          {
            "from":"34606902525",
            "to":"[numero_SMS]",
            "text":"Descuento 50% en las principales funerarias. Asesoramiento profesional. Te ayudamos en todo.\\nGestoría gratis.\\nValoración 5* en Google.\\nLee las reseñas: [enlace_SMS]",
            "send_at": "[fecha2]"
          }
        ]
      }';

      $telSMS = str_replace(" ","", $fields['telefono'] );
      $telSMS = str_replace("-","",$telSMS );
      if(substr($telSMS,0,1) == '+'){
        $telSMS = str_replace("+","",$telSMS );
      }else{
        $telSMS = '34'.$telSMS ;
      }
      if( site_url() === 'https://dev.funos.es'){
        $telSMS = '34690074497';
      }
      //
      $request = str_replace ( '[numero_SMS]' , $telSMS , $request );
      $request = str_replace ( '[enlace_SMS]' , "https://funoslink.net/decM", $request );
      //
      $date1 = new DateTime("now", new DateTimeZone('Europe/Madrid'));
      $date2 = new DateTime("now", new DateTimeZone('Europe/Madrid'));
      $date2->add(new DateInterval('PT5S'));
      //
      $request = str_replace ( '[fecha1]' , $date1->format("Y-m-d H:i:s") , $request );
      $request = str_replace ( '[fecha2]' , $date2->format("Y-m-d H:i:s") , $request );
      //
      do_action('wpfunos_log', $userIP.' - '.'$request: ' . $request );

      $SMS = wp_remote_post( 'https://api.gateway360.com/api/3.0/sms/send', array(
        'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
        'body'        => $request,
        'method'      => 'POST',
      ));

      $userAPIMessage = apply_filters('wpfunos_dumplog', $SMS['body'] );
      do_action('wpfunos_log', $userIP.' - '.'Body Respuesta: ' . $userAPIMessage  );
      //
      $expiry = strtotime('+1 month');
      if( ! isset( $_COOKIE['wpfn'] ) ) setcookie('wpfn', sanitize_text_field($fields['nombre']), ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      if( ! isset( $_COOKIE['wpfe'] ) ) setcookie('wpfe', sanitize_text_field($fields['email']), ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      if( ! isset( $_COOKIE['wpft'] ) ) setcookie('wpft', sanitize_text_field($fields['telefono']), ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      //
      do_action('wpfunos-visitas-entrada',array( 'tipo' => '6', ) );

      // Clientify
      if( get_option('wpfunos_APIClientifyActivaClientify') ){
        do_action('wpfunos_log', $userIP.' - '.'==> Envio Clientify Quiero que me llamen' );
        $timeFirst  = strtotime('now');

        $contacts = apply_filters('wpfclientify-show-contacts', array( "email" => $fields['email'], "phone" => $fields['telefono'], "nombre" => $fields['nombre'] ) );
        do_action('wpfunos_log', $userIP.' - '.'$contacts: ' . $contacts );

        if( $contacts == ''){
          do_action('wpfunos_log', $userIP.' - '.'Nuevo usuario. ');
          $contacts = apply_filters('wpfclientify-create-contact', array( "email" => $fields['email'], "phone" => $fields['telefono'], "nombre" => $fields['nombre'] ) );
        }else{
          do_action('wpfunos_log', $userIP.' - '.'Usuario ya existente');
        }
        do_action('wpfunos_log', $userIP.' - '.'ID usuario: ' . $contacts );

        $deals = apply_filters('wpfclientify-create-deal',
        array(
          "email" => $fields['email'],
          "nombre" => $fields['nombre'],
          "clientID" => $contacts,
          "form_name" => $form_name,
          "origen" => 'Formulario te llamamos'
        ));
        do_action('wpfunos_log', $userIP.' - '.'ID deal: ' . $deals );

        $total = strtotime('now') - $timeFirst ;
        do_action('wpfunos_log', $userIP.' - '.'Envio Clientify Quiero que me llamen END: '.$total.' sec.');
      }
      // END Clientify

    }// if( "TeLlamamosGratisLandings" == $form_name || "AsesoramientoGratuito" == $form_name || "TeLlamamosGratis" == $form_name )

    if( $form_name == 'FormularioDatosAseguradoras' ){
      // do_action('wpfunos_log', 'Fields: ' . $fields );
      $IDusuario = apply_filters('wpfunos_userID', $fields['referencia'] );
      if( $IDusuario != 0 ) {
        mt_srand(time());
        $fields['referencia'] = 'funos-'.(string)mt_rand();
      }
      $tel = str_replace(" ","", $fields['telefono'] );
      $tel = str_replace("-","",$tel);
      if(substr($tel,0,1) == '+'){
        $fields['telefono'] =  substr($tel,0,3).' '. substr($tel,3,3).' '. substr($tel,6,2).' '. substr($tel,8,2) .' '. substr($tel,10,2);;
      }else{
        $fields['telefono'] =  substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
      }

      if( strlen( $fields['telefono']) < 3 ) return;

      $userIP = apply_filters('wpfunos_userIP','dummy');

      $URL = home_url().'/compara-precios-aseguradoras?address%5B%5D=' .str_replace(" ","+", $fields['address'] ). '&post%5B%5D=' .$fields['post']. '&distance=' .$fields['distance']. '&units=' .$fields['units']. '&page1=&per_page=50&lat=' .$fields['lat']. '&lng=' .$fields['lng']. '&form=3&action=fs&wpf=' .$fields['wpf'];

      $userURL = apply_filters('wpfunos_shortener', $URL );
      //$userURL = $URL;
      $textoaccion = "Entrada datos aseguradoras";
      //if( $_COOKIE['wpfunosloggedin'] == 'yes' ) $textoaccion = "Acción Usuario Desarrollador";
      if( apply_filters('wpfunos_reserved_email','Entrada datos aseguradoras') ) $textoaccion = "Acción Usuario Desarrollador";
      $args = array(
        'post_status' => 'publish',
        'post_type' => 'usuarios_wpfunos',
        'posts_per_page' => -1,
        'meta_query' => array(
          'relation' => 'AND',
          array( 'key' => 'wpfunos_userIP', 'value' => $userIP, 'compare' => '=', ),
          array( 'key' => 'wpfunos_userAccion', 'value' => '3', 'compare' => '=', ),
        ),
      );
      $post_list = get_posts( $args );

      $contador = 1;
      if( $post_list ){
        $contador=count($post_list)+1;
        wp_reset_postdata();
      }

      $referer = sanitize_text_field( $_SERVER['HTTP_REFERER'] );
      $log = (is_user_logged_in()) ? 'logged' : 'not logged';
      $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
      $my_post = array(
        'post_title' => $fields['referencia'],
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => sanitize_text_field( $fields['email'] ),
          'wpfunos_userReferencia' => sanitize_text_field( $fields['referencia'] ),
          'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( $fields['address'] ),
          'wpfunos_userName' => sanitize_text_field( $fields['Nombre'] ),
          'wpfunos_userSurname' => sanitize_text_field( $fields['Apellidos'] ),
          'wpfunos_userPhone' => sanitize_text_field( $fields['telefono'] ),
          'wpfunos_userSeguro' => sanitize_text_field( $fields['Seguro'] ),
          'wpfunos_userCP' => sanitize_text_field( $fields['CP'] ),
          'wpfunos_userAccion' => '3',
          'wpfunos_userNombreAccion' => sanitize_text_field( $textoaccion ),
          'wpfunos_userSeleccion' => sanitize_text_field( str_replace(",","+",$fields['address']).', '.$fields['distance'].', ' . $fields['sexo']. ', '. (int)$fields['nacimiento']  ),
          'wpfunos_userIP' => sanitize_text_field( $userIP ),
          'wpfunos_userReferer' => sanitize_text_field( $referer ),
          'wpfunos_userwpf' => sanitize_text_field( $fields['wpf'] ),
          'wpfunos_userURL' => sanitize_text_field( $userURL ),
          'wpfunos_userURLlarga' => sanitize_text_field( $URL ),
          'wpfunos_userAceptaPolitica' => '1',
          'wpfunos_userLAT' => sanitize_text_field( $fields['lat'] ),
          'wpfunos_userLNG' => sanitize_text_field( $fields['lng'] ),
          'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
          'wpfunos_userVisitas' => $contador,
          'wpfunos_Dummy' => true,
          'IDstamp' => $_COOKIE[ 'wpfid' ],
          'wpfunos_userLog' => $log,
          'wpfunos_userMobile' => $mobile,
        ),
      );
      $post_id = wp_insert_post($my_post);

      // wpfunos-visitas-entrada
      do_action('wpfunos-visitas-entrada',array(
        'tipo' => '2',
        'nombre' => sanitize_text_field( $fields['Nombre'] ),
        'email' => sanitize_text_field( $fields['email'] ),
        'telefono' => sanitize_text_field( $fields['telefono'] ),
        'postID' => $post_id,
        'poblacion' => sanitize_text_field( $fields['address'] ),
        'nacimiento' => sanitize_text_field( $fields['nacimiento'] ),
        'cp' => sanitize_text_field( $fields['CP'] ),
      ) );
      //
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - '.'Recogida datos usuario' );
      do_action('wpfunos_log', $userIP.' - '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
      do_action('wpfunos_log', $userIP.' - '.'mobile: ' . $mobile);
      do_action('wpfunos_log', $userIP.' - '.'logged: ' .$log  );
      do_action('wpfunos_log', $userIP.' - '.'cookie wpfe: ' . $_COOKIE['wpfe']);
      do_action('wpfunos_log', $userIP.' - '.'cookie wpfn: ' . $_COOKIE['wpfn']);
      do_action('wpfunos_log', $userIP.' - '.'cookie wpft: ' . $_COOKIE['wpft']);
      do_action('wpfunos_log', $userIP.' - '.'Nombre: ' .  $fields['Nombre']  );
      do_action('wpfunos_log', $userIP.' - '.'Post ID: ' .  $post_id  );
      do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $fields['referencia'] );
      do_action('wpfunos_log', $userIP.' - '.'Telefono: ' . $fields['telefono'] );
    }// if( $form_name == 'FormularioDatosAseguradoras' )
  } // public function wpfunosFormNewrecord($record, $handler)

  /**
  *
  * add_action( 'wpfunos-visitas-entrada', array( $this, 'wpfunosVisitasEntrada' ), 10, 1 );
  *
  */
  public function wpfunosVisitasEntrada($record){
    if( !isset ( $record['tipo'] ) ) return;

    global $wpdb;
    $table_name = $wpdb->prefix . 'wpf_visitas';

    $version = get_option( "wpf_db_version" );
    $ip = apply_filters('wpfunos_userIP','dummy');
    $referer = sanitize_text_field( $_SERVER['HTTP_REFERER'] );
    $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
    $logged = (is_user_logged_in()) ? 'logged' : 'not logged';

    $wpfn = (isset($_COOKIE['wpfn'])) ? $_COOKIE['wpfn'] : '';
    $wpfe = (isset($_COOKIE['wpfe'])) ? $_COOKIE['wpfe'] : '';
    $wpft = (isset($_COOKIE['wpft'])) ? $_COOKIE['wpft'] : '';

    $nombre = (isset($record['nombre'])) ? $record['nombre'] : '';
    $email = (isset($record['email'])) ? $record['email'] : '';
    $telefono = (isset($record['telefono'])) ? $record['telefono'] : '';
    $wpfresp1 = (isset($record['wpfresp1'])) ? $record['wpfresp1'] : '';
    $wpfresp2 = (isset($record['wpfresp2'])) ? $record['wpfresp2'] : '';
    $wpfresp3 = (isset($record['wpfresp3'])) ? $record['wpfresp3'] : '';
    $wpfresp4 = (isset($record['wpfresp4'])) ? $record['wpfresp4'] : '';
    $postID = (isset($record['postID'])) ? $record['postID'] : '';
    $servicio = (isset($record['servicio'])) ? $record['servicio'] : '';
    $poblacion = (isset($record['poblacion'])) ? $record['poblacion'] : '';
    $nacimiento = (isset($record['nacimiento'])) ? $record['nacimiento'] : '';
    $cuando = (isset($record['cuando'])) ? $record['cuando'] : '';
    $cp = (isset($record['cp'])) ? $record['cp'] : '';

    // [REQUIRED] define $items array
    // notice that last argument is ARRAY_A, so we will retrieve array
    $results = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table_name WHERE tipo = %s AND ip = %s", $record['tipo'], $ip ), ARRAY_A);
    $contador = 1;
    if( $results ) $contador=count($results)+1;

    $wpdb->insert(
      $table_name,
      array(
        'time' => current_time( 'mysql' ),
        'version' => $version,
        'tipo' => $record['tipo'],
        'wpfn' => $wpfn,
        'wpfe' => $wpfe,
        'wpft' => $wpft,
        'nombre' => $nombre,
        'email' => $email,
        'telefono' => $telefono,
        'ip' => $ip,
        'referer' => $referer,
        'mobile' => $mobile,
        'logged' => $logged,
        'wpfresp1' => $wpfresp1,
        'wpfresp2' => $wpfresp2,
        'wpfresp3' => $wpfresp3,
        'wpfresp4' => $wpfresp4,
        'postID' => $postID,
        'servicio' => $servicio,
        'poblacion' => $poblacion,
        'nacimiento' => $nacimiento,
        'cuando' => $cuando,
        'cp' => $cp,
        'contador' => $contador,
      )
    );
  }

}
