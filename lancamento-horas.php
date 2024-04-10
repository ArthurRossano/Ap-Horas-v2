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
    <script src="js/horas.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>Apontamento de Horas</title>
    <link rel="icon" href="img/logo1.png" type="image/png">
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
        <div id="content" class="mt-4 center-horas">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h2 class="text-center mb-4">APONTAMENTO DE HORAS</h2>
                        <section>
                            <form action="info-projeto.php" method="POST" id="lancamentoHorasForm" class="mt-3">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="usuario" class="form-label mb-0">Usuário</label>
                                        <input type="hidden" name="usuario"
                                            value="<?php $logado = mb_strtoupper("$logado",'UTF-8') ; echo "$logado"; ?>">
                                        <div class="bold-text"><?php $logado = mb_strtoupper("$logado",'UTF-8') ; echo "$logado"; ?></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="projeto" class="form-label mb-0">Projeto</label>
                                        <select id="projeto" name="projeto" class="form-select dark-border" required>
                                            <option value="">Selecione um projeto</option>
                                            <?php 
                                                $query= $conexao->query("SELECT codProjeto,cliente,representante FROM projetos ORDER BY idprojetos ASC");
                                                $registros = $query->fetch_all(PDO::FETCH_ASSOC);
                                                foreach($registros as $option){
                                                ?>
                                            <option value="<?php echo $option['0']?>"><?php echo $option['0']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="tipo" class="form-label mb-0">Tipo de Atendimento</label>
                                        <select id="tipo" name="tipo" class="form-select dark-border" required>
                                            <option value="">Selecione um tipo</option>
                                            <?php 
                                            $query= $conexao->query("SELECT tipo FROM tipos ORDER BY idtipos ASC");
                                            $registros = $query->fetch_all(PDO::FETCH_ASSOC);
                                            foreach($registros as $option){
                                            ?>
                                            <option value="<?php echo $option['0']?>"><?php echo $option['0']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="atv" class="form-label mb-0">Atividade</label>
                                        <select id="atv" name="atv" class="form-select dark-border" required>
                                            <option value="">Selecione uma atividade</option>
                                            <?php 
                                            $query= $conexao->query("SELECT atv FROM atividades ORDER BY idatv ASC");
                                            $registros = $query->fetch_all(PDO::FETCH_ASSOC);
                                            foreach($registros as $option){
                                            ?>
                                            <option value="<?php echo $option['0']?>"><?php echo $option['0']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="hIni" class="form-label mb-0">Hora de Início</label>
                                        <input type="time" id="hIni" name="hIni" class="form-control dark-border" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hFim" class="form-label mb-0">Hora de Término</label>
                                        <input type="time" id="hFim" name="hFim" class="form-control dark-border" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="data" class="form-label mb-0">Data</label>
                                        <input type="date" id="data" name="data" class="form-control dark-border" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="totHoras" class="form-label mb-0">Total de Horas</label>
                                        <input type="text" id="totHoras" name="totHoras" class="form-control dark-border" readonly>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <input type="submit" value="REGISTRAR" class="submit mt-1 btn btn-primary dark-border">
                                    </div>
                                </div>

                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>




    </div>
</body>

</html>

