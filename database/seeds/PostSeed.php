<?php

use Illuminate\Database\Seeder;

class PostSeed extends Seeder
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
                'type' => POST_TYPE_STATUS,
                'subjectId' => 1,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => null,
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-20 12:42:22',
                'updated_at' => '2020-07-20 12:42:22'
            ],
            [
                'id' => 2,
                'userId' => 4,
                'type' => POST_TYPE_IMAGE,
                'subjectId' => 2,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://i.pinimg.com/originals/93/c0/4c/93c04c7993df4e10cca4f39ec43e4014.png',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-19 12:42:22',
                'updated_at' => '2020-07-19 12:42:22'
            ],
            [
                'id' => 3,
                'userId' => 1,
                'type' => POST_TYPE_IMAGE,
                'subjectId' => 2,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => "https://phunugioi.com/wp-content/uploads/2020/04/nhung-hinh-anh-dep-ve-que-huong-dat-nuoc-con-nguoi-viet-nam.jpg,https://lh3.googleusercontent.com/proxy/vS9Ob_wvfMG6jMX4wcIV-kD_won6OuRREzoGEAUOT1AFVXcvGTBkzHuwJChIBCrc7W8lAmUXRixzALN7-MXzNNNxMShL8kzn0lBIWVOyD3b1hCRKB6UYAfa5IRvdXOU",
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'id' => 4,
                'userId' => 1,
                'type' => POST_TYPE_IMAGE,
                'subjectId' => 2,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://bizweb.dktcdn.net/100/109/172/files/du-lich-dien-bien.jpg?v=1562658570749,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRwpHRsD4U0g92yld5qxLoHMu1lI2J0FRrX6Q&usqp=CAU,https://phanthistudio.vn/admin/webroot/uploads/images/album_tuoi_tho/24.jpg',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'id' => 5,
                'userId' => 1,
                'type' => POST_TYPE_IMAGE,
                'subjectId' => 2,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://benative.vn/wp-content/uploads/2019/11/bai-van-tieng-anh-ve-que-huong-1.jpg,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSEi9_hQW5Wzy-OWfHFHA8a5H1IyiAsJgyJ5w&usqp=CAU,https://songgiatri.com/wp-content/uploads/2019/07/Mui-vi-que-huong-1-960x570.jpg,https://dichungxe.net/wp-content/uploads/2019/05/bai-tho-que-huong.jpg',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'id' => 6,
                'userId' => 4,
                'type' => POST_TYPE_IMAGE,
                'subjectId' => 2,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://benative.vn/wp-content/uploads/2019/11/bai-van-tieng-anh-ve-que-huong-1.jpg,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSEi9_hQW5Wzy-OWfHFHA8a5H1IyiAsJgyJ5w&usqp=CAU,https://songgiatri.com/wp-content/uploads/2019/07/Mui-vi-que-huong-1-960x570.jpg,https://dichungxe.net/wp-content/uploads/2019/05/bai-tho-que-huong.jpg,https://www.gocbao.com/wp-content/uploads/2020/02/tho-luc-bat-ve-tinh-yeu-que-huong-dat-nuoc7.jpg',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'id' => 7,
                'userId' => 4,
                'type' => POST_TYPE_IMAGE,
                'subjectId' => 2,
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://benative.vn/wp-content/uploads/2019/11/bai-van-tieng-anh-ve-que-huong-1.jpg,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSEi9_hQW5Wzy-OWfHFHA8a5H1IyiAsJgyJ5w&usqp=CAU,https://songgiatri.com/wp-content/uploads/2019/07/Mui-vi-que-huong-1-960x570.jpg,https://dichungxe.net/wp-content/uploads/2019/05/bai-tho-que-huong.jpg,https://www.gocbao.com/wp-content/uploads/2020/02/tho-luc-bat-ve-tinh-yeu-que-huong-dat-nuoc7.jpg,https://images.baodantoc.vn/uploads/2020/Th%C3%A1ng%203/Ng%C3%A0y_25/A1111111.jpg',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
        ];
        \App\Posts::insert($data);
    }
}
