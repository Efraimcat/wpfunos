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
			var titulo = this.getAttribute("wpftitulo");
			if ( document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail").length < 9
			|| document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono").length < 9 ){
				wpfDatosUsuario();
				return;
			}else{
				console.log('boton Llamen servicio: '+servicio+' titulo '+titulo );

				elementorFrontend.documentsManager.documents[document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfpopupllamen")].showModal(); //show the popup

				document.getElementById("wpfunos-modal-llamen-titulo").innerHTML = titulo;
				document.getElementById("wpfunos-modal-llamen-telefono").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");
				document.getElementById("wpfunos-modal-llamen-ticket").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
				document.getElementById("wpfunos-modal-llamen-ticket-nombre").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre");

				jQuery.ajax({
					type : "post",
					dataType : "json",
					url : WpfAjax.ajaxurl,
					data: {
						"action": "wpfunos_ajax_serviciosv2_llamen",
						"servicio": servicio,
						"wpnonce": wpnonce,
						"precio" : precio,
						"titulo" : titulo,
					},
					success: function(response) {
						console.log(response)	;
						if(response.type == "success") {
							console.log('success');
							document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfref", response.newref);
							$('#wpfunos-modal-fin-formulario').show();
						} else {
							console.log('fail');
						}
					}
				});
			}
		}

		var wpfFunctionLlamar = function() {
			var wpnonce = this.getAttribute("wpfn");
			var servicio = this.getAttribute("wpfid");
			var precio = this.getAttribute("wpfp");
			var titulo = this.getAttribute("wpftitulo");
			var telefono = this.getAttribute("wpftelefono");
			if ( document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail").length < 9
			|| document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono").length < 9 ){
				wpfDatosUsuario();
				return;
			}else{
				console.log('boton Llamar servicio: '+servicio+' titulo '+titulo );

				elementorFrontend.documentsManager.documents[document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfpopupllamar")].showModal(); //show the popup

				document.getElementById("wpfunos-modal-llamar-telefono").innerHTML = telefono;
				document.getElementById("wpfunos-modal-llamar-ticket").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
				document.getElementById("wpfunos-modal-llamar-ticket-nombre").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre");

				let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
				console.log('isMobile: '+isMobile);
				if ( isMobile ) {
					var tel = 'tel:'+telefono;
					console.log('tel: '+tel);
					window.location = tel;
				}

				jQuery.ajax({
					type : "post",
					dataType : "json",
					url : WpfAjax.ajaxurl,
					data: {
						"action": "wpfunos_ajax_serviciosv2_llamar",
						"servicio": servicio,
						"wpnonce": wpnonce,
						"precio" : precio,
						"titulo" : titulo,
					},
					success: function(response) {
						console.log(response)	;
						if(response.type == "success") {
							console.log('success');
							document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfref", response.newref);
							$('#wpfunos-modal-fin-formulario-llamar').show();
						} else {
							console.log('fail');
						}
					}
				});
			}
		}

		var wpfFunctionPresupuesto = function() {
			var wpnonce = this.getAttribute("wpfn");
			var servicio = this.getAttribute("wpfid");
			var precio = this.getAttribute("wpfp");
			var titulo = this.getAttribute("wpftitulo");
			if ( document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail").length < 9
			|| document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono").length < 9 ){
				wpfDatosUsuario();
				return;
			}else{
				console.log('boton Presupuesto servicio: '+servicio+' titulo '+titulo );
				elementorFrontend.documentsManager.documents[document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfpopuppresupuesto")].showModal(); //show the popup

				document.getElementById("wpfunos-modal-presupuesto-nombre").innerHTML = titulo;
				document.getElementById("botonEnviarPresupuesto").setAttribute("wpfn", wpnonce );
				document.getElementById("botonEnviarPresupuesto").setAttribute("wpfid", servicio );
				document.getElementById("botonEnviarPresupuesto").setAttribute("wpfp", precio );
				document.getElementById("botonEnviarPresupuesto").setAttribute("wpftitulo", titulo );
				document.getElementById("botonEnviarPresupuesto").addEventListener('click', wpfFunctionEnviaPresupuesto, false);
			}
		}

		var wpfFunctionDetalles = function() {
			var wpnonce = this.getAttribute("wpfn");
			var servicio = this.getAttribute("wpfid");
			var precio = this.getAttribute("wpfp");
			var titulo = this.getAttribute("wpftitulo");
			if ( document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail").length < 9
			|| document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono").length < 9 ){
				wpfDatosUsuario();
				return;
			}else{
				console.log('boton Detalles servicio: '+servicio+' titulo '+titulo );

				if( document.getElementById("wpf-boton-detalles-texto-"+servicio).innerHTML == "Ocultar detalles" ){
					document.getElementById("wpf-detalles-contenido-"+servicio).innerHTML = "";
					document.getElementById("wpf-boton-detalles-texto-"+servicio).innerHTML="Ver detalles"
				}else{

					elementorFrontend.documentsManager.documents[document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfesperando")].showModal(); //show the popup

					jQuery.ajax({
						type : "post",
						dataType : "json",
						url : WpfAjax.ajaxurl,
						data: {
							"action": "wpfunos_ajax_serviciosv2_detalles",
							"servicio": servicio,
							"wpnonce": wpnonce,
							"precio" : precio,
							"titulo" : titulo,
						},
						success: function(response) {
							//console.log(response)	;
							if(response.type == "success") {
								console.log('success');
								const para = document.createElement("p");
								para.innerHTML = response.comentarios;
								document.getElementById("wpf-detalles-contenido-"+servicio).appendChild(para);
								document.getElementById("wpf-boton-detalles-texto-"+servicio).innerHTML="Ocultar detalles"
								$('#elementor-popup-modal-'document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfesperando")').hide();
							} else {
								console.log('fail');
							}
						}
					});
				}
			}
		}

		var wpfFunctionEnviaPresupuesto = function() {
			var wpnonce = this.getAttribute("wpfn");
			var servicio = this.getAttribute("wpfid");
			var precio = this.getAttribute("wpfp");
			var titulo = this.getAttribute("wpftitulo");
			var mensaje = document.getElementById("form-field-mensajePresupuesto").value;
			if ( document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail").length < 9
			|| document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono").length < 9 ){
				wpfDatosUsuario();
				return;
			}else{
				console.log('boton Enviar presupuesto servicio: '+servicio+' titulo '+titulo );
				console.log('mensaje: '+mensaje );
				$('#wpfunosformularioPresupuesto').hide();

				document.getElementById("wpfunos-modal-presupuesto-ticket").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
				document.getElementById("wpfunos-modal-presupuesto-ticket-nombre").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre");

				jQuery.ajax({
					type : "post",
					dataType : "json",
					url : WpfAjax.ajaxurl,
					data: {
						"action": "wpfunos_ajax_serviciosv2_presupuesto",
						"servicio": servicio,
						"wpnonce": wpnonce,
						"precio" : precio,
						"titulo" : titulo,
						"mensaje" : mensaje,
					},
					success: function(response) {
						console.log(response)	;
						if(response.type == "success") {
							console.log('success');
							document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfref", response.newref);
							$('#wpfunos-modal-fin-formulario-presupuesto').show();
						} else {
							console.log('fail');
						}
					}
				});
			}
		}

		function wpfDatosUsuario(){
			elementorFrontend.documentsManager.documents[document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfformdatoscomp")].showModal(); //show the popup
			document.getElementById("wpfunos-v2-enviar-datos").addEventListener('click', function() {
				console.log('click botón enviar, Creando entrada.');
				var nombre = document.getElementById("form-field-Nombre").value;
				var email = document.getElementById("form-field-Email").value;
				var telefono = document.getElementById("form-field-Telefono").value;
				var acepta = document.getElementById("form-field-aceptacion").validity.valueMissing;  //(true = no ha validado  false = ha validado)
				if( nombre != '' && email != '' && telefono != '' && !acepta ){
					console.log('campos OK');
					var date = new Date();
					date.setTime(date.getTime() + (30*24*60*60*1000));
					expires = "; expires=" + date.toUTCString();
					document.cookie = "wpfn=" + nombre + expires + "; path=/; SameSite=Lax; secure";
					document.cookie = "wpfe=" + email + expires + "; path=/; SameSite=Lax; secure";
					document.cookie = "wpft=" + telefono + expires + "; path=/; SameSite=Lax; secure";
					var ip = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfip");
					var wpfref = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
					var wpnonce = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfn");
					var url = '';

					document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfemail", email);
					document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpftelefono", telefono);
					elementorFrontend.documentsManager.documents[document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfesperando")].showModal(); //show the popup
					$('#elementor-popup-modal-'document.getElementById("wpf-resultados-cabecera-donde").getAttribute("formdatoscomp")').hide();
					jQuery.ajax({
						type : "post",
						dataType : "json",
						url : WpfAjax.ajaxurl,
						data: {
							"action": "wpfunos_ajax_serviciosv2_entrada_datos",
							"wpfnombre": nombre,
							"wpfemail": email,
							"wpftelefono": telefono,
							"wpfurl" : url,
							"wpnonce" : wpnonce,
							"wpfip" : ip,
						},
						success: function(response) {
							console.log(response)	;
							if(response.type == "success") {
								console.log('success');
								$('#elementor-popup-modal-'document.getElementById("wpf-resultados-cabecera-donde").getAttribute("esperando")').hide();
							} else {
								if(response.type == "unwanted") {
									console.log('unwanted');
									window.location.href = "/";
								}else{
									console.log('fail');
									window.location.href = "/";
								}
							}
						}
					});
				}
			});

			return;
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
