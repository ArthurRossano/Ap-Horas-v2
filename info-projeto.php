<?php

    include_once('config.php');

    $codProjeto=$_POST['projeto'];
    $user= $_POST['usuario'];
    $hini=$_POST['hIni'];
    $hfim=$_POST['hFim'];
    $tipo=$_POST['tipo'];
    $atv=$_POST['atv'];
    $totHoras= $_POST['totHoras'];
    $data= $_POST['data'];
    $query= $conexao->query("SELECT * FROM projetos where codProjeto = '$codProjeto'");
    $row=$query->fetch_object();
    $representante=$row->representante;
    $cliente=$row->cliente;      
    $query1 = mysqli_query($conexao, "INSERT INTO horas(codProjeto,user,rdata,totHoras,cliente,representante,tipo,atv,hini,hfim) VALUES('$codProjeto','$user','$data','$totHoras','$cliente', '$representante','$tipo','$atv','$hini','$hfim')");
    print "<script>alert('Horas lançadas!')</script>";
    print "<script>location.href='lancamento-horas.php'</script>";
?>
