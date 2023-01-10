<pre><?php
require_once __DIR__ . "/../vendor/autoload.php";

use Sandbox\Core\Router;
use Sandbox\Core\Request;

$router = new Router();
$router->addRoute(
    Request::METHOD_GET,
    "/",
    "Sandbox\Controller\HomeController",
    "getMain"
);

$request = new Request();
$router->resolveRoute($request);

