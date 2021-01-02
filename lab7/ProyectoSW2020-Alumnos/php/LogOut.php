<?php session_start();
session_destroy();
$message = "Desconectando de tu perfil";
echo "<script>alert('$message');</script>";
echo "<script type='text/javascript'>window.location.href = 'Layout.php';</script>";
exit();
?>