//  	/comparar-precios-resultados
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){

    if( $('#wpf-v3-colab-nom').length != 0  ){
      console.log('Plantilla Colaborador');

      $('#wpf-v3-colab-nom').html($('#wpf-resultados-referencia').attr('wpfcolabnombre'));
      $('#wpf-v3-colab-mail').html($('#wpf-resultados-referencia').attr('wpfcolabemail'));
      $('#wpf-v3-colab-tel').html($('#wpf-resultados-referencia').attr('wpfcolabtelefono'));

      $('#wpf-v3-usuario-nom').html($('#wpf-resultados-referencia').attr('wpfusuarionombre'));
      $('#wpf-v3-usuario-mail').html($('#wpf-resultados-referencia').attr('wpfusuarioemail'));
      $('#wpf-v3-usuario-tel').html($('#wpf-resultados-referencia').attr('wpfusuariotelefono'));

      $('#wpf-v3-actual-nom').html($('#wpf-resultados-referencia').attr('wpfnombre'));
      $('#wpf-v3-actual-mail').html($('#wpf-resultados-referencia').attr('wpfemail'));
      $('#wpf-v3-actual-tel').html($('#wpf-resultados-referencia').attr('wpftelefono'));


      $('#wpf-v3-colab-boton').click( function(){
        $('#wpf-v3-actual-nom').html($('#wpf-v3-colab-nom').html());
        $('#wpf-v3-actual-mail').html($('#wpf-v3-colab-mail').html());
        $('#wpf-v3-actual-tel').html($('#wpf-v3-colab-tel').html());
        $('#wpf-resultados-referencia').attr( { wpfnombre: $('#wpf-v3-actual-nom').html(), wpfemail: $('#wpf-v3-actual-mail').html(), wpftelefono: $('#wpf-v3-actual-tel').html() } );
      });

      $('#wpf-v3-usuario-boton').click( function(){
        $('#wpf-v3-actual-nom').html($('#wpf-v3-usuario-nom').html());
        $('#wpf-v3-actual-mail').html($('#wpf-v3-usuario-mail').html());
        $('#wpf-v3-actual-tel').html($('#wpf-v3-usuario-tel').html());
        $('#wpf-resultados-referencia').attr( { wpfnombre: $('#wpf-v3-actual-nom').html(), wpfemail: $('#wpf-v3-actual-mail').html(), wpftelefono: $('#wpf-v3-actual-tel').html() } );
      });

      $('#wpf-v3-usuario-edit-boton').click( function(){
        setTimeout(function(){
          console.log('Botón editar usuario');
          $('#form-field-Nombre').val($('#wpf-resultados-referencia').attr('wpfusuarionombre'));
          $('#form-field-Email').val($('#wpf-resultados-referencia').attr('wpfusuarioemail'));
          $('#form-field-Telefono').val($('#wpf-resultados-referencia').attr('wpfusuariotelefono'));
          $('#wpfunos-v3-boton-colaborador-datos').click( function(){
            console.log('Botón cambiar editar usuario');
            $('#wpf-resultados-referencia').attr( { wpfusuarionombre: $('#form-field-Nombre').val(), wpfusuarioemail: $('#form-field-Email').val(), wpfusuariotelefono: $('#form-field-Telefono').val() } );
            $('#wpf-v3-usuario-nom').html( $('#wpf-resultados-referencia').attr('wpfusuarionombre'));
            $('#wpf-v3-usuario-mail').html( $('#wpf-resultados-referencia').attr('wpfusuarioemail'));
            $('#wpf-v3-usuario-tel').html( $('#wpf-resultados-referencia').attr('wpfusuariotelefono'));
          });
        }, 200); //timeout 200ms

      });
      $('#wpf-v3-usuario-salvar-boton').click( function(){
        setTimeout(function(){
          console.log('Botón nuevos datos de usuario');
          $('#wpfunos-v3-boton-colaborador-guardar-datos').click( function(){
            if(  $('#form-field-aceptacion').prop('checked') ){
              console.log('Botón cambiar datos de usuario');
              $.ajax({
                type : 'post',
                dataType : 'json',
                url : WpfAjax.ajaxurl,
                data: {
                  'action': 'wpfunos_ajax_v3_cambiar_datos_usuario',
                  'wpnonce': $('#wpf-resultados-referencia').attr('wpfn'),
                  'nombre' : $('#wpf-resultados-referencia').attr('wpfnombre'),
                  'email' : $('#wpf-resultados-referencia').attr('wpfemail'),
                  'phone' : $('#wpf-resultados-referencia').attr('wpftelefono'),
                  'idusuario': $('#wpf-resultados-referencia').attr('wpfidusuario'),
                  'firma': $('#wpf-resultados-referencia').attr('wpfcolabemail'),
                },
                success: function(response) {
                  console.log('wpfunos_ajax_v3_cambiar_datos_usuario response:');
                  console.log(response)	;
                  if(response.type === 'success') {
                    console.log('success');
                  } else {
                    console.log('fail');
                  }
                }
              }); // END AJAX
            }
          }); // END CLICK
        }, 200); //timeout 200ms
      }); // END CLICK
    }// END if( $('#wpf-v3-colab-nom').length != 0  )
  });
});
