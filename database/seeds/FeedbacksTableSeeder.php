<?php

use Illuminate\Database\Seeder;

class FeedbacksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('feedbacks')->delete();
        
        \DB::table('feedbacks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Nguyễn Minh Hoàng',
                'email' => 'hugo210218@gmail.com',
                'message' => 'Góp ý số 01',
                'created_at' => '2019-06-15 01:58:03',
                'updated_at' => '2019-06-15 01:58:03',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Nguyễn Minh Hoàng',
                'email' => 'hugo210295@gmail.com',
                'message' => 'Góp ý số 2',
                'created_at' => '2019-06-15 14:37:07',
                'updated_at' => '2019-06-15 14:37:07',
            ),
        ));
        
        
    }
}