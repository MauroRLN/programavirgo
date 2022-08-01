<?php
include_once("conexion.php");
 
$id_venta = $_GET['id_venta'];
 
mysqli_query($conn, "DELETE FROM ventas WHERE id_venta=$id_venta") or die("problemas en el select".mysqli_error($conn));
mysqli_close($conn); 
header("Location:ventas.php");

?>