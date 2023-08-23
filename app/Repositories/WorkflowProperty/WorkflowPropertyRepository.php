<?php

namespace App\Repositories\WorkflowProperty;

use App\Models\Property;
use App\Repositories\Base\EloquentRepositoryContainer;

class WorkflowPropertyRepository extends EloquentRepositoryContainer implements WorkflowPropertyRepositoryInterface
{

    protected $model = Property::class;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): object
    {
        $model = new $this->model;
        return $this->extracted($data, $model);
    }

    /**
     * @param array $data
     * @param $model
     * @return object
     */
    public function update(array $data, $model): object
    {
        return $this->extracted($data, $model);
    }

    /**
     * @param array $data
     * @param $model
     * @return mixed
     */
    private function extracted(array $data, $model): mixed
    {
        $model->property_category_id = $data["property_category_id"];
        $model->property_id = $data["property_id"];
        $model->workflow_id = $data["workflow_id"];
        $model->signer_id = $data["signer_id"];
        $model->x = $data["x"];
        $model->y = $data["y"];
        $model->label = $data["label"];
        $model->status = self::$ACTIVE;
        $model->save();
        return $model;
    }
}
