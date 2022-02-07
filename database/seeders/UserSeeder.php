<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alireza Bazargani',
            'email' => 'arbazargani1998@gmail.com',
            'rule' => 'admin',
            'password' => Hash::make('adminstrator09308990856')
        ]);
    }
}
