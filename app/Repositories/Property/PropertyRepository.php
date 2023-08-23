<?php

namespace App\Repositories\Property;

use App\Models\Property;
use App\Repositories\Base\EloquentRepositoryContainer;

class PropertyRepository extends EloquentRepositoryContainer implements PropertyRepositoryInterface
{

    protected $model = Property::class;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): object
    {
        $model = new $this->model;
        $model->type = $data["type"];
        $model->status = self::$ACTIVE;
        $model->save();
        return $model;
    }

    /**
     * @param array $data
     * @param $model
     * @return object
     */
    public function update(array $data, $model): object
    {
        $model->type = $data["type"];
        $model->status =$data['status']??$model->status;
        $model->save();
        return $model;
    }

}
