<?php
    include('../system/verify.php');
    include("../system/coredb.php");
    include("../system/menu-left.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AgendaPlus - Painel</title>
    </head>
    <body>
        <div class="menu-content">
            <div class="menu-alert">
                <p><strong>Nosso sistema ainda está sendo desenvolvido, você poderá encontrar alguns bugs e problemas.</strong><p>
            </div>
            <div class="menu-changelogs">
                <h3>Changelogs:</h3>
                <p><?php echo $changelogs['logs'];?><p>
            </div>
            <div class="menu-info">
                <h3>Informações:</h3>
                <p>Usuário Logado: <b><?php echo $_SESSION['usuario'];?></b></p>
                <p>Usuários Registrados: <b><?php echo $estUsers['user'];?></b></p>
                <p>Última Atualização: <b><?php echo $atualizadoEm['atualizado'];?></b></p>
                <p>Conexão: <b><?php checarConexao();?></b></p>
                <p>Versão: <b><?php echo $versao['versao'];?></b></p>
            </div>
            <div class="menu-estat">
                <h3>Estatísticas:</h3>
                <p>Anotações: <b><?php echo $estatanotacao['anotacao'];?></b></p>
                <p>Dados Financeiros: <b><?php echo $estFinan['finan'];?></b></p>
                <p>Dados Comerciais: <b><?php echo $estComercial['comer'];?></b></p>
                <p>Telefones: <b><?php echo $estFone['fone'];?></b></p>
                <p>Reuniões: <b><?php echo $estReuniao['reuniao'];?></b></p>
            </div>
            <div class="menu-options">
                <h3>Funcionalidades:</h3>
                <a class="criar-user-button" href="management/index.php" target="_blank">Criar Usuário</a>
            </div>
            <div class="menu-alerts">
                <table border="0" width="100%" bordercolor="#fff" cellspacing="0" cellpadding="5">
                    <tr>
                        <td><strong>ID</strong></td>
                        <td><strong>Alertas</strong></td>
                    </tr>
                    <?php
                        $displayAlerta = mysqli_query($conexao, "SELECT * from alerts order by id desc");
                        while($campo = mysqli_fetch_array($displayAlerta)){?>
                            <tr>
                                <td><b><?=htmlentities($campo['id'])?></b></td>
                                <td><b><?=htmlentities($campo["alerta"])?></b></td>
                            </tr>
                    <?php   }?>
            </div>
        </div>
    </body>
</html>