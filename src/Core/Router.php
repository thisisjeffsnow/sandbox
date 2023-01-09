<?php

namespace Sandbox\Core;

use Sandbox\Exception\BadRouteException;
use Sandbox\Exception\BadRouteMethodException;

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
            "class" => "Sandbox\Controller\DefaultController",
            "method" => "defaultRoute",
        ];
        $routeClass = $requestRoute["class"];
        if (!class_exists($routeClass)) {
            $message =
                "The controller ($routeClass) supplied as an argument " .
                "in Router->addRoute() does not exist or is not accessible.";
            throw new BadRouteException($message);
        }
        $routeClassInstance = new $routeClass();
        $routeMethod = $requestRoute["method"];
        if (!method_exists($routeClass, $routeMethod)) {
            $message =
                "The method ($routeMethod) supplied for the controller " .
                "($routeClass) in Router->addRoute() does not exist or is " .
                " not accesible.";
            throw new BadRouteMethodException($message);
        }
        $routeClassInstance->{$routeMethod}($request);
    }
}
