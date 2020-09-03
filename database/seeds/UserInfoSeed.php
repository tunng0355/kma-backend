<?php

use Illuminate\Database\Seeder;

class UserInfoSeed extends Seeder
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
                'user_id' => 1,
                'user_name' => 'nobita',
                'name' => 'Nobi nobita',
                'code_std' => 'AT140509',
                'birthday' => '1999-07-20 12:42:22',
            ],
            [
                'user_id' => 2,
                'user_name' => 'doremon',
                'name' => 'Doraemon Mew',
                'code_std' => 'AT140510',
                'birthday' => '1999-01-22 12:42:22',
            ],
            [
                'user_id' => 2,
                'user_name' => 'xuka_chan',
                'name' => 'Shizuka Chan',
                'code_std' => 'AT140511',
                'birthday' => '1999-05-12 12:42:22',
            ]
        ];
        \App\UserInfo::insert($data);
    }
}
