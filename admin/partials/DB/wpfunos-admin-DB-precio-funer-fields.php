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
* @subpackage Wpfunos/admin/partials/DB
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
$precioFunerariaPoblacion = sanitize_text_field( $_POST['wpfunos_precioFunerariaPoblacion'] );
$precioFunerariaTitulo = sanitize_text_field( $_POST['wpfunos_precioFunerariaTitulo'] );
$precioFunerariaURL = sanitize_text_field( $_POST['wpfunos_precioFunerariaURL'] );
$precioFunerariaPrecioDesde = sanitize_text_field( $_POST['wpfunos_precioFunerariaPrecioDesde'] );
$precioFunerariaImagenDestacada = sanitize_text_field( $_POST['wpfunos_precioFunerariaImagenDestacada'] );
$precioFunerariaImagenPortada = sanitize_text_field( $_POST['wpfunos_precioFunerariaImagenPortada'] );
$precioFunerariaImagen2 = sanitize_text_field( $_POST['wpfunos_precioFunerariaImagen2'] );
$precioFunerariaImagen3 = sanitize_text_field( $_POST['wpfunos_precioFunerariaImagen3'] );
$precioFunerariaImagen4 = sanitize_text_field( $_POST['wpfunos_precioFunerariaImagen4'] );
$precioFunerariaCodigoPoblacion = sanitize_text_field( $_POST['wpfunos_precioFunerariaCodigoPoblacion'] );
//
$precioFunerariaEntierroDesde = sanitize_text_field( $_POST['wpfunos_precioFunerariaEntierroDesde'] );
$precioFunerariaIncineracionDesde = sanitize_text_field( $_POST['wpfunos_precioFunerariaIncineracionDesde'] );
$precioFunerariaEntierroVelatorioDesde = sanitize_text_field( $_POST['wpfunos_precioFunerariaEntierroVelatorioDesde'] );
$precioFunerariaIncineracionVelatorioDesde = sanitize_text_field( $_POST['wpfunos_precioFunerariaIncineracionVelatorioDesde'] );
$precioFunerariaEntierroVelatorioCeremoniaDesde = sanitize_text_field( $_POST['wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde'] );
$precioFunerariaIncineracionVelatorioCeremoniaDesde = sanitize_text_field( $_POST['wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde'] );
$precioFunerariaEntierroPremiumDesde = sanitize_text_field( $_POST['wpfunos_precioFunerariaEntierroPremiumDesde'] );
$precioFunerariaIncineracionPremiumDesde = sanitize_text_field( $_POST['wpfunos_precioFunerariaIncineracionPremiumDesde'] );
//
$precioIncineracionBasicoDesde = sanitize_text_field( $_POST['wpfunos_precioIncineracionBasicoDesde'] );
$precioIncineracionCeremoniaDesde = sanitize_text_field( $_POST['wpfunos_precioIncineracionCeremoniaDesde'] );
$precioIncineracionVelatorioDesde = sanitize_text_field( $_POST['wpfunos_precioIncineracionVelatorioDesde'] );
//
$precioFunerariaEnlaceAhora = sanitize_text_field( $_POST['wpfunos_precioFunerariaEnlaceAhora'] );
$precioFunerariaEnlaceProximamente = sanitize_text_field( $_POST['wpfunos_precioFunerariaEnlaceProximamente'] );
$precioFunerariaEnlaceVerPrecios = sanitize_text_field( $_POST['wpfunos_precioFunerariaEnlaceVerPrecios'] );
//
$precioFunerariaEntierroDesdeEnlace = sanitize_text_field( $_POST['wpfunos_precioFunerariaEntierroDesdeEnlace'] );
$precioFunerariaIncineracionDesdeEnlace = sanitize_text_field( $_POST['wpfunos_precioFunerariaIncineracionDesdeEnlace'] );
$precioFunerariaEntierroVelatorioDesdeEnlace = sanitize_text_field( $_POST['wpfunos_precioFunerariaEntierroVelatorioDesdeEnlace'] );
$precioFunerariaIncineracionVelatorioDesdeEnlace = sanitize_text_field( $_POST['wpfunos_precioFunerariaIncineracionVelatorioDesdeEnlace'] );
$precioFunerariaEntierroVelatorioCeremoniaDesdeEnlace = sanitize_text_field( $_POST['wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesdeEnlace'] );
$precioFunerariaIncineracionVelatorioCeremoniaDesdeEnlace = sanitize_text_field( $_POST['wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesdeEnlace'] );
$precioFunerariaEntierroPremiumDesdeEnlace = sanitize_text_field( $_POST['wpfunos_precioFunerariaEntierroPremiumDesdeEnlace'] );
$precioFunerariaIncineracionPremiumDesdeEnlace = sanitize_text_field( $_POST['wpfunos_precioFunerariaIncineracionPremiumDesdeEnlace'] );
//
$precioIncineracionBasicoDesdeEnlace = sanitize_text_field( $_POST['wpfunos_precioIncineracionBasicoDesdeEnlace'] );
$precioIncineracionCeremoniaDesdeEnlace = sanitize_text_field( $_POST['wpfunos_precioIncineracionCeremoniaDesdeEnlace'] );
$precioIncineracionVelatorioDesdeEnlace = sanitize_text_field( $_POST['wpfunos_precioIncineracionVelatorioDesdeEnlace'] );
//
$precioFunerariaPaginasRelacionadas = sanitize_text_field( $_POST['wpfunos_precioFunerariaPaginasRelacionadas'] );
$precioFunerariaPoblacionesCercanas = wp_kses_post( $_POST['wpfunos_precioFunerariaPoblacionesCercanas'] );
$precioFunerariaTextoLibre = wp_kses_post( $_POST['wpfunos_precioFunerariaTextoLibre'] );
$SeoEntierro = sanitize_text_field( $_POST['SeoEntierro'] );
$SeoIncineracion = sanitize_text_field( $_POST['SeoIncineracion'] );
$SeoDesde = sanitize_text_field( $_POST['SeoDesde'] );

