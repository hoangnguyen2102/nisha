<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sliders')->delete();
        
        \DB::table('sliders')->insert(array (
            0 => 
            array (
                'id' => 14,
                'path_image' => 'sliders/slider_14.jpg',
                'description' => NULL,
                'link' => 'https://www.facebook.com/',
                'status' => 1,
                'created_at' => '2019-06-12 20:07:25',
                'updated_at' => '2019-06-12 20:07:25',
            ),
            1 => 
            array (
                'id' => 15,
                'path_image' => 'sliders/slider_15.jpg',
                'description' => NULL,
                'link' => 'http://youtube.com',
                'status' => 1,
                'created_at' => '2019-06-14 22:29:01',
                'updated_at' => '2019-06-14 22:29:01',
            ),
        ));
        
        
    }
}