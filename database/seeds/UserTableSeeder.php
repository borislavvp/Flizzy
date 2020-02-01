<?php

use Illuminate\Database\Seeder;

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
            'name' => Str::random(10),
            'role_id' => Integer::random(3),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),

        ]);
    }
}
