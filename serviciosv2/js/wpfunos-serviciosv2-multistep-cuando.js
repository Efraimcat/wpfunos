<script type="text/javascript" id="wpfunos-serviciosv2-multistep-cuando">
jQuery( document ).ready( function() { //wait for the page to load
  /* You can do more here, this will just show the popup on refresh of page, but hey this is JQuery so you can do more things here depending on your condition to trigger the popup */
  jQuery( window ).on( 'elementor/frontend/init', function() { //wait for elementor to load
    elementorFrontend.on( 'components:init', function() { //wait for elementor pro to load
      elementorFrontend.documentsManager.documents['71587'].showModal(); //show the popup

      var destino = 'dummy';

      [ document.getElementById("wpfunos-multistep-entierro"), document.getElementById("wpfunos-multistep-entierro-icon")].forEach(function(element) {
        element.addEventListener('click', function() {
          document.getElementById("elementor-popup-modal-71587").style.display = "none"
          elementorFrontend.documentsManager.documents['72904'].showModal(); //show the popup
          destino = 'Entierro';
          document.getElementById("wpfunos-multistep-ahora").addEventListener('click', wpfahora, false);
          document.getElementById("wpfunos-multistep-ahora-icon").addEventListener('click', wpfahora, false);
          document.getElementById("wpfunos-multistep-prox").addEventListener('click', wpfprox, false);
          document.getElementById("wpfunos-multistep-prox-icon").addEventListener('click', wpfprox, false);
        }, false);
      });

      [ document.getElementById("wpfunos-multistep-incineracion"),document.getElementById("wpfunos-multistep-incineracion-icon"),document.getElementById("wpfunos-multistep-nolose"),document.getElementById("wpfunos-multistep-nolose-icon") ].forEach(function(element) {
        element.addEventListener('click', function() {
          document.getElementById("elementor-popup-modal-71587").style.display = "none";
          elementorFrontend.documentsManager.documents['72904'].showModal(); //show the popup
          destino = 'Incineracion';
          document.getElementById("wpfunos-multistep-ahora").addEventListener('click', wpfahora, false);
          document.getElementById("wpfunos-multistep-ahora-icon").addEventListener('click', wpfahora, false);
          document.getElementById("wpfunos-multistep-prox").addEventListener('click', wpfprox, false);
          document.getElementById("wpfunos-multistep-prox-icon").addEventListener('click', wpfprox, false);
        }, false);
      });

      var wpfahora = function() {
        var params = new URLSearchParams(location.search);
        params.set('CP', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp") );
        params.set('wpfref', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref") );
        params.set('orden', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpforden") );
        elementorFrontend.documentsManager.documents['56688'].showModal(); //show the popup
        document.getElementById("elementor-popup-modal-72904").style.display = "none"
        params.set('dest', destino );
        if ( destino == "Incineracion" ){
          params.set('cf[resp1]', '2');
        }else{
          params.set('cf[resp1]', '1');
        }
        params.set('cuando', 'Ahora');
        window.location.search = params.toString();
      }

      var wpfprox = function() {
        var params = new URLSearchParams(location.search);
        params.set('CP', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp") );
        params.set('wpfref', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref") );
        params.set('orden', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpforden") );
        elementorFrontend.documentsManager.documents['56688'].showModal(); //show the popup
        document.getElementById("elementor-popup-modal-72904").style.display = "none"
        params.set('dest', destino );
        if ( destino == "Incineracion" ){
          params.set('cf[resp1]', '2');
        }else{
          params.set('cf[resp1]', '1');
        }
        params.set('cuando', 'Proximamente');
        window.location.search = params.toString();
      }

    } );
  } );
} );
</script>
