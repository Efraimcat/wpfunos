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

require_once 'class-wpfunos-serviciosv3-AJAX.php';

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
    add_shortcode( 'wpfunos-v3-estrellas', array( $this, 'wpfunosV3EstrellasShortcode' ));
    add_shortcode( 'wpfunos-confirmacion', array( $this, 'wpfunosConfirmacionShortcode' ));

    add_action( 'wpfunos_v3_crear_trans_resultados', array( $this, 'wpfunosResultV3Save' ), 10, 2 );
    add_action( 'wpfunos_v3_confirmado_dummy', array( $this, 'wpfunosResultV3ConfirmadoDummy' ), 10, 2 );
    add_action( 'wpfunos_v3_sinconfirmar_dummy', array( $this, 'wpfunosResultV3SinConfirmarDummy' ), 10, 2 );
    add_action( 'wpfunos_v3_confirmado', array( $this, 'wpfunosResultV3Confirmado' ), 10, 2 );
    add_action( 'wpfunos_v3_sinconfirmar', array( $this, 'wpfunosResultV3SinConfirmar' ), 10, 2 );

    $this->wpfunos_ServiciosV3_AJAX = new Wpfunos_ServiciosV3_AJAX();
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
    ElementorPro\Modules\Popup\Module::add_popup_to_location( '136469' ); //Ventana Popup Esperando (loader1)(CA)

    //$this->wpfunosEntradaUbicacion();
    do_action('wpfunos-visitas-entrada',array( 'tipo' => '3', ) );

    echo do_shortcode( '[gmw_ajax_form search_form="8"]' );

  }

  /**
  * add_shortcode( 'wpfunos-v3-ultima-busqueda', array( $this, 'wpfunosV3UltimaBusquedaShortcode' ));
  */
  public function wpfunosV3UltimaBusquedaShortcode($atts, $content = ""){
    //
    $wpflasttime = '';
    if( isset( $_COOKIE['wpfu'] ) ){
      $wpfu = json_decode( apply_filters( 'wpfunos_crypt', $_COOKIE['wpfu'], 'd' ) );
      //do_action('wpfunos_log', $userIP.' - '.'wpfu: ' .apply_filters('wpfunos_dumplog', $wpfu ) );
      $wpflast = $wpfu->lastserv;
      $wpflasttime = $wpfu->lasttimeserv;
    }
    if( $wpflasttime == '' ) return;
    if( $_GET['autoload'] ){
      if( $_GET['autoload'] == 'yes' ){
        $wpflasturl = apply_filters( 'wpfunos_crypt', $wpflast , 'd' );
        ?>
        <script type="text/javascript" id="wpfunos-serviciosv3-autoload">
        $ = jQuery.noConflict();
        $(document).ready(function(){
          $(function(){
            elementorFrontend.documentsManager.documents['84626'].showModal(); //show the popup
            window.open("<?php echo $wpflasturl; ?>","_self");
          });
        });
        </script>
        <?php
      }
    }
    $last = str_replace("+"," ",$wpflasttime );
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
    if( isset( $_COOKIE['wpfu'] ) ){
      $wpfu = json_decode( apply_filters( 'wpfunos_crypt', $_COOKIE['wpfu'], 'd' ) );
      return apply_filters( 'wpfunos_crypt',$wpfu->lastserv , 'd' );
    }
    return ;
  }

  /**
  * add_shortcode( 'wpfunos-v3-resultados', array( $this, 'wpfunosV3ResultadosShortcode' ));
  */
  public function wpfunosV3ResultadosShortcode($atts, $content = ""){

    if( count($_GET) > 0 ){
      //https://funos.es/comparar-precios-resultados?address[]=Barcelona&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=41.387397&lng=2.168568&form=8&action=fs&CP=undefined&orden=dist&land=1
      //https://funos.es/comparar-precios-resultados?address[]=Barcelona&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=41.387397&lng=2.168568&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&wpfwpf=a3Q0Uld1M0RxY1RSTjcrMStLT3VadzZsSm45RGpnRHhXSHM2elhTZlJrbz0=
      /**?><script>console.log('Cargando popups Elementor.' );</script><?php **/
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '47448' ); //Servicios Enviar Email
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '56672' ); //Servicio Detalles
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '56676' ); //Servicio Presupuesto
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '56680' ); //Servicios Llamar
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '56684' ); //Servicios Llamame

      ElementorPro\Modules\Popup\Module::add_popup_to_location( '89340' ); //Servicios Multistep (1)
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '89344' ); //Servicios Multistep (2)
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '89348' ); //Servicios Multistep (3)
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '89351' ); //Servicios Multistep (4)
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '89354' ); //Servicios Multistep (5)

      ElementorPro\Modules\Popup\Module::add_popup_to_location( '84639' ); //Ventana Popup Esperando (loader2)
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '77005' ); //Ventana Popup Esperando (entrada datos GTM)
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '111301' ); //Servicios Financiación
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '111305' ); //Servicios Financiación Genérico
      ElementorPro\Modules\Popup\Module::add_popup_to_location( '89948' ); //Servicios cambiar distancia V3

      ElementorPro\Modules\Popup\Module::add_popup_to_location( '143788' ); //AccionesFunerarias

      /**?><script>console.log('Cargando popups Elementor END.' );</script><?php**/

      /**?><script>console.log('Comprobando direcciones especiales.' );</script><?php**/

      // Excepción provincia
      $provincia_excepcion = 0;
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
          $provincia_excepcion = 1;
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

          var params = new URLSearchParams(location.search);
          var lat = <?php  echo $nueva_lat; ?>;
          var lng = <?php  echo $nueva_lng; ?>;
          var distance = <?php  echo $nueva_distancia; ?>;
          params.set('lat', lat );
          params.set('lng', lng );
          params.set('distance', distance );
          window.location.search = params.toString();

        } );

        </script>
        <?php
        return;
      }
      /**?><script>console.log('Comprobando direcciones especiales END.' );</script><?php **/
      // END Excepción provincia
      // cookielawinfo-checkbox-functional = yes
      /**?><script>console.log('Comprobando Cookies.' );</script><?php**/
      $_GET['usuario_telefono'] = '';
      $_GET['Email'] = '';
      $_GET['nombreUsuario'] = '';
      if( isset( $_COOKIE['wpfu'] ) ){
        $wpfu = json_decode( apply_filters( 'wpfunos_crypt', $_COOKIE['wpfu'], 'd' ) );
        $_GET['nombreUsuario'] = $wpfu->name;
        $_GET['Email'] = $wpfu->email;
        $_GET['usuario_telefono'] = $wpfu->phone;
      }
      /**?><script>console.log('Comprobando Cookies END.' );</script><?php**/
      // End Comprobar cookies

      // wpfunos-visitas-entrada
      if( isset($_GET['land']) && !isset($_GET['wpfwpf']) ){
        /** ?><script>console.log('Entrada directa landing.' );</script><?php **/
        $cp = $_GET['CP'];
        $CP = $this->wpfunosCodigoPostal( $cp, $address );
        $address = ( isset($_GET['poblacion']) ) ? $_GET['poblacion'] : $_GET['address'][0];
        do_action('wpfunos-visitas-entrada',array(
          'tipo' => '4',
          'wpfresp1' => $_GET['cf']['resp1'],
          'wpfresp2' => $_GET['cf']['resp2'],
          'wpfresp3' => $_GET['cf']['resp3'],
          'wpfresp4' => $_GET['cf']['resp4'],
          'poblacion' => $address,
          'cp' => $CP,
        ) );
      }
      //

      // comprobar veracidad de wpfwpf
      $Tienewpfwpf = 0;
      $phone='';
      $IDusuario='';
      $nombre='';
      $email='';
      if( !isset($_GET['cuando']) ){ $_GET['cuando']='' ; }
      if( !isset($_GET['land']) ){ $_GET['land']=''; }

      // No tiene wpfwpf
      /**?><script>console.log('Comprobando tiene wpfwpf.' );</script><?php**/
      if( !isset( $_GET['wpfwpf'] ) ) {

        /** ?><script>console.log('Verificaciones entrada: NO tiene código wpf' );</script><?php **/

      }else{

        $wpfwpf = apply_filters( 'wpfunos_crypt', $_GET['wpfwpf'], 'd' );
        $IDusuario = apply_filters('wpfunos_userID', $wpfwpf );

        /** ?><script>console.log('Verificaciones entrada: SI tiene código wpf: <?php  echo $wpfwpf; ?> => <?php  echo $IDusuario; ?>' );</script><?php **/
        // Comprobar cambios en URL


        // END Comprobar cambios en URL
        if( apply_filters('wpfunos_email_colaborador','Verificaciones entrada: SI tiene código wpf') ){  // usuario colaborador. Tomamos los datos de usuario de la entrada wpf

          /** ?><script>console.log('Verificaciones entrada: Colaborador');</script><?php **/
          $Tienewpfwpf = 1;

          $wpfu = json_decode( apply_filters( 'wpfunos_crypt', $_COOKIE['wpfu'], 'd' ) );

          if( $IDusuario == 0 ) {
            $nombre = $wpfu->name;
            $email = $wpfu->email;
            $phone = $wpfu->phone;
          }else{
            $nombre = get_post_meta( $IDusuario, 'wpfunos_userName', true );
            $email = get_post_meta( $IDusuario, 'wpfunos_userMail', true );
            $phone = get_post_meta( $IDusuario, 'wpfunos_userPhone', true );
          }

          if( $nombre == '' ){ // no tenemos sus datos
            $current_user = wp_get_current_user();
            $nombre = sanitize_text_field( $current_user->display_name );
            $email = sanitize_text_field( $current_user->user_email );
            $telefono = sanitize_text_field( get_user_meta( $current_user->ID, 'wpfunos_telefono' , true ));

            $expiry = strtotime('+1 year');
            $wpfu->name = $nombre;
            $wpfu->email = $email;
            $wpfu->phone = $telefono ;
            $codigo = apply_filters( 'wpfunos_crypt', json_encode($wpfu), 'e' );
            setcookie('wpfu', $codigo,  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
          }

        }elseif( $IDusuario == 0 ) {  // tiene código pero no existe.

          /** ?><script>console.log('Verificaciones entrada: Codigo wpf INCORRECTO');</script><?php **/

        }else{  // es un usuario normal

          /** ?><script>console.log('Verificaciones entrada: Usuario');</script><?php **/
          $wpfu = json_decode( apply_filters( 'wpfunos_crypt', $_COOKIE['wpfu'], 'd' ) );
          if( $wpfu->name != '' ) { // tenemos sus datos
            /** ?><script>console.log('Verificaciones entrada: Usuario con cookies');</script><?php **/
            $Tienewpfwpf = 1;

            $nombre = $wpfu->name;
            $email = $wpfu->email;
            $phone = $wpfu->phone;

          }

        }

      }
      /**?><script>console.log('Comprobando tiene wpfwpf END.' );</script><?php**/
      // END comprobar veracidad de wpfwpf

      /**?><script>console.log('Verificaciones entrada: $Tienewpfwpf: <?php  echo $Tienewpfwpf; ?> ' );</script><?php **/

      //$_GET['poblacion'] = $_GET['address'][0];
      $IP = apply_filters('wpfunos_userIP','dummy');
      $nonce = wp_create_nonce("wpfunos_serviciosv3_nonce".$IP );

      mt_srand(time());
      $newref = 'funos-'.(string)mt_rand();
      $address = $_GET['address'][0];
      $_GET['ubicacion'] = $address;
      $_GET['wpfnewref'] = $newref;
      $cp = $_GET['CP'];
      $CP = $this->wpfunosCodigoPostal( $cp, $address );

      $address = ( isset($_GET['poblacion']) ) ? $_GET['poblacion'] : $_GET['address'][0];

      $Telefono = apply_filters('wpfunos_telefono_formateado', $phone );

      // id = wpf-resultados-referencia
      /** ?><script>console.log('wpf-resultados-referencia.' );</script><?php**/
      $current_user = wp_get_current_user();
      $wpfcolabnombre = sanitize_text_field( $current_user->display_name );
      $wpfcolabemail = sanitize_text_field( $current_user->user_email );
      $wpfcolabtelefono = sanitize_text_field( get_user_meta( $current_user->ID, 'wpfunos_telefono' , true ));
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
      wpftelefono|' .$Telefono. '
      wpfcolabnombre|' .$wpfcolabnombre. '
      wpfcolabemail|' .$wpfcolabemail. '
      wpfcolabtelefono|' .$wpfcolabtelefono. '
      wpfusuarionombre|' .$nombre. '
      wpfusuarioemail|' .$email. '
      wpfusuariotelefono|' .$Telefono. '
      wpfcuando|' .$_GET['cuando']. '
      wpfland|' .$_GET['land']. '
      wpfIDusuario|' .$IDusuario. '
      wpfhomeURL|' .home_url(). '
      wpfresp1|' .$_GET['cf']['resp1']. '
      wpfresp2|' .$_GET['cf']['resp2']. '
      wpfresp3|' .$_GET['cf']['resp3']. '
      wpfresp4|' .$_GET['cf']['resp4'] ;

      // Actualizar transient
      if( $Tienewpfwpf == 1 ){
        $transient_ref = get_transient('wpfunos-wpfref-' .$IP );
        /** ?><script>console.log('Transient búsqueda actualizar.' );</script><?php **/

        $colaborador = ( apply_filters('wpfunos_email_colaborador','Transient búsqueda actualizar') ) ? 'si' : 'no' ;

        $transient_ref['wpfref'] = $wpfwpf;
        $transient_ref['wpfip'] = $IP;
        $transient_ref['wpfn'] = $nombre;
        $transient_ref['wpfe'] = $email;
        $transient_ref['wpft'] = $Telefono;
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
        $transient_ref['wpfcolab'] = $colaborador;

        set_transient( 'wpfunos-wpfref-v3-' .$IP, $transient_ref, DAY_IN_SECONDS );

        /** ?><script>console.log('Transient búsqueda actualizar END.' );</script><?php **/
      }
      // Actualizar transient END

      // No tiene entrada usuario
      if( !isset( $_GET['cuando'] ) || $Tienewpfwpf == 0 ){

        /** ?><script>console.log('Sin entrada de usuario.' );</script><?php **/

        $this->wpfunosEntradaResultados(); //registro entrada página resultados antes de entrar datos personales

        ?><script type="text/javascript">
        var checkExist = setInterval(function() {
          if (document.getElementById("wpf-resultados-referencia").hasAttribute("wpfemail") ) {
            // console.log("Lanzar señal Multistep Form");
            clearInterval(checkExist);
            document.getElementById("wpf-resultados-referencia").setAttribute("wpfmultistep",'si');

          }
        }, 100); // check every 100ms
        </script><?php

      }
      // END No tiene entrada usuario

    }else{
      /**
      *?>
      *<script type="text/javascript" id="wpfunos-serviciosv3-autoload">
      *$ = jQuery.noConflict();
      *$(document).ready(function(){
      *$(function(){
      *    var idioma_wpml = getCookie('wp-wpml_current_language');
      *    if (idioma_wpml === 'es'){
      *      var URL = '/comparar-precios-nueva';
      *    }else{
      *      var URL = '/' + idioma_wpml + '/comparar-precios-nueva';
      *    }
      *    window.open(URL,"_self");
      *  });
      *});
      *</script>
      *<?php
      **/
      ?>
      <script type="text/javascript" id="wpfunos-serviciosv3-autoload">
      $ = jQuery.noConflict();
      $(document).ready(function(){
        $(function(){
          var idioma_wpml = getCookie('wp-wpml_current_language');
          if (idioma_wpml === 'es'){
            var URL = '/comparar-precios-nueva';
          }else{
            var URL = '/' + idioma_wpml + '/comparar-precios-nueva';
          }
          window.open(URL,"_self");
        });
      });
      </script>
      <?php
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
    //
    // VENTANA COLABORADOR
    if( apply_filters('wpfunos_email_colaborador','wpfunosV3ColumnaCentral') ){  // usuario colaborador.
      //if( is_user_logged_in()  && get_current_user_id() == '7' ) {
      //if( apply_filters('wpfunos_reserved_email','dummy') ){

      echo do_shortcode( '[elementor-template id="119957"]' );//Compara precios resultadosV3 Ventana Colaborador
    }
    // END VENTANA COLABORADOR
    //
    /** ?><script>console.log('Resultados.' );</script><?php **/
    echo do_shortcode( '[gmw_ajax_form search_results="8"]' );
    /** ?><script>console.log('Resultados END.' );</script><?php **/
    $_GET['seccionClass-presupuesto'] = 'wpf-presupuesto-si';
    $_GET['seccionClass-llamadas'] = 'wpf-llamadas-si';
  }


  /**
  * Shortcode [wpf-v3-estrellas]wpfunosV3EstrellasShortcode
  */
  public function wpfunosV3EstrellasShortcode( $atts, $content = "" ) {
    return (int)$_GET['valoracion'];
  }

  /*********************************/
  /*****  PRECIOS ZONA        ******/
  /*********************************/
  /**
  * add_shortcode( 'wpfunos-v3-columna-derecha', array( $this, 'wpfunosV3ColumnaDerechaShortcode' ));
  */
  public function wpfunosV3ColumnaDerechaShortcode($atts, $content = ""){
    /** ?><script>console.log('Precio medio zona.' );</script><?php **/

    $respuesta = $this->wpfunosFiltros();
    //case '1': $result['resp1'] = array( 'desc' => 'Destino', 'inicial' => 'E', 'texto' => 'Entierro' ); break;
    //$address = ( isset($_GET['poblacion']) ) ? $_GET['poblacion'] : $_GET['address'][0];
    $address = $_GET['address'][0];
    $cp = $_GET['CP'];
    $CP = $this->wpfunosCodigoPostal( $cp, $address );
    $codigo_provincia = substr( trim( $CP, " " ), 0, 2 );
    $campo = $respuesta['resp1']['inicial'] . $respuesta['resp2']['inicial'] . $respuesta['resp3']['inicial'] . $respuesta['resp4']['inicial'];

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

        // WPML
        $servicioTrad = apply_filters( 'wpml_object_id', $post->ID, 'post', TRUE );
        $titulo = get_post_meta( $servicioTrad, 'wpfunos_provinciasTitulo', true );
        $comentarios = get_post_meta( $servicioTrad, 'wpfunos_provinciasComentarios', true );
        // WPML

        if( $check == '1'){
          $_GET['prov_zona_post_title'] = get_the_title( $post->ID );
          $_GET['prov_zona_titulo'] = $titulo;
          $_GET['prov_zona_comentarios'] = $comentarios;
          $_GET['prov_zona_precio'] = number_format($precio, 0, ',', '.');
          echo do_shortcode( get_option('wpfunos_seccionPreciosMedioZona') ); //[elementor-template id="52324"]
        }
      endforeach;
      wp_reset_postdata();
    }else{
      $texto = esc_html__('No hay datos de precio medio para la zona de', 'wpfunos_es');
      ?><h6 style="text-align: center;margin-top: 20px;border-style: solid;border-width: thin;padding: 20px;border-radius: 4px;"><?php echo $texto;?> <?php echo $address;?></h6><?php
    }

    echo do_shortcode( get_option('wpfunos_seccionPreciosExclusivos') ); //[elementor-template id="51893"]

    echo do_shortcode( '[elementor-template id="96919"]' );//Precio medio zona gestoría gratis -> [elementor-template id="96650"] Gestoría post-defunción gratis

    echo do_shortcode( '[elementor-template id="116230"]' );//Precio medio zona financiación para el funeral

    /** ?><script>console.log('Precio medio zona END.' );</script><?php **/
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
  /*****  BOTONES SERVICIOS   ******/
  /*********************************/
  /**
  * Shortcode [wpfunos-confirmacion campo="Nombre"]
  * add_shortcode( 'wpfunos-confirmacion', array( $this, 'wpfunosConfirmacionShortcode' ));
  */
  public function wpfunosConfirmacionShortcode( $atts, $content = "" ) {
    $a = shortcode_atts( array(
      'campo'=>'',
    ), $atts );
    $userIP = apply_filters('wpfunos_userIP','dummy');
    //$transient_ref = get_transient('wpfunos-wpfref-' .$userIP );
    //do_action('wpfunos_log', $userIP.' - '.'wpfunos-confirmacion: ' .apply_filters('wpfunos_dumplog', $_GET ) );
    switch ( $a['campo'] ) {
      case 'Nombre': return $_GET['nombreUsuario']; break;
      case 'email': return $_GET['Email']; break;
      case 'telefono': return $_GET['usuario_telefono']; break;
      case 'ubicacion': return $_GET['ubicacion']; break;
      case 'cuando': return $_GET['cuando']; break;

      case 'destino': return $_GET['cf']['resp1']; break;
      case 'ataud': return $_GET['cf']['resp2']; break;
      case 'velatorio': return $_GET['cf']['resp3']; break;
      case 'ceremonia': return $_GET['cf']['resp4']; break;

      case 'Referencia': return $_GET['wpfnewref']; break;

      case 'OK': return 'OK'; break;
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

    if (array_key_exists("post_title",$results)){
      $newArr[] = $results;
      $results = $newArr;
    }

    foreach ($results as $key=>$resultado) {
      $wpf_search[] = array ( $resultado->ID, $resultado->distance );
      $servicioID = get_post_meta( $resultado->ID, 'wpfunos_servicioPrecioID', true );
      $servicioPrecio = get_post_meta( $resultado->ID, 'wpfunos_servicioPrecio', true );

      // TODO: Comprobar precio = 0:

      $activo = (get_post_meta( $servicioID, 'wpfunos_servicioActivo', true ) == 1) ? 'si' : 'no' ;
      $confirmado = (get_post_meta( $servicioID, 'wpfunos_servicioPrecioConfirmado', true ) == 1) ? 'si' : 'no' ;
      if( 'si' == $activo && 'si' == $confirmado && $servicioPrecio != '' ){
        if( $mas_barato == 0 || (int)$servicioPrecio < $mas_barato ) $mas_barato = (int)$servicioPrecio;
      }
      //
      if( 'si' == $activo && 'si' == $confirmado && $servicioPrecio != '' ) $wpfunos_confirmado[] = array ($servicioID, $resultado->ID, $servicioPrecio, $resultado->distance );
      if( 'si' == $activo && 'no' == $confirmado && $servicioPrecio != '' ) $wpfunos_sinconfirmar[] = array ($servicioID, $resultado->ID, $servicioPrecio, $resultado->distance );

      $seccionClass_financiacion = (get_post_meta( $servicioID, 'wpfunos_servicioBotonFinanciacion', true ) ) ? 'wpf-financiacion-si' : 'wpf-financiacion-no';
      $seccionClass_presupuesto = (get_post_meta( $servicioID, 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
      $seccionClass_llamadas = (get_post_meta( $servicioID, 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';
      $valor_precio = number_format($servicioPrecio, 0, ',', '.') . '€';

      $campo = $respuesta['resp1']['inicial'] . $respuesta['resp2']['inicial'] . $respuesta['resp3']['inicial'] . $respuesta['resp4']['inicial'];

      $valores[$servicioID] = array (
        'ID_servicio' => $servicioID,
        'valor_titulo' => get_post_meta( $servicioID, 'wpfunos_servicio' .$campo. '_texto' , true ),
        'seccionClass_financiacion' => $seccionClass_financiacion,
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
    $address = ( isset($_GET['poblacion']) ) ? $_GET['poblacion'] : $_GET['address'][0];
    $transient_data = array(
      'wpfadr' => $address,
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
      $address = ( isset($_GET['poblacion']) ) ? $_GET['poblacion'] : $_GET['address'][0];
      foreach ($wpfunos_confirmado as $value) {

        if( $transient_id === false || $transient_id['wpfadr'] != $address || $transient_id['wpfdist'] != $_GET['distance'] || $transient_id['wpflat'] != $_GET['lat'] || $transient_id['wpflng'] != $_GET['lng']
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
      ?><div class="wpfunos-titulo" id="wpfunos-titulo-confirmado"><p></p><center><h2><?php esc_html_e( 'Precio confirmado', 'wpfunos_es' )?></h2></center></div><?php

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
      $address = ( isset($_GET['poblacion']) ) ? $_GET['poblacion'] : $_GET['address'][0];
      foreach ($wpfunos_confirmado as $value) {

        if( $transient_id === false || $transient_id['wpfadr'] != $address || $transient_id['wpfdist'] != $_GET['distance'] || $transient_id['wpflat'] != $_GET['lat'] || $transient_id['wpflng'] != $_GET['lng']
        || $transient_id['wpfresp1'] != $_GET['cf']['resp1'] || $transient_id['wpfresp2'] != $_GET['cf']['resp2'] || $transient_id['wpfresp3'] != $_GET['cf']['resp3'] || $transient_id['wpfresp4'] != $_GET['cf']['resp4'] ){

          $_GET['seccionClass-presupuesto'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
          $_GET['seccionClass-llamadas'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';
          $_GET['valor-logo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioLogo', true ) ,'full' );
          $_GET['valor-nombre'] = get_post_meta( $value[0], 'wpfunos_servicioNombre', true );
          $_GET['valor-valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
          $_GET['valor-precio'] = number_format($value[2], 0, ',', '.') . '€';
          $_GET['valor-direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );
          $_GET['AttsServicio'] = 'wpfid|' .$value[0].'
          wpfn|' .$nonce.'
          wpfp|' .$value[2].'
          wpfdistancia|' .$value[3].'
          wpftitulo|' .get_post_meta( $value[0], 'wpfunos_servicioNombre', true ). '
          wpftelefono|' .str_replace(" ","",get_post_meta( $value[0], 'wpfunos_servicioTelefono', true ) ). '
          wpffinanciacion|' .get_post_meta( $value[0], 'wpfunos_servicioBotonFinanciacion', true );
        }else{
          $_GET['seccionClass-financiacion'] = $transient_id['wpfvalor'][ $value[0] ]['seccionClass_financiacion'];
          $_GET['seccionClass-presupuesto'] = $transient_id['wpfvalor'][ $value[0] ]['seccionClass_presupuesto'];
          $_GET['seccionClass-llamadas'] = $transient_id['wpfvalor'][ $value[0] ]['seccionClass_llamadas'];
          $_GET['valor-logo'] = $transient_id['wpfvalor'][ $value[0] ]['valor_logo'];
          $_GET['valor-nombre'] = $transient_id['wpfvalor'][$value[0]]['valor_nombre'];
          $_GET['valor-valoracion'] = $transient_id['wpfvalor'][$value[0]]['valor_valoracion'];
          $_GET['valor-precio'] = $transient_id['wpfvalor'][$value[0]]['valor_precio'];
          $_GET['valor-direccion'] = $transient_id['wpfvalor'][$value[0]]['valor_direccion'];

          $_GET['AttsServicio'] = 'wpfid|' .$value[0].'
          wpfn|' .$nonce.'
          wpfp|' .$value[2].'
          wpfdistancia|' .$value[3].'
          wpftitulo|' .$transient_id['wpfvalor'][$value[0]]['valor_nombre']. '
          wpftelefono|' .str_replace(" ","",$transient_id['wpfvalor'][$value[0]]['valor_telefono'] ). '
          wpffinanciacion|' .get_post_meta( $value[0], 'wpfunos_servicioBotonFinanciacion', true );
        }

        // WPML
        $servicioTrad = apply_filters( 'wpml_object_id', $value[0], 'post', TRUE );
        $_GET['valor-textoprecio'] = get_post_meta( $servicioTrad, 'wpfunos_servicioTextoPrecio', true );
        $_GET['valor-nombrepack'] = get_post_meta( $servicioTrad, 'wpfunos_servicioPackNombre', true );
        // WPML

        $_GET['valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
        $_GET['seccionID-servicio'] = $value[0];
        $_GET['seccionID-precio'] = 'wpf-precio-'. $value[0];
        $_GET['valor-distancia'] = $value[3] ;
        $_GET['seccionClass_financiacion'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonFinanciacion', true ) ) ? 'wpf-financiacion-si' : 'wpf-financiacion-no';
        $_GET['seccionClass-presupuesto'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
        $_GET['seccionClass-llamadas'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';
        //
        $precio_anterior = ' ';
        $campo = $respuesta['resp1']['inicial'] . $respuesta['resp2']['inicial'] . $respuesta['resp3']['inicial'] . $respuesta['resp4']['inicial'];
        $valor_anterior = (get_post_meta( $value[0], 'wpfunos_servicio'.$campo.'_anterior', true ) );
        if( $valor_anterior != '' ){
          $precio_anterior = number_format($valor_anterior, 0, ',', '.') . '€';
        }
        $_GET['valor-precio-anterior'] = $precio_anterior;
        //
        $_GET['valor-empresa']='';
        $valor = get_post_meta( $value[0], 'wpfunos_servicioEmpresa', true );
        if( apply_filters('wpfunos_email_colaborador','Mostrar servicioEmpresa ' . $valor ) ){  // usuario colaborador.
          $_GET['valor-empresa'] = $valor;
        }
        //
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
      ?><div class="wpfunos-titulo" id="wpfunos-titulo-sin-confirmar"><p></p><center><h2><?php esc_html_e( 'Precio sin confirmar', 'wpfunos_es' )?></h2></center></div><?php

      if(isset($_GET['orden']) && $_GET['orden'] == 'precios' ){
        $columns = array_column( $wpfunos_sinconfirmar, 2 );
        array_multisort( $columns, SORT_ASC, $wpfunos_sinconfirmar );
      }

      $transient_id = get_transient('wpfunos-wpfid-v3-' .$IP );

      $_GET['valor-logo-confirmado'] = ( $transient_id === false ) ? wp_get_attachment_image ( 83458 , array(66,66)) : $transient_id["valor-logo-no-confirmado"] ;

      $nonce = wp_create_nonce("wpfunos_serviciosv3_nonce".$IP);
      $respuesta = $this->wpfunosFiltros();

      $_GET['valor-servicio'] = $respuesta['resp1']['texto']. ', ' .$respuesta['resp2']['texto']. ', ' .$respuesta['resp3']['texto']. ', ' .$respuesta['resp4']['texto'];
      $_GET['seccionClass-detalles'] = 'wpf-detalles-no';
      $_GET['seccionClass-mapas'] = 'wpf-mapas-no';
      $address = ( isset($_GET['poblacion']) ) ? $_GET['poblacion'] : $_GET['address'][0];
      foreach ($wpfunos_sinconfirmar as $value) {

        if( $transient_id === false || $transient_id['wpfadr'] != $address || $transient_id['wpfdist'] != $_GET['distance'] || $transient_id['wpflat'] != $_GET['lat'] || $transient_id['wpflng'] != $_GET['lng']
        || $transient_id['wpfresp1'] != $_GET['cf']['resp1'] || $transient_id['wpfresp2'] != $_GET['cf']['resp2'] || $transient_id['wpfresp3'] != $_GET['cf']['resp3'] || $transient_id['wpfresp4'] != $_GET['cf']['resp4'] ){

          $_GET['seccionClass_financiacion'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonFinanciacion', true ) ) ? 'wpf-financiacion-si' : 'wpf-financiacion-no';
          $_GET['seccionClass-presupuesto'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
          $_GET['seccionClass-llamadas'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';
          $_GET['valor-logo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioLogo', true ) ,'full' );

          $_GET['valor-nombre'] = get_post_meta( $value[0], 'wpfunos_servicioNombre', true );
          $_GET['valor-valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
          $_GET['valor-precio'] = number_format($value[2], 0, ',', '.') . '€';
          $_GET['valor-direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );

          $_GET['AttsServicio'] = 'wpfid|' .$value[0].'
          wpfn|' .$nonce.'
          wpfp|' .$value[2].'
          wpfdistancia|' .$value[3].'
          wpftitulo|' .get_post_meta( $value[0], 'wpfunos_servicioNombre', true ). '
          wpftelefono|' .str_replace(" ","",get_post_meta( $value[0], 'wpfunos_servicioTelefono', true ) ). '
          wpffinanciacion|' .get_post_meta( $value[0], 'wpfunos_servicioBotonFinanciacion', true );
        }else{
          $_GET['seccionClass-financiacion'] = $transient_id['wpfvalor'][$value[0]]['seccionClass_financiacion'];
          $_GET['seccionClass-presupuesto'] = $transient_id['wpfvalor'][$value[0]]['seccionClass_presupuesto'];
          $_GET['seccionClass-llamadas'] = $transient_id['wpfvalor'][$value[0]]['seccionClass_llamadas'];
          $_GET['valor-logo'] = $transient_id['wpfvalor'][$value[0]]['valor_logo'];

          $_GET['valor-nombre'] = $transient_id['wpfvalor'][$value[0]]['valor_nombre'];
          $_GET['valor-valoracion'] = $transient_id['wpfvalor'][$value[0]]['valor_valoracion'];
          $_GET['valor-precio'] = $transient_id['wpfvalor'][$value[0]]['valor_precio'];
          $_GET['valor-direccion'] = $transient_id['wpfvalor'][$value[0]]['valor_direccion'];

          $_GET['AttsServicio'] = 'wpfid|' .$value[0].'
          wpfn|' .$nonce.'
          wpfp|' .$value[2].'
          wpfdistancia|' .$value[3].'
          wpftitulo|' .$transient_id['wpfvalor'][$value[0]]['valor_nombre']. '
          wpftelefono|' .str_replace(" ","",$transient_id['wpfvalor'][$value[0]]['valor_telefono'] ). '
          wpffinanciacion|' .get_post_meta( $value[0], 'wpfunos_servicioBotonFinanciacion', true );
        }

        // WPML
        $servicioTrad = apply_filters( 'wpml_object_id', $value[0], 'post', TRUE );
        $_GET['valor-textoprecio'] = get_post_meta( $servicioTrad, 'wpfunos_servicioTextoPrecio', true );
        $_GET['valor-nombrepack'] = get_post_meta( $servicioTrad, 'wpfunos_servicioPackNombre', true );
        // WPML

        $_GET['seccionID-servicio'] = $value[0];
        $_GET['seccionID-precio'] = 'wpf-precio-'. $value[0];
        $_GET['valor-distancia'] = $value[3] ;
        //
        $precio_anterior = ' ';
        $_GET['valor-empresa']='';
        $campo = $respuesta['resp1']['inicial'] . $respuesta['resp2']['inicial'] . $respuesta['resp3']['inicial'] . $respuesta['resp4']['inicial'];
        $valor_anterior = (get_post_meta( $value[0], 'wpfunos_servicio'.$campo.'_anterior', true ) );
        if( $valor_anterior != '' ){
          $precio_anterior = number_format($valor_anterior, 0, ',', '.') . '€';
        }
        $_GET['valor-precio-anterior'] = $precio_anterior;
        //
        //
        ?><div class="wpfunos-busqueda-contenedor" id="wpfunos-busqueda-resultado-<?php echo $value[0];?>"><?php
        echo do_shortcode( '[elementor-template id="90421"]' ) ; //Compara precios resultadosV3
        ?></div><?php

      }
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

    $log = (is_user_logged_in()) ? 'logged' : 'not logged';
    $mobile = (apply_filters('wpfunos_is_mobile','' )) ? 'mobile' : 'desktop';
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - '.'Entrada comparador página ubicación' );
    do_action('wpfunos_log', $userIP.' - '.'referer: ' . apply_filters('wpfunos_dumplog', substr(sanitize_text_field( $_SERVER['HTTP_REFERER'] ),0,150) ) );
    do_action('wpfunos_log', $userIP.' - '.'mobile: ' . $mobile);
    do_action('wpfunos_log', $userIP.' - '.'logged: ' .$log  );

    if ( apply_filters('wpfunos_email_colaborador','wpfunosEntradaUbicacion') ) return;

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
    //$post_id = wp_insert_post($my_post);
  }

  /**
  * registro entrada página resultados antes de entrar datos personales
  */
  public function wpfunosEntradaResultados( ){
    if ( apply_filters('wpfunos_email_colaborador','wpfunosEntradaResultados') ) return;

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
    $address = ( isset($_GET['poblacion']) ) ? $_GET['poblacion'] : $_GET['address'][0];

    $my_post = array(
      'post_title' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
      'post_type' => 'estad_resul_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        'wpfunos_estadistcasResultadosIP' => sanitize_text_field( $userIP ),
        'wpfunos_estadistcasResultadosReferer' => sanitize_text_field( $_SERVER['HTTP_REFERER'] ),
        'wpfunos_estadistcasResultadosDireccion' => sanitize_text_field( $address ),
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
    //$post_id = wp_insert_post($my_post);
  }

  /**
  * Filtros servicios
  */
  public function wpfunosFiltros(){
    $result = array();

    switch($_GET['cf']['resp1']){
      case '1': $result['resp1'] = array( 'desc' => esc_html__('Destino', 'wpfunos_es'), 'inicial' => 'E', 'texto' => esc_html__('Entierro', 'wpfunos_es') ); break;
      case '2': $result['resp1'] = array( 'desc' => esc_html__('Destino', 'wpfunos_es'), 'inicial' => 'I', 'texto' => esc_html__('Incineración', 'wpfunos_es') ); break;
    }
    switch($_GET['cf']['resp2']){
      case '1': $result['resp2'] = array( 'desc' =>  esc_html__('Ataúd', 'wpfunos_es'), 'inicial' => 'M', 'texto' =>  esc_html__('Ataúd Normal', 'wpfunos_es') ); break;
      case '2': $result['resp2'] = array( 'desc' =>  esc_html__('Ataúd', 'wpfunos_es'), 'inicial' => 'E', 'texto' =>  esc_html__('Ataúd Económico', 'wpfunos_es') ); break;
      case '3': $result['resp2'] = array( 'desc' =>  esc_html__('Ataúd', 'wpfunos_es'), 'inicial' => 'P', 'texto' =>  esc_html__('Ataúd Premium', 'wpfunos_es') ); break;
    }
    switch($_GET['cf']['resp3']){
      case '1': $result['resp3'] = array( 'desc' => esc_html__('Velatorio', 'wpfunos_es'), 'inicial' => 'V', 'texto' => esc_html__('Velatorio', 'wpfunos_es') ); break;
      case '2': $result['resp3'] = array( 'desc' => esc_html__('Velatorio', 'wpfunos_es'), 'inicial' => 'S', 'texto' => esc_html__('Sin velatorio', 'wpfunos_es') ); break;
    }
    switch($_GET['cf']['resp4']){
      case '1': $result['resp4'] = array( 'desc' => esc_html__('Ceremonia', 'wpfunos_es'), 'inicial' => 'S', 'texto' => esc_html__('Sin ceremonia', 'wpfunos_es') ); break;
      case '2': $result['resp4'] = array( 'desc' => esc_html__('Ceremonia', 'wpfunos_es'), 'inicial' => 'O', 'texto' => esc_html__('Solo sala', 'wpfunos_es') ); break;
      case '3': $result['resp4'] = array( 'desc' => esc_html__('Ceremonia', 'wpfunos_es'), 'inicial' => 'C', 'texto' => esc_html__('Ceremonia civil', 'wpfunos_es') ); break;
      case '4': $result['resp4'] = array( 'desc' => esc_html__('Ceremonia', 'wpfunos_es'), 'inicial' => 'R', 'texto' => esc_html__('Ceremonia religiosa', 'wpfunos_es') ); break;
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

}
