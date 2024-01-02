<html> 
<head> 
   <title>Ejemplo de Eliminación</title> 

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

<H2>Eliminación de Registros en la tabla usuarios</H2> 

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
          <a onclick=\"return confirmSubmit()\"href=\"borrar2new.php?id_pelicula=%s\"><img src='eliminar.bmp' width='14' height='14' border='0'></a>
         </center>
           </td>
         <td><center>
         <a href=\"actualizanew.php?id_pelicula=%s\"><img src='actualiza.jpg' width='25' height='25' border='0'></a>
         </center></td></TR>";
         
   } 
   echo "<br></table><br><br>";
   mysql_free_result($result); 
   mysql_close($link); 
?> 
</table> 
</body> 
</html> 

