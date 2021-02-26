<?php
namespace App\Models\Components\Index;

use DB;


class ShowHists
{
  public function showHists($user_id)
  {
    $hist_arrays = DB::table('user_answers')
    ->orderBy('created_date','desc')
    ->join('genres','user_answers.genre_value','=','genres.genre_value')
    ->join('small_questions','user_answers.genre_value','=','small_questions.genre_value')
    ->join('big_questions','user_answers.big_question_id','=','big_questions.id')
    ->where('user_answers.user_id','=', $user_id)
    ->select(
            'user_answers.genre_value',
            'user_answers.big_question_id',
            'user_answers.question_num',
            'user_answers.user_answer',
            'user_answers.result',
            'user_answers.created_date',
            'genres.genre',
            'small_questions.answer',
            'big_questions.big_question'
    )
    ->get();
    
    return $hist_arrays;

  }

}
