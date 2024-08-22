<?php
require __DIR__ ."/../config/config.php";
$dado=[];



if(isset($_POST["btn-action"])){

if($_POST['btn-action']==="Alterar") {

    $nome = filter_input(INPUT_POST, 'nomePizza', FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
    $tamanho = filter_input(INPUT_POST, 'tamanhoPizza', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $valor = filter_input(INPUT_POST, 'valorPizza', FILTER_VALIDATE_FLOAT);
    $descricao = filter_input(INPUT_POST, 'descricaoPizza', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (isset($_COOKIE["pizzaBuscada"])) {
   
        $sql = $pdo->prepare("UPDATE pizzas SET nomePizza = :nomePizza, pathFoto = :pathFoto, valor = :valorPizza, tamanho = :tamanhoPizza, descricao = :descricaoPizza 
                                WHERE nomePizza=:pizzaBuscada");   
               
        $sql->bindValue(":nomePizza", $nome); 
        $sql->bindValue(":pathFoto", "images/foto1.png");        
        $sql->bindValue(":valorPizza", $valor);
        $sql->bindValue(":tamanhoPizza", $tamanho);
        $sql->bindValue(":descricaoPizza", $descricao);
        $sql->bindValue(":pizzaBuscada", $_COOKIE["pizzaBuscada"]);
        $sql ->execute();
        setcookie("pizzaBuscada", "", time()-3600);
     
     header("Location: gerenciar.php");
     exit;
    }
    
}     
else if ($_POST['btn-action']==="Excluir") {   
    if (isset($_COOKIE["pizzaBuscada"])) {
        $sql = $pdo->prepare("DELETE FROM pizzas WHERE nomePizza=:pizzaBuscada");
        $sql->bindValue(":pizzaBuscada", $_COOKIE["pizzaBuscada"]);
        $sql->execute();
        setcookie("pizzaBuscada", "", time()-3600);
        header("Location: gerenciar.php");
        exit;

        echo "Pizza excluída com sucesso";
        
    } else {
        header("Location: gerenciar.php");
        exit;
    }
    
} else if ($_POST['btn-action']==="Buscar") {
    echo "clicou no botão buscar";

 
$pizzaBuscada = filter_input(INPUT_POST,'pizzaBuscada');
 
if ($pizzaBuscada) {
    $sql=$pdo->prepare("SELECT * FROM pizzas WHERE nomePizza=:pizzaBuscada");
    $sql->bindValue(":pizzaBuscada",$pizzaBuscada);
    $sql->execute();
 
    if($sql->rowCount() > 0){
        $dado = $sql->fetch(PDO::FETCH_ASSOC);
        setcookie("pizzaBuscada", $pizzaBuscada, time()+3600);
                    
    }
    else {
        header("Location: gerenciar.php");
        exit;
    }
}
else{
    header("Location: gerenciar.php");
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
    <title>Gerenciar Pizza</title>  
</head>
<body>
    <main>
        <form action="./gerenciar_action.php" method="post">
            <div class="form-item">
                <input type="hidden" name="pizzaQueFoiBuscada" value=<?= isset($_POST["pizzaBuscada"]) ? $_POST ["pizzaBuscada"] : "";?>>
                <input type="text" name="pizzaBuscada" id="pizza-buscada">
                <input type="submit" name="btn-action" value="Buscar">
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
                <input type="submit" name="btn-action" value="Alterar">
                <input type="submit" name="btn-action" value="Excluir">
            </div>
        </form>
    </main>    
</body>
</html>