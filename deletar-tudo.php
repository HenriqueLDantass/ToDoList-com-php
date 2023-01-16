<?php
require 'Config.php';

$sql = $pdo->prepare("DELETE FROM tarefas");
$sql->execute();
header('Location:index.php');
exit;
