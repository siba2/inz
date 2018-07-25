<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder {

    public function run() {
        Permission::create([
            'name' => 'administrators',
            'guard_name' => 'web',
        ]);

        Permission::create([
            'name' => 'schedule',
            'guard_name' => 'web',
        ]);
        
        Permission::create([
            'name' => 'customers',
            'guard_name' => 'web',
        ]);
        
        Permission::create([
            'name' => 'tariffs',
            'guard_name' => 'web',
        ]);
        
        Permission::create([
            'name' => 'smsapi',
            'guard_name' => 'web',
        ]);
        
        Permission::create([
            'name' => 'serwersms',
            'guard_name' => 'web',
        ]);
        
        Permission::create([
            'name' => 'employees',
            'guard_name' => 'web',
        ]);     
       
        Permission::create([
            'name' => 'iptables',
            'guard_name' => 'web',
        ]);
        
        Permission::create([
            'name' => 'documents',
            'guard_name' => 'web',
        ]);
    }

}
