<?php

namespace App\Http\Controllers;

use DB;

use App\Models\Genre;
use App\Facades\Hoge;
use App\Facades\ShowHists;
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

    public function show_Hists($user_id){
        $user_data = Auth::user();
        $user_id = $user_data -> id;
        $hist_arrays =  ShowHists::showHists($user_id);
           
    return view('pages.studyHist',compact('hist_arrays'));
    }

    public function hogeTest(){
        $a = Hoge::echoHoge();
    }


    public function histDetail(Request $hist_info){
        $user_data = Auth::user();
        $user_id = $user_data -> id;
        $user_name = $user_data -> name;
        $genre_value = $hist_info->genre_value;
        $created = $hist_info->created;
       
        //joinの条件に同じテーブルを2度参照しており、その用途の違いが判らずエラーになっている
        //プログラムの処理順を考え

    
      
        $hist_indicate_datas = HistDetail::histDetail($user_id, $created, $genre_value);
        
     
           
           return view('pages.studyHistDetail',compact('hist_indicates','user_name','created'));
    
    }
}
