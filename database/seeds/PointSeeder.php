<?php

use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
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
                'userId' => 4,
                'total' => 1000,
            ],
        ];
        \App\Point::insert($data);
    }
}
