<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Small_question extends Model
{
    //
    protected $fillable = ['genre_value','big_question_id','question_num','question','answer'];
    protected $table = 'small_questions';
    protected $guarded = array('id');
    public $timestamps = false;


   

    //DBから小問題データを全件取得
    // public function getSmallQuestions()
    //     {
    //     $small_records = DB::table($this->table)->get();
            
    //     return $small_records;
    //     }

        public function getSmallQuestions()
        {
            return $this->belongsTo('App\Models\Big_question');
        }
}
        

    // //DBからの問題データを表示用の配列を生成
    // public function formQuestion($small_records){
    //     foreach($small_records as $record_value){
    //         $big_que=$record_value["big_questions_id"];
    //         $big_q=$record_value["big_question"];
    //         $small_q=$record_value["question"];
    //         $questions1[$big_que]=["big_question"=>$big_q];
    //         $questions2[$big_que][]=$small_q;
    //     }
    //     for($i=1; $i<=3; $i++ ){
    //         $questions[$i]=$questions1[$i];
    //         $questions[$i]["questions"]=$questions2[$i];
    //     }
    //     return $questions;
    // }


