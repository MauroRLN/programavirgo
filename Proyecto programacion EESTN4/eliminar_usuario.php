<?php
include_once("conexion.php");
 
$id_usuario = $_GET['id_usuario'];
 
mysqli_query($conn, "DELETE FROM usuarios WHERE id_usuario=$id_usuario") or die("problemas en el select".mysqli_error($conn));
mysqli_close($conn); 
header("Location:usuario.php");

?>