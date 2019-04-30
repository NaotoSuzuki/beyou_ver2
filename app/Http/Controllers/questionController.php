<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;


class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showQuestions($genre_value){
        $genre = Genre::find($genre_value);
        $user_data = Auth::user();
        $user_name = $user_data -> name;
        return view('questions.showQuestions',compact('genre','user_name'));
    }
}
