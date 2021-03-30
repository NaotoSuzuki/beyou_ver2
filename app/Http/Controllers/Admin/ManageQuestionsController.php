<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use App\Models\Genre;
use App\Models\Components\Index\ShowHists;
use App\Models\Components\Index\HistDetail;
use App\Models\Components\Index\GetOptionDetailComponent;
use App\Models\Components\Index\GetOptionNumComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Components\Question\GetGenreComponent;
use App\Models\Components\Question\GetGenreDescribeComponent;
use App\Post;
use App\models\Admin\Explanation;

use App\Models\Components\Question\ShowQuestionsComponent;

use App\Models\Components\Question\UpdateQuestionsComponent;

class ManageQuestionsController extends Controller
{

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


    public function manageQuestions(){
        $genres = new Genre();
        $genres_posts = $genres->getGenreAndPostsComponent();
        return view('admin.questionsIndex',compact('genres_posts')) ;
    }

    public function options($genre_value, GetGenreComponent $getGenre, GetGenreDescribeComponent $getGenreDescribe, GetOptionDetailComponent $getOptionDetail, GetOptionNumComponent $getOptionNum){

            $genre = $getGenre->getGenreComponent($genre_value);
            $genre_describe = $getGenreDescribe->getGenreDescribeComponent($genre_value);
            $option_num = $getOptionNum->getOptionNumComponent($genre_value);
            $option_details = $getOptionDetail->getOptionDetailComponent($genre_value);


             return view('admin.manageOptions',compact('genre_value','genre','genre_describe','option_num','option_details')) ;

    }

    public function questions(Request $request, ShowQuestionsComponent $indicateQuestions, GetGenreComponent $getGenre){
        $option_detail = $request->option_detail;
        $genre_value = $request->genre_value;
        $option_num = $request->option_num;

        if(!empty($option_detail)){
            $new_option_detail = $request->option_detail;
            DB::table('options')
              ->where('genre_value', $genre_value)
              ->where('option_num', $option_num)
              ->update(['option_detail' => $new_option_detail]);
        }

        $small_records = ManageQuestionsController::getSmallRecords($genre_value, $option_num);
        $big_records = ManageQuestionsController::getBigRecords();
        $genre = $getGenre->getGenreComponent($genre_value);

        //option_numは$questionsの配列の中に入っている。取り出し方は？今のDBOのロジックのくくりにoption_numを入れるだけ
         return view('admin.manageQuestions',compact('genre_value','genre','option_num','small_records','big_records'));
    }


    public function update(Request $request,  UpdateQuestionsComponent $update, ShowQuestionsComponent $indicateQuestions, GetGenreComponent $getGenre
    ,GetOptionNumComponent $getOptionNum, GetGenreDescribeComponent $getGenreDescribe, GetOptionDetailComponent $getOptionDetail){

        $option_num = $request->option_num;
        $updated_questions= $request->updated_questions;
        $updated_answers= $request->updated_answers;
        $genre_value =  $request->genre_value;

        $genre = $getGenre->getGenreComponent($genre_value);
        $big_records = ManageQuestionsController::getBigRecords();
        $small_records = ManageQuestionsController::getSmallRecords($genre_value, $option_num);
        $questions = $indicateQuestions->showQuestionsComponent($genre_value,$option_num);

        $update->updateQuestionsComponent($genre_value, $updated_questions, $updated_answers, $big_records, $small_records);

        $genre = $getGenre->getGenreComponent($genre_value);
        $genre_describe = $getGenreDescribe->getGenreDescribeComponent($genre_value);
        $option_num = $getOptionNum->getOptionNumComponent($genre_value);
        $option_details = $getOptionDetail->getOptionDetailComponent($genre_value);

         return view('admin.manageOptions',compact('genre_value','genre','genre_describe','option_num','option_details')) ;
    }

    public function createQuestions(Request $request){
        $option_num = $request->option_num;
        $genre_value = $request->genre_value;
    return view('admin.createQuestions',compact('option_num','genre_value'));
    }

    public function storeQuestions(Request $request){
        // dd($request);
        $option_num = $request->option_num;
        $genre_value = $request->genre_value;
        $genre_value = $request->genre_value;
    return view('admin.createQuestions',compact('option_num','genre_value'));
    }
}
