<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            small_questions::class,
            ]);

        $this->call([
            big_questions::class,
            ]);
        
        $this->call([
            genres::class,
            ]);
                
    }
}
