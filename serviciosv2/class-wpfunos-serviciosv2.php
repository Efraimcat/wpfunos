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
    add_shortcode( 'wpfunos-serviciosv2-precio-zona-desktop', array( $this, 'wpfunosServiciosv2PrecioZonaDesktopShortcode' ));
    add_shortcode( 'wpfunos-serviciosv2-precio-zona-movil', array( $this, 'wpfunosServiciosv2PrecioZonaMovilShortcode' ));
    add_shortcode( 'wpfunos-nuevos-datos-distancia', array( $this, 'wpfunosServiciosDatosDistanciaShortcode' ));
    add_shortcode( 'wpfunos-serviciosv2-ventana-distancia', array( $this, 'wpfunosServiciosVentanaDistanciaShortcode' ));
    add_shortcode( 'wpfunos-nuevos-datos-resultados-desktop', array( $this, 'wpfunosServiciosDatosResultadosDesktopShortcode' ));
    add_shortcode( 'wpfunos-nuevos-datos-resultados-movil', array( $this, 'wpfunosServiciosDatosResultadosMovilShortcode' ));
    add_shortcode( 'wpfunos-resultadosv2-imagenes', array( $this, 'wpfunosResultadosV2ImagesShortcode' ));

    add_action( 'wpfunos_resultv2_grid_confirmado', array( $this, 'wpfunosResultV2GridConfirmado' ), 10, 2 );
    add_action( 'wpfunos_resultv2_grid_sinconfirmar', array( $this, 'wpfunosResulV2tGridSinConfirmar' ), 10, 2 );
    add_action( 'wpfunos_resultv2_blur_confirmado', array( $this, 'wpfunosResultV2BlurConfirmado' ), 10, 2 );
    add_action( 'wpfunos_resultv2_blur_sinconfirmar', array( $this, 'wpfunosResulV2tBlurSinConfirmar' ), 10, 2 );

    add_action('wp_ajax_nopriv_wpfunos_ajax_serviciosv2_transients', function () { $this->wpfunosServiciosv2Transients();});
    add_action('wp_ajax_wpfunos_ajax_serviciosv2_transients', function () {$this->wpfunosServiciosv2Transients();});
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
    //
    // COMENTAR para editar la página de ELEMENTOR
    //
    if( ! isset($_GET['cf']['resp1']) || ! isset($_GET['lat']) )exit();

    // Excepción provincia
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
    //  End excepción provincia

    // crear variables
    if( !isset($_GET['cuando']) || $_GET['cuando'] == 'dummy' ) $_GET['cuando'] = 'Ahora';
    $_GET['poblacion'] = $_GET['address'][0];
    //wpf-resultados-cabecera-cuando
    $nonce = wp_create_nonce("wpfunos_serviciosv2_nonce".apply_filters('wpfunos_userIP','dummy'));
    mt_srand(time());
    $newref = 'funos-'.(string)mt_rand();
    $_GET['AttsInicio'] = 'wpfn|' . $nonce . '
    wpfip|' . apply_filters('wpfunos_userIP','dummy'). '
    wpfnewref|' . $newref.'
    wpfcount|dummy
    wpfmejorprecio|dummy' ;
    // End crear variables

    // Comprobar cookies
    $expiry = strtotime('+1 month');
    if (is_user_logged_in()){
      $current_user = wp_get_current_user();
      if( ! isset( $_COOKIE['wpfn'] ) ) setcookie('wpfn', sanitize_text_field( $current_user->display_name ), ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      if( ! isset( $_COOKIE['wpfe'] ) ) setcookie('wpfe', sanitize_text_field( $current_user->user_email ), ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      if( ! isset( $_COOKIE['wpft'] ) ) setcookie('wpft', sanitize_text_field( str_replace(" ","",get_user_meta( $current_user->ID, 'wpfunos_telefono' , true ))), ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      $_GET['usuario_telefono'] = str_replace(" ","",get_user_meta( $current_user->ID, 'wpfunos_telefono' , true ));
      $_GET['Email'] = $current_user->user_email;
      $_GET['nombreUsuario'] = $current_user->display_name;
    }else{
      if( ! isset( $_COOKIE['wpfn'] ) ) setcookie('wpfn', '', ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      if( ! isset( $_COOKIE['wpfe'] ) ) setcookie('wpfe', '', ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      if( ! isset( $_COOKIE['wpft'] ) ) setcookie('wpft', '', ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
      $_GET['usuario_telefono'] = $_COOKIE['wpft'];
      $_GET['Email'] = $_COOKIE['wpfe'];
      $_GET['nombreUsuario'] = $_COOKIE['wpfn'];
    }
    // End Comprobar cookies

    // Preaprar plantillas Elementor
    ElementorPro\Modules\Popup\Module::add_popup_to_location( '56688' ); //Ventana Popup Esperando
    ElementorPro\Modules\Popup\Module::add_popup_to_location( '63359' ); //Compara precios filtros
    ElementorPro\Modules\Popup\Module::add_popup_to_location( '56948' ); //Servicios formulario datos
    // End Preaprar plantillas Elementor

    //https://funos.es/compara-nuevos-datos?address[]=Barcelona&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=41.387397&lng=2.168568&form=7&action=fs&CP=08002&wpfref=dummy&orden=dist&dest=incineracion&wpfvision=dummy
    //https://funos.es/compara-nuevos-datos?address%5B%5D=Madrid&post%5B%5D=precio_serv_wpfunos&cf%5Bresp1%5D=2&cf%5Bresp2%5D=2&cf%5Bresp3%5D=2&cf%5Bresp4%5D=2&distance=20&units=metric&paged=1&per_page=50&lat=40.416775&lng=-3.703790&form=7&action=fs&CP=28001&wpfref=funos-2133051814&orden=dist&dest=incineracion&wpfvision=clear&wpftipo=Detalles&wpftipoid=49294&wpfwpf=QWxCa3ZmTmlUQmllazFCb2NJRnloSy9Mcjg0OXRRTHhuQ3NDc3puenZsTT0=

    // comprobar veracidad de wpfwpf
    // No tiene wpfwpf
    if( !isset( $_GET['wpfwpf'] ) ) {

      ?><script>console.log('Verificaciones entrada: NO tiene código wpf' );</script><?php
      $_GET['wpfvision'] = 'dummy';
      $this->wpftransients( 'inicio', $newref );

    }else{

      ?><script>console.log('Verificaciones entrada: SI tiene código wpf' );</script><?php
      $wpfwpf = apply_filters( 'wpfunos_crypt', $_GET['wpfwpf'], 'd' );
      $IDusuario = apply_filters('wpfunos_userID', $wpfwpf );

      if( $IDusuario == 0 && !apply_filters('wpfunos_reserved_email','dummy') ){

        ?><script>console.log('Verificaciones entrada: SI tiene código wpf: Codigo wpf INCORRECTO');</script><?php
        $_GET['wpfvision'] = 'dummy';
        $this->wpftransients( 'inicio', $newref );

      }else{

        ?><script>console.log('Verificaciones entrada: SI tiene código wpf: Codigo wpf CORRECTO');</script><?php
        $_GET['wpfvision'] = 'clear';
        $this->wpftransients( 'entradadatos', $newref );

      }

    }
    ?><script>console.log('Verificaciones entrada: Finalizada: wpfvision: <?php  echo $_GET['wpfvision']; ?>'   );</script><?php
    //
    // End comprobar veracidad de wpfwpf

    // Multiform
    if( ! isset( $_GET['dest'] ) || $_GET['dest'] == 'dummy' ){
      // wpfunos-multistep-ahora - wpfunos-multistep-prox - wpfunos-multistep-sigcuando
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '72904' ); //Popup multiform cuando
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '71587' ); //Popup multiform destino

      // Funcionalidad preguntar cuando y destino
      require 'js/wpfunos-serviciosv2-multistep-cuando.min.js';
      // Funcionalidad preguntar solo destino
      //require 'js/wpfunos-serviciosv2-multistep-form.min.js';
    }
    // End Multiform

    //  Personalizar y dar color a los botones del buscador
    require 'js/wpfunos-serviciosv2-buscador.min.js';

  }

  public function wpfunosServiciosv2PrecioZonaDesktopShortcode($atts, $content = ""){
    if ( ! wp_is_mobile() ) $this->wpfunosServiciosv2PrecioZona();
  }
  public function wpfunosServiciosv2PrecioZonaMovilShortcode($atts, $content = ""){
    if ( wp_is_mobile() ) $this->wpfunosServiciosv2PrecioZona();
  }
  /**
  * Shortcode [wpfunos-serviciosv2-precio-zona-desktop] - [wpfunos-serviciosv2-precio-zona-movil]
  */
  public function wpfunosServiciosv2PrecioZona(){
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
  * Shortcode [wpfunos-nuevos-datos-distancia] **cambiar precio -distancia**
  *  // https://www.digitalocean.com/community/tools/minify
  */
  public function wpfunosServiciosDatosDistanciaShortcode($atts, $content = ""){
    require 'js/wpfunos-serviciosv2-datos-distancia.min.js';
  }

  /**
  * Shortcode [wpfunos-serviciosv2-ventana-distancia]
  */
  public function wpfunosServiciosVentanaDistanciaShortcode($atts, $content = ""){
    require 'js/wpfunos-serviciosv2-ventana-distancia.min.js';
  }

  /**
  * Shortcode [wpfunos-nuevos-datos-resultados-desktop] - [wpfunos-nuevos-datos-resultados-movil]
  *
  * 1. - Entrada comparador servicios v2
  * 2. - Entrada página resultados v2
  * 3. - Entrada formulario datos personales v2
  * 4. - Entrada sin formulario datos personales v2
  * 5. - Recogida datos usuario v2
  * 6. - Página resultados v2
  *
  *if ( $_GET['wpfunos-vision'] == 'clear' )
  *
  *$nonce = wp_create_nonce("wpfunos_serviciosv2_nonce".apply_filters('wpfunos_userIP','dummy'));
  *wpf-resultados-cabecera-cuando wpfn="0180e110a5", wpfip="80.26.158.67"
  */
  public function wpfunosServiciosDatosResultadosDesktopShortcode($atts, $content = ""){
    if ( ! wp_is_mobile() ) $this->wpfunosServiciosDatosResultados();
  }
  public function wpfunosServiciosDatosResultadosMovilShortcode($atts, $content = ""){
    if ( wp_is_mobile() ) $this->wpfunosServiciosDatosResultados();
  }
  public function wpfunosServiciosDatosResultados(){
    $ipaddress = apply_filters('wpfunos_userIP','dummy');
    //
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '2. - Entrada página resultados v2' );
    do_action('wpfunos_log', 'wpfref: ' . $this->wpftransients( 'datos', 'dummy', 'wpfref' ) );
    do_action('wpfunos_log', 'acción: ' . $this->wpftransients( 'datos', 'dummy', 'wpfact' ) );
    do_action('wpfunos_log', 'vision: ' . $this->wpftransients( 'datos', 'dummy', 'wpfvision' ) );
    do_action('wpfunos_log', 'dirección: ' . $_GET['poblacion']);
    do_action('wpfunos_log', 'orden: ' . $_GET['orden']);
    do_action('wpfunos_log', 'distancia: ' . $_GET['distance']);
    do_action('wpfunos_log', 'resp1: ' . $_GET['cf']['resp1']);
    do_action('wpfunos_log', 'resp2: ' . $_GET['cf']['resp2']);
    do_action('wpfunos_log', 'resp3: ' . $_GET['cf']['resp3']);
    do_action('wpfunos_log', 'resp4: ' . $_GET['cf']['resp4']);
    do_action('wpfunos_log', 'IP: ' . $ipaddress);
    do_action('wpfunos_log', 'wpfe: ' . $_COOKIE['wpfe']);
    do_action('wpfunos_log', 'wpfn: ' . $_COOKIE['wpfn']);
    do_action('wpfunos_log', 'wpft: ' . $_COOKIE['wpft']);

    // Actualizar datos 'wpf-resultados-cabecera-referencia'
    require 'js/wpfunos-serviciosv2-actualizar-atributos.min.js';

    // Llamar plantilla resultados
    ?><script>console.log('Llegada a formulario resultados.');</script><?php
    echo do_shortcode( '[gmw_ajax_form search_results="7"]' );

    // Mostrar resultados según tengamos los datos del usuario o no.
    if ( $_GET['wpfvision'] == 'clear' ){
      require 'js/wpfunos-serviciosv2-botones.min.js';
    }else{
      require 'js/wpfunos-serviciosv2-botones-blur.min.js';
    }

  }

  /**
  * Shortcode [wpfunos-resultadosv2-imagenes imagen="logo"]
  *
  * Mostrar imágenes en la ficha de resultado
  */
  public function wpfunosResultadosV2ImagesShortcode( $atts, $content = "" ) {
    $a = shortcode_atts( array(
      'imagen'=>'',
    ), $atts );
    switch ( $a['imagen'] ) {
      case 'logo': echo $_GET['valor-logo'] ; break;
      case 'promo': echo $_GET['valor-imagen-promo'] ; break;
      case 'echo': echo $_GET['valor-logo-eco'] ; break;
      case 'confirmado': echo $_GET['valor-logo-confirmado'] ; break;
    }
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

  public function wpfunosResulV2Values( $value ){
    $_GET['botonLlamen'] = 'wpfLlamen'. $value[0];
    $_GET['botonLlamar'] = 'wpfLlamar'. $value[0];
    $_GET['botonDetalles'] = 'wpfDetalles'. $value[0];
    $_GET['seccionID-llamadas'] = 'wpf-llamadas-'. $value[0];
    $_GET['seccionID-presupuesto'] = 'wpf-presupuesto-'. $value[0];
    $_GET['seccionID-detalles'] = 'wpf-detalles-'. $value[0];
    $_GET['seccionID-mapas'] = 'wpf-mapas-'. $value[0];
    $_GET['seccionID-eco'] = 'wpf-eco-'. $value[0];
    $_GET['seccionID-precio'] = 'wpf-precio-'. $value[0];
    $_GET['seccionClass-presupuesto'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
    $_GET['seccionClass-llamadas'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';
    $_GET['valor-logo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioLogo', true ) ,'full' );
    $_GET['valor-imagen-promo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioImagenPromo', true ) ,'full' );
    $_GET['valor-logo-eco'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenEcologico', true ) , array(60,60));
    $_GET['valor-nombre'] = get_post_meta( $value[0], 'wpfunos_servicioNombre', true );
    $_GET['valor-nombrepack'] = get_post_meta( $value[0], 'wpfunos_servicioPackNombre', true );
    $_GET['valor-valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
    $_GET['valor-precio'] = number_format($value[2], 0, ',', '.') . '€';
    $_GET['valor-textoprecio'] = get_post_meta( $value[0], 'wpfunos_servicioTextoPrecio', true );
    $_GET['valor-direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );
    $_GET['valor-distancia'] = $value[3] ;
  }

  public function wpfunosResultV2GridConfirmado( $wpfunos_confirmado ){
    if(is_array($wpfunos_confirmado) && count( $wpfunos_confirmado ) != 0 ){
      ?><div class="wpfunos-titulo"><p></p><center><h2>Precio confirmado</h2></center></div><?php
      if(isset($_GET['orden']) && $_GET['orden'] == 'precios' ){
        $columns = array_column( $wpfunos_confirmado, 2 );
        array_multisort( $columns, SORT_ASC, $wpfunos_confirmado );
      }
      $nonce = wp_create_nonce("wpfunos_serviciosv2_nonce".apply_filters('wpfunos_userIP','dummy'));
      foreach ($wpfunos_confirmado as $value) {
        foreach ($wpfunos_confirmado as $value) {
          $_GET['AttsServicio'] = 'wpfid|' . $value[0].'
          wpfn|' . $nonce .'
          wpfp|' . $value[2] ;

          $this->wpfunosResulV2Values( $value );
          $_GET['seccionClass-detalles'] = 'wpf-detalles-si';
          $_GET['seccionClass-mapas'] = 'wpf-mapas-si';
          $_GET['valor-logo-confirmado'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenConfirmado', true ) , array(45,46));
          $_GET['valor-textoconfirmado'] = 'Precio confirmado';
          $_GET['valor-servicio'] = $respuesta['resp1']['texto']. ', ' .$respuesta['resp2']['texto']. ', ' .$respuesta['resp3']['texto']. ', ' .$respuesta['resp4']['texto'];
          ?><div class="wpfunos-busqueda-contenedor"><?php
          echo do_shortcode( '[elementor-template id="58463"]' ) ;
          ?></div><?php

        }
      }
    }
  }

  public function wpfunosResulV2tGridSinConfirmar( $wpfunos_sinconfirmar ){
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

        $this->wpfunosResulV2Values( $value );
        $_GET['seccionClass-detalles'] = 'wpf-detalles-no';
        $_GET['seccionClass-mapas'] = 'wpf-mapas-no';
        $_GET['valor-logo-confirmado'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenNoConfirmado', true ) , array(45,46));
        $_GET['valor-textoconfirmado'] = 'Precio sin confirmar';
        $_GET['valor-servicio'] = $respuesta['resp1']['texto']. ', ' .$respuesta['resp2']['texto']. ', ' .$respuesta['resp3']['texto']. ', ' .$respuesta['resp4']['texto'];
        ?><div class="wpfunos-busqueda-contenedor"><?php
        echo do_shortcode( '[elementor-template id="58463"]' ) ;
        ?></div><?php
      }
    }
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

          $_GET['AttsServicioLlamar'] = 'wpfid|' . $value[0].'
          wpfn|' . $nonce .'
          wpfp|' . $value[2]. '
          wpftipo|Llamar' ;

          $_GET['AttsServicioLlamen'] = 'wpfid|' . $value[0].'
          wpfn|' . $nonce .'
          wpfp|' . $value[2]. '
          wpftipo|Llamen' ;

          $_GET['AttsServicioDetalles'] = 'wpfid|' . $value[0].'
          wpfn|' . $nonce .'
          wpfp|' . $value[2]. '
          wpftipo|Detalles' ;

          $this->wpfunosResulV2Values( $value );
          $_GET['seccionClass-detalles'] = 'wpf-detalles-si';
          $_GET['seccionClass-mapas'] = 'wpf-mapas-si';
          $_GET['valor-logo-confirmado'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenConfirmado', true ) , array(45,46));
          $_GET['valor-textoconfirmado'] = 'Precio confirmado';
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

        $_GET['AttsServicioLlamar'] = 'wpfid|' . $value[0].'
        wpfn|' . $nonce .'
        wpfp|' . $value[2]. '
        wpftipo|Llamar' ;

        $_GET['AttsServicioLlamen'] = 'wpfid|' . $value[0].'
        wpfn|' . $nonce .'
        wpfp|' . $value[2]. '
        wpftipo|Llamen' ;

        $_GET['AttsServicioDetalles'] = 'wpfid|' . $value[0].'
        wpfn|' . $nonce .'
        wpfp|' . $value[2]. '
        wpftipo|Detalles' ;

        $this->wpfunosResulV2Values( $value );
        $_GET['seccionClass-detalles'] = 'wpf-detalles-no';
        $_GET['seccionClass-mapas'] = 'wpf-mapas-no';
        $_GET['valor-logo-confirmado'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenNoConfirmado', true ) , array(45,46));
        $_GET['valor-textoconfirmado'] = 'Precio sin confirmar';
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
  * 2 - 'check'
  *
  * return $valor o false si no existe y accion != 'inicio'
  *
  * if ( $_GET['wpfref'] == 'dummy' ) $this->wpftransients( 'inicio', $newref );
  *
  * a:14:{s:6:"wpfref";s:16:"funos-1420558983";s:6:"wpfact";s:6:"inicio";s:5:"wpfip";s:14:"89.238.176.174";s:4:"wpfn";s:5:"dummy";s:4:"wpfe";s:5:"dummy";s:4:"wpft";s:5:"dummy";
  * s:6:"wpfadr";s:9:"Barcelona";s:7:"wpfdist";s:2:"20";s:6:"wpflat";s:9:"41.387397";s:6:"wpflng";s:8:"2.168568";s:8:"wpfresp1";s:1:"2";s:8:"wpfresp2";s:1:"2";s:8:"wpfresp3";s:1:"2";s:8:"wpfresp4";s:1:"2";}
  */
  public function wpftransients( $action, $newref = 'dummy', $valor = 'dummy' ){
    //do_action('wpfunos_log', '==============' );
    //do_action('wpfunos_log', 'transient IP: ' .apply_filters('wpfunos_userIP','dummy'));
    //do_action('wpfunos_log', 'transient action: ' .$action);
    //do_action('wpfunos_log', 'transient newref: ' .$newref);
    //do_action('wpfunos_log', 'transient valor: ' .$valor);

    $transient = get_transient('wpfunos-wpfref-' .apply_filters('wpfunos_userIP','dummy') );

    // Si no es la acción de inicio y el transient no existe devuelve FALSE
    if( $action != 'inicio' && $action != 'entadadatos' ){
      if( $transient === false ) return false;
    }

    // Si la accióx es check devuelve TRUE por que el transient EXISTE
    if ( $action == 'check' ){
      return true;
    }

    //  Si la acción es 'datos', devuelve el dato pedido
    if( $action == 'datos' ) return $transient[$valor];

    //https://funos.es/compara-nuevos-datos?address%5B%5D=Barcelona&post%5B%5D=precio_serv_wpfunos&cf%5Bresp1%5D=2&cf%5Bresp2%5D=2&cf%5Bresp3%5D=2&cf%5Bresp4%5D=2&distance=20
    //&units=metric&paged=1&per_page=50&lat=41.387397&lng=2.168568&form=7&action=fs&CP=08002&wpfref=funos-457537623&orden=dist&dest=incineracion&wpfvision=clear&wpftipo=Detalles&wpftipoid=15979

    // Si la acción es 'entradadatos' crea un nuevo transient o modifica el existente
    if( $action == 'entradadatos' ){

      $transient_data = array(
        'wpfref' => $newref,
        'wpfact' => 'datos',
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
        'wpforden' => $_GET['orden'],
        'wpfdest' => $_GET['dest'],
        'wpfvision' => 'clear',
        'wpfcp' => $_GET['CP'],
        'wpfcuando' => $_GET['cuando'],
        'wpfurl' => 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
        'wpftipo'=> $_GET['wpftipo'],
        'wpftipoid' => $_GET['wpftipoid'],
        'wpfwpf' => $_GET['wpfwpf'],
      );

      $transient_id = set_transient( 'wpfunos-wpfref-' .apply_filters('wpfunos_userIP','dummy'), $transient_data, HOUR_IN_SECONDS );
      //do_action('wpfunos_log', 'Create new transient: ' .$transient_id );
      return $transient_id;
    }

    // Si la acción es 'inicio' crea un nuevo transient o modifica el existente
    if( $action == 'inicio' ){

      //  SI ya existe un transient y es de un 'inicio', conserva la referencia
      if( $transient && $transient['wpfact'] == 'inicio' ) $newref = $transient['wpfref'];

      //Si todavia no tenemos el CP, lo calculamos
      $CP = $this->wpfunosCodigoPostal( $_GET['CP'], $_GET['address'][0] );

      $transient_data = array(
        'wpfref' => $newref,
        'wpfact' => 'inicio',
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
        'wpforden' => $_GET['orden'],
        'wpfdest' => $_GET['dest'],
        'wpfvision' => $_GET['wpfvision'],
        'wpfcp' => $CP,
        'wpfcuando' => $_GET['cuando'],
        'wpfurl' => 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],

      );

      $transient_id = set_transient( 'wpfunos-wpfref-' .apply_filters('wpfunos_userIP','dummy'), $transient_data, HOUR_IN_SECONDS );
      //do_action('wpfunos_log', 'Create new transient: ' .$transient_id );
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
  * contador de entradas datos
  * $contador = $this->wpfunosServiciosv2ContadorEntradas( $IP, '0' )
  */
  public function wpfunosServiciosv2ContadorEntradas( $IP, $accion ){
    $args = array(
      'post_status' => 'publish',
      'post_type' => 'usuarios_wpfunos',
      'posts_per_page' => -1,
      'meta_query' => array(
        'relation' => 'AND',
        array( 'key' => 'wpfunos_userIP', 'value' => $IP, 'compare' => '=', ),
        array( 'key' => 'wpfunos_userAccion', 'value' => $accion, 'compare' => '=', ),
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
    return $contador;
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

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/

  /**
  * Botón Enviar datos
  */
  public function wpfunosServiciosv2EntradaDatos(){
    $wpfnombre = $_POST['wpfnombre'];
    $wpfemail = $_POST['wpfemail'];
    $wpftelefono = $_POST['wpftelefono'];
    $wpfurl = $_POST['wpfurl'];
    $wpnonce = $_POST['wpnonce'];
    $IP = apply_filters('wpfunos_userIP','dummy');

    $transient = get_transient('wpfunos-wpfref-' .apply_filters('wpfunos_userIP','dummy') );
    if( $transient === false ){
      $result['type'] = "No transient";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio Boton Enviar Datos' );
    do_action('wpfunos_log', 'Ajax: wpfnombre ' .$wpfnombre );
    do_action('wpfunos_log', 'Ajax: wpfemail ' .$wpfemail );
    do_action('wpfunos_log', 'Ajax: wpftelefono ' .$wpftelefono );

    $this->wpfunosServiciosv2Indeseados( $wpfemail, $wpftelefono );

    $wpfwpf = apply_filters( 'wpfunos_crypt', $transient['wpfref'] , 'e' );

    $URL = 'https://funos.es/compara-nuevos-datos?' .$wpfurl. '&wpfwpf=' .$wpfwpf ;

    if( ! apply_filters('wpfunos_reserved_email','dummy') ){
      $userURL = apply_filters('wpfunos_shortener', $URL );

      do_action('wpfunos_update phone',$wpftelefono);
      $tel =  substr($wpftelefono,0,3).' '. substr($wpftelefono,3,2).' '. substr($wpftelefono,5,2).' '. substr($wpftelefono,7,2);

      $contador = $this->wpfunosServiciosv2ContadorEntradas( $IP, '0' );

      switch ( $this->wpftransients( 'datos', 'dummy', 'wpfresp1' ) ) { case '1': $servicio = 'Entierro'; break; case '2': $servicio = 'Incineración'; break; }
      switch ( $this->wpftransients( 'datos', 'dummy', 'wpfresp2' ) ) { case '2': $ataud = 'Ataúd Económico'; break; case '1': $ataud = 'Ataúd Medio'; break; case '3': $ataud = 'Ataúd Premium'; break; }
      switch ( $this->wpftransients( 'datos', 'dummy', 'wpfresp3' ) ) { case '1': $velatorio = 'Velatorio'; break; case '2': $velatorio = 'Sin Velatorio'; break; }
      switch ( $this->wpftransients( 'datos', 'dummy', 'wpfresp4' ) ) { case '1': $ceremonia = 'Sin ceremonia'; break; case '2': $ceremonia = 'Solo sala'; break; case '3': $ceremonia = 'Ceremonia civil'; break; case '4': $ceremonia = 'Ceremonia religiosa'; break; }

      $my_post = array(
        'post_title' => $transient['wpfref'],
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => sanitize_text_field( $wpfemail ),
          'wpfunos_userReferencia' => sanitize_text_field( $transient['wpfref'] ),
          'wpfunos_userName' => sanitize_text_field( $wpfnombre ),
          'wpfunos_userPhone' => sanitize_text_field( $tel ),
          'wpfunos_userCP' => sanitize_text_field( $transient['wpfcp'] ),
          'wpfunos_userAccion' => '0',
          'wpfunos_userNombreAccion' => sanitize_text_field( 'Entrada datos servicios' ),
          'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( $transient['wpfadr'] ),
          'wpfunos_userNombreSeleccionDistancia' => sanitize_text_field( $transient['wpfdist'] ),
          'wpfunos_userNombreSeleccionServicio' => sanitize_text_field( $servicio ),
          'wpfunos_userNombreSeleccionAtaud' => sanitize_text_field( $ataud ),
          'wpfunos_userNombreSeleccionVelatorio' => sanitize_text_field( $velatorio ),
          'wpfunos_userNombreSeleccionDespedida' => sanitize_text_field( $ceremonia ),
          'wpfunos_userIP' => sanitize_text_field( $IP ),
          'wpfunos_userURL' => sanitize_text_field( $userURL ),
          'wpfunos_userAceptaPolitica' => '1',
          'wpfunos_userLAT' => sanitize_text_field( $transient['wpflat'] ),
          'wpfunos_userLNG' => sanitize_text_field( $transient['wpflng'] ),
          'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
          'wpfunos_userVisitas' => $contador,
          'wpfunos_userLead' => true,
          'wpfunos_Dummy' => true,
        ),
      );

      $post_id = wp_insert_post($my_post);

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '5. - Recogida datos usuario v2' );
      do_action('wpfunos_log', 'userIP: ' . $IP );
      do_action('wpfunos_log', 'Nombre: ' .  $wpfnombre );
      do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
      do_action('wpfunos_log', 'referencia: ' . $transient['wpfref'] );
      do_action('wpfunos_log', 'Telefono: ' . $tel );

      if( get_option('wpfunos_activarCorreov2Admin') ){
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreov2Admin'), get_option('wpfunos_asuntoCorreov2Admin') );
        $mensaje = str_replace( '[email]' , $wpfemail , $mensaje );
        $mensaje = str_replace( '[referencia]' , $transient['wpfref'] , $mensaje );
        $mensaje = str_replace( '[IP]' , $IP , $mensaje );
        $mensaje = str_replace( '[URL]' , $userURL , $mensaje );
        $mensaje = str_replace( '[nombre]' , $wpfnombre , $mensaje );
        $mensaje = str_replace( '[telefono]' , $tel , $mensaje );
        $mensaje = str_replace( '[poblacion]' , $transient['wpfadr'] , $mensaje );
        $mensaje = str_replace( '[distancia]' , $transient['wpfdist'] , $mensaje );
        $mensaje = str_replace( '[CP]' , $transient['wpfcp'] , $mensaje );
        $mensaje = str_replace( '[destino]' , $servicio , $mensaje );
        $mensaje = str_replace( '[ataud]' , $ataud , $mensaje );
        $mensaje = str_replace( '[velatorio]' , $velatorio , $mensaje );
        $mensaje = str_replace( '[ceremonia]' , $ceremonia , $mensaje );
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
              do_action('wpfunos_log', 'Enviar correo entrada datos al servicio v2' );
              do_action('wpfunos_log', 'referencia: ' . $transient['wpfref'] );
              do_action('wpfunos_log', 'userIP: ' . $IP );
              do_action('wpfunos_log', '$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
              do_action('wpfunos_log', 'servicioEmail: ' . get_post_meta( $post->ID, 'wpfunos_servicioEmail', true ) );
            }
          endforeach;
          wp_reset_postdata();
        }

        if( strlen( get_option('wpfunos_mailCorreov2Admin') ) > 0 ){
          wp_mail ( get_option('wpfunos_mailCorreov2Admin'), get_option('wpfunos_asuntoCorreov2Admin') , $mensaje, $headers );
          do_action('wpfunos_log', '==============' );
          do_action('wpfunos_log', 'Enviar correo entrada datos al admin v2' );
          do_action('wpfunos_log', 'referencia: ' . $transient['wpfref'] );
          do_action('wpfunos_log', 'userIP: ' . $IP );
          do_action('wpfunos_log', '$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
          do_action('wpfunos_log', 'mailCorreov2Admin: ' . get_option('wpfunos_mailCorreov2Admin') );
        }

      }

    }

    $transient['wpfact'] = 'datos';
    $transient['wpfvision'] = 'clear';
    $transient['wpfurl'] = $URL;
    $transient['wpfwpf'] = $wpfwpf;
    set_transient( 'wpfunos-wpfref-' .apply_filters('wpfunos_userIP','dummy'), $transient, HOUR_IN_SECONDS );

    $result['type'] = "success";
    $result['transient'] = $transient;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/

  /**
  * Transients
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_serviciosv2_transients', function () { $this->wpfunosServiciosv2Transients();});
  * add_action('wp_ajax_wpfunos_ajax_serviciosv2_transients', function () {$this->wpfunosServiciosv2Transients();});
  *
  *       $nonce = wp_create_nonce("wpfunos_serviciosv2_nonce".apply_filters('wpfunos_userIP','dummy'));
  *
  *        "action": "wpfunos_ajax_serviciosv2_transients",
  *        "wpfn": document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfn"),
  *        "wpfip": document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfip"),
  */
  public function wpfunosServiciosv2Transients(){
    $transient = get_transient('wpfunos-wpfref-' .apply_filters('wpfunos_userIP','dummy') );

    if( $transient === false ){
      $result['type'] = "No transient";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    if ( !wp_verify_nonce( $_POST['wpfn'], "wpfunos_serviciosv2_nonce".$_POST['wpfip'] ) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    //
    //  devolvemos contenido de transient
    //
    $result['type'] = "success";
    $result['wpfref'] = $transient['wpfref'];
    $result['wpfact'] = $transient['wpfact'];
    $result['wpfip'] = $transient['wpfip'];
    $result['wpfn'] = $transient['wpfn'];
    $result['wpfe'] = $transient['wpfe'];
    $result['wpft'] = $transient['wpft'];
    $result['wpfadr'] = $transient['wpfadr'];
    $result['wpfdist'] = $transient['wpfdist'];
    $result['wpflat'] = $transient['wpflat'];
    $result['wpflng'] = $transient['wpflng'];
    $result['wpfresp1'] = $transient['wpfresp1'];
    $result['wpfresp2'] = $transient['wpfresp2'];
    $result['wpfresp3'] = $transient['wpfresp3'];
    $result['wpfresp4'] = $transient['wpfresp4'];
    $result['wpforden'] = $transient['wpforden'];
    $result['wpfdest'] = $transient['wpfdest'];
    $result['wpfcp'] = $transient['wpfcp'];
    $result['wpfurl'] = $transient['wpfurl'];
    $result['wpfvision'] = $transient['wpfvision'];
    $result['wpftipo'] = $transient['wpftipo'];
    $result['wpftipoid'] = $transient['wpftipoid'];
    $result['wpfwpf'] = $transient['wpfwpf'];
    $result['wpfcuando'] = $transient['wpfcuando'];

    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

}
