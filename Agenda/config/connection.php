<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "agenda";

try {

    $connect = new PDO("mysql:host$host;dbname=$db", $user, $pass);

    //Ativar o modo de erros

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    //erro na conexão
    $error = $e->getMessage();
    echo "Erro: $error";
}

?>