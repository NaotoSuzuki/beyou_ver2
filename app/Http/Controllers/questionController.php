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
use App\Models\Components\Question\GetGenreComponent;

use App\Http\Requests\ValidRequest;
use Validator;

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

    private static function getUserId(){
        $user_data = Auth::user();
        $user_id = $user_data -> id;
        return $user_id;
    }


    private static function getUserName(){
        $user_data = Auth::user();
        $user_name = $user_data -> name;
        return $user_name;
    }



    public function showQuestions($genre_value,  ShowQuestionsComponent $indicateQuestions, GetGenreComponent $getGenre){
        $user_id = QuestionController::getUserId();
        $user_name = QuestionController::getUserName();
        $questions = $indicateQuestions->showQuestionsComponent($genre_value);
        $genre = $getGenre->getGenreComponent($genre_value);
       
         return view('questions.showQuestions',compact('user_id','genre_value','user_name','genre','questions'));
    }








    public function correctQuestions(Request $small_datas, CorrectQuestionsComponent $correct, GetGenreComponent $getGenre){
        
       
        $genre_value = $small_datas->genre_value;
        $small_answers = $small_datas->small_answers;
        $user_id = QuestionController::getUserId();
        $user_name = QuestionController::getUserName();
        $big_records = QuestionController::getBigRecords();
        $genre = $getGenre->getGenreComponent($genre_value);
       
        $small_records = QuestionController::getSmallRecords($genre_value);
        $answeredQuestions = $correct-> correctQuestionsComponent($genre_value,  $small_records);

            // 正当とユーザーの回答のみの配列生成
           foreach($answeredQuestions as $answeredQuestion) {
                $num = count($answeredQuestion["answers"]);
                $item_num = $num - 1;
           
                for($i=0; $i <= $item_num; $i++){
                    $correct_answers[] =  $answeredQuestion["answers"][$i];
                }
             }
           


             foreach($small_answers as $small_answer){
               
                $num = count($small_answer);
                
                for($i=1; $i <= $num; $i++){
                    
                    $user_answers[] = $small_answer[$i];
                    
                }
               
            }
            
            
            $resutlt = array_diff($user_answers,  $correct_answers);
            dd($resutlt);


        return view('questions.correctQuestions',compact('user_id','answeredQuestions','genre_value','small_answers','big_records','user_name','genre'));

    }






    public function saveAnswers(Request $request,  SaveAnswersComponent $save){
        $user_id = $request->user_id;
        $results = $request->result;
        $user_answer_array= $request->user_answer;
        $genre_value =  $request->genre_value;
        $big_records = QuestionController::getBigRecords();
        $small_records = QuestionController::getSmallRecords($genre_value);
        $user_name = QuestionController::getUserName();

        $save->saveAnswersComponent($genre_value, $user_answer_array, $results, $user_id, $big_records, $small_records);
        
        
        return view('questions.afterQuestion',compact('genre_value','user_id','user_name'));
    }

       
}
  