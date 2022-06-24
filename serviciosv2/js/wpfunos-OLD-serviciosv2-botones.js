<script type="text/javascript" id="wpfunos-serviciosv2-botones">
$ = jQuery.noConflict();
$(document).ready(function(){
	$(function(){
		var elementsLlamen = document.getElementsByClassName("wpfunos-boton-llamen");
		var elementsLlamar = document.getElementsByClassName("wpfunos-boton-llamar");
		var elementsPresupuesto = document.getElementsByClassName("wpfunos-boton-presupuesto");
		var elementsDetalles = document.getElementsByClassName("wpfunos-boton-detalles");

		var wpfFunctionLlamen = function() {
			var wpnonce = this.getAttribute("wpfn");
			var servicio = this.getAttribute("wpfid");
			var precio = this.getAttribute("wpfp");
			console.log('boton Llamen servicio: '+servicio+' precio '+precio );
			console.log(new Date());
			jQuery( document ).ready( function() {
				document.getElementById("wpfunos-modal-llamen-telefono").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");
				document.getElementById("wpfunos-modal-llamen-telefono-movil").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");
			});
			var params = new URLSearchParams(location.search);
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : WpfAjax.ajaxurl,
				data: {
					"action": "wpfunos_ajax_serviciosv2_llamame",
					"servicio": servicio,
					"wpnonce": wpnonce,
					"precio" : precio,
					"nombre" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre"),
					"email" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail"),
					"telefono" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono"),
					"cp" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp"),
					"referencia" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref"),
					"wpfwpf" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfwpf"),
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
					console.log(new Date());
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
			console.log('boton Llamar servicio: '+servicio+' precio '+precio );
			console.log(new Date());
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : WpfAjax.ajaxurl,
				data: {
					"action": "wpfunos_ajax_serviciosv2_llamar_numero_telefono",
					"servicio": servicio,
					"wpnonce": wpnonce,
				},
				success: function(response) {
					console.log(response)	;
					console.log(new Date());
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
						var params = new URLSearchParams(location.search);
						jQuery.ajax({
							type : "post",
							dataType : "json",
							url : WpfAjax.ajaxurl,
							data: {
								"action": "wpfunos_ajax_serviciosv2_llamar",
								"servicio": servicio,
								"wpnonce": wpnonce,
								"precio" : precio,
								"nombre" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre"),
								"email" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail"),
								"telefono" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono"),
								"cp" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp"),
								"referencia" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref"),
								"wpfwpf" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfwpf"),
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
								console.log(new Date());
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
			console.log('boton Presupuesto servicio: '+servicio+' precio '+precio );
			console.log(new Date());
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : WpfAjax.ajaxurl,
				data: {
					"action": "wpfunos_ajax_serviciosv2_presupuesto",
					"servicio": servicio,
					"wpnonce": wpnonce,
				},
				success: function(response) {
					console.log(response)	;
					console.log(new Date());
					if(response.type == "success") {
						console.log('success');
						document.getElementById("wpfunos-modal-presupuesto-nombre").innerHTML = response.titulo+' - '+precio+'€';
						document.getElementById("botonEnviarPresupuesto").setAttribute("wpfn", wpnonce );
						document.getElementById("botonEnviarPresupuesto").setAttribute("wpfid", servicio );
						document.getElementById("botonEnviarPresupuesto").setAttribute("wpfp", precio );
						document.getElementById("botonEnviarPresupuesto").addEventListener('click', wpfFunctionEnviaPresupuesto, false);
					} else {
						console.log('fail');
					}
				}
			});
		}

		var wpfFunctionEnviaPresupuesto = function() {
			var wpnonce = this.getAttribute("wpfn");
			var servicio = this.getAttribute("wpfid");
			var precio = this.getAttribute("wpfp");
			var nombre = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre");
			var email  = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail");
			var mensaje = document.getElementById("form-field-mensajePresupuesto").value;
			console.log('boton Pedir presupuesto servicio: '+servicio+' precio '+precio+' nombre '+nombre+' email '+email );
			console.log('mensaje: '+mensaje );
			console.log(new Date());
			$('#wpfunosformularioPresupuesto').hide();
			var params = new URLSearchParams(location.search);
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : WpfAjax.ajaxurl,
				data: {
					"action": "wpfunos_ajax_serviciosv2_enviar_presupuesto",
					"servicio": servicio,
					"wpnonce": wpnonce,
					"nombre": nombre,
					"email": email,
					"mensaje": mensaje,
					"precio": precio,
					"telefono" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono"),
					"cp" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp"),
					"referencia" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref"),
					"wpfwpf" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfwpf"),
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
					console.log(new Date());
					if(response.type == "success") {
						console.log('success');
						document.getElementById("wpfunos-modal-presupuesto-ticket").innerHTML = response.ref;
						document.getElementById("wpfunos-modal-presupuesto-ticket-nombre").innerHTML = response.nombre;
						$('#wpfunos-modal-fin-formulario-presupuesto').show();
					} else {
						console.log('fail');
					}
				}
			});
		}

		var wpfFunctionDetalles = function() {
			var wpnonce = this.getAttribute("wpfn");
			var servicio = this.getAttribute("wpfid");
			var precio = this.getAttribute("wpfp");
			console.log('boton Detalles servicio: '+servicio+' precio '+precio );
			console.log(new Date());
			var params = new URLSearchParams(location.search);
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : WpfAjax.ajaxurl,
				data: {
					"action": "wpfunos_ajax_serviciosv2_detalles",
					"servicio": servicio,
					"precio": precio,
					"wpnonce": wpnonce,
					"resp1" : params.get('cf[resp1]'),
					"resp2" : params.get('cf[resp2]'),
					"resp3" : params.get('cf[resp3]'),
					"resp4" : params.get('cf[resp4]'),
				},
				success: function(response) {
					console.log(response)	;
					console.log(new Date());
					if(response.type == "success") {
						console.log('success');
						document.getElementById("wpfunos-modal-detalles-logo-servicio").innerHTML = response.logo;
						document.getElementById("wpfunos-modal-detalles-nombre").innerHTML = response.nombre;
						document.getElementById("wpfunos-modal-detalles-nombrepack").innerHTML = response.nombrepack;
						document.getElementById("wpfunos-modal-detalles-logo-promo").innerHTML = response.logo_promo;
						document.getElementById("wpfunos-modal-detalles-precio").innerHTML = response.precioformat;
						document.getElementById("wpfunos-modal-detalles-precio-texto").innerHTML = response.precio_texto;
						document.getElementById("wpfunos-modal-detalles-nombre-destino").innerHTML = response.destino;
						document.getElementById("wpfunos-modal-detalles-nombre-ataud").innerHTML = response.ataud;
						document.getElementById("wpfunos-modal-detalles-nombre-velatorio").innerHTML = response.velatorio;
						document.getElementById("wpfunos-modal-detalles-nombre-ceremonia").innerHTML = response.ceremonia;
						document.getElementById("elementor-tab-title-1901").innerText = response.direccion;
						document.getElementById("wpfunos-modal-detalles-incluido").innerHTML = response.comentarios;
						$('#wpfunos-servicios-detalles-esperar').hide();

						document.getElementById("wpfunos-detalles-llamen").addEventListener('click', wpfFunctionLlamen2, false);
						document.getElementById("wpfunos-detalles-llamar").addEventListener('click', wpfFunctionLlamar2, false);
						document.getElementById("wpfunos-detalles-correo").addEventListener('click', wpfFunctionEnviarCorreo, false);
						document.getElementById("wpfunos-detalles-imprimir").addEventListener('click', wpfFunctionImprimirPagina, false);

						document.getElementById("wpfdetalles").setAttribute("servicio", servicio);
						document.getElementById("wpfdetalles").setAttribute("wpnonce", wpnonce);
						document.getElementById("wpfdetalles").setAttribute("precio", precio);

					} else {
						console.log('fail');
					}
				}
			});

		}
		var wpfFunctionLlamen2= function(){
			var wpnonce = document.getElementById("wpfdetalles").getAttribute("wpnonce");
			var servicio = document.getElementById("wpfdetalles").getAttribute("servicio");
			var precio = document.getElementById("wpfdetalles").getAttribute("precio");
			console.log('boton Llamen servicio detalles: '+servicio+' precio '+precio );
			console.log(new Date());
			jQuery( document ).ready( function() {
				document.getElementById("wpfunos-modal-llamen-telefono").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");
				document.getElementById("wpfunos-modal-llamen-telefono-movil").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");
			});
			var params = new URLSearchParams(location.search);
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : WpfAjax.ajaxurl,
				data: {
					"action": "wpfunos_ajax_serviciosv2_llamame",
					"servicio": servicio,
					"wpnonce": wpnonce,
					"precio" : precio,
					"nombre" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre"),
					"email" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail"),
					"telefono" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono"),
					"cp" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp"),
					"referencia" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref"),
					"wpfwpf" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfwpf"),
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
					console.log(new Date());
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

		var wpfFunctionLlamar2= function(){
			var wpnonce = document.getElementById("wpfdetalles").getAttribute("wpnonce");
			var servicio = document.getElementById("wpfdetalles").getAttribute("servicio");
			var precio = document.getElementById("wpfdetalles").getAttribute("precio");
			console.log('boton Llamar servicio detalles: '+servicio+' precio '+precio );
			console.log(new Date());
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : WpfAjax.ajaxurl,
				data: {
					"action": "wpfunos_ajax_serviciosv2_llamar_numero_telefono",
					"servicio": servicio,
					"wpnonce": wpnonce,
				},
				success: function(response) {
					console.log(response)	;
					console.log(new Date());
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
						console.log('Crear registro llamar servicio detalles:' );
						console.log(new Date());
						var params = new URLSearchParams(location.search);
						jQuery.ajax({
							type : "post",
							dataType : "json",
							url : WpfAjax.ajaxurl,
							data: {
								"action": "wpfunos_ajax_serviciosv2_llamar",
								"servicio": servicio,
								"wpnonce": wpnonce,
								"precio" : precio,
								"nombre" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre"),
								"email" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail"),
								"telefono" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono"),
								"cp" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp"),
								"referencia" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref"),
								"wpfwpf" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfwpf"),
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
								console.log(new Date());
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
					} else {
						console.log('fail');
					}
				}
			});
		}

		var wpfFunctionImprimirPagina = function(){
			var wpnonce = document.getElementById("wpfdetalles").getAttribute("wpnonce");
			var servicio = document.getElementById("wpfdetalles").getAttribute("servicio");
			var precio = document.getElementById("wpfdetalles").getAttribute("precio");
			console.log('boton Imprimir página: '+servicio+' precio '+precio );
			console.log(new Date());
			var printContents = document.getElementById('elementor-popup-modal-56672').innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			$('#wpfunos-detalles-botones-1').hide() ;
			$('#wpfunos-detalles-botones-2').hide() ;
			window.print();
			location.reload();
			$('#wpfunos-detalles-botones-1').show() ;
			$('#wpfunos-detalles-botones-2').show() ;
			document.body.innerHTML = originalContents;
			location.reload();
		}

		var wpfFunctionEnviarCorreo = function(){
			var wpnonce = document.getElementById("wpfdetalles").getAttribute("wpnonce");
			var servicio = document.getElementById("wpfdetalles").getAttribute("servicio");
			var precio = document.getElementById("wpfdetalles").getAttribute("precio");
			var nombre = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre");
			var email  = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail");

			console.log('boton Llamar servicio detalles: '+servicio+' precio '+precio+' nombre '+nombre+' email '+email );
			console.log(new Date());
			//wpfunos-modal-enviar-correo
			var params = new URLSearchParams(location.search);
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : WpfAjax.ajaxurl,
				data: {
					"action": "wpfunos_ajax_serviciosv2_mail_detalles",
					"servicio": servicio,
					"precio": precio,
					"wpnonce": wpnonce,
					"nombre": nombre,
					"email": email,
					"cp" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp"),
					"telefono" : document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono"),
					"poblacion" : params.get('address[]'),
					"distance" : params.get('distance'),
					"lat" : params.get('lat'),
					"lng" : params.get('lng'),
					"resp1" : params.get('cf[resp1]'),
					"resp2" : params.get('cf[resp2]'),
					"resp3" : params.get('cf[resp3]'),
					"resp4" : params.get('cf[resp4]'),
				},
				success: function(response) {
					console.log(response)	;
					console.log(new Date());
					if(response.type == "success") {
						console.log('success');
					} else {
						console.log('fail');
					}
				}
			});

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
