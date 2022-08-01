<?php include_once("conexion.php"); 
    
	$nombre 	= $_POST['nombre'];
    $precio 	= $_POST['precio'];
    $stock  	= $_POST['stock'];
    
	mysqli_query($conn, "INSERT INTO productos(nombre,precio,stock) VALUES('$nombre','$precio','$stock')");
    
header("Location:productos.php");
	 
?>
<script src="form.js"></script>