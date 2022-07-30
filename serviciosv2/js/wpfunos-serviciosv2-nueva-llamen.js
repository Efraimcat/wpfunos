<script type="text/javascript" id="wpfunos-serviciosv2-nueva-llamen">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    console.log("Nueva entrada: Llamen.");
    var checkExist = setInterval(function() {

      if (document.getElementById("wpf-resultados-cabecera-referencia").hasAttribute("wpftipoid") ) {

        clearInterval(checkExist);

        var servicio = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute('wpftipoid');
        var titulo = document.getElementById("wpf-boton-llamen-" + servicio).getAttribute('wpftitulo');
        var wpnonce = document.getElementById("wpf-boton-llamen-" + servicio).getAttribute('wpfn');
        var precio = document.getElementById("wpf-boton-llamen-" + servicio).getAttribute('wpfp');
        var distancia = document.getElementById("wpf-boton-llamen-" + servicio).getAttribute('wpfdistancia');

        console.log('Nueva entrada: Llamen. servicio: '+servicio+' titulo '+titulo );

        elementorFrontend.documentsManager.documents['56684'].showModal(); //show the popup

        document.getElementById("wpfunos-modal-llamen-titulo").innerHTML = titulo;
        document.getElementById("wpfunos-modal-llamen-telefono").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");
        document.getElementById("wpfunos-modal-llamen-telefono-movil").innerHTML = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");

        jQuery.ajax({
          type : "post",
          dataType : "json",
          url : WpfAjax.ajaxurl,
          data: {
            "action": "wpfunos_ajax_serviciosv2_llamen",
            "servicio": servicio,
            "wpnonce": wpnonce,
            "precio" : precio,
            "titulo" : titulo,
          },
          success: function(response) {
            console.log('wpfunos_ajax_serviciosv2_llamen response:');
            console.log(response)	;
            if(response.type == "success") {
              document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfref", response.newref);
              $('#wpfunos-modal-fin-formulario').show();
            } else {
              console.log('fail');
            }
          }
        });
      }
    }, 100); // check every 100ms
  });
});
</script>
