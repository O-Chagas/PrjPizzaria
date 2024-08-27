<?php
require __DIR__ . "/partials/header.php";
require __DIR__ . "/../config/config.php";

$login = filter_input(INPUT_POST, "usuario", FILTER_VALIDATE_EMAIL);
$pwd = htmlspecialchars(filter_input(INPUT_POST, "pwd"));

if ($login && $pwd) {
    $sql = $pdo->prepare("SELECT senha, nomeUsuario FROM usuario WHERE login=:login");
    $sql->bindValue(":login", $login);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        //usuario existe, verificar a senha
        $dado = $sql->fetch(PDO::FETCH_ASSOC);
        //verificar se senha correta
        if (password_verify($pwd, $dado["senha"])) {
            //libera o usuário
        } else {
            $mensagem - "Usuário ou denha inválidos";
        }
    } else {
        $mensagem - "Usuário ou denha inválidos";
    }
} else {
    $mensagem - "Usuário ou denha inválidos";
}


?>
<form action="./login.php" method="POST" id="form">
    <div class="form-item">
        <label for="nome-usuario">Usuário:</label>
        <input type="text" name="usuario" id="nome-usuario">
    </div>
    <div class="form-item">
        <label for="senha-usuario">Senha:</label>
        <input type="password" name="pwd" id="senha-usuario">
    </div>
    <div>
    </div>
    <div>
        <input type="submit" name="btn-action" value="Logar" class="btn btn--verde">
        <a href="./cadastrarusuario.php" class="btn btn--vermelho">Registrar</a>
    </div>
</form>
<?php
require __DIR__ . "/partials/footer.php";
require __DIR__ . "/partials/modal.php";
?>