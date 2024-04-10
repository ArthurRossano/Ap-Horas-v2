<?php 

  include_once('config.php');

  $codProjeto= $_POST['codigoProjeto'];
  $cliente= $_POST['clienteProjeto'];
  $query= $conexao->query("SELECT * FROM clientes where cliente = '$cliente'");
  $row=$query->fetch_object();
  $representante=$row->representante;

  $query2=$conexao->query("SELECT * FROM projetos where codProjeto = '$codProjeto'");

  if (mysqli_num_rows($query2) === 0) 
  {
        
    $query2 = mysqli_query($conexao, "INSERT INTO projetos(codProjeto,cliente,representante) VALUES('$codProjeto','$cliente', '$representante')");
    print "<script>alert('Cadastro efetuado!')</script>";
    print "<script>location.href='cadastrar-projeto.php'</script>";
  
  }
  else
  {
    print "<script>alert('Projeto já cadastrado,verifique!')</script>"; 
    print "<script>location.href='cadastrar-projeto.php'</script>";
  }
    
?>