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
            [
            'name' => 'Nguyễn Văn Tôn',
            'username' => 'nguyenvanton99', 
            'password' => bcrypt('12345678'), 
            'level' => 1,
            'remember_token' => Str::random(10),
            ]
        );

        User::firstOrCreate(
        ['id'=>2, 'email' => 'huong@gmail.com'],
        [
        'name' => 'Nguyễn Thị Hương', 
        'username' => 'huong89', 
        'password' => bcrypt('12345678'), 
        'level' => 2,
        'remember_token' => Str::random(10),
        ]);
        
        User::firstOrCreate(
        ['id'=>3, 'email' => 'quan@gmail.com'],
        [
        'name' => 'Nguyễn Văn Quân', 
        'username' => 'quan87', 
        'password' => bcrypt('12345678'), 
        'level' => 2,
        'remember_token' => Str::random(10),
        ]);
    }
}
