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
  <h2><?php esc_html_e( get_admin_page_title() .' '.$this->version. ' ('  .get_option( "wpf_db_version" ). ')' ); ?></h2>
  <?php settings_errors(); ?>
  <div style="margin-top: 10px;margin-bottom: 10px;"><?php echo date_i18n( 'd F Y H:i:s', current_time( 'timestamp', 0 ) );?></div>
  <p>
    <?php esc_html_e( 'Import Export Directorio: ', 'wpfunos' ); ?>
  </p>
</div>
<?php
if( !isset ($_POST['submit']) ){
  ?>
  <div class="wpfunos-imports">
    <h3>
      IMPORTACION FICHERO TANATORIOS DIRECTORIO
    </h3>
    <p>
      Escoger el fichero .csv de la importación de tanatorios
    </p>
    <form method="post" enctype="multipart/form-data" action="">
      <p>
        <input accept=".csv" type="file" name="import_file" />
      </p>
      <p>
        <input type="hidden" name="importdirectorio" id="importdirectorio" value="1"/>
        <?php wp_nonce_field( 'wpfunos_import_directorio_nonce', 'wpfunos_import_directorio_nonce' ); ?>
        <?php submit_button( __( 'Importar fichero tanatorios directorio', 'wpfunos' ), 'secondary', 'submit', false );?>
      </p>
    </form>
    <hr style="height: 50px;">
    <h3>
      IMPORTACION FICHERO FUNERARIAS DIRECTORIO
    </h3>
    <p>
      Escoger el fichero .csv de la importación de funerarias
    </p>
    <form method="post" enctype="multipart/form-data" action="">
      <p>
        <input accept=".csv" type="file" name="import_file" />
      </p>
      <p>
        <input type="hidden" name="importfuneraria" id="importfuneraria" value="1"/>
        <?php wp_nonce_field( 'wpfunos_import_funeraria_nonce', 'wpfunos_import_funeraria_nonce' ); ?>
        <?php submit_button( __( 'Importar fichero funerarias directorio', 'wpfunos' ), 'secondary', 'submit', false );?>
      </p>
    </form>
    <hr style="height: 50px;">
    <h3>
      EXPORTACION FICHERO TANATORIOS DIRECTORIO
    </h3>
    <p>
      Crear fichero .csv de tanatorios del directorio
    </p>
    <form method="post" enctype="multipart/form-data" action="">
      <p>
        <input type="hidden" name="exportdirectorio" id="exportdirectorio" value="1"/>
        <?php wp_nonce_field( 'wpfunos_import_directorio_nonce', 'wpfunos_import_directorio_nonce' ); ?>
        <?php submit_button( __( 'Exportar fichero tanatorios directorio', 'wpfunos' ), 'secondary', 'submit', false );?>
      </p>
    </form>
    <hr style="height: 50px;">
    <h3>
      EXPORTACION FICHERO FUNERARIAS DIRECTORIO
    </h3>
    <p>
      Crear fichero .csv de funerarias del directorio
    </p>
    <form method="post" enctype="multipart/form-data" action="">
      <p>
        <input type="hidden" name="exportfunerarias" id="exportfunerarias" value="1"/>
        <?php wp_nonce_field( 'wpfunos_import_funerarias_nonce', 'wpfunos_import_funerarias_nonce' ); ?>
        <?php submit_button( __( 'Exportar fichero funerarias directorio', 'wpfunos' ), 'secondary', 'submit', false );?>
      </p>
    </form>
  </div>

  <?php
  return;
}

//array(4) { ["exportdirectorio"]=> string(1) "1" ["wpfunos_import_directorio_nonce"]=> string(10) "79924ea802" ["_wp_http_referer"]=> string(57) "/wp-admin/admin.php?page=wpfunos-import-export-directorio" ["submit"]=> string(27) "Exportar fichero directorio" }
//var_dump($_POST);

/**
*
* // Get term by name ''news'' in Custom taxonomy.
* $term = get_term_by('name', 'news', 'my_custom_taxonomy')
*
*/
if($_POST['importdirectorio'] == '1' ){
  require_once 'admin-menu/import-export-directorio/wpfunos-admin-import-export-directorio-import-tanatorio.php';
}

if($_POST['importfuneraria'] == '1' ){
  require_once 'admin-menu/import-export-directorio/wpfunos-admin-import-export-directorio-import-funeraria.php';
}

if($_POST['exportdirectorio'] == '1' ){
  require_once 'admin-menu/import-export-directorio/wpfunos-admin-import-export-directorio-export-tanatorio.php';
}

if($_POST['exportfunerarias'] == '1' ){
  require_once 'admin-menu/import-export-directorio/wpfunos-admin-import-export-directorio-export-funeraria.php';
}
