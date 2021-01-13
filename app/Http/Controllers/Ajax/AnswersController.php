<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Small_question;

class AnswersController extends Controller
{
    public function index() {

       return \App\Models\Small_question::all();  // ←自動でjsonにしてくれます
   }


}
