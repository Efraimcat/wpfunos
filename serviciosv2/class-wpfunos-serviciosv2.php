<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Servicios.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/servicios
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
class Wpfunos_ServiciosV2 {
  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
    add_shortcode( 'wpfunos-nuevos-resultados', array( $this, 'wpfunosServiciosResultadosShortcode' ));
    add_shortcode( 'wpfunos-nuevos-datos-cabecera', array( $this, 'wpfunosServiciosDatosCabeceraShortcode' ));
    add_shortcode( 'wpfunos-serviciosv2-precio-zona', array( $this, 'wpfunosServiciosv2PrecioZonaShortcode' ));
    add_shortcode( 'wpfunos-nuevos-datos-distancia', array( $this, 'wpfunosServiciosDatosDistanciaShortcode' ));
    add_shortcode( 'wpfunos-serviciosv2-ventana-distancia', array( $this, 'wpfunosServiciosVentanaDistanciaShortcode' ));
    add_shortcode( 'wpfunos-nuevos-datos', array( $this, 'wpfunosServiciosDatosShortcode' ));

    add_action( 'wpfunos_resultv2_grid_confirmado', array( $this, 'wpfunosResultV2GridConfirmado' ), 10, 2 );
    add_action( 'wpfunos_resultv2_grid_sinconfirmar', array( $this, 'wpfunosResulV2tGridSinConfirmar' ), 10, 2 );
    add_action( 'wpfunos_resultv2_blur_confirmado', array( $this, 'wpfunosResultV2BlurConfirmado' ), 10, 2 );
    add_action( 'wpfunos_resultv2_blur_sinconfirmar', array( $this, 'wpfunosResulV2tBlurSinConfirmar' ), 10, 2 );

