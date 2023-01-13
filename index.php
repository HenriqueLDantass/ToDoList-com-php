<?php
session_start();
require('Config.php');
$info = [''];
if (isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
    $id = $_SESSION['id'];
    if ($id) {
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id=:id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
    <link rel="stylesheet" href="Styles/style-index.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    TodoList
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="Alterar-dados.php?=<?= $info['id'] ?>">Alterar dados</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <a class="nav-link text-white me-3 fs-5" href="sair.php" role="button">sair</a>

            </div>
        </div>
    </nav>

    <!--adicionar tarefa-->
    <!-- Button trigger modal -->
    <div class="display-flex">
        <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Adicionar tarefa
        </button>
        <button type="button" class="btn btn-primary m-3">
            Excluir todas as tarefas
        </button>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicione a sua tarefa</h5>
                </div>
                <div class="modal-body">
                    <form action="adicionar-tarefa.php" method="POST">
                        <!--input para adicionar tarefa-->
                        <input type="text" class="form-control form-control-lg" name="atividades" require />
                        <input type="hidden" value="<?= $info['id'] ?>">
                        <div class="modal-footer display-flex ml-5">
                            <input type="submit" class="btn btn-primary" value="Adicionar tarefa">

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>