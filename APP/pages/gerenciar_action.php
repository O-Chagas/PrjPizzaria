<?php
require "./../config/config.php";
 
$pizzaBuscada = filter_input(INPUT_POST,'pizzaBuscada');
 
if ($pizzaBuscada) {
    $sql=$pdo->prepare("SELECT * FROM pizza WHERE nomePizza=:pizzaBuscada");
    $sql->bindValue(":pizzaBuscada",$pizzaBuscada);
    $sql->execute();
 
    if($sql->rowCount() > 0){
        $dado = $sql->fetch(PDO::FETCH_ASSOC);              
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
                <input type="text" name="pizzaBuscada" id="pizza-buscada">
                <input type="submit" value="Buscar">
            </div>
            <div class="form-item">
                <label for="nome-pizza">Nome da Pizza:</label>
                <input type="text" name="nomePizza" id="nome-pizza" value=<?=$dado['nomePizza'];?>>
                <!-- a chave do array nomePizza é o nome da coluna que veio do BD-->
            </div>
            <div class="form-item">
                <label for="valor-pizza">Valor R$:</label>
                <input type="text" name="valorPizza" id="valor-pizza" value=<?=$dado['valor'];?>>
            </div>
            <div class="form-item">
                <label for="tamanho-pizza">Tamanho:</label>
                <input type="text" name="tamanhoPizza" id="tamanho-pizza" value=<?=$dado['tamanho'];?>>
            </div>
            <div class="form-item">
                <label for="descricao-pizza">Descrição:</label>
                <textarea name="descricaoPizza" id="descricao" cols="50" rows="10"><?=$dado['descricao'];?>
                </textarea>
            </div>
            <div>
                <input type="submit" value="Alterar">
                <input type="submit" value="Excluir">
            </div>
        </form>
    </main>    
</body>
</html>