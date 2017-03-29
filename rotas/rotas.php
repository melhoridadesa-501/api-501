<?php

require_once __DIR__.'./../vendor/autoload.php';

// Chamada de bibliotecas
use melhoridade\app\Banner\CadastroBanner;
use melhoridade\app\Noticias\Noticia;
use melhoridade\app\Dados\Dados;
use melhoridade\app\Contato\CadastroContato;
use Silex\Application;

// Instancias
$app     = new Application();
$banner  = new CadastroBanner();
$noticia = new Noticia();
$contato = new CadastroContato();

$app->register(new Silex\Provider\TwigServiceProvider(),array(
    'twig.path' => 'views',
));

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

$app->get('/noticia', function(Application $app) use ($noticia){
	return $app->json($noticia->buscarDados('1'), 200);
});

$app->get('/TodasNoticias', function(Application $app) use ($noticia){
	return $app->json($noticia->buscarTodosDados(), 200);
});

$app->get(/**
 * @param $nome
 * @param $telefone
 * @param $email
 * @return mixed
 */
    '/contato/{nome}/{telefone}/{email}', function($nome, $telefone, $email) use ($app)
{
    $objetoContato = new CadastroContato;
    $objetoContato->setContato($nome,$telefone,$email);
    /** @var TYPE_NAME $app */
    return $app['twig']->render('contato.twig',array(
        'contatoNome'=>$objetoContato->getNome(),
        'contatoTelefone'=>$objetoContato->getTelefone(),
        'contatoEmail'=>$objetoContato->getEmail(),
    ));
})
->value('nome', NULL)
->value('telefone',NULL)
->value('email',NULL);

// POST

$app->post('/michael', function(){
	return 'Hello World';
});

$app->run();