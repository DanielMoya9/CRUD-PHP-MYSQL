<?php //INICIO DE LA PAGINA ?>

<?php
include('connection.php');
$con = connection();

// Consulta con LEFT JOIN para obtener usuarios y sus posts
$sql = "SELECT users.id AS user_id, users.nombre, users.apellido, users.username, users.password, users.email,users.Rol, posts.id AS post_id, posts.titulo, posts.contenido
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
            <input type="text" name ="Rol" placeholder ="Rol"><?php //CAMPO PARA Rol DEL USUARIO?>


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
                    <th>titulo</th>
                    <th>Rol</th>
                   
                    
                    <TH></TH>
                    <TH></TH>
                </tr>
            </thead>
            <tbody>
                <?php  while($row= mysqli_fetch_array( $query)){; ?> <?php //CICLO WHILE- ROW: REGISTRO O UNIDAD COMPLETA DE DATOS La función mysqli_fetch_array() toma el resultado de una consulta ($query) y devuelve una fila por vez?>
                <tr>

                    <th> <?= $row['user_id'] ?></th>
                    <th><?= $row['nombre'] ?></th>
                    <th><?= $row['apellido'] ?></th>
                    <th><?= $row['username'] ?></th>
                    <th>******</th>
                    <th><?= $row['email'] ?></th>                  
                    <th><?= $row['titulo'] ?></th>
                    <th><?= $row['Rol'] ?></th>
                   
                    
                    
                    <th><a href="update.php?id= <?= $row['user_id'] ?>">EDITAR</a></th> <?php  //BOTON EDITAR USUARIO--update.php LLAMA LA FUNCION ?>
                         
                    <th><a href="delete_user.php?id= <?= $row['user_id'] ?>">ELIMINAR</a></th> <?php  //BOTON ELIMINAR USUARIO -- delete_user.php LLAMA LA FUNCION?>
                         
                    
                     <th>
                        <?php if ($row['post_id']) { ?>
                            <a href="update-posts.php?id=<?= $row['post_id'] ?>">Editar posts</a>
                        <?php } ?>
                    </th>
                    <th>
                        <?php if ($row['post_id']) { ?>
                            <a href="delete_post.php?id=<?= $row['post_id'] ?>">Eliminar post</a>
                        <?php } ?>
                    </th>



                </tr>
                <?php } ?>
            </tbody>
            
        </table>

    </div>
</body>
</html>