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
    <h2>Actualizacion de datos de usuario: </h2><br>
    <?php
   include("conexion.php"); 
   $link=Conectarse(); 
   $usu=$_GET['usuario'];
   //echo "<br> id Pelicula = $id";
   echo '<FORM METHOD="POST" ACTION="actualiza2new.php">';

   //Creamos la sentencia SQL y la ejecutamos
   //$sSQL="Select titulo,director, actor From pelicula where id_pelicula='$id'";
   //$result=mysql_query($sSQL);

   $result=mysqli_query($link,"select * from usuarios where usuario='$usu';");
   $row = mysqli_fetch_array($result);
   $id=$row['id_usuario'];
   $usu=$row['usuario'];
   $nom=$row['nombre'];
   $psw=$row['password'];
   $dir=$row['direccion'];
   $tel=$row['telefono'];
   $mail=$row['correo'];
   $tip=$row['tipo'];

   echo "Usuario: $usu<br>";
   echo "Nombre : <INPUT TYPE='text' NAME='nombre' value='$nom' SIZE='50'><br>";
   echo "Contraseña: <INPUT TYPE='text' NAME='password' value='$psw' SIZE='50'><br>";
   echo "Direccion : <INPUT TYPE='text' NAME='direccion' value='$dir' SIZE='50'><br>";
   echo "Telefono : <INPUT TYPE='text' NAME='telefono' value='$tel' SIZE='50'><br>";
   echo "Correo   : <INPUT TYPE='text' NAME='correo' value='$mail' SIZE='50'><br>";
   echo "Tipo de usuario cliente: <INPUT TYPE='radio' NAME='tipo' value='1' CHECKED><br>";
   echo "Tipo de usuario admin: <INPUT TYPE='radio' NAME='tipo' value='0'><br>";
   echo "<input type='hidden' name='id_usuario' value='$id'>";
   echo "<input type='hidden' name='usuario' value='$usu'>";

?>
   <br>
 
<INPUT TYPE="SUBMIT" value="Actualizar">
</FORM>

  </div>
</div>
<div id="footer">
  <p>Copyright (c) 2006 Sitename.com. All rights reserved. Design by <a href="http://freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
</body>
</html>

