<?php
/**
 * Application Entry
 */
define('BASE', realpath(__DIR__ . '/../'));
define('BASE_URL', 'https://sandbox.local');

spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        require BASE . '/src/' . $file;
    }
);

use Sandbox\IndexController;

$index_controller = new IndexController();
$index_controller->index();

/* Test */
echo "Adding new stuff to branch.";