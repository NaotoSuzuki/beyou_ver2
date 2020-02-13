<?php
    namespace App\Models\Components\Index;


    use DB;
    class GetOptionDetailComponent{
        public function getOptionDetailComponent($genre_value){

            $optionArray = DB::table('options')
                ->where('options.genre_value','=',$genre_value)
                ->select('options.option_detail')
                ->get();

            $optionObj =$optionArray[0];

            $option_detail = $optionObj->option_detail;
            return array($option_detail);
    }

}
