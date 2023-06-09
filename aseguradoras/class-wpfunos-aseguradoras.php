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
//<div id="anchor-planificacion"></div>
//<div id="anchor-prima-unica"></div>
//<div id="anchor-prima-natural"></div>
//<div id="anchor-prima-nivelada"></div>
//<div id="anchor-prima-semi-natural"></div>
//<h4 style="color: #00ccff;">
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
    add_shortcode( 'wpfunos-aseguradoras-filtros', array( $this, 'wpfunosAseguradorasFiltrosShortcode' ));

    add_action( 'wpfunos-aseguradoras-resultados', array( $this, 'wpfunosAseguradorasResultados' ), 10, 1 );

    add_action('wp_ajax_nopriv_wpfunos_ajax_aseguradoras_llamamos', function () { $this->wpfunosAseguradorasLlamamos();});
    add_action('wp_ajax_wpfunos_ajax_aseguradoras_llamamos', function () {$this->wpfunosAseguradorasLlamamos();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_aseguradoras_presupuesto', function () { $this->wpfunosAseguradorasPresupuesto();});
    add_action('wp_ajax_wpfunos_ajax_aseguradoras_presupuesto', function () {$this->wpfunosAseguradorasPresupuesto();});

  }

  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-aseguradoras.css', array(), $this->version, 'all' );
  }

  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-aseguradoras.js', array( 'jquery' ), $this->version, false );
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
      $log = (is_user_logged_in()) ? 'logged' : 'not logged';
      $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0200 '.'Acciones Botones Aseguradora: ERROR' );
      do_action('wpfunos_log', $userIP.' - 0200 '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
      do_action('wpfunos_log', $userIP.' - 0200 '.'mobile: ' . $mobile);
      do_action('wpfunos_log', $userIP.' - 0200 '.'logged: ' .$log  );
    }
  }

  /**
  * Shortcode [wpfunos-aseguradoras-page-switch]
  */
  public function wpfunosAseguradorasPageSwitchShortcode(){
    if( !isset( $_GET['form'] ) ){
      do_action('wpfunos-visitas-entrada',array( 'tipo' => '1', ) );
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
      mt_srand(time());
      $_GET['referencia'] = 'funos-'.(string)mt_rand();
      $_GET['CP'] = $this->wpfunosCodigoPostal( $_GET['CP'], $_GET['direccion'] );
      $_GET['wpf'] = apply_filters( 'wpfunos_crypt', $_GET['referencia'] . ', ' . $_GET['CP'] , 'e' );

      echo do_shortcode( get_option('wpfunos_seccionComparaPreciosDatosAseguradoras') );
    }elseif( isset( $_GET['wpf'] ) ){
      $userIP = apply_filters('wpfunos_userIP','dummy');
      $cryptcode = apply_filters( 'wpfunos_crypt', $_GET['wpf'], 'd' );
      $codigo = ( explode( ',' , $cryptcode ) );
      $_GET['referencia'] = $codigo[0];
      $_GET['CP'] = $codigo[1];
      $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );

      $log = (is_user_logged_in()) ? 'logged' : 'not logged';
      $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0200 '.'Página Resultados Aseguradoras' );
      do_action('wpfunos_log', $userIP.' - 0200 '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
      do_action('wpfunos_log', $userIP.' - 0200 '.'mobile: ' . $mobile);
      do_action('wpfunos_log', $userIP.' - 0200 '.'logged: ' .$log  );
      do_action('wpfunos_log', $userIP.' - 0200 '.'$_GET[wpf]: ' . $_GET['wpf'] );
      do_action('wpfunos_log', $userIP.' - 0200 '.'$cryptcode: ' . $cryptcode );
      do_action('wpfunos_log', $userIP.' - 0200 '.'$_GET[referencia]: ' . $_GET['referencia'] );
      do_action('wpfunos_log', $userIP.' - 0200 '.'$_GET[CP]: ' . $_GET['CP'] );
      $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
      if( $IDusuario != 0 && strlen( $_GET['CP']) > 1 ){
        // Solo enviar lead si no se ha enviado anteriormente.
        if ( !get_post_meta( $IDusuario, 'wpfunos_userLead', true ) ){
          $this->wpfunosResultCorreoDatos(); // lead aseguradora
          $this->wpfunosCorreoEntradaDatos(); // mensaje colaboradores
          // Marcar lead como enviado.
          update_post_meta( $IDusuario, 'wpfunos_userLead', true );
        }
        echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosAseguradorasCabecera') );//[elementor-template id="33609"]
        echo do_shortcode( get_option('wpfunos_formGeoMyWpAseguradoras') ); //gmw search_form="3"
        echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosAseguradorasPie') );//[elementor-template id="33606"]

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
    echo home_url().get_option('wpfunos_paginaURLResultadosAseguradoras');
  }

  /**
  * Shortcode [wpfunos-aseguradoras-filtros]
  */
  public function wpfunosAseguradorasFiltrosShortcode( $atts, $content = "" ) {
    if( ! isset($_GET['wpf'] ) ) return;
    $cryptcode = apply_filters( 'wpfunos_crypt', $_GET['wpf'], 'd' );
    $codigo = ( explode( ',' , $cryptcode ) );
    $_GET['referencia'] = $codigo[0];
    echo do_shortcode( '[elementor-template id="86728"]' );
  }

  /*********************************/
  /*****  HOOKS               ******/
  /*********************************/

  /**
  * Hook Resultados Aseguradoras
  *
  * add_action( 'wpfunos-aseguradoras-resultados', array( $this, 'wpfunosAseguradorasResultados' ), 10, 1 );
  */
  public function wpfunosAseguradorasResultados( ){
    $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );

    ?><script>console.log('wpfunosAseguradorasResultados. $_GET[referencia]: <?php echo $_GET['referencia']; ?> ');</script><?php

    $telefonoUsuario = get_post_meta( $IDusuario, 'wpfunos_userPhone', true );
    $_GET['telefonoUsuario'] = $telefonoUsuario;
    $seleccion = get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true );
    $respuesta = (explode(',',$seleccion));
    switch($respuesta[2]){ case '1': $sexo = esc_html__('Hombre', 'wpfunos_es'); break; case '2'; $sexo = esc_html__('Mujer', 'wpfunos_es'); break; }
    $_GET['edad'] =  date("Y") - (int)$respuesta[3];
    $_GET['seleccionUsuario'] = $seleccion;
    $_GET['CPUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userCP', true );
    $_GET['nombreUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userName', true );
    $_GET['Email'] = get_post_meta( $IDusuario, 'wpfunos_userMail', true );
    $_GET['idUsuario'] = $IDusuario;
    $_GET['seguro'] = get_post_meta( $IDusuario, 'wpfunos_userSeguro', true );
    $nonce = wp_create_nonce("wpfunos_aseguradoras_nonce".apply_filters('wpfunos_userIP','dummy'));

    ElementorPro\Modules\Popup\Module::add_popup_to_location( apply_filters( 'wpml_object_id', 55817, 'post', TRUE ) ); //Boton Te llamamos
    ElementorPro\Modules\Popup\Module::add_popup_to_location( apply_filters( 'wpml_object_id', 56054, 'post', TRUE ) ); //Boton Presupuesto

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
        $temp_query = $my_query;  // store it
        $IDtipo = get_the_ID();

        // WPML
        $IDtipoTrad = apply_filters( 'wpml_object_id', $IDtipo, 'post', TRUE );
        $IDtipoOrig = apply_filters( 'wpml_object_id', $IDtipo, 'post', FALSE, 'es' );
        // WPML

        if( get_post_meta( $IDtipoTrad, 'wpfunos_tipoSeguroActivo' , true ) ){
          ?><div class="wpfunos-titulo-aseguradoras" id="<?php echo str_replace(" ","-", get_post_meta( $IDtipoOrig, 'wpfunos_tipoSeguroDisplay', true ) ); ?>"><p></p><center><h2><?php echo get_post_meta( $IDtipo, 'wpfunos_tipoSeguroDisplay', true ); ?></h2></center></div><?php
          ?> <div class="clear"></div><?php
          ?><div class="wpfunos-busqueda-contenedor wpfunos-busqueda-contenedor-argumentario"><?php
          echo do_shortcode( get_post_meta( $IDtipo, 'wpfunos_tipoSeguroComentario', true ) );
          ?></div><?php

          $args = array(
            'post_status' => 'publish',
            'post_type' => 'aseguradoras_wpfunos',
            'meta_query' => array(
              array(
                'key'     => 'wpfunos_aseguradorasTipoSeguro',
                'value'   => $IDtipoOrig,
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

            // WPML
            $IDaseguradoraTrad = apply_filters( 'wpml_object_id', $IDaseguradora, 'post', TRUE );
            $IDaseguradoraOrig = apply_filters( 'wpml_object_id', $IDaseguradora, 'post', FALSE, 'es' );
            // WPML

            if( get_post_meta( $IDaseguradoraTrad, 'wpfunos_aseguradorasActivo', true ) ){
              ?><div class="wpfunos-busqueda-contenedor"><?php
              $titulo = get_post_meta( $IDaseguradoraTrad, 'wpfunos_aseguradorasNombre', true );
              $_GET['nombre'] = $titulo;
              $_GET['telefonoEmpresa'] = get_post_meta( $IDaseguradoraTrad, 'wpfunos_aseguradorasTelefono', true );
              $_GET['logo'] = wp_get_attachment_image ( get_post_meta( $IDaseguradoraTrad, 'wpfunos_aseguradorasLogo', true ) ,'full' );
              $_GET['AttsLlamen'] = $IDaseguradoraTrad.'
              wpfid|' . $IDaseguradoraTrad .'
              data-wpnonce|' . $nonce .'
              wpusuario|' . $IDusuario.'
              wptitulo|' .$titulo.'
              wpftelus|' .$telefonoUsuario;

              echo do_shortcode( get_option('wpfunos_seccionAseguradorasPrecio') );	// cabecera con logo
              ?><div class="wpfunos-busqueda-aseguradoras-inferior" id="wpfunosID-<?php echo $IDaseguradora; ?>"><?php
              echo do_shortcode( get_post_meta( $IDaseguradoraTrad, 'wpfunos_aseguradorasNotas', true ) );
              ?></div></div><?php
              //css #wpfunos-boton-llamen
              //atts AttsLlamen
            }
          endwhile;
          if (isset($wp_query)) $wp_query = $temp_query; // restore loop

        }

      endwhile;
    endif;
    wp_reset_postdata();
    //require 'js/wpfunos-aseguradoras-botones.js';
  }

  /*********************************/
  /***** APIS                 ******/
  /*********************************/

  /**
  * Llamada API Preventiva $this->wpfunosLlamadaAPIPreventiva( 'https://fidelity.preventiva.com/ContactsImporter/api/Contact', 'Preventiva' );
  *
  * $this->wpfunosLlamadaAPIPreventiva( get_option( 'wpfunos_APIPreventivaURLPreventiva'), 'Preventiva Cold' , get_option( 'wpfunos_APIPreventivaCampainPreventiva'), 4 );
  *
  * $this->wpfunosLlamadaAPIPreventiva( get_option( 'wpfunos_APIPreventivaURLElectium'), 'Electium Cold' , get_option( 'wpfunos_APIPreventivaCampainElectium'), 4 );
  *
  * Preventiva: $URL, $tipo, $campain,
  *
  *OLD
  * https://fidelity.preventiva.com/ContactsImporter/api/Contact
  * https://fidelity.preventiva.com/ContactsImporterElectium/api/Contact
  *
  *NEW
  * https://preventivaleads.fidelitycloud.es/ContactsImporter/api/Contact
  * https://preventivaleads.fidelitycloud.es/ContactsImporterElectium/api/Contact
  *
  **/
  public function wpfunosAPIAseguradora( $usuario, $servicio, $mensaje, $accion = "" ){

    if( site_url() === 'https://dev.funos.es'){
      return;
    }

    $local_time  = current_datetime();
    $current_time = $local_time->getTimestamp() + $local_time->getOffset();
    $fecha = gmdate("Ymd His",$current_time);
    $fechacarga = gmdate("Y-m-d H:i:s",$current_time);
    $fechacargaDKV = gmdate("Y/m/d H:i:s",$current_time);

    $seleccion = get_post_meta( $usuario, 'wpfunos_userSeleccion', true );
    $respuesta = (explode(',',$seleccion));
    $edad =  date("Y") - (int)$respuesta[3];
    $ubicacion = strtr($respuesta[0],"+",",");

    $seguro = get_post_meta( $servicio, 'wpfunos_aseguradorasNombre', true );
    mt_srand(time());
    $referencia = 'funos-'.(string)mt_rand();

    $CP = get_post_meta( $usuario, 'wpfunos_userCP', true );
    $provincia = $this->wpfunosProvincia( $CP );
    $nombre = get_post_meta( $usuario, 'wpfunos_userName', true );
    $telefono = sanitize_text_field( str_replace( array( '-', '+34', ' ' ), '', get_post_meta( $usuario, 'wpfunos_userPhone', true ) ) );

    $email = get_post_meta( $usuario, 'wpfunos_userMail', true );
    if( apply_filters( 'wpfunos_pruebas_email', $email ) ) return;

    $api = get_post_meta( $servicio, 'wpfunos_aseguradorasAPI', true );

    $userIP = apply_filters('wpfunos_userIP','dummy');

    if( $api == 'ELECTIUM' || $api == 'PREVENTIVA'){
      if( $api == 'ELECTIUM' ){
        $campain = get_option( 'wpfunos_APIPreventivaCampainElectium' );
        $URL = get_option( 'wpfunos_APIPreventivaURLElectium');
      }else{
        $campain = get_option( 'wpfunos_APIPreventivaCampainPreventiva' );
        $URL = get_option( 'wpfunos_APIPreventivaURLPreventiva');
      }
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
          {"key": "Ayuda a la venta", "value": "' . $mensaje . '"},
          {"key": "Id_cliente", "value": "' . $referencia . '"},
          {"key": "FechaCarga", "value": "' . $fechacarga . '"}
        ]
      }';

    }elseif( $api == 'DKV' ){
      $provider_name = get_option( 'wpfunos_APIDKVProviderName' );
      $provider_id = get_option( 'wpfunos_APIDKVProviderID' );
      $provider_password = get_option( 'wpfunos_APIDKVProviderPasswordPRO' );
      $URL = get_option( 'wpfunos_APIDKVURLPRO' );
      if( ! get_option( 'wpfunos_APIDKVProductionOK' ) ) {
        $provider_password = get_option( 'wpfunos_APIDKVProviderPasswordPRE' );
        $URL = get_option( 'wpfunos_APIDKVURLPRE' );
      }
      $headers = array( 'Content-Type' => 'application/json' );
      $body = '{
        "lead":
        {
          "id": "' .$referencia. '",
          "firstName": "",
          "lastName": "' .$nombre. '",
          "date": "' .$fechacargaDKV. '",
          "phone": "' .$telefono. '",
          "email": "' .$email. '",
          "city": "' .$ubicacion. '",
          "zip": "' .$CP. '",
          "state": "' .$provincia. '",
          "other_data": "' .$mensaje. '"
        },
        "provider_name": "' .$provider_name. '",
        "provider_id": "' .$provider_id. '",
        "provider_password": "' .$provider_password. '"
      }';


    }else{
      return 'NO API';
    }
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $log = (is_user_logged_in()) ? 'logged' : 'not logged';
    $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0200 '.'API Aseguradoras.' );
    do_action('wpfunos_log', $userIP.' - 0200 '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
    do_action('wpfunos_log', $userIP.' - 0200 '.'mobile: ' . $mobile);
    do_action('wpfunos_log', $userIP.' - 0200 '.'logged: ' .$log  );
    do_action('wpfunos_log', $userIP.' - 0200 '.'API: '.$api );
    do_action('wpfunos_log', $userIP.' - 0200 '.'Request: $URL: ' .  $URL );
    do_action('wpfunos_log', $userIP.' - 0200 '.'Request: $headers: ' .  apply_filters('wpfunos_dumplog', $headers ) );
    do_action('wpfunos_log', $userIP.' - 0200 '.'Request: $body: ' .  $body );

    if( apply_filters('wpfunos_reserved_email','wpfunosAPIAseguradora') ) return 'Admin user';

    $request = wp_remote_post( $URL, array( 'headers' => $headers, 'body' => $body, 'timeout' => 45 ) );
    $userAPIMessage = apply_filters('wpfunos_dumplog', $request );

    if ( is_wp_error($request) ) {
      esc_html_e('alguna cosa ha ido mal','wpfunos');
      esc_html_e(': ' . $request->get_error_message() );
      $log = (is_user_logged_in()) ? 'logged' : 'not logged';
      $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0200 '.'Mensaje de error en la petición API.' );
      do_action('wpfunos_log', $userIP.' - 0200 '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
      do_action('wpfunos_log', $userIP.' - 0200 '.'mobile: ' . $mobile);
      do_action('wpfunos_log', $userIP.' - 0200 '.'logged: ' .$log  );
      do_action('wpfunos_log', $userIP.' - 0200 '.'Request: Error message: ' .  $request->get_error_message() );
      return 'Error';
    }

    if( $api == 'DKV' ){
      do_action('wpfunos_log', 'Request: $request: ' . apply_filters('wpfunos_dumplog', $request ) );
      do_action('wpfunos_log', 'Request: CODE: ' .  $request['response']['code'] );
      do_action('wpfunos_log', 'Request: MESSAGE: ' .  $request['response']['message'] );

      $messageresponse = apply_filters('wpfunos_dumplog', $request['response'] );
      $userAPIMessageresponse = sanitize_text_field( $messageresponse );
      $wpfunos_userAPIMessagecode = sanitize_text_field( $request['response']['code'] );
      $wpfunos_userAPIMessagemessage = sanitize_text_field( $request['response']['message'] );

    }else{
      $userAPIMessageresponse = '';
      $wpfunos_userAPIMessagecode = '';
      $wpfunos_userAPIMessagemessage = '';
    }
    $log = (is_user_logged_in()) ? 'logged' : 'not logged';
    $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
    $my_post = array(
      'post_title' => $referencia,
      'post_type' => 'usuarios_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
        'wpfunos_userReferencia' => sanitize_text_field( $referencia ),
        'wpfunos_userName' => sanitize_text_field( $nombre ),
        'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( $ubicacion ),
        'wpfunos_userPhone' => sanitize_text_field( $telefono ),
        'wpfunos_userSeleccion' => sanitize_text_field( $seleccion ),
        'wpfunos_userNombreAccion' => sanitize_text_field( 'envio petición API' ),
        'wpfunos_userCP' => sanitize_text_field( $CP ),
        'wpfunos_userMail' => sanitize_text_field( $email ),
        'wpfunos_userSeguro' => sanitize_text_field( $seguro ),
        'wpfunos_userAPITipo' => $api,
        'wpfunos_userAPIBody' => sanitize_text_field( $body),
        'wpfunos_userAPIMessage' => sanitize_text_field( $userAPIMessage ),
        'wpfunos_userAPIMessagebody' => sanitize_text_field( $request['body']),
        'wpfunos_userAPIMessageresponse' => $wpfunos_userAPIMessageresponse,
        'wpfunos_userAPIMessagecode' => $wpfunos_userAPIMessagecode,
        'wpfunos_userAPIMessagemessage' => $wpfunos_userAPIMessagemessage,
        'wpfunos_userIP' => sanitize_text_field( $userIP ),
        'wpfunos_userAceptaPolitica' => '1',
        'wpfunos_userLAT' => sanitize_text_field( $_GET['lat'] ),
        'wpfunos_userLNG' => sanitize_text_field( $_GET['lng'] ),
        'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
        'wpfunos_Dummy' => true,
        'wpfunos_userServicioEnviado' => true,
        'IDstamp' => $_COOKIE['wpfid'],
        'wpfunos_userLog' => $log,
        'wpfunos_userMobile' => $mobile,
        'wpfunos_userHubspotUTK' => $_COOKIE['hubspotutk'],
      ),
    );

    //Object { type: "success", respuesta: "Conflict" }
    if( 'OK' === $request['response']['message'] || 'Conflict' === $request['response']['message'] ) {
      $post_id = wp_insert_post($my_post);

      if( get_option('wpfunos_activarCorreoPreventiva') ){

        $mensaje_referencia = ( 'Conflict' === $request['response']['message'] ) ? '<strong>CONFLICTO: PETICION DUPLICADA</strong>' : $referencia ;
        $mensaje_ip = ( 'Conflict' === $request['response']['message'] ) ? '<strong>CONFLICTO: PETICION DUPLICADA</strong>' : $userIP ;

        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: funos <clientes@funos.es>';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoPreventiva'), get_option('wpfunos_asuntoCorreoPreventiva') );

        $email_correo = get_option('wpfunos_mailCorreoPreventiva');

        $mensaje = str_replace( '[email]' , $email , $mensaje );
        $mensaje = str_replace( '[nombreUsuario]' , $nombre , $mensaje );
        $mensaje = str_replace( '[telefono]' , $telefono , $mensaje );
        $mensaje = str_replace( '[IP]' , $mensaje_ip , $mensaje );
        $mensaje = str_replace( '[referencia]' , $mensaje_referencia , $mensaje );
        $mensaje = str_replace( '[ubicacion]' , $ubicacion , $mensaje );
        $mensaje = str_replace( '[CPUsuario]' , $CP , $mensaje );
        $mensaje = str_replace( '[seguro]' , $seguro , $mensaje );
        $mensaje = str_replace( '[tipoAPI]' , $api , $mensaje );
        $mensaje = str_replace( '[edad]' , $edad , $mensaje );

        if( site_url() === 'https://dev.funos.es'){
          wp_mail ( 'efraim@efraim.cat', get_option('wpfunos_asuntoCorreoPreventiva') , $mensaje, $headers );
        }else{
          if(!empty( get_option('wpfunos_mailCorreoCcoPreventiva' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPreventiva' ) ;
          if(!empty( get_option('wpfunos_mailCorreoBccPreventiva' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPreventiva' ) ;
          wp_mail ( $email_correo, get_option('wpfunos_asuntoCorreoPreventiva') , $mensaje, $headers );
        }

        $log = (is_user_logged_in()) ? 'logged' : 'not logged';
        $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0200 '.'Enviar correo detalles Preventiva' );
        do_action('wpfunos_log', $userIP.' - 0200 '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
        do_action('wpfunos_log', $userIP.' - 0200 '.'mobile: ' . $mobile);
        do_action('wpfunos_log', $userIP.' - 0200 '.'logged: ' .$log  );
        do_action('wpfunos_log', $userIP.' - 0200 '.'$headers: ' . apply_filters('wpfunos_dumplog', $request['response']  ) );
        do_action('wpfunos_log', $userIP.' - 0200 '.'$email: ' . $email );
      }
      $log = (is_user_logged_in()) ? 'logged' : 'not logged';
      $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0200 '.'Petición API correcta' );
      do_action('wpfunos_log', $userIP.' - 0200 '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
      do_action('wpfunos_log', $userIP.' - 0200 '.'mobile: ' . $mobile);
      do_action('wpfunos_log', $userIP.' - 0200 '.'logged: ' .$log  );
      do_action('wpfunos_log', $userIP.' - 0200 '.'ID: ' .  $post_id );
      do_action('wpfunos_log', $userIP.' - 0200 '.'referencia: ' . $referencia );
      $mensaje_return = ( 'Conflict' === $request['response']['message'] ) ? 'Conflict' : 'OK:' . $referencia ;
      return $mensaje_return;
    }else{
      $log = (is_user_logged_in()) ? 'logged' : 'not logged';
      $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0200 '.'Petición API devuelve errores' );
      do_action('wpfunos_log', $userIP.' - 0200 '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
      do_action('wpfunos_log', $userIP.' - 0200 '.'mobile: ' . $mobile);
      do_action('wpfunos_log', $userIP.' - 0200 '.'logged: ' .$log  );
      do_action('wpfunos_log', $userIP.' - 0200 '.'Error: ' .  $request['response']['message'] );
      do_action('wpfunos_log', $userIP.' - 0200 '.'referencia: ' . $referencia );
      return $request['response']['message'];
    }


  }

  /*********************************/
  /***** UTILIDADES           ******/
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
        'meta_key' =>  'wpfunos_cpostalesPoblacion',
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
      'meta_key' =>  'wpfunos_provinciasCodigo',
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
  * Enviar Correo entrada datos usuario lead aseguradora
  */
  public function wpfunosResultCorreoDatos( ){
    if( apply_filters('wpfunos_reserved_email','wpfunosCorreoEntradaDatos') ) return;
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $referencia = $_GET['referencia'];
    $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );

    $email =  get_post_meta( $IDusuario, 'wpfunos_userMail' , true );
    if( apply_filters( 'wpfunos_pruebas_email', $email ) ) return;

    $log = (is_user_logged_in()) ? 'logged' : 'not logged';
    $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0200 '.'Enviar Cold Lead a ELECTIUM' );
    do_action('wpfunos_log', $userIP.' - 0200 '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
    do_action('wpfunos_log', $userIP.' - 0200 '.'mobile: ' . $mobile);
    do_action('wpfunos_log', $userIP.' - 0200 '.'logged: ' .$log  );
    do_action('wpfunos_log', $userIP.' - 0200 '.'referencia: ' . $referencia );
    do_action('wpfunos_log', $userIP.' - 0200 '.'IDusuario: ' . $IDusuario );

    if ($IDusuario != 0){

      // Desactivar para pruebas
      if( site_url() === 'https://funos.es'){
        $this->wpfunosAPIAseguradora( $IDusuario, 39084, 'Cold Lead', "" );
        //HUBSPOT
        $hubspotutk = sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userHubspotUTK' , true ));
        if( $hubspotutk == '' ) $hubspotutk = ( isset( $_COOKIE['hubspotutk'] ) ) ? $_COOKIE['hubspotutk'] : '' ;

        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0200 '.'Prepara envio Hubspot' );
        $params = array(
          'nombre' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userName' , true )),
          'email' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userMail' , true )),
          'telefono' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userPhone' , true )),
          'donde' => sanitize_text_field( get_post_meta( $IDusuario, 'wpfunos_userNombreSeleccionUbicacion' , true )),
          'accion' => 'Datos usuario aseguradoras Cold Lead',
          'ip' => $userIP,
          'ok' => 'ok',
          'hubspotutk' => $hubspotutk,
          'pageUri' => 'https://funos.es/compara-precios-aseguradoras',
          'pageId' => 'Compara Precios Aseguradoras y Planes Funerarios - Funos - Comparador de Funerarias'
        );
        do_action('wpfhubspot-send-form', $params );
        do_action('wpfhubspot-usuarios',array( 'email' => $wpfemail, 'hubspotutk' => $hubspotutk ) );

        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', $userIP.' - 0200 '.'Finaliza envio formulario Hubspot' );
        //HUBSPOT

      }

    }
    return;
  }

  /**
  * Enviar Correo entrada datos usuario mensaje colaboradores
  */
  public function wpfunosCorreoEntradaDatos(){
    if( apply_filters('wpfunos_reserved_email','wpfunosCorreoEntradaDatos') ) return;
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $referencia = $_GET['referencia'];
    $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );

    $email = get_post_meta( $IDusuario, 'wpfunos_userMail', true );
    if( apply_filters( 'wpfunos_pruebas_email', $email ) ) return;

    if ($IDusuario != 0){
      $headers[] = 'Content-Type: text/html; charset=UTF-8';
      $headers[] = 'From: funos <clientes@funos.es>';
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoDatosEntradosAseguradora'), get_option('wpfunos_asuntoCorreoDatosEntradosAseguradora') );
      //$texto =  esc_html__( get_option('wpfunos_mensajeCorreoDatosEntradosAseguradora'), 'wpfunos_mensajes');
      //$asunto = esc_html__( get_option('wpfunos_asuntoCorreoDatosEntradosAseguradora'), 'wpfunos_mensajes');
      //$mensaje = apply_filters( 'wpfunos_message_format', $texto,  $asunto );

      $seleccion = get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true );
      $respuesta = (explode(',',$seleccion));
      $ubicacion = strtr($respuesta[0],"+",",");
      $userIP = apply_filters('wpfunos_userIP','dummy');
      $Email = get_post_meta( $IDusuario, 'wpfunos_userMail', true );
      $Nombre = get_post_meta( $IDusuario, 'wpfunos_userName', true );
      $Telefono = get_post_meta( $IDusuario, 'wpfunos_userPhone', true );
      $CP = get_post_meta( $IDusuario, 'wpfunos_userCP', true );
      $edad =  date("Y") - (int)$respuesta[3];
      $any = $respuesta[3];
      $URL = get_post_meta( $IDusuario, 'wpfunos_userURL', true );

      $aseguradoraNombre = get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasNombre', true );
      $aseguradoraLogo = wp_get_attachment_image ( get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasLogo' , array(45,46) ) );
      $aseguradoraTipoSeguro = get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasTipoSeguroNombre', true );

      $mensaje = str_replace( '[referencia]' , $referencia , $mensaje );
      $mensaje = str_replace( '[IP]' , $userIP , $mensaje );
      $mensaje = str_replace( '[Email]' , $Email , $mensaje );
      $mensaje = str_replace( '[Nombre]' , $Nombre , $mensaje );
      $mensaje = str_replace( '[Telefono]' , $Telefono , $mensaje );
      $mensaje = str_replace( '[address]' , $ubicacion , $mensaje );
      $mensaje = str_replace( '[CP]' , $CP , $mensaje );
      $mensaje = str_replace( '[edad]' , $edad , $mensaje );
      $mensaje = str_replace( '[any]' , $any , $mensaje );
      $mensaje = str_replace( '[URL]' , $URL , $mensaje );
      $mensaje = str_replace( '[aseguradoraNombre]' , $aseguradoraNombre , $mensaje );
      $mensaje = str_replace( '[aseguradoraTipoSeguro]' , $aseguradoraTipoSeguro , $mensaje );

      if( site_url() === 'https://dev.funos.es'){
        wp_mail ( 'efraim@efraim.cat', get_option('wpfunos_asuntoCorreoDatosEntradosAseguradora') , $mensaje, $headers );
      }else{
        if(!empty( get_option('wpfunos_mailCorreoCcoDatosEntradosAseguradora' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoDatosEntradosAseguradora' ) ;
        if(!empty( get_option('wpfunos_mailCorreoBccDatosEntradosAseguradora' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccDatosEntradosAseguradora' ) ;
        wp_mail ( get_option('wpfunos_mailCorreoDatosEntradosAseguradora'), get_option('wpfunos_asuntoCorreoDatosEntradosAseguradora') , $mensaje, $headers );
      }

      $log = (is_user_logged_in()) ? 'logged' : 'not logged';
      $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', $userIP.' - 0200 '.'Enviar correo entrada datos aseguradoras al admin' );
      do_action('wpfunos_log', $userIP.' - 0200 '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
      do_action('wpfunos_log', $userIP.' - 0200 '.'mobile: ' . $mobile);
      do_action('wpfunos_log', $userIP.' - 0200 '.'logged: ' .$log  );
      do_action('wpfunos_log', $userIP.' - 0200 '.'referencia: ' . $referencia );
      do_action('wpfunos_log', $userIP.' - 0200 '.'mailCorreoDatosEntradosAseguradora: ' . get_option('wpfunos_mailCorreoDatosEntradosAseguradora') );

    }

  }
  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Botón 'Te Llamamos'
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_aseguradoras_llamen', function () { $this->wpfunosAseguradorasLlamen();});
  * add_action('wp_ajax_wpfunos_ajax_aseguradoras_llamen', function () {$this->wpfunosAseguradorasLlamen();});
  *
  */
  public function wpfunosAseguradorasLlamamos(){
    $servicio = $_POST['wpfid'];
    $wpnonce = $_POST['wpfn'];
    $usuario = $_POST['wpfu'];
    $mensaje  = $_POST['wpfm'];
    $IP = apply_filters('wpfunos_userIP','dummy');

    // $nonce = wp_create_nonce("wpfunos_aseguradoras_nonce".apply_filters('wpfunos_userIP','dummy'));
    if ( !wp_verify_nonce( $wpnonce, "wpfunos_aseguradoras_nonce".$IP) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    $respuesta = $this->wpfunosAPIAseguradora( $usuario, $servicio, $mensaje, "Llamamos" );
    //HUBSPOT
    $hubspotutk = sanitize_text_field( get_post_meta( $usuario, 'wpfunos_userHubspotUTK' , true ));
    if( $hubspotutk == '' ) $hubspotutk = ( isset( $_COOKIE['hubspotutk'] ) ) ? $_COOKIE['hubspotutk'] : '' ;

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0200 '.'Prepara envio Hubspot' );
    $params = array(
      'nombre' => sanitize_text_field( get_post_meta( $usuario, 'wpfunos_userName' , true )),
      'email' => sanitize_text_field( get_post_meta( $usuario, 'wpfunos_userMail' , true )),
      'telefono' => sanitize_text_field( get_post_meta( $usuario, 'wpfunos_userPhone' , true )),
      'donde' => sanitize_text_field( get_post_meta( $usuario, 'wpfunos_userNombreSeleccionUbicacion' , true )),
      'accion' => 'Datos usuario aseguradoras llamamos',
      'ip' => $IP,
      'ok' => 'ok',
      'hubspotutk' => $hubspotutk,
      'pageUri' => 'https://funos.es/compara-precios-aseguradoras',
      'pageId' => 'Compara Precios Aseguradoras y Planes Funerarios - Funos - Comparador de Funerarias'
    );
    do_action('wpfhubspot-send-form', $params );
    do_action('wpfhubspot-usuarios',array( 'email' => $wpfemail, 'hubspotutk' => $hubspotutk ) );

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0200 '.'Finaliza envio formulario Hubspot' );
    //HUBSPOT

    $result['type'] = "success";
    $result['respuesta'] = $respuesta;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Botón 'Te Llamamos'
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_aseguradoras_presupuesto', function () { $this->wpfunosAseguradorasPresupuesto();});
  * add_action('wp_ajax_wpfunos_ajax_aseguradoras_presupuesto', function () {$this->wpfunosAseguradorasPresupuesto();});
  *
  */
  public function wpfunosAseguradorasPresupuesto(){
    $servicio = $_POST['wpfid'];
    $wpnonce = $_POST['wpfn'];
    $usuario = $_POST['wpfu'];
    $mensaje  = $_POST['wpfm'];
    $IP = apply_filters('wpfunos_userIP','dummy');

    // $nonce = wp_create_nonce("wpfunos_aseguradoras_nonce".apply_filters('wpfunos_userIP','dummy'));
    if ( !wp_verify_nonce( $wpnonce, "wpfunos_aseguradoras_nonce".$IP) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    $respuesta = $this->wpfunosAPIAseguradora( $usuario, $servicio, $mensaje, "Presupuesto" );
    //HUBSPOT
    $hubspotutk = sanitize_text_field( get_post_meta( $usuario, 'wpfunos_userHubspotUTK' , true ));
    if( $hubspotutk == '' ) $hubspotutk = ( isset( $_COOKIE['hubspotutk'] ) ) ? $_COOKIE['hubspotutk'] : '' ;

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0200 '.'Prepara envio Hubspot' );
    $params = array(
      'nombre' => sanitize_text_field( get_post_meta( $usuario, 'wpfunos_userName' , true )),
      'email' => sanitize_text_field( get_post_meta( $usuario, 'wpfunos_userMail' , true )),
      'telefono' => sanitize_text_field( get_post_meta( $usuario, 'wpfunos_userPhone' , true )),
      'donde' => sanitize_text_field( get_post_meta( $usuario, 'wpfunos_userNombreSeleccionUbicacion' , true )),
      'accion' => 'Datos usuario aseguradoras presupuesto',
      'ip' => $IP,
      'ok' => 'ok',
      'hubspotutk' => $hubspotutk,
      'pageUri' => 'https://funos.es/compara-precios-aseguradoras',
      'pageId' => 'Compara Precios Aseguradoras y Planes Funerarios - Funos - Comparador de Funerarias'
    );
    do_action('wpfhubspot-send-form', $params );
    do_action('wpfhubspot-usuarios',array( 'email' => $wpfemail, 'hubspotutk' => $hubspotutk ) );

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - 0200 '.'Finaliza envio formulario Hubspot' );
    //HUBSPOT

    $result['type'] = "success";
    $result['respuesta'] = $respuesta;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

}
