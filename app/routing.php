<?php
namespace App;

use App\Controller\ProductController;
use App\Controller\CategoryController;
use App\Controller\UserController;
use App\Controller\CityController;
use App\Controller\ShippingMethodController;

class Router {
    private static $mapping = [
        "shipping-methods" => [
           "controller" => ShippingMethodController::class,
           "action" => [
               "GET" => "read"
           ]
        ],
        "recommended" => [
          "controller" => UserController::class,
          "actions" => [
              [
                  "type" => "object_id",
                  "action" => [
                      "GET" => "getRecommendedProducts"
                  ]
              ]
          ]
        ],
        "tracking" => [
            "controller" => UserController::class,
            "action" => [
                "POST" => "logUserView"
            ]
        ],
        "cities" => [
            "controller" => CityController::class,
            "action" => [
                "GET" => "read",
                "POST" => "create"
            ]
        ],
        "users" => [
            "controller" => UserController::class,
            "actions" => [
                [
                    "type" => "object_id",
                    "action" => [
                        "GET" => "read",
                        "DELETE" => "delete"
                    ]
                ]
            ]
        ],
        "orders" => [
            "controller" => UserController::class,
            "action" => [
                "POST" => "createUserOrder",
            ],
            "actions" => [
                [
                    "type" => "object_id",
                    "action" => [
                        "GET" => "getOrder",
                    ]
                ]
            ]
        ],
        "auth" => [
            "controller" => UserController::class,
            "actions" => [
                [
                    "type" => "string",
                    "value" => "sign-up",
                    "action" => [
                        "POST" => "register"
                    ]
                ],
                [
                    "type" => "string",
                    "value" => "sign-in",
                    "action" => [
                        "POST" => "login"
                    ]
                ]
            ]
        ],
        "categories" => [
            "controller" => CategoryController::class,
            "action" => [
                "GET" => "read",
                "POST" => "create"
            ],
            "actions" => [
                [
                    "type" => "object_id",
                    "action" => [
                        "GET" => "read",
                        "DELETE" => "delete"
                    ]
                ]
            ]
        ],
        "products" => [
            "controller" => ProductController::class,
            "action" => [
                "GET" => "read",
                "POST" => "create"
            ],
            "actions" => [
                [
                    "type" => "object_id",
                    "action" => [
                        "GET" => "read",
                        "DELETE" => "delete",
                    ]
                ],
                [
                    "type" => "string",
                    "value" => "latest",
                    "action" => [
                        "GET" => "getLatestProducts"
                    ]
                ],
                [
                    "type" => "string",
                    "value" => "featured",
                    "action" => [
                        "GET" => "getFeaturedProducts"
                    ]
                ],
            ]
        ],
        "search" => [
            "controller" => ProductController::class,
            "actions" => [
                [
                    "type" => "string",
                    "search" => true,
                    "action" => [
                        "GET" => "read"
                    ]
                ]
            ]
        ]
    ];

    public static function handlePath($path, $method) {
        $pathFragments = explode("/", $path);

        if (count($pathFragments) >= 1) {
            foreach (Router::$mapping as $key => $value) {
                if ($key === $pathFragments[0] && !empty($value['controller'])) {
                    $controller = new $value['controller']();
                    if (count($pathFragments) == 1 &&
                        !empty($value['action']) &&
                        in_array($method, array_keys($value['action']))) {

                        echo $controller->{$value['action'][$method]}();

                        return;
                    } elseif (count($pathFragments) >= 2 && !empty($value['actions'])) {
                        foreach ($value['actions'] as $mapping) {
                            if (!empty($mapping['type'])) {
                                if ($mapping['type'] === "object_id" &&
                                    $pathFragments[1] instanceof \MongoDB\BSON\ObjectID
                                    || preg_match('/^[a-f\d]{24}$/i', $pathFragments[1])) {
                                    echo $controller->{$mapping['action'][$method]}($pathFragments[1]);

                                    return;
                                } elseif ($mapping['type'] === "string") {
                                    if (!empty($mapping['search']) && $mapping['search']) {
                                        $controller->{$mapping['action'][$method]}(null, $pathFragments[1]);
                                    } elseif ($pathFragments[1] === $mapping['value']) {
                                        echo $controller->{$mapping['action'][$method]}();

                                        return;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            die("Well, well, what are you doing here Sir?");
        }
    }
}