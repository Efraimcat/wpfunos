<script type="text/javascript" id="wpfunos-serviciosv2-botones-blur">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    var elementsBoton = document.getElementsByClassName("wpfunos-boton-blur");

    var wpfFunctionDatos = function() {
      var servicio = this.getAttribute("wpfid");
      var wpnonce = this.getAttribute("wpfn");
      var precio = this.getAttribute("wpfp");
      var tipo = this.getAttribute("wpftipo");
      console.log('click boton blur servicio: ' +servicio+ ' tipo: ' +tipo);
      elementorFrontend.documentsManager.documents[document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfformdatos")].showModal(); //show the popup
      document.getElementById("wpfunos-modal-datos-resultados-movil").innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfcount");
      document.getElementById("wpfunos-modal-datos-resultados-desktop").innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfcount");
      document.getElementById("wpfunos-modal-datos-precio-movil").innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfmejorprecio");
      document.getElementById("wpfunos-modal-datos-precio-desktop").innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfmejorprecio");
      document.getElementById("wpfunos-v2-enviar-datos").addEventListener('click', function() {
        console.log('click botón enviar, Creando entrada.');
        var nombre = document.getElementById("form-field-Nombre").value;
        var email = document.getElementById("form-field-Email").value;
        var telefono = document.getElementById("form-field-Telefono").value;
        var acepta = document.getElementById("form-field-aceptacion").validity.valueMissing;  //(true = no ha validado  false = ha validado)
        if( nombre != '' && email != '' && telefono != '' && !acepta ){
          console.log('campos OK');
          var date = new Date();
          date.setTime(date.getTime() + (30*24*60*60*1000));
          expires = "; expires=" + date.toUTCString();
          document.cookie = "wpfn=" + nombre + expires + "; path=/; SameSite=Lax; secure";
          document.cookie = "wpfe=" + email + expires + "; path=/; SameSite=Lax; secure";
          document.cookie = "wpft=" + telefono + expires + "; path=/; SameSite=Lax; secure";
          var ip = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfip");
          var wpfref = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref");
          var params = new URLSearchParams(location.search);
          params.set('wpfref', wpfref );
          params.set('wpfvision', 'clear' );
          params.set('wpftipo', tipo );
          params.set('wpftipoid', servicio );
          var url = params.toString();
          console.log('url: ' + url);
          elementorFrontend.documentsManager.documents[document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfesperando")].showModal(); //show the popup
          $('#elementor-popup-modal-'document.getElementById("wpf-resultados-cabecera-donde").getAttribute("wpfformdatos")').hide();
          jQuery.ajax({
            type : "post",
            dataType : "json",
            url : WpfAjax.ajaxurl,
            data: {
              "action": "wpfunos_ajax_serviciosv2_entrada_datos",
              "wpfnombre": nombre,
              "wpfemail": email,
              "wpftelefono": telefono,
              "wpfurl" : url,
              "wpnonce" : wpnonce,
              "wpfip" : ip,
            },
            success: function(response) {
              console.log(response)	;
              if(response.type == "success") {
                console.log('success');
                window.location.href = response.transient['wpfurl'];
              } else {
                if(response.type == "unwanted") {
                  console.log('unwanted');
                  window.location.href = "/";
                }else{
                  console.log('fail');
                  window.location.href = "/";
                }
              }
            }
          });
        }
      });
    }

    for (var i = 0; i < elementsBoton.length; i++) {
      elementsBoton[i].addEventListener('click', wpfFunctionDatos, false);
    }
  });
});
</script>
