<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Small_question extends Model
{
    //
    protected $fillable = ['genre_value','big_question_id','question_num','question','answer'];
}
