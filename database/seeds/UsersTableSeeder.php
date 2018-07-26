<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {

    public function run() {
        User::create([
            'id' => '1',
            'name' => 'Admin',
            'email' => 'admin@nowatel.com',
            'password' => bcrypt('admin'),
            'config_id' => 1,
        ]);
    }

}
