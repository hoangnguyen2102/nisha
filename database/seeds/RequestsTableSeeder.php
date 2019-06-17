<?php

use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('requests')->delete();
        
        \DB::table('requests')->insert(array (
            0 => 
            array (
                'id' => 2,
                'user_id' => 3,
                'phone' => '0907426506',
                'email' => 'hugo2102@gmail.com',
                'voucher' => '[]',
                'start' => '2019-06-16 00:00:00',
                'end' => '2019-07-16 00:00:00',
                'cycle' => 1,
                'confirm' => 1,
                'deleted' => 0,
                'created_at' => '2019-06-16 14:52:31',
                'updated_at' => '2019-06-16 14:55:11',
            ),
        ));
        
        
    }
}