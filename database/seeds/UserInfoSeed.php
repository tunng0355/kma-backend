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
                'userId' => 3,
                'fullName' => 'Shizuka Chan',
                'birthday' => 1599204711,
                'created_at' => '2020-09-05 00:24:21',
                'updated_at' => '2020-09-05 00:24:21',
            ],
            [
                'userId' => 4,
                'fullName' => 'Du sainbolt',
                'birthday' => 1599204711,
                'created_at' => '2020-09-05 00:24:21',
                'updated_at' => '2020-09-05 00:24:21',
            ],
            [
                'userId' => 5,
                'fullName' => 'Phạm Lưu Ly',
                'birthday' => 1599304711,
                'created_at' => '2020-09-13 00:24:21',
                'updated_at' => '2020-09-13 00:24:21',
            ],
            [
                'userId' => 6,
                'fullName' => 'Nguyễn Thành Long',
                'birthday' => 1596304711,
                'created_at' => '2020-09-14 00:24:21',
                'updated_at' => '2020-09-14 00:24:21',
            ]
        ];

        for ($i = 6; $i < 15; $i++){
            $data[] = [
                'userId' => $i,
                'fullName' => 'Seed name'.$i,
                'birthday' => 1599304700 + $i,
                'created_at' => '2020-09-13 00:24:'.getValueOnZero($i),
                'updated_at' => '2020-09-13 00:24:'.getValueOnZero($i),
            ];
        };

        \App\UserInfo::insert($data);
    }
}
