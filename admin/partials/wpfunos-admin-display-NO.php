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
$args = array(
  'post_type' => 'precio_serv_wpfunos',
  'post_status' => 'publish',
  'posts_per_page' => -1,
);
$indices_list = get_posts( $args );

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
#preciosProgress, #serviciosProgress {
  width: 100%;
  background-color: #ddd;
}

#preciosBar, #serviciosBar {
  width: 1%;
  height: 30px;
  background-color: #04AA6D;
}
</style>
<div class="wrap">
  <h2><?php esc_html_e( get_admin_page_title() .' '.$this->version. ' ('  .get_option( "wpf_db_version" ). ')' ); ?></h2>
  <?php settings_errors(); ?>
  <h3><?php esc_html_e( 'WpFunos', 'wpfunos' )?></h3>
  <div style="margin-top: 10px;margin-bottom: 10px;"><?php echo date_i18n( 'd F Y H:i:s', current_time( 'timestamp', 0 ) );?></div>

  <hr />
  <h2><strong>Actualización índices precios funerarias: <?php echo count($servicios_list); ?> servicios.</strong></h2>
  <div id="actualizacionPrecios">
    <span>Precios</span>
    <span id="contador_precios"></span>
    <div id="preciosProgress" cuantos="<?php echo count($servicios_list); ?>" hechos="">
      <div id="preciosBar"><span id="preciosporcentaje"></span></div>
    </div>
    <br>
    <div id="botonPrecios">
      <button onclick="procesar_precios();return false;">Actualizar precios</button>
    </div>
  </div>
  <div>
    <span>Servicios</span>
    <span id="contador_servicios"></span>
    <div id="serviciosProgress" cuantos="<?php echo count($servicios_list); ?>" hechos="">
      <div id="serviciosBar"><span id="serviciosporcentaje"></span></div>
    </div>
    <div id="botonServicios">
      <button onclick="procesar_servicios();return false;">Actualizar servicios</button>
    </div>
  </div>
  <hr />
  <table style="width:100%">
    <tr>
      <td>
        <div id="directorio" style="top: -300px;position: relative;" >
          <?php include 'admin-menu/wpfunos-admin-menu-enlaces-superior.php';	?>
        </div>
      </td>
      <td style="width:350px" >
        <img src="<?php esc_html_e( plugin_dir_url( __DIR__ ) . 'img/' ); ?>funos-logo-450x450.png" alt="nic-app" width="350" height="350">
      </td>
    </tr>
  </table>
  <hr />
</div>

<script>
document.getElementById('preciosporcentaje').style.color='#fff';
document.getElementById('preciosporcentaje').style.paddingLeft = '50%';
document.getElementById('serviciosporcentaje').style.color='#fff';
document.getElementById('serviciosporcentaje').style.paddingLeft = '50%';

function procesar_precios(){
  let text = "Confirme que desea actualizar los índices. La operación puede tardar 30 minutos";
  if (confirm(text) != true) {
    return;
  }
  procesarPrecios(0,25);
}
function procesar_servicios(){
  procesarServicios( 0, 5 );
}
function procesarPrecios( offset, batch ){
  var cuantos = document.getElementById('preciosProgress').getAttribute('cuantos');
  if( offset > cuantos ){
    document.getElementById('contador_precios').innerHTML = cuantos;
    document.getElementById('preciosProgress').setAttribute('hechos', cuantos );
    document.getElementById('preciosporcentaje').innerHTML = '100%';
    document.getElementById('preciosBar').style.width = '100%';
    return;
  }
  if( offset > 0 ){
    document.getElementById('contador_precios').innerHTML = offset;
    document.getElementById('preciosProgress').setAttribute('hechos',offset)
    document.getElementById('preciosporcentaje').innerHTML = Math.round(((offset*100)/cuantos) * 100) / 100 + '%';
    document.getElementById('preciosBar').style.width = (offset*100)/cuantos + '%';
  }

  jQuery.ajax({
    type : 'post',
    dataType : 'json',
    url : WpfAjax.ajaxurl,
    data: {
      'action': 'wpfunos_ajax_v3_procesar_actualizar_preciosV3',
      'offset': offset,
      'batch' : batch,
    },
    success: function(response) {
      if(response.type === 'success') {
        newoffset = response.newoffset;
        procesarPrecios( newoffset, batch );
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

function procesarServicios( offset, batch ){
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
