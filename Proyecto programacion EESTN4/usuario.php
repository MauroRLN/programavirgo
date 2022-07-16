<?php
include_once("conexion.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
            </div>
            <tr>
                <th colspan="4">
                <h1>usuarios</h1>
                <th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a>
            </th>
            </tr>
            <tr>
                <th>codigo</th>
                <th>nombre</th>
                <th>correo</th>
                <th>telefono</th>
            </tr>
        <?php

        if(isset($_POST['btnbuscar']))
        {
            $buscar = $_POST['txtbuscar'];
            $queryusuarios = mysqli_query($conn,"SELECT user_id,nombre,correo,telefono FROM usuarios where nombre like'".$buscar."%'");

        }else {
            $queryusuarios = mysqli_query($conn, "SELECT * FROM usuarios ORDER BY user_id asc");
        }
                $numerofila = 0;
                while($mostrar = mysqli_fetch_array($queryusuarios))
                {
                    $numerofila++;
                    echo "<tr>";
                    echo "<td>".$numerofila."</td>";
                    echo "<td>".$mostrar['codigo']."</td>";
                    echo "<td>".$mostrar['nombre']."</td>";
                    echo "<td>".$mostrar['correo']."</td>";
                    echo "<td>".$mostrar['telefono']."</td>";
                    echo "<td style= 'width:26%'>
                    <a href=\"editar.php?id=$mostrar[user_id]\">Modificar</a>
                    <a href=\"eliminar.php?id=$mostrar[user_id]\" onclick=\"return confirm ('estas seguro de eliminar a $mostrar [nombre]?)\">Eliminar</a></td>";
                }

        ?>

        </table>
                  
        
        <script>
            //arreglar formulario que solo utiliza el de productos
            function abrirform()
            {
            document.getElementById("formregistrar").style.display = "block";
            }

            function cancelarform() 
            {
             document.getElementById("formregistrar").style.display = "none";
            }
        </script>
        <div class="caja_popup" id="formregistrar">
        <form action="AgregarUsuario.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nuevo usuario</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="nombre" required></td>
            </tr>
            <tr> 
                <td>correo</td>
                <td><input type="number" name="correo" required></td>
            </tr>
            <tr> 
                <td>telefono</td>
                <td><input type="number" name="telefono" required></td>
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