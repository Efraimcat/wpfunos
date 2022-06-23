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

    //add_action( 'wpfunos_resultv2_grid_confirmado', array( $this, 'wpfunosResultV2GridConfirmado' ), 10, 2 );
    //add_action( 'wpfunos_resultv2_grid_sinconfirmar', array( $this, 'wpfunosResulV2tGridSinConfirmar' ), 10, 2 );

    add_action('wp_ajax_nopriv_wpfunos_ajax_serviciosv2_entrada_datos', function () { $this->wpfunosServiciosv2EntradaDatos();});
    add_action('wp_ajax_wpfunos_ajax_serviciosv2_entrada_datos', function () {$this->wpfunosServiciosv2EntradaDatos();});

  }
  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-serviciosv2.css', array(), $this->version, 'all' );
  }
  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-serviciosv2.js', array( 'jquery' ), $this->version, false );
    wp_localize_script( $this->plugin_name, 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
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
    ?><script id="wpfunos-datos-cabecera">console.log('Llegada. Datos cabecera.');
    console.log(new Date());</script><?php
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
    if( (int)$nueva_lat != 0 && (int)$nueva_lng != 0 && $_GET['lat'] != $nueva_lat && $_GET['lng'] != $nueva_lng ){
      ?><script id="wpfunos-datos-cabecera-excep-prov">console.log('Reload. Excepción en provincia.');
      console.log(new Date());</script><?php
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
    mt_srand(mktime());
    $newref = 'funos-'.(string)mt_rand();
    $_GET['AttsInicio'] = 'wpfn|' . $nonce . '
    wpfip|' . apply_filters('wpfunos_userIP','dummy'). '
    wpfnewref|' . $newref ;


    ElementorPro\Modules\Popup\Module::add_popup_to_location( '56688' ); //Ventana Popup Esperando
    ElementorPro\Modules\Popup\Module::add_popup_to_location( '63359' ); //Compara precios filtros

    require 'js/wpfunos-serviciosv2-buscador.js';
  }

  /**
  * Shortcode [wpfunos-serviciosv2-precio-zona]
  */
  public function wpfunosServiciosv2PrecioZonaShortcode($atts, $content = ""){
    if(!isset($_GET['lat'])) return;
    switch($_GET['cf']['resp1']){
      case '1': $destino = 'E' ; break; case '2': $destino = 'I' ; break;
    }
    switch($_GET['cf']['resp2']){
      case '1': $ataud = 'M' ; break; case '2': $ataud = 'E' ; break; case '3': $ataud = 'P' ; break;
    }
    switch($_GET['cf']['resp3']){
      case '1': $velatorio = 'V' ; break; case '2': $velatorio = 'S' ; break;
    }
    switch($_GET['cf']['resp4']){
      case '1': $despedida = 'S' ; break; case '2': $despedida = 'O' ; break; case '3': $despedida = 'C' ; break; case '4': $despedida = 'R' ; break;
    }
    //$codigo_provincia = substr( trim( $_COOKIE['wpfc'], " " ), 0, 2 );
    $address = $_GET['address'][0];
    $cp = $_GET['CP'];
    $CP = $this->wpfunosCodigoPostal( $cp, $address );
    $codigo_provincia = substr( trim( $CP, " " ), 0, 2 );
    $campo = $destino . $ataud . $velatorio . $despedida;

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
        $suma++;
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
    }
  }

  /**
  * Shortcode [wpfunos-nuevos-datos-distancia]
  */
  public function wpfunosServiciosDatosDistanciaShortcode($atts, $content = ""){
    ?><script id="wpfunos-serviciosv2-datos-distancia">
    jQuery( document ).ready( function() {
      console.log('Botones detalles OK');
      console.log(new Date());
      var params = new URLSearchParams(location.search);
      var orden = params.get('orden');

      if( params.get('orden') === 'precios'){
        document.getElementById("wpfunos-titulo-orden").innerHTML = 'Resultados ordenados por precio.';
        document.getElementById("wpfunos-boton-precio").innerHTML = 'Distancia';
      }else{
        document.getElementById("wpfunos-titulo-orden").innerHTML = 'Resultados ordenados por distancia.';
        document.getElementById("wpfunos-boton-precio").innerHTML = 'Precio';
      }
      document.getElementById("wpfunos-boton-precio").addEventListener('click', function(){
        console.log('click cambiar orden');
        console.log(new Date());
        elementorFrontend.documentsManager.documents['56688'].showModal(); //show the popup
        var wpfref = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
        var wpfcp = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp");
        if( params.get('wpfref') === 'dummy' && wpfref != 'dummy' ) params.set('wpfref', wpfref);
        if( params.get('CP') === 'undefined' && wpfcp != 'dummy') params.set('CP', wpfcp);
        if( orden == 'dist' ){
          params.set('orden', 'precios' );
          //console.log(params.toString());
          window.location.search = params.toString();
        }else{
          params.set('orden', 'dist' );
          window.location.search = params.toString();
        }
      }, false);
    } );
    </script>
    <?php
  }

  /**
  * Shortcode [wpfunos-serviciosv2-ventana-distancia]
  */
  public function wpfunosServiciosVentanaDistanciaShortcode($atts, $content = ""){
    ?><script id="wpfunos-serviciosv2-ventana-distancia">
    jQuery( document ).ready( function() {
      console.log('Ventana poblacion OK');
      console.log(new Date());
      document.getElementById("wpfunos-boton-formulario-nueva-distancia").addEventListener('click', function(){
        console.log('click');
        console.log(new Date());
        var newdistance = document.getElementById("form-field-nuevadistancia").value;
        var wpfref = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
        var wpfcp = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp");
        if( newdistance != ''){
          elementorFrontend.documentsManager.documents['56688'].showModal(); //show the popup
          if( parseInt(newdistance) < 5 ) newdistance = '5';
          if( parseInt(newdistance) > 200 ) newdistance = '200';
          var params = new URLSearchParams(location.search);
          if( params.get('wpfref') === 'dummy' && wpfref != 'dummy' ) params.set('wpfref', wpfref);
          if( params.get('CP') === 'undefined' && wpfcp != 'dummy') params.set('CP', wpfcp);
          if( wpfref != 'dummy' ) params.set('wpfref', wpfref);
          if( wpfcp != 'dummy') params.set('CP', wpfcp);
          params.set('distance', newdistance );
          window.location.search = params.toString();
        }
      }, false);
    } );
    </script>
    <?php
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
    if (is_user_logged_in()){
      $current_user = wp_get_current_user();
      $_GET['usuario_telefono'] = str_replace(" ","",get_user_meta( $current_user->ID, 'wpfunos_telefono' , true ));
      $_GET['Email'] = $current_user->user_email;
      $_GET['nombreUsuario'] = $current_user->display_name;
    }else{
      $_GET['usuario_telefono'] = $_COOKIE['wpft'];
      $_GET['Email'] = $_COOKIE['wpfe'];
      $_GET['nombreUsuario'] = $_COOKIE['wpfn'];
    }
    $ipaddress = apply_filters('wpfunos_userIP','dummy');
    if(!isset($_GET['lat'])){
      ?><script id="wpfunos-serviciosv2-home"> $("#wpfunos-serviciosv2-cabecera").hide(); console.log('unwanted'); console.log(new Date()); window.location.href = "/"; </script><?php
      die();
    }
    //
    //  Hemos rellenado la cabecera y sus botones y preparamos los resultados
    //
    ?><script id="wpfunos-datos-cabecera">console.log('Llegada a formulario resultados.');
    console.log(new Date());</script><?php
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '2. - Entrada página resultados v2' );
    //
    //  log de los cookies que tiene el usuario
    //
    if ( $_COOKIE['wpfe'] == '' ){
      do_action('wpfunos_log', 'wpfref: ' . $_GET['wpfref']);
      do_action('wpfunos_log', 'dirección: ' . $_GET['poblacion']);
      do_action('wpfunos_log', 'IP: ' . $ipaddress);
      do_action('wpfunos_log', '***' );
    }else{
      do_action('wpfunos_log', 'wpfref: ' . $_GET['wpfref']);
      do_action('wpfunos_log', 'dirección: ' . $_GET['poblacion']);
      do_action('wpfunos_log', 'IP: ' . $ipaddress);
      do_action('wpfunos_log', 'cookie wpfe: ' . $_COOKIE['wpfe']);
      do_action('wpfunos_log', 'cookie wpfn: ' . $_COOKIE['wpfn']);
      do_action('wpfunos_log', 'cookie wpft: ' . $_COOKIE['wpft']);
    }
    //
    //  Para saber si hemos de pedir los datos personales, comprobamos el campo $_GET['wpfref'] y su integridad
    //
    if( $_GET['wpfref'] != 'dummy' ){
      $IDusuario = apply_filters('wpfunos_userID', $_GET['wpfref'] );
      if( $IDusuario == 0 && !apply_filters('wpfunos_reserved_email','dummy') ){
        do_action('wpfunos_log', 'wpfref existe pero no es correcto !' );
        do_action('wpfunos_log', 'wpfref: ' . $_GET['wpfref']);
        do_action('wpfunos_log', 'IP: ' . $ipaddress);
        do_action('wpfunos_log', '***Redireccionando a home !***' );
        wp_redirect( home_url() );
        die();
      }
      do_action('wpfunos_log', 'El IDusuario es correcto.' );
    }
    //
    //  Decidimos si muestra los resultados o pide datos
    //
    if( $_GET['wpfref'] == 'dummy' || !isset($_COOKIE['wpfe']) || !isset($_COOKIE['wpft']) || !isset($_COOKIE['wpfn']) ){
      //
      // No tiene $_GET['wpfref'] o los cookies de datos personales.
      //
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '3. - Entrada formulario datos personales v2' );
      if ( $_COOKIE['wpfe'] == '' ){
        do_action('wpfunos_log', 'wpfref: ' . $_GET['wpfref']);
        do_action('wpfunos_log', 'IP: ' . $ipaddress);
        do_action('wpfunos_log', '***' );
      }else{
        do_action('wpfunos_log', 'wpfref: ' . $_GET['wpfref']);
        do_action('wpfunos_log', 'cookie wpfe: ' . $_COOKIE['wpfe']);
        do_action('wpfunos_log', 'cookie wpfn: ' . $_COOKIE['wpfn']);
        do_action('wpfunos_log', 'cookie wpft: ' . $_COOKIE['wpft']);
        do_action('wpfunos_log', 'IP: ' . $ipaddress);
      }
      //
      //  Cargamos el popup de datos personales y llamamos a la función AJAX para recogerlos
      //
      $popup_id = '56948'; //your Popup ID.
      ElementorPro\Modules\Popup\Module::add_popup_to_location( $popup_id ); //insert the popup to the current page
      ?><script id="wpfunos-serviciosv2-datos">
      jQuery( document ).ready( function() { //wait for the page to load
        /* You can do more here, this will just show the popup on refresh of page, but hey this is JQuery so you can do more things here depending on your condition to trigger the popup */
        jQuery( window ).on( 'elementor/frontend/init', function() { //wait for elementor to load
          elementorFrontend.on( 'components:init', function() { //wait for elementor pro to load
            elementorFrontend.documentsManager.documents[<?php echo $popup_id ;?>].showModal(); //show the popup
            document.getElementById("wpfunos-enviar-datos").addEventListener('click', function() {  //Listener para saber cuando acaba de rellenar los datos de usuario
              console.log('click botón enviar, Creando entrada.');
              console.log(new Date());
              var nombre = document.getElementById("form-field-Nombre").value;
              var email = document.getElementById("form-field-Email").value;
              var telefono = document.getElementById("form-field-Telefono").value;
              var acepta = document.getElementById("form-field-aceptacion").validity.valueMissing;  //(true = no ha validado  false = ha validado)
              document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfnombre", document.getElementById("form-field-Nombre").value );
              document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfemail", document.getElementById("form-field-Email").value );
              document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpftelefono", document.getElementById("form-field-Telefono").value );
              document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfn", document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfn"));
              document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfip", document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfip"));
              document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfurl", window.location.search);
              //
              // Comprobamos que ha rellenado todos los campos
              //
              if( nombre != '' && email != '' && telefono != '' && !acepta ){ //todo correcto
                console.log('campos rellenados correctamente.');
                var date = new Date();
                console.log(date);
                //
                //  Creamos las cookies de los datos personales.
                //
                date.setTime(date.getTime() + (30*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
                document.cookie = "wpfn=" + nombre + expires + "; path=/; SameSite=Lax; secure";
                document.cookie = "wpfe=" + email + expires + "; path=/; SameSite=Lax; secure";
                document.cookie = "wpft=" + telefono + expires + "; path=/; SameSite=Lax; secure";
                //
                // Modal filtros destino
                //
                //ElementorPro\Modules\Popup\Module::add_popup_to_location( '63359' ); //Compara precios filtros
                elementorFrontend.documentsManager.documents['63359'].showModal(); //show the popup
                jQuery( document ).ready( function() { //wait for the page to load
                  var params = new URLSearchParams(location.search);
                  document.getElementById("wpfunos-boton-filtro-entierro").style.backgroundColor = ( params.get('cf[resp1]') == '1' ? "#39c2f3" : "#ff9c00" );
                  document.getElementById("wpfunos-boton-filtro-incineracion").style.backgroundColor = ( params.get('cf[resp1]') == '2' ? "#39c2f3" : "#ff9c00" );
                  document.getElementById("wpfunos-boton-filtro-normal").style.backgroundColor = ( params.get('cf[resp2]') == '1' ? "#39c2f3" : "#ff9c00" );
                  document.getElementById("wpfunos-boton-filtro-economico").style.backgroundColor = ( params.get('cf[resp2]') == '2' ? "#39c2f3" : "#ff9c00" );
                  document.getElementById("wpfunos-boton-filtro-premium").style.backgroundColor = ( params.get('cf[resp2]') == '3' ? "#39c2f3" : "#ff9c00" );
                  document.getElementById("wpfunos-boton-filtro-velatorio-si").style.backgroundColor = ( params.get('cf[resp3]') == '1' ? "#39c2f3" : "#ff9c00" );
                  document.getElementById("wpfunos-boton-filtro-velatorio-no").style.backgroundColor = ( params.get('cf[resp3]') == '2' ? "#39c2f3" : "#ff9c00" );
                  document.getElementById("wpfunos-boton-filtro-sin").style.backgroundColor = ( params.get('cf[resp4]') == '1' ? "#39c2f3" : "#ff9c00" );
                  document.getElementById("wpfunos-boton-filtro-sala").style.backgroundColor = ( params.get('cf[resp4]') == '2' ? "#39c2f3" : "#ff9c00" );
                  document.getElementById("wpfunos-boton-filtro-civil").style.backgroundColor = ( params.get('cf[resp4]') == '3' ? "#39c2f3" : "#ff9c00" );
                  document.getElementById("wpfunos-boton-filtro-religiosa").style.backgroundColor = ( params.get('cf[resp4]') == '4' ? "#39c2f3" : "#ff9c00" );

                  document.getElementById("wpfunos-boton-filtro-entierro").addEventListener('click', function(){
                    document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp1",'1');
                    $('#wpfunos-servicios-filtro-destino').hide();
                    $('#wpfunos-servicios-filtro-ataud').show();
                  } , false);
                  document.getElementById("wpfunos-boton-filtro-incineracion").addEventListener('click', function(){
                    document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp1",'2');
                    $('#wpfunos-servicios-filtro-destino').hide();
                    $('#wpfunos-servicios-filtro-ataud').show();
                  } , false);
                  //
                  document.getElementById("wpfunos-boton-filtro-normal").addEventListener('click', function(){
                    document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp2",'1');
                    $('#wpfunos-servicios-filtro-ataud').hide();
                    $('#wpfunos-servicios-filtro-velatorio').show();
                  } , false);
                  document.getElementById("wpfunos-boton-filtro-economico").addEventListener('click', function(){
                    document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp2",'2');
                    $('#wpfunos-servicios-filtro-ataud').hide();
                    $('#wpfunos-servicios-filtro-velatorio').show();
                  } , false);
                  document.getElementById("wpfunos-boton-filtro-premium").addEventListener('click', function(){
                    document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp2",'3');
                    $('#wpfunos-servicios-filtro-ataud').hide();
                    $('#wpfunos-servicios-filtro-velatorio').show();
                  } , false);
                  //
                  document.getElementById("wpfunos-boton-filtro-velatorio-si").addEventListener('click', function(){
                    document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp3",'1');
                    $('#wpfunos-servicios-filtro-velatorio').hide();
                    $('#wpfunos-servicios-filtro-ceremonia').show();
                  } , false);
                  document.getElementById("wpfunos-boton-filtro-velatorio-no").addEventListener('click', function(){
                    document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp3",'2');
                    $('#wpfunos-servicios-filtro-velatorio').hide();
                    $('#wpfunos-servicios-filtro-ceremonia').show();
                  } , false);
                  //
                  document.getElementById("wpfunos-boton-filtro-sin").addEventListener('click', function(){
                    document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp4",'1');
                    $('#wpfunos-servicios-filtro-ceremonia').hide();
                    $('#wpfunos-servicios-filtro-enviar').show();
                  } , false);
                  document.getElementById("wpfunos-boton-filtro-sin").addEventListener('click', function(){
                    document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp4",'1');
                    $('#wpfunos-servicios-filtro-ceremonia').hide();
                    $('#wpfunos-servicios-filtro-enviar').show();
                  } , false);
                  document.getElementById("wpfunos-boton-filtro-sala").addEventListener('click', function(){
                    document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp4",'2');
                    $('#wpfunos-servicios-filtro-ceremonia').hide();
                    $('#wpfunos-servicios-filtro-enviar').show();
                  } , false);
                  document.getElementById("wpfunos-boton-filtro-civil").addEventListener('click', function(){
                    document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp4",'3');
                    $('#wpfunos-servicios-filtro-ceremonia').hide();
                    $('#wpfunos-servicios-filtro-enviar').show();
                  } , false);
                  document.getElementById("wpfunos-boton-filtro-religiosa").addEventListener('click', function(){
                    document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp4",'4');
                    $('#wpfunos-servicios-filtro-ceremonia').hide();
                    $('#wpfunos-servicios-filtro-enviar').show();
                  } , false);
                  //
                  document.getElementById("wpfunos-boton-filtro-enviar").addEventListener('click', function() {  //Listener
                    console.log('click enviar formulario con filtros');
                    //
                    //  enviamos AJAX de acciones posteriores a la entrada de datos de un nuevo usuario
                    //
                    var params = new URLSearchParams(location.search);
                    console.log('Acciones posteriores a la entrada de datos de un nuevo usuario.');
                    console.log(new Date());
                    jQuery.ajax({
                      type : "post",
                      dataType : "json",
                      url : myAjax.ajaxurl,
                      data: {
                        "action": "wpfunos_ajax_serviciosv2_entrada_datos",
                        "wpfnombre": document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre"),
                        "wpfemail": document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail"),
                        "wpftelefono": document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono"),
                        "wpfurl" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfurl"),
                        "wpnonce" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfn"),
                        "wpfip" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfip"),
                        "wpfresp1" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfresp1"),
                        "wpfresp2" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfresp2"),
                        "wpfresp3" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfresp3"),
                        "wpfresp4" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfresp4"),
                        "wpfref" : params.get('wpfref'),
                        "wpfNuevo" : true,
                        "wpfnewref" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfnewref"),
                      },
                      success: function(response) {
                        console.log(response)	;
                        console.log(new Date());
                        if(response.type == "success") {
                          console.log('success');
                          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfnombre", response.wpfnombre);
                          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfemail", response.wpfemail);
                          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpftelefono", response.wpftelefono);
                          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfcp", response.wpfcp);
                          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfref", response.wpfref);
                          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfwpf", response.wpfwpf);
                          document.cookie = "wpfc=" + response.wpfcp + expires + "; path=/; SameSite=Lax; secure";
                          document.cookie = "wpfref=" + response.wpfref + expires + "; path=/; SameSite=Lax; secure";
                          document.cookie = "wpfwpf=" + response.wpfwpf + expires + "; path=/; SameSite=Lax; secure";
                        } else {
                          if(response.type == "unwanted") {
                            console.log('unwanted');
                            window.location.href = "/";
                          }else{
                            console.log('fail');
                          }
                        }
                      }
                    }); //fin llamada AJAX
                    //
                    //  reload con los nuevos parámetros
                    //
                    console.log('Reload con los nuevos parámetros.');
                    console.log(new Date());
                    var params = new URLSearchParams(location.search);
                    params.set('cf[resp1]', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfresp1") );
                    params.set('cf[resp2]', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfresp2") );
                    params.set('cf[resp3]', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfresp3") );
                    params.set('cf[resp4]', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfresp4") );
                    if( params.get('cf[resp3]') == '2' && params.get('cf[resp4]') == '1' && parseInt(params.get('distance')) < 100 ){
                      console.log('Cambiando distancia 100km.')
                      params.set('distance', '100' );
                    }
                    params.set('wpfref', document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfnewref") );
                    window.location.search = params.toString();

                  }, false);  // creado el listener
                }); //Fin modal de filtros
              }
            }, false);  // creado el listener de datos de usuario
            console.log('Creado el listener de datos de usuario');
            console.log(new Date());
          } ); //Fin de wait for elementor pro to load
          console.log('Fin de wait for elementor pro to load');
          console.log(new Date());
        } ); // Fin de wait for elementor to load
        console.log('Fin de wait for elementor to load');
        console.log(new Date());
      } ); // Fin de document ready
      console.log('Fin de document ready');
      console.log(new Date());
      </script>
      <?php
    }else{
      //
      // Tiene $_GET['wpfref'] y los cookies de datos personales. No volvemos a pedir datos.
      //



    }
    //
    //  Mientras acaban las accionnes AJAX, preparamos los datos de los resultados
    //
    ?><script id="wpfunos-datos-template-resultados">console.log('Llamamos al template de resultados.');
    console.log(new Date());</script><?php
    echo do_shortcode( '[gmw_ajax_form search_results="7"]' );
  }


  /*********************************/
  /*****                      ******/
  /*********************************/

  /**
  * Buscar CP undefined
  */
  public function  wpfunosCodigoPostal( $CodigoPostal, $Direccion ){
    if( $CodigoPostal == 'undefined' || $CodigoPostal == '' || $CodigoPostal == 'false'){
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
    //"wpfref" : params.get('wpfref'),
    //"wpfNuevo" : true,

    if($_POST['wpfnombre'] == 'dummy') $_POST['wpfnombre'] = $_COOKIE['wpfn'];
    if($_POST['wpfemail'] == 'dummy') $_POST['wpfemail'] = $_COOKIE['wpfe'];
    if($_POST['wpftelefono'] == 'dummy') $_POST['wpftelefono'] = $_COOKIE['wpft'];

    $wpfurl = $_POST['wpfurl'];
    $wpnonce = $_POST['wpnonce'];
    $IP = apply_filters('wpfunos_userIP','dummy');
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio Boton Enviar Datos' );
    do_action('wpfunos_log', 'Ajax: wpfnombre ' .$_POST['wpfnombre'] );
    do_action('wpfunos_log', 'Ajax: wpfemail ' .$_POST['wpfemail'] );
    do_action('wpfunos_log', 'Ajax: wpftelefono ' .$_POST['wpftelefono'] );
    do_action('wpfunos_log', '$_POST[] ' . apply_filters('wpfunos_dumplog', $_POST ) );
    $this->wpfunosServiciosv2Indeseados( $_POST['wpfemail'], $_POST['wpftelefono'] );

    //  Comprobar si el campo wpf de la referencia "wpfref" es una dirección IP.
    //  Si lo es, volver sin crear una nueva entrada.
    if( ! isset($_POST['wpfNuevo']) ){
      $ID = 0;
      $args = array(
        'post_type' => 'usuarios_wpfunos',
        'meta_key' =>  'wpfunos_userReferencia',
        'meta_value' => $_POST['wpfref'],
      );
      $my_query = new WP_Query( $args );
      if ( $my_query->have_posts() ) :
        while ( $my_query->have_posts() ) :
          $my_query->the_post();
          $ID = get_the_ID();
        endwhile;
        wp_reset_postdata();
      endif;

      if ( get_post_meta( $ID, 'wpfunos_userwpf', true ) == $IP ){
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', 'Segunda entrada inicial' );
        $result['type'] = "success";
        $result['wpfnombre'] = $_POST['wpfnombre'];
        $result['wpfemail'] = $_POST['wpfemail'];
        $result['wpftelefono'] = $_POST['wpftelefono'];
        $result['wpfcp'] = $CP;
        $result['wpfref'] = $referencia;
        $result['wpfwpf'] = $wpf;
        $result['userURL'] = $userURL;
        $result = json_encode($result);
        echo $result;
        // don't forget to end your scripts with a die() function - very important
        die();
      }
    }
    //
    //
    $URL = 'https://funos.es/compara-nuevos-datos' .$wpfurl;
    $wpfurl = str_replace('?address','&address',$wpfurl);
    $params = explode('&', $wpfurl );
    $address = substr($params[1],14,1000);
    $resp1 = substr($params[3],14,2);
    $resp2 = substr($params[4],14,2);
    $resp3 = substr($params[5],14,2);
    $resp4 = substr($params[6],14,2);
    $dist = substr($params[7],9,5);
    $lat = substr($params[11],4,10);
    $lng = substr($params[12],4,10);
    $cp = substr($params[15],3,10);
    $CP = $this->wpfunosCodigoPostal( $cp, $address );

    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();
    //
    if( isset($_POST['wpfNuevo']) ) $referencia = $_POST['wpfnewref'];
    //

    $codigo = str_replace(',', '+', $_POST['wpfnombre'] ). ',' .$_POST['wpfemail']. ',' .$_POST['wpftelefono'] ;
    $wpf = apply_filters( 'wpfunos_crypt', $codigo , 'e' );
    //
    if( isset($_POST['wpfNuevo']) ) $wpf= apply_filters('wpfunos_userIP','dummy');
    //

    $userURL = apply_filters('wpfunos_shortener', $URL );

    $textoaccion = 'Entrada datos servicios';
    if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acción Usuario Desarrollador";
    do_action('wpfunos_update phone',$_POST['wpftelefono']);
    $tel =  substr($_POST['wpftelefono'],0,3).' '. substr($_POST['wpftelefono'],3,2).' '. substr($_POST['wpftelefono'],5,2).' '. substr($_POST['wpftelefono'],7,2);

    switch ( substr($params[3],14,2) ) { case '1': $servicio = 'Entierro'; break; case '2': $servicio = 'Incineración'; break; }
    switch ( substr($params[4],14,2) ) { case '2': $ataud = 'Ataúd Económico'; break; case '1': $ataud = 'Ataúd Medio'; break; case '3': $ataud = 'Ataúd Premium'; break; }
    switch ( substr($params[5],14,2)) { case '1': $velatorio = 'Velatorio'; break; case '2': $velatorio = 'Sin Velatorio'; break; }
    switch ( substr($params[6],14,2) ) {  case '1': $ceremonia = 'Sin ceremonia'; break; case '2': $ceremonia = 'Solo sala'; break; case '3': $ceremonia = 'Ceremonia civil'; break; case '4': $ceremonia = 'Ceremonia religiosa'; break; }

    if( ! apply_filters('wpfunos_reserved_email','dummy') ){
      $args = array(
        'post_status' => 'publish',
        'post_type' => 'usuarios_wpfunos',
        'posts_per_page' => -1,
        'meta_query' => array(
          'relation' => 'AND',
          array( 'key' => 'wpfunos_userIP', 'value' => $IP, 'compare' => '=', ),
          array( 'key' => 'wpfunos_userAccion', 'value' => '0', 'compare' => '=', ),
        ),
      );
      $post_list = get_posts( $args );
      $contador = 1;
      if( $post_list ) $contador=count($post_list)+1;
      $my_post = array(
        'post_title' => $referencia,
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => sanitize_text_field( $_POST['wpfemail'] ),
          'wpfunos_userReferencia' => sanitize_text_field( $referencia ),
          'wpfunos_userName' => sanitize_text_field( $_POST['wpfnombre'] ),
          'wpfunos_userPhone' => sanitize_text_field( $tel ),
          'wpfunos_userCP' => sanitize_text_field( $CP ),
          'wpfunos_userAccion' => '0',
          'wpfunos_userNombreAccion' => sanitize_text_field( $textoaccion ),
          'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( $address ),
          'wpfunos_userNombreSeleccionDistancia' => sanitize_text_field( $dist ),
          'wpfunos_userNombreSeleccionServicio' => sanitize_text_field( $servicio ),
          'wpfunos_userNombreSeleccionAtaud' => sanitize_text_field( $ataud ),
          'wpfunos_userNombreSeleccionVelatorio' => sanitize_text_field( $velatorio ),
          'wpfunos_userNombreSeleccionDespedida' => sanitize_text_field( $ceremonia ),
          'wpfunos_userIP' => sanitize_text_field( $IP ),
          'wpfunos_userwpf' => sanitize_text_field( $wpf ),
          'wpfunos_userURL' => sanitize_text_field( $userURL ),
          'wpfunos_userAceptaPolitica' => '1',
          'wpfunos_userLAT' => sanitize_text_field( $lat ),
          'wpfunos_userLNG' => sanitize_text_field( $lng ),
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
      do_action('wpfunos_log', 'Nombre: ' .  $_POST['wpfnombre'] );
      do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
      do_action('wpfunos_log', 'referencia: ' . $referencia );
      do_action('wpfunos_log', 'Telefono: ' . $_POST['wpftelefono'] );
    }



    if( !apply_filters('wpfunos_reserved_email','dummy') &&  get_option('wpfunos_activarCorreov2Admin') ){
      $headers[] = 'Content-Type: text/html; charset=UTF-8';
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreov2Admin'), get_option('wpfunos_asuntoCorreov2Admin') );
      $mensaje = str_replace( '[email]' , $_POST['wpfemail'] , $mensaje );
      $mensaje = str_replace( '[referencia]' , $referencia , $mensaje );
      $mensaje = str_replace( '[IP]' , $IP , $mensaje );
      $mensaje = str_replace( '[URL]' , $userURL , $mensaje );
      $mensaje = str_replace( '[nombre]' , $_POST['wpfnombre'] , $mensaje );
      $mensaje = str_replace( '[telefono]' , substr($_POST['wpftelefono'],0,3).' '. substr($_POST['wpftelefono'],3,2).' '. substr($_POST['wpftelefono'],5,2).' '. substr($_POST['wpftelefono'],7,2) , $mensaje );
      $mensaje = str_replace( '[poblacion]' , $address , $mensaje );
      $mensaje = str_replace( '[distancia]' , $dist , $mensaje );
      $mensaje = str_replace( '[CP]' , $CP , $mensaje );
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
            do_action('wpfunos_log', 'userIP: ' . $userIP );
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
        do_action('wpfunos_log', 'userIP: ' . $userIP );
        do_action('wpfunos_log', '$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
        do_action('wpfunos_log', 'mailCorreov2Admin: ' . get_option('wpfunos_mailCorreov2Admin') );
      }
    }
    //
    //  devolvemos entrada  javascript con "success" y con el título del servicio
    //
    $result['type'] = "success";
    $result['wpfnombre'] = $_POST['wpfnombre'];
    $result['wpfemail'] = $_POST['wpfemail'];
    $result['wpftelefono'] = $_POST['wpftelefono'];
    $result['wpfcp'] = $CP;
    $result['wpfref'] = $referencia;
    $result['wpfwpf'] = $wpf;
    $result['userURL'] = $userURL;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }
}
