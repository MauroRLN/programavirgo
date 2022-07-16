<?php
include_once("conexion.php");
 
$id = $_GET['id'];
 
mysqli_query($conn, "DELETE FROM productos WHERE id=$id") or die("problemas en el select".mysqli_error($conn));
mysqli_close($conn); 
header("Location:index.php");

?>