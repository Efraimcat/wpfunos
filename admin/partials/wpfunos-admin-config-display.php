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
*
*https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_progressbar_3
*/
/**
*
* 'numberposts' => 5, 'offset' => 0,
* 'numberposts' - Default is 5. Total number of posts to retrieve.
* 'offset' - Default is 0. The number of posts you want to skip.
* $args = array(
*   'post_type' => 'precio_serv_wpfunos',
*   'post_status' => 'publish',
*   'numberposts' => 1,
*   'offset' => x,
* )
*
**/
$args = array(
  'post_type' => 'precio_serv_wpfunos',
  'post_status' => 'publish',
  'posts_per_page' => -1,
);
$post_list = get_posts( $args );
?>
<style>
#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: #04AA6D;
}
</style>
<div class="wrap">
  <h2><?php esc_html_e( get_admin_page_title() .' '.$this->version); ?></h2>
  <?php settings_errors(); ?>
  <h3><?php esc_html_e( 'Configuración WpFunos', 'wpfunos' )?></h3>
  <table style="width:100%">
    <tr>
      <td>
        <div id="config" style="top: -300px;position: relative;" >
          <?php include 'admin-menu/wpfunos-admin-menu-enlaces-superior.php';	?>
        </div>
      </td>
      <td style="width:350px" >
        <img src="<?php esc_html_e( plugin_dir_url( __DIR__ ) . 'img/' ); ?>funos-logo-450x450.png" alt="nic-app" width="350" height="350">
      </td>
    </tr>
  </table>
  <hr />
  <h2>Actualización Precios <?php echo count($post_list); ?> Servicios</h2>
  <span id="contador"></span>
  <div id="myProgress" cuantos="<?php echo count($post_list); ?>" hechos="">
    <div id="myBar"><span id="porcentaje"></span></div>
  </div>
  <br>
  <button onclick="procesar(0);return false;">Actualizar</button>
</div>

<script>

document.getElementById('porcentaje').style.color='#fff';
document.getElementById('porcentaje').style.paddingLeft = '50%';

function procesar(offset){
  var cuantos = document.getElementById('myProgress').getAttribute('cuantos');
  var elem = document.getElementById("myBar");

  if( offset > 0 ){
    document.getElementById('contador').innerHTML = offset;
    document.getElementById('myProgress').setAttribute('hechos',offset)
    document.getElementById('porcentaje').innerHTML = Math.round(((offset*100)/cuantos) * 100) / 100 + "%";
    elem.style.width = (offset*100)/cuantos + "%";
  }

  jQuery.ajax({
    type : 'post',
    dataType : 'json',
    url : WpfAjax.ajaxurl,
    data: {
      'action': 'wpfunos_ajax_v3_procesar_actualizar_precios',
      'offset': offset,
    },
    success: function(response) {
      






    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      if (textStatus == 'parsererror') {
        textStatus = 'Technical error: Unexpected response returned by server. Sending stopped.';
      }
      alert(textStatus);
    }

  });

}

</script>
