<?php 
include_once("conexion.php");
include_once("productos.php");

$codigo = $_GET['id'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM productos WHERE id=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['id'];
    $nombre = $mostrar['nombre'];
    $precio = $mostrar['precio'];
	$stock = $mostrar['stock'];
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
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>precio</td>
                <td><input type="text" name="txtprecio" value="<?php echo $precio;?>" required></td>
            </tr>
            <tr> 
                <td>stock</td>
                <td><input type="text" name="txtstock" value="<?php echo $stock;?>"required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="productos.php">Cancelar</a>
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
	$nombre1 	= $_POST['txtnombre'];
    $precio1 	= $_POST['txtprecio'];
    $stock1 	= $_POST['txtstock']; 
      
    $querymodificar = mysqli_query($conn, "UPDATE productos SET nombre='$nombre1',precio='$precio1',stock='$stock1' WHERE id=$codigo1");

  	echo "<script>window.location= 'productos.php' </script>";
    
}
?>
	