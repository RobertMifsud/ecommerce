<?php
namespace App\Controller;

use App\Repository\MongoDB;
use App\Controller\ProductController;
use MongoDB\BSON\ObjectID;

class CategoryController extends BaseController implements ControllerInterface
{
    public function __construct()
    {
        $this->repository = new MongoDB("categories");
    }

    public function getCategoryAndProducts($_id)
    {
        $category = $this->repository->get(["_id" => new ObjectID($_id)]);

        if (!empty($category)) {
            $productsController = new ProductController();

            $products = $productsController->repository->get(["category" => new ObjectID($_id)]);

            $category['products'] = $products;
        }

        return json_encode($category);
    }
}