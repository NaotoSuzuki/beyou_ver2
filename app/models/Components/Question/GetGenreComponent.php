<?php
    namespace App\Models\Components\Question;


    use DB;
    class GetGenreComponent{

        public function getGenreComponent($genre_value){

                $genreArray = DB::table('genres')
                    ->where('genres.genre_value','=',$genre_value)
                    ->select('genres.genre')
                    ->get();

                 $genreObj =$genreArray[0];
                $genre = $genreObj->genre;
                return $genre;
        }




}
