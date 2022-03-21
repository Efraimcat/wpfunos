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
	<div id="icon-themes" class="icon32"></div>
	<h2><?php esc_html_e( get_admin_page_title() .' '.$this->version); ?></h2>
	<h2><?php esc_html_e( 'Correo WpFunos', 'wpfunos' ); ?></h2>
	<hr/>
	<?php settings_errors(); ?>
	<form method="POST" action="options.php">
		<?php
        settings_fields('wpfunos_mail_settings');
        do_settings_sections('wpfunos_mail_settings');
        ?>
        <hr />
		<?php submit_button(); ?>
	</form>
</div>
