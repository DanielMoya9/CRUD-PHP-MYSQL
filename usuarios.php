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
        #tabla-container {
            overflow-x: auto;
            max-width: 100%;
            margin-top: 15px;
        }

        .tabla-scroll {
            overflow-x: auto;
            max-width: 100%;
            border: 1px solid #ccc;
        }

        /* Para evitar que se rompa el diseño interno */
        table {
            min-width: 800px;
            /* o lo que necesites */
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: normal;

        }

        thead th {
            background-color: #f2f2f2;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            text-align: center;


        }

        h2 {
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h2>Usuarios registrados</h2>

    <!-- Filtro de usuario -->
    <label for="filtro">Filtrar por nombre:</label><!-- select para elegir un usuario de la base de datos -->
    <input type="text" id="filtro" placeholder="nombre, apellido, email">

    <button onclick="toggleTabla()">MOSTRAR TABLA</button>

    <!-- Tabla con datos -->
    <div id="tabla-container" style="display: none; margin-top: 20px;">
        <table border="1" cellspacing="0" cellpadding="8">
            <thead>
                <tr> <!-- TITULOS DE LOS CAMPOS -->
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>EMAIL</th>
                    <th>TELEFONO</th>
                    <th>ROL</th>
                    <th>TITULO</th>
                    <th colspan="4">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                mysqli_data_seek($query, 0);//MUESTRA LOS REGISTROS DE LOS USUARIOS INGRESADOS
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr class="fila" 
                        data-nombre="<?= strtolower($row['nombre']) ?>"
                        data-apellido="<?= strtolower($row['apellido']) ?>"
                        data-email="<?= strtolower($row['email']) ?>"
                        data-Rol="<?= strtolower($row['Rol']) ?>">
                        <td><?= $row['user_id'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td><?= $row['apellido'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td>******</td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['telefono'] ?></td>
                        <td><?= $row['Rol'] ?></td>
                        <td><?= $row['titulo'] ?></td>
                        <td><a href="update.php?id=<?= $row['user_id'] ?>">Editar usuario</a></td>
                        <td><a href="delete_user.php?id=<?= $row['user_id'] ?>"
                                onclick="return confirm('¿Eliminar usuario?')">Eliminar</a></td>
                        <td>
                            <?php if ($row['post_id']) { ?>
                                <a href="update-posts.php?id=<?= $row['post_id'] ?>">Editar post</a>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($row['post_id']) { ?>
                                <a href="delete_post.php?id=<?= $row['post_id'] ?>"
                                    onclick="return confirm('¿Eliminar post?')">Eliminar</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Scripts -->
    <script>
        function toggleTabla() {
            const tabla = document.getElementById("tabla-container");
            tabla.style.display = tabla.style.display === "none" ? "block" : "none";
        }

        // Filtrar por nombre
        document.getElementById("filtro").addEventListener("change", function () {//getElementById ESTO BUSCA UN ELEMENTO HTML CON EL ID 'NOMBRE' Y addEventListener ES UN ESCUCHADOR DE EVENTOS, 
            const valor = this.value.toLowerCase();//this: selecciona el select actual - value:toma el nombre. toLowerCase(): convierte a minusculas el nombre 
            document.querySelectorAll(".fila").forEach(fila => { //Selecciona todas las filas (<tr>) con la clase "fila"
                const nombre = fila.getAttribute("data-nombre");//Lee el atributo data-nombre de la fila.
                const apellido = fila.getAttribute("data-apellido");
                const email = fila.getAttribute("data-email");
                const Rol = fila.getAttribute("data-Rol");

                const coincide = nombre.includes(valor) || apellido.includes(valor) || email.includes(valor) || Rol.includes(valor);

                fila.style.display = valor === "" || coincide ? "table-row" : "none"; //Esta línea decide si mostrar o esconder la fila.

            });
        });
    </script>
</body>