<?php 
    session_start();
    if(isset($_POST['submit']) && !empty($_POST['username'] && !empty($_POST['senha'])))
    {
        include_once('config.php');
        $username = $_POST['username'];
        $senha = $_POST['senha'];
        $sql = "SELECT * from usuarios where username = '$username' and senha= '$senha'";
        $result = $conexao->query($sql);  
        $row= $result->fetch_object();  

        if(mysqli_num_rows($result)<1)
        {
            unset($_SESSION['username']);
            unset($_SESSION['senha']);
            echo "<script>alert('Usuário ou senha incorretos ou não cadastrado!')</script>";
            echo "<script>location.href='home.php'</script>";
        }
        else{
            header('Location: dashboard.php');
            $_SESSION ['username'] = $row->username;
            $_SESSION ['senha'] = $row->senha;
            $_SESSION ['nome'] = $row->nome;
            $_SESSION['id']=$row->id;
        }
    }
    else{
        print "<script>alert('Usuario ou senha não preenchido')</script>";
        print "<script>location.href='home.php'</script>";
    }
?>