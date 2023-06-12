// /compara-precios-aseguradoras?address
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){

    var checkExist = setInterval(function() {
      if (document.getElementById('wpf-aseg-1') ) {
        console.log('Compara precios aseguradoras');
        clearInterval(checkExist);

        var elementsLlamamos = document.getElementsByClassName('wpfunos-boton-aseguradora-llamamos');
        var elementsLlamamosMovil = document.getElementsByClassName('wpfunos-boton-aseguradora-llamamos-movil');
        var elementsPresupuesto = document.getElementsByClassName('wpfunos-boton-aseguradora-presupuesto');
        var elementsPresupuestoMovil = document.getElementsByClassName('wpfunos-boton-aseguradora-presupuesto-movil');
        var elementsDetalles = document.getElementsByClassName('wpfunos-boton-aseguradoras-detalles');

        setTimeout(function() {
          $('.elementor-tab-title').removeClass('elementor-active');
          $('.elementor-tab-content').css('display', 'none');
          [document.getElementById('wpf-movil-aseg-1'), document.getElementById('wpf-movil-aseg-2'), document.getElementById('wpf-movil-aseg-3'), document.getElementById('wpf-movil-aseg-4'), document.getElementById('wpf-movil-aseg-5'), document.getElementById('wpf-movil-aseg-6') ].forEach(function(element) {
            element.addEventListener('click', wpfcerrarfiltros, false);
          });
        }, 1000 );

        var wpfcerrarfiltros = function() {
          $('.elementor-tab-title').removeClass('elementor-active');
          $('.elementor-tab-content').css('display', 'none');
        };

        var myFunctionLlamamos = function() {
          var wpnonce = this.getAttribute('data-wpnonce');
          var servicio = this.getAttribute('wpfid');
          var usuario = this.getAttribute('wpusuario');
          var titulo = this.getAttribute('wptitulo');
          var telusuario = this.getAttribute('wpftelus');

          console.log('boton Llamen Aseguradora: '+servicio+ ' Título: ' +titulo+ ' TelUsuario: ' +telusuario );

          elementorFrontend.documentsManager.documents['55817'].showModal(); //show the popup

          setTimeout(function(){

            document.getElementById('wpfunos-modal-llamen-titulo').innerHTML = titulo;
            document.getElementById('wpfunos-modal-llamen-numero').innerHTML = telusuario;

            document.getElementById('botonTeLlamaran').setAttribute('wpfn', wpnonce );
            document.getElementById('botonTeLlamaran').setAttribute('wpfid', servicio );
            document.getElementById('botonTeLlamaran').setAttribute('wpfu', usuario );
            document.getElementById('botonTeLlamaran').addEventListener('click', wpfFunctionLeadLlamamos, false);

          }, 1000);

        };
        var myFunctionPresupuesto = function() {
          var wpnonce = this.getAttribute('data-wpnonce');
          var servicio = this.getAttribute('wpfid');
          var usuario = this.getAttribute('wpusuario');
          var titulo = this.getAttribute('wptitulo');
          var telusuario = this.getAttribute('wpftelus');

          console.log('boton Llamen Aseguradora: '+servicio+ ' Título: ' +titulo+ ' TelUsuario: ' +telusuario );

          elementorFrontend.documentsManager.documents['56054'].showModal(); //show the popup

          setTimeout(function(){

            document.getElementById('wpfunos-modal-presupuesto-nombre').innerHTML = titulo;

            document.getElementById('botonEnviarPresupuesto').setAttribute('wpfn', wpnonce );
            document.getElementById('botonEnviarPresupuesto').setAttribute('wpfid', servicio );
            document.getElementById('botonEnviarPresupuesto').setAttribute('wpfu', usuario );
            document.getElementById('botonEnviarPresupuesto').addEventListener('click', wpfFunctionLeadPresupuesto, false);

          }, 1000);

        };
        var myFunctionDetalles = function() {

        };
        var wpfFunctionLeadLlamamos = function() {
          var wpnonce = this.getAttribute('wpfn');
          var servicio = this.getAttribute('wpfid');
          var usuario = this.getAttribute('wpfu');
          var mensaje = document.getElementById('form-field-mensajePresupuesto').value;

          console.log('boton Enviar API servicio: '+servicio );
          console.log('mensaje: '+mensaje );

          jQuery.ajax({
            type : 'post',
            dataType : 'json',
            url : WpfAjax.ajaxurl,
            data: {
              'action': 'wpfunos_ajax_aseguradoras_llamamos',
              'wpfid': servicio,
              'wpfn': wpnonce,
              'wpfu' : usuario,
              'wpfm' : mensaje,
            },
            success: function(response) {
              console.log('wpfunos_ajax_aseguradoras_llamamos response:');
              console.log(response)	;
              if(response.type === 'success') {
                $('#elementor-popup-modal-55817').hide();
              } else {
                console.log('fail');
              }
            }
          });
        };

        var wpfFunctionLeadPresupuesto = function() {
          var wpnonce = this.getAttribute('wpfn');
          var servicio = this.getAttribute('wpfid');
          var usuario = this.getAttribute('wpfu');
          var mensaje = document.getElementById('form-field-mensajePresupuesto').value;

          console.log('boton Enviar API servicio: '+servicio );
          console.log('mensaje: '+mensaje );

          jQuery.ajax({
            type : 'post',
            dataType : 'json',
            url : WpfAjax.ajaxurl,
            data: {
              'action': 'wpfunos_ajax_aseguradoras_presupuesto',
              'wpfid': servicio,
              'wpfn': wpnonce,
              'wpfu' : usuario,
              'wpfm' : mensaje,
            },
            success: function(response) {
              console.log('wpfunos_ajax_aseguradoras_presupuesto response:');
              console.log(response)	;
              if(response.type === 'success') {
                $('#elementor-popup-modal-56054').hide();
              } else {
                console.log('fail');
              }
            }
          });


        };

        for (var i = 0; i < elementsLlamamos.length; i++) {
          elementsLlamamos[i].addEventListener('click', myFunctionLlamamos, false);
        }
        for (var i = 0; i < elementsLlamamosMovil.length; i++) {
          elementsLlamamosMovil[i].addEventListener('click', myFunctionLlamamos, false);
        }
        for (var i = 0; i < elementsPresupuesto.length; i++) {
          elementsPresupuesto[i].addEventListener('click', myFunctionPresupuesto, false);
        }
        for (var i = 0; i < elementsPresupuestoMovil.length; i++) {
          elementsPresupuestoMovil[i].addEventListener('click', myFunctionPresupuesto, false);
        }

        for (var i = 0; i < elementsDetalles.length; i++) {
          elementsDetalles[i].addEventListener('click', myFunctionDetalles, false);
        }

      }
    }, 100); // check every 100ms

  }); // Function END

}); // Document ready END
