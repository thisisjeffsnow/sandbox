<?php

namespace Sandbox\Controller;
use Sandbox\Core\Request;
use Sandbox\View\View;

class HomeController
{
    public function getMain(Request $request): void
    {
        /* Call View class to display main page. */
        $view = new View("default", "main");
    }
}