    add_action('wp_ajax_nopriv_wpfunos_ajax_serviciosv2_entrada_datos', function () { $this->wpfunosServiciosv2EntradaDatos();});
    add_action('wp_ajax_wpfunos_ajax_serviciosv2_entrada_datos', function () {$this->wpfunosServiciosv2EntradaDatos();});

  }
  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-serviciosv2.css', array(), $this->version, 'all' );
  }
  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-serviciosv2.js', array( 'jquery' ), $this->version, false );
  }

  /*********************************/
  /*****  SHORTCODES          ******/
  /*********************************/

  /**
  * Shortcode [wpfunos-nuevos-resultados]
  */
  public function wpfunosServiciosResultadosShortcode($atts, $content = ""){
    echo do_shortcode( '[gmw_ajax_form search_form="7"]' );
  }

  /**
  * Shortcode [wpfunos-nuevos-datos-cabecera]
  */
  public function wpfunosServiciosDatosCabeceraShortcode($atts, $content = ""){
    if( ! isset($_GET['cf']['resp1']) || ! isset($_GET['lat']) ){
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '2. - Entrada página resultados v2 - Redirección Home' );
      do_action('wpfunos_log', 'IP: ' .apply_filters('wpfunos_userIP','dummy') );
      wp_redirect( home_url() );
      exit();
    }
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '2. - Entrada página resultados v2' );
    do_action('wpfunos_log', 'IP: ' .apply_filters('wpfunos_userIP','dummy') );

    $nueva_distancia = 0;
    $nueva_lat = 0;
    $nueva_lng = 0;
    $distanciaDirecto = get_option('wpfunos_distanciaServicioDirecto');
    $args = array(
      'post_type' => 'excep_prov_wpfunos',	//
      'meta_key' =>  'wpfunos_excep_provProvincia',
      'meta_value' => $_GET['address'][0],
    );
    $post_list = get_posts( $args );
    if( $post_list ){
      foreach ( $post_list as $post ) :
        $nueva_distancia = get_post_meta( $post->ID, 'wpfunos_excep_provDistancia', true );
        $nueva_lat = get_post_meta( $post->ID, 'wpfunos_excep_provLat', true );
        $nueva_lng = get_post_meta( $post->ID, 'wpfunos_excep_provLng', true );
        if( (int)$nueva_distancia == 0 ) $nueva_distancia = get_option('wpfunos_distanciaServicioDirecto');
      endforeach;
      wp_reset_postdata();
    }
    if( (int)$nueva_lat != 0 && (int)$nueva_lng != 0 && $_GET['lat'] != $nueva_lat && $_GET['lng'] != $nueva_lng && ( ! is_admin() ) ){
      $new_url = home_url('/compara-nuevos-datos'.add_query_arg( array($_GET), $wp->request ) );
      $new_url = str_replace("&lat","&oldlat", $new_url );
      $new_url = str_replace("&lng","&oldlng", $new_url );
      $new_url = str_replace("&distance","&old", $new_url );
      $new_url = str_replace("&cf[resp4]=2","&cf[resp4]=1", $new_url );
      $new_url = $new_url . '&lat=' . $nueva_lat . '&lng=' . $nueva_lng . '&distance=' . $nueva_distancia;
      wp_redirect( $new_url );
      exit;
    }
    //if( ! apply_filters('wpfunos_reserved_email','dummy') ){
    //  $args = array(
    //    'post_status' => 'publish',
    //    'post_type' => 'ubicaciones_wpfunos',
    //    'posts_per_page' => -1,
    //    'meta_key' =>  'wpfunos_ubicacionIP',
    //    'meta_value' => $ipaddress,
    //  );
    //  $post_list = get_posts( $args );
    //  $contador = 1;
    //  if( $post_list ) $contador=count($post_list)+1;
    //  $my_post = array(
    //    'post_title' => $ipaddress.'-'.$contador,
    //    'post_type' => 'ubicaciones_wpfunos',
    //    'post_status'  => 'publish',
    //    'meta_input'   => array(
    //      'wpfunos_ubicacionIP' => sanitize_text_field( $ipaddress ),
    //      'wpfunos_ubicacionDireccion' => sanitize_text_field( $_GET['poblacion'] ),
    //      'wpfunos_ubicacionDistancia' => sanitize_text_field( $_GET['distance'] ),
    //      'wpfunos_ubicacionVisitas' => $contador,
    //      'wpfunos_Dummy' => true,
    //    ),
    //  );
    //  $post_id = wp_insert_post($my_post);
    //}
    $_GET['cuando'] = 'Ahora mismo';
    $_GET['poblacion'] = $_GET['address'][0];
    //wpf-resultados-cabecera-cuando
    $nonce = wp_create_nonce("wpfunos_serviciosv2_nonce".apply_filters('wpfunos_userIP','dummy'));
    mt_srand(time());
    $newref = 'funos-'.(string)mt_rand();
    $_GET['AttsInicio'] = 'wpfn|' . $nonce . '
    wpfip|' . apply_filters('wpfunos_userIP','dummy'). '
    wpfnewref|' . $newref ;

    $expiry = strtotime('+1 month');
    if (is_user_logged_in()){
      $current_user = wp_get_current_user();
      if( ! isset( $_COOKIE['wpfn'] ) ) setcookie('wpfn', sanitize_text_field( $current_user->display_name ), ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      if( ! isset( $_COOKIE['wpfe'] ) ) setcookie('wpfe', sanitize_text_field( $current_user->user_email ), ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      if( ! isset( $_COOKIE['wpft'] ) ) setcookie('wpft', sanitize_text_field( str_replace(" ","",get_user_meta( $current_user->ID, 'wpfunos_telefono' , true ))), ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
    }else{
      if( ! isset( $_COOKIE['wpfn'] ) ) setcookie('wpfn', 'dummy', ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      if( ! isset( $_COOKIE['wpfe'] ) ) setcookie('wpfe', 'dummy', ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      if( ! isset( $_COOKIE['wpft'] ) ) setcookie('wpft', 'dummy', ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
    }

    if ( $_GET['wpfref'] == 'dummy' ) $this->wpftransients( 'inicio', $newref );

    ElementorPro\Modules\Popup\Module::add_popup_to_location( '56688' ); //Ventana Popup Esperando
    ElementorPro\Modules\Popup\Module::add_popup_to_location( '63359' ); //Compara precios filtros

    require 'js/wpfunos-serviciosv2-buscador.js';
  }

  /**
  * Shortcode [wpfunos-serviciosv2-precio-zona]
  */
  public function wpfunosServiciosv2PrecioZonaShortcode($atts, $content = ""){
    $respuesta = $this->wpfunosFiltros();
    //case '1': $result['resp1'] = array( 'desc' => 'Destino', 'inicial' => 'E', 'texto' => 'Entierro' ); break;
    $address = $_GET['address'][0];
    $cp = $_GET['CP'];
    $CP = $this->wpfunosCodigoPostal( $cp, $address );
    $codigo_provincia = substr( trim( $CP, " " ), 0, 2 );
    $campo = $respuesta['resp1']['inicial'] . $respuesta['resp2']['inicial'] . $respuesta['resp3']['inicial'] . $respuesta['resp4']['inicial'];

    echo do_shortcode( get_option('wpfunos_seccionPreciosExclusivos') );
    $args = array(
      'post_type' => 'prov_zona_wpfunos',
      'meta_key' =>  'wpfunos_provinciasCodigo',
      'meta_value' => $codigo_provincia,
    );
    $post_list = get_posts( $args );
    $contador = 0;
    if( $post_list ){
      foreach ( $post_list as $post ) :
        $contador++;
        $check = get_post_meta( $post->ID, 'wpfunos_provincias' . $campo.'_ck', true );
        $precio = get_post_meta( $post->ID, 'wpfunos_provincias' . $campo, true );
        $titulo = get_post_meta( $post->ID, 'wpfunos_provinciasTitulo', true );
        $comentarios = get_post_meta( $post->ID, 'wpfunos_provinciasComentarios', true );
        if( $check == '1'){
          $_GET['prov_zona_titulo'] = $titulo;
          $_GET['prov_zona_comentarios'] = $comentarios;
          $_GET['prov_zona_precio'] = number_format($precio, 0, ',', '.');
          echo do_shortcode( get_option('wpfunos_seccionPreciosMedioZona') );
        }
      endforeach;
      wp_reset_postdata();
    }else{
      ?><h6 style="text-align: center;margin-top: 20px;border-style: solid;border-width: thin;padding: 20px;border-radius: 4px;">No hay datos de precio medio para la zona de <?php echo $address;?></h6><?php
    }
  }

  /**
  * Shortcode [wpfunos-nuevos-datos-distancia]
  */
  public function wpfunosServiciosDatosDistanciaShortcode($atts, $content = ""){
    require 'js/wpfunos-serviciosv2-datos-distancia.js';
  }

  /**
  * Shortcode [wpfunos-serviciosv2-ventana-distancia]
  */
  public function wpfunosServiciosVentanaDistanciaShortcode($atts, $content = ""){
    require 'js/wpfunos-serviciosv2-ventana-distancia.js';
  }

  /**
  * Shortcode [wpfunos-nuevos-datos]
  *
  * 1. - Entrada comparador servicios v2
  * 2. - Entrada página resultados v2
  * 3. - Entrada formulario datos personales v2
  * 4. - Entrada sin formulario datos personales v2
  * 5. - Recogida datos usuario v2
  * 6. - Página resultados v2
  *
  *  document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfnombre", response.wpfnombre);
  * wpfnombre|dummy
  * wpfemail|dummy
  * wpftelefono|dummy
  * wpfcp|dummy
  * wpfref|dummy
  * wpfwpf|dummy
  * wpfn|dummy
  * wpfip|dummy
  * wpfurl|dummy
  * wpfresp1|0
  * wpfresp2|0
  * wpfresp3|0
  * wpfresp4|0
  *
  * var nonce = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfn");
  * var ip = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfip");
  */

  public function wpfunosServiciosDatosShortcode($atts, $content = ""){
    $ipaddress = apply_filters('wpfunos_userIP','dummy');

    echo do_shortcode( '[gmw_ajax_form search_results="7"]' );
  }

  /*********************************/
  /*****                      ******/
  /*********************************/
  /**
  * Hook mostrar entrada con precio confirmados
  *
  * add_action( 'wpfunos_resultv2_grid_confirmado', array( $this, 'wpfunosResultV2GridConfirmado' ), 10, 2 );
  * add_action( 'wpfunos_resultv2_grid_sinconfirmar', array( $this, 'wpfunosResulV2tGridSinConfirmar' ), 10, 2 );
  * add_action( 'wpfunos_resultv2_blur_confirmado', array( $this, 'wpfunosResultV2BlurConfirmado' ), 10, 2 );
  * add_action( 'wpfunos_resultv2_blur_sinconfirmar', array( $this, 'wpfunosResulV2tBlurSinConfirmar' ), 10, 2 );
  */

  public function wpfunosResultV2GridConfirmado( $wpfunos_confirmado ){
  }

  public function wpfunosResulV2tGridSinConfirmar( $wpfunos_sinconfirmar ){
  }

  public function wpfunosResultV2BlurConfirmado( $wpfunos_confirmado ){
    if(is_array($wpfunos_confirmado) && count( $wpfunos_confirmado ) != 0 ){
      ?><div class="wpfunos-titulo"><p></p><center><h2>Precio confirmado</h2></center></div><?php
      //$wpfunos_confirmado[] = array ($servicioID, $resultado->ID, $servicioPrecio, $resultado->distance );
      if(isset($_GET['orden']) && $_GET['orden'] == 'precios' ){
        $columns = array_column( $wpfunos_confirmado, 2 );
        array_multisort( $columns, SORT_ASC, $wpfunos_confirmado );
      }
      $cont_blur = 0;
      foreach ($wpfunos_confirmado as $value) {
        if($cont_blur < 5 ){
          $respuesta = $this->wpfunosFiltros();
          //case '1': $result['resp1'] = array( 'desc' => 'Destino', 'inicial' => 'E', 'texto' => 'Entierro' ); break;

          $nonce = wp_create_nonce("wpfunos_serviciosv2_nonce".apply_filters('wpfunos_userIP','dummy'));
          $_GET['AttsServicio'] = 'wpfid|' . $value[0].'
          wpfn|' . $nonce .'
          wpfp|' . $value[2] ;

          $_GET['seccionID-llamadas'] = 'wpf-llamadas-'. $value[0];
          $_GET['seccionID-presupuesto'] = 'wpf-presupuesto-'. $value[0];
          $_GET['seccionID-detalles'] = 'wpf-detalles-'. $value[0];
          $_GET['seccionID-mapas'] = 'wpf-mapas-'. $value[0];
          $_GET['seccionID-eco'] = 'wpf-eco-'. $value[0];
          $_GET['seccionID-precio'] = 'wpf-precio-'. $value[0];
          $_GET['seccionClass-detalles'] = 'wpf-detalles-si';
          $_GET['seccionClass-mapas'] = 'wpf-mapas-si';
          $_GET['seccionClass-presupuesto'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
          $_GET['seccionClass-llamadas'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';

          $_GET['valor-logo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioLogo', true ) ,'full' );
          $_GET['valor-imagen-promo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioImagenPromo', true ) ,'full' );
          $_GET['valor-logo-confirmado'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenConfirmado', true ) , array(45,46));
          $_GET['valor-logo-eco'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenEcologico', true ) , array(60,60));
          $_GET['valor-textoconfirmado'] = 'Precio confirmado';
          $_GET['valor-nombre'] = get_post_meta( $value[0], 'wpfunos_servicioNombre', true );
          $_GET['valor-nombrepack'] = get_post_meta( $value[0], 'wpfunos_servicioPackNombre', true );
          $_GET['valor-valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
          $_GET['valor-precio'] = number_format($value[2], 0, ',', '.') . '€';;
          $_GET['valor-textoprecio'] = get_post_meta( $value[0], 'wpfunos_servicioTextoPrecio', true );
          $_GET['valor-direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );
          $_GET['valor-distancia'] = $value[3] ;
          $_GET['valor-servicio'] = $respuesta['resp1']['texto']. ', ' .$respuesta['resp2']['texto']. ', ' .$respuesta['resp3']['texto']. ', ' .$respuesta['resp4']['texto'];

          ?><div class="wpfunos-busqueda-contenedor"><?php
          echo do_shortcode( '[elementor-template id="63606"]' ) ;
          ?></div><?php
          $cont_blur++ ;
        }
      }
    }
  }
  public function wpfunosResulV2tBlurSinConfirmar( $wpfunos_sinconfirmar ){
    if(is_array($wpfunos_sinconfirmar) && count( $wpfunos_sinconfirmar ) != 0 ){
      ?><div class="wpfunos-titulo"><p></p><center><h2>Precio sin confirmar</h2></center></div><?php
      //$wpfunos_sinconfirmar[] = array ($servicioID, $resultado->ID, $servicioPrecio, $resultado->distance );
      foreach ($wpfunos_sinconfirmar as $value) {
        $respuesta = $this->wpfunosFiltros();
        //case '1': $result['resp1'] = array( 'desc' => 'Destino', 'inicial' => 'E', 'texto' => 'Entierro' ); break;
        $nonce = wp_create_nonce("wpfunos_serviciosv2_nonce".apply_filters('wpfunos_userIP','dummy'));
        $_GET['AttsServicio'] = 'wpfid|' . $value[0].'
        wpfn|' . $nonce .'
        wpfp|' . $value[2] ;

        $_GET['seccionID-llamadas'] = 'wpf-llamadas-'. $value[0];
        $_GET['seccionID-presupuesto'] = 'wpf-presupuesto-'. $value[0];
        $_GET['seccionID-detalles'] = 'wpf-detalles-'. $value[0];
        $_GET['seccionID-mapas'] = 'wpf-mapas-'. $value[0];
        $_GET['seccionID-eco'] = 'wpf-eco-'. $value[0];
        $_GET['seccionID-precio'] = 'wpf-precio-'. $value[0];
        $_GET['seccionClass-detalles'] = 'wpf-detalles-no';
        $_GET['seccionClass-mapas'] = 'wpf-mapas-no';
        $_GET['seccionClass-presupuesto'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
        $_GET['seccionClass-llamadas'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';

        $_GET['valor-logo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioLogo', true ) ,'full' );
        $_GET['valor-imagen-promo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioImagenPromo', true ) ,'full' );
        $_GET['valor-logo-confirmado'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenNoConfirmado', true ) , array(45,46));
        $_GET['valor-logo-eco'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenEcologico', true ) , array(60,60));
        $_GET['valor-textoconfirmado'] = 'Precio sin confirmar';
        $_GET['valor-nombre'] = get_post_meta( $value[0], 'wpfunos_servicioNombre', true );
        $_GET['valor-nombrepack'] = get_post_meta( $value[0], 'wpfunos_servicioPackNombre', true );
        $_GET['valor-valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
        $_GET['valor-precio'] = number_format($value[2], 0, ',', '.') . '€';;
        $_GET['valor-textoprecio'] = get_post_meta( $value[0], 'wpfunos_servicioTextoPrecio', true );
        $_GET['valor-direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );
        $_GET['valor-distancia'] = $value[3] ;
        $_GET['valor-servicio'] = $respuesta['resp1']['texto']. ', ' .$respuesta['resp2']['texto']. ', ' .$respuesta['resp3']['texto']. ', ' .$respuesta['resp4']['texto'];

        ?><div class="wpfunos-busqueda-contenedor"><?php
        echo do_shortcode( '[elementor-template id="63606"]' ) ;
        ?></div><?php
      }
    }
  }

  /*********************************/
  /*****  UTILS               ******/
  /*********************************/


  /**
  *  Transients
  */
  /**
  * $action:
  * 0 - 'datos'
  * 1 - 'inicio'
  *
  * return $valor o false si no existe y accion != 'inicio'
  *
  * if ( $_GET['wpfref'] == 'dummy' ) $this->wpftransients( 'inicio', $newref );
  *
  * a:14:{s:6:"wpfref";s:16:"funos-1420558983";s:6:"wpfact";s:6:"inicio";s:5:"wpfip";s:14:"89.238.176.174";s:4:"wpfn";s:5:"dummy";s:4:"wpfe";s:5:"dummy";s:4:"wpft";s:5:"dummy";
  * s:6:"wpfadr";s:9:"Barcelona";s:7:"wpfdist";s:2:"20";s:6:"wpflat";s:9:"41.387397";s:6:"wpflng";s:8:"2.168568";s:8:"wpfresp1";s:1:"2";s:8:"wpfresp2";s:1:"2";s:8:"wpfresp3";s:1:"2";s:8:"wpfresp4";s:1:"2";}
  */
  public function wpftransients( $action, $newref = 'dummy', $valor = 'dummy' ){
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'transient IP: ' .apply_filters('wpfunos_userIP','dummy'));
    do_action('wpfunos_log', 'transient action: ' .$action);
    do_action('wpfunos_log', 'transient newref: ' .$newref);
    do_action('wpfunos_log', 'transient valor: ' .$valor);

    if( $action != 'inicio' ){
      if(( $transient = get_transient('wpfunos-wpfref-' .apply_filters('wpfunos_userIP','dummy'))) === false ) return false;
    }

    if( $action == 'datos' ) return $transient[$valor];

    $transient_data = array(
      'wpfref' => $newref,
      'wpfact' => $action,
      'wpfip' => apply_filters('wpfunos_userIP','dummy'),
      'wpfn' => $_COOKIE['wpfn'],
      'wpfe' => $_COOKIE['wpfe'],
      'wpft' => $_COOKIE['wpft'],
      'wpfadr' => $_GET['address'][0],
      'wpfdist' => $_GET['distance'],
      'wpflat' => $_GET['lat'],
      'wpflng' => $_GET['lng'],
      'wpfresp1' => $_GET['cf']['resp1'],
      'wpfresp2' => $_GET['cf']['resp2'],
      'wpfresp3' => $_GET['cf']['resp3'],
      'wpfresp4' => $_GET['cf']['resp4'],
    );
    //do_action('wpfunos_log', 'Create new transient: ' . apply_filters('wpfunos_dumplog', $transient_data ) );

    if( $action == 'inicio' ){
      $transient_id = set_transient( 'wpfunos-wpfref-' .apply_filters('wpfunos_userIP','dummy'), $transient_data, HOUR_IN_SECONDS );
      do_action('wpfunos_log', 'Create new transient: ' .$transient_id );
      return $transient_id;
    }


    return false;
  }

  /**
  * Buscar CP undefined
  */
  public function  wpfunosCodigoPostal( $CodigoPostal, $Direccion ){
    if( $CodigoPostal == 'undefined' || $CodigoPostal == '' || $CodigoPostal == 'false'){
      $poblacion = ucwords( $Direccion );
      $CodigoPostal = '00';
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
        $CodigoPostal = get_post_meta( $id, 'wpfunos_cpostalesCodigo', true );
      endif;
      wp_reset_postdata();
    }
    return $CodigoPostal;
  }

  /**
  * Filtros servicios
  */
  public function wpfunosFiltros(){
    $result = array();

    switch($_GET['cf']['resp1']){
      case '1': $result['resp1'] = array( 'desc' => 'Destino', 'inicial' => 'E', 'texto' => 'Entierro' ); break;
      case '2': $result['resp1'] = array( 'desc' => 'Destino', 'inicial' => 'I', 'texto' => 'Incineración' ); break;
    }
    switch($_GET['cf']['resp2']){
      case '1': $result['resp2'] = array( 'desc' => 'Ataúd', 'inicial' => 'M', 'texto' => 'Normal' ); break;
      case '2': $result['resp2'] = array( 'desc' => 'Ataúd', 'inicial' => 'E', 'texto' => 'Económico' ); break;
      case '3': $result['resp2'] = array( 'desc' => 'Ataúd', 'inicial' => 'P', 'texto' => 'Premium' ); break;
    }
    switch($_GET['cf']['resp3']){
      case '1': $result['resp3'] = array( 'desc' => 'Velatorio', 'inicial' => 'V', 'texto' => 'Velatorio' ); break;
      case '2': $result['resp3'] = array( 'desc' => 'Velatorio', 'inicial' => 'S', 'texto' => 'Sin velatorio' ); break;
    }
    switch($_GET['cf']['resp4']){
      case '1': $result['resp4'] = array( 'desc' => 'Ceremonia', 'inicial' => 'S', 'texto' => 'Sin ceremonia' ); break;
      case '2': $result['resp4'] = array( 'desc' => 'Ceremonia', 'inicial' => 'O', 'texto' => 'Solo sala' ); break;
      case '3': $result['resp4'] = array( 'desc' => 'Ceremonia', 'inicial' => 'C', 'texto' => 'Ceremonia civil' ); break;
      case '4': $result['resp4'] = array( 'desc' => 'Ceremonia', 'inicial' => 'R', 'texto' => 'Ceremonia religiosa' ); break;
    }
    return $result;
  }

  /**
  * Filtro indeseados
  */
  public function wpfunosServiciosv2Indeseados( $email, $tel ){
    if (  "luisa_stfost87@hotmail.com" == $email || "652552825" == $tel ){
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Entrada no deseada' );
      $result['type'] = "unwanted";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }
  }

}
