<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'coder',
            'email' => 'coder@mail.com',
            'phone' => '09990990990',
            'password' => bcrypt("P@ssw0rd")
        ]);
    }
}
