<?php
    namespace App\Models\Components\Question;

    use DB;

    class UpdateQuestionsComponent{
        public function UpdateQuestionsComponent($genre_value, $updated_questions, $updated_answers, $big_records, $small_records){


             foreach ($big_records as $big_value){
                foreach($small_records as $small_value){
                    if($big_value->id == $small_value->big_question_id){
                            $big_num=$big_value->id ;
                            $small_num=$small_value->question_num;
                            $option_num=$small_value->option_num;
                            $new_question = $updated_questions[$big_num][$small_num];
                            $new_answer = $updated_answers[$big_num][$small_num];

                            if( !empty($new_question)){
                            $updated_question = $updated_questions[$big_num][$small_num];
                            DB::table('small_questions')
                                ->where('genre_value',$genre_value)
                                ->where('option_num',$option_num)
                                ->where('big_question_id',$big_num)
                                ->where('question_num',$small_num)
                                ->update(['question' => $updated_question]);
                        }

                            if( !empty($new_answer)){
                            $updated_answer = $updated_answers[$big_num][$small_num];
                            DB::table('small_questions')
                                ->where('genre_value',$genre_value)
                                ->where('option_num',$option_num)
                                ->where('big_question_id',$big_num)
                                ->where('question_num',$small_num)
                                ->update(['answer' => $updated_answer]);
                        }

                     }
                }

            }

        }
}
