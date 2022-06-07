<script type="text/javascript">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    var elementsLlamen = document.getElementsByClassName("wpfunos-boton-llamen");
    var elementsLlamar = document.getElementsByClassName("wpfunos-boton-llamar");
    var elementsPresupuesto = document.getElementsByClassName("wpfunos-boton-presupuesto");
    var elementsDetalles = document.getElementsByClassName("wpfunos-boton-detalles");


    var wpfFunctionLlamen = function() {
      var IDservicio = this.getAttribute("wpfunos-id");
      var IDusuario = this.getAttribute("wpusuario");
      var wpnonce = this.getAttribute("data-wpnonce");
      var precio = document.getElementById("wpf-precio-"+IDservicio).getAttribute("wpfunos-att-precio")
      console.log('boton Llamen servicio: '+IDservicio+' usuario '+IDusuario+' nonce '+wpnonce+' precio '+precio );
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_servicios_llamame",
          "IDservicio": IDservicio,
          "IDusuario": IDusuario,
          "wpnonce": wpnonce,
          "precio" : precio,
        },
        success: function(response) {
          console.log(response)	;
          if(response.type == "success") {
            document.getElementById("wpfunos-modal-llamen-titulo").innerHTML = response.titulo;
            console.log('success');
          } else {
            console.log('fail');
          }
        }
      });
    };

    var wpfFunctionLlamar = function() {
      var IDservicio = this.getAttribute("wpfunos-id");
      var IDusuario = this.getAttribute("wpusuario");
      var wpnonce = this.getAttribute("data-wpnonce");
      var precio = document.getElementById("wpf-precio-"+IDservicio).getAttribute("wpfunos-att-precio")
      console.log('boton Llamar servicio: '+IDservicio+' usuario '+IDusuario+' nonce '+wpnonce+' precio '+precio );
      let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
      console.log('isMobile: '+isMobile);
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_servicios_llamar",
          "IDservicio": IDservicio,
          "IDusuario": IDusuario,
          "wpnonce": wpnonce,
          "precio" : precio,
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
          } else {
            console.log('fail');
          }
        }
      });
    };

    var wpfFunctionPresupuesto = function() {
      var IDservicio = this.getAttribute("wpfunos-id");
      var IDusuario = this.getAttribute("wpusuario");
      var wpnonce = this.getAttribute("data-wpnonce");
      var precio = document.getElementById("wpf-precio-"+IDservicio).getAttribute("wpfunos-att-precio")
      console.log('boton Presupuesto servicio: '+IDservicio+' usuario '+IDusuario+' nonce '+wpnonce+' precio '+precio );
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_servicios_presupuesto",
          "IDservicio": IDservicio,
          "IDusuario": IDusuario,
          "wpnonce": wpnonce,
          "precio" : precio,
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

    var wpfFunctionDetalles = function() {
      var IDservicio = this.getAttribute("wpfunos-id");
      var IDusuario = this.getAttribute("wpusuario");
      var wpnonce = this.getAttribute("data-wpnonce");
      var precio = document.getElementById("wpf-precio-"+IDservicio).getAttribute("wpfunos-att-precio")
      console.log('boton Detalles servicio: '+IDservicio+' usuario '+IDusuario+' nonce '+wpnonce+' precio '+precio );
      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : myAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_servicios_detalles",
          "IDservicio": IDservicio,
          "IDusuario": IDusuario,
          "wpnonce": wpnonce,
          "precio" : precio,
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

    };


    for (var i = 0; i < elementsLlamen.length; i++) {
      elementsLlamen[i].addEventListener('click', wpfFunctionLlamen, false);
    }
    for (var i = 0; i < elementsLlamar.length; i++) {
      elementsLlamar[i].addEventListener('click', wpfFunctionLlamar, false);
    }
    for (var i = 0; i < elementsPresupuesto.length; i++) {
      elementsPresupuesto[i].addEventListener('click', wpfFunctionPresupuesto, false);
    }
    for (var i = 0; i < elementsDetalles.length; i++) {
      elementsDetalles[i].addEventListener('click', wpfFunctionDetalles, false);
    }
  });
});
</script>
