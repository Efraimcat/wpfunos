$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){

    setTimeout(function() {
      $('.elementor-tab-title').removeClass('elementor-active');
      $('.elementor-tab-content').css('display', 'none');
    }, 1000 );

    [document.getElementById('wpf-aseg-1'), document.getElementById('wpf-aseg-2'), document.getElementById('wpf-aseg-3'), document.getElementById('wpf-aseg-4'), document.getElementById('wpf-aseg-5') ].forEach(function(element) {
      element.addEventListener('click', wpfcerrarfiltros, false);
    });



	    }); // Function END
}); // Document ready END

var wpfcerrarfiltros = function() {
  $('.elementor-tab-title').removeClass('elementor-active');
  $('.elementor-tab-content').css('display', 'none');
}
