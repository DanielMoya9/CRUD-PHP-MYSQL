<?php //INICIO DE LA PAGINA ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
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
    <style>
        .error-message {
            color: red;
            background-color: #ffe6e6;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ff9999;
            border-radius: 5px;
        }

        .success-message {
            color: green;
            background-color: #e6ffe6;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #99ff99;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input:invalid {
            border-color: #ff6b6b;
        }

        .form-group input:valid {
            border-color: #51cf66;
        }
    </style>
</head>

<body>
    <div>
        <!-- Mostrar mensajes de error y éxito -->
        <?php
        if (isset($_GET['error']) && $_GET['error'] === 'validacion') {
            $errores = explode("|", urldecode($_GET['errores']));
            echo "<div class='error-message'>";
            echo "<h4>Errores de validación:</h4>";
            echo "<ul>";
            foreach ($errores as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            echo "</div>";
        }

        if (isset($_GET['success']) && $_GET['success'] === 'usuario_creado') {
            echo "<div class='success-message'>";
            echo "<p>¡Usuario creado exitosamente!</p>";
            echo "</div>";
        }

        // Mantener compatibilidad con errores antiguos
        if (isset($_GET['error']) && $_GET['error'] === 'contraseñas_no_coinciden') {
            echo "<div class='error-message'>";
            echo "<p>Las contraseñas no coinciden.</p>";
            echo "</div>";
        }

        if (isset($_GET['error']) && $_GET['error'] === 'campos_vacios') {
            echo "<div class='error-message'>";
            echo "<p>Todos los campos son obligatorios.</p>";
            echo "</div>";
        }
        ?>

        <form action="insert_user.php" method="POST" onsubmit="return validarFormulario()">
            <h1>Crear usuario</h1>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]{2,50}"
                    title="Solo letras, mínimo 2 caracteres" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" placeholder="Apellido"
                    pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]{2,50}" title="Solo letras, mínimo 2 caracteres" required>
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Username" pattern="[A-Za-z0-9]{3,20}"
                    title="Solo letras y números, 3-20 caracteres" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" placeholder="Contraseña"
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d@$!%*?&]{8,}$"
                    title="Mínimo 8 caracteres, al menos 1 mayúscula, 1 minúscula y 1 número" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirmar Contraseña:</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirma contraseña"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Email"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un email válido" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" placeholder="Teléfono"
                    pattern="\d{10}" title="Debe ser un número de 10 dígitos" required >
            </div>

            <div class="form-group">
                <label for="Rol">Rol:</label>
                <input type="text" name="Rol" id="Rol" placeholder="Rol" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]{2,20}"
                    title="Solo letras, 2-20 caracteres" required>
            </div>

            <input type="submit" value="Agregar usuario">

            <br>
            <br>
            <a href="usuarios.php">Ver usuarios registrados</a>
            <BR></BR>
            <a href="inicio_sesion.php">LOGIN</a>
        </form>
    </div>

    <div>
        <form action="insert_post.php" method="POST">
            <h1>Crear post</h1>
            <select name="user_id" required>
                <option value="">Seleccione un usuario</option>
                <?php
                // Consulta para mostrar usuarios en el select
                $users = mysqli_query($con, "SELECT id, nombre FROM users");
                while ($u = mysqli_fetch_array($users)) {
                    echo "<option value='{$u['id']}'>{$u['nombre']}</option>";
                }
                ?>
            </select>
            <input type="text" name="titulo" placeholder="Título del post" required>
            <textarea name="contenido" placeholder="Contenido" required></textarea>
            <input type="submit" value="Agregar post">
            <br>
            <br>
            <br>
        </form>
    </div>

    <!-- JavaScript para validaciones adicionales -->
    <script>
        function validarFormulario() {
            const nombre = document.getElementById('nombre').value;
            const apellido = document.getElementById('apellido').value;
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const confirm_password = document.getElementById('confirm_password').value;
            const email = document.getElementById('email').value;
            const telefono = document.getElementById('telefono').value;
            const rol = document.getElementById('Rol').value;

            // Validar que no estén vacíos
            if (!nombre || !apellido || !username || !password || !confirm_password || !email  || !rol) {
                alert('Todos los campos son obligatorios');
                return false;
            }

            // Validar que las contraseñas coincidan
            if (password !== confirm_password) {
                alert('Las contraseñas no coinciden');
                return false;
            }

            // Validar longitud mínima de contraseña
            if (password.length < 8) {
                alert('La contraseña debe tener al menos 8 caracteres');
                return false;
            }

            // Validar formato de email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Ingresa un email válido');
                return false;
            }

            return true;
        }
    </script>
</body>

</html>