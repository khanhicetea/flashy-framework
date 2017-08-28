<?php
use function DI\object;
use function DI\get;
use Flashy\Http\Middleware\RoutingMiddlewareStack;
use Flashy\Http\Route\Router;
use Flashy\Runnable\HttpApplication;
use Flashy\ServiceProvider\HttpService;
use App\Http\Routing;
use App\Http\MiddlewareStack;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;
use Flashy\Http\Kernel;
use Psr\Container\ContainerInterface;

require_once dirname(__DIR__).'/bootstrap/helpers.php';

$autoloader = (require_once dirname(__DIR__).'/vendor/autoload.php');
$dotenv = new Dotenv\Dotenv(dirname(__DIR__), '.env.testing');
$dotenv->load();

final class HttpTestApplication
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $response = $this->container->call([Kernel::class, 'run'], [
            $request,
            get('http.response')
        ]);

        return $response;
    }
}

abstract class HttpTestCase extends TestCase
{
    protected $app;
    
    protected function setUp() {
        $app = (require_once dirname(__DIR__).'/bootstrap/application.php');

        $app->register(new HttpService(), [
            Router::class => object(Routing::class)->method('loadRoutes'),
            RoutingMiddlewareStack::class => object(MiddlewareStack::class)->method('loadMiddlewares'),
        ]);
        
        $this->app = $app;
    }

    protected function sendRequest(ServerRequestInterface $request) {
        return $this->app->run(HttpTestApplication::class, $request);
    }
}