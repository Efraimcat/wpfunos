<script>
$ = jQuery.noConflict();
$( document ).ready(function() {
	$(function(){
   	console.log( "document loaded" );
		var url_string = window.location.href
		var url = new URL(url_string);
		var c = url.searchParams.get("wpf");
		if(c !== null){
			console.log( "wpf: " + c );
			var date = new Date();
      date.setTime(date.getTime() + (30*24*60*60*1000));
      expires = "; expires=" + date.toUTCString();
			document.cookie = "wpfunoswpf=" + c + expires + "; path=/; SameSite=Lax; secure";
		}
		if( document.body.classList.contains( 'logged-in' )){
			console.log( "logged-in");
			document.cookie = "wpfunosloggedin=yes; expires=session; path=/; SameSite=Lax; secure";
		}
 	});
});
</script>
<script>
window.onload = function () {
	if( document.body.classList.contains( 'logged-in' )){
		var chart = new CanvasJS.Chart("chartContainer", {
			title: {
				text: "Push-ups Over a Week"
			},
			axisY: {
				title: "Number of Push-ups"
			},
			data: [{
				type: "line",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
	}
}
</script>


================================================================================
05-09-2022
================================================================================

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
$(document).ready(function(){
	$(function fomulariocontacto(){
		var checkExist = setInterval(function() {
			if( document.getElementById('wpfTeLlamamosGratis') !== null ){ 
				var listener = document.querySelector("form[name='TeLlamamosGratis'] input[name='form_fields[email]']");
				if( listener.getAttribute('listener') !== 'true'  ) {
					console.log( 'El campo existe.' );
					listener.setAttribute('listener', 'true');
					listener.addEventListener('change', function(){
						console.log( 'El campo cambia a ' +  listener.value );
						var email =  listener.value ;
						var _hsq = window._hsq = window._hsq || [];
						_hsq.push(["identify",{
							email: email
						}]);
					}, false);
				}// if( listener.getAttribute('listener') !== 'true'  )
			}// if( document.querySelector("form[name='TeLlamamosGratis'")
		}, 100); // check every 100ms
		// Multistep Form END
	}); // Function END
}); // Document ready END

//wpfTeLlamamosGratis

document.getElementById('wpfTeLlamamosGratis')
//TeLlamamosGratis
//wpfunosDatosServiciosV3
//PaginaFinanciacion
//Formulario Colaborador Datos Usuario
//AsesoramientoGratuito
