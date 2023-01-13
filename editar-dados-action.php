<?php
session_start();
require("Config.php");
$id = filter_input(INPUT_POST, "id");
$nome = filter_input(INPUT_POST, "nome");
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, "senha");

if ($id && $nome && $senha && $email) {
    $sql = $pdo->prepare("UPDATE usuarios SET nome=:nome, email =:email, senha =:senha WHERE id=:id");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":senha", $senha);
    $sql->execute();
} else {
    echo "Preencha os campos";
}
header("Location:index.php");
exit;
