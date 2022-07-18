<script type="text/javascript" id="wpfunos-serviciosv2-buscador">
$ = jQuery.noConflict();
$(document).ready(function(){
	$(function(){
		var params = new URLSearchParams(location.search);
		var wpfref = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
		var wpfcp = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp");

		document.getElementById("wpf-resultados-cabecera-poblacion-boton").addEventListener('click', function(){
			elementorFrontend.documentsManager.documents[document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfesperando")].showModal(); //show the popup
			window.location.href = "/comparar-precios-v2";
		} , false);

		document.getElementById("wpf-resultados-cabecera-cuando-boton").addEventListener('click', function(){
			if( params.get('cuando') == 'Ahora'){
				params.set('cuando', 'Proximamente');
			}else{
				params.set('cuando', 'Ahora');
			}
			elementorFrontend.documentsManager.documents[document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfesperando")].showModal(); //show the popup
			window.location.search = params.toString();
		} , false);

		document.getElementById("wpfunos-boton-destino-entierro").style.backgroundColor = ( params.get('cf[resp1]') == '1' ? "#39c2f3" : "#ff9c00" );
		document.getElementById("wpfunos-boton-destino-incineracion").style.backgroundColor = ( params.get('cf[resp1]') == '2' ? "#39c2f3" : "#ff9c00" );
		document.getElementById("wpfunos-boton-ataud-normal").style.backgroundColor = ( params.get('cf[resp2]') == '1' ? "#39c2f3" : "#ff9c00" );
		document.getElementById("wpfunos-boton-destino-economico").style.backgroundColor = ( params.get('cf[resp2]') == '2' ? "#39c2f3" : "#ff9c00" );
		document.getElementById("wpfunos-boton-destino-premium").style.backgroundColor = ( params.get('cf[resp2]') == '3' ? "#39c2f3" : "#ff9c00" );
		document.getElementById("wpfunos-boton-velatorio-si").style.backgroundColor = ( params.get('cf[resp3]') == '1' ? "#39c2f3" : "#ff9c00" );
		document.getElementById("wpfunos-boton-velatorio-no").style.backgroundColor = ( params.get('cf[resp3]') == '2' ? "#39c2f3" : "#ff9c00" );
		document.getElementById("wpfunos-boton-ceremonia-sin").style.backgroundColor = ( params.get('cf[resp4]') == '1' ? "#39c2f3" : "#ff9c00" );
		document.getElementById("wpfunos-boton-ceremonia-sala").style.backgroundColor = ( params.get('cf[resp4]') == '2' ? "#39c2f3" : "#ff9c00" );
		document.getElementById("wpfunos-boton-ceremonia-civil").style.backgroundColor = ( params.get('cf[resp4]') == '3' ? "#39c2f3" : "#ff9c00" );
		document.getElementById("wpfunos-boton-ceremonia-religiosa").style.backgroundColor = ( params.get('cf[resp4]') == '4' ? "#39c2f3" : "#ff9c00" );

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
		document.getElementById("wpfunos-boton-ceremonia-religiosa").opcion = '4';
	});

	function wpfFunctionResp(evt){
		var params = new URLSearchParams(location.search);
		var wpfref = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
		var wpfcp = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp");
		console.log( 'click botón '+evt.currentTarget.resp+' '+evt.currentTarget.opcion);
		if( params.get('cf['+evt.currentTarget.resp+']') != evt.currentTarget.opcion){
			elementorFrontend.documentsManager.documents[document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfesperando")].showModal(); //show the popup
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
