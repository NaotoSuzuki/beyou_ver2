<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Small_question;
use App\Models\Big_question;
use App\Models\User_answer;
use App\Facades\BuildQuestionArray;
use App\Http\Components\Question\ShowQuestionsComponent;
use App\Http\Components\Question\CorrectQuestionsComponent;


use DB;


class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showQuestions($genre_value, ShowQuestionsComponent $indicateQuestions){
        $user_data = Auth::user();
        $user_name = $user_data -> name;
        $user_id = $user_data -> id;

        $questions = $indicateQuestions->showQuestionsComponent($genre_value);
        // dd($questions);      
         return view('questions.showQuestions',compact('user_id','genre_value','user_name','questions'));
    }



    public function correctQuestions(Request $small_datas, CorrectQuestionsComponent $correct){
        $user_data = Auth::user();
        $user_id = $user_data -> id;
        $genre_value = $small_datas->genre_value;
        $small_answers = $small_datas->small_answers;

     
        $big_records = DB::table('big_questions')
        ->select('big_questions.*')
        ->get();
   
        $questions = $correct-> correctQuestionsComponent($genre_value);
    
        return view('questions.correctQuestions',compact('user_id','questions','genre_value','small_answers','big_records'));

    }

    public function saveAnswers(Request $request　){
       //保存に必要なデータ。絶対あかんけどひとまず
        $user_id = $request->user_id;
        $results = $request->result;
        $user_answer_array= $request->user_answer;
        $genre_value =  $request->genre_value;

        $big_records= DB::table('big_questions')
        ->select('big_questions.*')
        ->get();

        $small_records = DB::table('small_questions')
        ->join('big_questions','small_questions.big_question_id','=','big_questions.id')
        ->where('small_questions.genre_value','=',$genre_value)
        ->select('small_questions.*', 'big_questions.big_question')
        ->get();

       
         //上述のデータを保存用の配列に組みこむ。これもあかんけどひとまず
        //resultがすべて入力されていないとundefinedoffsetエラー発生（それかキャッシュのせいだったかもしれんが)
         foreach ($big_records as $big_value){
            foreach($small_records as $small_value){
                if($big_value->id == $small_value->big_question_id){
                        $big_num=$big_value->id ;
                        $small_num=$small_value->question_num;
                        $small = $user_answer_array[$big_num][$small_num];
                        $result=$results[$big_num][$small_num];
                        // $answer_datas[]=["user_id"=>$user_id, "genre_value"=>$genre_value, "big_question_id"=>$big_num,"question_num"=>$small_num, "user_answer"=>$small ,"result"=>$result];
                     
                        DB::table('user_answers')->insert([
                            ["user_id"=>$user_id, "genre_value"=>$genre_value, "big_question_id"=>$big_num,"question_num"=>$small_num, "user_answer"=>$small ,"result"=>$result] 
                        ]);
                }
            }
        }
        
        return view('questions.afterQuestion',compact('genre_value'));

        

  
     }

       
}
  