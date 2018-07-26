<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder {

    public function run() {

        Permission::create([
            'id' => '1',
            'name' => 'schedule',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'id' => '2',
            'name' => 'customers',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'id' => '3',
            'name' => 'iptables',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'id' => '4',
            'name' => 'documents',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'id' => '5',
            'name' => 'sms',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'id' => '6',
            'name' => 'employees',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'id' => '7',
            'name' => 'administrators',
            'guard_name' => 'web',
        ]);
    }

}
