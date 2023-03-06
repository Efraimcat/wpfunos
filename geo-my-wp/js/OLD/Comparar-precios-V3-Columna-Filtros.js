$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    const elementosDonde = [ '#wpfunos-v3-donde-boton', '#wpfunos-v3-donde-texto', '#wpfunos-v3-donde-boton-movil', '#wpfunos-v3-donde-texto-movil' ];
    const elementosDistancia = [ '#wpfunos-v3-distancia-boton', '#wpfunos-v3-distancia-texto', '#wpfunos-v3-distancia-boton-movil', '#wpfunos-v3-distancia-texto-movil' ];
    const elementosCuando = [ '#wpfunos-v3-cuando-boton', '#wpfunos-v3-cuando-texto', '#wpfunos-v3-cuando-boton-movil', '#wpfunos-v3-cuando-texto-movil' ];
    const elementosOrden = [ '#wpfunos-boton-precio', '#wpfunos-boton-precio-movil' ];

    var idioma_wpml = getCookie('wp-wpml_current_language');
    if (idioma_wpml === 'es'){
      idioma_URL = '';
    }else{
      idioma_URL = idioma_wpml;
    }

    var params = new URLSearchParams(location.search);
    var orden = params.get('orden');
    //
    //
    // DONDE
    $.each( elementosDonde, function( i, elem ) {
      $(elem).click( function(){
        elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_11') ].showModal(); //Ventana Popup Esperando (loader2)
        window.location.href = idioma_URL+'/comparar-precios-nueva';
      });
    });
    $.each(['#wpfunos-v3-donde-texto','#wpfunos-v3-donde-texto-movil'], function( i, elem ){ $(elem).html( $('#wpf-resultados-referencia').attr('wpfubic') ); } );
    // DISTANCIA
    $.each( elementosDistancia, function( i, elem ) { $(elem).click( wpfdistancia ); });
    // CUANDO
    if( params.get('cuando') === 'Ahora'){
      $('#wpfunos-v3-cuando-texto').html( $('#textoAhora').text().trim() );
    }else{
      $('#wpfunos-v3-cuando-texto').html( $('#textoProximamente').text().trim() );
    }
    $.each( elementosCuando, function( i, elem ) {
      $(elem).click( function(){
        if( params.get('cuando') === 'Ahora'){
          params.set('cuando', 'Proximamente');
        }else{
          params.set('cuando', 'Ahora');
        }
        elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_11') ].showModal(); //Ventana Popup Esperando (loader2)
        window.location.search = params.toString();
      });
    });
    // TIPO DE SERVICIO
    $('#wpfunos-boton-destino-entierro').click( {opcion: '1', resp: 'resp1' }, FunctionRespEvent );
    $('#wpfunos-boton-destino-incineracion').click( {opcion: '2', resp: 'resp1' }, FunctionRespEvent );
    $('#wpfunos-boton-destino-entierro-movil').click( {opcion: '1', resp: 'resp1' }, FunctionRespEvent );
    $('#wpfunos-boton-destino-incineracion-movil').click( {opcion: '2', resp: 'resp1' }, FunctionRespEvent );
    // ATAUD
    $('#wpfunos-boton-ataud-normal').click( {opcion: '1', resp: 'resp2' }, FunctionRespEvent );
    $('#wpfunos-boton-destino-economico').click( {opcion: '2', resp: 'resp2' }, FunctionRespEvent );
    $('#wpfunos-boton-destino-premium').click( {opcion: '3', resp: 'resp2' }, FunctionRespEvent );
    $('#wpfunos-boton-ataud-normal-movil').click( {opcion: '1', resp: 'resp2' }, FunctionRespEvent );
    $('#wpfunos-boton-destino-economico-movil').click( {opcion: '2', resp: 'resp2' }, FunctionRespEvent );
    $('#wpfunos-boton-destino-premium-movil').click( {opcion: '3', resp: 'resp2' }, FunctionRespEvent );
    // VELATORIO
    $('#wpfunos-boton-velatorio-si').click( {opcion: '1', resp: 'resp3' }, FunctionRespEvent );
    $('#wpfunos-boton-velatorio-no').click( {opcion: '2', resp: 'resp3' }, FunctionRespEvent );
    $('#wpfunos-boton-velatorio-si-movil').click( {opcion: '1', resp: 'resp3' }, FunctionRespEvent );
    $('#wpfunos-boton-velatorio-no-movil').click( {opcion: '2', resp: 'resp3' }, FunctionRespEvent );
    // CEREMONIA
    $('#wpfunos-boton-ceremonia-sin').click( {opcion: '1', resp: 'resp4' }, FunctionRespEvent );
    $('#wpfunos-boton-ceremonia-sala').click( {opcion: '2', resp: 'resp4' }, FunctionRespEvent );
    $('#wpfunos-boton-ceremonia-civil').click( {opcion: '3', resp: 'resp4' }, FunctionRespEvent );
    $('#wpfunos-boton-ceremonia-religiosa').click( {opcion: '4', resp: 'resp4' }, FunctionRespEvent );
    $('#wpfunos-boton-ceremonia-sin-movil').click( {opcion: '1', resp: 'resp4' }, FunctionRespEvent );
    $('#wpfunos-boton-ceremonia-sala-movil').click( {opcion: '2', resp: 'resp4' }, FunctionRespEvent );
    $('#wpfunos-boton-ceremonia-civil-movil').click( {opcion: '3', resp: 'resp4' }, FunctionRespEvent );
    $('#wpfunos-boton-ceremonia-religiosa-movil').click( {opcion: '4', resp: 'resp4' }, FunctionRespEvent );
    // ORDEN
    $.each( elementosOrden, function( i, elem ) {
      $(elem).click( function(){
        console.log('click cambiar orden');
        if( orden === 'dist' ){
          params.set('orden', 'precios' );
        }else{
          params.set('orden', 'dist' );
        }
        elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_11') ].showModal(); //Ventana Popup Esperando (loader2)
        window.location.search = params.toString();
      });
    });
    if( ( orden ) === 'precios'){
      $('#wpfunos-titulo-orden').html( $('#textoOrdenPrecio').text().trim() );
      $('#wpfunos-boton-precio').html( $('#textoDistancia').text().trim() );
      $('#wpfunos-titulo-orden-movil').html( $('#textoOrdenPrecio').text().trim() );
      $('#wpfunos-boton-precio-movil').html( $('#textoDistancia').text().trim() );
    }else{
      $('#wpfunos-titulo-orden').html( $('#textoOrdenDistancia').text().trim() );
      $('#wpfunos-boton-precio').html( $('#textoPrecio').text().trim() );
      $('#wpfunos-titulo-orden-movil').html( $('#textoOrdenDistancia').text().trim() );
      $('#wpfunos-boton-precio-movil').html( $('#textoPrecio').text().trim() );
    }
    //
    if( params.get('cf[resp1]') === '1' ){
      $('#wpfunos-boton-destino-entierro').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
      $('#wpfunos-boton-destino-entierro-movil').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
    }
    if( params.get('cf[resp1]') === '2' ){
      $('#wpfunos-boton-destino-incineracion').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
      $('#wpfunos-boton-destino-incineracion-movil').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
    }

    if( params.get('cf[resp2]') === '1' ){
      $('#wpfunos-boton-ataud-normal').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
      $('#wpfunos-boton-ataud-normal-movil').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
    }
    if( params.get('cf[resp2]') === '2' ){
      $('#wpfunos-boton-destino-economico').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
      $('#wpfunos-boton-destino-economico-movil').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
    }
    if( params.get('cf[resp2]') === '3' ){
      $('#wpfunos-boton-destino-premium').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
      $('#wpfunos-boton-destino-premium-movil').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
    }

    if( params.get('cf[resp3]') === '1' ){
      $('#wpfunos-boton-velatorio-si').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
      $('#wpfunos-boton-velatorio-si-movil').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
    }
    if( params.get('cf[resp3]') === '2' ){
      $('#wpfunos-boton-velatorio-no').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
      $('#wpfunos-boton-velatorio-no-movil').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
    }

    if( params.get('cf[resp4]') === '1' ){
      $('#wpfunos-boton-ceremonia-sin').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
      $('#wpfunos-boton-ceremonia-sin-movil').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
    }
    if( params.get('cf[resp4]') === '2' ){
      $('#wpfunos-boton-ceremonia-sala').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
      $('#wpfunos-boton-ceremonia-sala-movil').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
    }
    if( params.get('cf[resp4]') === '3' ){
      $('#wpfunos-boton-ceremonia-civil').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
      $('#wpfunos-boton-ceremonia-civil-movil').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
    }
    if( params.get('cf[resp4]') === '4' ){
      $('#wpfunos-boton-ceremonia-religiosa').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
      $('#wpfunos-boton-ceremonia-religiosa-movil').css({'background-color': 'rgb(57, 194, 243)', 'color': 'rgb(255, 255, 255)', 'border-style': 'none' });
    }
  }); // Function END
}); // Document ready END

