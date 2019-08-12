<?php 
$nombre = $_POST['nombre'];

$apellido = $_POST['apellido'];

$documento = $_POST['documento'];

$email = $_POST['email'];

$imagen = explode(',',(string)$_POST['imagen']);


echo $nombre;
echo "<br>";
echo $apellido;
echo "<br>";
echo $documento;
echo "<br>";
echo $email;
echo "<br>";
echo $imagen;

$content = base64_decode($imagen[1]);

$name =''.rand(0,99999999999999).'.jpg'; 

$file = fopen('./'.$name.'','wb');

fwrite($file,$content);

fclose($file);


$conexion=mysqli_connect("localhost", "root", "", "firmajpg");

	
$sql="INSERT INTO alumno(nombre, apellido, documento, email, imagen)
	VALUES('$nombre', '$apellido', $documento, '$email', '$name')";


$consulta=mysqli_query($conexion, $sql);	
	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>¡GRACIAS POR SU FIRMA! </h1>
</body>
</html>