<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 12/3/16
 * Time: 8:29 PM
 */

use League\Route\RouteCollection;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$container = Application::getContainer();
$routes = $container->get(RouteCollection::class);

$routes->get('/', function (Request $request, Response $response) use ($container) {
    $twig = $container->get(Twig_Environment::class);
    $response->getBody()->write($twig->render('test.twig'));

    return $response;
})->setName("Home");

$routes->get('/Info', [new \Controllers\MainController, 'info'])->setName('Info');

$routes->get('/About', function (Request $request, Response $response) use ($container) {
    $twig = $container->get(Twig_Environment::class);
    $response->getBody()->write($twig->render('test.twig'));

    return $response;
})->setName('About');

$routes->get('/Other', function (Request $request, Response $response) use ($container) {
    $twig = $container->get(Twig_Environment::class);
    $response->getBody()->write($twig->render('test.twig'));

    return $response;
})->setName("Other");

$routes->get('/Login', function (Request $request, Response $response) use ($container) {
    $twig = $container->get(Twig_Environment::class);
    $response->getBody()->write($twig->render('test.twig'));

    return $response;
})->setName('Login');
