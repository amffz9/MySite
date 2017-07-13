<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 1/28/17
 * Time: 12:36 PM
 */

namespace Extensions;


use League\Route\RouteCollection;

class TwigExtensions extends \Twig_Extension
{

    public $router;

    /**
     * TwigExtension constructor.
     * @param RouteCollection $routeCollection
     */
    public function __construct(RouteCollection $routeCollection)
    {
        $this->router = $routeCollection;
    }

    public function getFunctions()
    {
        return [
            new \Twig_Function('path_for', [$this, 'pathFor'])
        ];
    }

    public function pathFor(string $name)
    {
        try {
            return $this->router->getNamedRoute($name)->getPath();
        } catch (\Exception $exception) {
            return "";
        }
    }
}