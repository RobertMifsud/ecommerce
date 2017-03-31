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
    private $configPath = '../../config/database.php';

    /**
     * DatabaseService constructor.
     */
    public function __construct()
    {
        if (is_file($this->configPath)) {
            $this->config = require_once($this->configPath);
        } else {
            $this->config =[
                'database' => 'ecommerce',
                'uri'     => 'mongodb://0.0.0.0:27017/ecommerce',
                'options' => [
                ]
            ];
        }
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