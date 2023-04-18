$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    if( $('#wpfBreadcrumbsDirectorio').length != 0 ){
      $('#wpfBreadcrumbsDirectorio a').text(function (i, old) { return old.replace('Tanatorios del directorio', 'Directorio') });
      $('#wpfBreadcrumbsDirectorio a').text(function (i, old) { return old.replace('Funerarias del directorio', 'Directorio') });
      if( $('.breadcrumb_last').text() == 'Tanatorios del directorio' || $('.breadcrumb_last').text() == 'Funerarias del directorio' ){
        $('.breadcrumb_last').text(function (i, old) { return old.replace('Tanatorios del directorio', 'Directorio') });
        $('.breadcrumb_last').text(function (i, old) { return old.replace('Funerarias del directorio', 'Directorio') });
        $('.breadcrumb_last').css('font-weight', '700');
      }
    }
  });
});




FUNCIONA

$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    if(  $('#wpfBreadcrumbsDirectorio').length != 0 ){
      jQuery('#wpfBreadcrumbsDirectorio a').text(function (i, old) { return old.replace('Tanatorios del directorio', 'Directorio') })
      if(  jQuery('.breadcrumb_last').text() == 'Tanatorios del directorio')		  {
        jQuery('.breadcrumb_last').text(function (i, old) { return old.replace('Tanatorios del directorio', 'Directorio') })
      }
    }
  });
});
