(function( $ ) {
	'use strict';
	console.log('Ventana poblacion OK');
	if(document.getElementById("wpfunos-boton-formulario-nueva-distancia") ){
		document.getElementById("wpfunos-boton-formulario-nueva-distancia").addEventListener('click', function(){
			console.log('click');
			var newdistance = document.getElementById("form-field-nuevadistancia").value;
			var wpfref = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
			var wpfcp = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp");
			if( newdistance != ''){
				$('#wpfunos-formulario-nueva-distancia').hide();
				elementorFrontend.documentsManager.documents[document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfesperando")].showModal(); //show the popup
				document.getElementById("elementor-popup-modal-58508").style.display = "none"
				if( parseInt(newdistance) < 5 ) newdistance = '5';
				if( parseInt(newdistance) > 200 ) newdistance = '200';
				var params = new URLSearchParams(location.search);
				if( params.get('wpfref') === 'dummy' && wpfref != 'dummy' ) params.set('wpfref', wpfref);
				if( params.get('CP') === 'undefined' && wpfcp != 'dummy') params.set('CP', wpfcp);
				if( wpfref != 'dummy' ) params.set('wpfref', wpfref);
				if( wpfcp != 'dummy') params.set('CP', wpfcp);
				params.set('distance', newdistance );
				window.location.search = params.toString();
			}
		}, false);
	}

})( jQuery );
