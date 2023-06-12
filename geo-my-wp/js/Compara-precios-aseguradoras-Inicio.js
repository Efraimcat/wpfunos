//	/compara-precios-aseguradoras
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){

    // WPML
    if( document.getElementById('wpfunos-search-form-address') != null ){
      var idioma_wpml = getCookie('wp-wpml_current_language');
      var wpflabel = document.getElementsByClassName('gmw-field-label');
      if (idioma_wpml === 'ca'){
        wpflabel[0].innerHTML = 'On vius?';
        $('#gmw-address-field-3').attr('placeholder','Introdueix la població');
        $('#gmw-submit-3').val('Veure preus');
      }
    }
    // WPML

  });
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
});
