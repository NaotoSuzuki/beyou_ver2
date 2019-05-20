<?php
namespace App\Http\Components;

use DB;

class HistDetail{

    public function histDetail($user_id, $created, $genre_value){

        $hist_indicate_datas = DB::table('user_answers')
        ->orderBy('big_question_id','asc') 
        ->orderBy('question_num','asc')
        ->join('small_questions', function ($join) {
            $join->on('user_answers.genre_value','=','small_questions.genre_value');
            $join->on('user_answers.big_question_id','=','small_questions.big_question_id');
            $join->on('user_answers.question_num','=','small_questions.question_num');
            // ->orOn だと、
        })
        ->join('big_questions','user_answers.big_question_id','=','big_questions.id')
        ->where([
            ['user_answers.user_id','=', $user_id],
            ['user_answers.created' ,'=' , $created],
            ['user_answers.genre_value' ,'=', $genre_value],
            ['small_questions.genre_value' ,'=', $genre_value]
        ])
        ->select(
                'user_answers.genre_value', 
                'user_answers.big_question_id', 
                'user_answers.question_num', 
                'user_answers.user_answer', 
                'user_answers.result', 
                'user_answers.created', 
                'small_questions.question',
                'small_questions.answer', 
                'big_questions.big_question'
        )
        ->get();

            

            foreach ($hist_indicate_datas as $hist_indicate_data) {
                $big_que=$hist_indicate_data->big_question_id;
                $big_q=$hist_indicate_data->big_question;
                $small_q = $hist_indicate_data->question;
                $small_a=$hist_indicate_data->answer;
                $user_a=$hist_indicate_data->user_answer;
                $user_r=$hist_indicate_data->result;
                $questions1[$big_que]=["big_question"=>$big_q];
                $questions2[$big_que][]=$small_q;
                $answers[$big_que][]=$small_a;
                $user_answers[$big_que][]=$user_a;
                $user_results[$big_que][]=$user_r;
            }
            for($i=1; $i<=3; $i++ ){
                $hist_indicates[$i]=$questions1[$i];
                $hist_indicates[$i]["questions"]=$questions2[$i];
                $hist_indicates[$i]["answers"]=$answers[$i];
                $hist_indicates[$i]["user_answers"]=$user_answers[$i];
                $hist_indicates[$i]["user_result"]=$user_results[$i];
            }
            return $hist_indicates;
    }
}