<?php

namespace App\Repositories\Property;


use App\Repositories\Base\RepositoryContainerInterface;

interface PropertyRepositoryInterface extends RepositoryContainerInterface
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

}
