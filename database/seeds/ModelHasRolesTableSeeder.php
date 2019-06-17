<?php

use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('model_has_roles')->delete();
        
        \DB::table('model_has_roles')->insert(array (
            0 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\Models\\Admin\\Admin',
                'model_id' => 3,
            ),
            1 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\Models\\Admin\\Admin',
                'model_id' => 4,
            ),
            2 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\Models\\Admin\\Admin',
                'model_id' => 5,
            ),
            3 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\Models\\Admin\\Admin',
                'model_id' => 6,
            ),
            4 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\Models\\Admin\\Admin',
                'model_id' => 7,
            ),
            5 => 
            array (
                'role_id' => 7,
                'model_type' => 'App\\Models\\Admin\\Admin',
                'model_id' => 8,
            ),
            6 => 
            array (
                'role_id' => 8,
                'model_type' => 'App\\Models\\Admin\\Admin',
                'model_id' => 2,
            ),
        ));
        
        
    }
}