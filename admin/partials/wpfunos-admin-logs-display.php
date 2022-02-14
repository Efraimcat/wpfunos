<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * @link       http://efraim.cat
 * @since      1.0.0
 *
 * @package    Wpfunos
 * @subpackage Wpfunos/admin/partials
 */
?>
<div class="wrap">
	<div id="icon-themes" class="icon32"></div>
	<h2><?php esc_html_e( get_admin_page_title() .' '.$this->version ); ?></h2>
	<?php settings_errors(); ?>
	<p>
		<?php esc_html_e( 'Log files: ', 'wpfunos' ); ?>
		<?php $this->logFiles(); ?>
		<?php $this->showLogFile(); ?>
	</p>
</div>
