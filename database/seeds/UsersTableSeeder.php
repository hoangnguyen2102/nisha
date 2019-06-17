<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Nguyễn Minh Hoàng',
                'email' => 'hugo210218@gmail.com',
                'phone' => '0907426506',
                'contract_id' => 6,
                'request_id' => NULL,
                'status' => 1,
                'email_verified_at' => NULL,
                'password' => '$2y$10$wKf/20PFl5uz3FXp/9j5xO93XGKX7JQlcmReiftB0V2siG0lTdkK.',
                'remember_token' => NULL,
                'created_at' => '2019-06-08 21:43:41',
                'updated_at' => '2019-06-08 21:51:00',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Nguyễn Minh Hoàng',
                'email' => 'hugo2102@gmail.com',
                'phone' => '0907426506',
                'contract_id' => 7,
                'request_id' => 2,
                'status' => 2,
                'email_verified_at' => NULL,
                'password' => '$2y$10$z5K4Bwm/klXJegcOJlIfUeHrSBGt8oQTSk3rBVPH9jJ8S5GmA7vxy',
                'remember_token' => NULL,
                'created_at' => '2019-06-15 21:15:34',
                'updated_at' => '2019-06-16 14:55:11',
            ),
        ));
        
        
    }
}