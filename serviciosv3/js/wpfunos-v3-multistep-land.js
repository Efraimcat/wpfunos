<script type="text/javascript" id="wpfunos-v3-multistep-land">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){

    setTimeout(function(){


      elementorFrontend.documentsManager.documents['89340'].showModal(); //show the popup Cuando

      var cuando = 'dummy';

      [ document.getElementById("wpfunos-multistep-ahora"), document.getElementById("wpfunos-multistep-ahora-icon")].forEach(function(element) {
        element.addEventListener('click', function() {
          cuando = 'Ahora';
          console.log('cuando: Ahora');

          document.getElementById("elementor-popup-modal-89340").style.display = "none"
          elementorFrontend.documentsManager.documents['89354'].showModal(); //show the popup datos usuario
          document.getElementById("wpfunos-v3-enviar-datos").addEventListener('click', wpfdatosusuario, false);

        }, false);
      });

      [ document.getElementById("wpfunos-multistep-prox"),document.getElementById("wpfunos-multistep-prox-icon") ].forEach(function(element) {
        element.addEventListener('click', function() {
          cuando = 'Próximamente';
          console.log('cuando: Proximamente');

          document.getElementById("elementor-popup-modal-89340").style.display = "none"
          elementorFrontend.documentsManager.documents['89354'].showModal(); //show the popup datos usuario
          document.getElementById("wpfunos-v3-enviar-datos").addEventListener('click', wpfdatosusuario, false);
        }, false);
      });
      //
      //
      var wpfdatosusuario = function() {
        console.log('click botón enviar datos');
        var nombre = document.getElementById("form-field-Nombre").value;
        var email = document.getElementById("form-field-Email").value;
        var telefono = document.getElementById("form-field-Telefono").value;
        var acepta = document.getElementById("form-field-aceptacion").validity.valueMissing;  //(true = no ha validado  false = ha validado)
        if( nombre != '' && email != '' && telefono != '' && !acepta ){
          console.log('Finalmente: Cuando ' +cuando+ ', Destino ' +destino+ ', Velatorio ' +velatorio+ ' , Ceremonia ' +ceremonia+ ', Nombre ' +nombre+ ' , Email ' +email+ ' , Teléfono ' +telefono);
          console.log('datos correctos. creando entrada.');

          var date = new Date();
          date.setTime(date.getTime() + (30*24*60*60*1000));
          expires = "; expires=" + date.toUTCString();
          document.cookie = "wpfn=" + nombre + expires + "; path=/; SameSite=Lax; secure";
          document.cookie = "wpfe=" + email + expires + "; path=/; SameSite=Lax; secure";
          document.cookie = "wpft=" + telefono + expires + "; path=/; SameSite=Lax; secure";

          var ip = document.getElementById("wpf-resultados-referencia").getAttribute("wpfip");
          var wpnonce = document.getElementById("wpf-resultados-referencia").getAttribute("wpfn");
          var wpfnewref = document.getElementById("wpf-resultados-referencia").getAttribute("wpfnewref");
          var wpfcp = document.getElementById("wpf-resultados-referencia").getAttribute("wpfcp");
          var wpfubic = document.getElementById("wpf-resultados-referencia").getAttribute("wpfubic");
          var wpfdist = document.getElementById("wpf-resultados-referencia").getAttribute("wpfdist");
          var wpflat = document.getElementById("wpf-resultados-referencia").getAttribute("wpflat");
          var wpflng = document.getElementById("wpf-resultados-referencia").getAttribute("wpflng");


          destino = params.get('cf[resp1]');
          ataud =  params.get('cf[resp2]');
          velatorio = params.get('cf[resp3]');
          ceremonia = params.get('cf[resp4]');

          var params = new URLSearchParams(location.search);

          params.set('cuando', cuando);
          params.set('CP', wpfcp);

          var url = params.toString();

          //elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
          $('#elementor-popup-modal-89354').hide();
          //elementorFrontend.documentsManager.documents['77005'].showModal(); //Ventana Popup Esperando (entrada datos GTM)

          jQuery.ajax({
            type : "post",
            dataType : "json",
            url : WpfAjax.ajaxurl,
            data: {
              "action": "wpfunos_ajax_v3_multiform",
              "wpfnombre": nombre,
              "wpfemail": email,
              "wpftelefono": telefono,
              "wpfurl" : url,
              "wpnonce" : wpnonce,
              "wpfip" : ip,
              "wpfnewref" : wpfnewref,
              "wpfcuando" : cuando,
              "wpfdestino" : destino,
              "wpfataud" : ataud,
              "wpfvelatorio" : velatorio,
              "wpfceremonia" : ceremonia,
              "wpfcp" : wpfcp,
              "wpfubic" : wpfubic,
              "wpfdist" : wpfdist,
              "wpflat" : wpflat,
              "wpflng" : wpflng,
              "wpfland" : '1',
            },
            success: function(response) {
              console.log(response)	;
              if(response.type == "success") {
                console.log('success');
                window.location.href = response.wpfurl;
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
      }


    }, 1000);
  } );
} );
</script>
