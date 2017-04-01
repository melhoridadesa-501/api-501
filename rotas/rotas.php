<?php

require_once __DIR__.'./../vendor/autoload.php';

// Chamada de bibliotecas
use Symfony\Component\HttpFoundation\Request;
use melhoridade\app\Banner\CadastroBanner;
use melhoridade\app\Noticias\Noticia;
use melhoridade\app\Dados\Dados;
use Silex\Application;

// Instancias
$app     = new Application();
$banner  = new CadastroBanner();
$noticia = new Noticia();

//Debug
 $app['debug'] = true;

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

$app->get('/noticia/{id}', function(Application $app, $id) use ($noticia){
	return $app->json($noticia->buscarDados($id), 200);
});

$app->get('/TodasNoticias', function(Application $app) use ($noticia){
	return $app->json($noticia->buscarTodosDados(), 200);
});

// POST

$app->post('/', function(){
	return 'Hello World';
});

$app->post('/inserirNoticia', function(Application $app, Request $request) use ($noticia){
	return $app->json($noticia->inserirNoticia($request->get('id_noticia'), $request->get('titulo'), $request->get('descricao'), $request->get('data_id_data'), $request->get('usuario_id_usuario'), $request->get('status_id_status')), 200);
});

$app->run();