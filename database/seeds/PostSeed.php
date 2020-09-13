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
                'userId' => rand(1,5),
                'type' => POST_TYPE_STATUS,
                'subjectId' => rand(1,6),
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => null,
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-20 12:42:22',
                'updated_at' => '2020-07-20 12:42:22'
            ],
            [
                'id' => 2,
                'userId' => rand(1,5),
                'type' => POST_TYPE_IMAGE,
                'subjectId' => rand(1,6),
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://i.pinimg.com/originals/93/c0/4c/93c04c7993df4e10cca4f39ec43e4014.png',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-19 12:42:22',
                'updated_at' => '2020-07-19 12:42:22'
            ],
            [
                'id' => 3,
                'userId' => rand(1,5),
                'type' => POST_TYPE_IMAGE,
                'subjectId' => rand(1,6),
                'caption' => "HS lớp 11 sẽ không phải học Pascal nữa, thay vào đó là C/HS lớp 11 sẽ không phải học Pascal nữa, thay vào đó là C/C++ hoặc Python 😀",
                'content' => "https://phunugioi.com/wp-content/uploads/2020/04/nhung-hinh-anh-dep-ve-que-huong-dat-nuoc-con-nguoi-viet-nam.jpg,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSQpNC_n8JafTzShD7yCEgYiEVbW8Xt8wwJaA&usqp=CAU",
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'id' => 4,
                'userId' => rand(1,5),
                'type' => POST_TYPE_IMAGE,
                'subjectId' => rand(1,6),
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://bizweb.dktcdn.net/100/109/172/files/du-lich-dien-bien.jpg?v=1562658570749,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRwpHRsD4U0g92yld5qxLoHMu1lI2J0FRrX6Q&usqp=CAU,https://phanthistudio.vn/admin/webroot/uploads/images/album_tuoi_tho/24.jpg',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'id' => 5,
                'userId' => rand(1,5),
                'type' => POST_TYPE_IMAGE,
                'subjectId' => rand(1,6),
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://benative.vn/wp-content/uploads/2019/11/bai-van-tieng-anh-ve-que-huong-1.jpg,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSEi9_hQW5Wzy-OWfHFHA8a5H1IyiAsJgyJ5w&usqp=CAU,https://songgiatri.com/wp-content/uploads/2019/07/Mui-vi-que-huong-1-960x570.jpg,https://dichungxe.net/wp-content/uploads/2019/05/bai-tho-que-huong.jpg',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'id' => 6,
                'userId' => rand(1,5),
                'type' => POST_TYPE_IMAGE,
                'subjectId' => rand(1,6),
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://benative.vn/wp-content/uploads/2019/11/bai-van-tieng-anh-ve-que-huong-1.jpg,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSEi9_hQW5Wzy-OWfHFHA8a5H1IyiAsJgyJ5w&usqp=CAU,https://songgiatri.com/wp-content/uploads/2019/07/Mui-vi-que-huong-1-960x570.jpg,https://dichungxe.net/wp-content/uploads/2019/05/bai-tho-que-huong.jpg,https://www.gocbao.com/wp-content/uploads/2020/02/tho-luc-bat-ve-tinh-yeu-que-huong-dat-nuoc7.jpg',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'id' => 7,
                'userId' => rand(1,5),
                'type' => POST_TYPE_IMAGE,
                'subjectId' => rand(1,6),
                'caption' => "tada ~~! vậy là hoàn thiện 1 pha easy game giao diện phần cho News Feed 😄 Cùng 1 buổi chiều thứ 7 đẹp trời để build xong cả backend nữa  🥳 Giao diện tích hợp tính năng load ưu việt, Đợi khi nào ghép xong API rồi record lại cho ae xem độ mượt heggg 😂",
                'content' => 'https://benative.vn/wp-content/uploads/2019/11/bai-van-tieng-anh-ve-que-huong-1.jpg,https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSEi9_hQW5Wzy-OWfHFHA8a5H1IyiAsJgyJ5w&usqp=CAU,https://songgiatri.com/wp-content/uploads/2019/07/Mui-vi-que-huong-1-960x570.jpg,https://dichungxe.net/wp-content/uploads/2019/05/bai-tho-que-huong.jpg,https://www.gocbao.com/wp-content/uploads/2020/02/tho-luc-bat-ve-tinh-yeu-que-huong-dat-nuoc7.jpg,https://images.baodantoc.vn/uploads/2020/Th%C3%A1ng%203/Ng%C3%A0y_25/A1111111.jpg',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
            [
                'id' => 8,
                'userId' => rand(1,5),
                'type' => POST_TYPE_VIDEO,
                'subjectId' => rand(1,6),
                'caption' => "Hello KMA-social, my name is Du. I'm verry happy for your app",
                'content' => 'https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/360/Big_Buck_Bunny_360_10s_1MB.mp4',
                'tag' => 'wellcome, hello, hi, startapp',
                'created_at' => '2020-07-18 12:42:22',
                'updated_at' => '2020-07-18 12:42:22'
            ],
        ];
        \App\Posts::insert($data);
    }
}
