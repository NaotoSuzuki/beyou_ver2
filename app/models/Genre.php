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
        logger()->info($genre_data);
        $hoge=array('hoge' => 'uuuuu');
        $fuga=array((object)$hoge);
        logger()->info($fuga);
    return $genre_data;
    }

}
