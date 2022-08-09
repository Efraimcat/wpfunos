<script type="text/javascript" id="wpfunos-v3-multistep">
jQuery( document ).ready( function() { //wait for the page to load
  /* You can do more here, this will just show the popup on refresh of page, but hey this is JQuery so you can do more things here depending on your condition to trigger the popup */
  jQuery( window ).on( 'elementor/frontend/init', function() { //wait for elementor to load
    elementorFrontend.on( 'components:init', function() { //wait for elementor pro to load
      elementorFrontend.documentsManager.documents['89340'].showModal(); //show the popup Cuando

      var cuando = 'dummy';
      var destino = 'dummy';
      var velatorio = 'dummy';
      var ceremonia = 'dummy';

      [ document.getElementById("wpfunos-multistep-ahora"), document.getElementById("wpfunos-multistep-ahora-icon")].forEach(function(element) {
        element.addEventListener('click', function() {
          cuando = 'Ahora';
          console.log('cuando: Ahora');

          document.getElementById("elementor-popup-modal-89340").style.display = "none"
          elementorFrontend.documentsManager.documents['89344'].showModal(); //show the popup Destino

          [ document.getElementById("wpfunos-multistep-entierro"),document.getElementById("wpfunos-multistep-entierro-icon")  ].forEach(function(element) {
            element.addEventListener('click', wpfentierro, false);
          });
          [ document.getElementById("wpfunos-multistep-incineracion"),document.getElementById("wpfunos-multistep-incineracion-icon"), document.getElementById("wpfunos-multistep-nolose"), document.getElementById("wpfunos-multistep-nolose-icon")].forEach(function(element) {
            element.addEventListener('click', wpfincineracion, false);
          });
        }, false);
      });

      [ document.getElementById("wpfunos-multistep-prox"),document.getElementById("wpfunos-multistep-prox-icon") ].forEach(function(element) {
        element.addEventListener('click', function() {
          cuando = 'Próximamente';
          console.log('cuando: Proximamente');

          document.getElementById("elementor-popup-modal-89340").style.display = "none";
          elementorFrontend.documentsManager.documents['89344'].showModal(); //show the popup Destino

          [ document.getElementById("wpfunos-multistep-entierro"),document.getElementById("wpfunos-multistep-entierro-icon")  ].forEach(function(element) {
            element.addEventListener('click', wpfentierro, false);
          });
          [ document.getElementById("wpfunos-multistep-incineracion"),document.getElementById("wpfunos-multistep-incineracion-icon"), document.getElementById("wpfunos-multistep-nolose"), document.getElementById("wpfunos-multistep-nolose-icon")].forEach(function(element) {
            element.addEventListener('click', wpfincineracion, false);
          });
        }, false);
      });
      //
      //
      var wpfentierro = function() {
        destino = 'Entierro';
        console.log('destino: entierro');

        document.getElementById("elementor-popup-modal-89344").style.display = "none";
        elementorFrontend.documentsManager.documents['89348'].showModal(); //show the popup Velatorio

        [ document.getElementById("wpfunos-multistep-velatorio"),document.getElementById("wpfunos-multistep-velatorio-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfvelatorio, false);
        });
        [ document.getElementById("wpfunos-multistep-sinvelatorio"),document.getElementById("wpfunos-multistep-sinvelatorio-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfsinvelatorio, false);
        });
      }

      var wpfincineracion = function() {
        destino = 'Incineración';
        console.log('destino: incineracion');

        document.getElementById("elementor-popup-modal-89344").style.display = "none";
        elementorFrontend.documentsManager.documents['89348'].showModal(); //show the popup Velatorio

        [ document.getElementById("wpfunos-multistep-velatorio"),document.getElementById("wpfunos-multistep-velatorio-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfvelatorio, false);
        });
        [ document.getElementById("wpfunos-multistep-sinvelatorio"),document.getElementById("wpfunos-multistep-sinvelatorio-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfsinvelatorio, false);
        });
      }
      //
      //
      var wpfvelatorio = function() {
        velatorio = 'Velatorio';
        console.log('velatorio: si');

        document.getElementById("elementor-popup-modal-89348").style.display = "none";
        elementorFrontend.documentsManager.documents['89351'].showModal(); //show the popup Ceremonia

        [ document.getElementById("wpfunos-multistep-sinceremonia"),document.getElementById("wpfunos-multistep-sinceremonia-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfsinceremonia, false);
        });
        [ document.getElementById("wpfunos-multistep-solosala"),document.getElementById("wpfunos-multistep-solosala-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfsolosala, false);
        });
        [ document.getElementById("wpfunos-multistep-civil"),document.getElementById("wpfunos-multistep-civil-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfcivil, false);
        });
        [ document.getElementById("wpfunos-multistep-religiosa"),document.getElementById("wpfunos-multistep-religiosa-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfreligiosa, false);
        });

      }

      var wpfsinvelatorio = function() {
        velatorio = 'Sin velatorio';
        console.log('velatorio: no');

        document.getElementById("elementor-popup-modal-89348").style.display = "none";
        elementorFrontend.documentsManager.documents['89351'].showModal(); //show the popup Ceremonia

        [ document.getElementById("wpfunos-multistep-sinceremonia"),document.getElementById("wpfunos-multistep-sinceremonia-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfsinceremonia, false);
        });
        [ document.getElementById("wpfunos-multistep-solosala"),document.getElementById("wpfunos-multistep-solosala-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfsolosala, false);
        });
        [ document.getElementById("wpfunos-multistep-civil"),document.getElementById("wpfunos-multistep-civil-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfcivil, false);
        });
        [ document.getElementById("wpfunos-multistep-religiosa"),document.getElementById("wpfunos-multistep-religiosa-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfreligiosa, false);
        });

      }
      //
      var wpfsinceremonia = function() {
        ceremonia = 'Sin ceremonia';
        console.log('ceremonia: no');

        document.getElementById("elementor-popup-modal-89351").style.display = "none";
        elementorFrontend.documentsManager.documents['89354'].showModal(); //show the popup Ceremonia
        document.getElementById("wpfunos-v3-enviar-datos").addEventListener('click', wpfdatosusuario, false);

      }

      var wpfsolosala = function() {
        ceremonia = 'Solo sala';
        console.log('ceremonia: sala');

        document.getElementById("elementor-popup-modal-89351").style.display = "none";
        elementorFrontend.documentsManager.documents['89354'].showModal(); //show the popup Ceremonia
        document.getElementById("wpfunos-v3-enviar-datos").addEventListener('click', wpfdatosusuario, false);
      }

      var wpfcivil = function() {
        ceremonia = 'Ceremonia civil';
        console.log('ceremonia: civil');

        document.getElementById("elementor-popup-modal-89351").style.display = "none";
        elementorFrontend.documentsManager.documents['89354'].showModal(); //show the popup Ceremonia
        document.getElementById("wpfunos-v3-enviar-datos").addEventListener('click', wpfdatosusuario, false);
      }

      var wpfreligiosa = function() {
        ceremonia = 'Ceremonia religiosa';
        console.log('ceremonia: religiosa');

        document.getElementById("elementor-popup-modal-89351").style.display = "none";
        elementorFrontend.documentsManager.documents['89354'].showModal(); //show the popup Ceremonia
        document.getElementById("wpfunos-v3-enviar-datos").addEventListener('click', wpfdatosusuario, false);
      }

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

          var params = new URLSearchParams(location.search);

          if ( destino == "incineracion" ){
            params.set('cf[resp1]', '2');
          }
          if ( destino == "entierro" ){
            params.set('cf[resp1]', '1');
          }
          if ( velatorio =='si' ){
            params.set('cf[resp3]', '1');
          }
          if ( velatorio =='no' ){
            params.set('cf[resp3]', '2');
          }
          if ( ceremonia =='no' ){
            params.set('cf[resp4]', '1');
          }
          if ( ceremonia =='sala' ){
            params.set('cf[resp4]', '2');
          }
          if( ceremonia =='civil' ){
            params.set('cf[resp4]', '3');
          }
          if( ceremonia =='religiosa' ){
            params.set('cf[resp4]', '4');
          }

          params.set('cuando', cuando);
          params.set('CP', wpfcp);

          var url = params.toString();

          elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
          $('#elementor-popup-modal-89354').hide();
          elementorFrontend.documentsManager.documents['77005'].showModal(); //Ventana Popup Esperando (entrada datos GTM)

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
              "wpfvelatorio" : velatorio,
              "wpfceremonia" : ceremonia,
              "wpfcp" : wpfcp,
              "wpfubic" : wpfubic,
              "wpfdist" : wpfdist,
              "wpflat" : wpflat,
              "wpflng" : wpflng,

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


    } );
  } );
} );
</script>
