<?php

use Illuminate\Database\Seeder;

class TagArticleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tag_article')->delete();
        
        \DB::table('tag_article')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tag_id' => 1,
                'article_id' => 1,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'tag_id' => 2,
                'article_id' => 1,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'tag_id' => 3,
                'article_id' => 1,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'tag_id' => 4,
                'article_id' => 2,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'tag_id' => 5,
                'article_id' => 2,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'tag_id' => 6,
                'article_id' => 2,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'tag_id' => 7,
                'article_id' => 2,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'tag_id' => 8,
                'article_id' => 3,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'tag_id' => 2,
                'article_id' => 3,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'tag_id' => 2,
                'article_id' => 4,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'tag_id' => 1,
                'article_id' => 4,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'tag_id' => 9,
                'article_id' => 5,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'tag_id' => 10,
                'article_id' => 5,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'tag_id' => 4,
                'article_id' => 5,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'tag_id' => 2,
                'article_id' => 5,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'tag_id' => 8,
                'article_id' => 6,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'tag_id' => 2,
                'article_id' => 6,
                'deleted' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}