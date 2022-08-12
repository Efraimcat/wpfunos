<script type="text/javascript" id="wpfunos-serviciosv2-nueva-llamar">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    console.log("Nueva entrada: Llamar.");
    var checkExist = setInterval(function() {

      if (document.getElementById("wpf-resultados-cabecera-referencia").hasAttribute("wpftipoid") ) {

        clearInterval(checkExist);

        var servicio = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute('wpftipoid');
        var titulo = document.getElementById("wpf-boton-llamar-" + servicio).getAttribute('wpftitulo');
        var wpnonce = document.getElementById("wpf-boton-llamar-" + servicio).getAttribute('wpfn');
        var precio = document.getElementById("wpf-boton-llamar-" + servicio).getAttribute('wpfp');
        var distancia = document.getElementById("wpf-boton-llamar-" + servicio).getAttribute('wpfdistancia');
        var telefono = document.getElementById("wpf-boton-llamar-" + servicio).getAttribute('wpftelefono');
        console.log('Nueva entrada: Presupuesto. servicio: '+servicio+' titulo '+titulo+ ' telefono '+telefono );

        elementorFrontend.documentsManager.documents['56680'].showModal(); //show the popup

        document.getElementById("wpfunos-modal-llamar-telefono").innerHTML = telefono;

        let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
        console.log('isMobile: '+isMobile);
        if ( isMobile ) {
          var tel = 'tel:'+telefono;
          console.log('tel: '+tel);
          window.location = tel;
        }

        jQuery.ajax({
          type : "post",
          dataType : "json",
          url : WpfAjax.ajaxurl,
          data: {
            "action": "wpfunos_ajax_serviciosv2_llamar",
            "servicio": servicio,
            "wpnonce": wpnonce,
            "precio" : precio,
            "titulo" : titulo,
          },
          success: function(response) {
            console.log('wpfunos_ajax_serviciosv2_llamar response:');
            console.log(response)	;
            if(response.type == "success") {
              document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfref", response.newref);
              $('#wpfunos-modal-fin-formulario-llamar').show();
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
