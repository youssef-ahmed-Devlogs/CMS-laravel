<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email', 'yossef96.ahmad@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Youssef',
                'email' => 'yossef96.ahmad@gmail.com',
                'password' => Hash::make('123123'),
                'role' => 'admin'
            ]);
        }
    }
}
