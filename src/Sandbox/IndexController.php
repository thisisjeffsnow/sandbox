<?php
namespace Sandbox;

class IndexController {
    public const DEFAULT_VIEW = 'main';
    public const VIEWS = ['main', 'create', 'summary'];

    public function index() {
        /* Grab view from GET or set to default. */
        $requested_view =
        array_key_exists('view', $_GET) &&
        in_array($_GET['view'], IndexController::VIEWS) ?
        $_GET['view'] : IndexController::DEFAULT_VIEW;

        /* Create the view object and render it. */
        $view = new View($requested_view);
        $view->render();        
    }


    
}