<?php
    include('../system/verify.php');
    include("../system/coredb.php");
    include("../system/menu-left.php");

    if (isset($_POST['telButton'])) {
        $telNome = $_POST['telNome'];
        $telFone = $_POST['telFone'];
        $telEndereco = $_POST['telEndereco'];
        $telEmail = $_POST['telEmail'];
        $insereTelefone= mysqli_query($conexao, "INSERT into `telefones` (nome, telefone, endereco, email) VALUES ('$telNome','$telFone','$telEndereco','$telEmail')");
    }
    if (isset($_POST['delTelefoneButton'])) {
        $telID = $_POST['delTelefoneID'];
        $apagaTelefone = mysqli_query($conexao, "DELETE from `telefones` where id = '$telID'");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AgendaPlus - Telefones</title>
        <script src="../assets/js/jquery-pack.js" type="text/javascript"></script>
        <script src="../assets/js/jquery-mask.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){	
		        $("#tel").mask("(99) 99999-9999");
	        });
        </script>
    </head>
    <body>
        <div class="menu-content">
            <div class="menu-criar-telefone">
                <h3>Adicionar Telefone</h3>
                <form action="telefones.php" method="post">
                    <input name="telNome" type="text" class="telefoneInput" placeholder="Nome" required>
                    <input name="telFone" id="tel" class="telefoneInput" placeholder="Telefone">
                    <input name="telEndereco" type="text" class="telefoneInput" placeholder="Endereço">
                    <input name="telEmail" type="email" class="telefoneInput" placeholder="Email">
                    <button name="telButton" type="submit" class="telButton">Agendar</button>
                </form>
            </div>
            <div class="menu-deletar-telefone">
            <h3>Deletar contato</h3>
                <form action="telefones.php" method="post">
                    <input name="delTelefoneID" type="number" class="delAnotInput" placeholder="ID do contato." required>
                    <button name="delTelefoneButton" type="submit" class="delAnotButton">Deletar</button>
                </form>
            </div>
            <div class="menu-ver-telefone">
            <h3>Telefones:</h3>
                <table border="0" width="100%" bordercolor="#8662a4" cellspacing="0" cellpadding="5">
                    <tr>
                        <td><strong>ID</strong></td>
                        <td><strong>Nome</strong></td>
                        <td><strong>Telefone</strong></td>
                        <td><strong>Endereço</strong></td>
                        <td><strong>Email</strong></td>
                    </tr>
                    <?php
                        $selecaoTelefone = mysqli_query($conexao, "SELECT * from telefones order by id desc");
                        while($campo = mysqli_fetch_array($selecaoTelefone)){?>
                            <tr>
                                <td><?=htmlentities($campo['id'])?></td>
                                <td><?=htmlentities($campo['nome'])?></td>
                                <td><?=htmlentities($campo["telefone"])?></td>
                                <td><?=htmlentities($campo["endereco"])?></td>
                                <td><?=htmlentities($campo["email"])?></td>
                            </tr>
                <?php   }?>
        </div>
    </body>
</html>