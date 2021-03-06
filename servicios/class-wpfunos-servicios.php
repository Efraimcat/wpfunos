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
class Wpfunos_Servicios {
  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
    add_shortcode( 'wpfunos-page-switch', array( $this, 'wpfunosServiciosPageSwitchShortcode' ));
    add_shortcode( 'wpfunos-actulizar-mapas-servicios', array( $this, 'wpfunosActualizarMapasServiciosShortcode' ));
    add_shortcode( 'wpfunos-pagina-servicios', array( $this, 'wpfunosPaginaServiciosShortcode' ));
    add_shortcode( 'wpfunos-pagina-resultados-servicios', array( $this, 'wpfunosPaginaResultadosServiciosShortcode' ));
    add_shortcode( 'wpfunos-acciones-botones-confirmado', array( $this, 'wpfunosAccionesBotonesConfirmadoShortcode' ));
    add_shortcode( 'wpfunos-resultados-empresa', array( $this, 'wpfunosResultadosEmpresaShortcode' ));
    add_shortcode( 'wpfunos-resultados-telefono-usuario', array( $this, 'wpfunosResultadosTelefonoUsuarioShortcode' ));
    add_shortcode( 'wpfunos-resultados-telefono-servicio', array( $this, 'wpfunosResultadosTelefonoServicioShortcode' ));
    add_shortcode( 'wpfunos-resultados-llamar-telefono-servicio', array( $this, 'wpfunosResultadosLamarTelefonoServicioShortcode' ));
    add_shortcode( 'wpfunos-resultados-estrellas', array( $this, 'wpfunosResultadosEstrellasShortcode' ));
    add_shortcode( 'wpfunos-resultados-detalles', array( $this, 'wpfunosResultadosDetallesShortcode' ));
    add_shortcode( 'wpfunos-resultados-detalles-comentarios', array( $this, 'wpfunosResultadosDetallesComentariosShortcode' ));
    add_shortcode( 'wpfunos-resultados-detalles-botones', array( $this, 'wpfunosResultadosDetallesBotonesShortcode' ));
    add_shortcode( 'wpfunos-resultados-detalles-logo', array( $this, 'wpfunosResultadosDetallesLogoShortcode' ));
    add_shortcode( 'wpfunos-resultados-detalles-logo-confirmado', array( $this, 'wpfunosResultadosDetallesLogoConfirmadoShortcode' ));
    add_shortcode( 'wpfunos-resultados-detalles-logo-ecologico', array( $this, 'wpfunosResultadosDetallesLogoEcologicoShortcode' ));
    add_shortcode( 'wpfunos-resultados-detalles-logo-promo', array( $this, 'wpfunosResultadosDetallesLogoPromoShortcode' ));
    add_shortcode( 'wpfunos-resultados-detalles-email', array( $this, 'wpfunosResultadosDetallesEmailShortcode' ));
    add_shortcode( 'wpfunos-resultados-presupuesto', array( $this, 'wpfunosResultadosPresupuestoShortcode' ));
    add_shortcode( 'wpfunos-resultados-precio-zona', array( $this, 'wpfunosResultadosPrecioZonaShortcode' ));
    add_action( 'wpfunos_result_user_entry', array( $this, 'wpfunosResultUserEntry' ), 10, 1 );
    add_action( 'wpfunos_result_grid_confirmado', array( $this, 'wpfunosResultGridConfirmado' ), 10, 1 );
    add_action( 'wpfunos_result_grid_sinconfirmar', array( $this, 'wpfunosResultGridSinConfirmar' ), 10, 1 );
    add_action( 'wpfunos_result_grid_sinprecio', array( $this, 'wpfunosResultGridSinPrecio' ), 10, 1 );
    add_action( 'wpfunos_busqueda_provincias', array( $this, 'wpfunosBusquedaProvincias' ), 10, 1 );
    add_filter( 'wpfunos_servicios_indeseados', array( $this, 'wpfunosServiciosIndeseados'), 10, 1 );
    add_filter( 'wpfunos_results_confirmado', array( $this, 'wpfunosResultadosConfirmado' ), 10, 4 );
    add_filter( 'wpfunos_results_sinconfirmar', array( $this, 'wpfunosResultadosSinConfirmar' ), 10, 4 );
    add_filter( 'wpfunos_results_sinprecio', array( $this, 'wpfunosResultadosSinPrecio' ), 10, 4 );
    add_filter( 'wpfunos_get_results', array( $this, 'wpfunosGetResults' ),10, 2 );

    add_action('wp_ajax_nopriv_wpfunos_ajax_servicios_llamame', function () { $this->wpfunosServiciosBotonLlamame();});
    add_action('wp_ajax_wpfunos_ajax_servicios_llamame', function () {$this->wpfunosServiciosBotonLlamame();});

    add_action('wp_ajax_nopriv_wpfunos_ajax_servicios_llamar', function () { $this->wpfunosServiciosBotonLlamar();});
    add_action('wp_ajax_wpfunos_ajax_servicios_llamar', function () {$this->wpfunosServiciosBotonLlamar();});

    add_action('wp_ajax_nopriv_wpfunos_ajax_servicios_presupuesto', function () { $this->wpfunosServiciosBotonPresupuesto();});
    add_action('wp_ajax_wpfunos_ajax_servicios_presupuesto', function () {$this->wpfunosServiciosBotonPresupuesto();});

    add_action('wp_ajax_nopriv_wpfunos_ajax_servicios_enviar_presupuesto', function () { $this->wpfunosServiciosBotonEnviarPresupuesto();});
    add_action('wp_ajax_wpfunos_ajax_servicios_enviar_presupuesto', function () {$this->wpfunosServiciosBotonEnviarPresupuesto();});

