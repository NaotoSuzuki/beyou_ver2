<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;


class QuestionController extends Controller
{
    public function showQuestions($genre_value){
        $genre = Genre::find($genre_value);
     return view('questions.showQuestions',['genre'=> $genre_value]);
    }
}
