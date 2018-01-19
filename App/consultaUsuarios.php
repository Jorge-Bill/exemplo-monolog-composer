<?php

require_once "conecta.php";

$pdo = conectar();

$detalhesPessoa = $pdo->prepare("SELECT * FROM pessoa");

$detalhesPessoa->execute();

$detalhesPessoa = $detalhesPessoa->fetchAll(PDO::FETCH_OBJ);
