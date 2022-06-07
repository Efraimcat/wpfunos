<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Aseguradoras.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/aseguradoras
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
class Wpfunos_Aseguradoras {

  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
    add_shortcode( 'wpfunos-acciones-botones-aseguradora', array( $this, 'wpfunosAccionesBotonesAseguradoraShortcode' ));
    add_shortcode( 'wpfunos-aseguradoras-page-switch', array( $this, 'wpfunosAseguradorasPageSwitchShortcode' ));
    add_shortcode( 'wpfunos-pagina-aseguradoras', array( $this, 'wpfunosPaginaAseguradorasShortcode' ));
    add_shortcode( 'wpfunos-pagina-resultados-aseguradoras', array( $this, 'wpfunosPaginaResultadosAseguradorasShortcode' ));

    add_action( 'wpfunos_aseguradoras_cold_lead', array( $this, 'wpfunosAseguradorasColdLead' ), 10, 1 );
    add_action( 'wpfunos-aseguradoras-resultados', array( $this, 'wpfunosAseguradorasResultados' ), 10, 1 );
    add_action( 'elementor_pro/forms/validation', array( $this, 'wpfunosFormValidation' ), 10, 2 );

    add_action('wp_ajax_nopriv_wpfunos_ajax_aseguradora_llamame', function () { $this->wpfunosAseguradoraBotonLlamame();});
    add_action('wp_ajax_wpfunos_ajax_aseguradora_llamame', function () {$this->wpfunosAseguradoraBotonLlamame();});

    add_action('wp_ajax_nopriv_wpfunos_ajax_aseguradora_llamar', function () { $this->wpfunosAseguradoraBotonLlamar();});
    add_action('wp_ajax_wpfunos_ajax_aseguradora_llamar', function () {$this->wpfunosAseguradoraBotonLlamar();});

    add_action('wp_ajax_nopriv_wpfunos_ajax_aseguradora_presupuesto', function () { $this->wpfunosAseguradoraBotonPresupuesto();});
    add_action('wp_ajax_wpfunos_ajax_aseguradora_presupuesto', function () {$this->wpfunosAseguradoraBotonPresupuesto();});

