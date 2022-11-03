$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){

    if( document.getElementById('wpf-v3-colab-nom')){
      console.log('Plantilla Colaborador');

      document.getElementById('wpf-v3-colab-nom').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfcolabnombre');
      document.getElementById('wpf-v3-colab-mail').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfcolabemail');
      document.getElementById('wpf-v3-colab-tel').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfcolabtelefono');

      document.getElementById('wpf-v3-usuario-nom').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfusuarionombre');
      document.getElementById('wpf-v3-usuario-mail').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfusuarioemail');
      document.getElementById('wpf-v3-usuario-tel').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfusuariotelefono');

      document.getElementById('wpf-v3-actual-nom').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnombre');
      document.getElementById('wpf-v3-actual-mail').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfemail');
      document.getElementById('wpf-v3-actual-tel').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpftelefono');

      document.getElementById('wpf-v3-colab-boton').addEventListener('click', function(){
        document.getElementById('wpf-v3-actual-nom').innerHTML = document.getElementById('wpf-v3-colab-nom').innerHTML;
        document.getElementById('wpf-v3-actual-mail').innerHTML = document.getElementById('wpf-v3-colab-mail').innerHTML;
        document.getElementById('wpf-v3-actual-tel').innerHTML = document.getElementById('wpf-v3-colab-tel').innerHTML;
        document.getElementById('wpf-resultados-referencia').setAttribute('wpfnombre', document.getElementById('wpf-v3-actual-nom').innerHTML);
        document.getElementById('wpf-resultados-referencia').setAttribute('wpfemail', document.getElementById('wpf-v3-actual-mail').innerHTML);
        document.getElementById('wpf-resultados-referencia').setAttribute('wpftelefono', document.getElementById('wpf-v3-actual-tel').innerHTML);
      } , false);

      document.getElementById('wpf-v3-usuario-boton').addEventListener('click', function(){
        document.getElementById('wpf-v3-actual-nom').innerHTML = document.getElementById('wpf-v3-usuario-nom').innerHTML;
        document.getElementById('wpf-v3-actual-mail').innerHTML = document.getElementById('wpf-v3-usuario-mail').innerHTML;
        document.getElementById('wpf-v3-actual-tel').innerHTML = document.getElementById('wpf-v3-usuario-tel').innerHTML;
        document.getElementById('wpf-resultados-referencia').setAttribute('wpfnombre', document.getElementById('wpf-v3-actual-nom').innerHTML);
        document.getElementById('wpf-resultados-referencia').setAttribute('wpfemail', document.getElementById('wpf-v3-actual-mail').innerHTML);
        document.getElementById('wpf-resultados-referencia').setAttribute('wpftelefono', document.getElementById('wpf-v3-actual-tel').innerHTML);
      } , false);

      document.getElementById('wpf-v3-usuario-edit-boton').addEventListener('click', function(){
        setTimeout(function(){
          console.log('Botón editar usuario');
          document.getElementById('form-field-Nombre').value = document.getElementById('wpf-resultados-referencia').getAttribute('wpfusuarionombre');
          document.getElementById('form-field-Email').value = document.getElementById('wpf-resultados-referencia').getAttribute('wpfusuarioemail');
          document.getElementById('form-field-Telefono').value = document.getElementById('wpf-resultados-referencia').getAttribute('wpfusuariotelefono');

          document.getElementById('wpfunos-v3-boton-colaborador-datos').addEventListener('click', function(){
            console.log('Botón cambiar editar usuario');

            document.getElementById('wpf-resultados-referencia').setAttribute('wpfusuarionombre', document.getElementById('form-field-Nombre').value);
            document.getElementById('wpf-v3-usuario-nom').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfusuarionombre');

            document.getElementById('wpf-resultados-referencia').setAttribute('wpfusuarioemail', document.getElementById('form-field-Email').value);
            document.getElementById('wpf-v3-usuario-mail').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfusuarioemail');

            document.getElementById('wpf-resultados-referencia').setAttribute('wpfusuariotelefono', document.getElementById('form-field-Telefono').value);
            document.getElementById('wpf-v3-usuario-tel').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfusuariotelefono');
          } , false);

        }, 200); //timeout 200ms

      } , false);

      document.getElementById('wpf-v3-usuario-salvar-boton').addEventListener('click', function(){
        setTimeout(function(){
          console.log('Botón nuevos datos de usuario');
          document.getElementById('wpfunos-v3-boton-colaborador-guardar-datos').addEventListener('click', function(){
            var acepta = document.getElementById('form-field-aceptacion').validity.valueMissing;  //(true = no ha validado  false = ha validado)
            if( !acepta ){

              console.log('Botón cambiar datos de usuario');

              var nombre = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnombre');
              var email = document.getElementById('wpf-resultados-referencia').getAttribute('wpfemail');
              var phone = document.getElementById('wpf-resultados-referencia').getAttribute('wpftelefono');
              var idusuario = document.getElementById('wpf-resultados-referencia').getAttribute('wpfidusuario');
              var wpnonce = document.getElementById('wpf-resultados-referencia').getAttribute('wpfn');
              var firma = document.getElementById('wpf-resultados-referencia').getAttribute('wpfcolabemail');

              console.log( 'nombre: ' +nombre+ ' email: ' +email+ ' phone: ' +phone+ ' idusuario: ' +idusuario );

              jQuery.ajax({
                type : 'post',
                dataType : 'json',
                url : WpfAjax.ajaxurl,
                data: {
                  'action': 'wpfunos_ajax_v3_cambiar_datos_usuario',
                  'wpnonce': wpnonce,
                  'nombre' : nombre,
                  'email' : email,
                  'phone' : phone,
                  'idusuario': idusuario,
                  'firma': firma,
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
              });

            }

          } , false);

        }, 200); //timeout 200ms
      } , false);

    }

  });
});
