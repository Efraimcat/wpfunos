$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){

    var wpfdistancia = function() {
      // 1 second delay
      setTimeout(function(){
        console.log('Formulario cambiar distancia');

        $('#wpfunos-v3-boton-formulario-distancia').click(function(){
          console.log('click botón cambiar distancia');
          var newdistance = $('#form-field-nuevadistancia'.val();
          if( newdistance !== ''){
            $('#wpfunos-formulario-nueva-distancia').hide();
            elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_11') ].showModal(); //Ventana Popup Esperando (loader2)

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
          }
        });// click
      }, 1000);
    };
    //
    //
    //
    const elementosDonde = [ '#wpfunos-v3-donde-boton', '#wpfunos-v3-donde-texto', '#wpfunos-v3-donde-boton-movil', '#wpfunos-v3-donde-texto-movil' ];
    const elementosDistancia = [ '#wpfunos-v3-distancia-boton', '#wpfunos-v3-distancia-texto', '#wpfunos-v3-distancia-boton-movil', '#wpfunos-v3-distancia-texto-movil' ];
    var idioma_wpml = getCookie('wp-wpml_current_language');
    if (idioma_wpml === 'es'){
      idioma_URL = '';
    }else{
      idioma_URL = idioma_wpml;
    }
    var params = new URLSearchParams(location.search);
    //
    //
    // DONDE
    $.each( elementosDonde, function( i, elem ) { $(elem).click( function(){
      elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_11') ].showModal(); //Ventana Popup Esperando (loader2)
      window.location.href = idioma_URL+'/comparar-precios-nueva';
    } );
    $.each(['#wpfunos-v3-donde-texto','#wpfunos-v3-donde-texto-movil'], function( i, elem ){ $(elem).html( $('#wpf-resultados-referencia').attr('wpfubic') ); } );
    // DISTANCIA
    $.each( elementosDistancia, function( i, elem ) { $(elem).click( wpfdistancia ); });
    // CUANDO
    if( params.get('cuando') === 'Ahora'){
      $('#wpfunos-v3-cuando-texto').html( $('#textoAhora').text().trim() );
    }else{
      $('#wpfunos-v3-cuando-texto').html( $('#textoProximamente').text().trim() );
    }





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
