<?php
/**
* This file outputs the search form.
*
* This file can be overridden by copying it to
*
* your-theme's-or-child-theme's-folder/geo-my-wp/posts-locator/ajax-forms/search-forms/
*
* @see
*
* @param $gmw ( array ) the form being useds.
*
* @package gmw-ajax-forms
*/

?>
<?php do_action( 'gmw_before_search_form', $gmw ); ?>

<?php // do not remove the $action_data variable. ?>
<form id="wpfunos-servicios-form" class="gmw-form gmw-horizontal-filters-form" <?php echo $action_data; // WPCS: XSS ok. ?>>

	<?php do_action( 'gmw_search_form_start', $gmw ); ?>

	<div class="gmw-search-form-location gmw-horizontal-filters">
		<?php gmw_search_form_address_field( $gmw ); ?>

		<?php gmw_search_form_locator_button( $gmw ); ?>

		<?php gmw_search_form_post_types( $gmw ); ?>
	</div>

	<div class="gmw-search-form-filters gmw-horizontal-filters">
		<?php do_action( 'gmw_search_form_filters', $gmw ); ?>
	</div>

	<?php gmw_search_form_taxonomies( $gmw ); ?>

	<?php do_action( 'gmw_search_form_before_distance', $gmw ); ?>
	<div id="wpfunos-search-form-compara">
		<p>
			Compara funerarias en un radio de:
		</p>
	</div>
	<div class="gmw-search-form-distance gmw-horizontal-filters">
		<?php gmw_search_form_radius( $gmw ); ?>

		<?php gmw_search_form_units( $gmw ); ?>
	</div>


	<?php do_action( 'gmw_search_form_before_submit', $gmw ); ?>

	<div id="wpfunos-search-form-submit">

		<?php gmw_search_form_submit_button( $gmw ); ?>

	</div>

	<?php do_action( 'gmw_search_form_end', $gmw ); ?>

	<input type="hidden" name="CP" id="CP" value="" >

</form>

<div id="wpfunos-pregunta-1" class="wpfunos-pregunta-div">
	<p class="wpfunos-titulo-pregunta" id="wpfunos-pregunta-titulo-1">Destino</p>
	<button class="wpfunos-pregunta" id="btn1" onclick="Boton1()" name="subject" type="submit" value="1">Entierro</button>
	<button class="wpfunos-pregunta" id="btn2" onclick="Boton2()" name="subject" type="submit" value="2">Incineración</button>
</div>
<div id="wpfunos-pregunta-2" class="wpfunos-pregunta-div">
	<p class="wpfunos-titulo-pregunta" id="wpfunos-pregunta-titulo-2">Ataúd</p>
	<button class="wpfunos-pregunta" id="btn3" onclick="Boton3()" name="subject" type="submit" value="1">Normal</button>
	<button class="wpfunos-pregunta" id="btn4" onclick="Boton4()" name="subject" type="submit" value="2">Económico</button>
	<button class="wpfunos-pregunta" id="btn5" onclick="Boton5()"name="subject" type="submit" value="3">Premium</button>
</div>
<div id="wpfunos-pregunta-3" class="wpfunos-pregunta-div">
	<p class="wpfunos-titulo-pregunta" id="wpfunos-pregunta-titulo-3">Velatorio</p>
	<button class="wpfunos-pregunta" id="btn6" onclick="Boton6()" name="subject" type="submit" value="1">Con velatorio</button>
	<button class="wpfunos-pregunta" id="btn7" onclick="Boton7()" name="subject" type="submit" value="2">Sin velatorio</button>
</div>
<div id="wpfunos-pregunta-4" class="wpfunos-pregunta-div">
	<p class="wpfunos-titulo-pregunta" id="wpfunos-pregunta-titulo-4">Ceremonia</p>
	<button class="wpfunos-pregunta" id="btn8" onclick="Boton8()" name="subject" type="submit" value="1">Sin ceremonia</button>
	<button class="wpfunos-pregunta" id="btn9"  onclick="Boton9()" name="subject" type="submit" value="2">Solo sala</button>
	<button class="wpfunos-pregunta" id="btn10"  onclick="Boton10()" name="subject" type="submit" value="3">Civil</button>
	<button class="wpfunos-pregunta" id="btn11"  onclick="Boton11()" name="subject" type="submit" value="4">Religiosa</button>
