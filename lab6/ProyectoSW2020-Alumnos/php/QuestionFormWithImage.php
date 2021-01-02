<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

     
	<form id='fquestion' name='fquestion' action='AddQuestion.php'>
	  Email*:<input type="text" id="mail"><br>
	  Enunciado de la pregunta*:<input type="text" id="pregunta"><br>
	  Respuesta correcta*:<input type="text" id="preCorrecta"><br>
	  Respuesta incorrecta*:<input type="text" id="preIncorrecta1"><br>
	  Respuesta incorrecta*:<input type="text" id="preIncorrecta2"><br>
	  Respuesta incorrecta*:<input type="text" id="preIncorrecta3"><br>
	  Complejidad*:<select id="complejidad">
	  <option value=1>Baja</option>
	  <option value=2>Media</option>
	  <option value=3>Alta</option>
	  </select><br>
	  Tema:*<input type="text" id="tema"><br> 
	  Imagen:(opcional)<input type="file"  id="archivo" oninput="showImage()"><br>
	  <input type="submit" value="Enviar datos" id="subir" onclick="start()">
	  
	  </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/ValidateFieldsQuestion.js"></script>
  <script src="../js/ShowImageInForm.js"></script>
</body>
</html>
