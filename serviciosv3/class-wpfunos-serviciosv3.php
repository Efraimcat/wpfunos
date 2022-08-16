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
* @subpackage Wpfunos/serviciosv3
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
class Wpfunos_ServiciosV3 {
  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;

    add_shortcode( 'wpfunos-v3-ubicacion', array( $this, 'wpfunosV3UbicacionShortcode' ));
    add_shortcode( 'wpfunos-v3-ultima-busqueda', array( $this, 'wpfunosV3UltimaBusquedaShortcode' ));
    add_shortcode( 'wpfunos-v3-last-url', array( $this, 'wpfunosV3LastUrlShortcode' ));
    add_shortcode( 'wpfunos-v3-resultados', array( $this, 'wpfunosV3ResultadosShortcode' ));
    add_shortcode( 'wpfunos-v3-columna-central', array( $this, 'wpfunosV3ColumnaCentralShortcode' ));
    add_shortcode( 'wpfunos-v3-columna-derecha', array( $this, 'wpfunosV3ColumnaDerechaShortcode' ));
    add_shortcode( 'wpfunos-v3-imagenes', array( $this, 'wpfunosV3ImagesShortcode' ));


    add_action( 'wpfunos_v3_crear_trans_resultados', array( $this, 'wpfunosResultV3Save' ), 10, 2 );
    add_action( 'wpfunos_v3_confirmado_dummy', array( $this, 'wpfunosResultV3ConfirmadoDummy' ), 10, 2 );
    add_action( 'wpfunos_v3_sinconfirmar_dummy', array( $this, 'wpfunosResultV3SinConfirmarDummy' ), 10, 2 );
    add_action( 'wpfunos_v3_confirmado', array( $this, 'wpfunosResultV3Confirmado' ), 10, 2 );
    add_action( 'wpfunos_v3_sinconfirmar', array( $this, 'wpfunosResultV3SinConfirmar' ), 10, 2 );

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

  }
  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-serviciosv3.css', array(), $this->version, 'all' );
  }
  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-serviciosv3.js', array( 'jquery' ), $this->version, false );
  }


  /*********************************/
  /*****  SHORTCODES          ******/
  /*********************************/

  /**
  * add_shortcode( 'wpfunos-v3-ubicacion', array( $this, 'wpfunosV3UbicacionShortcode' ));
  */
  public function wpfunosV3UbicacionShortcode($atts, $content = ""){
    ElementorPro\Modules\Popup\Module::add_popup_to_location( '84626' ); //Ventana Popup Esperando (loader1)

    $this->wpfunosEntradaUbicacion();
    echo do_shortcode( '[gmw_ajax_form search_form="8"]' );

  }

  /**
  * add_shortcode( 'wpfunos-v3-ultima-busqueda', array( $this, 'wpfunosV3UltimaBusquedaShortcode' ));
  */
  public function wpfunosV3UltimaBusquedaShortcode($atts, $content = ""){
    if( ! isset( $_COOKIE['wpflast'] ) ) return;
    $last = str_replace("+"," ",$_COOKIE['wpflasttime']);
    $_GET['wpflasttime'] = str_replace("-",":",$last);
    echo do_shortcode( '[elementor-template id="75197"]' );
    ?>
    <script type="text/javascript" id="wpfunos-serviciosv2-ultima-busqueda">
    $ = jQuery.noConflict();
    $(document).ready(function(){
      $(function(){
        document.getElementById("wpfunos-boton-busqueda-anterior").addEventListener('click', function() {
          elementorFrontend.documentsManager.documents['84626'].showModal(); //show the popup
        }, false);
      });
    });
    </script>
    <?php
  }


  /**
  * Shortcode [wpfunos-v3-last-url]
  *
  * Recuperar última busqueda
  */
  public function wpfunosV3LastUrlShortcode( $atts, $content = "" ) {
    $wpflasturl = apply_filters( 'wpfunos_crypt', $_COOKIE['wpflast'] , 'd' );
    return $wpflasturl;
  }

  /**
  * add_shortcode( 'wpfunos-v3-resultados', array( $this, 'wpfunosV3ResultadosShortcode' ));
  */
  public function wpfunosV3ResultadosShortcode($atts, $content = ""){
    if( count($_GET) > 0 ){

      //https://funos.es/comparar-precios-resultados?address[]=Barcelona&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=41.387397&lng=2.168568&form=8&action=fs&CP=undefined&orden=dist&land=1
      //https://funos.es/comparar-precios-resultados?address[]=Barcelona&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=41.387397&lng=2.168568&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&wpfwpf=a3Q0Uld1M0RxY1RSTjcrMStLT3VadzZsSm45RGpnRHhXSHM2elhTZlJrbz0=
      ?><script>console.log('Cargando popups Elementor.' );</script><?php

      ElementorPro\Modules\Popup\Module::add_popup_to_location( '47448' ); //Servicios Enviar Email
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '56672' ); //Servicio Detalles
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '56676' ); //Servicio Presupuesto
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '56680' ); //Servicios Llamar
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '56684' ); //Servicios Llamame
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '77005' ); //Ventana Popup Esperando (entrada datos GTM)
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '84639' ); //Ventana Popup Esperando (loader2)
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '89340' ); //Servicios Multistep (1)
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '89344' ); //Servicios Multistep (2)
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '89348' ); //Servicios Multistep (3)
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '89351' ); //Servicios Multistep (4)
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '89354' ); //Servicios Multistep (5)

      ?><script>console.log('Cargando popups Elementor END.' );</script><?php

      ?><script>console.log('Comprobando direcciones especiales.' );</script><?php

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
      if( (int)$nueva_lat != 0 && (int)$nueva_lng != 0 && $_GET['lat'] != $nueva_lat && $_GET['lng'] != $nueva_lng &&  !is_admin() ){
        ?>
        <script type="text/javascript" id="wpfunos-v3-excepcion-provincia">

        jQuery( document ).ready( function() { //wait for the page to load
          /* You can do more here, this will just show the popup on refresh of page, but hey this is JQuery so you can do more things here depending on your condition to trigger the popup */
          jQuery( window ).on( 'elementor/frontend/init', function() { //wait for elementor to load
            elementorFrontend.on( 'components:init', function() { //wait for elementor pro to load
              elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup Esperando (loader2)

              var params = new URLSearchParams(location.search);
              var lat = <?php  echo $nueva_lat; ?>;
              var lng = <?php  echo $nueva_lng; ?>;
              var distance = <?php  echo $nueva_distancia; ?>;
              params.set('lat', lat );
              params.set('lng', lng );
              params.set('distance', distance );
              window.location.search = params.toString();

            } );
          } );
        } );
        </script>
        <?php
        return;
      }
      // END Excepción provincia

      ?><script>console.log('Comprobando direcciones especiales END.' );</script><?php

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

      // comprobar veracidad de wpfwpf
      $Tienewpfwpf = 0;

      // No tiene wpfwpf
      if( !isset( $_GET['wpfwpf'] ) ) {

        ?><script>console.log('Verificaciones entrada: NO tiene código wpf' );</script><?php

      }else{

        $wpfwpf = apply_filters( 'wpfunos_crypt', $_GET['wpfwpf'], 'd' );
        $IDusuario = apply_filters('wpfunos_userID', $wpfwpf );

        ?><script>console.log('Verificaciones entrada: SI tiene código wpf: <?php  echo $wpfwpf; ?> => <?php  echo $IDusuario; ?>' );</script><?php

        if( apply_filters('wpfunos_reserved_email','dummy') ){  // usuario colaborador. Tomamos los datos de usuario de la entrada wpf

          ?><script>console.log('Verificaciones entrada: Colaborador');</script><?php
          $Tienewpfwpf = 1;

          if( $IDusuario == 0 ) {
            $nombre = $_COOKIE['wpfn'];
            $email = $_COOKIE['wpfe'];
            $phone = $_COOKIE['wpft'];
          }else{
            $nombre = get_post_meta( $IDusuario, 'wpfunos_userName', true );
            $email = get_post_meta( $IDusuario, 'wpfunos_userMail', true );
            $phone = get_post_meta( $IDusuario, 'wpfunos_userPhone', true );
          }

        }elseif( $IDusuario == 0 ) {  // tiene código pero no existe.

          ?><script>console.log('Verificaciones entrada: Codigo wpf INCORRECTO');</script><?php

        }else{  // es un usuario normal

          ?><script>console.log('Verificaciones entrada: Usuario');</script><?php

          if( $_COOKIE['wpfn'] != '' ) { // tenemos sus datos
            ?><script>console.log('Verificaciones entrada: Usuario con cookies');</script><?php
            $Tienewpfwpf = 1;

            $nombre = $_COOKIE['wpfn'];
            $email = $_COOKIE['wpfe'];
            $phone = $_COOKIE['wpfe'];

          }

        }

      }
      // END comprobar veracidad de wpfwpf

      ?><script>console.log('Verificaciones entrada: $Tienewpfwpf: <?php  echo $Tienewpfwpf; ?> ' );</script><?php

      //$_GET['poblacion'] = $_GET['address'][0];
      $IP = apply_filters('wpfunos_userIP','dummy');
      $nonce = wp_create_nonce("wpfunos_serviciosv3_nonce".$IP );

      mt_srand(time());
      $newref = 'funos-'.(string)mt_rand();
      $address = $_GET['address'][0];
      $cp = $_GET['CP'];
      $CP = $this->wpfunosCodigoPostal( $cp, $address );

      // id = wpf-resultados-referencia

      $_GET['AttsV3'] = 'wpfn|' .$nonce. '
      wpfip|' .$IP. '
      wpfnewref|' .$newref. '
      wpfcp|' .$CP. '
      wpfubic|' .$address.'
      wpfdist|' .$_GET['distance']. '
      wpflat|' .$_GET['lat']. '
      wpflng|' .$_GET['lng']. '
      wpfnombre|' .$nombre. '
      wpfemail|' .$email. '
      wpftelefono|' .substr($phone,0,3).' '. substr($phone,3,2).' '. substr($phone,5,2).' '. substr($phone,7,2). '
      wpfcuando|' .$_GET['cuando']. '
      wpfland|' .$_GET['land']. '
      wpfresp1|' .$_GET['cf']['resp1']. '
      wpfresp2|' .$_GET['cf']['resp2']. '
      wpfresp3|' .$_GET['cf']['resp3']. '
      wpfresp4|' .$_GET['cf']['resp4'] ;

      // Actualizar transient
      if( $Tienewpfwpf == 1 ){
        $transient_ref = get_transient('wpfunos-wpfref-' .$IP );
        ?><script>console.log('Transient búsqueda actualizar.' );</script><?php

        $transient_ref['wpfref'] = $wpfwpf;
        $transient_ref['wpfip'] = $IP;
        $transient_ref['wpfn'] = $nombre;
        $transient_ref['wpfe'] = $email;
        $transient_ref['wpft'] = substr($phone,0,3).' '. substr($phone,3,2).' '. substr($phone,5,2).' '. substr($phone,7,2);
        $transient_ref['wpfadr'] = $address;
        $transient_ref['wpfcp'] = $CP;
        $transient_ref['wpfdist'] = $_GET['distance'];
        $transient_ref['wpflat'] = $_GET['lat'];
        $transient_ref['wpflng'] = $_GET['lng'];
        $transient_ref['wpfresp1'] = $_GET['cf']['resp1'];
        $transient_ref['wpfresp2'] = $_GET['cf']['resp2'];
        $transient_ref['wpfresp3'] = $_GET['cf']['resp3'];
        $transient_ref['wpfresp4'] = $_GET['cf']['resp4'];
        $transient_ref['wpforden'] = $_GET['orden'];
        $transient_ref['wpfcuando'] = $_GET['cuando'];
        $transient_ref['wpfurl'] = home_url().$_SERVER['REQUEST_URI'];
        $transient_ref['wpfwpf'] = $_GET['wpfwpf'];
        $transient_ref['wpfland'] = (isset($_GET['land']) ) ? 1 : 0 ;

        set_transient( 'wpfunos-wpfref-v3-' .$IP, $transient_ref, DAY_IN_SECONDS );

        ?><script>console.log('Transient búsqueda actualizar END.' );</script><?php
      }
      // Actualizar transient END

      // No tiene entrada usuario
      if( !isset( $_GET['cuando'] ) || $Tienewpfwpf == 0 ){

        ?><script>console.log('Sin entrada de usuario.' );</script><?php

        $this->wpfunosEntradaResultados(); //registro entrada página resultados antes de entrar datos personales

        ?><script type="text/javascript">
        var checkExist = setInterval(function() {
          if (document.getElementById("wpf-resultados-referencia").hasAttribute("wpfemail") ) {
            console.log("Lanzar señal Multistep Form");
            clearInterval(checkExist);
            document.getElementById("wpf-resultados-referencia").setAttribute("wpfmultistep",'si');

          }
        }, 100); // check every 100ms
        </script><?php

        //if( !isset($_GET['land'])){
        //  require 'js/wpfunos-v3-multistep.js';
        //}else{
        //  require 'js/wpfunos-v3-multistep-land.js'; //viene de una landing. Solo preguntar cuando y datos personales.
        //}

      }
      // END No tiene entrada usuario

    } //END count($_GET) > 0

  }

  /*********************************/
  /*****  RESULTADOS          ******/
  /*********************************/
  /**
  * add_shortcode( 'wpfunos-v3-columna-central', array( $this, 'wpfunosV3ColumnaCentralShortcode' ));
  */
  public function wpfunosV3ColumnaCentralShortcode($atts, $content = ""){
    if( ! isset($_GET['cuando']) ) return;
    ?><script>console.log('Resultados.' );</script><?php
    echo do_shortcode( '[gmw_ajax_form search_results="8"]' );
    ?><script>console.log('Resultados END.' );</script><?php
  }

  /*********************************/
  /*****  PRECIOS ZONA        ******/
  /*********************************/
  /**
  * add_shortcode( 'wpfunos-v3-columna-derecha', array( $this, 'wpfunosV3ColumnaDerechaShortcode' ));
  */
  public function wpfunosV3ColumnaDerechaShortcode($atts, $content = ""){
    ?><script>console.log('Precio medio zona.' );</script><?php

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

    ?><script>console.log('Precio medio zona END.' );</script><?php
  }



  /*********************************/
  /*****  IMAGENES FICHA      ******/
  /*********************************/
  /**
  * add_shortcode( 'wpfunos-v3-imagenes', array( $this, 'wpfunosV3ImagesShortcode' ));
  */
  public function wpfunosV3ImagesShortcode( $atts, $content = "" ) {
    $a = shortcode_atts( array(
      'imagen'=>'',
    ), $atts );
    switch ( $a['imagen'] ) {
      case 'logo': echo $_GET['valor-logo'] ; break;
      case 'confirmado': echo $_GET['valor-logo-confirmado'] ; break;
    }
  }
  /*********************************/
  /*****  HOOKS               ******/
  /*********************************/
  /**
  * Crear transient_id_v3
  *
  * add_action( 'wpfunos_v3_crear_trans_resultados', array( $this, 'wpfunosResultV3Save' ), 10, 2 );
  * do_action('wpfunos_v3_crear_trans_resultados', $gmw['results'] );
  *
  */
  public function wpfunosResultV3Save( $results ){
    $wpfunos_confirmado = [];
    $wpfunos_sinconfirmar = [];
    $wpf_search = [];
    $valores = [];
    $mas_barato = 0;
    $IP = apply_filters('wpfunos_userIP','dummy');

    $nonce = wp_create_nonce("wpfunos_serviciosv3_nonce".$IP);
    $respuesta = $this->wpfunosFiltros();

    foreach ($results as $key=>$resultado) {
      $wpf_search[] = array ( $resultado->ID, $resultado->distance );
      $servicioID = get_post_meta( $resultado->ID, 'wpfunos_servicioPrecioID', true );
      $servicioPrecio = get_post_meta( $resultado->ID, 'wpfunos_servicioPrecio', true );

      $activo = (get_post_meta( $servicioID, 'wpfunos_servicioActivo', true ) == 1) ? 'si' : 'no' ;
      $confirmado = (get_post_meta( $servicioID, 'wpfunos_servicioPrecioConfirmado', true ) == 1) ? 'si' : 'no' ;
      if( 'si' == $activo && 'si' == $confirmado ){
        if( $mas_barato == 0 || (int)$servicioPrecio < $mas_barato ) $mas_barato = (int)$servicioPrecio;
      }
      //
      if( 'si' == $activo && 'si' == $confirmado ) $wpfunos_confirmado[] = array ($servicioID, $resultado->ID, $servicioPrecio, $resultado->distance );
      if( 'si' == $activo && 'no' == $confirmado ) $wpfunos_sinconfirmar[] = array ($servicioID, $resultado->ID, $servicioPrecio, $resultado->distance );

      $seccionClass_presupuesto = (get_post_meta( $servicioID, 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
      $seccionClass_llamadas = (get_post_meta( $servicioID, 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';
      $valor_precio = number_format($servicioPrecio, 0, ',', '.') . '€';

      $valores[$servicioID] = array (
        'ID_servicio' => $servicioID,
        'valor_titulo' => get_post_meta( $servicioID, 'wpfunos_servicio' .$campo. '_texto' , true ),
        'seccionClass_presupuesto' => $seccionClass_presupuesto,
        'seccionClass_llamadas' => $seccionClass_llamadas,
        'valor_logo' => wp_get_attachment_image ( get_post_meta( $servicioID, 'wpfunos_servicioLogo', true ) ,'full' ),
        'valor_nombre' => get_post_meta( $servicioID, 'wpfunos_servicioNombre', true ),
        'valor_nombrepack' => get_post_meta( $servicioID, 'wpfunos_servicioPackNombre', true ),
        'valor_valoracion' => get_post_meta( $servicioID, 'wpfunos_servicioValoracion', true ),
        'valor_textoprecio' => get_post_meta( $servicioID, 'wpfunos_servicioTextoPrecio', true ),
        'valor_direccion' => get_post_meta( $servicioID, 'wpfunos_servicioDireccion', true ),
        'valor_precio' =>  $valor_precio,
        'valor_telefono' => get_post_meta( $servicioID, 'wpfunos_servicioTelefono', true ),
      );
    }

    $transient_data = array(
      'wpfadr' => $_GET['address'][0],
      'wpfdist' => $_GET['distance'],
      'wpflat' => $_GET['lat'],
      'wpflng' => $_GET['lng'],
      'wpfresp1' => $_GET['cf']['resp1'],
      'wpfresp2' => $_GET['cf']['resp2'],
      'wpfresp3' => $_GET['cf']['resp3'],
      'wpfresp4' => $_GET['cf']['resp4'],
      'wpfid' => $wpf_search,
      'wpfprice' => $mas_barato,
      'wpfcon' => $wpfunos_confirmado,
      'wpfsin' => $wpfunos_sinconfirmar,
      'wpfcampo' => $respuesta['resp1']['inicial'] . $respuesta['resp2']['inicial'] . $respuesta['resp3']['inicial'] . $respuesta['resp4']['inicial'],
      'valor-logo-confirmado' => wp_get_attachment_image ( 83459 , array(66,66)),
      'valor-logo-no-confirmado' => wp_get_attachment_image ( 83458 , array(66,66)),
      'valor-servicio' => $respuesta['resp1']['texto']. ', ' .$respuesta['resp2']['texto']. ', ' .$respuesta['resp3']['texto']. ', ' .$respuesta['resp4']['texto'],
      'wpfvalor' => $valores,
      'wpfnonce' => $nonce,
    );
    set_transient( 'wpfunos-wpfid-v3-' .$IP, $transient_data, HOUR_IN_SECONDS );
  }

  /**
  * Crear ficha confirmado Dummy
  *
  * add_action( 'wpfunos_v3_confirmado_dummy', array( $this, 'wpfunosResultV3ConfirmadoDummy' ), 10, 2 );
  * do_action( 'wpfunos_v3_confirmado_dummy', $wpfunos_confirmado );
  *
  */
  public function wpfunosResultV3ConfirmadoDummy( $wpfunos_confirmado ){
    if(is_array($wpfunos_confirmado) && count( $wpfunos_confirmado ) != 0 ){
      $IP = apply_filters('wpfunos_userIP','dummy');
      ?><div class="wpfunos-titulo" id="wpfunos-titulo-confirmado"><p></p><center><h2>Precio confirmado</h2></center></div><?php

      $transient_id = get_transient('wpfunos-wpfid-v3-' .$IP );

      if(isset($_GET['orden']) && $_GET['orden'] == 'precios' ){
        $columns = array_column( $wpfunos_confirmado, 2 );
        array_multisort( $columns, SORT_ASC, $wpfunos_confirmado );
      }

      foreach ($wpfunos_confirmado as $value) {

        if( $transient_id === false || $transient_id['wpfadr'] != $_GET['address'][0] || $transient_id['wpfdist'] != $_GET['distance'] || $transient_id['wpflat'] != $_GET['lat'] || $transient_id['wpflng'] != $_GET['lng']
        || $transient_id['wpfresp1'] != $_GET['cf']['resp1'] || $transient_id['wpfresp2'] != $_GET['cf']['resp2'] || $transient_id['wpfresp3'] != $_GET['cf']['resp3'] || $transient_id['wpfresp4'] != $_GET['cf']['resp4'] ){
          $_GET['valor-nombre'] = get_post_meta( $value[0], 'wpfunos_servicioNombre', true );
          $_GET['valor-precio'] = number_format($value[2], 0, ',', '.') . '€';
        }else{
          $_GET['valor-nombre'] = $transient_id['wpfvalor'][$value[0]]['valor_nombre'];
          $_GET['valor-precio'] = $transient_id['wpfvalor'][$value[0]]['valor_precio'];
        }

        ?><div class="wpfunos-busqueda-contenedor" id="wpfunos-busqueda-resultado-<?php echo $value[0];?>"><?php
        echo do_shortcode( '[elementor-template id="90335"]' ) ; //Compara precios resultadosV3 Dummy
        ?></div><?php

      }
    }
  }

  /**
  * Crear ficha confirmado Dummy
  *
  * add_action( 'wpfunos_v3_sinconfirmar_dummy', array( $this, 'wpfunosResultV3SinConfirmarDummy' ), 10, 2 );
  * do_action( 'wpfunos_v3_sinconfirmar_dummy', $wpfunos_sinconfirmar );
  *
  */
  public function wpfunosResultV3SinConfirmarDummy( $wpfunos_sinconfirmar ){

  }

  /**
  * Crear ficha confirmado
  *
  * add_action( 'wpfunos_v3_confirmado', array( $this, 'wpfunosResultV3Confirmado' ), 10, 2 );
  * do_action( 'wpfunos_v3_confirmado', $wpfunos_confirmado );
  *
  */
  public function wpfunosResultV3Confirmado( $wpfunos_confirmado ){
    if(is_array($wpfunos_confirmado) && count( $wpfunos_confirmado ) != 0 ){
      $IP = apply_filters('wpfunos_userIP','dummy');
      ?><div class="wpfunos-titulo" id="wpfunos-titulo-confirmado"><p></p><center><h2>Precio confirmado</h2></center></div><?php

      if(isset($_GET['orden']) && $_GET['orden'] == 'precios' ){
        $columns = array_column( $wpfunos_confirmado, 2 );
        array_multisort( $columns, SORT_ASC, $wpfunos_confirmado );
      }

      $transient_id = get_transient('wpfunos-wpfid-v3-' .$IP );

      $_GET['valor-logo-confirmado'] = ( $transient_id === false ) ? wp_get_attachment_image ( 83459 , array(66,66)) : $transient_id["valor-logo-confirmado"] ;

      $nonce = wp_create_nonce("wpfunos_serviciosv3_nonce".$IP);
      $respuesta = $this->wpfunosFiltros();

      $_GET['valor-servicio'] = $respuesta['resp1']['texto']. ', ' .$respuesta['resp2']['texto']. ', ' .$respuesta['resp3']['texto']. ', ' .$respuesta['resp4']['texto'];
      $_GET['seccionClass-detalles'] = 'wpf-detalles-si';
      $_GET['seccionClass-mapas'] = 'wpf-mapas-si';

      foreach ($wpfunos_confirmado as $value) {

        if( $transient_id === false || $transient_id['wpfadr'] != $_GET['address'][0] || $transient_id['wpfdist'] != $_GET['distance'] || $transient_id['wpflat'] != $_GET['lat'] || $transient_id['wpflng'] != $_GET['lng']
        || $transient_id['wpfresp1'] != $_GET['cf']['resp1'] || $transient_id['wpfresp2'] != $_GET['cf']['resp2'] || $transient_id['wpfresp3'] != $_GET['cf']['resp3'] || $transient_id['wpfresp4'] != $_GET['cf']['resp4'] ){

          $_GET['seccionClass-presupuesto'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
          $_GET['seccionClass-llamadas'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';
          $_GET['valor-logo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioLogo', true ) ,'full' );

          $_GET['valor-nombre'] = get_post_meta( $value[0], 'wpfunos_servicioNombre', true );
          $_GET['valor-nombrepack'] = get_post_meta( $value[0], 'wpfunos_servicioPackNombre', true );
          $_GET['valor-valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
          $_GET['valor-precio'] = number_format($value[2], 0, ',', '.') . '€';
          $_GET['valor-textoprecio'] = get_post_meta( $value[0], 'wpfunos_servicioTextoPrecio', true );
          $_GET['valor-direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );

          $_GET['AttsServicio'] = 'wpfid|' .$value[0].'
          wpfn|' .$nonce.'
          wpfp|' .$value[2].'
          wpfdistancia|' .$value[3].'
          wpftitulo|' .get_post_meta( $value[0], 'wpfunos_servicioNombre', true ). '
          wpftelefono|' .str_replace(" ","",get_post_meta( $value[0], 'wpfunos_servicioTelefono', true ) );
        }else{
          $_GET['seccionClass-presupuesto'] = $transient_id['wpfvalor'][$value[0]]['seccionClass_presupuesto'];
          $_GET['seccionClass-llamadas'] = $transient_id['wpfvalor'][$value[0]]['seccionClass_llamadas'];
          $_GET['valor-logo'] = $transient_id['wpfvalor'][$value[0]]['valor_logo'];

          $_GET['valor-nombre'] = $transient_id['wpfvalor'][$value[0]]['valor_nombre'];
          $_GET['valor-nombrepack'] = $transient_id['wpfvalor'][$value[0]]['valor_nombrepack'];
          $_GET['valor-valoracion'] = $transient_id['wpfvalor'][$value[0]]['valor_valoracion'];
          $_GET['valor-precio'] = $transient_id['wpfvalor'][$value[0]]['valor_precio'];
          $_GET['valor-textoprecio'] = $transient_id['wpfvalor'][$value[0]]['valor_textoprecio'];
          $_GET['valor-direccion'] = $transient_id['wpfvalor'][$value[0]]['valor_direccion'];

          $_GET['AttsServicio'] = 'wpfid|' .$value[0].'
          wpfn|' .$nonce.'
          wpfp|' .$value[2].'
          wpfdistancia|' .$value[3].'
          wpftitulo|' .$transient_id['wpfvalor'][$value[0]]['valor_nombre']. '
          wpftelefono|' .str_replace(" ","",$transient_id['wpfvalor'][$value[0]]['valor_telefono'] );
        }

        $_GET['seccionID-servicio'] = $value[0];
        $_GET['seccionID-precio'] = 'wpf-precio-'. $value[0];
        $_GET['valor-distancia'] = $value[3] ;

        ?><div class="wpfunos-busqueda-contenedor" id="wpfunos-busqueda-resultado-<?php echo $value[0];?>"><?php
        echo do_shortcode( '[elementor-template id="90421"]' ) ; //Compara precios resultadosV3
        ?></div><?php

      }
    }
  }

  /**
  * Crear ficha sin confirmar
  *
  * add_action( 'wpfunos_v3_sinconfirmar', array( $this, 'wpfunosResultV3SinConfirmar' ), 10, 2 );
  * do_action( 'wpfunos_v3_sinconfirmar', $wpfunos_sinconfirmar );
  *
  */
  public function wpfunosResultV3SinConfirmar( $wpfunos_sinconfirmar ){
    if(is_array($wpfunos_sinconfirmar) && count( $wpfunos_sinconfirmar ) != 0 ){
      $IP = apply_filters('wpfunos_userIP','dummy');
      ?><div class="wpfunos-titulo" id="wpfunos-titulo-sin-confirmar"><p></p><center><h2>Precio sin confirmar</h2></center></div><?php
    }
  }

  /*********************************/
  /*****  UTILS               ******/
  /*********************************/

  /**
  * Entrada en página ubicación
  */
  public function wpfunosEntradaUbicacion(){
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $referer = sanitize_text_field( $_SERVER['HTTP_REFERER'] );
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '1. - Entrada comparador servicios v3' );
    do_action('wpfunos_log', 'IP: ' . $ipaddress);
    do_action('wpfunos_log', 'referer: ' . apply_filters('wpfunos_dumplog', substr($referer,0,150) ) );
    do_action('wpfunos_log', 'cookie wpfe: ' . $_COOKIE['wpfe']);
    do_action('wpfunos_log', 'cookie wpfn: ' . $_COOKIE['wpfn']);
    do_action('wpfunos_log', 'cookie wpft: ' . $_COOKIE['wpft']);

    if ( apply_filters('wpfunos_email_colaborador','dummy') ) return;

    $userIP = apply_filters('wpfunos_userIP','dummy');

    $args = array(
      'post_status' => 'publish',
      'post_type' => 'estad_ubica_wpfunos',
      'posts_per_page' => -1,
      'meta_key' =>  'wpfunos_estadistcasUbicacionIP',
      'meta_value' => $userIP,
    );
    $post_list = get_posts( $args );
    $contador = 1;
    if( $post_list ) $contador=count($post_list)+1;

    $my_post = array(
      'post_title' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
      'post_type' => 'estad_ubica_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        'wpfunos_estadistcasUbicacionIP' => sanitize_text_field( $userIP ),
        'wpfunos_estadistcasUbicacionReferer' => sanitize_text_field( $_SERVER['HTTP_REFERER'] ),
        'wpfunos_estadistcasUbicacionVisitas' => $contador ,
        'wpfunos_estadistcasUbicacionVersion' => 'v3',
        'wpfunos_Dummy' => true,
      ),
    );
    $post_id = wp_insert_post($my_post);
  }

  /**
  * registro entrada página resultados antes de entrar datos personales
  */
  public function wpfunosEntradaResultados( ){
    if ( apply_filters('wpfunos_email_colaborador','dummy') ) return;

    $userIP = apply_filters('wpfunos_userIP','dummy');

    $args = array(
      'post_status' => 'publish',
      'post_type' => 'estad_resul_wpfunos',
      'posts_per_page' => -1,
      'meta_key' =>  'wpfunos_estadistcasResultadosIP',
      'meta_value' => $userIP,
    );
    $post_list = get_posts( $args );
    $contador = 1;
    if( $post_list ) $contador=count($post_list)+1;

    $resp1 = ( isset($_GET['land']) ) ? $_GET['cf']['resp1'] : '' ;
    $resp2 = ( isset($_GET['land']) ) ? $_GET['cf']['resp2'] : '' ;
    $resp3 = ( isset($_GET['land']) ) ? $_GET['cf']['resp3'] : '' ;
    $resp4 = ( isset($_GET['land']) ) ? $_GET['cf']['resp4'] : '' ;

    $my_post = array(
      'post_title' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
      'post_type' => 'estad_resul_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        'wpfunos_estadistcasResultadosIP' => sanitize_text_field( $userIP ),
        'wpfunos_estadistcasResultadosReferer' => sanitize_text_field( $_SERVER['HTTP_REFERER'] ),
        'wpfunos_estadistcasResultadosDireccion' => sanitize_text_field( $_GET['address'][0] ),
        'wpfunos_estadistcasResultadosDistancia' => sanitize_text_field( $_GET['distance'] ),
        'wpfunos_estadistcasResultadosResp1' => $resp1,
        'wpfunos_estadistcasResultadosResp2' => $resp2,
        'wpfunos_estadistcasResultadosResp3' => $resp3,
        'wpfunos_estadistcasResultadosResp4' => $resp4,
        'wpfunos_estadistcasResultadosLand' => $_GET['land'],
        'wpfunos_estadistcasResultadosURI' => esc_url_raw( $_SERVER['REQUEST_URI'] ),
        'wpfunos_estadistcasResultadosVisitas' => $contador ,
        'wpfunos_estadistcasResultadosVersion' => 'v3',
        'wpfunos_Dummy' => true,
      ),
    );
    $post_id = wp_insert_post($my_post);
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
      case '1': $result['resp2'] = array( 'desc' => 'Ataúd', 'inicial' => 'M', 'texto' => 'Ataúd Normal' ); break;
      case '2': $result['resp2'] = array( 'desc' => 'Ataúd', 'inicial' => 'E', 'texto' => 'Ataúd Económico' ); break;
      case '3': $result['resp2'] = array( 'desc' => 'Ataúd', 'inicial' => 'P', 'texto' => 'Ataúd Premium' ); break;
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
  * Buscar CP undefined
  */
  public function wpfunosCodigoPostal( $CodigoPostal, $Direccion ){
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
  * contador de entradas datos
  * $contador = $this->wpfunosV3ContadorEntradas( $IP, '0' )
  */
  public function wpfunosV3ContadorEntradas( $IP, $accion ){
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
    if( $post_list ) $contador=count($post_list)+1;
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
  * Entrada datos usuario
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_v3_multiform', function () { $this->wpfunosV3Multiform();});
  * add_action('wp_ajax_wpfunos_ajax_v3_multiform', function () {$this->wpfunosV3Multiform();});
  *
  *data: {
  *  "action": "wpfunos_ajax_v3_multiform",
  *  "wpfnombre": nombre,
  *  "wpfemail": email,
  *  "wpftelefono": telefono,
  *  "wpfurl" : url,
  *  "wpnonce" : wpnonce,
  *  "wpfip" : ip,
  *  "wpfnewref" : wpfnewref,
  *  "wpfcuando" : cuando,
  *  "wpfdestino" : destino,
  *  "wpfvelatorio" : velatorio,
  *  "wpfceremonia" : ceremonia,
  *},
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
    $wpfdestino = $_POST["wpfdestino"];
    $wpfvelatorio = $_POST["wpfvelatorio"];
    $wpfceremonia = $_POST["wpfceremonia"];
    $wpfcp = $_POST["wpfcp"];
    $wpfubic = $_POST["wpfubic"];
    $wpfdist = $_POST["wpfdist"];
    $wpflat = $_POST["wpflat"];
    $wpflng = $_POST["wpflng"];

    $wpfataud = ( isset($_POST["wpfataud"]) ) ? $_POST["wpfataud"] : 'Económico' ;

    if ( !wp_verify_nonce( $wpnonce, "wpfunos_serviciosv3_nonce".$wpfip ) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio Botón Enviar Datos' );
    do_action('wpfunos_log', 'Ajax: wpfnombre ' .$wpfnombre );
    do_action('wpfunos_log', 'Ajax: wpfemail ' .$wpfemail );
    do_action('wpfunos_log', 'Ajax: wpftelefono ' .$wpftelefono );
    do_action('wpfunos_log', 'Ajax: wpfip ' .$wpfip );

    $this->wpfunosServiciosv2Indeseados( $wpfemail, $wpftelefono );

    $wpfwpf = apply_filters( 'wpfunos_crypt', $wpfnewref , 'e' );

    $URL = home_url().'/comparar-precios-resultados?' .$wpfurl. '&wpfwpf=' .$wpfwpf;

    do_action('wpfunos_update phone',$wpftelefono);
    $wpftelefono = str_replace(" ","",$wpftelefono);
    $tel =  substr($wpftelefono,0,3).' '. substr($wpftelefono,3,2).' '. substr($wpftelefono,5,2).' '. substr($wpftelefono,7,2);

    if( ! apply_filters('wpfunos_reserved_email','dummy') ){
      $userURL = apply_filters('wpfunos_shortener', $URL );

      $contador = $this->wpfunosV3ContadorEntradas( $IP, '0' );

      $my_post = array(
        'post_title' => $wpfnewref,
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => sanitize_text_field( $wpfemail ),
          'wpfunos_userReferencia' => sanitize_text_field( $wpfnewref ),
          'wpfunos_userName' => sanitize_text_field( $wpfnombre ),
          'wpfunos_userPhone' => sanitize_text_field( $tel ),
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
          'wpfunos_userURL' => sanitize_text_field( $userURL ),
          'wpfunos_userURLlarga' => sanitize_text_field( $URL ),
          'wpfunos_userAceptaPolitica' => '1',
          'wpfunos_userLAT' => sanitize_text_field( $wpflat ),
          'wpfunos_userLNG' => sanitize_text_field( $wpflng ),
          'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
          'wpfunos_userVisitas' => $contador,
          'wpfunos_userLead' => true,
          'wpfunos_Dummy' => true,
        ),
      );

      $post_id = wp_insert_post($my_post);

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '5. - Recogida datos usuario v2' );
      do_action('wpfunos_log', 'userIP: ' . $wpfip );
      do_action('wpfunos_log', 'Nombre: ' .  $wpfnombre );
      do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
      do_action('wpfunos_log', 'referencia: ' . $wpfnewref );
      do_action('wpfunos_log', 'Telefono: ' . $tel );

      if( get_option('wpfunos_activarCorreov2Admin') ){
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreov2Admin'), get_option('wpfunos_asuntoCorreov2Admin') );
        $mensaje = str_replace( '[email]' , $wpfemail , $mensaje );
        $mensaje = str_replace( '[referencia]' , $wpfnewref , $mensaje );
        $mensaje = str_replace( '[IP]' , $wpfip , $mensaje );
        $mensaje = str_replace( '[URL]' , $URL , $mensaje );
        $mensaje = str_replace( '[nombre]' , $wpfnombre , $mensaje );
        $mensaje = str_replace( '[telefono]' , $tel , $mensaje );
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
              do_action('wpfunos_log', 'Enviar correo entrada datos al servicio v3' );
              do_action('wpfunos_log', 'referencia: ' . $wpfnewref );
              do_action('wpfunos_log', 'userIP: ' . $wpfip );
              do_action('wpfunos_log', '$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
              do_action('wpfunos_log', 'servicioEmail: ' . get_post_meta( $post->ID, 'wpfunos_servicioEmail', true ) );
            }
          endforeach;
          wp_reset_postdata();
        }

        if( strlen( get_option('wpfunos_mailCorreov2Admin') ) > 0 ){
          wp_mail ( get_option('wpfunos_mailCorreov2Admin'), get_option('wpfunos_asuntoCorreov2Admin') , $mensaje, $headers );
          do_action('wpfunos_log', '==============' );
          do_action('wpfunos_log', 'Enviar correo entrada datos al admin v3' );
          do_action('wpfunos_log', 'referencia: ' . $wpfnewref );
          do_action('wpfunos_log', 'userIP: ' . $wpfip );
          do_action('wpfunos_log', '$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
          do_action('wpfunos_log', 'mailCorreov2Admin: ' . get_option('wpfunos_mailCorreov2Admin') );
        }

      }

    }

    //Última Búsqueda
    $expiry = strtotime('+1 year');
    $wpflast = apply_filters( 'wpfunos_crypt', $URL , 'e' );
    setcookie('wpflast', $wpflast, ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
    setcookie('wpflasttime', date( 'd/m/y', current_time( 'timestamp', 0 ) ) , ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
    //Última Búsqueda END

    $transient_ref = get_transient('wpfunos-wpfref-v3-' .$wpfip );
    $transient_ref['wpfref'] = $wpfnewref;
    $transient_ref['wpfip'] = $wpfip;
    $transient_ref['wpfn'] = $wpfnombre;
    $transient_ref['wpfe'] = $wpfemail;
    $transient_ref['wpft'] = $tel;
    $transient_ref['wpfadr'] = $wpfubic;
    $transient_ref['wpfcp'] = $wpfcp;
    $transient_ref['wpfdist'] = $wpfdist;
    $transient_ref['wpflat'] = $wpflat;
    $transient_ref['wpflng'] = $wpflng;
    $transient_ref['wpfresp1'] = $wpfdestino;
    $transient_ref['wpfresp2'] = $wpfataud;
    $transient_ref['wpfresp3'] = $wpfvelatorio;
    $transient_ref['wpfresp4'] = $wpfceremonia;
    $transient_ref['wpforden'] = 'dist';
    $transient_ref['wpfcuando'] = $wpfcuando;
    $transient_ref['wpfurl'] = $URL;
    $transient_ref['wpfwpf'] = $wpfwpf;
    $transient_ref['wpfland'] = (isset($_POST['wpfland'])) ? 1 : 0 ;

    set_transient( 'wpfunos-wpfref-v3-' .$wpfip, $transient_ref, DAY_IN_SECONDS );

    $result['type'] = "success";
    $result['wpfurl'] = $URL;
    $result['wpftrans'] = $transient_ref;
    $result = json_encode($result);
    echo $result;
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
    $IP = apply_filters('wpfunos_userIP','dummy');

    $transient_ref = get_transient('wpfunos-wpfref-v3-' .$IP );
    if( $transient_ref === false ){
      $result['type'] = "No transient";
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

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio Boton llamen' );
    do_action('wpfunos_log', 'Ajax: wpfnombre ' .$transient_ref['wpfn'] );
    do_action('wpfunos_log', 'Ajax: wpfemail ' .$transient_ref['wpfe'] );
    do_action('wpfunos_log', 'Ajax: wpftelefono ' .$transient_ref['wpft'] );
    do_action('wpfunos_log', 'Ajax: IP ' .$IP );
    do_action('wpfunos_log', 'Ajax: Servicio titulo: ' . $titulo );
    do_action('wpfunos_log', 'Ajax: Servicio ' . $servicio );

    if( ! apply_filters('wpfunos_reserved_email','dummy') ){

      switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = 'Entierro'; break; case '2': $destino = 'I' ; $nombredestino = 'Incineración'; break; }
      switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = 'Ataúd medio'; break; case '2': $ataud = 'E' ; $nombreataud = 'Ataúd económico'; break; case '3': $ataud = 'P' ; $nombreataud = 'Ataúd premium'; break; }
      switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = 'Velatorio' ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = 'Sin velatorio' ; break; }
      switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = 'Sin ceremonia' ; break; case '2': $despedida = 'O' ; $nombredespedida = 'Solo sala' ; break; case '3': $despedida = 'C' ; $nombredespedida = 'Ceremonia civil' ; break; case '4': $despedida = 'R' ; $nombredespedida = 'Ceremonia religiosa' ; break; }

      $telefono = str_replace(" ","",$transient_ref['wpft']);
      $tel =  substr($telefono,0,3). ' ' .substr($telefono,3,2). ' ' .substr($telefono,5,2). ' ' .substr($telefono,7,2) ;

      mt_srand(time());
      $newref = 'funos-'.(string)mt_rand();

      $my_post = array(
        'post_title' => $newref,
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => sanitize_text_field( $transient_ref['wpfe'] ),
          'wpfunos_userReferencia' => sanitize_text_field( $newref ),
          'wpfunos_userName' => sanitize_text_field( $transient_ref['wpfn'] ),
          'wpfunos_userPhone' => sanitize_text_field( $tel ),
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
          'wpfunos_Dummy' => true,
        ),
      );

      $post_id = wp_insert_post($my_post);

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '1. - Botón Te llamamos servicio' );
      do_action('wpfunos_log', 'userIP: ' . $IP );
      do_action('wpfunos_log', 'Nombre: ' .  $transient_ref['wpfn'] );
      do_action('wpfunos_log', 'referencia: ' . $newref );
      do_action('wpfunos_log', 'Post ID: ' .  $post_id  );

      if( get_option('wpfunos_activarCorreoBoton1v2Admin') ){
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton1v2Admin'), get_option('wpfunos_asuntoCorreoBoton1v2Admin') );

        $mensaje = str_replace( '[email]' , $transient_ref['wpfe'] , $mensaje );
        $mensaje = str_replace( '[nombreUsuario]' , $transient_ref['wpfn'] , $mensaje );
        $mensaje = str_replace( '[telefonoUsuario]' , $tel , $mensaje );
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
        $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $servicio, "wpfunos_servicioTelefono", true)  , $mensaje );
        $mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
        $mensaje = str_replace( '[comentariosUsuario]' , apply_filters('wpfunos_comentario', $mensajeusuario ) , $mensaje );

        $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
        $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
        $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
        $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

        if(!empty( get_option('wpfunos_mailCorreoCcoBoton1v2Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1v2Admin' ) ;
        if(!empty( get_option('wpfunos_mailCorreoBccBoton1v2Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1v2Admin' ) ;
        //wp_mail (  get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoBoton1v2Admin') , $mensaje, $headers );
        wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoBoton1v2Admin') , $mensaje, $headers );
        update_post_meta( $post_id, 'wpfunos_userLead', true );

        do_action('wpfunos_log', '==============' );
        //do_action('wpfunos_log', 'Enviado correo lead1 ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
        do_action('wpfunos_log', 'Enviado correo lead1 efraim@efraim.cat' );
        do_action('wpfunos_log', 'Enviado CCO ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoCcoBoton1v2Admin' ) ) );
        do_action('wpfunos_log', 'Enviado BCC ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoBccBoton1v2Admin' ) ) );
        do_action('wpfunos_log', 'userIP: ' . $IP );
        do_action('wpfunos_log', 'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', '$referencia: ' . $newref );

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
    $IP = apply_filters('wpfunos_userIP','dummy');

    $transient_ref = get_transient('wpfunos-wpfref-v3-' .$IP );
    if( $transient_ref === false ){
      $result['type'] = "No transient";
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

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio Boton llamar' );
    do_action('wpfunos_log', 'Ajax: wpfnombre ' .$transient_ref['wpfn'] );
    do_action('wpfunos_log', 'Ajax: wpfemail ' .$transient_ref['wpfe'] );
    do_action('wpfunos_log', 'Ajax: wpftelefono ' .$transient_ref['wpft'] );
    do_action('wpfunos_log', 'Ajax: IP ' .$IP );
    do_action('wpfunos_log', 'Ajax: Servicio titulo: ' . $titulo );
    do_action('wpfunos_log', 'Ajax: Servicio ' . $servicio );

    if( ! apply_filters('wpfunos_reserved_email','dummy') ){

      switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = 'Entierro'; break; case '2': $destino = 'I' ; $nombredestino = 'Incineración'; break; }
      switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = 'Ataúd medio'; break; case '2': $ataud = 'E' ; $nombreataud = 'Ataúd económico'; break; case '3': $ataud = 'P' ; $nombreataud = 'Ataúd premium'; break; }
      switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = 'Velatorio' ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = 'Sin velatorio' ; break; }
      switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = 'Sin ceremonia' ; break; case '2': $despedida = 'O' ; $nombredespedida = 'Solo sala' ; break; case '3': $despedida = 'C' ; $nombredespedida = 'Ceremonia civil' ; break; case '4': $despedida = 'R' ; $nombredespedida = 'Ceremonia religiosa' ; break; }

      $telefono = str_replace(" ","",$transient_ref['wpft']);
      $tel =  substr($telefono,0,3). ' ' .substr($telefono,3,2). ' ' .substr($telefono,5,2). ' ' .substr($telefono,7,2) ;

      mt_srand(time());
      $newref = 'funos-'.(string)mt_rand();

      $my_post = array(
        'post_title' => $newref,
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => sanitize_text_field( $transient_ref['wpfe'] ),
          'wpfunos_userReferencia' => sanitize_text_field( $newref ),
          'wpfunos_userName' => sanitize_text_field( $transient_ref['wpfn'] ),
          'wpfunos_userPhone' => sanitize_text_field( $tel ),
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
          'wpfunos_Dummy' => true,
        ),
      );

      $post_id = wp_insert_post($my_post);

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '2. - Botón llamar servicio' );
      do_action('wpfunos_log', 'userIP: ' . $IP );
      do_action('wpfunos_log', 'Nombre: ' .  $transient_ref['wpfn'] );
      do_action('wpfunos_log', 'referencia: ' . $newref );
      do_action('wpfunos_log', 'Post ID: ' .  $post_id  );

      if( get_option('wpfunos_activarCorreoBoton2v2Admin') ){
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton2v2Admin'), get_option('wpfunos_asuntoCorreoBoton2v2Admin') );

        $mensaje = str_replace( '[email]' , $transient_ref['wpfe'] , $mensaje );
        $mensaje = str_replace( '[nombreUsuario]' , $transient_ref['wpfn'] , $mensaje );
        $mensaje = str_replace( '[telefonoUsuario]' , $tel , $mensaje );
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
        $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $servicio, "wpfunos_servicioTelefono", true)  , $mensaje );
        $mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
        $mensaje = str_replace( '[comentariosUsuario]' , apply_filters('wpfunos_comentario', $mensajeusuario ) , $mensaje );

        $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
        $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
        $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
        $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

        if(!empty( get_option('wpfunos_mailCorreoCcoBoton2v2Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2v2Admin' ) ;
        if(!empty( get_option('wpfunos_mailCorreoBccBoton2v2Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2v2Admin' ) ;
        //wp_mail (  get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoBoton2v2Admin') , $mensaje, $headers );
        wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoBoton2v2Admin') , $mensaje, $headers );
        update_post_meta( $post_id, 'wpfunos_userLead', true );

        do_action('wpfunos_log', '==============' );
        //do_action('wpfunos_log', 'Enviado correo lead2 ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
        do_action('wpfunos_log', 'Enviado correo lead2 efraim@efraim.cat' );
        do_action('wpfunos_log', 'Enviado CCO ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoCcoBoton2v2Admin' ) ) );
        do_action('wpfunos_log', 'Enviado BCC ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoBccBoton2v2Admin' ) ) );
        do_action('wpfunos_log', 'userIP: ' . "IP" );
        do_action('wpfunos_log', 'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', '$referencia: ' . $newref );

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
    $IP = apply_filters('wpfunos_userIP','dummy');

    $transient_ref = get_transient('wpfunos-wpfref-v3-' .$IP );
    if( $transient_ref === false ){
      $result['type'] = "No transient";
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

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio Boton Presupuesto' );
    do_action('wpfunos_log', 'Ajax: wpfnombre ' .$transient_ref['wpfn'] );
    do_action('wpfunos_log', 'Ajax: wpfemail ' .$transient_ref['wpfe'] );
    do_action('wpfunos_log', 'Ajax: wpftelefono ' .$transient_ref['wpft'] );
    do_action('wpfunos_log', 'Ajax: IP ' .$IP );
    do_action('wpfunos_log', 'Ajax: Servicio titulo: ' . $titulo );
    do_action('wpfunos_log', 'Ajax: Servicio ' . $servicio );
    do_action('wpfunos_log', 'Ajax: Mensaje: ' . $mensajeusuario );

    if( ! apply_filters('wpfunos_reserved_email','dummy') ){

      switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = 'Entierro'; break; case '2': $destino = 'I' ; $nombredestino = 'Incineración'; break; }
      switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = 'Ataúd medio'; break; case '2': $ataud = 'E' ; $nombreataud = 'Ataúd económico'; break; case '3': $ataud = 'P' ; $nombreataud = 'Ataúd premium'; break; }
      switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = 'Velatorio' ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = 'Sin velatorio' ; break; }
      switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = 'Sin ceremonia' ; break; case '2': $despedida = 'O' ; $nombredespedida = 'Solo sala' ; break; case '3': $despedida = 'C' ; $nombredespedida = 'Ceremonia civil' ; break; case '4': $despedida = 'R' ; $nombredespedida = 'Ceremonia religiosa' ; break; }

      $telefono = str_replace(" ","",$transient_ref['wpft']);
      $tel =  substr($telefono,0,3). ' ' .substr($telefono,3,2). ' ' .substr($telefono,5,2). ' ' .substr($telefono,7,2) ;

      mt_srand(time());
      $newref = 'funos-'.(string)mt_rand();

      $my_post = array(
        'post_title' => $newref,
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => sanitize_text_field( $transient_ref['wpfe'] ),
          'wpfunos_userReferencia' => sanitize_text_field( $newref ),
          'wpfunos_userName' => sanitize_text_field( $transient_ref['wpfn'] ),
          'wpfunos_userPhone' => sanitize_text_field( $tel ),
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
          'wpfunos_Dummy' => true,
        ),
      );

      $post_id = wp_insert_post($my_post);

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '2. - Botón Prdir presupuesto' );
      do_action('wpfunos_log', 'userIP: ' . $IP );
      do_action('wpfunos_log', 'Nombre: ' .  $transient_ref['wpfn'] );
      do_action('wpfunos_log', 'referencia: ' . $newref );
      do_action('wpfunos_log', 'Post ID: ' .  $post_id  );

      if( get_option('wpfunos_activarCorreoPresupuestoLead') ){
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoPresupuestoLead'), get_option('wpfunos_asuntoCorreoPresupuestoLead') );

        $mensaje = str_replace( '[email]' , $transient_ref['wpfe'] , $mensaje );
        $mensaje = str_replace( '[nombreUsuario]' , $transient_ref['wpfn'] , $mensaje );
        $mensaje = str_replace( '[telefonoUsuario]' , $tel , $mensaje );
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
        $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $servicio, "wpfunos_servicioTelefono", true)  , $mensaje );
        $mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
        $mensaje = str_replace( '[comentariosUsuario]' , apply_filters('wpfunos_comentario', $mensajeusuario ) , $mensaje );

        $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
        $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 83459 , 'full') , $mensaje );
        $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
        $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

        if(!empty( get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ;
        if(!empty( get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ;

        //wp_mail (  get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoPresupuestoLead') , $mensaje, $headers );
        wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoPresupuestoLead') , $mensaje, $headers );
        update_post_meta( $post_id, 'wpfunos_userLead', true );

        do_action('wpfunos_log', '==============' );
        //do_action('wpfunos_log', 'Enviado correo pedir presupuesto ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
        do_action('wpfunos_log', 'Enviado correo pedir presupuesto efraim@efraim.cat' );
        do_action('wpfunos_log', 'Enviado CCO ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ) );
        do_action('wpfunos_log', 'Enviado BCC ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ) );
        do_action('wpfunos_log', 'userIP: ' . "IP" );
        do_action('wpfunos_log', 'Nombre: ' . $transient_ref['wpfn'] );
        do_action('wpfunos_log', '$referencia: ' . $transient_ref['wpfref'] );

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
    $IP = apply_filters('wpfunos_userIP','dummy');

    $transient_ref = get_transient('wpfunos-wpfref-v3-' .$IP );
    if( $transient_ref === false ){
      $result['type'] = "No transient";
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

    switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = 'Entierro'; break; case '2': $destino = 'I' ; $nombredestino = 'Incineración'; break; }
    switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = 'Ataúd medio'; break; case '2': $ataud = 'E' ; $nombreataud = 'Ataúd económico'; break; case '3': $ataud = 'P' ; $nombreataud = 'Ataúd premium'; break; }
    switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = 'Velatorio' ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = 'Sin velatorio' ; break; }
    switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = 'Sin ceremonia' ; break; case '2': $despedida = 'O' ; $nombredespedida = 'Solo sala' ; break; case '3': $despedida = 'C' ; $nombredespedida = 'Ceremonia civil' ; break; case '4': $despedida = 'R' ; $nombredespedida = 'Ceremonia religiosa' ; break; }

    $comentarios = get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) ;

    $result['type'] = "success";
    $result['valor_logo'] = wp_get_attachment_image ( get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) ,array(32,32) );
    $result['valor_servicio'] = $nombredestino. ', ' .$nombreataud. ', ' .$nombrevelatorio. ', ' .$nombredespedida;
    $result['valor_nombre'] = get_post_meta( $servicio, 'wpfunos_servicioNombre', true );
    $result['valor_nombrepack'] = get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true );
    $result['valor_valoracion'] = get_post_meta( $servicio, 'wpfunos_servicioValoracion', true );
    $result['valor_precio'] = number_format($precio, 0, ',', '.') . '€';
    $result['valor_textoprecio'] = get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true );
    $result['valor_direccion'] = get_post_meta( $servicio, 'wpfunos_servicioDireccion', true );
    $result['valor_distancia'] = $distancia ;
    $result['valor_logo_confirmado'] = wp_get_attachment_image ( 83459 , array(66,66));
    $result['comentarios'] = $comentarios;
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
    $IP = apply_filters('wpfunos_userIP','dummy');

    $transient_ref = get_transient('wpfunos-wpfref-v3-' .$IP );
    if( $transient_ref === false ){
      $result['type'] = "No transient";
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

    if( get_option('wpfunos_activarCorreoUsuarioDetalles') ){

      switch( $transient_ref['wpfresp1'] ) { case '1': $destino = 'E' ; $nombredestino = 'Entierro'; break; case '2': $destino = 'I' ; $nombredestino = 'Incineración'; break; }
      switch( $transient_ref['wpfresp2'] ) { case '1': $ataud = 'M' ; $nombreataud = 'Ataúd medio'; break; case '2': $ataud = 'E' ; $nombreataud = 'Ataúd económico'; break; case '3': $ataud = 'P' ; $nombreataud = 'Ataúd premium'; break; }
      switch( $transient_ref['wpfresp3'] ) { case '1': $velatorio = 'V' ; $nombrevelatorio = 'Velatorio' ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = 'Sin velatorio' ; break; }
      switch( $transient_ref['wpfresp4'] ) { case '1': $despedida = 'S' ; $nombredespedida = 'Sin ceremonia' ; break; case '2': $despedida = 'O' ; $nombredespedida = 'Solo sala' ; break; case '3': $despedida = 'C' ; $nombredespedida = 'Ceremonia civil' ; break; case '4': $despedida = 'R' ; $nombredespedida = 'Ceremonia religiosa' ; break; }

      $telefono = str_replace(" ","",$transient_ref['wpft']);
      $tel =  substr($telefono,0,3). ' ' .substr($telefono,3,2). ' ' .substr($telefono,5,2). ' ' .substr($telefono,7,2) ;
      $email = $transient_ref['wpfe'];

      $headers[] = 'Content-Type: text/html; charset=UTF-8';
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoUsuarioDetalles'), get_option('wpfunos_asuntoCorreoUsuarioDetalles') );

      $mensaje = str_replace( '[email]' , $transient_ref['wpfe'] , $mensaje );
      $mensaje = str_replace( '[nombreUsuario]' , $transient_ref['wpfn'] , $mensaje );
      $mensaje = str_replace( '[telefonoUsuario]' , $tel , $mensaje );
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
      $mensaje = str_replace( '[comentarios]' , get_post_meta( $servicio, 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
      $mensaje = str_replace( '[logoServicio]' , wp_get_attachment_image (  get_post_meta( $servicio, 'wpfunos_servicioLogo', true ) , 'full' ) , $mensaje );
      $mensaje = str_replace( '[imagenconfirmado]' , wp_get_attachment_image ( 77170 , array(66,66)) , $mensaje );
      $mensaje = str_replace( '[nombrepack]' , get_post_meta( $servicio, 'wpfunos_servicioPackNombre', true ) , $mensaje );
      $mensaje = str_replace( '[textoprecio]' , get_post_meta( $servicio, 'wpfunos_servicioTextoPrecio', true ) , $mensaje );

      if(!empty( get_option('wpfunos_mailCorreoCcoUsuarioDetalles' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoUsuarioDetalles' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccUsuarioDetalles' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccUsuarioDetalles' ) ;

      wp_mail ( $email, get_option('wpfunos_asuntoCorreoUsuarioDetalles') , $mensaje, $headers );

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Enviar correo detalles v3' );
      do_action('wpfunos_log', '$IP: ' . $IP );
      do_action('wpfunos_log', '$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
      do_action('wpfunos_log', '$email: ' . $email );

    }
    $result['type'] = "success";
    $result['email'] = $email;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

}
