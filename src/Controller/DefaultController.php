<?php

namespace Sandbox\Controller;
use Sandbox\Core\Request;
use Sandbox\View\View;

class DefaultController
{
    public function defaultRoute(Request $request)
    {
        /* Create a view object. */
        $view = new View("default", "404");
        $params = [
            "title" => "404 Page",
        ];
        $view->render($params);
    }
}
