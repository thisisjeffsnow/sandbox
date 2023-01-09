<?php

namespace Sandbox\Core;

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
            "class" => "Sandbox\Core\Controller",
            "method" => "defaultRoute",
        ];

        /* What happens if this class is not defined anywhere? */
        $requestClass = new ($requestRoute["class"])();
        $requestClass->{$requestRoute["method"]}($request);
    }
}
