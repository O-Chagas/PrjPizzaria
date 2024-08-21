<?php
require __DIR__ ."/config/config.php";
require __DIR__ ."/pages/partials/header.php";

$sql = $pdo->query("SELECT * FROM pizzas");
$sql->execute();
if ($sql->rowCount() > 0) {
    # trazer todas as pizzas
    $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
    <section class="cards-area">

        <!-- for -->
        <?php foreach ($dados as $key => $value): ?>
            <div class="cards-area__card">
                <img class="cards-area__img" src="./images/img-produto01.png" alt="Imagem da Pizza de Muçarela">
                <button class="cards-area__botao-adicionar">
                    <i class="fa-solid fa-circle-plus"></i>
                </button>
                <span class="cards-area__preco"><?php echo $value ['valor'];?></span>
                <span class="cards-area__titulo"><?php echo $value ['nomePizza'];?></span>
                <p class="cards-area__descricao"><?php echo $value ['descricao'];?></p>
            </div>
        <?php endforeach; ?>

    </section>

<?php
} else {
    # informar que não há resultado
    echo "Ops, pizza não encontrada";
}

require "./pages/partials/carrinho.php";
require "./pages/partials/footer.php";
require "./pages/partials/modal.php";
?>