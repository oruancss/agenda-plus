<?php
    include('../system/verify.php');
    include("../system/coredb.php");
    include("../system/menu-left.php");

    if (isset($_POST['finanAddDadosButton'])) {
        $finanTitular = $_POST['finanTitular'];
        $finanAgencia = $_POST['finanAgencia'];
        $finanBanco = $_POST['finanBanco'];
        $finanConta = $_POST['finanConta'];
        $finanPicpay = $_POST['finanPicpay'];
        $finanPix = $_POST['finanPix'];
        $insereFinanca = mysqli_query($conexao, "INSERT into `financeiro` (titular, agencia, banco, conta, picpay, pix) VALUES ('$finanTitular','$finanAgencia','$finanBanco','$finanConta','$finanPicpay','$finanPix')");
    }
    if (isset($_POST['delFinanButton'])) {
        $finanID = $_POST['delFinanID'];
        $deletaFinanca = mysqli_query($conexao, "DELETE from `financeiro` where id = '$finanID'");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AgendaPlus - Financeiro</title>
        <script>   
            function FormataDado(campo, tammax, pos, teclapres) {   
                var keyCode; 
                if (teclapres.srcElement) {
                    keyCode = teclapres.keyCode; 
                } 
                else if (teclapres.target) {
                    keyCode = teclapres.which; 
                }
                if (keyCode == 0 || keyCode == 8) { return true; }  
                if ((keyCode < 48 || keyCode > 57) && keyCode != 88 && (keyCode != 120)) { return false; }

                var tecla = keyCode; 
                vr = campo.value;   
                vr = vr.replace("-", "");   
                vr = vr.replace("/", ""); 
                tam = vr.length;

                if (tam < tammax && tecla != 8) {
                    tam = vr.length + 1; 
                } 
                if (tecla == 8) {
                    tam = tam - 1; 
                }
                if (tecla == 8 || tecla == 88 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 || tecla == 120) {
                    if (tam <= 2) {
                        campo.value = vr; 
                    }
                    if (tam > pos && tam <= tammax) {
                        campo.value = vr.substr(0, tam - pos) + "-" + vr.substr(tam - pos, tam); 
                    }
                }
            }
        </script>
    </head>
    <body>
        <div class="menu-content">
            <div class="menu-add-financeiro">
                <h3>Adicionar Dados</h3>
                <form action="financeiro.php" method="post">
                    <input name="finanTitular" type="text" class="finanInput" placeholder="Titular" required>
                    <input name="finanAgencia" type="text" maxlength="4" class="finanInput" placeholder="Agencia" required>
                    <input name="finanBanco" type="text" class="finanInput" placeholder="Banco" required>
                    <input name="finanConta" type="text" class="finanInput" placeholder="Conta" id="ContaB" required onkeypress="return FormataDado(this,12,1,event);"/>
                    <input name="finanPicpay" type="text" class="finanInput" placeholder="PicPay">
                    <input name="finanPix" type="text" class="finanInput" placeholder="PIX">
                    <button name="finanAddDadosButton" type="submit" class="finanAddButton">Adicionar</button>
                </form>
            </div>
            <div class="menu-deletar-financeiro">
                <h3>Deletar Dado</h3>
                <form action="financeiro.php" method="post">
                    <input name="delFinanID" type="number" class="delAnotInput" placeholder="ID do dado." required>
                    <button name="delFinanButton" type="submit" class="delAnotButton">Deletar</button>
                </form>
            </div>
            <div class="menu-ver-financeiro">
            <h3>Dados Financeiros:</h3>
                <table border="0" width="100%" bordercolor="#8662a4" cellspacing="0" cellpadding="5">
                    <tr>
                        <td><strong>ID</strong></td>
                        <td><strong>Titular</strong></td>
                        <td><strong>Agencia</strong></td>
                        <td><strong>Banco</strong></td>
                        <td><strong>Conta</strong></td>
                        <td><strong>PicPay</strong></td>
                        <td><strong>PIX</strong></td>
                    </tr>
                    <?php
                        $selecaoFinanceira = mysqli_query($conexao, "SELECT * from financeiro order by id desc");
                        while($campo = mysqli_fetch_array($selecaoFinanceira)){?>
                            <tr>
                                <td><?=htmlentities($campo['id'])?></td>
                                <td><?=htmlentities($campo['titular'])?></td>
                                <td><?=htmlentities($campo["agencia"])?></td>
                                <td><?=htmlentities($campo["banco"])?></td>
                                <td><?=htmlentities($campo["conta"])?></td>
                                <td><?=htmlentities($campo["picpay"])?></td>
                                <td><?=htmlentities($campo["pix"])?></td>
                            </tr>
                <?php   }?>
                </table>
            </div>
        </div>
    </body>
</html>