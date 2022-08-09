<script type="text/javascript" id="wpfunos-v3-ventana-distancia">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    [
      document.getElementById("wpfunos-v3-distancia-boton"),
      document.getElementById("wpfunos-v3-distancia-texto"),
      document.getElementById("wpfunos-v3-distancia-boton-movil"),
      document.getElementById("wpfunos-v3-distancia-texto-movil")
    ].forEach(function(element) {
      element.addEventListener('click', wpfdistancia, false);
    });
  });
  var wpfdistancia = function() {
    // 1 second delay
    setTimeout(function(){
      console.log("Formulario cambiar distancia");
      document.getElementById("wpfunos-v3-boton-formulario-distancia").addEventListener('click', function(){
        console.log('click botón cambiar distancia');
        var newdistance = document.getElementById("form-field-nuevadistancia").value;
        if( newdistance != ''){
          $('#wpfunos-formulario-nueva-distancia').hide();
          elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup
          document.getElementById("elementor-popup-modal-89948").style.display = "none"
          if( parseInt(newdistance) < 5 ) newdistance = '5';
          if( parseInt(newdistance) > 200 ) newdistance = '200';
          var params = new URLSearchParams(location.search);
          params.set('distance', newdistance );
          window.location.search = params.toString();
        }
      }, false);
    }, 1000);
  }
});
</script>
