<?PHP session_start();//debe estar en todas la paginas para seguridad
$usu=$_REQUEST['usuario'];
$psw=$_REQUEST['password'];
//echo "Usuario: $usu <br>";
//echo "Password: $psw <br>";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"objsExtra");

$result=mysqli_query($link,"select id_usuario,password,tipo from usuarios where usuario='$usu';");
if($row=mysqli_fetch_array($result)){
    //echo "Si existe el usuario: $usu <br>";
    if($row['password']==$psw){
        $val=$row['tipo'];
        $id=$row['id_usuario'];
        //echo "Si existe el usuario: $usu y esta registrado <br>";
        $_SESSION["usuario"]=$usu;
        $_SESSION["tipo"]=$val;
        $_SESSION["IDusuario"]=$id;
        
        if($val==1){
        header("Location:index2.php");
        }
        else{
        header("Location:adm.php");
        }
           
    }
    else{
    //echo "Password incorrecto <br>";
    header("Location:errorpassword.php");
    }
}

else{
//echo "No existe el cleinte <br>";
header("Location:errorusuario.php");
}

mysqli_free_result($result);
mysqli_close($link);
?>
