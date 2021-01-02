function mostrarpreguntas(){
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{document.getElementById("preguntas").innerHTML=xmlhttp.responseText; }
}

xmlhttp.open("GET","ShowXmlQuestions.php",true);
xmlhttp.send();

	
	
}