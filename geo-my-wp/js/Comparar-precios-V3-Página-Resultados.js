$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){

    window.history.pushState(null, null, window.location.href);
    window.onpopstate = function () {
      window.history.go(1);
    };

    setTimeout(function() {
      $('.elementor-tab-title').removeClass('elementor-active');
      $('.elementor-tab-content').css('display', 'none');
    }, 1000 );

    var params = new URLSearchParams(location.search);

    var elementsLlamamos = document.getElementsByClassName('wpf-v3-boton-llamamos');
    var elementsLlamar = document.getElementsByClassName('wpf-v3-boton-llamar');
    var elementsPresupuesto = document.getElementsByClassName('wpf-v3-boton-presupuesto');
    var elementsDetalles = document.getElementsByClassName('wpf-v3-boton-detalles');
    var elementsFinanciacion = document.getElementsByClassName('wpf-v3-boton-financiacion');

    var elementsFinanciacionNo = document.getElementsByClassName('wpf-financiacion-no');

    //

    [document.getElementById('wpfunos-v3-distancia-boton'), document.getElementById('wpfunos-v3-distancia-texto'), document.getElementById('wpfunos-v3-distancia-boton-movil'), document.getElementById('wpfunos-v3-distancia-texto-movil') ].forEach(function(element) {
      element.addEventListener('click', wpfdistancia, false);
    });

    //

    document.getElementById('wpfunos-v3-donde-boton').addEventListener('click', function(){
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.href = '/comparar-precios-nueva';
    } , false);

    document.getElementById('wpfunos-v3-donde-texto').addEventListener('click', function(){
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.href = '/comparar-precios-nueva';
    } , false);

    document.getElementById('wpfunos-v3-donde-texto').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfubic');

    document.getElementById('wpfunos-v3-donde-boton-movil').addEventListener('click', function(){
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.href = '/comparar-precios-nueva';
    } , false);

    document.getElementById('wpfunos-v3-donde-texto-movil').addEventListener('click', function(){
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.href = '/comparar-precios-nueva';
    } , false);

    document.getElementById('wpfunos-v3-donde-texto-movil').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfubic');

    //

    document.getElementById('wpfunos-v3-cuando-boton').addEventListener('click', function(){
      if( params.get('cuando') === 'Ahora'){
        params.set('cuando', 'Próximamente');
      }else{
        params.set('cuando', 'Ahora');
      }
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.search = params.toString();
    } , false);

    document.getElementById('wpfunos-v3-cuando-texto').addEventListener('click', function(){
      if( params.get('cuando') === 'Ahora'){
        params.set('cuando', 'Próximamente');
      }else{
        params.set('cuando', 'Ahora');
      }
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.search = params.toString();
    } , false);

    document.getElementById('wpfunos-v3-cuando-boton-movil').addEventListener('click', function(){
      if( params.get('cuando') === 'Ahora'){
        params.set('cuando', 'Próximamente');
      }else{
        params.set('cuando', 'Ahora');
      }
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.search = params.toString();
    } , false);

    document.getElementById('wpfunos-v3-cuando-texto-movil').addEventListener('click', function(){
      if( params.get('cuando') === 'Ahora'){
        params.set('cuando', 'Próximamente');
      }else{
        params.set('cuando', 'Ahora');
      }
      elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
      window.location.search = params.toString();
    } , false);

    //

    var orden = params.get('orden');

    if( params.get('orden') === 'precios'){
      document.getElementById('wpfunos-titulo-orden').innerHTML = 'Resultados ordenados por precio.';
      document.getElementById('wpfunos-boton-precio').innerHTML = 'Distancia';
    }else{
      document.getElementById('wpfunos-titulo-orden').innerHTML = 'Resultados ordenados por distancia.';
      document.getElementById('wpfunos-boton-precio').innerHTML = 'Precio';
    }

    document.getElementById('wpfunos-boton-precio').addEventListener('click', function(){
      console.log('click cambiar orden');
      elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup
      if( orden === 'dist' ){
        params.set('orden', 'precios' );
        window.location.search = params.toString();
      }else{
        params.set('orden', 'dist' );
        window.location.search = params.toString();
      }
    }, false);

    if( params.get('orden') === 'precios'){
      document.getElementById('wpfunos-titulo-orden-movil').innerHTML = 'Resultados ordenados por precio.';
      document.getElementById('wpfunos-boton-precio-movil').innerHTML = 'Distancia';
    }else{
      document.getElementById('wpfunos-titulo-orden-movil').innerHTML = 'Resultados ordenados por distancia.';
      document.getElementById('wpfunos-boton-precio-movil').innerHTML = 'Precio';
    }

    document.getElementById('wpfunos-boton-precio-movil').addEventListener('click', function(){
      console.log('click cambiar orden');
      elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup
      if( orden === 'dist' ){
        params.set('orden', 'precios' );
        window.location.search = params.toString();
      }else{
        params.set('orden', 'dist' );
        window.location.search = params.toString();
      }
    }, false);

    //

    if( params.get('cf[resp1]') === '1' ){
      document.getElementById('wpfunos-boton-destino-entierro').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-entierro').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-entierro').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-destino-entierro-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-entierro-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-entierro-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp1]') === '2' ){
      document.getElementById('wpfunos-boton-destino-incineracion').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-incineracion').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-incineracion').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-destino-incineracion-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-incineracion-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-incineracion-movil').style.borderStyle='none' ;
    }

    if( params.get('cf[resp2]') === '1' ){
      document.getElementById('wpfunos-boton-ataud-normal').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ataud-normal').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ataud-normal').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-ataud-normal-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ataud-normal-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ataud-normal-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp2]') === '2' ){
      document.getElementById('wpfunos-boton-destino-economico').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-economico').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-economico').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-destino-economico-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-economico-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-economico-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp2]') === '3' ){
      document.getElementById('wpfunos-boton-destino-premium').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-premium').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-premium').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-destino-premium-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-destino-premium-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-destino-premium-movil').style.borderStyle='none' ;
    }

    if( params.get('cf[resp3]') === '1' ){
      document.getElementById('wpfunos-boton-velatorio-si').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-velatorio-si').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-velatorio-si').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-velatorio-si-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-velatorio-si-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-velatorio-si-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp3]') === '2' ){
      document.getElementById('wpfunos-boton-velatorio-no').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-velatorio-no').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-velatorio-no').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-velatorio-no-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-velatorio-no-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-velatorio-no-movil').style.borderStyle='none' ;
    }

    if( params.get('cf[resp4]') === '1' ){
      document.getElementById('wpfunos-boton-ceremonia-sin').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-sin').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-sin').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-ceremonia-sin-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-sin-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-sin-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp4]') === '2' ){
      document.getElementById('wpfunos-boton-ceremonia-sala').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-sala').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-sala').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-ceremonia-sala-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-sala-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-sala-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp4]') === '3' ){
      document.getElementById('wpfunos-boton-ceremonia-civil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-civil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-civil').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-ceremonia-civil-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-civil-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-civil-movil').style.borderStyle='none' ;
    }
    if( params.get('cf[resp4]') === '4' ){
      document.getElementById('wpfunos-boton-ceremonia-religiosa').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-religiosa').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-religiosa').style.borderStyle='none' ;
      document.getElementById('wpfunos-boton-ceremonia-religiosa-movil').style.backgroundColor = 'rgb(57, 194, 243)';
      document.getElementById('wpfunos-boton-ceremonia-religiosa-movil').style.color = 'rgb(255, 255, 255)';
      document.getElementById('wpfunos-boton-ceremonia-religiosa-movil').style.borderStyle='none' ;
    }

    [ document.getElementById('wpfunos-boton-destino-entierro'), document.getElementById('wpfunos-boton-destino-incineracion'), document.getElementById('wpfunos-boton-destino-entierro-movil'), document.getElementById('wpfunos-boton-destino-incineracion-movil') ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp1';
    });
    document.getElementById('wpfunos-boton-destino-entierro').opcion = '1';
    document.getElementById('wpfunos-boton-destino-incineracion').opcion = '2';
    document.getElementById('wpfunos-boton-destino-entierro-movil').opcion = '1';
    document.getElementById('wpfunos-boton-destino-incineracion-movil').opcion = '2';

    //

    [ document.getElementById('wpfunos-boton-ataud-normal'), document.getElementById('wpfunos-boton-destino-economico'), document.getElementById('wpfunos-boton-destino-premium'), document.getElementById('wpfunos-boton-ataud-normal-movil'), document.getElementById('wpfunos-boton-destino-economico-movil'), document.getElementById('wpfunos-boton-destino-premium-movil') ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp2';
    });
    document.getElementById('wpfunos-boton-ataud-normal').opcion = '1';
    document.getElementById('wpfunos-boton-destino-economico').opcion = '2';
    document.getElementById('wpfunos-boton-destino-premium').opcion = '3';
    document.getElementById('wpfunos-boton-ataud-normal-movil').opcion = '1';
    document.getElementById('wpfunos-boton-destino-economico-movil').opcion = '2';
    document.getElementById('wpfunos-boton-destino-premium-movil').opcion = '3';

    //

    [ document.getElementById('wpfunos-boton-velatorio-si'), document.getElementById('wpfunos-boton-velatorio-no'), document.getElementById('wpfunos-boton-velatorio-si-movil'), document.getElementById('wpfunos-boton-velatorio-no-movil') ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp3';
    });
    document.getElementById('wpfunos-boton-velatorio-si').opcion = '1';
    document.getElementById('wpfunos-boton-velatorio-no').opcion = '2';
    document.getElementById('wpfunos-boton-velatorio-si-movil').opcion = '1';
    document.getElementById('wpfunos-boton-velatorio-no-movil').opcion = '2';

    //

    [ document.getElementById('wpfunos-boton-ceremonia-sin'), document.getElementById('wpfunos-boton-ceremonia-sala'), document.getElementById('wpfunos-boton-ceremonia-civil'), document.getElementById('wpfunos-boton-ceremonia-religiosa'), document.getElementById('wpfunos-boton-ceremonia-sin-movil'), document.getElementById('wpfunos-boton-ceremonia-sala-movil'), document.getElementById('wpfunos-boton-ceremonia-civil-movil'), document.getElementById('wpfunos-boton-ceremonia-religiosa-movil') ].forEach(function(element) {
      element.addEventListener('click', wpfFunctionResp , false);
      element.resp = 'resp4';
    });
    document.getElementById('wpfunos-boton-ceremonia-sin').opcion = '1';
    document.getElementById('wpfunos-boton-ceremonia-sala').opcion = '2';
    document.getElementById('wpfunos-boton-ceremonia-civil').opcion = '3';
    document.getElementById('wpfunos-boton-ceremonia-religiosa').opcion = '4';
    document.getElementById('wpfunos-boton-ceremonia-sin-movil').opcion = '1';
    document.getElementById('wpfunos-boton-ceremonia-sala-movil').opcion = '2';
    document.getElementById('wpfunos-boton-ceremonia-civil-movil').opcion = '3';
    document.getElementById('wpfunos-boton-ceremonia-religiosa-movil').opcion = '4';

    //

    for (var i = 0; i < elementsLlamamos.length; i++) {
      elementsLlamamos[i].addEventListener('click', wpfFunctionLlamamos, false);
    }
    for (var i = 0; i < elementsLlamar.length; i++) {
      elementsLlamar[i].addEventListener('click', wpfFunctionLlamar, false);
    }
    for (var i = 0; i < elementsPresupuesto.length; i++) {
      elementsPresupuesto[i].addEventListener('click', wpfFunctionPresupuesto, false);
    }
    for (var i = 0; i < elementsDetalles.length; i++) {
      elementsDetalles[i].addEventListener('click', wpfFunctionDetalles, false);
    }
    for (var i = 0; i < elementsFinanciacion.length; i++) {
      elementsFinanciacion[i].addEventListener('click', wpfFunctionFinanciacion, false);
      elementsFinanciacion[i].style.cursor = 'pointer';
    }

    for (var i = 0; i < elementsFinanciacionNo.length; i++) {
      elementsFinanciacionNo[i].style.display = 'none';
    }

    // Multistep Form

    var checkExist = setInterval(function() {
      if (document.getElementById('wpf-resultados-referencia').hasAttribute('wpfmultistep') ) {
        console.log('Lanzar Multistep Form');
        clearInterval(checkExist);

        setTimeout(function(){

          elementorFrontend.documentsManager.documents['89340'].showModal(); //show the popup Cuando

          var cuando = 'dummy';
          var destino = 'dummy';
          var velatorio = 'dummy';
          var ceremonia = 'dummy';

          [ document.getElementById('wpfunos-multistep-ahora'), document.getElementById('wpfunos-multistep-ahora-icon')].forEach(function(element) {
            element.addEventListener('click', function() {
              cuando = 'Ahora';
              console.log('cuando: Ahora');

              if( document.getElementById('wpf-resultados-referencia').getAttribute('wpfland') === '1'){
                document.getElementById('elementor-popup-modal-89340').style.display = 'none';
                elementorFrontend.documentsManager.documents['89354'].showModal(); //show the popup datos usuario
                document.getElementById('wpfunos-v3-enviar-datos').addEventListener('click', wpfdatosusuario, false);
              }else{
                document.getElementById('elementor-popup-modal-89340').style.display = 'none';
                elementorFrontend.documentsManager.documents['89344'].showModal(); //show the popup Destino

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
              cuando = 'Próximamente';
              console.log('cuando: Proximamente');

              if( document.getElementById('wpf-resultados-referencia').getAttribute('wpfland') === '1'){
                document.getElementById('elementor-popup-modal-89340').style.display = 'none';
                elementorFrontend.documentsManager.documents['89354'].showModal(); //show the popup datos usuario
                document.getElementById('wpfunos-v3-enviar-datos').addEventListener('click', wpfdatosusuario, false);
              }else{
                document.getElementById('elementor-popup-modal-89340').style.display = 'none';
                elementorFrontend.documentsManager.documents['89344'].showModal(); //show the popup Destino

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
              elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
              window.location.href = '/compara-precios-aseguradoras';
            }, false);
          });

          //

          var wpfentierro = function() {
            destino = '1';
            console.log('destino: entierro');

            document.getElementById('elementor-popup-modal-89344').style.display = 'none';
            elementorFrontend.documentsManager.documents['89348'].showModal(); //show the popup Velatorio

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

            document.getElementById('elementor-popup-modal-89344').style.display = 'none';
            elementorFrontend.documentsManager.documents['89348'].showModal(); //show the popup Velatorio

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

            document.getElementById('elementor-popup-modal-89348').style.display = 'none';
            elementorFrontend.documentsManager.documents['89351'].showModal(); //show the popup Ceremonia

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

            document.getElementById('elementor-popup-modal-89348').style.display = 'none';
            elementorFrontend.documentsManager.documents['89351'].showModal(); //show the popup Ceremonia

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

            document.getElementById('elementor-popup-modal-89351').style.display = 'none';
            elementorFrontend.documentsManager.documents['89354'].showModal(); //show the popup Ceremonia
            document.getElementById('wpfunos-v3-enviar-datos').addEventListener('click', wpfdatosusuario, false);

          };

          var wpfsolosala = function() {
            ceremonia = '2';
            console.log('ceremonia: sala');

            document.getElementById('elementor-popup-modal-89351').style.display = 'none';
            elementorFrontend.documentsManager.documents['89354'].showModal(); //show the popup Ceremonia
            document.getElementById('wpfunos-v3-enviar-datos').addEventListener('click', wpfdatosusuario, false);
          };

          var wpfcivil = function() {
            ceremonia = '3';
            console.log('ceremonia: civil');

            document.getElementById('elementor-popup-modal-89351').style.display = 'none';
            elementorFrontend.documentsManager.documents['89354'].showModal(); //show the popup Ceremonia
            document.getElementById('wpfunos-v3-enviar-datos').addEventListener('click', wpfdatosusuario, false);
          };

          var wpfreligiosa = function() {
            ceremonia = '4';
            console.log('ceremonia: religiosa');

            document.getElementById('elementor-popup-modal-89351').style.display = 'none';
            elementorFrontend.documentsManager.documents['89354'].showModal(); //show the popup Ceremonia
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

              elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
              $('#elementor-popup-modal-89354').hide();
              elementorFrontend.documentsManager.documents['77005'].showModal(); //Ventana Popup Esperando (entrada datos GTM)

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
    // Multistep Form

    setInterval(function() {
      if ( document.getElementsByClassName('wpf-boton-financiacion')[0] ) {
        console.log('Modal financiación');
        var elementsBotonFinanciacion = document.getElementsByClassName('wpf-boton-financiacion');
        for (var i = 0; i < elementsBotonFinanciacion.length; i++) {
          //elementsFinanciacionNo[i].style.display = 'none';
          if( elementsBotonFinanciacion[i].getAttribute('listener') !== 'true'){
            elementsBotonFinanciacion[i].setAttribute('listener', 'true');
            console.log('Modal financiación listener false');
            elementsBotonFinanciacion[i].addEventListener('click', wpfFunctionBotonFinanciacion, false);
            elementsBotonFinanciacion[i].style.cursor = 'pointer';
          }
        }
      }
    }, 1000) ; // check every 1 sec.

  }); // Function END
}); // Document ready END

var wpfFunctionLlamamos = function() {
  var wpnonce = this.getAttribute('wpfn');
  var servicio = this.getAttribute('wpfid');
  var precio = this.getAttribute('wpfp');
  var titulo = this.getAttribute('wpftitulo');

  console.log('Botón Llamamos: Servicio: '+servicio+' Título: '+titulo );

  // EBG 03-11-22
  var nombre = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnombre');
  var email = document.getElementById('wpf-resultados-referencia').getAttribute('wpfemail');
  //
  var phone = document.getElementById('wpf-resultados-referencia').getAttribute('wpftelefono');

  elementorFrontend.documentsManager.documents['56684'].showModal(); //show the popup

  $('#wpf-llamamos-respuesta-si').hide();
  $('#wpf-llamamos-respuesta-no').hide();
  $('#wpf-llamamos-respuesta-cerrar').hide();
  document.getElementById('wpfunos-modal-llamen-titulo').innerHTML = titulo;
  document.getElementById('wpfunos-modal-llamamos-telefono').innerHTML = phone;
  document.getElementById('wpf-llamamos-cerrar').addEventListener('click', function(){ $('#elementor-popup-modal-56684').hide(); }, false);

  jQuery.ajax({
    type : 'post',
    dataType : 'json',
    url : WpfAjax.ajaxurl,
    data: {
      'action': 'wpfunos_ajax_v3_llamamos',
      'servicio': servicio,
      'wpnonce': wpnonce,
      'precio' : precio,
      'titulo' : titulo,
      'nombre' : nombre,
      'email' : email,
      'phone' : phone,
    },
    success: function(response) {
      console.log('wpfunos_ajax_v3_llamamos response:');
      console.log(response)	;
      if(response.type === 'success') {
        $('#wpf-llamamos-espacio').hide();
        $('#wpf-llamamos-respuesta-si').show();
        $('#wpf-llamamos-respuesta-cerrar').show();
      } else {
        console.log('fail');
        $('#wpf-llamamos-espacio').hide();
        $('#wpf-llamamos-respuesta-no').show();
        $('#wpf-llamamos-respuesta-cerrar').show();
      }
    }
  });
};

var wpfFunctionLlamar = function() {
  var wpnonce = this.getAttribute('wpfn');
  var servicio = this.getAttribute('wpfid');
  var precio = this.getAttribute('wpfp');
  var titulo = this.getAttribute('wpftitulo');
  var telefono = this.getAttribute('wpftelefono');

  console.log('Botón Llamar: Servicio: '+servicio+' Título: '+titulo );

  // EBG 03-11-22
  var nombre = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnombre');
  var email = document.getElementById('wpf-resultados-referencia').getAttribute('wpfemail');
  var phone = document.getElementById('wpf-resultados-referencia').getAttribute('wpftelefono');
  //

  elementorFrontend.documentsManager.documents['56680'].showModal(); //show the popup

  document.getElementById('wpfunos-modal-llamar-titulo').innerHTML = titulo;
  document.getElementById('wpfunos-modal-llamar-telefono').innerHTML = telefono;
  document.getElementById('wpf-llamar-cerrar').addEventListener('click', function(){ $('#elementor-popup-modal-56680').hide(); }, false);

  let isMobile = window.matchMedia('only screen and (max-width: 760px)').matches;
  console.log('isMobile: '+isMobile);
  if ( isMobile ) {
    var tel = 'tel:'+telefono;
    console.log('tel: '+tel);
    window.location = tel;
  }

  jQuery.ajax({
    type : 'post',
    dataType : 'json',
    url : WpfAjax.ajaxurl,
    data: {
      'action': 'wpfunos_ajax_v3_llamar',
      'servicio': servicio,
      'wpnonce': wpnonce,
      'precio' : precio,
      'titulo' : titulo,
      'nombre' : nombre,
      'email' : email,
      'phone' : phone,
    },
    success: function(response) {
      console.log('wpfunos_ajax_v3_llamar response:');
      console.log(response)	;
      if(response.type === 'success') {
        console.log('success');
      } else {
        console.log('fail');
      }
    }
  });
};

var wpfFunctionPresupuesto = function() {
  var wpnonce = this.getAttribute('wpfn');
  var servicio = this.getAttribute('wpfid');
  var precio = this.getAttribute('wpfp');
  var titulo = this.getAttribute('wpftitulo');

  console.log('Botón Presupuesto: Servicio: '+servicio+' Título: '+titulo );

  elementorFrontend.documentsManager.documents['56676'].showModal(); //show the popup

  document.getElementById('wpfunos-modal-presupuesto-nombre').innerHTML = titulo;
  document.getElementById('botonEnviarPresupuesto').setAttribute('wpfn', wpnonce );
  document.getElementById('botonEnviarPresupuesto').setAttribute('wpfid', servicio );
  document.getElementById('botonEnviarPresupuesto').setAttribute('wpfp', precio );
  document.getElementById('botonEnviarPresupuesto').setAttribute('wpftitulo', titulo );
  document.getElementById('botonEnviarPresupuesto').addEventListener('click', wpfFunctionEnviaPresupuesto, false);
};

var wpfFunctionEnviaPresupuesto = function() {
  var wpnonce = this.getAttribute('wpfn');
  var servicio = this.getAttribute('wpfid');
  var precio = this.getAttribute('wpfp');
  var titulo = this.getAttribute('wpftitulo');
  var mensaje = document.getElementById('form-field-mensajePresupuesto').value;

  console.log('Botón Enviar presupuesto: Servicio: '+servicio+' Título: '+titulo );
  console.log('mensaje: '+mensaje );

  // EBG 03-11-22
  var nombre = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnombre');
  var email = document.getElementById('wpf-resultados-referencia').getAttribute('wpfemail');
  var phone = document.getElementById('wpf-resultados-referencia').getAttribute('wpftelefono');
  //

  jQuery.ajax({
    type : 'post',
    dataType : 'json',
    url : WpfAjax.ajaxurl,
    data: {
      'action': 'wpfunos_ajax_v3_presupuesto',
      'servicio': servicio,
      'wpnonce': wpnonce,
      'precio' : precio,
      'titulo' : titulo,
      'mensaje' : mensaje,
      'nombre' : nombre,
      'email' : email,
      'phone' : phone,
    },
    success: function(response) {
      console.log('wpfunos_ajax_v3_presupuesto response:');
      console.log(response)	;
      if(response.type === 'success') {
        console.log('success');
      } else {
        console.log('fail');
      }
    }
  });
};


var wpfFunctionDetalles = function() {
  var wpnonce = this.getAttribute('wpfn');
  var servicio = this.getAttribute('wpfid');
  var precio = this.getAttribute('wpfp');
  var titulo = this.getAttribute('wpftitulo');
  var distancia = this.getAttribute('wpfdistancia');
  var telefono = this.getAttribute('wpftelefono');
  var financiacion = this.getAttribute('wpffinanciacion');

  console.log('Botón Detalles: Servicio: '+servicio+' Título: '+titulo+' Financiación: '+financiacion );

  // EBG 03-11-22
  var nombre = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnombre');
  var email = document.getElementById('wpf-resultados-referencia').getAttribute('wpfemail');
  var phone = document.getElementById('wpf-resultados-referencia').getAttribute('wpftelefono');
  //
  var resp1 = document.getElementById('wpf-resultados-referencia').getAttribute('wpfresp1');
  var resp2 = document.getElementById('wpf-resultados-referencia').getAttribute('wpfresp2');
  var resp3 = document.getElementById('wpf-resultados-referencia').getAttribute('wpfresp3');
  var resp4 = document.getElementById('wpf-resultados-referencia').getAttribute('wpfresp4');
  //
  console.log('Botón Detalles: resp1: '+resp1+' reps2: '+resp2+' resp3: '+resp3+' resp4: '+resp4 );

  elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup

  jQuery.ajax({
    type : 'post',
    dataType : 'json',
    url : WpfAjax.ajaxurl,
    data: {
      'action': 'wpfunos_ajax_v3_detalles',
      'servicio': servicio,
      'wpnonce': wpnonce,
      'precio' : precio,
      'titulo' : titulo,
      'distancia' : distancia,
      'telefono' : telefono,
      'nombre' : nombre,
      'email' : email,
      'phone' : phone,
      'resp1' : resp1,
      'resp2' : resp2,
      'resp3' : resp3,
      'resp4' : resp4,
    },
    success: function(response) {
      console.log('wpfunos_ajax_v3_detalles response:');
      console.log(response)	;
      if(response.type === 'success') {
        console.log('success');
        elementorFrontend.documentsManager.documents['56672'].showModal(); //show the popup

        document.getElementById('wpf-detalles-logo').innerHTML = response.valor_logo;
        document.getElementById('wpf-detalles-logo-movil').innerHTML = response.valor_logo;

        document.getElementById('wpf-detalles-logo-confirmado').innerHTML = response.valor_logo_confirmado;
        document.getElementById('wpf-detalles-logo-confirmado-movil').innerHTML = response.valor_logo_confirmado;

        document.getElementById('wpf-detalles-nombre').innerHTML = response.valor_nombre;
        document.getElementById('wpf-detalles-nombre-movil').innerHTML = response.valor_nombre;

        document.getElementById('wpf-detalles-servicio').innerHTML = response.valor_servicio;
        document.getElementById('wpf-detalles-servicio-movil').innerHTML = response.valor_servicio;

        document.getElementById('wpf-detalles-precio').innerHTML = response.valor_precio;
        document.getElementById('wpf-detalles-precio-movil').innerHTML = response.valor_precio;

        document.getElementById('wpf-detalles-nombrepack').innerHTML = response.valor_nombrepack;
        document.getElementById('wpf-detalles-nombrepack-movil').innerHTML = response.valor_nombrepack;

        document.getElementById('wpf-detalles-textoprecio').innerHTML = response.valor_textoprecio;
        document.getElementById('wpf-detalles-textoprecio-movil').innerHTML = response.valor_textoprecio;

        document.getElementById('wpf-detalles-direccion').innerHTML = response.valor_direccion;
        document.getElementById('wpf-detalles-direccion-movil').innerHTML = response.valor_direccion;

        document.getElementById('wpf-detalles-distancia').innerHTML = response.valor_distancia+' Km.';

        document.getElementById('wpf-detalles-comentarios').innerHTML = response.comentarios;
        document.getElementById('wpf-detalles-comentarios-movil').innerHTML = response.comentarios;

        $('#elementor-popup-modal-84639').hide();

        document.getElementById('wpfunos-detalles-llamamos').addEventListener('click', wpfDetallesLlamamos, false);
        document.getElementById('wpfunos-detalles-llamamos').setAttribute('wpfid', servicio);
        document.getElementById('wpfunos-detalles-llamamos').setAttribute('wpfn', wpnonce);
        document.getElementById('wpfunos-detalles-llamamos').setAttribute('wpfp', precio);
        document.getElementById('wpfunos-detalles-llamamos').setAttribute('wpftitulo', titulo);
        document.getElementById('wpfunos-detalles-llamamos').setAttribute('wpfdistancia', distancia);
        document.getElementById('wpfunos-detalles-llamamos').setAttribute('wpftelefono', telefono);
        document.getElementById('wpfunos-detalles-llamar').addEventListener('click', wpfDetallesLlamar, false);
        document.getElementById('wpfunos-detalles-llamar').setAttribute('wpfid', servicio);
        document.getElementById('wpfunos-detalles-llamar').setAttribute('wpfn', wpnonce);
        document.getElementById('wpfunos-detalles-llamar').setAttribute('wpfp', precio);
        document.getElementById('wpfunos-detalles-llamar').setAttribute('wpftitulo', titulo);
        document.getElementById('wpfunos-detalles-llamar').setAttribute('wpfdistancia', distancia);
        document.getElementById('wpfunos-detalles-llamar').setAttribute('wpftelefono', telefono);
        document.getElementById('wpfunos-detalles-email').addEventListener('click', wpfDetallesEmail, false);
        document.getElementById('wpfunos-detalles-email').setAttribute('wpfid', servicio);
        document.getElementById('wpfunos-detalles-email').setAttribute('wpfn', wpnonce);
        document.getElementById('wpfunos-detalles-email').setAttribute('wpfp', precio);
        document.getElementById('wpfunos-detalles-email').setAttribute('wpftitulo', titulo);
        document.getElementById('wpfunos-detalles-email').setAttribute('wpfdistancia', distancia);
        document.getElementById('wpfunos-detalles-email').setAttribute('wpftelefono', telefono);
        document.getElementById('wpfunos-detalles-presupuesto').addEventListener('click', wpfDetallesPresupuesto, false);
        document.getElementById('wpfunos-detalles-presupuesto').setAttribute('wpfid', servicio);
        document.getElementById('wpfunos-detalles-presupuesto').setAttribute('wpfn', wpnonce);
        document.getElementById('wpfunos-detalles-presupuesto').setAttribute('wpfp', precio);
        document.getElementById('wpfunos-detalles-presupuesto').setAttribute('wpftitulo', titulo);
        document.getElementById('wpfunos-detalles-presupuesto').setAttribute('wpfdistancia', distancia);
        document.getElementById('wpfunos-detalles-presupuesto').setAttribute('wpftelefono', telefono);
        document.getElementById('wpfunos-detalles-email-movil').addEventListener('click', wpfDetallesEmail, false);
        document.getElementById('wpfunos-detalles-email-movil').setAttribute('wpfid', servicio);
        document.getElementById('wpfunos-detalles-email-movil').setAttribute('wpfn', wpnonce);
        document.getElementById('wpfunos-detalles-email-movil').setAttribute('wpfp', precio);
        document.getElementById('wpfunos-detalles-email-movil').setAttribute('wpftitulo', titulo);
        document.getElementById('wpfunos-detalles-email-movil').setAttribute('wpfdistancia', distancia);
        document.getElementById('wpfunos-detalles-email-movil').setAttribute('wpftelefono', telefono);
        document.getElementById('wpfunos-detalles-presupuesto-movil').addEventListener('click', wpfDetallesPresupuesto, false);
        document.getElementById('wpfunos-detalles-presupuesto-movil').setAttribute('wpfid', servicio);
        document.getElementById('wpfunos-detalles-presupuesto-movil').setAttribute('wpfn', wpnonce);
        document.getElementById('wpfunos-detalles-presupuesto-movil').setAttribute('wpfp', precio);
        document.getElementById('wpfunos-detalles-presupuesto-movil').setAttribute('wpftitulo', titulo);
        document.getElementById('wpfunos-detalles-presupuesto-movil').setAttribute('wpfdistancia', distancia);
        document.getElementById('wpfunos-detalles-presupuesto-movil').setAttribute('wpftelefono', telefono);
        document.getElementById('wpfunos-detalles-financiacion').addEventListener('click', wpfFunctionFinanciacion, false);
        document.getElementById('wpfunos-detalles-financiacion').setAttribute('wpfid', servicio);
        document.getElementById('wpfunos-detalles-financiacion').setAttribute('wpfn', wpnonce);
        document.getElementById('wpfunos-detalles-financiacion').setAttribute('wpfp', precio);
        document.getElementById('wpfunos-detalles-financiacion').setAttribute('wpftitulo', titulo);
        document.getElementById('wpfunos-detalles-financiacion').setAttribute('wpfdistancia', distancia);
        document.getElementById('wpfunos-detalles-financiacion').setAttribute('wpftelefono', telefono);
        document.getElementById('wpf-icono-whatsapp').addEventListener('click', wpfFunctionWhatsApp, false);
        document.getElementById('wpf-icono-whatsapp').setAttribute('wpfid', servicio);
        document.getElementById('wpf-icono-whatsapp').setAttribute('wpfn', wpnonce);
        document.getElementById('wpf-icono-whatsapp').setAttribute('wpfp', precio);
        document.getElementById('wpf-icono-whatsapp').setAttribute('wpftitulo', titulo);
        document.getElementById('wpf-icono-whatsapp').setAttribute('wpfdistancia', distancia);
        document.getElementById('wpf-icono-whatsapp').setAttribute('wpftelefono', telefono);
        document.getElementById('wpfunos-detalles-producto-1').addEventListener('click', wpfDetallesProducto1, false);
        document.getElementById('wpfunos-detalles-producto-1').setAttribute('wpfid', servicio);
        document.getElementById('wpfunos-detalles-producto-1').setAttribute('wpfn', wpnonce);
        document.getElementById('wpfunos-detalles-producto-1').setAttribute('wpfp', precio);
        document.getElementById('wpfunos-detalles-producto-1').setAttribute('wpftitulo', titulo);
        document.getElementById('wpfunos-detalles-producto-1').setAttribute('wpfdistancia', distancia);
        document.getElementById('wpfunos-detalles-producto-1').setAttribute('wpftelefono', telefono);

        if ( financiacion == 1 ) {document.getElementById('wpf-detalles-boton-financiacion').style.display = 'block';}

      } else {
        console.log('fail');
      }
    }
  });
};

var wpfDetallesLlamamos = function() {
  var wpnonce = this.getAttribute('wpfn');
  var servicio = this.getAttribute('wpfid');
  var precio = this.getAttribute('wpfp');
  var titulo = this.getAttribute('wpftitulo');

  console.log('Botón Detalles Llamamos: Servicio: '+servicio+' Título: '+titulo );

  // EBG 03-11-22
  var nombre = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnombre');
  var email = document.getElementById('wpf-resultados-referencia').getAttribute('wpfemail');
  //
  var phone = document.getElementById('wpf-resultados-referencia').getAttribute('wpftelefono');

  $('#elementor-popup-modal-56672').hide();
  elementorFrontend.documentsManager.documents['56684'].showModal(); //show the popup

  $('#wpf-llamamos-respuesta-si').hide();
  $('#wpf-llamamos-respuesta-no').hide();
  $('#wpf-llamamos-respuesta-cerrar').hide();
  document.getElementById('wpfunos-modal-llamen-titulo').innerHTML = titulo;
  document.getElementById('wpfunos-modal-llamamos-telefono').innerHTML = phone;
  document.getElementById('wpf-llamamos-cerrar').addEventListener('click', function(){ $('#elementor-popup-modal-56684').hide(); }, false);

  jQuery.ajax({
    type : 'post',
    dataType : 'json',
    url : WpfAjax.ajaxurl,
    data: {
      'action': 'wpfunos_ajax_v3_llamamos',
      'servicio': servicio,
      'wpnonce': wpnonce,
      'precio' : precio,
      'titulo' : titulo,
      'nombre' : nombre,
      'email' : email,
      'phone' : phone,
    },
    success: function(response) {
      console.log('wpfunos_ajax_v3_llamamos response:');
      console.log(response)	;
      if(response.type === 'success') {
        $('#wpf-llamamos-espacio').hide();
        $('#wpf-llamamos-respuesta-si').show();
        $('#wpf-llamamos-respuesta-cerrar').show();
      } else {
        console.log('fail');
        $('#wpf-llamamos-espacio').hide();
        $('#wpf-llamamos-respuesta-no').show();
        $('#wpf-llamamos-respuesta-cerrar').show();
      }
    }
  });
};

var wpfDetallesLlamar = function() {
  var wpnonce = this.getAttribute('wpfn');
  var servicio = this.getAttribute('wpfid');
  var precio = this.getAttribute('wpfp');
  var titulo = this.getAttribute('wpftitulo');
  var telefono = this.getAttribute('wpftelefono');

  console.log('Botón Llamar: Servicio: '+servicio+' Título: '+titulo );

  // EBG 03-11-22
  var nombre = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnombre');
  var email = document.getElementById('wpf-resultados-referencia').getAttribute('wpfemail');
  var phone = document.getElementById('wpf-resultados-referencia').getAttribute('wpftelefono');
  //

  $('#elementor-popup-modal-56672').hide();
  elementorFrontend.documentsManager.documents['56680'].showModal(); //show the popup

  document.getElementById('wpfunos-modal-llamar-titulo').innerHTML = titulo;
  document.getElementById('wpfunos-modal-llamar-telefono').innerHTML = telefono;
  document.getElementById('wpf-llamar-cerrar').addEventListener('click', function(){ $('#elementor-popup-modal-56680').hide(); }, false);

  let isMobile = window.matchMedia('only screen and (max-width: 760px)').matches;
  console.log('isMobile: '+isMobile);
  if ( isMobile ) {
    var tel = 'tel:'+telefono;
    console.log('tel: '+tel);
    window.location = tel;
  }

  jQuery.ajax({
    type : 'post',
    dataType : 'json',
    url : WpfAjax.ajaxurl,
    data: {
      'action': 'wpfunos_ajax_v3_llamar',
      'servicio': servicio,
      'wpnonce': wpnonce,
      'precio' : precio,
      'titulo' : titulo,
      'nombre' : nombre,
      'email' : email,
      'phone' : phone,
    },
    success: function(response) {
      console.log('wpfunos_ajax_v3_llamar response:');
      console.log(response)	;
      if(response.type === 'success') {
        console.log('success');
      } else {
        console.log('fail');
      }
    }
  });
};

var wpfDetallesEmail = function() {
  var wpnonce = this.getAttribute('wpfn');
  var servicio = this.getAttribute('wpfid');
  var precio = this.getAttribute('wpfp');
  var titulo = this.getAttribute('wpftitulo');

  console.log('boton Detalles email servicio: '+servicio+ ' Precio: ' +precio+ ' Título ' +titulo);

  // EBG 03-11-22
  var nombre = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnombre');
  var email = document.getElementById('wpf-resultados-referencia').getAttribute('wpfemail');
  var phone = document.getElementById('wpf-resultados-referencia').getAttribute('wpftelefono');
  //

  $('#elementor-popup-modal-56672').hide();
  elementorFrontend.documentsManager.documents['47448'].showModal(); //show the popup
  document.getElementById('wpfunos-modal-email-email').innerHTML = document.getElementById('wpf-resultados-referencia').getAttribute('wpfemail');
  document.getElementById('wpf-email-cerrar').addEventListener('click', function(){ $('#elementor-popup-modal-47448').hide(); }, false);

  jQuery.ajax({
    type : 'post',
    dataType : 'json',
    url : WpfAjax.ajaxurl,
    data: {
      'action': 'wpfunos_ajax_v3_email',
      'servicio': servicio,
      'wpnonce': wpnonce,
      'precio' : precio,
      'titulo' : titulo,
      'nombre' : nombre,
      'email' : email,
      'phone' : phone,
    },
    success: function(response) {
      console.log('wpfunos_ajax_v3_email response:');
      console.log(response)	;
      if(response.type === 'success') {
        console.log('correo enviado');
      } else {
        console.log('fail');
      }
    }
  });
};

var wpfDetallesProducto1 = function() {
  var wpnonce = this.getAttribute('wpfn');
  var servicio = this.getAttribute('wpfid');
  var precio = this.getAttribute('wpfp');
  var titulo = this.getAttribute('wpftitulo');

  elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup

  window.location.href = "https://funos.es/producto/servicio-de-gestion-personalizada";
};

var wpfDetallesPresupuesto = function() {
  var wpnonce = this.getAttribute('wpfn');
  var servicio = this.getAttribute('wpfid');
  var precio = this.getAttribute('wpfp');
  var titulo = this.getAttribute('wpftitulo');

  console.log('Botón Presupuesto: Servicio: '+servicio+' Título: '+titulo );

  $('#elementor-popup-modal-56672').hide();
  elementorFrontend.documentsManager.documents['56676'].showModal(); //show the popup

  document.getElementById('wpfunos-modal-presupuesto-nombre').innerHTML = titulo;
  document.getElementById('botonEnviarPresupuesto').setAttribute('wpfn', wpnonce );
  document.getElementById('botonEnviarPresupuesto').setAttribute('wpfid', servicio );
  document.getElementById('botonEnviarPresupuesto').setAttribute('wpfp', precio );
  document.getElementById('botonEnviarPresupuesto').setAttribute('wpftitulo', titulo );
  document.getElementById('botonEnviarPresupuesto').addEventListener('click', wpfFunctionEnviaPresupuesto, false);
};

var wpfFunctionFinanciacion = function() {
  var servicio = this.getAttribute('wpfid');
  var precio = this.getAttribute('wpfp');
  var titulo = this.getAttribute('wpftitulo');

  console.log('Botón Financiación: '+servicio+' Título: '+titulo );

  elementorFrontend.documentsManager.documents['111301'].showModal(); //show the popup

  document.getElementById('wpf-financiacion-funeraria').innerHTML = titulo;
  document.getElementById('wpf-financiacion-tipo').innerHTML = document.getElementsByClassName('elementor-element-6472ad92')[0].innerText;

  document.getElementsByClassName('elementor-field-group-plazos_inferior')[0].style.display='none';
  document.getElementsByClassName('elementor-field-group-plazos_superior')[0].style.display='none';
  document.getElementById('form-field-importe').disabled = true;
  document.getElementById('form-field-financiar').disabled = true;

  document.getElementById('form-field-importe').value = precio;
  document.getElementById('form-field-wpfn').value = document.getElementById('wpf-resultados-referencia').getAttribute('wpfnombre');
  document.getElementById('form-field-wpfe').value = document.getElementById('wpf-resultados-referencia').getAttribute('wpfemail');
  document.getElementById('form-field-wpft').value = document.getElementById('wpf-resultados-referencia').getAttribute('wpftelefono');
  document.getElementById('form-field-wpfp').value = precio;
  document.getElementById('form-field-wpftitulo').value = titulo;
  document.getElementById('form-field-wpftipo').value = document.getElementsByClassName('elementor-element-6472ad92')[0].innerText;

  setInterval(function() {
    if ( !document.getElementById('form-field-importe') ) {return;}
    document.getElementById('form-field-financiar').value = ( precio - document.getElementById('form-field-entrada').value );

    if ( document.getElementById('form-field-financiar').value < 1501 ){
      document.getElementsByClassName('elementor-field-group-plazos_inferior')[0].style.display='block';
      document.getElementsByClassName('elementor-field-group-plazos_superior')[0].style.display='none';
    }

    if ( document.getElementById('form-field-financiar').value > 1500 ){
      document.getElementsByClassName('elementor-field-group-plazos_inferior')[0].style.display='none';
      document.getElementsByClassName('elementor-field-group-plazos_superior')[0].style.display='block';
    }

    if( document.getElementById('form-field-financiar').value < 0 ){
      document.getElementById('wpfFinanciacionEnviar').disabled = true;
    }else{
      document.getElementById('wpfFinanciacionEnviar').disabled = false;
    }


  }, 100); // check every 100ms
};

var wpfFunctionBotonFinanciacion = function() {
  elementorFrontend.documentsManager.documents['111305'].showModal(); //show the popup

  document.getElementsByClassName('elementor-field-group-plazos_inferior')[0].style.display='none';
  document.getElementsByClassName('elementor-field-group-plazos_superior')[0].style.display='none';
  document.getElementById('form-field-financiar').disabled = true;
  document.getElementById('form-field-importe').style.borderStyle = 'solid';
  document.getElementById('form-field-importe').style.borderWidth = '2px' ;
  document.getElementById('form-field-importe').style.fontSize = '15px' ;
  document.getElementById('form-field-importe').style.fontWeight = '400' ;

  setInterval(function() {
    if ( !document.getElementById('form-field-importe') ) return;
    document.getElementById('form-field-financiar').value = ( document.getElementById('form-field-importe').value - document.getElementById('form-field-entrada').value );

    if ( document.getElementById('form-field-financiar').value < 1501 ){
      document.getElementsByClassName('elementor-field-group-plazos_inferior')[0].style.display='block';
      document.getElementsByClassName('elementor-field-group-plazos_superior')[0].style.display='none';
    }

    if ( document.getElementById('form-field-financiar').value > 1500 ){
      document.getElementsByClassName('elementor-field-group-plazos_inferior')[0].style.display='none';
      document.getElementsByClassName('elementor-field-group-plazos_superior')[0].style.display='block';
    }

    if( document.getElementById('form-field-financiar').value < 0 ){
      document.getElementById('wpfFinanciacionEnviar').disabled = true;
    }else{
      document.getElementById('wpfFinanciacionEnviar').disabled = false;
    }
  }, 100); // check every 100ms
};

var wpfFunctionWhatsApp = function() {
  var wpnonce = this.getAttribute('wpfn');
  var servicio = this.getAttribute('wpfid');
  var precio = this.getAttribute('wpfp');
  var titulo = this.getAttribute('wpftitulo');
  var telefono = document.getElementById('wpf-resultados-referencia').getAttribute('wpftelefono');
  document.getElementById('wpf-icono-whatsapp').removeEventListener('click', wpfFunctionWhatsApp );
  document.getElementById('wpf-icono-whatsapp').style.cursor = 'auto';


  console.log('Botón WhatsApp: '+servicio+' Título: '+titulo+' Teléfono: ' + telefono );

  jQuery.ajax({
    type : 'post',
    dataType : 'json',
    url : WpfAjax.ajaxurl,
    data: {
      'action': 'wpfunos_ajax_v3_whatsapp',
      'servicio': servicio,
      'wpnonce': wpnonce,
      'precio' : precio,
      'titulo' : titulo,
      'telefono' : telefono,
    },
    success: function(response) {
      console.log('wpfunos_ajax_v3_whatsapp response:');
      console.log(response)	;
      if(response.type === 'success') {
        console.log('OK');
      } else {
        console.log('fail');
      }
    }
  });
};

var wpfdistancia = function() {
  // 1 second delay
  setTimeout(function(){
    console.log('Formulario cambiar distancia');
    document.getElementById('wpfunos-v3-boton-formulario-distancia').addEventListener('click', function(){
      console.log('click botón cambiar distancia');
      var newdistance = document.getElementById('form-field-nuevadistancia').value;
      if( newdistance !== ''){
        $('#wpfunos-formulario-nueva-distancia').hide();
        elementorFrontend.documentsManager.documents['84639'].showModal(); //show the popup
        document.getElementById('elementor-popup-modal-89948').style.display = 'none';
        if( parseInt(newdistance) < 5 ){ newdistance = '5'; }
        if( parseInt(newdistance) > 200 ){ newdistance = '200'; }
        var params = new URLSearchParams(location.search);
        params.set('distance', newdistance );
        window.location.search = params.toString();
      }
    }, false);
  }, 1000);
};

function wpfFunctionResp(evt){
  var params = new URLSearchParams(location.search);
  console.log( 'click botón '+evt.currentTarget.resp+' '+evt.currentTarget.opcion);
  if( params.get('cf['+evt.currentTarget.resp+']') !== evt.currentTarget.opcion){
    elementorFrontend.documentsManager.documents['84639'].showModal(); //Ventana Popup Esperando (loader2)
    params.set('cf['+evt.currentTarget.resp+']', evt.currentTarget.opcion );
    if( params.get('cf[resp3]') === '2' && params.get('cf[resp4]') === '1' && parseInt(params.get('distance')) < 100 ){
      console.log('Cambiando distancia 100km y orden a precios.');
      params.set('distance', '100' );
      params.set('orden', 'precios' );
    }
    window.location.search = params.toString();
  }
}
