<?php

use Illuminate\Database\Seeder;
use App\User;
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
                'name' => 'Nobita',
                'email' => 'nobita@gmail.com',
                'password' => bcrypt('nobita'),
                'role'=> 'admin',
                'avatar' => 'https://vignette.wikia.nocookie.net/p__/images/2/2c/Nobita.png/revision/latest/top-crop/width/220/height/220?cb=20180215021337&path-prefix=protagonist',
                'created_at' => '2020-07-19 12:42:22'
            ],
            [
                'id' => 2,
                'name' => 'Doremon',
                'email' => 'doremon@gmail.com',
                'password' => bcrypt('doremon'),
                'role'=> 'admin',
                'avatar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRs3J68r6INkFTT2NDo8Qthxk5frY_Y6E78bg&usqp=CAU',
                'created_at' => '2020-07-19 12:42:22'
            ],
            [
                'id' => 3,
                'name' => 'Xuka',
                'email' => 'xuka@gmail.com',
                'password' => bcrypt('xuka'),
                'avatar' => 'https://i.pinimg.com/originals/01/46/24/0146246323b97ceb635aef2c0e01eb72.jpg',
                'role'=> 'admin',
                'created_at' => '2020-07-19 12:42:22'
            ]
        ];
        \App\User::insert($data);
    }
}
