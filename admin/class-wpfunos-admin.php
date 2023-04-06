<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* The admin-specific functionality of the plugin.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/admin
* @author     Efraim Bayarri <efraim@efraim.cat>
*/

require_once 'class-wpfunos-admin-AJAX.php';
require_once 'class-wpfunos-admin-cronjobs.php';
require_once 'class-wpfunos-admin-hooks.php';

class Wpfunos_Admin {
  private $plugin_name;
  private $version;
  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
    add_action('init', array( $this, 'aseguradoras_custom_post_type' ));
    add_action('init', array( $this, 'codigospostales_custom_post_type' ));
    add_action('init', array( $this, 'provincias_custom_post_type' ));
    add_action('init', array( $this, 'prov_zona_custom_post_type' ));
    add_action('init', array( $this, 'config_imagenes_custom_post_type' ));
    add_action('init', array( $this, 'servicios_custom_post_type' ));
    add_action('init', array( $this, 'tipos_seguro_custom_post_type' ));
    add_action('init', array( $this, 'usuarios_registrados_custom_post_type' ));
    add_action('init', array( $this, 'precios_poblacion_funeraria_custom_post_type' ));
    add_action('init', array( $this, 'excepciones_provincias_custom_post_type' ));
    add_action('init', array( $this, 'precios_servicios_custom_post_type' ));
    add_action('init', array( $this, 'dist_local_custom_post_type' ));
    add_action('init', array( $this, 'directorio_entrada_custom_post_type' ));
    add_action('init', array( $this, 'directorio_funeraria_custom_post_type' ));
    add_action('init', array( $this, 'directorio_servicios_custom_post_type' ));
    add_action('init', array( $this, 'directorio_defuncion_custom_post_type' ));
    add_action('init', array( $this, 'directorio_shortcode_custom_post_type' ));

