<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Cadastro</title>
    <link rel="icon" href="img/logo1.png" type="image/png">
</head>

<body class='vh-100 d-flex align-items-center'>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="logo text-center mb-4">
                    <img src="img/logo.png" alt="Logo" class="img-fluid col-md-10">
                </div>
                <form method="POST" action="processa.php" id="cadastroForm" >
                    <div class="mb-3">
                        <label for="nome" class="form-label bold-text mb-0">Nome Completo:</label>
                        <input type="text" id="nome" name="nome" class="form-control dark-border">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label bold-text mb-0">Novo Username:</label>
                        <input type="text" id="username" name="username" class="form-control dark-border">
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label bold-text mb-0">Nova Senha:</label>
                        <input type="password" id="senha" name="senha" class="form-control dark-border">
                    </div>

                    <div class="d-grid gap-2">
                        <input type="submit" value="CADASTRAR" name="submit" class="submit btn btn-primary dark-border">
                    </div>
                </form>
                <p class="mt-3 text-center">Já tem uma conta? <a href="home.php">Faça login</a>.</p>
            </div>
        </div>
    </div>
</body>

</html>