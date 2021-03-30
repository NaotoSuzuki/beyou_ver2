<?php

namespace App\models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['genre_value','option_num','option_name','option_detail','ption_describe_title','option_describe_content'];
}
