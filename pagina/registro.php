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
    <li><a href="objetosreportados.php" accesskey="2">Objetos Reportados</a></li>
    <li><a href="registro01.php" accesskey="3">Registro</a></li>
    <li><a href="acceso.php" accesskey="4">Acceso</a></li>
    <li><a href="contacto.php" accesskey="5">Contacto</a></li>
  </ul>
  .</div>
<div id="content">
  <div id="colOne">
    <div id="logo">
      <h1><a href="#">SOE</a></h1>
      <h2>Sistema de Objetos extraviados </h2>
    </div>
    <div class="box">
      <h3>Avisos</h3>
      <ul class="bottom">
        <li class="first Estilo1">Aviso 1</li>
        <li class="first Estilo1">Aviso 2  </li>
      </ul>
    </div>
    .</div>
  <div id="colTwo">
    <h2>Registro de nuevos usuarios </h2>
    
    <p>
<?PHP
$usu=$_GET['usuario'];
$nom=$_GET['nombre'];

echo "<br>Nombre Completo : <B> $nom </B><br>";
echo "<br>Usuario: <B>$usu </B>";
?>
<FORM Action="registro2.php" method ="POST">
  <br>
  Contraseña:
  <input type="password" name="password" size="20" required/> 
  <span class="Estilo3">*</span><br>
  <br>
  Dirección:
  <input type="text" name="direccion" size="50" /> 
  <br>
  <br>
  Telefono:
  <input type="text" name="telefono" size="20" /> 
  <br>
  <br>
  Correo Electrónico:
  <input type="text" name="mail" size="20" required/> 
  <span class="Estilo3">*</span><br>
  <input type="hidden" name="nombre" value="<?php echo $nom ?>"/>
  <input type="hidden" name="usuario" value="<?php echo $usu ?>"/>
  <br>
   <input type="submit" name="enviar" value=" Registrarse "/>
</FORM>
	</p>
    <p class="indent Estilo2">&nbsp;</p>
    <p class="indent">&nbsp;</p>
    <p class="indent">&nbsp;</p>
    <p>.</p>
    <p>&nbsp;</p>
    <p>.</p>
  </div>
</div>
<div id="footer">
  <p>Página CSS de https://www.free-css.com/free-css-templates/page13/integral<a href="http://freecsstemplates.org/"></a></p>
</div>
</body>
</html>
