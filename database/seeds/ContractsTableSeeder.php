<?php

use Illuminate\Database\Seeder;

class ContractsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contracts')->delete();
        
        \DB::table('contracts')->insert(array (
            0 => 
            array (
                'id' => 7,
                'user_id' => 3,
                'admin_id' => 6,
                'phone' => '0907426506',
                'email' => 'hugo2102@gmail.com',
                'voucher' => NULL,
                'start' => '2019-06-15 00:00:00',
                'end' => '2019-10-05 00:00:00',
                'curriculum_id' => 2,
                'confirm' => 1,
                'process' => 1,
                'deleted' => 0,
                'created_at' => '2019-06-15 21:27:24',
                'updated_at' => '2019-06-16 03:47:08',
            ),
        ));
        
        
    }
}