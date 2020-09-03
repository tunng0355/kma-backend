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
                'userName' => 'nobita',
                'fullName' => 'Nobi nobita',
                'codeStudent' => 'AT140509',
                'birthday' => '1999-07-20 12:42:22',
            ],
            [
                'userId' => 2,
                'userName' => 'doremon',
                'fullName' => 'Doraemon Mew',
                'codeStudent' => 'AT140510',
                'birthday' => '1999-01-22 12:42:22',
            ],
            [
                'userId' => 2,
                'userName' => 'xuka_chan',
                'fullName' => 'Shizuka Chan',
                'codeStudent' => 'AT140511',
                'birthday' => '1999-05-12 12:42:22',
            ]
        ];
        \App\UserInfo::insert($data);
    }
}
