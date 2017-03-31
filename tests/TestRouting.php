<?php

use PHPUnit\Framework\TestCase;
use App\Router;

/**
 * @covers Routing
 */
final class RoutingTest extends TestCase
{
    public function testBaseRoutingSuccess()
    {
        $mock = $this->createMock(Router::class);

        $routing = [
            "test" => [
                "controller" => self::class,
                "action" => [
                    "GET" => "get",
                    "POST" => "create"
                ],
                "actions" => [
                    [
                        "type" => "object_id",
                        "action" => [
                            "GET" => "getRecommendedProducts"
                        ]
                    ]
                ]
            ]
        ];

        $mock->method('mapping')
            ->will($this->returnValueMap($routing));


        $this->assertEquals($routing, $mock::mapping);
    }
}