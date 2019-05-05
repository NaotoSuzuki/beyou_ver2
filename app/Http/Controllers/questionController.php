<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Small_question;
use App\Models\Big_question;
use DB;


class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showQuestions($genre_value){
        $user_data = Auth::user();
        $user_name = $user_data -> name;


        $small_questions_array = DB::table('small_questions')
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
                           
         return view('questions.showQuestions',compact('genre_value','user_name','questions'));
    }



    public function correctQuestions(Request $small_answers){
        $user_data = Auth::user();
        $user_id = $user_data -> id;

        

        // $questionsの情報は複数ページで使われているので共通化できる。多分モデルに書く？
        //以下はquestion取得時とことなる。なので、laravel風に書き直すこと
        $genre_value = $small_answers->genre_value;
     
        $big_records = DB::table('big_questions')
        ->select('big_questions.*')
        ->get();


        $small_records = DB::table('small_questions')
        ->join('big_questions','small_questions.big_question_id','=','big_questions.id')
        ->where('small_questions.genre_value','=',$genre_value)
        ->select('small_questions.*', 'big_questions.big_question')
        ->get();


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
          
            
         
        return view('questions.correctQuestions',compact('questions','genre_value','small_answers','big_records'));

    }

    public function saveAnswers($genre_value,Request $small_answers){
        //保存するだけの機能。
            $post = new Post();

        // 以下は原本から取ってきたコード
        // function formUserAnswer($user_id,$genre_param,$results,$user_answer_array,$big_records,$small_records){
        //     foreach ($big_records as $big_value){
        //         foreach($small_records as $small_value){
        //             if($big_value["id"]==$small_value["big_questions_id"]){
        //                     $big_num=$big_value["id"] ;
        //                     $small_num=$small_value["question_num"];
        //                     $small = $user_answer_array[$big_num][$small_num];
        //                     $result=$results[$big_num][$small_num];
        //                     $answer_datas[]=["user_id"=>$user_id, "genre_value"=>$genre_param, "big_questions_id"=>$big_num,"question_num"=>$small_num, "user_answer"=>$small ,"result"=>$result];
        //             }
        //         }
        //     }
        //     return $answer_datas;
        // }
    }
}
  