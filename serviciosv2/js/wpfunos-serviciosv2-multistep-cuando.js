<script type="text/javascript" id="wpfunos-serviciosv2-multistep-cuando">
jQuery( document ).ready( function() { //wait for the page to load
  /* You can do more here, this will just show the popup on refresh of page, but hey this is JQuery so you can do more things here depending on your condition to trigger the popup */
  jQuery( window ).on( 'elementor/frontend/init', function() { //wait for elementor to load
    elementorFrontend.on( 'components:init', function() { //wait for elementor pro to load
      elementorFrontend.documentsManager.documents['72904'].showModal(); //show the popup

      var cuando = 'dummy';

      var wpfincineracion = function() {
        var params = new URLSearchParams(location.search);
        params.set('CP', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp") );
        params.set('wpfref', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref") );
        params.set('orden', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpforden") );
        elementorFrontend.documentsManager.documents['56688'].showModal(); //show the popup
        document.getElementById("elementor-popup-modal-71587").style.display = "none"
        params.set('dest', 'incineracion' );
        params.set('cf[resp1]', '2');
        params.set('cuando', cuando);
        window.location.search = params.toString();
      }

      var wpfentierro = function() {
        var params = new URLSearchParams(location.search);
        params.set('CP', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp") );
        params.set('wpfref', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref") );
        params.set('orden', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpforden") );
        elementorFrontend.documentsManager.documents['56688'].showModal(); //show the popup
        document.getElementById("elementor-popup-modal-71587").style.display = "none"
        params.set('dest', 'entierro' );
        params.set('cf[resp1]', '1');
        params.set('cuando', cuando);
        window.location.search = params.toString();
      }

      var wpfsiguiente = function() {
        var params = new URLSearchParams(location.search);
        params.set('CP', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp") );
        params.set('wpfref', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref") );
        params.set('orden', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpforden") );
        elementorFrontend.documentsManager.documents['56688'].showModal(); //show the popup
        document.getElementById("elementor-popup-modal-71587").style.display = "none"
        params.set('dest', 'incineracion' );
        params.set('cf[resp1]', '2');
        params.set('cuando', cuando);
        window.location.search = params.toString();
      }

      document.getElementById("wpfunos-multistep-ahora").addEventListener('click', function() {
        document.getElementById("elementor-popup-modal-72904").style.display = "none"
        elementorFrontend.documentsManager.documents['71587'].showModal(); //show the popup
        cuando = 'Ahora';
        document.getElementById("wpfunos-multistep-incineracion").addEventListener('click', wpfincineracion, false);
        document.getElementById("wpfunos-multistep-entierro").addEventListener('click', wpfentierro, false);
        document.getElementById("wpfunos-multistep-siguiente").addEventListener('click', wpfsiguiente, false);
      }, false);

      document.getElementById("wpfunos-multistep-prox").addEventListener('click', function() {
        document.getElementById("elementor-popup-modal-72904").style.display = "none"
        elementorFrontend.documentsManager.documents['71587'].showModal(); //show the popup
        cuando = 'Proximamente';
        document.getElementById("wpfunos-multistep-incineracion").addEventListener('click', wpfincineracion, false);
        document.getElementById("wpfunos-multistep-entierro").addEventListener('click', wpfentierro, false);
        document.getElementById("wpfunos-multistep-siguiente").addEventListener('click', wpfsiguiente, false);
      }, false);

      document.getElementById("wpfunos-multistep-sigcuando").addEventListener('click', function() {
        document.getElementById("elementor-popup-modal-72904").style.display = "none"
        elementorFrontend.documentsManager.documents['71587'].showModal(); //show the popup
        cuando = 'Ahora';
        document.getElementById("wpfunos-multistep-incineracion").addEventListener('click', wpfincineracion, false);
        document.getElementById("wpfunos-multistep-entierro").addEventListener('click', wpfentierro, false);
        document.getElementById("wpfunos-multistep-siguiente").addEventListener('click', wpfsiguiente, false);
      }, false);
    } );
  } );
} );
</script>
