<script type="text/javascript" id="wpfunos-v3-filtros-movil">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    var params = new URLSearchParams(location.search);


    document.getElementById("wpfunos-v3-donde-boton-movil").addEventListener('click', function(){
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.href = "/comparar-precios-nueva";
    } , false);

    document.getElementById("wpfunos-v3-donde-texto-movil").addEventListener('click', function(){
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.href = "/comparar-precios-nueva";
    } , false);
    document.getElementById("wpfunos-v3-donde-texto").innerHTML = document.getElementById("wpf-resultados-referencia").getAttribute("wpfubic");


    document.getElementById("wpfunos-v3-cuando-boton-movil").addEventListener('click', function(){
      if( params.get('cuando') == 'Ahora'){
        params.set('cuando', 'Próximamente');
      }else{
        params.set('cuando', 'Ahora');
      }
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.search = params.toString();
    } , false);

    document.getElementById("wpfunos-v3-cuando-texto-movil").addEventListener('click', function(){
      if( params.get('cuando') == 'Ahora'){
        params.set('cuando', 'Próximamente');
      }else{
        params.set('cuando', 'Ahora');
      }
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.search = params.toString();
    } , false);


    if( params.get('cf[resp1]') == '1' ){
      document.getElementById("wpfunos-boton-destino-entierro-movil").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-destino-entierro-movil").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-destino-entierro-movil").style.borderStyle="none" ;
    }
    if( params.get('cf[resp1]') == '2' ){
      document.getElementById("wpfunos-boton-destino-incineracion-movil").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-destino-incineracion-movil").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-destino-incineracion-movil").style.borderStyle="none" ;
    }

    if( params.get('cf[resp2]') == '1' ){
      document.getElementById("wpfunos-boton-ataud-normal-movil").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-ataud-normal-movil").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-ataud-normal-movil").style.borderStyle="none" ;
    }
    if( params.get('cf[resp2]') == '2' ){
      document.getElementById("wpfunos-boton-destino-economico-movil").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-destino-economico-movil").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-destino-economico-movil").style.borderStyle="none" ;
    }
    if( params.get('cf[resp2]') == '3' ){
      document.getElementById("wpfunos-boton-destino-premium-movil").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-destino-premium-movil").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-destino-premium-movil").style.borderStyle="none" ;
    }

    if( params.get('cf[resp3]') == '1' ){
      document.getElementById("wpfunos-boton-velatorio-si-movil").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-velatorio-si-movil").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-velatorio-si-movil").style.borderStyle="none" ;
    }
    if( params.get('cf[resp3]') == '2' ){
      document.getElementById("wpfunos-boton-velatorio-no-movil").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-velatorio-no-movil").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-velatorio-no-movil").style.borderStyle="none" ;
    }

    if( params.get('cf[resp4]') == '1' ){
      document.getElementById("wpfunos-boton-ceremonia-sin-movil").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-ceremonia-sin-movil").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-ceremonia-sin-movil").style.borderStyle="none" ;
    }
    if( params.get('cf[resp4]') == '2' ){
      document.getElementById("wpfunos-boton-ceremonia-sala-movil").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-ceremonia-sala-movil").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-ceremonia-sala-movil").style.borderStyle="none" ;
    }
    if( params.get('cf[resp4]') == '3' ){
      document.getElementById("wpfunos-boton-ceremonia-civil-movil").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-ceremonia-civil-movil").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-ceremonia-civil-movil").style.borderStyle="none" ;
    }
    if( params.get('cf[resp4]') == '4' ){
      document.getElementById("wpfunos-boton-ceremonia-religiosa-movil").style.backgroundColor = "rgb(57, 194, 243)";
      document.getElementById("wpfunos-boton-ceremonia-religiosa-movil").style.color = "rgb(255, 255, 255)";
      document.getElementById("wpfunos-boton-ceremonia-religiosa-movil").style.borderStyle="none" ;
    }

    [ document.getElementById("wpfunos-boton-destino-entierro-movil"), document.getElementById("wpfunos-boton-destino-incineracion-movil") ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp1';
    });
    document.getElementById("wpfunos-boton-destino-entierro-movil").opcion = '1';
    document.getElementById("wpfunos-boton-destino-incineracion-movil").opcion = '2';

    [ document.getElementById("wpfunos-boton-ataud-normal-movil"), document.getElementById("wpfunos-boton-destino-economico-movil"), document.getElementById("wpfunos-boton-destino-premium-movil") ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp2';
    });
    document.getElementById("wpfunos-boton-ataud-normal-movil").opcion = '1';
    document.getElementById("wpfunos-boton-destino-economico-movil").opcion = '2';
    document.getElementById("wpfunos-boton-destino-premium-movil").opcion = '3';

    [ document.getElementById("wpfunos-boton-velatorio-si-movil"), document.getElementById("wpfunos-boton-velatorio-no-movil") ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp3';
    });
    document.getElementById("wpfunos-boton-velatorio-si-movil").opcion = '1';
    document.getElementById("wpfunos-boton-velatorio-no-movil").opcion = '2';

    [ document.getElementById("wpfunos-boton-ceremonia-sin-movil"), document.getElementById("wpfunos-boton-ceremonia-sala-movil"), document.getElementById("wpfunos-boton-ceremonia-civil-movil"), document.getElementById("wpfunos-boton-ceremonia-religiosa-movil") ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp4';
    });
    document.getElementById("wpfunos-boton-ceremonia-sin-movil").opcion = '1';
    document.getElementById("wpfunos-boton-ceremonia-sala-movil").opcion = '2';
    document.getElementById("wpfunos-boton-ceremonia-civil-movil").opcion = '3';
    document.getElementById("wpfunos-boton-ceremonia-religiosa-movil").opcion = '4'



    var orden = params.get('orden');

    if( params.get('orden') === 'precios'){
      document.getElementById("wpfunos-titulo-orden-movil").innerHTML = 'Resultados ordenados por precio.';
      document.getElementById("wpfunos-boton-precio-movil").innerHTML = 'Distancia';
    }else{
      document.getElementById("wpfunos-titulo-orden-movil").innerHTML = 'Resultados ordenados por distancia.';
      document.getElementById("wpfunos-boton-precio-movil").innerHTML = 'Precio';
    }

    document.getElementById("wpfunos-boton-precio-movil").addEventListener('click', function(){
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
