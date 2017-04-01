<?php
namespace App\Controller;

use App\Repository\MongoDB;

class CityController extends BaseController implements ControllerInterface
{
    /**
     * CityController constructor.
     */
    public function __construct()
    {
        $this->repository = new MongoDB("cities");
    }
}