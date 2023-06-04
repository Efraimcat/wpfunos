$ = jQuery.noConflict();
$(document).ready(function(){
  $(function wpfMultistep(){
    // Multistep Form
    var checkExist = setInterval(function() {
      if ( typeof $('#wpf-resultados-referencia').attr('wpfmultistep') !== 'undefined'  ) {
        clearInterval(checkExist);
        var cuando = 'dummy';
        var destino = 'dummy';
        var velatorio = 'dummy';
        var ceremonia = 'dummy';
        var FuncName = 'wpfMultistep';
        console.log(FuncName+': Lanzar Multistep Form');

        $( document ).on('submit_success', function(e, data){
          if( typeof $('#wpf-resultados-referencia').attr('wpfurl') != 'undefined' ){
            return;
          }
          console.log(FuncName+': On Submit Success');

          $('#wpfunos-v3-enviar-datos').attr('disabled', 'disabled');

          var params = new URLSearchParams(location.search);
          var date = new Date();
          date.setTime(date.getTime() + (30*24*60*60*1000));
          expires = '; expires=' + date.toUTCString();

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

          elementorFrontend.documentsManager.documents[ '84639' ].showModal(); //Ventana Popup Esperando (loader2)
          $('#elementor-popup-modal-89354').hide(); //Servicios Multistep (5)
          elementorFrontend.documentsManager.documents[ '77005' ].showModal(); //Ventana Popup Esperando (entrada datos GTM)

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
              'hubspotutk' : getCookie('hubspotutk'),
              //Datos usuario funerarias
            },
            success: function(response) {
              console.log(response)	;
              if(response.type === 'success') {
                window.location.href = response.wpfurl;
              } else {
                if(response.type === 'unwanted') {
                  console.log(FuncName+': unwanted');
                  window.location.href = '/';
                }else{
                  console.log(FuncName+': fail');
                  window.location.href = '/';
                }
              }
            }
          }); // END AJAX
        }); //on('submit_success'

        setTimeout(function(){
          elementorFrontend.documentsManager.documents[ '89340' ].showModal(); //Servicios Multistep (1)
          wpfAlertCookies();
          $.each( [ '#wpfunos-multistep-ahora', '#wpfunos-multistep-ahora-icon', '#wpfunos-multistep-prox', '#wpfunos-multistep-prox-icon' ], function( i, elem ) {
            $(elem).click( function(){
              if( i  == 0 || i == 1 ){
                console.log(FuncName+': cuando: Ahora');
                cuando = 'Ahora';
              }else{
                console.log(FuncName+': cuando: Proximamente');
                cuando = 'Próximamente';
              }
              $('#elementor-popup-modal-89340').hide(); //Servicios Multistep (1)
              if( $('#wpf-resultados-referencia').attr('wpfland') === '1'){
                elementorFrontend.documentsManager.documents[ '89354' ].showModal(); //Servicios Multistep (5)
              }else{
                elementorFrontend.documentsManager.documents[ '89344' ].showModal(); //Servicios Multistep (2)
                wpfAlertCookies();
                $( '#wpfunos-multistep-entierro' ).click( wpfentierro );
                $( '#wpfunos-multistep-entierro-icon' ).click( wpfentierro );
                $( '#wpfunos-multistep-incineracion' ).click( wpfincineracion );
                $( '#wpfunos-multistep-incineracion-icon' ).click( wpfincineracion );
              }
            });
          });
        }, 1000); //timeout 1 sec.

        function wpfentierro(){     destino = '1'; console.log(FuncName+': destino: entierro'); wpfprocessDestino(); }
        function wpfincineracion(){ destino = '2'; console.log(FuncName+': destino: incineracion'); wpfprocessDestino(); }
        function wpfvelatorio(){    velatorio = '1'; console.log(FuncName+': velatorio: si'); wpfprocessVelatorio(); }
        function wpfsinvelatorio(){ velatorio = '2'; console.log(FuncName+': velatorio: no'); wpfprocessVelatorio();}
        function wpfsinceremonia(){ ceremonia = '1'; console.log(FuncName+': ceremonia: no'); wpfprocessCeremonia(); }
        function wpfsolosala(){     ceremonia = '2'; console.log(FuncName+': ceremonia: sala'); wpfprocessCeremonia(); }
        function wpfcivil(){        ceremonia = '3'; console.log(FuncName+': ceremonia: civil'); wpfprocessCeremonia(); }
        function wpfreligiosa(){    ceremonia = '4'; console.log(FuncName+': ceremonia: religiosa'); wpfprocessCeremonia(); }

        function wpfprocessDestino(){
          $('#elementor-popup-modal-89344').hide(); //Servicios Multistep (2)
          elementorFrontend.documentsManager.documents[ '89348' ].showModal(); //Servicios Multistep (3)
          wpfAlertCookies();
          $( '#wpfunos-multistep-velatorio' ).click( wpfvelatorio );
          $( '#wpfunos-multistep-velatorio-icon' ).click( wpfvelatorio );
          $( '#wpfunos-multistep-sinvelatorio' ).click( wpfsinvelatorio );
          $( '#wpfunos-multistep-sinvelatorio-icon' ).click( wpfsinvelatorio );
        }
        function wpfprocessVelatorio(){
          $('#elementor-popup-modal-89348').hide(); //Servicios Multistep (3)
          elementorFrontend.documentsManager.documents[ '89351' ].showModal(); //Servicios Multistep (4)
          wpfAlertCookies();
          $( '#wpfunos-multistep-sinceremonia' ).click( wpfsinceremonia );
          $( '#wpfunos-multistep-sinceremonia-icon' ).click( wpfsinceremonia );
          $( '#wpfunos-multistep-solosala' ).click( wpfsolosala );
          $( '#wpfunos-multistep-solosala-icon' ).click( wpfsolosala );
          $( '#wpfunos-multistep-civil' ).click( wpfcivil );
          $( '#wpfunos-multistep-civil-icon' ).click( wpfcivil );
          $( '#wpfunos-multistep-religiosa' ).click( wpfreligiosa );
          $( '#wpfunos-multistep-religiosa-icon' ).click( wpfreligiosa );
        }
        function wpfprocessCeremonia(){
          var params = new URLSearchParams(location.search);
          $('#elementor-popup-modal-89351').hide(); //Servicios Multistep (4)
          elementorFrontend.documentsManager.documents[ '89354' ].showModal(); //Servicios Multistep (5)
          wpfAlertCookies();
          $( '#form-field-cuando' ).val(cuando);
          if( destino == '1' ){ $( '#form-field-destino' ).val('Entierro'); }
          if( destino == '2' ){ $( '#form-field-destino' ).val('Incineración'); }
          if( params.get('cf[resp2]') == '1' ){ $( '#form-field-ataud' ).val('Ataúd medio'); }
          if( params.get('cf[resp2]') == '2' ){ $( '#form-field-ataud' ).val('Ataúd económico'); }
          if( params.get('cf[resp2]') == '3' ){ $( '#form-field-ataud' ).val('Ataúd premium'); }
          if( velatorio == '1' ){ $( '#form-field-velatorio' ).val('Velatorio'); }
          if( velatorio == '2' ){ $( '#form-field-velatorio' ).val('Sin velatorio'); }
          if( ceremonia == '1' ){ $( '#form-field-ceremonia' ).val('Sin ceremonia'); }
          if( ceremonia == '2' ){ $( '#form-field-ceremonia' ).val('Solo sala'); }
          if( ceremonia == '3' ){ $( '#form-field-ceremonia' ).val('Ceremonia civil'); }
          if( ceremonia == '4' ){ $( '#form-field-ceremonia' ).val('Ceremonia religiosa'); }
          $( '#form-field-IP' ).val($('#wpf-resultados-referencia').attr('wpfip'));
          $( '#form-field-donde' ).val($('#wpf-resultados-referencia').attr('wpfubic'));
          $( '#form-field-Referencia' ).val( $('#wpf-resultados-referencia').attr('wpfnewref') );
          //$( '#form-field-HubspotUTK' ).val(  getCookie('hubspotutk') );
          //var wpfana = getCookie('cookielawinfo-checkbox-analytics');HubspotUTK
        }

        function wpfAlertCookies(){
          var wpfana = getCookie('cookielawinfo-checkbox-analytics');
          if( wpfana != 'yes'){
            //alert('Para poder continuar dando el servicio adecuado,\nnecesitamos que antes de continuar acceptes las cookies.');
            $('#elementor-popup-modal-143773').hide()
            elementorFrontend.documentsManager.documents[ '143773' ].showModal();
            $( document ).on( 'click', '#wt-cli-accept-all-btn', function( event ) {
              elementorProFrontend.modules.popup.closePopup( {}, event );
            } );
          }
        }

      }// hasAttribute('wpfmultistep'
    }, 100); // check every 100ms
    // Multistep Form END
  }); // Function END
}); // Document ready END
