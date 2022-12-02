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
$precioFunerariaProvincia = sanitize_text_field( $_POST['wpfunos_precioFunerariaProvincia'] );
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
$precioIncineracionEnlaceAhora = sanitize_text_field( $_POST['wpfunos_precioIncineracionEnlaceAhora'] );
$precioIncineracionEnlaceProximamente = sanitize_text_field( $_POST['wpfunos_precioIncineracionEnlaceProximamente'] );
$precioIncineracionEnlaceVerPrecios = sanitize_text_field( $_POST['wpfunos_precioIncineracionEnlaceVerPrecios'] );
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
$precioFunerariaPaginasRelacionadasTexto = sanitize_text_field( $_POST['wpfunos_precioFunerariaPaginasRelacionadasTexto'] );
$precioFunerariaPoblacionesCercanas = wp_kses_post( $_POST['wpfunos_precioFunerariaPoblacionesCercanas'] );
$precioFunerariaTextoLibre = wp_kses_post( $_POST['wpfunos_precioFunerariaTextoLibre'] );
$SeoEntierro = sanitize_text_field( $_POST['SeoEntierro'] );
$SeoIncineracion = sanitize_text_field( $_POST['SeoIncineracion'] );
$SeoDesde = sanitize_text_field( $_POST['SeoDesde'] );

$precioFunerariaEnlaceDistancia = sanitize_text_field( $_POST['wpfunos_EnlaceDistancia'] );
$precioFunerariaEnlaceLatitud = sanitize_text_field( $_POST['wpfunos_EnlaceLatitud'] );
$precioFunerariaEnlaceLonguitud = sanitize_text_field( $_POST['wpfunos_EnlaceLonguitud'] );


update_post_meta($post_id, 'wpfunos_precioFunerariaPoblacion', $precioFunerariaPoblacion);
update_post_meta($post_id, 'wpfunos_precioFunerariaProvincia', $precioFunerariaProvincia);
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

//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora
update_post_meta($post_id, 'wpfunos_precioFunerariaEnlaceAhora', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora');
//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=dist&cuando=Próximamente
update_post_meta($post_id, 'wpfunos_precioFunerariaEnlaceProximamente', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Proximamente');
//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora
update_post_meta($post_id, 'wpfunos_precioFunerariaEnlaceVerPrecios', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.'&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora');

//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora
update_post_meta($post_id, 'wpfunos_precioIncineracionEnlaceAhora', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora');
//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=dist&cuando=Próximamente
update_post_meta($post_id, 'wpfunos_precioIncineracionEnlaceProximamente', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Proximamente');
//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora
update_post_meta($post_id, 'wpfunos_precioIncineracionEnlaceVerPrecios', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.'&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=2&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora');

//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=1&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1
update_post_meta($post_id, 'wpfunos_precioFunerariaEntierroDesdeEnlace', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.' &post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=2&cf[resp4]=1&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1');
//	https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=1&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1
update_post_meta($post_id, 'wpfunos_precioFunerariaIncineracionDesdeEnlace', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.' &post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=1&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1');
//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=1&cf[resp4]=1&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&land=1
update_post_meta($post_id, 'wpfunos_precioFunerariaEntierroVelatorioDesdeEnlace', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.' &post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=1&cf[resp4]=1&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1');
//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=1&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&land=1
update_post_meta($post_id, 'wpfunos_precioFunerariaIncineracionVelatorioDesdeEnlace', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.' &post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=1&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1');
//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&land=1
update_post_meta($post_id, 'wpfunos_precioFunerariaEntierroVelatorioCeremoniaDesdeEnlace', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.' &post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1');
//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&land=1
update_post_meta($post_id, 'wpfunos_precioFunerariaIncineracionVelatorioCeremoniaDesdeEnlace', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.' &post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1');
//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=3&cf[resp3]=1&cf[resp4]=3&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&land=1
update_post_meta($post_id, 'wpfunos_precioFunerariaEntierroPremiumDesdeEnlace', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.' &post[]=precio_serv_wpfunos&cf[resp1]=1&cf[resp2]=3&cf[resp3]=1&cf[resp4]=3&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1');
//https://funos.es/comparar-precios-resultados?address[]=Alcalá+de+Henares&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=3&cf[resp3]=1&cf[resp4]=3&distance=20&units=metric&paged=1&per_page=50&lat=40.484390&lng=-3.368802&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&land=1
update_post_meta($post_id, 'wpfunos_precioFunerariaIncineracionPremiumDesdeEnlace', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.' &post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=3&cf[resp3]=1&cf[resp4]=3&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1');

//https://funos.es/comparar-precios-resultados?address[]=Alicante&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=1&distance=80&units=metric&paged=1&per_page=50&lat=38.345996&lng=-0.490685&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&land=1
update_post_meta($post_id, 'wpfunos_precioIncineracionBasicoDesdeEnlace', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.' &post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=2&cf[resp4]=1&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1');
//https://funos.es/comparar-precios-resultados?address[]=Alicante&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=1&distance=80&units=metric&paged=1&per_page=50&lat=38.345996&lng=-0.490685&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&land=1
update_post_meta($post_id, 'wpfunos_precioIncineracionCeremoniaDesdeEnlace', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.' &post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=1&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1');
//https://funos.es/comparar-precios-resultados?address[]=Alicante&post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance=80&units=metric&paged=1&per_page=50&lat=38.345996&lng=-0.490685&form=8&action=fs&CP=undefined&orden=dist&cuando=Ahora&land=1
update_post_meta($post_id, 'wpfunos_precioIncineracionVelatorioDesdeEnlace', 'https://funos.es/comparar-precios-resultados?address[]='.$precioFunerariaPoblacion.' &post[]=precio_serv_wpfunos&cf[resp1]=2&cf[resp2]=2&cf[resp3]=1&cf[resp4]=2&distance='.$precioFunerariaEnlaceDistancia.'&units=metric&paged=1&per_page=50&lat='.$precioFunerariaEnlaceLatitud.'&lng='.$precioFunerariaEnlaceLonguitud.'&form=8&action=fs&CP=undefined&orden=precios&cuando=Ahora&land=1');


update_post_meta($post_id, 'wpfunos_precioFunerariaPaginasRelacionadas', $precioFunerariaPaginasRelacionadas);
update_post_meta($post_id, 'wpfunos_precioFunerariaPaginasRelacionadasTexto', $precioFunerariaPaginasRelacionadasTexto);
update_post_meta($post_id, 'wpfunos_precioFunerariaPoblacionesCercanas', $precioFunerariaPoblacionesCercanas);
update_post_meta($post_id, 'wpfunos_precioFunerariaTextoLibre', $precioFunerariaTextoLibre);
update_post_meta($post_id, 'SeoEntierro', $SeoEntierro);
update_post_meta($post_id, 'SeoIncineracion', $SeoIncineracion);
update_post_meta($post_id, 'SeoDesde', $SeoDesde);

update_post_meta($post_id, 'wpfunos_EnlaceDistancia', $precioFunerariaEnlaceDistancia);
update_post_meta($post_id, 'wpfunos_EnlaceLatitud', $precioFunerariaEnlaceLatitud);
update_post_meta($post_id, 'wpfunos_EnlaceLonguitud', $precioFunerariaEnlaceLonguitud);
