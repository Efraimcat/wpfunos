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
    add_shortcode( 'wpfunos-v3-resultados', array( $this, 'wpfunosV3ResultadosShortcode' ));
    add_shortcode( 'wpfunos-v3-columna-izquierda', array( $this, 'wpfunosV3ColumnaIzquierdaShortcode' ));
    add_shortcode( 'wpfunos-v3-columna-central', array( $this, 'wpfunosV3ColumnaCentralShortcode' ));
    add_shortcode( 'wpfunos-v3-columna-derecha', array( $this, 'wpfunosV3ColumnaDerechaShortcode' ));
    add_shortcode( 'wpfunos-v3-filtros-movil', array( $this, 'wpfunosV3FiltrosMovilShortcode' ));
    add_shortcode( 'wpfunos-v3-precio-zona-movil', array( $this, 'wpfunosV3PrecioZonaMovilShortcode' ));
    add_shortcode( 'wpfunos-v3-resultados-movil', array( $this, 'wpfunosV3ResultadosMovilShortcode' ));

    add_action('wp_ajax_nopriv_wpfunos_ajax_v3_multiform', function () { $this->wpfunosV3Multiform();});
    add_action('wp_ajax_wpfunos_ajax_v3_multiform', function () {$this->wpfunosV3Multiform();});

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
    echo do_shortcode( '[gmw_ajax_form search_form="8"]' );
  }

  /**
  * add_shortcode( 'wpfunos-v3-ultima-busqueda', array( $this, 'wpfunosV3UltimaBusquedaShortcode' ));
  */
  public function wpfunosV3UltimaBusquedaShortcode($atts, $content = ""){

  }

  /**
  * add_shortcode( 'wpfunos-v3-resultados', array( $this, 'wpfunosV3ResultadosShortcode' ));
  */
  public function wpfunosV3ResultadosShortcode($atts, $content = ""){
    if( count($_GET) > 0 ){
      if ( wp_is_mobile() ){
        ?>
        <script type="text/javascript">
        document.getElementById("wpf-v3-filtros-movil").style.display="block";
        document.getElementById("wpf-v3-resultados-movil").style.display="block";
        </script>
        <?php
      }else{
        ?>
        <script type="text/javascript">
        document.getElementById("wpf-v3-desktop").style.display="block";
        </script>
        <?php
      }

      //https://funos.es/comparar-precios-resultados?address[]=Barcelona&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50
      //&lat=41.387397&lng=2.168568&form=8&action=fs&CP=undefined&orden=dist

      //https://funos.es/comparar-precios-resultados?address[]=Barcelona&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50
      //&lat=41.387397&lng=2.168568&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&wpfwpf=a3Q0Uld1M0RxY1RSTjcrMStLT3VadzZsSm45RGpnRHhXSHM2elhTZlJrbz0=

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
        ElementorPro\Modules\Popup\Module::add_popup_to_location( '84639' ); //Ventana Popup Esperando (loader2)
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

      ?><script>console.log('Direcciones especiales comprobadas.' );</script><?php

      $nonce = wp_create_nonce("wpfunos_serviciosv3_nonce".apply_filters('wpfunos_userIP','dummy'));
      mt_srand(time());
      $newref = 'funos-'.(string)mt_rand();
      $address = $_GET['address'][0];
      $cp = $_GET['CP'];
      $CP = $this->wpfunosCodigoPostal( $cp, $address );

      $_GET['AttsV3'] = 'wpfn|' .$nonce. '
      wpfip|' .apply_filters('wpfunos_userIP','dummy'). '
      wpfnewref|' .$newref. '
      wpfcp|' .$CP. '
      wpfubic|' .$address.'
      wpfdist|' .$_GET['distance']. '
      wpflat|' .$_GET['lat']. '
      wpflng|' .$_GET['lng'] ;

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
      $Tienewpfwpf = false;
      // No tiene wpfwpf
      if( !isset( $_GET['wpfwpf'] ) ) {
        ?><script>console.log('Verificaciones entrada: NO tiene código wpf' );</script><?php
      }else{
        $wpfwpf = apply_filters( 'wpfunos_crypt', $_GET['wpfwpf'], 'd' );
        $IDusuario = apply_filters('wpfunos_userID', $wpfwpf );
        ?><script>console.log('Verificaciones entrada: SI tiene código wpf: <?php  echo $wpfwpf; ?> => <?php  echo $IDusuario; ?>' );</script><?php

        if( $IDusuario == 0 && !apply_filters('wpfunos_reserved_email','dummy') ){
          ?><script>console.log('Verificaciones entrada: SI tiene código wpf: Codigo wpf INCORRECTO');</script><?php
        }else{
          ?><script>console.log('Verificaciones entrada: SI tiene código wpf: Codigo wpf CORRECTO');</script><?php
          /**
          $transient_ref = get_transient('wpfunos-wpfref-v3-' .$wpfip );
          ?>
          <script type="text/javascript">
          document.getElementById("wpf-resultados-referencia").setAttribute("wpfnombre", <?php echo $transient_ref['wpfn']; ?> );
          document.getElementById("wpf-resultados-referencia").setAttribute("wpfemail", <?php echo $transient_ref['wpfe']; ?> );
          document.getElementById("wpf-resultados-referencia").setAttribute("wpftelefono", <?php echo $transient_ref['wpft']; ?> );
          document.getElementById("wpf-resultados-referencia").setAttribute("wpfcuando", <?php echo $transient_ref['wpfcuando']; ?> ); //Ahora, Próximamente
          document.getElementById("wpf-resultados-referencia").setAttribute("wpfdest", <?php echo $transient_ref['wpfresp1']; ?> ); //Entierro, Incineración
          document.getElementById("wpf-resultados-referencia").setAttribute("wpfdest", <?php echo $transient_ref['resp2']; ?> ); //Entierro, Incineración
          document.getElementById("wpf-resultados-referencia").setAttribute("wpfvela", <?php echo $transient_ref['resp3']; ?> ); //Velatorio, Sin velatorio
          document.getElementById("wpf-resultados-referencia").setAttribute("wpfcere", <?php echo $transient_ref['resp4']; ?> ); //Sin ceremonia, Solo sala, Ceremonia civil, Ceremonia religiosa
          </script>
          <?php
          */
          $Tienewpfwpf = true;
        }
      }
      // END comprobar veracidad de wpfwpf

      // No tiene entrada usuario
      if( ! isset( $_COOKIE['wpfn'] )
      || ! isset( $_COOKIE['wpfe'] )
      || ! isset( $_COOKIE['wpft'] )
      || ! $Tienewpfwpf
      || ! isset( $_GET['cuando'] )  ){

        ?><script>console.log('Sin entrada de usuario.' );</script><?php

        ElementorPro\Modules\Popup\Module::add_popup_to_location( '84639' ); //Ventana Popup Esperando (loader2)
        ElementorPro\Modules\Popup\Module::add_popup_to_location( '77005' ); //Ventana Popup Esperando (entrada datos GTM)
        ElementorPro\Modules\Popup\Module::add_popup_to_location( '89340' ); //Servicios Multistep (1)
        ElementorPro\Modules\Popup\Module::add_popup_to_location( '89344' ); //Servicios Multistep (2)
        ElementorPro\Modules\Popup\Module::add_popup_to_location( '89348' ); //Servicios Multistep (3)
        ElementorPro\Modules\Popup\Module::add_popup_to_location( '89351' ); //Servicios Multistep (4)
        ElementorPro\Modules\Popup\Module::add_popup_to_location( '89354' ); //Servicios Multistep (4)

        $this->wpfunosEntradaUbicacion();
        require 'js/wpfunos-v3-multistep.js';

      }
      // END No tiene entrada usuario

    }

  }

  /*********************************/
  /*****  FILTROS             ******/
  /*********************************/
  /**
  * add_shortcode( 'wpfunos-v3-columna-izquierda', array( $this, 'wpfunosV3ColumnaIzquierdaShortcode' ));
  */
  public function wpfunosV3ColumnaIzquierdaShortcode($atts, $content = ""){
    ?><script>console.log('Columna izquierda: $_GET cuando: <?php  echo $_GET['cuando']; ?>');</script><?php
    if( ! isset($_GET['cuando']) ) return;
  }
  /**
  * add_shortcode( 'wpfunos-v3-filtros-movil', array( $this, 'wpfunosV3FiltrosMovilShortcode' ));
  */
  public function wpfunosV3FiltrosMovilShortcode($atts, $content = ""){
    ?><script>console.log('Filtros movil: $_GET cuando: <?php  echo $_GET['cuando']; ?>');</script><?php
    if( ! isset($_GET['cuando']) ) return;
  }

  /*********************************/
  /*****  RESULTADOS          ******/
  /*********************************/
  /**
  * add_shortcode( 'wpfunos-v3-columna-central', array( $this, 'wpfunosV3ColumnaCentralShortcode' ));
  */
  public function wpfunosV3ColumnaCentralShortcode($atts, $content = ""){
    if( ! isset($_GET['cuando']) ) return;
    if ( ! wp_is_mobile() ){
      ?><script>console.log('Resultados.' );</script><?php

      ?><script>console.log('Fin Resultados.' );</script><?php
    }
  }
  /**
  * add_shortcode( 'wpfunos-v3-resultados-movil', array( $this, 'wpfunosV3ResultadosMovilShortcode' ));
  */
  public function wpfunosV3ResultadosMovilShortcode($atts, $content = ""){
    if( ! isset($_GET['cuando']) ) return;
    if ( wp_is_mobile() ){
      ?><script>console.log('Resultados movil.' );</script><?php

      ?><script>console.log('Fin Resultados movil.' );</script><?php
    }
  }

  /*********************************/
  /*****  PRECIOS ZONA        ******/
  /*********************************/
  /**
  * add_shortcode( 'wpfunos-v3-columna-derecha', array( $this, 'wpfunosV3ColumnaDerechaShortcode' ));
  */
  public function wpfunosV3ColumnaDerechaShortcode($atts, $content = ""){
    if( ! isset($_GET['cuando']) ) return;
    if ( ! wp_is_mobile() ) $this->wpfunosV3PreciosZona();
  }
  /**
  * add_shortcode( 'wpfunos-v3-resultados-movil', array( $this, 'wpfunosV3ResultadosMovilShortcode' ));
  */
  public function wpfunosV3PrecioZonaMovilShortcode($atts, $content = ""){
    if( ! isset($_GET['cuando']) ) return;
    if ( wp_is_mobile() ) $this->wpfunosV3PreciosZona();
  }

  public function wpfunosV3PreciosZona(){
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

    ?><script>console.log('Fin Precio medio zona.' );</script><?php
  }

  /*********************************/
  /*****  UTILS               ******/
  /*********************************/

  /**
  * Entrada ubicación
  */
  public function wpfunosEntradaUbicacion( ){
    if ( apply_filters('wpfunos_email_colaborador','dummy') ) return;
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $args = array(
      'post_status' => 'publish',
      'post_type' => 'ubicaciones_wpfunos',
      'posts_per_page' => -1,
      'meta_key' =>  'wpfunos_ubicacionIP',
      'meta_value' => $userIP,
    );
    $post_list = get_posts( $args );
    $contador = 1;
    if( $post_list ) $contador=count($post_list)+1;

    mt_srand(time());
    $newref = 'funos-'.(string)mt_rand();

    $my_post = array(
      'post_title' => $newref,
      'post_type' => 'ubicaciones_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        'wpfunos_ubicacionIP' => sanitize_text_field( $userIP ),
        'wpfunos_ubicacionReferencia' => sanitize_text_field( $newref ),
        'wpfunos_ubicacionDireccion' => sanitize_text_field( $_GET['address'][0] ),
        'wpfunos_ubicacionDistancia' => sanitize_text_field( $_GET['distance']),
        'wpfunos_ubicacionVisitas' => $contador,
        'wpfunos_ubicacionVersion' => 'v3',
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

    if ( !wp_verify_nonce( $wpnonce, "wpfunos_serviciosv3_nonce".$wpfip ) ) {
      $result['type'] = "Bad nonce";
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
          'wpfunos_userNombreSeleccionAtaud' => 'Económico',
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
        $mensaje = str_replace( '[ataud]' , 'Económico' , $mensaje );
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
    $transient_ref = get_transient('wpfunos-wpfref-v3-' .$wpfip );
    $transient_ref['wpfref'] = $wpfnewref;
    $transient_ref['wpfip'] = $wpfip;
    $transient_ref['wpfn'] = $wpfnombre;
    $transient_ref['wpfe'] = $wpfemail;
    $transient_ref['wpft'] = $wpftelefono;
    $transient_ref['wpfadr'] = $wpfubic;
    $transient_ref['wpfcp'] = $wpfcp;
    $transient_ref['wpfdist'] = $wpfdist;
    $transient_ref['wpflat'] = $wpflat;
    $transient_ref['wpflng'] = $wpflng;
    $transient_ref['wpfresp1'] = $wpfdestino;
    $transient_ref['wpfresp2'] = 'Económico';
    $transient_ref['wpfresp3'] = $wpfvelatorio;
    $transient_ref['wpfresp4'] = $wpfceremonia;
    $transient_ref['wpforden'] = 'dist';
    $transient_ref['wpfcuando'] = $wpfcuando;
    $transient_ref['wpfurl'] = $URL;
    $transient_ref['wpfwpf'] = $wpfwpf;
    set_transient( 'wpfunos-wpfref-v3-' .$wpfip, $transient_ref, DAY_IN_SECONDS );


    $result['type'] = "success";
    $result['wpfurl'] = $URL;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();

  }

}
