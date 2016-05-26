$(document).on("ready",function(){
	$("input#usuario").on("keyup",function(){
		$(".evt-error-user").hide();
	});
	$("input#password").on("keyup",function(){
		$(".evt-error-password").hide();
	});
});