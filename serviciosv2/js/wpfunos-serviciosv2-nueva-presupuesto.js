<script type="text/javascript" id="wpfunos-serviciosv2-nueva-presupuesto">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    console.log("Nueva entrada: Presupuesto.");
    var checkExist = setInterval(function() {

      if (document.getElementById("wpf-resultados-cabecera-referencia").hasAttribute("wpftipoid") ) {

        clearInterval(checkExist);

        var servicio = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute('wpftipoid');
        var titulo = document.getElementById("wpf-boton-presupuesto-" + servicio).getAttribute('wpftitulo');
        var wpnonce = document.getElementById("wpf-boton-presupuesto-" + servicio).getAttribute('wpfn');
        var precio = document.getElementById("wpf-boton-presupuesto-" + servicio).getAttribute('wpfp');
        var distancia = document.getElementById("wpf-boton-presupuesto-" + servicio).getAttribute('wpfdistancia');

        console.log('Nueva entrada: Presupuesto. servicio: '+servicio+' titulo '+titulo );

        elementorFrontend.documentsManager.documents['56676'].showModal(); //show the popup

        document.getElementById("wpfunos-modal-presupuesto-nombre").innerHTML = titulo;
        document.getElementById("botonEnviarPresupuesto").setAttribute("wpfn", wpnonce );
        document.getElementById("botonEnviarPresupuesto").setAttribute("wpfid", servicio );
        document.getElementById("botonEnviarPresupuesto").setAttribute("wpfp", precio );
        document.getElementById("botonEnviarPresupuesto").setAttribute("wpftitulo", titulo );
        document.getElementById("botonEnviarPresupuesto").addEventListener('click', wpfFunctionEnviaPresupuesto, false);

      }
    }, 100); // check every 100ms

    var wpfFunctionEnviaPresupuesto = function() {
      var wpnonce = this.getAttribute("wpfn");
      var servicio = this.getAttribute("wpfid");
      var precio = this.getAttribute("wpfp");
      var titulo = this.getAttribute("wpftitulo");
      var mensaje = document.getElementById("form-field-mensajePresupuesto").value;

      console.log('boton Enviar presupuesto servicio: '+servicio+' titulo '+titulo );
      console.log('mensaje: '+mensaje );

      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : WpfAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_serviciosv2_presupuesto",
          "servicio": servicio,
          "wpnonce": wpnonce,
          "precio" : precio,
          "titulo" : titulo,
          "mensaje" : mensaje,
        },
        success: function(response) {
          console.log('wpfunos_ajax_serviciosv2_presupuesto response:');
          console.log(response)	;
          if(response.type == "success") {
            document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfref", response.newref);
            $('#wpfunos-modal-fin-formulario-presupuesto').show();
            $('#elementor-popup-modal-56676').hide()

          } else {
            console.log('fail');
          }
        }
      });
    }
  });
});
</script>
