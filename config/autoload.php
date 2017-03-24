<?php
$autoloadClassmap = [
    // Router
    'App\Router'                         => __DIR__ . '/../app/routing.php',

    // Controllers
    'App\Controller\ProductController'   => __DIR__ . '/../app/Controller/ProductController.php',
    'App\Controller\UserController'      => __DIR__ . '/../app/Controller/UserController.php',
    'App\Controller\CategoryController'  => __DIR__ . '/../app/Controller/CategoryController.php',
    'App\Controller\BaseController'      => __DIR__ . '/../app/Controller/BaseController.php',
    'App\Controller\CityController'      => __DIR__ . '/../app/Controller/CityController.php',

    // Interfaces
    'App\Controller\ControllerInterface' => __DIR__ . '/../app/Controller/ControllerInterface.php',
    'App\Repository\RepositoryInterface' => __DIR__ . '/../app/Repository/RepositoryInterface.php',

    // Repositories
    'App\Repository\MongoDB'             => __DIR__ . '/../app/Repository/MongoDB.php',

    // Services
    'App\Service\DatabaseService'        => __DIR__ . '/../app/Service/DatabaseService.php',
];

spl_autoload_register(
    function ($name) use (&$autoloadClassmap) {
        if (!empty($autoloadClassmap[$name])) {
            require_once($autoloadClassmap[$name]);
        }
    }
);
