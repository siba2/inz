<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    
    public function run()
    {
       Role::create([
            'id' => '1',
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);
    }
}
