<?php

namespace App\Repositories\PropertyCategory;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Base\EloquentRepositoryContainer;

class PropertyCategoryRepository extends EloquentRepositoryContainer implements PropertyCategoryRepositoryInterface
{

    protected $model = Property::class;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): object
    {
        $model = new $this->model;
        $model->property_id = $data["property_id"];
        $model->flow = $data["flow"];
        $model->country_code = $data["country_code"];
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
        $model->property_id = $data["property_id"];
        $model->flow = $data["flow"];
        $model->country_code = $data["country_code"];
        $model->status = $data['status'];
        $model->save();
        return $model;
    }

    /**
     * @param $flow
     * @return Builder
     */
    public function getQueryByFlow($flow): Builder
    {
        return $this->model::query()->where("flow", $flow);
    }


}
