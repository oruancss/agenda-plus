<?php
    include('../system/verify.php');
    include("../system/coredb.php");
    include("../system/menu-left.php");

    if (isset($_POST['reuniaoButton'])) {
        $reuniaoTema = $_POST['reuniaoTema'];
        $reuniaoHora = $_POST['reuniaoHora'];
        $insereReuniao= mysqli_query($conexao, "INSERT into `reunioes` (tema, horario) VALUES ('$reuniaoTema','$reuniaoHora')");
    }
    if (isset($_POST['delReuniaoID'])) {
        $reuniaoID = $_POST['delReuniaoID'];
        $deletaReuniao = mysqli_query($conexao, "DELETE from `reunioes` where id = '$reuniaoID'");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AgendaPlus - Reuniões</title>
        <script src="../assets/js/jquery-pack.js" type="text/javascript"></script>
        <script src="../assets/js/jquery-mask.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){	
		        $("#hora").mask("99:99 - 99:99");
	        });
        </script>
    </head>
    <body>
        <div class="menu-content">
            <div class="menu-criar-reuniao">
                <h3>Criar reunião</h3>
                <form action="reunioes.php" method="post">
                    <input name="reuniaoTema" type="text" class="reuniaoInput" placeholder="Tema da Reunião" required>
                    <input name="reuniaoHora" id="hora" class="reuniaoInput" placeholder="Hora de começo - Hora de término">
                    <button name="reuniaoButton" type="submit" class="reuniaoButton">Criar</button>
                </form>
            </div>
            <div class="menu-deletar-reuniao">
            <h3>Deletar reunião</h3>
                <form action="reunioes.php" method="post">
                    <input name="delReuniaoID" type="number" class="delAnotInput" placeholder="ID da reunião." required>
                    <button name="delReuniaoButton" type="submit" class="delAnotButton">Deletar</button>
                </form>
            </div>
            <div class="menu-ver-reuniao">
            <h3>Telefones:</h3>
                <table border="0" width="100%" bordercolor="#fff" cellspacing="0" cellpadding="5">
                    <tr>
                        <td><strong>ID</strong></td>
                        <td><strong>Tema da Reunião</strong></td>
                        <td><strong>Horário</strong></td>
                    </tr>
                    <?php
                        $selecaoReuniao = mysqli_query($conexao, "SELECT * from reunioes order by id desc");
                        while($campo = mysqli_fetch_array($selecaoReuniao)){?>
                            <tr>
                                <td><?=htmlentities($campo['id'])?></td>
                                <td><?=htmlentities($campo['tema'])?></td>
                                <td><?=htmlentities($campo["horario"])?></td>
                            </tr>
                <?php   }?>
            </div>
        </div>
    </body>
</html>