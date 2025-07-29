<?php

include('connection.php');
$con =connection();
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$Rol = $_POST['Rol']; // Agregar el campo Rol

$sql = "UPDATE  users SET  nombre='$nombre',apellido='$apellido',username='$username', password='$password',email='$email', Rol='$Rol'  WHERE id='$id'";
$query = mysqli_query($con ,$sql);

if($query){
    header("location: index.php");
};
?> 