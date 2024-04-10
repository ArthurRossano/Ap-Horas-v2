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

  $registros_por_pagina = 5;
  $pagina_atual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
  $inicio = ($pagina_atual - 1) * $registros_por_pagina;

  // Consulta SQL com LIMIT para paginação
  $sql = "SELECT * FROM horas ORDER BY idHoras DESC LIMIT $inicio, $registros_por_pagina";
  $res = $conexao->query($sql);

  // Contar o total de registros
  $sql_total = "SELECT COUNT(*) AS total FROM horas";
  $resultado_total = $conexao->query($sql_total);
  $total_registros = $resultado_total->fetch_assoc()['total'];
  $total_paginas = ceil($total_registros / $registros_por_pagina);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
    <link rel="icon" href="img/logo1.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
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
    </div>

    <div class="m-5">
        <h2 class='text-center mb-4'>CONTROLE DE HORAS</h2>
        <div class="table-responsive">
            <table id="tabela" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class='text-center' style='max-width:250px' scope="col">USUÁRIO</th>
                        <th class='text-center' style='max-width:450px' scope="col">CÓDIGO</th>
                        <th class='text-center' style='max-width:450px' scope="col">CLIENTE</th>
                        <th class='text-center' style='max-width:250px' scope="col">TIPO</th>
                        <th class='text-center' style='max-width:250px' scope="col">ATIVIDADE</th>
                        <th class='text-center' style='max-width:250px' scope="col">DATA</th>
                        <th class='text-center' style='max-width:250px' scope="col">H.INICIO</th>
                        <th class='text-center' style='max-width:250px' scope="col">H.FIM</th>
                        <th class='text-center' style='max-width:250px' scope="col">TOTAL</th>
                        <th class='text-center' style='max-width:250px' scope="col">COMERCIAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($user_data = mysqli_fetch_assoc($res))
                        {
                        echo "<tr>";
                        echo "<td class='align-middle text-center' style='max-width:250px'>".$user_data['user']."</td>";
                        echo "<td class='align-middle text-center' style='max-width:450px'>".$user_data['codProjeto']."</td>";
                        echo "<td class='align-middle text-center' style='max-width:450px'>".$user_data['cliente']."</td>";
                        echo "<td class='align-middle text-center' style='max-width:250px'>".$user_data['tipo']."</td>";
                        echo "<td class='align-middle text-center' style='max-width:250px'>".$user_data['atv']."</td>";
                        $data_formatada = date("d/m/Y", strtotime($user_data['rdata']));
                        echo "<td class='align-middle text-center' style='max-width:250px'>".$data_formatada."</td>";
                        echo "<td class='align-middle text-center' style='max-width:250px'>".$user_data['hini']."</td>";
                        echo "<td class='align-middle text-center' style='max-width:250px'>".$user_data['hfim']."</td>";
                        echo "<td class='align-middle text-center' style='max-width:250px'>".$user_data['totHoras']."</td>";
                        echo "<td class='align-middle text-center' style='max-width:250px'>".$user_data['representante']."</td>";    
                        echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="mt-2 pagination justify-content-end red-pagination">
                    <li class="page-item <?php if ($pagina_atual == 1) echo 'disabled'; ?>">
                        <a class="page-link" href="?pagina=1" aria-label="Primeira">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item <?php if ($pagina_atual == 1) echo 'disabled'; ?>">
                        <a class="page-link" href="?pagina=<?php echo $pagina_atual - 1; ?>" aria-label="Anterior">
                            <span aria-hidden="true">&lt;</span>
                        </a>
                    </li>
                    <?php 
                    $limite_paginas = 1;
                    $inicio_paginas = max(1, $pagina_atual - $limite_paginas);
                    $fim_paginas = min($total_paginas, $pagina_atual + $limite_paginas);

                    for ($i = $inicio_paginas; $i <= $fim_paginas; $i++) :
                    ?>
                    <li class="page-item <?php if ($i == $pagina_atual) echo 'active'; ?>">
                        <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if ($pagina_atual == $total_paginas) echo 'disabled'; ?>">
                        <a class="page-link" href="?pagina=<?php echo $pagina_atual + 1; ?>" aria-label="Próxima">
                            <span aria-hidden="true">&gt;</span>
                        </a>
                    </li>
                    <li class="page-item <?php if ($pagina_atual == $total_paginas) echo 'disabled'; ?>">
                        <a class="page-link" href="?pagina=<?php echo $total_paginas; ?>" aria-label="Última">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#tabela').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Portuguese.json"
                    },
                    "paging": false,
                    "searching": false,
                    "info":false
                });
            });
        </script>
</body>

</html>