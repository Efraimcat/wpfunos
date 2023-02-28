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
    add_shortcode( 'wpfunos-financiacion', array( $this, 'wpfunosFinanciacionShortcode' ));
    add_shortcode( 'wpfunos-resultados', array( $this, 'wpfunosResultadosShortcode' ));
    add_shortcode( 'wpfunos-correo-popup', array( $this, 'wpfunosCorreoPopupShortcode' ));
    add_shortcode( 'wpfunos-mensaje-usuario-correo-popup', array( $this, 'wpfunosCorreoUsuarioPopupShortcode' ));
    add_shortcode( 'wpfunos-mensaje-usuario-datos-servicio', array( $this, 'wpfunosCorreoUsuarioDatosServicoShortcode' ));
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
    $CP = get_post_meta( $IDusuario, 'wpfunos_userCP', true );
    $respuesta = (explode(',',$seleccion));
    switch ( $a['boton'] ) {
      case '1':	//cuando
      switch($respuesta[2]){
        case '1': esc_html_e( 'Ahora mismo', 'wpfunos_es' ); break;
        case '2': esc_html_e( 'Proximamente', 'wpfunos_es' ); break;
        case '3': esc_html_e( 'En el futuro', 'wpfunos_es' ); break;
      }
      break;
      case '2':	//población
      echo( '<span id="wpf-texto-poblacion">'.strtr($respuesta[0],"+",",").'</span>' ); break;
      case '3':	//Destino
      switch($respuesta[3]){
        case '1': esc_html_e( 'Entierro', 'wpfunos_es' ); break;
        case '2': esc_html_e( 'Incineración', 'wpfunos_es' ); break;
        case '3': esc_html_e( 'Traslado', 'wpfunos_es' ); break;
      }
      break;
      case '4':	//Ataúd
      switch($respuesta[4]){
        case '1': esc_html_e( 'Económico', 'wpfunos_es' ); break;
        case '2': esc_html_e( 'Gama media', 'wpfunos_es' ); break;
        case '3': esc_html_e( 'Premium', 'wpfunos_es' ); break;
      }
      break;
      case '5':	//Velatorio
      switch($respuesta[5]){
        case '1': esc_html_e( 'Si', 'wpfunos_es' ); break;
        case '2': esc_html_e( 'No', 'wpfunos_es' ); break;
      }
      break;
      case '6':	//Despedida
      switch($respuesta[6]){
        case '1': esc_html_e( 'No', 'wpfunos_es' ); break;
        case '2': esc_html_e( 'Solo sala', 'wpfunos_es' ); break;
        case '3': esc_html_e( 'Ceremonia civil', 'wpfunos_es' ); break;
        case '4': esc_html_e( 'Ceremonia Religiosa', 'wpfunos_es' ); break;
      }
      break;
      // ASEGURADORAS
      case '7': switch($respuesta[2]){ case '1': esc_html_e( 'Hombre', 'wpfunos_es' ); break; case '2'; esc_html_e( 'Mujer', 'wpfunos_es' ); break; } break; //Sexo
      case '8': echo( '<span id="wpf-texto-poblacion">'.$respuesta[3].'</span>' );break; //Año de nacimiento
    }
  }

  /**
  * Shortcode [wpfunos-correo-popup]
  */
  public function wpfunosCorreoPopupShortcode( $atts, $content = "" ) {
    return get_option('wpfunos_mailCorreoCcoPopup');
  }

  /**
  * Shortcode [wpfunos-mensaje-usuario-correo-popup]
  */
  public function wpfunosCorreoUsuarioPopupShortcode( $atts, $content = "" ) {
    if ( get_option('wpfunos_activarCorreoUsuarioContacto') ){
      $mensaje = get_option('wpfunos_mensajeCorreoUsuarioContacto');
      $nombreUsuario = do_shortcode ('[field id="nombreasesor"]');
      $telefonoUsuario = do_shortcode ('[field id="telefono"]');
      $Email = do_shortcode ('[field id="email"]');
      $mensaje = str_replace( '[nombreUsuario]' , $nombreUsuario , $mensaje );
      $mensaje = str_replace( '[telefonoUsuario]' , $telefonoUsuario , $mensaje );
      $mensaje = str_replace( '[Email]' , $Email , $mensaje );
      return $mensaje;
    }
  }

  /**
  * Shortcode [wpfunos-mensaje-usuario-datos-servicio]
  */
  public function wpfunosCorreoUsuarioDatosServicoShortcode( $atts, $content = "" ) {
    if ( get_option('wpfunos_activarCorreoUsuarioDatos') ){
      $mensaje = get_option('wpfunos_mensajeCorreoUsuarioDatos');
      //[ubicacion], [CPUsuario], [telefonoUsuario], [nombreUsuario], [Email]
      //[destino], [ataud], [velatorio], [ceremonia]
      //[field id="Destino"]
      //[field id="Ataud"]
      //[field id="Velatorio"]
      //[field id="Despedida"]
      //[field id="address"]
      //[field id="CP"]
      //[field id="Nombre"]
      //[field id="Email"]
      //[field id="Telefono"]
      $ubicacion = do_shortcode ('[field id="address"]');
      $CPUsuario = do_shortcode ('[field id="CP"]');
      $telefonoUsuario = do_shortcode ('[field id="telefono"]');
      $nombreUsuario = do_shortcode ('[field id="Nombre"]');
      $Email = do_shortcode ('[field id="email"]');
      $destino = do_shortcode ('[field id="Destino"]');
      $ataud = do_shortcode ('[field id="Ataud"]');
      $velatorio = do_shortcode ('[field id="Velatorio"]');
      $ceremonia = do_shortcode ('[field id="Despedida"]');

      $mensaje = str_replace( '[ubicacion]' , $ubicacion , $mensaje );
      $mensaje = str_replace( '[CPUsuario]' , $CPUsuario , $mensaje );
      $mensaje = str_replace( '[telefonoUsuario]' , $telefonoUsuario , $mensaje );
      $mensaje = str_replace( '[nombreUsuario]' , $nombreUsuario , $mensaje );
      $mensaje = str_replace( '[Email]' , $Email , $mensaje );
      $mensaje = str_replace( '[destino]' , $destino , $mensaje );
      $mensaje = str_replace( '[ataud]' , $ataud , $mensaje );
      $mensaje = str_replace( '[velatorio]' , $velatorio , $mensaje );
      $mensaje = str_replace( '[ceremonia]' , $ceremonia , $mensaje );

      return $mensaje;
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
    if ( 'FormularioDatos' !== $form_name  && 'FormularioDatosAseguradoras' !== $form_name ) {
      return;
    }
    $raw_fields = $record->get( 'fields' );
    $fields = [];
    foreach ( $raw_fields as $id => $field ) {
      $fields[ $id ] = $field['value'];
    }
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
    $userIP = apply_filters('wpfunos_userIP','dummy');
    //https://funos.es/comparar-precios?address%5B%5D=[field id="address"]&post%5B%5D=[field id="post"]&distance=[field id="distance"]&units=[field id="units"]&page1=&per_page=50&lat=[field id="lat"]&lng=[field id="lng"]&form=4&action=fs&wpf=[field id="wpf"]&orden=precios

    //$wpml_path = ( $_COOKIE['wp-wpml_current_language'] == 'es') ? '' : '/'. $_COOKIE['wp-wpml_current_language'] ;
    //
    //$URL = home_url().$wpml_path.'/comparar-precios-resultados?' .$wpfurl. '&wpfwpf=' .$wpfwpf;
    $URL = home_url().'/comparar-precios?address%5B%5D=' .str_replace(" ","+", $fields['address'] ). '&post%5B%5D=' .$fields['post']. '&distance=' .$fields['distance']. '&units=' .$fields['units']. '&page1=&per_page=50&lat=' .$fields['lat']. '&lng=' .$fields['lng']. '&form=4&action=fs&wpf=' .$fields['wpf']. '&orden=dist';

    //$userURL = apply_filters('wpfunos_shortener', $URL );
    $userURL = $URL;

    if ($fields['Destino']){
      switch ( $fields['Destino'] ) {
        case '1': $userNombreSeleccionServicio = esc_html__('Entierro', 'wpfunos_es'); break;
        case '2': $userNombreSeleccionServicio = esc_html__('Incineración', 'wpfunos_es'); break;
      }
    }

    if ($fields['Ataud']){
      switch ( $fields['Ataud'] ) {
        case '1': $userNombreSeleccionAtaud = esc_html__('Ataúd Económico', 'wpfunos_es'); break;
        case '2': $userNombreSeleccionAtaud = esc_html__('Ataúd Medio', 'wpfunos_es'); break;
        case '3': $userNombreSeleccionAtaud = esc_html__('Ataúd Premium', 'wpfunos_es'); break;
      }
    }

    if ($fields['Velatorio']){
      switch ( $fields['Velatorio'] ) {
        case '1': $userNombreSeleccionVelatorio = esc_html__('Velatorio', 'wpfunos_es'); break;
        case '2': $userNombreSeleccionVelatorio = esc_html__('Sin Velatorio', 'wpfunos_es'); break;
      }
    }

    if ($fields['Despedida']){
      switch ( $fields['Despedida'] ) {
        case '1': $userNombreSeleccionDespedida = esc_html__('Sin ceremonia', 'wpfunos_es'); break;
        case '2': $userNombreSeleccionDespedida = esc_html__('Solo sala', 'wpfunos_es'); break;
        case '3': $userNombreSeleccionDespedida = esc_html__('Ceremonia civil', 'wpfunos_es'); break;
        case '4': $userNombreSeleccionDespedida = esc_html__('Ceremonia religiosa', 'wpfunos_es'); break;
      }
    }

    if( $form_name == 'FormularioDatos' ){
      $textoaccion = "Entrada datos servicios";
      //if( $_COOKIE['wpfunosloggedin'] == 'yes' ) $textoaccion = "Acción Usuario Desarrollador";
      if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acción Usuario Desarrollador";
      $userIP = apply_filters('wpfunos_userIP','dummy');
      $args = array(
        'post_status' => 'publish',
        'post_type' => 'usuarios_wpfunos',
        'posts_per_page' => -1,
        'meta_query' => array(
          'relation' => 'AND',
          array( 'key' => 'wpfunos_userIP', 'value' => $userIP, 'compare' => '=', ),
          array( 'key' => 'wpfunos_userAccion', 'value' => '0', 'compare' => '=', ),
        ),
      );
      $post_list = get_posts( $args );
      $contador = 1;
      if( $post_list ){
        foreach ( $post_list as $post ) :
          $contador++;
        endforeach;
        wp_reset_postdata();
      }
      $referer = sanitize_text_field( $_SERVER['HTTP_REFERER'] );
      $my_post = array(
        'post_title' => $fields['referencia'],
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => sanitize_text_field( $fields['email'] ),
          'wpfunos_userReferencia' => sanitize_text_field( $fields['referencia'] ),
          'wpfunos_userName' => sanitize_text_field( $fields['Nombre'] ),
          'wpfunos_userSurname' => sanitize_text_field( $fields['Apellidos'] ),
          'wpfunos_userPhone' => sanitize_text_field( $fields['telefono'] ),
          'wpfunos_userSeguro' => sanitize_text_field( $fields['Seguro'] ),
          'wpfunos_userCP' => sanitize_text_field( $fields['CP'] ),
          'wpfunos_userAccion' => '0',
          'wpfunos_userNombreAccion' => sanitize_text_field( $textoaccion ),
          'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( $fields['address'] ),
          'wpfunos_userNombreSeleccionDistancia' => sanitize_text_field( $fields['distance'] ),
          'wpfunos_userNombreSeleccionServicio' => sanitize_text_field( $userNombreSeleccionServicio ),
          'wpfunos_userNombreSeleccionAtaud' => sanitize_text_field( $userNombreSeleccionAtaud ),
          'wpfunos_userNombreSeleccionVelatorio' => sanitize_text_field( $userNombreSeleccionVelatorio ),
          'wpfunos_userNombreSeleccionDespedida' => sanitize_text_field( $userNombreSeleccionDespedida ),
          'wpfunos_userSeleccion' => sanitize_text_field( str_replace(",","+",$fields['address']).', '.$fields['distance'].', 1, '. $fields['Destino'].', '.$fields['Ataud'].', '.$fields['Velatorio'].', '.$fields['Despedida']),
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
        ),
      );
    }elseif( $form_name == 'FormularioDatosAseguradoras' ){
      //https://funos.es/compara-precios-aseguradoras?address%5B%5D=Barcelona&post%5B%5D=aseguradoras_wpfunos&distance=&units=&page1=&per_page=50&lat=41.387397&lng=2.168568&form=3&action=fs&wpf=WFYrckFUZE1rSUdEYUQ4WlE4NkZydEc0b0IxNU8ya2t2S1FCRk4zdHRGTT0%3D

      $URL = home_url().'/compara-precios-aseguradoras?address%5B%5D=' .str_replace(" ","+", $fields['address'] ). '&post%5B%5D=' .$fields['post']. '&distance=' .$fields['distance']. '&units=' .$fields['units']. '&page1=&per_page=50&lat=' .$fields['lat']. '&lng=' .$fields['lng']. '&form=3&action=fs&wpf=' .$fields['wpf'];

      //$userURL = apply_filters('wpfunos_shortener', $URL );
      $userURL = $URL;
      $textoaccion = "Entrada datos aseguradoras";
      //if( $_COOKIE['wpfunosloggedin'] == 'yes' ) $textoaccion = "Acción Usuario Desarrollador";
      if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acción Usuario Desarrollador";
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
        foreach ( $post_list as $post ) :
          $contador++;
        endforeach;
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
    }
    if( strlen( $fields['telefono']) > 3 ){
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
    }else{
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - '.'Error Nuevo Usuario:' );
      do_action('wpfunos_log', $userIP.' - '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
      do_action('wpfunos_log', $userIP.' - '.'mobile: ' . $mobile);
      do_action('wpfunos_log', $userIP.' - '.'logged: ' .$log  );
      do_action('wpfunos_log', $userIP.' - '.'cookie wpfe: ' . $_COOKIE['wpfe']);
      do_action('wpfunos_log', $userIP.' - '.'cookie wpfn: ' . $_COOKIE['wpfn']);
      do_action('wpfunos_log', $userIP.' - '.'cookie wpft: ' . $_COOKIE['wpft']);
      do_action('wpfunos_log', $userIP.' - '.'referencia: ' .  $fields['referencia'] );
    }
    //if(is_wp_error($post_id)){
    //  echo $post_id->get_error_message();
    //  exit;
    //}
  }

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
