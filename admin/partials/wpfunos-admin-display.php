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
$ahora = new DateTime();
$mesant = new DateTime();
$mesant->sub(new DateInterval('P1M'));
$displaymesant = date_i18n( 'F' , $mesant->getTimestamp() + $mesant->getOffset() );
$displaymes = date_i18n( 'F', current_time( 'timestamp', 0 ) );
$displaysemanaant = (int) date_i18n( 'W', current_time( 'timestamp', 0 )) - 1;
$displaysemana = date_i18n( 'W', current_time( 'timestamp', 0 ) );
if( $displaysemanaant == 0 ) $displaysemanaant = 53;

//$visits = apply_filters('wpfunos_count_visits', 'pag_serv_wpfunos', 'wpfunos_entradaServiciosVisitas', 'wpfunos_entradaServiciosIP' );
//$visits = apply_filters('wpfunos_count_visits', 'ubicaciones_wpfunos', 'wpfunos_ubicacionVisitas', 'wpfunos_ubicacionIP' );
//$visits = apply_filters('wpfunos_count_visits', 'usuarios_wpfunos', 'wpfunos_userVisitas', 'wpfunos_userIP' );
?>
<div class="wrap">
  <h2><?php esc_html_e( get_admin_page_title() .' '.$this->version); ?></h2>
  <?php settings_errors(); ?>
  <h3><?php esc_html_e( 'WpFunos', 'wpfunos' )?></h3>
  <table style="width:100%">
    <tr>
      <td>
        <div class="w3-bar w3-black" style="position: relative;top:-300px">
          <button class="w3-bar-item w3-button" onclick="openTab('Numeros')">Números</button>
          <button class="w3-bar-item w3-button" onclick="openTab('Graficas')">Gráficas</button>
          <button class="w3-bar-item w3-button" onclick="openTab('Enlaces')">Enlaces</button>
        </div>
        <div id="Numeros" class="w3-container wpftab" style="top: -300px;position: relative;" >
          <div style="margin-top: 10px;margin-bottom: 10px;"><?php echo date_i18n( 'd F Y H:i:s', current_time( 'timestamp', 0 ) );?></div>

          <hr/>
          <?php if( apply_filters('wpfunos_userIP','dummy') == '80.26.158.67' )
          include 'admin-menu/' . $this->plugin_name . '-admin-menu-numeros-entradas.php'; ?>
          <hr/>
          <?php if( apply_filters('wpfunos_userIP','dummy') == '80.26.158.67' )
          include 'admin-menu/' . $this->plugin_name . '-admin-menu-numeros-ubicaciones.php'; ?>
          <hr/>
          <?php if( apply_filters('wpfunos_userIP','dummy') == '80.26.158.67' )
          include 'admin-menu/' . $this->plugin_name . '-admin-menu-numeros-datos.php'; ?>
          <hr/>
          <?php if( apply_filters('wpfunos_userIP','dummy') == '80.26.158.67' )
          include 'admin-menu/' . $this->plugin_name . '-admin-menu-numeros-ratios.php'; ?>


          <?php if( apply_filters('wpfunos_userIP','dummy') == '80.26.158.67' )
          include 'admin-menu/' . $this->plugin_name . '-admin-menu-numeros-inferior.php';	?>
          <hr/>
        </div>
        <div id="Graficas" class="w3-container wpftab" style="display:none; top: -300px;position: relative;">
          <h2>Gráficas</h2>
          <?php if( apply_filters('wpfunos_userIP','dummy') == '80.26.158.67' )
          include 'admin-menu/' . $this->plugin_name . '-admin-menu-graficas-superior.php';	?>
        </div>
        <div id="Enlaces" class="w3-container wpftab" style="display:none; top: -300px;position: relative;">
          <h2>Enlaces</h2>
          <p><strong>Bases de datos de funos.es</strong></p>
          <?php include 'admin-menu/' . $this->plugin_name . '-admin-menu-enlaces-superior.php';	?>
        </div>
        <script>
        function openTab(tabName) {
          var i;
          var x = document.getElementsByClassName("wpftab");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
          document.getElementById(tabName).style.display = "block";
        }
        </script>
      </td>
      <td style="width:350px" >
        <img src="<?php esc_html_e( plugin_dir_url( __DIR__ ) . 'img/' ); ?>funos-logo-450x450.png" alt="nic-app" width="350" height="350">
      </td>
    </tr>
  </table>
  <hr />
</div>
