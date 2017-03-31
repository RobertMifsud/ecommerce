<?php
namespace App\Controller;

use App\Repository\MongoDB;

class CategoryController extends BaseController implements ControllerInterface
{
    public function __construct()
    {
        $this->repository = new MongoDB("categories");
    }
}