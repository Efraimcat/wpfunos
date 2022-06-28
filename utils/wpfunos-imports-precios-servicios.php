<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* Utilidades.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/utils
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
if( !isset ($_POST['submit']) ){
  ?>
  <div class="wpfunos-imports">
    <h3>
      CREAR NUEVAS ENTRADAS EN CAMPOS DE SERVICIOS
    </h3>

    <p>
      Este proceso rellenará los campos del nuevo comparador. Si los campos ya tienen valores no se modificarán.
    </p>
    <form method="post" enctype="multipart/form-data" action="">
      <p>
        <input type="hidden" name="importprecioservicios" id="importprecioservicios" value="1"/>
        <?php wp_nonce_field( 'wpfunos_import_precios_servicios_nonce', 'wpfunos_import_precios_servicios_nonce' ); ?>
        <?php submit_button( __( 'Importar precios servicios', 'wpfunos' ), 'secondary', 'submit', false );?>
      </p>
    </form>
  </div>
  
  <?php
  return;
}
if ( empty( $_POST['wpfunos_import_precios_servicios_nonce'] ) ) {
  ?><h1>ERROR AL IMPORTAR PRECIOS SERVICIOS 1</h1><?php
  wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
// verify nonce
if ( ! wp_verify_nonce( $_POST['wpfunos_import_precios_servicios_nonce'], 'wpfunos_import_precios_servicios_nonce' ) ) {
  ?><h1>ERROR AL IMPORTAR PRECIOS SERVICIOS 2</h1><?php
  wp_die( __( 'Cheatin\' eh?!', 'wpfunos' ) );
}
echo '<strong>Actualizando registros nuevos precios servicios</strong><br/>';
$tipos = array(
  "EESS" => '1478', "EESO" => '1479', "EESC" => '147A', "EESR" => '147B',
  "EEVS" => '1468', "EEVO" => '1469', "EEVC" => '146A', "EEVR" => '146B',
  "EMSS" => '1378', "EMSO" => '1379', "EMSC" => '137A', "EMSR" => '137B',
  "EMVS" => '1368', "EMVO" => '1369', "EMVC" => '136A', "EMVR" => '136B',
  "EPSS" => '1578', "EPSO" => '1579', "EPSC" => '157A', "EPSR" => '157B',
  "EPVS" => '1568', "EPVO" => '1569', "EPVC" => '156A', "EPVR" => '156B',
  "IESS" => '2478', "IESO" => '2479', "IESC" => '247A', "IESR" => '247B',
  "IEVS" => '2468', "IEVO" => '2469', "IEVC" => '246A', "IEVR" => '246B',
  "IMSS" => '2378', "IMSO" => '2379', "IMSC" => '237A', "IMSR" => '237B',
  "IMVS" => '2368', "IMVO" => '2369', "IMVC" => '236A', "IMVR" => '236B',
  "IPSS" => '2578', "IPSO" => '2579', "IPSC" => '257A', "IPSR" => '257B',
  "IPVS" => '2568', "IPVO" => '2569', "IPVC" => '256A', "IPVR" => '256B',
);
$args = array(
  'post_type' => 'servicios_wpfunos',
  'post_status' => 'publish',
  'posts_per_page' => -1,
);
$contador=0;
$contadorTrue=0;
$post_list = get_posts( $args );
$this->custom_logs('Wpfunos services: ' .count($post_list)  );
if( $post_list ){
  foreach ( $post_list as $post ) {
    $precio[0] = $Base = get_post_meta( $post->ID, $this->plugin_name . '_servicioPrecioBase', true );
    $precio[1] = $Entierro = get_post_meta( $post->ID, $this->plugin_name . '_servicioDestino_1Precio', true );
    $precio[2] = $Incineracion = get_post_meta( $post->ID, $this->plugin_name . '_servicioDestino_2Precio', true );
    $precio[3] = $Normal = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaudEcologico_2Precio', true );
    $precio[4] = $Economico = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaudEcologico_1Precio', true );
    $precio[5] = $Premium = get_post_meta( $post->ID, $this->plugin_name . '_servicioAtaudEcologico_3Precio', true );
    $precio[6] = $Velatorio  = get_post_meta( $post->ID, $this->plugin_name . '_servicioVelatorioPrecio', true );
    $precio[7] = $VelatorioNo  = get_post_meta( $post->ID, $this->plugin_name . '_servicioVelatorioNoPrecio', true );
    $precio[8] = $SinCeremonia  = '0';
    $precio[9] = $SoloSala  = get_post_meta( $post->ID, $this->plugin_name . '_servicioDespedida_1Precio', true );
    $precio[10] = $Civil  = get_post_meta( $post->ID, $this->plugin_name . '_servicioDespedida_2Precio', true );
    $precio[11] = $Religiosa  = get_post_meta( $post->ID, $this->plugin_name . '_servicioDespedida_3Precio', true );

    foreach ( $tipos as $key=>$value ){
      $valor[1] = substr( $value, 0, 1);
      $valor[2] = substr( $value, 1, 1);
      $valor[3] = substr( $value, 2, 1);
      if( substr( $value, 3, 1) == '8' ) $valor[4] = '8';
      if( substr( $value, 3, 1) == '9' ) $valor[4] = '9';
      if( substr( $value, 3, 1) == 'A' ) $valor[4] = '10';
      if( substr( $value, 3, 1) == 'B' ) $valor[4] = '11';
      //
      //echo 'Servicio: ' .$post->ID. ' Tipo: ' .$key. ' Valores: ' .$valor[1]. '|' .$valor[2]. '|' .$valor[3]. '|' .$valor[4]. ' => '
      // .$precio[0]. '-'.$precio[ (int)$valor[1] ]. '-' .$precio[ (int)$valor[2] ]. '-' .$precio[ (int)$valor[3] ]. '-' .$precio[ (int)$valor[4] ]. '<br/>';
      if( $precio[ (int)$valor[1] ] != '' && $precio[ (int)$valor[2] ] != '' && $precio[ (int)$valor[3] ] != '' && $precio[ (int)$valor[4] ] != '' ){
        $total = (int)$precio[0] + (int)$precio[ (int)$valor[1] ] + (int)$precio[ (int)$valor[2] ] + (int)$precio[ (int)$valor[3] ] + (int)$precio[ (int)$valor[4] ];
        //echo 'Servicio: ' .$post->ID. ' Tipo: ' .$key. ' TOTAL: ' .$total. '<br/>';
        $precioactual = get_post_meta( $post->ID, 'wpfunos_servicio'.$key, true );
        if( $precioactual =! ''){
            update_post_meta( $post->ID, 'wpfunos_servicio'.$key, $total );
            $contadorTrue ++;
        }
        $contador ++;
      }
    }
  }
  wp_reset_postdata();
}
echo 'Encontrados ' .$contador. ' precios válidos. Se actualizaron ' .$contadorTrue. ' registros.';
