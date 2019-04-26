<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;


class QuestionController extends Controller
{
    public function __construct(){
    logger()->info("111111");
    }

    public function show($genre_value){
        $genre = Genre::find($genre_value);
        // Log::info("2222222");
// logger()->info(var_dump($genre_value));
logger()->error(var_dump($genre_value));
throw new \Exception("Error Processing Request", 1);

logger()->info(var_dump($genre));
        return view('questions.show',['genre'=> $genre_value,'hoge' => 'hogeeeeeeee']);

    }
}
