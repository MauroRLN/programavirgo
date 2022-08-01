<?php include_once("conexion.php"); 
 include_once("ventas.php");
    
	$id_venta 	= $_POST['id_venta'];
    $id 	    = $_POST['id'];
    $user_id  	= $_POST['user_id'];
    $fecha      =$_POST['fecha'];

	mysqli_query($conn, "INSERT INTO ventas(id_venta,id,user_id,fecha) VALUES('$id_venta','$id','$user_id','$fecha')");
    
header("Location:ventas.php");
	

?>