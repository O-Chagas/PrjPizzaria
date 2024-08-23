<?php
require __DIR__ . "/../config/config.php";
$dado = [];

if (isset($_GET["id"])) {
    $id = filter_input(INPUT_GET, "id");    

    if ($id) {
        $sql = $pdo->prepare("SELECT * FROM pizzas WHERE idPizza=:idPizza");
        $sql->bindValue(":idPizza", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch(PDO::FETCH_ASSOC);                       
        }
        else {
            header("Location: gerenciaralt.php");
            exit;
        }      
    }
} 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pizza</title>  
</head>
<body>
    <main>
        <form action="./editar_action.php" method="post">
            <div class="form-item">
                <input type="hidden" name="pizzaQueFoiBuscada" value=<?= isset($_POST["idPizza"]) ? $_POST ["idPizza"] : "";?>>               
            </div>
            <div class="form-item">
                <label for="nome-pizza">Nome da Pizza:</label>
                <input type="text" name="nomePizza" id="nome-pizza" value=<?= isset($dado["nomePizza"]) ? $dado["nomePizza"]:"";?>>
                <!-- a chave do array nomePizza é o nome da coluna que veio do BD-->
            </div>
            <div class="form-item">
                <label for="valor-pizza">Valor R$:</label>
                <input type="text" name="valorPizza" id="valor-pizza" value=<?= isset($dado["valor"]) ? $dado["valor"]:"";?>>
            </div>
            <div class="form-item">
                <label for="tamanho-pizza">Tamanho:</label>
                <input type="text" name="tamanhoPizza" id="tamanho-pizza" value=<?= isset($dado["tamanho"]) ? $dado["tamanho"]:"";?>>
            </div>
            <div class="form-item">
                <label for="descricao-pizza">Descrição:</label>
                <textarea name="descricaoPizza" id="descricao" cols="50" rows="10"><?= isset($dado["descricao"]) ? $dado["descricao"]:"";?>
                </textarea>
            </div>
            <div>
                <input type="submit" name="btn-action" value="Salvar">
                <input type="submit" name="btn-action" value="Voltar">
            </div>
        </form>
    </main>    
</body>
</html>