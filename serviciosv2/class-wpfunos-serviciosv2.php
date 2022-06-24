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
    //
    //  Hemos rellenado la cabecera y sus botones y preparamos los resultados
    //
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '2. - Entrada página resultados v2' );
    //
    //  log de los cookies que tiene el usuario
    //
    if ( !isset($_COOKIE['wpfe']) || $_COOKIE['wpfe'] == '' ){
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
      $_GET['wpfunos-vision'] = 'blur';
      //
      // No tiene $_GET['wpfref'] o los cookies de datos personales.
      //
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '3. - Entrada formulario datos personales v2' );
      if ( !isset($_COOKIE['wpfe']) || $_COOKIE['wpfe'] == '' ){
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







    }else{
      $_GET['wpfunos-vision'] = 'clear';
      //
      // Tiene $_GET['wpfref'] y los cookies de datos personales. No volvemos a pedir datos.
      //







    }
    //
    //  Mientras acaban las accionnes AJAX, preparamos los datos de los resultados
    //
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
    if(count($wpfunos_confirmado) != 0){
      ?><div class="wpfunos-titulo"><p></p><center><h2>Precio confirmado</h2></center></div><?php
      ////$wpfunos_confirmado = array( $postID, $preciototal ,$preciodescuento, $wpfservicio, $ecologico )
      //$wpfunos_confirmado[] = array ($servicioID, $resultado->ID, $servicioPrecio );
      if(isset($_GET['orden']) && $_GET['orden'] == 'precios' ){
        $columns = array_column( $wpfunos_confirmado, 2 );
        array_multisort( $columns, SORT_ASC, $wpfunos_confirmado );
      }

      foreach ($wpfunos_confirmado as $value) {
        //$precio = get_post_meta( $value[1], 'wpfunos_servicioPrecio' , true );
        $precio = $value[2];

        //$nonce = wp_create_nonce("wpfunos_serviciosv2_nonce");
        $nonce = wp_create_nonce("wpfunos_serviciosv2_nonce".apply_filters('wpfunos_userIP','dummy'));
        $_GET['AttsServicio'] = 'wpfid|' . $value[0].'
        wpfn|' . $nonce .'
        wpfp|' . $precio ;

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
        $_GET['valor-precio'] = number_format($precio, 0, ',', '.') . '€';;
        $_GET['valor-textoprecio'] = get_post_meta( $value[0], 'wpfunos_servicioTextoPrecio', true );
        $_GET['valor-direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );

        ?><div class="wpfunos-busqueda-contenedor"><?php
        echo do_shortcode( '[elementor-template id="63606"]' ) ;
        ?></div><?php
      }
    }
  }
  public function wpfunosResulV2tBlurSinConfirmar( $wpfunos_sinconfirmar ){
    if(count($wpfunos_sinconfirmar) != 0){
      ?><div class="wpfunos-titulo"><p></p><center><h2>Precio sin confirmar</h2></center></div><?php
      foreach ($wpfunos_sinconfirmar as $value) {
        $precio = get_post_meta( $value[1], 'wpfunos_servicioPrecio' , true );
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
        $_GET['valor-precio'] = number_format($precio, 0, ',', '.') . '€';;
        $_GET['valor-textoprecio'] = get_post_meta( $value[0], 'wpfunos_servicioTextoPrecio', true );
        $_GET['valor-direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );

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
