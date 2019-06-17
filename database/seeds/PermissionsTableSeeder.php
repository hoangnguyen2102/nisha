<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 148,
                'name' => 'dashboard',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            1 => 
            array (
                'id' => 149,
                'name' => 'edit employee',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            2 => 
            array (
                'id' => 150,
                'name' => 'delete employee',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            3 => 
            array (
                'id' => 151,
                'name' => 'create employee',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            4 => 
            array (
                'id' => 152,
                'name' => 'list employee',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            5 => 
            array (
                'id' => 153,
                'name' => 'edit tag',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            6 => 
            array (
                'id' => 154,
                'name' => 'delete tag',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            7 => 
            array (
                'id' => 155,
                'name' => 'create tag',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            8 => 
            array (
                'id' => 156,
                'name' => 'list tag',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            9 => 
            array (
                'id' => 157,
                'name' => 'edit article',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            10 => 
            array (
                'id' => 158,
                'name' => 'delete article',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            11 => 
            array (
                'id' => 159,
                'name' => 'create article',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            12 => 
            array (
                'id' => 160,
                'name' => 'list article',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:30',
                'updated_at' => '2019-06-07 02:45:30',
            ),
            13 => 
            array (
                'id' => 161,
                'name' => 'edit customer',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            14 => 
            array (
                'id' => 162,
                'name' => 'delete customer',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            15 => 
            array (
                'id' => 163,
                'name' => 'create customer',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            16 => 
            array (
                'id' => 164,
                'name' => 'list customer',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            17 => 
            array (
                'id' => 165,
                'name' => 'show customer',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            18 => 
            array (
                'id' => 166,
                'name' => 'edit slider',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            19 => 
            array (
                'id' => 167,
                'name' => 'delete slider',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            20 => 
            array (
                'id' => 168,
                'name' => 'create slider',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            21 => 
            array (
                'id' => 169,
                'name' => 'list slider',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            22 => 
            array (
                'id' => 170,
                'name' => 'edit feedback',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            23 => 
            array (
                'id' => 171,
                'name' => 'delete feedback',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            24 => 
            array (
                'id' => 172,
                'name' => 'create feedback',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            25 => 
            array (
                'id' => 173,
                'name' => 'list feedback',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            26 => 
            array (
                'id' => 174,
                'name' => 'show feedback',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            27 => 
            array (
                'id' => 175,
                'name' => 'edit voucher',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            28 => 
            array (
                'id' => 176,
                'name' => 'delete voucher',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            29 => 
            array (
                'id' => 177,
                'name' => 'create voucher',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            30 => 
            array (
                'id' => 178,
                'name' => 'list voucher',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            31 => 
            array (
                'id' => 179,
                'name' => 'edit curriculum',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            32 => 
            array (
                'id' => 180,
                'name' => 'delete curriculum',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            33 => 
            array (
                'id' => 181,
                'name' => 'create curriculum',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            34 => 
            array (
                'id' => 182,
                'name' => 'list curriculum',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            35 => 
            array (
                'id' => 183,
                'name' => 'list request',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            36 => 
            array (
                'id' => 184,
                'name' => 'confirm request',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            37 => 
            array (
                'id' => 185,
                'name' => 'show request',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            38 => 
            array (
                'id' => 186,
                'name' => 'delete request',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            39 => 
            array (
                'id' => 187,
                'name' => 'list contract',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            40 => 
            array (
                'id' => 188,
                'name' => 'confirm contract',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            41 => 
            array (
                'id' => 189,
                'name' => 'show contract',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            42 => 
            array (
                'id' => 190,
                'name' => 'delete contract',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            43 => 
            array (
                'id' => 191,
                'name' => 'change password',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            44 => 
            array (
                'id' => 192,
                'name' => 'change profile',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            45 => 
            array (
                'id' => 193,
                'name' => 'schedule all',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            46 => 
            array (
                'id' => 194,
                'name' => 'view schedule',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            47 => 
            array (
                'id' => 195,
                'name' => 'confirm schedule admin',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            48 => 
            array (
                'id' => 196,
                'name' => 'setting',
                'guard_name' => 'admin',
                'created_at' => '2019-06-07 02:45:31',
                'updated_at' => '2019-06-07 02:45:31',
            ),
            49 => 
            array (
                'id' => 197,
                'name' => 'view user',
                'guard_name' => 'admin',
                'created_at' => '2019-06-16 05:02:28',
                'updated_at' => '2019-06-16 05:02:28',
            ),
        ));
        
        
    }
}