<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;


class IndexController extends Controller
{
    public function index(){
        $genres = new Genre();
        $genres_data = $genres->getData();
     return view('pages.index')->with('genres_data',$genres_data) ;
    }

    public function explain($genre){
        //genresはindexクラスのプロパティにすべき
        $genre = Genre::find($genre);
        return view('pages.explain',['genre'=> $genre]);
    }
}
