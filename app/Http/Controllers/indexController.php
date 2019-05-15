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
        return view('pages.home')->with('genres_data',$genres_data) ;
    }

    public function index(){
        $genres = new Genre();
        $genres_data = $genres->getData();
     return view('pages.index')->with('genres_data',$genres_data) ;
    }

    public function explain($genre_value,$genres){
        //genresはindexクラスのプロパティにすべき
        $genre = Genre::find($genre);
        return view('pages.explain',['genre'=> $genre]);
    }

    public function hists(){
        $user_data = Auth::user();
        $user_id = $user_data -> id;

        $hist_array = DB::table('user_answers')
        ->orderBy('created','desc')
        ->join('genres','users_answers.genre_value','=','genres.genre_value')
        ->join('small_questions','user_answers.genre_value','=','small_questions.genre_value')
        ->join('big_questions','susers_answer.big_questions_id','=','big_questions.id')
        ->where('susers_answer.user_id','=', $user_id)
        ->select(
                'users_answer.genre_value', 
                'users_answer.big_questions_id', 
                'users_answer.question_num', 
                'users_answer.user_answer', 
                'users_answer.result', 
                'users_answer.created', 
                'genres.genre', 
                'small_questions.answer', 
                ' big_questions.question', 
               
        )
        ->get();
        dd($hist_array);
           
           return $hist_array;
    
 
    }
}
