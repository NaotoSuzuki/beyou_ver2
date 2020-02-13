<?php
    namespace App\Models\Components\Question;

    use DB;

    class CorrectQuestionsComponent{
        public function correctQuestionsComponent($genre_value, $small_records ,$small_answers ,$option_num){


         foreach( $small_records  as $record_value){
             // dd($record_value);
                    $big_que=$record_value->big_question_id;
                    $big_q=$record_value->big_question;
                    $small_q=$record_value->question;
                    $q_num=$record_value->question_num;
                    $small_a=$record_value->answer;
                    $small_a2=$record_value->answer2;
                    $small_a3=$record_value->answer3;
                    $questions1[$big_que]=["big_question"=>$big_q];
                    $questions2[$big_que][]=$small_q;
                    $answers[$big_que][]=$small_a;
                    $answers2[$big_que][]=$small_a2;
                    $answers3[$big_que][]=$small_a3;

                    $check_num = $q_num -1;

                    if(isset($small_answers[$big_que][$q_num])){
                            // dd($small_answers);
                        if($answers[$big_que][$check_num] == $small_answers[$big_que][$q_num]){
                            $checked_result[$big_que][] = "◎";
                            $checked_value[$big_que][] = "1";
                    
                        }

                        elseif ($answers2[$big_que][$check_num] == $small_answers[$big_que][$q_num]) {
                            $checked_result[$big_que][] = "◎";
                            $checked_value[$big_que][] = "1";
                            $answers = $small_answers[$big_que][$q_num];
                        }

                        elseif ($answers3[$big_que][$check_num] == $small_answers[$big_que][$q_num]) {
                            $checked_result[$big_que][] = "◎";
                            $checked_value[$big_que][] = "1";
                            $answers = $small_answers[$big_que][$q_num];
                        }

                        else{
                            $checked_result[$big_que][] = "✖";
                            $checked_value[$big_que][] = "0";
                        }
                    }
                    else{
                        $checked_result[$big_que][] = "回答がありませんでした！";
                        $checked_value[$big_que][] = "0";
                    }

                }

                for($i=1; $i<=3; $i++ ){
                    $questions[$i]=$questions1[$i];
                    $questions[$i]["questions"]=$questions2[$i];
                    $questions[$i]["answers"]=$answers[$i];
                    $questions[$i]["checked_result"]=$checked_result[$i];
                    $questions[$i]["checked_value"]=$checked_value[$i];
                    $questions[$i]["option_num"]=$option_num;
                }

        return $questions;
    }
}
