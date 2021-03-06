<script type="text/javascript" id="wpfunos-serviciosv2-colab">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    var checkExist = setInterval(function() {
      if (document.getElementById("wpf-resultados-cabecera-referencia").hasAttribute("wpfwpf") ) {
        console.log("wpfwpf available");
        clearInterval(checkExist);

        var wpfwpf = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfwpf");
        console.log('Colaboradores ' + wpfwpf);
        jQuery.ajax({
          type : "post",
          dataType : "json",
          url : WpfAjax.ajaxurl,
          data: {
            "action": "wpfunos_ajax_serviciosv2_colab",
            "wpfwpf": wpfwpf,
          },
          success: function(response) {
            console.log('wpfunos_ajax_serviciosv2_colab response:');
            console.log(response)	;
            if(response.type == "success") {

              let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
              if ( !isMobile ) {
                $('#wpf-colab').show();
              }

              var nombre = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre");
              var email  = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail");
              var phone  = document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono");

              document.getElementById("wpf-colab-nombre-colab").children[0].children[0].innerHTML = nombre;
              document.getElementById("wpf-colab-email-colab").children[0].children[0].innerHTML = email;
              document.getElementById("wpf-colab-phone-colab").children[0].children[0].innerHTML = phone;

              document.getElementById("wpf-colab-nombre-usuario").children[0].children[0].innerHTML = response.nombre;
              document.getElementById("wpf-colab-email-usuario").children[0].children[0].innerHTML = response.email;
              document.getElementById("wpf-colab-phone-usuario").children[0].children[0].innerHTML = response.phone;

              document.getElementById("wpf-colab-nombre-actual").children[0].children[0].innerHTML = nombre;
              document.getElementById("wpf-colab-email-actual").children[0].children[0].innerHTML = email;
              document.getElementById("wpf-colab-phone-actual").children[0].children[0].innerHTML = phone;

              document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfnombreactual", nombre);
              document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfemailactual", email);
              document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpftelefonoactual", phone );
              document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfnombreusuario", response.nombre);
              document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfemailusuario", response.email);
              document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpftelefonousuario", response.phone );

              document.cookie = "wpfnactual=" + nombre + ";expires=session; path=/;SameSite=Lax;secure";
              document.cookie = "wpfeactual=" + email + ";expires=session; path=/;SameSite=Lax;secure";
              document.cookie = "wpftactual=" + phone + ";expires=session; path=/;SameSite=Lax;secure";

            } else {
              console.log('fail');
            }
          }
        });

        document.getElementById("wpf-colab-colab").addEventListener('click', function(){
          console.log ('colaborador -> actual');
          document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfnombreactual", document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfnombre"));
          document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfemailactual", document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfemail"));
          document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpftelefonoactual", document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpftelefono"));

          document.getElementById("wpf-colab-nombre-actual").children[0].children[0].innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfnombreactual");
          document.getElementById("wpf-colab-email-actual").children[0].children[0].innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfemailactual");
          document.getElementById("wpf-colab-phone-actual").children[0].children[0].innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpftelefonoactual");

          var nombreactual = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfnombreactual");
          var emailactual = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfemailactual");
          var phoneactual = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpftelefonoactual");

          document.cookie = "wpfnactual=" + nombreactual + ";expires=session; path=/;SameSite=Lax;secure";
          document.cookie = "wpfeactual=" + emailactual + ";expires=session; path=/;SameSite=Lax;secure";
          document.cookie = "wpftactual=" + phoneactual + ";expires=session; path=/;SameSite=Lax;secure";

        }, false);

        document.getElementById("wpf-colab-usuario").addEventListener('click', function(){
          console.log ('usuario -> actual');
          document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfnombreactual", document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfnombreusuario"));
          document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpfemailactual", document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfemailusuario"));
          document.getElementById("wpf-resultados-cabecera-cuando").setAttribute("wpftelefonoactual", document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpftelefonousuario"));

          document.getElementById("wpf-colab-nombre-actual").children[0].children[0].innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfnombreactual");
          document.getElementById("wpf-colab-email-actual").children[0].children[0].innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfemailactual");
          document.getElementById("wpf-colab-phone-actual").children[0].children[0].innerHTML = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpftelefonoactual");

          var nombreactual = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfnombreactual");
          var emailactual = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfemailactual");
          var phoneactual = document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpftelefonoactual");

          document.cookie = "wpfnactual=" + nombreactual + ";expires=session; path=/;SameSite=Lax;secure";
          document.cookie = "wpfeactual=" + emailactual + ";expires=session; path=/;SameSite=Lax;secure";
          document.cookie = "wpftactual=" + phoneactual + ";expires=session; path=/;SameSite=Lax;secure";

        }, false);
      }
    }, 100); // check every 100ms

  });
});
</script>
