<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <meta charset="UTF-8">
    <title>AgendaPlus - Sua organização em um só lugar!</title>
</head>
<body>
    <img class="logo-index" src="assets/images/logo-index.png">

    <?php if(isset($_SESSION['nao_autenticado'])):?>
    <div id="alerta-invalido">
        <p>ERRO: Usuário ou senha inválidos.</p>
    </div>
    <?php endif; unset($_SESSION['nao_autenticado']);?>

    <div class="login-main">
        <form action="login.php" method="POST">                
            <input name="usuario" class="usuarioInput" placeholder="Usuário">
            <input name="senha" class="senhaInput" type="password" placeholder="Senha">
            <button type="submit" class="loginButton">Entrar</button>
        </form>
    </div>
    <div class="creditos">
        <b>Feito por <a id="credito" href="https://github.com/oruancss" target="_blank">Ruan C.</a>
    </div>

    <script type="text/javascript">
        window.setTimeout("closeHelpDiv();", 3000);
        function closeHelpDiv(){
            document.getElementById("alerta-invalido").style.display=" none";
        }
    </script>

</body>
</html>