function wpfdistancia(){
  // 1 second delay
  setTimeout(function(){
    console.log('Formulario cambiar distancia');

    $('#wpfunos-v3-boton-formulario-distancia').click(function(){
      console.log('click botón cambiar distancia');

      var newdistance =  $('#form-field-nuevadistancia').val() ;
      if( newdistance !== ''){
        $('#wpfunos-formulario-nueva-distancia').hide();
        elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_11') ].showModal(); //Ventana Popup Esperando (loader2)
        $('#elementor-popup-modal-' + getCookie('wpf_obj_id_15') ).hide(); //Servicios cambiar distancia V3

        if( parseInt(newdistance) < 5 ) newdistance = '5';
        if( parseInt(newdistance) > 200 ) newdistance = '200';
        var params = new URLSearchParams(location.search);
        params.set('distance', newdistance );

        $.ajax({
          type : 'post',
          dataType : 'json',
          url : WpfAjax.ajaxurl,
          data: {
            'action': 'wpfunos_ajax_v3_filtros',
            'wpfnombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
            'wpfip' : $('#wpf-resultados-referencia').attr('wpfip'),
            'param' : 'Distancia',
            'valor' : newdistance,
          },
          success: function(response) {
            console.log('wpfunos_ajax_v3_filtros response:');
            console.log(response)	;
            if(response.type === 'success') {
              console.log('OK');
            } else {
              console.log('fail');
            }
          }
        });// END AJAX
        window.location.search = params.toString();
      }
    });// click
  }, 1000);
};

function FunctionRespEvent(event){
  var params = new URLSearchParams(location.search);
  console.log( 'click botón '+event.data.resp+' '+event.data.opcion);

  if( params.get('cf['+event.data.resp+']') !== event.data.opcion){
    elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_11') ].showModal(); //Ventana Popup Esperando (loader2)

    params.set('cf['+event.data.resp+']', event.data.opcion );

    $.ajax({
      type : 'post',
      dataType : 'json',
      url : WpfAjax.ajaxurl,
      data: {
        'action': 'wpfunos_ajax_v3_filtros',
        'wpfnombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
        'wpfip' : $('#wpf-resultados-referencia').attr('wpfip'),
        'param' : event.data.resp,
        'valor' : event.data.opcion,
      },
      success: function(response) {
        console.log('wpfunos_ajax_v3_filtros response:');
        console.log(response)	;
        if(response.type === 'success') {
          console.log('OK');
        } else {
          console.log('fail');
        }
      }
    });
    window.location.search = params.toString();
  }
}

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
