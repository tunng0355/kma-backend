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
                'userId' => 1,
                'userIdRate' => 4,
                'rateCount' => 1.5,
                'rateContent' => 'Rất tốt'
            ],
            [
                'id' => 2,
                'userId' => 2,
                'userIdRate' => 4,
                'rateCount' => 2,
                'rateContent' => 'Rất tuyệt'
            ],
            [
                'id' => 3,
                'userId' => 3,
                'userIdRate' => 4,
                'rateCount' => 1,
                'rateContent' => 'Tuyệt'
            ],
            [
                'id' => 4,
                'userId' => 5,
                'userIdRate' => 4,
                'rateCount' => 1.5,
                'rateContent' => 'Rất tốt'
            ]
        ];
        \App\Rate::insert($data);
    }
}
