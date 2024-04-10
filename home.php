<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
    <link rel="icon" href="img/logo1.png" type="image/png">

</head>

<body class="vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="logo text-center mb-4" >
                    <img src="img/logo.png" alt="Logo" class="img-fluid col-md-10">
                </div>
                <form action="testLogin.php" method="POST" id="loginForm">
                    <div class="mb-3">
                        <label for="username" class="form-label bold-text mb-0">Username:</label>
                        <input type="text" id="username" name="username" class="form-control dark-border">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label bold-text mb-0">Password:</label>
                        <input type="password" id="password" name="senha" class="form-control dark-border">
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" value="LOGIN" name="submit" class="btn mt-1 btn-primary dark-border">
                    </div>
                </form>
                <p class="mt-3 text-center">Não tem uma conta? <a href="cadastro.php">Criar conta</a>.</p>
            </div>
        </div>
    </div>
</body>

</html>