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
/**
* CODIGOS MODULOS
*
* 0000 //uncategorized
*
* 0100 //class-wpfunos-public.php
* 0101 //class-wpfunos-public-form-validation.php
*
* 0200 //class-wpfunos-aseguradoras.php
*
* 0300 //class-wpfunos-directorio.php
* 0301 //class-wpfunos-directorio-defunciones-list-table.php
* 0302 //class-wpfunos-directorio-shortcodes.php
* 0303 //class-wpfunos-directorio-widgets.php
*
* 0400 //class-wpfunos-precios-poblacion.php
*
* 0500 //class-wpfunos-serviciosv3.php
* 0501 //class-wpfunos-serviciosv3-AJAX.php
*
* 0600 //class-wpfunos-utils.php
*
* 2000 //wpfAPI
*
* 3000 //wpfhubspot
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
      do_action('wpfunos_log', $userIP.' - 0100 '.'Enviar SMS' );
      do_action('wpfunos_log', $userIP.' - 0100 '.'$Telefono: ' . $fields['telefono'] );
      //do_action('wpfunos_log', $userIP.' - 0100 '.'cookielawinfo-checkbox-advertisement: ' . $_COOKIE['cookielawinfo-checkbox-advertisement']  );
      do_action('wpfunos_log', $userIP.' - 0100 '.'cookielawinfo-checkbox-analytics: ' . $_COOKIE['cookielawinfo-checkbox-analytics']  );
      //do_action('wpfunos_log', $userIP.' - 0100 '.'cookielawinfo-checkbox-functional: ' . $_COOKIE['cookielawinfo-checkbox-functional']  );
      //do_action('wpfunos_log', $userIP.' - 0100 '.'cookielawinfo-checkbox-necessary: ' . $_COOKIE['cookielawinfo-checkbox-necessary']  );
      //do_action('wpfunos_log', $userIP.' - 0100 '.'cookielawinfo-checkbox-non-necessary: ' . $_COOKIE['cookielawinfo-checkbox-non-necessary']  );
      //do_action('wpfunos_log', $userIP.' - 0100 '.'cookielawinfo-checkbox-others: ' . $_COOKIE['cookielawinfo-checkbox-others']  );
      //do_action('wpfunos_log', $userIP.' - 0100 '.'cookielawinfo-checkbox-performance: ' . $_COOKIE['cookielawinfo-checkbox-performance']  );

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
      //do_action('wpfunos_log', $userIP.' - 0100 '.'$request: ' . $request );

      $SMS = wp_remote_post( 'https://api.gateway360.com/api/3.0/sms/send', array(
        'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
        'body'        => $request,
        'method'      => 'POST',
      ));

      $userAPIMessage = apply_filters('wpfunos_dumplog', $SMS['body'] );
      //do_action('wpfunos_log', $userIP.' - 0100 '.'Body Respuesta: ' . $userAPIMessage  );
      //
      $expiry = strtotime('+1 year');
      //
      if( isset( $_COOKIE['wpfu'] ) ){
        $wpfu = json_decode( apply_filters( 'wpfunos_crypt', $_COOKIE['wpfu'], 'd' ) );
        //do_action('wpfunos_log', $userIP.' - 0100 '.'wpfu: ' .apply_filters('wpfunos_dumplog', $wpfu ) );
        $wpfu->name = $fields['Nombre'];
        $wpfu->email = $fields['email'];
        $wpfu->phone = $fields['telefono'];
        $codigo = apply_filters( 'wpfunos_crypt', json_encode($wpfu), 'e' );
        setcookie('wpfu', $codigo,  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      }
      //HUBSPOT
      global $wp;
      if( "TeLlamamosGratisLandings" == $form_name ) $accion = 'Te llamamos gratis Landings';
      if( "AsesoramientoGratuito" == $form_name ) $accion = 'Asesoramiento gratuito';
      if( "TeLlamamosGratis" == $form_name ) $accion = 'Te llamamos gratis';
      $hubspotutk = ( isset( $_COOKIE['hubspotutk'] ) ) ? $_COOKIE['hubspotutk'] : '' ;
      $params = array(
        'nombre' => $fields['Nombre'],
        'email' => $fields['email'],
        'telefono' => $fields['telefono'],
        'ok' => 'ok',
        'accion' => $accion,
        'ip' => $userIP,
        'hubspotutk' => $hubspotutk,
        'pageUri' => $fields['PageUri'],
        'pageId' => $fields['PageName']
      );
      do_action('wpfhubspot-send-form', $params );
      do_action('wpfhubspot-usuarios',array( 'email' => $fields['email'], 'hubspotutk' => $hubspotutk ) );
      //sleep(1);
      //$params2 = array(
      //  'email' => $fields['email'],
      //  'ip' => $userIP,
      //  'ok' => 'ok',
      //  'hubspotutk' => $hubspotutk,
      //  'accion' => $accion,
      //  'pageUri' => $fields['PageUri'],
      //  'pageId' => $fields['PageName']
      //);
      //do_action('wpfhubspot-send-form', $params2 );

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0100 '.'Enviar Formulario Hubspot' );
      //HUBSPOT
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
      do_action('wpfunos_log', $userIP.' - 0100 '.'Recogida datos usuario' );
      do_action('wpfunos_log', $userIP.' - 0100 '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
      do_action('wpfunos_log', $userIP.' - 0100 '.'mobile: ' . $mobile);
      do_action('wpfunos_log', $userIP.' - 0100 '.'logged: ' .$log  );
      do_action('wpfunos_log', $userIP.' - 0100 '.'Nombre: ' .  $fields['Nombre']  );
      do_action('wpfunos_log', $userIP.' - 0100 '.'Post ID: ' .  $post_id  );
      do_action('wpfunos_log', $userIP.' - 0100 '.'referencia: ' . $fields['referencia'] );
      do_action('wpfunos_log', $userIP.' - 0100 '.'Telefono: ' . $fields['telefono'] );
    }// if( $form_name == 'FormularioDatosAseguradoras' )


    if( $form_name == 'FormularioPresupuesto' ){

      return;



      $userIP = apply_filters('wpfunos_userIP','dummy');
      $IDservicio = sanitize_text_field( $fields['IDservicio'] );
      $servicio = sanitize_text_field( $fields['Servicio'] );
      $precio = sanitize_text_field( $fields['Precio'] );
      $message = sanitize_text_field( $fields['mensajePresupuesto'] );
      $IDusuario = sanitize_text_field( $fields['wpfunosoculto'] );
      $email_usuario = sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userMail', true ) );

      //  EBG 03-11-22
      //$nombre = $_POST['nombre'];
      //$email = $_POST['email'];
      //$phone = $_POST['phone'];
      //$wpfcuando = $_POST['cuando'];

      if( $IDusuario != 0 ) {
        mt_srand(time());
        $referencia = 'funos-'.(string)mt_rand();
      }

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0100 '.'Servicio Boton Presupuesto' );
      do_action('wpfunos_log', $userIP.' - 0100 '.'Servicio titulo: ' . $servicio );
      do_action('wpfunos_log', $userIP.' - 0100 '.'$IDusuario: ' . $IDusuario );
      do_action('wpfunos_log', $userIP.' - 0100 '.'Servicio ' . $IDservicio );
      do_action('wpfunos_log', $userIP.' - 0100 '.'Mensaje: ' . $message );

      if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Presupuesto') ){

        switch( $_GET['cf']['resp1'] ) { case '1': $destino = 'E' ; $nombredestino = esc_html__('Entierro', 'wpfunos_es'); break; case '2': $destino = 'I' ; $nombredestino = esc_html__('Incineración', 'wpfunos_es'); break; }
        switch( $_GET['cf']['resp2'] ) { case '1': $ataud = 'M' ; $nombreataud = esc_html__('Ataúd medio', 'wpfunos_es'); break; case '2': $ataud = 'E' ; $nombreataud = esc_html__('Ataúd económico', 'wpfunos_es'); break; case '3': $ataud = 'P' ; $nombreataud = esc_html__('Ataúd premium', 'wpfunos_es'); break; }
        switch( $_GET['cf']['resp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = esc_html__('Velatorio', 'wpfunos_es') ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = esc_html__('Sin velatorio', 'wpfunos_es') ; break; }
        switch( $_GET['cf']['resp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = esc_html__('Sin ceremonia', 'wpfunos_es') ; break; case '2': $despedida = 'O' ; $nombredespedida = esc_html__('Solo sala', 'wpfunos_es') ; break; case '3': $despedida = 'C' ; $nombredespedida = esc_html__('Ceremonia civil', 'wpfunos_es') ; break; case '4': $despedida = 'R' ; $nombredespedida = esc_html__('Ceremonia religiosa', 'wpfunos_es') ; break; }
        $log = (is_user_logged_in()) ? 'logged' : 'not logged';
        $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';

        $my_post = array(
          'post_title' => $referencia,
          'post_type' => 'usuarios_wpfunos',
          'post_status'  => 'publish',
          'meta_input'   => array(
            'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
            'wpfunos_userMail' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userMail', true ) ),
            'wpfunos_userReferencia' => sanitize_text_field( $referencia ),
            'wpfunos_userName' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userName', true ) ),
            'wpfunos_userPhone' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userPhone', true ) ),
            'wpfunos_userCP' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userCP', true ) ),
            'wpfunos_userAccion' => '5',
            'wpfunos_userNombreAccion' => 'Botón pedir presupuesto',
            'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionUbicacion', true ) ),
            'wpfunos_userNombreSeleccionDistancia' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionDistancia', true ) ),
            'wpfunos_userNombreSeleccionServicio' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionServicio', true ) ),
            'wpfunos_userNombreSeleccionAtaud' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionAtaud', true ) ),
            'wpfunos_userNombreSeleccionVelatorio' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionVelatorio', true ) ),
            'wpfunos_userNombreSeleccionDespedida' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionDespedida', true ) ),
            'wpfunos_userServicio' => sanitize_text_field( $IDservicio ),
            'wpfunos_userServicioEnviado' => true,
            'wpfunos_userAceptaPolitica' => true,
            'wpfunos_userServicioTitulo' => sanitize_text_field( get_the_title( $IDservicio ) ),
            'wpfunos_userServicioEmpresa' => sanitize_text_field( get_post_meta( $IDservicio, 'wpfunos_servicioEmpresa', true ) ),
            'wpfunos_userServicioPoblacion' => sanitize_text_field( get_post_meta( $IDservicio, 'wpfunos_servicioPoblacion', true ) ),
            'wpfunos_userServicioProvincia' => sanitize_text_field( get_post_meta( $IDservicio, 'wpfunos_servicioProvincia', true ) ),
            'wpfunos_userPrecio' => number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€',
            'wpfunos_userComentarios' => wp_kses_post( $message ),
            'wpfunos_userIP' => sanitize_text_field( $userIP ),
            'wpfunos_userLAT' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userLAT', true ) ),
            'wpfunos_userLNG' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userLNG', true ) ),
            'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
            'wpfunos_Dummy' => true,
            'wpfunos_userLog' => $log,
            'wpfunos_userMobile' => $mobile,
          ),
        );

        $post_id = wp_insert_post($my_post);
        do_action('wpfunos_log', $userIP.' - 0100 '.'Post ID: ' .  $post_id  );

        if( get_option('wpfunos_activarCorreoPresupuestoLead') ){
          unset($headers);
          $headers[] = 'Content-Type: text/html; charset=UTF-8';
          $headers[] = 'From: funos <clientes@funos.es>';
          $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoPresupuestoLead'), get_option('wpfunos_asuntoCorreoPresupuestoLead') );

          $mensaje = str_replace( '[email]' , get_post_meta( $post_id , 'wpfunos_userMail', true ), $mensaje );
          $mensaje = str_replace( '[nombreUsuario]' , get_post_meta( $post_id , 'wpfunos_userName', true ) , $mensaje );
          $mensaje = str_replace( '[telefonoUsuario]' , get_post_meta( $post_id , 'wpfunos_userPhone', true ) , $mensaje );
          $mensaje = str_replace( '[referencia]' , $referencia , $mensaje );
          $mensaje = str_replace( '[IP]' , $userIP , $mensaje );
          $mensaje = str_replace( '[poblacion]' , get_post_meta( $post_id , 'wpfunos_userNombreSeleccionUbicacion', true ) , $mensaje );
          $mensaje = str_replace( '[CP]' , get_post_meta( $post_id , 'wpfunos_userCP', true ) , $mensaje );
          $mensaje = str_replace( '[destino]' , get_post_meta( $post_id, 'wpfunos_userNombreSeleccionServicio', true ) , $mensaje );
          $mensaje = str_replace( '[ataud]' , get_post_meta( $post_id, 'wpfunos_userNombreSeleccionAtaud', true ) , $mensaje );
          $mensaje = str_replace( '[velatorio]' , get_post_meta( $post_id, 'wpfunos_userNombreSeleccionVelatorio', true ) , $mensaje );
          $mensaje = str_replace( '[ceremonia]' , get_post_meta( $post_id, 'wpfunos_userNombreSeleccionDespedida', true ) , $mensaje );
          $mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€' , $mensaje );
          $mensaje = str_replace( '[nombreServicio]' , $servicio , $mensaje );
          $mensaje = str_replace( '[nombreFuneraria]' , get_the_title( $IDservicio ) , $mensaje );
          $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $IDservicio, "wpfunos_servicioTelefono", true)  , $mensaje );
          $mensaje = str_replace( '[comentarios]' , get_post_meta( $IDservicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
          $mensaje = str_replace( '[comentariosUsuario]' , wp_kses_post( $message ) , $mensaje );

          $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $IDservicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
          $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
          $mensaje = str_replace( '[nombrepack]' , get_post_meta( $IDservicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
          $mensaje = str_replace( '[textoprecio]' , get_post_meta( $IDservicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

          do_action('wpfunos_log', '==============' );
          if( site_url() === 'https://dev.funos.es'){
            wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoPresupuestoLead') , $mensaje, $headers );
            do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo pedir presupuesto efraim@efraim.cat' );
          }else{
            if(!empty( get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ;
            if(!empty( get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ;
            wp_mail (  get_post_meta( $IDservicio, 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoPresupuestoLead') , $mensaje, $headers );
            do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo pedir presupuesto ' . get_post_meta( $IDservicio, 'wpfunos_servicioEmail', true ) );
          }
          update_post_meta( $post_id, 'wpfunos_userLead', true );

          //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' . sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userName', true ) ) ) ;
          do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $referencia );

        }
        if( get_option('wpfunos_activarCorreoPresupuestousuario') ){
          unset($headers);
          $headers[] = 'Content-Type: text/html; charset=UTF-8';
          $headers[] = 'From: funos <clientes@funos.es>';
          $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoPresupuestousuario'), get_option('wpfunos_asuntoCorreoPresupuestousuario') );

          $mensaje = str_replace( '[email]' , get_post_meta( $post_id , 'wpfunos_userMail', true ), $mensaje );
          $mensaje = str_replace( '[nombreUsuario]' , get_post_meta( $post_id , 'wpfunos_userName', true ) , $mensaje );
          $mensaje = str_replace( '[telefonoUsuario]' , get_post_meta( $post_id , 'wpfunos_userPhone', true ) , $mensaje );
          $mensaje = str_replace( '[referencia]' , $referencia , $mensaje );
          $mensaje = str_replace( '[IP]' , $userIP , $mensaje );
          $mensaje = str_replace( '[poblacion]' , get_post_meta( $post_id , 'wpfunos_userNombreSeleccionUbicacion', true ) , $mensaje );
          $mensaje = str_replace( '[CP]' , get_post_meta( $post_id , 'wpfunos_userCP', true ) , $mensaje );
          $mensaje = str_replace( '[destino]' , get_post_meta( $post_id, 'wpfunos_userNombreSeleccionServicio', true ) , $mensaje );
          $mensaje = str_replace( '[ataud]' , get_post_meta( $post_id, 'wpfunos_userNombreSeleccionAtaud', true ) , $mensaje );
          $mensaje = str_replace( '[velatorio]' , get_post_meta( $post_id, 'wpfunos_userNombreSeleccionVelatorio', true ) , $mensaje );
          $mensaje = str_replace( '[ceremonia]' , get_post_meta( $post_id, 'wpfunos_userNombreSeleccionDespedida', true ) , $mensaje );
          $mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€' , $mensaje );
          $mensaje = str_replace( '[nombreServicio]' , $servicio , $mensaje );
          $mensaje = str_replace( '[nombreFuneraria]' , get_the_title( $IDservicio ) , $mensaje );
          $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $IDservicio, "wpfunos_servicioTelefono", true)  , $mensaje );
          $mensaje = str_replace( '[comentarios]' , get_post_meta( $IDservicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
          $mensaje = str_replace( '[comentariosUsuario]' , wp_kses_post( $message ), $mensaje );

          $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $IDservicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
          $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
          $mensaje = str_replace( '[nombrepack]' , get_post_meta( $IDservicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
          $mensaje = str_replace( '[textoprecio]' , get_post_meta( $IDservicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

          do_action('wpfunos_log', '==============' );
          if( site_url() === 'https://dev.funos.es'){
            wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoPresupuestousuario') , $mensaje, $headers );
            do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo pedir presupuesto efraim@efraim.cat' );
          }else{
            if(!empty( get_option('wpfunos_mailCorreoCcoPresupuestousuario' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPresupuestousuario' ) ;
            if(!empty( get_option('wpfunos_mailCorreoBccPresupuestousuario' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPresupuestousuario' ) ;
            $headers[]   = 'Reply-To: Clientes Funos <clientes@funos.es>';
            wp_mail ( get_post_meta( $post_id , 'wpfunos_userMail', true ) , get_option('wpfunos_asuntoCorreoPresupuestousuario') , $mensaje, $headers );
            do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo pedir presupuesto usuario ' . get_post_meta( $post_id , 'wpfunos_userMail', true ) );
          }

          //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' . sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userName', true ) ) ) ;
          do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $referencia );

        }
        // SMS
        if( strlen( get_post_meta( $IDservicio, "wpfunos_servicioTelefonoSMS", true) ) > 1){
          do_action('wpfunos_log', '==============' );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviar SMS Presupuesto Servicio' );
          do_action('wpfunos_log', $userIP.' - 0501 '.'$Telefono: ' . get_post_meta( $IDservicio, "wpfunos_servicioTelefonoSMS", true) );

          $request = '{
            "api_key":"4b66b40a110c408e8651eb971591f03e",
            "report_url":"https://funos.es/",
            "concat":1,
            "messages":[
              {
                "from":"34606902525",
                "to":"[numero_SMS]",
                "text":"Hola. Has recibido una solicitud de FUNOS\\nNombre: [nombre_SMS]\\nTel: [telefono_SMS]\\nMás info por email",
                "send_at": "2020-01-23 12:00:00"
              }
            ]
          }';

          $telSMS = str_replace(" ","", get_post_meta( $IDservicio, "wpfunos_servicioTelefonoSMS", true) );
          $telSMS = str_replace("-","",$telSMS );
          if(substr($telSMS,0,1) == '+'){
            $telSMS = str_replace("+","",$telSMS );
          }else{
            $telSMS = '34'.$telSMS ;
          }
          if( site_url() === 'https://dev.funos.es'){
            $telSMS = '34690074497';
          }
          $request = str_replace ( '[numero_SMS]' , $telSMS , $request );
          $request = str_replace ( '[nombre_SMS]' , get_post_meta( $IDusuario, 'wpfunos_userName', true ) , $request );
          $request = str_replace ( '[telefono_SMS]' , get_post_meta( $post_id , 'wpfunos_userPhone', true ) , $request );

          //do_action('wpfunos_log', $userIP.' - 0501 '.'$request: ' . $request );

          $SMS = wp_remote_post( 'https://api.gateway360.com/api/3.0/sms/send', array(
            'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
            'body'        => $request,
            'method'      => 'POST',
          ));

          $userAPIMessage = apply_filters('wpfunos_dumplog', $SMS['body'] );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Body Respuesta: ' . $userAPIMessage  );

        }
        // SMS
      }// if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Presupuesto') )
    }//if( $form_name == 'FormularioPresupuesto' )

    if( $form_name == 'PaginaFinanciacion' ){
      $userIP = apply_filters('wpfunos_userIP','dummy');
      $servicio = sanitize_text_field( $fields['Servicio'] );
      $precio = sanitize_text_field( $fields['Precio'] );
      $IDusuario = sanitize_text_field( $fields['IDusuario'] );
      $transient_ref = get_transient('wpfunos-wpfref-v3-' .$IP );

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0100 '.'Servicio Botón Fininaciación' );
      do_action('wpfunos_log', $userIP.' - 0100 '.'Servicio titulo: ' . $servicio );
      do_action('wpfunos_log', $userIP.' - 0100 '.'$IDusuario: ' . $IDusuario );
      do_action('wpfunos_log', $userIP.' - 0100 '.'Servicio ' . $servicio );

      //HUBSPOT
      $hubspotutk = ( isset( $_COOKIE['hubspotutk'] ) ) ? $_COOKIE['hubspotutk'] : '' ;
      $params = array(
        'nombre' => sanitize_text_field( $transient_ref['wpfn'] ) ,
        'email' => sanitize_text_field( $transient_ref['wpfe'] ),
        'telefono' => sanitize_text_field( $transient_ref['wpft'] ),
        'ok' => 'ok',
        'accion' => 'Datos usuario funerarias financiación',
        'servicio' => $servicio,
        'precio' => $precio,
        'entrada' => sanitize_text_field( $fields['entrada'] ),
        'financiar' => sanitize_text_field( $fields['financiar'] ),
        'ip' => $userIP,
        'hubspotutk' => $hubspotutk,
        'pageUri' => 'https://funos.es/comparar-precios-resultados',
        'pageId' => 'Comparar precios resultados - Funos - Comparador de Funerarias'
      );
      do_action('wpfhubspot-send-form', $params );
      do_action('wpfhubspot-usuarios',array( 'email' => $transient_ref['wpfe'], 'hubspotutk' => $hubspotutk ) );
      //sleep(1);
      //$params2 = array(
      //  'email' => sanitize_text_field( $transient_ref['wpfe'] ),
      //  'ip' => $userIP,
      //  'ok' => 'ok',
      //  'hubspotutk' => $hubspotutk,
      //  'accion' => 'Datos usuario funerarias financiación',
      //  'pageUri' => 'https://funos.es/comparar-precios-resultados',
      //  'pageId' => 'Comparar precios resultados - Funos - Comparador de Funerarias'
      //);
      //do_action('wpfhubspot-send-form', $params2 );


      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0100 '.'Enviar Formulario Hubspot' );
      //HUBSPOT
    }//if( $form_name == 'PaginaFinanciacion' )


  } // public function wpfunosFormNewrecord($record, $handler)

  /**
  *
  * add_action( 'wpfunos-visitas-entrada', array( $this, 'wpfunosVisitasEntrada' ), 10, 1 );
  *
  */
  public function wpfunosVisitasEntrada($record){
    //$userIP = apply_filters('wpfunos_userIP','dummy');
    //do_action('wpfunos_log', '==============' );
    //do_action('wpfunos_log', $userIP.' - 0100 '.'wpfunosVisitasEntrada Tipo: ' .$record['tipo'] );
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
