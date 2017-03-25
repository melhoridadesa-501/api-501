<?php

require_once __DIR__.'./../vendor/autoload.php';

// Chamada de bibliotecas
use melhoridade\app\Banner\CadastroBanner;
use melhoridade\app\Noticias\Noticia;
use melhoridade\app\Dados\Dados;
use Silex\Application;

// Instancias
$app     = new Application();
$banner  = new CadastroBanner();
$noticia = new Noticia();

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

$app->get('/noticia', function(Application $app) use ($noticia){
	return $app->json($noticia->buscarDados(), 200);
});

// POST

$app->post('/michael', function(){
	return 'Hello World';
});

$app->run();