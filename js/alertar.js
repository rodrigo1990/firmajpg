function alertar(msg){

	$("#alert-cont").html('<div class="alert-bkground"> <div style="" class="alert-window"> <div class="header">  </div> <div class="body"> <h2 class="text-center">'+msg+'</h2> <a class="btn btn-primary center-block" onClick="closeAlertar()">ACEPTAR</a> </div> </div> </div>')

	$(".alert-bkground").addClass('poner');

}


function closeAlertar(){

	$(".alert-window").addClass('fadeOut');



	$(".alert-bkground").removeClass('poner');

	$(".alert-bkground").addClass('sacar');


	setTimeout(function(){
		$(".alert-bkground ").remove();
	},500)




	

}