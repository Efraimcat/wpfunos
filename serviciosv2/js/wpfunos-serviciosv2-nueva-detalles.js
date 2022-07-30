<script type="text/javascript" id="wpfunos-serviciosv2-nueva-detalles">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    console.log("Nueva entrada: Detalles.");
    var checkExist = setInterval(function() {

      if (document.getElementById("wpf-resultados-cabecera-referencia").hasAttribute("wpftipoid") ) {

        clearInterval(checkExist);

        var servicio = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute('wpftipoid');
        var titulo = document.getElementById("wpf-boton-detalles-" + servicio).getAttribute('wpftitulo');
        var wpnonce = document.getElementById("wpf-boton-detalles-" + servicio).getAttribute('wpfn');
        var precio = document.getElementById("wpf-boton-detalles-" + servicio).getAttribute('wpfp');
        var distancia = document.getElementById("wpf-boton-detalles-" + servicio).getAttribute('wpfdistancia');

        console.log('Nueva entrada: Detalles. servicio: '+servicio+' titulo '+titulo );

        elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup

        jQuery.ajax({
          type : "post",
          dataType : "json",
          url : WpfAjax.ajaxurl,
          data: {
            "action": "wpfunos_ajax_serviciosv2_detalles",
            "servicio": servicio,
            "wpnonce": wpnonce,
            "precio" : precio,
            "titulo" : titulo,
            "distancia" : distancia,
          },
          success: function(response) {
            console.log('wpfunos_ajax_serviciosv2_detalles response:');
            console.log(response)	;
            if(response.type == "success") {
              //response.comentarios;
              elementorFrontend.documentsManager.documents['56672'].showModal(); //show the popup

              document.getElementById("wpf-detalles-logo").innerHTML = response.valor_logo;
              document.getElementById("wpf-detalles-logo-movil").innerHTML = response.valor_logo;

              document.getElementById("wpf-detalles-logo-confirmado").innerHTML = response.valor_logo_confirmado;
              document.getElementById("wpf-detalles-logo-confirmado-movil").innerHTML = response.valor_logo_confirmado;

              document.getElementById("wpf-detalles-nombre").innerHTML = response.valor_nombre;
              document.getElementById("wpf-detalles-nombre-movil").innerHTML = response.valor_nombre;

              document.getElementById("wpf-detalles-servicio").innerHTML = response.valor_servicio;
              document.getElementById("wpf-detalles-servicio-movil").innerHTML = response.valor_servicio;

              document.getElementById("wpf-detalles-precio").innerHTML = response.valor_precio;
              document.getElementById("wpf-detalles-precio-movil").innerHTML = response.valor_precio;

              document.getElementById("wpf-detalles-nombrepack").innerHTML = response.valor_nombrepack;
              document.getElementById("wpf-detalles-nombrepack-movil").innerHTML = response.valor_nombrepack;

              document.getElementById("wpf-detalles-textoprecio").innerHTML = response.valor_textoprecio;
              document.getElementById("wpf-detalles-textoprecio-movil").innerHTML = response.valor_textoprecio;

              document.getElementById("wpf-detalles-direccion").innerHTML = response.valor_direccion;
              document.getElementById("wpf-detalles-direccion-movil").innerHTML = response.valor_direccion;

              document.getElementById("wpf-detalles-distancia").innerHTML = response.valor_distancia+' Km.';

              document.getElementById("wpf-detalles-comentarios").innerHTML = response.comentarios;
              document.getElementById("wpf-detalles-comentarios-movil").innerHTML = response.comentarios;
              $('#elementor-popup-modal-84639').hide()

              document.getElementById("wpfunos-detalles-llamen").addEventListener('click', wpfDetallesLlamen, false);
              document.getElementById("wpfunos-detalles-llamen").setAttribute('wpfid', servicio);
              document.getElementById("wpfunos-detalles-llamen").setAttribute('wpnonce', wpnonce);
              document.getElementById("wpfunos-detalles-llamen").setAttribute('precio', precio);
              document.getElementById("wpfunos-detalles-llamen").setAttribute('titulo', titulo);
              document.getElementById("wpfunos-detalles-llamar").addEventListener('click', wpfDetallesLlamar, false);
              document.getElementById("wpfunos-detalles-llamar").setAttribute('wpfid', servicio);
              document.getElementById("wpfunos-detalles-llamar").setAttribute('wpnonce', wpnonce);
              document.getElementById("wpfunos-detalles-llamar").setAttribute('precio', precio);
              document.getElementById("wpfunos-detalles-llamar").setAttribute('titulo', titulo);
              document.getElementById("wpfunos-detalles-email").addEventListener('click', wpfDetallesEmail, false);
              document.getElementById("wpfunos-detalles-email").setAttribute('wpfid', servicio);
              document.getElementById("wpfunos-detalles-email").setAttribute('wpnonce', wpnonce);
              document.getElementById("wpfunos-detalles-email").setAttribute('precio', precio);
              document.getElementById("wpfunos-detalles-email").setAttribute('titulo', titulo);
              document.getElementById("wpfunos-detalles-presupuesto").addEventListener('click', wpfDetallesPresupuesto, false);
              document.getElementById("wpfunos-detalles-presupuesto").setAttribute('wpfid', servicio);
              document.getElementById("wpfunos-detalles-presupuesto").setAttribute('wpnonce', wpnonce);
              document.getElementById("wpfunos-detalles-presupuesto").setAttribute('precio', precio);
              document.getElementById("wpfunos-detalles-presupuesto").setAttribute('titulo', titulo);
              document.getElementById("wpfunos-detalles-email-movil").addEventListener('click', wpfDetallesEmail, false);
              document.getElementById("wpfunos-detalles-email-movil").setAttribute('wpfid', servicio);
              document.getElementById("wpfunos-detalles-email-movil").setAttribute('wpnonce', wpnonce);
              document.getElementById("wpfunos-detalles-email-movil").setAttribute('precio', precio);
              document.getElementById("wpfunos-detalles-email-movil").setAttribute('titulo', titulo);
              document.getElementById("wpfunos-detalles-presupuesto-movil").addEventListener('click', wpfDetallesPresupuesto, false);
              document.getElementById("wpfunos-detalles-presupuesto-movil").setAttribute('wpfid', servicio);
              document.getElementById("wpfunos-detalles-presupuesto-movil").setAttribute('wpnonce', wpnonce);
              document.getElementById("wpfunos-detalles-presupuesto-movil").setAttribute('precio', precio);
              document.getElementById("wpfunos-detalles-presupuesto-movil").setAttribute('titulo', titulo);

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
