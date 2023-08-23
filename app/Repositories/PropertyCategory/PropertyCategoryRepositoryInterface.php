<?php

namespace App\Repositories\PropertyCategory;


use App\Repositories\Base\RepositoryContainerInterface;

interface PropertyCategoryRepositoryInterface extends RepositoryContainerInterface
{
    /**
     * @param array $data
     * @return object
     */
    public function create(array $data): object;

    /**
     * @param array $data
     * @param $model
     * @return object
     */
    public function update(array $data, $model): object;

    /**
     * @param $flow
     * @return mixed
     */
    public function getQueryByFlow($flow): mixed;

}
