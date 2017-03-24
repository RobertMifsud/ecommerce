<?php
namespace App\Controller;

use App\Repository\MongoDB;

class CityController extends BaseController implements ControllerInterface
{
    public function __construct()
    {
        $this->repository = new MongoDB("cities");
    }
}