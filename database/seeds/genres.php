<?php

use Illuminate\Database\Seeder;

class genres extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genres')->insert([
            ['genre'=>'Be動詞','genre_value'=>'beverb',],
            ['genre'=>'一般動詞','genre_value'=>'verb',],
            ['genre'=>'3人称単数','genre_value'=>'thirdperson',],
            ['genre'=>'代名詞','genre_value'=>'pronoun',],
            ['genre'=>'助動詞Can','genre_value'=>'can',],
            ['genre'=>'現在進行形','genre_value'=>'presentgoing',],
            ['genre'=>'Be動詞と一般動詞の使い分け','genre_value'=>'beverb_verb',],
        ]); 

     
    }
}

