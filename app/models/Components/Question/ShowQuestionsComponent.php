<?php
    //問題表示用に配列を生成する。small_questionsのデータは全て入る。
    //option_numをwhereの条件に追加
    namespace App\Models\Components\Question;


    use DB;
    class ShowQuestionsComponent{
        public function showQuestionsComponent($genre_value, $option_num){ //引数にoption_num

            $small_questions_array = DB::table('small_questions')
                ->orderBy('option_num', 'asc')
                ->orderBy('big_question_id', 'asc')
                ->orderBy('question_num', 'asc')
                ->join('big_questions','small_questions.big_question_id','=','big_questions.id')
                ->where('small_questions.genre_value','=',$genre_value)
                ->where('small_questions.option_num','=',$option_num)
                ->select('small_questions.*', 'big_questions.big_question')
                ->get();

            foreach($small_questions_array as $record_value){
                $option_num = $record_value->option_num;
                $big_que=$record_value->big_question_id;
                $big_q=$record_value->big_question;
                $small_q=$record_value->question;
                $questions1[$big_que]=["big_question"=>$big_q];
                $questions2[$big_que][]=$small_q;
            }
            for($i=1; $i<=3; $i++ ){
                $questions[$i]=$questions1[$i];
                $questions[$i]["questions"]=$questions2[$i];
                $questions[$i]["option_num"]=$option_num;

            }
            return $questions;



    }

}
