<?php

use Illuminate\Database\Seeder;

class UserSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'email' => 'nobita@gmail.com',
                'password' => bcrypt('nobita'),
                'role'=> 'admin',
                'status' => 1,
                'created_at' => '2020-07-19 12:42:22'
            ],
            [
                'id' => 2,
                'email' => 'doremon@gmail.com',
                'password' => bcrypt('doremon'),
                'role'=> 'admin',
                'status' => 2,
                'created_at' => '2020-07-19 12:42:22'
            ],
            [
                'id' => 3,
                'email' => 'xuka@gmail.com',
                'password' => bcrypt('xuka'),
                'role'=> 'admin',
                'status' => 3,
                'created_at' => '2020-07-19 12:42:22'
            ]
        ];
        \App\User::insert($data);
    }
}
