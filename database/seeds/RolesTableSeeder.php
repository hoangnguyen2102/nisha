<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 7,
                'name' => 'personal_trainer',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            1 => 
            array (
                'id' => 8,
                'name' => 'super-admin',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
        ));
        
        
    }
}