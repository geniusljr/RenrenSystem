$(function() {
	$(document).ready(function(){
		$(".input-text input").focus(function(){
			$(".input-text").css("background-color", "#fff");
		});
		$(".input-text input").blur(function(){
			$(".input-text").css("background-color", "#f1f3f5");
		});
	});
});
function logout() {
	$.get("logout.php", function(data) {
		alert(data);
		location.reload();
	});
}