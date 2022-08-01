<?php include_once("conexion.php"); 
    
	$nombre 	= $_POST['nombre'];
    $correo 	= $_POST['correo'];
    $telefono 	= $_POST['telefono'];
    
	mysqli_query($conn, "INSERT INTO usuarios(nombre,correo,telefono) VALUES('$nombre','$correo','$telefono')");
    
header("Location:usuario.php");
	

?>
<script src="userform.js"></script>