<?php
include_once("conexion.php"); 
?>
<html>
<head>    
		<title> Tienda de informatica</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../sistema/css/style2.css"> 
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
    <table class="table">   
		<div id="barrabuscar">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar">
        <input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de producto">  
		</form>
		</div>
			<tr>
                <th colspan="5">
                    <h1>ventas</h1>
                    <th>
					<button id="btn-abrir-form" class="btn-abrir-form">agregar</button>
                    </th>
                </tr>
			<tr>
            <th>num.fila</th>
			<th>Código venta</th>
            <th>codigo producto</th>
            <th>codigo usuario</th>
            <th>fecha</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryventas = mysqli_query($conn, "SELECT id_venta,id,user_id,fecha FROM ventas where id_venta like '".$buscar."%'");
}
else
{
$queryventas = mysqli_query($conn, "SELECT * FROM ventas ORDER BY id_venta asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryventas)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_venta']."</td>";
            echo "<td>".$mostrar['id']."</td>";
            echo "<td>".$mostrar['user_id']."</td>"; 
            echo "<td>".$mostrar['fecha']."</td>";     
            echo "<td style='width:26%'>
            <a href=\"editar_venta.php?id=$mostrar[id_venta]\">Modificar</a> | <a href=\"eliminar_venta.php?id=$mostrar[id_venta]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[id_venta]?')\">Eliminar</a></td>";           
}
        ?>
    </table>
		<div class="overlay" id="overlay">
			<div class="formulario">
			<a href="#" id="btn-cerrar-form" class="btn-cerrar-form"> cerrar<i class="fas fa-times"></i></a>
			<h1 class="titulo_form">añadir</h1>
				<form action="agregarVenta.php" class="form_cont" method="post">
					<table>
						<br>
						<label for="" class="form_label">codigo de producto</label>
						<input type="number" class="form_input" name="id">
						<br>
						<label for="" class="form_label">codigo de usuario</label>
						<input type="number" class="form_input" name="user_id">
						<br>
						<input type="submit" class="form_submit">
					</table>
				</form>	
		</div>
	
	</div>
	<script src="formventa.js"></script>
    

</body>
</html>