<?php

/**
* The file that defines the core plugin class
*
* A class definition that includes attributes and functions used across both the
* public-facing side of the site and the admin area.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/includes
*/

/**
* The core plugin class.
*
* This is used to define internationalization, admin-specific hooks, and
* public-facing site hooks.
*
* Also maintains the unique identifier of this plugin as well as the current
* version of the plugin.
*
* @since      1.0.0
* @package    Wpfunos
* @subpackage Wpfunos/includes
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
class Wpfunos {

	/**
	* The loader that's responsible for maintaining and registering all hooks that power
	* the plugin.
	*
	* @since    1.0.0
	* @access   protected
	* @var      Wpfunos_Loader    $loader    Maintains and registers all hooks for the plugin.
	*/
	protected $loader;

	/**
	* The unique identifier of this plugin.
	*
	* @since    1.0.0
	* @access   protected
	* @var      string    $plugin_name    The string used to uniquely identify this plugin.
	*/
	protected $plugin_name;

	/**
	* The current version of the plugin.
	*
	* @since    1.0.0
	* @access   protected
	* @var      string    $version    The current version of the plugin.
	*/
	protected $version;

	/**
	* Define the core functionality of the plugin.
	*
	* Set the plugin name and the plugin version that can be used throughout the plugin.
	* Load the dependencies, define the locale, and set the hooks for the admin area and
	* the public-facing side of the site.
	*
	* @since    1.0.0
	*/
	public function __construct() {
		if ( defined( 'WPFUNOS_VERSION' ) ) {
			$this->version = WPFUNOS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wpfunos';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_utils_hooks();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_aseguradoras_hooks();
		$this->define_serviciosv3_hooks();
		$this->define_precios_poblacion_hooks();
		$this->define_visitas_hooks();
		$this->define_directorio_hooks();

	}

	/**
	* Load the required dependencies for this plugin.
	*
	* Include the following files that make up the plugin:
	*
	* - Wpfunos_Loader. Orchestrates the hooks of the plugin.
	* - Wpfunos_i18n. Defines internationalization functionality.
	* - Wpfunos_Admin. Defines all hooks for the admin area.
	* - Wpfunos_Public. Defines all hooks for the public side of the site.
	*
	* Create an instance of the loader which will be used to register the hooks
	* with WordPress.
	*
	* @since    1.0.0
	* @access   private
	*/
	private function load_dependencies() {

		/**
		* The class responsible for orchestrating the actions and filters of the
		* core plugin.
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wpfunos-loader.php';

		/**
		* The class responsible for defining internationalization functionality
		* of the plugin.
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wpfunos-i18n.php';

		/**
		* The class responsible for defining all actions that occur in the admin area.
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wpfunos-admin.php';

		/**
		* The class responsible for defining all actions that occur in the public-facing
		* side of the site.
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wpfunos-public.php';

		/**
		* Utils
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'utils/class-wpfunos-utils.php';

		/**
		* Aseguradoras
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'aseguradoras/class-wpfunos-aseguradoras.php';

		/**
		* Servicios V3
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'serviciosv3/class-wpfunos-serviciosv3.php';

		/**
		* Precios Poblacion
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'precios-poblacion/class-wpfunos-precios-poblacion.php';

		/**
		* Visitas
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'visitas/class-wpfunos-visitas.php';

		/**
		* Directorio
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'directorio/class-wpfunos-directorio.php';

		/**
		*
		*/

		$this->loader = new Wpfunos_Loader();

	}

	/**
	* Define the locale for this plugin for internationalization.
	*
	* Uses the Wpfunos_i18n class in order to set the domain and to register the hook
	* with WordPress.
	*
	* @since    1.0.0
	* @access   private
	*/
	private function set_locale() {

		$plugin_i18n = new Wpfunos_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	* Register all of the hooks related to the admin area functionality
	* of the plugin.
	*
	* @since    1.0.0
	* @access   private
	*/
	private function define_admin_hooks() {

		$plugin_admin = new Wpfunos_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'wpfunosCronJob', $plugin_admin, 'wpfunosCron');
		$this->loader->add_action( 'wpfunosNextCronJob', $plugin_admin, 'wpfunosNextCron');
		$this->loader->add_action( 'wpfunosHourlyCronJob', $plugin_admin, 'wpfunosHourlyCron');
		$this->loader->add_action( 'wpfunos10mCronJob', $plugin_admin, 'wpfunos10mCron');

	}

	/**
	* Register all of the hooks related to the public-facing functionality
	* of the plugin.
	*
	* @since    1.0.0
	* @access   private
	*/
	private function define_public_hooks() {

		$plugin_public = new Wpfunos_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	* Register all of the hooks utils
	* of the plugin.
	*
	* @since    1.0.0
	* @access   private
	*/
	private function define_utils_hooks() {

		$plugin_utils = new Wpfunos_Utils( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_utils, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_utils, 'enqueue_scripts' );
	}

	/**
	* Register all of the hooks aseguradoras
	* of the plugin.
	*
	* @since    1.0.0
	* @access   private
	*/
	private function define_aseguradoras_hooks() {

		$plugin_aseguradoras = new Wpfunos_Aseguradoras( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_aseguradoras, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_aseguradoras, 'enqueue_scripts' );

	}

	/**
	* Register all of the hooks Precios Población
	* of the plugin.
	*
	* @since    1.0.0
	* @access   private
	*/
	private function define_precios_poblacion_hooks() {

		$plugin_precios_poblacion = new Wpfunos_PreciosPoblacion( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_precios_poblacion, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_precios_poblacion, 'enqueue_scripts' );

	}

	/**
	* Register all of the hooks servicios
	* of the plugin.
	*
	* @since    2.0.0
	* @access   private
	*/
	private function define_serviciosv3_hooks() {

		$plugin_serviciosv3 = new Wpfunos_ServiciosV3( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_serviciosv3, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_serviciosv3, 'enqueue_scripts' );

	}

	/**
	* Register all of the hooks visitas
	* of the plugin.
	*
	* @since    2.0.0
	* @access   private
	*/
	private function define_visitas_hooks() {

		$plugin_visitas = new Wpfunos_Visitas( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_visitas, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_visitas, 'enqueue_scripts' );

	}

	/**
	* Register all of the hooks directorio
	* of the plugin.
	*
	* @since    2.0.0
	* @access   private
	*/
	private function define_directorio_hooks() {

		$plugin_directorio = new Wpfunos_Directorio( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_directorio, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_directorio, 'enqueue_scripts' );

	}

	/**
	* Run the loader to execute all of the hooks with WordPress.
	*
	* @since    1.0.0
	*/
	public function run() {
		$this->loader->run();
	}

	/**
	* The name of the plugin used to uniquely identify it within the context of
	* WordPress and to define internationalization functionality.
	*
	* @since     1.0.0
	* @return    string    The name of the plugin.
	*/
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	* The reference to the class that orchestrates the hooks with the plugin.
	*
	* @since     1.0.0
	* @return    Wpfunos_Loader    Orchestrates the hooks of the plugin.
	*/
	public function get_loader() {
		return $this->loader;
	}

	/**
	* Retrieve the version number of the plugin.
	*
	* @since     1.0.0
	* @return    string    The version number of the plugin.
	*/
	public function get_version() {
		return $this->version;
	}

}
