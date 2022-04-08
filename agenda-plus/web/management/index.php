<?php
    include('../../system/verify.php');
    include('../../system/coredb.php');

    if (isset($_POST['regButton'])) {
        $criarUsuario = $_POST['criarUsuario'];
        $criarSenha = md5($_POST['criarSenha']);
        $insereUsuario= mysqli_query($conexao, "INSERT into `usuarios` (usuario, senha) VALUES ('$criarUsuario','$criarSenha')");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AgendaPlus - Gerenciamento</title>
    </head>
    <body>
        <div class="management">
        <h3>Criar Usuário</h3>
            <form action="index.php" method="post">
                <input name="criarUsuario" type="text" class="regInput" placeholder="Usuário">
                <input name="criarSenha" type="password" class="regInput" placeholder="Senha">
                <button name="regButton" type="submit" class="regButton">Criar</button>
            </form>
        </div>
    </body>
</html>