<?php
    namespace App\Models\Components\Index;


    use DB;
    class GetOptionComponent{
        public function getOptionComponent($genre_value){

            $optionData = DB::table('options')
                ->where('options.genre_value','=',$genre_value)
                ->get();

            return ($optionData);
    }

}
