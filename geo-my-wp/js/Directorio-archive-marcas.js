// /marcas
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    console.log('Archive Marcas');
    $('#wpfunos-marcas-mensaje').css('display', 'block');
    Array.from(document.getElementsByClassName('elementor-141304')).forEach(
      function(element, index, array) {
        var texto = element.attributes.class.textContent
        if ( texto.includes('directorio_entrada') || texto.includes('directorio_funeraria') ){
          document.getElementsByClassName('elementor-141304')[index].style.display = 'none'
        }
      }
    );
  });
});



//wpfunos-marcas-mensaje

//var texto = element.attributes.class.textContent;
//console.log('string ' + texto.includes('directorio_entrada'));
//console.log('Texto: ' + element.attributes.class.textContent );






//element.style.display = 'block';
//document.getElementsByClassName('elementor-141304')[1].style.display = 'none'

// Marcas: [object HTMLDivElement],[object HTMLDivElement]
// Marcas: [object HTMLDivElement]

//  document.getElementsByClassName('elementor-141304')[0].attributes.class.textContent
//  elementor elementor-141304 e-loop-item e-loop-item-142469 post-142469 directorio_marcas type-directorio_marcas status-publish has-post-thumbnail hentry directorio_marca-marcas wpautop ast-col-sm-12 ast-article-post ast-col-md-4

// Texto: elementor elementor-141304 e-loop-item e-loop-item-142469 post-142469 directorio_marcas type-directorio_marcas status-publish has-post-thumbnail hentry directorio_marca-marcas wpautop ast-col-sm-12 ast-article-post ast-col-md-4
// Texto: elementor elementor-141304 e-loop-item e-loop-item-142234 post-142234 directorio_entrada type-directorio_entrada status-publish has-post-thumbnail hentry directorio_poblacion-barcelona-ciudad directorio_marca-memora-barcelona-ciudad wpautop ast-col-sm-12 ast-article-post ast-col-md-4
