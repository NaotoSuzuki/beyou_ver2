<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genre extends Model
{
    public function getData(){
        $genre_data = DB::table($this->table)->get();

        return $genre_data;
    }

}
