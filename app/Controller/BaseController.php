<?php
namespace App\Controller;

use App\Repository\MongoDB;

use MongoDB\BSON\ObjectID;
use MongoDB\BSON\Regex;

class BaseController implements ControllerInterface
{
    /**
     * @var MongoDB
     */
    protected $repository;

    /**
     * BaseController constructor.
     * @param null $collection
     */
    public function __construct($collection = null)
    {
        $this->repository = new MongoDB($collection);
    }

    public function create()
    {
         return Exception("Not implemented");
    }

    /**
     * @param string|null $_id
     * @param string|null $keyword
     * @return string
     */
    public function read(string $_id = null, string $keyword = null)
    {
        $criteria = [];

        if (!empty($_id)) {
            $criteria["_id"] = new ObjectID($_id);
        }

        if (!empty($keyword)) {
            $regex = new Regex(".*{$keyword}.*", 'i');
            $criteria["name"] = $regex;
        }

        return json_encode($this->repository->get($criteria));
    }

    public function update()
    {
        return Exception("Not implemented");
    }

    public function delete()
    {
        return Exception("Not implemented");
    }
}