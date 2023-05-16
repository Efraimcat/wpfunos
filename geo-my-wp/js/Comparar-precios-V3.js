$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    //$('#gmw-submit-8').hide();
    var idioma_wpml = getCookie('wp-wpml_current_language');

    document.getElementById('gmw-address-field-8').addEventListener('change', function(){
      document.getElementById("gmw-submit-8").disabled = true;

      if (idioma_wpml === 'es'){
        elementorFrontend.documentsManager.documents['84626'].showModal(); //show the popup
      }
      if (idioma_wpml === 'ca'){
        elementorFrontend.documentsManager.documents['136491'].showModal(); //show the popup (CA)
      }

      setTimeout(function() {
        var localidad = document.getElementById('gmw-address-field-8').value;
        console.log('Localidad ' +localidad);

        jQuery.ajax({
          type : 'post',
          dataType : 'json',
          url : WpfAjax.ajaxurl,
          data: {
            'action': 'wpfunos_ajax_v3_dist_local',
            'wpflocalidad': localidad,
          },
          success: function(response) {
            console.log('wpfunos_ajax_v3_dist_local response:');
            console.log(response)	;
            if(response.type === 'success') {
              console.log('OK');
              document.getElementsByClassName('gmw-radius-slider')[0].value = response.distancia
              document.getElementById("gmw-submit-8").disabled = false;

              $('#gmw-submit-8').click();

            } else {
              console.log('fail');
              document.getElementById("gmw-submit-8").disabled = false;
              $('#elementor-popup-modal-84626').hide();
            }
          }
        });

      }, 500 );
    }, false);

    document.getElementById('gmw-cf-resp1-8').value = '2' ;
    document.getElementById('gmw-cf-resp2-8').value = '2' ;
    document.getElementById('gmw-cf-resp3-8').value = '2' ;
    document.getElementById('gmw-cf-resp4-8').value = '2' ;


    // WPML
    var wpflabel = document.getElementsByClassName('gmw-field-label');
    if (idioma_wpml === 'ca'){
      wpflabel[0].innerHTML = 'On necessites el servei?';
      $('#gmw-address-field-8').attr('placeholder','Introdueix la població');
    }
    // WPML

  });
  //getCookie('wp-wpml_current_language')
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
});
