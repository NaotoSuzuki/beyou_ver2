<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Small_question;
use App\Models\Big_question;
use App\Models\User_answer;
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
        $user_id = $user_data -> id;
     

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
                           
         return view('questions.showQuestions',compact('user_id','genre_value','user_name','questions'));
    }



    public function correctQuestions(Request $small_datas){
        $user_data = Auth::user();
        $user_id = $user_data -> id;
        

        // $questionsの情報は複数ページで使われているので共通化できる。多分モデルに書く？
        //以下はquestion取得時とことなる。なので、laravel風に書き直すこと
        $genre_value = $small_datas->genre_value;

        $small_answers = $small_datas->small_answers;
     
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
          
            
         
        return view('questions.correctQuestions',compact('user_id','questions','genre_value','small_answers','big_records'));

    }

    public function saveAnswers(Request $request){
       //保存に必要なデータ。絶対あかんけどひとまず
        $user_id = $request->user_id;
        $results = $request->result;
        $user_answer_array= $request->user_answer;
        $genre_value =  $request->genre_value;

        $big_records= DB::table('big_questions')
        ->select('big_questions.*')
        ->get();

        $small_records = DB::table('small_questions')
        ->join('big_questions','small_questions.big_question_id','=','big_questions.id')
        ->where('small_questions.genre_value','=',$genre_value)
        ->select('small_questions.*', 'big_questions.big_question')
        ->get();

       

        foreach ($big_records as $big_value){
            foreach($small_records as $small_value){
                if($big_value->id == $small_value->big_question_id){
                        $big_num=$big_value->id ;
                        $small_num=$small_value->question_num;
                        $small = $user_answer_array[$big_num][$small_num];
                        $result=$results[$big_num][$small_num];
                        $answer_datas[]=["user_id"=>$user_id, "genre_value"=>$genre_value, "big_question_id"=>$big_num,"question_num"=>$small_num, "user_answer"=>$small ,"result"=>$result];
                }
            }
        }
       
        
        // foreach ($big_records as $big_value){
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
           

        //上述のデータを保存用の配列に組みこむ。これもあかんけどひとまず
    

        $date = new DateTime();
        $date->format('Y-m-d H:i:s');
        // $user_answers->toArray();
        // $user_answers_array = (array)$user_answers;
        // ($user_answers_array );
        // $insert_answers = new User_answer;
        // $inserted_answers = $insert_answers->create($user_answers_array);
        // dd( $inserted_answers);

         }

         //保存用sql
         function insertUserAnwser($answer_datas){
            try {
                $pdo = new PDO("mysql:host=localhost; dbname=beyou; charset=utf8", 'test', 'test');
                $answer_sql = "INSERT INTO users_answers (
                    user_id,
                    genre_value,
                    big_questions_id,
                    question_num,
                    user_answer,
                    result,
                    created
                ) VALUES (
                    :user_id,
                    :genre_value,
                    :big_questions_id,
                    :question_num,
                    :user_answer,
                    :result,
                    :created
                )";
                $date = new DateTime();
                $date->format('Y-m-d H:i:s');
                foreach ($answer_datas as $answer_data){
                    $stmt=$pdo->prepare($answer_sql);
                    $user_id=$answer_data["user_id"];
                    $genre_param=$answer_data["genre_value"];
                    $big_ID=$answer_data["big_question_id"];
                    $question_num=$answer_data["question_num"];
                    $user_answer=$answer_data["user_answer"];
                    $result=$answer_data["result"];
                    $stmt->bindParam(":user_id", $user_id);
                    $stmt->bindParam(":genre_value", $genre_param);
                    $stmt->bindParam(":big_question_id", $big_ID);
                    $stmt->bindParam(":question_num", $question_num);
                    $stmt->bindParam(":user_answer", $user_answer);
                    $stmt->bindParam(":result", $result);
                    $stmt->bindParam(":created", $date);
                    $stmt->execute();
                    // $dbh->insertRecord($answer_sql,$answer_bind_array);
                }
            }
             catch(PDOException $e) {
                echo $e->getMessage();
                die();
            }
        }
}
  