<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage Wpfunos/admin
 * @author     Efraim Bayarri <efraim@efraim.cat>
 */
class Wpfunos_Admin {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;
	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action('init', array( $this, 'usuarios_registrados_custom_post_type' ));
		add_action('init', array( $this, 'funerarias_custom_post_type' ));
		add_action('init', array( $this, 'servicios_custom_post_type' ));
		add_action('init', array( $this, 'codigospostales_custom_post_type' ));
		add_action('init', array( $this, 'aseguradoras_custom_post_type' ));
		add_action('init', array( $this, 'tipos_seguro_custom_post_type' ));
		add_action('init', array( $this, 'directorio_tanatorio_custom_post_type' ));
		//add_action('init', array( $this, 'directorio_funeraria_custom_post_type' ));
		//add_action('init', array( $this, 'directorio_cementerio_custom_post_type' ));
		//add_action('init', array( $this, 'directorio_crematorio_custom_post_type' ));
		add_action('admin_menu', array( $this, 'addPluginAdminMenu' ), 9);
		add_action('admin_init', array( $this, 'registerAndBuildFields' ));						// Compara Debug
		add_action('admin_init', array( $this, 'registerAndBuildFieldsAseguradoras' ));			// Compara Debug
		add_action('admin_init', array( $this, 'registerAndBuildFieldsPagina' ));				// Página inicial
		add_action('admin_init', array( $this, 'registerAndBuildFieldsDatos' ));				// Compara Datos
		add_action('admin_init', array( $this, 'registerAndBuildFieldsResultados' )); 			// Compara Resultados cabecera y Pie
		add_action('admin_init', array( $this, 'registerAndBuildFieldsConfirmado' )); 			// Compara Resultados Confirmado superior e inferior
		add_action('admin_init', array( $this, 'registerAndBuildFieldsConfirmadoDescuento' ));	// Compara Resultados confirmado Descuento superior e inferior
		add_action('admin_init', array( $this, 'registerAndBuildFieldsSinConfirmar' ));			// Compara Resultados Sin Confirmar superior e inferior
		add_action('admin_init', array( $this, 'registerAndBuildFieldsSinPrecio' ));			// Compara Resultados Sin Precio superior e inferior
		add_action('admin_init', array( $this, 'registerAndBuildMail' ));
		add_action('admin_init', array( $this, 'registerAndBuildMail2' ));
		add_action('admin_init', array( $this, 'registerAndBuildMail3' ));
		add_action('admin_init', array( $this, 'registerAndBuildMail4' ));
		add_action('admin_init', array( $this, 'registerAndBuildAPIPreventiva' ));
		add_action('admin_init', array( $this, 'registerAndBuildCorreoAPIPreventiva' ));
		add_action('add_meta_boxes_usuarios_wpfunos', array( $this, 'setupusuarios_wpfunosMetaboxes' ));
		add_action('add_meta_boxes_funerarias_wpfunos', array( $this, 'setupfunerarias_wpfunosMetaboxes' ));
		add_action('add_meta_boxes_servicios_wpfunos', array( $this, 'setupservicios_wpfunosMetaboxes' ));
		add_action('add_meta_boxes_cpostales_wpfunos', array( $this, 'setupcpostales_wpfunosMetaboxes' ));
		add_action('add_meta_boxes_aseguradoras_wpfunos', array( $this, 'setupaseguradoras_wpfunosMetaboxes' ));
		add_action('add_meta_boxes_tipos_seguro_wpfunos', array( $this, 'setuptiposseguro_wpfunosMetaboxes' ));
		add_action('add_meta_boxes_funeraria_d_wpfunos', array( $this, 'setupfunerariadirectorio_wpfunosMetaboxes' ));
		add_action('add_meta_boxes_cementerio_d_wpfunos', array( $this, 'setupcementeriodirectorio_wpfunosMetaboxes' ));
		add_action('add_meta_boxes_tanatorio_d_wpfunos', array( $this, 'setuptanatoriodirectorio_wpfunosMetaboxes' ));
		add_action('add_meta_boxes_crematorio_d_wpfunos', array( $this, 'setupcrematoriodirectorio_wpfunosMetaboxes' ));
		add_action('save_post_usuarios_wpfunos', array( $this, 'saveusuarios_wpfunosMetaBoxData' ));
		add_action('save_post_funerarias_wpfunos', array( $this, 'savefunerarias_wpfunosMetaBoxData' ));
		add_action('save_post_servicios_wpfunos', array( $this, 'saveservicios_wpfunosMetaBoxData' ));
		add_action('save_post_cpostales_wpfunos', array( $this, 'savecpostales_wpfunosMetaBoxData' ));
		add_action('save_post_aseguradoras_wpfunos', array( $this, 'saveaseguradoras_wpfunosMetaBoxData' ));
		add_action('save_post_tipos_seguro_wpfunos', array( $this, 'savetiposeguro_wpfunosMetaBoxData' ));
		add_action('save_post_funeraria_d_wpfunos', array( $this, 'savefunerariadirectorio_wpfunosMetaBoxData' ));
		add_action('save_post_cementerio_d_wpfunos', array( $this, 'savecementeriodirectorio_wpfunosMetaBoxData' ));
		add_action('save_post_tanatorio_d_wpfunos', array( $this, 'savetanatoriodirectorio_wpfunosMetaBoxData' ));
		add_action('save_post_crematorio_d_wpfunos', array( $this, 'savecrematoriodirectorio_wpfunosMetaBoxData' ));
	}
	
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
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
	 * Register the Cron Job Schedule.
	 */
	public function wpfunos_cron_schedules( $schedules ) {
		if (!isset ($schedules["wpfunosCronSchedule"]) ){
			$schedules["wpfunosCronSchedule"] = array(
				'interval' => 43200,
				'display' => esc_html__('daily'),
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
		// add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null )
		add_submenu_page( $this->plugin_name.'config', esc_html__('Configuración servicios WpFunos', 'wpfunos'), esc_html__('Configuración servicios', 'wpfunos'), 'administrator', $this->plugin_name . '-settings', array( $this, 'displayPluginAdminSettings' ));
		add_submenu_page( $this->plugin_name.'config', esc_html__('Configuración aseguradoras WpFunos', 'wpfunos'), esc_html__('Configuración aseguradoras', 'wpfunos'), 'administrator', $this->plugin_name . '-aseguradoras', array( $this, 'displayPluginAdminAseguradoras' ));
		add_submenu_page( $this->plugin_name.'config', esc_html__('Configuración correo WpFunos', 'wpfunos'), esc_html__('Configuración correo', 'wpfunos'), 'administrator', $this->plugin_name . '-mail', array( $this, 'displayPluginAdminMail' ));
		add_submenu_page( $this->plugin_name.'config', esc_html__('Configuración API Preventiva WpFunos', 'wpfunos'), esc_html__('Configuracción API Preventiva', 'wpfunos'), 'administrator', $this->plugin_name . '-APIPreventiva', array( $this, 'displayPluginAdminAPIPreventiva' ));
		if(get_option($this->plugin_name . '_Debug')){
			add_submenu_page( $this->plugin_name.'config' , esc_html__('Logs WpFunos', 'wpfunos'), esc_html__('Logs', 'wpfunos'), 'administrator', $this->plugin_name . '-logs', array( $this, 'displayPluginAdminLogs' ));
		}
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
	 * Logs menu display.
	 */
	public function displayPluginAdminLogs(){
	    if (isset($_GET['error_message'])) {
	        add_action('admin_notices', array( $this, 'wpfunosSettingsMessages' ));
	        do_action('admin_notices', sanitize_text_field($_GET['error_message']));
	    }
	    require_once 'partials/' . $this->plugin_name . '-admin-logs-display.php';
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
	public function registerAndBuildFieldsAseguradoras() {
	    require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildAseguradoras.php';
	}
	public function registerAndBuildFieldsPagina() {
      require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildPagina.php';
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
	public function registerAndBuildAPIPreventiva() {
		require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildAPIPreventiva.php';
	}
	public function registerAndBuildCorreoAPIPreventiva() {
		require_once 'partials/registerAndBuild/' . $this->plugin_name . '-admin-registerAndBuildMailPreventiva.php';
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
	public function wpfunos_display_aseguradoras_account() {
		?><p><?php esc_html_e('Configuración de las aseguradoras.', 'wpfunos'); ?></p><?php
	}
	public function wpfunos_display_general_account_pagina() {
	    ?>
		<p><?php esc_html_e('Página del Comparador.', 'wpfunos'); ?></p>
		<p>
		Ejemplo URL página resultados servicios: https://funos.es/compara-precios-nueva?address%5B%5D=[field id="address"]&post%5B%5D=[field id="post"]&distance=[field id="distance"]&units=[field id="units"]&page1=&per_page=50&lat=[field id="lat"]&lng=[field id="lng"]&form=4&action=fs&referencia=[field id="referencia"]&CP=[field id="CP"]	
		</p>
		<p>
		Ejemplo URL página resultados aseguradoras: https://funos.es/compara-precios-aseguradoras?address%5B%5D=[field id="address"]&post%5B%5D=[field id="post"]&distance=[field id="distance"]&units=[field id="units"]&page1=&per_page=50&lat=[field id="lat"]&lng=[field id="lng"]&form=3&action=fs&referencia=[field id="referencia"]&CP=[field id="CP"]
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
	public function wpfunos_display_mail_account() {
		?>
		<hr/>
		<p><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes varialbles:', 'wpfunos'); ?></p>
		<p>[nombreServicio], [telefono], [precio], [nombreUsuario], [referencia], [Email], [CPUsuario], [ubicacion]</p>
		<p>[desgloseBaseNombre], [TotaldesgloseBaseTotal] = ( <i>[desgloseBasePrecio] + [desgloseBaseDescuento] + [desgloseBaseTotal]</i> )</p>
		<p>[desgloseDestinoNombre], [TotaldesgloseDestinoTotal] = ( <i>[desgloseDestinoPrecio] + [desgloseDestinoDescuento] + [desgloseDestinoTotal]</i> )</p>
		<p>[desgloseAtaudNombre], [TotaldesgloseAtaudTotal] = ( <i>[desgloseAtaudPrecio] + [desgloseAtaudDescuento] + [desgloseAtaudTotal]</i> )</p>
		<p>[desgloseVelatorioNombre], [TotaldesgloseVelatorioTotal] = ( <i>[desgloseVelatorioPrecio] + [desgloseVelatorioDescuento] + [desgloseVelatorioTotal]</i> )</p>
		<p>[desgloseCeremoniaNombre], [TotaldesgloseCeremoniaTotal] = ( <i>[desgloseCeremoniaPrecio] + [desgloseCeremoniaDescuento] + [desgloseCeremoniaTotal]</i> )</p>
		<p>[desgloseDescuentoGenerico], [TotaldesgloseGenericoTotal] = ( <i>[desgloseDescuentoGenericoPrecio] + [desgloseDescuentoGenericoDescuento] + [desgloseDescuentoGenericoTotal]</i> )</p>
		<p>[comentariosBase], [comentariosDestino], [comentariosAtaud], [comentariosVelatorio], [comentariosDespedida]</p>
		<hr />
		<?php
	}
	public function wpfunos_display_mail_account_Preventiva() {
		?>
		<hr/>
		<p><?php esc_html_e('En el cuerpo del mensaje se pueden utilizar las siguientes varialbles:', 'wpfunos'); ?></p>
		<p>[nombreUsuario], [telefono], [Email], [referencia], [CPUsuario], [ubicacion], [seguro], [sexo],  [edad], [tipoAPI]</p>
		<hr />
		<?php
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
		 /* add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null ) */
		 add_meta_box('funerarias_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'funerarias_wpfunos_data_meta_box'), 'funerarias_wpfunos', 'normal', 'high' );
		 remove_meta_box('wpseo_meta', 'funerarias_wpfunos', 'normal');
	}
	public function setupservicios_wpfunosMetaboxes(){
		 /* add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null ) */
		 add_meta_box('servicios_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'servicios_wpfunos_data_meta_box'), 'servicios_wpfunos', 'normal', 'high' );
		 remove_meta_box('wpseo_meta', 'servicios_wpfunos', 'normal');
	}
	public function setupcpostales_wpfunosMetaboxes(){
		 /* add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null ) */
		 add_meta_box('cpostales_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'cpostales_wpfunos_data_meta_box'), 'cpostales_wpfunos', 'normal', 'high' );
		 remove_meta_box('wpseo_meta', 'cpostales_wpfunos', 'normal');
	}
	public function setupaseguradoras_wpfunosMetaboxes(){
		 /* add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null ) */
		 add_meta_box('aseguradoras_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'aseguradoras_wpfunos_data_meta_box'), 'aseguradoras_wpfunos', 'normal', 'high' );
		 remove_meta_box('wpseo_meta', 'aseguradoras_wpfunos', 'normal');
	}
	public function setuptiposseguro_wpfunosMetaboxes(){
		 /* add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null ) */
		 add_meta_box('tipos_seguro_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'tipos_seguro_wpfunos_data_meta_box'), 'tipos_seguro_wpfunos', 'normal', 'high' );
		 remove_meta_box('wpseo_meta', 'tipos_seguro_wpfunos', 'normal');
	}
	public function setupfunerariadirectorio_wpfunosMetaboxes(){
		/* add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null ) */
		add_meta_box('funeraria_d_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'funeraria_directorio_wpfunos_data_meta_box'), 'funeraria_d_wpfunos', 'normal', 'high' );
	}
	public function setupcementeriodirectorio_wpfunosMetaboxes(){
		/* add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null ) */
		add_meta_box('cementerio_d_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'cementerio_directorio_wpfunos_data_meta_box'), 'cementerio_d_wpfunos', 'normal', 'high' );
	}
	public function setuptanatoriodirectorio_wpfunosMetaboxes(){
		/* add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null ) */
		add_meta_box('tanatorio_d_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'tanatorio_directorio_wpfunos_data_meta_box'), 'tanatorio_d_wpfunos', 'normal', 'high' );
	}
	public function setupcrematoriodirectorio_wpfunosMetaboxes(){
		/* add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null ) */
		add_meta_box('crematorio_d_wpfunos_data_meta_box', esc_html__('Información', 'wpfunos'), array($this,'crematorio_directorio_wpfunos_data_meta_box'), 'crematorio_d_wpfunos', 'normal', 'high' );
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
	
	public function savefunerariadirectorio_wpfunosMetaBoxData( $post_id ){
		if (! isset($_POST[$this->plugin_name . '_funeraria_directorio_wpfunos_meta_box_nonce'])) return;
		if (! wp_verify_nonce($_POST[$this->plugin_name . '_funeraria_directorio_wpfunos_meta_box_nonce'], $this->plugin_name . '_funeraria_directorio_wpfunos_meta_box')) return;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
		if (! current_user_can('manage_options')) return;
		require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-funeraria-directorio-fields.php';
	}
	public function savecementeriodirectorio_wpfunosMetaBoxData( $post_id ){
		if (! isset($_POST[$this->plugin_name . '_cementerio_directorio_wpfunos_meta_box_nonce'])) return;
		if (! wp_verify_nonce($_POST[$this->plugin_name . '_cementerio_directorio_wpfunos_meta_box_nonce'], $this->plugin_name . '_cementerio_directorio_wpfunos_meta_box')) return;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
		if (! current_user_can('manage_options')) return;
		require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-cementerio-directorio-fields.php';
	}
	public function savetanatoriodirectorio_wpfunosMetaBoxData( $post_id ){
		if (! isset($_POST[$this->plugin_name . '_tanatorio_directorio_wpfunos_meta_box_nonce'])) return;
		if (! wp_verify_nonce($_POST[$this->plugin_name . '_tanatorio_directorio_wpfunos_meta_box_nonce'], $this->plugin_name . '_tanatorio_directorio_wpfunos_meta_box')) return;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
		if (! current_user_can('manage_options')) return;
		require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-tanatorio-directorio-fields.php';
	}
	public function savecrematoriodirectorio_wpfunosMetaBoxData( $post_id ){
		if (! isset($_POST[$this->plugin_name . '_crematorio_directorio_wpfunos_meta_box_nonce'])) return;
		if (! wp_verify_nonce($_POST[$this->plugin_name . '_crematorio_directorio_wpfunos_meta_box_nonce'], $this->plugin_name . '_crematorio_directorio_wpfunos_meta_box')) return;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
		if (! current_user_can('manage_options')) return;
		require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-crematorio-directorio-fields.php';
	}
	
	/*********************************/
	/*****  CPT                 ******/
	/*********************************/
	/**
	 * usuarios_wpfunos
	 */
	public function usuarios_registrados_custom_post_type(){
		$customPostTypeArgs = array(
			'label' => esc_html__('Usuarios registrados', 'wpfunos'),
			'labels'=>
			array(
					'name' => esc_html__('Usuarios WpFunos', 'wpfunos'),
					'singular_name' => esc_html__('Usuario', 'wpfunos'),
					'add_new' => esc_html__('Añadir usuario', 'wpfunos'),
					'add_new_item' => esc_html__('Añadir nuevo usuario', 'wpfunos'),
					'edit_item' => esc_html__('Editar usuario', 'wpfunos'),
					'new_item' => esc_html__('Nuevo usuario', 'wpfunos'),
					'view_item' => esc_html__('Ver usuario', 'wpfunos'),
					'search_items' => esc_html__('Buscar usuario', 'wpfunos'),
					'not_found' => esc_html__('No se encontraron usuarios', 'wpfunos'),
					'not_found_in_trash' => esc_html__('No se encontraron usuarios en la papelera', 'wpfunos'),
					'menu_name' => esc_html__('Usuarios', 'wpfunos'),
					'name_admin_bar' => esc_html__('Usuarios', 'wpfunos'),
			),
			'public'=>false,
			'description' => esc_html__('Usuarios registrados', 'wpfunos'),
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => $this->plugin_name,
			'supports'=>array('title', 'custom_fields'),
			'capability_type' => 'post',
			'capabilities' => array('create_posts' => true),
			'map_meta_cap' => true,
			'taxonomies'=>array()
		);
		// Post type, $args - the Post Type string can be MAX 20 characters
		register_post_type( 'usuarios_wpfunos', $customPostTypeArgs );
	}

	/**
	 * funerarias_wpfunos
	 */
	public function funerarias_custom_post_type(){
		$customPostTypeArgs = array(
			'label' => esc_html__('Funerarias', 'wpfunos'),
			'labels'=>
			array(
					'name' => esc_html__('Funerarias WpFunos', 'wpfunos'),
					'singular_name' => esc_html__('Funeraria', 'wpfunos'),
					'add_new' => esc_html__('Añadir Funeraria', 'wpfunos'),
					'add_new_item' => esc_html__('Añadir nueva funeraria', 'wpfunos'),
					'edit_item' => esc_html__('Editar funeraria', 'wpfunos'),
					'new_item' => esc_html__('Nueva funeraria', 'wpfunos'),
					'view_item' => esc_html__('Ver funeraria', 'wpfunos'),
					'search_items' => esc_html__('Buscar funeraria', 'wpfunos'),
					'not_found' => esc_html__('No se encontraron funerarias', 'wpfunos'),
					'not_found_in_trash' => esc_html__('No se encontraron funerarias en la papelera', 'wpfunos'),
					'menu_name' => esc_html__('Funerarias', 'wpfunos'),
					'name_admin_bar' => esc_html__('Funerarias', 'wpfunos'),
			),
			'public'=>false,
			'description' => esc_html__('Funerarias', 'wpfunos'),
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => $this->plugin_name,
			'supports'=>array('title', 'custom_fields'),
			'capability_type' => 'post',
			'capabilities' => array('create_posts' => true),
			'map_meta_cap' => true,
			'taxonomies'=>array()
		);
		// Post type, $args - the Post Type string can be MAX 20 characters
		register_post_type( 'funerarias_wpfunos', $customPostTypeArgs );
	}
	
	/**
	 * servicos_wpfunos
	 */
	public function servicios_custom_post_type(){
		$customPostTypeArgs = array(
			'label' => esc_html__('Servicios', 'wpfunos'),
			'labels'=>
			array(
					'name' => esc_html__('Servicios WpFunos', 'wpfunos'),
					'singular_name' => esc_html__('Servicio', 'wpfunos'),
					'add_new' => esc_html__('Añadir servicio', 'wpfunos'),
					'add_new_item' => esc_html__('Añadir nuevo servicio', 'wpfunos'),
					'edit_item' => esc_html__('Editar servicio', 'wpfunos'),
					'new_item' => esc_html__('Nuevo servicio', 'wpfunos'),
					'view_item' => esc_html__('Ver servicio', 'wpfunos'),
					'search_items' => esc_html__('Buscar servicio', 'wpfunos'),
					'not_found' => esc_html__('No se encontraron servicios', 'wpfunos'),
					'not_found_in_trash' => esc_html__('No se encontraron servicios en la papelera', 'wpfunos'),
					'menu_name' => esc_html__('Servicios', 'wpfunos'),
					'name_admin_bar' => esc_html__('Servicios', 'wpfunos'),
			),
			'public'=>false,
			'description' => esc_html__('Servicios', 'wpfunos'),
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => $this->plugin_name,
			'supports'=>array('title', 'custom_fields'),
			'capability_type' => 'post',
			'capabilities' => array('create_posts' => true),
			'map_meta_cap' => true,
			'taxonomies'=>array()
		);
		// Post type, $args - the Post Type string can be MAX 20 characters
		register_post_type( 'servicios_wpfunos', $customPostTypeArgs );
	}
	
	/**
	 * cpostales_wpfunos
	 */
	public function codigospostales_custom_post_type(){
		$customPostTypeArgs = array(
			'label' => esc_html__('Codigos Postales', 'wpfunos'),
			'labels'=>
			array(
					'name' => esc_html__('Códigos postales WpFunos', 'wpfunos'),
					'singular_name' => esc_html__('Código postal', 'wpfunos'),
					'add_new' => esc_html__('Añadir código postal', 'wpfunos'),
					'add_new_item' => esc_html__('Añadir nuevo código postal', 'wpfunos'),
					'edit_item' => esc_html__('Editar código postal', 'wpfunos'),
					'new_item' => esc_html__('Nuevo código postal', 'wpfunos'),
					'view_item' => esc_html__('Ver código postal', 'wpfunos'),
					'search_items' => esc_html__('Buscar código postal', 'wpfunos'),
					'not_found' => esc_html__('No se encontraron código postal', 'wpfunos'),
					'not_found_in_trash' => esc_html__('No se encontraron código postal en la papelera', 'wpfunos'),
					'menu_name' => esc_html__('Códigos postales', 'wpfunos'),
					'name_admin_bar' => esc_html__('Códigos postales', 'wpfunos'),
			),
			'public'=>false,
			'description' => esc_html__('Códigos postales', 'wpfunos'),
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => $this->plugin_name,
			'supports'=>array('title', 'custom_fields'),
			'capability_type' => 'post',
			'capabilities' => array('create_posts' => true),
			'map_meta_cap' => true,
			'taxonomies'=>array()
		);
		// Post type, $args - the Post Type string can be MAX 20 characters
		register_post_type( 'cpostales_wpfunos', $customPostTypeArgs );
	}
	
	/**
	 * aseguradoras_wpfunos
	 */
	public function aseguradoras_custom_post_type(){
		$customPostTypeArgs = array(
			'label' => esc_html__('Aseguradoras', 'wpfunos'),
			'labels'=>
			array(
					'name' => esc_html__('Aseguradoras WpFunos', 'wpfunos'),
					'singular_name' => esc_html__('Aseguradora', 'wpfunos'),
					'add_new' => esc_html__('Añadir Aseguradora', 'wpfunos'),
					'add_new_item' => esc_html__('Añadir nueva aseguradora', 'wpfunos'),
					'edit_item' => esc_html__('Editar aseguradora', 'wpfunos'),
					'new_item' => esc_html__('Nuevo aseguradora', 'wpfunos'),
					'view_item' => esc_html__('Ver aseguradora', 'wpfunos'),
					'search_items' => esc_html__('Buscar aseguradora', 'wpfunos'),
					'not_found' => esc_html__('No se encontraron aseguradoras', 'wpfunos'),
					'not_found_in_trash' => esc_html__('No se encontraron aseguradoras en la papelera', 'wpfunos'),
					'menu_name' => esc_html__('Aseguradoras', 'wpfunos'),
					'name_admin_bar' => esc_html__('Aseguradoras', 'wpfunos'),
			),
			'public'=>false,
			'description' => esc_html__('Aseguradoras', 'wpfunos'),
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => $this->plugin_name,
			'supports'=>array('title', 'custom_fields'),
			'capability_type' => 'post',
			'capabilities' => array('create_posts' => true),
			'map_meta_cap' => true,
			'taxonomies'=>array()
		);
		// Post type, $args - the Post Type string can be MAX 20 characters
		register_post_type( 'aseguradoras_wpfunos', $customPostTypeArgs );
	}
	
	/**
	 * tipos_seguro_wpfunos
	 */
	public function tipos_seguro_custom_post_type(){
		$customPostTypeArgs = array(
			'label' => esc_html__('Tipos de seguro', 'wpfunos'),
			'labels'=>
			array(
					'name' => esc_html__('Tipos de seguro', 'wpfunos'),
					'singular_name' => esc_html__('Tipo de seguro', 'wpfunos'),
					'add_new' => esc_html__('Añadir tipo de seguro', 'wpfunos'),
					'add_new_item' => esc_html__('Añadir nuevo tipo de seguro', 'wpfunos'),
					'edit_item' => esc_html__('Editar tipo de seguro', 'wpfunos'),
					'new_item' => esc_html__('Nuevo tipo de seguro', 'wpfunos'),
					'view_item' => esc_html__('Ver tipo de seguro', 'wpfunos'),
					'search_items' => esc_html__('Buscar tipo de seguro', 'wpfunos'),
					'not_found' => esc_html__('No se encontraron tipos de seguro', 'wpfunos'),
					'not_found_in_trash' => esc_html__('No se encontraron tipos de seguro en la papelera', 'wpfunos'),
					'menu_name' => esc_html__('Tipos de seguro', 'wpfunos'),
					'name_admin_bar' => esc_html__('Tipos de seguro', 'wpfunos'),
			),
			'public'=>false,
			'description' => esc_html__('Tipos de seguro', 'wpfunos'),
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => $this->plugin_name,
			'supports'=>array('title', 'custom_fields'),
			'capability_type' => 'post',
			'capabilities' => array('create_posts' => true),
			'map_meta_cap' => true,
			'taxonomies'=>array()
		);
		// Post type, $args - the Post Type string can be MAX 20 characters
		register_post_type( 'tipos_seguro_wpfunos', $customPostTypeArgs );
	}
	
	/**
	 * funeraria_d_wpfunos
	 */
	public function directorio_funeraria_custom_post_type(){
		$customPostTypeArgs = array(
			'label' => esc_html__('Funeraria Directorio', 'wpfunos'),
			'labels'=>
			array(
					'name' => esc_html__('Funerarias', 'wpfunos'),
					'singular_name' => esc_html__('Funeraria', 'wpfunos'),
					'add_new' => esc_html__('Añadir funeraria al directorio', 'wpfunos'),
					'add_new_item' => esc_html__('Añadir nueva funeraria al directorio', 'wpfunos'),
					'edit_item' => esc_html__('Editar funeraria del directorio', 'wpfunos'),
					'new_item' => esc_html__('Nueva funeraria del directorio', 'wpfunos'),
					'view_item' => esc_html__('Ver funeraria del directorio', 'wpfunos'),
					'search_items' => esc_html__('Buscar funeraria del directorio', 'wpfunos'),
					'not_found' => esc_html__('No se encontraron funerarias del directorio', 'wpfunos'),
					'not_found_in_trash' => esc_html__('No se encontraron funerarias del directorio en la papelera', 'wpfunos'),
					'menu_name' => esc_html__('Funerarias del directorio', 'wpfunos'),
					'name_admin_bar' => esc_html__('Funerarias del direcctorio', 'wpfunos'),
			),
			'public'=>true,
			'description' => esc_html__('Funerarias', 'wpfunos'),
			'exclude_from_search' => false,
			'show_ui' => true,
			'show_in_menu' => $this->plugin_name.'directorio',
			'supports'=>array('title', 'custom_fields'),
			'capability_type' => 'post',
			'capabilities' => array('create_posts' => true),
			'rewrite' => array( 'slug' => 'funerar', 'with_front'=> false ), 'capability_type' => 'post', 
    		'hierarchical' => true, 
			'map_meta_cap' => true,
		);
		// Post type, $args - the Post Type string can be MAX 20 characters
		register_post_type( 'funeraria_d_wpfunos', $customPostTypeArgs );
		
		register_taxonomy( 'poblacion_funeraria', 
			array('funeraria_d_wpfunos'), 
			array(
        		'hierarchical' => true, 
	        	'label' => 'Funeraria', 
				'labels'=>
				array(
					'name'              => _x( 'Funeraria', 'taxonomy general name' ),
        			'singular_name'     => _x( 'Funeraria', 'taxonomy singular name' ),
        			'search_items'      => __( 'Search Categories' ),
        			'all_items'         => __( 'All Categories' ),
        			'parent_item'       => __( 'Parent Category' ),
        			'parent_item_colon' => __( 'Parent Category:' ),
        			'edit_item'         => __( 'Edit Category' ),
        			'update_item'       => __( 'Update Category' ),
        			'add_new_item'      => __( 'Add New Category' ),
        			'new_item_name'     => __( 'New Category Name' ),
        			'menu_name'         => __( 'Funeraria' ),
				),
    	    	'singular_label' => 'Funeraria', 
        		'rewrite' => array( 'slug' => 'funerarias', 'with_front'=> false ),
    			'public'                     => true,
    			'show_ui'                    => true,
    			'show_admin_column'          => true,
    			'show_in_nav_menus'          => true,
    			'show_tagcloud'              => true,
    	    )
	    );
    	register_taxonomy_for_object_type( 'poblacion_funeraria', 'funeraria_d_wpfunos' );
	
		register_taxonomy( 'marca_funeraria', 
			array('funeraria_d_wpfunos'), 
			array(
        		'hierarchical' => true, 
	        	'label' => 'Marca funeraria', 
				'labels'=>
				array(
					'name'              => _x( 'Marca funeraria', 'taxonomy general name' ),
        			'singular_name'     => _x( 'Marca funeraria', 'taxonomy singular name' ),
        			'search_items'      => __( 'Search Categories' ),
        			'all_items'         => __( 'All Categories' ),
        			'parent_item'       => __( 'Parent Category' ),
        			'parent_item_colon' => __( 'Parent Category:' ),
        			'edit_item'         => __( 'Edit Category' ),
        			'update_item'       => __( 'Update Category' ),
        			'add_new_item'      => __( 'Add New Category' ),
        			'new_item_name'     => __( 'New Category Name' ),
        			'menu_name'         => __( 'Marca funeraria' ),
				),
    	    	'singular_label' => 'Marca', 
        		'rewrite' => array( 'slug' => 'marcas', 'with_front'=> false ),
    			'public'                     => true,
    			'show_ui'                    => true,
    			'show_admin_column'          => true,
    			'show_in_nav_menus'          => true,
    			'show_tagcloud'              => true,
    	    )
	    );
    	register_taxonomy_for_object_type( 'marca_funeraria', 'funeraria_d_wpfunos' );
	}
	
	/**
	 * cementerio_d_wpfunos
	 */
	public function directorio_cementerio_custom_post_type(){
		$customPostTypeArgs = array(
			'label' => esc_html__('Funeraria Directorio', 'wpfunos'),
			'labels'=>
			array(
					'name' => esc_html__('Cementerios', 'wpfunos'),
					'singular_name' => esc_html__('Cementerio', 'wpfunos'),
					'add_new' => esc_html__('Añadir cementerio al directorio', 'wpfunos'),
					'add_new_item' => esc_html__('Añadir nuevo cementerio al directorio', 'wpfunos'),
					'edit_item' => esc_html__('Editar cementerio del directorio', 'wpfunos'),
					'new_item' => esc_html__('Nuevo cementerio del directorio', 'wpfunos'),
					'view_item' => esc_html__('Ver cementerio del directorio', 'wpfunos'),
					'search_items' => esc_html__('Buscar cementerio del directorio', 'wpfunos'),
					'not_found' => esc_html__('No se encontraron cementerios del directorio', 'wpfunos'),
					'not_found_in_trash' => esc_html__('No se encontraron cementerios del directorio en la papelera', 'wpfunos'),
					'menu_name' => esc_html__('Cementerios del directorio', 'wpfunos'),
					'name_admin_bar' => esc_html__('Cementerios del direcctorio', 'wpfunos'),
			),
			'public'=>false,
			'description' => esc_html__('Cementerios', 'wpfunos'),
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => $this->plugin_name.'directorio',
			'supports'=>array('title', 'custom_fields'),
			'capability_type' => 'post',
			'capabilities' => array('create_posts' => true),
			'map_meta_cap' => true,
			'taxonomies'=>array()
		);
		// Post type, $args - the Post Type string can be MAX 20 characters
		register_post_type( 'cementerio_d_wpfunos', $customPostTypeArgs );
	}
	
	/**
	 * tanatorio_d_wpfunos
	 */
	public function directorio_tanatorio_custom_post_type(){
		$customPostTypeArgs = array(
			'label' => esc_html__('Tanatorio Directorio', 'wpfunos'),
			'labels'=>
			array(
					'name' => esc_html__('Tanatorios', 'wpfunos'),
					'singular_name' => esc_html__('Tanatorio', 'wpfunos'),
					'add_new' => esc_html__('Añadir tanatorio al directorio', 'wpfunos'),
					'add_new_item' => esc_html__('Añadir nuevo tanatorio al directorio', 'wpfunos'),
					'edit_item' => esc_html__('Editar tanatorio del directorio', 'wpfunos'),
					'new_item' => esc_html__('Nuevo tanatorio del directorio', 'wpfunos'),
					'view_item' => esc_html__('Ver tanatorio del directorio', 'wpfunos'),
					'search_items' => esc_html__('Buscar tanatorio del directorio', 'wpfunos'),
					'not_found' => esc_html__('No se encontraron tanatorios del directorio', 'wpfunos'),
					'not_found_in_trash' => esc_html__('No se encontraron tanatorios del directorio en la papelera', 'wpfunos'),
					'menu_name' => esc_html__('Tanatorios del directorio', 'wpfunos'),
					'name_admin_bar' => esc_html__('Tanatorios del direcctorio', 'wpfunos'),
			),
			'public'=>true,
			'description' => esc_html__('Tanatorios', 'wpfunos'),
			'exclude_from_search' => false,
			'show_ui' => true,
			'show_in_menu' => $this->plugin_name.'directorio',
			'supports'=>array('title', 'custom_fields', 'editor', 'author', 'thumbnail', 'excerpt'),
			'capability_type' => 'post',
			'capabilities' => array('create_posts' => true),
			'rewrite' => array( 'slug' => 'tanatorios', 'with_front'=> false ), 'capability_type' => 'post', 
    		'hierarchical' => true, 
			'map_meta_cap' => true,
		);
		// Post type, $args - the Post Type string can be MAX 20 characters
		register_post_type( 'tanatorio_d_wpfunos', $customPostTypeArgs );
		
		register_taxonomy( 'poblacion_tanatorio', 
			array('tanatorio_d_wpfunos'), 
			array(
        		'hierarchical' => true, 
	        	'label' => 'Tanatorio', 
				'labels'=>
				array(
					'name'              => _x( 'Tanatorio', 'taxonomy general name' ),
        			'singular_name'     => _x( 'Tanatorio', 'taxonomy singular name' ),
        			'search_items'      => __( 'Search Categories' ),
        			'all_items'         => __( 'All Categories' ),
        			'parent_item'       => __( 'Parent Category' ),
        			'parent_item_colon' => __( 'Parent Category:' ),
        			'edit_item'         => __( 'Edit Category' ),
        			'update_item'       => __( 'Update Category' ),
        			'add_new_item'      => __( 'Add New Category' ),
        			'new_item_name'     => __( 'New Category Name' ),
        			'menu_name'         => __( 'Tanatorio' ),
				),
    	    	'singular_label' => 'Tanatorio', 
        		'rewrite' => array( 'slug' => 'tanatorios', 'with_front'=> false ),
    			'public'                     => true,
    			'show_ui'                    => true,
    			'show_admin_column'          => true,
    			'show_in_nav_menus'          => true,
    			'show_tagcloud'              => true,
    	    )
	    );
    	register_taxonomy_for_object_type( 'poblacion_tanatorio', 'tanatorio_d_wpfunos' );
	
		register_taxonomy( 'poblacion_funeraria', 
			array('tanatorio_d_wpfunos'), 
			array(
        		'hierarchical' => true, 
	        	'label' => 'Funeraria', 
				'labels'=>
				array(
					'name'              => _x( 'Funeraria', 'taxonomy general name' ),
        			'singular_name'     => _x( 'Funeraria', 'taxonomy singular name' ),
        			'search_items'      => __( 'Search Categories' ),
        			'all_items'         => __( 'All Categories' ),
        			'parent_item'       => __( 'Parent Category' ),
        			'parent_item_colon' => __( 'Parent Category:' ),
        			'edit_item'         => __( 'Edit Category' ),
        			'update_item'       => __( 'Update Category' ),
        			'add_new_item'      => __( 'Add New Category' ),
        			'new_item_name'     => __( 'New Category Name' ),
        			'menu_name'         => __( 'Funeraria' ),
				),
    	    	'singular_label' => 'Funeraria', 
        		'rewrite' => array( 'slug' => 'funerarias', 'with_front'=> false ),
    			'public'                     => true,
    			'show_ui'                    => true,
    			'show_admin_column'          => true,
    			'show_in_nav_menus'          => true,
    			'show_tagcloud'              => true,
    	    )
	    );
    	register_taxonomy_for_object_type( 'poblacion_funeraria', 'tanatorio_d_wpfunos' );
	
		register_taxonomy( 'marca_funeraria', 
			array('tanatorio_d_wpfunos'), 
			array(
        		'hierarchical' => true, 
	        	'label' => 'Marca funeraria', 
				'labels'=>
				array(
					'name'              => _x( 'Marca funeraria', 'taxonomy general name' ),
        			'singular_name'     => _x( 'Marca funeraria', 'taxonomy singular name' ),
        			'search_items'      => __( 'Search Categories' ),
        			'all_items'         => __( 'All Categories' ),
        			'parent_item'       => __( 'Parent Category' ),
        			'parent_item_colon' => __( 'Parent Category:' ),
        			'edit_item'         => __( 'Edit Category' ),
        			'update_item'       => __( 'Update Category' ),
        			'add_new_item'      => __( 'Add New Category' ),
        			'new_item_name'     => __( 'New Category Name' ),
        			'menu_name'         => __( 'Marca funeraria' ),
				),
    	    	'singular_label' => 'Marca', 
        		'rewrite' => array( 'slug' => 'marcas', 'with_front'=> false ),
    			'public'                     => true,
    			'show_ui'                    => true,
    			'show_admin_column'          => true,
    			'show_in_nav_menus'          => true,
    			'show_tagcloud'              => true,
    	    )
	    );
    	register_taxonomy_for_object_type( 'marca_funeraria', 'tanatorio_d_wpfunos' );
		
	}
	
	/**
	 * crematorio_d_wpfunos
	 */
	public function directorio_crematorio_custom_post_type(){
		$customPostTypeArgs = array(
			'label' => esc_html__('Crematorio Directorio', 'wpfunos'),
			'labels'=>
			array(
					'name' => esc_html__('Crematorios', 'wpfunos'),
					'singular_name' => esc_html__('Crematorio', 'wpfunos'),
					'add_new' => esc_html__('Añadir crematorio al directorio', 'wpfunos'),
					'add_new_item' => esc_html__('Añadir nuevo crematorio al directorio', 'wpfunos'),
					'edit_item' => esc_html__('Editar crematorio del directorio', 'wpfunos'),
					'new_item' => esc_html__('Nuevo crematorio del directorio', 'wpfunos'),
					'view_item' => esc_html__('Ver crematorio del directorio', 'wpfunos'),
					'search_items' => esc_html__('Buscar crematorio del directorio', 'wpfunos'),
					'not_found' => esc_html__('No se encontraron crematorios del directorio', 'wpfunos'),
					'not_found_in_trash' => esc_html__('No se encontraron crematorios del directorio en la papelera', 'wpfunos'),
					'menu_name' => esc_html__('Crematorios del directorio', 'wpfunos'),
					'name_admin_bar' => esc_html__('Crematorios del direcctorio', 'wpfunos'),
			),
			'public'=>fasle,
			'description' => esc_html__('Crematorios', 'wpfunos'),
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => $this->plugin_name.'directorio',
			'supports'=>array('title', 'custom_fields'),
			'capability_type' => 'post',
			'capabilities' => array('create_posts' => true),
			'map_meta_cap' => true,
			'taxonomies'=>array()
		);
		// Post type, $args - the Post Type string can be MAX 20 characters
		register_post_type( 'crematorio_d_wpfunos', $customPostTypeArgs );
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
	public function aseguradoras_wpfunos_data_meta_box($post){
		wp_nonce_field( $this->plugin_name.'_aseguradoras_wpfunos_meta_box', $this->plugin_name.'_aseguradoras_wpfunos_meta_box_nonce' );
		require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-aseguradoras-display.php';
	}
	public function tipos_seguro_wpfunos_data_meta_box($post){
		wp_nonce_field( $this->plugin_name.'_tipos_seguro_wpfunos_meta_box', $this->plugin_name.'_tipos_seguro_wpfunos_meta_box_nonce' );
		require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-tipos-seguro-display.php';
	}
	public function funeraria_directorio_wpfunos_data_meta_box($post){
		wp_nonce_field( $this->plugin_name.'_funeraria_directorio_wpfunos_meta_box', $this->plugin_name.'_funeraria_directorio_wpfunos_meta_box_nonce' );
		require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-funeraria-directorio-display.php';
	}
	public function cementerio_directorio_wpfunos_data_meta_box($post){
		wp_nonce_field( $this->plugin_name.'_cementerio_directorio_wpfunos_meta_box', $this->plugin_name.'_cementerio_directorio_wpfunos_meta_box_nonce' );
		require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-cementerio-directorio-display.php';
	}
	public function tanatorio_directorio_wpfunos_data_meta_box($post){
		wp_nonce_field( $this->plugin_name.'_tanatorio_directorio_wpfunos_meta_box', $this->plugin_name.'_tanatorio_directorio_wpfunos_meta_box_nonce' );
		require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-tanatorio-directorio-display.php';
	}
	public function crematorio_directorio_wpfunos_data_meta_box($post){
		wp_nonce_field( $this->plugin_name.'_crematorio_directorio_wpfunos_meta_box', $this->plugin_name.'_crematorio_directorio_wpfunos_meta_box_nonce' );
		require_once 'partials/DB/' . $this->plugin_name . '-admin-DB-crematorio-directorio-display.php';
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
	/*****  UTILIDADES          ******/
	/*********************************/
	
	/**
 	 * Cron job maintenance tasks.
 	 */
	protected function wpfunosMaintenance()
 	{
 	    $this->custom_logs('Wpfunos Maintenance begins');
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
 	    $this->custom_logs('Wpfunos Maintenance ends');
 	    $this->custom_logs('---');
 	    return;
 	}
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
}
