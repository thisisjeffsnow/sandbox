<?php

namespace Sandbox\Core;

use Sandbox\Exception\BadRouteException;

class Router
{
    public function __construct(private array $routeMap = [])
    {
    }

    public function addRoute(
        string $requestMethod,
        string $requestPath,
        string $controllerClass,
        string $controllerMethod
    ): void {
        $this->routeMap[$requestMethod][$requestPath] = [
            "class" => $controllerClass,
            "method" => $controllerMethod,
        ];
    }

    public function resolveRoute(Request $request): void
    {
        $requestMethod = $request->method();
        $requestPath = $request->path();
        $requestRoute = $this->routeMap[$requestMethod][$requestPath] ?? [
            "class" => "Sandbox\Core\Controeller",
            "method" => "defaultRoute",
        ];
        $routeClass = $requestRoute["class"];

        if (!class_exists($routeClass)) {
            $message = <<<MSG
The controller ($routeClass) supplied as an argument in Router->addRoute
does not exist or is not accessible.
MSG;
            throw new BadRouteException($message);
        }
        $requestClass = new ($requestRoute["class"])();
        $requestClass->{$requestRoute["method"]}($request);
    }
}
