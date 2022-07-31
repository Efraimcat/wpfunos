<script type="text/javascript" id="wpfunos-aseguradoras-botones">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    console.log('Botones Aseguradora');
    var elementsLlamen = document.getElementsByClassName("wpfunos-boton-llamen");
    var elementsDetalles = document.getElementsByClassName("wpfunos-boton-detalles");

    var myFunctionLlamen = function() {
      var wpnonce = this.getAttribute("data-wpnonce");
      var servicio = this.getAttribute("wpfunos-id");
      var usuario = this.getAttribute("wpusuario");
      var titulo = this.getAttribute("wptitulo");
      var telusuario = this.getAttribute("wpftelus");

      console.log('boton Llamen Aseguradora: '+servicio );

      elementorFrontend.documentsManager.documents['55817'].showModal(); //show the popup

      document.getElementById("wpfunos-modal-llamen-titulo").innerHTML = titulo;
      document.getElementById("wpfunos-modal-llamen-numero").innerHTML = telusuario;

      document.getElementById("botonTeLlamaran").setAttribute("wpfn", wpnonce );
      document.getElementById("botonTeLlamaran").setAttribute("wpfid", servicio );
      document.getElementById("botonTeLlamaran").setAttribute("wpfu", usuario );
      document.getElementById("botonTeLlamaran").addEventListener('click', wpfFunctionEnviaLead, false);

    };
    var myFunctionDetalles = function() {

    };

    var wpfFunctionEnviaLead = function() {
      var wpnonce = this.getAttribute("wpfn");
      var servicio = this.getAttribute("wpfid");
      var usuario = this.getAttribute("wpfu");
      var mensaje = document.getElementById("form-field-mensajePresupuesto").value;

      console.log('boton Enviar API servicio: '+servicio );
      console.log('mensaje: '+mensaje );

      jQuery.ajax({
        type : "post",
        dataType : "json",
        url : WpfAjax.ajaxurl,
        data: {
          "action": "wpfunos_ajax_aseguradoras_llamen",
          "wpfid": servicio,
          "wpfn": wpnonce,
          "wpfu" : usuario,
          "wpfm" : mensaje,
        },
        success: function(response) {
          console.log('wpfunos_ajax_aseguradoras_llamen response:');
          console.log(response)	;
          if(response.type == "success") {
            $('#elementor-popup-modal-55817').hide()
          } else {
            console.log('fail');
          }
        }
      });
    }

    for (var i = 0; i < elementsLlamen.length; i++) {
      elementsLlamen[i].addEventListener('click', myFunctionLlamen, false);
    }
    for (var i = 0; i < elementsDetalles.length; i++) {
      elementsDetalles[i].addEventListener('click', myFunctionDetalles, false);
    }
  });
});
</script>
