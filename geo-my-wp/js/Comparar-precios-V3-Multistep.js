$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    // Multistep Form

    var checkExist = setInterval(function() {
      if (document.getElementById('wpf-resultados-referencia').hasAttribute('wpfmultistep') ) {
        console.log('Lanzar Multistep Form');
        clearInterval(checkExist);

        setTimeout(function(){

          var cuando = 'dummy';
          var destino = 'dummy';
          var velatorio = 'dummy';
          var ceremonia = 'dummy';
          var idioma_wpml =  getCookie('wp-wpml_current_language');
          var obj_id_06 = getCookie('wpf_obj_id_06');//89340 - Servicios Multistep (1)
          var obj_id_07 = getCookie('wpf_obj_id_07');//89344 - Servicios Multistep (2)
          var obj_id_08 = getCookie('wpf_obj_id_08');//89348 - Servicios Multistep (3)
          var obj_id_09 = getCookie('wpf_obj_id_09');//89351 - Servicios Multistep (4)
          var obj_id_10 = getCookie('wpf_obj_id_10');//89354 - Servicios Multistep (5)
          var obj_id_11 = getCookie('wpf_obj_id_11');//84639 - Ventana Popup Esperando (loader2)
          var obj_id_12 = getCookie('wpf_obj_id_12');//77005 - Ventana Popup Esperando (entrada datos GTM)

          console.log('Multistep Form IN ' + obj_id_06);

          //  WPML
          elementorFrontend.documentsManager.documents[obj_id_06].showModal(); //Servicios Multistep (1)
          //  WPML

          console.log('Multistep Form OK ' + obj_id_06);

          [ document.getElementById('wpfunos-multistep-ahora'), document.getElementById('wpfunos-multistep-ahora-icon')].forEach(function(element) {
            element.addEventListener('click', function() {
              cuando = 'Ahora';
              console.log('cuando: Ahora');

              if( document.getElementById('wpf-resultados-referencia').getAttribute('wpfland') === '1'){

                //  WPML
                document.getElementById('elementor-popup-modal-'+ obj_id_06 ).style.display = 'none'; //Servicios Multistep (1)
                elementorFrontend.documentsManager.documents[obj_id_10].showModal(); //Servicios Multistep (5)
                //  WPML

                document.getElementById('wpfunos-v3-enviar-datos').addEventListener('click', wpfdatosusuario, false);
              }else{

                //  WPML
                document.getElementById('elementor-popup-modal-'+ obj_id_06 ).style.display = 'none'; //Servicios Multistep (1)
                elementorFrontend.documentsManager.documents[obj_id_07].showModal(); //Servicios Multistep (2)
                //  WPML

                [ document.getElementById('wpfunos-multistep-entierro'),document.getElementById('wpfunos-multistep-entierro-icon')  ].forEach(function(element) {
                  element.addEventListener('click', wpfentierro, false);
                });
                [ document.getElementById('wpfunos-multistep-incineracion'),document.getElementById('wpfunos-multistep-incineracion-icon'), document.getElementById('wpfunos-multistep-nolose'), document.getElementById('wpfunos-multistep-nolose-icon')].forEach(function(element) {
                  element.addEventListener('click', wpfincineracion, false);
                });
              }
            }, false);
          });

          [ document.getElementById('wpfunos-multistep-prox'),document.getElementById('wpfunos-multistep-prox-icon') ].forEach(function(element) {
            element.addEventListener('click', function() {
              cuando = 'Proximamente';
              console.log('cuando: Proximamente');

              if( document.getElementById('wpf-resultados-referencia').getAttribute('wpfland') === '1'){

                //  WPML
                document.getElementById('elementor-popup-modal-'+ obj_id_06 ).style.display = 'none'; //Servicios Multistep (1)
                elementorFrontend.documentsManager.documents[obj_id_10].showModal(); //Servicios Multistep (5)
                //  WPML

                document.getElementById('wpfunos-v3-enviar-datos').addEventListener('click', wpfdatosusuario, false);
              }else{

                //  WPML
                document.getElementById('elementor-popup-modal-'+ obj_id_06 ).style.display = 'none'; //Servicios Multistep (1)
                elementorFrontend.documentsManager.documents[obj_id_07].showModal(); //Servicios Multistep (2)
                //  WPML

                [ document.getElementById('wpfunos-multistep-entierro'),document.getElementById('wpfunos-multistep-entierro-icon')  ].forEach(function(element) {
                  element.addEventListener('click', wpfentierro, false);
                });
                [ document.getElementById('wpfunos-multistep-incineracion'),document.getElementById('wpfunos-multistep-incineracion-icon'), document.getElementById('wpfunos-multistep-nolose'), document.getElementById('wpfunos-multistep-nolose-icon')].forEach(function(element) {
                  element.addEventListener('click', wpfincineracion, false);
                });
              }
            }, false);
          });

          [ document.getElementById('wpfunos-multistep-futuro'), document.getElementById('wpfunos-multistep-futuro-icon')].forEach(function(element) {
            element.addEventListener('click', function() {

              //  WPML
              elementorFrontend.documentsManager.documents[obj_id_11].showModal(); //Ventana Popup Esperando (loader2)
              //  WPML

              //  WPML
              window.location.href = document.getElementById('wpf-resultados-referencia').getAttribute('wpfhomeURL') + '/compara-precios-aseguradoras';
              //  WPML

            }, false);
          });

          //

          var wpfentierro = function() {
            destino = '1';
            console.log('destino: entierro');

            //  WPML
            document.getElementById('elementor-popup-modal-'+obj_id_07).style.display = 'none'; //Servicios Multistep (2)
            elementorFrontend.documentsManager.documents[obj_id_08].showModal(); //Servicios Multistep (3)
            //  WPML

            [ document.getElementById('wpfunos-multistep-velatorio'),document.getElementById('wpfunos-multistep-velatorio-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfvelatorio, false);
            });
            [ document.getElementById('wpfunos-multistep-sinvelatorio'),document.getElementById('wpfunos-multistep-sinvelatorio-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfsinvelatorio, false);
            });
          };

          var wpfincineracion = function() {
            destino = '2';
            console.log('destino: incineracion');

            //  WPML
            document.getElementById('elementor-popup-modal-'+obj_id_07).style.display = 'none'; //Servicios Multistep (2)
            elementorFrontend.documentsManager.documents[obj_id_08].showModal(); //Servicios Multistep (3)
            //  WPML

            [ document.getElementById('wpfunos-multistep-velatorio'),document.getElementById('wpfunos-multistep-velatorio-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfvelatorio, false);
            });
            [ document.getElementById('wpfunos-multistep-sinvelatorio'),document.getElementById('wpfunos-multistep-sinvelatorio-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfsinvelatorio, false);
            });
          };
          //
          //
          var wpfvelatorio = function() {
            velatorio = '1';
            console.log('velatorio: si');

            //  WPML
            document.getElementById('elementor-popup-modal-'+obj_id_08).style.display = 'none'; //Servicios Multistep (3)
            elementorFrontend.documentsManager.documents[obj_id_09].showModal(); //Servicios Multistep (4)
            //  WPML

            [ document.getElementById('wpfunos-multistep-sinceremonia'),document.getElementById('wpfunos-multistep-sinceremonia-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfsinceremonia, false);
            });
            [ document.getElementById('wpfunos-multistep-solosala'),document.getElementById('wpfunos-multistep-solosala-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfsolosala, false);
            });
            [ document.getElementById('wpfunos-multistep-civil'),document.getElementById('wpfunos-multistep-civil-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfcivil, false);
            });
            [ document.getElementById('wpfunos-multistep-religiosa'),document.getElementById('wpfunos-multistep-religiosa-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfreligiosa, false);
            });

          };

          var wpfsinvelatorio = function() {
            velatorio = '2';
            console.log('velatorio: no');

            //  WPML
            document.getElementById('elementor-popup-modal-'+obj_id_08).style.display = 'none'; //Servicios Multistep (3)
            elementorFrontend.documentsManager.documents[obj_id_09].showModal(); //Servicios Multistep (4)
            //  WPML

            [ document.getElementById('wpfunos-multistep-sinceremonia'),document.getElementById('wpfunos-multistep-sinceremonia-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfsinceremonia, false);
            });
            [ document.getElementById('wpfunos-multistep-solosala'),document.getElementById('wpfunos-multistep-solosala-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfsolosala, false);
            });
            [ document.getElementById('wpfunos-multistep-civil'),document.getElementById('wpfunos-multistep-civil-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfcivil, false);
            });
            [ document.getElementById('wpfunos-multistep-religiosa'),document.getElementById('wpfunos-multistep-religiosa-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfreligiosa, false);
            });

          };
          //
          var wpfsinceremonia = function() {
            ceremonia = '1';
            console.log('ceremonia: no');

            //  WPML
            document.getElementById('elementor-popup-modal-'+obj_id_09).style.display = 'none'; //Servicios Multistep (4)
            elementorFrontend.documentsManager.documents[obj_id_10].showModal(); //Servicios Multistep (5)
            //  WPML

            document.getElementById('wpfunos-v3-enviar-datos').addEventListener('click', wpfdatosusuario, false);

          };

          var wpfsolosala = function() {
            ceremonia = '2';
            console.log('ceremonia: sala');

            //  WPML
            document.getElementById('elementor-popup-modal-'+obj_id_09).style.display = 'none'; //Servicios Multistep (4)
            elementorFrontend.documentsManager.documents[obj_id_10].showModal(); //Servicios Multistep (5)
            //  WPML

            document.getElementById('wpfunos-v3-enviar-datos').addEventListener('click', wpfdatosusuario, false);
          };

          var wpfcivil = function() {
            ceremonia = '3';
            console.log('ceremonia: civil');

            //  WPML
            document.getElementById('elementor-popup-modal-'+obj_id_09).style.display = 'none'; //Servicios Multistep (4)
            elementorFrontend.documentsManager.documents[obj_id_10].showModal(); //Servicios Multistep (5)
            //  WPML

            document.getElementById('wpfunos-v3-enviar-datos').addEventListener('click', wpfdatosusuario, false);
          };

          var wpfreligiosa = function() {
            ceremonia = '4';
            console.log('ceremonia: religiosa');

            //  WPML
            document.getElementById('elementor-popup-modal-'+obj_id_09).style.display = 'none'; //Servicios Multistep (4)
            elementorFrontend.documentsManager.documents[obj_id_10].showModal(); //Servicios Multistep (5)
            //  WPML

            document.getElementById('wpfunos-v3-enviar-datos').addEventListener('click', wpfdatosusuario, false);
          };

          //
          //
          var wpfdatosusuario = function() {
            console.log('click botón enviar datos');
            var nombre = document.getElementById('form-field-Nombre').value;
            var email = document.getElementById('form-field-Email').value;
            var telefono = document.getElementById('form-field-Telefono').value;
            var acepta = document.getElementById('form-field-aceptacion').validity.valueMissing;  //(true = no ha validado  false = ha validado)
            if( nombre !== '' && email !== '' && telefono !== '' && !acepta ){

              console.log('datos correctos. creando entrada.');

              var date = new Date();
              date.setTime(date.getTime() + (30*24*60*60*1000));
              expires = '; expires=' + date.toUTCString();
              document.cookie = 'wpfn=' + nombre + expires + '; path=/; SameSite=Lax; secure';
              document.cookie = 'wpfe=' + email + expires + '; path=/; SameSite=Lax; secure';
              document.cookie = 'wpft=' + telefono + expires + '; path=/; SameSite=Lax; secure';

              var ip = document.getElementById('wpf-resultados-referencia').getAttribute('wpfip');
              var wpnonce = document.getElementById('wpf-resultados-referencia').getAttribute('wpfn');
              var wpfnewref = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnewref');
              var wpfcp = document.getElementById('wpf-resultados-referencia').getAttribute('wpfcp');
              var wpfubic = document.getElementById('wpf-resultados-referencia').getAttribute('wpfubic');
              var wpfdist = document.getElementById('wpf-resultados-referencia').getAttribute('wpfdist');
              var wpflat = document.getElementById('wpf-resultados-referencia').getAttribute('wpflat');
              var wpflng = document.getElementById('wpf-resultados-referencia').getAttribute('wpflng');
              document.getElementById('wpf-resultados-referencia').setAttribute('wpfnombre',nombre);

              var params = new URLSearchParams(location.search);

              if( document.getElementById('wpf-resultados-referencia').getAttribute('wpfland') === '1'){
                destino = params.get('cf[resp1]');
                ataud = params.get('cf[resp2]');
                velatorio = params.get('cf[resp3]');
                ceremonia = params.get('cf[resp4]');
              }else{
                ataud = '2';
              }

              params.set('cf[resp1]', destino);
              params.set('cf[resp2]', ataud);
              params.set('cf[resp3]', velatorio);
              params.set('cf[resp4]', ceremonia);

              console.log('wpf-resultados-referencia NOMBRE: ' +document.getElementById('wpf-resultados-referencia').getAttribute('wpfnombre') );
              console.log('Finalmente: Cuando ' +cuando+ ', Destino ' +destino+ ', Ataud ' +ataud+ ', Velatorio ' +velatorio+ ' , Ceremonia ' +ceremonia+ ', Nombre ' +nombre+ ' , Email ' +email+ ' , Teléfono ' +telefono);

              params.set('cuando', cuando);
              params.set('CP', wpfcp);

              var url = params.toString();

              //  WPML
              elementorFrontend.documentsManager.documents[obj_id_11].showModal(); //Ventana Popup Esperando (loader2)
              $('#elementor-popup-modal-'+obj_id_10).hide(); //Servicios Multistep (5)
              elementorFrontend.documentsManager.documents[obj_id_12].showModal(); //Ventana Popup Esperando (entrada datos GTM)
              //  WPML

              jQuery.ajax({
                type : 'post',
                dataType : 'json',
                url : WpfAjax.ajaxurl,
                data: {
                  'action': 'wpfunos_ajax_v3_multiform',
                  'wpfnombre': nombre,
                  'wpfemail': email,
                  'wpftelefono': telefono,
                  'wpfurl' : url,
                  'wpnonce' : wpnonce,
                  'wpfip' : ip,
                  'wpfnewref' : wpfnewref,
                  'wpfcuando' : cuando,
                  'wpfdestino' : destino,
                  'wpfataud' : ataud,
                  'wpfvelatorio' : velatorio,
                  'wpfceremonia' : ceremonia,
                  'wpfcp' : wpfcp,
                  'wpfubic' : wpfubic,
                  'wpfdist' : wpfdist,
                  'wpflat' : wpflat,
                  'wpflng' : wpflng,
                  'wpfland' : document.getElementById('wpf-resultados-referencia').getAttribute('wpfland'),
                },
                success: function(response) {
                  console.log(response)	;
                  if(response.type === 'success') {
                    console.log('success');
                    window.location.href = response.wpfurl;
                  } else {
                    if(response.type === 'unwanted') {
                      console.log('unwanted');
                      window.location.href = '/';
                    }else{
                      console.log('fail');
                      window.location.href = '/';
                    }
                  }
                }
              });
            }
          };
        }, 1000); //timeout 1 sec.
      }
    }, 100); // check every 100ms
    // Multistep Form END


  }); // Function END
}); // Document ready END
