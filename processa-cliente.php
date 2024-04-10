<?php
    
  include_once('config.php'); 

  $cliente = $_POST['cliente'];
  $representante = $_POST['representante'];
  
  if(isset($_POST['submit']) && !empty($_POST['cliente'] && !empty($_POST['representante'])))
  {
    $sql = "SELECT * from clientes where cliente = '$cliente'";
    $result = $conexao->query($sql);
    if (mysqli_num_rows($result) === 0) {
        
      $result = mysqli_query($conexao, "INSERT INTO clientes(cliente, representante) VALUES('$cliente', '$representante')");
      print "<script>alert('Cadastro efetuado!')</script>";
      print "<script>location.href='cadastrar-cliente.php'</script>";

    }else{
      print "<script>alert('Cliente já cadastrado,verifique!')</script>"; 
      print "<script>location.href='cadastrar-cliente.php'</script>";
    }
    
  }
  else{
    print "<script>alert('Cliente ou Representante não preenchido')</script>";
    print "<script>location.href='cadastrar-cliente.php'</script>";
  }
  
?>
