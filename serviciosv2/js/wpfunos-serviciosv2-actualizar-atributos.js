<script type="text/javascript" id="wpfunos-serviciosv2-actualizar-atributos">
$ = jQuery.noConflict();
$(document).ready(function(){
  $(function(){
    jQuery.ajax({
      type : "post",
      dataType : "json",
      url : WpfAjax.ajaxurl,
      data: {
        "action": "wpfunos_ajax_serviciosv2_transients",
        "wpfn": document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfn"),
        "wpfip": document.getElementById("wpf-resultados-cabecera-cuando").getAttribute("wpfip"),
      },
      success: function(response) {
        console.log(response)	;
        if(response.type == "success") {
          console.log('success');
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfref", response.wpfref);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfact", response.wpfact);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfnombre", response.wpfn);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfemail", response.wpfe);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpftelefono", response.wpft);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfadr", response.wpfadr);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfdist", response.wpfdist);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpflat", response.wpflat);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpflng", response.wpflng);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp1", response.wpfresp1);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp2", response.wpfresp2);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp3", response.wpfresp3);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfresp4", response.wpfresp4);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpforden", response.wpforden);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfdest", response.wpfdest);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfcp", response.wpfcp);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfurl", response.wpfurl);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfip", response.wpfip);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfvision", response.wpfvision);
          document.getElementById("wpf-resultados-cabecera-referencia").setAttribute("wpfcuando", response.wpfcuando);
        } else {
          console.log('fail');
        }
      }
    });
  });
});
</script>
