<?php 


	$conexion=mysqli_connect("localhost", "root", "", "firmajpg");

 	$sql="SELECT *
          FROM alumno";
	$consulta=mysqli_query($conexion, $sql);



 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado</title>
	    <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
		<!-- ESTILOS -->
		<link rel="stylesheet" href="css/estilos.css">
</head>
<body>

	<div class="row">
		<div class="container">
			<h1 class="float-left">LISTADO</h1>


			<a href="descargar_xls.php" class="float-right" target="_blank">
				<h2>Descargar XLS</h2>
			</a>
		</div>
	</div>

	<div class="row">
		<div class="container-fluid">
			<table class="table center-block" style="">
					<thead>
						<tr>
							<th>
								Nombre
							</th>
						

							<th>
							    Documento
							</th>
							<th>
							    Email
							</th>
							<th>
							    Establecimiento
							</th>
							<th>
								Imagen
							</th>
						</tr>
					</thead>
				<tbody>

				
					<?php 
						while ($fila = mysqli_fetch_assoc($consulta)):
				 	?>
				 	<tr>
						<td><?php  echo $fila['nombre']?></td>
						<td><?php  echo $fila['documento']?></td>
						<td><?php  echo $fila['email']?></td>
						<td><?php  echo $fila['establecimiento']?></td>
						<td>
							
							<img src="./firmas/<?php  echo $fila['imagen']?>" alt="">	
							
								
						</td>
					</tr>
					<?php
						endwhile;
					?>
				
				</tbody>
			</table>		
		</div>
	</div>
	


<script src="js/jquery.js" type="text/javascript"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>