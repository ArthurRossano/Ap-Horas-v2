<?php
    include_once('config.php'); 

    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $senha = $_POST['senha'];
    
    
    
    if(isset($_POST['submit']) && !empty($_POST['username'] && !empty($_POST['senha'] && !empty($_POST['nome']))))
    {        
        //ACESSA
        $sql = "SELECT * from usuarios where username = '$username'";
        $result = $conexao->query($sql);

        if (mysqli_num_rows($result) === 0) {
            
            $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, username, senha) VALUES('$nome', '$username', '$senha')");
            print "<script>alert('Cadastrado com sucesso!')</script>";
            print "<script>location.href='home.php'</script>";

        }else{
            print "<script>alert('Username já cadastrado,verifique!')</script>";
            print "<script>location.href='cadastro.php'</script>";
        }

    }
    else{
        header('Location: cadastro.php');
        //NÃO ACESSA
    }
?>
