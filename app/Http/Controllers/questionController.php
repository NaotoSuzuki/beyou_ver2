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
use App\Http\Components\Question\SaveAnswersComponent;
use App\Http\Components\DataProvider\SmallQuestionProvider;
use App\Http\Components\DataProvider\BigQuestionProvider;



use DB;


class QuestionController extends Controller
{
    //以下のデータはプロパティにすべき
    // $user_data = Auth::user();
    // $user_id = $user_data -> id;

    // $big_records= DB::table('big_questions')
    // ->select('big_questions.*')
    // ->get();

    // $small_records = DB::table('small_questions')
    // ->join('big_questions','small_questions.big_question_id','=','big_questions.id')
    // ->where('small_questions.genre_value','=',$genre_value)
    // ->select('small_questions.*', 'big_questions.big_question')
    // ->get();

    private $big_records;
    

    public function getBig(BigQuestionProvider $big_provide){
        $big = $big_provide->bigQuestionProvider();
        return $big;
    }


    // public function __construct()
    // {
    //     $this->middleware('auth');

    //     $this->big_records = $big_provide->bigQuestionProvider();
    // }

    // public function getBigRecords(){

    //     return   $this->big_records;
    // }


    public function showQuestions($genre_value, ShowQuestionsComponent $indicateQuestions){
        $user_data = Auth::user();
        $user_name = $user_data -> name;
        $user_id = $user_data -> id;

        $questions = $indicateQuestions->showQuestionsComponent($genre_value);
      
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
   
        $answeredQuestions = $correct-> correctQuestionsComponent($genre_value);
    
        return view('questions.correctQuestions',compact('user_id','answeredQuestions','genre_value','small_answers','big_records'));

    }

    public function saveAnswers(Request $request,  SaveAnswersComponent $save){
       //保存に必要なデータ。絶対あかんけどひとまず
        $user_id = $request->user_id;
        $results = $request->result;
        $user_answer_array= $request->user_answer;
        $genre_value =  $request->genre_value;

        $save->saveAnswersComponent($genre_value, $user_answer_array, $results, $user_id);
        
        return view('questions.afterQuestion',compact('genre_value'));
    }

       
}
  