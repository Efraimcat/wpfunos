<script type="text/javascript">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    var elementsLlamen = document.getElementsByClassName("wpfunos-boton-llamen");
    var elementsLlamar = document.getElementsByClassName("wpfunos-boton-llamar");
    var elementsPresupuesto = document.getElementsByClassName("wpfunos-boton-presupuesto");
    var elementsDetalles = document.getElementsByClassName("wpfunos-boton-detalles");


    var wpfFunctionLlamen = function() {
      var IDservicio = this.getAttribute("wpfunos-id");
      var IDusuario = this.getAttribute("wpusuario");
      var wpnonce = this.getAttribute("data-wpnonce");
      var wpecologico = this.getAttribute("wpecologico");
      var precio = document.getElementById("wpf-precio-"+IDservicio).getAttribute("wpfunos-att-precio")
      console.log('boton Llamen servicio: '+IDservicio+' usuario '+IDusuario+' nonce '+wpnonce+' precio '+precio );
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : WpfAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_servicios_llamame",
          "IDservicio": IDservicio,
          "IDusuario": IDusuario,
          "wpnonce": wpnonce,
          "precio" : precio,
          "ecologico" : wpecologico,
        },
        success: function(response) {
          console.log(response)	;
          if(response.type == "success") {
            document.getElementById("wpfunos-modal-llamen-titulo").innerHTML = response.titulo;
            console.log('success');
          } else {
            console.log('fail');
          }
        }
      });
    };

    var wpfFunctionLlamar = function() {
      var IDservicio = this.getAttribute("wpfunos-id");
      var IDusuario = this.getAttribute("wpusuario");
      var wpnonce = this.getAttribute("data-wpnonce");
      var wpecologico = this.getAttribute("wpecologico");
      var precio = document.getElementById("wpf-precio-"+IDservicio).getAttribute("wpfunos-att-precio")
      console.log('boton Llamar servicio: '+IDservicio+' usuario '+IDusuario+' nonce '+wpnonce+' precio '+precio );
      let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
      console.log('isMobile: '+isMobile);
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : WpfAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_servicios_llamar",
          "IDservicio": IDservicio,
          "IDusuario": IDusuario,
          "wpnonce": wpnonce,
          "precio" : precio,
          "ecologico" : wpecologico,
        },
        success: function(response) {
          console.log(response)	;
          if(response.type == "success") {
            console.log('success');
            document.getElementById("wpfunos-modal-llamar-telefono").innerHTML = response.telefono;
            if ( isMobile ) {
              var tel = 'tel:'+response.tel;
              console.log('tel: '+tel);
              window.location = tel;
            }
          } else {
            console.log('fail');
          }
        }
      });
    };

    var wpfFunctionPresupuesto = function() {
      var IDservicio = this.getAttribute("wpfunos-id");
      var IDusuario = this.getAttribute("wpusuario");
      var wpnonce = this.getAttribute("data-wpnonce");
      var wpecologico = this.getAttribute("wpecologico");
      var precio = document.getElementById("wpf-precio-"+IDservicio).getAttribute("wpfunos-att-precio")
      console.log('boton Presupuesto servicio: '+IDservicio+' usuario '+IDusuario+' nonce '+wpnonce+' precio '+precio );
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : WpfAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_servicios_presupuesto",
          "IDservicio": IDservicio,
          "IDusuario": IDusuario,
          "wpnonce": wpnonce,
          "precio" : precio,
          "ecologico" : wpecologico,
        },
        success: function(response) {
          console.log(response)	;
          if(response.type == "success") {
            document.getElementById("wpfunos-modal-presupuesto-titulo").innerHTML = response.titulo;
            document.getElementById("form-field-wpfunosoculto").value = response.servicio;
            document.getElementById("form-field-wpfunosecologico").value = response.ecologico;
            document.getElementById("botonEnviarPresupuesto").addEventListener('click', wpfFunctionEnviaPresupuesto, false);
            console.log('success');
          } else {
            console.log('fail');
          }
        }
      });
    }

    var wpfFunctionDetalles = function() {
      var IDservicio = this.getAttribute("wpfunos-id");
      var IDusuario = this.getAttribute("wpusuario");
      var wpnonce = this.getAttribute("data-wpnonce");
      var wpecologico = this.getAttribute("wpecologico");
      var precio = document.getElementById("wpf-precio-"+IDservicio).getAttribute("wpfunos-att-precio");

      console.log('boton Detalles servicio: '+IDservicio+' usuario '+IDusuario+' nonce '+wpnonce+' precio '+precio );
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : WpfAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_servicios_detalles",
          "IDservicio": IDservicio,
          "IDusuario": IDusuario,
          "wpnonce": wpnonce,
          "precio" : precio,
          "ecologico" : wpecologico,
        },
        success: function(response) {
          console.log(response)	;
          if(response.type == "success") {
            console.log('success');
            document.getElementById("wpfunos-modal-detalles-logo").innerHTML = response.logo;
            document.getElementById("wpfunos-modal-detalles-nombre").innerHTML = response.nombre;
            document.getElementById("wpfunos-modal-detalles-nombrepack").innerHTML = response.nombrepack;
            document.getElementById("wpfunos-modal-detalles-logo-confirmado").innerHTML = response.logo_confirmado;
            document.getElementById("wpfunos-modal-detalles-texto-confirmado").innerHTML = response.texto_confirmado;
            document.getElementById("wpfunos-modal-detalles-logo-ecologico").innerHTML = response.logo_ecologico;
            document.getElementById("wpfunos-modal-detalles-logo-promo").innerHTML = response.logo_promo;
            document.getElementById("wpfunos-modal-detalles-precio").innerHTML = response.precio;
            document.getElementById("wpfunos-modal-detalles-precio-texto").innerHTML = response.precio_texto;
            document.getElementById("wpfunos-modal-detalles-base-precio").innerHTML = response.base_precio;
            document.getElementById("wpfunos-modal-detalles-base-descuento").innerHTML = response.base_descuento;
            document.getElementById("wpfunos-modal-detalles-base-total").innerHTML = response.base_total;

            document.getElementById("wpfunos-modal-detalles-destino-nombre").innerHTML = response.destino_nombre;
            document.getElementById("wpfunos-modal-detalles-destino-precio").innerHTML = response.destino_precio;
            document.getElementById("wpfunos-modal-detalles-destino-descuento").innerHTML = response.destino_descuento;
            document.getElementById("wpfunos-modal-detalles-destino-total").innerHTML = response.destino_total;

            document.getElementById("wpfunos-modal-detalles-ataud-nombre").innerHTML = response.ataud_nombre;
            document.getElementById("wpfunos-modal-detalles-ataud-precio").innerHTML = response.ataud_precio;
            document.getElementById("wpfunos-modal-detalles-ataud-descuento").innerHTML = response.ataud_descuento;
            document.getElementById("wpfunos-modal-detalles-ataud-total").innerHTML = response.ataud_total;

            document.getElementById("wpfunos-modal-detalles-velatorio-nombre").innerHTML = response.velatorio_nombre;
            document.getElementById("wpfunos-modal-detalles-velatorio-precio").innerHTML = response.velatorio_precio;
            document.getElementById("wpfunos-modal-detalles-velatorio-descuento").innerHTML = response.velatorio_descuento;
            document.getElementById("wpfunos-modal-detalles-velatorio-total").innerHTML = response.velatorio_total;

            document.getElementById("wpfunos-modal-detalles-ceremonia-nombre").innerHTML = response.ceremonia_nombre;
            document.getElementById("wpfunos-modal-detalles-ceremonia-precio").innerHTML = response.ceremonia_precio;
            document.getElementById("wpfunos-modal-detalles-ceremonia-descuento").innerHTML = response.ceremonia_descuento;
            document.getElementById("wpfunos-modal-detalles-ceremonia-total").innerHTML = response.ceremonia_total;

            document.getElementById("wpfunos-modal-detalles-generico-precio").innerHTML = response.generico_precio;
            document.getElementById("wpfunos-modal-detalles-generico-descuento").innerHTML = response.generico_descuento;
            document.getElementById("wpfunos-modal-detalles-generico-total").innerHTML = response.generico_total;

            document.getElementById("elementor-tab-title-1901").innerText = response.direccion;
            document.getElementById("wpfunos-modal-detalles-mapa").innerHTML = response.mapa;

            document.getElementById("wpfunos-modal-detalles-incluido").innerHTML = response.comentarios;
            //wpfunos-detalles-llamen
            //wpfunos-detalles-llamar
            //wpfunos-detalles-correo
            //wpfunos-detalles-imprimir
            document.getElementById("wpfunos-detalles-llamen").addEventListener('click', wpfFunctionLlamen2, false);
            document.getElementById("wpfunos-detalles-llamar").addEventListener('click', wpfFunctionLlamar2, false);
            document.getElementById("wpfunos-detalles-correo").addEventListener('click', wpfFunctionEnviarCorreo, false);
            document.getElementById("wpfunos-detalles-imprimir").addEventListener('click', wpfFunctionImprimirPagina, false);

            document.getElementById("wpfdetalles").setAttribute("IDservicio", IDservicio);
            document.getElementById("wpfdetalles").setAttribute("IDusuario", IDusuario);
            document.getElementById("wpfdetalles").setAttribute("wpnonce", wpnonce);
            document.getElementById("wpfdetalles").setAttribute("wpecologico", wpecologico);
            document.getElementById("wpfdetalles").setAttribute("precio", precio);

          } else {
            console.log('fail');
          }
        }
      });

    };

    var wpfFunctionLlamen2= function(){
      IDservicio = document.getElementById("wpfdetalles").getAttribute("IDservicio");
      IDusuario = document.getElementById("wpfdetalles").getAttribute("IDusuario");
      wpnonce = document.getElementById("wpfdetalles").getAttribute("wpnonce");
      wpecologico = document.getElementById("wpfdetalles").getAttribute("wpecologico");
      precio = document.getElementById("wpfdetalles").getAttribute("precio");
      console.log('boton Lamen: servicio '+IDservicio+' usuario '+IDusuario+' nonce '+wpnonce+' ecologico '+wpecologico+' precio '+precio );
    }

    var wpfFunctionLlamar2= function(){
      IDservicio = document.getElementById("wpfdetalles").getAttribute("IDservicio");
      IDusuario = document.getElementById("wpfdetalles").getAttribute("IDusuario");
      wpnonce = document.getElementById("wpfdetalles").getAttribute("wpnonce");
      wpecologico = document.getElementById("wpfdetalles").getAttribute("wpecologico");
      precio = document.getElementById("wpfdetalles").getAttribute("precio");
      console.log('boton Lamar: servicio '+IDservicio+' usuario '+IDusuario+' nonce '+wpnonce+' ecologico '+wpecologico+' precio '+precio );
    }

    var wpfFunctionImprimirPagina = function(){
      IDservicio = document.getElementById("wpfdetalles").getAttribute("IDservicio");
      IDusuario = document.getElementById("wpfdetalles").getAttribute("IDusuario");
      wpnonce = document.getElementById("wpfdetalles").getAttribute("wpnonce");
      wpecologico = document.getElementById("wpfdetalles").getAttribute("wpecologico");
      precio = document.getElementById("wpfdetalles").getAttribute("precio");
      console.log('boton Imprimir p??gina: servicio '+IDservicio+' usuario '+IDusuario+' nonce '+wpnonce+' ecologico '+wpecologico+' precio '+precio );
    }

    var wpfFunctionEnviarCorreo = function(){
      IDservicio = document.getElementById("wpfdetalles").getAttribute("IDservicio");
      IDusuario = document.getElementById("wpfdetalles").getAttribute("IDusuario");
      wpnonce = document.getElementById("wpfdetalles").getAttribute("wpnonce");
      wpecologico = document.getElementById("wpfdetalles").getAttribute("wpecologico");
      precio = document.getElementById("wpfdetalles").getAttribute("precio");
      console.log('boton Enviar correo: servicio '+IDservicio+' usuario '+IDusuario+' nonce '+wpnonce+' ecologico '+wpecologico+' precio '+precio );
    }

    var wpfFunctionEnviaPresupuesto = function() {
      var servicio = document.getElementById("form-field-wpfunosoculto").value;
      var wpecologico = document.getElementById("form-field-wpfunosecologico").value;
      var attribute = document.getElementById("wpfunos-boton-enviar-presupuesto").getAttribute("wpfunos-presupuesto-id");
      var mynonce = document.getElementById("wpfunos-boton-enviar-presupuesto").getAttribute("data-wpnonce");
      var wpusuario = document.getElementById("wpfunos-boton-enviar-presupuesto").getAttribute("wpusuario");

      var mensaje = document.getElementById("form-field-mensajePresupuesto").value;
      var precio = document.getElementById("wpf-precio-"+servicio).getAttribute("wpfunos-att-precio")
      console.log('Click enviar mensaje presupuesto  ' );
      console.log('servicio '+servicio+' wpusuario '+wpusuario+' nonce '+mynonce+' precio '+precio );
      console.log('mensaje: '+mensaje );
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : WpfAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_servicios_enviar_presupuesto",
          "wpfunosid": servicio,
          "noncevalue": mynonce,
          "wpusuario": wpusuario,
          "wpmensaje": mensaje,
          "precio" : precio,
          "ecologico" : wpecologico,
        },
        success: function(response) {
          console.log(response)	;
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
