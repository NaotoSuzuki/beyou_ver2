<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

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
}
