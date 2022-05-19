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
* @subpackage Wpfunos/admin/partials
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
?>
<div class="wrap">
  <h2><?php esc_html_e( get_admin_page_title() .' '.$this->version); ?></h2>
  <?php settings_errors(); ?>
  <h3><?php esc_html_e( 'Configuración WpFunos', 'wpfunos' )?></h3>
  <table style="width:100%">
    <tr>
      <td>
        <div id="directorio" style="top: -300px;position: relative;" >
          <?php include 'admin-menu/' . $this->plugin_name . '-admin-menu-enlaces-superior.php';	?>
        </div>
      </td>
      <td style="width:350px" >
        <img src="<?php esc_html_e( plugin_dir_url( __DIR__ ) . 'img/' ); ?>funos-logo-450x450.png" alt="nic-app" width="350" height="350">
      </td>
    </tr>
  </table>
  <hr />
</div>
