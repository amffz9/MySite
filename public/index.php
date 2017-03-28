<?php
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
use League\Container\Container;
use League\Route\RouteCollection;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

require "../vendor/autoload.php";
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 11/13/16
 * Time: 12:31 PM
 */
$container = new Container();

$container->share(ResponseInterface::class, Response::class);
$container->share(ServerRequestInterface::class, function () {
    return ServerRequest::fromGlobals();
});
$container->share(RouteCollection::class)->withArgument($container);

$app = new Application($container);
//Spin up the app

$app->run();

