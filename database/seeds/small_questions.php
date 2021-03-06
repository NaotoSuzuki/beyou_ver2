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
            ['genre_value'=>'beverb','option_num'=>'1','big_question_id'=>'1','question_num'=>'1','question'=>'私は鳥です。(bird a I am)','answer'=>'I am a bird.',],
            ['genre_value'=>'beverb','option_num'=>'1','big_question_id'=>'1','question_num'=>'2','question'=>'あなたは先生ではありません。 (teacher not are you a)','answer'=>'You are not a teacher.',],
            ['genre_value'=>'beverb','option_num'=>'1','big_question_id'=>'2','question_num'=>'1','question'=>'私は人間ですか？（human）','answer'=>'Am I a human?',],
            ['genre_value'=>'beverb','option_num'=>'1','big_question_id'=>'2','question_num'=>'2','question'=>'これはキリンですか？(giraffe)','answer'=>'Is this a giraffe?',],
            ['genre_value'=>'beverb','option_num'=>'1','big_question_id'=>'2','question_num'=>'3','question'=>'これらはバナナです。(these)','answer'=>'These are bananas.',],
            ['genre_value'=>'beverb','option_num'=>'1','big_question_id'=>'2','question_num'=>'4','question'=>'あれらは財布ではありません。（wallets）','answer'=>'Those are no wallets.',],
            ['genre_value'=>'beverb','option_num'=>'1','big_question_id'=>'3','question_num'=>'1','question'=>'私は日本人です。','answer'=>'I am Japanese.',],
            ['genre_value'=>'beverb','option_num'=>'1','big_question_id'=>'3','question_num'=>'2','question'=>'これは本です。','answer'=>'This is a book.',],
            ['genre_value'=>'beverb','option_num'=>'1','big_question_id'=>'3','question_num'=>'3','question'=>'あなたは学生ですか？','answer'=>'Are you a student?',],
            ['genre_value'=>'verb','option_num'=>'1','big_question_id'=>'1','question_num'=>'1','question'=>'私は毎日泳ぎます(swim I every day)','answer'=>'I swim every day.',],
            ['genre_value'=>'verb','option_num'=>'1','big_question_id'=>'1','question_num'=>'2','question'=>'私はテレビを見ます（watch I Tv）','answer'=>'I watch Tv.',],
            ['genre_value'=>'verb','option_num'=>'1','big_question_id'=>'1','question_num'=>'3','question'=>'私はギターを弾きます(play the I guitar)','answer'=>'I play the guitar.',],
            ['genre_value'=>'verb','option_num'=>'1','big_question_id'=>'2','question_num'=>'1','question'=>'私は本を買う（buy）','answer'=>'I buy books.',],
            ['genre_value'=>'verb','option_num'=>'1','big_question_id'=>'2','question_num'=>'2','question'=>'私はお金を持っている(money)','answer'=>'I have money.',],
            ['genre_value'=>'verb','option_num'=>'1','big_question_id'=>'2','question_num'=>'3','question'=>'私は毎朝踊る(every morning)','answer'=>'I dance every day.',],
            ['genre_value'=>'verb','option_num'=>'1','big_question_id'=>'3','question_num'=>'1','question'=>'私はレモンが好きだ','answer'=>'I like lemons',],
            ['genre_value'=>'verb','option_num'=>'1','big_question_id'=>'3','question_num'=>'2','question'=>'私は剣道をする','answer'=>'I do Kendo.',],
            ['genre_value'=>'verb','option_num'=>'1','big_question_id'=>'3','question_num'=>'3','question'=>'私は毎晩テレビを見る','answer'=>'I watch Tv every night.',],
            ['genre_value'=>'verb','option_num'=>'1','big_question_id'=>'3','question_num'=>'4','question'=>'私は毎日働く','answer'=>'I work every day.',],
            ['genre_value'=>'beverb_verb','option_num'=>'1','big_question_id'=>'1','question_num'=>'1','question'=>'あなたはダンスしますか？(dance do you ?)','answer'=>'Do you dance?',],
            ['genre_value'=>'beverb_verb','option_num'=>'1','big_question_id'=>'1','question_num'=>'2','question'=>'あなたはどうかしてるんですか？（are crazy you）','answer'=>'Are you crazy?',],
            ['genre_value'=>'beverb_verb','option_num'=>'1','big_question_id'=>'1','question_num'=>'3','question'=>'私は先生ではありません。（am I a not teacher）','answer'=>'I am not a teacher.',],
            ['genre_value'=>'beverb_verb','option_num'=>'1','big_question_id'=>'1','question_num'=>'4','question'=>'あなたは泳がない（do you not swim）','answer'=>'You do not swim.',],
            ['genre_value'=>'beverb_verb','option_num'=>'1','big_question_id'=>'2','question_num'=>'1','question'=>'あなたは医者ですか？（doctor）','answer'=>'Are you a doctor?',],
            ['genre_value'=>'beverb_verb','option_num'=>'1','big_question_id'=>'2','question_num'=>'2','question'=>'私は賢くありません（smart）','answer'=>' I am not smart.',],
            ['genre_value'=>'beverb_verb','option_num'=>'1','big_question_id'=>'2','question_num'=>'3','question'=>'あなたはバカではありません(stupid)','answer'=>'You are not stupid.',],
            ['genre_value'=>'beverb_verb','option_num'=>'1','big_question_id'=>'2','question_num'=>'4','question'=>'あなたは話しません（speak）','answer'=>'I am not stupid.',],
            ['genre_value'=>'beverb_verb','option_num'=>'1','big_question_id'=>'3','question_num'=>'1','question'=>'私は運転しません','answer'=>'I don’t drive.',],
            ['genre_value'=>'beverb_verb','option_num'=>'1','big_question_id'=>'3','question_num'=>'2','question'=>'あなたは歌いますか？','answer'=>'Do you sing?',],
            ['genre_value'=>'beverb_verb','option_num'=>'1','big_question_id'=>'3','question_num'=>'3','question'=>'私は飲まない。','answer'=>'I don’t drink.',],
            ['genre_value'=>'thirdperson','option_num'=>'1','big_question_id'=>'1','question_num'=>'1','question'=>'彼はよく食べる。（eats he well）','answer'=>'He eats well.',],
            ['genre_value'=>'thirdperson','option_num'=>'1','big_question_id'=>'1','question_num'=>'2','question'=>'この猫は上手に飛ぶ。cat flies this well)','answer'=>'This cat flies well.',],
            ['genre_value'=>'thirdperson','option_num'=>'1','big_question_id'=>'1','question_num'=>'3','question'=>'彼女は毎日働く。（works every day she）','answer'=>'She works every day.',],
            ['genre_value'=>'thirdperson','option_num'=>'1','big_question_id'=>'2','question_num'=>'1','question'=>'僕の父親が遊ぶ。（play）','answer'=>'My father plays.',],
            ['genre_value'=>'thirdperson','option_num'=>'1','big_question_id'=>'2','question_num'=>'2','question'=>'あのロボットは寝る。(sleep)','answer'=>'That robot sleeps.',],
            ['genre_value'=>'thirdperson','option_num'=>'1','big_question_id'=>'2','question_num'=>'3','question'=>'私の姉は掃除する。（clean）','answer'=>'My sister cleans.',],
            ['genre_value'=>'thirdperson','option_num'=>'1','big_question_id'=>'3','question_num'=>'1','question'=>'このギターは話す。','answer'=>'This guitar speaks.',],
            ['genre_value'=>'thirdperson','option_num'=>'1','big_question_id'=>'3','question_num'=>'2','question'=>'僕の犬は車を運転する。','answer'=>'My dog drives cars.',],
            ['genre_value'=>'thirdperson','option_num'=>'1','big_question_id'=>'3','question_num'=>'3','question'=>'僕の姉は上手に踊る。','answer'=>'My sister dances well.',],
            ['genre_value'=>'can','option_num'=>'1','big_question_id'=>'1','question_num'=>'1','question'=>'このステーキ食べていい？(I eat stake can this)','answer'=>'Can I eat this steak?',],
            ['genre_value'=>'can','option_num'=>'1','big_question_id'=>'1','question_num'=>'2','question'=>'走れるかい？(you run can)','answer'=>'Can you run?',],
            ['genre_value'=>'can','option_num'=>'1','big_question_id'=>'1','question_num'=>'3','question'=>'ボリューム下げてくれない？(down volume can the turn you)','answer'=>'Can you turn down the volume?',],
            ['genre_value'=>'can','option_num'=>'1','big_question_id'=>'2','question_num'=>'1','question'=>'これ食べていい？(this)','answer'=>'Can I eat this?',],
            ['genre_value'=>'can','option_num'=>'1','big_question_id'=>'2','question_num'=>'2','question'=>'あれらの犬は泳げますか?(those)','answer'=>'Can those dogs swim?',],
            ['genre_value'=>'can','option_num'=>'1','big_question_id'=>'2','question_num'=>'3','question'=>'彼は逃げられない。（escape)','answer'=>'He can’t escape.',],
            ['genre_value'=>'can','option_num'=>'1','big_question_id'=>'3','question_num'=>'1','question'=>'僕は歌えない。','answer'=>'I can’t sing.',],
            ['genre_value'=>'can','option_num'=>'1','big_question_id'=>'3','question_num'=>'2','question'=>'あの鳥は歌える。','answer'=>'That bird can sing.',],
            ['genre_value'=>'can','option_num'=>'1','big_question_id'=>'3','question_num'=>'3','question'=>'彼女は日本語を話せない。','answer'=>'She can’t speak Japanese.',],
            ['genre_value'=>'can','option_num'=>'1','big_question_id'=>'3','question_num'=>'4','question'=>'この本読んでいい？','answer'=>'Can I read this book？',],
            ['genre_value'=>'presentgoing','option_num'=>'1','big_question_id'=>'1','question_num'=>'1','question'=>'いま晩ご飯を食べてるところだよ。（now eating dinner am I ）','answer'=>'I am eating dinner now.',],
            ['genre_value'=>'presentgoing','option_num'=>'1','big_question_id'=>'1','question_num'=>'2','question'=>'彼は宿題をしている。(is homework doing he)','answer'=>'He is doing homework.',],
            ['genre_value'=>'presentgoing','option_num'=>'1','big_question_id'=>'1','question_num'=>'3','question'=>'彼女泳いでる？(she swimming is)','answer'=>'Is she swimming?',],
            ['genre_value'=>'presentgoing','option_num'=>'1','big_question_id'=>'2','question_num'=>'1','question'=>'何しているの？(what)','answer'=>'What are you doing?',],
            ['genre_value'=>'presentgoing','option_num'=>'1','big_question_id'=>'2','question_num'=>'2','question'=>'彼らは本を読んでるよ。（books）','answer'=>'They are reading books.',],
            ['genre_value'=>'presentgoing','option_num'=>'1','big_question_id'=>'2','question_num'=>'3','question'=>'この猫は死にかけている。（dying）','answer'=>'This cat is dying.',],
            ['genre_value'=>'presentgoing','option_num'=>'1','big_question_id'=>'3','question_num'=>'1','question'=>'君のお父さんは料理を作ってるよ。','answer'=>'Your father is cooking foods.',],
            ['genre_value'=>'presentgoing','option_num'=>'1','big_question_id'=>'3','question_num'=>'2','question'=>'彼女らは喋ってる。','answer'=>'They are speaking.',],
            ['genre_value'=>'presentgoing','option_num'=>'1','big_question_id'=>'3','question_num'=>'3','question'=>'彼らは眠ってる。','answer'=>'They are sleeping.',],
            ['genre_value'=>'presentgoing','option_num'=>'1','big_question_id'=>'3','question_num'=>'4','question'=>'(君は)踊ってる？','answer'=>'Are you dancing?',],
        ]);


    }
}
