<?php
namespace App\Service;

use MongoDB\Client;

class DatabaseService
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var string
     */
    private $configPath = __DIR__ . '/../../config/database.php';

    /**
     * DatabaseService constructor.
     */
    public function __construct()
    {
            $this->config =[
                'database' => 'ecommerce',
                'uri'     => 'mongodb://localhost:27017/ecommerce',
                'options' => [
                ]
            ];

    }

    /**
     * @return Manager
     */
    public function getDatabaseInstance()
    {
        $client = new Client($this->config['uri']);
        return $client->selectDatabase($this->config['database']);
    }
}