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

$args = array(
  'post_type' => 'servicios_wpfunos',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'meta_query' => array(
    array( 'key' => 'wpfunos_servicioActivo', 'value' => '1', 'compare' => '=', ),
  ),
);
$servicios_list = get_posts( $args );
?>
<style>
#myProgress, #serviciosProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar, #serviciosBar {
  width: 1%;
  height: 30px;
  background-color: #04AA6D;
}
</style>
<div class="wrap">
  <h2><?php esc_html_e( get_admin_page_title() .' '.$this->version. ' ('  .get_option( "wpf_db_version" ). ')' ); ?></h2>
  <?php settings_errors(); ?>
  <h3><?php esc_html_e( 'Configuración WpFunos', 'wpfunos' )?></h3>
  <table style="width:100%">
    <tr>
      <td>
        <div id="config" style="top: -300px;position: relative;" >
          <?php include 'admin-menu/wpfunos-admin-menu-enlaces-superior.php';	?>
          <hr />
          <div id="spreadsheet">
            <h2>Hojas de cálculo</h2>
            <form action="" method="post">
              <input type="hidden" name="hojascalculo" id="hojascalculo" value="1" >
              <div class="wpfunos-hojascalculo">
                <input type="submit" value="<?php _e( 'Crear hojas de cálculo', 'wpfunos' ); ?>" style="background: #135e96;color: #fff;padding: 5px;font-weight: 700;margin-top: 10px;border-radius: 3px;">
              </div>
            </form>
            <hr/>
            <script>console.log('Hojas de cálculo.' );</script>
            <?php do_action('wpfunos_hojas_calculo'); ?>
          </div>
        </div>
      </td>
      <td style="width:350px" >
        <img src="<?php esc_html_e( plugin_dir_url( __DIR__ ) . 'img/' ); ?>funos-logo-450x450.png" alt="nic-app" width="350" height="350">
      </td>
    </tr>
  </table>
  <hr />
  <h2>Actualización completa indices funerarias <?php echo count($post_list); ?> Servicios</h2>
  <span id="contador"></span>
  <div id="myProgress" cuantos="<?php echo count($post_list); ?>" hechos="">
    <div id="myBar"><span id="porcentaje"></span></div>
  </div>
  <br>
  <button onclick="procesar(0, 50);return false;">Actualizar</button>

  <hr />
  <h2>Creación nuevos indices funerarias <?php echo count($servicios_list); ?> Servicios</h2>
  <span id="contador_servicios"></span>
  <div id="serviciosProgress" cuantos="<?php echo count($servicios_list); ?>" hechos="">
    <div id="serviciosBar"><span id="serviciosporcentaje"></span></div>
  </div>
  <br>
  <button onclick="procesar_servicios(0, 3);return false;">Actualizar</button>
</div>

<script>

document.getElementById('porcentaje').style.color='#fff';
document.getElementById('porcentaje').style.paddingLeft = '50%';
document.getElementById('serviciosporcentaje').style.color='#fff';
document.getElementById('serviciosporcentaje').style.paddingLeft = '50%';

function procesar( offset, batch ){
  var cuantos = document.getElementById('myProgress').getAttribute('cuantos');

  if( offset > cuantos ){
    document.getElementById('contador').innerHTML = cuantos;
    document.getElementById('myProgress').setAttribute('hechos', cuantos );
    document.getElementById('porcentaje').innerHTML = '100%';
    document.getElementById('myBar').style.width = '100%';
    return;
  }

  if( offset > 0 ){
    document.getElementById('contador').innerHTML = offset;
    document.getElementById('myProgress').setAttribute('hechos',offset)
    document.getElementById('porcentaje').innerHTML = Math.round(((offset*100)/cuantos) * 100) / 100 + '%';
    document.getElementById('myBar').style.width = (offset*100)/cuantos + '%';
  }

  jQuery.ajax({
    type : 'post',
    dataType : 'json',
    url : WpfAjax.ajaxurl,
    data: {
      'action': 'wpfunos_ajax_v3_procesar_actualizar_precios',
      'offset': offset,
      'batch' : batch,
    },
    success: function(response) {
      if(response.type === 'success') {
        newoffset = response.newoffset;
        procesar( newoffset, batch );
      }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      if (textStatus == 'parsererror') {
        textStatus = 'Technical error: Unexpected response returned by server. Sending stopped.';
      }
      alert(textStatus);
    }
  });
}
function procesar_servicios( offset, batch ){
  var cuantos = document.getElementById('serviciosProgress').getAttribute('cuantos');
  if( offset > cuantos ){
    document.getElementById('contador_servicios').innerHTML = cuantos;
    document.getElementById('serviciosProgress').setAttribute('hechos', cuantos );
    document.getElementById('serviciosporcentaje').innerHTML = '100%';
    document.getElementById('serviciosBar').style.width = '100%';
    return;
  }

  if( offset > 0 ){
    document.getElementById('contador_servicios').innerHTML = offset;
    document.getElementById('serviciosProgress').setAttribute('hechos',offset)
    document.getElementById('serviciosporcentaje').innerHTML = Math.round(((offset*100)/cuantos) * 100) / 100 + '%';
    document.getElementById('serviciosBar').style.width = (offset*100)/cuantos + '%';
  }

  jQuery.ajax({
    type : 'post',
    dataType : 'json',
    url : WpfAjax.ajaxurl,
    data: {
      'action': 'wpfunos_ajax_v3_procesar_actualizar_servicios',
      'offset': offset,
      'batch' : batch,
    },
    success: function(response) {
      if(response.type === 'success') {
        newoffset = response.newoffset;
        procesar_servicios( newoffset, batch );
      }
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
