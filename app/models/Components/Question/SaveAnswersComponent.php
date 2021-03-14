<?php
    namespace App\Models\Components\Question;

    use DB;

    class SaveAnswersComponent{
        public function saveAnswersComponent($genre_value,$option_num,$updated_answers){


             foreach ($updated_answers as $updated_answer_array){
                foreach($updated_answer_array as $updated_answer){
                    dd($updated_answer_array);
                    if($big_value->id == $small_value->big_question_id){
                            $big_num=$big_value->id ;
                            $small_num=$small_value->question_num;
                            $option_num=$small_value->option_num;
                            $small = $user_answer_array[$big_num][$small_num];
                            $result=$results[$big_num][$small_num];

                            DB::table('user_answers')->insert([
                                    [
                                    "user_id"=>$user_id,
                                    "genre_value"=>$genre_value,
                                    "option_num"=>$option_num,
                                    "big_question_id"=>$big_num,
                                    "question_num"=>$small_num,
                                    "user_answer"=>$small ,
                                    "result"=>$result
                                    ]
                            ]);

                     }
                }

            }
        }
}
