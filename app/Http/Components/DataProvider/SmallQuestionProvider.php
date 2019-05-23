<?php  
    namespace App\Http\Components\DataProvider;

    use DB;

    class SmallQuestionProvider{

        public function smallQuestionProvider($genre_value){

            $small_records = DB::table('small_questions')
            ->join('big_questions','small_questions.big_question_id','=','big_questions.id')
            ->where('small_questions.genre_value','=',$genre_value)
            ->select('small_questions.*', 'big_questions.big_question')
            ->get();

            return $small_records;
        }

    }