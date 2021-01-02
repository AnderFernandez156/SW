<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	<h1>Preguntas almacenadas en XML</h1>
	<table>
		<tr>
			<th>AUTOR</th>
			<th>ENUNCIADO</th>
			<th>RESPUESTA</th>
		</tr>
	<?php 
	$xml = simplexml_load_file('../xml/Questions.xml');
		if(!$xml){
			echo "<h1>No se encuentra el fichero xml</h1>";
		}else{
			foreach($xml->assessmentItem as $item){
				$autor = $item["author"];
				$enunciado = $item->itemBody->p;
				$respuesta = $item->correctResponse->response;
				echo "<tr>";
				echo "<th>$autor</th>";
				echo "<th>$enunciado</th>";
				echo "<th>$respuesta</th>";
				echo "</tr>";
			}
		}
	
	?>
	</table>
	</div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>