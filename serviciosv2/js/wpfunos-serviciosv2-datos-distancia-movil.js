<script type="text/javascript" id="wpfunos-serviciosv2-datos-distancia-movil">
$=jQuery.noConflict(),$(document).ready((function(){$((function(){var e=new URLSearchParams(location.search),o=e.get("orden");"precios"===e.get("orden")?(document.getElementById("wpfunos-titulo-orden-movil").innerHTML="Resultados ordenados por precio.",document.getElementById("wpfunos-boton-precio-movil").innerHTML="Distancia"):(document.getElementById("wpfunos-titulo-orden-movil").innerHTML="Resultados ordenados por distancia.",document.getElementById("wpfunos-boton-precio-movil").innerHTML="Precio"),document.getElementById("wpfunos-boton-precio-movil").addEventListener("click",(function(){elementorFrontend.documentsManager.documents[84639].showModal();var t=document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfref"),n=document.getElementById("wpf-resultados-cabecera-referencia").getAttribute("wpfcp");"dummy"===e.get("wpfref")&&"dummy"!=t&&e.set("wpfref",t),"undefined"===e.get("CP")&&"dummy"!=n&&e.set("CP",n),"dist"==o?(e.set("orden","precios"),window.location.search=e.toString()):(e.set("orden","dist"),window.location.search=e.toString())}),!1)}))}));
</script>
