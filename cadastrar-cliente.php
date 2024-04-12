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
  <link rel="stylesheet" href="css/slider.css">
  <script src="js/cadastro-projeto.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <title>Cadastrar Cliente</title>
  <link rel="icon" href="img/logo1.png" type="image/png">
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg navcolor w-100">
      <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">
          <img src="img/logo.png" alt="Logo" class="navbar-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Cadastros
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item text-center" href="cadastrar-cliente.php">Clientes</a></li>
                <li><a class="dropdown-item text-center" href="cadastrar-projeto.php">Projetos</a></li>
                <li><a class="dropdown-item text-center" href="cadastrar-tipo.php">Tipo</a></li>
                <li><a class="dropdown-item text-center" href="cadastrar-atv.php">Atividade</a></li>
                <li><a class="dropdown-item text-center" href="cadastrar-comercial.php">Comercial</a></li>
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
    <label class="mt-1 switch">
      <input type="checkbox" id="switch">
      <span class="slider"></span>
    </label>

    <div id="content-1" class="mt-4">
      <div class="container">
        <div class="row justify-content-center mt-5">
          <div class="col-md-4">
            <h2 class="text-center mb-4">CADASTRAR CLIENTE</h2>
            <section>
              <form method="POST" action="processa-cliente.php" id="cadastroClienteForm" class="mt-3">
                <div class="mb-3">
                  <label for="cliente" class="form-label mb-0">Nome do Cliente</label>
                  <input type="text" id="cliente" name="cliente" class="form-control dark-border"
                    onkeyup="maiusc(this)">
                </div>
                <div class="mb-3">
                  <label for="representante" class="form-label mb-0">Comercial</label>
                  <select id="representante" name="representante" class="form-select dark-border" required>
                    <option value="">Selecione o comercial</option>
                    <?php 
                      $query = $conexao->query("SELECT idcomercial,comercial FROM ncomercial ORDER BY idcomercial ASC");
                      $registros = $query->fetch_all(PDO::FETCH_ASSOC);
                      foreach($registros as $option){
                    ?>
                    <option value="<?php echo $option['1']?>"><?php echo $option['1']?></option>
                    <?php 
                      }
                    ?>
                  </select>
                </div>
                <input type="submit" value="CADASTRAR" name="submit" class="submit mt-1 btn btn-primary dark-border">
              </form>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>