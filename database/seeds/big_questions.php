<?php

use Illuminate\Database\Seeder;

class big_questions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      DB::table('big_questions')->insert([
            ['big_question'=>'カッコ内の単語を並び替え、日本語を英訳してください',],
            ['big_question'=>'カッコ内の単語を適切な形で使い、日本語を英訳してください',],
            ['big_question'=>'日本語を英訳してください',],
        ]); 

     
    }
}