    add_action('wp_ajax_nopriv_wpfunos_ajax_servicios_detalles', function () { $this->wpfunosServiciosBotonDetalles();});
    add_action('wp_ajax_wpfunos_ajax_servicios_detalles', function () {$this->wpfunosServiciosBotonDetalles();});
  }
  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-servicios.css', array(), $this->version, 'all' );
  }
  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-servicios.js', array( 'jquery' ), $this->version, false );
  }
  /*********************************/
  /*****  SHORTCODES          ******/
  /*********************************/

  /**
  * Shortcode [wpfunos-page-switch]
  */
  public function wpfunosServiciosPageSwitchShortcode(){
    global $wp;
    if( !isset( $_GET['form'] ) && !isset( $_GET['referencia'] ) ){
      echo do_shortcode( get_option('wpfunos_paginaComparadorGeoMyWp') );
    }elseif( !isset($_GET['wpf']) ){
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
      //
      // Guardar datos ubicacion
      //
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '2. - P??gina Entrada datos' );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', '$_GET[wpf]: ' . $_GET['wpf'] );
      do_action('wpfunos_log', '$_GET[referencia]: ' . $_GET['referencia'] );
      do_action('wpfunos_log', '$_GET[direccion]: ' . $_GET['direccion'] );
      do_action('wpfunos_log', '$_GET[CP]: ' . $_GET['CP'] );
      do_action('wpfunos_log', '$_GET[Email]: ' . $_GET['Email'] );
      do_action('wpfunos_log', '$_GET[nombreUsuario]: ' . $_GET['nombreUsuario'] );
      $this->wpfunosEntradaUbicacion( $userIP , $_GET['wpf'], $_GET['referencia'], $_GET['direccion'], $_GET['CP'] , $_GET['distance'] );
      echo do_shortcode( get_option('wpfunos_seccionComparaPreciosDatos') );
    }elseif( isset($_GET['wpf'] ) ){
      $userIP = apply_filters('wpfunos_userIP','dummy');
      $cryptcode = apply_filters( 'wpfunos_crypt', $_GET['wpf'], 'd' );
      $codigo = ( explode( ',' , $cryptcode ) );
      $_GET['referencia'] = $codigo[0];
      $_GET['CP'] = $codigo[1];
      $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', '4. - P??gina Resultados' );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
      do_action('wpfunos_log', '$_GET[wpf]: ' . $_GET['wpf'] );
      do_action('wpfunos_log', '$cryptcode: ' . $cryptcode );
      do_action('wpfunos_log', '$_GET[referencia]: ' . $_GET['referencia'] );
      do_action('wpfunos_log', '$_GET[CP]: ' . $_GET['CP'] );
      //Filtro usuarios indeseados
      if ( apply_filters( 'wpfunos_servicios_indeseados', $_GET['wpf'] ) ){
        ?>
        <div class="wpfunos-resultados-orden">
          <h2>No se han podido encontrar resultados.</h2>
        </div>
        <?php
        do_action('wpfunos_log', '==============' );
        do_action('wpfunos_log', 'Filtro Indeseados' );
        return;
      }
      //
      do_action('wpfunos_update phone', get_post_meta( $IDusuario, 'wpfunos_userPhone', true ) );
      //
      if( $IDusuario != 0 ){
        // Solo enviar lead si no se ha enviado anteriormente.
        if ( !get_post_meta( $IDusuario, 'wpfunos_userLead', true ) ){
          $this->wpfunosResultCorreoDatos();
          // Marcar lead como enviado.
          update_post_meta( $IDusuario, $this->plugin_name . '_userLead', true );
        }
        echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosCabecera') );
        //
        //	Cambiar el tipo de ordenaci??n de los datos.
        //
        ?>
        <div class="wpfunos-resultados-orden-info" style="margin-top: 10px;text-align: center;">Los resultados estan ordenados por <?php echo 'dist' === $_GET['orden'] ? 'distancia' : 'precio';  ?>.</div>
        <div class="wpfunos-resultados-orden-container">Ordenar resultados por:</div><?php
        if( ! isset( $_GET['orden'] ) || $_GET['orden'] == 'dist') {
          do_action('wpfunos_log', 'Orden distancia: ');
          if( ! isset( $_GET['orden'] ) ){
            $new_url = home_url(add_query_arg(array($_GET), $wp->request)) . '&orden=precios';
          }else{
            $new_url = str_replace("&orden=dist","&orden=precios", home_url(add_query_arg(array($_GET), $wp->request) ) );
          }
          ?>
          <div class="wpfunos-resultados-orden">
            <button id="wpfunos-orden-inactivo">Distancia</button><button id="wpfunos-orden-activo"><a href=" <?php echo $new_url; ?> ">Precio</a></button>
          </div>
          <?php
        }else{
          do_action('wpfunos_log', 'Orden precio: ');
          $new_url = str_replace("&orden=precios","&orden=dist", home_url(add_query_arg(array($_GET), $wp->request) ) );
          ?>
          <div class="wpfunos-resultados-orden" style="text-align: center">
            <button id="wpfunos-orden-activo"><a href=" <?php echo $new_url; ?> ">Distancia</a></button><button id="wpfunos-orden-inactivo">Precio</button>
          </div>
          <?php
        }
        //
        echo do_shortcode( get_option('wpfunos_formGeoMyWp') );
        echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosPie') );
        //require 'js/' . $this->plugin_name . '-servicios-botones.js';
      }
    }
  }

  /**
  * Shortcode [wpfunos-actulizar-mapas-servicios]
  */
  public function wpfunosActualizarMapasServiciosShortcode( $atts, $content = "" ) {
    if ( get_post_type( get_the_ID() ) != 'servicios_wpfunos' ) return;
    $this->gmw_update_post_type_post_location( get_the_ID() );
  }

  /**
  * Shortcode [wpfunos-pagina-servicios]
  */
  public function wpfunosPaginaServiciosShortcode( $atts, $content = "" ) {
    return do_shortcode( get_option('wpfunos_paginaComparador') );
  }

  /**
  * Shortcode [wpfunos-pagina-resultados-servicios]
  * https://funos.es/comparar-precios?address%5B%5D=[field id="address"]&post%5B%5D=[field id="post"]&distance=[field id="distance"]&units=[field id="units"]&page1=&per_page=50&lat=[field id="lat"]&lng=[field id="lng"]&form=4&action=fs&wpf=[field id="wpf"]
  */
  public function wpfunosPaginaResultadosServiciosShortcode( $atts, $content = "" ) {
    echo get_option('wpfunos_paginaURLResultadosServicios');
  }

  /**
  * Shortcode [wpfunos-acciones-botones-confirmado]
  */
  public function wpfunosAccionesBotonesConfirmadoShortcode( $atts, $content = "" ) {
    if( strlen( $_GET['telefonoUsuario'] ) > 3 ) {
      $this->wpfunosResultUserEntry();
      $this->wpfunosResultCorreoAdmin();
      $this->wpfunosResultCorreoLead();
    }else{
      $userIP = apply_filters('wpfunos_userIP','dummy');
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Error 3 Nuevo Usuario: ' . $userIP );
      do_action('wpfunos_log', 'referencia: ' .  $fields['referencia']  );
    }
  }

  /**
  * Shortcode [wpfunos-resultados-empresa]
  */
  public function wpfunosResultadosEmpresaShortcode( $atts, $content = "" ) {
    $a = shortcode_atts( array(
      'boton'=>'',
    ), $atts );
    switch ( $a['boton'] ) {
      case 'logo': echo $_GET['logo'] ; break;
      case 'promo': echo $_GET['promo'] ; break;
      case 'echo': echo $_GET['ecologico'] ; break;
      case 'confirmado': echo $_GET['confirmado'] ; break;
      case 'mapa': $idempresa = $_GET['servicio']; $shortcode = '[gmw_single_location object="post" object_id="' . $idempresa . '" elements="map,distance,address,directions_link" units="k" map_height="300px" map_width="100%"]'; echo do_shortcode($shortcode); break;
      case 'textoprecio': echo $_GET['textoprecio'] ; break;
    }
  }

  /**
  * Shortcode [wpfunos-resultados-telefono-usuario]
  */
  public function wpfunosResultadosTelefonoUsuarioShortcode( $atts, $content = "" ) {
    return $_GET['telefonoUsuario'];
  }

  /**
  * Shortcode [wpfunos-resultados-telefono-servicio]
  */
  public function wpfunosResultadosTelefonoServicioShortcode( $atts, $content = "" ) {
    $tel = str_replace(" ","",$_GET['telefonoEmpresa']);
    $tel = str_replace("-","",$tel);
    return substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
  }

  /**
  * Shortcode [wpfunos-resultados-llamar-telefono-servicio]
  */
  public function wpfunosResultadosLamarTelefonoServicioShortcode( $atts, $content = "" ) {
    return '<a href="tel:' . $_GET['telefono'] . '">Llamar</a>';
  }

  /**
  * Shortcode [wpfunos-resultados-estrellas]
  */
  public function wpfunosResultadosEstrellasShortcode( $atts, $content = "" ) {
    return (int)$_GET['valoracion'];
  }
  /**
  * Shortcode [wpfunos-resultados-detalles]
  */
  public function wpfunosResultadosDetallesShortcode( $atts, $content = "" ) {
    if( $_GET['desgloseBaseDescuento'] == '0%' && $_GET['desgloseDestinoDescuento'] == '%' && $_GET['desgloseAtaudDescuento'] == '%' && $_GET['desgloseVelatorioDescuento'] == '%' && $_GET['desgloseCeremoniaDescuento'] == '%'){
      $_GET['desgloseBaseDescuento'] = ''; $_GET['desgloseBaseTotal'] = '';
      $_GET['desgloseDestinoDescuento'] = ''; $_GET['desgloseDestinoTotal'] = '';
      $_GET['desgloseAtaudDescuento'] = ''; $_GET['desgloseAtaudTotal'] = '';
      $_GET['desgloseVelatorioDescuento'] = ''; $_GET['desgloseVelatorioTotal'] = '';
      $_GET['desgloseCeremoniaDescuento'] = ''; $_GET['desgloseCeremoniaTotal'] = '';
      $_GET['desgloseDescuentoGenericoTotal'] = '';
    }
    if( $_GET['desgloseBaseDescuento'] == '0%' ) $_GET['desgloseBaseDescuento'] = '';
    if( $_GET['desgloseDestinoDescuento'] == '%' ) $_GET['desgloseDestinoDescuento'] = '';
    if( $_GET['desgloseAtaudDescuento'] == '%' ) $_GET['desgloseAtaudDescuento'] = '';
    if( $_GET['desgloseVelatorioDescuento'] == '%' ) $_GET['desgloseVelatorioDescuento'] = '';
    if( $_GET['desgloseCeremoniaDescuento'] == '%' ) $_GET['desgloseCeremoniaDescuento'] = '';
  }

  /**
  * Shortcode [wpfunos-resultados-detalles-comentarios]
  */
  public function wpfunosResultadosDetallesComentariosShortcode( $atts, $content = "" ) {
    $respuesta = (explode(',',$_GET['seleccionUsuario']));
    echo '<h4><strong>??Qu?? est?? incluido en Precio base?</strong></h4>';
    echo $this->wpfunosFormatoComentario( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioPrecioBaseComentario', true ) );
    if( $respuesta[3] == 1 ) {
      echo '<h4><strong>??Qu?? est?? incluido en entierro?</strong></h4>';
      echo $this->wpfunosFormatoComentario( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioDestino_1Comentario', true ) );
    }
    if( $respuesta[3] == 2 ) {
      echo '<h4><strong>??Qu?? est?? incluido en incineraci??n?</strong></h4>';
      echo $this->wpfunosFormatoComentario( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioDestino_2Comentario', true ) );
    }
    if( $respuesta[4] == 1 ) {
      echo '<h4><strong>??Qu?? est?? incluido en ata??d gama econ??mica?</strong></h4>';
      echo $this->wpfunosFormatoComentario( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioAtaud_1Comentario', true ) );
    }
    if( $respuesta[4] == 2 ) {
      echo '<h4><strong>??Qu?? est?? incluido en ata??d gama media?</strong></h4>';
      echo $this->wpfunosFormatoComentario( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioAtaud_2Comentario', true ) );
    }
    if( $respuesta[5] == 1  && strlen( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioVelatorioComentario', true ) ) > 0 ){
      echo '<h4><strong>??Qu?? est?? incluido en velatorio?</strong></h4>';
      echo $this->wpfunosFormatoComentario( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioVelatorioComentario', true ) );
    }
    if( $respuesta[5] == 2  && strlen( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioVelatorioNoComentario', true ) ) > 0 ){
      echo '<h4><strong>??Qu?? est?? incluido en velatorio?</strong></h4>';
      echo $this->wpfunosFormatoComentario( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioVelatorioNoComentario', true ) );
    }
    if( $respuesta[6] == 2 ) {
      echo '<h4><strong>??Qu?? est?? incluido en ceremonia S??lo la sala?</strong></h4>';
      echo $this->wpfunosFormatoComentario( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioDespedida_1Comentario', true ) );
    }
    if( $respuesta[6] == 3 ) {
      echo '<h4><strong>??Qu?? est?? incluido en ceremonia civil?</strong></h4>';
      echo $this->wpfunosFormatoComentario( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioDespedida_2Comentario', true ) );
    }
    if( $respuesta[6] == 4 ) {
      echo '<h4><strong>??Qu?? est?? incluido en ceremonia religiosa?</strong></h4>';
      echo $this->wpfunosFormatoComentario( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioDespedida_3Comentario', true ) );
    }
    if( strlen( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioPosiblesExtras', true ) )> 0 ){
      echo '<h4><strong>Posibles Extras</strong></h4>';
      echo $this->wpfunosFormatoComentario( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioPosiblesExtras', true ) );
    }
  }

  /**
  * Shortcode [wpfunos-resultados-detalles-botones]
  */
  public function wpfunosResultadosDetallesBotonesShortcode( $atts, $content = "" ) {
    $a = shortcode_atts( array(
      'boton'=>'',
    ), $atts );
    if( $a['boton'] == 'llamada' ){
      if( get_post_meta( $_GET['servicio'], 'wpfunos_servicioBotonesLlamar', true ) == 1 ){
        $_GET['telefonoEmpresa'] = get_post_meta( $_GET['servicio'], 'wpfunos_servicioTelefono', true );
        $tel = str_replace(" ","",$_GET['telefonoEmpresa']);
        $tel = str_replace("-","",$tel);
        $_GET['telefonoEmpresa']= substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
        $tel = str_replace(" ","",$_GET['telefonoUsuario']);
        $tel = str_replace("-","",$tel);
        $_GET['telefonoUsuario'] = substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
        require 'partials/' . $this->plugin_name . '-servicios-detalles-botones-llamadas-display.php';
      }
    }elseif( $a['boton'] == 'correo' ){
      require 'partials/' . $this->plugin_name . '-servicios-detalles-botones-correo-display.php';
    }

  }

  /**
  * Shortcode [wpfunos-resultados-detalles-logo]
  */
  public function wpfunosResultadosDetallesLogoShortcode( $atts, $content = "" ) {
    echo wp_get_attachment_image ( get_post_meta( $_GET['servicio'], 'wpfunos_servicioLogo', true ) ,'full' );
  }

  /**
  * Shortcode [wpfunos-resultados-detalles-logo-confirmado]
  */
  public function wpfunosResultadosDetallesLogoConfirmadoShortcode( $atts, $content = "" ) {
    if( 'Precio confirmado' === $_GET['textoconfirmado'] ){
      echo wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenConfirmado', true ) , array(45,46));
    }else{
      echo wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenNoConfirmado', true ) , array(45,46));
    }
  }

  /**
  * Shortcode [wpfunos-resultados-detalles-logo-ecologico]
  */
  public function wpfunosResultadosDetallesLogoEcologicoShortcode( $atts, $content = "" ) {
    if ( $_GET['esecologico'] == 1 ){
      echo wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenEcologico', true ) , array(60,60));
    }
  }

  /**
  * Shortcode [wpfunos-resultados-detalles-logo-promo]
  */
  public function wpfunosResultadosDetallesLogoPromoShortcode( $atts, $content = "" ) {
    if( strlen ( $_GET['promo'] ) > 0 ) echo wp_get_attachment_image ( $_GET['promo'] ,'full' );
  }

  /**
  * Shortcode [wpfunos-resultados-detalles-email]
  */
  public function wpfunosResultadosDetallesEmailShortcode( $atts, $content = "" ) {
    if( strlen( $_GET['Email'] ) < 5 ) return;
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoPopupDetalles'), get_option('wpfunos_asuntoCorreoPopupDetalles') );
    require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Calculos.php';
    if(!empty( get_option('wpfunos_mailCorreoCcoPopupDetalles' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPopupDetalles' ) ;
    if(!empty( get_option('wpfunos_mailCorreoBccPopupDetalles' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPopupDetalles' ) ;

    wp_mail ( $_GET['Email'], get_option('wpfunos_asuntoCorreoPopupDetalles') , $mensaje, $headers );

    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Enviar correo detalles' );
    do_action('wpfunos_log', 'userIP: ' . $userIP );
    do_action('wpfunos_log', '$headers: ' . apply_filters('wpfunos_dumplog', $headers  ) );
    do_action('wpfunos_log', '$_GET[Email]: ' . $_GET['Email'] );
  }

  /**
  * Shortcode [wpfunos-resultados-presupuesto]
  */
  public function wpfunosResultadosPresupuestoShortcode( $atts, $content = "" ) {
    if( ! isset ( $_GET['wpfunos-select-comentarios'] ) ){
      require 'partials/' . $this->plugin_name . '-servicios-detalles-boton-presupuesto-display.php';
    }else{
      $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
      $userIP = apply_filters('wpfunos_userIP','dummy');
      mt_srand(mktime());
      $referencia = 'funos-'.(string)mt_rand();
      $my_post = array(
        'post_title' => $referencia,
        'post_type' => 'usuarios_wpfunos',
        'post_status'  => 'publish',
        'meta_input'   => array(
          $this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
          $this->plugin_name . '_userReferencia' => sanitize_text_field( $referencia ),
          $this->plugin_name . '_userName' => $_GET['nombreUsuario'],
          $this->plugin_name . '_userPhone' => $_GET['telefonoUsuario'],
          $this->plugin_name . '_userSeleccion' => $_GET['seleccionUsuario'],
          $this->plugin_name . '_userAccion' => '5',
          $this->plugin_name . '_userNombreAccion' => 'Bot??n pedir presupuesto',
          $this->plugin_name . '_userNombreSeleccionUbicacion' => sanitize_text_field( get_post_meta( $IDusuario ,$this->plugin_name . '_userNombreSeleccionUbicacion', true ) ),
          $this->plugin_name . '_userNombreSeleccionDistancia' => sanitize_text_field( get_post_meta( $IDusuario ,$this->plugin_name . '_userNombreSeleccionDistancia', true ) ),
          $this->plugin_name . '_userNombreSeleccionServicio' => sanitize_text_field( get_post_meta( $IDusuario ,$this->plugin_name . '_userNombreSeleccionServicio', true ) ),
          $this->plugin_name . '_userNombreSeleccionAtaud' => sanitize_text_field( get_post_meta( $IDusuario ,$this->plugin_name . '_userNombreSeleccionAtaud', true ) ),
          $this->plugin_name . '_userNombreSeleccionVelatorio' => sanitize_text_field( get_post_meta( $IDusuario ,$this->plugin_name . '_userNombreSeleccionVelatorio', true ) ),
          $this->plugin_name . '_userNombreSeleccionDespedida' => sanitize_text_field( get_post_meta( $IDusuario ,$this->plugin_name . '_userNombreSeleccionDespedida', true ) ),
          $this->plugin_name . '_userServicio' => $_GET['servicio'],
          $this->plugin_name . '_userCP' => $_GET['CPUsuario'],
          $this->plugin_name . '_userMail' => $_GET['Email'],

          $this->plugin_name . '_userServicioEnviado' => true,
          $this->plugin_name . '_userServicioTitulo' => $_GET['ServicioTitulo'],
          $this->plugin_name . '_userServicioEmpresa' => $_GET['ServicioEmpresa'],
          $this->plugin_name . '_userServicioPoblacion' => $_GET['ServicioPoblacion'],
          $this->plugin_name . '_userServicioProvincia' => $_GET['ServicioProvincia'],

          $this->plugin_name . '_userIP' => sanitize_text_field( get_post_meta( $IDusuario ,$this->plugin_name . '_userIP', true ) ),
          $this->plugin_name . '_userLAT' => sanitize_text_field( get_post_meta( $IDusuario ,$this->plugin_name . '_userLAT', true ) ),
          $this->plugin_name . '_userLNG' => sanitize_text_field( get_post_meta( $IDusuario ,$this->plugin_name . '_userLNG', true ) ),
          $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
          $this->plugin_name . '_Dummy' => true,
          $this->plugin_name . '_userLead' => true,

          $this->plugin_name . '_userPrecio' => $_GET['precio'],

          $this->plugin_name . '_userDesgloseBaseNombre' => $_GET['desgloseBaseNombre'],
          $this->plugin_name . '_userDesgloseBasePrecio' => $_GET['desgloseBasePrecio'],
          $this->plugin_name . '_userDesgloseBaseDescuento' => $_GET['desgloseBaseDescuento'],
          $this->plugin_name . '_userDesgloseBaseTotal' => $_GET['desgloseBaseTotal'],

          $this->plugin_name . '_userDesgloseDestinoNombre' => $_GET['desgloseDestinoNombre'],
          $this->plugin_name . '_userDesgloseDestinoPrecio' => $_GET['desgloseDestinoPrecio'],
          $this->plugin_name . '_userDesgloseDestinoDescuento' => $_GET['desgloseDestinoDescuento'],
          $this->plugin_name . '_userDesgloseDestinoTotal' => $_GET['desgloseDestinoTotal'],

          $this->plugin_name . '_userDesgloseAtaudNombre' => $_GET['desgloseAtaudNombre'],
          $this->plugin_name . '_userDesgloseAtaudPrecio' => $_GET['desgloseAtaudPrecio'],
          $this->plugin_name . '_userDesgloseAtaudDescuento' => $_GET['desgloseAtaudDescuento'],
          $this->plugin_name . '_userDesgloseAtaudTotal' => $_GET['desgloseAtaudTotal'],

          $this->plugin_name . '_userDesgloseVelatorioNombre' => $_GET['desgloseVelatorioNombre'],
          $this->plugin_name . '_userDesgloseVelatorioPrecio' => $_GET['desgloseVelatorioPrecio'],
          $this->plugin_name . '_userDesgloseVelatorioDescuento' => $_GET['desgloseVelatorioDescuento'],
          $this->plugin_name . '_userDesgloseVelatorioTotal' => $_GET['desgloseVelatorioTotal'],

          $this->plugin_name . '_userDesgloseCeremoniaNombre' => $_GET['desgloseCeremoniaNombre'],
          $this->plugin_name . '_userDesgloseCeremoniaPrecio' => $_GET['desgloseCeremoniaPrecio'],
          $this->plugin_name . '_userDesgloseCeremoniaDescuento' => $_GET['desgloseCeremoniaDescuento'],
          $this->plugin_name . '_userDesgloseCeremoniaTotal' => $_GET['desgloseCeremoniaTotal'],

          $this->plugin_name . '_userDesgloseDescuentoGenerico' => $_GET['desgloseDescuentoGenerico'],
          $this->plugin_name . '_userDesgloseDescuentoGenericoPrecio' => $_GET['desgloseDescuentoGenericoPrecio'],
          $this->plugin_name . '_userDesgloseDescuentoGenericoDescuento' => $_GET['desgloseDescuentoGenericoDescuento'],
          $this->plugin_name . '_userDesgloseDescuentoGenericoTotal' => $_GET['desgloseDescuentoGenericoTotal'],
        ),
      );
      $post_id = wp_insert_post($my_post);
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Acci??n en p??gina resultados: Pedir presupuesto' );
      do_action('wpfunos_log', 'Nombre: ' .  $_GET['nombreUsuario']  );
      do_action('wpfunos_log', 'IP: ' . $userIP  );
      do_action('wpfunos_log', 'ID: ' . $post_id  );
      do_action('wpfunos_log', 'referencia: ' .  $referencia  );
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoPedirPresupuesto'), get_option('wpfunos_asuntoCorreoPedirPresupuesto') );
      require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Calculos.php';

      $comentarios = apply_filters('wpfunos_comentario', $_GET['wpfunos-select-comentarios'] );
      $mensaje = str_replace( '[comentariosPresupuesto]' , $comentarios, $mensaje );

      $headers[] = 'Content-Type: text/html; charset=UTF-8';
      if(!empty( get_option('wpfunos_mailCorreoCcoPedirPresupuesto' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPedirPresupuesto' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccPedirPresupuesto' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPedirPresupuesto' ) ;
      wp_mail ( get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioEmail', true ), get_option('wpfunos_asuntoCorreoPedirPresupuesto') , $mensaje, $headers );

      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Enviado correo pedir presupuesto ' . apply_filters('wpfunos_dumplog', get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioEmail', true ) ) );
      do_action('wpfunos_log', 'Nombre: ' .  $_GET['nombreUsuario'] );
      do_action('wpfunos_log', '$referencia: ' . $referencia );

      ?>
      <div class="wpfunos-resultados-orden">
        <h2>Petici??n de presupuesto enviada.</h2>
        <p>Mensaje enviado a <strong><?php echo get_post_meta( $_GET['servicio'], $this->plugin_name . '_servicioNombre', true ); ?></strong></p>
      </div>
      <?php
    }
  }

  /**
  * Shortcode [wpfunos-resultados-precio-zona]
  */
  public function wpfunosResultadosPrecioZonaShortcode( $atts, $content = "" ) {
    if( ! isset($_GET['wpf'] ) ) return;

    $cryptcode = apply_filters( 'wpfunos_crypt', $_GET['wpf'], 'd' );
    $codigo = ( explode( ',' , $cryptcode ) );
    $referencia = $codigo[0];
    $CP = $codigo[1];
    if( strlen($CP) < 5 ) return;
    $IDusuario = apply_filters('wpfunos_userID', $referencia );
    $seleccion = get_post_meta( $IDusuario, $this->plugin_name . '_userSeleccion', true );
    $respuesta = (explode(',',$seleccion));
    switch($respuesta[3]){
      case '1': $destino = 'E' ; break;
      case '2': $destino = 'I' ; break;
    }
    switch($respuesta[4]){
      case '1': $ataud = 'E' ; break;
      case '2': $ataud = 'M' ; break;
      case '3': $ataud = 'P' ; break;
    }
    switch($respuesta[5]){
      case '1': $velatorio = 'V' ; break;
      case '2': $velatorio = 'S' ; break;
    }
    switch($respuesta[6]){
      case '1': $despedida = 'S' ; break;
      case '2': $despedida = 'O' ; break;
      case '3': $despedida = 'C' ; break;
      case '4': $despedida = 'R' ; break;
    }
    $codigo_provincia = substr( trim( $CP, " " ), 0, 2 );
    $campo = $destino . $ataud . $velatorio . $despedida;

    $args = array(
      'post_type' => 'prov_zona_wpfunos',
      'meta_key' =>  $this->plugin_name . '_provinciasCodigo',
      'meta_value' => $codigo_provincia,
    );
    echo do_shortcode( get_option('wpfunos_seccionPreciosExclusivos') );
    ?>
    <div class="wpfunos-prov-zona">
      <?php
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
      ?>
    </div>
    <?php
  }

  /*********************************/
  /*****  HOOKS               ******/
  /*********************************/

  /**
  * Entrada acci??n usuario
  *
  * add_action( 'wpfunos_result_user_entry', array( $this, 'wpfunosResultUserEntry' ), 10, 1 );
  */
  public function wpfunosResultUserEntry(){
    mt_srand(mktime());
    $_GET['referencia'] = 'funos-'.(string)mt_rand();
    $userIP = apply_filters('wpfunos_userIP','dummy');
    $respuesta = (explode(',',$_GET['seleccion']));
    switch ( $respuesta[3] ) {
      case '1': $userNombreSeleccionServicio = 'Entierro'; break;
      case '2': $userNombreSeleccionServicio = 'Incineraci??n'; break;
    }
    switch ( $respuesta[4] ) {
      case '1': $userNombreSeleccionAtaud = 'Ata??d Econ??mico'; break;
      case '2': $userNombreSeleccionAtaud = 'Ata??d Medio'; break;
      case '3': $userNombreSeleccionAtaud = 'Ata??d Premium'; break;
    }
    switch ( $respuesta[5] ) {
      case '1': $userNombreSeleccionVelatorio = 'Velatorio'; break;
      case '2': $userNombreSeleccionVelatorio = 'Sin Velatorio'; break;
    }
    switch ( $respuesta[6] ) {
      case '1': $userNombreSeleccionDespedida = 'Sin ceremonia'; break;
      case '2': $userNombreSeleccionDespedida = 'Solo sala'; break;
      case '3': $userNombreSeleccionDespedida = 'Ceremonia civil'; break;
      case '4': $userNombreSeleccionDespedida = 'Ceremonia religiosa'; break;
    }
    if($_GET['accion'] == 1 ) $textoaccion = "Bot??n llamen servicios";
    if($_GET['accion'] == 2 ) $textoaccion = "Bot??n llamar servicios";
    if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acci??n Usuario Desarrollador";

    $my_post = array(
      'post_title' => $_GET['referencia'],
      'post_type' => 'usuarios_wpfunos',
      'post_status'  => 'publish',
      'meta_input'   => array(
        $this->plugin_name . '_TimeStamp' => date( 'd-m-Y H:i:s', current_time( 'timestamp', 0 ) ),
        $this->plugin_name . '_userReferencia' => sanitize_text_field( $_GET['referencia'] ),
        $this->plugin_name . '_userName' => sanitize_text_field( $_GET['nombreUsuario'] ),
        $this->plugin_name . '_userPhone' => sanitize_text_field( $_GET['telefonoUsuario'] ),
        $this->plugin_name . '_userSeleccion' => sanitize_text_field( $_GET['seleccion']),
        $this->plugin_name . '_userAccion' => sanitize_text_field( $_GET['accion']),
        $this->plugin_name . '_userNombreAccion' => sanitize_text_field( $textoaccion ),
        $this->plugin_name . '_userNombreSeleccionUbicacion' => sanitize_text_field( $respuesta[0] ),
        $this->plugin_name . '_userNombreSeleccionDistancia' => sanitize_text_field( $respuesta[1] ),
        $this->plugin_name . '_userNombreSeleccionServicio' => sanitize_text_field( $userNombreSeleccionServicio ),
        $this->plugin_name . '_userNombreSeleccionAtaud' => sanitize_text_field( $userNombreSeleccionAtaud ),
        $this->plugin_name . '_userNombreSeleccionVelatorio' => sanitize_text_field( $userNombreSeleccionVelatorio ),
        $this->plugin_name . '_userNombreSeleccionDespedida' => sanitize_text_field( $userNombreSeleccionDespedida ),
        $this->plugin_name . '_userPrecio' => sanitize_text_field( $_GET['precio']),
        $this->plugin_name . '_userServicio' => sanitize_text_field( $_GET['servicio']),
        $this->plugin_name . '_userCP' => sanitize_text_field( $_GET['CPUsuario']),
        $this->plugin_name . '_userMail' => sanitize_text_field( $_GET['Email']),

        $this->plugin_name . '_userServicioEnviado' => true,
        $this->plugin_name . '_userServicioTitulo' => sanitize_text_field($_GET['ServicioTitulo']),
        $this->plugin_name . '_userServicioEmpresa' => sanitize_text_field($_GET['ServicioEmpresa']),
        $this->plugin_name . '_userServicioPoblacion' => sanitize_text_field($_GET['ServicioPoblacion']),
        $this->plugin_name . '_userServicioProvincia' => sanitize_text_field($_GET['ServicioProvincia']),

        $this->plugin_name . '_userDesgloseBaseNombre' => sanitize_text_field( $_GET['desgloseBaseNombre']),
        $this->plugin_name . '_userDesgloseBasePrecio' => sanitize_text_field( $_GET['desgloseBasePrecio']),
        $this->plugin_name . '_userDesgloseBaseDescuento' => sanitize_text_field( $_GET['desgloseBaseDescuento']),
        $this->plugin_name . '_userDesgloseBaseTotal' => sanitize_text_field( $_GET['desgloseBaseTotal']),

        $this->plugin_name . '_userDesgloseDestinoNombre' => sanitize_text_field( $_GET['desgloseDestinoNombre']),
        $this->plugin_name . '_userDesgloseDestinoPrecio' => sanitize_text_field( $_GET['desgloseDestinoPrecio']),
        $this->plugin_name . '_userDesgloseDestinoDescuento' => sanitize_text_field( $_GET['desgloseDestinoDescuento']),
        $this->plugin_name . '_userDesgloseDestinoTotal' => sanitize_text_field( $_GET['desgloseDestinoTotal']),

        $this->plugin_name . '_userDesgloseAtaudNombre' => sanitize_text_field( $_GET['desgloseAtaudNombre']),
        $this->plugin_name . '_userDesgloseAtaudPrecio' => sanitize_text_field( $_GET['desgloseAtaudPrecio']),
        $this->plugin_name . '_userDesgloseAtaudDescuento' => sanitize_text_field( $_GET['desgloseAtaudDescuento']),
        $this->plugin_name . '_userDesgloseAtaudTotal' => sanitize_text_field( $_GET['desgloseAtaudTotal']),

        $this->plugin_name . '_userDesgloseVelatorioNombre' => sanitize_text_field( $_GET['desgloseVelatorioNombre']),
        $this->plugin_name . '_userDesgloseVelatorioPrecio' => sanitize_text_field( $_GET['desgloseVelatorioPrecio']),
        $this->plugin_name . '_userDesgloseVelatorioDescuento' => sanitize_text_field( $_GET['desgloseVelatorioDescuento']),
        $this->plugin_name . '_userDesgloseVelatorioTotal' => sanitize_text_field( $_GET['desgloseVelatorioTotal']),

        $this->plugin_name . '_userDesgloseCeremoniaNombre' => sanitize_text_field( $_GET['desgloseCeremoniaNombre']),
        $this->plugin_name . '_userDesgloseCeremoniaPrecio' => sanitize_text_field( $_GET['desgloseCeremoniaPrecio']),
        $this->plugin_name . '_userDesgloseCeremoniaDescuento' => sanitize_text_field( $_GET['desgloseCeremoniaDescuento']),
        $this->plugin_name . '_userDesgloseCeremoniaTotal' => sanitize_text_field( $_GET['desgloseCeremoniaTotal']),

        $this->plugin_name . '_userDesgloseDescuentoGenerico' => sanitize_text_field( $_GET['desgloseDescuentoGenerico']),
        $this->plugin_name . '_userDesgloseDescuentoGenericoPrecio' => sanitize_text_field( $_GET['desgloseDescuentoGenericoPrecio']),
        $this->plugin_name . '_userDesgloseDescuentoGenericoDescuento' => sanitize_text_field( $_GET['desgloseDescuentoGenericoDescuento']),
        $this->plugin_name . '_userDesgloseDescuentoGenericoTotal' => sanitize_text_field( $_GET['ddesgloseDescuentoGenericoTotal']),

        $this->plugin_name . '_userIP' => sanitize_text_field( $userIP ),
        $this->plugin_name . '_userAceptaPolitica' => '1',
        $this->plugin_name . '_userLAT' => sanitize_text_field( $_GET['lat'] ),
        $this->plugin_name . '_userLNG' => sanitize_text_field( $_GET['lng'] ),
        $this->plugin_name . '_userPluginVersion' => sanitize_text_field( $this->version ),
        $this->plugin_name . '_Dummy' => true,
      ),
    );
    if( strlen( $_GET['telefonoUsuario'] ) > 3 ) {
      $post_id = wp_insert_post($my_post);
      update_post_meta( $IDusuario, $this->plugin_name . '_userLead', true );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Acci??n en p??gina resultados: ' . $textoaccion );
      do_action('wpfunos_log', 'Nombre: ' .  $_GET['nombreUsuario']  );
      do_action('wpfunos_log', 'IP: ' . $userIP  );
      do_action('wpfunos_log', 'ID: ' . $post_id  );
      do_action('wpfunos_log', 'referencia: ' .  $_GET['referencia']  );
      do_action('wpfunos_log', 'telefonoUsuario: ' . $_GET['telefonoUsuario']  );
    }else{
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Error 2 Nuevo Usuario: ' . $userIP );
      do_action('wpfunos_log', 'referencia: ' .  $_GET['referencia']  );
    }
  }

  /**
  * Hook array resultados confirmados
  *
  * add_filter( 'wpfunos_results_confirmado', array( $this, 'wpfunosResultadosConfirmado' ), 10, 3 );
  *
  *  $wpfResultados = array( $preciototal ,$preciodescuento, $NA, $wpfservicio, $ecologico )
  *
  *  $wpfunos_confirmado = array( $postID, $preciototal ,$preciodescuento, $wpfservicio, $ecologico )
  */
  public function wpfunosResultadosConfirmado( $wpfResultados, $wpfunos_confirmado, $postID, $IDusuario = 0 ){
    $tieneECO = false;
    if( $wpfResultados[4] && get_post_meta( $postID, 'wpfunos_servicioActivo', true ) && get_post_meta( $postID, 'wpfunos_servicioPrecioConfirmado', true ) ) $tieneECO = true;
    if( !$wpfResultados[2] && get_post_meta( $postID, 'wpfunos_servicioPrecioConfirmado', true ) == true && $wpfResultados[0] != 0 && get_post_meta( $postID, 'wpfunos_servicioActivo', true )){
      $wpfunos_confirmado[] = array( $postID, $wpfResultados[0], $wpfResultados[1], $wpfResultados[3], false );
    }
    if( $tieneECO ){
      $resultados = $this->wpfunosGetResultsECO( $postID, $IDusuario );
      if( !$resultados[2] && get_post_meta( $postID, 'wpfunos_servicioPrecioConfirmado', true ) == true && $resultados[0] != 0 && get_post_meta( $postID, 'wpfunos_servicioActivo', true )){
        ////$wpfunos_confirmado = array( $postID, $preciototal ,$preciodescuento, $wpfservicio, $ecologico )
        $wpfunos_confirmado[] = array( $postID, $resultados[0], $resultados[1], $resultados[3], true );
      }
    }
    return  $wpfunos_confirmado;
  }

  /**
  * Hook array resultados sin confirmar
  *
  * add_filter( 'wpfunos_results_sinconfirmar', array( $this, 'wpfunosResultadosSinConfirmar' ), 10, 3 );
  *
  * $wpfResultados = array( $preciototal ,$preciodescuento, $NA, $wpfservicio, $ecologico )
  *
  *  $wpfunos_sinconfirmar = array( $postID, $preciototal ,$preciodescuento, $wpfservicio, $ecologico )
  */
  public function wpfunosResultadosSinConfirmar( $wpfResultados, $wpfunos_sinconfirmar, $postID, $IDusuario = 0 ){
    $tieneECO = false;
    if( $wpfResultados[4] && get_post_meta( $postID, 'wpfunos_servicioActivo', true )  && get_post_meta( $postID, 'wpfunos_servicioPrecioConfirmado', true ) != true ) $tieneECO = true;
    if( !$wpfResultados[2] && get_post_meta( $postID, 'wpfunos_servicioPrecioConfirmado', true ) != true && $wpfResultados[0] != 0 && get_post_meta( $postID, 'wpfunos_servicioActivo', true )) {
      $wpfunos_sinconfirmar[] = array( $postID, $wpfResultados[0], $wpfResultados[1], $wpfResultados[3], false );
    }
    if( $tieneECO ){
      $resultados = $this->wpfunosGetResultsECO( $postID, $IDusuario );
      ////wpfunos_sinconfirmar = array( $postID, $preciototal ,$preciodescuento, $wpfservicio, $ecologico )
      $wpfunos_sinconfirmar[] = array( $postID, $resultados[0], $resultados[1], $resultados[3], true );
    }
    return $wpfunos_sinconfirmar;
  }

  /**
  * Hook array resultados sin precio
  *
  * add_filter( 'wpfunos_results_sinprecio', array( $this, 'wpfunosResultadosSinPrecio' ), 10, 3 );
  *
  * $wpfResultados = array( $preciototal ,$preciodescuento, $NA, $wpfservicio, $ecologico )
  *
  *  $wpfunos_sinprecio = array( $postID, 0 , 0, $$ecologico )
  */
  public function wpfunosResultadosSinPrecio( $wpfResultados, $wpfunos_sinprecio, $postID, $IDusuario = 0 ){
    if( !$wpfResultados[2] && $wpfResultados[0] == 0 && get_post_meta( $postID, 'wpfunos_servicioActivo', true )){
      $wpfunos_sinprecio[] = array( $postID, 0, 0, $wpfResultados[4] );
    }
    return $wpfunos_sinprecio;
  }

  /**
  * Hook mostrar entrada con precio confirmados
  *
  * add_action( 'wpfunos_result_grid_confirmado', array( $this, 'wpfunosResultGridConfirmado' ), 10, 1 );
  */
  public function wpfunosResultGridConfirmado( $wpfunos_confirmado ){
    if(is_array($wpfunos_confirmado)){
      ?><div class="wpfunos-titulo"><p></p><center><h2>Precio confirmado</h2></center></div><?php
      //echo do_shortcode( get_option('wpfunos_seccionPreciosExclusivos') );
      //
      if(isset($_GET['orden']) && $_GET['orden'] == 'precios' ){
        $columns = array_column( $wpfunos_confirmado, 1 );
        array_multisort( $columns, SORT_ASC, $wpfunos_confirmado );
      }
      foreach ($wpfunos_confirmado as $value) {
        ?><div class="wpfunos-busqueda-contenedor"><?php
        $_GET['nombre'] = get_post_meta( $value[0], 'wpfunos_servicioNombre', true );

        $_GET['ServicioTitulo'] = get_the_title($value[0]);
        $_GET['ServicioEmpresa'] = get_post_meta( $value[0], 'wpfunos_servicioEmpresa', true );
        $_GET['ServicioPoblacion'] = get_post_meta( $value[0], 'wpfunos_servicioPoblacion', true );
        $_GET['ServicioProvincia'] = get_post_meta( $value[0], 'wpfunos_servicioProvincia', true );

        $_GET['logo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioLogo', true ) ,'full' );
        $_GET['promo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioImagenPromo', true ) ,'full' );
        $_GET['confirmado'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenConfirmado', true ) , array(45,46));
        if( $value[4] ){
          $_GET['ecologico'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenEcologico', true ) , array(60,60));
        }else{
          $_GET['ecologico'] = '';
        }
        $_GET['textoconfirmado'] = "Precio confirmado";
        $_GET['direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );
        $_GET['precio'] = number_format($value[1], 0, ',', '.') . '???';
        if( $value[1] != $value[2] ){
          $_GET['preciodescuento'] = number_format($value[2], 0, ',', '.') . '???';
        }else{
          $_GET['preciodescuento'] = '';
        }
        $porcentaje = 100 - ((float)$value[2] * 100) / $value[1];
        $_GET['descuento'] = round($porcentaje, 0);
        $_GET['textoprecio'] = get_post_meta( $value[0], 'wpfunos_servicioTextoPrecio', true );
        $_GET['logodescuento'] = '';
        $_GET['telefonoEmpresa'] = get_post_meta( $value[0], 'wpfunos_servicioTelefono', true );
        $_GET['valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
        $_GET['servicio'] = $value[0];
        $_GET['nombrepack'] = get_post_meta( $value[0], 'wpfunos_servicioPackNombre', true );
        //
        //    Selecciona dise??o
        //
        if( ! get_option('wpfunos_NewDesign') ){
          //
          //      Dise??o Primero
          //
          if($value[1] == $value[2]){
            echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultados') ) ;
          }else{
            echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosDescuento') ) ;
          }
          if( get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) == 1 ){
            $tel = str_replace(" ","",$_GET['telefonoEmpresa']);
            $tel = str_replace("-","",$tel);
            $_GET['telefonoEmpresa']= substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
            $tel = str_replace(" ","",$_GET['telefonoUsuario']);
            $tel = str_replace("-","",$tel);
            $_GET['telefonoUsuario'] = substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
            require 'partials/' . $this->plugin_name . '-servicios-confirmado-botones-llamadas-display.php';
          }
          if( get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) == 1 ){
            if( get_option($this->plugin_name . '_activarCorreoPedirPresupuesto')){
              require 'partials/' . $this->plugin_name . '-servicios-boton-presupuesto-display.php';
            }
          }
          require 'partials/' . $this->plugin_name . '-servicios-confirmado-boton-detalles-display.php';
          if($value[1] == $value[2]){
            echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosInferior') ) ;
          }else{
            echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosDescuentoInferior') ) ;
          }
          require 'partials/' . $this->plugin_name . '-servicios-confirmado-imagenes-display.php';
          //
          //    Dise??o Primero
          //
        }else{
          //
          //    NUEVO Dise??o
          //

          //$_GET['seccionID-llamadas'] = 'wpf-llamadas-'. $value[0];
          //$_GET['seccionID-presupuesto'] = 'wpf-presupuesto-'. $value[0];
          //$_GET['seccionID-detalles'] = 'wpf-detalles-'. $value[0];
          //$_GET['seccionID-mapas'] = 'wpf-mapas-'. $value[0];
          //$_GET['seccionID-eco'] = 'wpf-eco-'. $value[0];
          //$_GET['seccionID-precio'] = 'wpf-precio-'. $value[0];
          //$_GET['seccionClass-detalles'] = 'wpf-detalles-si';
          //$_GET['seccionClass-mapas'] = 'wpf-mapas-si';
          //$_GET['seccionClass-presupuesto'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
          //$_GET['seccionClass-llamadas'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';
          //
          //$IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
          //$nonce = wp_create_nonce("wpfunos_servicios_nonce");
          //$ecologico = ($_GET['ecologico']) ? 'si' : 'no';
          //$_GET['Atts'] = 'wpfunos-id|' . $value[0].'
          //data-wpnonce|' . $nonce .'
          //wpusuario|' . $IDusuario .'
          //wpecologico|' . $ecologico ;
          //$_GET['Atts-precio'] = 'wpfunos-att-precio|' . (int)$value[1];

          ////if($value[1] == $value[2]){
          //echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosNewDesign') ) ;
          ////}else{
          ////  echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosDescuentoNewDesign') ) ;
          ////}

          //
          //    NUEVO Dise??o
          //
        }
        ?></div><?php
      }
    }
  }

  /**
  * Hook mostrar entrada con precio sin confirmar
  *
  * add_action( 'wpfunos_result_grid_sinconfirmar', array( $this, 'wpfunosResultGridSinConfirmar' ), 10, 1 );
  */
  public function wpfunosResultGridSinConfirmar( $wpfunos_sinconfirmar ){
    if(is_array($wpfunos_sinconfirmar)){
      ?><div class="wpfunos-titulo"><p></p><h2><center>Precio sin confirmar</center></h2></div><?php
      if(isset($_GET['orden']) && $_GET['orden'] == 'precios' ){
        $columns = array_column( $wpfunos_sinconfirmar, 1 );
        array_multisort( $columns, SORT_ASC, $wpfunos_sinconfirmar );
      }
      foreach ($wpfunos_sinconfirmar as $value) {
        ?><div class="wpfunos-busqueda-contenedor"><?php
        $_GET['nombre'] = get_post_meta( $value[0], 'wpfunos_servicioNombre', true );
        $_GET['ServicioTitulo'] = get_the_title($value[0]);
        $_GET['ServicioEmpresa'] = get_post_meta( $value[0], 'wpfunos_servicioEmpresa', true );
        $_GET['ServicioPoblacion'] = get_post_meta( $value[0], 'wpfunos_servicioPoblacion', true );
        $_GET['ServicioProvincia'] = get_post_meta( $value[0], 'wpfunos_servicioProvincia', true );

        $_GET['logo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioLogo', true ) ,'full' );
        $_GET['confirmado'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenNoConfirmado', true ) , array(45,46));
        if( $value[4] ){
          $_GET['ecologico'] = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenEcologico', true ) , array(60,60));
        }else{
          $_GET['ecologico'] = '';
        }
        $_GET['textoconfirmado'] = "Precio no confirmado";
        $_GET['direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );
        $_GET['precio'] = number_format($value[1], 0, ',', '.') . '???';
        $_GET['textoprecio'] = get_post_meta( $value[0], 'wpfunos_servicioTextoPrecio', true );
        $_GET['valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
        $_GET['preciodescuento'] = '';
        $_GET['telefonoEmpresa'] = get_post_meta( $value[0], 'wpfunos_servicioTelefono', true );
        //
        //    Selecciona dise??o
        //
        if( ! get_option('wpfunos_NewDesign') ){
          //
          //    Dise??o Primero
          //
          echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosSin') );

          if( get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) == 1 ){
            $tel = str_replace(" ","",$_GET['telefonoEmpresa']);
            $tel = str_replace("-","",$tel);
            $_GET['telefonoEmpresa']= substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
            $tel = str_replace(" ","",$_GET['telefonoUsuario']);
            $tel = str_replace("-","",$tel);
            $_GET['telefonoUsuario'] = substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
            require 'partials/' . $this->plugin_name . '-servicios-sinconfirmar-botones-llamadas-display.php';
          }
          if( get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) == 1 ){
            if( get_option($this->plugin_name . '_activarCorreoPedirPresupuesto')){
              require 'partials/' . $this->plugin_name . '-servicios-boton-presupuesto-display.php';
            }
          }
          //
          //    Dise??o Primero
          //
        }else{
          //
          //    NUEVO Dise??o
          //
          //$_GET['seccionID-llamadas'] = 'wpf-llamadas-'. $value[0];
          //$_GET['seccionID-presupuesto'] = 'wpf-presupuesto-'. $value[0];
          //$_GET['seccionID-detalles'] = 'wpf-detalles-'. $value[0];
          //$_GET['seccionID-mapas'] = 'wpf-mapas-'. $value[0];
          //$_GET['seccionID-eco'] = 'wpf-eco-'. $value[0];
          //$_GET['seccionID-precio'] = 'wpf-precio-'. $value[0];
          //$_GET['seccionClass-detalles'] = 'wpf-detalles-no';
          //$_GET['seccionClass-mapas'] = 'wpf-mapas-no';
          //$_GET['seccionClass-presupuesto'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
          //$_GET['seccionClass-llamadas'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';
          //
          //$IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
          //$nonce = wp_create_nonce("wpfunos_servicios_nonce");
          //$_GET['Atts'] = 'wpfunos-id|' . $value[0].'
          //data-wpnonce|' . $nonce .'
          //wpusuario|' . $IDusuario;
          //$_GET['Atts-precio'] = 'wpfunos-att-precio|' . (int)$value[1];

          //echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosNewDesign') ) ;

          //
          //    NUEVO Dise??o
          //
        }
        ?></div><?php
      }
    }
  }

  /**
  * Hook mostrar entrada con sin precio
  *
  * add_action( 'wpfunos_result_grid_sinprecio', array( $this, 'wpfunosResultGridSinPrecio' ), 10, 1 );
  */
  public function wpfunosResultGridSinPrecio( $wpfunos_sinprecio ){
    if(is_array($wpfunos_sinprecio)){
      ?><div class="wpfunos-titulo"><p></p><center><h2>Sin precio</h2></center></div><?php
      foreach ($wpfunos_sinprecio as $value) {
        ?><div class="wpfunos-busqueda-contenedor"><?php
        $_GET['nombre'] = get_post_meta( $value[0], 'wpfunos_servicioNombre', true );
        $_GET['ServicioTitulo'] = get_the_title($value[0]);
        $_GET['ServicioEmpresa'] = get_post_meta( $value[0], 'wpfunos_servicioEmpresa', true );
        $_GET['ServicioPoblacion'] = get_post_meta( $value[0], 'wpfunos_servicioPoblacion', true );
        $_GET['ServicioProvincia'] = get_post_meta( $value[0], 'wpfunos_servicioProvincia', true );

        $_GET['logo'] = wp_get_attachment_image ( get_post_meta( $value[0], 'wpfunos_servicioLogo', true ) ,'full' );
        $_GET['confirmado'] = '';
        $_GET['textoconfirmado'] = '';
        $_GET['direccion'] = get_post_meta( $value[0], 'wpfunos_servicioDireccion', true );
        $_GET['precio'] = '';
        $_GET['textoprecio'] = get_post_meta( $value[0], 'wpfunos_servicioTextoPrecio', true );
        $_GET['valoracion'] = get_post_meta( $value[0], 'wpfunos_servicioValoracion', true );
        $_GET['preciodescuento'] = '';
        $_GET['telefonoEmpresa'] = get_post_meta( $value[0], 'wpfunos_servicioTelefono', true );
        //
        //    Selecciona dise??o
        //
        if( ! get_option('wpfunos_NewDesign') ){
          //
          //    Dise??o Primero
          //
          echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosSin') );
          if( get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) == 1 ){
            $tel = str_replace(" ","",$_GET['telefonoEmpresa']);
            $tel = str_replace("-","",$tel);
            $_GET['telefonoEmpresa']= substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
            $tel = str_replace(" ","",$_GET['telefonoUsuario']);
            $tel = str_replace("-","",$tel);
            $_GET['telefonoUsuario'] = substr($tel,0,3).' '. substr($tel,3,2).' '. substr($tel,5,2).' '. substr($tel,7,2);
            require 'partials/' . $this->plugin_name . '-servicios-sinconfirmar-botones-llamadas-display.php';
          }
          if( get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) == 1 ){
            if( get_option($this->plugin_name . '_activarCorreoPedirPresupuesto')){
              require 'partials/' . $this->plugin_name . '-servicios-boton-presupuesto-display.php';
            }
          }
          //
          //    Dise??o Primero
          //
        }else{
          //
          //    NUEVO Dise??o
          //
          //$_GET['seccionID-llamadas'] = 'wpf-llamadas-'. $value[0];
          //$_GET['seccionID-presupuesto'] = 'wpf-presupuesto-'. $value[0];
          //$_GET['seccionClass-detalles'] = 'wpf-detalles-no';
          //$_GET['seccionClass-mapas'] = 'wpf-mapas-no';
          //$_GET['seccionClass-presupuesto'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonPresupuesto', true ) ) ? 'wpf-presupuesto-si' : 'wpf-presupuesto-no';
          //$_GET['seccionClass-llamadas'] = (get_post_meta( $value[0], 'wpfunos_servicioBotonesLlamar', true ) ) ? 'wpf-llamadas-si' : 'wpf-llamadas-no';

          //$IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
          //$nonce = wp_create_nonce("wpfunos_servicios_nonce");
          //$_GET['Atts'] = 'wpfunos-id|' . $value[0].'
          //data-wpnonce|' . $nonce .'
          //wpusuario|' . $IDusuario;

          //echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosNewDesign') ) ;
          //
          //    NUEVO Dise??o
          //
        }
        ?></div><?php
      }
    }
  }

  /**
  * Hook filter ID usuario p??gina resultados
  *
  * add_filter( 'wpfunos_get_results', array( $this, 'wpfunosGetResults' ),10, 2 );
  *
  * return: $resultados = array( $preciototal ,$preciodescuento, $NA, $wpfservicio, $ecologico ) ;
  */
  public function wpfunosGetResults( $postID, $userID ){
    $NA = false;
    $ecologico = false;
    $preciototal = (int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBase', true );
    $preciodescuento = 0;
    if( (int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBaseDescuento', true ) > 0 ){
      $preciodescuento = $preciototal - ( $preciototal*((int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBaseDescuento', true )/100) );
    }else{
      $preciodescuento = $preciototal ;
    }
    //	Servicio
    //	nombre
    //	Precio
    //	descuento
    //	total
    $wpfservicio[] = array('Base',get_post_meta( $postID, $this->plugin_name . '_servicioNombre', true ),$preciototal,(int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBaseDescuento', true ),$preciodescuento);
    //
    //$wpfunos_confirmado[] = array( $postID, $wpfResultados[0], $wpfResultados[1] );
    //
    $seleccion = get_post_meta( $userID, 'wpfunos_userSeleccion', true );
    $CP = get_post_meta( $userID, 'wpfunos_userCP', true );
    $respuesta = (explode(',',$seleccion));

    // Destino
    switch($respuesta[3]){
      case '1':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Nombre', true ) );
      break;
      case '2':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_2Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioDestino_2Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_2Nombre', true ) );
      break;
      case '3':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_3Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioDestino_3Descuento', true ), $NA, $preciototal, $preciodescuento , get_post_meta( $postID, $this->plugin_name . '_servicioDestino_2Nombre', true ) );
      break;
    }
    $wpfservicio[] = array('Destino', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);

    // Ataud
    switch($respuesta[4]){
      case '1':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_1Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_1Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_1Nombre', true ) );
      if(  strlen( get_post_meta( $postID, $this->plugin_name . '_servicioAtaudEcologico_1Precio', true )) > 0 ) $ecologico = true;
      break;
      case '2':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_2Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_2Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_2Nombre', true ) );
      if( strlen( get_post_meta( $postID, $this->plugin_name . '_servicioAtaudEcologico_2Precio', true )) > 0 ) $ecologico = true;
      break;
      case '3':
      list( $NA, $preciototal, $preciodescuento , $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_3Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_3Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioAtaud_3Nombre', true ) );
      if( strlen( get_post_meta( $postID, $this->plugin_name . '_servicioAtaudEcologico_3Precio', true )) > 0) $ecologico = true;
      break;
    }
    $wpfservicio[] = array('Ataud', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);

    // Velatorio
    switch($respuesta[5]){
      case '1':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioPrecio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioDescuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioNombre', true ) );
      break;
      case '2':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioNoPrecio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioNoDescuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioNoNombre', true ) );
      break;
    }
    $wpfservicio[] = array('Velatorio', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);

    // Ceremonia
    switch($respuesta[6]){
      case '1':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) =
      $this->wpfunos_case( $postID, '0', '', $NA, $preciototal, $preciodescuento, 'Sin ceremonia' );
      break;
      case '2':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_1Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_1Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_1Nombre', true ) );
      break;
      case '3':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_2Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_2Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_2Nombre', true ) );
      break;
      case '4':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Nombre', true ) );
      break;
    }
    $wpfservicio[] = array('Ceremonia', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);

    // Descuento gen??rico
    if( (int)get_post_meta( $postID, $this->plugin_name . '_servicioDescuentoGenerico', true ) > 0 ) $preciodescuento -= $preciodescuento*((int)get_post_meta( $postID, $this->plugin_name . '_servicioDescuentoGenerico', true )/100);
    $wpfservicio[] = array('Descuento gen??rico', 'Descuento gen??rico', $preciototal, get_post_meta( $postID, $this->plugin_name . '_servicioDescuentoGenerico', true ), $preciodescuento);
    // Array resultados
    $resultados = array( $preciototal ,$preciodescuento, $NA, $wpfservicio, $ecologico ) ;
    return $resultados;
  }

  /**
  * Calcular precio resultado ecol??gico
  *
  *  $resultados = $this->wpfunosGetResultsECO( $postID, $IDusuario );
  *
  * return: $resultados = array( $preciototal ,$preciodescuento, $NA, $wpfservicio, $ecologico ) ;
  *
  */
  public function wpfunosGetResultsECO( $postID, $userID ){
    $NA = false;
    $preciototal = (int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBase', true );
    $preciodescuento = 0;
    if( (int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBaseDescuento', true ) > 0 ){
      $preciodescuento = $preciototal - ( $preciototal*((int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBaseDescuento', true )/100) );
    }else{
      $preciodescuento = $preciototal ;
    }
    //	Servicio
    //	nombre
    //	Precio
    //	descuento
    //	total
    $wpfservicio[] = array('Base',get_post_meta( $postID, $this->plugin_name . '_servicioNombre', true ),$preciototal,(int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBaseDescuento', true ),$preciodescuento);
    $seleccion = get_post_meta( $userID, 'wpfunos_userSeleccion', true );
    $CP = get_post_meta( $userID, 'wpfunos_userCP', true );
    $respuesta = (explode(',',$seleccion));

    // Destino
    switch($respuesta[3]){
      case '1':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Nombre', true ) );
      break;
      case '2':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_2Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioDestino_2Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_2Nombre', true ) );
      break;
      case '3':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDestino_3Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioDestino_3Descuento', true ), $NA, $preciototal, $preciodescuento , get_post_meta( $postID, $this->plugin_name . '_servicioDestino_2Nombre', true ) );
      break;
    }
    $wpfservicio[] = array('Destino', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);

    // Ataud
    switch($respuesta[4]){
      case '1':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioAtaudEcologico_1Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioAtaudEcologico_1Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioAtaudEcologico_1Nombre', true ) );
      break;
      case '2':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioAtaudEcologico_2Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioAtaudEcologico_2Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioAtaudEcologico_2Nombre', true ) );
      break;
      case '3':
      list( $NA, $preciototal, $preciodescuento , $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioAtaudEcologico_3Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioAtaudEcologico_3Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioAtaudEcologico_3Nombre', true ) );
      break;
    }
    $wpfservicio[] = array('Ataud', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);

    // Velatorio
    switch($respuesta[5]){
      case '1':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioPrecio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioDescuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioNombre', true ) );
      break;
      case '2':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioNoPrecio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioNoDescuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioVelatorioNoNombre', true ) );
      break;
    }
    $wpfservicio[] = array('Velatorio', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);

    // Ceremonia
    switch($respuesta[6]){
      case '1';
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) =
      $this->wpfunos_case( $postID, '0', '', $NA, $preciototal, $preciodescuento, 'Sin ceremonia' );
      break;
      case '2':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_1Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_1Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_1Nombre', true ) );
      break;
      case '3':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_2Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_2Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_2Nombre', true ) );
      break;
      case '4':
      list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Precio', true ),
      get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Nombre', true ) );
      break;
    }
    $wpfservicio[] = array('Ceremonia', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);

    // Descuento gen??rico
    if( (int)get_post_meta( $postID, $this->plugin_name . '_servicioDescuentoGenerico', true ) > 0 ) $preciodescuento -= $preciodescuento*((int)get_post_meta( $postID, $this->plugin_name . '_servicioDescuentoGenerico', true )/100);
    $wpfservicio[] = array('Descuento gen??rico', 'Descuento gen??rico', $preciototal, get_post_meta( $postID, $this->plugin_name . '_servicioDescuentoGenerico', true ), $preciodescuento);
    // Array resultados
    $resultados = array( $preciototal ,$preciodescuento, $NA, $wpfservicio, true ) ;
    return $resultados;
  }

  /**
  * Hook ampliar radio en busquedas en provincias e islas
  *
  * add_action( 'wpfunos_busqueda_provincias' array( $this, 'wpfunosBusquedaProvincias' ), 10, 1 );
  */
  public function wpfunosBusquedaProvincias( $address ){
    $nueva_distancia = 0;
    $nueva_lat = 0;
    $nueva_lng = 0;
    $distanciaDirecto = get_option('wpfunos_distanciaServicioDirecto');
    $args = array(
      'post_type' => 'excep_prov_wpfunos',	//
      'meta_key' =>  $this->plugin_name . '_excep_provProvincia',
      'meta_value' => $address,
    );
    $post_list = get_posts( $args );
    if( $post_list ){
      foreach ( $post_list as $post ) :
        $nueva_distancia = get_post_meta( $post->ID, $this->plugin_name . '_excep_provDistancia', true );
        $nueva_lat = get_post_meta( $post->ID, $this->plugin_name . '_excep_provLat', true );
        $nueva_lng = get_post_meta( $post->ID, $this->plugin_name . '_excep_provLng', true );
        if( (int)$nueva_distancia == 0 ) $nueva_distancia = $_GET['distance'];
      endforeach;
      wp_reset_postdata();
    }
    if( (int)$nueva_lat != 0 && (int)$nueva_lng != 0 ){
      if( $_GET['lat'] == $nueva_lat && $_GET['lng'] == $nueva_lng )return;
      $new_url = home_url('/comparar-precios'.add_query_arg(array($_GET), $wp->request));
      $new_url = str_replace("&lat","&oldlat", $new_url );
      $new_url = str_replace("&lng","&oldlng", $new_url );
      $new_url = str_replace("&distance","&old", $new_url );
      $new_url = $new_url . '&lat=' . $nueva_lat . '&lng=' . $nueva_lng . '&distance=' . $nueva_distancia;
      wp_redirect( $new_url );
      exit;
    }
  }

  /*********************************/
  /*****                      ******/
  /*********************************/

  /**
  * Enviar Correo Admin
  */
  public function wpfunosResultCorreoAdmin( ){
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    if($_GET['accion'] == 1 && get_option($this->plugin_name . '_activarCorreoBoton1Admin')){
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton1Admin'), get_option('wpfunos_asuntoCorreoBoton1Admin') );
      require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Calculos.php';
      if(!empty( get_option('wpfunos_mailCorreoCcoBoton1Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1Admin' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccBoton1Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1Admin' ) ;
      wp_mail ( get_option('wpfunos_mailCorreoBoton1Admin'), get_option('wpfunos_asuntoCorreoBoton1Admin') , $mensaje, $headers );
      $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
      $userIP = apply_filters('wpfunos_userIP','dummy');
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Enviado correo boton1 ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoBoton1Admin') ) );
      do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
      do_action('wpfunos_log', '$_GET[referencia]: ' . $_GET['referencia'] );

    }
    if($_GET['accion'] == 2 && get_option($this->plugin_name . '_activarCorreoBoton2Admin')){
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton2Admin'), get_option('wpfunos_asuntoCorreoBoton2Admin') );
      require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Calculos.php';
      if(!empty( get_option('wpfunos_mailCorreoCcoBoton2Admin' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2Admin' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccBoton2Admin' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2Admin' ) ;
      $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
      $userIP = apply_filters('wpfunos_userIP','dummy');
      wp_mail ( get_option('wpfunos_mailCorreoBoton2Admin'), get_option('wpfunos_asuntoCorreoBoton2Admin') , $mensaje, $headers );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Enviado correo boton2 ' . apply_filters('wpfunos_dumplog', get_option('wpfunos_mailCorreoBoton2Admin') ) );
      do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
      do_action('wpfunos_log', '$_GET[referencia]: ' . $_GET['referencia'] );
    }
  }

  /**
  * Enviar Correo Lead
  */
  public function wpfunosResultCorreoLead( ){
    if( apply_filters('wpfunos_reserved_email','dummy') ) return;
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    if($_GET['accion'] == 1 && get_option($this->plugin_name . '_activarCorreoBoton1Lead')){
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton1Lead'), get_option('wpfunos_asuntoCorreoBoton1Lead') );
      require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Calculos.php';
      if(!empty( get_option('wpfunos_mailCorreoCcoBoton1Lead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1Lead' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccBoton1Lead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1Lead' ) ;
      wp_mail (  get_post_meta( $_GET['servicio'], 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoBoton1Lead') , $mensaje, $headers );
      $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
      $userIP = apply_filters('wpfunos_userIP','dummy');
      update_post_meta( $IDusuario, $this->plugin_name . '_userLead', true );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Enviado correo lead1 ' . apply_filters('wpfunos_dumplog', get_post_meta( $_GET['servicio'], 'wpfunos_servicioEmail', true )  ) );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
      do_action('wpfunos_log', '$_GET[referencia]: ' . $_GET['referencia'] );
    }
    if($_GET['accion'] == 2 && get_option($this->plugin_name . '_activarCorreoBoton2Lead')){
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton2Lead'), get_option('wpfunos_asuntoCorreoBoton2Lead') );
      require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Calculos.php';
      if(!empty( get_option('wpfunos_mailCorreoCcoBoton2Lead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2Lead' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccBoton2Lead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2Lead' ) ;
      wp_mail ( get_post_meta( $_GET['servicio'], 'wpfunos_servicioEmail', true ), get_option('wpfunos_asuntoCorreoBoton2Lead') , $mensaje, $headers );
      $IDusuario = apply_filters('wpfunos_userID', $_GET['referencia'] );
      $userIP = apply_filters('wpfunos_userIP','dummy');
      update_post_meta( $IDusuario, $this->plugin_name . '_userLead', true );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Enviado correo lead2 ' . apply_filters('wpfunos_dumplog', get_post_meta( $_GET['servicio'], 'wpfunos_servicioEmail', true )  ) );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
      do_action('wpfunos_log', '$_GET[referencia]: ' . $_GET['referencia'] );
    }
  }

  /**
  * Actualizar datos gmw mapa ficha servicios
  */
  public function gmw_update_post_type_post_location(  $post_id ) {
    if ( false !== wp_is_post_revision( $post_id ) ) return; // Return if it's a post revision.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; // check autosave.
    if ( ! current_user_can( 'edit_post', $post_id ) ) return; // check if user can edit post.
    // get the address from the custom field "address".
    $address = get_post_meta( $post_id, 'wpfunos_servicioDireccion', true );
    if( strlen( $address) < 5 )$address = get_post_meta( $post_id, 'wpfunos_servicioPoblacion', true );
    if ( empty( $address ) ) return; // verify that address exists.
    if ( ! function_exists( 'gmw_update_post_location' ) ) return; // verify the updater function.

    gmw_update_post_location( $post_id, $address ); //run the udpate location function
  }

  /**
  * Formatear texto comentarios
  */
  public function wpfunosFormatoComentario( $customfield_content ){
    $customfield_content = apply_filters( 'the_content', $customfield_content );
    $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content );
    return $customfield_content;
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
  * Case loops
  *
  * $postID = $postID,
  * $servicioPrecio = get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Precio', true )
  * $servicioDescuento = get_post_meta( $postID, $this->plugin_name . '_servicioDestino_1Descuento', true )
  * $NA = $NA
  * $preciototal = $preciototal
  * $preciodescuento = $preciodescuento
  *
  * list( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento ) = $this->wpfunos_case( $postID, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Precio', true ),
  *				get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Descuento', true ), $NA, $preciototal, $preciodescuento, get_post_meta( $postID, $this->plugin_name . '_servicioDespedida_3Nombre', true ) );
  */
  private function wpfunos_case( $postID, $servicioPrecio, $servicioDescuento, $NA, $preciototal, $preciodescuento, $servicioNombre ){
    if ($servicioPrecio == '' ) $NA=true;
    $preciototal += (int)$servicioPrecio ;
    if( $servicioDescuento > 0 ){
      $preciodescuento += $servicioPrecio - ($servicioPrecio*($servicioDescuento/100));
      $desglose = $servicioPrecio - ($servicioPrecio*($servicioDescuento/100));
    }else{
      $preciodescuento += (int)$servicioPrecio;
      $desglose = $servicioPrecio;
    }
    return array( $NA, $preciototal, $preciodescuento, $servicioNombre, $servicioPrecio, $servicioDescuento, $desglose );
  }

  /**
  * Entrada ubicaci??n
  */
  public function wpfunosEntradaUbicacion( $ubicacionIP, $ubicacionwpf, $ubicacionReferencia, $ubicacionDireccion, $ubicacionCP, $ubicacionDistancia  ){
    if( apply_filters('wpfunos_reserved_email','dummy') ) return;
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
        $this->plugin_name . '_ubicacionIP' => sanitize_text_field( $ubicacionIP ),
        $this->plugin_name . '_ubicacionwpf' => sanitize_text_field( $ubicacionwpf ),
        $this->plugin_name . '_ubicacionReferencia' => sanitize_text_field( $ubicacionReferencia ),
        $this->plugin_name . '_ubicacionDireccion' => sanitize_text_field( $ubicacionDireccion ),
        $this->plugin_name . '_ubicacionDistancia' => sanitize_text_field( $ubicacionDistancia ),
        $this->plugin_name . '_ubicacionCP' => sanitize_text_field( $ubicacionCP ),
        $this->plugin_name . '_ubicacionVisitas' => $contador,
        $this->plugin_name . '_Dummy' => true,
      ),
    );
    $post_id = wp_insert_post($my_post);
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

  /**
  * Filtro indeseados
  * add_filter( 'wpfunos_servicios_indeseados', array( $this, 'wpfunosServiciosIndeseados'), 10, 1 );
  */
  public function wpfunosServiciosIndeseados( $wpf ){
    $cryptcode = apply_filters( 'wpfunos_crypt', $_GET['wpf'], 'd' );
    $codigo = ( explode( ',' , $cryptcode ) );
    $referencia = $codigo[0];
    $IDusuario = apply_filters('wpfunos_userID', $referencia );
    //  02-05-22
    if ( "luisa_stfost87@hotmail.com" === get_post_meta( $IDusuario, $this->plugin_name . '_userMail', true ) ) return true;
    if ( "652 55 28 25" === get_post_meta( $IDusuario, $this->plugin_name . '_userPhone', true ) ) return true;
    //
    return false;
  }

  /*********************************/
  /*****  AJAX                ******/
  /*********************************/

  /**
  * Bot??n Que me llamen
  */
  public function wpfunosServiciosBotonLlamame(){
    $IDservicio = $_POST['IDservicio'];
    $IDusuario = $_POST['IDusuario'];
    $wpnonce = $_POST['wpnonce'];
    $precio = $_POST['precio'];
    $ecologico = $_POST['ecologico'];
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio BotonLlamame' );
    do_action('wpfunos_log', 'IDservicio: ' . $IDservicio );
    do_action('wpfunos_log', 'IDusuario: ' . $IDusuario );
    do_action('wpfunos_log', 'Precio: ' . $precio );
    do_action('wpfunos_log', 'ecologico: ' . $ecologico);
    //
    if ( !wp_verify_nonce( $_POST['wpnonce'], "wpfunos_servicios_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    //
    //  Titulo a mosrtar en pantalla devuelto a javascript
    //
    $titulo = get_post_meta( $IDservicio, "wpfunos_servicioNombre", true);
    do_action('wpfunos_log', 'Titulo: ' . $titulo );
    //
    // Preparamos campos para insertar entrada en usuarios
    //
    require 'partials/' . $this->plugin_name . '-servicios-nueva-entrada-seleccion.php';
    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();
    //return: $resultados = array( $preciototal ,$preciodescuento, $NA, $wpfservicio, $ecologico ) ;
    $resultados = $this->wpfunosGetResults( $IDservicio, $IDusuario );
    $resultadosECO = $this->wpfunosGetResultsECO( $IDservicio, $IDusuario );
    do_action('wpfunos_log', 'Precio resultado : ' . $resultados[0] );
    do_action('wpfunos_log', 'Precio ecologico : ' . $resultados[4] );
    do_action('wpfunos_log', 'Precio resultadoECO : ' . $resultadosECO[0] );
    do_action('wpfunos_log', 'Precio ecologicoECO : ' . $resultadosECO[4] );
    if ( $resultados[4] ){
      $value = $resultadosECO;
    }else{
      $value = $resultados;
    }
    //$wpfservicio[] = array('Base',get_post_meta( $postID, $this->plugin_name . '_servicioNombre', true ),$preciototal,(int)get_post_meta( $postID, $this->plugin_name . '_servicioPrecioBaseDescuento', true ),$preciodescuento);
    //$wpfservicio[] = array('Destino', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);
    //$wpfservicio[] = array('Ataud', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);
    //$wpfservicio[] = array('Velatorio', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);
    //$wpfservicio[] = array('Ceremonia', $servicioNombre, $servicioTotal, $descuentoServicio, $servicioConDescuento);
    //$wpfservicio[] = array('Descuento gen??rico', 'Descuento gen??rico', $preciototal, get_post_meta( $postID, $this->plugin_name . '_servicioDescuentoGenerico', true ), $preciodescuento);

    //
    //  Creamos nueva entrada usuarios
    //
    $accion = '1';
    $textoaccion = 'Bot??n llamen servicios' ;
    if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acci??n Usuario Desarrollador";
    require 'partials/' . $this->plugin_name . '-servicios-nueva-entrada.php';
    $post_id = wp_insert_post($my_post);
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '6. - Bot??n llamen aseguradora' );
    do_action('wpfunos_log', 'userIP: ' . apply_filters('wpfunos_userIP','dummy') );
    do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $post_id, 'wpfunos_userName', true )  );
    do_action('wpfunos_log', 'referencia: ' . $referencia );
    do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
    //
    //  Enviamos mensaje de correo de acci??n realizada
    //
    $admin = apply_filters('wpfunos_reserved_email','dummy') ;
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    if( get_option('wpfunos_activarCorreoBoton1Lead') && ! $admin){
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton1Lead'), get_option('wpfunos_asuntoCorreoBoton1Lead') );
      require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Datos-Nuevo-Usuario.php';
      if(!empty( get_option('wpfunos_mailCorreoCcoBoton1Lead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton1Lead' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccBoton1Lead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton1Lead' ) ;
      wp_mail (  get_post_meta( $IDservicio, 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoBoton1Lead') , $mensaje, $headers );
      update_post_meta( $post_id, $this->plugin_name . '_userLead', true );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Enviado correo lead1 ' . apply_filters('wpfunos_dumplog', get_post_meta( $IDservicio, 'wpfunos_servicioEmail', true )  ) );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
      do_action('wpfunos_log', '$referencia: ' . $referencia );
    }
    //
    //  devolvemos entrada  javascript con "success" y con el t??tulo del servicio
    //
    $result['titulo'] = $titulo;
    $result['type'] = "success";
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  /**
  * Bot??n Llamar
  */
  public function wpfunosServiciosBotonLlamar(){
    $IDservicio = $_POST['IDservicio'];
    $IDusuario = $_POST['IDusuario'];
    $wpnonce = $_POST['wpnonce'];
    $precio = $_POST['precio'];
    $ecologico = $_POST['ecologico'];
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio BotonLlamar' );
    do_action('wpfunos_log', 'IDservicio: ' . $IDservicio );
    do_action('wpfunos_log', 'IDusuario: ' . $IDusuario );
    do_action('wpfunos_log', 'Precio: ' . $precio );
    do_action('wpfunos_log', 'ecologico: ' . $ecologico);
    //
    if ( !wp_verify_nonce( $_POST['wpnonce'], "wpfunos_servicios_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    //
    //  Titulo y tel??fono del servicio a mosrtar en pantalla devueltos a javascript
    //
    $titulo = get_post_meta( $IDservicio, "wpfunos_servicioNombre", true);
    do_action('wpfunos_log', 'Titulo: ' . $titulo );
    $telefono = get_post_meta( $IDservicio, "wpfunos_servicioTelefono", true);
    $tel = str_replace(" ","", $telefono );
    //
    // Preparamos campos para insertar entrada en usuarios
    //
    require 'partials/' . $this->plugin_name . '-servicios-nueva-entrada-seleccion.php';
    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();
    //return: $resultados = array( $preciototal ,$preciodescuento, $NA, $wpfservicio, $ecologico ) ;
    $resultados = $this->wpfunosGetResults( $IDservicio, $IDusuario );
    $resultadosECO = $this->wpfunosGetResultsECO( $IDservicio, $IDusuario );
    do_action('wpfunos_log', 'Precio resultado : ' . $resultados[0] );
    do_action('wpfunos_log', 'Precio ecologico : ' . $resultados[4] );
    do_action('wpfunos_log', 'Precio resultadoECO : ' . $resultadosECO[0] );
    do_action('wpfunos_log', 'Precio ecologicoECO : ' . $resultadosECO[4] );
    if ( $resultados[4] ){
      $value = $resultadosECO;
    }else{
      $value = $resultados;
    }
    //
    //  Creamos nueva entrada usuarios
    //
    $accion = '2';
    $textoaccion = 'Bot??n llamar servicios' ;
    if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acci??n Usuario Desarrollador";
    require 'partials/' . $this->plugin_name . '-servicios-nueva-entrada.php';
    $post_id = wp_insert_post($my_post);
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '2. - Bot??n llamen servicio' );
    do_action('wpfunos_log', 'userIP: ' . apply_filters('wpfunos_userIP','dummy') );
    do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $post_id, 'wpfunos_userName', true )  );
    do_action('wpfunos_log', 'referencia: ' . $referencia );
    do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
    //
    //  Enviamos mensaje de correo de acci??n realizada
    //
    $admin = apply_filters('wpfunos_reserved_email','dummy') ;
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    if( get_option('wpfunos_activarCorreoBoton2Lead') && ! $admin){
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoBoton2Lead'), get_option('wpfunos_asuntoCorreoBoton2Lead') );
      require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Datos-Nuevo-Usuario.php';
      if(!empty( get_option('wpfunos_mailCorreoCcoBoton2Lead' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoBoton2Lead' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccBoton2Lead' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccBoton2Lead' ) ;
      wp_mail (  get_post_meta( $IDservicio, 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoBoton2Lead') , $mensaje, $headers );
      update_post_meta( $post_id, $this->plugin_name . '_userLead', true );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Enviado correo lead2 ' . apply_filters('wpfunos_dumplog', get_post_meta( $IDservicio, 'wpfunos_servicioEmail', true )  ) );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
      do_action('wpfunos_log', '$referencia: ' . $referencia );
    }
    //
    //  devolvemos entrada  javascript con "success" y con el t??tulo del servicio
    //
    $result['type'] = "success";
    $result['titulo'] = $titulo;
    $result['telefono'] = $telefono;
    $result['tel'] = $tel;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  public function wpfunosServiciosBotonPresupuesto(){
    $IDservicio = $_POST['IDservicio'];
    $IDusuario = $_POST['IDusuario'];
    $wpnonce = $_POST['wpnonce'];
    $precio = $_POST['precio'];
    $ecologico = $_POST['ecologico'];
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio BotonPresupuesto' );
    do_action('wpfunos_log', 'IDservicio: ' . $IDservicio );
    do_action('wpfunos_log', 'IDusuario: ' . $IDusuario );
    do_action('wpfunos_log', 'Precio: ' . $precio );
    do_action('wpfunos_log', 'ecologico: ' . $ecologico);
    //
    if ( !wp_verify_nonce( $_POST['wpnonce'], "wpfunos_servicios_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    //
    $titulo = get_post_meta( $IDservicio, "wpfunos_servicioNombre", true);
    do_action('wpfunos_log', 'Titulo: ' . $titulo );
    //


    //
    $result['type'] = "success";
    $result['titulo'] = $titulo;
    $result['servicio'] = $IDservicio;
    $result['ecologico'] = $ecologico;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  public function wpfunosServiciosBotonEnviarPresupuesto(){
    $IDservicio = $_POST['wpfunosid'];
    $IDusuario = $_POST['wpusuario'];
    $wpnonce = $_POST['wpnonce'];
    $precio = $_POST['precio'];
    $ecologico = $_POST['ecologico'];
    $mensajePopup = wp__post( $_POST['wpmensaje'] );
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio BotonEnviarPresupuesto' );
    do_action('wpfunos_log', 'IDservicio: ' . $IDservicio );
    do_action('wpfunos_log', 'IDusuario: ' . $IDusuario );
    do_action('wpfunos_log', 'mensaje: ' . $mensajePopup );
    do_action('wpfunos_log', 'precio: ' . $precio);
    do_action('wpfunos_log', 'ecologico: ' . $ecologico);
    //
    if ( !wp_verify_nonce( $_POST['wpnonce'], "wpfunos_servicios_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    //
    //  Titulo y tel??fono del servicio a mosrtar en pantalla devueltos a javascript
    //
    $titulo = get_post_meta( $IDservicio, "wpfunos_servicioNombre", true);
    do_action('wpfunos_log', 'Titulo: ' . $titulo );
    //
    // Preparamos campos para insertar entrada en usuarios
    //
    require 'partials/' . $this->plugin_name . '-servicios-nueva-entrada-seleccion.php';
    mt_srand(mktime());
    $referencia = 'funos-'.(string)mt_rand();
    //return: $resultados = array( $preciototal ,$preciodescuento, $NA, $wpfservicio, $ecologico ) ;
    $resultados = $this->wpfunosGetResults( $IDservicio, $IDusuario );
    $resultadosECO = $this->wpfunosGetResultsECO( $IDservicio, $IDusuario );
    do_action('wpfunos_log', 'Precio resultado : ' . $resultados[0] );
    do_action('wpfunos_log', 'Precio ecologico : ' . $resultados[4] );
    do_action('wpfunos_log', 'Precio resultadoECO : ' . $resultadosECO[0] );
    do_action('wpfunos_log', 'Precio ecologicoECO : ' . $resultadosECO[4] );

    $value = ( 'si' == $ecologico ) ? $resultadosECO : $resultados ;
    //
    //  Creamos nueva entrada usuarios
    //
    $accion = '5';
    $textoaccion = 'Bot??n pedir presupuesto' ;
    if( apply_filters('wpfunos_reserved_email','dummy') ) $textoaccion = "Acci??n Usuario Desarrollador";
    require 'partials/' . $this->plugin_name . '-servicios-nueva-entrada.php';
    $post_id = wp_insert_post($my_post);
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', '5. - Bot??n pedir presupuesto' );
    do_action('wpfunos_log', 'userIP: ' . apply_filters('wpfunos_userIP','dummy') );
    do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $post_id, 'wpfunos_userName', true )  );
    do_action('wpfunos_log', 'referencia: ' . $referencia );
    do_action('wpfunos_log', 'Post ID: ' .  $post_id  );
    update_post_meta( $post_id, $this->plugin_name . '_userComentarios', $mensajePopup );
    //
    //  Enviamos mensaje de correo de acci??n realizada
    //
    $admin = apply_filters('wpfunos_reserved_email','dummy') ;
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    if( get_option('wpfunos_activarCorreoPedirPresupuesto') && ! $admin){
      $mensaje = apply_filters( 'wpfunos_message_format', get_option('wpfunos_mensajeCorreoPedirPresupuesto'), get_option('wpfunos_asuntoCorreoPedirPresupuesto') );
      require 'partials/mensajes/' . $this->plugin_name . '-Mensajes-Datos-Nuevo-Usuario.php';
      if(!empty( get_option('wpfunos_mailCorreoCcoPedirPresupuesto' ) ) ) $headers[] = 'Cc: ' . get_option('wpfunos_mailCorreoCcoPedirPresupuesto' ) ;
      if(!empty( get_option('wpfunos_mailCorreoBccPedirPresupuesto' ) ) ) $headers[] = 'Bcc: ' . get_option('wpfunos_mailCorreoBccPedirPresupuesto' ) ;
      wp_mail (  get_post_meta( $IDservicio, 'wpfunos_servicioEmail', true ) , get_option('wpfunos_asuntoCorreoPedirPresupuesto') , $mensaje, $headers );
      update_post_meta( $post_id, $this->plugin_name . '_userLead', true );
      do_action('wpfunos_log', '==============' );
      do_action('wpfunos_log', 'Enviado correo Pedir Presupuesto ' . apply_filters('wpfunos_dumplog', get_post_meta( $IDservicio, 'wpfunos_servicioEmail', true )  ) );
      do_action('wpfunos_log', 'userIP: ' . $userIP );
      do_action('wpfunos_log', 'Nombre: ' .  get_post_meta( $IDusuario, 'wpfunos_userName', true )  );
      do_action('wpfunos_log', '$referencia: ' . $referencia );
    }
    //
    $result['type'] = "success";
    $result['titulo'] = $titulo;
    $result['servicio'] = $IDservicio;
    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

  public function wpfunosServiciosBotonDetalles(){
    $IDservicio = $_POST['IDservicio'];
    $IDusuario = $_POST['IDusuario'];
    $wpnonce = $_POST['wpnonce'];
    $precio = $_POST['precio'];
    $ecologico = $_POST['ecologico'];
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', 'Llegada ajax Servicio BotonDetalles' );
    do_action('wpfunos_log', 'IDservicio: ' . $IDservicio );
    do_action('wpfunos_log', 'IDusuario: ' . $IDusuario );
    do_action('wpfunos_log', 'precio: ' . $precio);
    do_action('wpfunos_log', 'ecologico: ' . $ecologico);
    //
    if ( !wp_verify_nonce( $_POST['wpnonce'], "wpfunos_servicios_nonce")) {
      do_action('wpfunos_log', 'nonce incorrecto' );
      exit("Woof Woof Woof");
    }
    //
    $_GET['AttsDetalle'] = 'wpfunos-id|' . $IDservicio.'
    data-wpnonce|' . $wpnonce .'
    wpusuario|' . $IDusuario .'
    wpecologico|' . $ecologico .'
    precio|' . $precio ;
    //id="wpfunos-modal-detalles-logo"
    $logo = wp_get_attachment_image ( get_post_meta( $IDservicio, 'wpfunos_servicioLogo', true ) ,'full' );
    //wpfunos-modal-detalles-nombre
    $nombre = get_post_meta( $IDservicio, "wpfunos_servicioNombre", true);
    //wpfunos-modal-detalles-nombrepack
    $nombrepack = get_post_meta( $IDservicio, 'wpfunos_servicioPackNombre', true );
    //wpfunos-modal-detalles-logo-confirmado
    $logo_confirmado = wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenConfirmado', true ) , array(45,46));
    //wpfunos-modal-detalles-texto-confirmado
    $texto_confirmado = "Precio confirmado";
    //wpfunos-modal-detalles-logo-ecologico
    $logo_ecologico = ( 'si' == $ecologico ) ?  wp_get_attachment_image (  get_post_meta( get_option('wpfunos_postConfImagenes') , 'wpfunos_imagenEcologico', true ) , array(60,60)) : '' ;
    //wpfunos-modal-detalles-logo-promo
    $logo_promo = wp_get_attachment_image ( get_post_meta( $IDservicio, 'wpfunos_servicioImagenPromo', true ) ,'full' );
    //wpfunos-modal-detalles-precio
    $precio = number_format($precio, 0, ',', '.') . '???';
    //wpfunos-modal-detalles-precio-texto
    $precio_texto = get_post_meta( $IDservicio, 'wpfunos_servicioTextoPrecio', true );
    //
    $direccion =  get_post_meta( $IDservicio, 'wpfunos_servicioDireccion', true );
    //
    $resultados = $this->wpfunosGetResults( $IDservicio, $IDusuario );
    $resultadosECO = $this->wpfunosGetResultsECO( $IDservicio, $IDusuario );
    $value = ( 'si' == $ecologico ) ? $resultadosECO : $resultados ;
    //
    //wpfunos-modal-detalles-base-precio
    $base_precio = number_format($value[3][0][2], 0, ',', '.') . '???' ;
    //wpfunos-modal-detalles-base-descuento
    $base_descuento = ( strlen( $value[3][0][3]) > 1 ) ? $value[3][0][3] . '%' : '' ;
    //wpfunos-modal-detalles-base-total
    $base_total = ( strlen( $value[3][0][3]) > 1 ) ? $value[3][0][4] . '%' : '' ;
    //
    //wpfunos-modal-detalles-destino-nombre
    $destino_nombre = $value[3][1][1];
    //wpfunos-modal-detalles-destino-precio
    $destino_precio = number_format($value[3][1][2], 0, ',', '.') . '???' ;
    //wpfunos-modal-detalles-destino-descuento
    $destino_descuento = ( strlen( $value[3][1][3]) > 1 ) ? $value[3][1][3] . '%' : '' ;
    //wpfunos-modal-detalles-destino-total
    $destino_total = ( strlen( $value[3][1][3]) > 1 ) ? $value[3][1][4] . '%' : '' ;
    //
    //wpfunos-modal-detalles-ataud-nombre
    $ataud_nombre = $value[3][2][1];
    //wpfunos-modal-detalles-ataud-precio
    $ataud_precio = number_format($value[3][2][2], 0, ',', '.') . '???' ;
    //wpfunos-modal-detalles-ataud-descuento
    $ataud_descuento = ( strlen( $value[3][2][3]) > 1 ) ? $value[3][2][3] . '%' : '' ;
    //wpfunos-modal-detalles-ataud-total
    $ataud_total = ( strlen( $value[3][2][3]) > 1 ) ? $value[3][2][4] . '%' : '' ;
    //
    //wpfunos-modal-detalles-velatorio-nombre
    $velatorio_nombre = $value[3][3][1];
    //wpfunos-modal-detalles-velatorio-precio
    $velatorio_precio = number_format($value[3][3][2], 0, ',', '.') . '???' ;
    //wpfunos-modal-detalles-velatorio-descuento
    $velatorio_descuento = ( strlen( $value[3][3][3]) > 1 ) ? $value[3][3][3] . '%' : '' ;
    //wpfunos-modal-detalles-velatorio-total
    $velatorio_total = ( strlen( $value[3][3][3]) > 1 ) ? $value[3][3][4] . '%' : '' ;
    //
    //wpfunos-modal-detalles-ceremonia-nombre
    $ceremonia_nombre = $value[3][4][1];
    //wpfunos-modal-detalles-ceremonia-precio
    $ceremonia_precio = number_format($value[3][4][2], 0, ',', '.') . '???' ;
    //wpfunos-modal-detalles-ceremonia-descuento
    $ceremonia_descuento = ( strlen( $value[3][4][3]) > 1 ) ? $value[3][4][3] . '%' : '' ;
    //wpfunos-modal-detalles-ceremonia-total
    $ceremonia_total = ( strlen( $value[3][4][3]) > 1 ) ? $value[3][4][4] . '%' : '' ;
    //
    //wpfunos-modal-detalles-generico-nombre
    $generico_nombre = '';
    //wpfunos-modal-detalles-generico-precio
    $generico_precio = $precio;
    //wpfunos-modal-detalles-generico-descuento
    $generico_descuento = '' ;
    //wpfunos-modal-detalles-generico-total
    $generico_total = '' ;
    //
    //wpfunos-modal-detalles-mapa
    //$mapa = '[gmw_single_location object="post" object_id="' . $IDservicio . '" elements="map,distance,address,directions_link" units="k" map_height="300px" map_width="100%"]';
    //
    //wpfunos-servicios-nueva-entrada-detalles-comentarios.php
    require 'partials/' . $this->plugin_name . '-servicios-nueva-entrada-detalles-comentarios.php';
    $result['type'] = "success";
    $result['logo'] = $logo;
    $result['nombre'] = $nombre;
    $result['nombrepack'] = $nombrepack;
    $result['logo_confirmado'] = $logo_confirmado;
    $result['texto_confirmado'] = $texto_confirmado;
    $result['logo_ecologico'] = $logo_ecologico;
    $result['logo_promo'] = $logo_promo;
    $result['precio'] = $precio;
    $result['precio_texto'] = $precio_texto;

    $result['movil_base_precio'] = $result['base_precio'] = $base_precio;
    $result['movil_base_descuento'] = $result['base_descuento'] = $base_descuento;
    $result['movil_base_total'] = $result['base_total'] = $base_total;

    $result['movil_destino_nombre'] = $result['destino_nombre'] = $destino_nombre;
    $result['movil_destino_precio'] = $result['destino_precio'] = $destino_precio;
    $result['movil_destino_descuento'] = $result['destino_descuento'] = $destino_descuento;
    $result['movil_destino_total'] = $result['destino_total'] = $destino_total;

    $result['movil_ataud_nombre'] = $result['ataud_nombre'] = $ataud_nombre;
    $result['movil_ataud_precio'] = $result['ataud_precio'] = $ataud_precio;
    $result['movil_ataud_descuento'] = $result['ataud_descuento'] = $ataud_descuento;
    $result['movil_ataud_total'] = $result['ataud_total'] = $ataud_total;

    $result['movil_velatorio_nombre'] = $result['velatorio_nombre'] = $velatorio_nombre;
    $result['movil_velatorio_precio'] = $result['velatorio_precio'] = $velatorio_precio;
    $result['movil_velatorio_descuento'] = $result['velatorio_descuento'] = $velatorio_descuento;
    $result['movil_velatorio_total'] = $result['velatorio_total'] = $velatorio_total;

    $result['movil_ceremonia_nombre'] = $result['ceremonia_nombre'] = $ceremonia_nombre;
    $result['movil_ceremonia_precio'] = $result['ceremonia_precio'] = $ceremonia_precio;
    $result['movil_ceremonia_descuento'] = $result['ceremonia_descuento'] = $ceremonia_descuento;
    $result['movil_ceremonia_total'] = $result['ceremonia_total'] = $ceremonia_total;

    $result['movil_generico_nombre'] = $result['generico_nombre'] = $generico_nombre;
    $result['movil_generico_precio'] = $result['generico_precio'] = $generico_precio;
    $result['movil_generico_descuento'] = $result['generico_descuento'] = $generico_descuento;
    $result['movil_generico_total'] = $result['generico_total'] = $generico_total;

    $result['direccion'] = $direccion;
    $result['idservicio'] = $IDservicio;

    $shortcode = '[gmw_single_location object="post" object_id="' . $IDservicio . '" elements="map,distance,address,directions_link" units="k" map_height="300px" map_width="100%"]';
    $result['mapa'] =  do_shortcode($shortcode);

    $result['comentarios'] = wp_kses_post($comentarios);

    $result = json_encode($result);
    echo $result;
    // don't forget to end your scripts with a die() function - very important
    die();
  }

}
