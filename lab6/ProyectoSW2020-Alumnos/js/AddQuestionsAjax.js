function anadirpregunta(){
var formdata = {"email":$("#mail").val(),
"enunciado":$("#pregunta").val(),
"preguntac":$("#preCorrecta").val(),
"preguntai1":$("#preIncorrecta1").val(), 
"preguntai2":$("#preIncorrecta2").val(),
"preguntai3":$("#preIncorrecta3").val(),
"complejidad":$("#complejidad").val(),
"tema": $("#tema").val()
};
console.log(formdata);
$.ajax({
    type:"POST", 
    url:"../php/AddQuestion.php",
    data:formdata, 
    success:function(datos){ 
        $("#resultado").html(datos);
     },
    dataType: 'html' 
});




	
	
}