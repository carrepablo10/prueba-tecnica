<?php


$server = 'localhost';
$username = 'Prueba';
$password = '123';
$database = 'prueba_tecnica';

try{
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
}catch(PDOException $e){
    die('Connection failed: ' . $e->getMessage());
    
    
}

session_start();
require "./conexion.php";

$conn = mysqli_connect($server, $username, $password, $database);

$nombreyapellido = $_POST['txt_nombre'];
$alias = $_POST['txt_alias'];
$email = $_POST['txt_email'];
$rut = $_POST["txt_rut"];
$region = $_POST["cbo_region"];
$comuna = $_POST["cbo_comuna"];
$candidato = $_POST["cbo_candidato"];
$descubrimiento = $_POST["web"];

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