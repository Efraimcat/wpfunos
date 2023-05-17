$ = jQuery.noConflict();
$(document).ready(function(){
  $(function wpfColumnaFiltros(){
    const elementosDonde = [ '#wpfunos-v3-donde-boton', '#wpfunos-v3-donde-texto', '#wpfunos-v3-donde-boton-movil', '#wpfunos-v3-donde-texto-movil' ];
    const elementosDistancia = [ '#wpfunos-v3-distancia-boton', '#wpfunos-v3-distancia-texto', '#wpfunos-v3-distancia-boton-movil', '#wpfunos-v3-distancia-texto-movil' ];
    const elementosCuando = [ '#wpfunos-v3-cuando-boton', '#wpfunos-v3-cuando-texto', '#wpfunos-v3-cuando-boton-movil', '#wpfunos-v3-cuando-texto-movil' ];
    const elementosOrden = [ '#wpfunos-boton-precio', '#wpfunos-boton-precio-movil' ];

    var FuncName = 'wpfColumnaFiltros';
    var params = new URLSearchParams(location.search);
    var orden = params.get('orden');
    var idioma_wpml = getCookie('wp-wpml_current_language');
    if (idioma_wpml === 'es'){
      idioma_URL = '';
    }else{
      idioma_URL = idioma_wpml;
    }

    // DONDE
    $.each( elementosDonde, function( i, elem ) {
      $(elem).click( function(){
        elementorFrontend.documentsManager.documents[ 84639 ].showModal(); //Ventana Popup Esperando (loader2)
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
        console.log(FuncName+': Click cambiar cuando');
        if( params.get('cuando') === 'Ahora'){
          params.set('cuando', 'Proximamente');
        }else{
          params.set('cuando', 'Ahora');
        }
        elementorFrontend.documentsManager.documents[ 84639 ].showModal(); //Ventana Popup Esperando (loader2)
        window.location.search = params.toString();
      });
    });

    // TIPO DE SERVICIO
    $('#wpfunos-boton-destino-entierro').click( {opcion: '1', resp: 'resp1' }, wpfFunctionResp );
    $('#wpfunos-boton-destino-incineracion').click( {opcion: '2', resp: 'resp1' }, wpfFunctionResp );
    $('#wpfunos-boton-destino-entierro-movil').click( {opcion: '1', resp: 'resp1' }, wpfFunctionResp );
    $('#wpfunos-boton-destino-incineracion-movil').click( {opcion: '2', resp: 'resp1' }, wpfFunctionResp );
    // ATAUD
    $('#wpfunos-boton-ataud-normal').click( {opcion: '1', resp: 'resp2' }, wpfFunctionResp );
    $('#wpfunos-boton-destino-economico').click( {opcion: '2', resp: 'resp2' }, wpfFunctionResp );
    $('#wpfunos-boton-destino-premium').click( {opcion: '3', resp: 'resp2' }, wpfFunctionResp );
    $('#wpfunos-boton-ataud-normal-movil').click( {opcion: '1', resp: 'resp2' }, wpfFunctionResp );
    $('#wpfunos-boton-destino-economico-movil').click( {opcion: '2', resp: 'resp2' }, wpfFunctionResp );
    $('#wpfunos-boton-destino-premium-movil').click( {opcion: '3', resp: 'resp2' }, wpfFunctionResp );
    // VELATORIO
    $('#wpfunos-boton-velatorio-si').click( {opcion: '1', resp: 'resp3' }, wpfFunctionResp );
    $('#wpfunos-boton-velatorio-no').click( {opcion: '2', resp: 'resp3' }, wpfFunctionResp );
    $('#wpfunos-boton-velatorio-si-movil').click( {opcion: '1', resp: 'resp3' }, wpfFunctionResp );
    $('#wpfunos-boton-velatorio-no-movil').click( {opcion: '2', resp: 'resp3' }, wpfFunctionResp );
    // CEREMONIA
    $('#wpfunos-boton-ceremonia-sin').click( {opcion: '1', resp: 'resp4' }, wpfFunctionResp );
    $('#wpfunos-boton-ceremonia-sala').click( {opcion: '2', resp: 'resp4' }, wpfFunctionResp );
    $('#wpfunos-boton-ceremonia-civil').click( {opcion: '3', resp: 'resp4' }, wpfFunctionResp );
    $('#wpfunos-boton-ceremonia-religiosa').click( {opcion: '4', resp: 'resp4' }, wpfFunctionResp );
    $('#wpfunos-boton-ceremonia-sin-movil').click( {opcion: '1', resp: 'resp4' }, wpfFunctionResp );
    $('#wpfunos-boton-ceremonia-sala-movil').click( {opcion: '2', resp: 'resp4' }, wpfFunctionResp );
    $('#wpfunos-boton-ceremonia-civil-movil').click( {opcion: '3', resp: 'resp4' }, wpfFunctionResp );
    $('#wpfunos-boton-ceremonia-religiosa-movil').click( {opcion: '4', resp: 'resp4' }, wpfFunctionResp );

    // ORDEN
    $.each( elementosOrden, function( i, elem ) {
      $(elem).click( function(){
        console.log(FuncName+': Click cambiar orden');
        if( orden === 'dist' ){
          params.set('orden', 'precios' );
        }else{
          params.set('orden', 'dist' );
        }
        elementorFrontend.documentsManager.documents[ 84639 ].showModal(); //Ventana Popup Esperando (loader2)
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



function wpfdistancia() {
  var FuncName = getFuncName();
  // 1 second delay
  setTimeout(function(){
    $('#wpfunos-v3-boton-formulario-distancia').click(function(){
      console.log(FuncName+': click botón cambiar distancia');

      var newdistance =  $('#form-field-nuevadistancia').val() ;
      if( newdistance !== ''){

        $('#wpfunos-formulario-nueva-distancia').hide();
        elementorFrontend.documentsManager.documents[ 84639 ].showModal(); //Ventana Popup Esperando (loader2)
        $('#elementor-popup-modal-89948').hide(); //Servicios cambiar distancia V3

        if( parseInt(newdistance) < 5 ) newdistance = '5';
        if( parseInt(newdistance) > 200 ) newdistance = '200';
        var params = new URLSearchParams(location.search);
        params.set('distance', newdistance );
        params.delete("wpfwpf");

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
            'wpfnewref' : $('#wpf-resultados-referencia').attr('wpfnewref'),
            'wpfidusuario': $('#wpf-resultados-referencia').attr('wpfidusuario'),
            'wpfn': $('#wpf-resultados-referencia').attr('wpfn'),
            'wpfurl' : params.toString(),
            'wpfresp1' : $('#wpf-resultados-referencia').attr('wpfresp1'),
            'wpfresp2' : $('#wpf-resultados-referencia').attr('wpfresp2'),
            'wpfresp3' : $('#wpf-resultados-referencia').attr('wpfresp3'),
            'wpfresp4' : $('#wpf-resultados-referencia').attr('wpfresp4'),
          },
          success: function(response) {
            console.log(FuncName+': wpfunos_ajax_v3_filtros response:');
            console.log(response)	;
            if(response.type === 'success') {
              console.log(FuncName+': success');
              window.location.href = response.wpfurl;
            } else {
              console.log(FuncName+': fail');
            }
          }
        });// END AJAX
      }
    });// click
  }, 1000);
}

function wpfFunctionResp(event){
  var FuncName = getFuncName();
  var params = new URLSearchParams(location.search);
  console.log(FuncName+': click botón '+event.data.resp+' '+event.data.opcion);

  if( params.get('cf['+event.data.resp+']') !== event.data.opcion){
    elementorFrontend.documentsManager.documents[ 84639 ].showModal(); //Ventana Popup Esperando (loader2)
    params.set('cf['+event.data.resp+']', event.data.opcion );
    params.delete("wpfwpf");

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
        'wpfnewref' : $('#wpf-resultados-referencia').attr('wpfnewref'),
        'wpfidusuario': $('#wpf-resultados-referencia').attr('wpfidusuario'),
        'wpfn': $('#wpf-resultados-referencia').attr('wpfn'),
        'wpfurl' : params.toString(),
        'wpfresp1' : $('#wpf-resultados-referencia').attr('wpfresp1'),
        'wpfresp2' : $('#wpf-resultados-referencia').attr('wpfresp2'),
        'wpfresp3' : $('#wpf-resultados-referencia').attr('wpfresp3'),
        'wpfresp4' : $('#wpf-resultados-referencia').attr('wpfresp4'),
      },
      success: function(response) {
        console.log(FuncName+': wpfunos_ajax_v3_filtros response:');
        console.log(response)	;
        if(response.type === 'success') {
          console.log(FuncName+': success');
          window.location.href = response.wpfurl;
        } else {
          console.log(FuncName+': fail');
        }
      }
    });// END AJAX
  }
}
