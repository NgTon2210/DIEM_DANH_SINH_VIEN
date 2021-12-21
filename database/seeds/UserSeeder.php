<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        User::firstOrCreate(
        ['id'=>1, 'email' => 'ton@gmail.com'],
        ['username' => 'nguyenvanton99', 
        'password' => bcrypt('12345678'), 
        'remember_token' => Str::random(10),
        ]
    );
    }
}
