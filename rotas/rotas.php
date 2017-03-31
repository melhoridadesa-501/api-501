<?php

require_once __DIR__.'./../vendor/autoload.php';

// Chamada de bibliotecas
use melhoridade\app\Banner\CadastroBanner;
use melhoridade\app\Noticias\Noticia;
use melhoridade\app\Dados\Dados;
use melhoridade\app\Contato\CadastroContato;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Instancias
$app     = new Application();
$banner  = new CadastroBanner();
$noticia = new Noticia();
$contato = new CadastroContato();

//twig
$app->register(new Silex\Provider\TwigServiceProvider(),array(
    'twig.path' => 'views',
));

//trasnforma a active em uma variavel global
$app->before(function (Request $request) use ($app) {
    $app['twig']->addGlobal('active', $request->get("_route"));
});

//swiftMailer
$app->register(new Silex\Provider\SwiftmailerServiceProvider(), [
    'swiftmailer.options' => [
        'transport' => 'smtp',
        'host' => 'smtp.gmail.com',
        'port' => '465',
        'username' => 'melhoridadesa.501@gmail.com',
        'password' => 'q1w2e3r4@',
        'encryption' => 'ssl',
        'auth_mode' => 'login',
    ],
]);

//Debug
 $app['debug'] = true;


// GET

$app->get('/', function() use ($app){
    return $app['twig']->render('index.twig');
})->bind('index');

$app->get('/usuario', function(){
	return 'Hello World';
});

$app->get('/banner', function(Application $app) use ($banner){
	return $app->json($banner->getBanners(), 200);
});

$app->get('/noticia', function(Application $app) use ($noticia){
    //return $app->json($noticia->buscarDados('1'), 200);/*
    return $app['twig']->render('pages/noticia.twig',array(
        'materia'=>$app->json($noticia->buscarDados('1'), 200),
    ));
})
    ->bind('noticia');

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
    return $app['twig']->render('pages/contato.twig',array(
        'contatoNome'=>$objetoContato->getNome(),
        'contatoTelefone'=>$objetoContato->getTelefone(),
        'contatoEmail'=>$objetoContato->getEmail(),
    ));
})
->value('nome', NULL)
->value('telefone',NULL)
->value('email',NULL)
->bind('contato');


$app->post('/feedback', function (Request $request) use ($app) {
    $message = \Swift_Message::newInstance()
        ->setSubject('[YourSite] Feedback')
        ->setFrom(array('noreply@yoursite.com'))
        ->setTo(array('raphael@moryta.com'))
        ->setBody($request->get('message'));
    $app['mailer']->send($message);

    return new Response($request->get('message'), 201);
});

//idoso
$app->get('/idoso', function() use ($app){
    return $app['twig']->render('pages/idoso.twig');
})->bind('idoso');


// POST

$app->post('/michael', function(){
	return 'Hello World';
});

$app->run();