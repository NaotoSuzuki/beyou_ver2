<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $genres = new Genre();
        $genres_data = $genres->getData();

        
        $user_data = Auth::user();
        $user_id = $user_data -> id;
     return view('pages.index',compact('genres_data','user_id')) ;
    }

    public function index(){
        $genres = new Genre();
        $genres_data = $genres->getData();

        
        $user_data = Auth::user();
        $user_id = $user_data -> id;
     return view('pages.index',compact('genres_data','user_id')) ;
    }

    public function explain($genre_value,$genres){
        //genresはindexクラスのプロパティにすべき
        $genre = Genre::find($genre);
        return view('pages.explain',['genre'=> $genre]);
    }

    public function showHists($user_id){
        $user_data = Auth::user();
        $user_id = $user_data -> id;

        $hist_arrays = DB::table('user_answers')
        ->orderBy('created','desc')
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
                'user_answers.created', 
                'genres.genre', 
                'small_questions.answer', 
                'big_questions.big_question'       
        )
        ->get();
           
           return view('pages.studyHist',compact('hist_arrays'));
    
 
    }


    public function histDetail(Request $hist_info){



        
        $user_data = Auth::user();
        $user_id = $user_data -> id;
        $user_name = $user_data -> name;
        $genre_value = $hist_info->genre_value;
        $created = $hist_info->created;
       
        //joinの条件に同じテーブルを2度参照しており、その用途の違いが判らずエラーになっている
        //プログラムの処理順を考え

      
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

        // dd($hist_indicate_datas);
        
        
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


           
           return view('pages.studyHistDetail',compact('hist_indicates','user_name','created'));
    
    }
}
