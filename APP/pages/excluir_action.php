<?php
require __DIR__ . "/../config/config.php";

if (isset($_GET["id"])) {
    $id = filter_input(INPUT_GET, "id");

    if ($id) {
        $sql = $pdo->prepare("DELETE FROM pizzas WHERE idPizza=:idPizza");
        $sql->bindValue(":idPizza", $id);
        $sql->execute();
        header("Location: gerenciaralt.php");
        exit;
    }
}
