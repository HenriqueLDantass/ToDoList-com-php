<?php
require 'config.php';

$atividades = filter_input(INPUT_POST, "atividades");
if ($atividades) {
    $sql = $pdo->prepare("SELECT * FROM tarefas WHERE atividas=:atividas");
    $sql->bindValue(":atividas", $atividades);
    $sql->execute();
    if ($atividades) {
        $sql = $pdo->prepare("INSERT INTO tarefas (atividas) VALUES (:atividas) ");
        $sql->bindValue(":atividas", $atividades);
        $sql->execute();

        header("Location:index.php");
        exit;
    }
} else {
    header("Location:adicionar.php");
    exit;
}
