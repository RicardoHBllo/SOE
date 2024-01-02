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

	$link = mysqli_connect("localhost","root","");
	mysqli_select_db($link,"objsExtra");

	$result=mysqli_query($link,"select * from objetos");
	
	echo "<table border='1'>";
	echo "<TR><TD> ID </TD><TD> Nombre </TD><TD> Descripcion </TD><TD> Imagen </TD><TD> Entregar </TD></TR>";

	while ($row=mysqli_fetch_array($result)) {
		$id=$row['id_objeto'];
		$nom=$row['nombre'];
		$des=$row['descripcion'];
		$img=$row['imagen'];
		echo "<TR><TD> $id</TD><TD> $nom </TD><TD> $des </TD><TD> <img src='mis_imagenes/$img' width='70' height='60'> </TD><TD> <a href='entregar2.php?id_objeto=$id & nombre_objeto=$nom'>Entregar objeto</a> </TD></TR>";
	}

	echo "</table><br><br>";

	$result=mysqli_query($link,"select * from reportes");

	echo "<br><table border='1'>";
	echo "<TR><TD> ID_reporte </TD><TD> ID_usuario </TD><TD> ID_objeto </TD><TD> Fecha de publicacion </TD><TD> Estatus </TD></TR>";

	while ($row=mysqli_fetch_array($result)) {
		$idr=$row['id_reporte'];
		$idu=$row['id_usuario'];
		$ido=$row['id_objeto'];
		$fec=$row['fecha'];
		if ($row['estatus']=='0') {
			$est='Perdido';
		}
		elseif ($row['estatus']=='1') {
			$est='Encontrado';
		}
		elseif ($row['estatus']=='2') {
			$est='Entregado';
		}
		echo "<TR><TD> $idr </TD><TD> $idu </TD><TD> $ido </TD><TD> $fec </TD><TD> $est </TD></TR>";
	}

	echo "</table><br>";

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
