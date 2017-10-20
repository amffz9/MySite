<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 7/19/17
 * Time: 9:59 PM
 */

namespace Controllers;


use Application;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Twig_Environment;

class MainController
{
    public function info(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $container = Application::getContainer();

        $twig = $container->get(Twig_Environment::class);
        $response->getBody()->write($twig->render('info.twig'));

        return $response;
    }
}