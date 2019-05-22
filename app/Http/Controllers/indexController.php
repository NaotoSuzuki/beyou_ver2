<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Genre;
use App\Facades\Hoge;
use Illuminate\Http\Request;
use App\Http\Components\Index\ShowHists;
use App\Http\Components\Index\HistDetail;
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
         $genre = Genre::find($genre);
    return view('pages.explain',['genre'=> $genre]);
    }

    public function show_Hists(ShowHists $hist, $user_id){
            $hist_arrays =  $hist->showHists($user_id);
    return view('pages.studyHist',compact('hist_arrays'));
    }

    public function hogeTest(){
        $a = Hoge::echoHoge();
    }


    public function histDetail(Request $hist_info, HistDetail $hist_detail){
        $user_data = Auth::user();
        $user_id = $user_data -> id;
        $user_name = $user_data -> name;
        $genre_value = $hist_info->genre_value;
        $created = $hist_info->created;
        $hist_indicates = $hist_detail->histDetail($user_id, $created, $genre_value);
       
       
        return view('pages.studytHistDetail',compact('hist_indicates','user_name','created'));
    
    }
}
