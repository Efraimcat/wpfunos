<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Aseguradoras.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/aseguradoras
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
class Wpfunos_Aseguradoras {

  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
    add_shortcode( 'wpfunos-acciones-botones-aseguradora', array( $this, 'wpfunosAccionesBotonesAseguradoraShortcode' ));
    add_shortcode( 'wpfunos-aseguradoras-page-switch', array( $this, 'wpfunosAseguradorasPageSwitchShortcode' ));
    add_shortcode( 'wpfunos-pagina-aseguradoras', array( $this, 'wpfunosPaginaAseguradorasShortcode' ));
    add_shortcode( 'wpfunos-pagina-resultados-aseguradoras', array( $this, 'wpfunosPaginaResultadosAseguradorasShortcode' ));
    add_shortcode( 'wpfunos-aseguradoras-filtros', array( $this, 'wpfunosAseguradorasFiltrosShortcode' ));

    add_action( 'wpfunos-aseguradoras-resultados', array( $this, 'wpfunosAseguradorasResultados' ), 10, 1 );

    add_action('wp_ajax_nopriv_wpfunos_ajax_aseguradoras_llamen', function () { $this->wpfunosAseguradorasLlamen();});
    add_action('wp_ajax_wpfunos_ajax_aseguradoras_llamen', function () {$this->wpfunosAseguradorasLlamen();});

  }

  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-aseguradoras.css', array(), $this->version, 'all' );
  }

  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-aseguradoras.js', array( 'jquery' ), $this->version, false );
  }
  /*********************************/
  /*****  SHORTCODES          ******/
  /*********************************/

  /**
  * Shortcode [wpfunos-acciones-botones-aseguradora]
  */
  public function wpfunosAccionesBotonesAseguradoraShortcode( $atts, $content = "" ) {
    if( strlen( $_GET['telefonoUsuario'] ) > 3 ) {
      $this->wpfunosAseguradoraUserEntry();
      //$this->wpfunosResultUserEntry();
      //$this->wpfunosResultCorreoAdmin();
      //$this->wpfunosResultCorreoLead();
    }else{
      $userIP = apply_filters('wpfunos_userIP','dummy');
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Error 4 Nuevo Usuario: ' .  $userIP );
      do_action('wpfunos_log', 'referencia: ' .  $fields['referencia'] );
    }
  }

  /**
  * Shortcode [wpfunos-aseguradoras-page-switch]
  */
  public function wpfunosAseguradorasPageSwitchShortcode(){
    if( !isset( $_GET['form'] ) ){
      echo do_shortcode( get_option('wpfunos_paginaComparadorGeoMyWpAseguradoras') );
    }elseif( !isset( $_GET['wpf'] ) ){
      if (is_user_logged_in()){
        $current_user = wp_get_current_user();
        $_GET['usuario_telefono'] = str_replace(" ","",get_user_meta( $current_user->ID, 'wpfunos_telefono' , true ));
        $_GET['Email'] = $current_user->user_email;
        $_GET['nombreUsuario'] = $current_user->display_name;
      }
      $userIP = apply_filters('wpfunos_userIP','dummy');
      $_GET['direccion'] = $_GET['address'][0];
      $_GET['tipo'] = $_GET['post'][0];
      mt_srand(mktime());
      $_GET['referencia'] = 'funos-'.(string)mt_rand();
      $_GET['CP'] = $this->wpfunosCodigoPostal( $_GET['CP'], $_GET['direccion'] );
      $_GET['wpf'] = apply_filters( 'wpfunos_crypt', $_GET['referencia'] . ', ' . $_GET['CP'] , 'e' );
      $this->wpfunosEntradaUbicacion( $userIP , $_GET['wpf'], $_GET['referencia'], $_GET['direccion'], $_GET['CP'] , $_GET['distance'] );
      echo do_shortcode( get_option('wpfunos_seccionComparaPreciosDatosAseguradoras') );
    }elseif( isset( $_GET['wpf'] ) ){
      $userIP = apply_filters('wpfunos_userIP','dummy');
      $cryptcode = apply_filters( 'wpfunos_crypt', $_GET['wpf'], 'd' );
      $codigo = ( explode( ',' , $cryptcode ) );
      $_GET['referencia'] = $codigo[0];
      $_GET['CP'] = $codigo[1];
      $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '4. - Página Resultados Aseguradoras' );
      do_action('wpfunos_log', 'Usuario: ' .  $userIP  );
      do_action('wpfunos_log', '$_GET[wpf]: ' . $_GET['wpf'] );
      do_action('wpfunos_log', '$cryptcode: ' . $cryptcode );
      do_action('wpfunos_log', '$_GET[referencia]: ' . $_GET['referencia'] );
      do_action('wpfunos_log', '$_GET[CP]: ' . $_GET['CP'] );
      $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
      if( $IDusuario != 0 && strlen( $_GET['CP']) > 1 ){
        // Solo enviar lead si no se ha enviado anteriormente.
        if ( !get_post_meta( $IDusuario, 'wpfunos_userLead', true ) ){
          $this->wpfunosResultCorreoDatos();
          // Marcar lead como enviado.
          update_post_meta( $IDusuario, $this->plugin_name . '_userLead', true );
        }
        echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosAseguradorasCabecera') );
        echo do_shortcode( get_option('wpfunos_formGeoMyWpAseguradoras') );
        echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosAseguradorasPie') );

      }
    }
  }

  /**
  * Shortcode [wpfunos-pagina-aseguradoras]
  */
  public function wpfunosPaginaAseguradorasShortcode( $atts, $content = "" ) {
    return do_shortcode( get_option('wpfunos_paginaComparadorAseguradoras') );
  }

  /**
  * Shortcode [wpfunos-pagina-resultados-aseguradoras]
  */
  public function wpfunosPaginaResultadosAseguradorasShortcode( $atts, $content = "" ) {
    echo get_option('wpfunos_paginaURLResultadosAseguradoras');
  }

  /**
  * Shortcode [wpfunos-aseguradoras-filtros]
  */
  public function wpfunosAseguradorasFiltrosShortcode( $atts, $content = "" ) {
    if( ! isset($_GET['wpf'] ) ) return;
    $cryptcode = apply_filters( 'wpfunos_crypt', $_GET['wpf'], 'd' );
    $codigo = ( explode( ',' , $cryptcode ) );
    $_GET['referencia'] = $codigo[0];
    echo do_shortcode( '[elementor-template id="86728"]' );
  }

  /*********************************/
  /*****  HOOKS               ******/
  /*********************************/

  /**
  * Hook Resultados Aseguradoras
  *
  * add_action( 'wpfunos-aseguradoras-resultados', array( $this, 'wpfunosAseguradorasResultados' ), 10, 1 );
  */
  public function wpfunosAseguradorasResultados( ){
    $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
    $telefonoUsuario = get_post_meta( $IDusuario, 'wpfunos_userPhone', true );
    $_GET['telefonoUsuario'] = $telefonoUsuario;
    $seleccion = get_post_meta( $IDusuario, 'wpfunos_userSeleccion', true );
    $respuesta = (explode(',',$seleccion));
    switch($respuesta[2]){ case '1': $sexo = 'Hombre'; break; case '2'; $sexo = 'Mujer'; break; }
    $_GET['edad'] =  date("Y") - (int)$respuesta[3];
    $_GET['seleccionUsuario'] = $seleccion;
    $_GET['CPUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userCP', true );
    $_GET['nombreUsuario'] = get_post_meta( $IDusuario, 'wpfunos_userName', true );
    $_GET['Email'] = get_post_meta( $IDusuario, 'wpfunos_userMail', true );
    $_GET['idUsuario'] = $IDusuario;
    $_GET['seguro'] = get_post_meta( $IDusuario, 'wpfunos_userSeguro', true );
    $nonce = wp_create_nonce("wpfunos_aseguradoras_nonce".apply_filters('wpfunos_userIP','dummy'));

    ElementorPro\Modules\Popup\Module::add_popup_to_location( '55817' ); //Boton Te llamamos

    $args = array(
      'post_status' => 'publish',
      'post_type' => 'tipos_seguro_wpfunos',
      'meta_key' => 'wpfunos_tipoSeguroOrden',
      'orderby' => 'meta_value_num',
      'meta_type' => 'TEXT',
      'order' => 'ASC'
    );
    $my_query = new WP_Query( $args );
    if ( $my_query->have_posts() ) :

      while ( $my_query->have_posts() ) :
        $my_query->the_post();
        $temp_query = $wp_query;  // store it
        $IDtipo = get_the_ID();
        ?><div class="wpfunos-titulo-aseguradoras" id="<?php echo str_replace(" ","-", get_post_meta( $IDtipo, 'wpfunos_tipoSeguroDisplay', true ) ); ?>"><p></p><center><h2><?php echo get_post_meta( $IDtipo, 'wpfunos_tipoSeguroDisplay', true ); ?></h2></center></div><?php
        ?> <div class="clear"></div><?php
        ?><div class="wpfunos-busqueda-contenedor"><?php
        echo do_shortcode( get_post_meta( $IDtipo, 'wpfunos_tipoSeguroComentario', true ) );
        ?></div><?php

        $args = array(
          'post_status' => 'publish',
          'post_type' => 'aseguradoras_wpfunos',
          'meta_query' => array(
            array(
              'key'     => 'wpfunos_aseguradorasTipoSeguro',
              'value'   => $IDtipo,
              'compare' => 'IN',
            ),
          ),
          'meta_key'   => 'wpfunos_aseguradorasOrden',
          'orderby'    => 'meta_value_num',
          "order" => 'ASC'
        );
        $wp_query = new WP_Query($args);
        while ($wp_query->have_posts()) :
          $wp_query->the_post();
          $IDaseguradora = get_the_ID();
          if( get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasActivo', true ) ){
            ?><div class="wpfunos-busqueda-contenedor"><?php
            $titulo = get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasNombre', true );
            $_GET['nombre'] = $titulo;
            $_GET['telefonoEmpresa'] = get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasTelefono', true );
            $_GET['logo'] = wp_get_attachment_image ( get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasLogo', true ) ,'full' );
            $_GET['AttsLlamen'] = $IDaseguradora.'
            data-wpnonce|' . $nonce .'
            wpusuario|' . $IDusuario.'
            wptitulo|' .$titulo.'
            wpftelus|' .$telefonoUsuario;

            echo do_shortcode( get_option('wpfunos_seccionAseguradorasPrecio') );	// cabecera con logo
            ?><div class="wpfunos-busqueda-aseguradoras-inferior" id="wpfunosID-<?php echo $IDaseguradora; ?>"><?php
            echo do_shortcode( get_post_meta( $IDaseguradora, 'wpfunos_aseguradorasNotas', true ) );
            ?></div></div><?php
            //css #wpfunos-boton-llamen
            //atts AttsLlamen
          }
        endwhile;
        if (isset($wp_query)) $wp_query = $temp_query; // restore loop
      endwhile;
    endif;
    wp_reset_postdata();
    require 'js/wpfunos-aseguradoras-botones.js';
  }

  /*********************************/
  /***** APIS                 ******/
  /*********************************/

  /**
  * API Preventiva
  *
  *
  */


  /*********************************/
  /***** UTILIDADES           ******/
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
  * Buscar Provincia
  */
  public function wpfunosProvincia( $CodigoPostal ){
    //substr("28002",0,2);
    $codigo_provincia = substr( $CodigoPostal, 0, 2 );
    $id=0;
    $args = array(
      'post_type' => 'provincias_wpfunos',
      'meta_key' =>  $this->plugin_name . '_provinciasCodigo',
      'meta_value' => $codigo_provincia,
    );
    $my_query = new WP_Query( $args );
    if ( $my_query->have_posts() ) :
      while ( $my_query->have_posts() ) :
        $my_query->the_post();
        $id = get_the_ID();
      endwhile;
      wp_reset_postdata();
    endif;
    $provincia = get_post_meta( $id, 'wpfunos_provinciasProvincia', true );
    return $provincia;
  }

  /**
  * Entrada ubicación
  */
  public function wpfunosEntradaUbicacion( $ubicacionIP, $ubicacionwpf, $ubicacionReferencia, $ubicacionDireccion, $ubicacionCP, $ubicacionDistancia  ){
    if( apply_filters('wpfunos_reserved_email','dummy') ) return;
    //if( $_COOKIE['wpfunosloggedin'] == 'yes' ) return;
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $args = array(
      'post_status' => 'publish',
      'post_type' => 'ubic_aseg_wpfunos',
      'posts_per_page' => -1,
      'meta_key' =>  'wpfunos_ubic_asegIP',
      'meta_value' => $userIP,
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
      'post_type' => 'ubic_aseg_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        $this->plugin_name . '_ubic_asegIP' => sanitize_text_field( $ubicacionIP ),
        $this->plugin_name . '_ubic_asegwpf' => sanitize_text_field( $ubicacionwpf ),
        $this->plugin_name . '_ubic_asegReferencia' => sanitize_text_field( $ubicacionReferencia ),
        $this->plugin_name . '_ubic_asegDireccion' => sanitize_text_field( $ubicacionDireccion ),
        $this->plugin_name . '_ubic_asegDistancia' => sanitize_text_field( $ubicacionDistancia ),
        $this->plugin_name . '_ubic_asegCP' => sanitize_text_field( $ubicacionCP ),
        $this->plugin_name . '_ubic_asegVisitas' => $contador,
        $this->plugin_name . '_Dummy' => true,
        'IDstamp' => $_COOKIE[ 'wpfid' ],
      ),
    );
    $post_id = wp_insert_post($my_post);
  }

  /**
  * Enviar Correo entrada datos usuario
  */
  public function wpfunosResultCorreoDatos( ){
    $referencia = $_GET['referencia'];
    $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
    if( ! get_option('wpfunos_activarCorreoDatosEntradosAseguradora')) return;
    if( apply_filters('wpfunos_reserved_email','dummy') ) return;
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    //$mensaje = get_option('wpfunos_mensajeCorreoDatosEntrados');
    $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoDatosEntradosAseguradora'), get_option('wpfunos_asuntoCorreoDatosEntradosAseguradora') );
    require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Datos-Usuario.php';
    if(!empty( get_option('wpfunos_mailCorreoCcoDatosEntradosAseguradora' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoDatosEntradosAseguradora' ) ;
    if(!empty( get_option('wpfunos_mailCorreoBccDatosEntradosAseguradora' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccDatosEntradosAseguradora' ) ;

    $args = array(
      'post_status' => 'publish',
      'post_type' => 'aseguradoras_wpfunos',
      'posts_per_page' => -1,
      'meta_key' =>  'wpfunos_aseguradorasLead',
      'meta_value' => true,
    );

    $post_list = get_posts( $args );
    if( $post_list ){
      foreach ( $post_list as $post ) :
        if( get_post_meta( $post->ID, $this->plugin_name . '_aseguradorasActivo', true ) == true && strlen( get_post_meta( $post->ID, $this->plugin_name . '_aseguradorasCorreo', true ) ) > 0 ){
          //wp_mail ( get_post_meta( $post->ID, $this->plugin_name . '_aseguradorasCorreo', true ), get_option('wpfunos_asuntoCorreoDatosEntrados') , $mensaje, $headers );
          do_action('wpfunos_log', '==============' );
          do_action('wpfunos_log', 'Enviar correo entrada datos a la aseguradora' );
          do_action('wpfunos_log', 'referencia: ' . $referencia );
          do_action('wpfunos_log', 'userIP: ' . $userIP );
          do_action('wpfunos_log', 'servicioEmail: ' . get_post_meta( $post->ID, $this->plugin_name . '_aseguradorasCorreo', true ) );
        }
      endforeach;
      wp_reset_postdata();
    }
    if( strlen( get_option('wpfunos_mailCorreoDatosEntradosAseguradora') ) > 0 ){
      wp_mail ( get_option('wpfunos_mailCorreoDatosEntradosAseguradora'), get_option('wpfunos_asuntoCorreoDatosEntradosAseguradora') , $mensaje, $headers );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Enviar correo entrada datos aseguradoras al admin' );
      do_action('wpfunos_log', 'referencia: ' . $referencia );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'mailCorreoDatosEntradosAseguradora: ' . get_option('wpfunos_mailCorreoDatosEntradosAseguradora') );
    }
  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/
  /**
  * Botón 'Te Llamamos'
  *
  * add_action('wp_ajax_nopriv_wpfunos_ajax_aseguradoras_llamen', function () { $this->wpfunosAseguradorasLlamen();});
  * add_action('wp_ajax_wpfunos_ajax_aseguradoras_llamen', function () {$this->wpfunosAseguradorasLlamen();});
  *
  */
  public function wpfunosAseguradorasLlamen(){
    $servicio = $_POST['wpfid'];
    $wpnonce = $_POST['wpfn'];
    $usuario = $_POST['wpfu'];
    $mensaje  = $_POST['wpfm'];
    $IP = apply_filters('wpfunos_userIP','dummy');

    // $nonce = wp_create_nonce("wpfunos_aseguradoras_nonce".apply_filters('wpfunos_userIP','dummy'));
    if ( !wp_verify_nonce( $wpnonce, "wpfunos_aseguradoras_nonce".$IP) ) {
      $result['type'] = "Bad nonce";
      $result = json_encode($result);
      echo $result;
      // don't forget to end your scripts with a die() function - very important
      die();
    }




    $result['type'] = "success";
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

}
