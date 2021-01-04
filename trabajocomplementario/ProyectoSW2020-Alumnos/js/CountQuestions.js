function countpreguntas(){

$.ajax({
    type:"POST",
    url:"../php/CountQuestions.php", 
    success:function(datos){
        $("#numPreguntas").html(datos);
     },
    dataType: 'html' 
});
    
}