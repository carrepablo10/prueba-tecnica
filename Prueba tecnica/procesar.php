<?php

/**
 * En este código se están definiendo cuatro variables (server,username,password,database) que contienen la información 
 * necesaria para conectarse a una base de datos MySQL en este caso con mi username creado en la base de datos Prueba, 
 * donde se le asignan todos los permisos y privilegios al usuario.
 */

$server = 'localhost';
$username = 'Prueba';
$password = '123';
$database = 'prueba_tecnica';


/**
 * Este código PHP utiliza la clase PDO para conectarse a una base de datos MySQL utilizando las variables definidas 
 * previamente ($server, $username, $password y $database).
 * este código se encarga de establecer una conexión con una base de datos MySQL utilizando la clase PDO de PHP
 */
try{
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
}catch(PDOException $e){
    die('Connection failed: ' . $e->getMessage());
    
    
}
/*session_start(); es una función en PHP que inicia una sesión en el servidor web y almacenar información de sesión en variables*/
session_start();

/* el codigo require lo utilizo para incluir la conexion de la base de datos, en este caso el archivo conexion.php
    donde se encuentra el codigo de la conexion a la base de datos */
require "./conexion.php";

/**
 * Este código PHP utiliza la función mysqli_connect() para conectarse a una base de datos MySQL 
 * utilizando las variables definidas previamente ($server, $username, $password y $database).
 */
$conn = mysqli_connect($server, $username, $password, $database);

/**
 * Este código PHP utiliza la variable superglobal $_POST para obtener los valores enviados desde 
 * un formulario HTML mediante el método POST.
 */
$nombreyapellido = $_POST['txt_nombre'];
$alias = $_POST['txt_alias'];
$email = $_POST['txt_email'];
$rut = $_POST["txt_rut"];
$region = $_POST["cbo_region"];
$comuna = $_POST["cbo_comuna"];
$candidato = $_POST["cbo_candidato"];
$descubrimiento = $_POST["web"];

/**
 * La consulta SQL utiliza la sentencia INSERT INTO para insertar una nueva fila en la tabla 'persona' 
 * con los valores de las variables $nombreyapellido, $alias, $email, $rut, $region, $comuna, $candidato y $descubrimiento.
 * La variable $resultado utiliza la función mysqli_query para ejecutar la consulta SQL en la base de datos, 
 * utilizando la conexión almacenada en la variable $conn
 */
$sql = "INSERT INTO persona VALUES ('$nombreyapellido','$alias', '$email', '$rut', '$region','$comuna','$candidato','$descubrimiento')";
$resultado = mysqli_query($conn,$sql);

if($resultado)
{
    echo "datos agregados correctamente";
    
}
else{
    echo "Error al ingresar los datos";
}
    


?>