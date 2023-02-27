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
*wpfunos-visitas-list-table.php
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
      do_action('wpfunos_log', $userIP.' - '.'Llegada ajax Servicio Botón Enviar Datos Usuario' );
      do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfnombre ' .$wpfnombre );
      do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfemail ' .$wpfemail );
      do_action('wpfunos_log', $userIP.' - '.'Ajax: wpftelefono ' .$wpftelefono );
      do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfip ' .$wpfip );
      do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfresp1 ' .$wpfresp1. ' - ' .$wpfdestino );
      do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfresp2 ' .$wpfresp2. ' - ' .$wpfataud );
      do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfresp3 ' .$wpfresp3. ' - ' .$wpfvelatorio );
      do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfresp4 ' .$wpfresp4. ' - ' .$wpfceremonia );

      //$this->wpfunosServiciosv2Indeseados( $wpfemail, $wpftelefono );
      if( apply_filters('wpfunos_bloqueo_numeros',$wpftelefono) ){
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - '.'Entrada no deseada' );
        do_action('wpfunos_log', $userIP.' - '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
        do_action('wpfunos_log', $userIP.' - '.'mobile: ' . $mobile);
        do_action('wpfunos_log', $userIP.' - '.'logged: ' .$log  );
        do_action('wpfunos_log', $userIP.' - '.'cookie wpfe: ' . $_COOKIE['wpfe']);
        do_action('wpfunos_log', $userIP.' - '.'cookie wpfn: ' . $_COOKIE['wpfn']);
        do_action('wpfunos_log', $userIP.' - '.'cookie wpft: ' . $_COOKIE['wpft']);
        do_action('wpfunos_log', $userIP.' - '.'---' );
        do_action('wpfunos_log', $userIP.' - '.'Teléfono: ' . $wpftelefono);

        $result['type'] = "unwanted";
        $result = json_encode($result);
        echo $result;
        // don't forget to end your scripts with a die() function - very important
        die();
      }

      $wpfwpf = apply_filters( 'wpfunos_crypt', $wpfnewref , 'e' );

      //$wpml_path = ( $_COOKIE['wp-wpml_current_language'] == 'es') ? '' : '/'. $_COOKIE['wp-wpml_current_language'] ;
      //
      //$URL = home_url().$wpml_path.'/comparar-precios-resultados?' .$wpfurl. '&wpfwpf=' .$wpfwpf;
      $URL = home_url().'/comparar-precios-resultados?' .$wpfurl. '&wpfwpf=' .$wpfwpf;

      do_action('wpfunos_update phone',$wpftelefono);

      $tel = str_replace(" ","", $wpftelefono );
      $tel = str_replace("-","",$tel);
      if(substr($tel,0,1) == '+'){
        $Telefono =  substr($tel,0,3).' '. substr($tel,3,3).' '. substr($tel,6,2).' '. substr($tel,8,2) .' '. substr($tel,10,2);
      }else{
        $Telefono =  substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
      }

      if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Multiform') ){
        //$userURL = apply_filters('wpfunos_shortener', $URL );
        $userURL = $URL;

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
          ),
        );
        $post_id = wp_insert_post($my_post);

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
        do_action('wpfunos_log', $userIP.' - '.'Recogida datos usuario' );
        do_action('wpfunos_log', $userIP.' - '.'userIP: ' . $wpfip );
        do_action('wpfunos_log', $userIP.' - '.'Nombre: ' .  $wpfnombre );
        do_action('wpfunos_log', $userIP.' - '.'Post ID: ' .  $post_id  );
        do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $wpfnewref );
        do_action('wpfunos_log', $userIP.' - '.'Telefono: ' . $Telefono );

        if( get_option('wpfunos_activarCorreov2Admin') ){
          unset($headers);
          $headers[] = 'Content-Type: text/html; charset=UTF-8';
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
                do_action('wpfunos_log', $userIP.' - '.'Enviar correo entrada datos al servicio v3' );
                do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $wpfnewref );
                do_action('wpfunos_log', $userIP.' - '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
                do_action('wpfunos_log', $userIP.' - '.'servicioEmail: ' . get_post_meta( $post->ID, 'wpfunos_servicioEmail', true ) );
              }
            endforeach;
            wp_reset_postdata();
          }

          if( strlen( get_option('wpfunos_mailCorreov2Admin') ) > 0 ){

            if( site_url() === 'https://dev.funos.es'){
              unset($headers);
              $headers[] = 'Content-Type: text/html; charset=UTF-8';
              wp_mail ( 'efraim@efraim.cat', get_option('wpfunos_asuntoCorreov2Admin') , $mensaje, $headers );
            }else{
              wp_mail ( get_option('wpfunos_mailCorreov2Admin'), get_option('wpfunos_asuntoCorreov2Admin') , $mensaje, $headers );
            }

            do_action('wpfunos_log', '==============' );
            do_action('wpfunos_log', $userIP.' - '.'Enviar correo entrada datos al admin' );
            do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $wpfnewref );
            do_action('wpfunos_log', $userIP.' - '.'userIP: ' . $wpfip );
            do_action('wpfunos_log', $userIP.' - '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
            do_action('wpfunos_log', $userIP.' - '.'mailCorreov2Admin: ' . get_option('wpfunos_mailCorreov2Admin') );
          }

        }
        if( get_option('wpfunos_activarCorreov2usuario') ){
          unset($headers);
          $headers[] = 'Content-Type: text/html; charset=UTF-8';
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
            do_action('wpfunos_log', $userIP.' - '.'Enviado correo usuario efraim@efraim.cat' );
          }else{
            if(!empty( get_option('wpfunos_mailCorreoCcov2usuario' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcov2usuario' ) ;
            if(!empty( get_option('wpfunos_mailCorreoBccv2usuario' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccv2usuario' ) ;
            $headers[]   = 'Reply-To: Clientes Funos <clientes@funos.es>';
            wp_mail ( $wpfemail , get_option('wpfunos_asuntoCorreov2usuario') , $mensaje, $headers );
            do_action('wpfunos_log', $userIP.' - '.'Enviado correo al usuario ' .$wpfemail. ' con su búsqueda');
          }
          do_action('wpfunos_log', $userIP.' - '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
          do_action('wpfunos_log', $userIP.' - '.'userIP: ' . $userIP );
          do_action('wpfunos_log', $userIP.' - '.'Nombre: ' . $wpfnombre );
          do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $wpfnewref );
        }
      }


      //Última Búsqueda
      if( $_COOKIE['cookielawinfo-checkbox-functional'] == 'yes' ){
        $expiry = strtotime('+1 year');
        $wpflast = apply_filters( 'wpfunos_crypt', $URL , 'e' );
        setcookie('wpflast', $wpflast, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
        setcookie('wpflasttime', date( 'd/m/y', current_time( 'timestamp', 0 ) ) , ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
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
      $result['wpftrans'] = $transient_ref;
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
    do_action('wpfunos_log', $userIP.' - '.'Llegada ajax Servicio Boton llamen' );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfnombre ' .$transient_ref['wpfn'] );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfemail ' .$transient_ref['wpfe'] );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: wpftelefono ' .$transient_ref['wpft'] );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: IP ' .$IP );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: Servicio titulo: ' . $titulo );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: Servicio ' . $servicio );

    if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Llamamos') ){

      switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = esc_html__('Entierro', 'wpfunos_es'); break; case '2': $destino = 'I' ; $nombredestino = esc_html__('Incineración', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = esc_html__('Ataúd medio', 'wpfunos_es'); break; case '2': $ataud = 'E' ; $nombreataud = esc_html__('Ataúd económico', 'wpfunos_es'); break; case '3': $ataud = 'P' ; $nombreataud = esc_html__('Ataúd premium', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = esc_html__('Velatorio', 'wpfunos_es') ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = esc_html__('Sin velatorio', 'wpfunos_es') ; break; }
      switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = esc_html__('Sin ceremonia', 'wpfunos_es') ; break; case '2': $despedida = 'O' ; $nombredespedida = esc_html__('Solo sala', 'wpfunos_es') ; break; case '3': $despedida = 'C' ; $nombredespedida = esc_html__('Ceremonia civil', 'wpfunos_es') ; break; case '4': $despedida = 'R' ; $nombredespedida = esc_html__('Ceremonia religiosa', 'wpfunos_es') ; break; }

      $tel = str_replace(" ","", $transient_ref['wpft'] );
      $tel = str_replace("-","",$tel);
      if(substr($tel,0,1) == '+'){
        $Telefono =  substr($tel,0,3).' '. substr($tel,3,3).' '. substr($tel,6,2).' '. substr($tel,8,2) .' '. substr($tel,10,2);
      }else{
        $Telefono =  substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
      }

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
        ),
      );

      $post_id = wp_insert_post($my_post);

      $userIP = apply_filters('wpfunos_userIP','dummy');
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - '.'Botón Te llamamos servicio' );
      do_action('wpfunos_log', $userIP.' - '.'userIP: ' . $IP );
      do_action('wpfunos_log', $userIP.' - '.'Nombre: ' .  $transient_ref['wpfn'] );
      do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $newref );
      do_action('wpfunos_log', $userIP.' - '.'Post ID: ' .  $post_id  );

      if( get_option('wpfunos_activarCorreoBoton1v2Admin') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
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
        $mensaje = str_replace( '[comentariosUsuario]' , apply_filters('wpfunos_comentario', $mensajeusuario ) , $mensaje );

        $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
        $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
        $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
        $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

        $userIP = apply_filters('wpfunos_userIP','dummy');
        do_action('wpfunos_log', '==============' );
        if( site_url() === 'https://dev.funos.es'){
          wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoBoton1v2Admin') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - '.'Enviado correo lead1 efraim@efraim.cat' );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoBoton1v2Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1v2Admin' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccBoton1v2Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1v2Admin' ) ;
          wp_mail (  get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoBoton1v2Admin') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - '.'Enviando correo a funeraria. Correo: ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
        }
        update_post_meta( $post_id, 'wpfunos_userLead', true );

        do_action('wpfunos_log', $userIP.' - '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', $userIP.' - '.'userIP: ' . $IP );
        do_action('wpfunos_log', $userIP.' - '.'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $newref );
      }
      if( get_option('wpfunos_activarCorreoBoton1v2usuario') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
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
        $mensaje = str_replace( '[comentariosUsuario]' , apply_filters('wpfunos_comentario', $mensajeusuario ) , $mensaje );

        $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
        $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
        $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
        $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

        $userIP = apply_filters('wpfunos_userIP','dummy');
        do_action('wpfunos_log', '==============' );
        if( site_url() === 'https://dev.funos.es'){
          wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoBoton1v2usuario') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - '.'Enviado correo usuario efraim@efraim.cat' );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoBoton1v2usuario' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1v2usuario' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccBoton1v2usuario' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1v2usuario' ) ;
          wp_mail ( $transient_ref['wpfe'] , get_option('wpfunos_asuntoCorreoBoton1v2usuario') , $mensaje, $headers );
          $headers[]   = 'Reply-To: Clientes Funos <clientes@funos.es>';
          do_action('wpfunos_log', $userIP.' - '.'Enviado correo usuario ' . $transient_ref['wpfe'] );
        }
        do_action('wpfunos_log', $userIP.' - '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', $userIP.' - '.'userIP: ' . $IP );
        do_action('wpfunos_log', $userIP.' - '.'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $newref );
      }

    }

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
    do_action('wpfunos_log', $userIP.' - '.'Llegada ajax Servicio Boton llamar' );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfnombre ' .$transient_ref['wpfn'] );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfemail ' .$transient_ref['wpfe'] );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: wpftelefono ' .$transient_ref['wpft'] );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: IP ' .$IP );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: Servicio titulo: ' . $titulo );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: Servicio ' . $servicio );

    if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Llamar') ){

      switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = esc_html__('Entierro', 'wpfunos_es'); break; case '2': $destino = 'I' ; $nombredestino = esc_html__('Incineración', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = esc_html__('Ataúd medio', 'wpfunos_es'); break; case '2': $ataud = 'E' ; $nombreataud = esc_html__('Ataúd económico', 'wpfunos_es'); break; case '3': $ataud = 'P' ; $nombreataud = esc_html__('Ataúd premium', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = esc_html__('Velatorio', 'wpfunos_es') ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = esc_html__('Sin velatorio', 'wpfunos_es') ; break; }
      switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = esc_html__('Sin ceremonia', 'wpfunos_es') ; break; case '2': $despedida = 'O' ; $nombredespedida = esc_html__('Solo sala', 'wpfunos_es') ; break; case '3': $despedida = 'C' ; $nombredespedida = esc_html__('Ceremonia civil', 'wpfunos_es') ; break; case '4': $despedida = 'R' ; $nombredespedida = esc_html__('Ceremonia religiosa', 'wpfunos_es') ; break; }

      $tel = str_replace(" ","", $transient_ref['wpft'] );
      $tel = str_replace("-","",$tel);
      if(substr($tel,0,1) == '+'){
        $Telefono =  substr($tel,0,3).' '. substr($tel,3,3).' '. substr($tel,6,2).' '. substr($tel,8,2) .' '. substr($tel,10,2);
      }else{
        $Telefono =  substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
      }

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
        ),
      );

      $post_id = wp_insert_post($my_post);

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - '.'Botón llamar servicio' );
      do_action('wpfunos_log', $userIP.' - '.'userIP: ' . $IP );
      do_action('wpfunos_log', $userIP.' - '.'Nombre: ' .  $transient_ref['wpfn'] );
      do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $newref );
      do_action('wpfunos_log', $userIP.' - '.'Post ID: ' .  $post_id  );

      if( get_option('wpfunos_activarCorreoBoton2v2Admin') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
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
          do_action('wpfunos_log', $userIP.' - '.'Enviado correo lead2 efraim@efraim.cat' );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoBoton2v2Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2v2Admin' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccBoton2v2Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2v2Admin' ) ;
          wp_mail (  get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoBoton2v2Admin') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - '.'Enviado correo lead2 ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
        }
        //
        update_post_meta( $post_id, 'wpfunos_userLead', true );

        do_action('wpfunos_log', $userIP.' - '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', $userIP.' - '.'userIP: ' . "IP" );
        do_action('wpfunos_log', $userIP.' - '.'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $newref );

      }
      if( get_option('wpfunos_activarCorreoBoton2v2usuario') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
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
          do_action('wpfunos_log', $userIP.' - '.'Enviado correo lead2 efraim@efraim.cat' );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoBoton2v2usuario' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2v2usuario' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccBoton2v2usuario' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2v2usuario' ) ;
          $headers[]   = 'Reply-To: Clientes Funos <clientes@funos.es>';
          wp_mail (  $transient_ref['wpfe'] , get_option('wpfunos_asuntoCorreoBoton2v2usuario') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - '.'Enviado correo usuario ' .  $transient_ref['wpfe'] );
        }
        //
        do_action('wpfunos_log', $userIP.' - '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', $userIP.' - '.'userIP: ' . "IP" );
        do_action('wpfunos_log', $userIP.' - '.'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $newref );
      }

    }

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
    do_action('wpfunos_log', $userIP.' - '.'Llegada ajax Servicio Boton Presupuesto' );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfnombre ' .$transient_ref['wpfn'] );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: wpfemail ' .$transient_ref['wpfe'] );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: wpftelefono ' .$transient_ref['wpft'] );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: IP ' .$IP );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: Servicio titulo: ' . $titulo );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: Servicio ' . $servicio );
    do_action('wpfunos_log', $userIP.' - '.'Ajax: Mensaje: ' . $mensajeusuario );

    if( ! apply_filters('wpfunos_reserved_email','wpfunosV3Presupuesto') ){

      switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = esc_html__('Entierro', 'wpfunos_es'); break; case '2': $destino = 'I' ; $nombredestino = esc_html__('Incineración', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = esc_html__('Ataúd medio', 'wpfunos_es'); break; case '2': $ataud = 'E' ; $nombreataud = esc_html__('Ataúd económico', 'wpfunos_es'); break; case '3': $ataud = 'P' ; $nombreataud = esc_html__('Ataúd premium', 'wpfunos_es'); break; }
      switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = esc_html__('Velatorio', 'wpfunos_es') ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = esc_html__('Sin velatorio', 'wpfunos_es') ; break; }
      switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = esc_html__('Sin ceremonia', 'wpfunos_es') ; break; case '2': $despedida = 'O' ; $nombredespedida = esc_html__('Solo sala', 'wpfunos_es') ; break; case '3': $despedida = 'C' ; $nombredespedida = esc_html__('Ceremonia civil', 'wpfunos_es') ; break; case '4': $despedida = 'R' ; $nombredespedida = esc_html__('Ceremonia religiosa', 'wpfunos_es') ; break; }

      $tel = str_replace(" ","", $transient_ref['wpft'] );
      $tel = str_replace("-","",$tel);
      if(substr($tel,0,1) == '+'){
        $Telefono =  substr($tel,0,3).' '. substr($tel,3,3).' '. substr($tel,6,2).' '. substr($tel,8,2) .' '. substr($tel,10,2);
      }else{
        $Telefono =  substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
      }

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
        ),
      );

      $post_id = wp_insert_post($my_post);

      $userIP = apply_filters('wpfunos_userIP','dummy');
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - '.'Botón Pedir presupuesto' );
      do_action('wpfunos_log', $userIP.' - '.'userIP: ' . $IP );
      do_action('wpfunos_log', $userIP.' - '.'Nombre: ' .  $transient_ref['wpfn'] );
      do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $newref );
      do_action('wpfunos_log', $userIP.' - '.'Post ID: ' .  $post_id  );

      if( get_option('wpfunos_activarCorreoPresupuestoLead') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
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
          do_action('wpfunos_log', $userIP.' - '.'Enviado correo pedir presupuesto efraim@efraim.cat' );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ;
          wp_mail (  get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoPresupuestoLead') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - '.'Enviado correo pedir presupuesto ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
        }
        update_post_meta( $post_id, 'wpfunos_userLead', true );

        do_action('wpfunos_log', $userIP.' - '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', $userIP.' - '.'userIP: ' . "IP" );
        do_action('wpfunos_log', $userIP.' - '.'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $transient_ref['wpfref'] );

      }
      if( get_option('wpfunos_activarCorreoPresupuestousuario') ){
        unset($headers);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
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
          do_action('wpfunos_log', $userIP.' - '.'Enviado correo pedir presupuesto efraim@efraim.cat' );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoPresupuestousuario' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPresupuestousuario' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccPresupuestousuario' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPresupuestousuario' ) ;
          $headers[]   = 'Reply-To: Clientes Funos <clientes@funos.es>';
          wp_mail ( $transient_ref['wpfe'] , get_option('wpfunos_asuntoCorreoPresupuestousuario') , $mensaje, $headers );
          do_action('wpfunos_log', $userIP.' - '.'Enviado correo pedir presupuesto usuario ' . $transient_ref['wpfe'] );
        }

        do_action('wpfunos_log', $userIP.' - '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', $userIP.' - '.'userIP: ' . $userIP );
        do_action('wpfunos_log', $userIP.' - '.'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', $userIP.' - '.'referencia: ' . $transient_ref['wpfref'] );

      }
    }

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

      $tel = str_replace(" ","", $transient_ref['wpft'] );
      $tel = str_replace("-","",$tel);
      if(substr($tel,0,1) == '+'){
        $Telefono =  substr($tel,0,3).' '. substr($tel,3,3).' '. substr($tel,6,2).' '. substr($tel,8,2) .' '. substr($tel,10,2);
      }else{
        $Telefono =  substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
      }

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
      do_action('wpfunos_log', $userIP.' - '.'Enviar correo detalles' );
      do_action('wpfunos_log', $userIP.' - '.'$IP: ' . $IP );
      do_action('wpfunos_log', $userIP.' - '.'$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
      do_action('wpfunos_log', $userIP.' - '.'$email: ' . $email );

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

    $userIP = apply_filters('wpfunos_userIP','dummy');
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - '.'Cambios en filtros' );
    do_action('wpfunos_log', $userIP.' - '.'$IP: ' . $wpfip );
    do_action('wpfunos_log', $userIP.' - '.'Parámetro: ' . $param );
    do_action('wpfunos_log', $userIP.' - '.'Valor: ' . $valor );

    $result['type'] = "success";
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

}