update_post_meta($post_id, 'wpfunos_precioFunerariaPoblacion', $precioFunerariaPoblacion);
update_post_meta($post_id, 'wpfunos_precioFunerariaTitulo', $precioFunerariaTitulo);
update_post_meta($post_id, 'wpfunos_precioFunerariaURL', $precioFunerariaURL);
update_post_meta($post_id, 'wpfunos_precioFunerariaPrecioDesde', $precioFunerariaPrecioDesde);
update_post_meta($post_id, 'wpfunos_precioFunerariaImagenDestacada', $precioFunerariaImagenDestacada);
update_post_meta($post_id, 'wpfunos_precioFunerariaImagenPortada', $precioFunerariaImagenPortada);
update_post_meta($post_id, 'wpfunos_precioFunerariaImagen2', $precioFunerariaImagen2);
update_post_meta($post_id, 'wpfunos_precioFunerariaImagen3', $precioFunerariaImagen3);
update_post_meta($post_id, 'wpfunos_precioFunerariaImagen4', $precioFunerariaImagen4);
update_post_meta($post_id, 'wpfunos_precioFunerariaCodigoPoblacion', $precioFunerariaCodigoPoblacion);

update_post_meta($post_id, 'wpfunos_precioFunerariaEntierroDesde', $precioFunerariaEntierroDesde);
update_post_meta($post_id, 'wpfunos_precioFunerariaIncineracionDesde', $precioFunerariaIncineracionDesde);
update_post_meta($post_id, 'wpfunos_precioFunerariaEntierroVelatorioDesde', $precioFunerariaEntierroVelatorioDesde);
update_post_meta($post_id, 'wpfunos_precioFunerariaIncineracionVelatorioDesde', $precioFunerariaIncineracionVelatorioDesde);
update_post_meta($post_id, 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesde', $precioFunerariaEntierroVelatorioCeremoniaDesde);
update_post_meta($post_id, 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesde', $precioFunerariaIncineracionVelatorioCeremoniaDesde);
update_post_meta($post_id, 'wpfunos_precioFunerariaEntierroPremiumDesde', $precioFunerariaEntierroPremiumDesde);
update_post_meta($post_id, 'wpfunos_precioFunerariaIncineracionPremiumDesde', $precioFunerariaIncineracionPremiumDesde);

update_post_meta($post_id, 'wpfunos_precioIncineracionBasicoDesde', $precioIncineracionBasicoDesde);
update_post_meta($post_id, 'wpfunos_precioIncineracionCeremoniaDesde', $precioIncineracionCeremoniaDesde);
update_post_meta($post_id, 'wpfunos_precioIncineracionVelatorioDesde', $precioIncineracionVelatorioDesde);

update_post_meta($post_id, 'wpfunos_precioFunerariaEnlaceAhora', $precioFunerariaEnlaceAhora);
update_post_meta($post_id, 'wpfunos_precioFunerariaEnlaceProximamente', $precioFunerariaEnlaceProximamente);
update_post_meta($post_id, 'wpfunos_precioFunerariaEnlaceVerPrecios', $precioFunerariaEnlaceVerPrecios);

update_post_meta($post_id, 'wpfunos_precioFunerariaEntierroDesdeEnlace', $precioFunerariaEntierroDesdeEnlace);
update_post_meta($post_id, 'wpfunos_precioFunerariaIncineracionDesdeEnlace', $precioFunerariaIncineracionDesdeEnlace);
update_post_meta($post_id, 'wpfunos_precioFunerariaEntierroVelatorioDesdeEnlace', $precioFunerariaEntierroVelatorioDesdeEnlace);
update_post_meta($post_id, 'wpfunos_precioFunerariaIncineracionVelatorioDesdeEnlace', $precioFunerariaIncineracionVelatorioDesdeEnlace);
update_post_meta($post_id, 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesdeEnlace', $precioFunerariaEntierroVelatorioCeremoniaDesdeEnlace);
update_post_meta($post_id, 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesdeEnlace', $precioFunerariaIncineracionVelatorioCeremoniaDesdeEnlace);
update_post_meta($post_id, 'wpfunos_precioFunerariaEntierroPremiumDesdeEnlace', $precioFunerariaEntierroPremiumDesdeEnlace);
update_post_meta($post_id, 'wpfunos_precioFunerariaIncineracionPremiumDesdeEnlace', $precioFunerariaIncineracionPremiumDesdeEnlace);

update_post_meta($post_id, 'wpfunos_precioIncineracionBasicoDesdeEnlace', $precioIncineracionBasicoDesdeEnlace);
update_post_meta($post_id, 'wpfunos_precioIncineracionCeremoniaDesdeEnlace', $precioIncineracionCeremoniaDesdeEnlace);
update_post_meta($post_id, 'wpfunos_precioIncineracionVelatorioDesdeEnlace', $precioIncineracionVelatorioDesdeEnlace);

update_post_meta($post_id, 'wpfunos_precioFunerariaPaginasRelacionadas', $precioFunerariaPaginasRelacionadas);
update_post_meta($post_id, 'wpfunos_precioFunerariaPoblacionesCercanas', $precioFunerariaPoblacionesCercanas);
update_post_meta($post_id, 'wpfunos_precioFunerariaTextoLibre', $precioFunerariaTextoLibre);
update_post_meta($post_id, 'SeoEntierro', $SeoEntierro);
update_post_meta($post_id, 'SeoIncineracion', $SeoIncineracion);
update_post_meta($post_id, 'SeoDesde', $SeoDesde);