</div>

<script>

jQuery( document ).ready( function() {
	document.getElementById('gmw-submit-6').addEventListener('click', wpfFunctionDistancia, false);
});

function Boton1() {
	document.getElementById("gmw-cf-resp1-6").value = "1" ;
	document.querySelector("label[for='gmw-cf-resp1-6']").textContent = "Entierro";
	$('#wpfunos-pregunta-2').show();
	document.getElementById("btn1").style.backgroundColor="blue" ;
	document.getElementById("btn2").style.backgroundColor="#ff9c00" ;
	window.setTimeout(() => document.getElementById('gmw-cf-resp1-6').focus(), 0);
}
function Boton2() {
	document.getElementById("gmw-cf-resp1-6").value = "2" ;
	document.querySelector("label[for='gmw-cf-resp1-6']").textContent = "Incineración";
	$('#wpfunos-pregunta-2').show();
	document.getElementById("btn1").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn2").style.backgroundColor="blue" ;
	window.setTimeout(() => document.getElementById('gmw-cf-resp1-6').focus(), 0);
}
function Boton3() {
	document.getElementById("gmw-cf-resp2-6").value = "1" ;
	window.setTimeout(() => document.getElementById('gmw-cf-resp2-6').focus(), 0);
	document.querySelector("label[for='gmw-cf-resp2-6']").textContent = "Normal";
	$('#wpfunos-pregunta-3').show();
	document.getElementById("btn3").style.backgroundColor="blue" ;
	document.getElementById("btn4").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn5").style.backgroundColor="#ff9c00" ;
}
function Boton4() {
	document.getElementById("gmw-cf-resp2-6").value = "2" ;
	window.setTimeout(() => document.getElementById('gmw-cf-resp2-6').focus(), 0);
	document.querySelector("label[for='gmw-cf-resp2-6']").textContent = "Económico";
	$('#wpfunos-pregunta-3').show();
	document.getElementById("btn3").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn4").style.backgroundColor="blue" ;
	document.getElementById("btn5").style.backgroundColor="#ff9c00" ;
}
function Boton5() {
	document.getElementById("gmw-cf-resp2-6").value = "3"
	window.setTimeout(() => document.getElementById('gmw-cf-resp2-6').focus(), 0);
	document.querySelector("label[for='gmw-cf-resp2-6']").textContent = "Premium";
	$('#wpfunos-pregunta-3').show();
	document.getElementById("btn3").style.backgroundColor="Blue" ;
	document.getElementById("btn4").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn5").style.backgroundColor="#ff9c00" ;
}
function Boton6() {
	document.getElementById("gmw-cf-resp3-6").value = "1"
	window.setTimeout(() => document.getElementById('gmw-cf-resp3-6').focus(), 0);
	document.querySelector("label[for='gmw-cf-resp3-6']").textContent = "Con velatorio";
	$('#wpfunos-pregunta-4').show();
	document.getElementById("btn6").style.backgroundColor="Blue" ;
	document.getElementById("btn7").style.backgroundColor="#ff9c00" ;
}
function Boton7() {
	document.getElementById("gmw-cf-resp3-6").value = "2"
	window.setTimeout(() => document.getElementById('gmw-cf-resp3-6').focus(), 0);
	document.querySelector("label[for='gmw-cf-resp3-6']").textContent = "Sin velatorio";
	$('#wpfunos-pregunta-4').show();
	document.getElementById("btn6").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn7").style.backgroundColor="Blue" ;
}
function Boton8() {
	document.getElementById("gmw-cf-resp4-6").value = "1"
	document.querySelector("label[for='gmw-cf-resp4-6']").textContent = "Sin ceremonia";
	$('#gmw-submit-6').show();
	$('#wpfunos-pregunta-1').hide();
	$('#wpfunos-pregunta-2').hide();
	$('#wpfunos-pregunta-3').hide();
	$('#wpfunos-pregunta-4').hide();
	window.setTimeout(() => document.getElementById('gmw-address-field-6').focus(), 0);
	wpfesconderpreguntas();
	document.getElementById("btn8").style.backgroundColor="Blue" ;
	document.getElementById("btn9").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn10").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn11").style.backgroundColor="#ff9c00" ;
}
function Boton9() {
	document.getElementById("gmw-cf-resp4-6").value = "2"
	document.querySelector("label[for='gmw-cf-resp4-6']").textContent = "Solo sala";
	$('#gmw-submit-6').show();
	$('#wpfunos-pregunta-1').hide();
	$('#wpfunos-pregunta-2').hide();
	$('#wpfunos-pregunta-3').hide();
	$('#wpfunos-pregunta-4').hide();
	window.setTimeout(() => document.getElementById('gmw-address-field-6').focus(), 0);
	wpfesconderpreguntas();
	document.getElementById("btn8").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn9").style.backgroundColor="Blue" ;
	document.getElementById("btn10").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn11").style.backgroundColor="#ff9c00" ;
}
function Boton10() {
	document.getElementById("gmw-cf-resp4-6").value = "3"
	document.querySelector("label[for='gmw-cf-resp4-6']").textContent = "Ceremonia civil";
	$('#gmw-submit-6').show();
	$('#wpfunos-pregunta-1').hide();
	$('#wpfunos-pregunta-2').hide();
	$('#wpfunos-pregunta-3').hide();
	$('#wpfunos-pregunta-4').hide();
	window.setTimeout(() => document.getElementById('gmw-address-field-6').focus(), 0);
	wpfesconderpreguntas();
	document.getElementById("btn8").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn9").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn10").style.backgroundColor="Blue" ;
	document.getElementById("btn11").style.backgroundColor="#ff9c00" ;
}
function Boton11() {
	document.getElementById("gmw-cf-resp4-6").value = "4"
	document.querySelector("label[for='gmw-cf-resp4-6']").textContent = "Ceremonia religiosa";
	$('#gmw-submit-6').show();
	$('#wpfunos-pregunta-1').hide();
	$('#wpfunos-pregunta-2').hide();
	$('#wpfunos-pregunta-3').hide();
	$('#wpfunos-pregunta-4').hide();
	window.setTimeout(() => document.getElementById('gmw-address-field-6').focus(), 0);
	wpfesconderpreguntas();
	document.getElementById("btn8").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn9").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn10").style.backgroundColor="#ff9c00" ;
	document.getElementById("btn11").style.backgroundColor="Blue" ;
}

