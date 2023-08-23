<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Property;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::create([
            'type' => 'TextField',
            'status' => 1,
        ]);
        Property::create([
            'type' => 'radio',
            'status' => 1,
        ]);
        Property::create([
            'type' => 'stamp',
            'status' => 1,
        ]);
        Property::create([
            'type' => 'signature',
            'status' => 1,
        ]);
    }
}
