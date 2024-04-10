<?php
    
  include_once('config.php'); 

  $atv = $_POST['atv'];
  
  if(isset($_POST['submit']) && !empty($_POST['atv'] ))
  {
    $sql = "SELECT * from atividades where atv = '$atv'";
    $result = $conexao->query($sql);
    if (mysqli_num_rows($result) === 0) {
        
      $result = mysqli_query($conexao, "INSERT INTO atividades(atv) VALUES('$atv')");
      print "<script>alert('Cadastro efetuado!')</script>";
      print "<script>location.href='cadastrar-atv.php'</script>";

    }else{
      print "<script>alert('Atividade já cadastrada,verifique!')</script>"; 
      print "<script>location.href='cadastrar-atv.php'</script>";
    }
    
  }
  else{
    print "<script>alert('Atividade não preenchida')</script>";
    print "<script>location.href='cadastrar-atv.php'</script>"; 
  }
  
?>
