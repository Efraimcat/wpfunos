$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){

    window.history.pushState(null, null, window.location.href);
    window.onpopstate = function () {
      window.history.go(1);
    };

    setTimeout(function() {
      $('.elementor-tab-title').removeClass('elementor-active');
      $('.elementor-tab-content').css('display', 'none');
    }, 1000 );

    var params = new URLSearchParams(location.search);
    var obj_id_11 = getCookie('wpf_obj_id_11');//84639 - Ventana Popup Esperando (loader2)

    //

    // WMPL
    var idioma_wpml = getCookie('wp-wpml_current_language');
    if (idioma_wpml === 'es'){
      idioma_URL = '';
    }else{
      idioma_URL = idioma_wpml;
    }

    // WMPL

    document.getElementById('wpfunos-v3-cuando-boton').addEventListener('click', function(){
      if( params.get('cuando') === 'Ahora'){
        params.set('cuando', 'Proximamente');
      }else{
        params.set('cuando', 'Ahora');
      }

      // WPML
      elementorFrontend.documentsManager.documents[obj_id_11].showModal(); //Ventana Popup Esperando (loader2)
      // WPML

      window.location.search = params.toString();
    } , false);

    document.getElementById('wpfunos-v3-cuando-texto').addEventListener('click', function(){
      if( params.get('cuando') === 'Ahora'){
        params.set('cuando', 'Proximamente');
      }else{
        params.set('cuando', 'Ahora');
      }

      // WPML
      elementorFrontend.documentsManager.documents[obj_id_11].showModal(); //Ventana Popup Esperando (loader2)
      // WPML

      window.location.search = params.toString();
    } , false);

    document.getElementById('wpfunos-v3-cuando-boton-movil').addEventListener('click', function(){
      if( params.get('cuando') === 'Ahora'){
        params.set('cuando', 'Proximamente');
      }else{
        params.set('cuando', 'Ahora');
      }

      // WPML
      elementorFrontend.documentsManager.documents[obj_id_11].showModal(); //Ventana Popup Esperando (loader2)
      // WPML

      window.location.search = params.toString();
    } , false);

    document.getElementById('wpfunos-v3-cuando-texto-movil').addEventListener('click', function(){
      if( params.get('cuando') === 'Ahora'){
        params.set('cuando', 'Proximamente');
      }else{
        params.set('cuando', 'Ahora');
      }

      // WPML
      elementorFrontend.documentsManager.documents[obj_id_11].showModal(); //Ventana Popup Esperando (loader2)
      // WPML

      window.location.search = params.toString();
    } , false);

    //

    var orden = params.get('orden');

    if( params.get('orden') === 'precios'){

      // WMPL
      if (idioma_wpml === 'es'){
        document.getElementById('wpfunos-titulo-orden').innerHTML = 'Resultados ordenados por precio.';
        document.getElementById('wpfunos-boton-precio').innerHTML = 'Distancia';
      }
      if (idioma_wpml === 'ca'){
        document.getElementById('wpfunos-titulo-orden').innerHTML = 'Resultats ordenats per preu.';
        document.getElementById('wpfunos-boton-precio').innerHTML = 'Distància';
      }
      // WMPL

    }else{

      // WMPL
      if (idioma_wpml === 'es'){
        document.getElementById('wpfunos-titulo-orden').innerHTML = 'Resultados ordenados por distancia.';
        document.getElementById('wpfunos-boton-precio').innerHTML = 'Precio';
      }
      if (idioma_wpml === 'ca'){
        document.getElementById('wpfunos-titulo-orden').innerHTML = 'Resultats ordenats per distància.';
        document.getElementById('wpfunos-boton-precio').innerHTML = 'Preu';
      }
      // WMPL

    }

    document.getElementById('wpfunos-boton-precio').addEventListener('click', function(){
      console.log('click cambiar orden');

      // WPML
      elementorFrontend.documentsManager.documents[obj_id_11].showModal(); //Ventana Popup Esperando (loader2)
      // WPML

      if( orden === 'dist' ){
        params.set('orden', 'precios' );
        window.location.search = params.toString();
      }else{
        params.set('orden', 'dist' );
        window.location.search = params.toString();
      }
    }, false);

    if( params.get('orden') === 'precios'){

      // WMPL
      if (idioma_wpml === 'es'){
        document.getElementById('wpfunos-titulo-orden-movil').innerHTML = 'Resultados ordenados por precio.';
        document.getElementById('wpfunos-boton-precio-movil').innerHTML = 'Distancia';
      }
      if (idioma_wpml === 'ca'){
        document.getElementById('wpfunos-titulo-orden-movil').innerHTML = 'Resultats ordenats per preu.';
        document.getElementById('wpfunos-boton-precio-movil').innerHTML = 'Distància';
      }
      // WMPL

    }else{

      // WMPL
      if (idioma_wpml === 'es'){
        document.getElementById('wpfunos-titulo-orden-movil').innerHTML = 'Resultados ordenados por distancia.';
        document.getElementById('wpfunos-boton-precio-movil').innerHTML = 'Precio';
      }
      if (idioma_wpml === 'ca'){
        document.getElementById('wpfunos-titulo-orden-movil').innerHTML = 'Resultats ordenats per distància.';
        document.getElementById('wpfunos-boton-precio-movil').innerHTML = 'Preu';
      }
      // WMPL

    }

    document.getElementById('wpfunos-boton-precio-movil').addEventListener('click', function(){
      console.log('click cambiar orden');

      // WPML
      elementorFrontend.documentsManager.documents[obj_id_11].showModal(); //Ventana Popup Esperando (loader2)
      // WPML

      if( orden === 'dist' ){
        params.set('orden', 'precios' );
        window.location.search = params.toString();
      }else{
        params.set('orden', 'dist' );
        window.location.search = params.toString();
      }
    }, false);

    //

    if( params.get('cf[resp1]') === '1' ){
      document.getElementById('wpfunos-boton-destino-entierro').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-entierro').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-entierro').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-destino-entierro-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-entierro-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-entierro-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp1]') === '2' ){
      document.getElementById('wpfunos-boton-destino-incineracion').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-incineracion').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-incineracion').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-destino-incineracion-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-incineracion-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-incineracion-movil').style.borderStyle='none' ;
    }

    if( params.get('cf[resp2]') === '1' ){
      document.getElementById('wpfunos-boton-ataud-normal').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ataud-normal').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ataud-normal').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-ataud-normal-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ataud-normal-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ataud-normal-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp2]') === '2' ){
      document.getElementById('wpfunos-boton-destino-economico').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-economico').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-economico').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-destino-economico-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-economico-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-economico-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp2]') === '3' ){
      document.getElementById('wpfunos-boton-destino-premium').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-premium').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-premium').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-destino-premium-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-premium-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-premium-movil').style.borderStyle='none' ;
    }

    if( params.get('cf[resp3]') === '1' ){
      document.getElementById('wpfunos-boton-velatorio-si').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-velatorio-si').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-velatorio-si').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-velatorio-si-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-velatorio-si-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-velatorio-si-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp3]') === '2' ){
      document.getElementById('wpfunos-boton-velatorio-no').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-velatorio-no').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-velatorio-no').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-velatorio-no-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-velatorio-no-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-velatorio-no-movil').style.borderStyle='none' ;
    }

    if( params.get('cf[resp4]') === '1' ){
      document.getElementById('wpfunos-boton-ceremonia-sin').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-sin').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-sin').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-ceremonia-sin-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-sin-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-sin-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp4]') === '2' ){
      document.getElementById('wpfunos-boton-ceremonia-sala').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-sala').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-sala').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-ceremonia-sala-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-sala-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-sala-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp4]') === '3' ){
      document.getElementById('wpfunos-boton-ceremonia-civil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-civil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-civil').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-ceremonia-civil-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-civil-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-civil-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp4]') === '4' ){
      document.getElementById('wpfunos-boton-ceremonia-religiosa').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-religiosa').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-religiosa').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-ceremonia-religiosa-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-religiosa-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-religiosa-movil').style.borderStyle='none' ;
    }

    [ document.getElementById('wpfunos-boton-destino-entierro'), document.getElementById('wpfunos-boton-destino-incineracion'), document.getElementById('wpfunos-boton-destino-entierro-movil'), document.getElementById('wpfunos-boton-destino-incineracion-movil') ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp1';
    });
    document.getElementById('wpfunos-boton-destino-entierro').opcion = '1';
    document.getElementById('wpfunos-boton-destino-incineracion').opcion = '2';
    document.getElementById('wpfunos-boton-destino-entierro-movil').opcion = '1';
    document.getElementById('wpfunos-boton-destino-incineracion-movil').opcion = '2';

    //

    [ document.getElementById('wpfunos-boton-ataud-normal'), document.getElementById('wpfunos-boton-destino-economico'), document.getElementById('wpfunos-boton-destino-premium'), document.getElementById('wpfunos-boton-ataud-normal-movil'), document.getElementById('wpfunos-boton-destino-economico-movil'), document.getElementById('wpfunos-boton-destino-premium-movil') ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp2';
    });
    document.getElementById('wpfunos-boton-ataud-normal').opcion = '1';
    document.getElementById('wpfunos-boton-destino-economico').opcion = '2';
    document.getElementById('wpfunos-boton-destino-premium').opcion = '3';
    document.getElementById('wpfunos-boton-ataud-normal-movil').opcion = '1';
    document.getElementById('wpfunos-boton-destino-economico-movil').opcion = '2';
    document.getElementById('wpfunos-boton-destino-premium-movil').opcion = '3';

    //

    [ document.getElementById('wpfunos-boton-velatorio-si'), document.getElementById('wpfunos-boton-velatorio-no'), document.getElementById('wpfunos-boton-velatorio-si-movil'), document.getElementById('wpfunos-boton-velatorio-no-movil') ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp3';
    });
    document.getElementById('wpfunos-boton-velatorio-si').opcion = '1';
    document.getElementById('wpfunos-boton-velatorio-no').opcion = '2';
    document.getElementById('wpfunos-boton-velatorio-si-movil').opcion = '1';
    document.getElementById('wpfunos-boton-velatorio-no-movil').opcion = '2';

    //

    [ document.getElementById('wpfunos-boton-ceremonia-sin'), document.getElementById('wpfunos-boton-ceremonia-sala'), document.getElementById('wpfunos-boton-ceremonia-civil'), document.getElementById('wpfunos-boton-ceremonia-religiosa'), document.getElementById('wpfunos-boton-ceremonia-sin-movil'), document.getElementById('wpfunos-boton-ceremonia-sala-movil'), document.getElementById('wpfunos-boton-ceremonia-civil-movil'), document.getElementById('wpfunos-boton-ceremonia-religiosa-movil') ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp4';
    });
    document.getElementById('wpfunos-boton-ceremonia-sin').opcion = '1';
    document.getElementById('wpfunos-boton-ceremonia-sala').opcion = '2';
    document.getElementById('wpfunos-boton-ceremonia-civil').opcion = '3';
    document.getElementById('wpfunos-boton-ceremonia-religiosa').opcion = '4';
    document.getElementById('wpfunos-boton-ceremonia-sin-movil').opcion = '1';
    document.getElementById('wpfunos-boton-ceremonia-sala-movil').opcion = '2';
    document.getElementById('wpfunos-boton-ceremonia-civil-movil').opcion = '3';
    document.getElementById('wpfunos-boton-ceremonia-religiosa-movil').opcion = '4';

    //
  }); // Function END
}); // Document ready END
//
//
//

