<?php
    session_start();

    include_once("connection.php");
    include_once("url.php");

    $query = "SELECT * FROM contacts";

    $stmt = $connect->prepare($query);

    $stmt->execute();
    $contacts = $stmt->fetchAll();
?>