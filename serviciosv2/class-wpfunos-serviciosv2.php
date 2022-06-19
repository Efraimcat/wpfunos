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
    add_shortcode( 'wpfunos-nuevos-datos-distancia', array( $this, 'wpfunosServiciosDatosDistanciaShortcode' ));
    add_shortcode( 'wpfunos-serviciosv2-precio-zona', array( $this, 'wpfunosServiciosPrecioZonaShortcode' ));
    add_shortcode( 'wpfunos-resultadosv2-imagenes', array( $this, 'wpfunosResultadosV2ImagesShortcode' ));
    add_shortcode( 'wpfunos-resultados-valoracion', array( $this, 'wpfunosResultadosV2ValoracionShortcode' ));
    add_shortcode( 'wpfunos-nuevos-datos-formulario', array( $this, 'wpfunosResultadosDatosFormularioShortcode' ));
    add_shortcode( 'wpfunos-serviciosv2-ventana-poblacion', array( $this, 'wpfunosServiciosVentanaPoblacionShortcode' ));
    add_shortcode( 'wpfunos-serviciosv2-ventana-destino', array( $this, 'wpfunosServiciosVentanaDestinoShortcode' ));

    add_action( 'wpfunos_resultv2_grid_confirmado', array( $this, 'wpfunosResultV2GridConfirmado' ), 10, 2 );
    add_action( 'wpfunos_resultv2_grid_sinconfirmar', array( $this, 'wpfunosResulV2tGridSinConfirmar' ), 10, 2 );

    add_action('wp_ajax_nopriv_wpfunos_ajax_serviciosv2_entrada_datos', function () { $this->wpfunosServiciosv2EntradaDatos();});
    add_action('wp_ajax_wpfunos_ajax_serviciosv2_entrada_datos', function () {$this->wpfunosServiciosv2EntradaDatos();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_serviciosv2_llamame', function () { $this->wpfunosServiciosBotonLlamame();});
    add_action('wp_ajax_wpfunos_ajax_serviciosv2_llamame', function () {$this->wpfunosServiciosBotonLlamame();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_serviciosv2_llamar', function () { $this->wpfunosServiciosBotonLlamar();});
    add_action('wp_ajax_wpfunos_ajax_serviciosv2_llamar', function () {$this->wpfunosServiciosBotonLlamar();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_serviciosv2_llamar_numero_telefono', function () { $this->wpfunosServiciosBotonLlamarNumero();});
    add_action('wp_ajax_wpfunos_ajax_serviciosv2_llamar_numero_telefono', function () {$this->wpfunosServiciosBotonLlamarNumero();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_serviciosv2_presupuesto', function () { $this->wpfunosServiciosBotonPresupuesto();});
    add_action('wp_ajax_wpfunos_ajax_serviciosv2_presupuesto', function () {$this->wpfunosServiciosBotonPresupuesto();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_serviciosv2_enviar_presupuesto', function () { $this->wpfunosServiciosBotonEnviarPresupuesto();});
    add_action('wp_ajax_wpfunos_ajax_serviciosv2_enviar_presupuesto', function () {$this->wpfunosServiciosBotonEnviarPresupuesto();});
    add_action('wp_ajax_nopriv_wpfunos_ajax_serviciosv2_detalles', function () { $this->wpfunosServiciosBotonDetalles();});
    add_action('wp_ajax_wpfunos_ajax_serviciosv2_detalles', function () {$this->wpfunosServiciosBotonDetalles();});
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
  * Shortcode [wpfunos-nuevos-datos-formulario]
  */
  public function wpfunosResultadosDatosFormularioShortcode($atts, $content = ""){
    $a = shortcode_atts( array(
      'boton'=>'',
    ), $atts );
    switch ( $a['boton'] ) {
      case 'destino':  echo $_GET['cf']['resp1']; break;
      case 'ataud': echo $_GET['cf']['resp2']; break;
      case 'velatorio': echo $_GET['cf']['resp3']; break;
      case 'ceremonia': echo $_GET['cf']['resp4']; break;
    }
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
    $nonce = wp_create_nonce("wpfunos_servicios_nonce");
    $ipaddress = apply_filters('wpfunos_userIP','dummy');
    $_GET['Atts'] = 'wpfn|' .$nonce.'
    wpfip|' .$ipaddress ;

    $args = array(
      'post_status' => 'publish',
      'post_type' => 'ubicaciones_wpfunos',
      'posts_per_page' => -1,
      'meta_key' =>  'wpfunos_ubicacionIP',
      'meta_value' => $ipaddress,
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
      'post_title' => $ubicacionReferencia,
      'post_type' => 'ubicaciones_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        $this->plugin_name . '_ubicacionIP' => sanitize_text_field( $ipaddress ),
        $this->plugin_name . '_ubicacionDireccion' => sanitize_text_field( $_GET['poblacion'] ),
        $this->plugin_name . '_ubicacionDistancia' => sanitize_text_field( $_GET['distance'] ),
        $this->plugin_name . '_ubicacionVisitas' => $contador,
        $this->plugin_name . '_Dummy' => true,
      ),
    );
    if( ! apply_filters('wpfunos_reserved_email','dummy') ) $post_id = wp_insert_post($my_post);

  }

  /**
  * Shortcode [wpfunos-serviciosv2-ventana-poblacion]
  */
  public function wpfunosServiciosVentanaPoblacionShortcode($atts, $content = ""){
    ?><script id="wpfunos-serviciosv2-ventana-poblacion">
    jQuery( document ).ready( function() {
      console.log('Ventana poblacion OK');
      document.getElementById("wpfunos-serviciosv2-cambiar-distancia").addEventListener('click', function(){
        console.log('ClickBotonDistancia OK');
        $('#wpfunos-serviciosv2-cambiar-distancia').hide();
        $('#wpfunos-formulario-nueva-distancia').show();
        document.getElementById("wpfunos-boton-formulario-nueva-distancia").addEventListener('click', function(){
          console.log('click');
          var newdistance = document.getElementById("form-field-nuevadistancia").value;
          var wpfref = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
          var wpfcp = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp");
          if( newdistance != ''){
            if( parseInt(newdistance) < 5 ) newdistance = '5';
            if( parseInt(newdistance) > 200 ) newdistance = '200';
            //location.search = location.search.replace(/distance=[^&$]*/i, 'distance='+newdistance);
            var params = new URLSearchParams(location.search);
            //if( params.get('wpfref') === 'dummy' && wpfref != 'dummy' ) params.set('wpfref', wpfref);
            //if( params.get('CP') === 'undefined' && wpfcp != 'dummy') params.set('CP', wpfcp);
            if( wpfref != 'dummy' ) params.set('wpfref', wpfref);
            if( wpfcp != 'dummy') params.set('CP', wpfcp);
            params.set('distance', newdistance );
            window.location.search = params.toString();
          }
        }, false);
      }, false);

    } );
    </script>
    <?php
  }

  /**
  * Shortcode [wpfunos-serviciosv2-ventana-destino]
  */
  public function wpfunosServiciosVentanaDestinoShortcode($atts, $content = ""){
    ?><script id="wpfunos-serviciosv2-ventana-destino">
    jQuery( document ).ready( function() {
      console.log('Ventana destino OK');
      document.getElementById("wpfunosEnviarDatos").addEventListener('click', function(){
        console.log('ClickBotonDestino OK');
        var r10 = document.getElementById("form-field-Destino-0").checked;
        var r20 = document.getElementById("form-field-Ataud-0").checked;
        var r21 = document.getElementById("form-field-Ataud-1").checked;
        var r30 = document.getElementById("form-field-Velatorio-0").checked;
        var r40 = document.getElementById("form-field-Despedida-0").checked;
        var r41 = document.getElementById("form-field-Despedida-1").checked;
        var r42 = document.getElementById("form-field-Despedida-2").checked;

        ( r10 == true ) ? resp1 = 1 : resp1 = 2 ;
        ( r20 == true ) ? resp2 = 1 : ( ( r21  == true ) ? resp2 = 2 : resp2 = 3 );
        ( r30 == true ) ? resp3 = 1 : resp3 = 2 ;
        ( r40 == true ) ? resp4 = 1 : ( ( r41 == true ) ? resp4 = 2 : ( ( r42 == true ) ) ? resp4 = 3 : resp4 = 4  );
        console.log('resp1 ' + resp1 );
        console.log('resp2 ' + resp2 );
        console.log('resp3 ' + resp3 );
        console.log('resp4 ' + resp4 );
        $("#elementor-popup-modal-58553").hide()
        var wpfref = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
        var wpfcp = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp");
        var params = new URLSearchParams(location.search);
        //if( params.get('wpfref') === 'dummy' && wpfref != 'dummy' ) params.set('wpfref', wpfref);
        //if( params.get('CP') === 'undefined' && wpfcp != 'dummy') params.set('CP', wpfcp);
        if( wpfref != 'dummy' ) params.set('wpfref', wpfref);
        if( wpfcp != 'dummy') params.set('CP', wpfcp);
        //($_GET['cf']['resp1'] == '1')
        params.set('cf[resp1]', resp1);
        params.set('cf[resp2]', resp2);
        params.set('cf[resp3]', resp3);
        params.set('cf[resp4]', resp4);
        //
        if( resp3 == '2' && resp4 == '1') params.set('distance', '100');
        //console.log(params.toString());
        window.location.search = params.toString();

      }, false);
    } );
    </script>
    <?php
  }

  /**
  * Shortcode [wpfunos-nuevos-datos-distancia]
  */
  public function wpfunosServiciosDatosDistanciaShortcode($atts, $content = ""){
    ElementorPro\Modules\Popup\Module::add_popup_to_location( '56688' ); //insert the popup to the current page
    ?><script id="wpfunos-serviciosv2-datos-distancia">
    jQuery( document ).ready( function() {
      console.log('Botones detalles OK');
      var params = new URLSearchParams(location.search);
      var orden = params.get('orden');

      if( params.get('orden') === 'precios'){
        //document.getElementById("wpfunos-boton-distancia").style.setProperty('background-color', '#ff9c00', 'important');
        //document.getElementById("wpfunos-boton-precio").style.setProperty('background-color', '#aaa', 'important');
        document.getElementById("wpfunos-titulo-orden").innerHTML = 'Los resultados estan ordenados por precio.';
        document.getElementById("wpfunos-boton-precio").innerHTML = 'Distancia';
      }else{
        //document.getElementById("wpfunos-boton-distancia").style.setProperty('background-color', '#aaa', 'important');
        //document.getElementById("wpfunos-boton-precio").style.setProperty('background-color', '#ff9c00', 'important');
        document.getElementById("wpfunos-titulo-orden").innerHTML = 'Los resultados estan ordenados por distancia.';
        document.getElementById("wpfunos-boton-precio").innerHTML = 'Precio';
      }
      document.getElementById("wpfunos-boton-precio").addEventListener('click', function(){
        console.log('click cambiar orden');
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
  * Shortcode [wpfunos-nuevos-datos]
  *
  * 1. - Entrada comparador servicios v2
  * 2. - Entrada página resultados v2
  * 3. - Entrada formulario datos personales v2
  * 4. - Entrada sin formulario datos personales v2
  * 5. - Recogida datos usuario v2
  * 6. - Página resultados v2
  */
  //https://cutt.ly/9KeHhN4

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
      ?><script id="wpfunos-serviciosv2-home"> $("#wpfunos-servicios-geo").hide(); console.log('unwanted'); window.location.href = "/"; </script><?php
      return;
    }

    require 'js/' . $this->plugin_name . '-serviciosv2-botones.js';

    echo do_shortcode( '[gmw_ajax_form search_results="7"]' );
    //$cookie_nombre = $_COOKIE['wpfn'];
    //$cookie_email = $_COOKIE['wpfe'];
    //$cookie_telefono = $_COOKIE['wpft'];
    //if( '' == $cookie_nombre || '' == $cookie_email || '' == $cookie_telefono){
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '2. - Entrada página resultados v2' );
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
    /** */
    if( $_GET['wpfref'] != 'dummy' ){
      $IDusuario = apply_filters('wpfunos_userID', $_GET['wpfref'] );
      if( $IDusuario == 0 && !apply_filters('wpfunos_reserved_email','dummy') ){
        do_action('wpfunos_log', 'wpfref existe pero no es correcto !' );
        do_action('wpfunos_log', 'wpfref: ' . $_GET['wpfref']);
        do_action('wpfunos_log', 'IP: ' . $ipaddress);
        do_action('wpfunos_log', 'Redireccionando a home !' );
        wp_redirect( home_url() );
        die();
      }
      do_action('wpfunos_log', 'El IDusuario es correcto.' );
    }
    if( $_GET['wpfref'] == 'dummy' || !isset($_COOKIE['wpfe']) || !isset($_COOKIE['wpft']) || !isset($_COOKIE['wpfn']) ){
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

      $popup_id = '56948'; //your Popup ID.
      ElementorPro\Modules\Popup\Module::add_popup_to_location( $popup_id ); //insert the popup to the current page
      ?><script id="wpfunos-serviciosv2-datos">
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
                });
              }
            }, false);
          } );
        } );
      } );
      </script>
      <?php
      /** */
    }else{
      // comprobar que $_GET['wpfref'] tiene un valor existente
      // sino enviar a home.
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '4. - Entrada sin formulario datos personales v2' );
      do_action('wpfunos_log', 'wpfref: ' . $_GET['wpfref']);
      do_action('wpfunos_log', 'cookie wpfe: ' . $_COOKIE['wpfe']);
      do_action('wpfunos_log', 'cookie wpfn: ' . $_COOKIE['wpfn']);
      do_action('wpfunos_log', 'cookie wpft: ' . $_COOKIE['wpft']);
      do_action('wpfunos_log', 'IP: ' . $ipaddress);
      $IDusuario = apply_filters('wpfunos_userID', $_GET['wpfref'] );
      do_action('wpfunos_log', 'IDusuario: ' . $IDusuario );
      if( $IDusuario == 0 && !apply_filters('wpfunos_reserved_email','dummy') ){
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', 'wpfref existe pero no es correcto !!' );
        do_action('wpfunos_log', 'wpfref: '. $_GET['wpfref']);
        do_action('wpfunos_log', 'IP: ' . $ipaddress);
        do_action('wpfunos_log', 'Redireccionando a home !!' );
        wp_redirect( home_url() );
        die();
      }
      do_action('wpfunos_log', 'El IDusuario es correcto.' );
      ?>
      <script id="wpfunos-serviciosv2-registrado">

      console.log('ya está registrado');
      wpfnombre = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre");
      wpfemail = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail");
      wpftelefono = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");
      //var nonce = document.getElementById("wpfunos-formulario-entrada-datos").getAttribute("wpfn");
      //var ip = document.getElementById("wpfunos-formulario-entrada-datos").getAttribute("wpfip");
      var nonce = '';
      var ip = '';
      var url = window.location.search;
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_serviciosv2_entrada_datos",
          "wpfnombre": wpfnombre,
          "wpfemail": wpfemail,
          "wpftelefono": wpftelefono,
          "wpfurl" : url,
          "wpnonce" : nonce,
          "wpfip" : ip,
        },
        success: function(response) {
          console.log(response)	;
          if(response.type == "success") {
            console.log('success');
            var date = new Date();
            date.setTime(date.getTime() + (30*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
            document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfnombre", response.wpfnombre);
            document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfemail", response.wpfemail);
            document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpftelefono", response.wpftelefono);
            document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfcp", response.wpfcp);
            document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfref", response.wpfref);
            document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfwpf", response.wpfwpf);
            document.cookie = "wpfc=" + response.wpfcp + expires + "; path=/; SameSite=Lax; secure";
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
      });
      </script>
      <?php
    }
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '6. - Página resultados preparada v2' );
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
    /** */
    //
  }

  /**
  * Shortcode [wpfunos-serviciosv2-precio-zona]
  */
  public function wpfunosServiciosPrecioZonaShortcode($atts, $content = ""){
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

  /**
  * Shortcode [wpfunos-resultadosv2-imagenes imagen="logo"]
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

  /**
  * Shortcode [wpfunos-resultados-valoracion]
  */
  public function wpfunosResultadosV2ValoracionShortcode( $atts, $content = "" ) {
    return (int)$_GET['valor-valoracion'];
  }
  /*********************************/
  /*****                      ******/
  /*********************************/
  /**
  * Hook mostrar entrada con precio confirmados
  *
  * do_action( 'wpfunos_resultv2_grid_confirmado', $wpfunos_confirmado );
  * add_action( 'wpfunos_resultv2_grid_confirmado', array( $this, 'wpfunosResultV2GridConfirmado' ), 10, 1 );
  */
  public function wpfunosResultV2GridConfirmado( $wpfunos_confirmado ){
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

        $nonce = wp_create_nonce("wpfunos_serviciosv2_nonce");
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
        echo do_shortcode( '[elementor-template id="58463"]' ) ;
        ?></div><?php
      }
    }
  }

  /**
  * Hook mostrar entrada con precio confirmados
  *
  * do_action( 'wpfunos_resultv2_grid_sinconfirmar', $wpfunos_sinconfirmar );
  * add_action( 'wpfunos_resultv2_grid_sinconfirmar', array( $this, 'wpfunosResulV2tGridSinConfirmar' ), 10, 1 );
  */
  public function wpfunosResulV2tGridSinConfirmar( $wpfunos_sinconfirmar ){
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
        echo do_shortcode( '[elementor-template id="58463"]' ) ;
        ?></div><?php
      }
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

    if( $CodigoPostal == 'undefined' || $CodigoPostal == '' || $CodigoPostal == 'false'){
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
    if($wpfnombre == 'dummy') $wpfnombre = $_COOKIE['wpfn'];
    if($wpfemail == 'dummy') $wpfemail = $_COOKIE['wpfe'];
    if($wpftelefono == 'dummy') $wpftelefono = $_COOKIE['wpft'];

    $wpfurl = $_POST['wpfurl'];
    $wpnonce = $_POST['wpnonce'];
    $IP = apply_filters('wpfunos_userIP','dummy');
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio Boton Enviar Datos' );
    do_action('wpfunos_log', 'Ajax: wpfnombre ' .$wpfnombre );
    do_action('wpfunos_log', 'Ajax: wpfemail ' .$wpfemail );
    do_action('wpfunos_log', 'Ajax: wpftelefono ' .$wpftelefono );
    $this->wpfunosServiciosv2Indeseados( $wpfemail, $wpftelefono );

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

    $codigo = str_replace(',', '+', $wpfnombre ). ',' .$wpfemail. ',' .$wpftelefono ;
    $wpf = apply_filters( 'wpfunos_crypt', $codigo , 'e' );

    $userURL = apply_filters('wpfunos_shortener', $URL );

    $textoaccion = 'Entrada datos servicios';
    if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acción Usuario Desarrollador";
    do_action('wpfunos_update phone',$wpftelefono);
    $tel =  substr($wpftelefono,0,3).' '. substr($wpftelefono,3,2).' '. substr($wpftelefono,5,2).' '. substr($wpftelefono,7,2);

    switch ( substr($params[3],14,2) ) { case '1': $servicio = 'Entierro'; break; case '2': $servicio = 'Incineración'; break; }
    switch ( substr($params[4],14,2) ) { case '2': $ataud = 'Ataúd Económico'; break; case '1': $ataud = 'Ataúd Medio'; break; case '3': $ataud = 'Ataúd Premium'; break; }
    switch ( substr($params[5],14,2)) { case '1': $velatorio = 'Velatorio'; break; case '2': $velatorio = 'Sin Velatorio'; break; }
    switch ( substr($params[6],14,2) ) {  case '1': $ceremonia = 'Sin ceremonia'; break; case '2': $ceremonia = 'Solo sala'; break; case '3': $ceremonia = 'Ceremonia civil'; break; case '4': $ceremonia = 'Ceremonia religiosa'; break; }

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
        $this->plugin_name . '_userNombreSeleccionServicio' => sanitize_text_field( $servicio ),
        $this->plugin_name . '_userNombreSeleccionAtaud' => sanitize_text_field( $ataud ),
        $this->plugin_name . '_userNombreSeleccionVelatorio' => sanitize_text_field( $velatorio ),
        $this->plugin_name . '_userNombreSeleccionDespedida' => sanitize_text_field( $ceremonia ),
        $this->plugin_name . '_userIP' => sanitize_text_field( $IP ),
        $this->plugin_name . '_userwpf' => sanitize_text_field( $wpf ),
        $this->plugin_name . '_userURL' => sanitize_text_field( $userURL ),
        $this->plugin_name . '_userAceptaPolitica' => '1',
        $this->plugin_name . '_userLAT' => sanitize_text_field( $lat ),
        $this->plugin_name . '_userLNG' => sanitize_text_field( $lng ),
        $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
        $this->plugin_name . '_userVisitas' => $contador,
        $this->plugin_name . '_userLead' => true,
        $this->plugin_name . '_Dummy' => true,
      ),
    );
    if( strlen( $wpftelefono) > 3 ){
      //$post_id = wp_insert_post($my_post);
      if( ! apply_filters('wpfunos_reserved_email','dummy') ) $post_id = wp_insert_post($my_post);
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '5. - Recogida datos usuario v2' );
      do_action('wpfunos_log', 'userIP: ' . $IP );
      do_action('wpfunos_log', 'Nombre: ' .  $wpfnombre );
      do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
      do_action('wpfunos_log', 'referencia: ' . $referencia );
      do_action('wpfunos_log', 'Telefono: ' . $wpftelefono );
    }else{
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '5. - Recogida datos usuario v2 Error: ' .  $IP  );
      do_action('wpfunos_log', 'referencia: ' .  $referencia );
      do_action('wpfunos_log', 'Nombre: ' .  $wpfnombre );
      do_action('wpfunos_log', 'referencia: ' . $referencia );
      do_action('wpfunos_log', 'Telefono: ' . $wpftelefono );
    }
    if( !apply_filters('wpfunos_reserved_email','dummy') &&  get_option('wpfunos_activarCorreov2Admin') ){
      $headers[] = 'Content-Type: text/html; charset=UTF-8';
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreov2Admin'), get_option('wpfunos_asuntoCorreov2Admin') );
      $mensaje = str_replace( '[email]' , $wpfemail , $mensaje );
      $mensaje = str_replace( '[referencia]' , $referencia , $mensaje );
      $mensaje = str_replace( '[IP]' , $IP , $mensaje );
      $mensaje = str_replace( '[URL]' , $userURL , $mensaje );
      $mensaje = str_replace( '[nombre]' , $wpfnombre , $mensaje );
      $mensaje = str_replace( '[telefono]' , substr($wpftelefono,0,3).' '. substr($wpftelefono,3,2).' '. substr($wpftelefono,5,2).' '. substr($wpftelefono,7,2) , $mensaje );
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
    $result['wpfnombre'] = $wpfnombre;
    $result['wpfemail'] = $wpfemail;
    $result['wpftelefono'] = $wpftelefono;
    $result['wpfcp'] = $CP;
    $result['wpfref'] = $referencia;
    $result['wpfwpf'] = $wpf;
    $result['userURL'] = $userURL;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  /*********************************/
  /*****  AJAX BOTONES SERVICIOS ***/
  /*********************************/

  /**
  * Botón Que me llamen
  */
  public function wpfunosServiciosBotonLlamame(){
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio BotonLlamame' );
    //
    if ( !wp_verify_nonce( $_POST['wpnonce'], "wpfunos_serviciosv2_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    $titulo = get_post_meta( $_POST['servicio'], "wpfunos_servicioNombre", true);
    do_action('wpfunos_log', 'Servicio titulo: ' . $titulo );
    switch($_POST['resp1']){ case '1': $destino = 'E' ; $nombredestino = 'Entierro'; break; case '2': $destino = 'I' ; $nombredestino = 'Incineración'; break; }
    switch($_POST['resp2']){ case '1': $ataud = 'M' ; $nombreataud = 'Ataúd medio'; break; case '2': $ataud = 'E' ; $nombreataud = 'Ataúd económico'; break; case '3': $ataud = 'P' ; $nombreataud = 'Ataúd premium'; break; }
    switch($_POST['resp3']){ case '1': $velatorio = 'V' ; $nombrevelatorio = 'Velatorio' ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = 'Sin velatorio' ; break; }
    switch($_POST['resp4']){ case '1': $despedida = 'S' ; $nombredespedida = 'Sin ceremonia' ; break; case '2': $despedida = 'O' ; $nombredespedida = 'Solo sala' ; break; case '3': $despedida = 'C' ; $nombredespedida = 'Ceremonia civil' ; break; case '4': $despedida = 'R' ; $nombredespedida = 'Ceremonia religiosa' ; break; }
    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();
    $textoaccion = 'Botón llamen servicios' ;
    $tel =  substr($_POST['telefono'],0,3).' '. substr($_POST['telefono'],3,2).' '. substr($_POST['telefono'],5,2).' '. substr($_POST['telefono'],7,2);
    $my_post = array(
      'post_title' => $referencia,
      'post_type' => 'usuarios_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        $this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
        $this->plugin_name . '_userMail' => sanitize_text_field( $_POST['email'] ),
        $this->plugin_name . '_userReferencia' => sanitize_text_field( $referencia ),
        $this->plugin_name . '_userName' => sanitize_text_field( $_POST['nombre'] ),
        $this->plugin_name . '_userPhone' => sanitize_text_field( $tel ),
        $this->plugin_name . '_userCP' => sanitize_text_field( $_POST['cp'] ),
        $this->plugin_name . '_userNombreSeleccionUbicacion' => sanitize_text_field( $_POST['poblacion'] ),
        $this->plugin_name . '_userNombreSeleccionDistancia' => sanitize_text_field( $_POST['distance'] ),
        $this->plugin_name . '_userNombreSeleccionServicio' => sanitize_text_field( $nombredestino ),
        $this->plugin_name . '_userNombreSeleccionAtaud' => sanitize_text_field( $nombreataud ),
        $this->plugin_name . '_userNombreSeleccionVelatorio' => sanitize_text_field( $nombrevelatorio  ),
        $this->plugin_name . '_userNombreSeleccionDespedida' => sanitize_text_field( $nombredespedida ),
        $this->plugin_name . '_userServicio' => sanitize_text_field( $_POST['servicio']),
        $this->plugin_name . '_userServicioEnviado' => true,
        $this->plugin_name . '_userAceptaPolitica' => true,
        $this->plugin_name . '_userAccion' => sanitize_text_field( '1' ),
        $this->plugin_name . '_userNombreAccion' => sanitize_text_field( $textoaccion ),
        $this->plugin_name . '_userServicioTitulo' => sanitize_text_field( get_the_title( $_POST['servicio'] ) ),
        $this->plugin_name . '_userServicioEmpresa' => sanitize_text_field( get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmpresa', true ) ),
        $this->plugin_name . '_userServicioPoblacion' => sanitize_text_field( get_post_meta( $_POST['servicio'], 'wpfunos_servicioPoblacion', true ) ),
        $this->plugin_name . '_userServicioProvincia' => sanitize_text_field( get_post_meta( $_POST['servicio'], 'wpfunos_servicioProvincia', true ) ),
        $this->plugin_name . '_userPrecio' => number_format( sanitize_text_field( $_POST['precio'] ), 0, ',', '.') . '€',
        $this->plugin_name . '_userIP' => sanitize_text_field( apply_filters('wpfunos_userIP','dummy') ),
        $this->plugin_name . '_userLAT' => sanitize_text_field( $_POST['lat'] ),
        $this->plugin_name . '_userLNG' => sanitize_text_field( $_POST['lng'] ),
        $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
        $this->plugin_name . '_Dummy' => true,
      ),
    );
    if( !apply_filters('wpfunos_reserved_email','dummy') ) $post_id = wp_insert_post($my_post);
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '1. - Botón llamame servicio' );
    do_action('wpfunos_log', 'userIP: ' . apply_filters('wpfunos_userIP','dummy') );
    do_action('wpfunos_log', 'Nombre: ' .  $_POST['nombre']  );
    do_action('wpfunos_log', 'referencia: ' . $referencia );
    do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
    //
    if( get_option('wpfunos_activarCorreoBoton1v2Admin') && !apply_filters('wpfunos_reserved_email','dummy')){
      $headers[] = 'Content-Type: text/html; charset=UTF-8';
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton1v2Admin'), get_option('wpfunos_asuntoCorreoBoton1v2Admin') );
      $mensaje = str_replace( '[email]' , $_POST['email'] , $mensaje );
      $mensaje = str_replace( '[referencia]' , $referencia , $mensaje );
      $mensaje = str_replace( '[IP]' , apply_filters('wpfunos_userIP','dummy') , $mensaje );
      $mensaje = str_replace( '[nombreUsuario]' , $_POST['nombre'] , $mensaje );
      $mensaje = str_replace( '[telefonoUsuario]' , $tel , $mensaje );
      $mensaje = str_replace( '[poblacion]' , $_POST['poblacion'] , $mensaje );
      $mensaje = str_replace( '[CP]' , $_POST['cp'] , $mensaje );
      $mensaje = str_replace( '[destino]' , $nombredestino , $mensaje );
      $mensaje = str_replace( '[ataud]' , $nombreataud , $mensaje );
      $mensaje = str_replace( '[velatorio]' ,$nombrevelatorio , $mensaje );
      $mensaje = str_replace( '[ceremonia]' , $nombredespedida , $mensaje );
      $mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $_POST['precio'] ), 0, ',', '.') . '€' , $mensaje );
      $mensaje = str_replace( '[nombreServicio]' , $titulo , $mensaje );
      $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $_POST['servicio'], "wpfunos_servicioTelefono", true)  , $mensaje );
      $mensaje = str_replace( '[comentarios]' , get_post_meta( $_POST['servicio'], 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
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
      do_action('wpfunos_log', 'userIP: ' . apply_filters('wpfunos_userIP','dummy') );
      do_action('wpfunos_log', 'Nombre: ' . $_POST['nombre'] );
      do_action('wpfunos_log', '$referencia: ' . $referencia );
    }
    $result['type'] = "success";
    $result['titulo'] = get_the_title( $_POST['servicio']);
    $result['ip'] = apply_filters('wpfunos_userIP','dummy');
    $result['ref'] = $referencia;
    $result['nombre'] = $_POST['nombre'];
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  /**
  * Botón Llamar
  */
  public function wpfunosServiciosBotonLlamar(){
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio BotonLlamar' );
    //
    if ( !wp_verify_nonce( $_POST['wpnonce'], "wpfunos_serviciosv2_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    $titulo = get_post_meta( $_POST['servicio'], "wpfunos_servicioNombre", true);
    do_action('wpfunos_log', 'Servicio titulo: ' . $titulo );
    switch($_POST['resp1']){ case '1': $destino = 'E' ; $nombredestino = 'Entierro'; break; case '2': $destino = 'I' ; $nombredestino = 'Incineración'; break; }
    switch($_POST['resp2']){ case '1': $ataud = 'M' ; $nombreataud = 'Ataúd medio'; break; case '2': $ataud = 'E' ; $nombreataud = 'Ataúd económico'; break; case '3': $ataud = 'P' ; $nombreataud = 'Ataúd premium'; break; }
    switch($_POST['resp3']){ case '1': $velatorio = 'V' ; $nombrevelatorio = 'Velatorio' ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = 'Sin velatorio' ; break; }
    switch($_POST['resp4']){ case '1': $despedida = 'S' ; $nombredespedida = 'Sin ceremonia' ; break; case '2': $despedida = 'O' ; $nombredespedida = 'Solo sala' ; break; case '3': $despedida = 'C' ; $nombredespedida = 'Ceremonia civil' ; break; case '4': $despedida = 'R' ; $nombredespedida = 'Ceremonia religiosa' ; break; }
    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();
    $textoaccion = 'Botón llamar servicios' ;
    $tel =  substr($_POST['telefono'],0,3).' '. substr($_POST['telefono'],3,2).' '. substr($_POST['telefono'],5,2).' '. substr($_POST['telefono'],7,2);
    $my_post = array(
      'post_title' => $referencia,
      'post_type' => 'usuarios_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        $this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
        $this->plugin_name . '_userMail' => sanitize_text_field( $_POST['email'] ),
        $this->plugin_name . '_userReferencia' => sanitize_text_field( $referencia ),
        $this->plugin_name . '_userName' => sanitize_text_field( $_POST['nombre'] ),
        $this->plugin_name . '_userPhone' => sanitize_text_field( $tel ),
        $this->plugin_name . '_userCP' => sanitize_text_field( $_POST['cp'] ),
        $this->plugin_name . '_userNombreSeleccionUbicacion' => sanitize_text_field( $_POST['poblacion'] ),
        $this->plugin_name . '_userNombreSeleccionDistancia' => sanitize_text_field( $_POST['distance'] ),
        $this->plugin_name . '_userNombreSeleccionServicio' => sanitize_text_field( $nombredestino ),
        $this->plugin_name . '_userNombreSeleccionAtaud' => sanitize_text_field( $nombreataud ),
        $this->plugin_name . '_userNombreSeleccionVelatorio' => sanitize_text_field( $nombrevelatorio  ),
        $this->plugin_name . '_userNombreSeleccionDespedida' => sanitize_text_field( $nombredespedida ),
        $this->plugin_name . '_userServicio' => sanitize_text_field( $_POST['servicio']),
        $this->plugin_name . '_userServicioEnviado' => true,
        $this->plugin_name . '_userAceptaPolitica' => true,
        $this->plugin_name . '_userAccion' => sanitize_text_field( '2' ),
        $this->plugin_name . '_userNombreAccion' => sanitize_text_field( $textoaccion ),
        $this->plugin_name . '_userServicioTitulo' => sanitize_text_field( get_the_title( $_POST['servicio'] ) ),
        $this->plugin_name . '_userServicioEmpresa' => sanitize_text_field( get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmpresa', true ) ),
        $this->plugin_name . '_userServicioPoblacion' => sanitize_text_field( get_post_meta( $_POST['servicio'], 'wpfunos_servicioPoblacion', true ) ),
        $this->plugin_name . '_userServicioProvincia' => sanitize_text_field( get_post_meta( $_POST['servicio'], 'wpfunos_servicioProvincia', true ) ),
        $this->plugin_name . '_userPrecio' => number_format( sanitize_text_field( $_POST['precio'] ), 0, ',', '.') . '€',
        $this->plugin_name . '_userIP' => sanitize_text_field( apply_filters('wpfunos_userIP','dummy') ),
        $this->plugin_name . '_userLAT' => sanitize_text_field( $_POST['lat'] ),
        $this->plugin_name . '_userLNG' => sanitize_text_field( $_POST['lng'] ),
        $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
        $this->plugin_name . '_Dummy' => true,
      ),
    );
    if( !apply_filters('wpfunos_reserved_email','dummy') ) $post_id = wp_insert_post($my_post);
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '2. - Botón llamar servicio' );
    do_action('wpfunos_log', 'userIP: ' . apply_filters('wpfunos_userIP','dummy') );
    do_action('wpfunos_log', 'Nombre: ' .  $_POST['nombre']  );
    do_action('wpfunos_log', 'referencia: ' . $referencia );
    do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
    //
    if( get_option('wpfunos_activarCorreoBoton2v2Admin') && !apply_filters('wpfunos_reserved_email','dummy')){
      $headers[] = 'Content-Type: text/html; charset=UTF-8';
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton2v2Admin'), get_option('wpfunos_asuntoCorreoBoton2v2Admin') );
      $mensaje = str_replace( '[email]' , $_POST['email'] , $mensaje );
      $mensaje = str_replace( '[referencia]' , $referencia , $mensaje );
      $mensaje = str_replace( '[IP]' , apply_filters('wpfunos_userIP','dummy') , $mensaje );
      $mensaje = str_replace( '[nombreUsuario]' , $_POST['nombre'] , $mensaje );
      $mensaje = str_replace( '[telefonoUsuario]' , $tel , $mensaje );
      $mensaje = str_replace( '[poblacion]' , $_POST['poblacion'] , $mensaje );
      $mensaje = str_replace( '[CP]' , $_POST['cp'] , $mensaje );
      $mensaje = str_replace( '[destino]' , $nombredestino , $mensaje );
      $mensaje = str_replace( '[ataud]' , $nombreataud , $mensaje );
      $mensaje = str_replace( '[velatorio]' ,$nombrevelatorio , $mensaje );
      $mensaje = str_replace( '[ceremonia]' , $nombredespedida , $mensaje );
      $mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $_POST['precio'] ), 0, ',', '.') . '€' , $mensaje );
      $mensaje = str_replace( '[nombreServicio]' , $titulo , $mensaje );
      $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $_POST['servicio'], "wpfunos_servicioTelefono", true)  , $mensaje );
      $mensaje = str_replace( '[comentarios]' , get_post_meta( $_POST['servicio'], 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
      if(!empty( get_option('wpfunos_mailCorreoCcoBoton2v2Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2v2Admin' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccBoton2v2Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2v2Admin' ) ;
      //wp_mail (  get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoBoton2v2Admin') , $mensaje, $headers );
      wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoBoton2v2Admin') , $mensaje, $headers );
      update_post_meta( $post_id, 'wpfunos_userLead', true );
      do_action('wpfunos_log', '==============' );
      //do_action('wpfunos_log', 'Enviado correo lead1 ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
      do_action('wpfunos_log', 'Enviado correo lead2 efraim@efraim.cat' );
      do_action('wpfunos_log', 'Enviado CCO ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoCcoBoton2v2Admin' ) ) );
      do_action('wpfunos_log', 'Enviado BCC ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoBccBoton2v2Admin' ) ) );
      do_action('wpfunos_log', 'userIP: ' . apply_filters('wpfunos_userIP','dummy') );
      do_action('wpfunos_log', 'Nombre: ' . $_POST['nombre'] );
      do_action('wpfunos_log', '$referencia: ' . $referencia );
    }
    $result['type'] = "success";
    $result['titulo'] = get_the_title( $_POST['servicio']);
    $result['ip'] = apply_filters('wpfunos_userIP','dummy');
    $result['ref'] = $referencia;
    $result['nombre'] = $_POST['nombre'];
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  /**
  * Devolver numero de teléfono del servicio a llamar
  */
  public function wpfunosServiciosBotonLlamarNumero(){
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio número de teléfono' );
    //
    if ( !wp_verify_nonce( $_POST['wpnonce'], "wpfunos_serviciosv2_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    $titulo = get_post_meta( $_POST['servicio'], "wpfunos_servicioNombre", true);
    do_action('wpfunos_log', 'Servicio titulo: ' . $titulo );

    $result['type'] = "success";
    $result['titulo'] = get_the_title( $_POST['servicio']);
    $result['ip'] = apply_filters('wpfunos_userIP','dummy');
    $result['telefono'] = get_post_meta( $_POST['servicio'], 'wpfunos_servicioTelefono', true );
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  public function wpfunosServiciosBotonPresupuesto(){
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio BotonPresupuesto' );
    if ( !wp_verify_nonce( $_POST['wpnonce'], "wpfunos_serviciosv2_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    $titulo = get_post_meta( $_POST['servicio'], "wpfunos_servicioNombre", true);
    do_action('wpfunos_log', 'Titulo: ' . $titulo );

    $result['type'] = "success";
    $result['titulo'] = $titulo;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  public function wpfunosServiciosBotonEnviarPresupuesto(){
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio BotonEnviarPresupuesto' );
    if ( !wp_verify_nonce( $_POST['wpnonce'], "wpfunos_serviciosv2_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    $titulo = get_post_meta( $_POST['servicio'], "wpfunos_servicioNombre", true);
    do_action('wpfunos_log', 'Titulo: ' . $titulo );
    do_action('wpfunos_log', 'Nombre: ' . $_POST['nombre'] );
    do_action('wpfunos_log', 'Email: ' . $_POST['email'] );
    do_action('wpfunos_log', 'Mensaje: ' . $_POST['mensaje'] );
    switch($_POST['resp1']){ case '1': $destino = 'E' ; $nombredestino = 'Entierro'; break; case '2': $destino = 'I' ; $nombredestino = 'Incineración'; break; }
    switch($_POST['resp2']){ case '1': $ataud = 'M' ; $nombreataud = 'Ataúd medio'; break; case '2': $ataud = 'E' ; $nombreataud = 'Ataúd económico'; break; case '3': $ataud = 'P' ; $nombreataud = 'Ataúd premium'; break; }
    switch($_POST['resp3']){ case '1': $velatorio = 'V' ; $nombrevelatorio = 'Velatorio' ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = 'Sin velatorio' ; break; }
    switch($_POST['resp4']){ case '1': $despedida = 'S' ; $nombredespedida = 'Sin ceremonia' ; break; case '2': $despedida = 'O' ; $nombredespedida = 'Solo sala' ; break; case '3': $despedida = 'C' ; $nombredespedida = 'Ceremonia civil' ; break; case '4': $despedida = 'R' ; $nombredespedida = 'Ceremonia religiosa' ; break; }
    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();
    if( !apply_filters('wpfunos_reserved_email','dummy') ){
      $my_post = array(
        'post_title' => $referencia,
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          'wpfunos_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          'wpfunos_userMail' => sanitize_text_field( $_POST['email'] ),
          'wpfunos_userReferencia' => sanitize_text_field( $referencia ),
          'wpfunos_userName' => sanitize_text_field( $_POST['nombre'] ),
          'wpfunos_userPhone' => sanitize_text_field( substr($_POST['telefono'],0,3).' '. substr($_POST['telefono'],3,2).' '. substr($_POST['telefono'],5,2).' '. substr($_POST['telefono'],7,2) ),
          'wpfunos_userCP' => sanitize_text_field( $_POST['cp'] ),
          'wpfunos_userNombreSeleccionUbicacion' => sanitize_text_field( $_POST['poblacion'] ),
          'wpfunos_userNombreSeleccionDistancia' => sanitize_text_field( $_POST['distance'] ),
          'wpfunos_userNombreSeleccionServicio' => sanitize_text_field( $nombredestino ),
          'wpfunos_userNombreSeleccionAtaud' => sanitize_text_field( $nombreataud ),
          'wpfunos_userNombreSeleccionVelatorio' => sanitize_text_field( $nombrevelatorio  ),
          'wpfunos_userNombreSeleccionDespedida' => sanitize_text_field( $nombredespedida ),
          'wpfunos_userServicio' => sanitize_text_field( $_POST['servicio']),
          'wpfunos_userServicioEnviado' => true,
          'wpfunos_userAceptaPolitica' => true,
          'wpfunos_userAccion' => '5',
          'wpfunos_userNombreAccion' => 'Botón pedir presupuesto',
          'wpfunos_userServicioTitulo' => sanitize_text_field( get_the_title( $_POST['servicio'] ) ),
          'wpfunos_userServicioEmpresa' => sanitize_text_field( get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmpresa', true ) ),
          'wpfunos_userServicioPoblacion' => sanitize_text_field( get_post_meta( $_POST['servicio'], 'wpfunos_servicioPoblacion', true ) ),
          'wpfunos_userServicioProvincia' => sanitize_text_field( get_post_meta( $_POST['servicio'], 'wpfunos_servicioProvincia', true ) ),
          'wpfunos_userPrecio' => number_format( sanitize_text_field( $_POST['precio'] ), 0, ',', '.') . '€',
          'wpfunos_userComentarios' => wp_kses_post( $_POST['mensaje'] ),
          'wpfunos_userIP' => sanitize_text_field( apply_filters('wpfunos_userIP','dummy') ),
          'wpfunos_userLAT' => sanitize_text_field( $_POST['lat'] ),
          'wpfunos_userLNG' => sanitize_text_field( $_POST['lng'] ),
          'wpfunos_userPluginVersion' => sanitize_text_field( $this->version ),
          'wpfunos_Dummy' => true,
        ),
      );
      $post_id = wp_insert_post($my_post);
    }
    if( get_option('wpfunos_activarCorreoPresupuestoLead') && !apply_filters('wpfunos_reserved_email','dummy')){
      $headers[] = 'Content-Type: text/html; charset=UTF-8';
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoPresupuestoLead'), get_option('wpfunos_asuntoCorreoPresupuestoLead') );
      $mensaje = str_replace( '[email]' , $_POST['email'] , $mensaje );
      $mensaje = str_replace( '[referencia]' , $referencia , $mensaje );
      $mensaje = str_replace( '[IP]' , apply_filters('wpfunos_userIP','dummy') , $mensaje );
      $mensaje = str_replace( '[nombreUsuario]' , $_POST['nombre'] , $mensaje );
      $mensaje = str_replace( '[telefonoUsuario]' , $_POST['telefono'], $mensaje );
      $mensaje = str_replace( '[poblacion]' , $_POST['poblacion'] , $mensaje );
      $mensaje = str_replace( '[CP]' , $_POST['cp'] , $mensaje );
      $mensaje = str_replace( '[destino]' , $nombredestino , $mensaje );
      $mensaje = str_replace( '[ataud]' , $nombreataud , $mensaje );
      $mensaje = str_replace( '[velatorio]' ,$nombrevelatorio , $mensaje );
      $mensaje = str_replace( '[ceremonia]' , $nombredespedida , $mensaje );
      $mensaje = str_replace( '[precio]' , number_format( sanitize_text_field( $_POST['precio'] ), 0, ',', '.') . '€' , $mensaje );
      $mensaje = str_replace( '[nombreServicio]' , $titulo , $mensaje );
      $mensaje = str_replace( '[telefonoServicio]' , get_post_meta( $_POST['servicio'], "wpfunos_servicioTelefono", true)  , $mensaje );
      $mensaje = str_replace( '[comentarios]' , get_post_meta( $_POST['servicio'], 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true) , $mensaje );
      $mensaje = str_replace( '[comentariosUsuario]' , apply_filters('wpfunos_comentario', $_POST['mensaje'] ) , $mensaje );
      if(!empty( get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ;
      //wp_mail (  get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoPresupuestoLead') , $mensaje, $headers );
      wp_mail (  'efraim@efraim.cat' , get_option('wpfunos_asuntoCorreoPresupuestoLead') , $mensaje, $headers );
      update_post_meta( $post_id, 'wpfunos_userLead', true );
      do_action('wpfunos_log', '==============' );
      //do_action('wpfunos_log', 'Enviado correo presupuesto ' . get_post_meta( $_POST['servicio'], 'wpfunos_servicioEmail', true ) );
      do_action('wpfunos_log', 'Enviado correo presupuesto efraim@efraim.cat' );
      do_action('wpfunos_log', 'Enviado CCO ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoCcoPresupuestoLead' ) ) );
      do_action('wpfunos_log', 'Enviado BCC ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoBccPresupuestoLead' ) ) );
      do_action('wpfunos_log', 'userIP: ' . apply_filters('wpfunos_userIP','dummy') );
      do_action('wpfunos_log', 'Nombre: ' . $_POST['nombre'] );
      do_action('wpfunos_log', '$referencia: ' . $referencia );
    }
    $result['type'] = "success";
    $result['ref'] = $referencia;
    $result['nombre'] = $_POST['nombre'];
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  public function wpfunosServiciosBotonDetalles(){
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio BotonDetalles' );
    if ( !wp_verify_nonce( $_POST['wpnonce'], "wpfunos_serviciosv2_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    $titulo = get_post_meta( $_POST['servicio'], "wpfunos_servicioNombre", true);
    do_action('wpfunos_log', 'Titulo: ' . $titulo );
    switch($_POST['resp1']){ case '1': $destino = 'E' ; $nombredestino = 'Entierro'; break; case '2': $destino = 'I' ; $nombredestino = 'Incineración'; break; }
    switch($_POST['resp2']){ case '1': $ataud = 'M' ; $nombreataud = 'Ataúd medio'; break; case '2': $ataud = 'E' ; $nombreataud = 'Ataúd económico'; break; case '3': $ataud = 'P' ; $nombreataud = 'Ataúd premium'; break; }
    switch($_POST['resp3']){ case '1': $velatorio = 'V' ; $nombrevelatorio = 'Velatorio' ; break; case '2': $velatorio = 'S' ; $nombrevelatorio = 'Sin velatorio' ; break; }
    switch($_POST['resp4']){ case '1': $despedida = 'S' ; $nombredespedida = 'Sin ceremonia' ; break; case '2': $despedida = 'O' ; $nombredespedida = 'Solo sala' ; break; case '3': $despedida = 'C' ; $nombredespedida = 'Ceremonia civil' ; break; case '4': $despedida = 'R' ; $nombredespedida = 'Ceremonia religiosa' ; break; }
    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();

    $result['type'] = "success";
    $result['ref'] = $referencia;
    $result['logo'] = wp_get_attachment_image ( get_post_meta( $_POST['servicio'], 'wpfunos_servicioLogo', true ) ,'full' );
    $result['nombre'] = get_post_meta( $_POST['servicio'], "wpfunos_servicioNombre", true);
    $result['nombrepack'] = get_post_meta( $_POST['servicio'], 'wpfunos_servicioPackNombre', true );
    $result['logo_promo'] = wp_get_attachment_image ( get_post_meta( $_POST['servicio'], 'wpfunos_servicioImagenPromo', true ) ,'full' );
    $result['valoracion'] = get_post_meta( $_POST['servicio'], 'wpfunos_servicioValoracion', true );
    $result['precio_texto'] = get_post_meta( $_POST['servicio'], 'wpfunos_servicioTextoPrecio', true );
    $result['direccion'] =  get_post_meta( $_POST['servicio'], 'wpfunos_servicioDireccion', true );
    $result['comentarios'] = apply_filters('wpfunos_comentario', get_post_meta( $_POST['servicio'], 'wpfunos_servicio'.$destino.$ataud.$velatorio.$despedida.'_Comentario', true));
    $result['precioformat'] = number_format($_POST['precio'], 0, ',', '.') . '€' ;
    $result['destino'] = $nombredestino;
    $result['ataud'] = $nombreataud;
    $result['velatorio'] = $nombrevelatorio;
    $result['ceremonia'] = $nombredespedida;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

}
/**

*/
