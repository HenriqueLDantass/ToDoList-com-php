<?php
session_start();
require("Config.php");
$dado = [''];
if (isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
    $id = $_SESSION['id'];
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id =:id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $dado = $sql->fetch(PDO::FETCH_ASSOC);
    }
} else {
    header("Location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-image: linear-gradient(to right, #fff, #0000FF);;">

    <section>
        <div class="container py-4 h-50">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-3 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <div class="position-absolute">
                                    <!--Voltar -->
                                    <a class="nav-link text-white me-3 fs-5" href="voltar.php" role="button"><img src="Images/de-volta.png" alt=""></a>
                                </div>
                                <form action="editar-dados-action.php" method="POST">
                                    <h2 class="fw-bold mb-2 text-uppercase">Alterar</h2>
                                    <div class="form-outline form-white mb-4">
                                        <!--input nome-->
                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="typeEmailX">Nome</label>
                                            <input type="text" class="form-control form-control-lg" value="<?= $dado['nome'] ?>" name="nome" require />

                                        </div>

                                        <!--input Email-->
                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="typeEmailX">Email</label>
                                            <input type="email" class="form-control form-control-lg" value="<?= $dado['email'] ?>" name="email" require />

                                        </div>
                                        <!--input senha-->
                                        <div class="form-outline form-white mb-4">
                                            <label class="form-label" for="typePasswordX">Senha</label>
                                            <input type="text" class="form-control form-control-lg" value="<?= $dado['senha'] ?>" name="senha" />
                                            <input type="hidden" value="<?= $dado['id'] ?>" name="id" />
                                        </div>
                                        <!--input alterar-->
                                        <input class=" btn btn-outline-light btn-lg px-5" type="submit" value="Alterar">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>