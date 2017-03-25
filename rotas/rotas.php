<?php

require_once __DIR__.'./../vendor/autoload.php';

// Chamada de bibliotecas
use melhoridade\app\Banner\CadastroBanner;
use Silex\Application;

// Instancias
$app = new Application();
$banner = new CadastroBanner();

//Debug
// $app['debug'] = true;

// GET

$app->get('/', function(){
	return 'Hello World';
});

$app->get('/usuario', function(){
	return 'Hello World';
});

$app->get('/banner', function(Application $app) use ($banner){
	return $app->json($banner->getBanners(), 200);
});

// POST

$app->post('/michael', function(){
	return 'Hello World';
});

$app->run();