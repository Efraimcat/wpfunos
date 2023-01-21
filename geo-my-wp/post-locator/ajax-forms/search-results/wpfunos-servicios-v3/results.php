<?php
/**
* Posts locator Ajax "default" results template file.
*
* This file outputs the main search results.
*
* This file can be overridden by copying the entire "default" folder with all its files into
*
* your-theme's-or-child-theme's-folder/geo-my-wp/posts-locator/ajax-forms/search-results/
*
* @param $gmw  ( array ) the form being useds
*/
$IP = apply_filters('wpfunos_userIP','dummy');

?>

<div class="gmw-results-inner">

	<div class="gmw-ajax-loader-element gmw-ajax-loader"></div>

	<div class="wpfunos-search-results">

		<div id="wpfunos-search-form-results"  name="wpfunos-v3-results"></div>

		<?php if ( apply_filters('wpfunos_email_colaborador','Entrada pagina resultados') ){ echo '<div id="wpf-es-colaborador" name="si"></div>'; }	?>

		<div class="gmw-results">

			<?php
			do_action('wpfunos_v3_crear_trans_resultados', $gmw['results'] );

			$transient_id = get_transient('wpfunos-wpfid-v3-' .$IP );

			$mas_barato = $transient_id['wpfprice'];
			$wpfunos_confirmado = $transient_id['wpfcon'];
			$wpfunos_sinconfirmar = $transient_id['wpfsin'];
			$contador = count($wpfunos_confirmado)+count($wpfunos_sinconfirmar);

			if (isset($_GET['wpfwpf'])){
				$texto1 = esc_html__('Ampliando el radio de búsqueda...', 'wpfunos_es');
				$texto2 = esc_html__('Hemos encontrado', 'wpfunos_es');
				$texto3 = esc_html__('resultados para ti.', 'wpfunos_es');
				$texto_contador = ($contador == '0') ? $texto1 : $texto2 .' '.$contador. ' ' .$texto3;
			}else{
				$texto_contador = '';
			}
			?>

			<script type="text/javascript">
			document.getElementById("wpf-resultados-referencia").setAttribute("wpfcount",<?php echo (count($wpfunos_confirmado)+count($wpfunos_sinconfirmar)); ?>);
			document.getElementById("wpf-resultados-referencia").setAttribute("wpfmejorprecio",<?php echo $mas_barato; ?> + '€');
			</script>

			<div id="wpfunos-resultados">

				<h6 style="text-align: center;"><?php echo $texto_contador; ?></h6>

				<?php
				if (isset($_GET['wpfwpf'])){
					do_action( 'wpfunos_v3_confirmado', $wpfunos_confirmado );
					do_action( 'wpfunos_v3_sinconfirmar', $wpfunos_sinconfirmar );
				}
				?>

			</div>

			<div class="wpfunos-search-results-map">

				<?php
				if (isset($_GET['wpfwpf'])){
					echo do_shortcode( '[gmw_ajax_form map="8"]' );
				}
				?>

			</div>

			<div id="wpfunos-resultados-despues-mapa" style="margin-bottom: 40px;"></div>

		</div>

	</div>

</div>
