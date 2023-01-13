<?php
try {
    $pdo = new PDO("mysql:dbname=test;host=localhost", "root");
    //echo "Conecao estabelecida";
} catch (PDOException $err) {
    echo "Conexão com o banco de dados falhou" . $err->getMessage();
}
