<?php 
   include("conexion.php"); 
   $link=Conectarse(); 
   $usu=$_GET['usu'];
//   echo "el valor es : $id";  
   mysqli_query($link,"delete from usuarios where usuario = '$usu'"); 
   header("Location: usuarios.php"); 
?> 
