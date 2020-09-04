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
                'userId' => 1,
                'fullName' => 'Nobi nobita',
                'birthday' => 1599204711,
                'created_at' => '2020-09-05 00:24:21',
                'updated_at' => '2020-09-05 00:24:21',
            ],
            [
                'userId' => 2,
                'fullName' => 'Doraemon Mew',
                'birthday' => 1599204711,
                'created_at' => '2020-09-05 00:24:21',
                'updated_at' => '2020-09-05 00:24:21',
            ],
            [
                'userId' => 2,
                'fullName' => 'Shizuka Chan',
                'birthday' => 1599204711,
                'created_at' => '2020-09-05 00:24:21',
                'updated_at' => '2020-09-05 00:24:21',
            ]
        ];
        \App\UserInfo::insert($data);
    }
}
