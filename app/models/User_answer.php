<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class User_answer extends Model
{
    //
    protected $fillable = ['user_id', 'genre_value', ' big_question_id', ' question_num', 'user_answer', 'result', 'created'];          
}
