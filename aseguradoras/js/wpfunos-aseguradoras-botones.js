<script type="text/javascript">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    var elementsLlamen = document.getElementsByClassName("wpfunos-boton-llamen");
    var elementsLlamar = document.getElementsByClassName("wpfunos-boton-llamar");
    var elementsDetalles = document.getElementsByClassName("wpfunos-boton-detalles");

    var myFunctionLlamen = function() {

    };

    var myFunctionLlamar = function() {

    };

    var myFunctionDetalles = function() {

    };



    for (var i = 0; i < elementsLlamen.length; i++) {
      elementsLlamen[i].addEventListener('click', myFunctionLlamen, false);
    }
    for (var i = 0; i < elementsLlamar.length; i++) {
      elementsLlamar[i].addEventListener('click', myFunctionLlamar, false);
    }
    for (var i = 0; i < elementsDetalles.length; i++) {
      elementsDetalles[i].addEventListener('click', myFunctionDetalles, false);
    }
  });
});
</script>
