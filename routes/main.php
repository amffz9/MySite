<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 12/3/16
 * Time: 8:29 PM
 */

use League\Route\RouteCollection;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$container = Application::getContainer();

$routes = $container->get(RouteCollection::class);

$routes->get('/', function (ServerRequestInterface $request, ResponseInterface $response) use ($container) {
    $response->getBody()->write(
        $container
            ->get(Twig_Environment::class)
            ->render('test.twig')
    );
    return $response;
});
$routes->get('/PHPInfoPage', function (ServerRequestInterface $request, ResponseInterface $response) {
    phpinfo();
    return $response;
})->setName('info');
