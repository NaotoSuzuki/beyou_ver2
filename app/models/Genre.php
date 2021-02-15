<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Genre extends Model
{
    protected $table = 'genres';
    protected $guarded = array('id');
    public $timestamps = false;

    public function getData(){
        $genre_data = DB::table($this->table)->get();
        return $genre_data;
    }


    public function getGenreAndPostsComponent(){

            $genreArrayAndPosts = DB::table('genres as genres_data')
             ->leftjoin('explanations','genres_data.genre_value','=','explanations.genre_code')
             ->get();
         // dd($genreArrayAndPosts->toArray());
         return $genreArrayAndPosts;
    }



    public function small_questions()
    {
        return $this->hasMany('App\Models\Small_question');
    }

}
