<?php
require './../config/config.php';
 
 
$nome = filter_input(INPUT_POST, 'nomePizza', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$tamanho = filter_input(INPUT_POST, 'tamanho', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 
var_dump($nome);
var_dump($tamanho);
var_dump($valor);
var_dump($descricao);
 
 
if ($nome && $valor && $tamanho) {
   
    $sql = $pdo->prepare("INSERT INTO pizzas (idUsuario, nomePizza, pathFoto, valor, tamanho, descricao)
                          VALUES (:idUsuario,:nomePizza,:pathFoto,:valor,:tamanho,:descricao)");
 
   
    $sql->bindValue(":idUsuario", 1);  
    $sql->bindValue(":nomePizza", $nome);
    $sql->bindValue(":pathFoto", "images/foto1.png");  
    $sql->bindValue(":valor", $valor);
    $sql->bindValue(":tamanho", $tamanho);
    $sql->bindValue(":descricao", $descricao);
 $sql ->execute();
 
 header("Location: ./../index.php");
 exit;
} else {
    header("Location: ./cadastrar.php");
    exit;
}