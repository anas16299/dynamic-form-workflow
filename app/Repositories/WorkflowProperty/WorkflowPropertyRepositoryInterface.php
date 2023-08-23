<?php

namespace App\Repositories\WorkflowProperty;


use App\Repositories\Base\RepositoryContainerInterface;

interface WorkflowPropertyRepositoryInterface extends RepositoryContainerInterface
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
