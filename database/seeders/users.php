<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'student1', 'password' => Hash::make('123456a@A'), 'full_name' => 'Do Manh Cuong', 'email' => 'student1@gmail.com', 'phone_number' => '012345678', 'isTeacher' => 0],
            ['username' => 'student2', 'password' => Hash::make('123456a@A'), 'full_name' => 'Nguyen Quoc Dat', 'email' => 'student2@gmail.com', 'phone_number' => '09784563212', 'isTeacher' => 0],
            ['username' => 'teacher1', 'password' => Hash::make('123456a@A'), 'full_name' => 'Do Manh Son', 'email' => 'teacher1@gmail.com', 'phone_number' => '0987654321', 'isTeacher' => 1],
            ['username' => 'teacher2', 'password' => Hash::make('123456a@A'), 'full_name' => 'Nguyen Thi Ai', 'email' => 'teacher2@gmail.com', 'phone_number' => '09988776655', 'isTeacher' => 1],
        ]);
    }
}
