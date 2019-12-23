<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizar Grupos dos Leads</title>
</head>

<body>
    <?php require "../dashboard/dashboard.php"; 
          include_once "../conexao/db_conexao.php";
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
    ?>

    <h2 class="font-weight-bold text-center my-5">Visualizar Grupos de Leads</h1>

        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th scope="col">Cód.</th>
                            <th scope="col"></th>
                            <th scope="col">Origem do Lead</th>
                            <th scope="col"></th>
                            <th scope="col">Descrição do Grupo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "select id, grupolead, descricao from grupolead";
                        $resultado_grupolead = mysqli_query($conn, $sql);
                        while ($dados = mysqli_fetch_array($resultado_grupolead)) :
                            ?>
                        <tr>
                            <?php include_once 'delGrupoLead.php'; ?>

                            <td><?php echo $dados['id']; ?></td>
                            <th scope="row"></th>
                            <td><?php echo $dados['grupolead']; ?></td>
                            <th scope="row"></th>
                            <td><?php echo $dados['descricao']; ?></td>
                            <th scope="row"></th>
                            <td><a class="btn btn-primary btn-sm" href="edtGrupoLead.php?id=<?php echo $dados['id']; ?>"><i class="fas fa-edit"></i>Editar</a></td>
                            <th scope="row"></th>
                            <td><a class="btn btn-primary btn-sm" data-toggle="modal" href="#basicExampleModal<?php echo $dados['id']; ?>"><i class="fas fa-trash"></i>Deletar</a></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination pg-blue justify-content-center">
                    <li class="page-item">
                        <a class="page-link" tabindex="-1">Anterior</a>
                    </li>
                    <li class="page-item active"><a class="page-link">1</a></li>
                    <li class="page-item">
                        <a class="page-link">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link">3</a></li>
                    <li class="page-item ">
                        <a class="page-link">Próximo</a>
                    </li>
                </ul>
            </nav>
        </div>
</body>

</html>