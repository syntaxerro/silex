<?php
require_once __DIR__ . '/../vendor/autoload.php';
$app = new Silex\Application();
require __DIR__ . '/../resources/prod.php';
require __DIR__ . '/../src/app.php';
require __DIR__ . '/../src/controllers.php';
require __DIR__ . '/../src/Model/Tip.php';
require __DIR__ . '/../src/Model/TList.php';


$app->run();
