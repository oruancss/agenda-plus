<?php
    include('../system/verify.php');
    include("../system/coredb.php");
    include("../system/menu-left.php");

    if (isset($_POST['anotarButton'])) {
        $anotaTitulo = $_POST['anotacaoTitulo'];
        $anotaNota = $_POST['anotacaoNota'];
        $insereAnotacao = mysqli_query($conexao, "INSERT into `anotacoes` (titulo, anotacao) VALUES ('$anotaTitulo','$anotaNota')");
    }
    if (isset($_POST['delAnotButton'])) {
        $idDelete = $_POST['delAnotacaoID'];
        $deletaAnotacao = mysqli_query($conexao, "DELETE from `anotacoes` where id = '$idDelete'");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AgendaPlus - Anotações</title>
    </head>
    <body>
        <div class="menu-content">
            <div class="menu-criar-anot">
                <h3>Criar anotação</h3>
                <form action="anotacoes.php" method="post">
                    <input name="anotacaoTitulo" class="anotInput" minlength="5" maxlength="30" placeholder="Título da Anotação" required>
                    <input name="anotacaoNota" type="text" class="anotInput" maxlength="60" placeholder="Sua anotação..." required>
                    <button name="anotarButton" type="submit" class="anotacaoButton">Criar</button>
                </form>
            </div>
            <div class="menu-deletar-anot">
                <h3>Deletar anotação</h3>
                <form action="anotacoes.php" method="post">
                    <input name="delAnotacaoID" type="number" class="delAnotInput" placeholder="ID da anotação." required>
                    <button name="delAnotButton" type="submit" class="delAnotButton">Deletar</button>
                </form>
            </div>
            <div class="menu-ver-anot">
                <h3>Ver anotações:</h3>
                <table border="0" width="100%" bordercolor="#fff" cellspacing="0" cellpadding="5">
                    <tr>
                        <td><strong>ID</strong></td>
                        <td><strong>Título</strong></td>
                        <td><strong>Anotação</strong></td>
                    </tr>
                    <?php
                        $selecaoNota = mysqli_query($conexao, "SELECT * from anotacoes order by id desc");
                        while($campo = mysqli_fetch_array($selecaoNota)){?>
                            <tr>
                                <td><?=htmlentities($campo['id'])?></td>
                                <td><?=htmlentities($campo['titulo'])?></td>
                                <td><?=htmlentities($campo["anotacao"])?></td>
                            </tr>
                        <?php   }?>
        
                </table>
            </div>
        </div>
    </body>
</html>