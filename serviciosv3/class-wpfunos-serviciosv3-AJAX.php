<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* The admin-specific functionality of the plugin.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/admin
* @author     Efraim Bayarri <efraim@efraim.cat>
*
*/

class Wpfunos_ServiciosV3_AJAX extends Wpfunos_ServiciosV3 {

  public function __construct( ) {
    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_multiform', function () { $this->wpfunosV3Multiform();});
    add_action('wp_ajax_wpfunos_ajax_v3_multiform', function () {$this->wpfunosV3Multiform();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_llamamos', function () { $this->wpfunosV3Llamamos();});
    add_action('wp_ajax_wpfunos_ajax_v3_llamamos', function () {$this->wpfunosV3Llamamos();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_llamar', function () { $this->wpfunosV3Llamar();});
    add_action('wp_ajax_wpfunos_ajax_v3_llamar', function () {$this->wpfunosV3Llamar();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_presupuesto', function () { $this->wpfunosV3Presupuesto();});
    add_action('wp_ajax_wpfunos_ajax_v3_presupuesto', function () {$this->wpfunosV3Presupuesto();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_detalles', function () { $this->wpfunosV3Detalles();});
    add_action('wp_ajax_wpfunos_ajax_v3_detalles', function () {$this->wpfunosV3Detalles();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_email', function () { $this->wpfunosV3Email();});
    add_action('wp_ajax_wpfunos_ajax_v3_email', function () {$this->wpfunosV3Email();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_dist_local', function () { $this->wpfunosV3DistLocal();});
    add_action('wp_ajax_wpfunos_ajax_v3_dist_local', function () {$this->wpfunosV3DistLocal();});

    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_filtros', function () { $this->wpfunosV3Filtros();});
    add_action('wp_ajax_wpfunos_ajax_v3_filtros', function () {$this->wpfunosV3Filtros();});

    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_cambiar_datos_usuario', function () { $this->wpfunosV3CambiarDatosUsuario();});
    add_action('wp_ajax_wpfunos_ajax_v3_cambiar_datos_usuario', function () {$this->wpfunosV3CambiarDatosUsuario();});
  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Entrada datos usuario
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_multiform', function () { $this->wpfunosV3Multiform();});
  * add_action('wp_ajax_wpfunos_ajax_v3_multiform', function () {$this->wpfunosV3Multiform();});
  *
  */
  public function wpfunosV3Multiform(){
    $wpfnombre = $_POST["wpfnombre"];
    $wpfemail = $_POST["wpfemail"];
    $wpftelefono = $_POST["wpftelefono"];
    $wpfurl = $_POST["wpfurl"];
    $wpnonce = $_POST["wpnonce"];
    $wpfip = $_POST["wpfip"];
    $wpfnewref = $_POST["wpfnewref"];
    $wpfcuando = $_POST["wpfcuando"];
    $wpfresp1 = $_POST["wpfdestino"];
    $wpfresp2 = $_POST["wpfataud"];
    $wpfresp3 = $_POST["wpfvelatorio"];
    $wpfresp4 = $_POST["wpfceremonia"];
    $wpfcp = $_POST["wpfcp"];
    $wpfubic = $_POST["wpfubic"];
    $wpfdist = $_POST["wpfdist"];
    $wpflat = $_POST["wpflat"];
    $wpflng = $_POST["wpflng"];
    $hubspotutk = $_POST["hubspotutk"];

    if ( !wp_verify_nonce( $wpnonce, "wpfunos_serviciosv3_nonce".$wpfip ) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    if( '' != $wpfnombre && '' != $wpfemail && '' != $wpftelefono ){

      switch((int)$wpfresp1){
        case 1: $wpfdestino = esc_html__('Entierro', 'wpfunos_es'); break;
        case 2: $wpfdestino = esc_html__('Incineración', 'wpfunos_es'); break;
      }
      switch((int)$wpfresp2){
        case 1: $wpfataud = esc_html__('Ataúd medio', 'wpfunos_es') ; break;
        case 2: $wpfataud = esc_html__('Ataúd económico', 'wpfunos_es') ; break;
        case 3: $wpfataud = esc_html__('Ataúd premium', 'wpfunos_es') ; break;
      }
      switch((int)$wpfresp3){
        case 1: $wpfvelatorio = esc_html__('Velatorio', 'wpfunos_es') ; break;
        case 2: $wpfvelatorio = esc_html__('Sin velatorio', 'wpfunos_es') ; break;
      }
      switch((int)$wpfresp4){
        case 1: $wpfceremonia = esc_html__('Sin ceremonia', 'wpfunos_es') ; break;
        case 2: $wpfceremonia = esc_html__('Solo sala', 'wpfunos_es') ; break;
        case 3: $wpfceremonia = esc_html__('Ceremonia civil', 'wpfunos_es') ; break;
        case 4: $wpfceremonia = esc_html__('Ceremonia religiosa', 'wpfunos_es') ; break;
      }

      $log = (is_user_logged_in()) ? 'logged' : 'not logged';
      $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';

      $userIP = apply_filters('wpfunos_userIP','dummy');
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Llegada ajax Servicio Botón Enviar Datos Usuario' );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpfnombre ' .$wpfnombre );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpfemail ' .$wpfemail );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpftelefono ' .$wpftelefono );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpfresp1 ' .$wpfresp1. ' - ' .$wpfdestino );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpfresp2 ' .$wpfresp2. ' - ' .$wpfataud );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpfresp3 ' .$wpfresp3. ' - ' .$wpfvelatorio );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpfresp4 ' .$wpfresp4. ' - ' .$wpfceremonia );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: $hubspotutk ' .$hubspotutk );

      //$this->wpfunosServiciosv2Indeseados( $wpfemail, $wpftelefono );
      //if( apply_filters('wpfunos_bloqueo_numeros',$wpftelefono) ){
      //  do_action('wpfunos_log', '==============' );
      //  do_action('wpfunos_log', $userIP.' - 0501 '.'Entrada no deseada' );
      //  do_action('wpfunos_log', $userIP.' - 0501 '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
      //  do_action('wpfunos_log', $userIP.' - 0501 '.'mobile: ' . $mobile);
      //  do_action('wpfunos_log', $userIP.' - 0501 '.'logged: ' .$log  );
      //  do_action('wpfunos_log', $userIP.' - 0501 '.'---' );
      //  do_action('wpfunos_log', $userIP.' - 0501 '.'Teléfono: ' . $wpftelefono);
      //
      //  $result['type'] = "unwanted";
      //  $result = json_encode($result);
      //  echo $result;
      // don't forget to end your scripts with a die() function - very important
      //  die();
      //}
      $wpfwpf = apply_filters( 'wpfunos_crypt', $wpfnewref , 'e' );

      //$wpml_path = ( $_COOKIE['wp-wpml_current_language'] == 'es') ? '' : '/'. $_COOKIE['wp-wpml_current_language'] ;
      //
      //$URL = home_url().$wpml_path.'/comparar-precios-resultados?' .$wpfurl. '&wpfwpf=' .$wpfwpf;
      $URL = home_url().'/comparar-precios-resultados?' .$wpfurl. '&wpfwpf=' .$wpfwpf;
      $userURL = apply_filters('wpfunos_shortener', $URL );

      do_action('wpfunos_update phone',$wpftelefono);

      $Telefono = apply_filters('wpfunos_telefono_formateado', $wpftelefono );

      if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Multiform') ){

        $contador = $this->wpfunosV3ContadorEntradas( $wpfip, '0' );
        //'wpfunos_userVisitas' => $contador,

        switch((int)$wpfresp1){
          case 1: $wpfdestino = esc_html__('Entierro', 'wpfunos_es'); break;
          case 2: $wpfdestino = esc_html__('Incineración', 'wpfunos_es'); break;
        }
        switch((int)$wpfresp2){
          case 1: $wpfataud = esc_html__('Ataúd medio', 'wpfunos_es') ; break;
          case 2: $wpfataud = esc_html__('Ataúd económico', 'wpfunos_es') ; break;
          case 3: $wpfataud = esc_html__('Ataúd premium', 'wpfunos_es') ; break;
        }
        switch((int)$wpfresp3){
          case 1: $wpfvelatorio = esc_html__('Velatorio', 'wpfunos_es') ; break;
          case 2: $wpfvelatorio = esc_html__('Sin velatorio', 'wpfunos_es') ; break;
        }
        switch((int)$wpfresp4){
          case 1: $wpfceremonia = esc_html__('Sin ceremonia', 'wpfunos_es') ; break;
          case 2: $wpfceremonia = esc_html__('Solo sala', 'wpfunos_es') ; break;
          case 3: $wpfceremonia = esc_html__('Ceremonia civil', 'wpfunos_es') ; break;
          case 4: $wpfceremonia = esc_html__('Ceremonia religiosa', 'wpfunos_es') ; break;
        }
        $referer = sanitize_text_field( $_SERVER['HTTP_REFERER'] );
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Prepara post' );
        $my_post = array(
          'post_title' => $wpfnewref,
          'post_type' => 'usuarios_wpfunos',
          'post_status'  => 'publish',
          'meta_input'   => array(
            'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
            'wpfunos_userMail' => sanitize_text_field( $wpfemail ),
            'wpfunos_userReferencia' => sanitize_text_field( $wpfnewref ),
            'wpfunos_userName' => sanitize_text_field( $wpfnombre ),
            'wpfunos_userPhone' => sanitize_text_field( $Telefono ),
            'wpfunos_userCP' => sanitize_text_field( $wpfcp ),
            'wpfunos_userAccion' => '0',
            'wpfunos_userNombreAccion' => sanitize_text_field( 'Entrada datos servicios' ),
            'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( $wpfubic ),
            'wpfunos_userNombreSeleccionDistancia' => sanitize_text_field( $wpfdist ),
            'wpfunos_userNombreSeleccionServicio' => sanitize_text_field( $wpfdestino ),
            'wpfunos_userNombreSeleccionAtaud' => sanitize_text_field( $wpfataud ),
            'wpfunos_userNombreSeleccionVelatorio' => sanitize_text_field( $wpfvelatorio ),
            'wpfunos_userNombreSeleccionDespedida' => sanitize_text_field( $wpfceremonia ),
            'wpfunos_userIP' => sanitize_text_field( $wpfip ),
            'wpfunos_userReferer' => sanitize_text_field( $referer ),
            'wpfunos_userURL' => sanitize_text_field( $userURL ),
            'wpfunos_userURLlarga' => sanitize_text_field( $URL ),
            'wpfunos_userAceptaPolitica' => '1',
            'wpfunos_userLAT' => sanitize_text_field( $wpflat ),
            'wpfunos_userLNG' => sanitize_text_field( $wpflng ),
            'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
            'wpfunos_userVisitas' => $contador,
            'wpfunos_userLead' => true,
            'resp1' => $wpfresp1,
            'resp2' => $wpfresp2,
            'resp3' => $wpfresp3,
            'resp4' => $wpfresp4,
            'wpfunos_Dummy' => true,
            'wpfunos_userLog' => $log,
            'wpfunos_userMobile' => $mobile,
            'wpfunos_userHubspotUTK' => $hubspotutk,
          ),
        );
        $post_id = wp_insert_post($my_post);
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Inserta nueva entrada' );
        // wpfunos-visitas-entrada
        do_action('wpfunos-visitas-entrada',array(
          'tipo' => '5',
          'nombre' => sanitize_text_field( $wpfnombre ),
          'email' => sanitize_text_field( $wpfemail ),
          'telefono' => sanitize_text_field( $Telefono ),
          'wpfresp1' => $wpfresp1,
          'wpfresp2' => $wpfresp2,
          'wpfresp3' => $wpfresp3,
          'wpfresp4' => $wpfresp4,
          'postID' => $post_id,
          'poblacion' => sanitize_text_field( $wpfubic ),
          'cuando' => sanitize_text_field( $wpfcuando ),
          'cp' => sanitize_text_field( $wpfcp ),
        ) );
        //

        $userIP = apply_filters('wpfunos_userIP','dummy');
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Recogida datos usuario' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' .  $wpfnombre );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Post ID: ' .  $post_id  );
        do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $wpfnewref );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Telefono: ' . $Telefono );

        if( get_option('wpfunos_activarCorreov2Admin') ){
          unset($headers);
          $headers[] = 'Content-Type: text/html; charset=UTF-8';
          $headers[] = 'From: funos <clientes@funos.es>';
          $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreov2Admin'), get_option('wpfunos_asuntoCorreov2Admin') );
          $mensaje = str_replace( '[email]' , $wpfemail , $mensaje );
          $mensaje = str_replace( '[referencia]' , $wpfnewref , $mensaje );
          $mensaje = str_replace( '[IP]' , $wpfip , $mensaje );
          $mensaje = str_replace( '[URL]' , $URL , $mensaje );
          $mensaje = str_replace( '[nombre]' , $wpfnombre , $mensaje );
          $mensaje = str_replace( '[telefono]' , $Telefono , $mensaje );
          $mensaje = str_replace( '[poblacion]' , $wpfubic , $mensaje );
          $mensaje = str_replace( '[distancia]' , $wpfdist , $mensaje );
          $mensaje = str_replace( '[CP]' , $wpfcp , $mensaje );
          $mensaje = str_replace( '[destino]' , $wpfdestino , $mensaje );
          $mensaje = str_replace( '[ataud]' , $wpfataud , $mensaje );
          $mensaje = str_replace( '[velatorio]' , $wpfvelatorio , $mensaje );
          $mensaje = str_replace( '[ceremonia]' , $wpfceremonia , $mensaje );
          if(!empty( get_option('wpfunos_mailCorreoCcov2Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcov2Admin' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccv2Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccv2Admin' ) ;

          $args = array(
            'post_status' => 'publish',
            'post_type' => 'servicios_wpfunos',
            'posts_per_page' => -1,
            'meta_key' =>  'wpfunos_servicioLead',
            'meta_value' => true,
          );
          $post_list = get_posts( $args );
          if( $post_list ){
            foreach ( $post_list as $post ) :
              if( get_post_meta( $post->ID, 'wpfunos_servicioActivo', true ) == true && strlen( get_post_meta( $post->ID, 'wpfunos_servicioEmail', true ) ) > 0 ){
                //wp_mail ( get_post_meta( $post->ID, 'wpfunos_servicioEmail', true ), get_option('wpfunos_asuntoCorreov2Admin') , $mensaje, $headers );
                do_action('wpfunos_log', '==============' );
                do_action('wpfunos_log', $userIP.' - 0501 '.'Enviar correo entrada datos al servicio v3' );
                do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $wpfnewref );
                //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
                do_action('wpfunos_log', $userIP.' - 0501 '.'servicioEmail: ' . get_post_meta( $post->ID, 'wpfunos_servicioEmail', true ) );
              }
            endforeach;
            wp_reset_postdata();
          }

          if( strlen( get_option('wpfunos_mailCorreov2Admin') ) > 0 ){

            if( site_url() === 'https://dev.funos.es'){
              unset($headers);
              $headers[] = 'Content-Type: text/html; charset=UTF-8';
              $headers[] = 'From: funos <clientes@funos.es>';
              wp_mail ( 'efraim@efraim.cat', get_option('wpfunos_asuntoCorreov2Admin') , $mensaje, $headers );
            }else{
              if( ! apply_filters( 'wpfunos_pruebas_email', $wpfemail ) ) wp_mail ( get_option('wpfunos_mailCorreov2Admin'), get_option('wpfunos_asuntoCorreov2Admin') , $mensaje, $headers );
            }

            if( ! apply_filters( 'wpfunos_pruebas_email', $wpfemail ) ) do_action('wpfunos_log', '==============' );
            if( ! apply_filters( 'wpfunos_pruebas_email', $wpfemail ) ) do_action('wpfunos_log', $userIP.' - 0501 '.'Enviar correo entrada datos al admin' );
            if( ! apply_filters( 'wpfunos_pruebas_email', $wpfemail ) ) do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $wpfnewref );
            //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
            //do_action('wpfunos_log', $userIP.' - 0501 '.'mailCorreov2Admin: ' . get_option('wpfunos_mailCorreov2Admin') );
          }

        }
        if( get_option('wpfunos_activarCorreov2usuario') ){
          unset($headers);
          $headers[] = 'Content-Type: text/html; charset=UTF-8';
          $headers[] = 'From: funos <clientes@funos.es>';
          $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreov2usuario'), get_option('wpfunos_asuntoCorreov2usuario') );
          $mensaje = str_replace( '[email]' , $wpfemail , $mensaje );
          $mensaje = str_replace( '[referencia]' , $wpfnewref , $mensaje );
          $mensaje = str_replace( '[IP]' , $wpfip , $mensaje );
          $mensaje = str_replace( '[URL]' , $URL , $mensaje );
          $mensaje = str_replace( '[nombre]' , $wpfnombre , $mensaje );
          $mensaje = str_replace( '[telefono]' , $Telefono , $mensaje );
          $mensaje = str_replace( '[poblacion]' , $wpfubic , $mensaje );
          $mensaje = str_replace( '[distancia]' , $wpfdist , $mensaje );
          $mensaje = str_replace( '[CP]' , $wpfcp , $mensaje );
          $mensaje = str_replace( '[destino]' , $wpfdestino , $mensaje );
          $mensaje = str_replace( '[ataud]' , $wpfataud , $mensaje );
          $mensaje = str_replace( '[velatorio]' , $wpfvelatorio , $mensaje );
          $mensaje = str_replace( '[ceremonia]' , $wpfceremonia , $mensaje );

          do_action('wpfunos_log', '==============' );
          if( site_url() === 'https://dev.funos.es'){
            wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreov2usuario') , $mensaje, $headers );
            do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo usuario efraim@efraim.cat' );
          }else{
            if(!empty( get_option('wpfunos_mailCorreoCcov2usuario' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcov2usuario' ) ;
            if(!empty( get_option('wpfunos_mailCorreoBccv2usuario' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccv2usuario' ) ;
            $headers[]   = 'Reply-To: Clientes Funos <clientes@funos.es>';
            if( ! apply_filters( 'wpfunos_pruebas_email', $wpfemail ) ) wp_mail ( $wpfemail , get_option('wpfunos_asuntoCorreov2usuario') , $mensaje, $headers );
            if( ! apply_filters( 'wpfunos_pruebas_email', $wpfemail ) ) do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo al usuario ' .$wpfemail. ' con su búsqueda');
          }
          //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' . $wpfnombre );
          do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $wpfnewref );
        }

        // SMS
        if( ! apply_filters( 'wpfunos_pruebas_email', $wpfemail ) ) do_action('wpfunos_log', '==============' );
        if( ! apply_filters( 'wpfunos_pruebas_email', $wpfemail ) ) do_action('wpfunos_log', $userIP.' - 0501 '.'Prepara envio SMS' );
        if( ! apply_filters( 'wpfunos_pruebas_email', $wpfemail ) ) do_action('wpfunos_log', $userIP.' - 0501 '.'$Telefono: ' . $Telefono );

        $request = '{
          "api_key":"4b66b40a110c408e8651eb971591f03e",
          "report_url":"https://funos.es/",
          "concat":1,
          "messages":[
            {
              "from":"34606902525",
              "to":"[numero_SMS]",
              "text":"Gracias por tu consulta en FUNOS.\\nRecupera los resultados de tu comparativa aquí: [enlace_SMS]\\nNos puedes llamar a este teléfono\\no contactar por WhatsApp aquí: https://wa.me/message/TTW45ZJEQWZGK1\\nTe asesoramos sin compromiso",
              "send_at": "[fecha1]"
            },
            {
              "from":"34606902525",
              "to":"[numero_SMS]",
              "text":"Descuento 50% en las principales funerarias. Asesoramiento profesional. Te ayudamos en todo.\\nGestoría gratis.\\nValoración 5* en Google.\\nLee las reseñas: https://funoslink.net/decM",
              "send_at": "[fecha2]"
            }
          ]
        }';

        $telSMS = str_replace(" ","", $Telefono );
        $telSMS = str_replace("-","",$telSMS );
        if(substr($telSMS,0,1) == '+'){
          $telSMS = str_replace("+","",$telSMS );
        }else{
          $telSMS = '34'.$telSMS ;
        }
        if( site_url() === 'https://dev.funos.es'){
          $telSMS = '34690074497';
        }
        $request = str_replace ( '[enlace_SMS]' , $userURL , $request );
        $request = str_replace ( '[numero_SMS]' , $telSMS , $request );
        //
        $date1 = new DateTime("now", new DateTimeZone('Europe/Madrid'));
        $date2 = new DateTime("now", new DateTimeZone('Europe/Madrid'));
        $date2->add(new DateInterval('PT5S'));
        //
        $request = str_replace ( '[fecha1]' , $date1->format("Y-m-d H:i:s") , $request );
        $request = str_replace ( '[fecha2]' , $date2->format("Y-m-d H:i:s") , $request );
        //
        //do_action('wpfunos_log', $userIP.' - 0501 '.'$request: ' . $request );
        if( ! apply_filters( 'wpfunos_pruebas_email', $wpfemail ) ) {
          $SMS = wp_remote_post( 'https://api.gateway360.com/api/3.0/sms/send', array(
            'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
            'body'        => $request,
            'method'      => 'POST',
          ));
          $userAPIMessage = apply_filters('wpfunos_dumplog', $SMS['body'] );
          do_action('wpfunos_log', '==============' );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Finaliza envio SMS' );
        }
        //do_action('wpfunos_log', $userIP.' - 0501 '.'Body Respuesta: ' . $userAPIMessage  );
        /**
        * [headers] = Object (Requests_Utility_CaseInsensitiveDictionary)</br> |   date -> String: 'Fri, 10 Mar 2023 00:44:27 GMT'</br> |   server -> String: 'Apache'</br> |
        * expires -> String: 'Thu, 19 Nov 1981 08:52:00 GMT'</br> |   cache-control -> String: 'no-store, no-cache, must-revalidate'</br> |   pragma -> String: 'no-cache'</br> |
        * set-cookie -> String: 'PHPSESSID=0e3eer31ou0r23m6f93ncmlg24; path=/;HttpOnly;Secure;SameSite=Lax'</br> |   x-xss-protection -> String: '1;
        * report=https://api.gateway360.com/xss-log'</br> |   x-content-type-options -> String: 'nosniff'</br> |   content-length -> Number: 98</br> |
        * content-type -> String: 'application/json' [body] = String: '{"status":"ok","result":[{"status":"ok","sms_id":"e3bfb8594fff41fca310083f77c73e05","custom":""}]}'
        * [response] = </br> |   [code] = Number: 200</br> |   [message] = String: 'OK'
        * [cookies] = </br> |   [0] = Object (WP_Http_Cookie)</br> |   |   name -> String: 'PHPSESSID'</br> |   |   value -> String: '0e3eer31ou0r23m6f93ncmlg24'</br> |   |
        * expires -> NULL</br> |   |   path -> String: '/'</br> |   |   domain -> String: 'api.gateway360.com'</br> |   |   port -> NULL</br> |   |   host_only -> TRUE
        * [filename] = NULL
        * [http_response] = Object (WP_HTTP_Requests_Response)</br> |   data -> NULL</br> |   headers -> NULL</br> |   status -> NULL'
        */
        // SMS
      }// END if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Multiform') )
      //HUBSPOT
      if( ! apply_filters( 'wpfunos_pruebas_email', $wpfemail ) ){
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Prepara envio Hubspot' );
        $params = array(
          'firstname' => $wpfnombre,
          'email' => $wpfemail,
          'phone' => $Telefono,
          'donde' => $wpfubic,
          'distancia' => $wpfdist,
          'cuando' => $wpfcuando,
          'destino' => $wpfdestino,
          'ataud' => $wpfataud,
          'velatorio' => $wpfvelatorio,
          'ceremonia' => $wpfceremonia,
          'referencia' => $wpfnewref,
          'accion' => 'Datos usuario funerarias',
          'ip' => $userIP,
          'ok' => 'ok',
          'hubspotutk' => $hubspotutk,
          'pageUri' => $URL,
          'pageId' => 'Comparar precios resultados - Funos - Comparador de Funerarias'
        );
        do_action('wpfhubspot-send-form', $params );
        do_action('wpfhubspot-usuarios',array( 'email' => $wpfemail, 'hubspotutk' => $hubspotutk ) );
        //sleep(1);
        //$params = array(
        //  'email' => $wpfemail,
        //  'ok' => 'ok',
        //  'hubspotutk' => $hubspotutk,
        //  'accion' => 'Datos usuario funerarias',
        //  'ip' => $userIP,
        //  'pageUri' => $URL,
        //  'pageId' => 'Comparar precios resultados - Funos - Comparador de Funerarias'
        //);
        //do_action('wpfhubspot-send-form', $params );

        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Finaliza envio formulario Hubspot' );
      }
      //HUBSPOT
      //Última Búsqueda
      if( $_COOKIE['cookielawinfo-checkbox-functional'] == 'yes' ){
        $expiry = strtotime('+1 year');
        //setcookie('wpflast', $wpflast, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
        //setcookie('wpflasttime', date( 'd/m/y', current_time( 'timestamp', 0 ) ) , ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
        //
        if( isset( $_COOKIE['wpfu'] ) ){
          $wpfu = json_decode( apply_filters( 'wpfunos_crypt', $_COOKIE['wpfu'], 'd' ) );
          //do_action('wpfunos_log', $userIP.' - 0501 '.'wpfu: ' .apply_filters('wpfunos_dumplog', $wpfu ) );
          //$userURL = apply_filters('wpfunos_shortener', $URL );
          //$wpfu->lastserv = apply_filters( 'wpfunos_crypt', $URL , 'e' );
          $wpfu->lastserv = apply_filters( 'wpfunos_crypt', $userURL , 'e' );
          $wpfu->lasttimeserv = date( 'd/m/y', current_time( 'timestamp', 0 ) );
          $wpfu->name = $wpfnombre;
          $wpfu->email = $wpfemail;
          $wpfu->phone = $wpftelefono;
          $codigo = apply_filters( 'wpfunos_crypt', json_encode($wpfu), 'e' );
          setcookie('wpfu', $codigo,  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
        }
        //
      }
      //Última Búsqueda END

      $colaborador = ( apply_filters('wpfunos_email_colaborador','set_transient') ) ? 'si' : 'no' ;

      $transient_ref = get_transient('wpfunos-wpfref-v3-' .$wpfip );
      $transient_ref['wpfref'] = $wpfnewref;
      $transient_ref['wpfip'] = $wpfip;
      $transient_ref['wpfn'] = $wpfnombre;
      $transient_ref['wpfe'] = $wpfemail;
      $transient_ref['wpft'] = $Telefono;
      $transient_ref['wpfadr'] = $wpfubic;
      $transient_ref['wpfcp'] = $wpfcp;
      $transient_ref['wpfdist'] = $wpfdist;
      $transient_ref['wpflat'] = $wpflat;
      $transient_ref['wpflng'] = $wpflng;
      $transient_ref['wpfresp1'] = $wpfresp1;
      $transient_ref['wpfresp2'] = '2';
      $transient_ref['wpfresp3'] = $wpfresp3;
      $transient_ref['wpfresp4'] = $wpfresp4;
      $transient_ref['wpforden'] = 'dist';
      $transient_ref['wpfcuando'] = $wpfcuando;
      $transient_ref['wpfurl'] = $URL;
      $transient_ref['wpfwpf'] = $wpfwpf;
      $transient_ref['wpfland'] = (isset($_POST['wpfland'])) ? 1 : 0 ;
      $transient_ref['wpfcolab'] = $colaborador;

      set_transient( 'wpfunos-wpfref-v3-' .$wpfip, $transient_ref, DAY_IN_SECONDS );

      $result['type'] = "success";
      $result['wpfurl'] = $URL;
      $result = json_encode($result);
      echo $result;

    }else{ //if( '' != $wpfnombre && '' != $wpfemail && '' != $wpftelefono ){
      $result['type'] = "fail";
      $result = json_encode($result);
      echo $result;
    }

    // don't forget to end your scripts with a die() function - very important
    die();
  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Llamamos
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_llamamos', function () { $this->wpfunosV3Llamamos();});
  * add_action('wp_ajax_wpfunos_ajax_v3_llamamos', function () {$this->wpfunosV3Llamamos();});
  */
  public function wpfunosV3Llamamos(){
    $servicio = $_POST['servicio'];
    $wpnonce = $_POST['wpnonce'];
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $wpfcuando = $_POST['cuando'];
    $hubspotutk = $_POST['hubspotutk'];
    //  EBG 03-11-22
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //
    $IP = apply_filters('wpfunos_userIP','dummy');

    if( '' == $nombre || '' == $email || '' == $phone ){
      $result['type'] = "Sin datos";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    if( apply_filters( 'wpfunos_pruebas_email', $email ) ){
      $result['type'] = "pruebas@funos.es";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    $transient_ref = get_transient('wpfunos-wpfref-v3-' .$IP );
    if( $transient_ref === false ){
      $result['type'] = "No transient";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }
    //  EBG 03-11-22
    $transient_ref['wpfn'] = $nombre;
    $transient_ref['wpfe'] = $email;
    $transient_ref['wpft'] = $phone;
    set_transient( 'wpfunos-wpfref-v3-' .$IP, $transient_ref, DAY_IN_SECONDS );
    //

    if ( !wp_verify_nonce( $wpnonce, "wpfunos_serviciosv3_nonce".$IP ) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }
    $userIP = apply_filters('wpfunos_userIP','dummy');
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Llegada ajax Servicio Boton llamen' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpfnombre ' .$transient_ref['wpfn'] );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpfemail ' .$transient_ref['wpfe'] );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpftelefono ' .$transient_ref['wpft'] );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: Servicio titulo: ' . $titulo );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: Servicio ' . $servicio );

    if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Llamamos') ){

      switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = esc_html__('Entierro', 'wpfunos_es'); break; case '2': $destino = 'I' ; $nombredestino = esc_html__('Incineración', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = esc_html__('Ataúd medio', 'wpfunos_es'); break; case '2': $ataud = 'E' ; $nombreataud = esc_html__('Ataúd económico', 'wpfunos_es'); break; case '3': $ataud = 'P' ; $nombreataud = esc_html__('Ataúd premium', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = esc_html__('Velatorio', 'wpfunos_es') ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = esc_html__('Sin velatorio', 'wpfunos_es') ; break; }
      switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = esc_html__('Sin ceremonia', 'wpfunos_es') ; break; case '2': $despedida = 'O' ; $nombredespedida = esc_html__('Solo sala', 'wpfunos_es') ; break; case '3': $despedida = 'C' ; $nombredespedida = esc_html__('Ceremonia civil', 'wpfunos_es') ; break; case '4': $despedida = 'R' ; $nombredespedida = esc_html__('Ceremonia religiosa', 'wpfunos_es') ; break; }

      $Telefono = apply_filters('wpfunos_telefono_formateado', $transient_ref['wpft'] );

      mt_srand(time());
      $newref = 'funos-'.(string)mt_rand();

      $contador = $this->wpfunosV3ContadorEntradas( $IP, '1' );
      //'wpfunos_userVisitas' => $contador,

      $log = (is_user_logged_in()) ? 'logged' : 'not logged';
      $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';

      $my_post = array(
        'post_title' => $newref,
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => sanitize_text_field( $transient_ref['wpfe'] ),
          'wpfunos_userReferencia' => sanitize_text_field( $newref ),
          'wpfunos_userName' => sanitize_text_field( $transient_ref['wpfn'] ),
          'wpfunos_userPhone' => sanitize_text_field( $Telefono ),
          'wpfunos_userCP' => sanitize_text_field( $transient_ref['wpfcp'] ),
          'wpfunos_userAccion' => '1',
          'wpfunos_userNombreAccion' => 'Botón llamamos servicios',
          'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( $transient_ref['wpfadr'] ),
          'wpfunos_userNombreSeleccionDistancia' => sanitize_text_field( $transient_ref['wpfdist'] ),
          'wpfunos_userNombreSeleccionServicio' => sanitize_text_field( $nombredestino ),
          'wpfunos_userNombreSeleccionAtaud' => sanitize_text_field( $nombreataud ),
          'wpfunos_userNombreSeleccionVelatorio' => sanitize_text_field( $nombrevelatorio  ),
          'wpfunos_userNombreSeleccionDespedida' => sanitize_text_field( $nombredespedida ),
          'wpfunos_userServicio' => sanitize_text_field( $servicio ),
          'wpfunos_userServicioEnviado' => true,
          'wpfunos_userAceptaPolitica' => true,
          'wpfunos_userServicioTitulo' => sanitize_text_field( get_the_title( $servicio ) ),
          'wpfunos_userServicioEmpresa' => sanitize_text_field( get_post_meta( $servicio, 'wpfunos_servicioEmpresa', true ) ),
          'wpfunos_userServicioPoblacion' => sanitize_text_field( get_post_meta( $servicio, 'wpfunos_servicioPoblacion', true ) ),
          'wpfunos_userServicioProvincia' => sanitize_text_field( get_post_meta( $servicio, 'wpfunos_servicioProvincia', true ) ),
          'wpfunos_userPrecio' => number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€',
          'wpfunos_userComentarios' => wp_kses_post( $mensajeusuario ),
          'wpfunos_userIP' => sanitize_text_field( $IP ),
          'wpfunos_userLAT' => sanitize_text_field( $transient_ref['wpflat'] ),
          'wpfunos_userLNG' => sanitize_text_field( $transient_ref['wpflng'] ),
          'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
          'wpfunos_userVisitas' => $contador,
          'wpfunos_Dummy' => true,
          'wpfunos_userLog' => $log,
          'wpfunos_userMobile' => $mobile,
          'wpfunos_userHubspotUTK' => $hubspotutk,
        ),
      );

      $post_id = wp_insert_post($my_post);

      $userIP = apply_filters('wpfunos_userIP','dummy');
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Botón Te llamamos servicio' );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' .  $transient_ref['wpfn'] );
      do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $newref );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Post ID: ' .  $post_id  );

      if( get_option('wpfunos_activarCorreoBoton1v2Admin') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: funos <clientes@funos.es>';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton1v2Admin'), get_option('wpfunos_asuntoCorreoBoton1v2Admin') );

        $mensaje = str_replace( '[email]' , $transient_ref['wpfe'] , $mensaje );
        $mensaje = str_replace( '[nombreUsuario]' , $transient_ref['wpfn'] , $mensaje );
        $mensaje = str_replace( '[telefonoUsuario]' , $Telefono , $mensaje );
        $mensaje = str_replace( '[referencia]' , $newref , $mensaje );
        $mensaje = str_replace( '[IP]' , $IP , $mensaje );
        $mensaje = str_replace( '[poblacion]' , $transient_ref['wpfadr'] , $mensaje );
        $mensaje = str_replace( '[CP]' , $transient_ref['wpfcp'] , $mensaje );
        $mensaje = str_replace( '[destino]' , $nombredestino , $mensaje );
        $mensaje = str_replace( '[ataud]' , $nombreataud , $mensaje );
        $mensaje = str_replace( '[velatorio]' ,$nombrevelatorio , $mensaje );
        $mensaje = str_replace( '[ceremonia]' , $nombredespedida , $mensaje );
        $mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€' , $mensaje );
        $mensaje = str_replace( '[nombreServicio]' , $titulo , $mensaje );
        $mensaje = str_replace( '[nombreFuneraria]' , get_the_title( $servicio ) , $mensaje );
        $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $servicio, "wpfunos_servicioTelefono", true)  , $mensaje );
        $mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
        $mensaje = str_replace( '[comentariosUsuario]' , wp_kses_post( $message ) , $mensaje );

        $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
        $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
        $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
        $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

        $userIP = apply_filters('wpfunos_userIP','dummy');
        do_action('wpfunos_log', '==============' );
        if( site_url() === 'https://dev.funos.es'){
          wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoBoton1v2Admin') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo lead1 efraim@efraim.cat' );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoBoton1v2Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1v2Admin' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccBoton1v2Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1v2Admin' ) ;
          wp_mail (  get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoBoton1v2Admin') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviando correo a funeraria. Correo: ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
        }
        update_post_meta( $post_id, 'wpfunos_userLead', true );

        //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $newref );
      }
      if( get_option('wpfunos_activarCorreoBoton1v2usuario') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: funos <clientes@funos.es>';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton1v2usuario'), get_option('wpfunos_asuntoCorreoBoton1v2usuario') );

        $mensaje = str_replace( '[email]' , $transient_ref['wpfe'] , $mensaje );
        $mensaje = str_replace( '[nombreUsuario]' , $transient_ref['wpfn'] , $mensaje );
        $mensaje = str_replace( '[telefonoUsuario]' , $Telefono , $mensaje );
        $mensaje = str_replace( '[referencia]' , $newref , $mensaje );
        $mensaje = str_replace( '[IP]' , $IP , $mensaje );
        $mensaje = str_replace( '[poblacion]' , $transient_ref['wpfadr'] , $mensaje );
        $mensaje = str_replace( '[CP]' , $transient_ref['wpfcp'] , $mensaje );
        $mensaje = str_replace( '[destino]' , $nombredestino , $mensaje );
        $mensaje = str_replace( '[ataud]' , $nombreataud , $mensaje );
        $mensaje = str_replace( '[velatorio]' ,$nombrevelatorio , $mensaje );
        $mensaje = str_replace( '[ceremonia]' , $nombredespedida , $mensaje );
        $mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€' , $mensaje );
        $mensaje = str_replace( '[nombreServicio]' , $titulo , $mensaje );
        $mensaje = str_replace( '[nombreFuneraria]' , get_the_title( $servicio ) , $mensaje );
        $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $servicio, "wpfunos_servicioTelefono", true)  , $mensaje );
        $mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
        $mensaje = str_replace( '[comentariosUsuario]' , wp_kses_post( $message ) , $mensaje );

        $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
        $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
        $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
        $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

        $userIP = apply_filters('wpfunos_userIP','dummy');
        do_action('wpfunos_log', '==============' );
        if( site_url() === 'https://dev.funos.es'){
          wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoBoton1v2usuario') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo usuario efraim@efraim.cat' );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoBoton1v2usuario' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1v2usuario' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccBoton1v2usuario' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1v2usuario' ) ;
          wp_mail ( $transient_ref['wpfe'] , get_option('wpfunos_asuntoCorreoBoton1v2usuario') , $mensaje, $headers );
          $headers[]   = 'Reply-To: Clientes Funos <clientes@funos.es>';
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo usuario ' . $transient_ref['wpfe'] );
        }
        //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $newref );
      }
      // SMS
      if( strlen( get_post_meta( $servicio, "wpfunos_servicioTelefonoSMS", true) ) > 1){
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Prepara envio SMS llamamos Servicio' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'$Telefono: ' . get_post_meta( $servicio, "wpfunos_servicioTelefonoSMS", true) );

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

        $telSMS = str_replace(" ","", get_post_meta( $servicio, "wpfunos_servicioTelefonoSMS", true) );
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
        $request = str_replace ( '[nombre_SMS]' , $transient_ref['wpfn'] , $request );
        $request = str_replace ( '[telefono_SMS]' , $Telefono , $request );

        //do_action('wpfunos_log', $userIP.' - 0501 '.'$request: ' . $request );

        $SMS = wp_remote_post( 'https://api.gateway360.com/api/3.0/sms/send', array(
          'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
          'body'        => $request,
          'method'      => 'POST',
        ));

        $userAPIMessage = apply_filters('wpfunos_dumplog', $SMS[body] );
        //do_action('wpfunos_log', $userIP.' - 0501 '.'Body Respuesta: ' . $userAPIMessage  );
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Finaliza envio SMS' );
      }
      // SMS
    }//if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Llamamos') )
    //HUBSPOT
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Prepara envio Hubspot' );
    if( $hubspotutk == '' ) $hubspotutk = ( isset( $_COOKIE['hubspotutk'] ) ) ? $_COOKIE['hubspotutk'] : '' ;
    $params = array(
      'firstname' => $nombre ,
      'email' => $email,
      'phone' => $phone,
      'ok' => 'ok',
      'accion' => 'Datos usuario funerarias llamamos',
      'servicio' => $titulo,
      'precio' => $precio,
      'ip' => $userIP,
      'referencia' => $newref,
      'hubspotutk' => $hubspotutk,
      'pageUri' => 'https://funos.es/comparar-precios-resultados',
      'pageId' => 'Comparar precios resultados - Funos - Comparador de Funerarias'
    );
    do_action('wpfhubspot-send-form', $params );
    do_action('wpfhubspot-usuarios',array( 'email' => $email, 'hubspotutk' => $hubspotutk ) );
    //sleep(1);
    //$params = array(
    //  'email' => $email,
    //  'ip' => $userIP,
    //  'ok' => 'ok',
    //  'hubspotutk' => $hubspotutk,
    //  'accion' => 'Datos usuario funerarias llamamos',
    //  'pageUri' => 'https://funos.es/comparar-precios-resultados',
    //  'pageId' => 'Comparar precios resultados - Funos - Comparador de Funerarias'
    //);
    //do_action('wpfhubspot-send-form', $params );

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Finaliza envio formulario Hubspot' );
    //HUBSPOT

    $result['type'] = "success";
    $result['newref'] = $newref;
    $result['transient'] = $transient_ref;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }//public function wpfunosV3Llamamos

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Llamar
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_llamar', function () { $this->wpfunosV3Llamar();});
  * add_action('wp_ajax_wpfunos_ajax_v3_llamar', function () {$this->wpfunosV3Llamar();});
  */
  public function wpfunosV3Llamar(){
    $servicio = $_POST['servicio'];
    $wpnonce = $_POST['wpnonce'];
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    //  EBG 03-11-22
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $wpfcuando = $_POST['cuando'];
    $hubspotutk = $_POST['hubspotutk'];
    //
    $IP = apply_filters('wpfunos_userIP','dummy');

    if( '' == $nombre || '' == $email || '' == $phone ){
      $result['type'] = "Sin datos";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    if( apply_filters( 'wpfunos_pruebas_email', $email ) ){
      $result['type'] = "pruebas@funos.es";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    $transient_ref = get_transient('wpfunos-wpfref-v3-' .$IP );
    if( $transient_ref === false ){
      $result['type'] = "No transient";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }
    //  EBG 03-11-22
    $transient_ref['wpfn'] = $nombre;
    $transient_ref['wpfe'] = $email;
    $transient_ref['wpft'] = $phone;
    set_transient( 'wpfunos-wpfref-v3-' .$IP, $transient_ref, DAY_IN_SECONDS );
    //

    if ( !wp_verify_nonce( $wpnonce, "wpfunos_serviciosv3_nonce".$IP ) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }
    $userIP = apply_filters('wpfunos_userIP','dummy');
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Llegada ajax Servicio Boton llamar' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpfnombre ' .$transient_ref['wpfn'] );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpfemail ' .$transient_ref['wpfe'] );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpftelefono ' .$transient_ref['wpft'] );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: Servicio titulo: ' . $titulo );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: Servicio ' . $servicio );

    if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Llamar') ){

      switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = esc_html__('Entierro', 'wpfunos_es'); break; case '2': $destino = 'I' ; $nombredestino = esc_html__('Incineración', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = esc_html__('Ataúd medio', 'wpfunos_es'); break; case '2': $ataud = 'E' ; $nombreataud = esc_html__('Ataúd económico', 'wpfunos_es'); break; case '3': $ataud = 'P' ; $nombreataud = esc_html__('Ataúd premium', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = esc_html__('Velatorio', 'wpfunos_es') ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = esc_html__('Sin velatorio', 'wpfunos_es') ; break; }
      switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = esc_html__('Sin ceremonia', 'wpfunos_es') ; break; case '2': $despedida = 'O' ; $nombredespedida = esc_html__('Solo sala', 'wpfunos_es') ; break; case '3': $despedida = 'C' ; $nombredespedida = esc_html__('Ceremonia civil', 'wpfunos_es') ; break; case '4': $despedida = 'R' ; $nombredespedida = esc_html__('Ceremonia religiosa', 'wpfunos_es') ; break; }

      $Telefono = apply_filters('wpfunos_telefono_formateado', $transient_ref['wpft'] );

      mt_srand(time());
      $newref = 'funos-'.(string)mt_rand();

      $contador = $this->wpfunosV3ContadorEntradas( $IP, '2' );
      //'wpfunos_userVisitas' => $contador,
      $log = (is_user_logged_in()) ? 'logged' : 'not logged';
      $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';

      $my_post = array(
        'post_title' => $newref,
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => sanitize_text_field( $transient_ref['wpfe'] ),
          'wpfunos_userReferencia' => sanitize_text_field( $newref ),
          'wpfunos_userName' => sanitize_text_field( $transient_ref['wpfn'] ),
          'wpfunos_userPhone' => sanitize_text_field( $Telefono ),
          'wpfunos_userCP' => sanitize_text_field( $transient_ref['wpfcp'] ),
          'wpfunos_userAccion' => '2',
          'wpfunos_userNombreAccion' => 'Botón llamar servicios',
          'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( $transient_ref['wpfadr'] ),
          'wpfunos_userNombreSeleccionDistancia' => sanitize_text_field( $transient_ref['wpfdist'] ),
          'wpfunos_userNombreSeleccionServicio' => sanitize_text_field( $nombredestino ),
          'wpfunos_userNombreSeleccionAtaud' => sanitize_text_field( $nombreataud ),
          'wpfunos_userNombreSeleccionVelatorio' => sanitize_text_field( $nombrevelatorio  ),
          'wpfunos_userNombreSeleccionDespedida' => sanitize_text_field( $nombredespedida ),
          'wpfunos_userServicio' => sanitize_text_field( $servicio ),
          'wpfunos_userServicioEnviado' => true,
          'wpfunos_userAceptaPolitica' => true,
          'wpfunos_userServicioTitulo' => sanitize_text_field( get_the_title( $servicio ) ),
          'wpfunos_userServicioEmpresa' => sanitize_text_field( get_post_meta( $servicio, 'wpfunos_servicioEmpresa', true ) ),
          'wpfunos_userServicioPoblacion' => sanitize_text_field( get_post_meta( $servicio, 'wpfunos_servicioPoblacion', true ) ),
          'wpfunos_userServicioProvincia' => sanitize_text_field( get_post_meta( $servicio, 'wpfunos_servicioProvincia', true ) ),
          'wpfunos_userPrecio' => number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€',
          'wpfunos_userComentarios' => wp_kses_post( $mensajeusuario ),
          'wpfunos_userIP' => sanitize_text_field( $IP ),
          'wpfunos_userLAT' => sanitize_text_field( $transient_ref['wpflat'] ),
          'wpfunos_userLNG' => sanitize_text_field( $transient_ref['wpflng'] ),
          'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
          'wpfunos_userVisitas' => $contador,
          'wpfunos_Dummy' => true,
          'wpfunos_userLog' => $log,
          'wpfunos_userMobile' => $mobile,
          'wpfunos_userHubspotUTK' => $hubspotutk,
        ),
      );

      $post_id = wp_insert_post($my_post);

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Botón llamar servicio' );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' .  $transient_ref['wpfn'] );
      do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $newref );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Post ID: ' .  $post_id  );

      if( get_option('wpfunos_activarCorreoBoton2v2Admin') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: funos <clientes@funos.es>';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton2v2Admin'), get_option('wpfunos_asuntoCorreoBoton2v2Admin') );

        $mensaje = str_replace( '[email]' , $transient_ref['wpfe'] , $mensaje );
        $mensaje = str_replace( '[nombreUsuario]' , $transient_ref['wpfn'] , $mensaje );
        $mensaje = str_replace( '[telefonoUsuario]' , $Telefono , $mensaje );
        $mensaje = str_replace( '[referencia]' , $newref , $mensaje );
        $mensaje = str_replace( '[IP]' , $IP , $mensaje );
        $mensaje = str_replace( '[poblacion]' , $transient_ref['wpfadr'] , $mensaje );
        $mensaje = str_replace( '[CP]' , $transient_ref['wpfcp'] , $mensaje );
        $mensaje = str_replace( '[destino]' , $nombredestino , $mensaje );
        $mensaje = str_replace( '[ataud]' , $nombreataud , $mensaje );
        $mensaje = str_replace( '[velatorio]' ,$nombrevelatorio , $mensaje );
        $mensaje = str_replace( '[ceremonia]' , $nombredespedida , $mensaje );
        $mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€' , $mensaje );
        $mensaje = str_replace( '[nombreServicio]' , $titulo , $mensaje );
        $mensaje = str_replace( '[nombreFuneraria]' , get_the_title( $servicio ) , $mensaje );
        $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $servicio, "wpfunos_servicioTelefono", true)  , $mensaje );
        $mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
        $mensaje = str_replace( '[comentariosUsuario]' , apply_filters('wpfunos_comentario', $mensajeusuario ) , $mensaje );

        $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
        $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
        $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
        $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

        do_action('wpfunos_log', '==============' );
        if( site_url() === 'https://dev.funos.es'){
          wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoBoton2v2Admin') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo lead2 efraim@efraim.cat' );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoBoton2v2Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2v2Admin' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccBoton2v2Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2v2Admin' ) ;
          wp_mail (  get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoBoton2v2Admin') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo lead2 ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
        }
        //
        update_post_meta( $post_id, 'wpfunos_userLead', true );

        //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $newref );

      }
      if( get_option('wpfunos_activarCorreoBoton2v2usuario') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: funos <clientes@funos.es>';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton2v2usuario'), get_option('wpfunos_asuntoCorreoBoton2v2usuario') );

        $mensaje = str_replace( '[email]' , $transient_ref['wpfe'] , $mensaje );
        $mensaje = str_replace( '[nombreUsuario]' , $transient_ref['wpfn'] , $mensaje );
        $mensaje = str_replace( '[telefonoUsuario]' , $Telefono , $mensaje );
        $mensaje = str_replace( '[referencia]' , $newref , $mensaje );
        $mensaje = str_replace( '[IP]' , $IP , $mensaje );
        $mensaje = str_replace( '[poblacion]' , $transient_ref['wpfadr'] , $mensaje );
        $mensaje = str_replace( '[CP]' , $transient_ref['wpfcp'] , $mensaje );
        $mensaje = str_replace( '[destino]' , $nombredestino , $mensaje );
        $mensaje = str_replace( '[ataud]' , $nombreataud , $mensaje );
        $mensaje = str_replace( '[velatorio]' ,$nombrevelatorio , $mensaje );
        $mensaje = str_replace( '[ceremonia]' , $nombredespedida , $mensaje );
        $mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€' , $mensaje );
        $mensaje = str_replace( '[nombreServicio]' , $titulo , $mensaje );
        $mensaje = str_replace( '[nombreFuneraria]' , get_the_title( $servicio ) , $mensaje );
        $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $servicio, "wpfunos_servicioTelefono", true)  , $mensaje );
        $mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
        $mensaje = str_replace( '[comentariosUsuario]' , apply_filters('wpfunos_comentario', $mensajeusuario ) , $mensaje );

        $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
        $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
        $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
        $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

        do_action('wpfunos_log', '==============' );
        if( site_url() === 'https://dev.funos.es'){
          wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoBoton2v2usuario') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo lead2 efraim@efraim.cat' );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoBoton2v2usuario' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2v2usuario' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccBoton2v2usuario' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2v2usuario' ) ;
          $headers[]   = 'Reply-To: Clientes Funos <clientes@funos.es>';
          wp_mail (  $transient_ref['wpfe'] , get_option('wpfunos_asuntoCorreoBoton2v2usuario') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo usuario ' .  $transient_ref['wpfe'] );
        }
        //
        //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $newref );
      }
      // SMS
      if( strlen( get_post_meta( $servicio, "wpfunos_servicioTelefonoSMS", true) ) > 1){
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Prepara envio SMS Llamar Servicio' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'$Telefono: ' . get_post_meta( $servicio, "wpfunos_servicioTelefonoSMS", true) );

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

        $telSMS = str_replace(" ","", get_post_meta( $servicio, "wpfunos_servicioTelefonoSMS", true) );
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
        $request = str_replace ( '[nombre_SMS]' , $transient_ref['wpfn'] , $request );
        $request = str_replace ( '[telefono_SMS]' , $Telefono , $request );

        //do_action('wpfunos_log', $userIP.' - 0501 '.'$request: ' . $request );

        $SMS = wp_remote_post( 'https://api.gateway360.com/api/3.0/sms/send', array(
          'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
          'body'        => $request,
          'method'      => 'POST',
        ));

        $userAPIMessage = apply_filters('wpfunos_dumplog', $SMS[body] );
        //do_action('wpfunos_log', $userIP.' - 0501 '.'Body Respuesta: ' . $userAPIMessage  );
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Finaliza envio SMS' );
      }
      // SMS
    }//if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Llamar') )
    //HUBSPOT
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Prepara envio Hubspot' );
    if( $hubspotutk == '' ) $hubspotutk = ( isset( $_COOKIE['hubspotutk'] ) ) ? $_COOKIE['hubspotutk'] : '' ;
    $params = array(
      'firstname' => $nombre ,
      'email' => $email,
      'phone' => $phone,
      'ok' => 'ok',
      'accion' => 'Datos usuario funerarias llamar',
      'servicio' => $titulo,
      'precio' => $precio,
      'ip' => $userIP,
      'referencia' => $newref,
      'hubspotutk' => $hubspotutk,
      'pageUri' => 'https://funos.es/comparar-precios-resultados',
      'pageId' => 'Comparar precios resultados - Funos - Comparador de Funerarias'
    );
    do_action('wpfhubspot-send-form', $params );
    do_action('wpfhubspot-usuarios',array( 'email' => $email, 'hubspotutk' => $hubspotutk ) );
    //sleep(1);
    //$params = array(
    //  'email' => $email,
    //  'ip' => $userIP,
    //  'ok' => 'ok',
    //  'hubspotutk' => $hubspotutk,
    //  'accion' => 'Datos usuario funerarias llamar',
    //  'pageUri' => 'https://funos.es/comparar-precios-resultados',
    //  'pageId' => 'Comparar precios resultados - Funos - Comparador de Funerarias'
    //);
    //do_action('wpfhubspot-send-form', $params );

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Finaliza envio formulario Hubspot' );
    //HUBSPOT
    $result['type'] = "success";
    $result['newref'] = $newref;
    $result['transient'] = $transient_ref;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }//public function wpfunosV3Llamar()

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Presupuesto
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_presupuesto', function () { $this->wpfunosV3Presupuesto();});
  * add_action('wp_ajax_wpfunos_ajax_v3_presupuesto', function () {$this->wpfunosV3Presupuesto();});
  */
  public function wpfunosV3Presupuesto(){
    $servicio = $_POST['servicio'];
    $wpnonce = $_POST['wpnonce'];
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $mensajeusuario = $_POST['mensaje'];
    //  EBG 03-11-22
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $wpfcuando = $_POST['cuando'];
    $hubspotutk = $_POST['hubspotutk'];
    //
    $IP = apply_filters('wpfunos_userIP','dummy');

    $transient_ref = get_transient('wpfunos-wpfref-v3-' .$IP );
    if( $transient_ref === false ){
      $result['type'] = "No transient";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    if( apply_filters( 'wpfunos_pruebas_email', $email ) ){
      $result['type'] = "pruebas@funos.es";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    //  EBG 03-11-22
    $transient_ref['wpfn'] = $nombre;
    $transient_ref['wpfe'] = $email;
    $transient_ref['wpft'] = $phone;
    set_transient( 'wpfunos-wpfref-v3-' .$IP, $transient_ref, DAY_IN_SECONDS );
    //

    if( '' == $nombre || '' == $email || '' == $phone ){
      $result['type'] = "Sin datos";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    if ( !wp_verify_nonce( $wpnonce, "wpfunos_serviciosv3_nonce".$IP ) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    $userIP = apply_filters('wpfunos_userIP','dummy');
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Llegada ajax Servicio Boton Presupuesto' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpfnombre ' .$transient_ref['wpfn'] );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpfemail ' .$transient_ref['wpfe'] );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: wpftelefono ' .$transient_ref['wpft'] );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: Servicio titulo: ' . $titulo );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: Servicio ' . $servicio );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Ajax: Mensaje: ' . $mensajeusuario );

    if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Presupuesto') ){

      switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = esc_html__('Entierro', 'wpfunos_es'); break; case '2': $destino = 'I' ; $nombredestino = esc_html__('Incineración', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = esc_html__('Ataúd medio', 'wpfunos_es'); break; case '2': $ataud = 'E' ; $nombreataud = esc_html__('Ataúd económico', 'wpfunos_es'); break; case '3': $ataud = 'P' ; $nombreataud = esc_html__('Ataúd premium', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = esc_html__('Velatorio', 'wpfunos_es') ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = esc_html__('Sin velatorio', 'wpfunos_es') ; break; }
      switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = esc_html__('Sin ceremonia', 'wpfunos_es') ; break; case '2': $despedida = 'O' ; $nombredespedida = esc_html__('Solo sala', 'wpfunos_es') ; break; case '3': $despedida = 'C' ; $nombredespedida = esc_html__('Ceremonia civil', 'wpfunos_es') ; break; case '4': $despedida = 'R' ; $nombredespedida = esc_html__('Ceremonia religiosa', 'wpfunos_es') ; break; }

      $Telefono = apply_filters('wpfunos_telefono_formateado', $transient_ref['wpft'] );

      mt_srand(time());
      $newref = 'funos-'.(string)mt_rand();

      $contador = $this->wpfunosV3ContadorEntradas( $IP, '5' );
      //'wpfunos_userVisitas' => $contador,
      $log = (is_user_logged_in()) ? 'logged' : 'not logged';
      $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';

      $my_post = array(
        'post_title' => $newref,
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => sanitize_text_field( $transient_ref['wpfe'] ),
          'wpfunos_userReferencia' => sanitize_text_field( $newref ),
          'wpfunos_userName' => sanitize_text_field( $transient_ref['wpfn'] ),
          'wpfunos_userPhone' => sanitize_text_field( $Telefono ),
          'wpfunos_userCP' => sanitize_text_field( $transient_ref['wpfcp'] ),
          'wpfunos_userAccion' => '5',
          'wpfunos_userNombreAccion' => 'Botón pedir presupuesto',
          'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( $transient_ref['wpfadr'] ),
          'wpfunos_userNombreSeleccionDistancia' => sanitize_text_field( $transient_ref['wpfdist'] ),
          'wpfunos_userNombreSeleccionServicio' => sanitize_text_field( $nombredestino ),
          'wpfunos_userNombreSeleccionAtaud' => sanitize_text_field( $nombreataud ),
          'wpfunos_userNombreSeleccionVelatorio' => sanitize_text_field( $nombrevelatorio  ),
          'wpfunos_userNombreSeleccionDespedida' => sanitize_text_field( $nombredespedida ),
          'wpfunos_userServicio' => sanitize_text_field( $servicio ),
          'wpfunos_userServicioEnviado' => true,
          'wpfunos_userAceptaPolitica' => true,
          'wpfunos_userServicioTitulo' => sanitize_text_field( get_the_title( $servicio ) ),
          'wpfunos_userServicioEmpresa' => sanitize_text_field( get_post_meta( $servicio, 'wpfunos_servicioEmpresa', true ) ),
          'wpfunos_userServicioPoblacion' => sanitize_text_field( get_post_meta( $servicio, 'wpfunos_servicioPoblacion', true ) ),
          'wpfunos_userServicioProvincia' => sanitize_text_field( get_post_meta( $servicio, 'wpfunos_servicioProvincia', true ) ),
          'wpfunos_userPrecio' => number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€',
          'wpfunos_userComentarios' => wp_kses_post( $mensajeusuario ),
          'wpfunos_userIP' => sanitize_text_field( $IP ),
          'wpfunos_userLAT' => sanitize_text_field( $transient_ref['wpflat'] ),
          'wpfunos_userLNG' => sanitize_text_field( $transient_ref['wpflng'] ),
          'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
          'wpfunos_userVisitas' => $contador,
          'wpfunos_Dummy' => true,
          'wpfunos_userLog' => $log,
          'wpfunos_userMobile' => $mobile,
          'wpfunos_userHubspotUTK' => $hubspotutk,
        ),
      );

      $post_id = wp_insert_post($my_post);

      $userIP = apply_filters('wpfunos_userIP','dummy');
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Botón Pedir presupuesto' );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' .  $transient_ref['wpfn'] );
      do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $newref );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Post ID: ' .  $post_id  );

      if( get_option('wpfunos_activarCorreoPresupuestoLead') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: funos <clientes@funos.es>';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoPresupuestoLead'), get_option('wpfunos_asuntoCorreoPresupuestoLead') );

        $mensaje = str_replace( '[email]' , $transient_ref['wpfe'] , $mensaje );
        $mensaje = str_replace( '[nombreUsuario]' , $transient_ref['wpfn'] , $mensaje );
        $mensaje = str_replace( '[telefonoUsuario]' , $Telefono , $mensaje );
        $mensaje = str_replace( '[referencia]' , $newref , $mensaje );
        $mensaje = str_replace( '[IP]' , $IP , $mensaje );
        $mensaje = str_replace( '[poblacion]' , $transient_ref['wpfadr'] , $mensaje );
        $mensaje = str_replace( '[CP]' , $transient_ref['wpfcp'] , $mensaje );
        $mensaje = str_replace( '[destino]' , $nombredestino , $mensaje );
        $mensaje = str_replace( '[ataud]' , $nombreataud , $mensaje );
        $mensaje = str_replace( '[velatorio]' ,$nombrevelatorio , $mensaje );
        $mensaje = str_replace( '[ceremonia]' , $nombredespedida , $mensaje );
        $mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€' , $mensaje );
        $mensaje = str_replace( '[nombreServicio]' , $titulo , $mensaje );
        $mensaje = str_replace( '[nombreFuneraria]' , get_the_title( $servicio ) , $mensaje );
        $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $servicio, "wpfunos_servicioTelefono", true)  , $mensaje );
        $mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
        $mensaje = str_replace( '[comentariosUsuario]' , apply_filters('wpfunos_comentario', $mensajeusuario ) , $mensaje );

        $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
        $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
        $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
        $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

        do_action('wpfunos_log', '==============' );
        if( site_url() === 'https://dev.funos.es'){
          wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoPresupuestoLead') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo pedir presupuesto efraim@efraim.cat' );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ;
          wp_mail (  get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoPresupuestoLead') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo pedir presupuesto ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
        }
        update_post_meta( $post_id, 'wpfunos_userLead', true );

        //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $transient_ref['wpfref'] );

      }
      if( get_option('wpfunos_activarCorreoPresupuestousuario') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: funos <clientes@funos.es>';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoPresupuestousuario'), get_option('wpfunos_asuntoCorreoPresupuestousuario') );

        $mensaje = str_replace( '[email]' , $transient_ref['wpfe'] , $mensaje );
        $mensaje = str_replace( '[nombreUsuario]' , $transient_ref['wpfn'] , $mensaje );
        $mensaje = str_replace( '[telefonoUsuario]' , $Telefono , $mensaje );
        $mensaje = str_replace( '[referencia]' , $newref , $mensaje );
        $mensaje = str_replace( '[IP]' , $IP , $mensaje );
        $mensaje = str_replace( '[poblacion]' , $transient_ref['wpfadr'] , $mensaje );
        $mensaje = str_replace( '[CP]' , $transient_ref['wpfcp'] , $mensaje );
        $mensaje = str_replace( '[destino]' , $nombredestino , $mensaje );
        $mensaje = str_replace( '[ataud]' , $nombreataud , $mensaje );
        $mensaje = str_replace( '[velatorio]' ,$nombrevelatorio , $mensaje );
        $mensaje = str_replace( '[ceremonia]' , $nombredespedida , $mensaje );
        $mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€' , $mensaje );
        $mensaje = str_replace( '[nombreServicio]' , $titulo , $mensaje );
        $mensaje = str_replace( '[nombreFuneraria]' , get_the_title( $servicio ) , $mensaje );
        $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $servicio, "wpfunos_servicioTelefono", true)  , $mensaje );
        $mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
        $mensaje = str_replace( '[comentariosUsuario]' , apply_filters('wpfunos_comentario', $mensajeusuario ) , $mensaje );

        $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
        $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
        $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
        $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

        do_action('wpfunos_log', '==============' );
        if( site_url() === 'https://dev.funos.es'){
          wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoPresupuestousuario') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo pedir presupuesto efraim@efraim.cat' );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoPresupuestousuario' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPresupuestousuario' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccPresupuestousuario' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPresupuestousuario' ) ;
          $headers[]   = 'Reply-To: Clientes Funos <clientes@funos.es>';
          wp_mail ( $transient_ref['wpfe'] , get_option('wpfunos_asuntoCorreoPresupuestousuario') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviado correo pedir presupuesto usuario ' . $transient_ref['wpfe'] );
        }

        //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $transient_ref['wpfref'] );

      }
      // SMS
      if( strlen( get_post_meta( $servicio, "wpfunos_servicioTelefonoSMS", true) ) > 1){
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Prepara envio SMS Presupuesto Servicio' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'$Telefono: ' . get_post_meta( $servicio, "wpfunos_servicioTelefonoSMS", true) );

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

        $telSMS = str_replace(" ","", get_post_meta( $servicio, "wpfunos_servicioTelefonoSMS", true) );
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
        $request = str_replace ( '[nombre_SMS]' , $transient_ref['wpfn'] , $request );
        $request = str_replace ( '[telefono_SMS]' , $Telefono , $request );

        //do_action('wpfunos_log', $userIP.' - 0501 '.'$request: ' . $request );

        $SMS = wp_remote_post( 'https://api.gateway360.com/api/3.0/sms/send', array(
          'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
          'body'        => $request,
          'method'      => 'POST',
        ));

        $userAPIMessage = apply_filters('wpfunos_dumplog', $SMS[body] );
        //do_action('wpfunos_log', $userIP.' - 0501 '.'Body Respuesta: ' . $userAPIMessage  );
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0501 '.'Finaliza envio SMS' );
      }
      // SMS
    }//if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Presupuesto') )
    //HUBSPOT
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Prepara envio Hubspot' );
    if( $hubspotutk == '' ) $hubspotutk = ( isset( $_COOKIE['hubspotutk'] ) ) ? $_COOKIE['hubspotutk'] : '' ;
    $params = array(
      'firstname' => $nombre ,
      'email' => $email,
      'phone' => $phone,
      'mensaje' => $mensajeusuario,
      'ok' => 'ok',
      'accion' => 'Datos usuario funerarias Presupuesto',
      'servicio' => $titulo,
      'precio' => $precio,
      'ip' => $userIP,
      'referencia' => $newref,
      'hubspotutk' => $hubspotutk,
      'pageUri' => 'https://funos.es/comparar-precios-resultados',
      'pageId' => 'Comparar precios resultados - Funos - Comparador de Funerarias'
    );
    do_action('wpfhubspot-send-form', $params );
    do_action('wpfhubspot-usuarios',array( 'email' => $email, 'hubspotutk' => $hubspotutk ) );
    //sleep(1);
    //$params = array(
    //  'email' => $email,
    //  'ip' => $userIP,
    //  'ok' => 'ok',
    //  'hubspotutk' => $hubspotutk,
    //  'accion' => 'Datos usuario funerarias Presupuesto',
    //  'pageUri' => 'https://funos.es/comparar-precios-resultados',
    //  'pageId' => 'Comparar precios resultados - Funos - Comparador de Funerarias'
    //);
    //do_action('wpfhubspot-send-form', $params );

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Finaliza envio formulario Hubspot' );
    //HUBSPOT
    $result['type'] = "success";
    $result['newref'] = $newref;
    $result['transient'] = $transient_ref;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Ver detalles
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_detalles', function () { $this->wpfunosV3Detalles();});
  * add_action('wp_ajax_wpfunos_ajax_v3_detalles', function () {$this->wpfunosV3Detalles();});
  */
  public function wpfunosV3Detalles(){
    $servicio = $_POST['servicio'];
    $wpnonce = $_POST['wpnonce'];
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $distancia = $_POST['distancia'];
    $telefonoservicio = $_POST['telefono'];
    //  EBG 03-11-22
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //
    $resp1 = $_POST['resp1'];
    $resp2 = $_POST['resp2'];
    $resp3 = $_POST['resp3'];
    $resp4 = $_POST['resp4'];

    $IP = apply_filters('wpfunos_userIP','dummy');

    $transient_ref = get_transient('wpfunos-wpfref-v3-' .$IP );
    if( $transient_ref === false ){
      $result['type'] = "No transient";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }
    //  EBG 03-11-22
    $transient_ref['wpfn'] = $nombre;
    $transient_ref['wpfe'] = $email;
    $transient_ref['wpft'] = $phone;
    set_transient( 'wpfunos-wpfref-v3-' .$IP, $transient_ref, DAY_IN_SECONDS );
    //

    if ( !wp_verify_nonce( $wpnonce, "wpfunos_serviciosv3_nonce".$IP ) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    //switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = 'Entierro'; break; case '2': $destino = 'I' ; $nombredestino = 'Incineración'; break; }
    //switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = 'Ataúd medio'; break; case '2': $ataud = 'E' ; $nombreataud = 'Ataúd económico'; break; case '3': $ataud = 'P' ; $nombreataud = 'Ataúd premium'; break; }
    //switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = 'Velatorio' ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = 'Sin velatorio' ; break; }
    //switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = 'Sin ceremonia' ; break; case '2': $despedida = 'O' ; $nombredespedida = 'Solo sala' ; break; case '3': $despedida = 'C' ; $nombredespedida = 'Ceremonia civil' ; break; case '4': $despedida = 'R' ; $nombredespedida = 'Ceremonia religiosa' ; break; }

    switch( $resp1 ) { case '1': $destino = 'E' ; $nombredestino = esc_html__('Entierro', 'wpfunos_es'); break; case '2': $destino = 'I' ; $nombredestino = esc_html__('Incineración', 'wpfunos_es'); break; }
    switch( $resp2 ) { case '1': $ataud = 'M' ; $nombreataud = esc_html__('Ataúd medio', 'wpfunos_es'); break; case '2': $ataud = 'E' ; $nombreataud = esc_html__('Ataúd económico', 'wpfunos_es'); break; case '3': $ataud = 'P' ; $nombreataud = esc_html__('Ataúd premium', 'wpfunos_es'); break; }
    switch( $resp3 ) { case '1': $velatorio = 'V' ; $nombrevelatorio = esc_html__('Velatorio', 'wpfunos_es') ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = esc_html__('Sin velatorio', 'wpfunos_es') ; break; }
    switch( $resp4 ) { case '1': $despedida = 'S' ; $nombredespedida = esc_html__('Sin ceremonia', 'wpfunos_es') ; break; case '2': $despedida = 'O' ; $nombredespedida = esc_html__('Solo sala', 'wpfunos_es') ; break; case '3': $despedida = 'C' ; $nombredespedida = esc_html__('Ceremonia civil', 'wpfunos_es') ; break; case '4': $despedida = 'R' ; $nombredespedida = esc_html__('Ceremonia religiosa', 'wpfunos_es') ; break; }

    // WPML
    //
    // Cambiar el origen del comentario y calcularlo en lugar de usar el ya calculado.
    // La cantidad de traducciones que el comentario calculado genera no permite su uso.
    // El cálculo del comentario se hace en la función "wpfunosMaintenanceComentariosFunerarias" en class-wpfunos-admin.php ( sobre la linea 1400 el 14-12-22)
    //

    $comentarios = '<h3><strong>' .esc_html__('Qúe está incluido en el precio', 'wpfunos_es'). '</strong></h3><p></p>';

    // WPML
    $servicioTrad = apply_filters( 'wpml_object_id', $servicio, 'post', TRUE );
    // WPML

    $comentarios .= '<h4><strong>' .esc_html__('Detalles de servicio base', 'wpfunos_es'). '</strong></h3>';
    $customfield_content = apply_filters( 'the_content', get_post_meta( $servicioTrad, 'wpfunos_servicioPrecioBaseComentario', true ) );
    $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
    $comentarios .= $customfield_content ;

    if( 'E' == $destino ){
      $comentarios .= '<h4><strong>' .esc_html__('Detalles de entierro', 'wpfunos_es'). '</strong></h4>';
      $customfield_content = apply_filters( 'the_content', get_post_meta( $servicioTrad, 'wpfunos_servicioDestino_1Comentario', true ) );
      $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
      $comentarios .= $customfield_content ;
    }
    if( 'I'  == $destino ) {
      $comentarios .= '<h4><strong>' .esc_html__('Detalles de  incineración', 'wpfunos_es'). '</strong></h4>';
      $customfield_content = apply_filters( 'the_content', get_post_meta( $servicioTrad, 'wpfunos_servicioDestino_2Comentario', true ) );
      $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
      $comentarios .= $customfield_content ;
    }

    if( 'E' == $ataud  ) {
      $comentarios .= '<h4><strong>' .esc_html__('Detalles de  ataúd gama económica', 'wpfunos_es'). '</strong></h4>';
      $customfield_content = apply_filters( 'the_content', get_post_meta( $servicioTrad, 'wpfunos_servicioAtaudEcologico_1Comentario', true ) );
      $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
      $comentarios .= $customfield_content ;
    }
    if( 'M' == $ataud ) {
      $comentarios .= '<h4><strong>' .esc_html__('Detalles de  ataúd gama media', 'wpfunos_es'). '</strong></h4>';
      $customfield_content = apply_filters( 'the_content', get_post_meta( $servicioTrad, 'wpfunos_servicioAtaudEcologico_2Comentario', true ) );
      $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
      $comentarios .= $customfield_content ;
    }
    if( 'P' == $ataud ) {
      $comentarios .= '<h4><strong>' .esc_html__('Detalles de  ataúd gama premium', 'wpfunos_es'). '</strong></h4>';
      $customfield_content = apply_filters( 'the_content', get_post_meta( $servicioTrad, 'wpfunos_servicioAtaudEcologico_3Comentario', true ) );
      $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
      $comentarios .= $customfield_content ;
    }

    if( 'V' == $velatorio ) {
      $comentarios .= '<h4><strong>' .esc_html__('Detalles de  velatorio', 'wpfunos_es'). '</strong></h4>';
      $customfield_content = apply_filters( 'the_content', get_post_meta( $servicioTrad, 'wpfunos_servicioVelatorioComentario', true ) );
      $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
      $comentarios .= $customfield_content ;
    }

    if( 'O' == $despedida ) {
      $comentarios .= '<h4><strong>' .esc_html__('Detalles de  ceremonia', 'wpfunos_es'). '</strong></h4>';
      $customfield_content = apply_filters( 'the_content', get_post_meta( $servicioTrad, 'wpfunos_servicioDespedida_1Comentario', true ) );
      $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
      $comentarios .= $customfield_content ;
    }
    if( 'C' == $despedida ) {
      $comentarios .= '<h4><strong>' .esc_html__('Detalles de  ceremonia', 'wpfunos_es'). '</strong></h4>';
      $customfield_content = apply_filters( 'the_content', get_post_meta( $servicioTrad, 'wpfunos_servicioDespedida_2Comentario', true ) );
      $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
      $comentarios .= $customfield_content ;
    }
    if( 'R' == $despedida ) {
      $comentarios .= '<h4><strong>' .esc_html__('Detalles de ceremonia', 'wpfunos_es'). '</strong></h4>';
      $customfield_content = apply_filters( 'the_content', get_post_meta( $servicioTrad, 'wpfunos_servicioDespedida_3Comentario', true ) );
      $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
      $comentarios .= $customfield_content ;
    }

    $comentarios .= '<h4><strong>' .esc_html__('Posibles Extras', 'wpfunos_es'). '</strong></h4>';
    $customfield_content = apply_filters( 'the_content', get_post_meta( $servicioTrad, 'wpfunos_servicioPosiblesExtras', true ) );
    $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
    $comentarios .= $customfield_content ;

    //
    //
    //$comentarios = get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) ;
    //
    // FIN aviso WPML

    $result['type'] = "success";
    $result['valor_logo'] = wp_get_attachment_image ( get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) ,array(32,32) );
    $result['valor_servicio'] = $nombredestino. ', ' .$nombreataud. ', ' .$nombrevelatorio. ', ' .$nombredespedida;
    $result['valor_nombre'] = get_post_meta( $servicio, 'wpfunos_servicioNombre', true );

    // WPML
    //$servicioTrad = apply_filters( 'wpml_object_id', $post->ID, 'post', TRUE );
    //$titulo = get_post_meta( $servicioTrad, 'wpfunos_provinciasTitulo', true );
    //$comentarios = get_post_meta( $servicioTrad, 'wpfunos_provinciasComentarios', true );
    // WPML

    $result['valor_nombrepack'] = get_post_meta( $servicioTrad, 'wpfunos_servicioPackNombre', true );
    $result['valor_valoracion'] = get_post_meta( $servicio, 'wpfunos_servicioValoracion', true );
    $result['valor_precio'] = number_format($precio, 0, ',', '.') . '€';
    $result['valor_textoprecio'] = get_post_meta( $servicioTrad, 'wpfunos_servicioTextoPrecio', true );
    $result['valor_direccion'] = get_post_meta( $servicio, 'wpfunos_servicioDireccion', true );
    $result['valor_distancia'] = $distancia ;
    $result['valor_logo_confirmado'] = wp_get_attachment_image ( 83459 , array(66,66));
    $result['comentarios'] = $comentarios;

    $result['wpfid'] = $servicio;
    $result['wpfn'] = $wpnonce;
    $result['wpfp'] = $precio;
    $result['wpftitulo'] = $titulo;
    $result['wpfdistancia'] = $distancia;
    $result['wpftelefono'] = $telefonoservicio;

    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Email detalles
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_email', function () { $this->wpfunosV3Email();});
  * add_action('wp_ajax_wpfunos_ajax_v3_email', function () {$this->wpfunosV3Email();});
  */
  public function wpfunosV3Email(){
    $servicio = $_POST['servicio'];
    $wpnonce = $_POST['wpnonce'];
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $mensaje = $_POST['mensaje'];
    //  EBG 03-11-22
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //
    $IP = apply_filters('wpfunos_userIP','dummy');

    $transient_ref = get_transient('wpfunos-wpfref-v3-' .$IP );
    if( $transient_ref === false ){
      $result['type'] = "No transient";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    if( apply_filters( 'wpfunos_pruebas_email', $email ) ){
      $result['type'] = "pruebas@funos.es";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    //  EBG 03-11-22
    $transient_ref['wpfn'] = $nombre;
    $transient_ref['wpfe'] = $email;
    $transient_ref['wpft'] = $phone;
    set_transient( 'wpfunos-wpfref-v3-' .$IP, $transient_ref, DAY_IN_SECONDS );
    //

    if ( !wp_verify_nonce( $wpnonce, "wpfunos_serviciosv3_nonce".$IP ) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    if( get_option('wpfunos_activarCorreoUsuarioDetalles') ){

      switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = esc_html__('Entierro', 'wpfunos_es'); break; case '2': $destino = 'I' ; $nombredestino = esc_html__('Incineración', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = esc_html__('Ataúd medio', 'wpfunos_es'); break; case '2': $ataud = 'E' ; $nombreataud = esc_html__('Ataúd económico', 'wpfunos_es'); break; case '3': $ataud = 'P' ; $nombreataud = esc_html__('Ataúd premium', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = esc_html__('Velatorio', 'wpfunos_es') ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = esc_html__('Sin velatorio', 'wpfunos_es') ; break; }
      switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = esc_html__('Sin ceremonia', 'wpfunos_es') ; break; case '2': $despedida = 'O' ; $nombredespedida = esc_html__('Solo sala', 'wpfunos_es') ; break; case '3': $despedida = 'C' ; $nombredespedida = esc_html__('Ceremonia civil', 'wpfunos_es') ; break; case '4': $despedida = 'R' ; $nombredespedida = esc_html__('Ceremonia religiosa', 'wpfunos_es') ; break; }

      $Telefono = apply_filters('wpfunos_telefono_formateado', $transient_ref['wpft'] );

      $email = $transient_ref['wpfe'];

      // WPML
      //
      // Cambiar el origen del comentario y calcularlo en lugar de usar el ya calculado.
      // La cantidad de traducciones que el comentario calculado genera no permite su uso.
      // El cálculo del comentario se hace en la función "wpfunosMaintenanceComentariosFunerarias" en class-wpfunos-admin.php ( sobre la linea 1400 el 14-12-22)
      //
      //
      $comentarios = '<h3><strong>' .esc_html__('Qúe está incluido en el precio', 'wpfunos_es'). '</strong></h3><p></p>';
      $comentarios .= '<h4><strong>' .esc_html__('Detalles de servicio base', 'wpfunos_es'). '</strong></h3>';

      $customfield_content = apply_filters( 'the_content', get_post_meta( $servicio, 'wpfunos_servicioPrecioBaseComentario', true ) );
      $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
      $comentarios .= $customfield_content ;

      if( 'E' == $destino ){
        $comentarios .= '<h4><strong>' .esc_html__('Detalles de entierro', 'wpfunos_es'). '</strong></h4>';
        $customfield_content = apply_filters( 'the_content', get_post_meta( $servicio, 'wpfunos_servicioDestino_1Comentario', true ) );
        $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
        $comentarios .= $customfield_content ;
      }
      if( 'I'  == $destino ) {
        $comentarios .= '<h4><strong>' .esc_html__('Detalles de  incineración', 'wpfunos_es'). '</strong></h4>';
        $customfield_content = apply_filters( 'the_content', get_post_meta( $servicio, 'wpfunos_servicioDestino_2Comentario', true ) );
        $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
        $comentarios .= $customfield_content ;
      }

      if( 'E' == $ataud  ) {
        $comentarios .= '<h4><strong>' .esc_html__('Detalles de  ataúd gama económica', 'wpfunos_es'). '</strong></h4>';
        $customfield_content = apply_filters( 'the_content', get_post_meta( $servicio, 'wpfunos_servicioAtaudEcologico_1Comentario', true ) );
        $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
        $comentarios .= $customfield_content ;
      }
      if( 'M' == $ataud ) {
        $comentarios .= '<h4><strong>' .esc_html__('Detalles de  ataúd gama media', 'wpfunos_es'). '</strong></h4>';
        $customfield_content = apply_filters( 'the_content', get_post_meta( $servicio, 'wpfunos_servicioAtaudEcologico_2Comentario', true ) );
        $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
        $comentarios .= $customfield_content ;
      }
      if( 'P' == $ataud ) {
        $comentarios .= '<h4><strong>' .esc_html__('Detalles de  ataúd gama premium', 'wpfunos_es'). '</strong></h4>';
        $customfield_content = apply_filters( 'the_content', get_post_meta( $servicio, 'wpfunos_servicioAtaudEcologico_3Comentario', true ) );
        $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
        $comentarios .= $customfield_content ;
      }

      if( 'V' == $velatorio ) {
        $comentarios .= '<h4><strong>' .esc_html__('Detalles de  velatorio', 'wpfunos_es'). '</strong></h4>';
        $customfield_content = apply_filters( 'the_content', get_post_meta( $servicio, 'wpfunos_servicioVelatorioComentario', true ) );
        $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
        $comentarios .= $customfield_content ;
      }

      if( 'O' == $despedida ) {
        $comentarios .= '<h4><strong>' .esc_html__('Detalles de  ceremonia', 'wpfunos_es'). '</strong></h4>';
        $customfield_content = apply_filters( 'the_content', get_post_meta( $servicio, 'wpfunos_servicioDespedida_1Comentario', true ) );
        $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
        $comentarios .= $customfield_content ;
      }
      if( 'C' == $despedida ) {
        $comentarios .= '<h4><strong>' .esc_html__('Detalles de  ceremonia', 'wpfunos_es'). '</strong></h4>';
        $customfield_content = apply_filters( 'the_content', get_post_meta( $servicio, 'wpfunos_servicioDespedida_2Comentario', true ) );
        $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
        $comentarios .= $customfield_content ;
      }
      if( 'R' == $despedida ) {
        $comentarios .= '<h4><strong>' .esc_html__('Detalles de ceremonia', 'wpfunos_es'). '</strong></h4>';
        $customfield_content = apply_filters( 'the_content', get_post_meta( $servicio, 'wpfunos_servicioDespedida_3Comentario', true ) );
        $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
        $comentarios .= $customfield_content ;
      }

      $comentarios .= '<h4><strong>' .esc_html__('Posibles Extras', 'wpfunos_es'). '</strong></h4>';
      $customfield_content = apply_filters( 'the_content', get_post_meta( $servicio, 'wpfunos_servicioPosiblesExtras', true ) );
      $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
      $comentarios .= $customfield_content ;

      //
      // FIN aviso WPML

      unset($headers);
      $headers[] = 'Content-Type: text/html; charset=UTF-8';
      $headers[] = 'From: funos <clientes@funos.es>';
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoUsuarioDetalles'), get_option('wpfunos_asuntoCorreoUsuarioDetalles') );

      $mensaje = str_replace( '[email]' , $transient_ref['wpfe'] , $mensaje );
      $mensaje = str_replace( '[nombreUsuario]' , $transient_ref['wpfn'] , $mensaje );
      $mensaje = str_replace( '[telefonoUsuario]' , $Telefono , $mensaje );
      $mensaje = str_replace( '[referencia]' , $transient_ref['wpfref'] , $mensaje );
      $mensaje = str_replace( '[IP]' , $IP , $mensaje );
      $mensaje = str_replace( '[poblacion]' , $transient_ref['wpfadr'] , $mensaje );
      $mensaje = str_replace( '[CP]' , $transient_ref['wpfcp'] , $mensaje );
      $mensaje = str_replace( '[destino]' , $nombredestino , $mensaje );
      $mensaje = str_replace( '[ataud]' , $nombreataud , $mensaje );
      $mensaje = str_replace( '[velatorio]' ,$nombrevelatorio , $mensaje );
      $mensaje = str_replace( '[ceremonia]' , $nombredespedida , $mensaje );
      $mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $precio ), 0, ',', '.') . '€' , $mensaje );
      $mensaje = str_replace( '[nombreServicio]' , $titulo , $mensaje );
      $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $servicio, "wpfunos_servicioTelefono", true)  , $mensaje );
      $mensaje = str_replace( '[comentarios]' , $comentarios , $mensaje );
      //$mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
      $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
      $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 77170 , array(66,66)) , $mensaje );
      $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
      $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

      if( site_url() === 'https://dev.funos.es'){
        wp_mail ( 'efraim@efraim.cat', get_option('wpfunos_asuntoCorreoUsuarioDetalles') , $mensaje, $headers );
      }else{
        if(!empty( get_option('wpfunos_mailCorreoCcoUsuarioDetalles' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoUsuarioDetalles' ) ;
        if(!empty( get_option('wpfunos_mailCorreoBccUsuarioDetalles' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccUsuarioDetalles' ) ;
        $headers[]   = 'Reply-To: Clientes Funos <clientes@funos.es>';
        wp_mail ( $email, get_option('wpfunos_asuntoCorreoUsuarioDetalles') , $mensaje, $headers );
      }

      $userIP = apply_filters('wpfunos_userIP','dummy');
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0501 '.'Enviar correo detalles' );
      //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
      do_action('wpfunos_log', $userIP.' - 0501 '.'$email: ' . $email );

    }
    $result['type'] = "success";
    $result['email'] = $email;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Ver detalles
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_dist_local', function () { $this->wpfunosV3DistLocal();});
  * add_action('wp_ajax_wpfunos_ajax_v3_dist_local', function () {$this->wpfunosV3DistLocal();});
  */
  public function wpfunosV3DistLocal(){
    //$wpflocalidad = $_POST['wpflocalidad'];
    $wpflocalidad  = apply_filters('wpfunos_acentos_minusculas',$_POST['wpflocalidad']);

    $args = array(
      'post_type' => 'dist_local_wpfunos',
      'meta_key' =>  'wpfunos_dist_localLocalidad',
      'meta_value' => $wpflocalidad,
    );
    $post_list = get_posts( $args );
    $distancia = '20';

    if( $post_list ){
      $distancia = get_post_meta( $post_list[0]->ID, 'wpfunos_dist_localDistancia', true);
    }

    $result['type'] = "success";
    $result['distancia'] = $distancia;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }


  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Ver detalles
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_cambiar_datos_usuario', function () { $this->wpfunosV3CambiarDatosUsuario();});
  * add_action('wp_ajax_wpfunos_ajax_v3_cambiar_datos_usuario', function () {$this->wpfunosV3CambiarDatosUsuario();});
  */
  public function wpfunosV3CambiarDatosUsuario(){
    $wpnonce = $_POST['wpnonce'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $idusuario = $_POST['idusuario'];
    $firma = $_POST['firma'];

    if( $idusuario == 0 ){
      $result['type'] = "ID Cero";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    $IP = apply_filters('wpfunos_userIP','dummy');

    if ( !wp_verify_nonce( $wpnonce, "wpfunos_serviciosv3_nonce".$IP ) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    $blogtime = current_time( 'mysql' );

    update_post_meta( $idusuario, 'wpfunos_userName', $nombre );
    update_post_meta( $idusuario, 'wpfunos_userMail', $email );
    update_post_meta( $idusuario, 'wpfunos_userPhone', $phone );
    update_post_meta( $idusuario, 'IDstamp', $firma. ': ' .$blogtime );

    $result['type'] = "success";
    $result['distancia'] = $distancia;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();

  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Log filtros
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_filtros', function () { $this->wpfunosV3Filtros();});
  * add_action('wp_ajax_wpfunos_ajax_v3_filtros', function () {$this->wpfunosV3Filtros();});
  */
  public function wpfunosV3Filtros(){
    $wpfnombre = $_POST['wpfnombre'];
    $wpfip = $_POST['wpfip'];
    $param = $_POST['param'];
    $valor = $_POST['valor'];
    $wpnonce = $_POST["wpfn"];
    $wpfnewref = $_POST["wpfnewref"];
    $wpfidusuario = $_POST["wpfidusuario"];
    $wpfurl = $_POST["wpfurl"];
    $wpfresp1 = $_POST["wpfresp1"];
    $wpfresp2 = $_POST["wpfresp2"];
    $wpfresp3 = $_POST["wpfresp3"];
    $wpfresp4 = $_POST["wpfresp4"];
    $hubspotutk = $_POST['hubspotutk'];

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $wpfip.' - 0501 '.'Cambios en filtros' );
    do_action('wpfunos_log', $wpfip.' - 0501 '.'Parámetro: ' . $param );
    do_action('wpfunos_log', $wpfip.' - 0501 '.'Valor: ' . $valor );
    do_action('wpfunos_log', $wpfip.' - 0501 '.'Nombre: ' . $wpfnombre );
    do_action('wpfunos_log', $wpfip.' - 0501 '.'Referencia: ' . $wpfnewref );
    do_action('wpfunos_log', $wpfip.' - 0501 '.'IDusuario: ' . $wpfidusuario );

    if ( !wp_verify_nonce( $wpnonce, "wpfunos_serviciosv3_nonce".$wpfip ) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    if(strlen( $wpfidusuario ) < 1 ){
      $result['type'] = "No userid";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    if( $param == 'Distancia' ){
      $distancia = $valor;
      $cambios = 'distancia';
    }else{
      $distancia = get_post_meta( $wpfidusuario, 'wpfunos_userNombreSeleccionDistancia', true );
      $cambios ='';
    }

    if( $param == 'resp1'){
      $wpfresp1 = $valor;
      $cambios ='destino';
    }
    if( $param == 'resp2'){
      $wpfresp2 = $valor;
      $cambios ='ataúd';
    }
    if( $param == 'resp3'){
      $wpfresp3 = $valor;
      $cambios ='velatorio';
    }
    if( $param == 'resp4'){
      $wpfresp4 = $valor;
      $cambios ='ceremonia';
    }

    $userIP = apply_filters('wpfunos_userIP','dummy');
    $log = (is_user_logged_in()) ? 'logged' : 'not logged';
    $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
    $wpfwpf = apply_filters( 'wpfunos_crypt', $wpfnewref , 'e' );
    $URL = home_url().'/comparar-precios-resultados?' .$wpfurl. '&wpfwpf=' .$wpfwpf;
    $userURL = apply_filters('wpfunos_shortener', $URL );

    if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Filtros') && ! apply_filters( 'wpfunos_pruebas_email', get_post_meta( $wpfidusuario, 'wpfunos_userMail', true ) ) ){
      $contador = $this->wpfunosV3ContadorEntradas( $wpfip, '0' );
      switch((int)$wpfresp1){
        case 1: $wpfdestino = esc_html__('Entierro', 'wpfunos_es'); $hcampo = 'destino'; $hvalor = 'Entierro'; break;
        case 2: $wpfdestino = esc_html__('Incineración', 'wpfunos_es');  $hcampo = 'destino'; $hvalor = 'Incineración'; break;
      }
      switch((int)$wpfresp2){
        case 1: $wpfataud = esc_html__('Ataúd medio', 'wpfunos_es'); $hcampo = 'ataud'; $hvalor = 'Ataúd medio'; break;
        case 2: $wpfataud = esc_html__('Ataúd económico', 'wpfunos_es'); $hcampo = 'ataud'; $hvalor = 'Ataúd económico'; break;
        case 3: $wpfataud = esc_html__('Ataúd premium', 'wpfunos_es'); $hcampo = 'ataud'; $hvalor = 'Ataúd premium'; break;
      }
      switch((int)$wpfresp3){
        case 1: $wpfvelatorio = esc_html__('Velatorio', 'wpfunos_es'); $hcampo = 'velatorio'; $hvalor = 'Velatorio'; break;
        case 2: $wpfvelatorio = esc_html__('Sin velatorio', 'wpfunos_es'); $hcampo = 'velatorio'; $hvalor = 'Sin velatorio'; break;
      }
      switch((int)$wpfresp4){
        case 1: $wpfceremonia = esc_html__('Sin ceremonia', 'wpfunos_es'); $hcampo = 'ceremonia'; $hvalor = 'Sin ceremonia'; break;
        case 2: $wpfceremonia = esc_html__('Solo sala', 'wpfunos_es'); $hcampo = 'ceremonia'; $hvalor = 'Solo sala'; break;
        case 3: $wpfceremonia = esc_html__('Ceremonia civil', 'wpfunos_es'); $hcampo = 'ceremonia'; $hvalor = 'Ceremonia civil'; break;
        case 4: $wpfceremonia = esc_html__('Ceremonia religiosa', 'wpfunos_es'); $hcampo = 'ceremonia'; $hvalor = 'Ceremonia religiosa'; break;
      }

      $my_post = array(
        'post_title' => $wpfnewref,
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => get_post_meta( $wpfidusuario, 'wpfunos_userMail', true ),
          'wpfunos_userReferencia' => sanitize_text_field( $wpfnewref ),
          'wpfunos_userName' => get_post_meta( $wpfidusuario, 'wpfunos_userName', true ),
          'wpfunos_userPhone' => get_post_meta( $wpfidusuario, 'wpfunos_userPhone', true ),
          'wpfunos_userCP' => get_post_meta( $wpfidusuario, 'wpfunos_userCP', true ),
          'wpfunos_userAccion' => '0',
          'wpfunos_userNombreAccion' => sanitize_text_field( 'Cambios datos servicios ' .$cambios ),
          'wpfunos_userNombreSeleccionUbicacion' => get_post_meta( $wpfidusuario, 'wpfunos_userNombreSeleccionUbicacion', true ),
          'wpfunos_userNombreSeleccionDistancia' => sanitize_text_field( $distancia ),
          'wpfunos_userNombreSeleccionServicio' => sanitize_text_field( $wpfdestino ),
          'wpfunos_userNombreSeleccionAtaud' => sanitize_text_field( $wpfataud ),
          'wpfunos_userNombreSeleccionVelatorio' => sanitize_text_field( $wpfvelatorio ),
          'wpfunos_userNombreSeleccionDespedida' => sanitize_text_field( $wpfceremonia ),
          'wpfunos_userIP' => sanitize_text_field( $wpfip ),
          'wpfunos_userReferer' => get_post_meta( $wpfidusuario, 'wpfunos_userReferer', true ),
          'wpfunos_userURL' => sanitize_text_field( $userURL ),
          'wpfunos_userURLlarga' => sanitize_text_field( $URL ),
          'wpfunos_userAceptaPolitica' => '1',
          'wpfunos_userLAT' => get_post_meta( $wpfidusuario, 'wpfunos_userLAT', true ),
          'wpfunos_userLNG' => get_post_meta( $wpfidusuario, 'wpfunos_userLNG', true ),
          'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
          'wpfunos_userVisitas' => $contador,
          'wpfunos_userLead' => true,
          'resp1' => $wpfresp1,
          'resp2' => $wpfresp2,
          'resp3' => $wpfresp3,
          'resp4' => $wpfresp4,
          'wpfunos_Dummy' => true,
          'wpfunos_userLog' => $log,
          'wpfunos_userMobile' => $mobile,
          'wpfunos_userHubspotUTK' => $hubspotutk,
        ),
      );
      $post_id = wp_insert_post($my_post);

      do_action('wpfunos-visitas-entrada',array(
        'tipo' => '5',
        'nombre' => get_post_meta( $wpfidusuario, 'wpfunos_userName', true ),
        'email' => get_post_meta( $wpfidusuario, 'wpfunos_userMail', true ),
        'telefono' => get_post_meta( $wpfidusuario, 'wpfunos_userPhone', true ),
        'wpfresp1' => $wpfresp1,
        'wpfresp2' => $wpfresp2,
        'wpfresp3' => $wpfresp3,
        'wpfresp4' => $wpfresp4,
        'postID' => $post_id,
        'poblacion' => get_post_meta( $wpfidusuario, 'wpfunos_userNombreSeleccionUbicacion', true ),
        'cuando' => '',
        'cp' => get_post_meta( $wpfidusuario, 'wpfunos_userCP', true ),
      ) );

      if( get_option('wpfunos_activarCorreov2Admin') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: funos <clientes@funos.es>';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreov2Admin'), get_option('wpfunos_asuntoCorreov2Admin') );
        $mensaje = str_replace( '[email]' , get_post_meta( $wpfidusuario, 'wpfunos_userMail', true ) , $mensaje );
        $mensaje = str_replace( '[referencia]' , $wpfnewref .' (cambios '. $cambios .')' , $mensaje );
        $mensaje = str_replace( '[IP]' , $wpfip , $mensaje );
        $mensaje = str_replace( '[URL]' , $URL , $mensaje );
        $mensaje = str_replace( '[nombre]' , get_post_meta( $wpfidusuario, 'wpfunos_userName', true ) , $mensaje );
        $mensaje = str_replace( '[telefono]' , get_post_meta( $wpfidusuario, 'wpfunos_userPhone', true ) , $mensaje );
        $mensaje = str_replace( '[poblacion]' , get_post_meta( $wpfidusuario, 'wpfunos_userNombreSeleccionUbicacion', true ) , $mensaje );
        $mensaje = str_replace( '[distancia]' , $distancia , $mensaje );
        $mensaje = str_replace( '[CP]' , get_post_meta( $wpfidusuario, 'wpfunos_userCP', true ) , $mensaje );
        $mensaje = str_replace( '[destino]' , $wpfdestino , $mensaje );
        $mensaje = str_replace( '[ataud]' , $wpfataud , $mensaje );
        $mensaje = str_replace( '[velatorio]' , $wpfvelatorio , $mensaje );
        $mensaje = str_replace( '[ceremonia]' , $wpfceremonia , $mensaje );
        if(!empty( get_option('wpfunos_mailCorreoCcov2Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcov2Admin' ) ;
        if(!empty( get_option('wpfunos_mailCorreoBccv2Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccv2Admin' ) ;

        if( strlen( get_option('wpfunos_mailCorreov2Admin') ) > 0 ){

          if( site_url() === 'https://dev.funos.es'){
            unset($headers);
            $headers[] = 'Content-Type: text/html; charset=UTF-8';
            $headers[] = 'From: funos <clientes@funos.es>';
            wp_mail ( 'efraim@efraim.cat', get_option('wpfunos_asuntoCorreov2Admin') , $mensaje, $headers );
          }else{
            wp_mail ( get_option('wpfunos_mailCorreov2Admin'), get_option('wpfunos_asuntoCorreov2Admin') , $mensaje, $headers );
          }

          do_action('wpfunos_log', '==============' );
          do_action('wpfunos_log', $userIP.' - 0501 '.'Enviar correo entrada datos al admin' );
          do_action('wpfunos_log', $userIP.' - 0501 '.'referencia: ' . $wpfnewref );
          //do_action('wpfunos_log', $userIP.' - 0501 '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
          //do_action('wpfunos_log', $userIP.' - 0501 '.'mailCorreov2Admin: ' . get_option('wpfunos_mailCorreov2Admin') );
        }

      }
      //Última Búsqueda
      if( $_COOKIE['cookielawinfo-checkbox-functional'] == 'yes' ){
        $expiry = strtotime('+1 year');
        //
        if( isset( $_COOKIE['wpfu'] ) ){
          $wpfu = json_decode( apply_filters( 'wpfunos_crypt', $_COOKIE['wpfu'], 'd' ) );
          //do_action('wpfunos_log', $userIP.' - 0501 '.'wpfu: ' .apply_filters('wpfunos_dumplog', $wpfu ) );
          //$userURL = apply_filters('wpfunos_shortener', $URL );
          //$wpfu->lastserv = apply_filters( 'wpfunos_crypt', $URL , 'e' );
          $wpfu->lastserv = apply_filters( 'wpfunos_crypt', $userURL , 'e' );
          $wpfu->lasttimeserv = date( 'd/m/y', current_time( 'timestamp', 0 ) );
          $wpfu->name = $wpfnombre;
          $wpfu->email = $wpfemail;
          $wpfu->phone = $wpftelefono;
          $codigo = apply_filters( 'wpfunos_crypt', json_encode($wpfu), 'e' );
          setcookie('wpfu', $codigo,  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
        }
        //
      }
      //Última Búsqueda END
    } //if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Filtros') )
    //
    if( isset( $_COOKIE['wpfu'] ) ){
      $wpfu = json_decode( apply_filters( 'wpfunos_crypt', $_COOKIE['wpfu'], 'd' ) );
      //do_action('wpfunos_log', $userIP.' - 0501 '.'wpfu: ' .apply_filters('wpfunos_dumplog', $wpfu ) );
      //$userURL = apply_filters('wpfunos_shortener', $URL );
      //$wpfu->lastserv = apply_filters( 'wpfunos_crypt', $URL , 'e' );
      $wpfu->lastserv = apply_filters( 'wpfunos_crypt', $userURL , 'e' );
      $wpfu->lasttimeserv = date( 'd/m/y', current_time( 'timestamp', 0 ) );
      $codigo = apply_filters( 'wpfunos_crypt', json_encode($wpfu), 'e' );
      setcookie('wpfu', $codigo,  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
    }
    //
    //HUBSPOT
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Prepara envio Hubspot' );
    if( $hubspotutk == '' ) $hubspotutk = ( isset( $_COOKIE['hubspotutk'] ) ) ? $_COOKIE['hubspotutk'] : '' ;
    //case 4: $wpfceremonia = esc_html__('Ceremonia religiosa', 'wpfunos_es'); $hcampo = 'ceremonia'; $hvalor = 'Ceremonia religiosa'; break;
    $hvalor = 'ko';
    if( $cambios == 'distancia') $hvalor = $valor;
    if( $cambios == 'destino' && $wpfresp1 == '1' ) $hvalor = 'Entierro';
    if( $cambios == 'destino' && $wpfresp1 == '2' ) $hvalor = 'Incineración';
    if( $cambios == 'ataúd' && $wpfresp1 == '1' ) $hvalor = 'Ataúd medio';
    if( $cambios == 'ataúd' && $wpfresp1 == '2' ) $hvalor = 'Ataúd económico';
    if( $cambios == 'ataúd' && $wpfresp1 == '3' ) $hvalor = 'Ataúd premium';
    if( $cambios == 'velatorio' && $wpfresp1 == '1' ) $hvalor = 'Velatorio';
    if( $cambios == 'velatorio' && $wpfresp1 == '2' ) $hvalor = 'Sin velatorio';
    if( $cambios == 'ceremonia' && $wpfresp1 == '1' ) $hvalor = 'Sin ceremonia';
    if( $cambios == 'ceremonia' && $wpfresp1 == '2' ) $hvalor = 'Solo sala';
    if( $cambios == 'ceremonia' && $wpfresp1 == '3' ) $hvalor = 'Ceremonia civil';
    if( $cambios == 'ceremonia' && $wpfresp1 == '4' ) $hvalor = 'Ceremonia religiosa';
    $hutknombre = ( $wpfidusuario == '0') ? 'Efraim Bayarri' : get_post_meta( $wpfidusuario, 'wpfunos_userName', true ) ;
    $hutkemail = ( $wpfidusuario == '0') ? 'efraim@efraim.cat' : get_post_meta( $wpfidusuario, 'wpfunos_userMail', true ) ;
    $hutkphone = ( $wpfidusuario == '0') ? '690 07 44 97' : get_post_meta( $wpfidusuario, 'wpfunos_userPhone', true ) ;
    $params = array(
      'firstname' => $hutknombre,
      'email' => $hutkemail,
      'phone' => $hutkphone,
      'referencia' => $wpfnewref,
      'ok' => 'ok',
      'filtro' => $cambios,
      'accion' => 'Datos usuario funerarias filtros ' .$cambios,
      $cambios => $hvalor,
      'ip' => $userIP,
      'hubspotutk' => $hubspotutk,
      'pageUri' => 'https://funos.es/comparar-precios-resultados',
      'pageId' => 'Comparar precios resultados - Funos - Comparador de Funerarias'
    );
    $email = get_post_meta( $wpfidusuario, 'wpfunos_userMail', true );
    if( ! apply_filters( 'wpfunos_pruebas_email', $email ) ) do_action('wpfhubspot-send-form', $params );
    if( ! apply_filters( 'wpfunos_pruebas_email', $email ) ) do_action('wpfhubspot-usuarios',array( 'email' => $hutkemail, 'hubspotutk' => $hubspotutk ) );
    //sleep(1);
    //$params = array(
    //  'email' => get_post_meta( $wpfidusuario, 'wpfunos_userMail', true ),
    //  'ip' => $userIP,
    //  'ok' => 'ok',
    //  'hubspotutk' => $hubspotutk,
    //  'accion' => 'Datos usuario funerarias filtros ' .$cambios,
    //  'pageUri' => 'https://funos.es/comparar-precios-resultados',
    //  'pageId' => 'Comparar precios resultados - Funos - Comparador de Funerarias'
    //);
    //do_action('wpfhubspot-send-form', $params );

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0501 '.'Finaliza envio formulario Hubspot' );
    //HUBSPOT

    $result['type'] = "success";
    $result['wpfurl'] = $URL;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }
}
