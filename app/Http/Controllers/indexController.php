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

        return view('pages/index',compact('genres_data'));
    }
}
