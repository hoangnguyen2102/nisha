<?php

use Illuminate\Database\Seeder;

class CurriculumsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('curriculums')->delete();
        
        \DB::table('curriculums')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image' => 'curriculums/curriculum_1.jpg',
                'title' => 'Gói tập tăng cơ - cơ bản',
                'slug' => 'goi-tap-tang-co-co-ban',
                'contents' => '<p>G&oacute;i tập gym 12 buổi:</p><p>G&oacute;i tập gym 12 buổi n&agrave;y sẽ gi&uacute;p cho c&aacute;c Gymer của ch&uacute;ng ta tập luyện to&agrave;n th&acirc;n từ đầu đến ch&acirc;n trong 6 ng&agrave;y 1 tuần. V&agrave; mọi người c&oacute; thể &aacute;p dụng n&oacute; tập luyện đến khi cơ thể đạt được như mong đợi của m&igrave;nh.&nbsp;</p><p>Lịch tập gym 6 buổi n&agrave;y bao gồm c&aacute;c buổi tập như sau.&nbsp;</p><p>Ng&agrave;y thứ 1: Tập c&aacute;c b&agrave;i cho cơ ngực.</p><p>Ng&agrave;y thứ 2: Tập c&aacute;c b&agrave;i ch&acirc;n</p><p>Ng&agrave;y thứ 3: Tập cho cơ vai</p><p>Ng&agrave;y thứ 4: Tập c&aacute;c b&agrave;i cơ x&ocirc; v&agrave; lưng</p><p>Ng&agrave;y thứ 5: Tập ch&acirc;n &ndash; vai &ndash; bụng</p><p>Ng&agrave;y thứ 6: Tập c&aacute;c b&agrave;i tập Tay</p><p>Ng&agrave;y thứ 7: Tập c&aacute;c b&agrave;i cho cơ ngực.</p><p>Ng&agrave;y thứ 8: Tập c&aacute;c b&agrave;i ch&acirc;n</p><p>Ng&agrave;y thứ 9: Tập cho cơ vai</p><p>Ng&agrave;y thứ 10: Tập c&aacute;c b&agrave;i cơ x&ocirc; v&agrave; lưng</p><p>Ng&agrave;y thứ 11: Tập ch&acirc;n &ndash; vai &ndash; bụng</p><p>Ng&agrave;y thứ 12: Tập c&aacute;c b&agrave;i tập Tay</p><p><br></p><p>Giữa mỗi một b&agrave;i tập trong lịch tập gym 12 buổi n&agrave;y, c&aacute;c bạn h&atilde;y d&agrave;nh ra khoảng 1 ph&uacute;t để nghỉ giữa c&aacute;c hiệp. V&agrave; 3-4 ph&uacute;t giữa c&aacute;c b&agrave;i nh&eacute;. Tr&aacute;nh tập li&ecirc;n tục khi chưa quen dễ dẫn tới kiệt sức v&agrave; gặp chấn thương khi tập luyện.&nbsp;</p><p><br></p>',
                'price' => 1200,
                'number' => 12,
                'deleted' => 1,
                'created_at' => NULL,
                'updated_at' => '2019-06-15 21:10:04',
            ),
            1 => 
            array (
                'id' => 2,
                'image' => 'curriculums/curriculum_2.jpg',
                'title' => 'Gói Yoga căn bản 16 buổi cho người mới',
                'slug' => 'goi-yoga-can-ban-16-buoi-cho-nguoi-moi',
            'contents' => '<p>Học Yoga được khuy&ecirc;n bởi c&aacute;c chuy&ecirc;n gia chăm s&oacute;c sức khỏe, kh&ocirc;ng chỉ v&igrave; những lợi &iacute;ch mang đến sưc khỏe l&acirc;u d&agrave;i, ổn định đường huyết, tim mạch, kiểm so&aacute;t tốt c&acirc;n nặng, m&agrave; c&ograve;n bởi những t&aacute;c động t&iacute;ch cực đến tinh thần người thực tập Yoga, mang đến cho bạn một đời sống nội t&acirc;m phong ph&uacute;, cảm gi&aacute;c sảng kho&aacute;i, y&ecirc;u đời. Điều đ&oacute; thật sự c&ograve;n hữu &iacute;ch v&agrave; &yacute; nghĩa hơn bất cứ liều thuốc an thần n&agrave;o, bạn cần khi muốn giải tỏa căng thẳng, &aacute;p lực. Cơ hội trải nghiệm Kh&oacute;a học Yoga 16 buổi (60 ph&uacute;t/ buổi)&nbsp;</p><p>Yoga l&agrave; b&agrave;i tập những động t&aacute;c chuyển động nhẹ nh&agrave;ng, gi&uacute;p cơ thể từ từ xoay chuyển, cho c&aacute;c khớp nơi, c&aacute;c cơ xương được k&eacute;o gi&atilde;n chậm r&atilde;i, m&aacute;u huyết điều h&ograve;a, to&agrave;n bộ cơ thể thả lỏng cho bạn một cảm gi&aacute;c thư th&aacute;i ho&agrave;n to&agrave;n. &nbsp;</p><p>Ở một kh&ocirc;ng gian y&ecirc;n tĩnh, Yoga sẽ gi&uacute;p bạn lắng nghe được những &acirc;m thanh từ chuyển động dẻo dai khi bạn luyện tập, cho th&aacute;y sự rắn rỏi v&agrave; một sức khỏe bền bỉ, l&acirc;u d&agrave;i. Người tập Yoga l&acirc;u d&agrave;i, với tinh th&agrave;n thiện ch&iacute; v&agrave; nụ cười b&igrave;nh thản, t&acirc;m hồn lu&ocirc;n cở mở, ch&iacute;nh l&agrave; liều thuốc gi&uacute;p trẻ h&oacute;a tinh thần, trẻ h&oacute;a l&agrave;n da, mang đến sức sống kỳ diệu &nbsp;v&ocirc; c&ugrave;ng. &nbsp;</p><p>Trải nghiệm kh&oacute;a học Yoga sẽ l&agrave; cơ hội tuyệt vời cho bạn kh&aacute;m ph&aacute; một loại h&igrave;nh r&egrave;n luyện cơ thể, d&ugrave; chỉ bằng những động t&aacute;c ngồi thiền, giữ thăng bằng v.v... lại c&oacute; thể mang đến hiệu quả bất ngờ về ngo&agrave;i h&igrave;nh, cải thiện số đo ba v&ograve;ng, nếu bạn chăm chỉ luyện tập kết hợp với một chế độ ăn ph&ugrave; hợp, tương ứng. &nbsp;</p>',
                'price' => 900000,
                'number' => 16,
                'deleted' => 0,
                'created_at' => '2019-06-15 21:15:04',
                'updated_at' => '2019-06-15 21:15:04',
            ),
        ));
        
        
    }
}