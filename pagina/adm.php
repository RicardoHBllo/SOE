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
    <h2>Bienvenido Admin: <?php echo $_SESSION["usuario"]; ?> </h2>
    <p class="Estilo1">Hola admin, ahora puedes consultar y tambien administrar a los usuarios y los objetos perdidos u encontrados, ademas de los que hayan sido entregados. </p>
    </div>
</div>
<div id="footer">
  <p>Copyright (c) 2006 Sitename.com. All rights reserved. Design by <a href="http://freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
</body>
</html>
