<?php

require_once  __DIR__. '/vendor/autoload.php';

require_once "App/conecta.php";
require_once "App/consultaUsuarios.php";

?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="text-center">Lista de usuários</h1>
            </div>
            <div class="panel-body table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>perfil</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($detalhesPessoa as $pessoa): ?>
                        <tr>
                            <td><?=ucfirst(strtolower($pessoa->nome));?></td>
                            <td><?=ucfirst(strtolower($pessoa->email));?></td>
                            <td><?=ucfirst(strtolower($pessoa->perfil));?></td>
                            <td><a class="btn btn-info" href="App/gerarPdf.php?id=<?=$pessoa->id;?>" target="_blank">Pdf</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>