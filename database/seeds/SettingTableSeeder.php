<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('setting')->delete();
        
        \DB::table('setting')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => NULL,
                'logo' => 'setting/logo.png',
                'email' => 'hugo210295@gmail.com',
                'phone' => '090 742 6506',
                'address' => '222 A , đường Hậu GIang, P5, Q6, TPHCM',
                'facebook' => 'https://www.facebook.com/',
                'youtube' => 'https://www.youtube.com/',
                'twitter' => 'https://www.twitter.com/',
                'services' => '{"one":{"path_image":"setting\\/service_one.jpeg","title":"Kickboxing"},"two":{"path_image":"setting\\/service_two.jpg","title":"Dance"},"three":{"path_image":"setting\\/service_three.PNG","title":"Yoga"},"four":{"path_image":"setting\\/service_four.jpg","title":"Gi\\u1ea3m c\\u00e2n"},"five":{"path_image":"setting\\/service_five.jpg","title":"T\\u0103ng c\\u00e2n"},"six":{"path_image":"setting\\/service_six.jpg","title":"T\\u0103ng c\\u01a1"}}',
                'created_at' => '2019-06-07 13:08:05',
                'updated_at' => '2019-06-07 13:11:01',
            ),
        ));
        
        
    }
}