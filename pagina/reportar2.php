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
 }else {if($_SESSION['tipo']==0){
 session_destroy();
 header("Location:index.php");
 }}
?>
<div id="header">
  <ul id="menu">
    <li><a href="index2.php" accesskey="1">Inicio</a></li>
    <li><a href="objetosreportadoscliente.php" accesskey="2">Objetos reportados</a></li>
	<li><a href="reportar.php" accesskey="4">Reportar objetos</a></li>
    <li><a href="salir.php" accesskey="5">salir</a></li>
  </ul>
</div>
<div id="content">
  <div id="colOne">
    <div id="logo">
      <h1><a href="#">SOE</a></h1>
      <h2>Sistema de objetos extraviados. </h2>
    </div>
    <div class="box">
      <h3>Avisos</h3>
      <ul class="bottom">
        <span class="Estilo1">Aviso 1        </span>
        <li class="first Estilo1"></li>
        <li class="Estilo1">Aviso2</li>
      </ul>
    </div>
  </div>
  <div id="colTwo">
    <?php
	
	$est=$_REQUEST['estatus'];
	$nom=$_REQUEST['nombre_objeto'];
	$des=$_REQUEST['descripcion_objeto'];
	$img=$_FILES['imagen']['name'];
	
	echo "<h2>Registro exitoso</h2>";
	echo "Estatus: $est <br>"; 
	echo "Nombre del objeto: $nom <br>";
	echo "Descripcion del objeto: $des <br>";
	echo "Imagen name: $img <br>";

	$link = mysqli_connect("localhost","root","");
	mysqli_select_db($link,"objsExtra");
	$result=mysqli_query($link,"select nombre from objetos where nombre='$nom';");
	
	if($row=mysqli_fetch_array($result)){
		header("Location:reporteexistente.php");
	}
	else{
		mysqli_query($link,"INSERT INTO objetos(nombre,descripcion,imagen) VALUES('$nom','$des','$img');");
		echo "Imagen: <img src='mis_imagenes/$img' width='70' height='60'> <br>";
	}

	$carpetaDestino="mis_imagenes/";
	$origen=$_FILES["imagen"]["tmp_name"];
	$destino=$carpetaDestino.$_FILES["imagen"]["name"];
	copy($origen,$destino);

	$rs=mysqli_query($link,"SELECT MAX(id_objeto) AS id FROM objetos;");
	if ($row=mysqli_fetch_row($rs)) {
		$id=trim($row[0]);
		//echo "ultimo id: $id <br>";
	}

	$id_usu=$_SESSION['IDusuario'];
	mysqli_query($link,"INSERT INTO reportes(id_usuario,id_objeto,fecha,estatus) VALUES('$id_usu','$id',CURDATE(),'$est');");
?>
</div>
</div>
<div id="footer">
  <p>Copyright (c) 2006 Sitename.com. All rights reserved. Design by <a href="http://freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
</body>
</html>
