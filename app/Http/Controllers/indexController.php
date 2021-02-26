<?php

namespace App\Http\Controllers;

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

class IndexController extends Controller
{
    private $user_id;
    private $user_name;

   function __construct()
    {
        $this->middleware('auth');
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



    public function index(){
        // 以下のデータの持って方を変える必要がある。

        $genres = new Genre();
        $genres_posts = $genres->getGenreAndPostsComponent();
        // dd($genre_posts->toArray());
        // $genres_data = $genres->getData();
        $user_id = IndexController::getUserId();
        $user_name = IndexController::getUserName();
        $posts = Explanation::get();
        // dd($genres_posts);
        return view('pages.index',compact('genres_posts','user_id','user_name','posts')) ;
    }

    public function mypage(){
        $user_id = IndexController::getUserId();
        $user_name = IndexController::getUserName();
         return view('pages.mypage',compact('user_id','user_name')) ;

    }

    public function options($genre_value, GetGenreComponent $getGenre, GetGenreDescribeComponent $getGenreDescribe, GetOptionDetailComponent $getOptionDetail, GetOptionNumComponent $getOptionNum){
        $genre = $getGenre->getGenreComponent($genre_value);
        $genre_describe = $getGenreDescribe->getGenreDescribeComponent($genre_value);
        $option_num = $getOptionNum->getOptionNumComponent($genre_value);
        $option_details = $getOptionDetail->getOptionDetailComponent($genre_value);
        $user_id = IndexController::getUserId();
        $user_name = IndexController::getUserName();

         return view('pages.options',compact('genre_value','genre','genre_describe','option_num','option_details','user_id','user_name')) ;
    }

    public function explain($genre_value){

        $posts = Post::where('genre_value',$genre_value)->get();
        //dd();
        foreach($posts as $post){
          $title = $post->title;
          $body = $post->body;
          $genre = $post->genre;
          $genre_value = $post->genre_value;
        }


        return view('posts.show',compact('title','body','genre','genre_value'));
    }

    public function show_Hists(ShowHists $hist, $user_id){
        // dd($hist);
        $hist_arrays =  $hist->showHists($user_id);
        // dd($hist_arrays);
        $user_name = IndexController::getUserName();

        return view('pages.studyHist',compact('hist_arrays','user_id','user_name'));
    }


    public function histDetail(Request $hist_info, HistDetail $hist_detail, GetGenreComponent $getGenre){
        dd($hist_info);
        $user_id = IndexController::getUserId();
        $user_name = IndexController::getUserName();
        $genre_value = $hist_info->genre_value;
        $genre = $getGenre->getGenreComponent($genre_value);
        $created_date = $hist_info->created_date;
        $hist_indicates = $hist_detail->histDetail($user_id, $created_date, $genre_value);
        return view('pages.studytHistDetail',compact('hist_indicates','user_id','user_name','created_date','genre', 'genre_value'));
    }
}
