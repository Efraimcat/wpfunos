?>
<script type="text/javascript">
var elementsLlamen = document.getElementsByClassName("wpfunos-boton-llamen");
var elementsLlamar = document.getElementsByClassName("wpfunos-boton-llamar");
var elementsPresupuesto = document.getElementsByClassName("wpfunos-boton-presupuesto");
var elementsDetalles = document.getElementsByClassName("wpfunos-boton-detalles");

var myFunctionLlamen = function() {
  var attribute = this.getAttribute("wpfunos-id");
  var mynonce = this.getAttribute("data-wpnonce");
  console.log('boton Llamen '+attribute );
  jQuery.ajax({
    type : "post",
    dataType : "json",
    url : myAjax.ajaxurl,
    data: {
      "action": "wpfunos_ajax_aseguradora_llamame",
      "wpfunosid": attribute,
      "noncevalue": mynonce
    },
    success: function(response) {
      console.log(response)	;
      if(response.type == "success") {
        console.log('success');
        document.getElementById("wpfunos-modal-llamen-titulo").innerHTML = response.titulo;
      } else {
        console.log('fail');
      }
    }
  });
};
var myFunctionLlamar = function() {
  var attribute = this.getAttribute("wpfunos-id");
  console.log('boton Llamar '+attribute );
};
var myFunctionPresupuesto = function() {
  var attribute = this.getAttribute("wpfunos-id");
  console.log('boton Presupuesto '+attribute );
};
var myFunctionDetalles = function() {
  var attribute = this.getAttribute("wpfunos-id");
  console.log('boton Detalles '+attribute );
};

for (var i = 0; i < elementsLlamen.length; i++) {
  elementsLlamen[i].addEventListener('click', myFunctionLlamen, false);
}
for (var i = 0; i < elementsLlamar.length; i++) {
  elementsLlamar[i].addEventListener('click', myFunctionLlamar, false);
}
for (var i = 0; i < elementsPresupuesto.length; i++) {
  elementsPresupuesto[i].addEventListener('click', myFunctionPresupuesto, false);
}
for (var i = 0; i < elementsDetalles.length; i++) {
  elementsDetalles[i].addEventListener('click', myFunctionDetalles, false);
}
</script>
<?php
