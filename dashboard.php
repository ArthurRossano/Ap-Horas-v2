<?php
session_start();

if ((!isset($_SESSION['username']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['username']);
  unset($_SESSION['senha']);
  header('Location: home.php');
}
$logado = $_SESSION['nome'];

include_once('config.php');


$sql = "SELECT user, SEC_TO_TIME(SUM(TIME_TO_SEC(totHoras))) AS total_horas_trabalhadas FROM horas GROUP BY user";
$resultado = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/slider.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <title>Dashboard</title>
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
    <div id="content-dashboard">
      <div class="dashboard-content">
        <div class="dashboard-main">
          <?php
            echo "<h2>Bem-vindo ao apontamento de horas, $logado!</h2>";
            echo "<p>Atente-se ao lançar suas horas trabalhadas</p>";
            ?>
        </div>
        <div hidden="container">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Usuário</th>
                <th scope="col">Total de Horas Trabalhadas</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while ($row = $resultado->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["user"] . "</td>";
                  echo "<td>" . $row["total_horas_trabalhadas"] . "</td>";
                  echo "</tr>";
                }
                ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>