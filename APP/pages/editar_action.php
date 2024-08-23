<?php
require __DIR__ ."/../config/config.php";

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
}
?>
