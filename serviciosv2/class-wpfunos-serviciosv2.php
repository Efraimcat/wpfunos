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

  public function wpfunosServiciosResultadosShortcode($atts, $content = ""){
    echo do_shortcode( '[gmw_ajax_form search_form="6"]' );
  }

  public function wpfunosServiciosDatosShortcode($atts, $content = ""){
    if (is_user_logged_in()){
      $current_user = wp_get_current_user();
      $_GET['usuario_telefono'] = str_replace(" ","",get_user_meta( $current_user->ID, 'wpfunos_telefono' , true ));
      $_GET['Email'] = $current_user->user_email;
      $_GET['nombreUsuario'] = $current_user->display_name;
    }else{
      $_GET['usuario_telefono'] = $_COOKIE['wpft'];
      $_GET['Email'] = $_COOKIE['wpfe'];
      $_GET['nombreUsuario'] = $_COOKIE['wpft'];
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

    $wpfurl = str_replace('?address','&address',$wpfurl);
    $params = explode('&', $wpfurl );
    $address = substr($params[1],14,1000);
    $resp1 = substr($params[3],14,2);
    $resp2 = substr($params[4],14,2);
    $resp3 = substr($params[5],14,2);
    $resp4 = substr($params[6],14,2);
    $dist = substr($params[7],8,5);
    $lat = substr($params[11],4,10);
    $lng = substr($params[12],4,10);
    $cp = substr($params[15],3,10);
    $CP = $this->wpfunosCodigoPostal( $cp, $address );
    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();
    $textoaccion = 'Entrada datos servicios';
    if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acción Usuario Desarrollador";

//do_action('wpfunos_update phone', get_post_meta( $IDusuario, 'wpfunos_userPhone', true ) );







    //
    //  devolvemos entrada  javascript con "success" y con el título del servicio
    //
    $result['type'] = "success";
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
