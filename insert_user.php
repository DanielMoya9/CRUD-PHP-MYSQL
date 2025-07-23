//CREAR USUARIOS
<?php

include('connection.php');
$con =connection();


$id = null;
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql = "INSERT INTO users VALUES ('$id','$nombre','$apellido','$username', '$password','$email')";//QUERY O SOLICITUD PARA INSERTAR LOS NUEVOS USUARIOS  
$query = mysqli_query($con ,$sql); //La función mysqli_fetch_array() toma el resultado de una consulta ($query) y devuelve una fila por vez

if($query){
    header("location: index.php");
};
?>