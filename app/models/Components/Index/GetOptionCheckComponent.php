<?php
    namespace App\Models\Components\Index;


    use DB;
    class GetOptionCheckComponent{
        public function getOptionCheckComponent($user_id,$genre_value,$option_datas){

            foreach($option_datas as $option_data){
                $option_num = $option_data->option_num;
                $optionChecks[] = DB::table('user_answers')
                    ->where('user_answers.user_id','=',$user_id)
                    ->where('user_answers.genre_value','=',$genre_value)
                    ->where('user_answers.option_num','=',$option_num)
                    ->limit(1)
                    ->get();



            }

            foreach ($optionChecks as $key => $option_check) {
                if(isset($optionChecks[$key]["0"])){
                    $optionAnswered[] = 1;
                }else{
                    $optionAnswered[] = 0;
                };
            }


            return $optionAnswered;
    }

}
