<?php  
    namespace App\Http\Components\Question;

    use DB;
    
    class SaveAnswersComponent{
        public function saveAnswersComponent($genre_value, $user_answer_array, $results, $user_id){
           
            $big_records= DB::table('big_questions')
            ->select('big_questions.*')
            ->get();
    
            $small_records = DB::table('small_questions')
            ->join('big_questions','small_questions.big_question_id','=','big_questions.id')
            ->where('small_questions.genre_value','=',$genre_value)
            ->select('small_questions.*', 'big_questions.big_question')
            ->get();
    
           
             //上述のデータを保存用の配列に組みこむ。これもあかんけどひとまず
            //resultがすべて入力されていないとundefinedoffsetエラー発生（それかキャッシュのせいだったかもしれんが)
             foreach ($big_records as $big_value){
                foreach($small_records as $small_value){
                    if($big_value->id == $small_value->big_question_id){
                            $big_num=$big_value->id ;
                            $small_num=$small_value->question_num;
                            $small = $user_answer_array[$big_num][$small_num];
                            $result=$results[$big_num][$small_num];
                            // $answer_datas[]=["user_id"=>$user_id, "genre_value"=>$genre_value, "big_question_id"=>$big_num,"question_num"=>$small_num, "user_answer"=>$small ,"result"=>$result];
                        
                        DB::table('user_answers')->insert([
                                [
                                "user_id"=>$user_id, 
                                "genre_value"=>$genre_value,
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