<script type="text/javascript" id="wpfunos-serviciosv2-multistep-form">
jQuery( document ).ready( function() { //wait for the page to load
  /* You can do more here, this will just show the popup on refresh of page, but hey this is JQuery so you can do more things here depending on your condition to trigger the popup */
  jQuery( window ).on( 'elementor/frontend/init', function() { //wait for elementor to load
    elementorFrontend.on( 'components:init', function() { //wait for elementor pro to load
      elementorFrontend.documentsManager.documents['71587'].showModal(); //show the popup

      document.getElementById("wpfunos-multistep-incineracion").addEventListener('click', function() {
        var params = new URLSearchParams(location.search);
        params.set('CP', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp") );
        params.set('wpfref', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref") );
        params.set('orden', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpforden") );
        elementorFrontend.documentsManager.documents['56688'].showModal(); //show the popup
        document.getElementById("elementor-popup-modal-71587").style.display = "none"
        params.set('dest', 'incineracion' );
        params.set('cf[resp1]', '2')
        window.location.search = params.toString();
      }, false);
      document.getElementById("wpfunos-multistep-entierro").addEventListener('click', function() {
        var params = new URLSearchParams(location.search);
        params.set('CP', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp") );
        params.set('wpfref', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref") );
        params.set('orden', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpforden") );
        elementorFrontend.documentsManager.documents['56688'].showModal(); //show the popup
        document.getElementById("elementor-popup-modal-71587").style.display = "none"
        params.set('dest', 'entierro' );
        params.set('cf[resp1]', '1')
        window.location.search = params.toString();
      }, false);
      document.getElementById("wpfunos-multistep-siguiente").addEventListener('click', function() {
        var params = new URLSearchParams(location.search);
        params.set('CP', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp") );
        params.set('wpfref', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref") );
        params.set('orden', document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpforden") );
        elementorFrontend.documentsManager.documents['56688'].showModal(); //show the popup
        document.getElementById("elementor-popup-modal-71587").style.display = "none"
        params.set('dest', 'incineracion' );
        params.set('cf[resp1]', '2')
        window.location.search = params.toString();
      }, false);
    } );
  } );
} );
</script>
