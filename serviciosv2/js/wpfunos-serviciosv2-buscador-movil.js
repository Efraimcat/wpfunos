<script type="text/javascript" id="wpfunos-serviciosv2-buscador-movil">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    var params = new URLSearchParams(location.search);
    var wpfref = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
    var wpfcp = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp");

    document.getElementById("wpf-resultados-cabecera-poblacion-boton-movil").addEventListener('click', function(){
      elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup
      window.location.href = "/comparar-precios-v2";
    } , false);

    document.getElementById("wpf-resultados-cabecera-cuando-boton-movil").addEventListener('click', function(){
      if( params.get('cuando') == 'Ahora'){
        params.set('cuando', 'Proximamente');
      }else{
        params.set('cuando', 'Ahora');
      }
      elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup
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
    document.getElementById("wpfunos-boton-ceremonia-religiosa-movil").opcion = '4';
  });

  function wpfFunctionResp(evt){
    var params = new URLSearchParams(location.search);
    var wpfref = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
    var wpfcp = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp");
    console.log( 'click bot??n '+evt.currentTarget.resp+' '+evt.currentTarget.opcion);
    if( params.get('cf['+evt.currentTarget.resp+']') != evt.currentTarget.opcion){
      elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup
      if( wpfref != 'dummy' ) params.set('wpfref', wpfref);
      if( wpfcp != 'dummy') params.set('CP', wpfcp);
      params.set('cf['+evt.currentTarget.resp+']', evt.currentTarget.opcion );
      if( params.get('cf[resp1]') == '1' ) params.set('dest', 'entierro' );
      if( params.get('cf[resp1]') == '2' ) params.set('dest', 'incineracion' );
      if( params.get('cf[resp3]') == '2' && params.get('cf[resp4]') == '1' && parseInt(params.get('distance')) < 100 ){
        console.log('Cambiando distancia 100km.')
        params.set('distance', '100' );
      }
      window.location.search = params.toString();
    }
  }
});
</script>
