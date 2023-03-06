<?php
    session_start();

    include_once("connection.php");
    include_once("url.php");
    
    $data = $_POST;

    //MODIFICAÇÕES NO BANCO
    if(!empty($data)) {
        print_r($data); exit;

        //SELEÇÃO DE DADOS
    } else {
        //retorna o dado de um contato
    $id;

    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    }

    if(!empty($id)) {
        $query = "SELECT * FROM contacts WHERE id = :id";

        $stmt = $connect->prepare($query);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $contact = $stmt->fetch();
    } else {
        //Retorna todos os contatos
        $contacts = [];

        $query = "SELECT * FROM contacts";

        $stmt = $connect->prepare($query);

        $stmt->execute();

        $contacts = $stmt->fetchAll();
    }
    }

    

    
    
    
?>