<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\Genre;

class IndexController extends Controller
{
    public function __construct()
=======
use DB;
use App\Models\Genre;
use App\Models\Components\Index\ShowHists;
use App\Models\Components\Index\HistDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Components\Question\GetGenreComponent;
use App\Post;

class IndexController extends Controller
{
    private $user_id;
    private $user_name;

   function __construct()
>>>>>>> master
    {
        $this->middleware('auth');
    }

<<<<<<< HEAD
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
=======

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



    public function index(){
        $genres = new Genre();
        $genres_data = $genres->getData();
        $user_id = IndexController::getUserId();
        $user_name = IndexController::getUserName();
    
         return view('pages.index',compact('genres_data','user_id','user_name')) ;
    }

    public function explain($genre_value){
       
        $posts = Post::where('genre_value',$genre_value)->get();
       
        foreach($posts as $post){
          $title = $post->title;
          $body = $post->body;
          $genre = $post->genre;
          $genre_value = $post->genre_value;
        }
        
     
        return view('posts.show',compact('title','body','genre','genre_value'));
    }

    public function show_Hists(ShowHists $hist, $user_id){
        $hist_arrays =  $hist->showHists($user_id);
        $user_name = IndexController::getUserName();
            
        return view('pages.studyHist',compact('hist_arrays','user_id','user_name'));
    }


    public function histDetail(Request $hist_info, HistDetail $hist_detail, GetGenreComponent $getGenre){
        $user_id = IndexController::getUserId();
        $user_name = IndexController::getUserName();
        $genre_value = $hist_info->genre_value;
        $genre = $getGenre->getGenreComponent($genre_value);
        $created = $hist_info->created;
        $hist_indicates = $hist_detail->histDetail($user_id, $created, $genre_value);
        return view('pages.studytHistDetail',compact('hist_indicates','user_id','user_name','created','genre', 'genre_value'));
>>>>>>> master
    }
}
