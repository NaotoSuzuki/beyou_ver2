<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Small_question;
use App\Models\Big_Question;


class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showQuestions($genre_value){
        $user_data = Auth::user();
        $user_name = $user_data -> name;
        // $small_questions = Small_question::where('genre_value',$genre_value)->get();
        // $big_questions = Big_question::all();
        // $big_que = $big_questions['question'];
       
        return view('questions.showQuestions',compact('genre_value','user_name'));
    }
}
