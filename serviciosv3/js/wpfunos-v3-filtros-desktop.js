<script type="text/javascript" id="wpfunos-v3-filtros-desktop">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    var params = new URLSearchParams(location.search);


    document.getElementById("wpfunos-v3-donde-boton").addEventListener('click', function(){
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.href = "/comparar-precios-nueva";
    } , false);

    document.getElementById("wpfunos-v3-donde-texto").addEventListener('click', function(){
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.href = "/comparar-precios-nueva";
    } , false);
    document.getElementById("wpfunos-v3-donde-texto").innerHTML = document.getElementById("wpf-resultados-referencia").getAttribute("wpfubic");


    document.getElementById("wpfunos-v3-cuando-boton").addEventListener('click', function(){
      if( params.get('cuando') == 'Ahora'){
        params.set('cuando', 'Próximamente');
      }else{
        params.set('cuando', 'Ahora');
      }
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.search = params.toString();
    } , false);

    document.getElementById("wpfunos-v3-cuando-texto").addEventListener('click', function(){
      if( params.get('cuando') == 'Ahora'){
        params.set('cuando', 'Próximamente');
      }else{
        params.set('cuando', 'Ahora');
      }
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.search = params.toString();
    } , false);


    if( params.get('cf[resp1]') == '1' ){
      document.getElementById("wpfunos-boton-destino-entierro").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-destino-entierro").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-destino-entierro").style.borderStyle="none" ;
    }
    if( params.get('cf[resp1]') == '2' ){
      document.getElementById("wpfunos-boton-destino-incineracion").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-destino-incineracion").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-destino-incineracion").style.borderStyle="none" ;
    }

    if( params.get('cf[resp2]') == '1' ){
      document.getElementById("wpfunos-boton-ataud-normal").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-ataud-normal").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-ataud-normal").style.borderStyle="none" ;
    }
    if( params.get('cf[resp2]') == '2' ){
      document.getElementById("wpfunos-boton-destino-economico").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-destino-economico").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-destino-economico").style.borderStyle="none" ;
    }
    if( params.get('cf[resp2]') == '3' ){
      document.getElementById("wpfunos-boton-destino-premium").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-destino-premium").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-destino-premium").style.borderStyle="none" ;
    }

    if( params.get('cf[resp3]') == '1' ){
      document.getElementById("wpfunos-boton-velatorio-si").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-velatorio-si").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-velatorio-si").style.borderStyle="none" ;
    }
    if( params.get('cf[resp3]') == '2' ){
      document.getElementById("wpfunos-boton-velatorio-no").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-velatorio-no").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-velatorio-no").style.borderStyle="none" ;
    }

    if( params.get('cf[resp4]') == '1' ){
      document.getElementById("wpfunos-boton-ceremonia-sin").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-ceremonia-sin").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-ceremonia-sin").style.borderStyle="none" ;
    }
    if( params.get('cf[resp4]') == '2' ){
      document.getElementById("wpfunos-boton-ceremonia-sala").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-ceremonia-sala").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-ceremonia-sala").style.borderStyle="none" ;
    }
    if( params.get('cf[resp4]') == '3' ){
      document.getElementById("wpfunos-boton-ceremonia-civil").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-ceremonia-civil").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-ceremonia-civil").style.borderStyle="none" ;
    }
    if( params.get('cf[resp4]') == '4' ){
      document.getElementById("wpfunos-boton-ceremonia-religiosa").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-ceremonia-religiosa").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-ceremonia-religiosa").style.borderStyle="none" ;
    }

    [ document.getElementById("wpfunos-boton-destino-entierro"), document.getElementById("wpfunos-boton-destino-incineracion") ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp1';
    });
    document.getElementById("wpfunos-boton-destino-entierro").opcion = '1';
    document.getElementById("wpfunos-boton-destino-incineracion").opcion = '2';

    [ document.getElementById("wpfunos-boton-ataud-normal"), document.getElementById("wpfunos-boton-destino-economico"), document.getElementById("wpfunos-boton-destino-premium") ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp2';
    });
    document.getElementById("wpfunos-boton-ataud-normal").opcion = '1';
    document.getElementById("wpfunos-boton-destino-economico").opcion = '2';
    document.getElementById("wpfunos-boton-destino-premium").opcion = '3';

    [ document.getElementById("wpfunos-boton-velatorio-si"), document.getElementById("wpfunos-boton-velatorio-no") ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp3';
    });
    document.getElementById("wpfunos-boton-velatorio-si").opcion = '1';
    document.getElementById("wpfunos-boton-velatorio-no").opcion = '2';

    [ document.getElementById("wpfunos-boton-ceremonia-sin"), document.getElementById("wpfunos-boton-ceremonia-sala"), document.getElementById("wpfunos-boton-ceremonia-civil"), document.getElementById("wpfunos-boton-ceremonia-religiosa") ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp4';
    });
    document.getElementById("wpfunos-boton-ceremonia-sin").opcion = '1';
    document.getElementById("wpfunos-boton-ceremonia-sala").opcion = '2';
    document.getElementById("wpfunos-boton-ceremonia-civil").opcion = '3';
    document.getElementById("wpfunos-boton-ceremonia-religiosa").opcion = '4'



    var orden = params.get('orden');

    if( params.get('orden') === 'precios'){
      document.getElementById("wpfunos-titulo-orden").innerHTML = 'Resultados ordenados por precio.';
      document.getElementById("wpfunos-boton-precio").innerHTML = 'Distancia';
    }else{
      document.getElementById("wpfunos-titulo-orden").innerHTML = 'Resultados ordenados por distancia.';
      document.getElementById("wpfunos-boton-precio").innerHTML = 'Precio';
    }

    document.getElementById("wpfunos-boton-precio").addEventListener('click', function(){
      console.log('click cambiar orden');
      elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup
      if( orden == 'dist' ){
        params.set('orden', 'precios' );
        window.location.search = params.toString();
      }else{
        params.set('orden', 'dist' );
        window.location.search = params.toString();
      }
    }, false);


  });

  function wpfFunctionResp(evt){
    var params = new URLSearchParams(location.search);
    console.log( 'click botón '+evt.currentTarget.resp+' '+evt.currentTarget.opcion);
    if( params.get('cf['+evt.currentTarget.resp+']') != evt.currentTarget.opcion){
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      params.set('cf['+evt.currentTarget.resp+']', evt.currentTarget.opcion );
      if( params.get('cf[resp3]') == '2' && params.get('cf[resp4]') == '1' && parseInt(params.get('distance')) < 100 ){
        console.log('Cambiando distancia 100km y orden a precios.')
        params.set('distance', '100' );
        params.set('orden', 'precios' );
      }
      window.location.search = params.toString();
    }
  }


});
</script>
