<?php
require_once './vendor/autoload.php';

use App\Bleble;

$app = new Bleble();
$app->seed();

$app->run();
