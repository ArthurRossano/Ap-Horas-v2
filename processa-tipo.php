<?php
    
  include_once('config.php'); 

  $tipo = $_POST['tipo'];
  
  if(isset($_POST['submit']) && !empty($_POST['tipo'] ))
  {
    $sql = "SELECT * from tipos where tipo = '$tipo'";
    $result = $conexao->query($sql);
    if (mysqli_num_rows($result) === 0) {
        
      $result = mysqli_query($conexao, "INSERT INTO tipos(tipo) VALUES('$tipo')");
      print "<script>alert('Cadastro efetuado!')</script>";
      print "<script>location.href='cadastrar-tipo.php'</script>";

    }else{
      print "<script>alert('Tipo de Atendimento já cadastrado,verifique!')</script>"; 
      print "<script>location.href='cadastrar-tipo.php'</script>";
    }
    
  }
  else{
    print "<script>alert('Tipo de Atendimento não preenchida')</script>";
    print "<script>location.href='cadastrar-tipo.php'</script>"; 
  }
  
?>
