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
require_once 'class-wpfunos-masterdatos-list-table.php';

class Wpfunos_Masterdatos {

  private $plugin_name;
  private $version;

  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;

    add_action('admin_menu', array( $this, 'addPluginAdminMenu' ), 9);
  }

  public function enqueue_styles() {
    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpfunos-masterdatos.css', array(), $this->version, 'all' );
  }

  public function enqueue_scripts() {
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpfunos-masterdatos.js', array( 'jquery' ), $this->version, false );
  }

  public function addPluginAdminMenu() {
    // add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null )
    $page_hook = add_submenu_page( 'wpfunosconfig', esc_html__('Masterdatos', 'wpfunos'), esc_html__('Masterdatos', 'wpfunos'), 'administrator', 'wpfunos-masterdatos', array( $this, 'displayPluginAdminMasterdatos' ));
    add_action( 'load-'.$page_hook, array( $this, 'displayPluginAdminMasterdatos_screen_options' ) );
  }

  public function displayPluginAdminMasterdatos() {
    if (isset($_GET['error_message'])) {
      add_action('admin_notices', array($this,'wpfunosSettingsMessages'));
      do_action('admin_notices', sanitize_text_field($_GET['error_message']));
    }

    $this->masterdatos_list_table->prepare_items();
    global $wpdb;
    $todos = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."wpf_masterdatos" ));

    ?>
    <div class="wrap">
      <h2><?php esc_html_e( get_admin_page_title() .' '.$this->version. ' ('  .get_option( "wpf_db_version" ). ')' ); ?></h2>
      <?php settings_errors(); ?>
      <h3><?php esc_html_e( 'WpFunos', 'wpfunos' )?></h3>
      <div style="margin-top: 10px;margin-bottom: 10px;"><?php echo date_i18n( 'd F Y H:i:s', current_time( 'timestamp', 0 ) );?></div>
      <div>
        <strong>Total: </strong><?php echo number_format_i18n ( count( $todos ) ); ?>
      </div>
      <div id="masterdatos_list_table">
        <div id="masterdatos_list_table-body">
          <form id="masterdatos_list_table-form" method="get">
            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
            <?php
            $this->masterdatos_list_table->search_box( __( 'Buscar', 'wpfunos' ), 'masterdatos-find');
            $this->masterdatos_list_table->display();
            ?>
          </form>
        </div>
      </div>
    </div>
    <?php
  }
  /**
  *
  */

  public function displayPluginAdminMasterdatos_screen_options(){
    $arguments = array(
      'label' => __( 'Entradas por página', 'wpfunos' ),
      'default'	=> 25,
      'option' => 'masterdatos_per_page'
    );
    add_screen_option( 'per_page', $arguments );

    $this->masterdatos_list_table = new Wpfunos_Masterdatos_List_Table();
  }
}
