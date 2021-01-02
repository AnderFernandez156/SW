<?php  
if(isset($_SESSION['user'])){
    if($_SESSION['user']!="admin@ehu.es"){?>
        <div id='page-wrap'>
        <header class='main' id='h1'>
          <span class="right" ><a href="./LogOut.php">Logout</a><?php echo $_SESSION['user']?></span>
        
        </header>
        <nav class='main' id='n1' role='navigation'>
          <span><a href='Layout.php'>Inicio</a></span>
          <span><a href='ShowQuestions.php'> Ver Preguntas BD</a></span>
          <span><a href='HandlingQuizesAjax.php'> Preguntas</a></span>
          <span><a href='Credits.php'>Creditos</a></span>
        </nav>
<?php
    }
    else{ ?>
        <div id='page-wrap'>
        <header class='main' id='h1'>
         <span class="right" ><a href="./LogOut.php">Logout</a><?php echo $_SESSION['user']?></span>
        
        </header>
        <nav class='main' id='n1' role='navigation'>
          <span><a href='Layout.php'>Inicio</a></span>
          <span><a href='HandlingAccounts.php'>Gestionar usuarios</a></span>
          <span><a href='Credits.php'>Creditos</a></span>
        </nav>
<?php 
    }
}
else{
?>
<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right"><a href="./SignUp.php">Registro</a></span>
  <span class="right"><a href="./LogIn.php">Login</a></span>
</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php'>Inicio</a></span>
  <span><a href='Credits.php'>Creditos</a></span>
</nav>
<?php }?>






		
