<?php //INICIO DE LA PAGINA ?>

<?php
include('connection.php');
$con = connection();

// Consulta con LEFT JOIN para obtener usuarios y sus posts
$sql = "SELECT users.id, users.nombre, users.apellido, users.username, users.password, users.email, posts.titulo, posts.contenido
        FROM users
        LEFT JOIN posts ON users.id = posts.user_id";

$query = mysqli_query($con, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS CRUD</title>
</head>
<body>
    <div><?php //DICCIONARIO ?>
        <form action="insert_user.php" method="POST"> <?php //FORMULARIO?>
            <h1>Crear usuario</h1><?php //SECCION DE LA PAG?>
    
        <?php //CADA INPUT ES UN CAMPO NECESARIO PARA LA CREACION DE UN USUARIO ?>
            <input type="text" name ="nombre"placeholder ="nombre"><?php  //PLACEHOLDER ES PARA INDICAR QUE DEBE IR EN CADA CAMPO?> 
            <input type="text" name ="apellido" placeholder ="Apellido">
            <input type="text" name ="username" placeholder ="Username">
            <input type="text" name ="password" placeholder ="password">
            <input type="text" name ="email" placeholder ="email">

             <input type="submit" value="Agregar usuario"><?php  //BOTÓN PARA AGREGAR EL USUARIO?>



        </form>
    </div>
    <div>
    <DIv>
        <form action="insert_post.php" method="POST">
    <h1>Crear post</h1>
    <select name="user_id">
        <?php
        // Consulta para mostrar usuarios en el select
        $users = mysqli_query($con, "SELECT id, nombre FROM users");
        while($u = mysqli_fetch_array($users)) {
            echo "<option value='{$u['id']}'>{$u['nombre']}</option>";
        }
        ?>
    </select>
    <input type="text" name="titulo" placeholder="Título del post">
    <textarea name="contenido" placeholder="Contenido"></textarea>
    <input type="submit" value="Agregar post">
        </form>
    </DIv>
        <h2>Usuarios registrados</h2><?php //SUBTITULO DE SECCION DE REGISTROS REALIZADOS ?>
        <table>
            <thead>
                <tr>
                    <TH>ID</TH> <?php  //TITULOS DE CADA CAMPO?>
                    <th>nombre </th>
                    <th>apellido </th>
                    <th>username </th>
                    <th>password</th>
                    <th>email</th>
                    <th>Título Post</th>
                    <th>Contenido Post</th>
                    <TH></TH>
                    <TH></TH>
                </tr>
            </thead>
            <tbody>
                <?php  while($row= mysqli_fetch_array( $query)){; ?> <?php //CICLO WHILE- ROW: REGISTRO O UNIDAD COMPLETA DE DATOS La función mysqli_fetch_array() toma el resultado de una consulta ($query) y devuelve una fila por vez?>
                <tr>

                    <th> <?= $row['id'] ?></th>
                    <th><?= $row['nombre'] ?></th>
                    <th><?= $row['apellido'] ?></th>
                    <th><?= $row['username'] ?></th>
                    <th><?= $row['password'] ?></th>
                    <th><?= $row['email'] ?></th>
                    <th><?= $row['titulo'] ?></th>
                    <th><?= $row['contenido'] ?></th>
                    
                    <th><a href="update.php?id= <?= $row['id'] ?>">EDITAR</a></th> <?php  //BOTON EDITAR USUARIO--update.php LLAMA LA FUNCION ?>
                         
                    <th><a href="delete_user.php?id= <?= $row['id'] ?>">ELIMINAR</a></th> <?php  //BOTON ELIMINAR USUARIO -- delete_user.php LLAMA LA FUNCION?>
                    
                </tr>
                <?php } ?>
            </tbody>
            
        </table>

    </div>
</body>
</html>