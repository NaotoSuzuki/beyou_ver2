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
           
           return view('pages.study_hist',compact('hist_arrays'));
    
 
    }
}
