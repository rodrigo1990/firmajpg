<?php
$conexion=mysqli_connect("localhost", "root", "", "firmajpg");
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=reporteAlumnos.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
	
	<title>Document</title>
</head>
<body>
<?php 
	


$sql="SELECT *
FROM alumno";
	

$consulta=mysqli_query($conexion, $sql);


?>
<table>


<tr>
<th>Nombre y apellido</th>
<th>Documento</th>
<th>Email</th>
<th>Establecimiento</th>
<th>Firma</th>
</tr>

<tbody>

<?php


while($fila=mysqli_fetch_assoc($consulta)):


	echo "<tr>
		<td>  ".$fila['nombre']."</td>
		<td>  ".$fila['documento']."</td>
		<td>  ".$fila['email']."</td>
		<td>  ".$fila['establecimiento']."</td>
		<td>  ".$fila['imagen']."</td>
	</tr>";



 endwhile;
?>	
	



	
</tbody>
</table>


</body>
</html>



