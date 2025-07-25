//FORMA DE CONECTAR EL CODIGO CON LA BASE DE DATOS 
<?php

//FUNCION PARA MOSTRAR DONDE ESTA LA PAGINA 
function connection(){
    $host = "localhost"; //DONDE ESTA ALOJADO EL SERVIDOR
    $user = "root";      //USUARIO PARA EL LOCAL HOST
    $pass = "";          //CONTRASEÑA DEL USUARIO "EN ESTE CASO VACIA"
    $db   = "user_crud_php";//NOMBRE BASE DE DATOS 


    $connect = mysqli_connect($host, $user, $pass, $db);//METODO DE CONEXION CON LA BASE DE DATOS CON LOS CAMPOS DE ARRIBA
    if (!$connect) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    return $connect; //CONDICION
}

?>

