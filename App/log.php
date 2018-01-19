<?php

require_once  '../vendor/autoload.php';
require_once "conecta.php";

use Monolog\Logger;
use \Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('app');

// Line formatter without empty brackets in the end
$formatter = new LineFormatter(null, null, false, true);
// Debug level handler
$debugHandler = new StreamHandler(__DIR__.'/log/debug.log', Logger::DEBUG);
$debugHandler->setFormatter($formatter);
// Error level handler
$errorHandler = new StreamHandler(__DIR__.'/log/error.log', Logger::ERROR);
$errorHandler->setFormatter($formatter);
// This will have both DEBUG and ERROR messages
$log->pushHandler($debugHandler);
// This will have only ERROR messages
$log->pushHandler($errorHandler);
// The actual logging

//$log->debug('I am debug, sucess', array($usuario->id, $usuario->nome, $usuario->acao));
//$log->error('I am error, not success', array($usuario->id, $usuario->nome, $usuario->acao));

function GerarLog($log, $usuario)
{
    $log->debug('Sucesso', array($usuario->id, $usuario->nome, $usuario->acao));
}