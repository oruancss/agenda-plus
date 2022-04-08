<?php
define('Host', '127.0.0.1');
define('Usuario', 'root');
define('Senha', '');
define('Database', 'agendaplus');
$conexao = mysqli_connect(Host, Usuario, Senha, Database) or die ('Não foi possível conectar ao banco de dados!');

//Consultas
$querylogs = "SELECT logs FROM changelogs";
$logs = mysqli_query($conexao, $querylogs);
$changelogs = mysqli_fetch_assoc($logs);

$estatnota = mysqli_query($conexao, "SELECT count(*) as anotacao FROM anotacoes");
$estatanotacao = mysqli_fetch_assoc($estatnota);

$estatFinan = mysqli_query($conexao, "SELECT count(*) as finan FROM financeiro");
$estFinan = mysqli_fetch_assoc($estatFinan);

$estatComercial = mysqli_query($conexao, "SELECT count(*) as comer FROM comercial");
$estComercial = mysqli_fetch_assoc($estatComercial);

$estatFone = mysqli_query($conexao, "SELECT count(*) as fone FROM telefones");
$estFone = mysqli_fetch_assoc($estatFone);

$estatReuniao = mysqli_query($conexao, "SELECT count(*) as reuniao FROM reunioes");
$estReuniao = mysqli_fetch_assoc($estatReuniao);

$estatUsers = mysqli_query($conexao, "SELECT count(*) as user FROM usuarios");
$estUsers = mysqli_fetch_assoc($estatUsers);

$dataLogs = mysqli_query($conexao, "SELECT atualizado from changelogs");
$atualizadoEm = mysqli_fetch_array($dataLogs);

$versaoLogs = mysqli_query($conexao, "SELECT versao from changelogs");
$versao = mysqli_fetch_array($versaoLogs);

//Funções
function checarConexao() {
    $connected = @fsockopen("localhost", 80); 
    if ($connected) {
        $conectado = true;
        echo "ESTÁVEL";
    }
    else {
        $conectado = false;
        echo "INSTÁVEL";
    }
    return $conectado;
}

//Variáveis
$ano = date("Y");
$agendaPlus = "AngendaPlus - "
?>