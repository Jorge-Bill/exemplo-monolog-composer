<?php
require_once  "../vendor/autoload.php";
require_once "conecta.php";
require_once "log.php";

$id = $_GET['id'];

$pdo = conectar();

$usuario = $pdo->prepare("SELECT id, nome, email, perfil FROM pessoa WHERE id=:id;");

$usuario ->bindParam(":id", $id);

$usuario->execute();

$usuario = $usuario->fetch(PDO::FETCH_ASSOC);

$usuario = (object)[
    'id'        => $usuario['id'],
    'nome'      => $usuario['nome'],
    'email'     => $usuario['email'],
    'perfil'     => $usuario['perfil'],
    'acao'      => 'gerarPDF'
];

$data = date('d/m/Y');

$num = rand();

$html = "<h1>Contrato de prestação de serviços</h1><hr/>
        <p>Senhor(a) <strong>".ucfirst(strtolower($usuario->nome))."</strong>, com o email ".ucfirst(strtolower($usuario->email))."</p>
        <p style='text-align: justify'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p style='text-align: justify'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p style='text-align: justify'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p style='text-align: justify'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p style='text-align: justify'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p style='text-align: justify'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Concorda com o contrato nº  <strong>".$num."</strong></p>
        <h4 style='text-align: right;'>São Paulo, ".$data."</h4>
        <hr>Assinatura
            ";

$mpdf = new Mpdf\Mpdf();
$mpdf -> SetDisplayMode("fullpage");
$mpdf -> WriteHTML($html);
$mpdf -> Output();
$log->debug('I am debug, sucess', array($usuario->id, $usuario->nome, $usuario->acao));
