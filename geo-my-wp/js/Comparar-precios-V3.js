$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    document.getElementById('gmw-submit-8').addEventListener('click', function(){
      console.log('click');
      if( document.getElementById("gmw-address-field-8").value != ''){
        $('#gmw-submit-8').hide();
        $('#wpfunos-enviando').show();
        console.log('Enviando. Botón envio desactivado.');
        console.log(new Date());
        elementorFrontend.documentsManager.documents['84626'].showModal(); //show the popup
      }
    }, false);
    document.getElementById("gmw-cf-resp1-8").value = "2" ;
    document.getElementById("gmw-cf-resp2-8").value = "2" ;
    document.getElementById("gmw-cf-resp3-8").value = "2" ;
    document.getElementById("gmw-cf-resp4-8").value = "2" ;


  });
});
