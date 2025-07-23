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
$rolid = null;

$sql = "INSERT INTO users VALUES ('$id','$nombre','$apellido','$username', '$password','$email')";
$query = mysqli_query($con ,$sql);

if($query){
    header("location: index.php");
};
?>