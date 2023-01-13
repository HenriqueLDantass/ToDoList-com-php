<?php
session_start();
require("Config.php");


if (isset($_POST['email']) && empty($_POST['email']) == false) {
    if (strlen($_POST['email']) == 0) {
        echo $_SESSION['msg'] = '<div class="alert alert-danger position-absolute top-0 start-50 translate-middle-x" role="alert">
         Senha ou email incorretos!
      </div>';
    } else if (strlen($_POST['senha']) == 0) {
        echo $_SESSION['msg'] = '<div class="alert alert-danger position-absolute top-0 start-50 translate-middle-x" role="alert">
        Senha ou email incorretos!
  </div>';
    } else {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        $sql = $pdo->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['id'] = $dado['id'];
            header("Location:index.php");
            exit;
        } else {
            echo $_SESSION['msg'] = '<div class="alert alert-danger position-absolute top-0 start-50 translate-middle-x" role="alert">
            Senha ou email incorretos!
      </div>';
        }
    }
} else {
}
?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>TodoList</title>
    <link rel="stylesheet" href="Styles/style.css">
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form style="width: 23rem;" method="POST">

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Faça o login </h3>

                            <div class="form-outline mb-4">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control form-control-lg" name="email" require autocomplete="off" />

                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label">Senha</label>
                                <input type="password" class="form-control form-control-lg" name="senha" require />

                            </div>

                            <div class="pt-1 mb-4">
                                <input type="submit" class="btn btn-info btn-lg btn-block" value="Entre">
                            </div>


                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="Images/Imagem-login.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>




    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>