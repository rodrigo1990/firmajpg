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
	<title>Document</title>
</head>
<body>

	<table>
		<thead>
			<tr>
				<th>
					Nombre
				</th>
				<th>
				    Apellido
				</th>

				<th>
				    Documento
				</th>
				<th>
				    Email
				</th>
				<th>
					Imagen
				</th>
			</tr>
		</thead>
	<tbody>

	<tr>
		<?php 
			while ($fila = mysqli_fetch_assoc($consulta)):
	 	?>
			<td><?php  echo $fila['nombre']?></td>
			<td><?php  echo $fila['apellido']?></td>
			<td><?php  echo $fila['documento']?></td>
			<td><?php  echo $fila['email']?></td>
			<td>
				
				<img src="<?php  echo $fila['imagen']?>" alt="">	
				
					
			</td>

		<?php
			endwhile;
		?>
	</tr>
	
</body>
</html>