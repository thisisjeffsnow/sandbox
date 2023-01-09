<?php

namespace Sandbox\Controller;
use Sandbox\Core\Controller;

class DefaultController extends Controller
{
    public function defaultRoute()
    {
        /* Call View class to display 404 page. */
        echo "404.";
    }
}
