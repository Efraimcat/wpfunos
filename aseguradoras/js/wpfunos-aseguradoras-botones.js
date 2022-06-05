<script type="text/javascript">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    var elementsLlamen = document.getElementsByClassName("wpfunos-boton-llamen");
    var elementsLlamar = document.getElementsByClassName("wpfunos-boton-llamar");
    var elementsPresupuesto = document.getElementsByClassName("wpfunos-boton-presupuesto");
    var elementsDetalles = document.getElementsByClassName("wpfunos-boton-detalles");

    var myFunctionLlamen = function() {
      var attribute = this.getAttribute("wpfunos-id");
      var mynonce = this.getAttribute("data-wpnonce");
      var wpusuario = this.getAttribute("wpusuario");
      console.log('boton Llamen '+attribute+' '+wpusuario );
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_aseguradora_llamame",
          "wpfunosid": attribute,
          "noncevalue": mynonce,
          "wpusuario": wpusuario
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
      var mynonce = this.getAttribute("data-wpnonce");
      var wpusuario = this.getAttribute("wpusuario");
      console.log('boton Llamar '+attribute+' '+wpusuario );
      let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
      console.log('isMobile: '+isMobile);
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_aseguradora_llamar",
          "wpfunosid": attribute,
          "noncevalue": mynonce,
          "wpusuario": wpusuario
        },
        success: function(response) {
          console.log(response)	;
          if(response.type == "success") {
            console.log('success');
            document.getElementById("wpfunos-modal-llamar-telefono").innerHTML = response.telefono;
            if ( isMobile ) {
              var tel = 'tel:'+response.tel;
              console.log('tel: '+tel);
              window.location = tel;
            }
          } else {
            console.log('fail');
          }
        }
      });
    };

    var myFunctionPresupuesto = function() {
      var attribute = this.getAttribute("wpfunos-id");
      var mynonce = this.getAttribute("data-wpnonce");
      var wpusuario = this.getAttribute("wpusuario");
      console.log('boton Presupuesto '+attribute+' '+wpusuario );
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_aseguradora_presupuesto",
          "wpfunosid": attribute,
          "noncevalue": mynonce,
          "wpusuario": wpusuario
        },
        success: function(response) {
          console.log(response)	;
          if(response.type == "success") {
            console.log('success');
            document.getElementById("wpfunos-modal-presupuesto-titulo").innerHTML = response.titulo;
            document.getElementById("form-field-wpfunosoculto").value = response.aseguradora;
            document.getElementById("botonEnviarPresupuesto").addEventListener('click', myFunctionEnviaPresupuesto, false);
          } else {
            console.log('fail');
          }
        }
      });
    };

    var myFunctionDetalles = function() {
      var attribute = this.getAttribute("wpfunos-id");
      console.log('boton Detalles '+attribute );
    };

    var myFunctionEnviaPresupuesto = function() {
      var aseguradora = document.getElementById("form-field-wpfunosoculto").value;
      var attribute = document.getElementById("wpfunos-boton-enviar-presupuesto").getAttribute("wpfunos-presupuesto-id");
      var mynonce = document.getElementById("wpfunos-boton-enviar-presupuesto").getAttribute("data-wpnonce");
      var wpusuario = document.getElementById("wpfunos-boton-enviar-presupuesto").getAttribute("wpusuario");
      var mensaje = document.getElementById("form-field-mensajePresupuesto").value;
      console.log('Click enviar mensaje presupuesto  ' );
      console.log('Aseguradora '+aseguradora+' wpusuario '+wpusuario );
      console.log('mensaje: '+mensaje );
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_aseguradora_enviar_presupuesto",
          "wpfunosid": aseguradora,
          "noncevalue": mynonce,
          "wpusuario": wpusuario,
          "wpmensaje": mensaje
        },
        success: function(response) {
          console.log(response)	;
          if(response.type == "success") {
            console.log('success');
          } else {
            console.log('fail');
          }
        }
      });
    }


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
  });
});
</script>
<?php
