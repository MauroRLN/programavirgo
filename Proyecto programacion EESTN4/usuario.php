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
                    <h1>usuarios</h1>
                    <th>
					<button id="btn-abrir-form" class="btn-abrir-form">agregar</button>
                    </th>
                </tr>
			<tr>
            <th>num.fila</th>
			<th>Código</th>
            <th>Nombre</th>
            <th>correo</th>
            <th>telefono</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT id_usuario,nombre,correo,telefono FROM usuarios where nombre like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT * FROM usuarios ORDER BY id_usuario asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_usuario']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";
            echo "<td>".$mostrar['correo']."</td>"; 
            echo "<td>".$mostrar['telefono']."</td>";     
            echo "<td style='width:26%'>
            <a href=\"editar_usuario.php?id=$mostrar[id_usuario]\">Modificar</a>
			 | 
			 <a href=\"eliminar_usuario.php?id=$mostrar[id_usuario]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]?')\">Eliminar</a></td>";           
}
        ?>
    </table>
		<div class="overlay" id="overlay">
			<div class="formulario">
			<a href="#" id="btn-cerrar-form" class="btn-cerrar-form"> cerrar<i class="fas fa-times"></i></a>
			<h1 class="titulo_form">añadir</h1>
				<form action="agregarUsuario.php" class="form_cont" method="post">
					<table>
						<label for="" class="form_label">Nombre</label>
						<input type="text" class="form_input" name="nombre">
						<br>
						<label for="" class="form_label">correo</label>
						<input type="text" class="form_input" name="correo">
						<br>
						<label for="" class="form_label">telefono</label>
						<input type="number" class="form_input" name="telefono">
						<br>
						<input type="submit" class="form_submit">
					</table>
				</form>	
		</div>
	
	</div>
	<script src="userform.js"></script>
    

</body>
</html>