<?php

namespace Sandbox\Controller;
use Sandbox\Core\Request;
use Sandbox\View\View;

class HomeController
{
    public function getMain(Request $request): void
    {
        $view = new View("default", "main");
        $params = [
            "title" => "Main Page",
        ];
        $view->render($params);
    }
}
