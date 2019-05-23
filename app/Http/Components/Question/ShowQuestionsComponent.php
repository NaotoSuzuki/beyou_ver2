<?php  
    namespace App\Http\Components\Question;
    

    use DB;
    class ShowQuestionsComponent{
        public function showQuestionsComponent($genre_value){
            
            $small_questions_array = DB::table('small_questions')
                ->orderBy('big_question_id', 'asc')
                ->orderBy('question_num', 'asc')
                ->join('big_questions','small_questions.big_question_id','=','big_questions.id')
                ->where('small_questions.genre_value','=',$genre_value)
                ->select('small_questions.*', 'big_questions.big_question')
                ->get();
                                
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
            return $questions;
    }
    
}