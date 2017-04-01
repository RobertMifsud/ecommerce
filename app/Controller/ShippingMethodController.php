<?php
namespace App\Controller;

use App\Repository\MongoDB;

class ShippingMethodController extends BaseController implements ControllerInterface
{
    /**
     * ShippingMethodController constructor.
     */
    public function __construct()
    {
        $this->repository = new MongoDB("shipping_methods");
    }
}