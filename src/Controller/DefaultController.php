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
        $view->render();
    }
}
