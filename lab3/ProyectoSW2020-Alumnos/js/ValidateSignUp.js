function start(){

	$('#fquestion').submit(function(){
		if($('#email').val().length==0){alert("mail vacio");return false;}
		if($('#nombreapellido').val().length==0){alert("nombre y apellido vacio");return false;}
		var alumnoPattern = /\w+\d{3}\@ikasle\.ehu\.(eus|es)$/;
		var profePattern = /(\w+\.\w+|\w+)\@ehu\.(eus|es)$/;
		if($('#profesor').is(':checked')){
			if(!profePattern.test($('#email').val())){
				alert("mail incorrecto");
				return false;
			}
		}
		else{
			if(!alumnoPattern.test($('#email').val())){
				alert("mail incorrecto");
				return false;
			}
		}
	});
}