    add_action('admin_menu', array( $this, 'addPluginAdminMenu' ), 9);
    add_action('admin_init', array( $this, 'registerAndBuildFields' ));						// Compara Debug
    add_action('admin_init', array( $this, 'registerAndBuildFieldsConfImagenes' ));			// Compara Configuración Imágenes
    add_action('admin_init', array( $this, 'registerAndBuildFieldsAseguradoras' ));			// Compara Debug
    add_action('admin_init', array( $this, 'registerAndBuildFieldsPagina' ));				// Página inicial
    add_action('admin_init', array( $this, 'registerAndBuildFieldsDatos' ));				// Compara Datos
    add_action('admin_init', array( $this, 'registerAndBuildFieldsResultados' )); 			// Compara Resultados cabecera y Pie
    add_action('admin_init', array( $this, 'registerAndBuildFieldsConfirmado' )); 			// Compara Resultados Confirmado superior e inferior
    add_action('admin_init', array( $this, 'registerAndBuildFieldsConfirmadoDescuento' ));	// Compara Resultados confirmado Descuento superior e inferior
    add_action('admin_init', array( $this, 'registerAndBuildFieldsSinConfirmar' ));			// Compara Resultados Sin Confirmar superior e inferior
    add_action('admin_init', array( $this, 'registerAndBuildFieldsSinPrecio' ));			// Compara Resultados Sin Precio superior e inferior
    add_action('admin_init', array( $this, 'registerAndBuildFieldsServiciosV2' ));			// Compara Resultados Sin Precio superior e inferior
    add_action('admin_init', array( $this, 'registerAndBuildAPIPreventiva' ));
    add_action('admin_init', array( $this, 'registerAndBuildAPIDKV' ));
    add_action('admin_init', array( $this, 'registerAndBuildFieldsDireccionesIP' ));
    add_action('admin_init', array( $this, 'registerAndBuildFieldsPreciosPoblacion' ));
    //
    add_action('admin_init', array( $this, 'registerAndBuildMailInicial' ));		//Configuración General
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail1' ));		//Correo al administrador formulario datos usuario
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail1usuario' ));		//Correo al administrador formulario datos usuario
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail2' ));		//Correo funeraria botón "Te llamamos"
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail2usuario' ));		//Correo usuario botón "Te llamamos"
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail3' ));		//Correo funeraria botón "Llamar"
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail3usuario' ));		//Correo usuario botón "Llamar"
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail7' ));		//Correo funeraria botón "Pedir presupuesto"
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail7usuario' ));		//Correo usuario botón "Pedir presupuesto"
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail8' ));		//Correo usuario copia detalles
    //
    add_action('admin_init', array( $this, 'registerAndBuildMail12' ));		//Datos usuario enviados aseguradora
    add_action('admin_init', array( $this, 'registerAndBuildCorreoAPIPreventiva' )); //Correo Aviso Envio API
    //
    add_action('admin_init', array( $this, 'registerAndBuildMailDatosUsuario' ));		//Inicio
    add_action('admin_init', array( $this, 'registerAndBuildMailPopupUsuario' ));		//Inicio
    add_action('admin_init', array( $this, 'registerAndBuildMail' ));		//Boton 1 Admin
    add_action('admin_init', array( $this, 'registerAndBuildMail2' ));		//Boton 2 Admin
    add_action('admin_init', array( $this, 'registerAndBuildMail3' ));		//Botón "Que me llamen"
    add_action('admin_init', array( $this, 'registerAndBuildMail4' ));		//Botón "Llamar"
    add_action('admin_init', array( $this, 'registerAndBuildMail5' ));		//Datos usuario enviados servicios
    add_action('admin_init', array( $this, 'registerAndBuildMail6' ));		//Correo popup detalles servicios
    add_action('admin_init', array( $this, 'registerAndBuildMail7' ));		//Correo envios colaboradores servicios
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail4' ));		//Correo lead botón "Quiero que me llamen"
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail5' ));		//Correo lead botón "Llamar"
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail6' ));		//Correo al administrador pedir presupuesto
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail7' ));		//Correo lead pedir presupuesto
    add_action('admin_init', array( $this, 'registerAndBuildMail8' ));		//Correo pedir presupuesto servicios
    //
    add_action('add_meta_boxes_usuarios_wpfunos', array( $this, 'setupusuarios_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_servicios_wpfunos', array( $this, 'setupservicios_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_cpostales_wpfunos', array( $this, 'setupcpostales_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_provincias_wpfunos', array( $this, 'setupprovincias_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_prov_zona_wpfunos', array( $this, 'setupprov_zona_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_aseguradoras_wpfunos', array( $this, 'setupaseguradoras_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_tipos_seguro_wpfunos', array( $this, 'setuptiposseguro_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_conf_img_wpfunos', array( $this, 'setupconfimgwpfunos_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_precio_funer_wpfunos', array( $this, 'setupprecio_funer_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_excep_prov_wpfunos', array( $this, 'setupexcep_prov_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_precio_serv_wpfunos', array( $this, 'setupprecio_serv_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_dist_local_wpfunos', array( $this, 'setupdist_local_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_directorio_servicio', array( $this, 'setupdirectorio_servicioMetaboxes' ));
    add_action('add_meta_boxes_directorio_entrada', array( $this, 'setupdirectorio_entradaMetaboxes' ));
    add_action('add_meta_boxes_directorio_funeraria', array( $this, 'setupdirectorio_funerariaMetaboxes' ));
    add_action('add_meta_boxes_directorio_defuncion', array( $this, 'setupdirectorio_defuncionMetaboxes' ));
    add_action('add_meta_boxes_directorio_shortcode', array( $this, 'setupdirectorio_shortcodeMetaboxes' ));

    add_action('save_post_usuarios_wpfunos', array( $this, 'saveusuarios_wpfunosMetaBoxData' ));
    add_action('save_post_servicios_wpfunos', array( $this, 'saveservicios_wpfunosMetaBoxData' ));
    add_action('save_post_cpostales_wpfunos', array( $this, 'savecpostales_wpfunosMetaBoxData' ));
    add_action('save_post_provincias_wpfunos', array( $this, 'saveprovincias_wpfunosMetaBoxData' ));
    add_action('save_post_prov_zona_wpfunos', array( $this, 'saveprov_zona_wpfunosMetaBoxData' ));
    add_action('save_post_aseguradoras_wpfunos', array( $this, 'saveaseguradoras_wpfunosMetaBoxData' ));
    add_action('save_post_tipos_seguro_wpfunos', array( $this, 'savetiposeguro_wpfunosMetaBoxData' ));
    add_action('save_post_conf_img_wpfunos', array( $this, 'saveconfimgwpfunos_wpfunosMetaBoxData' ));
    add_action('save_post_precio_funer_wpfunos', array( $this, 'saveprecio_funer_wpfunosMetaBoxData' ));
    add_action('save_post_excep_prov_wpfunos', array( $this, 'saveexcep_prov_wpfunosMetaBoxData' ));
    add_action('save_post_precio_serv_wpfunos', array( $this, 'saveprecio_serv_wpfunosMetaBoxData' ));
    add_action('save_post_dist_local_wpfunos', array( $this, 'savedist_local_wpfunosMetaBoxData' ));
    add_action('save_post_directorio_servicio', array( $this, 'savedirectorio_servicioMetaBoxData' ));
    add_action('save_post_directorio_entrada', array( $this, 'savedirectorio_entradaMetaBoxData' ));
    add_action('save_post_directorio_funeraria', array( $this, 'savedirectorio_funerariaMetaBoxData' ));
    add_action('save_post_directorio_defuncion', array( $this, 'savedirectorio_defuncionMetaBoxData' ));
    add_action('save_post_directorio_shortcode', array( $this, 'savedirectorio_shortcodeMetaBoxData' ));

    add_action('wpfunos_hojas_calculo', array( $this, 'wpfunosHojasCalculo' ), 10, 1 );
    add_action('wpfunos_enlaces_landings', array( $this, 'wpfunosEnlacesLandings' ), 10, 1);

    add_action('save_post_servicios_wpfunos', array( $this, 'wpfunosGuardarServicio' ), 10, 1 );
    add_action('after_delete_post', array( $this, 'wpfunosBorrarServicio' ), 10, 2 );
    add_action('trashed_post', array( $this, 'wpfunosPapeleraServicio' ), 10, 1 );
    //add_action('updated_post_meta', array( $this, 'wpfunosActualizarMetaServicios' ), 10, 4);

    $this->wpfunos_admin_AJAX = new Wpfunos_Admin_AJAX();
    $this->wpfunos_admin_cronjobs = new Wpfunos_Admin_Cronjobs();
    $this->wpfunos_admin_hooks = new Wpfunos_Admin_Hooks();
  }
  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-admin.css', array(), $this->version, 'all' );
  }
  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-admin.js', array( 'jquery' ), $this->version, false );
    wp_localize_script( $this->plugin_name, 'WpfAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
  }

  /*********************************/
  /*****  CRON                ******/
  /*********************************/

  /**
  * Register the Cron Job.
  */
  public function wpfunosCron() {
    $this->custom_logs('==> Wpfunos Daily Maintenance begins <==');
    $this->custom_logs('---');
    $this->wpfunos_admin_cronjobs->wpfunosMaintenance();
    $this->custom_logs('==> Wpfunos Daily Maintenance ends <==');
    $this->custom_logs('---');
  }
  /**
  * Register the Cron Job.
  */
  public function wpfunosNextCron() {
    $this->custom_logs('==> Wpfunos Next Maintenance begins <==');
    $this->custom_logs('---');
    $this->wpfunos_admin_cronjobs->wpfunosNextMaintenance();
    $this->custom_logs('==> Wpfunos Next Maintenance ends <==');
    $this->custom_logs('---');
  }
  /**
  * Register the Cron Job.
  * Wpfunos_Admin::wpfunosHourlyCron()
  */
  public function wpfunosHourlyCron() {
    $this->custom_logs('==> Wpfunos Hourly Maintenance begins <==');
    $this->custom_logs('---');
    $this->wpfunos_admin_cronjobs->wpfunosHourlyMaintenance();
    $this->custom_logs('==> Wpfunos Hourly Maintenance ends <==');
    $this->custom_logs('---');
  }

  /*********************************/
  /*****  MENUS               ******/
  /*********************************/

  /**
  * Admin menu.
  */
  public function addPluginAdminMenu() {
    //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page( 'Comparador', 'Índice comparador', 'administrator', $this->plugin_name, array( $this, 'display_plugin_admin_dashboard' ), plugin_dir_url(dirname(__FILE__)) . 'admin/img/funos-logo-01.png', 26 );
    add_menu_page( 'Configuración', 'Índice configuración', 'administrator', 'wpfunosconfig', array( $this, 'display_plugin_admin_config_dashboard' ), plugin_dir_url(dirname(__FILE__)) . 'admin/img/funos-logo-01.png', 26 );
    add_menu_page( 'Landings Población', 'Índice landings población', 'editorlandings', 'wpfunosprecios_poblacion', array( $this, 'display_plugin_admin_precios_poblacion_dashboard' ), plugin_dir_url(dirname(__FILE__)) . 'admin/img/funos-logo-01.png', 26 );
    add_menu_page( 'Directorio', 'Índice Directorio', 'administrator','wpfunos_directorio', array( $this, 'display_plugin_admin_directorio_dashboard' ), plugin_dir_url(dirname(__FILE__)) . 'admin/img/funos-logo-01.png', 26 );
    // add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null )
    add_submenu_page( 'wpfunosconfig', esc_html__('Configuración servicios WpFunos', 'wpfunos'), esc_html__('Configuración servicios', 'wpfunos'), 'administrator', 'wpfunos-settings', array( $this, 'displayPluginAdminSettings' ));
    add_submenu_page( 'wpfunosconfig', esc_html__('Configuración aseguradoras WpFunos', 'wpfunos'), esc_html__('Configuración aseguradoras', 'wpfunos'), 'administrator', 'wpfunos-aseguradoras', array( $this, 'displayPluginAdminAseguradoras' ));
    add_submenu_page( 'wpfunosconfig', esc_html__('Configuración correo WpFunos', 'wpfunos'), esc_html__('Configuración correo', 'wpfunos'), 'administrator', 'wpfunos-mail', array( $this, 'displayPluginAdminMail' ));
    add_submenu_page( 'wpfunosconfig', esc_html__('Configuración API Preventiva WpFunos', 'wpfunos'), esc_html__('Configuración API Preventiva', 'wpfunos'), 'administrator', 'wpfunos-APIPreventiva', array( $this, 'displayPluginAdminAPIPreventiva' ));
    add_submenu_page( 'wpfunosconfig', esc_html__('Configuración API DKV WpFunos', 'wpfunos'), esc_html__('Configuración API DKV', 'wpfunos'), 'administrator', 'wpfunos-APIDKV', array( $this, 'displayPluginAdminAPIDKV' ));
    add_submenu_page( 'wpfunosconfig', esc_html__('Configuración Direcciones IP WpFunos', 'wpfunos'), esc_html__('Configuración Direcciones IP', 'wpfunos'), 'administrator', 'wpfunos-direccionesIP', array( $this, 'displayPluginAdminDireccionesIP' ));
    if(get_option('wpfunos_Debug')){
      add_submenu_page( 'wpfunosconfig' , esc_html__('Logs WpFunos', 'wpfunos'), esc_html__('Logs', 'wpfunos'), 'administrator', 'wpfunos-logs', array( $this, 'displayPluginAdminLogs' ));
    }
    add_submenu_page( 'wpfunosprecios_poblacion', esc_html__('Configuración precios población WpFunos', 'wpfunos'), esc_html__('Configuración precios población', 'wpfunos'), 'administrator', 'wpfunos-settingspreciospoblacion', array( $this, 'displayPreciosPoblacionSettings' ));
    add_submenu_page( 'wpfunos_directorio', esc_html__('Import-Export Directorio', 'wpfunos'), esc_html__('Import-Export', 'wpfunos'), 'administrator', 'wpfunos-import-export-directorio', array( $this, 'displayImportExportDirectorio' ));
  }

  /**
  * Admin menu display.
  */
  public function display_plugin_admin_dashboard(){
    require_once 'partials/wpfunos-admin-display.php';
  }
  public function display_plugin_admin_config_dashboard(){
    require_once 'partials/wpfunos-admin-config-display.php';
  }
  public function display_plugin_admin_precios_poblacion_dashboard(){
    require_once 'partials/wpfunos-admin-display.php';
  }
  public function display_plugin_admin_directorio_dashboard(){
    require_once 'partials/wpfunos-admin-display.php';
  }

  /**
  * Settings menu display.
  */
  public function displayPluginAdminSettings() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/wpfunos-admin-settings-display.php';
  }
  /**
  * Aseguradoras menu display.
  */
  public function displayPluginAdminAseguradoras() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/wpfunos-admin-aseguradoras-display.php';
  }

  /**
  * Mail menu display.
  */
  public function displayPluginAdminMail() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/wpfunos-admin-mail-display.php';
  }
  /**
  * Api Preventiva menu display.
  */
  public function displayPluginAdminAPIPreventiva() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/wpfunos-admin-APIPreventiva-display.php';
  }
  /**
  * Api DKV menu display.
  */
  public function displayPluginAdminAPIDKV() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/wpfunos-admin-APIDKV-display.php';
  }
  /**
  * Direcciones IP reservadas.
  */
  public function displayPluginAdminDireccionesIP() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/wpfunos-admin-direccionesIP-display.php';
  }

  /**
  * Logs menu display.
  */
  public function displayPluginAdminLogs(){
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array( $this, 'wpfunosSettingsMessages' ));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/wpfunos-admin-logs-display.php';
  }

  /**
  * Precios población menu display.
  */
  //public function displayPreciosPoblacionSettings() {
  //  if (isset($_GET['error_message'])) {
  //    add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
  //    do_action('admin_notices', sanitize_text_field($_GET['error_message']));
  //  }
  //  require_once 'partials/wpfunos-admin-precios-poblacion-settings-display.php';
  //}

  /**
  * Precios población menu display.
  */
  public function displayImportExportDirectorio() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/wpfunos-admin-import-export-directorio-display.php';
  }

  /*********************************/
  /*****  REGISTRAR CAMPOS    ******/
  /*********************************/

  /**
  * Registro de campos registros de wordpress
  */
  public function registerAndBuildFields() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildFields.php';
  }
  public function registerAndBuildFieldsConfImagenes() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildFieldsConfImagenes.php';
  }
  public function registerAndBuildFieldsAseguradoras() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildAseguradoras.php';
  }
  public function registerAndBuildFieldsPagina() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildPagina.php';
  }
  //
  public function registerAndBuildMailInicial() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildMailInicial.php';
  }
  public function registerAndBuildV2Mail1() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildV2Mail1.php';
  }
  public function registerAndBuildV2Mail1usuario() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildV2Mail1usuario.php';
  }

  public function registerAndBuildV2Mail2() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildV2Mail2.php';
  }
  public function registerAndBuildV2Mail2usuario() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildV2Mail2usuario.php';
  }

  public function registerAndBuildV2Mail3() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildV2Mail3.php';
  }
  public function registerAndBuildV2Mail3usuario() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildV2Mail3usuario.php';
  }

  public function registerAndBuildV2Mail7() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildV2Mail7.php';
  }
  public function registerAndBuildV2Mail7usuario() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildV2Mail7usuario.php';
  }

  public function registerAndBuildV2Mail8() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildV2Mail8.php';
  }
  //
  public function registerAndBuildMail12() {
    require_once 'partials/registerAndBuild/aseguradoras/wpfunos-admin-registerAndBuildMail12.php';
  }
  public function registerAndBuildCorreoAPIPreventiva() {
    require_once 'partials/registerAndBuild/aseguradoras/wpfunos-admin-registerAndBuildMailPreventiva.php';
  }


  //
  public function registerAndBuildV2Mail4() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildV2Mail4.php';
  }
  public function registerAndBuildV2Mail5() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildV2Mail5.php';
  }
  public function registerAndBuildV2Mail6() {
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildV2Mail6.php';
  }


  public function registerAndBuildMailDatosUsuario() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMailDatosUsuario.php';
  }
  public function registerAndBuildMailPopupUsuario() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMailPopupUsuario.php';
  }
  public function registerAndBuildMail() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMail.php';
  }
  public function registerAndBuildMail2() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMail2.php';
  }
  public function registerAndBuildMail3() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMail3.php';
  }
  public function registerAndBuildMail4() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMail4.php';
  }
  public function registerAndBuildMail5() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMail5.php';
  }
  public function registerAndBuildMail6() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMail6.php';
  }
  public function registerAndBuildMail7() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMail7.php';
  }
  public function registerAndBuildMail8() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMail8.php';
  }
  //public function registerAndBuildMail9() {
  //  require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMail9.php';
  //}
  //  public function registerAndBuildMail10() {
  //    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMail10.php';
  //  }
  //public function registerAndBuildMail11() {
  //  require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMail11.php';
  //}
  //public function registerAndBuildMail13() {
  //  require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildMail13.php';
  //}
  public function registerAndBuildAPIPreventiva() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildAPIPreventiva.php';
  }
  public function registerAndBuildAPIDKV() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildAPIDKV.php';
  }

  public function registerAndBuildFieldsDireccionesIP() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildFieldsDireccionesIP.php';
  }
  public function registerAndBuildFieldsDatos() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildFieldsDatos.php';
  }
  public function registerAndBuildFieldsResultados() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildFieldsResultados.php';
  }
  public function registerAndBuildFieldsConfirmado() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildFieldsConfirmado.php';
  }
  public function registerAndBuildFieldsConfirmadoDescuento() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildFieldsConfirmadoDescuento.php';
  }
  public function registerAndBuildFieldsSinConfirmar() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildFieldsSinConfirmar.php';
  }
  public function registerAndBuildFieldsSinPrecio() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildFieldsSinPrecio.php';
  }
  public function registerAndBuildFieldsPreciosPoblacion() {
    require_once 'partials/registerAndBuild/wpfunos-admin-registerAndBuildFieldsPreciosPoblacion.php';
  }
  public function registerAndBuildFieldsServiciosV2(){
    require_once 'partials/registerAndBuild/V2/wpfunos-admin-registerAndBuildServiciosV2.php';
  }


  /**
  * Display Admin settings error messages.
  */
  public function wpfunosSettingsMessages($error_message) {
    switch ($error_message) {
      case '1':
      $message = esc_html__('Hubo un error al agregar esta configuración. Inténtalo de nuevo. Si esto persiste, envíenos un correo electrónico.', 'wpfunos');
      $err_code = esc_attr('wpfunos_setting');
      $setting_field = 'wpfunos_setting';
      break;
    }
    $type = 'error';
    add_settings_error($setting_field, $err_code, $message, $type);
  }

  /*********************************/
  /*****  DISPLAY MENUS       ******/
  /*********************************/

  /**
  * Display Admin settings display name.
  */
  public function wpfunos_display_general_account() {
    ?><p><?php esc_html_e('Si está activo guarda los datos del debug en ficheros en /wp-contenet/uploads/wpfunos-logs/ y los muestra en la pestaña "logs".', 'wpfunos'); ?></p><?php
  }
  public function wpfunos_display_general_account_confimagenes() {
    ?><p><?php esc_html_e('Configuración imágenes.', 'wpfunos'); ?></p><?php
  }
  public function wpfunos_display_aseguradoras_account() {
    ?><p><?php esc_html_e('Configuración de las aseguradoras.', 'wpfunos'); ?></p><?php
  }
  public function wpfunos_display_general_account_pagina() {
    ?>
    <p><?php esc_html_e('Página del Comparador.', 'wpfunos'); ?></p>
    <p>
      Ejemplo URL página resultados servicios: https://funos.es/comparar-precios?address%5B%5D=[field id="address"]&post%5B%5D=[field id="post"]&distance=[field id="distance"]&units=[field id="units"]&page1=&per_page=100&lat=[field id="lat"]&lng=[field id="lng"]&form=4&action=fs&wpf=[field id="wpf"]&orden=dist
    </p>
    <p>
      Ejemplo URL página resultados aseguradoras: https://funos.es/compara-precios-aseguradoras?address%5B%5D=[field id="address"]&post%5B%5D=[field id="post"]&distance=[field id="distance"]&units=[field id="units"]&page1=&per_page=50&lat=[field id="lat"]&lng=[field id="lng"]&form=3&action=fs&wpf=[field id="wpf"]
    </p>
    <?php
  }
  public function wpfunos_display_general_account_datos() {
    ?><p><?php esc_html_e('Plantilla del formulario de datos.', 'wpfunos'); ?></p><?php
  }
  public function wpfunos_display_general_account_resultados() {
    ?><p><?php esc_html_e('Cabecera y pie de la página de resultados.', 'wpfunos'); ?></p><?php
  }
  public function wpfunos_display_general_account_confirmado() {
    ?><p><?php esc_html_e('Plantilla de resultados confirmados', 'wpfunos'); ?></p><?php
  }
  public function wpfunos_display_general_account_confirmadodescuento() {
    ?><p><?php esc_html_e('Plantilla de resultados confirmados con descuento', 'wpfunos'); ?></p><?php
  }
  public function wpfunos_display_general_account_sinconfirmar() {
    ?><p><?php esc_html_e('Plantilla de resultados sin confirmar', 'wpfunos'); ?></p><?php
  }
  public function wpfunos_display_general_account_sinprecio() {
    ?><p><?php esc_html_e('Plantilla de resultados sin precio', 'wpfunos'); ?></p><?php
  }
  public function wpfunos_display_APIPreventiva_account(){

  }
  public function wpfunos_display_APIDKV_account(){

  }
  public function wpfunos_display_mail_account_general() {
    ?>
    <hr/>
    <p><?php esc_html_e('Configuración:', 'wpfunos'); ?></p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_usuario_datos(){
    ?>
    <hr/>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes variables:', 'wpfunos'); ?></strong></p>
    <p>[ubicacion], [CPUsuario], [telefonoUsuario], [nombreUsuario], [Email] </p>
    <p>[destino], [ataud], [velatorio], [ceremonia]</p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_usuario_contacto(){
    ?>
    <hr/>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes variables:', 'wpfunos'); ?></strong></p>
    <p>[telefonoUsuario], [nombreUsuario], [Email] </p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_account() {
    ?>
    <hr/>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes variables:', 'wpfunos'); ?></strong></p>
    <p>[nombreServicio], [nombreFuneraria], [telefono], [telefonoUsuario], [telefonoServicio], [precio], [nombreUsuario], [referencia], [Email], [CPUsuario], [ubicacion]</p>
    <p>[desgloseBaseNombre], [TotaldesgloseBaseTotal] = ( <i>[desgloseBasePrecio] + [desgloseBaseDescuento] + [desgloseBaseTotal]</i> )</p>
    <p>[desgloseDestinoNombre], [TotaldesgloseDestinoTotal] = ( <i>[desgloseDestinoPrecio] + [desgloseDestinoDescuento] + [desgloseDestinoTotal]</i> )</p>
    <p>[desgloseAtaudNombre], [TotaldesgloseAtaudTotal] = ( <i>[desgloseAtaudPrecio] + [desgloseAtaudDescuento] + [desgloseAtaudTotal]</i> )</p>
    <p>[desgloseVelatorioNombre], [TotaldesgloseVelatorioTotal] = ( <i>[desgloseVelatorioPrecio] + [desgloseVelatorioDescuento] + [desgloseVelatorioTotal]</i> )</p>
    <p>[desgloseCeremoniaNombre], [TotaldesgloseCeremoniaTotal] = ( <i>[desgloseCeremoniaPrecio] + [desgloseCeremoniaDescuento] + [desgloseCeremoniaTotal]</i> )</p>
    <p>[desgloseDescuentoGenerico], [TotaldesgloseGenericoTotal] = ( <i>[desgloseDescuentoGenericoPrecio] + [desgloseDescuentoGenericoDescuento] + [desgloseDescuentoGenericoTotal]</i> )</p>
    <p>[comentariosBase], [comentariosDestino], [comentariosAtaud], [comentariosVelatorio], [comentariosDespedida], [comentariosExtras], [comentariosPresupuesto]</p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_account_datos() {
    ?>
    <hr/>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes variables:', 'wpfunos'); ?></strong></p>
    <p>[Email], [referencia], [Nombre], [Telefono], [address], [CP], [IP], [wpf], [URL], [Destino], [Ataud], [Velatorio], [Despedida]</p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_account_Preventiva() {
    ?>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes varialbles:', 'wpfunos'); ?></strong></p>
    <p>[nombreUsuario], [telefono], [Email], [referencia], [CPUsuario], [ubicacion], [seguro], [sexo],  [edad], [tipoAPI]</p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_account_popup_detalles() {
    ?>
    <hr/>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes variables:', 'wpfunos'); ?></strong></p>
    <p>[logoServicio], [direccion], [textoconfirmado], [imagenconfirmado], [textoprecio], [imagenpromo], [imagenecologico]</p>
    <p>[nombreServicio], [nombrepack], [telefono], [telefonoUsuario], [telefonoServicio], [precio], [nombreUsuario], [referencia], [Email], [CPUsuario], [ubicacion]</p>
    <p>[desgloseBaseNombre], [TotaldesgloseBaseTotal] = ( <i>[desgloseBasePrecio] + [desgloseBaseDescuento] + [desgloseBaseTotal]</i> )</p>
    <p>[desgloseDestinoNombre], [TotaldesgloseDestinoTotal] = ( <i>[desgloseDestinoPrecio] + [desgloseDestinoDescuento] + [desgloseDestinoTotal]</i> )</p>
    <p>[desgloseAtaudNombre], [TotaldesgloseAtaudTotal] = ( <i>[desgloseAtaudPrecio] + [desgloseAtaudDescuento] + [desgloseAtaudTotal]</i> )</p>
    <p>[desgloseVelatorioNombre], [TotaldesgloseVelatorioTotal] = ( <i>[desgloseVelatorioPrecio] + [desgloseVelatorioDescuento] + [desgloseVelatorioTotal]</i> )</p>
    <p>[desgloseCeremoniaNombre], [TotaldesgloseCeremoniaTotal] = ( <i>[desgloseCeremoniaPrecio] + [desgloseCeremoniaDescuento] + [desgloseCeremoniaTotal]</i> )</p>
    <p>[desgloseDescuentoGenerico], [TotaldesgloseGenericoTotal] = ( <i>[desgloseDescuentoGenericoPrecio] + [desgloseDescuentoGenericoDescuento] + [desgloseDescuentoGenericoTotal]</i> )</p>
    <p>[comentariosBase], [comentariosDestino], [comentariosAtaud], [comentariosVelatorio], [comentariosDespedida], [comentariosExtras]</p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_account_servicios_colaborador() {
    ?>
    <hr/>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes variables:', 'wpfunos'); ?></strong></p>
    <p>[nombreServicio], [nombrepack], [telefono], [telefonoUsuario], [telefonoServicio], [precio], [nombreUsuario], [referencia], [Email], [CPUsuario], [ubicacion]</p>
    <p>[BaseNombre],[DestinoNombre], [AtaudNombre],[VelatorioNombre], [CeremoniaNombre],</p>
    <p>[precioBase], [precioDestino], [nombreDestino], [precioAtaud], [nombreAtaud], [precioAtaudEco], [nombreAtaudEco], [precioVelatorio]</p>
    <p>[nombreVelatorio], [precioCeremonia], [nombreCeremonia], [precioTotal], [precioTotalEco], [comentarios]</p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_account_aseguradora() {
    ?>
    <hr/>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes variables:', 'wpfunos'); ?></strong></p>
    <p>[referencia], [IP], [Email], [Nombre], [Telefono], [address], [CP], [edad], [any], [URL], [aseguradoraNombre], [aseguradoraTipoSeguro]</p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_account_v2() {
    ?>
    <hr/>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes variables:', 'wpfunos'); ?></strong></p>
    <p>[nombreServicio], [nombreFuneraria], [nombreUsuario], [telefonoServicio], [telefonoUsuario], [email], [CP], [poblacion], [referencia]</p>
    <p>[precio], [destino], [ataud], [velatorio], [ceremonia], [comentarios], [IP]</p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_account_v2_presupuesto() {
    ?>
    <hr/>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes variables:', 'wpfunos'); ?></strong></p>
    <p>[nombreServicio], [nombreFuneraria], [nombreUsuario], [telefonoServicio], [telefonoUsuario], [email], [CP], [poblacion], [referencia]</p>
    <p>[precio], [destino], [ataud], [velatorio], [ceremonia], [comentarios], [comentariosUsuario], [IP]</p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_account_admin_v2(){
    ?>
    <hr/>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes variables:', 'wpfunos'); ?></strong></p>
    <p>[nombre], [telefono], [email], [CP], [poblacion], [distancia], [referencia]</p>
    <p>[destino], [ataud], [velatorio], [ceremonia], [IP], [URL]</p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_account_v2_detalles() {
    ?>
    <hr/>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes variables:', 'wpfunos'); ?></strong></p>
    <hr/>
    <p>[nombreServicio], [nombreUsuario], [telefonoServicio], [telefonoUsuario], [email], [CP], [poblacion], [referencia]</p>
    <p>[precio], [destino], [ataud], [velatorio], [ceremonia], [comentarios], [IP]</p>
    <p>[logoServicio], [nombrepack],[imagenconfirmado], [textoconfirmado], [imagenecologico], [imagenpromo], [textoprecio]</p>
    <hr />
    <?php
  }

  public function wpfunos_display_directorio_account() {
    ?><p><?php esc_html_e('Configuración del directorio.', 'wpfunos'); ?></p><?php
  }
  public function wpfunos_display_direccionesip_account() {
    ?><p><?php esc_html_e('Configuración direcciones IP desarrollo.', 'wpfunos'); ?></p><?php
  }
  public function wpfunos_display_precio_poblacion_account() {
    ?><p><?php esc_html_e('Configuración precios población.', 'wpfunos'); ?></p><?php
  }

  /*********************************/
  /*****  METABOXES  CPT      ******/
  /*********************************/

  /**
  * Custom Post Type Metaboxes
  */
  public function setupusuarios_wpfunosMetaboxes(){
    /** add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null ) */
    add_meta_box('usuarios_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'usuarios_wpfunos_data_meta_box'), 'usuarios_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'usuarios_wpfunos', 'normal');
  }
  public function setupservicios_wpfunosMetaboxes(){
    add_meta_box('servicios_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'servicios_wpfunos_data_meta_box'), 'servicios_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'servicios_wpfunos', 'normal');
  }
  public function setupcpostales_wpfunosMetaboxes(){
    add_meta_box('cpostales_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'cpostales_wpfunos_data_meta_box'), 'cpostales_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'cpostales_wpfunos', 'normal');
  }
  public function setupprovincias_wpfunosMetaboxes(){
    add_meta_box('provincias_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'provincias_wpfunos_data_meta_box'), 'provincias_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'provincias_wpfunos', 'normal');
  }
  public function setupprov_zona_wpfunosMetaboxes(){
    add_meta_box('prov_zona_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'prov_zona_wpfunos_data_meta_box'), 'prov_zona_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'prov_zona_wpfunos', 'normal');
  }
  public function setupaseguradoras_wpfunosMetaboxes(){
    add_meta_box('aseguradoras_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'aseguradoras_wpfunos_data_meta_box'), 'aseguradoras_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'aseguradoras_wpfunos', 'normal');
  }
  public function setuptiposseguro_wpfunosMetaboxes(){
    add_meta_box('tipos_seguro_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'tipos_seguro_wpfunos_data_meta_box'), 'tipos_seguro_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'tipos_seguro_wpfunos', 'normal');
  }
  public function setupconfimgwpfunos_wpfunosMetaboxes(){
    add_meta_box('conf_img_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'conf_img_wpfunos_data_meta_box'), 'conf_img_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'conf_img_wpfunos', 'normal');
  }
  public function setupprecio_funer_wpfunosMetaboxes(){
    add_meta_box('precio_funer_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'precio_funer_wpfunos_data_meta_box'), 'precio_funer_wpfunos', 'normal', 'high' );
  }
  public function setupexcep_prov_wpfunosMetaboxes(){
    add_meta_box('excep_prov_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'excep_prov_wpfunos_data_meta_box'), 'excep_prov_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'excep_prov_wpfunos', 'normal');
  }
  public function setupprecio_serv_wpfunosMetaboxes(){
    add_meta_box('precio_serv_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'precio_serv_wpfunos_data_meta_box'), 'precio_serv_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'precio_serv_wpfunos', 'normal');
  }
  public function setupdist_local_wpfunosMetaboxes(){
    add_meta_box('dist_local_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'dist_local_wpfunos_data_meta_box'), 'dist_local_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'dist_local_wpfunos', 'normal');
  }

  public function setupdirectorio_servicioMetaboxes(){
    add_meta_box('directorio_servicio_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'directorio_servicio_data_meta_box'), 'directorio_servicio', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'directorio_servicio', 'normal');
  }
  public function setupdirectorio_entradaMetaboxes(){
    add_meta_box('directorio_entrada_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'directorio_entrada_data_meta_box'), 'directorio_entrada', 'normal', 'high' );
  }
  public function setupdirectorio_funerariaMetaboxes(){
    add_meta_box('directorio_funeraria_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'directorio_funeraria_data_meta_box'), 'directorio_funeraria', 'normal', 'high' );
  }
  public function setupdirectorio_defuncionMetaboxes(){
    add_meta_box('directorio_defuncion_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'directorio_defuncion_data_meta_box'), 'directorio_defuncion', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'directorio_defuncion', 'normal');
  }
  public function setupdirectorio_shortcodeMetaboxes(){
    add_meta_box('directorio_shortcode_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'directorio_shortcode_data_meta_box'), 'directorio_shortcode', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'directorio_shortcode', 'normal');
  }

  /*********************************/
  /*****  SALVAR DATOS META CPT ****/
  /*********************************/

  /**
  * Metabox Save fields
  */
  public function saveusuarios_wpfunosMetaBoxData( $post_id ){
    // Check if our nonce is set.
    if (! isset($_POST['wpfunos_usuarios_wpfunos_meta_box_nonce'])) return;
    // Verify that the nonce is valid.
    if (! wp_verify_nonce($_POST['wpfunos_usuarios_wpfunos_meta_box_nonce'], 'wpfunos_usuarios_wpfunos_meta_box')) return;
    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    // Check the user's permissions.
    if (! current_user_can('manage_options')) return;
    // Make sure that it is set.
    if (! isset($_POST['wpfunos_TimeStamp']) ) return;

    require_once 'partials/DB/wpfunos-admin-DB-usuarios-fields.php';
  }
  public function saveservicios_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_servicios_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_servicios_wpfunos_meta_box_nonce'], 'wpfunos_servicios_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-servicios-fields.php';
  }
  public function savecpostales_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_cpostales_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_cpostales_wpfunos_meta_box_nonce'], 'wpfunos_cpostales_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-cpostales-fields.php';
  }
  public function saveprovincias_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_provincias_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_provincias_wpfunos_meta_box_nonce'], 'wpfunos_provincias_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-provincias-fields.php';
  }
  public function saveprov_zona_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_prov_zona_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_prov_zona_wpfunos_meta_box_nonce'], 'wpfunos_prov_zona_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-prov-zona-fields.php';
  }
  public function saveaseguradoras_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_aseguradoras_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_aseguradoras_wpfunos_meta_box_nonce'], 'wpfunos_aseguradoras_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-aseguradoras-fields.php';
  }
  public function savetiposeguro_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_tipos_seguro_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_tipos_seguro_wpfunos_meta_box_nonce'], 'wpfunos_tipos_seguro_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-tipos-seguro-fields.php';
  }
  public function saveconfimgwpfunos_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_conf_img_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_conf_img_wpfunos_meta_box_nonce'], 'wpfunos_conf_img_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-conf-img-fields.php';
  }
  public function saveprecio_funer_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_precio_funer_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_precio_funer_wpfunos_meta_box_nonce'], 'wpfunos_precio_funer_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    //if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-precio-funer-fields.php';
  }
  public function saveexcep_prov_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_excep_prov_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_excep_prov_wpfunos_meta_box_nonce'], 'wpfunos_excep_prov_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-excep-prov-fields.php';
  }
  public function saveprecio_serv_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_precio_serv_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_precio_serv_wpfunos_meta_box_nonce'], 'wpfunos_precio_serv_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-precio-servicios-fields.php';
  }
  public function savedist_local_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_dist_local_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_dist_local_wpfunos_meta_box_nonce'], 'wpfunos_dist_local_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-dist-local-fields.php';
  }

  public function savedirectorio_servicioMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_directorio_servicio_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_directorio_servicio_meta_box_nonce'], 'wpfunos_directorio_servicio_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-directorio-servicio-fields.php';
  }
  public function savedirectorio_entradaMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_directorio_entrada_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_directorio_entrada_meta_box_nonce'], 'wpfunos_directorio_entrada_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-directorio-entrada-fields.php';
  }
  public function savedirectorio_funerariaMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_directorio_funeraria_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_directorio_funeraria_meta_box_nonce'], 'wpfunos_directorio_funeraria_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-directorio-funeraria-fields.php';
  }
  public function savedirectorio_defuncionMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_directorio_defuncion_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_directorio_defuncion_meta_box_nonce'], 'wpfunos_directorio_defuncion_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-directorio-defuncion-fields.php';
  }
  public function savedirectorio_shortcodeMetaBoxData( $post_id ){
    if (! isset($_POST['wpfunos_directorio_shortcode_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST['wpfunos_directorio_shortcode_meta_box_nonce'], 'wpfunos_directorio_shortcode_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/wpfunos-admin-DB-directorio-shortcode-fields.php';
  }
  /*********************************/
  /*****  CPT                 ******/
  /*********************************/
  /**
  * usuarios_wpfunos
  */
  public function usuarios_registrados_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-usuarios.php';
  }
  /**
  * servicios_wpfunos
  */
  public function servicios_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-servicios.php';
  }
  /**
  * cpostales_wpfunos
  */
  public function codigospostales_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-cpostales.php';
  }
  /**
  * provincias_wpfunos
  */
  public function provincias_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-provincias.php';
  }
  /**
  * prov_zona_wpfunos
  */
  public function prov_zona_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-prov-zona.php';
  }
  /**
  * aseguradoras_wpfunos
  */
  public function aseguradoras_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-aseguradoras.php';
  }
  /**
  * tipos_seguro_wpfunos
  */
  public function tipos_seguro_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-tipos-seguro.php';
  }
  /**
  * conf_img_wpfunos
  */
  public function config_imagenes_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-conf-img.php';
  }
  /**
  * Entrada Precios Poblacion  precio_funer_wpfunos
  */
  public function precios_poblacion_funeraria_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-precio-funer.php';
  }
  /**
  * Entrada busquedas en provincias e islas excep_prov_wpfunos
  */
  public function excepciones_provincias_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-excep-prov.php';
  }
  /**
  * precio_serv_wpfunos
  */
  public function precios_servicios_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-precio-serv.php';
  }
  /**
  * distancia búsqueda localidades: dist_local_wpfunos
  */
  public function dist_local_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-dist-local.php';
  }

  /**
  * Directorio tanatorio:
  */
  public function directorio_entrada_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-directorio-entrada.php';
  }
  /**
  * Directorio funeraria:
  */
  public function directorio_funeraria_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-directorio-funeraria.php';
  }
  /**
  * Directorio servicios:
  */
  public function directorio_servicios_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-directorio-servicios.php';
  }
  /**
  * Directorio defunciones:
  */
  public function directorio_defuncion_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-directorio-defunciones.php';
  }
  /**
  * Directorio shortcode:
  */
  public function directorio_shortcode_custom_post_type(){
    require_once 'partials/cpt/wpfunos-admin-cpt-directorio-shortcode.php';
  }
  /*********************************/
  /*****  MOSTRAR METABOXES   ******/
  /*********************************/

  /**
  * Add fields to Metabox
  */
  public function servicios_wpfunos_data_meta_box($post){
    wp_nonce_field( 'wpfunos_servicios_wpfunos_meta_box', 'wpfunos_servicios_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-servicios-display.php';
  }
  public function usuarios_wpfunos_data_meta_box($post){
    wp_nonce_field( 'wpfunos_usuarios_wpfunos_meta_box', 'wpfunos_usuarios_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-usuarios-display.php';
  }
  public function cpostales_wpfunos_data_meta_box($post){
    wp_nonce_field( 'wpfunos_cpostales_wpfunos_meta_box', 'wpfunos_cpostales_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-cpostales-display.php';
  }
  public function provincias_wpfunos_data_meta_box($post){
    wp_nonce_field( 'wpfunos_provincias_wpfunos_meta_box', 'wpfunos_provincias_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-provincias-display.php';
  }
  public function prov_zona_wpfunos_data_meta_box($post){
    wp_nonce_field( 'wpfunos_prov_zona_wpfunos_meta_box', 'wpfunos_prov_zona_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-prov-zona-display.php';
  }
  public function aseguradoras_wpfunos_data_meta_box($post){
    wp_nonce_field( 'wpfunos_aseguradoras_wpfunos_meta_box', 'wpfunos_aseguradoras_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-aseguradoras-display.php';
  }
  public function tipos_seguro_wpfunos_data_meta_box($post){
    wp_nonce_field( 'wpfunos_tipos_seguro_wpfunos_meta_box', 'wpfunos_tipos_seguro_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-tipos-seguro-display.php';
  }
  public function conf_img_wpfunos_data_meta_box($post){
    wp_nonce_field( 'wpfunos_conf_img_wpfunos_meta_box', 'wpfunos_conf_img_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-conf-img-display.php';
  }
  public function precio_funer_wpfunos_data_meta_box($post){
    wp_nonce_field( 'wpfunos_precio_funer_wpfunos_meta_box', 'wpfunos_precio_funer_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-precio-funer-display.php';
  }
  public function excep_prov_wpfunos_data_meta_box($post){
    wp_nonce_field( 'wpfunos_excep_prov_wpfunos_meta_box', 'wpfunos_excep_prov_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-excep-prov-display.php';
  }
  public function precio_serv_wpfunos_data_meta_box($post){
    wp_nonce_field( 'wpfunos_precio_serv_wpfunos_meta_box', 'wpfunos_precio_serv_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-precio-servicios-display.php';
  }
  public function dist_local_wpfunos_data_meta_box($post){
    wp_nonce_field( 'wpfunos_dist_local_wpfunos_meta_box', 'wpfunos_dist_local_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-dist-local-display.php';
  }

  public function directorio_servicio_data_meta_box($post){
    wp_nonce_field( 'wpfunos_directorio_servicio_meta_box', 'wpfunos_directorio_servicio_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-directorio-servicio-display.php';
  }
  public function directorio_entrada_data_meta_box($post){
    wp_nonce_field( 'wpfunos_directorio_entrada_meta_box', 'wpfunos_directorio_entrada_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-directorio-entrada-display.php';
  }
  public function directorio_funeraria_data_meta_box($post){
    wp_nonce_field( 'wpfunos_directorio_funeraria_meta_box', 'wpfunos_directorio_funeraria_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-directorio-funeraria-display.php';
  }
  public function directorio_defuncion_data_meta_box($post){
    wp_nonce_field( 'wpfunos_directorio_defuncion_meta_box', 'wpfunos_directorio_defuncion_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-directorio-defuncion-display.php';
  }
  public function directorio_shortcode_data_meta_box($post){
    wp_nonce_field( 'wpfunos_directorio_shortcode_meta_box', 'wpfunos_directorio_shortcode_meta_box_nonce' );
    require_once 'partials/DB/wpfunos-admin-DB-directorio-shortcode-display.php';
  }

  /*********************************/
  /*****  RENDERS             ******/
  /*********************************/

  /**
  * Custom Post Type Metabox Render fields.
  */
  public function wpfunos_render_settings_field($args)
  {
    if ($args['wp_data'] == 'option') {
      $wp_data_value = get_option($args['name']);
    } elseif ($args['wp_data'] == 'post_meta') {
      $wp_data_value = get_post_meta($args['post_id'], $args['name'], true);
    }

    switch ($args['type']) {
      case 'input':
      $value = ($args['value_type'] == 'serialized') ? serialize($wp_data_value) : $wp_data_value;
      if ($args['subtype'] != 'checkbox') {
        $prependStart = (isset($args['prepend_value'])) ? '<div class="input-prepend"> <span class="add-on">' . $args['prepend_value'] . '</span>' : '';
        $prependEnd = (isset($args['prepend_value'])) ? '</div>' : '';
        if ($args['id'] == 'wpfunos_DisplayListPageId') $prependEnd = ' ' . get_the_title($value) . '</div>';
        $step = (isset($args['step'])) ? 'step="' . $args['step'] . '"' : '';
        $min = (isset($args['min'])) ? 'min="' . $args['min'] . '"' : '';
        $max = (isset($args['max'])) ? 'max="' . $args['max'] . '"' : '';
        $size = (isset($args['size'])) ? 'size="' . $args['size'] . '"' : 'size="40"';

        $class = (isset($args['class'])) ? 'class="' . $args['class'] . '"' : '';
        $imagenid = (isset($args['imagenid'])) ? 'data-imagen-id="' . $args['imagenid'] . '"' : '';

        if (isset($args['disabled'])) {
          // hide the actual input bc if it was just a disabled input the informaiton saved in the database would be wrong - bc it would pass empty values and wipe the actual information
          echo $prependStart . '<input type="' . $args['subtype'] . '" '.$class. ' '.$imagenid. ' id="' . $args['id'] . '_disabled" ' . $step . ' ' . $max . ' ' . $min . ' name="' . $args['name'] . '_disabled" ' . $size . ' disabled value="' . esc_attr($value) . '" /><input type="hidden" id="' . $args['id'] . '" ' . $step . ' ' . $max . ' ' . $min . ' name="' . $args['name'] . '" size="40" value="' . esc_attr($value) . '" />' . $prependEnd;
        } else {
          echo $prependStart . '<input type="' . $args['subtype'] . '" '.$class. ' '.$imagenid. ' id="' . $args['id'] . '" "' . $args['required'] . '" ' . $step . ' ' . $max . ' ' . $min . ' name="' . $args['name'] . '" ' . $size . ' value="' . esc_attr($value) . '" />' . $prependEnd;
        }
        /* <input required="required" '.$disabled.' type="number" step="any" id="'.'wpfunos_cost2" name="'.'wpfunos_cost2" value="' . esc_attr( $cost ) . '" size="25" /><input type="hidden" id="'.'wpfunos_cost" step="any" name="'.'wpfunos_cost" value="' . esc_attr( $cost ) . '" /> */
      } else {
        $checked = ($value) ? 'checked' : '';
        ?>
        <input type="<?php esc_html_e( $args['subtype'] ); ?>"
        id="<?php esc_html_e( $args['id'] ); ?>"
        <?php esc_html_e( $args['required'] ); ?>
        name="<?php esc_html_e( $args['name'] ); ?>" size="40" value="1"
        <?php esc_html_e( $checked ); ?> /><?php
      }
      break;
      default:
      break;
    }
  }

  /**
  * Metabox wp editor
  */
  public function wpfunos_intro_render( $args ){
    $content   = get_option( $args['content_id']  );
    $editor_id = $args['content_id'] ;
    $settings  = array('wpautop' => false,);
    wp_editor( $content, $editor_id, $settings );
  }

  /*********************************/
  /*****  HOJAS DE CALCULO    ******/
  /*********************************/
  /**
  * add_action( 'wpfunos_hojas_calculo', array( $this, 'wpfunosHojasCalculo' ), 10, 1 );
  */

  public function wpfunosHojasCalculo(){
    include 'partials/wpfunos-admin-hojas-calculo.php';
  }

  /** **/
  /** **/
  /** **/

  /*********************************/
  /*****  UTILIDADES          ******/
  /*********************************/
  /**
  * Utility: log files.
  */
  public function logFiles()
  {
    $upload_dir = wp_upload_dir();
    $files = scandir( $upload_dir['basedir'] . '/' . 'wpfunos-logs');
    ?>
    <form action="" method="post">
      <ul>
        <?php foreach ( $files as $file ) { ?>
          <?php if( substr( $file , -4) == '.log'){?>
            <li><input type="radio" id="age[]" name="logfile" value="<?php esc_html_e( $file ); ?>">
              <?php esc_html_e( $file . ' -> ' . date("d-m-Y H:i:s", filemtime( $upload_dir['basedir'] . '/' . 'wpfunos-logs/' . $file  ) ) ); ?>
            </li>
          <?php }?>
        <?php }?>
      </ul>
      <div class="wpfunos-send-logfile">
        <input type="submit" value="<?php _e( 'Ver archivo de registro', 'wpfunos' ); ?>">
      </div>
    </form>
    <?php
  }
  /**
  * Utility: show log file.
  */
  public function showLogFile()
  {
    $upload_dir = wp_upload_dir();
    if (isset($_POST['logfile'])) {
      ?>
      <hr />
      <h3><?php esc_html_e( $_POST['logfile'] ); ?> </h3>
      <textarea id="wpfunoslogfile" name="wpfunoslogfile" rows="30" cols="180" readonly>
        <?php esc_html_e( ( file_get_contents( $upload_dir['basedir'] . '/' . 'wpfunos-logs/' . $_POST['logfile'] ) ) ); ?>
      </textarea>
      <?php
    }
  }
  /**
  * Utility: create entry in the log file.
  */
  private function custom_logs($message){
    $upload_dir = wp_upload_dir();
    if (is_array($message)) {
      $message = json_encode($message);
    }
    if (!file_exists( $upload_dir['basedir'] . '/wpfunos-logs') ) {
      mkdir( $upload_dir['basedir'] . '/wpfunos-logs' );
    }
    $time = current_time("d-M-Y H:i:s:v");
    $ban = "#$time: $message\r\n";
    $file = $upload_dir['basedir'] . '/wpfunos-logs/wpfunos-adminlog-' . current_time("Y-m-d") . '.log';
    $open = fopen($file, "a");
    fputs($open, $ban);
    fclose( $open );
  }
  /**
  * Utility: create entry in the log file.
  */
  private function import_logs($message){
    $upload_dir = wp_upload_dir();
    if (is_array($message)) {
      $message = json_encode($message);
    }
    if (!file_exists( $upload_dir['basedir'] . '/wpfunos-logs') ) {
      mkdir( $upload_dir['basedir'] . '/wpfunos-logs' );
    }
    $time = current_time("d-M-Y H:i:s:v");
    $ban = "#$time: $message\r\n";
    $file = $upload_dir['basedir'] . '/wpfunos-logs/wpfunos-importlog-' . current_time("Y-m-d") . '.log';
    $open = fopen($file, "a");
    fputs($open, $ban);
    fclose( $open );
  }
  /**
  * GZIPs a file on disk (appending .gz to the name)
  *
  * From http://stackoverflow.com/questions/6073397/how-do-you-create-a-gz-file-using-php
  * Based on function by Kioob at:
  * http://www.php.net/manual/en/function.gzwrite.php#34955
  *
  * @param string $source Path to file that should be compressed
  * @param integer $level GZIP compression level (default: 9)
  * @return string New filename (with .gz appended) if success, or false if operation fails
  */
  public function gzCompressFile($source, $level = 9){
    $dest = $source . '.gz';
    $mode = 'wb' . $level;
    $error = false;
    if ($fp_out = gzopen($dest, $mode)) {
      if ($fp_in = fopen($source,'rb')) {
        while (!feof($fp_in))
        gzwrite($fp_out, fread($fp_in, 1024 * 512));
        fclose($fp_in);
      } else {
        $error = true;
      }
      gzclose($fp_out);
    } else {
      $error = true;
    }
    if ($error)
    return false;
    else
    return $dest;
  }

  /**
  * Utility: create entry in the log file.
  * <input type="hidden" name="actualizargmw" id="actualizargmw" value="1" >
  */
  public function wpfunosActualizargmw(){
    if( isset( $_POST['actualizargmw'] ) ) {
      $args = array(
        'post_type' => 'tanatorio_d_wpfunos',
        'posts_per_page' => -1,
        'order' => 'ASC',
      );
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) :
        $loop->the_post();
        echo get_the_ID().', ';
        $this->gmw_update_post_type_post_location( get_the_ID() );
      endwhile;
      wp_reset_postdata();
    }
  }

  /**
  * Utility: Update gmw map address
  */
  public function gmw_update_post_type_post_location(  $post_id ) {
    // Return if it's a post revision.
    if ( false !== wp_is_post_revision( $post_id ) ) {
      return;
    }
    // check autosave.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
    }
    // check if user can edit post.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
      return;
    }
    // get the address from the custom field "address".
    //
    // _tanatorioDirectorioDireccion
    $address = get_post_meta( $post_id, 'wpfunos_tanatorioDirectorioDireccion', true );
    if( strlen( $address) < 5 )$address = get_post_meta( $post_id, 'wpfunos_tanatorioDirectorioPoblacion', true );
    // varify that address exists.
    if ( empty( $address ) ) {
      return;
    }
    // verify the updater function.
    if ( ! function_exists( 'gmw_update_post_location' ) ) {
      return;
    }
    //run the udpate location function
    gmw_update_post_location( $post_id, $address );
  }

  /*
  * add_action('wpfunos_enalces_landings', array( $this, 'wpfunosEnlacesLandings' ), 10, 1);
  * do_action('wpfunos_enlaces_landings', array( $prefijo, $provincia, $distancia, $latitud, $longitud, $poblacion, $wpml_id ) );
  */
  public function wpfunosEnlacesLandings( $vars ){
    $prefijo = $vars[0];
    $provincia = $vars[1];
    $distancia = $vars[2];
    $latitud = $vars[3];
    $longitud = $vars[4];
    $poblacion = $vars[5];
    $wpml_id = $vars[6];
    // recalcular enlaces
    update_post_meta($wpml_id, 'wpfunos_precioFunerariaEnlaceAhora', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&poblacion='.$poblacion);
    update_post_meta($wpml_id, 'wpfunos_precioFunerariaEnlaceProximamente', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Proximamente&poblacion='.$poblacion);
    update_post_meta($wpml_id, 'wpfunos_precioFunerariaEnlaceVerPrecios', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&poblacion='.$poblacion);

    update_post_meta($wpml_id, 'wpfunos_precioIncineracionEnlaceAhora', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&poblacion='.$poblacion);
    update_post_meta($wpml_id, 'wpfunos_precioIncineracionEnlaceProximamente', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Proximamente&poblacion='.$poblacion);
    update_post_meta($wpml_id, 'wpfunos_precioIncineracionEnlaceVerPrecios', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&poblacion='.$poblacion);

    update_post_meta($wpml_id, 'wpfunos_precioFunerariaEntierroDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=1&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
    update_post_meta($wpml_id, 'wpfunos_precioFunerariaEntierroVelatorioDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=1&cf[resp4]=1&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
    update_post_meta($wpml_id, 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
    update_post_meta($wpml_id, 'wpfunos_precioFunerariaEntierroPremiumDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=3&cf[resp3]=1&cf[resp4]=3&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);

    update_post_meta($wpml_id, 'wpfunos_precioFunerariaIncineracionDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=1&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
    update_post_meta($wpml_id, 'wpfunos_precioFunerariaIncineracionVelatorioDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=1&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
    update_post_meta($wpml_id, 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
    update_post_meta($wpml_id, 'wpfunos_precioFunerariaIncineracionPremiumDesdeEnlace', home_url().'/'.$prefijo.'comparar-precios-resultados?address[]='.$provincia
    .'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=3&cf[resp3]=1&cf[resp4]=3&distance='.$distancia
    .'&units=metric&paged=1&per_page=50&lat='.$latitud
    .'&lng='.$longitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1&poblacion='.$poblacion);
  }


}
