<?php

use Illuminate\Database\Seeder;
use App\ModelHasRoles;

class ModelHasPermissionsTableSeeder extends Seeder {

    public function run() {
        ModelHasRoles::create([
            'role_id' => '1',
            'model_id' => '1',
            'model_type' => 'App\User',
        ]);
    }

}
