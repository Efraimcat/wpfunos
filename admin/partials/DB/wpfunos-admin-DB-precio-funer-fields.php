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
$precioFunerariaPoblacion = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaPoblacion'] );
$precioFunerariaTitulo = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaTitulo'] );
$precioFunerariaURL = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaURL'] );
$precioFunerariaPrecioDesde = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaPrecioDesde'] );
$precioFunerariaImagenDestacada = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaImagenDestacada'] );
$precioFunerariaImagenPortada = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaImagenPortada'] );
$precioFunerariaImagen2 = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaImagen2'] );
$precioFunerariaImagen3 = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaImagen3'] );
$precioFunerariaImagen4 = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaImagen4'] );
$precioFunerariaCodigoPoblacion = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaCodigoPoblacion'] );
$precioFunerariaEntierroDesde = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaEntierroDesde'] );
$precioFunerariaIncineracionDesde = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaIncineracionDesde'] );
$precioFunerariaEntierroVelatorioDesde = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaEntierroVelatorioDesde'] );
$precioFunerariaIncineracionVelatorioDesde = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaIncineracionVelatorioDesde'] );
$precioFunerariaEntierroVelatorioCeremoniaDesde = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaEntierroVelatorioCeremoniaDesde'] );
$precioFunerariaIncineracionVelatorioCeremoniaDesde = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaIncineracionVelatorioCeremoniaDesde'] );
$precioFunerariaEntierroPremiumDesde = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaEntierroPremiumDesde'] );
$precioFunerariaIncineracionPremiumDesde = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaIncineracionPremiumDesde'] );
$precioFunerariaPaginasRelacionadas = sanitize_text_field( $_POST[$this->plugin_name . '_precioFunerariaPaginasRelacionadas'] );
$precioFunerariaPoblacionesCercanas = wp_kses_post( $_POST[$this->plugin_name . '_precioFunerariaPoblacionesCercanas'] );
$precioFunerariaTextoLibre = wp_kses_post( $_POST[$this->plugin_name . '_precioFunerariaTextoLibre'] );
$SeoEntierro = sanitize_text_field( $_POST['SeoEntierro'] );
$SeoIncineracion = sanitize_text_field( $_POST['SeoIncineracion'] );
$SeoDesde = sanitize_text_field( $_POST['SeoDesde'] );

update_post_meta($post_id, $this->plugin_name . '_precioFunerariaPoblacion', $precioFunerariaPoblacion);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaTitulo', $precioFunerariaTitulo);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaURL', $precioFunerariaURL);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaPrecioDesde', $precioFunerariaPrecioDesde);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaImagenDestacada', $precioFunerariaImagenDestacada);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaImagenPortada', $precioFunerariaImagenPortada);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaImagen2', $precioFunerariaImagen2);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaImagen3', $precioFunerariaImagen3);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaImagen4', $precioFunerariaImagen4);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaCodigoPoblacion', $precioFunerariaCodigoPoblacion);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaEntierroDesde', $precioFunerariaEntierroDesde);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaIncineracionDesde', $precioFunerariaIncineracionDesde);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaEntierroVelatorioDesde', $precioFunerariaEntierroVelatorioDesde);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaIncineracionVelatorioDesde', $precioFunerariaIncineracionVelatorioDesde);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaEntierroVelatorioCeremoniaDesde', $precioFunerariaEntierroVelatorioCeremoniaDesde);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaIncineracionVelatorioCeremoniaDesde', $precioFunerariaIncineracionVelatorioCeremoniaDesde);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaEntierroPremiumDesde', $precioFunerariaEntierroPremiumDesde);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaIncineracionPremiumDesde', $precioFunerariaIncineracionPremiumDesde);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaPaginasRelacionadas', $precioFunerariaPaginasRelacionadas);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaPoblacionesCercanas', $precioFunerariaPoblacionesCercanas);
update_post_meta($post_id, $this->plugin_name . '_precioFunerariaTextoLibre', $precioFunerariaTextoLibre);
update_post_meta($post_id, 'SeoEntierro', $SeoEntierro);
update_post_meta($post_id, 'SeoIncineracion', $SeoIncineracion);
update_post_meta($post_id, 'SeoDesde', $SeoDesde);
