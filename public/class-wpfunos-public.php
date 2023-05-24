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
    add_shortcode( 'wpfunos-datos-usuario', array( $this, 'wpfunosDatosUsuarioShortcode' ));
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
      $nombreUsuario = do_shortcode ('[field id="Nombre"]');
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
      do_action('wpfunos_log', $userIP.' - '.'$Telefono: ' . $fields['telefono'] );
      do_action('wpfunos_log', $userIP.' - '.'cookielawinfo-checkbox-advertisement: ' . $_COOKIE['cookielawinfo-checkbox-advertisement']  );
      do_action('wpfunos_log', $userIP.' - '.'cookielawinfo-checkbox-analytics: ' . $_COOKIE['cookielawinfo-checkbox-analytics']  );
      do_action('wpfunos_log', $userIP.' - '.'cookielawinfo-checkbox-functional: ' . $_COOKIE['cookielawinfo-checkbox-functional']  );
      do_action('wpfunos_log', $userIP.' - '.'cookielawinfo-checkbox-necessary: ' . $_COOKIE['cookielawinfo-checkbox-necessary']  );
      do_action('wpfunos_log', $userIP.' - '.'cookielawinfo-checkbox-non-necessary: ' . $_COOKIE['cookielawinfo-checkbox-non-necessary']  );
      do_action('wpfunos_log', $userIP.' - '.'cookielawinfo-checkbox-others: ' . $_COOKIE['cookielawinfo-checkbox-others']  );
      do_action('wpfunos_log', $userIP.' - '.'cookielawinfo-checkbox-performance: ' . $_COOKIE['cookielawinfo-checkbox-performance']  );

      $this->wpfunosVisitasEntrada(array( 'tipo' => '6'));

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

      $telSMS = sanitize_text_field( str_replace( array( '-', ' ' ), '', $fields['telefono'] ) );
      if(substr($telSMS,0,1) == '+'){
        $telSMS = str_replace("+","",$telSMS );
      }else{
        $telSMS = '34'.$telSMS;
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
      //do_action('wpfunos_log', $userIP.' - '.'$request: ' . $request );

      $SMS = wp_remote_post( 'https://api.gateway360.com/api/3.0/sms/send', array(
        'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
        'body'        => $request,
        'method'      => 'POST',
      ));

      $userAPIMessage = apply_filters('wpfunos_dumplog', $SMS['body'] );
      do_action('wpfunos_log', $userIP.' - '.'Body Respuesta: ' . $userAPIMessage  );
      //
      $expiry = strtotime('+1 year');
      //
      if( isset( $_COOKIE['wpfu'] ) ){
        $wpfu = json_decode( apply_filters( 'wpfunos_crypt', $_COOKIE['wpfu'], 'd' ) );
        //do_action('wpfunos_log', $userIP.' - '.'wpfu: ' .apply_filters('wpfunos_dumplog', $wpfu ) );
        $wpfu->name = $fields['Nombre'];
        $wpfu->email = $fields['email'];
        $wpfu->phone = $fields['telefono'];
        $codigo = apply_filters( 'wpfunos_crypt', json_encode($wpfu), 'e' );
        setcookie('wpfu', $codigo,  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      }

    }// if( "TeLlamamosGratisLandings" == $form_name || "AsesoramientoGratuito" == $form_name || "TeLlamamosGratis" == $form_name )

    if( $form_name == 'FormularioDatosAseguradoras' ){
      // do_action('wpfunos_log', 'Fields: ' . $fields );
      $IDusuario = apply_filters('wpfunos_userID', $fields['referencia'] );
      if( $IDusuario != 0 ) {
        mt_srand(time());
        $fields['referencia'] = 'funos-'.(string)mt_rand();
      }

      $fields['telefono'] = apply_filters('wpfunos_telefono_formateado', $fields['telefono'] );

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
    //$userIP = apply_filters('wpfunos_userIP','dummy');
    //do_action('wpfunos_log', '==============' );
    //do_action('wpfunos_log', $userIP.' - '.'wpfunosVisitasEntrada Tipo: ' .$record['tipo'] );
    if( !isset ( $record['tipo'] ) ) return;

    global $wpdb;
    $table_name = $wpdb->prefix . 'wpf_visitas';

    $version = get_option( "wpf_db_version" );
    $ip = apply_filters('wpfunos_userIP','dummy');
    $referer = sanitize_text_field( $_SERVER['HTTP_REFERER'] );
    $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
    $logged = (is_user_logged_in()) ? 'logged' : 'not logged';
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
    $wpfads = ( isset( $_COOKIE['cookielawinfo-checkbox-advertisement'] ) ) ? $_COOKIE['cookielawinfo-checkbox-advertisement'] : '' ;
    $wpfana = ( isset( $_COOKIE['cookielawinfo-checkbox-analytics'] ) ) ?     $_COOKIE['cookielawinfo-checkbox-analytics'] : '' ;
    $wpffun = ( isset( $_COOKIE['cookielawinfo-checkbox-functional'] ) ) ?    $_COOKIE['cookielawinfo-checkbox-functional'] : '' ;
    $wpfnec = ( isset( $_COOKIE['cookielawinfo-checkbox-necessary'] ) ) ?     $_COOKIE['cookielawinfo-checkbox-necessary'] : '' ;
    $wpfnon = ( isset( $_COOKIE['cookielawinfo-checkbox-non-necessary'] ) ) ? $_COOKIE['cookielawinfo-checkbox-non-necessary'] : '' ;
    $wpfoth = ( isset( $_COOKIE['cookielawinfo-checkbox-others'] ) ) ?        $_COOKIE['cookielawinfo-checkbox-others'] : '' ;
    $wpfper = ( isset( $_COOKIE['cookielawinfo-checkbox-performance'] ) ) ?   $_COOKIE['cookielawinfo-checkbox-performance'] : '' ;

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
        'wpfads' => $wpfads,
        'wpfana' => $wpfana,
        'wpffun' => $wpffun,
        'wpfnec' => $wpfnec,
        'wpfnon' => $wpfnon,
        'wpfoth' => $wpfoth,
        'wpfper' => $wpfper,
        'contador' => $contador,
      )
    );
  }

  /*********************************/
  /*****  DATOS USUARIO       ******/
  /*********************************/
  /**
  * add_shortcode( 'wpfunos-datos-usuario', array( $this, 'wpfunosDatosUsuarioShortcode' ));
  * Shortcode [wpfunos-datos-usuario dato="Nombre"]
  */
  public function wpfunosDatosUsuarioShortcode( $atts, $content = "" ) {
    $a = shortcode_atts( array(
      'dato'=>'',
    ), $atts );
    if( isset( $_COOKIE['wpfu'] ) ){
      $wpfu = json_decode( apply_filters( 'wpfunos_crypt', $_COOKIE['wpfu'], 'd' ) );
      if( $wpfu->phone == '' ) $wpfu->phone = '+34';
      switch ( $a['dato'] ) {
        case 'Nombre': return $wpfu->name ; break;
        case 'email': return $wpfu->email ; break;
        case 'telefono': return $wpfu->phone ; break;
      }
    }
  }


}
