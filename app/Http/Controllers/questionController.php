<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Small_question;
use App\Models\Big_question;
use App\Models\User_answer;
use App\Facades\BuildQuestionArray;
use App\Models\Components\Question\ShowQuestionsComponent;
use App\Models\Components\Question\CorrectQuestionsComponent;
use App\Models\Components\Question\SaveAnswersComponent;




use DB;


class QuestionController extends Controller
{
    
    // private $user_id;
   
    public function __construct()
    {
        $this->middleware('auth');
    }



    

    private static function getBigRecords(){
        $big_records= DB::table('big_questions')
            ->select('big_questions.*')
            ->get();
    
            return  $big_records;
    
        } 



    
        private static function getSmallRecords($genre_value){
    
            $small_records = DB::table('small_questions')
            ->join('big_questions','small_questions.big_question_id','=','big_questions.id')
            ->where('small_questions.genre_value','=', $genre_value)
            ->select('small_questions.*', 'big_questions.big_question')
            ->get();
    
            return $small_records;
    
        } 








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
        $big_records = QuestionController::getBigRecords();
        $small_records = QuestionController::getSmallRecords($genre_value);
        $answeredQuestions = $correct-> correctQuestionsComponent($genre_value,  $small_records);
    
        return view('questions.correctQuestions',compact('user_id','answeredQuestions','genre_value','small_answers','big_records'));

    }






    public function saveAnswers(Request $request,  SaveAnswersComponent $save){
        $user_id = $request->user_id;
        $results = $request->result;
        $user_answer_array= $request->user_answer;
        $genre_value =  $request->genre_value;
        $big_records = QuestionController::getBigRecords();
        $small_records = QuestionController::getSmallRecords($genre_value);

        $save->saveAnswersComponent($genre_value, $user_answer_array, $results, $user_id, $big_records, $small_records);
        
        
        return view('questions.afterQuestion',compact('genre_value','user_id'));
    }

       
}
  