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

        elementorFrontend.documentsManager.documents['56684'].showModal(); //show the popup

        document.getElementById("wpfunos-modal-llamen-titulo").innerHTML = titulo;
        document.getElementById("wpfunos-modal-llamen-telefono").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");
        document.getElementById("wpfunos-modal-llamen-telefono-movil").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");

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
            console.log('wpfunos_ajax_serviciosv2_llamen response:');
            console.log(response)	;
            if(response.type == "success") {
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

        elementorFrontend.documentsManager.documents['56680'].showModal(); //show the popup

        document.getElementById("wpfunos-modal-llamar-telefono").innerHTML = telefono;

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
            console.log('wpfunos_ajax_serviciosv2_llamar response:');
            console.log(response)	;
            if(response.type == "success") {
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

        elementorFrontend.documentsManager.documents['56676'].showModal(); //show the popup

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
      var distancia = this.getAttribute("wpfdistancia");
      if ( document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail").length < 9
      || document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono").length < 9 ){
        wpfDatosUsuario();
        return;
      }else{
        console.log('boton Detalles servicio: '+servicio+' titulo '+titulo );

        elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup

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
            "distancia" : distancia,
          },
          success: function(response) {
            console.log('wpfunos_ajax_serviciosv2_detalles response:');
            console.log(response)	;
            if(response.type == "success") {
              //response.comentarios;
              elementorFrontend.documentsManager.documents['56672'].showModal(); //show the popup

              document.getElementById("wpf-detalles-logo").innerHTML = response.valor_logo;
              document.getElementById("wpf-detalles-logo-movil").innerHTML = response.valor_logo;

              document.getElementById("wpf-detalles-logo-confirmado").innerHTML = response.valor_logo_confirmado;
              document.getElementById("wpf-detalles-logo-confirmado-movil").innerHTML = response.valor_logo_confirmado;

              document.getElementById("wpf-detalles-nombre").innerHTML = response.valor_nombre;
              document.getElementById("wpf-detalles-nombre-movil").innerHTML = response.valor_nombre;

              document.getElementById("wpf-detalles-servicio").innerHTML = response.valor_servicio;
              document.getElementById("wpf-detalles-servicio-movil").innerHTML = response.valor_servicio;

              document.getElementById("wpf-detalles-precio").innerHTML = response.valor_precio;
              document.getElementById("wpf-detalles-precio-movil").innerHTML = response.valor_precio;

              document.getElementById("wpf-detalles-nombrepack").innerHTML = response.valor_nombrepack;
              document.getElementById("wpf-detalles-nombrepack-movil").innerHTML = response.valor_nombrepack;

              document.getElementById("wpf-detalles-textoprecio").innerHTML = response.valor_textoprecio;
              document.getElementById("wpf-detalles-textoprecio-movil").innerHTML = response.valor_textoprecio;

              document.getElementById("wpf-detalles-direccion").innerHTML = response.valor_direccion;
              document.getElementById("wpf-detalles-direccion-movil").innerHTML = response.valor_direccion;

              document.getElementById("wpf-detalles-distancia").innerHTML = response.valor_distancia+' Km.';

              document.getElementById("wpf-detalles-comentarios").innerHTML = response.comentarios;
              document.getElementById("wpf-detalles-comentarios-movil").innerHTML = response.comentarios;
              $('#elementor-popup-modal-84639').hide()

              document.getElementById("wpfunos-detalles-llamen").addEventListener('click', wpfDetallesLlamen, false);
              document.getElementById("wpfunos-detalles-llamen").setAttribute('wpfid', servicio);
              document.getElementById("wpfunos-detalles-llamen").setAttribute('wpnonce', wpnonce);
              document.getElementById("wpfunos-detalles-llamen").setAttribute('precio', precio);
              document.getElementById("wpfunos-detalles-llamen").setAttribute('titulo', titulo);
              document.getElementById("wpfunos-detalles-llamar").addEventListener('click', wpfDetallesLlamar, false);
              document.getElementById("wpfunos-detalles-llamar").setAttribute('wpfid', servicio);
              document.getElementById("wpfunos-detalles-llamar").setAttribute('wpnonce', wpnonce);
              document.getElementById("wpfunos-detalles-llamar").setAttribute('precio', precio);
              document.getElementById("wpfunos-detalles-llamar").setAttribute('titulo', titulo);
              document.getElementById("wpfunos-detalles-email").addEventListener('click', wpfDetallesEmail, false);
              document.getElementById("wpfunos-detalles-email").setAttribute('wpfid', servicio);
              document.getElementById("wpfunos-detalles-email").setAttribute('wpnonce', wpnonce);
              document.getElementById("wpfunos-detalles-email").setAttribute('precio', precio);
              document.getElementById("wpfunos-detalles-email").setAttribute('titulo', titulo);
              document.getElementById("wpfunos-detalles-presupuesto").addEventListener('click', wpfDetallesPresupuesto, false);
              document.getElementById("wpfunos-detalles-presupuesto").setAttribute('wpfid', servicio);
              document.getElementById("wpfunos-detalles-presupuesto").setAttribute('wpnonce', wpnonce);
              document.getElementById("wpfunos-detalles-presupuesto").setAttribute('precio', precio);
              document.getElementById("wpfunos-detalles-presupuesto").setAttribute('titulo', titulo);
              document.getElementById("wpfunos-detalles-email-movil").addEventListener('click', wpfDetallesEmail, false);
              document.getElementById("wpfunos-detalles-email-movil").setAttribute('wpfid', servicio);
              document.getElementById("wpfunos-detalles-email-movil").setAttribute('wpnonce', wpnonce);
              document.getElementById("wpfunos-detalles-email-movil").setAttribute('precio', precio);
              document.getElementById("wpfunos-detalles-email-movil").setAttribute('titulo', titulo);
              document.getElementById("wpfunos-detalles-presupuesto-movil").addEventListener('click', wpfDetallesPresupuesto, false);
              document.getElementById("wpfunos-detalles-presupuesto-movil").setAttribute('wpfid', servicio);
              document.getElementById("wpfunos-detalles-presupuesto-movil").setAttribute('wpnonce', wpnonce);
              document.getElementById("wpfunos-detalles-presupuesto-movil").setAttribute('precio', precio);
              document.getElementById("wpfunos-detalles-presupuesto-movil").setAttribute('titulo', titulo);

            } else {
              console.log('fail');
            }
          }
        });

      }
    }

    var wpfDetallesLlamen = function() {
      var servicio = this.getAttribute("wpfid");
      var wpnonce = this.getAttribute("wpnonce");
      var precio = this.getAttribute("precio");
      var titulo = this.getAttribute("titulo");
      var telefono = this.getAttribute("wpftelefono");

      console.log('boton Detalles llamen servicio: '+servicio+ ' Precio: ' +precio+ ' T??tulo ' +titulo);

      $('#elementor-popup-modal-56672').hide()
      elementorFrontend.documentsManager.documents['56684'].showModal(); //show the popup

      document.getElementById("wpfunos-modal-llamen-titulo").innerHTML = titulo;
      document.getElementById("wpfunos-modal-llamen-telefono").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");
      document.getElementById("wpfunos-modal-llamen-telefono-movil").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");

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
          console.log('wpfunos_ajax_serviciosv2_llamen response:');
          console.log(response)	;
          if(response.type == "success") {
            document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfref", response.newref);
            $('#wpfunos-modal-fin-formulario').show();
          } else {
            console.log('fail');
          }
        }
      });
    }

    var wpfDetallesLlamar = function() {
      var servicio = this.getAttribute("wpfid");
      var wpnonce = this.getAttribute("wpnonce");
      var precio = this.getAttribute("precio");
      var titulo = this.getAttribute("titulo");

      console.log('boton Detalles llamar servicio: '+servicio+ ' Precio: ' +precio+ ' T??tulo ' +titulo);

      $('#elementor-popup-modal-56672').hide()
      elementorFrontend.documentsManager.documents['56680'].showModal(); //show the popup

      var telefono = document.getElementById("wpf-detalles-boton-llamar").getAttribute("wpftelefono");
      document.getElementById("wpfunos-modal-llamar-telefono").innerHTML = telefono;

      let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
      console.log('isMobile: '+isMobile);
      if ( isMobile ) {
        var tel = 'tel:'+telefono;
        console.log('tel??fono: '+tel);
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
          console.log('wpfunos_ajax_serviciosv2_llamar response:');
          console.log(response)	;
          if(response.type == "success") {
            document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfref", response.newref);
            $('#wpfunos-modal-fin-formulario-llamar').show();
          } else {
            console.log('fail');
          }
        }
      });
    }


    var wpfDetallesEmail = function() {
      var servicio = this.getAttribute("wpfid");
      var wpnonce = this.getAttribute("wpnonce");
      var precio = this.getAttribute("precio");
      var titulo = this.getAttribute("titulo");
      //wpf-resultados-cabecera-referencia
      var wpfemailactual = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfemailactual");
      var wpfnombreactual = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfnombreactual");
      var wpftelefonoactual = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpftelefonoactual");

      console.log('boton Detalles email servicio: '+servicio+ ' Precio: ' +precio+ ' T??tulo ' +titulo);
      elementorFrontend.documentsManager.documents['47448'].showModal(); //show the popup
      if (document.getElementById("wpf-resultados-cabecera-cuando").hasAttribute("wpfemailactual") ){
        document.getElementById("wpfunos-modal-email-email").innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfemailactual");
      }else{
        document.getElementById("wpfunos-modal-email-email").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail");
      }
      $('#elementor-popup-modal-56672').hide()
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : WpfAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_serviciosv2_email",
          "servicio": servicio,
          "wpnonce": wpnonce,
          "precio" : precio,
          "titulo" : titulo,
          "wpfemailactual": wpfemailactual,
          "wpfnombreactual": wpfnombreactual,
          "wpftelefonoactual": wpftelefonoactual,
        },
        success: function(response) {
          console.log('wpfunos_ajax_serviciosv2_email response:');
          console.log(response)	;
          if(response.type == "success") {
            console.log('correo enviado');
          } else {
            console.log('fail');
          }
        }
      });
    }

    var wpfDetallesPresupuesto = function() {
      var servicio = this.getAttribute("wpfid");
      var wpnonce = this.getAttribute("wpnonce");
      var precio = this.getAttribute("precio");
      var titulo = this.getAttribute("titulo");

      console.log('boton Detalles presupuesto servicio: '+servicio+ ' Precio: ' +precio+ ' T??tulo ' +titulo);

      $('#elementor-popup-modal-56672').hide()
      elementorFrontend.documentsManager.documents['56676'].showModal(); //show the popup

      document.getElementById("wpfunos-modal-presupuesto-nombre").innerHTML = titulo;
      document.getElementById("botonEnviarPresupuesto").setAttribute("wpfn", wpnonce );
      document.getElementById("botonEnviarPresupuesto").setAttribute("wpfid", servicio );
      document.getElementById("botonEnviarPresupuesto").setAttribute("wpfp", precio );
      document.getElementById("botonEnviarPresupuesto").setAttribute("wpftitulo", titulo );
      document.getElementById("botonEnviarPresupuesto").addEventListener('click', wpfFunctionEnviaPresupuesto, false);

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
            console.log('wpfunos_ajax_serviciosv2_presupuesto response:');
            console.log(response)	;
            if(response.type == "success") {
              document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfref", response.newref);
              $('#wpfunos-modal-fin-formulario-presupuesto').show();
              $('#elementor-popup-modal-56676').hide()

            } else {
              console.log('fail');
            }
          }
        });
      }
    }

    function wpfDatosUsuario(){
      elementorFrontend.documentsManager.documents['73657'].showModal(); //show the popup
      document.getElementById("wpfunos-v2-enviar-datos").addEventListener('click', function() {
        console.log('click bot??n enviar, Creando entrada.');
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
          var params = new URLSearchParams(location.search);
          var url = params.toString();
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfemail", email);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpftelefono", telefono);
          elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup
          $('#elementor-popup-modal-73657').hide();
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
              console.log('wpfunos_ajax_serviciosv2_entrada_datos response:');
              console.log(response)	;
              if(response.type == "success") {
                $('#elementor-popup-modal-84639').hide();
                window.location.href = response.transient['wpfurl'];
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
