<?php

namespace Sandbox\Controller;
use Sandbox\Core\Request;

class HomeController
{
    public function getMain(Request $request): void
    {
        /* Call View class to display main page. */
        echo "Get Home";
    }
}
