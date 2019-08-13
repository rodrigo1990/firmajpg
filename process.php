<?php 
session_start();
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

$content = base64_decode($imagen[1]);

$name =''.rand(0,99999999999999).'.jpg'; 

$file = fopen('./firmas/'.$name.'','wb');

fwrite($file,$content);

fclose($file);


$conexion=mysqli_connect("localhost", "root", "", "firmajpg");

$fecha = date('Y-m-d');

$establecimiento = $_SESSION['establecimiento'];
	
$sql="INSERT INTO alumno(nombre, apellido, documento, email, imagen, fecha, establecimiento)
	VALUES('$nombre', '$apellido', $documento, '$email', '$name','$fecha', '$establecimiento')";


$consulta=mysqli_query($conexion, $sql);	

header('Location: index.php?enviado=true');


	
 ?>

