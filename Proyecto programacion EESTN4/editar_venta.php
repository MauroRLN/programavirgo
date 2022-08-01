<?php 
include_once("conexion.php");
include_once("ventas.php");

$codigo = $_GET['id'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM ventas WHERE id_venta=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['id_venta'];
    $id = $mostrar['id'];
    $user_id = $mostrar['user_id'];
	$fecha = $mostrar['fecha'];
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
		<tr><th colspan="2">Modificar producto</th></tr>
		     <tr> 
                <td>Codigo</td>
                <td><input type="number" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>id producto</td>
                <td><input type="number" name="txtid" value="<?php echo $id;?>" required></td>
            </tr>
            <tr> 
                <td>id usuario</td>
                <td><input type="number" name="txtuser_id" value="<?php echo $user_id;?>" required></td>
            </tr>
            <tr> 
                <td>fecha</td>
                <td><input type="date" name="txtfecha" value="<?php echo $fecha;?>"required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="ventas.php">Cancelar</a>
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
    $codigo1    = $_POST['txtcodigo'];
	$id1 	    = $_POST['txtid'];
    $user_id1 	= $_POST['txtuser_id'];
    $fecha1 	= $_POST['txtfecha']; 
      
    $querymodificar = mysqli_query($conn, "UPDATE ventas SET id='$id1',user_id='$user_id1',fecha='$fecha1' WHERE id_venta=$codigo1");

  	echo "<script>window.location= 'ventas.php' </script>";
    
}
?>
	