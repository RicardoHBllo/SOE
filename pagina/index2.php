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
    <h2>Bienvenido <?php echo $_SESSION["usuario"]; ?></h2>
    <p><strong> Este sistema te permite encontrar objetos extraviados, de preferencia en la facultad de Ciencias de la Computacion de la Benemerita Universidad Autonoma de Puebla, ubicada en Ciudad Universitaria.</strong></p>
    <p>Te invitamos a ayudar a las personas a encontrar sus objetos extraviados. </p>
  </div>
</div>
<div id="footer">
  <p>Copyright (c) 2006 Sitename.com. All rights reserved. Design by <a href="http://freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
</body>
</html>
