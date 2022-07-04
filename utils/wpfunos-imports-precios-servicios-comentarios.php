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
      CREAR NUEVAS ENTRADAS DE COMENTARIOS EN CAMPOS DE SERVICIOS
    </h3>

    <p>
      Este proceso rellenará los campos del nuevo comparador. Si los campos ya tienen valores no se modificarán.
    </p>
    <form method="post" enctype="multipart/form-data" action="">
      <p>
        <input type="hidden" name="importprecioservicioscomentarios" id="importprecioservicioscomentarios" value="1"/>
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
  'meta_query' => array(
    array( 'key' => 'wpfunos_servicioActivo', 'value' => '1', 'compare' => '=', ),
  ),
);
$contador=0;
$contadorTrue=0;
$post_list = get_posts( $args );
$this->custom_logs('Wpfunos services: ' .count($post_list)  );
if( $post_list ){
  foreach ( $post_list as $post ) {
    $precio[0] = $Base = get_post_meta( $post->ID, 'wpfunos_servicioPrecioBase', true );
    $precio[1] = $Entierro = get_post_meta( $post->ID, 'wpfunos_servicioDestino_1Precio', true );
    $precio[2] = $Incineracion = get_post_meta( $post->ID, 'wpfunos_servicioDestino_2Precio', true );
    $precio[3] = $Normal = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_2Precio', true );
    $precio[4] = $Economico = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_1Precio', true );
    $precio[5] = $Premium = get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_3Precio', true );
    $precio[6] = $Velatorio  = get_post_meta( $post->ID, 'wpfunos_servicioVelatorioPrecio', true );
    $precio[7] = $VelatorioNo  = get_post_meta( $post->ID, 'wpfunos_servicioVelatorioNoPrecio', true );
    $precio[8] = $SinCeremonia  = '0';
    $precio[9] = $SoloSala  = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_1Precio', true );
    $precio[10] = $Civil  = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_2Precio', true );
    $precio[11] = $Religiosa  = get_post_meta( $post->ID, 'wpfunos_servicioDespedida_3Precio', true );

    foreach ( $tipos as $key=>$value ){

      $valor[1] = substr( $value, 0, 1);
      $valor[2] = substr( $value, 1, 1);
      $valor[3] = substr( $value, 2, 1);
      if( substr( $value, 3, 1) == '8' ) $valor[4] = '8';
      if( substr( $value, 3, 1) == '9' ) $valor[4] = '9';
      if( substr( $value, 3, 1) == 'A' ) $valor[4] = '10';
      if( substr( $value, 3, 1) == 'B' ) $valor[4] = '11';

      if( $precio[ (int)$valor[1] ] != '' && $precio[ (int)$valor[2] ] != '' && $precio[ (int)$valor[3] ] != '' && $precio[ (int)$valor[4] ] != '' ){
        $comentarioactual = get_post_meta( $post->ID, 'wpfunos_servicio'.$key.'_Comentario', true );

        if( strlen($comentarioactual) < 5){
          $comentarios = '<h4><strong>¿Qué está incluido en el precio?</strong></h4>';

          if( substr( $value, 0, 1) == 'E' ){
            $comentarios .= '<h4><strong>¿Qué está incluido en entierro?</strong></h4>';
            $customfield_content = apply_filters( 'the_content', get_post_meta( $post->ID, 'wpfunos_servicioDestino_1Comentario', true ) );
            $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
            $comentarios .= $customfield_content ;
          }

          if( substr( $value, 0, 1) == 'I' ) {
            $comentarios .= '<h4><strong>¿Qué está incluido en incineración?</strong></h4>';
            $customfield_content = apply_filters( 'the_content', get_post_meta( $post->ID, 'wpfunos_servicioDestino_2Comentario', true ) );
            $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
            $comentarios .= $customfield_content ;
          }

          if( substr( $value, 1, 1) == 'E' ) {
            $comentarios .= '<h4><strong>¿Qué está incluido en ataúd gama económica?</strong></h4>';
            $customfield_content = apply_filters( 'the_content', get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_1Comentario', true ) );
            $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
            $comentarios .= $customfield_content ;
          }

          if( substr( $value, 1, 1) == 'M' ) {
            $comentarios .= '<h4><strong>¿Qué está incluido en ataúd gama media?</strong></h4>';
            $customfield_content = apply_filters( 'the_content', get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_2Comentario', true ) );
            $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
            $comentarios .= $customfield_content ;
          }

          if( substr( $value, 1, 1) == 'P' ) {
            $comentarios .= '<h4><strong>¿Qué está incluido en ataúd gama premium?</strong></h4>';
            $customfield_content = apply_filters( 'the_content', get_post_meta( $post->ID, 'wpfunos_servicioAtaudEcologico_3Comentario', true ) );
            $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
            $comentarios .= $customfield_content ;
          }

          if( substr( $value, 2, 1) == 'S' ) {
            $comentarios .= '<h4><strong>¿Qué está incluido en velatorio?</strong></h4>';
            $customfield_content = apply_filters( 'the_content', get_post_meta( $post->ID, 'wpfunos_servicioVelatorioNoComentario', true ) );
            $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
            $comentarios .= $customfield_content ;
          }

          if( substr( $value, 2, 1) == 'V' ) {
            $comentarios .= '<h4><strong>¿Qué está incluido en velatorio?</strong></h4>';
            $customfield_content = apply_filters( 'the_content', get_post_meta( $post->ID, 'wpfunos_servicioVelatorioComentario', true ) );
            $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
            $comentarios .= $customfield_content ;
          }

          if( substr( $value, 3, 1) == 'O' ) {
            $comentarios .= '<h4><strong>¿Qué está incluido en ceremonia Sólo la sala?</strong></h4>';
            $customfield_content = apply_filters( 'the_content', get_post_meta( $post->ID, 'wpfunos_servicioDespedida_1Comentario', true ) );
            $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
            $comentarios .= $customfield_content ;
          }

          if( substr( $value, 3, 1) == 'C' ) {
            $comentarios .= '<h4><strong>¿Qué está incluido en ceremonia civil?</strong></h4>';
            $customfield_content = apply_filters( 'the_content', get_post_meta( $post->ID, 'wpfunos_servicioDespedida_2Comentario', true ) );
            $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
            $comentarios .= $customfield_content ;
          }

          if( substr( $value, 3, 1) == 'R' ) {
            $comentarios .= '<h4><strong>¿Qué está incluido en ceremonia religiosa?</strong></h4>';
            $customfield_content = apply_filters( 'the_content', get_post_meta( $post->ID, 'wpfunos_servicioDespedida_3Comentario', true ) );
            $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
            $comentarios .= $customfield_content ;
          }

          if( strlen( get_post_meta( $pots->ID, 'wpfunos_servicioPosiblesExtras', true ) )> 0 ){
            $comentarios .= '<h4><strong>Posibles Extras</strong></h4>';
            $customfield_content = apply_filters( 'the_content', get_post_meta( $post->ID, 'wpfunos_servicioPosiblesExtras', true ) );
            $customfield_content = str_replace( ']]>', ']]&gt;', $customfield_content  );
            $comentarios .= $customfield_content ;
          }


          update_post_meta( $post->ID, 'wpfunos_servicio'.$key.'_Comentario', $comentarios );


          $contadorTrue ++;
        }

        $contador ++;
      }


    }


  }
  wp_reset_postdata();
}
echo 'Encontrados ' .$contador. ' precios válidos. Se actualizaron ' .$contadorTrue. ' registros.';
