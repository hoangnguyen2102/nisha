<?php

use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('schedules')->delete();
        
        \DB::table('schedules')->insert(array (
            0 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'admin_id' => 6,
                'contract_id' => 6,
                'note' => NULL,
                'start' => '2019-06-10 08:00:00',
                'end' => '2019-06-10 10:00:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-09 21:51:34',
                'updated_at' => '2019-06-09 21:51:34',
            ),
            1 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'admin_id' => 6,
                'contract_id' => 6,
                'note' => NULL,
                'start' => '2019-05-28 08:00:00',
                'end' => '2019-05-28 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-14 22:50:46',
                'updated_at' => '2019-06-14 22:50:46',
            ),
            2 => 
            array (
                'id' => 6,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-06-15 08:00:00',
                'end' => '2019-06-15 10:00:00',
                'user_confirm' => 1,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-15 21:46:16',
                'updated_at' => '2019-06-16 03:47:08',
            ),
            3 => 
            array (
                'id' => 9,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-06-22 08:00:00',
                'end' => '2019-06-22 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-15 22:02:18',
                'updated_at' => '2019-06-15 22:02:18',
            ),
            4 => 
            array (
                'id' => 11,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-06-24 08:00:00',
                'end' => '2019-06-24 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-15 22:02:32',
                'updated_at' => '2019-06-15 22:02:32',
            ),
            5 => 
            array (
                'id' => 12,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-06-25 08:00:00',
                'end' => '2019-06-25 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-15 22:02:49',
                'updated_at' => '2019-06-15 22:02:49',
            ),
            6 => 
            array (
                'id' => 13,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-06-26 08:00:00',
                'end' => '2019-06-26 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-15 22:02:56',
                'updated_at' => '2019-06-15 22:02:56',
            ),
            7 => 
            array (
                'id' => 14,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-06-27 08:00:00',
                'end' => '2019-06-27 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-15 22:03:02',
                'updated_at' => '2019-06-15 22:03:02',
            ),
            8 => 
            array (
                'id' => 15,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-06-28 08:00:00',
                'end' => '2019-06-28 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-15 22:03:15',
                'updated_at' => '2019-06-15 22:03:15',
            ),
            9 => 
            array (
                'id' => 16,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-06-29 08:00:00',
                'end' => '2019-06-29 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-15 22:03:22',
                'updated_at' => '2019-06-15 22:03:22',
            ),
            10 => 
            array (
                'id' => 17,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-06-30 08:00:00',
                'end' => '2019-06-30 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-15 22:03:29',
                'updated_at' => '2019-06-15 22:03:29',
            ),
            11 => 
            array (
                'id' => 18,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-07-01 08:00:00',
                'end' => '2019-07-01 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-15 22:03:36',
                'updated_at' => '2019-06-15 22:03:36',
            ),
            12 => 
            array (
                'id' => 19,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-07-02 08:00:00',
                'end' => '2019-07-02 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-15 22:03:59',
                'updated_at' => '2019-06-15 22:03:59',
            ),
            13 => 
            array (
                'id' => 20,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-07-03 08:00:00',
                'end' => '2019-07-03 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-15 22:04:13',
                'updated_at' => '2019-06-15 22:04:13',
            ),
            14 => 
            array (
                'id' => 22,
                'user_id' => 3,
                'admin_id' => 6,
                'contract_id' => 7,
                'note' => NULL,
                'start' => '2019-07-05 08:00:00',
                'end' => '2019-07-05 09:30:00',
                'user_confirm' => 0,
                'admin_confirm' => 0,
                'deleted' => 0,
                'created_at' => '2019-06-16 03:24:44',
                'updated_at' => '2019-06-16 03:24:44',
            ),
        ));
        
        
    }
}