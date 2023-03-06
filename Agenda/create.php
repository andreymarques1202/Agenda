<?php
    include_once("config/url.php");
    include_once("templates/header.php");
    
?>

    <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title">Criando Contato</h1>
        <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="post">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="name">Nome do contato:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome" required>
            </div>
            <div class="form-group">
                <label for="phone">Numero do contato:</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Digite o numero" required>
            </div>
            <div class="form-group">
                <label for="observations">Observações:</label>
                <textarea type="text" class="form-control" name="observations" id="observations" placeholder="Insira as observações" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
    

<?php
    include_once("templates/footer.php");
?>