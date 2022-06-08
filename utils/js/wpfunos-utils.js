(function( $ ) {
	'use strict';

})( jQuery );

function wpfunos_SIWG_googleLoginEndpoint(googleUser) {
	console.log(googleUser);

	jQuery.ajax({
		type : "post",
		dataType : "json",
		url : myAjax.ajaxurl,
		data: {
			"action": "wpfunos-SIWG-google-login",
			"credential": googleUser.credential
		},
		success: function(response) {
			console.log(response)	;
			if( response.success ) {
				console.log('success');
				window.location.reload();
			} else {
				console.log('fail');
			}
		}
	});
}

//{success: true, data: {…}}
//data:
//alg: "RS256"
//aud: "336511646507-dejbd1hln47qavqi0ncnq6hd0v2pdafl.apps.googleusercontent.com"
//azp: "336511646507-dejbd1hln47qavqi0ncnq6hd0v2pdafl.apps.googleusercontent.com"
//email: "nicapp17@gmail.com"
//email_verified: "true"
//exp: "1654706176"
//family_name: "App"
//given_name: "Nic"
//iat: "1654702576"
//iss: "https://accounts.google.com"
//jti: "065d664729544f6343140e99e8d33ce8f461c5e7"
//kid: "7483a088d4ffc00609f0e22f3c22da5fe3906ccc"
//name: "Nic App"
//nbf: "1654702276"
//picture: "https://lh3.googleusercontent.com/a-/AOh14GjII41E9YUC_fCfFtv0JaHfxJQzTmHHpFUqS44=s96-c"
//sub: "100081992601717016452"
//typ: "JWT"
