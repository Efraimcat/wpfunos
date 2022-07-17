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
    add_action('init', array( $this, 'entrada_servicios_custom_post_type' ));
    add_action('init', array( $this, 'funerarias_custom_post_type' ));
    add_action('init', array( $this, 'config_imagenes_custom_post_type' ));
    add_action('init', array( $this, 'servicios_custom_post_type' ));
    add_action('init', array( $this, 'directorio_tanatorio_custom_post_type' ));
    add_action('init', array( $this, 'tipos_seguro_custom_post_type' ));
    add_action('init', array( $this, 'entrada_ubicaciones_custom_post_type' ));
    add_action('init', array( $this, 'entrada_ubicaciones_aseguradoras_custom_post_type' ));
    add_action('init', array( $this, 'usuarios_registrados_custom_post_type' ));
    add_action('init', array( $this, 'entrada_aseguradoras_custom_post_type' ));
    add_action('init', array( $this, 'precios_poblacion_funeraria_custom_post_type' ));
    add_action('init', array( $this, 'excepciones_provincias_custom_post_type' ));
    add_action('init', array( $this, 'precios_servicios_custom_post_type' ));
    add_action('admin_menu', array( $this, 'addPluginAdminMenu' ), 9);
    add_action('admin_init', array( $this, 'registerAndBuildFields' ));						// Compara Debug
    add_action('admin_init', array( $this, 'registerAndBuildFieldsConfImagenes' ));			// Compara Configuracciín Imágenes
    add_action('admin_init', array( $this, 'registerAndBuildFieldsAseguradoras' ));			// Compara Debug
    add_action('admin_init', array( $this, 'registerAndBuildFieldsPagina' ));				// Página inicial
    add_action('admin_init', array( $this, 'registerAndBuildFieldsDatos' ));				// Compara Datos
    add_action('admin_init', array( $this, 'registerAndBuildFieldsResultados' )); 			// Compara Resultados cabecera y Pie
    add_action('admin_init', array( $this, 'registerAndBuildFieldsConfirmado' )); 			// Compara Resultados Confirmado superior e inferior
    add_action('admin_init', array( $this, 'registerAndBuildFieldsConfirmadoDescuento' ));	// Compara Resultados confirmado Descuento superior e inferior
    add_action('admin_init', array( $this, 'registerAndBuildFieldsSinConfirmar' ));			// Compara Resultados Sin Confirmar superior e inferior
    add_action('admin_init', array( $this, 'registerAndBuildFieldsSinPrecio' ));			// Compara Resultados Sin Precio superior e inferior
    add_action('admin_init', array( $this, 'registerAndBuildMailInicial' ));		//Inicio
    add_action('admin_init', array( $this, 'registerAndBuildMailDatosUsuario' ));		//Inicio
    add_action('admin_init', array( $this, 'registerAndBuildMailPopupUsuario' ));		//Inicio
    add_action('admin_init', array( $this, 'registerAndBuildMail' ));		//Boton 1 Admin
    add_action('admin_init', array( $this, 'registerAndBuildMail2' ));		//Boton 2 Admin
    add_action('admin_init', array( $this, 'registerAndBuildMail3' ));		//Botón "Que me llamen"
    add_action('admin_init', array( $this, 'registerAndBuildMail10' ));		//Correo Botón "Que me llamen" aseguradora
    add_action('admin_init', array( $this, 'registerAndBuildMail4' ));		//Botón "Llamar"
    add_action('admin_init', array( $this, 'registerAndBuildMail11' ));		//Correo Botón "Llamar" aseguradora
    add_action('admin_init', array( $this, 'registerAndBuildMail5' ));		//Datos usuario enviados servicios
    add_action('admin_init', array( $this, 'registerAndBuildMail12' ));		//Datos usuario enviados aseguradora
    add_action('admin_init', array( $this, 'registerAndBuildMail6' ));		//Correo popup detalles servicios
    add_action('admin_init', array( $this, 'registerAndBuildMail13' ));		//Correo popup detalles aseguradora
    add_action('admin_init', array( $this, 'registerAndBuildMail7' ));		//Correo envios colaboradores servicios
    add_action('admin_init', array( $this, 'registerAndBuildMail8' ));		//Correo pedir presupuesto servicios
    add_action('admin_init', array( $this, 'registerAndBuildMail9' ));		//Correo pedir presupuesto aseguradora
    add_action('admin_init', array( $this, 'registerAndBuildCorreoAPIPreventiva' ));

    add_action('admin_init', array( $this, 'registerAndBuildV2Mail1' ));		//Correo al administrador nuevos datos usuario
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail2' ));		//Correo al administrador botón "Quiero que me llamen"
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail3' ));		//Correo al administrador botón "Llamar"
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail4' ));		//Correo lead botón "Quiero que me llamen"
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail5' ));		//Correo lead botón "Llamar"
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail6' ));		//Correo al administrador pedir presupuesto
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail7' ));		//Correo lead pedir presupuesto
    add_action('admin_init', array( $this, 'registerAndBuildV2Mail8' ));		//Correo usuario copia detalles

    add_action('admin_init', array( $this, 'registerAndBuildAPIPreventiva' ));
    add_action('admin_init', array( $this, 'registerAndBuildAPIDKV' ));
    add_action('admin_init', array( $this, 'registerAndBuildFieldsDireccionesIP' ));
    add_action('admin_init', array( $this, 'registerAndBuildFieldsDirectorio' ));
    add_action('admin_init', array( $this, 'registerAndBuildFieldsPreciosPoblacion' ));
    add_action('add_meta_boxes_usuarios_wpfunos', array( $this, 'setupusuarios_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_funerarias_wpfunos', array( $this, 'setupfunerarias_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_servicios_wpfunos', array( $this, 'setupservicios_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_cpostales_wpfunos', array( $this, 'setupcpostales_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_provincias_wpfunos', array( $this, 'setupprovincias_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_prov_zona_wpfunos', array( $this, 'setupprov_zona_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_aseguradoras_wpfunos', array( $this, 'setupaseguradoras_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_tipos_seguro_wpfunos', array( $this, 'setuptiposseguro_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_tanatorio_d_wpfunos', array( $this, 'setuptanatoriodirectorio_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_conf_img_wpfunos', array( $this, 'setupconfimgwpfunos_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_ubicaciones_wpfunos', array( $this, 'setupubicaciones_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_ubic_aseg_wpfunos', array( $this, 'setupubic_aseg_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_pag_serv_wpfunos', array( $this, 'setuppag_serv_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_pag_aseg_wpfunos', array( $this, 'setuppag_aseg_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_precio_funer_wpfunos', array( $this, 'setupprecio_funer_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_excep_prov_wpfunos', array( $this, 'setupexcep_prov_wpfunosMetaboxes' ));
    add_action('add_meta_boxes_precio_serv_wpfunos', array( $this, 'setupprecio_serv_wpfunosMetaboxes' ));
    add_action('save_post_usuarios_wpfunos', array( $this, 'saveusuarios_wpfunosMetaBoxData' ));
    add_action('save_post_funerarias_wpfunos', array( $this, 'savefunerarias_wpfunosMetaBoxData' ));
    add_action('save_post_servicios_wpfunos', array( $this, 'saveservicios_wpfunosMetaBoxData' ));
    add_action('save_post_cpostales_wpfunos', array( $this, 'savecpostales_wpfunosMetaBoxData' ));
    add_action('save_post_provincias_wpfunos', array( $this, 'saveprovincias_wpfunosMetaBoxData' ));
    add_action('save_post_prov_zona_wpfunos', array( $this, 'saveprov_zona_wpfunosMetaBoxData' ));
    add_action('save_post_aseguradoras_wpfunos', array( $this, 'saveaseguradoras_wpfunosMetaBoxData' ));
    add_action('save_post_tipos_seguro_wpfunos', array( $this, 'savetiposeguro_wpfunosMetaBoxData' ));
    add_action('save_post_tanatorio_d_wpfunos', array( $this, 'savetanatoriodirectorio_wpfunosMetaBoxData' ));
    add_action('save_post_conf_img_wpfunos', array( $this, 'saveconfimgwpfunos_wpfunosMetaBoxData' ));
    add_action('save_post_ubicaciones_wpfunos', array( $this, 'saveubicaciones_wpfunosMetaBoxData' ));
    add_action('save_post_ubic_aseg_wpfunos', array( $this, 'saveubic_aseg_wpfunosMetaBoxData' ));
    add_action('save_post_pag_serv_wpfunos', array( $this, 'savepag_serv_wpfunosMetaBoxData' ));
    add_action('save_post_pag_aseg_wpfunos', array( $this, 'savepag_aseg_wpfunosMetaBoxData' ));
    add_action('save_post_precio_funer_wpfunos', array( $this, 'saveprecio_funer_wpfunosMetaBoxData' ));
    add_action('save_post_excep_prov_wpfunos', array( $this, 'saveexcep_prov_wpfunosMetaBoxData' ));
    add_action('save_post_precio_serv_wpfunos', array( $this, 'saveprecio_serv_wpfunosMetaBoxData' ));
  }
  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-admin.css', array(), $this->version, 'all' );
  }
  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-admin.js', array( 'jquery' ), $this->version, false );
  }

  /*********************************/
  /*****  CRON                ******/
  /*********************************/

  /**
  * Register the Cron Job.
  */
  public function wpfunosCron() {
    $this->wpfunosMaintenance();
  }
  /**
  * Register the Cron Job.
  */
  public function wpfunosHourlyCron() {
    $this->wpfunosHourlyMaintenance();
  }

  /**
  * Register the Cron Job Schedule.
  */
  public function wpfunos_cron_schedules( $schedules ) {
    if (!isset ($schedules["wpfunosCronSchedule"]) ){
      $schedules["wpfunosCronSchedule"] = array(
        'interval' => 43200,
        'display' => esc_html__('daily'),
      );
    }
    if (!isset ($schedules["wpfunosCronHourlySchedule"]) ){
      $schedules["wpfunosCronHourlySchedule"] = array(
        'interval' => 3600,
        'display' => esc_html__('funoshourly'),
      );
    }
    return $schedules;
  }

  /*********************************/
  /*****  SHORTCODES          ******/
  /*********************************/


  /*********************************/
  /*****  MENUS               ******/
  /*********************************/

  /**
  * Admin menu.
  */
  public function addPluginAdminMenu() {
    //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page( 'WpFunos', 'WpFunos', 'administrator', $this->plugin_name, array( $this, 'display_plugin_admin_dashboard' ), plugin_dir_url(dirname(__FILE__)) . 'admin/img/funos-logo-01.png', 26 );
    add_menu_page( 'WpFunos Config', 'WpFunos Config', 'administrator', $this->plugin_name.'config', array( $this, 'display_plugin_admin_config_dashboard' ), plugin_dir_url(dirname(__FILE__)) . 'admin/img/funos-logo-01.png', 26 );
    add_menu_page( 'WpFunos Directorio', 'WpFunos Directorio', 'administrator', $this->plugin_name.'directorio', array( $this, 'display_plugin_admin_directorio_dashboard' ), plugin_dir_url(dirname(__FILE__)) . 'admin/img/funos-logo-01.png', 26 );
    add_menu_page( 'WpFunos Precios Población', 'WpFunos Precios Población', 'administrator', $this->plugin_name.'precios_poblacion', array( $this, 'display_plugin_admin_precios_poblacion_dashboard' ), plugin_dir_url(dirname(__FILE__)) . 'admin/img/funos-logo-01.png', 26 );
    add_menu_page( 'WpFunos Import', 'WpFunos Import', 'administrator', $this->plugin_name.'import', array( $this, 'display_plugin_admin_import_dashboard' ), plugin_dir_url(dirname(__FILE__)) . 'admin/img/funos-logo-01.png', 26 );
    // add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null )
    add_submenu_page( $this->plugin_name.'config', esc_html__('Configuración servicios WpFunos', 'wpfunos'), esc_html__('Configuración servicios', 'wpfunos'), 'administrator', $this->plugin_name . '-settings', array( $this, 'displayPluginAdminSettings' ));
    add_submenu_page( $this->plugin_name.'config', esc_html__('Configuración aseguradoras WpFunos', 'wpfunos'), esc_html__('Configuración aseguradoras', 'wpfunos'), 'administrator', $this->plugin_name . '-aseguradoras', array( $this, 'displayPluginAdminAseguradoras' ));
    add_submenu_page( $this->plugin_name.'config', esc_html__('Configuración correo WpFunos', 'wpfunos'), esc_html__('Configuración correo', 'wpfunos'), 'administrator', $this->plugin_name . '-mail', array( $this, 'displayPluginAdminMail' ));
    add_submenu_page( $this->plugin_name.'config', esc_html__('Configuración API Preventiva WpFunos', 'wpfunos'), esc_html__('Configuración API Preventiva', 'wpfunos'), 'administrator', $this->plugin_name . '-APIPreventiva', array( $this, 'displayPluginAdminAPIPreventiva' ));
    add_submenu_page( $this->plugin_name.'config', esc_html__('Configuración API DKV WpFunos', 'wpfunos'), esc_html__('Configuración API DKV', 'wpfunos'), 'administrator', $this->plugin_name . '-APIDKV', array( $this, 'displayPluginAdminAPIDKV' ));
    add_submenu_page( $this->plugin_name.'config', esc_html__('Configuración Direcciones IP WpFunos', 'wpfunos'), esc_html__('Configuración Direcciones IP', 'wpfunos'), 'administrator', $this->plugin_name . '-direccionesIP', array( $this, 'displayPluginAdminDireccionesIP' ));
    if(get_option($this->plugin_name . '_Debug')){
      add_submenu_page( $this->plugin_name.'config' , esc_html__('Logs WpFunos', 'wpfunos'), esc_html__('Logs', 'wpfunos'), 'administrator', $this->plugin_name . '-logs', array( $this, 'displayPluginAdminLogs' ));
    }
    add_submenu_page( $this->plugin_name.'directorio', esc_html__('Configuración directorio WpFunos', 'wpfunos'), esc_html__('Configuración del directorio', 'wpfunos'), 'administrator', $this->plugin_name . '-settingsdirectorio', array( $this, 'displayDirectorionSettings' ));
    add_submenu_page( $this->plugin_name.'precios_poblacion', esc_html__('Configuración precios población WpFunos', 'wpfunos'), esc_html__('Configuración precios población', 'wpfunos'), 'administrator', $this->plugin_name . '-settingspreciospoblacion', array( $this, 'displayPreciosPoblacionSettings' ));
  }

  /**
  * Admin menu display.
  */
  public function display_plugin_admin_dashboard(){
    require_once 'partials/' . $this->plugin_name . '-admin-display.php';
  }
  public function display_plugin_admin_config_dashboard(){
    require_once 'partials/' . $this->plugin_name . '-admin-config-display.php';
  }
  public function display_plugin_admin_directorio_dashboard(){
    require_once 'partials/' . $this->plugin_name . '-admin-directorio-display.php';
  }
  public function display_plugin_admin_precios_poblacion_dashboard(){
    require_once 'partials/' . $this->plugin_name . '-admin-precios-poblacion-display.php';
  }
  public function display_plugin_admin_import_dashboard(){
    require_once 'partials/' . $this->plugin_name . '-admin-import-display.php';
  }

  /**
  * Settings menu display.
  */
  public function displayPluginAdminSettings() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/' . $this->plugin_name . '-admin-settings-display.php';
  }
  /**
  * Aseguradoras menu display.
  */
  public function displayPluginAdminAseguradoras() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/' . $this->plugin_name . '-admin-aseguradoras-display.php';
  }

  /**
  * Mail menu display.
  */
  public function displayPluginAdminMail() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/' . $this->plugin_name . '-admin-mail-display.php';
  }
  /**
  * Api Preventiva menu display.
  */
  public function displayPluginAdminAPIPreventiva() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/' . $this->plugin_name . '-admin-APIPreventiva-display.php';
  }
  /**
  * Api DKV menu display.
  */
  public function displayPluginAdminAPIDKV() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/' . $this->plugin_name . '-admin-APIDKV-display.php';
  }
  /**
  * Direcciones IP reservadas.
  */
  public function displayPluginAdminDireccionesIP() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/' . $this->plugin_name . '-admin-direccionesIP-display.php';
  }

  /**
  * Logs menu display.
  */
  public function displayPluginAdminLogs(){
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array( $this, 'wpfunosSettingsMessages' ));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/' . $this->plugin_name . '-admin-logs-display.php';
  }

  /**
  * Directorio menu display.
  */
  public function displayDirectorionSettings() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/' . $this->plugin_name . '-admin-directorio-settings-display.php';
  }

  /**
  * Precios población menu display.
  */
  public function displayPreciosPoblacionSettings() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }
    require_once 'partials/' . $this->plugin_name . '-admin-precios-poblacion-settings-display.php';
  }

  /*********************************/
  /*****  REGISTRAR CAMPOS    ******/
  /*********************************/

  /**
  * Registro de campos registros de wordpress
  */
  public function registerAndBuildFields() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildFields.php';
  }
  public function registerAndBuildFieldsConfImagenes() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildFieldsConfImagenes.php';
  }
  public function registerAndBuildFieldsAseguradoras() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildAseguradoras.php';
  }
  public function registerAndBuildFieldsPagina() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildPagina.php';
  }
  public function registerAndBuildMailInicial() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMailInicial.php';
  }
  public function registerAndBuildMailDatosUsuario() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMailDatosUsuario.php';
  }
  public function registerAndBuildMailPopupUsuario() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMailPopupUsuario.php';
  }
  public function registerAndBuildMail() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail.php';
  }
  public function registerAndBuildMail2() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail2.php';
  }
  public function registerAndBuildMail3() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail3.php';
  }
  public function registerAndBuildMail4() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail4.php';
  }
  public function registerAndBuildMail5() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail5.php';
  }
  public function registerAndBuildMail6() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail6.php';
  }
  public function registerAndBuildMail7() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail7.php';
  }
  public function registerAndBuildMail8() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail8.php';
  }
  public function registerAndBuildMail9() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail9.php';
  }
  public function registerAndBuildMail10() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail10.php';
  }
  public function registerAndBuildMail11() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail11.php';
  }
  public function registerAndBuildMail12() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail12.php';
  }
  public function registerAndBuildMail13() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMail13.php';
  }
  public function registerAndBuildAPIPreventiva() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildAPIPreventiva.php';
  }
  public function registerAndBuildAPIDKV() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildAPIDKV.php';
  }
  public function registerAndBuildCorreoAPIPreventiva() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMailPreventiva.php';
  }
  public function registerAndBuildFieldsDireccionesIP() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildFieldsDireccionesIP.php';
  }
  public function registerAndBuildFieldsDatos() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildFieldsDatos.php';
  }
  public function registerAndBuildFieldsResultados() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildFieldsResultados.php';
  }
  public function registerAndBuildFieldsConfirmado() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildFieldsConfirmado.php';
  }
  public function registerAndBuildFieldsConfirmadoDescuento() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildFieldsConfirmadoDescuento.php';
  }
  public function registerAndBuildFieldsSinConfirmar() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildFieldsSinConfirmar.php';
  }
  public function registerAndBuildFieldsSinPrecio() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildFieldsSinPrecio.php';
  }
  public function registerAndBuildFieldsDirectorio() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildFieldsDirectorio.php';
  }
  public function registerAndBuildFieldsPreciosPoblacion() {
    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildFieldsPreciosPoblacion.php';
  }

  public function registerAndBuildV2Mail1() {
    require_once 'partials/registerAndBuild/V2/' . $this->plugin_name . '-admin-registerAndBuildV2Mail1.php';
  }
  public function registerAndBuildV2Mail2() {
    require_once 'partials/registerAndBuild/V2/' . $this->plugin_name . '-admin-registerAndBuildV2Mail2.php';
  }
  public function registerAndBuildV2Mail3() {
    require_once 'partials/registerAndBuild/V2/' . $this->plugin_name . '-admin-registerAndBuildV2Mail3.php';
  }
  public function registerAndBuildV2Mail4() {
    require_once 'partials/registerAndBuild/V2/' . $this->plugin_name . '-admin-registerAndBuildV2Mail4.php';
  }
  public function registerAndBuildV2Mail5() {
    require_once 'partials/registerAndBuild/V2/' . $this->plugin_name . '-admin-registerAndBuildV2Mail5.php';
  }
  public function registerAndBuildV2Mail6() {
    require_once 'partials/registerAndBuild/V2/' . $this->plugin_name . '-admin-registerAndBuildV2Mail6.php';
  }
  public function registerAndBuildV2Mail7() {
    require_once 'partials/registerAndBuild/V2/' . $this->plugin_name . '-admin-registerAndBuildV2Mail7.php';
  }
  public function registerAndBuildV2Mail8() {
    require_once 'partials/registerAndBuild/V2/' . $this->plugin_name . '-admin-registerAndBuildV2Mail8.php';
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
    <p>[nombreServicio], [telefono], [telefonoUsuario], [telefonoServicio], [precio], [nombreUsuario], [referencia], [Email], [CPUsuario], [ubicacion]</p>
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
    <p>==POR DEFINIR==</p>
    <p>[referencia], [IP], [Email], [Nombre], [Telefono], [address], [CP], [edad], [sexo], [any], [seguro], [URL] [MensajePopup]</p>
    <p>[aseguradoraNombre], [aseguradoraDireccion], [aseguradoraCorreo], [aseguradoraTelefono], [aseguradoraTipoSeguro]</p>
    <p>==POR DEFINIR==</p>
    <hr />
    <?php
  }
  public function wpfunos_display_mail_account_v2() {
    ?>
    <hr/>
    <li><a href="#wpfunos-inicio">Ir al inicio de la página</a></li>
    <hr/>
    <p><strong><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes variables:', 'wpfunos'); ?></strong></p>
    <p>[nombreServicio], [nombreUsuario], [telefonoServicio], [telefonoUsuario], [email], [CP], [poblacion], [referencia]</p>
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
    <p>[nombreServicio], [nombreUsuario], [telefonoServicio], [telefonoUsuario], [email], [CP], [poblacion], [referencia]</p>
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
    /* add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null ) */
    add_meta_box('usuarios_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'usuarios_wpfunos_data_meta_box'), 'usuarios_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'usuarios_wpfunos', 'normal');
  }
  public function setupfunerarias_wpfunosMetaboxes(){
    add_meta_box('funerarias_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'funerarias_wpfunos_data_meta_box'), 'funerarias_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'funerarias_wpfunos', 'normal');
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
  public function setuptanatoriodirectorio_wpfunosMetaboxes(){
    add_meta_box('tanatorio_d_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'tanatorio_directorio_wpfunos_data_meta_box'), 'tanatorio_d_wpfunos', 'normal', 'high' );
  }
  public function setupconfimgwpfunos_wpfunosMetaboxes(){
    add_meta_box('conf_img_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'conf_img_wpfunos_data_meta_box'), 'conf_img_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'conf_img_wpfunos', 'normal');
  }
  public function setupubicaciones_wpfunosMetaboxes(){
    add_meta_box('ubicaciones_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'ubicaciones_wpfunos_data_meta_box'), 'ubicaciones_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'ubicaciones_wpfunos', 'normal');
  }
  public function setupubic_aseg_wpfunosMetaboxes(){
    add_meta_box('ubic_aseg_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'ubic_aseg_wpfunos_data_meta_box'), 'ubic_aseg_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'ubic_aseg_wpfunos', 'normal');
  }
  public function setuppag_serv_wpfunosMetaboxes(){
    add_meta_box('pag_serv_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'pag_serv_wpfunos_data_meta_box'), 'pag_serv_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'pag_serv_wpfunos', 'normal');
  }
  public function setuppag_aseg_wpfunosMetaboxes(){
    add_meta_box('pag_aseg_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'pag_aseg_wpfunos_data_meta_box'), 'pag_aseg_wpfunos', 'normal', 'high' );
    remove_meta_box('wpseo_meta', 'pag_aseg_wpfunos', 'normal');
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

  /*********************************/
  /*****  SALVAR DATOS META CPT ****/
  /*********************************/

  /**
  * Metabox Save fields
  */
  public function saveusuarios_wpfunosMetaBoxData( $post_id ){
    // Check if our nonce is set.
    if (! isset($_POST[$this->plugin_name . '_usuarios_wpfunos_meta_box_nonce'])) return;
    // Verify that the nonce is valid.
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_usuarios_wpfunos_meta_box_nonce'], $this->plugin_name . '_usuarios_wpfunos_meta_box')) return;
    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    // Check the user's permissions.
    if (! current_user_can('manage_options')) return;
    // Make sure that it is set.
    if (! isset($_POST[$this->plugin_name . '_TimeStamp']) ) return;

    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-usuarios-fields.php';
  }
  public function savefunerarias_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_funerarias_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_funerarias_wpfunos_meta_box_nonce'], $this->plugin_name . '_funerarias_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-funerarias-fields.php';
  }
  public function saveservicios_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_servicios_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_servicios_wpfunos_meta_box_nonce'], $this->plugin_name . '_servicios_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-servicios-fields.php';
  }
  public function savecpostales_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_cpostales_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_cpostales_wpfunos_meta_box_nonce'], $this->plugin_name . '_cpostales_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-cpostales-fields.php';
  }
  public function saveprovincias_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_provincias_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_provincias_wpfunos_meta_box_nonce'], $this->plugin_name . '_provincias_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-provincias-fields.php';
  }
  public function saveprov_zona_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_prov_zona_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_prov_zona_wpfunos_meta_box_nonce'], $this->plugin_name . '_prov_zona_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-prov-zona-fields.php';
  }
  public function saveaseguradoras_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_aseguradoras_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_aseguradoras_wpfunos_meta_box_nonce'], $this->plugin_name . '_aseguradoras_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-aseguradoras-fields.php';
  }
  public function savetiposeguro_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_tipos_seguro_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_tipos_seguro_wpfunos_meta_box_nonce'], $this->plugin_name . '_tipos_seguro_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-tipos-seguro-fields.php';
  }
  public function savetanatoriodirectorio_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_tanatorio_directorio_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_tanatorio_directorio_wpfunos_meta_box_nonce'], $this->plugin_name . '_tanatorio_directorio_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-tanatorio-directorio-fields.php';
  }
  public function saveconfimgwpfunos_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_conf_img_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_conf_img_wpfunos_meta_box_nonce'], $this->plugin_name . '_conf_img_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-conf-img-fields.php';
  }
  public function saveubicaciones_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_ubicaciones_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_ubicaciones_wpfunos_meta_box_nonce'], $this->plugin_name . '_ubicaciones_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-ubicaciones-fields.php';
  }
  public function saveubic_aseg_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_ubic_aseg_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_ubic_aseg_wpfunos_meta_box_nonce'], $this->plugin_name . '_ubic_aseg_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-ubic-aseg-fields.php';
  }
  public function savepag_serv_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_pag_serv_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_pag_serv_wpfunos_meta_box_nonce'], $this->plugin_name . '_pag_serv_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-pag-serv-fields.php';
  }
  public function savepag_aseg_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_pag_aseg_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_pag_aseg_wpfunos_meta_box_nonce'], $this->plugin_name . '_pag_aseg_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-pag-aseg-fields.php';
  }
  public function saveprecio_funer_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_precio_funer_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_precio_funer_wpfunos_meta_box_nonce'], $this->plugin_name . '_precio_funer_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-precio-funer-fields.php';
  }
  public function saveexcep_prov_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_excep_prov_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_excep_prov_wpfunos_meta_box_nonce'], $this->plugin_name . '_excep_prov_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-excep-prov-fields.php';
  }
  public function saveprecio_serv_wpfunosMetaBoxData( $post_id ){
    if (! isset($_POST[$this->plugin_name . '_precio_serv_wpfunos_meta_box_nonce'])) return;
    if (! wp_verify_nonce($_POST[$this->plugin_name . '_precio_serv_wpfunos_meta_box_nonce'], $this->plugin_name . '_precio_serv_wpfunos_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('manage_options')) return;
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-precio-servicios-fields.php';
  }

  /*********************************/
  /*****  CPT                 ******/
  /*********************************/
  /**
  * usuarios_wpfunos
  */
  public function usuarios_registrados_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-usuarios.php';
  }
  /**
  * funerarias_wpfunos
  */
  public function funerarias_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-funerarias.php';
  }
  /**
  * servicios_wpfunos
  */
  public function servicios_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-servicios.php';
  }
  /**
  * cpostales_wpfunos
  */
  public function codigospostales_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-cpostales.php';
  }
  /**
  * provincias_wpfunos
  */
  public function provincias_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-provincias.php';
  }
  /**
  * prov_zona_wpfunos
  */
  public function prov_zona_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-prov-zona.php';
  }
  /**
  * aseguradoras_wpfunos
  */
  public function aseguradoras_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-aseguradoras.php';
  }
  /**
  * tipos_seguro_wpfunos
  */
  public function tipos_seguro_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-tipos-seguro.php';
  }
  /**
  * tanatorio_d_wpfunos
  */
  public function directorio_tanatorio_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-tanatorio-d.php';
  }
  /**
  * conf_img_wpfunos
  */
  public function config_imagenes_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-conf-img.php';
  }
  /**
  * ubicaciones_wpfunos
  */
  public function entrada_ubicaciones_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-ubicaciones.php';
  }
  /**
  * ubic_aseg_wpfunos
  */
  public function entrada_ubicaciones_aseguradoras_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-ubic-aseg.php';
  }
  /**
  * Entrada Servicios_wpfunos
  */
  public function entrada_servicios_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-pag-serv.php';
  }
  /**
  * Entrada Aseguradoras_wpfunos
  */
  public function entrada_aseguradoras_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-pag-aseg.php';
  }

  /**
  * Entrada Precios Poblacion  precio_funer_wpfunos
  */
  public function precios_poblacion_funeraria_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-precio-funer.php';
  }

  /**
  * Entrada busquedas en provincias e islas excep_prov_wpfunos
  */
  public function excepciones_provincias_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-excep-prov.php';
  }

  /**
  * precio_serv_wpfunos
  */
  public function precios_servicios_custom_post_type(){
    require_once 'partials/cpt/' . $this->plugin_name . '-admin-cpt-precio-serv.php';
  }
  /*********************************/
  /*****  MOSTRAR METABOXES   ******/
  /*********************************/

  /**
  * Add fields to Metabox
  */
  public function servicios_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_servicios_wpfunos_meta_box', $this->plugin_name.'_servicios_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-servicios-display.php';
  }
  public function usuarios_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_usuarios_wpfunos_meta_box', $this->plugin_name.'_usuarios_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-usuarios-display.php';
  }
  public function funerarias_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_funerarias_wpfunos_meta_box', $this->plugin_name.'_funerarias_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-funerarias-display.php';
  }
  public function cpostales_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_cpostales_wpfunos_meta_box', $this->plugin_name.'_cpostales_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-cpostales-display.php';
  }
  public function provincias_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_provincias_wpfunos_meta_box', $this->plugin_name.'_provincias_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-provincias-display.php';
  }
  public function prov_zona_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_prov_zona_wpfunos_meta_box', $this->plugin_name.'_prov_zona_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-prov-zona-display.php';
  }
  public function aseguradoras_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_aseguradoras_wpfunos_meta_box', $this->plugin_name.'_aseguradoras_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-aseguradoras-display.php';
  }
  public function tipos_seguro_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_tipos_seguro_wpfunos_meta_box', $this->plugin_name.'_tipos_seguro_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-tipos-seguro-display.php';
  }
  public function tanatorio_directorio_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_tanatorio_directorio_wpfunos_meta_box', $this->plugin_name.'_tanatorio_directorio_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-tanatorio-directorio-display.php';
  }
  public function conf_img_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_conf_img_wpfunos_meta_box', $this->plugin_name.'_conf_img_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-conf-img-display.php';
  }
  public function ubicaciones_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_ubicaciones_wpfunos_meta_box', $this->plugin_name.'_ubicaciones_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-ubicaciones-display.php';
  }
  public function ubic_aseg_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_ubic_aseg_wpfunos_meta_box', $this->plugin_name.'_ubic_aseg_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-ubic-aseg-display.php';
  }
  public function pag_serv_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_pag_serv_wpfunos_meta_box', $this->plugin_name.'_pag_serv_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-pag-serv-display.php';
  }
  public function pag_aseg_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_pag_aseg_wpfunos_meta_box', $this->plugin_name.'_pag_aseg_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-pag-aseg-display.php';
  }
  public function precio_funer_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_precio_funer_wpfunos_meta_box', $this->plugin_name.'_precio_funer_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-precio-funer-display.php';
  }
  public function excep_prov_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_excep_prov_wpfunos_meta_box', $this->plugin_name.'_excep_prov_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-excep-prov-display.php';
  }
  public function precio_serv_wpfunos_data_meta_box($post){
    wp_nonce_field( $this->plugin_name.'_precio_serv_wpfunos_meta_box', $this->plugin_name.'_precio_serv_wpfunos_meta_box_nonce' );
    require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-precio-servicios-display.php';
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
        if ($args['id'] == $this->plugin_name . '_DisplayListPageId') $prependEnd = ' ' . get_the_title($value) . '</div>';
        $step = (isset($args['step'])) ? 'step="' . $args['step'] . '"' : '';
        $min = (isset($args['min'])) ? 'min="' . $args['min'] . '"' : '';
        $max = (isset($args['max'])) ? 'max="' . $args['max'] . '"' : '';
        $size = (isset($args['size'])) ? 'size="' . $args['size'] . '"' : 'size="40"';
        if (isset($args['disabled'])) {
          // hide the actual input bc if it was just a disabled input the informaiton saved in the database would be wrong - bc it would pass empty values and wipe the actual information
          echo $prependStart . '<input type="' . $args['subtype'] . '" id="' . $args['id'] . '_disabled" ' . $step . ' ' . $max . ' ' . $min . ' name="' . $args['name'] . '_disabled" ' . $size . ' disabled value="' . esc_attr($value) . '" /><input type="hidden" id="' . $args['id'] . '" ' . $step . ' ' . $max . ' ' . $min . ' name="' . $args['name'] . '" size="40" value="' . esc_attr($value) . '" />' . $prependEnd;
        } else {
          echo $prependStart . '<input type="' . $args['subtype'] . '" id="' . $args['id'] . '" "' . $args['required'] . '" ' . $step . ' ' . $max . ' ' . $min . ' name="' . $args['name'] . '" ' . $size . ' value="' . esc_attr($value) . '" />' . $prependEnd;
        }
        /* <input required="required" '.$disabled.' type="number" step="any" id="'.$this->plugin_name.'_cost2" name="'.$this->plugin_name.'_cost2" value="' . esc_attr( $cost ) . '" size="25" /><input type="hidden" id="'.$this->plugin_name.'_cost" step="any" name="'.$this->plugin_name.'_cost" value="' . esc_attr( $cost ) . '" /> */
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

  /** **/
  /** **/
  /** **/

  /*********************************/
  /*****  CRON                ******/
  /*********************************/

  /**
  * Cron job hourly maintenance tasks.
  */
  protected function wpfunosHourlyMaintenance(){
    $this->custom_logs('Wpfunos Hourly begins');
    //
    // BEGINING
    $this->wpfunosMaintenanceHourly2FA();
    //
    // END
    $this->custom_logs('Wpfunos Hourly ends');
    $this->custom_logs('---');
  }

  /**
  * Cron job maintenance tasks.
  */
  protected function wpfunosMaintenance()
  {
    $this->custom_logs('Wpfunos Maintenance begins');
    //
    // BEGINING
    $this->wpfunosMaintenanceLogRotate();
    $this->wpfunosMaintenancePreciosFunerarias();
    //
    // END
    $this->custom_logs('Wpfunos Maintenance ends');
    $this->custom_logs('---');
    return;
  }

  /**
  * Cron job maintenance log rotate
  */
  protected function wpfunosMaintenanceLogRotate(){
    $upload_dir = wp_upload_dir();
    $files = scandir( $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs' );
    foreach ($files as $file) {
      if (substr($file, - 4) == '.log') {
        $this->custom_logs('Logfile: ' . $file . ' -> ' . date("d-m-Y H:i:s", filemtime( $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs/' . $file)));
        // if (time() > strtotime('+45 days', filemtime( $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs/' . $file))) {
        if (time() > strtotime('+1 week', filemtime( $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs/' . $file))) {
          $oldfile = $this->gzCompressFile($upload_dir['basedir'] . '/' . $this->plugin_name . '-logs/' . $file);
          $this->custom_logs('Old logfile: ' . $oldfile );
          unlink( $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs/' . $file);
        }
      }
    }
  }

  /**
  * Cron job Precios funerarias
  */
  protected function wpfunosMaintenancePreciosFunerarias(){
    //  Precios Funerarias
    $this->custom_logs('---');
    $this->custom_logs('Wpfunos precio_funer_wpfunos starts');
    $args = array(
      'post_type' => 'precio_funer_wpfunos',
      'post_status' => 'any', // para incluir borradores
      'posts_per_page' => -1,
    );
    $post_list = get_posts( $args );
    if( $post_list ){
      foreach ( $post_list as $post ) :
        $entierro = (int)str_replace(".","",get_post_meta( $post->ID, $this->plugin_name . '_precioFunerariaEntierroDesde', true ));
        $incineracion = (int)str_replace(".","",get_post_meta( $post->ID, $this->plugin_name . '_precioFunerariaIncineracionDesde', true ));
        update_post_meta($post->ID, 'SeoEntierro',  number_format($entierro, 0, ',', '.') . '€');
        update_post_meta($post->ID, 'SeoIncineracion', number_format($incineracion, 0, ',', '.') . '€');
        if($entierro < $incineracion ){
          update_post_meta($post->ID, 'SeoDesde',  number_format($entierro, 0, ',', '.') . '€');
        }else{
          update_post_meta($post->ID, 'SeoDesde',  number_format($incineracion, 0, ',', '.') . '€');
        }
        $this->custom_logs('precio_funer_wpfunos ' .$post->ID. ' updated');
      endforeach;
      wp_reset_postdata();
    }
    $this->custom_logs('Wpfunos precio_funer_wpfunos ends');
    //
    $this->custom_logs('---');
    $this->custom_logs('Wpfunos precio_serv_wpfunos starts');
    $tipos = array(
      "EESS", "EESO", "EESC", "EESR",
      "EEVS", "EEVO", "EEVC", "EEVR",
      "EMSS", "EMSO", "EMSC", "EMSR",
      "EMVS", "EMVO", "EMVC", "EMVR",
      "EPSS", "EPSO", "EPSC", "EPSR",
      "EPVS", "EPVO", "EPVC", "EPVR",
      "IESS", "IESO", "IESC", "IESR",
      "IEVS", "IEVO", "IEVC", "IEVR",
      "IMSS", "IMSO", "IMSC", "IMSR",
      "IMVS", "IMVO", "IMVC", "IMVR",
      "IPSS", "IPSO", "IPSC", "IPSR",
      "IPVS", "IPVO", "IPVC", "IPVR",
    );
    $contador = 0;
    $newcontador = 0;
    // borrar el índice
    //$args = array(
    //  'post_type' => 'precio_serv_wpfunos',
    //  'post_status'  => 'publish',
    //  'posts_per_page' => -1,
    //);
    //$post_list = get_posts( $args );
    //$this->custom_logs('Wpfunos precios_serv: ' .count($post_list)  );
    //if( $post_list ){
    //  foreach ( $post_list as $post ) {
    //    wp_delete_post( $post->ID, true);
    //  }
    //  wp_reset_postdata();
    //}
    //
    $args = array(
      'post_type' => 'servicios_wpfunos',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'meta_query' => array(
        array( 'key' => 'wpfunos_servicioActivo', 'value' => '1', 'compare' => '=', ),
      ),
    );
    $post_list = get_posts( $args );
    $this->custom_logs('Wpfunos Se han encontrado ' .count($post_list). ' servicios activos');
    $this->custom_logs('Wpfunos services: ' .count($post_list)  );
    if( $post_list ){
      foreach ( $post_list as $post ) {
        //$this->custom_logs('Wpfunos services: ' .$post->ID. ' Activo: ' .$activo );
        $nombre_servicio = get_the_title( $post->ID );
        $direccion = get_post_meta( $post->ID, 'wpfunos_servicioDireccion', true );
        foreach ( $tipos as $tipo ) {
          // comprobar que tiene precios del nuevo buscador
          $precio = get_post_meta( $post->ID, 'wpfunos_servicio'.$tipo, true );
          if( strlen ($precio) > 0 ){
            //            $this->custom_logs('Wpfunos El post ' .$post->ID. ' de tipo ' .$tipo. ' tiene precios activos');
            $resp1 = (substr ($tipo,0,1) == 'E') ? '1' : '2';
            $resp3 = (substr ($tipo,2,1) == 'V') ? '1' : '2';
            switch( substr ($tipo,1,1) ){ case 'M':$resp2 = '1';break; case 'E':$resp2 = '2';break; case 'P':$resp2 = '3';break; }
            switch( substr ($tipo,3,1) ){ case 'S':$resp4 = '1';break; case 'O':$resp4 = '2';break; case 'C':$resp4 = '3';break; case 'R':$resp4 = '4';break; }

            $newargs = array(
              'post_type' => 'precio_serv_wpfunos',
              'post_status'  => 'publish',
              'posts_per_page' => -1,
              'meta_query' => array(
                'relation' => 'AND',
                array( 'key' => 'wpfunos_servicioPrecioID', 'value' => $post->ID, 'compare' => '=', ),
                array( 'key' => 'resp1', 'value' => $resp1, 'compare' => '=', ),
                array( 'key' => 'resp2', 'value' => $resp2, 'compare' => '=', ),
                array( 'key' => 'resp3', 'value' => $resp3, 'compare' => '=', ),
                array( 'key' => 'resp4', 'value' => $resp4, 'compare' => '=', ),
              ),
            );
            $newpost_list = get_posts( $newargs );

            if( $newpost_list ){
              // Update
              $newcontador ++;
              update_post_meta($post->ID, 'wpfunos_servicioPrecio',  $precio );
              //$this->custom_logs('Wpfunos El post ' .$post->ID. '-' .$nombre_servicio. ' de tipo ' .$tipo. ' ya tiene precios. ' .$precio. ',' .$resp1. ', ' .$resp2. ', ' .$resp3. ', ' .$resp4. ' => '    .$newcontador);
            }else{
              // Create
              $my_post = array(
                'post_title' => $tipo.' - '. $nombre_servicio,
                'post_type' => 'precio_serv_wpfunos',
                'post_status'  => 'publish',
                'meta_input'   => array(
                  'wpfunos_servicioPrecioValor' =>  $tipo,
                  'wpfunos_servicioPrecioID' => $post->ID,
                  'wpfunos_servicioPrecioNombre' => $nombre_servicio,
                  'wpfunos_servicioPrecio' => $precio,
                  'resp1' => $resp1, 'resp2' => $resp2, 'resp3' => $resp3, 'resp4' => $resp4,
                ),
              );
              $post_id = wp_insert_post($my_post);
              $contador ++;
              gmw_update_post_location( $post_id, $direccion, 7, $direccion, true );
              $this->custom_logs('Wpfunos El post ' .$post->ID. '-' .$nombre_servicio. ' de tipo ' .$tipo. ' no tiene precios. Creando entrada. ' .$post_id );
            }
          }
        }
        wp_reset_postdata();
      }
      $this->custom_logs('Wpfunos service Created ' .$contador. ' new entries. Updated ' .$newcontador. ' entries' );
      wp_reset_postdata();
    }
    $this->custom_logs('Wpfunos precio_serv_wpfunos ends');
    $this->custom_logs('---');
  }

  /**
  * Cron job maintenance log rotate
  */
  protected function wpfunosMaintenanceHourly2FA(){
    $this->custom_logs('Wpfunos 2FA');
    $args = array(
      'role'    => 'pre2fa',
      'orderby' => 'user_nicename',
      'order'   => 'ASC'
    );
    $users = get_users( $args );
    if( $users ){
      foreach ( $users as $user ){
        $this->custom_logs('Wpfunos 2FA: ' .$user->display_name. ' ID: ' .$user->ID );
        $this->custom_logs('Wpfunos 2FA: last login: ' .get_user_meta( $user->ID, 'wfls-last-login' , true ). ' => ' .gmdate("d-m-Y H:i:s", get_user_meta( $user->ID, 'wfls-last-login' , true ) ) );
        $this->custom_logs('Wpfunos 2FA: Última comprobación: ' .get_user_meta( $user->ID, 'wpfunos_ultima_comprobacion' , true ). ' => ' .gmdate("d-m-Y H:i:s", get_user_meta( $user->ID, 'wpfunos_ultima_comprobacion' , true ) ) );
        if( get_user_meta( $user->ID, 'wfls-last-login' , true ) > get_user_meta( $user->ID, 'wpfunos_ultima_comprobacion' , true ) ){
          $headers[] = 'Content-Type: text/html; charset=UTF-8';
          wp_mail (  'efraim@efraim.cat' , 'Usuario 2FA conectado' , 'El usuario ' .$user->display_name. ' se ha conectado.', $headers );
          $this->custom_logs('Wpfunos 2FA: Mensaje enviado a efraim@efraim.cat' );
        }
        $updated = update_user_meta( $user->ID, 'wpfunos_ultima_comprobacion', time() );
        $this->custom_logs('Wpfunos 2FA: ---------------------------' );
      }
    }


  }

  /*********************************/
  /*****  UTILIDADES          ******/
  /*********************************/
  /**
  * Utility: log files.
  */
  private function logFiles()
  {
    $upload_dir = wp_upload_dir();
    $files = scandir( $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs');
    ?>
    <form action="" method="post">
      <ul>
        <?php foreach ( $files as $file ) { ?>
          <?php if( substr( $file , -4) == '.log'){?>
            <li><input type="radio" id="age[]" name="logfile" value="<?php esc_html_e( $file ); ?>">
              <?php esc_html_e( $file . ' -> ' . date("d-m-Y H:i:s", filemtime( $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs/' . $file  ) ) ); ?>
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
  private function showLogFile()
  {
    $upload_dir = wp_upload_dir();
    if (isset($_POST['logfile'])) {
      ?>
      <hr />
      <h3><?php esc_html_e( $_POST['logfile'] ); ?> </h3>
      <textarea id="wpfunoslogfile" name="wpfunoslogfile" rows="30" cols="180" readonly>
        <?php esc_html_e( ( file_get_contents( $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs/' . $_POST['logfile'] ) ) ); ?>
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
    if (!file_exists( $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs') ) {
      mkdir( $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs' );
    }
    $time = current_time("d-M-Y H:i:s");
    $ban = "#$time: $message\r\n";
    $file = $upload_dir['basedir'] . '/' . $this->plugin_name . '-logs/' . $this->plugin_name .'-adminlog-' . current_time("Y-m-d") . '.log';
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
  private function gzCompressFile($source, $level = 9){
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
  private function wpfunosActualizargmw(){
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
  private function gmw_update_post_type_post_location(  $post_id ) {
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

}
