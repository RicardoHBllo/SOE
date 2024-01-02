<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistema de objetos extraviados</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo1 {color: #000000}
-->
</style>
<script LANGUAGE="JavaScript">
function confirmSubmit()
{
var eli=confirm("Está seguro de eliminar este usuario?");
if (eli) return true ;
else return false ;
}
</script>
</head>
<body>
<?php
 session_start();
 if(!$_SESSION['usuario']){
 header("Location:index.php");
 }else {if($_SESSION['tipo']==1){
 session_destroy();
 header("Location:index.php");
 }}
?>
<div id="header">
  <ul id="menu">
    <li><a href="adm.php" accesskey="1">Inicio</a></li>
    <li><a href="consultaradm.php" accesskey="2">Consulta de objetos</a></li>
   <li><a href="entregaradm.php" accesskey="2">Entregar objetos</a></li>
   <li><a href="usuarios.php" accesskey="4">Usuarios</a></li>
    <li><a href="salir2.php" accesskey="3">Salir</a></li>
  </ul>
</div>
<div id="content">
  <div id="colOne">
    <div id="logo">
      <h1><a href="#">SOE</a></h1>
      <h2>Sistema de objetos extraviados. </h2>
    </div>
    <div class="box">
    </div>
  </div>
  <div id="colTwo">
    
    <?php
   include("conexion.php"); 
   $link=Conectarse(); 

//Creamos la sentencia SQL y la ejecutamos
   $id=$_REQUEST['id_usuario'];
   $usu=$_REQUEST['usuario'];
   $nom=$_REQUEST['nombre'];
   $psw=$_REQUEST['password'];
   $dir=$_REQUEST['direccion'];
   $tel=$_REQUEST['telefono'];
   $mail=$_REQUEST['correo'];
   $tip=$_REQUEST['tipo'];
   echo "Nombre: $nom <br>";
   echo "Usuario: $usu <br>";
   echo "Contraseña: $psw <br>";
   echo "Dirección: $dir <br>";
   echo "Telefono: $tel <br>";
   echo "Correo: $mail <br>";
  if ($tip=='1') {
    echo "Tipo de usuario: Cliente";
  }else echo "Tipo de usuario: Admin";
   $sSQL="Update usuarios Set usuario='$usu',nombre='$nom',password='$psw',direccion='$dir',telefono='$tel',correo='$mail',tipo='$tip' Where id_usuario='$id'";
   mysqli_query($link,$sSQL);

   echo "<h2>Actualizacion exitosa</h2><br><br>";

?>
<a href="usuarios.php">Regresar</a><br><br>

  </div>
</div>
<div id="footer">
  <p>Copyright (c) 2006 Sitename.com. All rights reserved. Design by <a href="http://freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
</body>
</html>
 