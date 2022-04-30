<script>
$ = jQuery.noConflict();
$(document).ready(function(){
	$(function(){
		let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
		console.log(isMobile);
		var url_string = window.location.href
		var url = new URL(url_string);
		var c = url.searchParams.get("telefono");
		var llamar = url.searchParams.get("wpfunos-hacer-llamada");
		console.log(llamar);
		if (llamar == '1' && isMobile) {
			console.log(c);
			var tel = 'tel:'+c;
			console.log(tel);
			window.location = tel;
		}
	});
});
</script>
