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
            ['genre_value'=>'beverb','big_question_id'=>'1','question_num'=>'1','question'=>'私は鳥です。(bird a I am)','answer'=>'I am a bird.',],
            ['genre_value'=>'beverb','big_question_id'=>'1','question_num'=>'2','question'=>'あなたは先生ではありません。 (teacher not are you a)','answer'=>'You are not a teacher.',],
            ['genre_value'=>'beverb','big_question_id'=>'2','question_num'=>'1','question'=>'私は人間ですか？（human）','answer'=>'Am I a human?',],
            ['genre_value'=>'beverb','big_question_id'=>'2','question_num'=>'2','question'=>'これはキリンですか？(giraffe)','answer'=>'Is this a giraffe?',],
            ['genre_value'=>'beverb','big_question_id'=>'2','question_num'=>'3','question'=>'これらはバナナです。(these)','answer'=>'These are bananas.',],
            ['genre_value'=>'beverb','big_question_id'=>'2','question_num'=>'4','question'=>'あれらは財布ではありません。（wallets）','answer'=>'Those are no wallets.',],
            ['genre_value'=>'beverb','big_question_id'=>'3','question_num'=>'1','question'=>'私は日本人です。','answer'=>'I am Japanese.',],
            ['genre_value'=>'beverb','big_question_id'=>'3','question_num'=>'2','question'=>'これは本です。','answer'=>'This is a book.',],
            ['genre_value'=>'beverb','big_question_id'=>'3','question_num'=>'3','question'=>'あなたは学生ですか？','answer'=>'Are you a student?',],
            ['genre_value'=>'verb','big_question_id'=>'1','question_num'=>'1','question'=>'私は毎日泳ぎます(swim I every day)','answer'=>'I swim every day.',],
            ['genre_value'=>'verb','big_question_id'=>'1','question_num'=>'2','question'=>'私はテレビを見ます（watch I Tv）','answer'=>'I watch Tv.',],
            ['genre_value'=>'verb','big_question_id'=>'1','question_num'=>'3','question'=>'私はギターを弾きます(play the I guitar)','answer'=>'I play the guitar.',],
            ['genre_value'=>'verb','big_question_id'=>'2','question_num'=>'1','question'=>'私は本を買う（buy）','answer'=>'I buy books.',],
            ['genre_value'=>'verb','big_question_id'=>'2','question_num'=>'2','question'=>'私はお金を持っている(money)','answer'=>'I have money.',],
            ['genre_value'=>'verb','big_question_id'=>'2','question_num'=>'3','question'=>'私は毎朝踊る(every morning)','answer'=>'I dance every day.',],
            ['genre_value'=>'verb','big_question_id'=>'3','question_num'=>'1','question'=>'私はレモンが好きだ','answer'=>'I like lemons',],
            ['genre_value'=>'verb','big_question_id'=>'3','question_num'=>'2','question'=>'私は剣道をする','answer'=>'I do Kendo.',],
            ['genre_value'=>'verb','big_question_id'=>'3','question_num'=>'3','question'=>'私は毎晩テレビを見る','answer'=>'I watch Tv every night.',],
            ['genre_value'=>'verb','big_question_id'=>'3','question_num'=>'4','question'=>'私は毎日働く','answer'=>'I work every day.',],
            ['genre_value'=>'beverb_verb','big_question_id'=>'1','question_num'=>'1','question'=>'あなたはダンスしますか？(dance do you ?)','answer'=>'Do you dance?',],
            ['genre_value'=>'beverb_verb','big_question_id'=>'1','question_num'=>'2','question'=>'あなたはどうかしてるんですか？（are crazy you）','answer'=>'Are you crazy?',],
            ['genre_value'=>'beverb_verb','big_question_id'=>'1','question_num'=>'3','question'=>'私は先生ではありません。（am I a not teacher）','answer'=>'I am not a teacher.',],
            ['genre_value'=>'beverb_verb','big_question_id'=>'1','question_num'=>'4','question'=>'あなたは泳がない（do you not swim）','answer'=>'You do not swim.',],
            ['genre_value'=>'beverb_verb','big_question_id'=>'2','question_num'=>'1','question'=>'あなたは医者ですか？（doctor）','answer'=>'Are you a doctor?',],
            ['genre_value'=>'beverb_verb','big_question_id'=>'2','question_num'=>'2','question'=>'私は賢くありません（smart）','answer'=>' I am not smart.',],
            ['genre_value'=>'beverb_verb','big_question_id'=>'2','question_num'=>'3','question'=>'あなたはバカではありません(stupid)','answer'=>'You are not stupid.',],
            ['genre_value'=>'beverb_verb','big_question_id'=>'2','question_num'=>'4','question'=>'あなたは話しません（speak）','answer'=>'I am not stupid.',],
            ['genre_value'=>'beverb_verb','big_question_id'=>'3','question_num'=>'1','question'=>'私は運転しません','answer'=>'I do not drive.',],
            ['genre_value'=>'beverb_verb','big_question_id'=>'3','question_num'=>'2','question'=>'あなたは歌いますか？','answer'=>'Do you sing?',],
            ['genre_value'=>'beverb_verb','big_question_id'=>'3','question_num'=>'3','question'=>'私は飲まない。','answer'=>'I do not drink.',],
        ]);    

     
    }
}

