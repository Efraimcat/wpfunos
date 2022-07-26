<script type="text/javascript" id="wpfunos-serviciosv2-multistep-cuando">
jQuery( document ).ready( function() { //wait for the page to load
  /* You can do more here, this will just show the popup on refresh of page, but hey this is JQuery so you can do more things here depending on your condition to trigger the popup */
  jQuery( window ).on( 'elementor/frontend/init', function() { //wait for elementor to load
    elementorFrontend.on( 'components:init', function() { //wait for elementor pro to load
      elementorFrontend.documentsManager.documents['72904'].showModal(); //show the popup Cuando

      var cuando = 'dummy';
      var destino = 'dummy';
      var velatorio = 'dummy';
      var ceremonia = 'dummy';

      [ document.getElementById("wpfunos-multistep-ahora"), document.getElementById("wpfunos-multistep-ahora-icon")].forEach(function(element) {
        element.addEventListener('click', function() {
          cuando = 'Ahora';
          console.log('cuando: Ahora');

          document.getElementById("elementor-popup-modal-72904").style.display = "none"
          elementorFrontend.documentsManager.documents['71587'].showModal(); //show the popup Destino

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
          Cuando = 'Proximamente';
          console.log('cuando: Proximamente');

          document.getElementById("elementor-popup-modal-72904").style.display = "none";
          elementorFrontend.documentsManager.documents['71587'].showModal(); //show the popup Destino

          [ document.getElementById("wpfunos-multistep-entierro"),document.getElementById("wpfunos-multistep-entierro-icon")  ].forEach(function(element) {
            element.addEventListener('click', wpfentierro, false);
          });
          [ document.getElementById("wpfunos-multistep-incineracion"),document.getElementById("wpfunos-multistep-incineracion-icon"), document.getElementById("wpfunos-multistep-nolose"), document.getElementById("wpfunos-multistep-nolose-icon")].forEach(function(element) {
            element.addEventListener('click', wpfincineracion, false);
          });
        }, false);
      });
      //
      var wpfentierro = function() {
        destino = 'entierro';
        console.log('destino: entierro');

        document.getElementById("elementor-popup-modal-71587").style.display = "none";
        elementorFrontend.documentsManager.documents['85379'].showModal(); //show the popup Velatorio

        [ document.getElementById("wpfunos-multistep-velatorio"),document.getElementById("wpfunos-multistep-velatorio-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfvelatorio, false);
        });
        [ document.getElementById("wpfunos-multistep-sinvelatorio"),document.getElementById("wpfunos-multistep-sinvelatorio-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfsinvelatorio, false);
        });
      }

      var wpfincineracion = function() {
        destino = 'incineracion';
        console.log('destino: incineracion');

        document.getElementById("elementor-popup-modal-71587").style.display = "none";
        elementorFrontend.documentsManager.documents['85379'].showModal(); //show the popup Velatorio

        [ document.getElementById("wpfunos-multistep-velatorio"),document.getElementById("wpfunos-multistep-velatorio-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfvelatorio, false);
        });
        [ document.getElementById("wpfunos-multistep-sinvelatorio"),document.getElementById("wpfunos-multistep-sinvelatorio-icon")  ].forEach(function(element) {
          element.addEventListener('click', wpfsinvelatorio, false);
        });
      }
      //
      var wpfvelatorio = function() {
        velatorio = 'si';
        console.log('velatorio: si');

        document.getElementById("elementor-popup-modal-85379").style.display = "none";
        elementorFrontend.documentsManager.documents['85424'].showModal(); //show the popup Ceremonia

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
        velatorio = 'no';
        console.log('velatorio: no');

        document.getElementById("elementor-popup-modal-85379").style.display = "none";
        elementorFrontend.documentsManager.documents['85424'].showModal(); //show the popup Ceremonia

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
        ceremonia = 'no';
        console.log('ceremonia: no');
        wpffinal();
      }

      var wpfsolosala = function() {
        ceremonia = 'sala';
        console.log('ceremonia: sala');
        wpffinal();
      }

      var wpfcivil = function() {
        console.log('ceremonia: civil');
        ceremonia = 'civil';
        wpffinal();
      }

      var wpfreligiosa = function() {
        ceremonia = 'religiosa';
        console.log('ceremonia: religiosa');
        wpffinal();
      }

      var wpffinal = function(){
        var params = new URLSearchParams(location.search);
        params.set('CP', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp") );
        params.set('wpfref', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref") );
        params.set('orden', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpforden") );

        document.getElementById("elementor-popup-modal-85424").style.display = "none";
        elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup

        console.log('Finalmente: Cuando ' +cuando+ ', Destino ' +destino+ ', Velatorio ' +velatorio+ ' , Ceremonia ' +ceremonia);

        params.set('cuando', cuando);
        params.set('dest', destino );

        if ( destino == "Incineracion" ){
          params.set('cf[resp1]', '2');
        }
        if ( destino == "Entierro" ){
          params.set('cf[resp1]', '1');
        }
        if ( velatorio =='si' ){
          params.set('cf[resp3]', '1');
        }
        if ( velatorio =='no' ){
          params.set('cf[resp3]', '2');
        }
        if ( ceremonia =='sala' ){
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

        window.location.search = params.toString();
      }

    } );
  } );
} );
</script>
