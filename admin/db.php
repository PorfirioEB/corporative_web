<?php
$servidor="localhost";
$baseDeDatos="respweb";
$usuario="root";
$contrasenia="";

try{

    $conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contrasenia);
    echo "Conexión realizada...";

}catch(Exception $error){

    echo $error->getMessage();
}

?>