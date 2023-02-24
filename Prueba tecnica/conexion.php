<?php

/* 
- Servidor de base de datos: localhost 
- Nombre de usuario: Prueba
- Contraseña: 123
- Base de datos: prueba_tecnica
*/

$server = 'localhost';
$username = 'Prueba';
$password = '123';
$database = 'prueba_tecnica';

try{
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
}catch(PDOException $e){
    die('Connection failed: ' . $e->getMessage());
    
    
}
?>