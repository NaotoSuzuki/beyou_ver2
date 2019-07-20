<?php

use Illuminate\Database\Seeder;

class small_questions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('small_questions')->insert([
            ['genre_value'=>'beverb','big_question_id'=>'1','question_num'=>'1',
            'question'=>'私は鳥です。(bird a I am)','answer'=>'I am a bird.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'beverb','big_question_id'=>'1','question_num'=>'2',
            'question'=>'あなたは先生ではありません。 (teacher not are you a)','answer'=>'You are not a teacher.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'beverb','big_question_id'=>'2','question_num'=>'1',
            'question'=>'私は人間ですか？（human）','answer'=>'Am I a human?','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'beverb','big_question_id'=>'2','question_num'=>'2',
            'question'=>'これはキリンですか？(giraffe)','answer'=>'Is this a giraffe?','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'beverb','big_question_id'=>'2','question_num'=>'3',
            'question'=>'これらはバナナです。(these)','answer'=>'These are bananas.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'beverb','big_question_id'=>'2','question_num'=>'4',
            'question'=>'あれらは財布ではありません。（wallets）','answer'=>'Those are no wallets.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'beverb','big_question_id'=>'3','question_num'=>'1',
            'question'=>'私は日本人です。','answer'=>'I am Japanese.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'beverb','big_question_id'=>'3','question_num'=>'2',
            'question'=>'これは本です。','answer'=>'This is a book.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'beverb','big_question_id'=>'3','question_num'=>'3',
            'question'=>'あなたは学生ですか？','answer'=>'Are you a student?','created_at'=>'','updated_at'=>'',],
         
            ['genre_value'=>'verb','big_question_id'=>'1','question_num'=>'1',
            'question'=>'私は毎日泳ぎます(swim I every day)','answer'=>'I swim every day.','created_at'=>'','updated_at'=>'',],
                
            ['genre_value'=>'verb','big_question_id'=>'1','question_num'=>'2',
            'question'=>'私はテレビを見ます（watch I Tv）','answer'=>'I watch Tv.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'verb','big_question_id'=>'1','question_num'=>'3',
            'question'=>'私はギターを弾きます(play the I guitar)','answer'=>'I play the guitar.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'verb','big_question_id'=>'2', 'question_num'=>'1',
            'question'=>'私は本を買う（buy）','answer'=>'I buy books.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'verb','big_question_id'=>'2', 'question_num'=>'2',
            'question'=>'私はお金を持っている(money)','answer'=>'I have money.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'verb','big_question_id'=>'2', 'question_num'=>'3',
            'question'=>'私は毎朝踊る(every morning)','answer'=>'I dance every day.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'verb','big_question_id'=>'3','question_num'=>'1',
            'question'=>'私はレモンが好きだ','answer'=>'I like lemons','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'verb','big_question_id'=>'3', 'question_num'=>'2',
            'question'=>'私は剣道をする','answer'=>'I do Kendo.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'verb','big_question_id'=>'3', 'question_num'=>'3',
            'question'=>'私は毎晩テレビを見る','answer'=>'I watch Tv every night.','created_at'=>'','updated_at'=>'',],

            ['genre_value'=>'verb','big_question_id'=>'3','question_num'=>'4',
            'question'=>'私は毎日働く','answer'=>'I work every day.','created_at'=>'','updated_at'=>'',],

            ]);
    }
}

