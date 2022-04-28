<?php
require_once './vendor/autoload.php';

use App\Bleble;
use function Termwind\ask;

$app = new Bleble();

$app->run();
