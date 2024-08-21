<?php
require __DIR__ . "/partials/header.php";
?>

<form action="./cadastrar_action.php" method="post">
    <div class="form-item">
        <label for="nomePizza">Nome da Pizza:</label>
        <input type="text" name="nomePizza" id="nomePizza">
    </div>
    <div class="form-item">
        <label for="valor">Valor R$:</label>
        <input type="text" name="valor" id="valor">
    </div>
    <div class="form-item">
        <label for="tamanho">Tamanho:</label>
        <input type="text" name="tamanho" id="tamanho">
    </div>
    <div class="form-item">
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" cols="50" rows="10"></textarea>
    </div>
    <div>
        <input type="submit" value="Cadastrar">
    </div>
</form>

<?php
require "./partials/footer.php";
require "./partials/modal.php";
?>