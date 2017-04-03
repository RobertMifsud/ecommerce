<?php
namespace App\Repository;

use App\Service\DatabaseService;

class MongoDB implements RepositoryInterface
{
    /**
     * @var \MongoDB\Driver\Manager
     */
    private $db;

    /**
     * @var string
     */
    private $collection;

    /**
     * MongoDB constructor.
     * @param string $collection
     */
    public function __construct(string $collection = "collection")
    {
        // create database service instance
        $databaseService = new DatabaseService();

        // create mongo manager instance
        $this->db = $databaseService->getDatabaseInstance();

        // set the collection
        $this->collection = $collection;
    }

    /**
     * @return string
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param string $collection
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param array $data
     * @return string
     */
    public function create(array $data = []): \MongoDB\InsertOneResult
    {
        return $this->db->{$this->collection}->insertOne($data);
    }

    /**
     * @param string|null $criteria
     * @param array|null $sort
     * @param array|null $fields
     * @param int $limit
     * @param int $page
     * @return string
     */
    public function get(
        array $criteria = null,
        array $sort = null,
        array $fields = [],
        int $limit = 0,
        int $page = 0
    ): array
    {
        // set criteria if none
        $criteria = $criteria ?: [];

        // set sort if none -1 Desc 1 Asc
        $sort = $sort ?: ["_id" => -1];

        // set records to skip
        $skip = $page >= 1 && $limit >= 1 ? $limit * ($page - 1) : 0;

        // set cursor
        $cursor = $this->db->{$this->collection}->find($criteria, ["projection" => $fields, "sort" => $sort]);

        // return records
        return iterator_to_array($cursor);
    }

    /**
     * @param array $data
     * @return string
     */
    public function update(array $criteria = [], array $data = []): \MongoDB\UpdateResult
    {
        return $this->db->{$this->collection}->updateOne($criteria, $data);
    }

    /**
     * @param array $criteria
     * @return mixed
     */
    public function aggregate(array $criteria = [])
    {
        return $this->db->{$this->collection}->aggregate($criteria);
    }

    /**
     * @param array $_id
     * @return string
     */
    public function delete(array $_id = []): string
    {
        if (!empty($_id)) {

        }
    }
}