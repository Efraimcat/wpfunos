<script type="text/javascript">
$ = jQuery.noConflict();
$(document).ready(function(){
	$(function(){
		var elementsLlamen = document.getElementsByClassName("wpfunos-boton-llamen");
		var elementsLlamar = document.getElementsByClassName("wpfunos-boton-llamar");
		var elementsPresupuesto = document.getElementsByClassName("wpfunos-boton-presupuesto");
		var elementsDetalles = document.getElementsByClassName("wpfunos-boton-detalles");

		//var nombre = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfnombre");
		//var email = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfemail");
		//var telefono = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpftelefono");
		//var cp = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfcp");
		//var referencia = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfref");

		var wpfFunctionLlamen = function() {
			var wpnonce = this.getAttribute("wpfn");
			var servicio = this.getAttribute("wpfid");
			var precio = this.getAttribute("wpfp");
			console.log('boton Llamen servicio: '+servicio+' nonce '+wpnonce+' precio '+precio );
			jQuery( document ).ready( function() {
				document.getElementById("wpfunos-modal-llamen-telefono").innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpftelefono");
				document.getElementById("wpfunos-modal-llamen-telefono-movil").innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpftelefono");
			});
			var params = new URLSearchParams(location.search);
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : myAjax.ajaxurl,
				data: {
					"action": "wpfunos_ajax_serviciosv2_llamame",
					"servicio": servicio,
					"wpnonce": wpnonce,
					"precio" : precio,
					"nombre" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfnombre"),
					"email" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfemail"),
					"telefono" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpftelefono"),
					"cp" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfcp"),
					"referencia" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfref"),
					"wpfwpf" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfwpf"),
					"resp1" : params.get('cf[resp1]'),
					"resp2" : params.get('cf[resp2]'),
					"resp3" : params.get('cf[resp3]'),
					"resp4" : params.get('cf[resp4]'),
					"poblacion" : params.get('address[]'),
					"distance" : params.get('distance'),
					"lat" : params.get('lat'),
					"lng" : params.get('lng'),
				},
				success: function(response) {
					console.log(response)	;
					if(response.type == "success") {
						console.log('success');
						document.getElementById("wpfunos-modal-llamen-titulo").innerHTML = response.titulo;
						document.getElementById("wpfunos-modal-llamen-ticket").innerHTML = response.ref;
						document.getElementById("wpfunos-modal-llamen-ticket-nombre").innerHTML = response.nombre;
						$('#wpfunos-modal-fin-formulario').show();
					} else {
						console.log('fail');
					}
				}
			});
		}

		var wpfFunctionLlamar = function() {
			var wpnonce = this.getAttribute("wpfn");
			var servicio = this.getAttribute("wpfid");
			var precio = this.getAttribute("wpfp");
			console.log('boton Llamar servicio: '+servicio+' nonce '+wpnonce+' precio '+precio );
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : myAjax.ajaxurl,
				data: {
					"action": "wpfunos_ajax_serviciosv2_llamar_numero_telefono",
					"servicio": servicio,
					"wpnonce": wpnonce,
				},
				success: function(response) {
					console.log(response)	;
					if(response.type == "success") {
						console.log('success');
						document.getElementById("wpfunos-modal-llamar-telefono").innerHTML = response.telefono;
						let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
						console.log('isMobile: '+isMobile);
						if ( isMobile ) {
							var tel = 'tel:'+response.telefono;
							console.log('tel: '+tel);
							window.location = tel;
						}
					} else {
						console.log('fail');
					}
				}
			});
			var params = new URLSearchParams(location.search);
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : myAjax.ajaxurl,
				data: {
					"action": "wpfunos_ajax_serviciosv2_llamar",
					"servicio": servicio,
					"wpnonce": wpnonce,
					"precio" : precio,
					"nombre" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfnombre"),
					"email" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfemail"),
					"telefono" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpftelefono"),
					"cp" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfcp"),
					"referencia" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfref"),
					"wpfwpf" : document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfwpf"),
					"resp1" : params.get('cf[resp1]'),
					"resp2" : params.get('cf[resp2]'),
					"resp3" : params.get('cf[resp3]'),
					"resp4" : params.get('cf[resp4]'),
					"poblacion" : params.get('address[]'),
					"distance" : params.get('distance'),
					"lat" : params.get('lat'),
					"lng" : params.get('lng'),
				},
				success: function(response) {
					console.log(response)	;
					if(response.type == "success") {
						console.log('success');
						document.getElementById("wpfunos-modal-llamar-ticket").innerHTML = response.ref;
						document.getElementById("wpfunos-modal-llamar-ticket-nombre").innerHTML = response.nombre;
						$('#wpfunos-modal-fin-formulario-llamar').show();
					} else {
						console.log('fail');
					}
				}
			});
		}

		var wpfFunctionPresupuesto = function() {
			var wpnonce = this.getAttribute("wpfn");
			var servicio = this.getAttribute("wpfid");
			var precio = this.getAttribute("wpfp");
			console.log('boton Presupuesto servicio: '+servicio+' nonce '+wpnonce+' precio '+precio );

		}

		var wpfFunctionDetalles = function() {
			var wpnonce = this.getAttribute("wpfn");
			var servicio = this.getAttribute("wpfid");
			var precio = this.getAttribute("wpfp");
			console.log('boton Detalles servicio: '+servicio+' nonce '+wpnonce+' precio '+precio );

		}




		for (var i = 0; i < elementsLlamen.length; i++) {
			elementsLlamen[i].addEventListener('click', wpfFunctionLlamen, false);
		}
		for (var i = 0; i < elementsLlamar.length; i++) {
			elementsLlamar[i].addEventListener('click', wpfFunctionLlamar, false);
		}
		for (var i = 0; i < elementsPresupuesto.length; i++) {
			elementsPresupuesto[i].addEventListener('click', wpfFunctionPresupuesto, false);
		}
		for (var i = 0; i < elementsDetalles.length; i++) {
			elementsDetalles[i].addEventListener('click', wpfFunctionDetalles, false);
		}
	});
});

</script>
