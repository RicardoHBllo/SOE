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
    <h2>Usuarios. </h2>
    <?php 
   $link = mysqli_connect("localhost","root","");
   mysqli_select_db($link,"objsExtra");
   $result=mysqli_query($link,"select * from usuarios;");

   echo "<table border='1'>";
   echo "<TR><TD> ID </TD><TD> Usuario </TD><TD> Nombre </TD><TD> Password </TD><TD> Direccion </TD><TD> Telefono </TD><TD> Correo </TD><TD> Tipo de usuario </TD><TD> Eliminar </TD><TD> Actualizar </TD></TR>";

   while ($row=mysqli_fetch_array($result)) {
      $id=$row['id_usuario'];
      $usu=$row['usuario'];
      $nom=$row['nombre'];
      $psw=$row['password'];
      $dir=$row['direccion'];
      $tel=$row['telefono'];
      $mail=$row['correo'];
      if ($row['tipo']=='1') {
         $tip='Cliente';
      }
      else
         $tip='Admin';

      echo "<TR><TD> $id </TD><TD> $usu </TD><TD> $nom </TD><TD> $psw </TD><TD> $dir </TD><TD> $tel </TD><TD> $mail </TD><TD> $tip </TD><td><center>
          <a onclick=\"return confirmSubmit()\"href='borrar2new.php?usu=$usu'><img src='eliminar.bmp' width='14' height='14' border='0'></a>
         </center>
           </td>
         <td><center>
         <a href='actualizanew.php?usuario=$usu'><img src='actualiza.jpg' width='25' height='25' border='0'></a>
         </center></td></TR>";

      

    /*printf("<tr><td>%d</td><td>%s</td><td>%s</td>
	       <td><center>
          <a onclick=\"return confirmSubmit()\"href=\"borrar2new.php?id_pelicula=%s\"><img src='eliminar.bmp' width='14' height='14' border='0'></a>
		   </center>
           </td>
		   <td><center>
		   <a href=\"actualizanew.php?id_pelicula=%s\"><img src='actualiza.jpg' width='25' height='25' border='0'></a>
		   </center></td>
		   </tr>",$id,$usu,$nom,$psw,$dir,$tel,$mail,$tip);*/
   } 
   echo "</table><br><br>";
   echo "<h3>Añadir nuevo usuario...<a href='admregistro01.php'><img src='aniadir.jpg' width='18' height='18' border='0'></a></h3><br><br>";
   mysqli_free_result($result); 
   mysqli_close($link); 
?> 
  </div>
</div>
<div id="footer">
  <p>Copyright (c) 2006 Sitename.com. All rights reserved. Design by <a href="http://freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
</body>
</html>
