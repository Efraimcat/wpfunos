$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){

    window.history.pushState(null, null, window.location.href);
    window.onpopstate = function () {
      window.history.go(1);
    };

    setTimeout(function() {
      $('.elementor-tab-title').removeClass('elementor-active');
      $('.elementor-tab-content').css('display', 'none');
    }, 1000 );

    //
  }); // Function END
}); // Document ready END
