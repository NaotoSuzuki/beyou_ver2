<?php  
    namespace App\Http\Components\Question;

    use DB;
    
    class CorrectQuestionsComponent{
        public function correctQuestionsComponent($genre_value, $small_records){
     
        
         foreach( $small_records  as $record_value){
                    $big_que=$record_value->big_question_id;
                    $big_q=$record_value->big_question;
                    $small_q=$record_value->question;
                    $small_a=$record_value->answer;
                    $questions1[$big_que]=["big_question"=>$big_q];
                  
                    $questions2[$big_que][]=$small_q;
                    $answers[$big_que][]=$small_a;
               }
               
                for($i=1; $i<=3; $i++ ){
                    $questions[$i]=$questions1[$i];
                    $questions[$i]["questions"]=$questions2[$i];
                    $questions[$i]["answers"]=$answers[$i];
                }
            return $questions;
    }
    
}