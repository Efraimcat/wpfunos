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
    add_shortcode( 'wpfunos-nuevos-datos', array( $this, 'wpfunosServiciosDatosShortcode' ));
    add_shortcode( 'wpfunos-nuevos-datos-cabecera', array( $this, 'wpfunosServiciosDatosCabeceraShortcode' ));
    add_shortcode( 'wpfunos-serviciosv2-precio-zona', array( $this, 'wpfunosServiciosPrecioZonaShortcode' ));

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
    echo do_shortcode( '[gmw_ajax_form search_form="6"]' );
  }

  /**
  * Shortcode [wpfunos-nuevos-datos-cabecera]
  */
  public function wpfunosServiciosDatosCabeceraShortcode($atts, $content = ""){
    // &cuando=Ahora mismo&poblacion=Barcelona&destino=Entierro&ataud=Normal&velatorio=Si&ceremonia=Civil
    $_GET['cuando'] = 'Ahora mismo';
    $_GET['poblacion'] = $_GET['address'][0];
    $_GET['destino'] = ($_GET['cf']['resp1'] == '1')? 'Entierro' : 'Incineración' ;
    switch ($_GET['cf']['resp2']) {
      case '1':
      $_GET['ataud'] = 'Normal';
      break;
      case '2':
      $_GET['ataud'] = 'Económico';
      break;
      case '3':
      $_GET['ataud'] = 'Premium';
      break;
    }
    $_GET['velatorio'] = ($_GET['cf']['resp3'] == '1')? 'Si' : 'No' ;
    switch ($_GET['cf']['resp4']) {
      case '1':
      $_GET['ceremonia'] = 'Sin ceremonia';
      break;
      case '2':
      $_GET['ceremonia'] = 'Solo sala';
      break;
      case '3':
      $_GET['ceremonia'] = 'Civil';
      break;
      case '4':
      $_GET['ceremonia'] = 'Religiosa';
      break;
    }

  }

  /**
  * Shortcode [wpfunos-nuevos-datos]
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
    $_GET['Atts'] = 'wpfn|' .wp_create_nonce("wpfunos_serviciosv2_nonce").'
    wpfip|'. $ipaddress;


    echo do_shortcode( '[gmw_ajax_form search_results="6"]' );
    //$cookie_nombre = $_COOKIE['wpfn'];
    //$cookie_email = $_COOKIE['wpfe'];
    //$cookie_telefono = $_COOKIE['wpft'];
    //if( '' == $cookie_nombre || '' == $cookie_email || '' == $cookie_telefono){

    $popup_id = '56948'; //your Popup ID.
    ElementorPro\Modules\Popup\Module::add_popup_to_location( $popup_id ); //insert the popup to the current page
    ?><script>
    jQuery( document ).ready( function() { //wait for the page to load
      /* You can do more here, this will just show the popup on refresh of page, but hey this is JQuery so you can do more things here depending on your condition to trigger the popup */
      jQuery( window ).on( 'elementor/frontend/init', function() { //wait for elementor to load
        elementorFrontend.on( 'components:init', function() { //wait for elementor pro to load
          elementorFrontend.documentsManager.documents[<?php echo $popup_id ;?>].showModal(); //show the popup
          document.getElementById("wpfunos-enviar-datos").addEventListener('click', function() {
            console.log('click botón enviar');
            var nombre = document.getElementById("form-field-Nombre").value;
            var email = document.getElementById("form-field-Email").value;
            var telefono = document.getElementById("form-field-Telefono").value;
            var acepta = document.getElementById("form-field-aceptacion").validity.valueMissing;  //(true = no ha validado  false = ha validado)
            if( nombre != '' && email != '' && telefono != '' && !acepta ){
              console.log('campos OK');
              var date = new Date();
              date.setTime(date.getTime() + (30*24*60*60*1000));
              expires = "; expires=" + date.toUTCString();
              document.cookie = "wpfn=" + nombre + expires + "; path=/; SameSite=Lax; secure";
              document.cookie = "wpfe=" + email + expires + "; path=/; SameSite=Lax; secure";
              document.cookie = "wpft=" + telefono + expires + "; path=/; SameSite=Lax; secure";
              var nonce = document.getElementById("wpfunos-formulario-entrada-datos").getAttribute("wpfn");
              var ip = document.getElementById("wpfunos-formulario-entrada-datos").getAttribute("wpfip");
              var url = window.location.search;
              jQuery.ajax({
                type : "post",
                dataType : "json",
                url : myAjax.ajaxurl,
                data: {
                  "action": "wpfunos_ajax_serviciosv2_entrada_datos",
                  "wpfnombre": nombre,
                  "wpfemail": email,
                  "wpftelefono": telefono,
                  "wpfurl" : url,
                  "wpnonce" : nonce,
                  "wpfip" : ip,
                },
                success: function(response) {
                  console.log(response)	;
                  if(response.type == "success") {
                    console.log('success');
                    document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfnombre", response.wpfnombre);
                    document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfemail", response.wpfemail);
                    document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpftelefono", response.wpftelefono);
                    document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfcp", response.wpfcp);
                    document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfref", response.wpfref);
                    document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfwpf", response.wpfwpf);
                    document.cookie = "wpfc=" + response.wpfcp + expires + "; path=/; SameSite=Lax; secure";
                    document.cookie = "wpfwpf=" + response.wpfwpf + expires + "; path=/; SameSite=Lax; secure";
                  } else {
                    if(response.type == "unwanted") {
                      console.log('unwanted');
                      window.location.href = "/compara-nuevos-resultados";
                    }else{
                      console.log('fail');
                    }
                  }
                }
              });
            }
          }, false);
        } );
      } );
    } );
    </script>;
    <?php


  }
  /**
  * Shortcode [wpfunos-serviciosv2-precio-zona]
  */
  public function wpfunosServiciosPrecioZonaShortcode($atts, $content = ""){
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
    $codigo_provincia = substr( trim( $_COOKIE['wpfc'], " " ), 0, 2 );
    $campo = $destino . $ataud . $velatorio . $despedida;

    echo do_shortcode( get_option('wpfunos_seccionPreciosExclusivos') );
    $args = array(
      'post_type' => 'prov_zona_wpfunos',
      'meta_key' =>  $this->plugin_name . '_provinciasCodigo',
      'meta_value' => $codigo_provincia,
    );
    $post_list = get_posts( $args );
    $contador = 0;
    if( $post_list ){
      foreach ( $post_list as $post ) :
        $contador++;
        $suma++;
        $check = get_post_meta( $post->ID, $this->plugin_name . '_provincias' . $campo.'_ck', true );
        $precio = get_post_meta( $post->ID, $this->plugin_name . '_provincias' . $campo, true );
        $titulo = get_post_meta( $post->ID, $this->plugin_name . '_provinciasTitulo', true );
        $comentarios = get_post_meta( $post->ID, $this->plugin_name . '_provinciasComentarios', true );
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

  /**
  * Enviar Correo entrada datos usuario
  */
  public function wpfunosResultCorreoDatos( ){
    if( ! get_option($this->plugin_name . '_activarCorreoDatosEntrados')) return;
    if( apply_filters('wpfunos_reserved_email','dummy') ) return;
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoDatosEntrados'), get_option('wpfunos_asuntoCorreoDatosEntrados') );

    require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Datos-Usuario.php';

    if(!empty( get_option('wpfunos_mailCorreoCcoDatosEntrados' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoDatosEntrados' ) ;
    if(!empty( get_option('wpfunos_mailCorreoBccDatosEntrados' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccDatosEntrados' ) ;

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
        if( get_post_meta( $post->ID, $this->plugin_name . '_servicioActivo', true ) == true && strlen( get_post_meta( $post->ID, $this->plugin_name . '_servicioEmail', true ) ) > 0 ){
          wp_mail ( get_post_meta( $post->ID, $this->plugin_name . '_servicioEmail', true ), get_option('wpfunos_asuntoCorreoDatosEntrados') , $mensaje, $headers );
          do_action('wpfunos_log', '==============' );
          do_action('wpfunos_log', 'Enviar correo entrada datos al servicio' );
          do_action('wpfunos_log', 'userIP: ' . $userIP );
          do_action('wpfunos_log', '$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
          do_action('wpfunos_log', 'servicioEmail: ' . get_post_meta( $post->ID, $this->plugin_name . '_servicioEmail', true ) );
        }
      endforeach;
      wp_reset_postdata();
    }
    if( strlen( get_option('wpfunos_mailCorreoDatosEntrados') ) > 0 ){
      wp_mail ( get_option('wpfunos_mailCorreoDatosEntrados'), get_option('wpfunos_asuntoCorreoDatosEntrados') , $mensaje, $headers );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Enviar correo entrada datos al admin' );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', '$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
      do_action('wpfunos_log', 'mailCorreoDatosEntrados: ' . get_option('wpfunos_mailCorreoDatosEntrados') );
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
    $IP = $_POST['wpfip'];
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio Boton Enviar Datos' );
    $this->wpfunosServiciosv2Indeseados( $wpfemail, $wpftelefono );
    //'wpfurl: ?address%5B%5D=Valladolid
    //&post%5B%5D=precio_serv_wpfunos
    //&cf%5Bresp1%5D=2
    //&cf%5Bresp2%5D=2
    //&cf%5Bresp3%5D=2
    //&cf%5Bresp4%5D=1
    //&distance=200
    //&units=metric
    //&paged=1
    //&per_page=50
    //&lat=41.652251
    //&lng=-4.724532
    //&form=6
    //&action=fs
    //&CP=undefined'

    $URL = 'https://funos.es/compara-nuevos-resultados-2' .$wpfurl;
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
    $textoaccion = 'Entrada datos servicios';
    if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acción Usuario Desarrollador";
    do_action('wpfunos_update phone',$wpftelefono);
    $tel =  substr($wpftelefono,0,3).' '. substr($wpftelefono,3,2).' '. substr($wpftelefono,5,2).' '. substr($wpftelefono,7,2);

    $userURL = apply_filters('wpfunos_shortener', $URL );
    switch ( substr($params[3],14,2) ) {
      case '1': $userNombreSeleccionServicio = 'Entierro'; break;
      case '2': $userNombreSeleccionServicio = 'Incineración'; break;
    }
    switch ( substr($params[4],14,2) ) {
      case '2': $userNombreSeleccionAtaud = 'Ataúd Económico'; break;
      case '1': $userNombreSeleccionAtaud = 'Ataúd Medio'; break;
      case '3': $userNombreSeleccionAtaud = 'Ataúd Premium'; break;
    }
    switch ( substr($params[5],14,2)) {
      case '1': $userNombreSeleccionVelatorio = 'Velatorio'; break;
      case '2': $userNombreSeleccionVelatorio = 'Sin Velatorio'; break;
    }
    switch ( substr($params[6],14,2) ) {
      case '1': $userNombreSeleccionDespedida = 'Sin ceremonia'; break;
      case '2': $userNombreSeleccionDespedida = 'Solo sala'; break;
      case '3': $userNombreSeleccionDespedida = 'Ceremonia civil'; break;
      case '4': $userNombreSeleccionDespedida = 'Ceremonia religiosa'; break;
    }

    $codigo = str_replace(',', '+', $wpfnombre ). ',' .$wpfemail. ',' .$wpftelefono. ',' .$CP. ',' .$referencia;
    $wpf = apply_filters( 'wpfunos_crypt', $codigo , 'e' );
    //"N3l4RFh5U0NUaDJFMkx6YWUvbHJWdlB2V2NHRnc3d01iMXFZb1RudWloNXJuRkZSU3lDblNnREpveFMyTUpZNkJsbFkvaDBtSDRhUFZxeVloM1NIT1E9PQ=="

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
    if( $post_list ){
      foreach ( $post_list as $post ) :
        $contador++;
      endforeach;
      wp_reset_postdata();
    }
    $my_post = array(
      'post_title' => $referencia,
      'post_type' => 'usuarios_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        $this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
        $this->plugin_name . '_userMail' => sanitize_text_field( $wpfemail ),
        $this->plugin_name . '_userReferencia' => sanitize_text_field( $referencia ),
        $this->plugin_name . '_userName' => sanitize_text_field( $wpfnombre ),
        $this->plugin_name . '_userPhone' => sanitize_text_field( $tel ),
        $this->plugin_name . '_userCP' => sanitize_text_field( $CP ),
        $this->plugin_name . '_userAccion' => '0',
        $this->plugin_name . '_userNombreAccion' => sanitize_text_field( $textoaccion ),
        $this->plugin_name . '_userNombreSeleccionUbicacion' => sanitize_text_field( $address ),
        $this->plugin_name . '_userNombreSeleccionDistancia' => sanitize_text_field( $dist ),
        $this->plugin_name . '_userNombreSeleccionServicio' => sanitize_text_field( $userNombreSeleccionServicio ),
        $this->plugin_name . '_userNombreSeleccionAtaud' => sanitize_text_field( $userNombreSeleccionAtaud ),
        $this->plugin_name . '_userNombreSeleccionVelatorio' => sanitize_text_field( $userNombreSeleccionVelatorio ),
        $this->plugin_name . '_userNombreSeleccionDespedida' => sanitize_text_field( $userNombreSeleccionDespedida ),
        $this->plugin_name . '_userIP' => sanitize_text_field( $IP ),
        $this->plugin_name . '_userwpf' => sanitize_text_field( $wpf ),
        $this->plugin_name . '_userURL' => sanitize_text_field( $userURL ),
        $this->plugin_name . '_userAceptaPolitica' => '1',
        $this->plugin_name . '_userLAT' => sanitize_text_field( $lat ),
        $this->plugin_name . '_userLNG' => sanitize_text_field( $lng ),
        $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
        $this->plugin_name . '_userVisitas' => $contador,
        $this->plugin_name . '_Dummy' => true,
      ),
    );
    if( strlen( $wpftelefono) > 3 ){
      $post_id = wp_insert_post($my_post);
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '3. - Recogida datos usuario v2' );
      do_action('wpfunos_log', 'userIP: ' . $IP );
      do_action('wpfunos_log', 'Nombre: ' .  $wpfnombre );
      do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
      do_action('wpfunos_log', 'referencia: ' . $referencia );
      do_action('wpfunos_log', 'Telefono: ' . $wpftelefono );
    }else{
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Error 1 Nuevo Usuario: ' .  $IP  );
      do_action('wpfunos_log', 'referencia: ' .  $referencia );
    }
    //
    //  devolvemos entrada  javascript con "success" y con el título del servicio
    //
    $result['type'] = "success";
    $result['wpfnombre'] = $wpfnombre;
    $result['wpfemail'] = $wpfemail;
    $result['wpftelefono'] = $wpftelefono;
    $result['wpfcp'] = $CP;
    $result['wpfref'] = $referencia;
    $result['wpfwpf'] = $wpf;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

}

/**

#13-Jun-2022 13:06:38: String: '=============='
#13-Jun-2022 13:06:38: String: 'Llegada ajax Servicio Boton Enviar Datos'
#13-Jun-2022 13:06:38: String: '=============='
#13-Jun-2022 13:06:38: String: 'ReservedEmailAction'
#13-Jun-2022 13:06:38: String: 'current_user->user_email: efraim@efraim.cat'
#13-Jun-2022 13:06:38: String: 'wpfnombre: Efraim Bayarri'
#13-Jun-2022 13:06:38: String: 'wpfemail: efraim@efraim.cat'
#13-Jun-2022 13:06:38: String: 'wpftelefono: 690074497'
#13-Jun-2022 13:06:38: String: 'address: Valladolid'
#13-Jun-2022 13:06:38: String: 'resp1: 2'
#13-Jun-2022 13:06:38: String: 'resp2: 2'
#13-Jun-2022 13:06:38: String: 'resp3: 2'
#13-Jun-2022 13:06:38: String: 'resp4: 1'
#13-Jun-2022 13:06:38: String: 'dist: =200'
#13-Jun-2022 13:06:38: String: 'lat: 41.652251'
#13-Jun-2022 13:06:38: String: 'lng: -4.724532'
#13-Jun-2022 13:06:38: String: 'CP : 47002'
#13-Jun-2022 13:06:38: String: 'IP : 80.26.158.67'
#13-Jun-2022 13:06:38: String: 'referencia: funos-1291445508'
#13-Jun-2022 13:06:38: String: 'textoaccion: Acción Usuario Desarrollador'
*/
