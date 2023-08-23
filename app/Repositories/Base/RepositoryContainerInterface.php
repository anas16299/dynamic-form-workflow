<?php

namespace App\Repositories\Base;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface RepositoryContainerInterface
{

    /**
     * @param int $id
     * @param string[] $columns
     * @return object
     */
    public function findById(int $id, array $columns = []): object;

    /**
     * @param array $ids
     * @param array $columns
     * @return mixed
     */
    public function getByIds(array $ids, array $columns = []);

    /**
     * @param array $columns
     * @return Collection
     */
    public function getAll(array $columns = []): Collection;

    /**
     * @return mixed
     */
    public function getAllQuery();

    /**
     * @param $query
     * @param $perPage
     * @param $columns
     * @param $pageName
     * @return LengthAwarePaginator
     */
    public function paginateQuery($query, $perPage = 10, $columns = ["*"], $pageName = "page"): LengthAwarePaginator;


    /**
     * @param array $data
     * @param $model
     * @return object
     */
    public function update(array $data, $model): object;

    /**
     * @param $query
     * @param $data
     * @return mixed
     */
    public function updateByQuery($query, $data);
    /**
     * @param array $data
     * @return object
     */
    public function create(array $data): object;

    /**
     * @param $model
     * @return mixed
     */
    public function delete($model);

        /**
     * @param array $data
     */
    public function save(array $data);

    /**
     * @param $query
     * @param $values
     * @return int|bool
     */
    public function updateStatement($query, $values): int|bool;

    /**
     * @param string|array $name
     * @param $model
     * @return mixed
     */
    public function loadRelation(string|array $name, &$model);

    /**
     * @param string|array $name
     * @param $query
     * @return void
     */
    public function withRelations(string|array $name, &$query): void;


    /**
     * @param $query
     * @return mixed
     */
    public function deleteByQuery($query);
}
