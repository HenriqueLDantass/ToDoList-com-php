<?php
session_start();
require("Config.php");
$id = filter_input(INPUT_GET, "id");
$tarefa = filter_input(INPUT_POST, "tarefa");


if ($id && $tarefa) {
    $sql = $pdo->prepare("UPDATE tarefas SET atividas =:atividas WHERE id=:id");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":atividas", $tarefa);
    $sql->execute();

    header("Location:index.php");
    exit;
} else {
    echo "Error. Violção detectada";
}
