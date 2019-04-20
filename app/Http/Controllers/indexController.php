<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class indexController extends Controller
{
    //
    public function index(){
        $genres = new Genre();
        $genres_data = $genres->getData();

        // dd($genres_data);
        // return view('pages/index',compact('genres_data'));
        return view('pages.index', ['genres_data' => $genres_data]);
    }
}
