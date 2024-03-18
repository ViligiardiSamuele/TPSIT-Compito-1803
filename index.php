<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();

function autoloader($class_name)
{
    $directories = ['', '/controllers', '/views', '/templates', '/src'];
    foreach ($directories as $dir) {
        $file = __DIR__ . $dir . '/' . $class_name . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
}
spl_autoload_register('autoloader');

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Index! :)");
    return $response;
});

$app->get('/negozio', 'NegozioController:negozio');

$app->get('/articoli', 'ArticoliController:articoli');
$app->get('/articoli/{id}', 'ArticoliController:articolo');

$app->get('/ordini', 'OrdiniController:ordini');
$app->get('/ordini/{numero_ordine}', 'OrdiniController:ordine');
$app->get('/ordini/{numero_ordine}/articoli_venduti', 'OrdiniController:articoli_venduti');
$app->get('/ordini/{numero_ordine}/articoli_venduti/{id}', 'OrdiniController:articolo_venduto');

$app->get('/ordini/{numero_ordine}/verifica', 'OrdiniController:verifica');
$app->get('/ordini/{numero_ordine}/sconto', 'OrdiniController:sconto');

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->run();
