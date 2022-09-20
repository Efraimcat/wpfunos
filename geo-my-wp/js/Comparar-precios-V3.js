$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    document.getElementById('gmw-address-field-8').addEventListener('change', function(){
      var localidad = document.getElementById('gmw-address-field-8').value;
      console.log('Localidad ' +localidad);

      jQuery.ajax({
        type : 'post',
        dataType : 'json',
        url : WpfAjax.ajaxurl,
        data: {
          'action': 'wpfunos_ajax_v3_dist-local',
          'wpflocalidad': localidad,
        },
        success: function(response) {
          console.log('wpfunos_ajax_v3_dist-local response:');
          console.log(response)	;
          if(response.type === 'success') {
            console.log('OK');
            document.getElementsByClassName('gmw-radius-slider')[0].value = response.distancia
          } else {
            console.log('fail');
          }
        }
      });

    }, false);

    document.getElementById('gmw-submit-8').addEventListener('click', function(){
      console.log('click');
      if( document.getElementById('gmw-address-field-8').value != ''){
        $('#gmw-submit-8').hide();
        $('#wpfunos-enviando').show();
        console.log('Enviando. Botón envio desactivado.');
        console.log(new Date());
        elementorFrontend.documentsManager.documents['84626'].showModal(); //show the popup
      }
    }, false);
    document.getElementById('gmw-cf-resp1-8').value = '2' ;
    document.getElementById('gmw-cf-resp2-8').value = '2' ;
    document.getElementById('gmw-cf-resp3-8').value = '2' ;
    document.getElementById('gmw-cf-resp4-8').value = '2' ;
  });
});
