<?php

use Illuminate\Database\Seeder;

class SubjectSeed extends Seeder
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
                'name' => 'Toán cao cấp A1',
                'tag' => 'tcca1',
            ],
            [
                'name' => 'Toán cao cấp A2',
                'tag' => 'tcca2',
            ],
            [
                'name' => 'Toán cao cấp A3',
                'tag' => 'tcca3',
            ],
            [
                'name' => 'Phát triển ứng dụng web',
                'tag' => 'ptudw',
            ],            [
                'name' => 'Kỹ thuật lập trình',
                'tag' => 'ktlt',
            ],            [
                'name' => 'Thực tập cơ sở chuyên ngành',
                'tag' => 'ttcscn',
            ],
        ];
        \App\Subject::insert($data);
    }

}
