<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyCategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyCategory::create([
            'property_id' => 1,
            'flow' => "workflow",
            'country_code' => "jo",
            'status' => 1,
        ]);
        PropertyCategory::create([
            'property_id' => 2,
            'flow' => "workflow",
            'country_code' => "jo",
            'status' => 1,
        ]);
        PropertyCategory::create([
            'property_id' => 3,
            'flow' => "workflow",
            'country_code' => "jo",
            'status' => 1,
        ]);
        PropertyCategory::create([
            'property_id' => 4,
            'flow' => "workflow",
            'country_code' => "jo",
            'status' => 1,
        ]);
    }
}
