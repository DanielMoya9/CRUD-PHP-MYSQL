<?php

/*require_once 'connection.php';
$con = connection();


$result = $con->query('SELECT id, password, FROM users');
if (!$result) {
    die('Error en la consulta: ' . $con->error);
}
while ($user = $result->fetch_assoc()) {
    $id = $user['id'];
    $password = $user['password'];

    if (password_get_info($password)['algo'] === 0) {
        // No es un hash → la hasheamos
        $hashed = password_hash($password, PASSWORD_DEFAULT);
    }

    $update = $con->prepare('UPDATE users SET password = ? WHERE id = ?');
    $update->bind_param("si", $hashed, $id);
    if ($updated->execute()) {
        echo "CONTRASEÑA ACTUALIZADA PARA EL USUARIO CON ID: $id\n";
    } else {
        echo "CONTRASEÑA ACTUALIZADA PARA EL USUARIO CON ID: $id\n";
    }

    echo "EL USUARIO CON ID: $id YA TIENE UNA CONTRASEÑA ACTUALIZADA\n";

}


echo "ACTUALIZACION COMPLETA";*/
?>