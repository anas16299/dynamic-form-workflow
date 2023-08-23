<?php

namespace App\Repositories\Base;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Traits\StatusConstantTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class EloquentRepositoryContainer implements RepositoryContainerInterface
{
    use StatusConstantTrait;

    /**
     * @var string[]
     */
    protected array $columns = ["*"];

    /**
     * @var Model
     */
    protected $model = Model::class;

    /**
     * @return Builder
     */
    final public function popularQuery(): Builder
    {
        return $this->model::query();
    }

    /**
     * @param array $columns
     * @return array
     */
    final protected function getColumns(array $columns): array
    {
        return empty($columns) ? $this->columns : $columns;
    }


    /**
     * @param $id
     * @param string[] $columns
     * @return Model
     */
    final public function findById($id, array $columns = []): Model
    {
        return $this->popularQuery()->findOrFail($id, $this->getColumns($columns));
    }

    /**
     * @param array $ids
     * @param array $columns
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    final public function getByIds(array $ids, array $columns = [])
    {
        return $this->popularQuery()->whereIn("id", $ids)->get($this->getColumns($columns));
    }

    /**
     * @param $id
     * @param string[] $columns
     * @return Model
     */
    final public function findByIdWithoutFail($id, array $columns = []): Model
    {
        return $this->popularQuery()->find($id, $this->getColumns($columns));
    }


    /**
     * @param array $columns
     * @return Collection
     */
    final public function getAll(array $columns = []): Collection
    {
        return $this->popularQuery()->get($this->getColumns($columns));
    }

    /**
     * @return Builder
     */
    final public function getAllQuery()
    {
        return $this->popularQuery();
    }

    /**
     * @param Builder $query
     * @return LengthAwarePaginator
     */
    final public function paginateQuery($query, $perPage = 10, $columns = ["*"], $pageName = "page"): LengthAwarePaginator
    {
        return $query->paginate($perPage, $columns, $pageName);
    }

    /**
     * @param $query
     * @return mixed
     */
    final public function deleteByQuery($query)
    {
        return $query->delete();
    }

    /**
     * @param $query
     * @param $data
     * @return mixed
     */
    final public function updateByQuery($query, $data)
    {
        return $query->update($data);
    }

    /**
     * @param array $data
     * @return object
     */
    final public function save(array $data): object
    {
        return isset($data["id"]) ? $this->update($data, $this->findById($data["id"]))
            : $this->create($data);
    }


    /**
     * @param $query
     * @param $values
     * @return int|bool
     */
    final public function updateStatement($query, $values): int|bool
    {
        return $query->update($values);
    }

    /**
     * @param string|array $name
     * @param $model
     * @return void
     */
    final public function loadRelation(string|array $name, &$model)
    {
        $model->load($name);
    }

    /**
     * @param string|array $name
     * @param $query
     * @return void
     */
    final   public function withRelations(string|array $name, &$query): void
    {
        $query->with($name);
    }

    /**
     * @param $model
     * @return void
     */
    public function delete($model)
    {
        $model->delete();
    }
}
