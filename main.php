<?php
require_once './vendor/autoload.php';

use App\TicTacToe;

$app = new TicTacToe();

/** @noinspection PhpUnhandledExceptionInspection */
$app->run();
