<?php
namespace App\Helpers;
//問題表示や回答保存用の配列を作るための処理を書いていく


 
class ArrayBuilder
{
    public function indicateQuesstionsArray($small_questions_array){

        foreach($small_questions_array as $record_value){
            $big_que=$record_value->big_question_id;
            $big_q=$record_value->big_question;
            $small_q=$record_value->question;
            $questions1[$big_que]=["big_question"=>$big_q];
            $questions2[$big_que][]=$small_q;
        }
        for($i=1; $i<=3; $i++ ){
            $questions[$i]=$questions1[$i];
            $questions[$i]["questions"]=$questions2[$i];
        }

      return  $questions;
    }
 }


