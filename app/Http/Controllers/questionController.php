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



    private static function getSmallRecords($genre_value, $option_num){

        $small_records = DB::table('small_questions')
        ->leftjoin('big_questions','small_questions.big_question_id','=','big_questions.id')
        ->leftjoin('answers',"small_questions.big_question_id",'=','answers.big_question_id')
        ->where('small_questions.genre_value','=', $genre_value)
        ->where('small_questions.option_num','=', $option_num)
        ->select('small_questions.*', 'big_questions.big_question')
        //↑answerテーブルができたら、↑にanswersテーブルの"answer","answer2","answer3"カラムもセレクトさせること。
        // big_questionの前に『,'asnwers.answer','asnwers.answer2','asnwers.answer3'』2/13
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




    public function showQuestions(Request $request, ShowQuestionsComponent $indicateQuestions, GetGenreComponent $getGenre){
        $genre_value = $request->genre_value;
        $option_num = $request->option_num;
        $user_id = QuestionController::getUserId();
        $user_name = QuestionController::getUserName();
        $questions = $indicateQuestions->showQuestionsComponent($genre_value,$option_num);
        $genre = $getGenre->getGenreComponent($genre_value);
        //option_numは$questionsの配列の中に入っている。取り出し方は？今のDBOのロジックのくくりにoption_numを入れるだけ
         return view('questions.showQuestions',compact('user_id','genre_value','user_name','genre','questions','option_num'));
    }




    public function correctQuestions(Request $small_datas, CorrectQuestionsComponent $correct, GetGenreComponent $getGenre){

        $option_num = $small_datas->option_num;
        $genre_value = $small_datas->genre_value;
        $small_answers = $small_datas->small_answers;
        $user_id = QuestionController::getUserId();
        $user_name = QuestionController::getUserName();
        $big_records = QuestionController::getBigRecords();
        $genre = $getGenre->getGenreComponent($genre_value);

        $small_records = QuestionController::getSmallRecords($genre_value, $option_num);

        $answeredQuestions = $correct-> correctQuestionsComponent($genre_value,  $small_records, $small_answers, $option_num);
            // dd($answeredQuestions);
        return view('questions.correctQuestions',compact('user_id','answeredQuestions','genre_value','small_answers','big_records','user_name','genre'));

    }

    //問題の答えを返す
    public function showAnswers() {

       return view('questions.showQuestions');

   }


    public function saveAnswers(Request $request,  SaveAnswersComponent $save){//パラメータとして$option_num
        $user_id = $request->user_id;
        $results = $request->result;
        $option_num = $request->option_num;
        $user_answer_array= $request->user_answer;
        $genre_value =  $request->genre_value;
        $big_records = QuestionController::getBigRecords();
        $small_records = QuestionController::getSmallRecords($genre_value, $option_num);
        $user_name = QuestionController::getUserName();

        $save->saveAnswersComponent($genre_value, $user_answer_array, $results, $user_id, $big_records, $small_records);


        return view('questions.afterQuestion',compact('genre_value','user_id','user_name'));
    }


}
