<?php
include_once("conexion.php"); 
?>
<html>
<head>    
		<title> Tienda de informatica</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../sistema/css/style.css"> 
</head>
<body>
<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰</label>
		</div>
	</header>
	<div class="capa"></div>
    <input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav>
			<a href="index.php">Inicio</a>
			<a href="productos.php">productos</a>
			<a href="usuario.php">usuarios</a>
			<a href="ventas.php">ventas</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div> 
    <table>   
		<div id="barrabuscar">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar">
        <input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de producto">  
		</form>
		</div>
			<tr>
                <th colspan="5">
                    <h1>productos</h1>
                    <th>
                        <a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a>
                    </th>
                </tr>
			<tr>
            <th>num.fila</th>
			<th>Código</th>
            <th>Nombre</th>
            <th>precio</th>
            <th>stock</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryproductos = mysqli_query($conn, "SELECT id,nombre,precio,stock FROM productos where nombre like '".$buscar."%'");
}
else
{
$queryproductos = mysqli_query($conn, "SELECT * FROM productos ORDER BY id asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryproductos)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";
            echo "<td>".$mostrar['precio']."</td>"; 
            echo "<td>".$mostrar['stock']."</td>";     
            echo "<td style='width:26%'>
            <a href=\"editar.php?id=$mostrar[id]\">Modificar</a> | <a href=\"eliminar.php?id=$mostrar[id]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]?')\">Eliminar</a></td>";           
}
        ?>
    </table>
	 <script>
function abrirform() {
  document.getElementById("formregistrar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}
</script>
<div class="caja_popup" id="formregistrar">
  <form action="agregar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nuevo producto</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="nombre" required></td>
            </tr>
            <tr> 
                <td>precio</td>
                <td><input type="number" name="precio" required></td>
            </tr>
            <tr> 
                <td>stock</td>
                <td><input type="number" name="stock" required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este usuario?');">
			</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>