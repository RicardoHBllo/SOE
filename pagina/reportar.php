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
    <h2>Reportar objetos.  </h2>
    <p><strong> Registro a este sistema para poder publicar objetos extraviados ya sean tuyos o alguno que hayas encontrado.</strong></p>
    <p class="Estilo1">Te invitamos a ayudar a las personas a encontrar sus objetos extraviados. </p>
    <h2>¿Encontraste algo que parecia perdido?</h2>
	<form action="reportar2.php" method="POST" enctype="multipart/form-data">
		<h3>Reporta aqui. </h3><br>
		<span>Objeto perdido: </span>
                <input type="radio" name="estatus" value="0" CHECKED><br>
		<span>Objeto encontrado: </span>
        		<input type="radio" name="estatus" value="1" >
			    </br>
			    </br>
		<span>Nombre del objeto: </span>
                <input type="text" name="nombre_objeto" size="40" required>
			    </br>
			    </br>
		<p>Descripcion del objeto: </p>
                <textarea cols="30" rows="4" name="descripcion_objeto">Descripcion breve...</textarea>
			    </br>
			    </br>
		<p>Imagen(que sea .jpg):</p>
		  <input type="file" name="imagen" accept='image/jpg'/>
		
		<input type="submit" value="enviar datos"/>
		</br>
		</br>
    </form>
  </div>
</div>
<div id="footer">
  <p>Copyright (c) 2006 Sitename.com. All rights reserved. Design by <a href="http://freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
</body>
</html>
