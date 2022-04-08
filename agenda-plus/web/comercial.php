<?php
    include('../system/verify.php');
    include("../system/coredb.php");
    include("../system/menu-left.php");

    if (isset($_POST['comercialButton'])) {
        $comercialEmpresa = $_POST['comercialEmpresa'];
        $comercialEndereco = $_POST['comercialEndereco'];
        $comercialEmail = $_POST['comercialEmail'];
        $comercialTelefone = $_POST['comercialTelefone'];
        $comercialCNPJ = $_POST['comercialCNPJ'];
        $insereComercial= mysqli_query($conexao, "INSERT into `comercial` (empresa, endereco, email, telefone, cnpj) VALUES ('$comercialEmpresa','$comercialEndereco','$comercialEmail','$comercialTelefone','$comercialCNPJ')");
    }
    if (isset($_POST['delComercialButton'])) {
        $idComercial = $_POST['delComercialID'];
        $deletaComercial = mysqli_query($conexao, "DELETE from `comercial` where id = '$idComercial'");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AgendaPlus - Painel</title>
        <script src="../assets/js/jquery-pack.js" type="text/javascript"></script>
        <script src="../assets/js/jquery-mask.js" type="text/javascript"></script>
        <script type="text/javascript">
	        $(document).ready(function(){	
		        $("#cnpj").mask("99.999.999/9999-99");
	        });
            $(document).ready(function(){	
		        $("#tel").mask("(99) 99999-9999");
	        });
        </script>
    </head>
    <body>
        <div class="menu-content">
            <div class="menu-criar-comerc">
                <h3>Criar anotação comercial</h3>
                <form action="comercial.php" method="post">
                    <input name="comercialEmpresa" type="text" class="comercialInput"  placeholder="Empresa" required>
                    <input name="comercialEndereco" type="text" class="comercialInput" placeholder="Endereço">
                    <input name="comercialEmail" type="email" class="comercialInput" placeholder="Email">
                    <input name="comercialTelefone" id="tel" class="comercialInput" placeholder="Telefone">
                    <input name="comercialCNPJ" id="cnpj" class="comercialInput" placeholder="CNPJ">
                    <button name="comercialButton" type="submit" class="comercialButton">Criar</button>
                </form>
            </div>
            <div class="menu-deletar-comerc">
            <h3>Deletar dado comercial</h3>
                <form action="comercial.php" method="post">
                    <input name="delComercialID" type="number" class="delAnotInput" placeholder="ID do dado." required>
                    <button name="delComercialButton" type="submit" class="delAnotButton">Deletar</button>
                </form>
            </div>
            <div class="menu-ver-comerc">
            <h3>Dados Comerciais:</h3>
                <table border="0" width="100%" bordercolor="#8662a4" cellspacing="0" cellpadding="5">
                    <tr>
                        <td><strong>ID</strong></td>
                        <td><strong>Empresa</strong></td>
                        <td><strong>Endereço</strong></td>
                        <td><strong>Email</strong></td>
                        <td><strong>Telefone</strong></td>
                        <td><strong>CNPJ</strong></td>
                    </tr>
                    <?php
                        $selecaoComercial = mysqli_query($conexao, "SELECT * from comercial order by id desc");
                        while($campo = mysqli_fetch_array($selecaoComercial)){?>
                            <tr>
                                <td><?=htmlentities($campo['id'])?></td>
                                <td><?=htmlentities($campo['empresa'])?></td>
                                <td><?=htmlentities($campo["endereco"])?></td>
                                <td><?=htmlentities($campo["email"])?></td>
                                <td><?=htmlentities($campo["telefone"])?></td>
                                <td><?=htmlentities($campo["cnpj"])?></td>
                            </tr>
                <?php   }?>
                </table>
            </div>

        </div>
    </body>
</html>