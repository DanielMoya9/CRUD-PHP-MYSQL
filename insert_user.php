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
$email= trim($_POST['email']);
$telefono=trim($_POST['telefono']);
$Rol=trim($_POST['Rol']);
if ($password !== $confirm_password) {
    header("Location: index.php?error=contraseñas_no_coinciden");
    exit;
}

if (
    empty($nombre) ||
    empty($apellido) ||
    empty($username) ||
    empty($password) ||
    empty($email) ||
    empty($telefono) ||
    empty($Rol)
) {
    // Puedes redirigir o mostrar un mensaje de error
    header("Location: index.php?error=campos_vacios");
    exit;
}
if ($password !== $confirm_password) {
    header("Location: index.php?error=contrasenas_no_coinciden");
    exit;
}

//  NO se hashea, se guarda directamente
$stmt = $con->prepare("INSERT INTO users (nombre, apellido, username, password, email, telefono, Rol) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $nombre, $apellido, $username, $password, $email, $telefono, $Rol);

if ($stmt->execute()) {
    header("Location: index.php?success=usuario_registrado");
    exit;
} else {
    echo "Error al registrar: " . $stmt->error;
}

/*$sql = "INSERT INTO users VALUES ('$id','$nombre','$apellido','$username', '$password','$email','$telefono', '$Rol')";
$query = mysqli_query($con, $sql);

if ($query) {
    header("location: index.php");
}
;*/
?>