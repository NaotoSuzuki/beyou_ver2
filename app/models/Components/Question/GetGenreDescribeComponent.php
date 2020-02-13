<?php
    namespace App\Models\Components\Question;


    use DB;
    class GetGenreDescribeComponent{
        public function getGenreDescribeComponent($genre_value){

            $genreArray = DB::table('genres')
                ->where('genres.genre_value','=',$genre_value)
                ->select('genres.genre_describe')
                ->get();

             $genre_describeObj =$genreArray[0];
             $genre_describe = $genre_describeObj->genre_describe;
            return $genre_describe;
    }

}
