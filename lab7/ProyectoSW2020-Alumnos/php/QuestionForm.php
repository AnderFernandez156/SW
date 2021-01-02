<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

     
	  <form id='fquestion' name='fquestion' action='AddQuestion.php?email=<?php echo $_GET['email']?>' method="post">
	  Email*:<input type="text" id="mail" name="email" value="<?php echo $_GET['email']?>"><br>
	  Enunciado de la pregunta*:<input type="text" id="pregunta"  name="enunciado"><br>
	  Respuesta correcta*:<input type="text" id="preCorrecta"  name="preguntac"><br>
	  Respuesta incorrecta*:<input type="text" id="preIncorrecta1"  name="preguntai1"><br>
	  Respuesta incorrecta*:<input type="text" id="preIncorrecta2"  name="preguntai2"><br>
	  Respuesta incorrecta*:<input type="text" id="preIncorrecta3"  name="preguntai3"><br>
	  Complejidad*:<select id="complejidad"  name="complejidad">
	  <option value=1>Baja</option>
	  <option value=2>Media</option>
	  <option value=3>Alta</option>
	  </select><br>
	  Tema:*<input type="text" id="tema"  name="tema"><br>
	  <input type="submit" value="Enviar datos" id="subir" onclick="start()">
	  
	  </form>

    </div>
  </section>
  
  <?php include '../html/Footer.html' ?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/ValidateFieldsQuestion.js"></script>
  
  
	
</body>
</html>
