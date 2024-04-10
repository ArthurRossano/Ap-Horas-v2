<?php
// Inclua o arquivo de configuração e inicie a sessão, se necessário
include_once('config.php');
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['username']) || !isset($_SESSION['senha'])) {
    header('Location: home.php');
    exit(); // Encerre o script para evitar a execução desnecessária
}

// Consulta SQL para selecionar todos os registros da tabela horas
$sql = "SELECT * FROM horas ORDER BY idHoras DESC";
$resultado = $conexao->query($sql);

// Crie uma string para armazenar os dados CSV
$csv_data = "USUÁRIO;CÓDIGO;CLIENTE;TIPO;ATIVIDADE;DATA;H.INICIO;H.FIM;TOTAL;COMERCIAL\n";

// Adicione os dados de cada linha ao CSV
while ($linha = mysqli_fetch_assoc($resultado)) {
    // Limpe os dados, se necessário (remova caracteres especiais, etc.)
    $user = $linha['user'];
    $codProjeto = $linha['codProjeto'];
    $cliente = $linha['cliente'];
    $tipo = $linha['tipo'];
    $atv = $linha['atv'];
    $rdata = $linha['rdata'];
    $hini = $linha['hini'];
    $hfim = $linha['hfim'];
    $totHoras = $linha['totHoras'];
    $representante = $linha['representante'];

    // Adicione os dados formatados à string CSV
    $csv_data .= "$user;$codProjeto;$cliente;$tipo;$atv;$rdata;$hini;$hfim;$totHoras;$representante\n";
}

// Defina os cabeçalhos para download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="dados.csv"');

// Imprima os dados CSV
echo "\xEF\xBB\xBF";
echo $csv_data;
