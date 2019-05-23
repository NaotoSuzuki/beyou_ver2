<?php  
    namespace App\Http\Components\DataProvider;

    use DB;

    class BigQuestionProvider{

        public function bigQuestionProvider(){

            $big_records= DB::table('big_questions')
            ->select('big_questions.*')
            ->get();

            return  $big_records;
        }

    }