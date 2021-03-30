<?php

namespace App\models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explanation extends Model
{
    use HasFactory;
    protected $fillable = ['genre_code','title', 'content',];
}
