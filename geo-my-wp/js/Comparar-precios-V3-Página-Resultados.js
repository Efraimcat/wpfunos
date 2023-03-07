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

    var elementsFinanciacionNo = document.getElementsByClassName('wpf-financiacion-no');
    for (var i = 0; i < elementsFinanciacionNo.length; i++) {
      elementsFinanciacionNo[i].style.display = 'none';
    }

  }); // Function END
}); // Document ready END

//getCookie('wp-wpml_current_language')
function getCookie(c_name) {
  var c_value = document.cookie,
  c_start = c_value.indexOf(" " + c_name + "=");
  if (c_start == -1) c_start = c_value.indexOf(c_name + "=");
  if (c_start == -1) {
    c_value = null;
  } else {
    c_start = c_value.indexOf("=", c_start) + 1;
    var c_end = c_value.indexOf(";", c_start);
    if (c_end == -1) {
      c_end = c_value.length;
    }
    c_value = unescape(c_value.substring(c_start, c_end));
  }
  return c_value;
}
