<?php
session_start();
require_once 'connection.php';
$con = connection();
$error_message="INCORRECTO";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = ( $_POST['username']);
    $password = ($_POST['password']);
}

    $stmt = $con->prepare("SELECT * FROM users WHERE username = ? ");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if ($password ===$user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit();
    }else {
        $error_message="";}
        header("Location: inicio_sesion.php". urlencode($error_message));
    exit;            

    }
    else {
        // Usuario no encontrado
        $error_message = "Usuario no encontrado.";
        header("Location: inicio_sesion.php?error=" . urlencode($error_message));
        exit;
}
?>