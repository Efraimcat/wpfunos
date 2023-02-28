$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    // Multistep Form
    var checkExist = setInterval(function() {
      if ( typeof $('#wpf-resultados-referencia').attr('wpfmultistep') !== 'undefined'  ) {
        console.log('Lanzar Multistep Form');
        clearInterval(checkExist);
        var cuando = 'dummy';
        var destino = 'dummy';
        var velatorio = 'dummy';
        var ceremonia = 'dummy';

        $( document ).on('submit_success', function(e, data){
          console.log('On Submit Success');

          $('#wpfunos-v3-enviar-datos').attr('disabled', 'disabled');

          var params = new URLSearchParams(location.search);
          var date = new Date();
          date.setTime(date.getTime() + (30*24*60*60*1000));
          expires = '; expires=' + date.toUTCString();
          document.cookie = 'wpfn=' + $('#form-field-Nombre').val() + expires + '; path=/; SameSite=Lax; secure';
          document.cookie = 'wpfe=' + $('#form-field-email').val() + expires + '; path=/; SameSite=Lax; secure';
          document.cookie = 'wpft=' + $('#form-field-telefono').val() + expires + '; path=/; SameSite=Lax; secure';

          $('#wpf-resultados-referencia').attr('wpfnombre', $('#form-field-Nombre').val() );

          if( $('#wpf-resultados-referencia').attr('wpfland') === '1'){
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
          params.set('cuando', cuando);
          params.set('CP', $('#wpf-resultados-referencia').attr('wpfcp') );

          elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_11') ].showModal(); //Ventana Popup Esperando (loader2)
          $('#elementor-popup-modal-'+getCookie('wpf_obj_id_10')).hide(); //Servicios Multistep (5)
          elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_12') ].showModal(); //Ventana Popup Esperando (entrada datos GTM)

          $.ajax({
            type : 'post',
            dataType : 'json',
            url : WpfAjax.ajaxurl,
            data: {
              'action': 'wpfunos_ajax_v3_multiform',
              'wpfnombre':  $('#form-field-Nombre').val(),
              'wpfemail': $('#form-field-email').val(),
              'wpftelefono': $('#form-field-telefono').val(),
              'wpfurl' : params.toString(),
              'wpnonce' : $('#wpf-resultados-referencia').attr('wpfn'),
              'wpfip' : $('#wpf-resultados-referencia').attr('wpfip'),
              'wpfnewref' : $('#wpf-resultados-referencia').attr('wpfnewref'),
              'wpfcuando' : cuando,
              'wpfdestino' : destino,
              'wpfataud' : ataud,
              'wpfvelatorio' : velatorio,
              'wpfceremonia' : ceremonia,
              'wpfcp' : $('#wpf-resultados-referencia').attr('wpfcp'),
              'wpfubic' : $('#wpf-resultados-referencia').attr('wpfubic'),
              'wpfdist' : $('#wpf-resultados-referencia').attr('wpfdist'),
              'wpflat' : $('#wpf-resultados-referencia').attr('wpflat'),
              'wpflng' : $('#wpf-resultados-referencia').attr('wpflng'),
              'wpfland' : $('#wpf-resultados-referencia').attr('wpfland'),
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
          }); // END AJAX
        }); //on('submit_success'

        setTimeout(function(){
          elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_06') ].showModal(); //Servicios Multistep (1)
          $.each( [ '#wpfunos-multistep-ahora', '#wpfunos-multistep-ahora-icon', '#wpfunos-multistep-prox', '#wpfunos-multistep-prox-icon' ], function( i, elem ) {
            $(elem).click( function(){
              if( i  == 0 || i == 1 ){
                console.log('cuando: Ahora');
                cuando = 'Ahora';
              }else{
                console.log('cuando: Proximamente');
                cuando = 'Proximamente';
              }
              $('#elementor-popup-modal-' + getCookie('wpf_obj_id_06') ).hide(); //Servicios Multistep (1)
              if( $('#wpf-resultados-referencia').attr('wpfland') === '1'){
                elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_10') ].showModal(); //Servicios Multistep (5)
              }else{
                elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_07') ].showModal(); //Servicios Multistep (2)
                $( '#wpfunos-multistep-entierro' ).click( wpfentierro );
                $( '#wpfunos-multistep-entierro-icon' ).click( wpfentierro );
                $( '#wpfunos-multistep-incineracion' ).click( wpfincineracion );
                $( '#wpfunos-multistep-incineracion-icon' ).click( wpfincineracion );
              }
            });
          });
        }, 1000); //timeout 1 sec.

        function wpfentierro(){
          destino = '1';
          console.log('destino: entierro');
          $('#elementor-popup-modal-' + getCookie('wpf_obj_id_07') ).hide(); //Servicios Multistep (2)
          elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_08') ].showModal(); //Servicios Multistep (3)
          $( '#wpfunos-multistep-velatorio' ).click( wpfvelatorio );
          $( '#wpfunos-multistep-velatorio-icon' ).click( wpfvelatorio );
          $( '#wpfunos-multistep-sinvelatorio' ).click( wpfsinvelatorio );
          $( '#wpfunos-multistep-sinvelatorio-icon' ).click( wpfsinvelatorio );
        }

        function wpfincineracion(){
          destino = '2';
          console.log('destino: incineracion');
          $('#elementor-popup-modal-' + getCookie('wpf_obj_id_07') ).hide(); //Servicios Multistep (2)
          elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_08') ].showModal(); //Servicios Multistep (3)
          $( '#wpfunos-multistep-velatorio' ).click( wpfvelatorio );
          $( '#wpfunos-multistep-velatorio-icon' ).click( wpfvelatorio );
          $( '#wpfunos-multistep-sinvelatorio' ).click( wpfsinvelatorio );
          $( '#wpfunos-multistep-sinvelatorio-icon' ).click( wpfsinvelatorio );
        }

        function wpfvelatorio(){
          velatorio = '1';
          console.log('velatorio: si');
          $('#elementor-popup-modal-' + getCookie('wpf_obj_id_08') ).hide(); //Servicios Multistep (3)
          elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_09') ].showModal(); //Servicios Multistep (4)
          $( '#wpfunos-multistep-sinceremonia' ).click( wpfsinceremonia );
          $( '#wpfunos-multistep-sinceremonia-icon' ).click( wpfsinceremonia );
          $( '#wpfunos-multistep-solosala' ).click( wpfsolosala );
          $( '#wpfunos-multistep-solosala-icon' ).click( wpfsolosala );
          $( '#wpfunos-multistep-civil' ).click( wpfcivil );
          $( '#wpfunos-multistep-civil-icon' ).click( wpfcivil );
          $( '#wpfunos-multistep-religiosa' ).click( wpfreligiosa );
          $( '#wpfunos-multistep-religiosa-icon' ).click( wpfreligiosa );
        }

        function wpfsinvelatorio(){
          velatorio = '2';
          console.log('velatorio: no');
          $('#elementor-popup-modal-' + getCookie('wpf_obj_id_08') ).hide(); //Servicios Multistep (3)
          elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_09') ].showModal(); //Servicios Multistep (4)
          $( '#wpfunos-multistep-sinceremonia' ).click( wpfsinceremonia );
          $( '#wpfunos-multistep-sinceremonia-icon' ).click( wpfsinceremonia );
          $( '#wpfunos-multistep-solosala' ).click( wpfsolosala );
          $( '#wpfunos-multistep-solosala-icon' ).click( wpfsolosala );
          $( '#wpfunos-multistep-civil' ).click( wpfcivil );
          $( '#wpfunos-multistep-civil-icon' ).click( wpfcivil );
          $( '#wpfunos-multistep-religiosa' ).click( wpfreligiosa );
          $( '#wpfunos-multistep-religiosa-icon' ).click( wpfreligiosa );
        }

        function wpfsinceremonia(){
          ceremonia = '1';
          console.log('ceremonia: no');
          $('#elementor-popup-modal-' + getCookie('wpf_obj_id_09') ).hide(); //Servicios Multistep (4)
          elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_10') ].showModal(); //Servicios Multistep (5)
        }

        function wpfsolosala(){
          ceremonia = '2';
          console.log('ceremonia: sala');
          $('#elementor-popup-modal-' + getCookie('wpf_obj_id_09') ).hide(); //Servicios Multistep (4)
          elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_10') ].showModal(); //Servicios Multistep (5)
        }

        function wpfcivil(){
          ceremonia = '3';
          console.log('ceremonia: civil');
          $('#elementor-popup-modal-' + getCookie('wpf_obj_id_09') ).hide(); //Servicios Multistep (4)
          elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_10') ].showModal(); //Servicios Multistep (5)
        }

        function wpfreligiosa(){
          ceremonia = '4';
          console.log('ceremonia: religiosa');
          $('#elementor-popup-modal-' + getCookie('wpf_obj_id_09') ).hide(); //Servicios Multistep (4)
          elementorFrontend.documentsManager.documents[ getCookie('wpf_obj_id_10') ].showModal(); //Servicios Multistep (5)
        }

      }// hasAttribute('wpfmultistep'
    }, 100); // check every 100ms
    // Multistep Form END
  }); // Function END
}); // Document ready END
