<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(PermissionsTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(RoleHasPermissionsTableSeeder::class);
         $this->call(ModelHasPermissionsTableSeeder::class);
    }
}
