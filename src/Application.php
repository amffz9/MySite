<?php
use Interfaces\ApplicationInterface;
use League\Container\ContainerInterface;
use League\Route\RouteCollection;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Created by PhpStorm.
 * User: adam
 * Date: 12/3/16
 * Time: 1:32 PM
 */
class Application implements ApplicationInterface
{
    use \Traits\EmitterTrait;

    public const TWIG = 'twig';
    private static $container;

    /**
     * Application constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        self::$container = $container;
    }


    public function run(): void
    {
        $this->loadDependencies();
        $this->loadSettings();
        $this->loadRoutes();

        $routes = self::getContainer()->get(RouteCollection::class);
        $request = self::getContainer()->get(ServerRequestInterface::class);
        $response = self::getContainer()->get(ResponseInterface::class);

        $response = $routes->dispatch($request, $response);

        $this->emit($response);
    }

    public function loadDependencies(): void
    {
        $whoops = new \Whoops\Run();
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
        $whoops->register();
    }

    public function loadSettings(): void
    {
        $settings = require "../settings/settings.php";

        $loader = new Twig_Loader_Filesystem($settings['twig']['templates']);

        $container = self::getContainer();
        $routes = $container->get(RouteCollection::class);
        $extension = new \Extensions\TwigExtensions($routes);
        //$cachePath = $settings['twig']['cache'];
        $container->share(Twig_Environment::class)
            ->withArguments([$loader, ['cache' => false]]);

        $container->get(Twig_Environment::class)
            ->addExtension($extension);
        //replace false with cachePath in prod
    }

    /**
     * @return ContainerInterface|mixed
     * @throws Exception
     */
    public static function getContainer(): ContainerInterface
    {
        if (isset(self::$container)) {
            return self::$container;
        } else {
            throw new Exception("Container is not set");
        }
    }

    public static function setContainer(ContainerInterface $container)
    {
        self::$container = $container;
    }

    private function loadRoutes()
    {
        require "../routes/main.php";
    }

    /*Putting convenience functions*/
}