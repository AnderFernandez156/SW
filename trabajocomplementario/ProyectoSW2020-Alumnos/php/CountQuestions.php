<?php
session_start();
$xml = simplexml_load_file('../xml/Questions.xml');
if(!$xml){
	echo "<h1>No se encuentra el fichero xml</h1>";
}else{
    $countTotal = 0;
    $mycount = 0;
    foreach($xml->assessmentItem as $item){
		$autor = $item["author"];
		
	    if($autor==$_SESSION['user']){
	        $mycount++;
	    }
	    $countTotal++;
	}
	echo "Mis preguntas/Todas las preguntas: $mycount / $countTotal ";
}
	
?>