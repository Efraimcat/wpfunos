<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* The public-facing functionality of the plugin.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/public
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
/**
* Acciones:
* 0 - Usuario visuliza resultados servicios
* 1 - Usuario pulsa botón "que me llamen" en resultados servicios
* 2 - Usuario pulsa botón "llamar" en resultados servicios
* 3 - Usuario visuliza resultados aseguradoras
* 4 - cold lead aseguradoras
* 5 - Usuario pide presupuesto servicios
* 6 - Usuario pulsa botón "que me llamen" en resultados aseguradoras
* 7 - Usuario pulsa botón "llamar" en resultados aseguradoras
* 8 - Usuario pide presupuesto aseguradoras
* 9
*/
class Wpfunos_Public {

  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
    add_shortcode( 'wpfunos-resultados', array( $this, 'wpfunosResultadosShortcode' ));
    add_shortcode( 'wpfunos-correo-popup', array( $this, 'wpfunosCorreoPopupShortcode' ));
    add_shortcode( 'wpfunos-mensaje-usuario-correo-popup', array( $this, 'wpfunosCorreoUsuarioPopupShortcode' ));
    add_shortcode( 'wpfunos-mensaje-usuario-datos-servicio', array( $this, 'wpfunosCorreoUsuarioDatosServicoShortcode' ));
    add_action( 'elementor_pro/forms/new_record', array( $this, 'wpfunosFormNewrecord' ), 10, 2 );
    add_action( 'elementor_pro/forms/validation', array( $this, 'wpfunosFormValidation' ), 10, 2 );
  }

  /**
  * Register the stylesheets for the public-facing side of the site.
  *
  * @since    1.0.0
  */
  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-public.css', array(), $this->version, 'all' );
  }

  /**
  * Register the JavaScript for the public-facing side of the site.
  *
  * @since    1.0.0
  */
  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-public.js', array( 'jquery' ), $this->version, false );
  }

  /*********************************/
  /*****  SHORTCODES          ******/
  /*********************************/

  /**
  * Shortcode [wpfunos-resultados]
  */
  public function wpfunosResultadosShortcode( $atts, $content = "" ) {
    $a = shortcode_atts( array(
      'boton'=>'',
    ), $atts );
    $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
    $seleccion = get_post_meta( $IDusuario, $this->plugin_name . '_userSeleccion', true );
    $CP = get_post_meta( $IDusuario, $this->plugin_name . '_userCP', true );
    $respuesta = (explode(',',$seleccion));
    switch ( $a['boton'] ) {
      case '1':	//cuando
      switch($respuesta[2]){
        case '1': esc_html_e( 'Ahora mismo' ); break;
        case '2': esc_html_e( 'Proximamente' ); break;
        case '3': esc_html_e( 'En el futuro' ); break;
      }
      break;
      case '2':	//población
      esc_html_e( strtr($respuesta[0],"+",",") ); break;
      case '3':	//Destino
      switch($respuesta[3]){
        case '1': esc_html_e( 'Entierro' ); break;
        case '2': esc_html_e( 'Incineración' ); break;
        case '3': esc_html_e( 'Traslado' ); break;
      }
      break;
      case '4':	//Ataúd
      switch($respuesta[4]){
        case '1': esc_html_e( 'Económico' ); break;
        case '2': esc_html_e( 'Gama media' ); break;
        case '3': esc_html_e( 'Premium' ); break;
      }
      break;
      case '5':	//Velatorio
      switch($respuesta[5]){
        case '1': esc_html_e( 'Si' ); break;
        case '2': esc_html_e( 'No' ); break;
      }
      break;
      case '6':	//Despedida
      switch($respuesta[6]){
        case '1': esc_html_e( 'No' ); break;
        case '2': esc_html_e( 'Solo sala' ); break;
        case '3': esc_html_e( 'Ceremonia civil' ); break;
        case '4': esc_html_e( 'Ceremonia Religiosa' ); break;
      }
      break;
      // ASEGURADORAS
      case '7': switch($respuesta[2]){ case '1': esc_html_e( 'Hombre' ); break; case '2'; esc_html_e( 'Mujer' ); break; } break; //Sexo
      case '8': esc_html_e( $respuesta[3] );break; //Año de nacimiento
    }
  }

  /**
  * Shortcode [wpfunos-correo-popup]
  */
  public function wpfunosCorreoPopupShortcode( $atts, $content = "" ) {
    return get_option('wpfunos_mailCorreoCcoPopup');
  }

  /**
  * Shortcode [wpfunos-mensaje-usuario-correo-popup]
  */
  public function wpfunosCorreoUsuarioPopupShortcode( $atts, $content = "" ) {
    if ( get_option('wpfunos_activarCorreoUsuarioContacto') ){
      $mensaje = get_option('wpfunos_mensajeCorreoUsuarioContacto');
      //[telefonoUsuario], [nombreUsuario], [Email]
      //[field id="nombre"]
      //[field id="email"]
      //[field id="telefono"]
      $nombreUsuario = do_shortcode ('[field id="nombre"]');
      $telefonoUsuario = do_shortcode ('[field id="telefono"]');
      $Email = do_shortcode ('[field id="email"]');
      $mensaje = str_replace( '[nombreUsuario]' , $nombreUsuario , $mensaje );
      $mensaje = str_replace( '[telefonoUsuario]' , $telefonoUsuario , $mensaje );
      $mensaje = str_replace( '[Email]' , $Email , $mensaje );
      return $mensaje;
    }
  }

  /**
  * Shortcode [wpfunos-mensaje-usuario-datos-servicio]
  */
  public function wpfunosCorreoUsuarioDatosServicoShortcode( $atts, $content = "" ) {
    if ( get_option('wpfunos_activarCorreoUsuarioDatos') ){
      $mensaje = get_option('wpfunos_mensajeCorreoUsuarioDatos');
      //[ubicacion], [CPUsuario], [telefonoUsuario], [nombreUsuario], [Email]
      //[destino], [ataud], [velatorio], [ceremonia]
      //[field id="Destino"]
      //[field id="Ataud"]
      //[field id="Velatorio"]
      //[field id="Despedida"]
      //[field id="address"]
      //[field id="CP"]
      //[field id="Nombre"]
      //[field id="Email"]
      //[field id="Telefono"]
      $ubicacion = do_shortcode ('[field id="address"]');
      $CPUsuario = do_shortcode ('[field id="CP"]');
      $telefonoUsuario = do_shortcode ('[field id="Telefono"]');
      $nombreUsuario = do_shortcode ('[field id="Nombre"]');
      $Email = do_shortcode ('[field id="Email"]');
      $destino = do_shortcode ('[field id="Destino"]');
      $ataud = do_shortcode ('[field id="Ataud"]');
      $velatorio = do_shortcode ('[field id="Velatorio"]');
      $ceremonia = do_shortcode ('[field id="Despedida"]');

      $mensaje = str_replace( '[ubicacion]' , $ubicacion , $mensaje );
      $mensaje = str_replace( '[CPUsuario]' , $CPUsuario , $mensaje );
      $mensaje = str_replace( '[telefonoUsuario]' , $telefonoUsuario , $mensaje );
      $mensaje = str_replace( '[nombreUsuario]' , $nombreUsuario , $mensaje );
      $mensaje = str_replace( '[Email]' , $Email , $mensaje );
      $mensaje = str_replace( '[destino]' , $destino , $mensaje );
      $mensaje = str_replace( '[ataud]' , $ataud , $mensaje );
      $mensaje = str_replace( '[velatorio]' , $velatorio , $mensaje );
      $mensaje = str_replace( '[ceremonia]' , $ceremonia , $mensaje );

      return $mensaje;
    }
  }

  /*********************************/
  /*****  HOOKS               ******/
  /*********************************/

  /**
  * Hook Elementor Form Validate entry
  *
  * add_action( 'elementor_pro/forms/validation', array( $this, 'wpfunosFormValidation' ), 10, 2 );
  *
  * #13-Feb-2022 13:26:43: $field:
  * [id] = String: 'nacimiento'
  * [type] = String: 'text'
  * [title] = String: 'Año de nacimiento'
  * [value] = Number: 1957
  * [raw_value] = Number: 1957
  * [required] = TRUE
  *
  * https://dev.to/renzoster/validate-form-fields-in-elementor-54cl
  *
  *
  * // Validate the Ticket ID field is in XXX-XXXX format.
  * add_action( 'elementor_pro/forms/validation', function ( $record, $ajax_handler ) {
  *     $fields = $record->get_field( [
  *         'id' => 'ticket_id',
  *     ] );
  *
  *     if ( empty( $fields ) ) {
  *         return;
  *     }
  *
  *     $field = current( $fields );
  *
  *     if ( 1 !== preg_match( '/^\w{3}-\w{4}$/', $field['value'] ) ) {
  *         $ajax_handler->add_error( $field['id'], 'Invalid Ticket ID, it must be in the format XXX-XXXX' );
  *     }
  * }, 10, 2 );
  *
  *  https://developers.elementor.com/forms-api/
  *
  *  public function wpfunos_elementor_get_field( $id, $record ){
  *    $fields = $record->get_field( [ 'id' => $id, ] );
  *    if ( empty( $fields ) ) {
  *      return false;
  *    }
  *    return current( $fields );
  *  }
  *
  */
  public function wpfunosFormValidation($record, $ajax_handler){
    $form_name = $record->get_form_settings( 'form_name' );
    if( "FormularioDatosAseguradora" === $form_name ){
      if( $field = $this->wpfunos_elementor_get_field( 'nacimiento', $record ) ){
        if( (int)$field['value'] < date("Y") - 80 || (int)$field['value'] > date("Y") - 20 ){
          $ajax_handler->add_error( $field['id'], 'Año de nacimiento inválido. Introduce tu año de nacimiento p.ej: 1990' );
        }
      }
    }

    if( "FormularioDatosAseguradora" === $form_name || "FormularioDatos" === $form_name ){
      if( $field = $this->wpfunos_elementor_get_field( 'Telefono', $record ) ){
        //if( substr($field['value'],0,3) != '+34' ){
        //  $ajax_handler->add_error( $field['id'], 'El número de teléfono debe empezar por +34' );
        //}
        $tel = ( strlen ( $field['value'] ) > 9 ) ? $tel = substr($field['value'],3,9) : $field['value'] ;
        if( '666666666' == $tel || '600000000' == $tel || '999999999' == $tel ){
          $ajax_handler->add_error( $field['id'], 'Introduce un número de teléfono válido' );
        }
        if ( 1 !== preg_match( '/^[9|8|6|7][0-9]{8}$/', $tel ) ) {
          $ajax_handler->add_error( $field['id'], 'Introduce un número de teléfono válido' );
        }
      }
    }

    if( "AsesoramientoGratuito" === $form_name || "TeLlamamosGratis" === $form_name || "FormularioDatos" === $form_name ){
      if( $field = $this->wpfunos_elementor_get_field( 'telefono', $record ) ){
        //if( substr($field['value'],0,3) != '+34' ){
        //  $ajax_handler->add_error( $field['id'], 'El número de teléfono debe empezar por +34' );
        //}
        $tel = ( strlen ( $field['value'] ) > 9 ) ? $tel = substr($field['value'],3,9) : $field['value'] ;
        if( '666666666' == $tel || '600000000' == $tel || '999999999' == $tel ){
          $ajax_handler->add_error( $field['id'], 'Introduce un número de teléfono válido' );
        }
        if ( 1 !== preg_match( '/^[9|8|6|7][0-9]{8}$/', $tel ) ) {
          $ajax_handler->add_error( $field['id'], 'Introduce un número de teléfono válido' );
        }
      }
    }
  }
  public function wpfunos_elementor_get_field( $id, $record ){
    $fields = $record->get_field( [ 'id' => $id, ] );
    if ( empty( $fields ) ) {
      return false;
    }
    return current( $fields );
  }


  /**
  * Hook Elementor Form New Record
  *
  *add_action( 'elementor_pro/forms/new_record', array( $this, 'wpfunosFormNewrecord' ), 10, 2 );
  */
  public function wpfunosFormNewrecord($record, $handler){
    global $wp;
    $form_name = $record->get_form_settings( 'form_name' );
    if ( 'FormularioDatos' !== $form_name  && 'FormularioDatosFuturo' !== $form_name ) {
      return;
    }
    $raw_fields = $record->get( 'fields' );
    $fields = [];
    foreach ( $raw_fields as $id => $field ) {
      $fields[ $id ] = $field['value'];
    }
    // do_action('wpfunos_log', 'Fields: ' . $fields );
    $IDusuario = apply_filters('wpfunos_userID', $fields['referencia'] );
    if( $IDusuario != 0 ) {mt_srand(mktime()); $fields['referencia'] = 'funos-'.(string)mt_rand(); }
    $tel = str_replace(" ","", $fields['Telefono'] );
    $tel = str_replace("-","",$tel);
    $fields['Telefono'] =  substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
    $userIP = apply_filters('wpfunos_userIP','dummy');
    //https://funos.es/comparar-precios?address%5B%5D=[field id="address"]&post%5B%5D=[field id="post"]&distance=[field id="distance"]&units=[field id="units"]&page1=&per_page=50&lat=[field id="lat"]&lng=[field id="lng"]&form=4&action=fs&wpf=[field id="wpf"]&orden=precios
    $URL= get_site_url() . '/comparar-precios?address%5B%5D=' .str_replace(" ","+", $fields['address'] ). '&post%5B%5D=' .$fields['post']. '&distance=' .$fields['distance']. '&units=' .$fields['units']. '&page1=&per_page=50&lat=' .$fields['lat']. '&lng=' .$fields['lng']. '&form=4&action=fs&wpf=' .$fields['wpf']. '&orden=dist';
    $userURL = apply_filters('wpfunos_shortener', $URL );
    switch ( $fields['Destino'] ) {
      case '1': $userNombreSeleccionServicio = 'Entierro'; break;
      case '2': $userNombreSeleccionServicio = 'Incineración'; break;
    }
    switch ( $fields['Ataud'] ) {
      case '1': $userNombreSeleccionAtaud = 'Ataúd Económico'; break;
      case '2': $userNombreSeleccionAtaud = 'Ataúd Medio'; break;
      case '3': $userNombreSeleccionAtaud = 'Ataúd Premium'; break;
    }
    switch ( $fields['Velatorio'] ) {
      case '1': $userNombreSeleccionVelatorio = 'Velatorio'; break;
      case '2': $userNombreSeleccionVelatorio = 'Sin Velatorio'; break;
    }
    switch ( $fields['Despedida'] ) {
      case '1': $userNombreSeleccionDespedida = 'Sin ceremonia'; break;
      case '2': $userNombreSeleccionDespedida = 'Solo sala'; break;
      case '3': $userNombreSeleccionDespedida = 'Ceremonia civil'; break;
      case '4': $userNombreSeleccionDespedida = 'Ceremonia religiosa'; break;
    }

    if( $form_name == 'FormularioDatos' ){
      $textoaccion = "Entrada datos servicios";
      //if( $_COOKIE['wpfunosloggedin'] == 'yes' ) $textoaccion = "Acción Usuario Desarrollador";
      if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acción Usuario Desarrollador";
      $userIP = apply_filters('wpfunos_userIP','dummy');
      $args = array(
        'post_status' => 'publish',
        'post_type' => 'usuarios_wpfunos',
        'posts_per_page' => -1,
        'meta_query' => array(
          'relation' => 'AND',
          array( 'key' => 'wpfunos_userIP', 'value' => $userIP, 'compare' => '=', ),
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
        'post_title' => $fields['referencia'],
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          $this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          $this->plugin_name . '_userMail' => sanitize_text_field( $fields['Email'] ),
          $this->plugin_name . '_userReferencia' => sanitize_text_field( $fields['referencia'] ),
          $this->plugin_name . '_userName' => sanitize_text_field( $fields['Nombre'] ),
          $this->plugin_name . '_userSurname' => sanitize_text_field( $fields['Apellidos'] ),
          $this->plugin_name . '_userPhone' => sanitize_text_field( $fields['Telefono'] ),
          $this->plugin_name . '_userSeguro' => sanitize_text_field( $fields['Seguro'] ),
          $this->plugin_name . '_userCP' => sanitize_text_field( $fields['CP'] ),
          $this->plugin_name . '_userAccion' => '0',
          $this->plugin_name . '_userNombreAccion' => sanitize_text_field( $textoaccion ),
          $this->plugin_name . '_userNombreSeleccionUbicacion' => sanitize_text_field( $fields['address'] ),
          $this->plugin_name . '_userNombreSeleccionDistancia' => sanitize_text_field( $fields['distance'] ),
          $this->plugin_name . '_userNombreSeleccionServicio' => sanitize_text_field( $userNombreSeleccionServicio ),
          $this->plugin_name . '_userNombreSeleccionAtaud' => sanitize_text_field( $userNombreSeleccionAtaud ),
          $this->plugin_name . '_userNombreSeleccionVelatorio' => sanitize_text_field( $userNombreSeleccionVelatorio ),
          $this->plugin_name . '_userNombreSeleccionDespedida' => sanitize_text_field( $userNombreSeleccionDespedida ),
          $this->plugin_name . '_userSeleccion' => sanitize_text_field( str_replace(",","+",$fields['address']).', '.$fields['distance'].', 1, '. $fields['Destino'].', '.$fields['Ataud'].', '.$fields['Velatorio'].', '.$fields['Despedida']),
          $this->plugin_name . '_userIP' => sanitize_text_field( $userIP ),
          $this->plugin_name . '_userwpf' => sanitize_text_field( $fields['wpf'] ),
          $this->plugin_name . '_userURL' => sanitize_text_field( $userURL ),
          $this->plugin_name . '_userAceptaPolitica' => '1',
          $this->plugin_name . '_userLAT' => sanitize_text_field( $fields['lat'] ),
          $this->plugin_name . '_userLNG' => sanitize_text_field( $fields['lng'] ),
          $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
          $this->plugin_name . '_userVisitas' => $contador,
          $this->plugin_name . '_Dummy' => true,
          'IDstamp' => $_COOKIE[ 'wpfid' ],
        ),
      );
    }elseif( $form_name == 'FormularioDatosFuturo' ){
      //https://funos.es/compara-precios-aseguradoras?address%5B%5D=Barcelona&post%5B%5D=aseguradoras_wpfunos&distance=&units=&page1=&per_page=50&lat=41.387397&lng=2.168568&form=3&action=fs&wpf=WFYrckFUZE1rSUdEYUQ4WlE4NkZydEc0b0IxNU8ya2t2S1FCRk4zdHRGTT0%3D
      $URL= get_site_url() . '/compara-precios-aseguradoras?address%5B%5D=' .str_replace(" ","+", $fields['address'] ). '&post%5B%5D=' .$fields['post']. '&distance=' .$fields['distance']. '&units=' .$fields['units']. '&page1=&per_page=50&lat=' .$fields['lat']. '&lng=' .$fields['lng']. '&form=3&action=fs&wpf=' .$fields['wpf'];
      $userURL = apply_filters('wpfunos_shortener', $URL );
      $textoaccion = "Entrada datos aseguradoras";
      //if( $_COOKIE['wpfunosloggedin'] == 'yes' ) $textoaccion = "Acción Usuario Desarrollador";
      if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acción Usuario Desarrollador";
      $args = array(
        'post_status' => 'publish',
        'post_type' => 'usuarios_wpfunos',
        'posts_per_page' => -1,
        'meta_query' => array(
          'relation' => 'AND',
          array( 'key' => 'wpfunos_userIP', 'value' => $userIP, 'compare' => '=', ),
          array( 'key' => 'wpfunos_userAccion', 'value' => '3', 'compare' => '=', ),
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
        'post_title' => $fields['referencia'],
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          $this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          $this->plugin_name . '_userMail' => sanitize_text_field( $fields['Email'] ),
          $this->plugin_name . '_userReferencia' => sanitize_text_field( $fields['referencia'] ),
          $this->plugin_name . '_userNombreSeleccionUbicacion' => sanitize_text_field( $fields['address'] ),
          $this->plugin_name . '_userName' => sanitize_text_field( $fields['Nombre'] ),
          $this->plugin_name . '_userSurname' => sanitize_text_field( $fields['Apellidos'] ),
          $this->plugin_name . '_userPhone' => sanitize_text_field( $fields['Telefono'] ),
          $this->plugin_name . '_userSeguro' => sanitize_text_field( $fields['Seguro'] ),
          $this->plugin_name . '_userCP' => sanitize_text_field( $fields['CP'] ),
          $this->plugin_name . '_userAccion' => '3',
          $this->plugin_name . '_userNombreAccion' => sanitize_text_field( $textoaccion ),
          $this->plugin_name . '_userSeleccion' => sanitize_text_field( str_replace(",","+",$fields['address']).', '.$fields['distance'].', ' . $fields['sexo']. ', '. (int)$fields['nacimiento']  ),
          $this->plugin_name . '_userIP' => sanitize_text_field( $userIP ),
          $this->plugin_name . '_userwpf' => sanitize_text_field( $fields['wpf'] ),
          $this->plugin_name . '_userURL' => sanitize_text_field( $userURL ),
          $this->plugin_name . '_userAceptaPolitica' => '1',
          $this->plugin_name . '_userLAT' => sanitize_text_field( $fields['lat'] ),
          $this->plugin_name . '_userLNG' => sanitize_text_field( $fields['lng'] ),
          $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
          $this->plugin_name . '_userVisitas' => $contador,
          $this->plugin_name . '_Dummy' => true,
          'IDstamp' => $_COOKIE[ 'wpfid' ],
        ),
      );
    }
    if( strlen( $fields['Telefono']) > 3 ){
      $post_id = wp_insert_post($my_post);
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '3. - Recogida datos usuario' );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Nombre: ' .  $fields['Nombre']  );
      do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
      do_action('wpfunos_log', 'referencia: ' . $fields['referencia'] );
      do_action('wpfunos_log', 'Telefono: ' . $fields['Telefono'] );
    }else{
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Error 1 Nuevo Usuario: ' .  $userIP  );
      do_action('wpfunos_log', 'referencia: ' .  $fields['referencia'] );
    }
    if(is_wp_error($post_id)){
      echo $post_id->get_error_message();
      exit;
    }
  }
}
