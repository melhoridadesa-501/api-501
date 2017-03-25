<?php

require_once __DIR__.'./../vendor/autoload.php';

// Chamada de bibliotecas
use Silex\Application;

// Instancias
$app = new Application();

//Debug
$app['debug'] = true;

$app->post('/teste', function(){
	return 'Hello World';
});