function wpfFunctionResp(evt){
  var params = new URLSearchParams(location.search);
  console.log( 'click botón '+evt.currentTarget.resp+' '+evt.currentTarget.opcion);
  if( params.get('cf['+evt.currentTarget.resp+']') !== evt.currentTarget.opcion){

    var obj_id_11 = getCookie('wpf_obj_id_11');//84639 - Ventana Popup Esperando (loader2)

    // WPML
    elementorFrontend.documentsManager.documents[obj_id_11].showModal(); //Ventana Popup Esperando (loader2)
    // WPML

    params.set('cf['+evt.currentTarget.resp+']', evt.currentTarget.opcion );
    //    if( params.get('cf[resp3]') === '2' && params.get('cf[resp4]') === '1' && parseInt(params.get('distance')) < 100 ){
    //      console.log('Cambiando distancia 100km y orden a precios.');
    //      params.set('distance', '100' );
    //      params.set('orden', 'precios' );
    //    }

    var wpfnombre = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnombre');
    var wpfip = document.getElementById('wpf-resultados-referencia').getAttribute('wpfip');

    jQuery.ajax({
      type : 'post',
      dataType : 'json',
      url : WpfAjax.ajaxurl,
      data: {
        'action': 'wpfunos_ajax_v3_filtros',
        'wpfnombre' : wpfnombre,
        'wpfip' : wpfip,
        'param' : evt.currentTarget.resp,
        'valor' : evt.currentTarget.opcion,
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
