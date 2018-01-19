<?php

function conectar(){
    try{
        $pdo			= new PDO('mysql:host=127.0.0.1; dbname=pessoa', 'root', 'atitudephp');
    }catch(PDOException $erro_conn){
        echo $erro_conn->getMessage();
    }
    return $pdo;
}

function formatoData($data){
    $array = explode("-", $data);
    $novaData = $array[2]."/".$array["1"]."/".$array[0];
    return $novaData;
}