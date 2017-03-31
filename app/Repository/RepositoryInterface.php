<?php
namespace App\Repository;


interface RepositoryInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function create(array $data = []): \MongoDB\InsertOneResult;

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
        array $fields = null,
        int $limit = 0,
        int $page = 0
    ): array;

    /**
     * @param array $data
     * @return string
     */
    public function update(array $data = []): \MongoDB\UpdateResult;

    /**
     * @param array $_id
     * @return string
     */
    public function delete(array $_id = []): string;
}