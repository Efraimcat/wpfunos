(function( $ ) {
	'use strict';

})( jQuery );

function wpfunos_SIWG_googleLoginEndpoint(googleUser) {
	console.log(googleUser);

	wp.ajax.post( "wpfunos-SIWG-google-login", {
		"credential": googleUser.credential
	} )
	.done(function(response) {
		console.log(response);

		window.location.reload();
	})
	.fail(function (response) {
		console.error(response);
	});
}
