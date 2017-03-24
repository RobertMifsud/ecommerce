<?php
namespace App\Controller;

use App\Repository\MongoDB;

class ProductController extends BaseController implements ControllerInterface
{
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->repository = new MongoDB("products");
    }

    /**
     * @return string
     */
    public function getFeaturedProducts()
    {
        return json_encode($this->repository->get(["featured" => true]));
    }

    /**
     * @return string
     */
    public function getLatestProducts()
    {
        return json_encode($this->repository->get());
    }

}