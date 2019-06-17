<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'SuperAdmin',
                'email' => 'hugo210295@gmail.com',
                'description' => NULL,
                'password' => '$2y$10$o.t5nEvlYQH3BNS5K0lnceBAQfJ8aOWLR9.cKe01qqSX8jdNe3N9G',
                'api_token' => 'VpYoNlwB6Gl0EZ3sj76ah8YhHUuarqiaya8nGErKciohFvnvGIAnFe2UxxBv',
                'phone' => '0907426506',
                'address' => '',
                'avatar' => '',
                'job' => NULL,
                'slug' => 'superadmin',
                'email_verified_at' => '2019-06-07 02:45:31',
                'deleted' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-15 02:44:19',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Đỗ Tuấn Vũ',
                'email' => 'dotuanvu@gmail.com',
            'description' => 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ
Hơn 10 năm kinh nghiệm thay đổi thể hình, từng trực tiếp huấn luyện cho nhiều ngôi sao
Gặt hái nhiều thành tích về Marathon: hoàn thành đường chạy 42km trong 5 tiếng tại giải giải Danang International Marathon 2015, 42km địa hình trong 10 tiếng giải Vietnam Mountain Marathon 2015 diễn ra ở Sapa (Lào Cai), chặng 42km trong 6 tiếng tại giải Lăng Cô Marathon.',
                'password' => '$2y$10$8b6pniIVJJFO1tfiT5qv/Oietp/7hMHUgA7E5nLHXq07/aarWIcDa',
                'api_token' => NULL,
                'phone' => '0907426501',
                'address' => '123 Huỳnh Thúc Kháng, Quận 1, TPHCM',
                'avatar' => 'avatars/avatar_3.jpg',
                'job' => 'Huấn luyện viên thể hình',
                'slug' => 'do-tuan-vu',
                'email_verified_at' => '2019-06-08 15:07:05',
                'deleted' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-06-07 13:13:24',
                'updated_at' => '2019-06-08 15:07:05',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Lê Ngọc Phong',
                'email' => 'lengocphong@gmail.com',
            'description' => 'Chứng nhận từ Học Viện Y Học Thể Thao Quốc Gia (NASM) Hoa Kỳ
Chứng nhận chuyên viên huấn luyện và dinh dưỡng.
Hạng 3 cuộc thi Musclecontest Vietnam 2018 Hạng 8 Men Physique Musclecontest Philippines.',
                'password' => '$2y$10$ihoEbR0lT0d4oAWwlFKHh.eNvA9cYDChgmS6Mj1Hdcav.X2yO5lJu',
                'api_token' => NULL,
                'phone' => '0907426502',
                'address' => '984 Cách Mạng Tháng 8 Quận 3 TPHCM',
                'avatar' => 'avatars/avatar_4.jpg',
                'job' => 'Huấn luyện viên thể hình',
                'slug' => 'le-ngoc-phong',
                'email_verified_at' => '2019-06-08 15:09:19',
                'deleted' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-06-07 13:14:28',
                'updated_at' => '2019-06-08 15:09:19',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Nguyễn Phú Cường',
                'email' => 'nguyenphucuong@gmail.com',
                'description' => 'Chứng nhận HLV từ tập đoàn thể hình danh tiếng thế giới Les Mills
Chứng nhận chuyên viên dinh dưỡng từ tập đoàn Les Mills
Giảng viên đầy nhiệt thành & được yêu thích của các lớp GroupX hơn 7 năm qua tại nhiều phòng tập lớn',
                'password' => '$2y$10$2PnioAoqG9EOU3mkxHmfhOfyIZqPeLRiEvPr2H4o3tRv91ytI4KNi',
                'api_token' => NULL,
                'phone' => '0907426503',
                'address' => '446 Nam Kỳ Khởi Nghĩa Quận 1 TPHCM',
                'avatar' => 'avatars/avatar_5.jpg',
                'job' => 'Chuyên viên thể hình & dinh dưỡng',
                'slug' => 'nguyen-phu-cuong',
                'email_verified_at' => '2019-06-08 15:17:59',
                'deleted' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-06-07 13:14:59',
                'updated_at' => '2019-06-08 15:17:59',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Ngô Kim Phụng',
                'email' => 'ngokimphung@gmail.com',
                'description' => 'Chứng chỉ Yoga của viện Morarji Déai National Institute New Delhi.
09 năm giảng dạy Yoga tại Việt Nam.',
                'password' => '$2y$10$/.NcE6Fjq2Xphp6WM.qhce1BHW.pcoQgpp.bWfd6FdFe8jVjyRdkm',
                'api_token' => NULL,
                'phone' => '0907426504',
                'address' => '345 Quang Trung, Gò Vấp, TPHCM',
                'avatar' => 'avatars/avatar_6.jpg',
                'job' => 'Huấn luyện viên yoga',
                'slug' => 'ngo-kim-phung',
                'email_verified_at' => '2019-06-08 16:26:00',
                'deleted' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-06-07 13:15:21',
                'updated_at' => '2019-06-08 16:26:00',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Lê Thị Thúy Anh',
                'email' => 'lethithuyanh@gmail.com',
                'description' => NULL,
                'password' => '$2y$10$zJlcdj3xhkJbowmCxpSeJu3sGaqs5ahj2Puueshe6fwTNqOtWj0du',
                'api_token' => NULL,
                'phone' => '0907426507',
                'address' => NULL,
                'avatar' => NULL,
                'job' => NULL,
                'slug' => 'le-thi-thuy-anh',
                'email_verified_at' => NULL,
                'deleted' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-06-07 13:15:57',
                'updated_at' => '2019-06-15 20:53:28',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Trần Anh Khang',
                'email' => 'trananhkhang@gmail.com',
                'description' => NULL,
                'password' => '$2y$10$BTDoL0hpewjNwtGu2MAalextUsOLdjT5VtpyA1wsaYbpAOYSGMN4y',
                'api_token' => NULL,
                'phone' => '0907426505',
                'address' => NULL,
                'avatar' => NULL,
                'job' => NULL,
                'slug' => 'tran-anh-khang',
                'email_verified_at' => NULL,
                'deleted' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-06-07 13:16:32',
                'updated_at' => '2019-06-07 13:16:32',
            ),
        ));
        
        
    }
}