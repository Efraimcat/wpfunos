<script>
$ = jQuery.noConflict();
$( document ).ready(function() {
	$(function(){
   	console.log( "document loaded" );
		var url_string = window.location.href
		var url = new URL(url_string);
		var c = url.searchParams.get("wpf");
		if(c !== null){
			console.log( "wpf: " + c );
			var date = new Date();
      date.setTime(date.getTime() + (30*24*60*60*1000));
      expires = "; expires=" + date.toUTCString();
			document.cookie = "wpfunoswpf=" + c + expires + "; path=/; SameSite=Lax; secure";
		}
		if( document.body.classList.contains( 'logged-in' )){
			console.log( "logged-in");
			document.cookie = "wpfunosloggedin=yes; expires=session; path=/; SameSite=Lax; secure";
		}
 	});
});
</script>




<script>
window.onload = function () {
	if( document.body.classList.contains( 'logged-in' )){
		var chart = new CanvasJS.Chart("chartContainer", {
			title: {
				text: "Push-ups Over a Week"
			},
			axisY: {
				title: "Number of Push-ups"
			},
			data: [{
				type: "line",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
	}
}
</script>
