<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Big_question extends Model
{

    protected $table = 'big_questions';
    protected $guarded = array('id');

    //DBから大問題データを全件取得
    public function getBigQuestion()
    {
    $big_records = DB::table($this->table)->get();
        
    return $big_records;
    }

}
