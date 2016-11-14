<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 11/13/16
 * Time: 3:31 PM
 */
namespace Routes;

use Aura\Router\RouterContainer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$routerContainer = new RouterContainer();


$routes = $routerContainer->getMap();

$routes->get('Home', '/', function (ServerRequestInterface $request, ResponseInterface $response) {
    $response->getBody()->write("Testing");
    return $response;
});

return $routerContainer;