$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    if( $('#wpfBreadcrumbsDirectorio').length != 0 ){
      $('#wpfBreadcrumbsDirectorio a').text(function (i, old) { return old.replace('Tanatorio Directorio', 'Directorio') });
      $('#wpfBreadcrumbsDirectorio a').text(function (i, old) { return old.replace('Tanatorios del directorio', 'Directorio') });
      $('#wpfBreadcrumbsDirectorio a').text(function (i, old) { return old.replace('Funeraria Directorio', 'Directorio') });
      $('#wpfBreadcrumbsDirectorio a').text(function (i, old) { return old.replace('Funerarias del directorio', 'Directorio') });
      $('#wpfBreadcrumbsDirectorio a').text(function (i, old) { return old.replace('Marca Directorio', 'Directorio') });
      $('#wpfBreadcrumbsDirectorio a').text(function (i, old) { return old.replace('Marcas del directorio', 'Directorio') });
      if( $('.breadcrumb_last').text() == 'Tanatorio Directorio' || $('.breadcrumb_last').text() == 'Funeraria Directorio' ){
        $('.breadcrumb_last').text(function (i, old) { return old.replace('Tanatorio Directorio', 'Directorio') });
        $('.breadcrumb_last').text(function (i, old) { return old.replace('Funeraria Directorio', 'Directorio') });
        $('.breadcrumb_last').css('font-weight', '700');
      }
      if( $('.breadcrumb_last').text() == 'Tanatorios del directorio' || $('.breadcrumb_last').text() == 'Funerarias del directorio' ){
        $('.breadcrumb_last').text(function (i, old) { return old.replace('Tanatorios del directorio', 'Directorio') });
        $('.breadcrumb_last').text(function (i, old) { return old.replace('Funerarias del directorio', 'Directorio') });
        $('.breadcrumb_last').css('font-weight', '700');
      }
    }
  });
});
