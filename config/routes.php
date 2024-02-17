<?php

use App\Controller\HomeController;

$app->get('/', HomeController::class . ':index');
$app->get('/hello', HomeController::class . ':hello');