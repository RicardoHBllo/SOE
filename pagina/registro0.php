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
<div id="header">
  <ul id="menu">
     <li><a href="index.php" accesskey="1">Inicio</a></li>
    <li><a href="objetosreportados.php" accesskey="2">Objetos reportados</a></li>
	<li><a href="registro.php" accesskey="4">Registro</a></li>
    <li><a href="acceso.php" accesskey="3">Acceso</a></li>
    <li><a href="contacto.php" accesskey="5">Contacto</a></li>
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
    
	<?PHP
  $nom=$_REQUEST['nombre'];
  $usu=$_REQUEST['usuario'];
  
  echo "Nombre: $nom <br>";
  echo "Usuario: $usu <br>";
  $link=mysqli_connect("localhost","root","");
  mysqli_select_db($link,"objsExtra");
  $result=mysqli_query($link,"select usuario from usuarios where usuario='$usu'");
  
   if ($row=mysqli_fetch_array($result))
    {
     echo "<h2> USUARIO UTILIZADO </h2>";
     echo "<BR><BR>";
     echo "<A href='registro01.php'> Intentar con otro usuario </A>"; 
    }
  else {
        echo "usuario Nuevo <br>";
        header("Location:registro.php?usuario=$usu & nombre=$nom");
       }			 
?>
	
  </div>
</div>
<div id="footer">
  <p>Copyright (c) 2006 Sitename.com. All rights reserved. Design by <a href="http://freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
</body>
</html>
