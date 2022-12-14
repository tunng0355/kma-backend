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
                'avatar'=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS4P1wXmQrrkSiJVXy3WjfOtuJDT5r4DVWwXA&usqp=CAU',
                'email' => 'nobita@gmail.com',
                'userName' => 'nobita',
                'codeStudent' => 'AT140000',
                'password' => bcrypt('nobita'),
                'role'=> 'admin',
                'status' => USER_ACTIVE,
                'created_at' => '2020-07-19 12:42:22'
            ],
            [
                'id' => 2,
                'avatar' => null,
                'email' => 'doremon@gmail.com',
                'userName' => 'doremon',
                'codeStudent' => 'AT140001',
                'password' => bcrypt('doremon'),
                'role'=> 'admin',
                'status' => USER_ACTIVE,
                'created_at' => '2020-07-19 12:42:22'
            ],
            [
                'id' => 3,
                'avatar' => null,
                'email' => 'xuka@gmail.com',
                'userName' => 'xuka_chan',
                'codeStudent' => 'AT140002',
                'password' => bcrypt('xuka'),
                'role'=> 'admin',
                'status' => USER_ACTIVE,
                'created_at' => '2020-07-19 12:42:22'
            ],
            [
                'id' => 4,
                'avatar' => 'https://i.pinimg.com/736x/3b/74/bc/3b74bca401101300aba962b2d867a209.jpg',
                'email' => 'dulh181199@gmail.com',
                'userName' => 'dusainbolt',
                'codeStudent' => 'AT140509',
                'password' => bcrypt('anhdu999'),
                'role'=> 'user',
                'status' => USER_ACTIVE,
                'created_at' => '2020-07-19 12:42:22'
            ],
            [
                'id' => 5,
                'avatar' => null,
                'email' => 'ply56787@gmail.com',
                'userName' => 'phamlymiu',
                'codeStudent' => 'AT140222',
                'password' => bcrypt('at140222'),
                'role'=> 'user',
                'status' => USER_ACTIVE,
                'created_at' => '2020-09-13 12:42:22'
            ],
            [
                'id' => 6,
                'avatar' => null,
                'email' => 'nguyenlong30111999@gmail.com',
                'userName' => 'thanhlong',
                'codeStudent' => 'AT140725',
                'password' => bcrypt('at140725'),
                'role'=> 'user',
                'status' => USER_ACTIVE,
                'created_at' => '2020-09-13 12:42:22'
            ],
        ];
        for ($i = 7; $i < 16; $i++){
            $data[] = [
                'id' => $i,
                'avatar' => null,
                'email' => 'seed'.$i.'@gmail.com',
                'userName' => 'seed'.$i,
                'codeStudent' => 'AT0000'.getValueOnZero($i),
                'password' => bcrypt('admin123'),
                'role'=> 'user',
                'status' => USER_ACTIVE,
                'created_at' => '2020-09-13 12:42:'.getValueOnZero($i),
            ];
        };
        \App\User::insert($data);
    }
}
