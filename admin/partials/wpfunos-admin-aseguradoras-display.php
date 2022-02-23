<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage Wpfunos/admin/partials
 */
?>
<div class="wrap">
	<div id="icon-themes" class="icon32"></div>
	<h2><?php esc_html_e( get_admin_page_title() .' '.$this->version); ?></h2>
	<h2><?php esc_html_e( 'Ajustes aseguradoras WpFunos', 'wpfunos' ); ?></h2>
	<hr/>
	<?php settings_errors(); ?>
	<form method="POST" action="options.php">
		<?php
            settings_fields('wpfunos_aseguradoras_settings');
            do_settings_sections('wpfunos_aseguradoras_settings');
        ?>
        <hr />
		<?php submit_button(); ?>
	</form>
</div>