<?php 
  session_start();
  // print_r($_SESSION);

  if((!isset($_SESSION['username']) == true) and (!isset($_SESSION['senha']) == true))
  {
    unset($_SESSION['username']);
    unset($_SESSION['senha']);
    header('Location: home.php'); 
  }
  $logado = $_SESSION['nome'];
  
  include_once('config.php');  
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="js/cadastro-projeto.js"></script>
    <link rel="icon" href="img/logo1.png" type="image/png">
    <title>
        Cadastrar Projeto
    </title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navcolor w-100">
            <div class="container-fluid">
                <a class="navbar-brand" href="dashboard.php">
                    <img src="img/logo.png" alt="Logo" class="navbar-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item bold-text">
                            <a class="nav-link" href="lancamento-horas.php">Apontamento de Horas</a>
                        </li>
                        <li class="nav-item bold-text">
                            <a class="nav-link" href="controle.php">Controle de Horas</a>
                        </li>
                        <li class="nav-item dropdown bold-text">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Cadastros
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-center" href="cadastrar-cliente.php">Clientes</a></li>
                                <li><a class="dropdown-item text-center" href="cadastrar-projeto.php">Projetos</a></li>
                                <li><a class="dropdown-item text-center" href="cadastrar-tipo.php">Tipo</a></li>
                                <li><a class="dropdown-item text-center" href="cadastrar-atv.php">Atividade</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item bold-text">
                            <a class="nav-link" href="sair.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div id="content-proj" class="mt-4">
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                        <h2 class="text-center mb-4">CADASTRAR PROJETO</h2>
                        <section>
                            <form action="processa-projeto.php" method="POST" id="cadastroProjetoForm" class="mt-3">
                                <div class="mb-3">
                                    <label for="nomeProjeto" class="form-label mb-0">Nome do Projeto</label>
                                    <input type="text" id="nomeProjeto" name="nomeProjeto" class="form-control dark-border"
                                        onkeyup="maiusc(this)" required>
                                </div>

                                <div class="mb-3">
                                    <label for="tipoProjeto" class="form-label mb-0">Tipo do Projeto</label>
                                    <select id="tipoProjeto" name="tipoProjeto" class="form-select dark-border" required>
                                        <option value="">Selecione um tipo</option>
                                        <option value="SW">Software</option>
                                        <option value="HW">Hardware</option>
                                        <option value="SO">Solução</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="clienteProjeto" class="form-label mb-0">Cliente do Projeto</label>
                                    <select id="clienteProjeto" name="clienteProjeto" class="form-select dark-border" required>
                                        <option value="">Selecione um cliente</option>
                                        <?php 
                                    $query = $conexao->query("SELECT idclientes,cliente,representante FROM clientes ORDER BY idclientes ASC");
                                    $registros = $query->fetch_all(PDO::FETCH_ASSOC);
                                    foreach($registros as $option){
                                    ?>
                                        <option value="<?php echo $option['1']?>"><?php echo $option['1']?></option>
                                        <?php 
                                    }
                                    ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="codigoProjeto" class="form-label mb-0">Código do Projeto</label>
                                    <input type="text" id="codigoProjeto" name="codigoProjeto" class="form-control dark-border"
                                        readonly>
                                </div>

                                <input type="submit" class="submit btn mt-1 btn-primary dark-border" value="CADASTRAR">
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>