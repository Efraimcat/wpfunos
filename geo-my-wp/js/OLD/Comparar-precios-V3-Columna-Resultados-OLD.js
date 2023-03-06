$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){

    var wpfFunctionLlamamos = function(event) {
      console.log('Botón Llamamos: Servicio: ' + $(this).attr('wpfid') +' Título: ' + $(this).attr('wpftitulo') );
      elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_05') ].showModal(); //Servicios Te llamamos
      $('#wpf-llamamos-respuesta-si').hide();
      $('#wpf-llamamos-respuesta-no').hide();
      $('#wpf-llamamos-respuesta-cerrar').hide();
      $('#wpfunos-modal-llamen-titulo').html( $(this).attr('wpftitulo') );
      $('#wpfunos-modal-llamamos-telefono').html( $('#wpf-resultados-referencia').attr('wpftelefono') );
      $.ajax({
        type : 'post',
        dataType : 'json',
        url : WpfAjax.ajaxurl,
        data: {
          'action': 'wpfunos_ajax_v3_llamamos',
          'servicio': $(this).attr('wpfid'),
          'wpnonce': $(this).attr('wpfn'),
          'precio' : $(this).attr('wpfp'),
          'titulo' : $(this).attr('wpftitulo'),
          'nombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
          'email' : $('#wpf-resultados-referencia').attr('wpfemail'),
          'phone' : $('#wpf-resultados-referencia').attr('wpftelefono'),
        },
        success: function(response) {
          console.log('wpfunos_ajax_v3_llamamos response:');
          console.log(response)	;
          if(response.type === 'success') {
            console.log('success');
            $('#wpf-llamamos-respuesta-si').show();
          } else {
            console.log('fail');
            $('#wpf-llamamos-respuesta-no').show();
          }
          $('#wpf-llamamos-espacio').hide();
          $('#wpf-llamamos-respuesta-cerrar').show();
        }
      }); //END AJAX
      $('#wpf-llamamos-cerrar').click(function(){ $('#elementor-popup-modal-' + getCookie('wpf_obj_id_05') ).hide(); });
    };
    //
    //
    //
    var wpfFunctionLlamar = function() {
      console.log('Botón Llamar: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') );

      elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_04') ].showModal(); //Servicios Llamar

      $('#wpfunos-modal-llamar-titulo').html( $(this).attr('wpftitulo') );
      $('#wpfunos-modal-llamar-telefono').html( $(this).attr('wpftelefono') );

      let isMobile = window.matchMedia('only screen and (max-width: 760px)').matches;
      console.log('isMobile: '+isMobile);
      if ( isMobile ) {
        var tel = 'tel:' + $(this).attr('wpftelefono');
        console.log('tel: '+tel);
        window.location = tel;
      }

      $.ajax({
        type : 'post',
        dataType : 'json',
        url : WpfAjax.ajaxurl,
        data: {
          'action': 'wpfunos_ajax_v3_llamar',
          'servicio': $(this).attr('wpfid'),
          'wpnonce': $(this).attr('wpfn'),
          'precio' : $(this).attr('wpfp'),
          'titulo' : $(this).attr('wpftitulo'),
          'nombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
          'email' : $('#wpf-resultados-referencia').attr('wpfemail'),
          'phone' : $('#wpf-resultados-referencia').attr('wpftelefono'),
        },
        success: function(response) {
          console.log('wpfunos_ajax_v3_llamar response:');
          console.log(response)	;
          if(response.type === 'success') {
            console.log('success');
          } else {
            console.log('fail');
          }
        }
      });// END AJAX
      $('#wpf-llamar-cerrar').click(function(){ $('#elementor-popup-modal-' + getCookie('wpf_obj_id_04') ).hide(); });
    };
    //
    //
    //
    var wpfFunctionPresupuesto = function() {
      //console.log('Botón Presupuesto: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') );

      //elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_03') ].showModal(); //56676 - Servicio Presupuesto

      //var checkExist = setInterval(function() {
      //  if( $('#wpfunos-modal-presupuesto-nombre').length != 0 ){
      //    clearInterval(checkExist);
      //    $('#wpfunos-modal-presupuesto-nombre').html( $(this).attr('wpftitulo') );
      //    $('#botonEnviarPresupuesto').attr('wpfn', $(this).attr('wpfn') );
      //    $('#botonEnviarPresupuesto').attr('wpfid', $(this).attr('wpfid') );
      //    $('#botonEnviarPresupuesto').attr('wpfp', $(this).attr('wpfp') );
      //    $('#botonEnviarPresupuesto').attr('wpftitulo', $(this).attr('wpftitulo') );
      //    $('#botonEnviarPresupuesto').click( wpfFunctionEnviaPresupuesto );
      //  }
      //}, 100); // check every 100ms

      var wpnonce = this.getAttribute('wpfn');
      var servicio = this.getAttribute('wpfid');
      var precio = this.getAttribute('wpfp');
      var titulo = this.getAttribute('wpftitulo');

      var obj_id_03 = getCookie('wpf_obj_id_03');//56676 -Servicios Llamar

      console.log('Botón Presupuesto: Servicio: '+servicio+' Título: '+titulo );

      // WPML
      elementorFrontend.documentsManager.documents[obj_id_03].showModal(); //56676 - Servicio Presupuesto
      // WPML

      var checkExist = setInterval(function() {
        if( document.getElementById('wpfunos-modal-presupuesto-nombre') != null ){
          clearInterval(checkExist);
          document.getElementById('wpfunos-modal-presupuesto-nombre').innerHTML = titulo;
          document.getElementById('botonEnviarPresupuesto').setAttribute('wpfn', wpnonce );
          document.getElementById('botonEnviarPresupuesto').setAttribute('wpfid', servicio );
          document.getElementById('botonEnviarPresupuesto').setAttribute('wpfp', precio );
          document.getElementById('botonEnviarPresupuesto').setAttribute('wpftitulo', titulo );
          document.getElementById('botonEnviarPresupuesto').addEventListener('click', wpfFunctionEnviaPresupuesto, false);
        }
      }, 100); // check every 100ms
    };
    //
    //
    //
    var wpfFunctionEnviaPresupuesto = function() {
      console.log('Botón Enviar presupuesto: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') );
      console.log('mensaje: ' + $('#form-field-mensajePresupuesto').val() );

      $.ajax({
        type : 'post',
        dataType : 'json',
        url : WpfAjax.ajaxurl,
        data: {
          'action': 'wpfunos_ajax_v3_presupuesto',
          'servicio': $(this).attr('wpfid'),
          'wpnonce': $(this).attr('wpfn'),
          'precio' : $(this).attr('wpfp'),
          'titulo' : $(this).attr('wpftitulo'),
          'mensaje' : $('#form-field-mensajePresupuesto').val(),
          'nombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
          'email' : $('#wpf-resultados-referencia').attr('wpfemail'),
          'phone' : $('#wpf-resultados-referencia').attr('wpftelefono'),
        },
        success: function(response) {
          console.log('wpfunos_ajax_v3_presupuesto response:');
          console.log(response)	;
          if(response.type === 'success') {
            console.log('success');
          } else {
            console.log('fail');
          }
        }
      });// END AJAX
    };
    //
    //
    //
    var wpfFunctionDetalles = function() {
      console.log('Botón Detalles: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') + ' Financiación: ' + $(this).attr('wpffinanciacion') );

      elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_11') ].showModal(); //Ventana Popup Esperando (loader2)

      wpfid = $(this).attr('wpfid');
      wpfn = $(this).attr('wpfn');
      wpfp = $(this).attr('wpfp');
      wpftitulo = $(this).attr('wpftitulo');
      wpfdistancia = $(this).attr('wpfdistancia');
      wpftelefono = $(this).attr('wpftelefono');

      $.ajax({
        type : 'post',
        dataType : 'json',
        url : WpfAjax.ajaxurl,
        data: {
          'action': 'wpfunos_ajax_v3_detalles',
          'servicio': $(this).attr('wpfid'),
          'wpnonce': $(this).attr('wpfn'),
          'precio' : $(this).attr('wpfp'),
          'titulo' : $(this).attr('wpftitulo'),
          'distancia' : $(this).attr('wpfdistancia'),
          'telefono' : $(this).attr('wpftelefono'),
          'nombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
          'email' : $('#wpf-resultados-referencia').attr('wpfemail'),
          'phone' : $('#wpf-resultados-referencia').attr('wpftelefono'),
          'resp1' : $('#wpf-resultados-referencia').attr('wpfresp1'),
          'resp2' : $('#wpf-resultados-referencia').attr('wpfresp2'),
          'resp3' : $('#wpf-resultados-referencia').attr('wpfresp3'),
          'resp4' : $('#wpf-resultados-referencia').attr('wpfresp4'),
        },
        success: function(response) {
          console.log(response)	;
          if(response.type === 'success') {
            console.log('success');
            elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_02') ].showModal(); //Servicio Detalles
            $('#elementor-popup-modal-' + getCookie('wpf_obj_id_11') ).hide(); //Ventana Popup Esperando (loader2)
            let isMobile = window.matchMedia('only screen and (max-width: 760px)').matches;
            if ( isMobile ) {
              $('#wpf-detalles-logo-movil').html( response.valor_logo );
              $('#wpf-detalles-logo-confirmado-movil').html( response.valor_logo_confirmado );
              $('#wpf-detalles-nombre-movil').html( response.valor_nombre );
              $('#wpf-detalles-servicio-movil').html( response.valor_servicio );
              $('#wpf-detalles-precio-movil').html( response.valor_precio );
              $('#wpf-detalles-nombrepack-movil').html( response.valor_nombrepack );
              $('#wpf-detalles-textoprecio-movil').html( response.valor_textoprecio );
              $('#wpf-detalles-direccion-movil').html( response.valor_direccion );
              $('#wpf-detalles-distancia').html( response.valor_distancia+' Km.' );
              $('#wpf-detalles-comentarios-movil').html( response.comentarios );
            }else{
              $('#wpf-detalles-logo').html( response.valor_logo );
              $('#wpf-detalles-logo-confirmado').html( response.valor_logo_confirmado );
              $('#wpf-detalles-nombre').html( response.valor_nombre );
              $('#wpf-detalles-servicio').html( response.valor_servicio );
              $('#wpf-detalles-precio').html( response.valor_precio );
              $('#wpf-detalles-nombrepack').html( response.valor_nombrepack );
              $('#wpf-detalles-textoprecio').html( response.valor_textoprecio );
              $('#wpf-detalles-direccion').html( response.valor_direccion );
              $('#wpf-detalles-distancia').html( response.valor_distancia+' Km.' );
              $('#wpf-detalles-comentarios').html( response.comentarios );
            }
            const elementos = [ '#wpfunos-detalles-llamamos', '#wpfunos-detalles-llamar', '#wpfunos-detalles-email', '#wpfunos-detalles-presupuesto', '#wpfunos-detalles-email-movil', '#wpfunos-detalles-presupuesto-movil', '#wpfunos-detalles-financiacion' ];
            $.each( elementos, function( i, elem ) {
              $( elem ).attr({
                wpfid: response.wpfid,
                wpfn: response.wpfn,
                wpfp: response.wpfp,
                wpftitulo: response.wpftitulo,
                wpfdistancia: response.wpfdistancia,
                wpftelefono: response.wpftelefono,
              });
            });
            $('#wpfunos-detalles-llamamos').click( wpfDetallesLlamamos );
            $('#wpfunos-detalles-llamar').click( wpfDetallesLlamar );
            $('#wpfunos-detalles-email').click( wpfDetallesEmail );
            $('#wpfunos-detalles-presupuesto').click( wpfDetallesPresupuesto );
            $('#wpfunos-detalles-email-movil').click( wpfDetallesEmail );
            $('#wpfunos-detalles-presupuesto-movil').click( wpfDetallesPresupuesto );
            $('#wpfunos-detalles-financiacion').click( wpfFunctionDetallesFinanciacion );
            if ( $(this).attr('wpffinanciacion') == 1 ) $("#wpf-detalles-boton-financiacion").show();
          }else{
            console.log('fail');
            $('#elementor-popup-modal-' + getCookie('wpf_obj_id_11') ).hide(); //Ventana Popup Esperando (loader2)
          }
        }
      });// END AJAX
    };
    //
    //
    //
    var wpfDetallesLlamamos = function() {
      console.log('Botón Detalles Llamamos: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') );

      $('#elementor-popup-modal-' + getCookie('wpf_obj_id_02') ).hide(); //Servicio Detalles
      elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_05') ].showModal(); //Servicios Te llamamos

      $('#wpf-llamamos-respuesta-si').hide();
      $('#wpf-llamamos-respuesta-no').hide();
      $('#wpf-llamamos-respuesta-cerrar').hide();
      $('#wpfunos-modal-llamen-titulo').html( $(this).attr('wpftitulo') );
      $('#wpfunos-modal-llamamos-telefono').html( $('#wpf-resultados-referencia').attr('wpftelefono') );
      $('#wpf-llamamos-cerrar').click( function(){ $('#elementor-popup-modal-' + getCookie('wpf_obj_id_05') ).hide(); } );

      jQuery.ajax({
        type : 'post',
        dataType : 'json',
        url : WpfAjax.ajaxurl,
        data: {
          'action': 'wpfunos_ajax_v3_llamamos',
          'servicio': $(this).attr('wpfid'),
          'wpnonce': $(this).attr('wpfn'),
          'precio' : $(this).attr('wpfp'),
          'titulo' : $(this).attr('wpftitulo'),
          'nombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
          'email' : $('#wpf-resultados-referencia').attr('wpfemail'),
          'phone' : $('#wpf-resultados-referencia').attr('wpftelefono'),
        },
        success: function(response) {
          console.log('wpfunos_ajax_v3_llamamos response:');
          console.log(response)	;
          if(response.type === 'success') {
            $('#wpf-llamamos-espacio').hide();
            $('#wpf-llamamos-respuesta-si').show();
            $('#wpf-llamamos-respuesta-cerrar').show();
          } else {
            console.log('fail');
            $('#wpf-llamamos-espacio').hide();
            $('#wpf-llamamos-respuesta-no').show();
            $('#wpf-llamamos-respuesta-cerrar').show();
          }
        }
      });
    };
    //
    //
    //
    var wpfDetallesLlamar = function() {
      console.log('Botón Llamar: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') );

      $('#elementor-popup-modal-' + getCookie('wpf_obj_id_02') ).hide(); //Servicio Detalles
      elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_04') ].showModal(); //Servicios Llamar

      $('#wpfunos-modal-llamar-titulo').html( $(this).attr('wpftitulo') );
      $('#wpfunos-modal-llamar-telefono').html( $(this).attr('wpftelefono') );

      let isMobile = window.matchMedia('only screen and (max-width: 760px)').matches;
      console.log('isMobile: '+isMobile);
      if ( isMobile ) {
        var tel = 'tel:' + $(this).attr('wpftelefono');
        console.log('tel: '+tel);
        window.location = tel;
      }

      $.ajax({
        type : 'post',
        dataType : 'json',
        url : WpfAjax.ajaxurl,
        data: {
          'action': 'wpfunos_ajax_v3_llamar',
          'servicio': $(this).attr('wpfid'),
          'wpnonce': $(this).attr('wpfn'),
          'precio' : $(this).attr('wpfp'),
          'titulo' : $(this).attr('wpftitulo'),
          'nombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
          'email' : $('#wpf-resultados-referencia').attr('wpfemail'),
          'phone' : $('#wpf-resultados-referencia').attr('wpftelefono'),
        },
        success: function(response) {
          console.log('wpfunos_ajax_v3_llamar response:');
          console.log(response)	;
          if(response.type === 'success') {
            console.log('success');
          } else {
            console.log('fail');
          }
        }
      });// END AJAX
      $('#wpf-llamar-cerrar').click(function(){ $('#elementor-popup-modal-' + getCookie('wpf_obj_id_04') ).hide(); });
    };
    //
    //
    //
    var wpfDetallesEmail = function() {
      console.log('boton Detalles email servicio: ' + $(this).attr('wpfid') + ' Precio: ' + $(this).attr('wpfp') + ' Título ' + $(this).attr('wpftitulo') );

      $('#elementor-popup-modal-' + getCookie('wpf_obj_id_02') ).hide(); //Servicio Detalles
      elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_01') ].showModal(); //Servicios Enviar Email
      $('#wpfunos-modal-email-email').html( $('#wpf-resultados-referencia').attr('wpfemail') );

      jQuery.ajax({
        type : 'post',
        dataType : 'json',
        url : WpfAjax.ajaxurl,
        data: {
          'action': 'wpfunos_ajax_v3_email',
          'servicio': $(this).attr('wpfid'),
          'wpnonce': $(this).attr('wpfn'),
          'precio' : $(this).attr('wpfp'),
          'titulo' : $(this).attr('wpftitulo'),
          'nombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
          'email' : $('#wpf-resultados-referencia').attr('wpfemail'),
          'phone' : $('#wpf-resultados-referencia').attr('wpftelefono'),
        },
        success: function(response) {
          console.log('wpfunos_ajax_v3_email response:');
          console.log(response)	;
          if(response.type === 'success') {
            console.log('correo enviado');
          } else {
            console.log('fail');
          }
        }
      });
      $('#wpf-email-cerrar').click( function(){ $('#elementor-popup-modal-' + getCookie('wpf_obj_id_01') ).hide(); } );
    }
    //
    //
    //
    var wpfDetallesPresupuesto = function() {
      console.log('Botón Presupuesto: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') );

      $('#elementor-popup-modal-' + getCookie('wpf_obj_id_02') ).hide(); //Servicio Detalles
      elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_03') ].showModal(); //56676 - Servicio Presupuesto

      var checkExist = setInterval(function() {
        if( $('#wpfunos-modal-presupuesto-nombre').length != 0 ){
          clearInterval(checkExist);
          $('#wpfunos-modal-presupuesto-nombre').html( $(this).attr('wpftitulo') );
          $('#botonEnviarPresupuesto').attr('wpfn', $(this).attr('wpfn') );
          $('#botonEnviarPresupuesto').attr('wpfid', $(this).attr('wpfid') );
          $('#botonEnviarPresupuesto').attr('wpfp', $(this).attr('wpfp') );
          $('#botonEnviarPresupuesto').attr('wpftitulo', $(this).attr('wpftitulo') );
          $('#botonEnviarPresupuesto').click( wpfFunctionEnviaPresupuesto );
        }
      }, 100); // check every 100ms
    }
    //
    //
    //
    var wpfFunctionFinanciacion = function() {
      console.log('Botón Financiación: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') );

      elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_14') ].showModal(); //Servicios Financiación Genérico

      $('.elementor-field-group-plazos_inferior:eq(0)').hide();
      $('.elementor-field-group-plazos_superior:eq(0)').hide()
      $("#form-field-financiar").prop('disabled', true);

      $("#form-field-importe").css({'font-size': '15px', 'border-style': 'solid', 'border-width': '2px', 'font-weight': '400' });

      setInterval(function() {
        if( $('#form-field-importe').length == 0 ) return;
        $('#form-field-financiar').val( $('#form-field-importe').val() - $('#form-field-entrada').val() );
        if( $('#form-field-financiar').val() < 1501 ){
          $('.elementor-field-group-plazos_inferior:eq(0)').show();
          $('.elementor-field-group-plazos_superior:eq(0)').hide();
        }
        if( $('#form-field-financiar').val() > 1500 ){
          $('.elementor-field-group-plazos_inferior:eq(0)').hide();
          $('.elementor-field-group-plazos_superior:eq(0)').show();
        }
        if( $('#form-field-financiar').val() < 0 ){
          $("#wpfFinanciacionEnviar").prop('disabled', true);
        }else{
          $("#wpfFinanciacionEnviar").prop('disabled', false);
        }
      }, 100); // check every 100ms
    }
    //
    //
    //
    var wpfFunctionDetallesFinanciacion = function() {
      console.log('Botón Financiación: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') );

      $('#elementor-popup-modal-' + getCookie('wpf_obj_id_02') ).hide(); //Servicio Detalles
      elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_13') ].showModal(); //56676 - Servicio Presupuesto

      var checkExist = setInterval(function() {
        if( $('#wpf-financiacion-funeraria').length != 0 ){
          clearInterval(checkExist);
          $('#wpf-financiacion-funeraria').html( $(this).attr('wpftitulo') );
          $('#wpf-financiacion-tipo').html( $('.elementor-element-6472ad92')[0].childNodes[1].innerText );
          //
          $('.elementor-field-group-plazos_inferior:eq(0)').hide();
          $('.elementor-field-group-plazos_superior:eq(0)').hide()
          //document.getElementsByClassName('elementor-field-group-plazos_inferior')[0].style.display='none';
          //document.getElementsByClassName('elementor-field-group-plazos_superior')[0].style.display='none';
          $("#form-field-importe").prop('disabled', true);
          $("#form-field-financiar").prop('disabled', true);
          //document.getElementById('form-field-importe').disabled = true;
          //document.getElementById('form-field-financiar').disabled = true;
          //
          $('#form-field-importe').val( $(this).attr('wpfp') );
          $('#form-field-wpfn').val( $('#wpf-resultados-referencia').attr('wpfnombre') );
          $('#form-field-wpfe').val( $('#wpf-resultados-referencia').attr('wpfemail') );
          $('#form-field-wpft').val( $('#wpf-resultados-referencia').attr('wpftelefono') );
          $('#form-field-wpfp').val( $(this).attr('wpfp') );
          $('#form-field-wpftitulo').val( $(this).attr('wpftitulo') );
          $('#form-field-wpftipo').val( $('.elementor-element-6472ad92')[0].childNodes[1].innerText );
        }
      }, 100); // check every 100ms
      setInterval(function() {
        if( $('#form-field-importe').length == 0 ) return;
        $('#form-field-financiar').val( $(this).attr('wpfp') - $('#form-field-entrada').val() );
        if( $('#form-field-financiar').val() < 1501 ){
          $('.elementor-field-group-plazos_inferior:eq(0)').show();
          $('.elementor-field-group-plazos_superior:eq(0)').hide();
        }
        if( $('#form-field-financiar').val() > 1500 ){
          $('.elementor-field-group-plazos_inferior:eq(0)').hide();
          $('.elementor-field-group-plazos_superior:eq(0)').show();
        }
        if( $('#form-field-financiar').val() < 0 ){
          $("#wpfFinanciacionEnviar").prop('disabled', true);
        }else{
          $("#wpfFinanciacionEnviar").prop('disabled', false);
        }
      }, 100); // check every 100ms
    };
    //
    //
    //
    $('.wpf-v3-boton-llamamos').each( function() { $(this).click(wpfFunctionLlamamos); });
    $('.wpf-v3-boton-llamar').each( function() { $(this).click( wpfFunctionLlamar ); });
    $('.wpf-v3-boton-presupuesto').each( function() { $(this).click( wpfFunctionPresupuesto ); });
    $('.wpf-v3-boton-detalles').each( function() { $(this).click( wpfFunctionDetalles ); });
    $('.wpf-v3-boton-financiacion').each( function() { $(this).click( wpfFunctionFinanciacion ); $(this).css('cursor', 'pointer'); });
    $('.wpf-financiacion-no').each( function() { $(this).hide(); });
  }); // Function END
}); // Document ready END
//getCookie('wp-wpml_current_language')
function getCookie(c_name) {
  var c_value = document.cookie,
  c_start = c_value.indexOf(" " + c_name + "=");
  if (c_start == -1) c_start = c_value.indexOf(c_name + "=");
  if (c_start == -1) {
    c_value = null;
  } else {
    c_start = c_value.indexOf("=", c_start) + 1;
    var c_end = c_value.indexOf(";", c_start);
    if (c_end == -1) {
      c_end = c_value.length;
    }
    c_value = unescape(c_value.substring(c_start, c_end));
  }
  return c_value;
}
