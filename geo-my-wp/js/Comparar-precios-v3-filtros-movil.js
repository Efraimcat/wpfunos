
//  	/comparar-precios-resultados
$ = jQuery.noConflict();
$(document).ready(function(){
  setInterval(function() {
    if ($('.elementor-tab-title').hasClass('elementor-active')) {
      setTimeout(function() {
        $('.elementor-tab-title').removeClass('elementor-active');
        $('.elementor-tab-content').css('display', 'none');
      }, 6000);
    }
  }, 500); // check every 100ms
});
