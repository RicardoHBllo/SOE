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
	if ($row=mysqli_fetch_array($rs)) {
		$id=trim($row[0]);
		//echo "ultimo id: $id <br>";
	}

	$id_usu=$_SESSION['IDusuario'];
	mysqli_query($link,"INSERT INTO reportes(id_usuario,id_objeto,fecha,estatus) VALUES('$id_usu','$id',CURDATE(),'$est');");
?>