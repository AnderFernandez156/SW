function start(){

	$('#fquestion').submit(function(){
		if($('#mail').val().length==0){alert("mail vacio");return false;}
		if($('#pregunta').val().length==0){alert("pregunta vacia");return false;}
		if($('#preCorrecta').val().length==0){alert("respuesta correcta vacia");return false;}
		if($('#preIncorrecta1').val().length==0){alert("respuesta incorrecta vacia");return false;}
		if($('#preIncorrecta2').val().length==0){alert("respuesta incorrecta vacia");return false;}
		if($('#preIncorrecta3').val().length==0){alert("respuesta incorrecta vacia");return false;}
		if($('#tema').val().length==0){alert("tema vacio");return false;}
		var alumnoPattern = /\w+\d{3}\@ikasle\.ehu\.(eus|es)/;
		var profePattern = /(\w+\.\w+|\w+)\@ehu\.(eus|es)/;
		if(!alumnoPattern.test($('#mail').val()) && !profePattern.test($('#mail').val())){
			alert("mail incorrecto");
			return false;
		}
		if($('#pregunta').val().length<10){
			alert("pregunta demasiado corta");
			return false;
		}
	});
}

