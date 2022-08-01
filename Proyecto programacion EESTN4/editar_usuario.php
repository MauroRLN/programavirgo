<?php 
include_once("conexion.php");
include_once("usuario.php");

$id_usuario = $_GET['id'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuario=$id_usuario");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $id_usuario = $mostrar['id_usuario'];
    $nombre = $mostrar['nombre'];
    $correo = $mostrar['correo'];
	$telefono = $mostrar['telefono'];
}
?>
<html>
<head>    
		<title>t4</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="formulario" id="formmodificar">
  <form method="POST" class="form_cont" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>Codigo</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $id_usuario;?>" required ></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>correo</td>
                <td><input type="text" name="txtcorreo" value="<?php echo $correo;?>" required></td>
            </tr>
            <tr> 
                <td>telefono</td>
                <td><input type="text" name="txttelefono" value="<?php echo $telefono;?>"required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="usuario.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
	
	if(isset($_POST['btnmodificar']))
{    
    $id_usuario1    = $_POST['txtcodigo'];
	$nombre1 	= $_POST['txtnombre'];
    $correo1 	= $_POST['txtcorreo'];
    $telefono1 	= $_POST['txttelefono']; 
      
    $querymodificar = mysqli_query($conn, "UPDATE usuarios SET nombre='$nombre1',correo='$correo1',telefono='$telefono1' WHERE id_usuario=$id_usuario1");

  	echo "<script>window.location= 'usuario.php' </script>";
    
}
?>
	