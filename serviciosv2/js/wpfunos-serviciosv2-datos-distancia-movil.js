<script type="text/javascript" id="wpfunos-serviciosv2-datos-distancia-movil">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    var params = new URLSearchParams(location.search);
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
      elementorFrontend.documentsManager.documents['56688'].showModal(); //show the popup
      var wpfref = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
      var wpfcp = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp");
      if( params.get('wpfref') === 'dummy' && wpfref != 'dummy' ) params.set('wpfref', wpfref);
      if( params.get('CP') === 'undefined' && wpfcp != 'dummy') params.set('CP', wpfcp);
      if( orden == 'dist' ){
        params.set('orden', 'precios' );
        //console.log(params.toString());
        window.location.search = params.toString();
      }else{
        params.set('orden', 'dist' );
        window.location.search = params.toString();
      }
    }, false);
  });
});

</script>
