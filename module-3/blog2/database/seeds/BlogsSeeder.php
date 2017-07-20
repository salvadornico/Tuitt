<?php

use Illuminate\Database\Seeder;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 20;

        for ($i = 0; $i < $limit; $i++) { 
        	DB::table('blogs')->insert([
        		'title' => ucfirst($faker->bs),
        		'content' => $faker->realText($maxNbChars = 2000, $indexSize = 2),
        	]);
        }
    }
}
