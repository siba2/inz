<?php

use Illuminate\Database\Seeder;
use App\RoleHasPermissions;

class RoleHasPermissionsTableSeeder extends Seeder {

    public function run() {
        RoleHasPermissions::create([
            'permission_id' => '1',
            'role_id' => '1',
        ]);

        RoleHasPermissions::create([
            'permission_id' => '2',
            'role_id' => '1',
        ]);

        RoleHasPermissions::create([
            'permission_id' => '3',
            'role_id' => '1',
        ]);

        RoleHasPermissions::create([
            'permission_id' => '4',
            'role_id' => '1',
        ]);

        RoleHasPermissions::create([
            'permission_id' => '5',
            'role_id' => '1',
        ]);

        RoleHasPermissions::create([
            'permission_id' => '6',
            'role_id' => '1',
        ]);

        RoleHasPermissions::create([
            'permission_id' => '7',
            'role_id' => '1',
        ]);
    }

}