var wpfFunctionLabel = function() {
	document.querySelector("label[for='gmw-cf-resp1-6']").addEventListener('click', wpfFunctionLabelDisplay, false);
	document.querySelector("label[for='gmw-cf-resp2-6']").addEventListener('click', wpfFunctionLabelDisplay, false);
	document.querySelector("label[for='gmw-cf-resp3-6']").addEventListener('click', wpfFunctionLabelDisplay, false);
	document.querySelector("label[for='gmw-cf-resp4-6']").addEventListener('click', wpfFunctionLabelDisplay, false);
}

var wpfFunctionLabelDisplay = function(){
	console.log('DISPLAY');
	$('#wpfunos-pregunta-1').show();
	//$('#wpfunos-pregunta-2').show();
	//$('#wpfunos-pregunta-3').show();
	//$('#wpfunos-pregunta-4').show();
}
var wpfFunctionDistancia = function(){
	console.log('click');
	if (document.getElementById("gmw-cf-resp3-6").value == 2 && document.getElementById("gmw-cf-resp4-6").value == 1 ){
		console.log('Incineración Directa. Distancia 100km.')
		document.getElementsByClassName("gmw-radius-slider")[0].value() = 100;
	}
}

function wpfesconderpreguntas(){
	var elementsLabel = document.getElementsByClassName("gmw-field-label");
	for (var i = 0; i < elementsLabel.length; i++) {
		elementsLabel[i].addEventListener('click', wpfFunctionLabel, false);
	}
}


</script>


<?php do_action( 'gmw_after_search_form', $gmw ); ?>
