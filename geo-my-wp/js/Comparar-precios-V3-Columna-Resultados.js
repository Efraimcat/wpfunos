$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    $('.wpf-v3-boton-llamamos').each( function() { $(this).click(wpfV3Llamamos ); });
    $('.wpf-v3-boton-llamar').each( function() { $(this).click( wpfV3Llamar ); });
    $('.wpf-v3-boton-presupuesto').each( function() { $(this).click( wpfV3Presupuesto ); });
    $('.wpf-v3-boton-detalles').each( function() { $(this).click( wpfV3Detalles ); });
    $('.wpf-v3-boton-financiacion').each( function() { $(this).click( wpfV3Financiacion ); $(this).css('cursor', 'pointer'); });
    $('.wpf-financiacion-no').each( function() { $(this).hide(); });
  }); // Function END
}); // Document ready END

//
//  wpfV3Llamamos()
//
function wpfV3Llamamos() {
  var FuncName = getFuncName();
  var params = new URLSearchParams(location.search);
  var objeto = $(this);
  console.log(FuncName+': Botón Llamamos: Servicio: ' + $(this).attr('wpfid') +' Título: ' + $(this).attr('wpftitulo') );
  elementorFrontend.documentsManager.documents[ '56684' ].showModal(); //Servicios Te llamamos
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
      'cuando': params.get('cuando'),
    },
    success: function(response) {
      console.log(FuncName+': wpfunos_ajax_v3_llamamos response:');
      console.log(response)	;
      if(response.type === 'success') {
        console.log(FuncName+': success');
        $('#wpf-llamamos-respuesta-si').show();
      } else {
        console.log(FuncName+': fail');
        $('#wpf-llamamos-respuesta-no').show();
      }
      $('#wpf-llamamos-espacio').hide();
      $('#wpf-llamamos-respuesta-cerrar').show();
    }
  }); //END AJAX
  $('#wpf-llamamos-cerrar').click(function( event ){
    $('#elementor-popup-modal-56684').hide();
    elementorProFrontend.modules.popup.closePopup( {}, event );
    var params = new URLSearchParams(location.search);
    //
    //elementorFrontend.documentsManager.documents[ '143788' ].showModal(); //AccionesFunerarias
    //$('#form-field-accion').attr('value','Te llamamos');
    //$('#form-field-Servicio').attr('value',objeto.attr('wpftitulo'));
    //$('#form-field-Precio').attr('value',objeto.attr('wpfp'));
    //if( params.get('cf[resp1]') == '1' ){ $( '#form-field-destino' ).val('Entierro'); }
    //if( params.get('cf[resp1]') == '2' ){ $( '#form-field-destino' ).val('Incineración'); }
    //if( params.get('cf[resp2]') == '1' ){ $( '#form-field-ataud' ).val('Ataúd medio'); }
    //if( params.get('cf[resp2]') == '2' ){ $( '#form-field-ataud' ).val('Ataúd económico'); }
    //if( params.get('cf[resp2]') == '3' ){ $( '#form-field-ataud' ).val('Ataúd premium'); }
    //if( params.get('cf[resp3]') == '1' ){ $( '#form-field-velatorio' ).val('Velatorio'); }
    //if( params.get('cf[resp3]') == '2' ){ $( '#form-field-velatorio' ).val('Sin velatorio'); }
    //if( params.get('cf[resp4]') == '1' ){ $( '#form-field-ceremonia' ).val('Sin ceremonia'); }
    //if( params.get('cf[resp4]') == '2' ){ $( '#form-field-ceremonia' ).val('Solo sala'); }
    //if( params.get('cf[resp4]') == '3' ){ $( '#form-field-ceremonia' ).val('Ceremonia civil'); }
    //if( params.get('cf[resp4]') == '4' ){ $( '#form-field-ceremonia' ).val('Ceremonia religiosa'); }
    //
  });
}
//
//  wpfV3Llamar()
//
function wpfV3Llamar() {
  var FuncName = getFuncName();
  var params = new URLSearchParams(location.search);
  var objeto = $(this);
  console.log(FuncName+': Botón Llamar: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') );
  elementorFrontend.documentsManager.documents[ '56680' ].showModal(); //Servicios Llamar
  $('#wpfunos-modal-llamar-titulo').html( $(this).attr('wpftitulo') );
  $('#wpfunos-modal-llamar-telefono').html( $(this).attr('wpftelefono') );
  $('#wpf-llamar-cerrar').hide();

  let isMobile = window.matchMedia('only screen and (max-width: 760px)').matches;
  console.log(FuncName+': isMobile: '+isMobile);
  if ( isMobile ) {
    var tel = 'tel:' + $(this).attr('wpftelefono');
    console.log(FuncName+': tel: '+tel);
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
      'cuando' : params.get('cuando'),
      'nombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
      'email' : $('#wpf-resultados-referencia').attr('wpfemail'),
      'phone' : $('#wpf-resultados-referencia').attr('wpftelefono'),
    },
    success: function(response) {
      console.log(FuncName+': wpfunos_ajax_v3_llamar response:');
      console.log(response)	;
      if(response.type === 'success') {
        console.log(FuncName+': success');
        $('#wpf-llamar-cerrar').show();
      } else {
        console.log(FuncName+': fail');
      }
    }
  });// END AJAX
  $('#wpf-llamar-cerrar').click(function(event){
    $('#elementor-popup-modal-56680').hide();
    elementorProFrontend.modules.popup.closePopup( {}, event );
    var params = new URLSearchParams(location.search);
    //
    //elementorFrontend.documentsManager.documents[ '143788' ].showModal(); //AccionesFunerarias
    //
  });
}
//
//  wpfV3Presupuesto()
//
function wpfV3Presupuesto() {
  var wpftitulo = $(this).attr('wpftitulo');
  var wpfn = $(this).attr('wpfn');
  var wpfid = $(this).attr('wpfid');
  var wpfp = $(this).attr('wpfp');
  var FuncName = getFuncName();

  console.log(FuncName+': Botón Presupuesto: Servicio: ' + wpfid + ' Título: ' + wpftitulo );
  elementorFrontend.documentsManager.documents[ '56676' ].showModal(); //56676 - Servicio Presupuesto
  var checkExist = setInterval(function() {
    if( $('#wpfunos-modal-presupuesto-nombre').length != 0 ){
      clearInterval(checkExist);
      $('#wpfunos-modal-presupuesto-nombre').html( wpftitulo );
      $('#botonEnviarPresupuesto').attr('wpfn', wpfn);
      $('#botonEnviarPresupuesto').attr('wpfid', wpfid);
      $('#botonEnviarPresupuesto').attr('wpfp', wpfp);
      $('#botonEnviarPresupuesto').attr('wpftitulo', wpftitulo);
      //$('#botonEnviarPresupuesto').click( wpfV3EnviaPresupuesto );
      $('#form-field-wpfunosoculto').attr('value',$('#wpf-resultados-referencia').attr('wpfidusuario'));
      $('#form-field-IDservicio').attr('value',wpfid);
      $('#form-field-Servicio').attr('value',wpftitulo);
      $('#form-field-Precio').attr('value',wpfp);
    }
  }, 100); // check every 100ms
}
//
//    wpfV3EnviaPresupuesto()
//
function wpfV3EnviaPresupuesto() {
  var FuncName = getFuncName();
  var params = new URLSearchParams(location.search);
  var titulo = $(this).attr('wpftitulo');
  var precio = $(this).attr('wpfp');
  console.log(FuncName+': Botón Enviar presupuesto: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') );
  console.log(FuncName+': Mensaje: ' + $('#form-field-mensajePresupuesto').val() );

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
      'cuando' : params.get('cuando'),
      'mensaje' : $('#form-field-mensajePresupuesto').val(),
      'nombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
      'email' : $('#wpf-resultados-referencia').attr('wpfemail'),
      'phone' : $('#wpf-resultados-referencia').attr('wpftelefono'),
    },
    success: function(response) {
      console.log(FuncName+': wpfunos_ajax_v3_presupuesto response:');
      console.log(response)	;
      if(response.type === 'success') {
        console.log(FuncName+': success');
      } else {
        console.log(FuncName+': fail');
      }
    }
  });// END AJAX
  //elementorFrontend.documentsManager.documents[ '143788' ].showModal(); //AccionesFunerarias
  //
}
//
//  wpfV3Detalles()
//
function wpfV3Detalles() {
  var FuncName = getFuncName();
  console.log(FuncName+': Botón Detalles: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') + ' Financiación: ' + $(this).attr('wpffinanciacion') );
  elementorFrontend.documentsManager.documents[ '84639' ].showModal(); //Ventana Popup Esperando (loader2)

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
        console.log(FuncName+': success');
        elementorFrontend.documentsManager.documents[ '56672' ].showModal(); //Servicio Detalles
        $('#elementor-popup-modal-84639').hide(); //Ventana Popup Esperando (loader2)
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
        $('#wpfunos-detalles-llamamos').click( wpfV3DetallesLlamamos );
        $('#wpfunos-detalles-llamar').click( wpfV3DetallesLlamar );
        $('#wpfunos-detalles-email').click( wpfV3DetallesEmail );
        $('#wpfunos-detalles-presupuesto').click( wpfV3DetallesPresupuesto );
        $('#wpfunos-detalles-email-movil').click( wpfV3DetallesEmail );
        $('#wpfunos-detalles-presupuesto-movil').click( wpfV3DetallesPresupuesto );
        $('#wpfunos-detalles-financiacion').click( wpfV3Financiacion );
        if ( $(this).attr('wpffinanciacion') == 1 ) $("#wpf-detalles-boton-financiacion").show();
      }else{
        console.log('fail');
        $('#elementor-popup-modal-84639').hide(); //Ventana Popup Esperando (loader2)
      }
    }
  });// END AJAX
}
//
//  wpfV3DetallesLlamamos()
//
function wpfV3DetallesLlamamos() {
  var FuncName = getFuncName();
  var params = new URLSearchParams(location.search);
  var objeto = $(this);
  console.log(FuncName+': Botón Detalles Llamamos: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') );
  $('#elementor-popup-modal-56672').hide(); //Servicio Detalles
  elementorFrontend.documentsManager.documents[ '56684' ].showModal(); //Servicios Te llamamos
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
      'cuando' : params.get('cuando'),
      'nombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
      'email' : $('#wpf-resultados-referencia').attr('wpfemail'),
      'phone' : $('#wpf-resultados-referencia').attr('wpftelefono'),
    },
    success: function(response) {
      console.log(FuncName+': wpfunos_ajax_v3_llamamos response:');
      console.log(response)	;
      if(response.type === 'success') {
        $('#wpf-llamamos-respuesta-si').show();
      } else {
        console.log(FuncName+': fail');
        $('#wpf-llamamos-respuesta-no').show();
      }
      $('#wpf-llamamos-espacio').hide();
      $('#wpf-llamamos-respuesta-cerrar').show();
    }
  });
  $('#wpf-llamamos-cerrar').click( function(event){
    $('#elementor-popup-modal-56684').hide();
    elementorProFrontend.modules.popup.closePopup( {}, event );
    //
    //elementorFrontend.documentsManager.documents[ '143788' ].showModal(); //AccionesFunerarias
    //

  })
}
//
//  wpfV3DetallesLlamar()
//
function wpfV3DetallesLlamar() {
  var FuncName = getFuncName();
  var params = new URLSearchParams(location.search);
  var objeto = $(this);
  console.log(FuncName+': Botón Llamar: Servicio: ' + $(this).attr('wpfid') + ' Título: ' + $(this).attr('wpftitulo') );
  $('#elementor-popup-modal-56672').hide(); //Servicio Detalles
  elementorFrontend.documentsManager.documents[ '56680' ].showModal(); //Servicios Llamar
  $('#wpfunos-modal-llamar-titulo').html( $(this).attr('wpftitulo') );
  $('#wpfunos-modal-llamar-telefono').html( $(this).attr('wpftelefono') );
  $('#wpf-llamar-cerrar').hide();
  let isMobile = window.matchMedia('only screen and (max-width: 760px)').matches;
  console.log(FuncName+': isMobile: '+isMobile);
  if ( isMobile ) {
    var tel = 'tel:' + $(this).attr('wpftelefono');
    console.log(FuncName+': tel: '+tel);
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
      'cuando' : params.get('cuando'),
      'nombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
      'email' : $('#wpf-resultados-referencia').attr('wpfemail'),
      'phone' : $('#wpf-resultados-referencia').attr('wpftelefono'),
    },
    success: function(response) {
      console.log(FuncName+': wpfunos_ajax_v3_llamar response:');
      console.log(response)	;
      if(response.type === 'success') {
        console.log(FuncName+': success');
        $('#wpf-llamar-cerrar').show();
      } else {
        console.log(FuncName+': fail');
        $('#wpf-llamar-cerrar').show();
      }
    }
  });// END AJAX
  $('#wpf-llamar-cerrar').click(function(event){
    $('#elementor-popup-modal-56680').hide();
    elementorProFrontend.modules.popup.closePopup( {}, event );
    var params = new URLSearchParams(location.search);
    //
    //elementorFrontend.documentsManager.documents[ '143788' ].showModal(); //AccionesFunerarias
    //
  });
}
//
//  wpfV3DetallesEmail()
//
function wpfV3DetallesEmail() {
  var FuncName = getFuncName();
  console.log(FuncName+': Botón Detalles email servicio: ' + $(this).attr('wpfid') + ' Precio: ' + $(this).attr('wpfp') + ' Título ' + $(this).attr('wpftitulo') );
  $('#elementor-popup-modal-56672').hide(); //Servicio Detalles
  elementorFrontend.documentsManager.documents[ '47448' ].showModal(); //Servicios Enviar Email
  $('#wpfunos-modal-email-email').html( $('#wpf-resultados-referencia').attr('wpfemail') );
  $.ajax({
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
      console.log(FuncName+': wpfunos_ajax_v3_email response:');
      console.log(response)	;
      if(response.type === 'success') {
        console.log(FuncName+': Correo enviado');
      } else {
        console.log(FuncName+': fail');
      }
    }
  });
  $('#wpf-email-cerrar').click( function(){ $('#elementor-popup-modal-47448').hide(); } );
}
//
//
//
function wpfV3DetallesPresupuesto() {
  var wpftitulo = $(this).attr('wpftitulo');
  var wpfn = $(this).attr('wpfn');
  var wpfid = $(this).attr('wpfid');
  var wpfp = $(this).attr('wpfp');
  var FuncName = getFuncName();

  console.log(FuncName+': Botón Presupuesto: Servicio: ' + wpfid + ' Título: ' + wpftitulo );
  $('#elementor-popup-modal-56672').hide(); //Servicio Detalles
  elementorFrontend.documentsManager.documents[ '56676' ].showModal(); //56676 - Servicio Presupuesto
  var checkExist = setInterval(function() {
    if( $('#wpfunos-modal-presupuesto-nombre').length != 0 ){
      clearInterval(checkExist);
      $('#wpfunos-modal-presupuesto-nombre').html( wpftitulo );
      $('#botonEnviarPresupuesto').attr('wpfn', wpfn);
      $('#botonEnviarPresupuesto').attr('wpfid', wpfid);
      $('#botonEnviarPresupuesto').attr('wpfp', wpfp);
      $('#botonEnviarPresupuesto').attr('wpftitulo', wpftitulo);
      //$('#botonEnviarPresupuesto').click( wpfV3EnviaPresupuesto );
      $('#form-field-IDservicio').attr('value',wpfid);
      $('#form-field-Servicio').attr('value',wpftitulo);
      $('#form-field-Precio').attr('value',wpfp);
    }
  }, 100); // check every 100ms
}
//
//  wpfV3DetallesFinanciacion()
//
function wpfV3DetallesFinanciacion() {
  var wpftitulo = $(this).attr('wpftitulo');
  var wpfn = $(this).attr('wpfn');
  var wpfid = $(this).attr('wpfid');
  var wpfp = $(this).attr('wpfp');
  var FuncName = getFuncName();

  console.log(FuncName+': Botón Financiación: Servicio: ' + wpfid + ' Título: ' + wpftitulo );
  $('#elementor-popup-modal-56672').hide(); //Servicio Detalles
  elementorFrontend.documentsManager.documents[ '111301' ].showModal(); //56676 - Servicio Presupuesto

  var checkExist = setInterval(function() {
    if( $('#wpf-financiacion-funeraria').length != 0 ){
      clearInterval(checkExist);
      $('#wpf-financiacion-funeraria').html( wpftitulo );
      $('#wpf-financiacion-tipo').html( $('.elementor-element-6472ad92')[0].childNodes[1].innerText );
      //
      $('.elementor-field-group-plazos_inferior:eq(0)').hide();
      $('.elementor-field-group-plazos_superior:eq(0)').hide()
      $("#form-field-importe").prop('disabled', true);
      $("#form-field-financiar").prop('disabled', true);
      //
      $('#form-field-importe').val( wpfp );
      $('#form-field-wpfn').val( $('#wpf-resultados-referencia').attr('wpfnombre') );
      $('#form-field-wpfe').val( $('#wpf-resultados-referencia').attr('wpfemail') );
      $('#form-field-wpft').val( $('#wpf-resultados-referencia').attr('wpftelefono') );
      $('#form-field-wpfp').val( wpfp );
      $('#form-field-wpftitulo').val( wpftitulo );
      $('#form-field-wpftipo').val( $('.elementor-element-6472ad92')[0].childNodes[1].innerText );
      $('#form-field-Servicio').attr('value',wpftitulo);
      $('#form-field-Precio').attr('value',wpfp);
    }
  }, 100); // check every 100ms
  setInterval(function() {
    if( $('#form-field-importe').length == 0 ) return;
    $('#form-field-financiar').val( wpfp - $('#form-field-entrada').val() );
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
// wpfV3Financiacion()
//
function wpfV3Financiacion() {
  var wpftitulo = $(this).attr('wpftitulo');
  var wpfn = $(this).attr('wpfn');
  var wpfid = $(this).attr('wpfid');
  var wpfp = $(this).attr('wpfp');
  var FuncName = getFuncName();

  console.log(FuncName+': Botón Financiación: Servicio: ' + wpfid + ' Título: ' + wpftitulo );
  elementorFrontend.documentsManager.documents[ '111305' ].showModal(); //Servicios Financiación Genérico
  $('.elementor-field-group-plazos_inferior:eq(0)').hide();
  $('.elementor-field-group-plazos_superior:eq(0)').hide()
  $("#form-field-financiar").prop('disabled', true);
  $("#form-field-importe").css({'font-size': '15px', 'border-style': 'solid', 'border-width': '2px', 'font-weight': '400' });
  //$('#form-field-nombre').val(getCookie('wpfn'));
  //$('#form-field-email').val(getCookie('wpfe'));
  //$('#form-field-telefono').val(getCookie('wpft'));
  $('#form-field-importe').val( wpfp );
  $('#form-field-Servicio').attr('value',wpftitulo);
  $('#form-field-Precio').attr('value',wpfp);
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
