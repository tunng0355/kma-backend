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
                'userName' => 'nobita',
                'codeStudent' => 'AT140000',
                'password' => bcrypt('nobita'),
                'role'=> 'admin',
                'status' => 1,
                'created_at' => '2020-07-19 12:42:22'
            ],
            [
                'id' => 2,
                'email' => 'doremon@gmail.com',
                'userName' => 'doremon',
                'codeStudent' => 'AT140001',
                'password' => bcrypt('doremon'),
                'role'=> 'admin',
                'status' => 2,
                'created_at' => '2020-07-19 12:42:22'
            ],
            [
                'id' => 3,
                'email' => 'xuka@gmail.com',
                'userName' => 'xuka_chan',
                'codeStudent' => 'AT140002',
                'password' => bcrypt('xuka'),
                'role'=> 'admin',
                'status' => 3,
                'created_at' => '2020-07-19 12:42:22'
            ]
        ];
        \App\User::insert($data);
    }
}
