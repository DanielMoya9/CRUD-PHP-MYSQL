<?php

include('connection.php');
$con = connection();

$sql = "SELECT users.id AS user_id, users.nombre, users.apellido, users.username, users.password, users.email, users.telefono , users.Rol, posts.id AS post_id, posts.titulo, posts.contenido
        FROM users
        LEFT JOIN posts ON users.id = posts.user_id";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuarios registrados</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 30px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        thead th {
            background-color: #f2f2f2;
        }
        h2 {
            margin-top: 40px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Usuarios registrados</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>EMAIL</th>
                <th>TELEFONO</th>
                <th>ROL</th>
                <th>TITULO</th>
                <th>EDITAR USUARIO</th>
                <th>ELIMINAR USUARIO</th>
                <th>EDITAR POSTS</th>
                <th>ELIMINAR POSTS</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($query)) { ?>
            <tr>
                <th><?= $row['user_id'] ?></th>
                <th><?= $row['nombre'] ?></th>
                <th><?= $row['apellido'] ?></th>
                <th><?= $row['username'] ?></th>
                <th>******</th>
                <th><?= $row['email'] ?></th>
                <th><?= $row['telefono'] ?></th>
                <th><?= $row['Rol'] ?></th>
                <th><?= $row['titulo'] ?></th>
                <th><a href="update.php?id=<?= $row['user_id'] ?>">EDITAR</a></th>
                <th><a href="delete_user.php?id=<?= $row['user_id'] ?>" onclick="return confirm('¿Está seguro de eliminar este usuario?')">ELIMINAR</a></th>
                <th>
                    <?php if ($row['post_id']) { ?>
                        <a href="update-posts.php?id=<?= $row['post_id'] ?>">Editar posts</a>
                    <?php } ?>
                </th>
                <th>
                    <?php if ($row['post_id']) { ?>
                        <a href="delete_post.php?id=<?= $row['post_id'] ?>" onclick="return confirm('¿Está seguro de eliminar este post?')">Eliminar post</a>
                    <?php } ?>
                </th>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>