    add_action('wp_ajax_nopriv_wpfunos_ajax_aseguradora_enviar_presupuesto', function () { $this->wpfunosAseguradoraBotonEnviarPresupuesto();});
    add_action('wp_ajax_wpfunos_ajax_aseguradora_enviar_presupuesto', function () {$this->wpfunosAseguradoraBotonEnviarPresupuesto();});
  }

  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-aseguradoras.css', array(), $this->version, 'all' );
  }

  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-aseguradoras.js', array( 'jquery' ), $this->version, false );
    wp_localize_script( $this->plugin_name, 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
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
      $userIP = apply_filters('wpfunos_userIP','dummy');
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Error 4 Nuevo Usuario: ' .  $userIP );
      do_action('wpfunos_log', 'referencia: ' .  $fields['referencia'] );
    }
  }

  /**
  * Shortcode [wpfunos-aseguradoras-page-switch]
  */
  public function wpfunosAseguradorasPageSwitchShortcode(){
    if( !isset( $_GET['form'] ) ){
      echo do_shortcode( get_option('wpfunos_paginaComparadorGeoMyWpAseguradoras') );
    }elseif( !isset( $_GET['wpf'] ) ){
      if (is_user_logged_in()){
        $current_user = wp_get_current_user();
        $_GET['usuario_telefono'] = str_replace(" ","",get_user_meta( $current_user->ID, 'wpfunos_telefono' , true ));
        $_GET['Email'] = $current_user->user_email;
        $_GET['nombreUsuario'] = $current_user->display_name;
      }
      $userIP = apply_filters('wpfunos_userIP','dummy');
      $_GET['direccion'] = $_GET['address'][0];
      $_GET['tipo'] = $_GET['post'][0];
      mt_srand(mktime());
      $_GET['referencia'] = 'funos-'.(string)mt_rand();
      $_GET['CP'] = $this->wpfunosCodigoPostal( $_GET['CP'], $_GET['direccion'] );
      $_GET['wpf'] = apply_filters( 'wpfunos_crypt', $_GET['referencia'] . ', ' . $_GET['CP'] , 'e' );
      $this->wpfunosEntradaUbicacion( $userIP , $_GET['wpf'], $_GET['referencia'], $_GET['direccion'], $_GET['CP'] , $_GET['distance'] );
      echo do_shortcode( get_option('wpfunos_seccionComparaPreciosDatosAseguradoras') );
    }elseif( isset( $_GET['wpf'] ) ){
      $userIP = apply_filters('wpfunos_userIP','dummy');
      $cryptcode = apply_filters( 'wpfunos_crypt', $_GET['wpf'], 'd' );
      $codigo = ( explode( ',' , $cryptcode ) );
      $_GET['referencia'] = $codigo[0];
      $_GET['CP'] = $codigo[1];
      $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '4. - Página Resultados Aseguradoras' );
      do_action('wpfunos_log', 'Usuario: ' .  $userIP  );
      do_action('wpfunos_log', '$_GET[wpf]: ' . $_GET['wpf'] );
      do_action('wpfunos_log', '$cryptcode: ' . $cryptcode );
      do_action('wpfunos_log', '$_GET[referencia]: ' . $_GET['referencia'] );
      do_action('wpfunos_log', '$_GET[CP]: ' . $_GET['CP'] );
      $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
      if( $IDusuario != 0 && strlen( $_GET['CP']) > 1 ){
        // Solo enviar lead si no se ha enviado anteriormente.
        if ( !get_post_meta( $IDusuario, 'wpfunos_userLead', true ) ){
          $this->wpfunosResultCorreoDatos();
          // Marcar lead como enviado.
          update_post_meta( $IDusuario, $this->plugin_name . '_userLead', true );
        }
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
  * Hook Cold Lead Aseguradoras
  *
  * add_action( 'wpfunos_aseguradoras_cold_lead', array( $this, 'wpfunosAseguradorasColdLead' ), 10, 1 );
  */
  public function wpfunosAseguradorasColdLead( ){
    $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
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

    if( get_option( 'wpfunos_APIDKVColdLead') ){
      $this->wpfunosLlamadaAPIDKV();
    }
  }

  /**
  * Hook Resultados Aseguradoras
  *
  * add_action( 'wpfunos-aseguradoras-resultados', array( $this, 'wpfunosAseguradorasResultados' ), 10, 1 );
  */
  public function wpfunosAseguradorasResultados( ){
    $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
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
    $nonce = wp_create_nonce("wpfunos_aseguradoras_nonce");
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
      while ( $my_query->have_posts() ) :
        $my_query->the_post();
        $temp_query = $wp_query;  // store it
        $IDtipo = get_the_ID();
        ?><div class="wpfunos-titulo-aseguradoras"><p></p><center><h2><?php echo get_post_meta( $IDtipo, 'wpfunos_tipoSeguroDisplay', true ); ?></h2></center></div><?php

        ?> <div class="clear"></div><?php
        ?><div class="wpfunos-busqueda-contenedor"><?php
        echo do_shortcode( get_post_meta( $IDtipo, 'wpfunos_tipoSeguroComentario', true ) );
        ?></div><?php

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
        while ($wp_query->have_posts()) :
          $wp_query->the_post();
          $IDaseguradora = get_the_ID();
          if( get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasActivo', true ) ){
            ?><div class="wpfunos-busqueda-contenedor"><?php
            $_GET['nombre'] = get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasNombre', true );
            $_GET['telefonoEmpresa'] = get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasTelefono', true );
            $_GET['logo'] = wp_get_attachment_image ( get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasLogo', true ) ,'full' );
            $_GET['ID'] = $IDaseguradora.'
            data-wpnonce|' . $nonce .'
            wpusuario|' . $IDusuario;
            echo do_shortcode( get_option('wpfunos_seccionAseguradorasPrecio') );	// cabecera con logo
            ?><div class="wpfunos-busqueda-aseguradoras-inferior" id="wpfunosID-<?php echo $IDaseguradora; ?>"><?php
            echo do_shortcode( get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasNotas', true ) );
            ?></div></div><?php
          }
        endwhile;
        if (isset($wp_query)) $wp_query = $temp_query; // restore loop
      endwhile;
    endif;
    wp_reset_postdata();
    require 'js/' . $this->plugin_name . '-aseguradoras-botones.js';
  }
  /**
  * Hook Elementor Form Validate entry
  *
  * add_action( 'elementor_pro/forms/validation', array( $this, 'wpfunosFormValidation' ), 10, 2 );
  *
  * #13-Feb-2022 13:26:43: $field:
  * [id] = String: 'nacimiento'
  * [type] = String: 'text'
  * [title] = String: 'Año de nacimiento'
  * [value] = Number: 1957
  * [raw_value] = Number: 1957
  * [required] = TRUE
  *
  * https://dev.to/renzoster/validate-form-fields-in-elementor-54cl
  */
  public function wpfunosFormValidation($record, $ajax_handler){
    if( $field = $this->wpfunos_elementor_get_field( 'nacimiento', $record ) ){
      if( (int)$field['value'] < date("Y") - 80 || (int)$field['value'] > date("Y") - 20 ){
        $ajax_handler->add_error( $field['id'], 'Año de nacimiento inválido. Introduce tu año de nacimiento p.ej: 1990' );
      }
    }
    if( $field = $this->wpfunos_elementor_get_field( 'Telefono', $record ) ){
      if ( 1 !== preg_match( '/^[9|8|6|7][0-9]{8}$/', $field['value'] ) ) {
        $ajax_handler->add_error( $field['id'], 'Introduce un número de teléfono válido' );
      }
    }
  }

  /*********************************/
  /*****                      ******/
  /*********************************/

  /**
  * Llamada API Preventiva $this->wpfunosLlamadaAPIPreventiva( 'https://fidelity.preventiva.com/ContactsImporter/api/Contact', 'Preventiva' );
  */
  public function wpfunosLlamadaAPIPreventiva( $URL, $tipo, $campain, $accion ){
    $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
    if( $IDusuario == 0 ) return;
    $userIP = apply_filters('wpfunos_userIP','dummy');
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
    do_action('wpfunos_log', 'Request: $request: ' . $request );
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
        $this->plugin_name . '_userIP' => sanitize_text_field( $userIP ),
        $this->plugin_name . '_userAceptaPolitica' => '1',
        $this->plugin_name . '_userLAT' => sanitize_text_field( $_GET['lat'] ),
        $this->plugin_name . '_userLNG' => sanitize_text_field( $_GET['lng'] ),
        $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
        $this->plugin_name . '_Dummy' => true,
        'IDstamp' => $_COOKIE['wpfid'],
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

  /**
  * Llamada API DKV
  */
  public function wpfunosLlamadaAPIDKV( $producto = 'DKV Integral' ){
    $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
    if( $IDusuario == 0 ) return;
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $local_time  = current_datetime();
    $current_time = $local_time->getTimestamp() + $local_time->getOffset();
    $fechacarga = gmdate("Y/m/d H:i:s",$current_time);
    mt_srand(mktime());
    $nuevareferencia = 'funos-'.(string)mt_rand();
    $CP = get_post_meta( $IDusuario, $this->plugin_name . '_userCP', true );
    if( strlen( $CP ) != 5 ) return;
    $provincia = $this->wpfunosProvincia( $CP );
    $email = get_post_meta( $IDusuario, $this->plugin_name . '_userMail', true );
    $nombre = get_post_meta( $IDusuario, $this->plugin_name . '_userName', true );
    $telefono =  str_replace(' ','', get_post_meta( $IDusuario, $this->plugin_name . '_userPhone', true ) ) ;

    $seguro = get_post_meta( $IDusuario, $this->plugin_name . '_userSeguro', true );
    $seguroSiNo = 'Si';
    if( $seguro == '2' ) $seguroSiNo = 'No';

    $seleccion = get_post_meta( $IDusuario, $this->plugin_name . '_userSeleccion', true );
    $respuesta = (explode(',',$seleccion));
    switch( $respuesta[2] ){ case '1': $sexo = 'Hombre'; break; case '2'; $sexo = 'Mujer'; break; }
    $edad = (int)$respuesta[3];
    $ubicacion = strtr($respuesta[0],"+",",");

    $textoaccion = "Llamada API DKV";
    if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acción Usuario Desarrollador";
    //if( $_COOKIE['wpfunosloggedin'] == 'yes' ) $textoaccion = "Acción Usuario Desarrollador";

    $other_data = 'Producto: ' .$producto. '. Sexo: ' .$sexo. '. Año nacimiento: ' .$edad. '. Seguro decesos: ' .$seguroSiNo. '.' ;

    $provider_name = get_option( $this->plugin_name . '_APIDKVProviderName' );
    $provider_id = get_option( $this->plugin_name . '_APIDKVProviderID' );
    $provider_password = get_option( $this->plugin_name . '_APIDKVProviderPasswordPRO' );
    $URL = get_option( $this->plugin_name . '_APIDKVURLPRO' );
    if( ! get_option( $this->plugin_name . '_APIDKVProductionOK' ) ) {
      $provider_password = get_option( $this->plugin_name . '_APIDKVProviderPasswordPRE' );
      $URL = get_option( $this->plugin_name . '_APIDKVURLPRE' );
    }

    $headers = array( 'Content-Type' => 'application/json' );
    $body = '{
      "lead":
      {
        "id": "' .$nuevareferencia. '",
        "firstName": "",
        "lastName": "' .$nombre. '",
        "date": "' .$fechacarga. '",
        "phone": "' .$telefono. '",
        "email": "' .$email. '",
        "city": "' .$ubicacion. '",
        "zip": "' .$CP. '",
        "state": "' .$provincia. '",
        "other_data": "' .$other_data. '"
      },
      "provider_name": "' .$provider_name. '",
      "provider_id": "' .$provider_id. '",
      "provider_password": "' .$provider_password. '"
    }';
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Request: $URL: ' .  $URL );
    do_action('wpfunos_log', 'Request: $headers: ' .  apply_filters('wpfunos_dumplog', $headers ) );
    do_action('wpfunos_log', 'Request: $body: ' .  $body );

    $request = wp_remote_post( $URL, array( 'headers' => $headers, 'body' => $body, 'timeout' => 45 ) );
    do_action('wpfunos_log', 'Request: $request: ' . apply_filters('wpfunos_dumplog', $request ) );
    do_action('wpfunos_log', 'Request: CODE: ' .  $request['response']['code'] );
    do_action('wpfunos_log', 'Request: MESSAGE: ' .  $request['response']['message'] );
    if ( is_wp_error($request) ) {
      esc_html_e('alguna cosa ha ido mal','wpfunos');
      esc_html_e(': ' . $request->get_error_message() );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Request: Error message: ' .  $request->get_error_message() );
      do_action('wpfunos_log', '==============' );
      return;
    }

    $userAPIMessage = apply_filters('wpfunos_dumplog', $request );
    $messageresponse = apply_filters('wpfunos_dumplog', $request['response'] );

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
        $this->plugin_name . '_userAccion' => '4',
        $this->plugin_name . '_userSeguro' => sanitize_text_field( $seguro ),
        $this->plugin_name . '_userNombreAccion' => sanitize_text_field( $textoaccion ),
        $this->plugin_name . '_userNombreSeleccionUbicacion' => sanitize_text_field( $ubicacion ),
        $this->plugin_name . '_userCP' => sanitize_text_field( $CP ),
        $this->plugin_name . '_userMail' => sanitize_text_field( $email ),
        $this->plugin_name . '_userAPITipo' => 'DKV',
        $this->plugin_name . '_userAPIBody' => sanitize_text_field( $body ),
        $this->plugin_name . '_userAPIMessage' => sanitize_text_field( $userAPIMessage ),
        $this->plugin_name . '_userAPIMessagebody' => sanitize_text_field( $request['body']),
        $this->plugin_name . '_userAPIMessageresponse' => sanitize_text_field( $messageresponse ),
        $this->plugin_name . '_userAPIMessagecode' => sanitize_text_field( $request['response']['code'] ),
        $this->plugin_name . '_userAPIMessagemessage' => sanitize_text_field( $request['response']['message'] ),
        $this->plugin_name . '_userIP' => sanitize_text_field( $userIP ),
        $this->plugin_name . '_userAceptaPolitica' => '1',
        $this->plugin_name . '_userLAT' => sanitize_text_field( $_GET['lat'] ),
        $this->plugin_name . '_userLNG' => sanitize_text_field( $_GET['lng'] ),
        $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
        $this->plugin_name . '_userLead' => true,
        $this->plugin_name . '_Dummy' => true,
        'IDstamp' => $_COOKIE['wpfid'],
      ),
    );
    $userIP = apply_filters('wpfunos_userIP','dummy');
    if( 'OK' === $request['response']['message'] ) {
      $post_id = wp_insert_post($my_post);
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Nueva API: ' .  $userIP );
      do_action('wpfunos_log', 'ID: ' .  $post_id );
      do_action('wpfunos_log', 'referencia: ' . $nuevareferencia );
    }else{
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Error 3 Nueva API: ' .  $userIP );
      do_action('wpfunos_log', 'Error: ' .  $request['response']['message'] );
      do_action('wpfunos_log', 'referencia: ' . $nuevareferencia );
    }
  }

  /*********************************/
  /*****                      ******/
  /*********************************/

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
        while ( $my_query->have_posts() ) :
          $my_query->the_post();
          $id = get_the_ID();
        endwhile;
      endif;
      wp_reset_postdata();
      $CodigoPostal = get_post_meta( $id, 'wpfunos_cpostalesCodigo', true );
    }
    return $CodigoPostal;
  }

  /**
  * Buscar Provincia
  */
  public function wpfunosProvincia( $CodigoPostal ){
    //substr("28002",0,2);
    $codigo_provincia = substr( $CodigoPostal, 0, 2 );
    $id=0;
    $args = array(
      'post_type' => 'provincias_wpfunos',
      'meta_key' =>  $this->plugin_name . '_provinciasCodigo',
      'meta_value' => $codigo_provincia,
    );
    $my_query = new WP_Query( $args );
    if ( $my_query->have_posts() ) :
      while ( $my_query->have_posts() ) :
        $my_query->the_post();
        $id = get_the_ID();
      endwhile;
      wp_reset_postdata();
    endif;
    $provincia = get_post_meta( $id, 'wpfunos_provinciasProvincia', true );
    return $provincia;
  }

  /**
  * This function allows to obtain a field by ID, if it does not exist it returns FALSE.
  */
  public function wpfunos_elementor_get_field( $id, $record ){
    $fields = $record->get_field( [ 'id' => $id, ] );
    if ( empty( $fields ) ) {
      return false;
    }
    return current( $fields );
  }
  /**
  * Entrada ubicación
  */
  public function wpfunosEntradaUbicacion( $ubicacionIP, $ubicacionwpf, $ubicacionReferencia, $ubicacionDireccion, $ubicacionCP, $ubicacionDistancia  ){
    if( apply_filters('wpfunos_reserved_email','dummy') ) return;
    //if( $_COOKIE['wpfunosloggedin'] == 'yes' ) return;
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $args = array(
      'post_status' => 'publish',
      'post_type' => 'ubic_aseg_wpfunos',
      'posts_per_page' => -1,
      'meta_key' =>  'wpfunos_ubic_asegIP',
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
      'post_title' => $ubicacionReferencia,
      'post_type' => 'ubic_aseg_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        $this->plugin_name . '_ubic_asegIP' => sanitize_text_field( $ubicacionIP ),
        $this->plugin_name . '_ubic_asegwpf' => sanitize_text_field( $ubicacionwpf ),
        $this->plugin_name . '_ubic_asegReferencia' => sanitize_text_field( $ubicacionReferencia ),
        $this->plugin_name . '_ubic_asegDireccion' => sanitize_text_field( $ubicacionDireccion ),
        $this->plugin_name . '_ubic_asegDistancia' => sanitize_text_field( $ubicacionDistancia ),
        $this->plugin_name . '_ubic_asegCP' => sanitize_text_field( $ubicacionCP ),
        $this->plugin_name . '_ubic_asegVisitas' => $contador,
        $this->plugin_name . '_Dummy' => true,
        'IDstamp' => $_COOKIE[ 'wpfid' ],
      ),
    );
    $post_id = wp_insert_post($my_post);
  }

  /**
  * Enviar Correo entrada datos usuario
  */
  public function wpfunosResultCorreoDatos( ){
    $referencia = $_GET['referencia'];
    $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
    if( ! get_option('wpfunos_activarCorreoDatosEntradosAseguradora')) return;
    if( apply_filters('wpfunos_reserved_email','dummy') ) return;
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    //$mensaje = get_option('wpfunos_mensajeCorreoDatosEntrados');
    $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoDatosEntradosAseguradora'), get_option('wpfunos_asuntoCorreoDatosEntradosAseguradora') );
    require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Datos-Usuario.php';
    if(!empty( get_option('wpfunos_mailCorreoCcoDatosEntradosAseguradora' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoDatosEntradosAseguradora' ) ;
    if(!empty( get_option('wpfunos_mailCorreoBccDatosEntradosAseguradora' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccDatosEntradosAseguradora' ) ;

    $args = array(
      'post_status' => 'publish',
      'post_type' => 'aseguradoras_wpfunos',
      'posts_per_page' => -1,
      'meta_key' =>  'wpfunos_aseguradorasLead',
      'meta_value' => true,
    );

    $post_list = get_posts( $args );
    if( $post_list ){
      foreach ( $post_list as $post ) :
        if( get_post_meta( $post->ID, $this->plugin_name . '_aseguradorasActivo', true ) == true && strlen( get_post_meta( $post->ID, $this->plugin_name . '_aseguradorasCorreo', true ) ) > 0 ){
          //wp_mail ( get_post_meta( $post->ID, $this->plugin_name . '_aseguradorasCorreo', true ), get_option('wpfunos_asuntoCorreoDatosEntrados') , $mensaje, $headers );
          do_action('wpfunos_log', '==============' );
          do_action('wpfunos_log', 'Enviar correo entrada datos a la aseguradora' );
          do_action('wpfunos_log', 'referencia: ' . $referencia );
          do_action('wpfunos_log', 'userIP: ' . $userIP );
          do_action('wpfunos_log', 'servicioEmail: ' . get_post_meta( $post->ID, $this->plugin_name . '_aseguradorasCorreo', true ) );
        }
      endforeach;
      wp_reset_postdata();
    }
    if( strlen( get_option('wpfunos_mailCorreoDatosEntradosAseguradora') ) > 0 ){
      wp_mail ( get_option('wpfunos_mailCorreoDatosEntradosAseguradora'), get_option('wpfunos_asuntoCorreoDatosEntradosAseguradora') , $mensaje, $headers );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Enviar correo entrada datos aseguradoras al admin' );
      do_action('wpfunos_log', 'referencia: ' . $referencia );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'mailCorreoDatosEntradosAseguradora: ' . get_option('wpfunos_mailCorreoDatosEntradosAseguradora') );
    }
  }

  /*********************************/
  /***** AJAX                 ******/
  /*********************************/

  public function wpfunosAseguradoraBotonLlamame(){
    $IDaseguradora = $_POST['wpfunosid'];
    $IDusuario = $_POST['wpusuario'];
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax BotonLlamame' );
    do_action('wpfunos_log', 'IDaseguradora: ' . $IDaseguradora );
    do_action('wpfunos_log', 'IDusuario: ' . $IDusuario );
    //
    if ( !wp_verify_nonce( $_POST['noncevalue'], "wpfunos_aseguradoras_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    //
    $nombre = get_post_meta( $_POST["wpfunosid"], "wpfunos_aseguradorasNombre", true);
    $titulo = get_the_title( $_POST["wpfunosid"] );
    do_action('wpfunos_log', 'nombre: ' . $nombre );
    do_action('wpfunos_log', 'titulo: ' . $titulo );
    //
    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();
    $accion = '6';
    $textoaccion = 'Botón llamen aseguradora' ;
    if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acción Usuario Desarrollador";
    require 'partials/' . $this->plugin_name . '-aseguradoras-nueva-entrada.php';
    $post_id = wp_insert_post($my_post);
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '6. - Botón llamen aseguradora' );
    do_action('wpfunos_log', 'userIP: ' . apply_filters('wpfunos_userIP','dummy') );
    do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
    do_action('wpfunos_log', 'referencia: ' . $referencia );
    do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
    //
    $admin = apply_filters('wpfunos_reserved_email','dummy') ;
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    if( get_option('wpfunos_activarCorreoBoton1LeadAseguradora') && ! $admin){
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton1LeadAseguradora'), get_option('wpfunos_asuntoCorreoBoton1LeadAseguradora') );
      require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Datos-Usuario.php';
      if(!empty( get_option('wpfunos_mailCorreoCcoBoton1LeadAseguradora' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1LeadAseguradora' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccBoton1LeadAseguradora' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1LeadAseguradora' ) ;
      wp_mail (  get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasCorreo', true ) , get_option('wpfunos_asuntoCorreoBoton1LeadAseguradora') , $mensaje, $headers );
      update_post_meta( $post_id, $this->plugin_name . '_userLead', true );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Enviado correo lead1 Aseguradora ' . apply_filters('wpfunos_dumplog', get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasCorreo', true )  ) );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
      do_action('wpfunos_log', '$referencia: ' . $referencia );
    }
    //
    $result['type'] = "success";
    $result['nombre'] = $nombre;
    $result['titulo'] = $titulo;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  public function wpfunosAseguradoraBotonLlamar(){
    $IDaseguradora = $_POST['wpfunosid'];
    $IDusuario = $_POST['wpusuario'];
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax BotonLlamar' );
    do_action('wpfunos_log', 'IDaseguradora: ' . $IDaseguradora );
    do_action('wpfunos_log', 'IDusuario: ' . $IDusuario );
    //
    if ( !wp_verify_nonce( $_POST['noncevalue'], "wpfunos_aseguradoras_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    //
    $nombre = get_post_meta( $_POST["wpfunosid"], "wpfunos_aseguradorasNombre", true);
    $titulo = get_the_title( $_POST["wpfunosid"] );
    $tel = get_post_meta( $_POST["wpfunosid"], "wpfunos_aseguradorasTelefono", true);
    $telefono =  substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
    do_action('wpfunos_log', 'nombre: ' . $nombre );
    do_action('wpfunos_log', 'titulo: ' . $titulo );
    //
    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();
    $accion = '7';
    $textoaccion = 'Botón llamar aseguradora' ;
    if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acción Usuario Desarrollador";
    require 'partials/' . $this->plugin_name . '-aseguradoras-nueva-entrada.php';
    $post_id = wp_insert_post($my_post);
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '7. - Botón llamar aseguradora' );
    do_action('wpfunos_log', 'userIP: ' . apply_filters('wpfunos_userIP','dummy') );
    do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
    do_action('wpfunos_log', 'referencia: ' . $referencia );
    do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
    //
    $admin = apply_filters('wpfunos_reserved_email','dummy') ;
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    if( get_option('wpfunos_activarCorreoBoton2LeadAseguradora') && ! $admin){
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton2LeadAseguradora'), get_option('wpfunos_asuntoCorreoBoton2LeadAseguradora') );
      require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Datos-Usuario.php';
      if(!empty( get_option('wpfunos_mailCorreoCcoBoton2LeadAseguradora' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2LeadAseguradora' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccBoton2LeadAseguradora' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2LeadAseguradora' ) ;
      wp_mail (  get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasCorreo', true ) , get_option('wpfunos_asuntoCorreoBoton2LeadAseguradora') , $mensaje, $headers );
      update_post_meta( $post_id, $this->plugin_name . '_userLead', true );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Enviado correo lead2 Aseguradora ' . apply_filters('wpfunos_dumplog', get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasCorreo', true )  ) );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
      do_action('wpfunos_log', '$referencia: ' . $referencia );
    }
    //
    $result['type'] = "success";
    $result['nombre'] = $nombre;
    $result['titulo'] = $titulo;
    $result['telefono'] = $telefono;
    $result['tel'] = $tel;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  public function wpfunosAseguradoraBotonPresupuesto(){
    $IDaseguradora = $_POST['wpfunosid'];
    $IDusuario = $_POST['wpusuario'];
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax BotonPresupuesto' );
    do_action('wpfunos_log', 'IDaseguradora: ' . $IDaseguradora );
    do_action('wpfunos_log', 'IDusuario: ' . $IDusuario );
    //
    if ( !wp_verify_nonce( $_POST['noncevalue'], "wpfunos_aseguradoras_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    //
    $nombre = get_post_meta( $_POST["wpfunosid"], "wpfunos_aseguradorasNombre", true);
    $titulo = get_the_title( $_POST["wpfunosid"] );
    do_action('wpfunos_log', 'nombre: ' . $nombre );
    do_action('wpfunos_log', 'titulo: ' . $titulo );
    //


    //
    $result['type'] = "success";
    $result['nombre'] = $nombre;
    $result['titulo'] = $titulo;
    $result['aseguradora'] = $IDaseguradora;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  public function wpfunosAseguradoraBotonEnviarPresupuesto(){
    $IDaseguradora = $_POST['wpfunosid'];
    $IDusuario = $_POST['wpusuario'];
    $mensajePopup = wp_kses_post( $_POST['wpmensaje'] );
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax BotonEnviarPresupuesto' );
    do_action('wpfunos_log', 'IDaseguradora: ' . $IDaseguradora );
    do_action('wpfunos_log', 'IDusuario: ' . $IDusuario );
    do_action('wpfunos_log', 'mensaje: ' . $mensajePopup );
    //
    if ( !wp_verify_nonce( $_POST['noncevalue'], "wpfunos_aseguradoras_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    //
    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();
    $accion = '8';
    $textoaccion = 'Botón pedir presupuesto aseguradora' ;
    $nombre = get_post_meta( $_POST["wpfunosid"], "wpfunos_aseguradorasNombre", true);
    $titulo = get_the_title( $_POST["wpfunosid"] );
    if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acción Usuario Desarrollador";
    require 'partials/' . $this->plugin_name . '-aseguradoras-nueva-entrada.php';
    $post_id = wp_insert_post($my_post);
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '8. - Botón pedir presupuesto aseguradora' );
    do_action('wpfunos_log', 'userIP: ' . apply_filters('wpfunos_userIP','dummy') );
    do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
    do_action('wpfunos_log', 'referencia: ' . $referencia );
    do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
    update_post_meta( $post_id, $this->plugin_name . '_userComentarios', $mensajePopup );
    //
    $admin = apply_filters('wpfunos_reserved_email','dummy') ;
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    if( get_option('wpfunos_activarCorreoPedirPresupuestoAseguradora') && ! $admin){
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoPedirPresupuestoAseguradora'), get_option('wpfunos_asuntoCorreoPedirPresupuestoAseguradora') );
      require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Datos-Usuario.php';
      if(!empty( get_option('wpfunos_mailCorreoCcoPedirPresupuestoAseguradora' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPedirPresupuestoAseguradora' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccPedirPresupuestoAseguradora' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPedirPresupuestoAseguradora' ) ;
      wp_mail (  get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasCorreo', true ) , get_option('wpfunos_asuntoCorreoBoton2LeadAseguradora') , $mensaje, $headers );
      update_post_meta( $post_id, $this->plugin_name . '_userLead', true );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Enviado correo Pedir Presupuesto Aseguradora ' . apply_filters('wpfunos_dumplog', get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasCorreo', true )  ) );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
      do_action('wpfunos_log', '$referencia: ' . $referencia );
    }
    //
    $result['type'] = "success";
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }
}
