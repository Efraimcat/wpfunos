// All Website
document.addEventListener('readystatechange', () => {
	const headerTop = document.getElementById('wpfunos-header-bot')
	document.addEventListener('scroll', () => {
		if(window.scrollY > 360)
		headerTop.classList.add('active')
		else
		headerTop.classList.remove('active')
	})
})
console.log( "document loaded" );

// Añadir cookie si esta conectado.
var data = {
	action: 'is_user_logged_in'
};
jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
	if(response == 'yes') {
		document.cookie = "wpfunosloggedin=yes;expires=session; path=/;SameSite=Lax;secure";
	}
});

// Guardar referer externo.
var initreferrer = document.referrer;
if(initreferrer.indexOf('funos.es') === -1 ) { // Check if the referer is your site or not. If not( return -1 ) set the localStorage.
	sessionStorage.setItem("wpfunos_referrer", initreferrer);
}

$ = jQuery.noConflict();
$(document).on('elementor/popup/show', (event, id, instance) => {
	console.log('Popup id: ' + id);
	//
	$('#telefono2').attr("autocomplete", "off");
	$('#telefono2').bind("cut copy paste", function(e) {
		e.preventDefault();
		//alert("You cannot paste into this text field.");
		$('#telefono2').bind("contextmenu", function(e) {
			e.preventDefault();
		});
	});
	//
	// ID 54064 (TeLlamamosGratis)
	// ID 69244 Asesoramiento gratuito v2 (AsesoramientoGratuito)
	// ID 89354 Servicios Multistep V3 step 5 (wpfunosDatosServiciosV3)
	// ID 118670 Te llamamos gratis Landings (TeLlamamosGratisLandings)
	// ID 111305 Servicios Pedir Financiación
	if( id == '54064' ){
		wpfAlertPopups( 'TeLlamamosGratis', 'Nombre' );
		wpfAlertPopups( 'TeLlamamosGratis', 'email' );
		wpfAlertPopups( 'TeLlamamosGratis', 'telefono' );
	}
	if( id == '69244' ){
		wpfAlertPopups( 'AsesoramientoGratuito', 'Nombre' );
		wpfAlertPopups( 'AsesoramientoGratuito', 'email' );
		wpfAlertPopups( 'AsesoramientoGratuito', 'telefono' );
	}
	if( id == '89354' ){
		wpfAlertPopups( 'wpfunosDatosServiciosV3', 'Nombre' );
		wpfAlertPopups( 'wpfunosDatosServiciosV3', 'email' );
		wpfAlertPopups( 'wpfunosDatosServiciosV3', 'telefono' );
	}
	if( id == '118670' ){
		wpfAlertPopups( 'TeLlamamosGratisLandings', 'Nombre' );
		wpfAlertPopups( 'TeLlamamosGratisLandings', 'email' );
		wpfAlertPopups( 'TeLlamamosGratisLandings', 'telefono' );
	}
	if( id == '111305' ){
		wpfAlertPopups( 'PaginaFinanciacion', 'Nombre' );
		wpfAlertPopups( 'PaginaFinanciacion', 'email' );
		wpfAlertPopups( 'PaginaFinanciacion', 'telefono' );
	}

	//window.onload = () => {
	//	const myInput = document.getElementById('form-field-telefono2');
	//	if (myInput) {
	//		myInput.onpaste = e => e.preventDefault();
	//	}
	//}
})

function wpfAlertPopups( form, input ){
	var listener = document.querySelector("form[name='"+ form +"'] input[name='form_fields["+ input +"]']");
	listener.addEventListener('change', function(){
		console.log( 'El campo cambia a ' +  listener.value );
		var wpfana = getCookie('cookielawinfo-checkbox-analytics');
		if( wpfana != 'yes'){
			//alert('Para poder continuar dando el servicio adecuado,\nnecesitamos que antes de continuar acceptes las cookies.');
			$('#elementor-popup-modal-143773').hide()
			elementorFrontend.documentsManager.documents[ '143773' ].showModal();
			$( document ).on( 'click', '#wt-cli-accept-all-btn', function( event ) {
				elementorProFrontend.modules.popup.closePopup( {}, event );
			} );
		}
	});
}

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

function sendlog(message){
	$.ajax({
		type : 'post',
		url: 'https://funos.es/wp-json/wpfapi/v1/publiclog?log=' + message ,
		contentType: 'application/json',
		headers: {
			'Authorization': 'Basic '+WpfAjax.basic,
		},
		success: function(result){
			console.log('Envio log confirmación '+result);
		}
	});
}
