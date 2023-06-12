// /financiacion-funeral
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){

    setTimeout(function() {
      var elementsBotones = document.getElementsByClassName('wpf-boton-financiacion');
      for (var i = 0; i < elementsBotones.length; i++) {
        elementsBotones[i].addEventListener('click', myFunctionBotonFinanciacion, false);
        elementsBotones[i].style.cursor = 'pointer';
      }

    }, 1000 );


    var myFunctionBotonFinanciacion = function() {
      elementorFrontend.documentsManager.documents['111305'].showModal(); //show the popup

      document.getElementsByClassName('elementor-field-group-plazos_inferior')[0].style.display='none';
      document.getElementsByClassName('elementor-field-group-plazos_superior')[0].style.display='none';
      document.getElementById('form-field-financiar').disabled = true;

      setInterval(function() {
        if ( !document.getElementById('form-field-importe') ) return;
        document.getElementById('form-field-financiar').value = ( document.getElementById('form-field-importe').value - document.getElementById('form-field-entrada').value );

        if ( document.getElementById('form-field-financiar').value < 1501 ){
          document.getElementsByClassName('elementor-field-group-plazos_inferior')[0].style.display='block';
          document.getElementsByClassName('elementor-field-group-plazos_superior')[0].style.display='none';
        }

        if ( document.getElementById('form-field-financiar').value > 1500 ){
          document.getElementsByClassName('elementor-field-group-plazos_inferior')[0].style.display='none';
          document.getElementsByClassName('elementor-field-group-plazos_superior')[0].style.display='block';
        }

        if( document.getElementById('form-field-financiar').value < 0 ){
          document.getElementById('wpfFinanciacionEnviar').disabled = true;
        }else{
          document.getElementById('wpfFinanciacionEnviar').disabled = false;
        }


      }, 100); // check every 100ms

    };

  });
});
