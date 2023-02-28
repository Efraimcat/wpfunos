$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    // Multistep Form
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

    var checkExist = setInterval(function() {
      if (document.getElementById('wpf-resultados-referencia').hasAttribute('wpfmultistep') ) {
        console.log('Lanzar Multistep Form');
        clearInterval(checkExist);

        $( document ).on('submit_success', function(e, data){
          console.log('On Submit Success');

          document.getElementById('wpfunos-v3-enviar-datos').setAttribute('disabled', 'disabled');

          var ip = document.getElementById('wpf-resultados-referencia').getAttribute('wpfip');
          var wpnonce = document.getElementById('wpf-resultados-referencia').getAttribute('wpfn');
          var wpfnewref = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnewref');
          var wpfcp = document.getElementById('wpf-resultados-referencia').getAttribute('wpfcp');
          var wpfubic = document.getElementById('wpf-resultados-referencia').getAttribute('wpfubic');
          var wpfdist = document.getElementById('wpf-resultados-referencia').getAttribute('wpfdist');
          var wpflat = document.getElementById('wpf-resultados-referencia').getAttribute('wpflat');
          var wpflng = document.getElementById('wpf-resultados-referencia').getAttribute('wpflng');
          var nombre = document.getElementById('form-field-Nombre').value;
          var email = document.getElementById('form-field-email').value;
          var telefono = document.getElementById('form-field-telefono').value;
          var acepta = document.getElementById('form-field-aceptacion').validity.valueMissing;  //(true = no ha validado  false = ha validado)

          var date = new Date();
          date.setTime(date.getTime() + (30*24*60*60*1000));
          expires = '; expires=' + date.toUTCString();
          document.cookie = 'wpfn=' + nombre + expires + '; path=/; SameSite=Lax; secure';
          document.cookie = 'wpfe=' + email + expires + '; path=/; SameSite=Lax; secure';
          document.cookie = 'wpft=' + telefono + expires + '; path=/; SameSite=Lax; secure';

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

          console.log('wpf-resultados-referencia NOMBRE: ' + nombre );
          console.log('Finalmente: Cuando ' +cuando+ ', Destino ' +destino+ ', Ataud ' +ataud+ ', Velatorio ' +velatorio+ ' , Ceremonia ' +ceremonia+ ', Nombre ' +nombre+ ' , Email ' +email+ ' , Teléfono ' +telefono);

          params.set('cuando', cuando);
          params.set('CP', wpfcp);

          var url = params.toString();

          elementorFrontend.documentsManager.documents[obj_id_11].showModal(); //Ventana Popup Esperando (loader2)
          $('#elementor-popup-modal-'+obj_id_10).hide(); //Servicios Multistep (5)
          elementorFrontend.documentsManager.documents[obj_id_12].showModal(); //Ventana Popup Esperando (entrada datos GTM)

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
        }); //on('submit_success'

        setTimeout(function(){
          elementorFrontend.documentsManager.documents[obj_id_06].showModal(); //Servicios Multistep (1)
          [ document.getElementById('wpfunos-multistep-ahora'), document.getElementById('wpfunos-multistep-ahora-icon')].forEach(function(element) {
            element.addEventListener('click', function() {
              cuando = 'Ahora';
              document.getElementById('elementor-popup-modal-'+ obj_id_06 ).style.display = 'none'; //Servicios Multistep (1)
              if( document.getElementById('wpf-resultados-referencia').getAttribute('wpfland') === '1'){
                elementorFrontend.documentsManager.documents[obj_id_10].showModal(); //Servicios Multistep (5)
              }else{
                elementorFrontend.documentsManager.documents[obj_id_07].showModal(); //Servicios Multistep (2)
                [ document.getElementById('wpfunos-multistep-entierro'),document.getElementById('wpfunos-multistep-entierro-icon')  ].forEach(function(element) {
                  element.addEventListener('click', wpfentierro, false);
                });
                [ document.getElementById('wpfunos-multistep-incineracion'),document.getElementById('wpfunos-multistep-incineracion-icon')].forEach(function(element) {
                  element.addEventListener('click', wpfincineracion, false);
                });
              }
            }, false);
          });
          [ document.getElementById('wpfunos-multistep-prox'),document.getElementById('wpfunos-multistep-prox-icon') ].forEach(function(element) {
            element.addEventListener('click', function() {
              cuando = 'Proximamente';
              document.getElementById('elementor-popup-modal-'+ obj_id_06 ).style.display = 'none'; //Servicios Multistep (1)
              if( document.getElementById('wpf-resultados-referencia').getAttribute('wpfland') === '1'){
                elementorFrontend.documentsManager.documents[obj_id_10].showModal(); //Servicios Multistep (5)
              }else{
                elementorFrontend.documentsManager.documents[obj_id_07].showModal(); //Servicios Multistep (2)
                [ document.getElementById('wpfunos-multistep-entierro'),document.getElementById('wpfunos-multistep-entierro-icon')  ].forEach(function(element) {
                  element.addEventListener('click', wpfentierro, false);
                });
                [ document.getElementById('wpfunos-multistep-incineracion'),document.getElementById('wpfunos-multistep-incineracion-icon'), ].forEach(function(element) {
                  element.addEventListener('click', wpfincineracion, false);
                });
              }
            }, false);
          });
          //
          //
          var wpfentierro = function() {
            destino = '1';
            document.getElementById('elementor-popup-modal-'+obj_id_07).style.display = 'none'; //Servicios Multistep (2)
            elementorFrontend.documentsManager.documents[obj_id_08].showModal(); //Servicios Multistep (3)
            [ document.getElementById('wpfunos-multistep-velatorio'),document.getElementById('wpfunos-multistep-velatorio-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfvelatorio, false);
            });
            [ document.getElementById('wpfunos-multistep-sinvelatorio'),document.getElementById('wpfunos-multistep-sinvelatorio-icon')  ].forEach(function(element) {
              element.addEventListener('click', wpfsinvelatorio, false);
            });
          };
          var wpfincineracion = function() {
            destino = '2';
            document.getElementById('elementor-popup-modal-'+obj_id_07).style.display = 'none'; //Servicios Multistep (2)
            elementorFrontend.documentsManager.documents[obj_id_08].showModal(); //Servicios Multistep (3)
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
            document.getElementById('elementor-popup-modal-'+obj_id_08).style.display = 'none'; //Servicios Multistep (3)
            elementorFrontend.documentsManager.documents[obj_id_09].showModal(); //Servicios Multistep (4)
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
            document.getElementById('elementor-popup-modal-'+obj_id_08).style.display = 'none'; //Servicios Multistep (3)
            elementorFrontend.documentsManager.documents[obj_id_09].showModal(); //Servicios Multistep (4)
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
            document.getElementById('elementor-popup-modal-'+obj_id_09).style.display = 'none'; //Servicios Multistep (4)
            elementorFrontend.documentsManager.documents[obj_id_10].showModal(); //Servicios Multistep (5)
          };
          var wpfsolosala = function() {
            ceremonia = '2';
            document.getElementById('elementor-popup-modal-'+obj_id_09).style.display = 'none'; //Servicios Multistep (4)
            elementorFrontend.documentsManager.documents[obj_id_10].showModal(); //Servicios Multistep (5)
          };
          var wpfcivil = function() {
            ceremonia = '3';
            document.getElementById('elementor-popup-modal-'+obj_id_09).style.display = 'none'; //Servicios Multistep (4)
            elementorFrontend.documentsManager.documents[obj_id_10].showModal(); //Servicios Multistep (5)
          };
          var wpfreligiosa = function() {
            ceremonia = '4';
            document.getElementById('elementor-popup-modal-'+obj_id_09).style.display = 'none'; //Servicios Multistep (4)
            elementorFrontend.documentsManager.documents[obj_id_10].showModal(); //Servicios Multistep (5)
          };
        }, 1000); //timeout 1 sec.
      } // hasAttribute('wpfmultistep')
    }, 100); // check every 100ms
    // Multistep Form END
  }); // Function END
}); // Document ready END
