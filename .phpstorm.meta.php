<?php

namespace PHPSTORM_META {

    use Interop\Container\ContainerInterface;
    use League\Route\RouteCollection;

    override(ContainerInterface::get(0),
        map([
            \Twig_Environment::class => \Twig_Environment::class,
            RouteCollection::class => RouteCollection::class
        ]));
}