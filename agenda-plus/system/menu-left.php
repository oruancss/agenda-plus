<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="../assets/css/web.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">
</head>
<body>
    <div class="menu-left">
        <img class="menu-left-icon" src="../assets/images/menu-left-icon.png">
        <h4 id="title-menu-left">Olá <?php echo $_SESSION['usuario'];?>, seja bem vindo!</h4>
            <nav class="menu-buttons">
                <b><a id="menu-button" href="main.php"><i id="icon_menu" class="material-icons">bookmark_border</i>Menu</a></b>
                <b><a id="menu-anot" href="anotacoes.php" name="anotacoes"><i class="material-icons">book</i>Anotações</a></b>
                <b><a id="menu-finan" href="financeiro.php"><i class="material-icons">work_outline</i>Financeiro</a></b>
                <b><a id="menu-comer" href="comercial.php"><i class="material-icons">assessment</i>Comercial</a></b>
                <b><a id="menu-telef" href="telefones.php"><i class="material-icons">assignment_ind</i>Telefones</a></b>
                <b><a id="menu-reun" href="reunioes.php"><i class="material-icons">calendar_month</i>Reuniões</a></b>
                <b><a id="menu-sair" href="logout.php"><i class="material-icons">logout</i>Sair</a></b>
            </nav>
    </div>
<body>
</html>
