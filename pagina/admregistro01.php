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
      <h3>Avisos</h3>
      <ul class="bottom">
        <span class="Estilo1">Aviso 1        </span>
        <li class="first Estilo1"></li>
        <li class="Estilo1">Aviso2</li>
      </ul>
    </div>
  </div>
  <div id="colTwo">
    
    <p><form action="admregistro0.php" method="POST" id="form">
		<h2>Registro para añadir usuarios nuevos.  </h2>
		<p>Nombre completo: 
                <input type="text" name="nombre" size="50" required>
			    </br>
			    </br>
	  </p>
		<p>Nombre de usuario:
                <input type="text" name="usuario" size="50" required>
	  </p>
	  <button type="submit">Registrar</button>
    </form></p>
  </div>
</div>
<div id="footer">
  <p>Copyright (c) 2006 Sitename.com. All rights reserved. Design by <a href="http://freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
</body>
</html>
