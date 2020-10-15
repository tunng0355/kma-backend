<?php

use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
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
                'userId' => 4,
                'userIdRate' => 1,
                'rateCount' => 1.5,
                'rateContent' => 'Rất tốt'
            ],
            [
                'id' => 2,
                'userId' => 4,
                'userIdRate' => 2,
                'rateCount' => 2,
                'rateContent' => 'Rất tuyệt'
            ],
            [
                'id' => 3,
                'userId' => 4,
                'userIdRate' => 3,
                'rateCount' => 1,
                'rateContent' => 'Tuyệt'
            ],
            [
                'id' => 4,
                'userId' => 4,
                'userIdRate' => 5,
                'rateCount' => 1.5,
                'rateContent' => 'Rất tốt'
            ]
        ];
        \App\Rate::insert($data);
    }
}
