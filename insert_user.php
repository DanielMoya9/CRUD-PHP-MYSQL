<?php
//CREAR USUARIOS

include('connection.php');
$con = connection();


$id = null;
$nombre = strtoupper(trim($_POST['nombre']));
$apellido = strtoupper(trim($_POST['apellido']));
$username = strtoupper(trim($_POST['username']));
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);
if ($password !== $confirm_password) {
    header("Location: index.php?error=contraseñas_no_coinciden");
    exit;
}
$email = strtoupper(trim($_POST['email']));
$Rol = strtoupper(trim($_POST['Rol']));

if (
    empty($nombre) ||
    empty($apellido) ||
    empty($username) ||
    empty($password) ||
    empty($email) ||
    empty($Rol)
) {
    // Puedes redirigir o mostrar un mensaje de error
    header("Location: index.php?error=campos_vacios");
    exit;
}

$sql = "INSERT INTO users VALUES ('$id','$nombre','$apellido','$username', '$password','$email', '$Rol')";
$query = mysqli_query($con, $sql);

if ($query) {
    header("location: index.php");
}
;
?>