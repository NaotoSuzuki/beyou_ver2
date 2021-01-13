<?php
    namespace App\Models\Components\Index;


    use DB;
    class GetOptionNumComponent{
        public function getOptionNumComponent($genre_value){

            $optionArray = DB::table('options')
                ->where('options.genre_value','=',$genre_value)
                ->select('options.option_num')
                ->get();

            $optionObj =$optionArray[0];

            $option_num = $optionObj->option_num;
            return array($option_num);
    }

}
