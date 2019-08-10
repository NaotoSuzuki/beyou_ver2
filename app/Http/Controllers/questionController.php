<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Small_question;
use App\Models\Big_question;
use App\Models\User_answer;
<<<<<<< HEAD
use App\Facades\BuildQuesstionArray;
=======
use App\Facades\BuildQuestionArray;
use App\Models\Components\Question\ShowQuestionsComponent;
use App\Models\Components\Question\CorrectQuestionsComponent;
use App\Models\Components\Question\SaveAnswersComponent;
use App\Models\Components\Question\GetGenreComponent;

use App\Http\Requests\ValidRequest;
use Validator;

>>>>>>> master
use DB;


class QuestionController extends Controller
{
<<<<<<< HEAD
=======

    // private $user_id;

>>>>>>> master
    public function __construct()
    {
        $this->middleware('auth');
    }


<<<<<<< HEAD
    public function showQuestions($genre_value){
        $user_data = Auth::user();
        $user_name = $user_data -> name;
        $user_id = $user_data -> id;
     

        $small_questions_array = DB::table('small_questions')
                          ->join('big_questions','small_questions.big_question_id','=','big_questions.id')
                          ->where('small_questions.genre_value','=',$genre_value)
                          ->select('small_questions.*', 'big_questions.big_question')
                          ->get();

                         
       $a = BuildQuesstionArray::buildQuestionArray($small_questions_array );
       dd($a);

        foreach($small_questions_array as $record_value){
            $big_que=$record_value->big_question_id;
            $big_q=$record_value->big_question;
            $small_q=$record_value->question;
            $questions1[$big_que]=["big_question"=>$big_q];
            $questions2[$big_que][]=$small_q;
        }
        for($i=1; $i<=3; $i++ ){
            $questions[$i]=$questions1[$i];
            $questions[$i]["questions"]=$questions2[$i];
        }
                           
         return view('questions.showQuestions',compact('user_id','genre_value','user_name','questions'));
=======
    private static function getBigRecords(){
        $big_records= DB::table('big_questions')
        ->select('big_questions.*')
        ->get();

        return  $big_records;
>>>>>>> master
    }



<<<<<<< HEAD
    public function correctQuestions(Request $small_datas){
        $user_data = Auth::user();
        $user_id = $user_data -> id;
        

        // $questionsの情報は複数ページで使われているので共通化できる。多分モデルに書く？
        //以下はquestion取得時とことなる。なので、laravel風に書き直すこと
        $genre_value = $small_datas->genre_value;

        $small_answers = $small_datas->small_answers;
     
        $big_records = DB::table('big_questions')
        ->select('big_questions.*')
        ->get();
        
       


        $small_records = DB::table('small_questions')
        ->join('big_questions','small_questions.big_question_id','=','big_questions.id')
        ->where('small_questions.genre_value','=',$genre_value)
        ->select('small_questions.*', 'big_questions.big_question')
        ->get();
        

         foreach( $small_records  as $record_value){
                    $big_que=$record_value->big_question_id;
                    $big_q=$record_value->big_question;
                    $small_q=$record_value->question;
                    $small_a=$record_value->answer;
                    $questions1[$big_que]=["big_question"=>$big_q];
                  
                    $questions2[$big_que][]=$small_q;
                    $answers[$big_que][]=$small_a;
               }
               
                for($i=1; $i<=3; $i++ ){
                    $questions[$i]=$questions1[$i];
                    $questions[$i]["questions"]=$questions2[$i];
                    $questions[$i]["answers"]=$answers[$i];
                }
          
            
         
        return view('questions.correctQuestions',compact('user_id','questions','genre_value','small_answers','big_records'));

    }

    public function saveAnswers(Request $request){
       //保存に必要なデータ。絶対あかんけどひとまず
=======
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
        $answeredQuestions = $correct-> correctQuestionsComponent($genre_value,  $small_records, $small_answers );




        return view('questions.correctQuestions',compact('user_id','answeredQuestions','genre_value','small_answers','big_records','user_name','genre'));

    }



    public function saveAnswers(Request $request,  SaveAnswersComponent $save){
>>>>>>> master
        $user_id = $request->user_id;
        $results = $request->result;
        $user_answer_array= $request->user_answer;
        $genre_value =  $request->genre_value;
<<<<<<< HEAD

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

        

  
     }

       
}
  
=======
        $big_records = QuestionController::getBigRecords();
        $small_records = QuestionController::getSmallRecords($genre_value);
        $user_name = QuestionController::getUserName();

        $save->saveAnswersComponent($genre_value, $user_answer_array, $results, $user_id, $big_records, $small_records);


        return view('questions.afterQuestion',compact('genre_value','user_id','user_name'));
    }


}
>>>>>>> master
