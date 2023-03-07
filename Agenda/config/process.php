<?php
    session_start();

    include_once("connection.php");
    include_once("url.php");
    
    $data = $_POST;

    //MODIFICAÇÕES NO BANCO
    if(!empty($data)) {
        //CRIAR CONTATO

        if($data["type"] === "create") {
            $name = $data["name"];
            $phone = $data["phone"];
            $observations = $data["observations"];

            $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

            $stmt = $connect->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);

            try {
                $stmt->execute();
                $_SESSION["msg"] = "Contato criado com sucesso!";
            } catch(PDOException $e) {
                
                $error = $e->getMessage();
                echo "Erro: $error";
            }

            //ATUALIZAR CONTATO
        } else if($data["type"] === "edit") {
            $name = $data["name"];
            $phone = $data["phone"];
            $observations = $data["observations"];
            $id = $data["id"];
           
            $query = "UPDATE contacts 
            SET name = :name, phone = :phone, observations = :observations 
            WHERE id = :id";

            $stmt = $connect->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);
            $stmt->bindParam(":id", $id);

            try {
                $stmt->execute();
                $_SESSION["msg"] = "Contato Atualizado com sucesso!";
            } catch(PDOException $e) {
                
                $error = $e->getMessage();
                echo "Erro: $error";
            }
        } else if($data["type"] === "delete") {
            $id = $data["id"];

            $query = "DELETE FROM contacts WHERE id = :id";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(":id", $id);

            try {
                $stmt->execute();
                $_SESSION["msg"] = "Contato Apagado com sucesso!";
            } catch(PDOException $e) {
                
                $error = $e->getMessage();
                echo "Erro: $error";
            }
            
        }

        //REDIRECIONAMENTO DE PAGINA 
        header("Location:" . $BASE_URL . "../index.php" );

        //SELEÇÃO DE DADOS
    } else {
        //retorna o dado de um contato
    $id;

    if(!empty($_GET["id"])) {
        $id = $_GET["id"];
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

    //FECHAR CONEXÃO EM PDO
    $connect = null;

    

    
    
    
?>