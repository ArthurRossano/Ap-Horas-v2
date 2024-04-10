<?php
    
  include_once('config.php'); 

  $comercial = $_POST['comercial'];
  
  if(isset($_POST['submit']) && !empty($_POST['comercial'] ))
  {
    $sql = "SELECT * from ncomercial where comercial = '$comercial'";
    $result = $conexao->query($sql);
    if (mysqli_num_rows($result) === 0) {
        
      $result = mysqli_query($conexao, "INSERT INTO ncomercial(comercial) VALUES('$comercial')");
      print "<script>alert('Cadastro efetuado!')</script>";
      print "<script>location.href='cadastrar-comercial.php'</script>";

    }else{
      print "<script>alert('Comercial já cadastrado,verifique!')</script>"; 
      print "<script>location.href='cadastrar-comercial.php'</script>";
    }
    
  }
  else{
    print "<script>alert('Comercial não preenchido')</script>";
    print "<script>location.href='cadastrar-comercial.php'</script>"; 
  }
  
?>
