<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Post');

        for($i = 1 ; $i <= 5 ; $i++){
        	DB::table('posts')->insert([
        	'title' => $faker->sentence(),

        	'text' => $faker->paragraph(),
        	'created_at' => \Carbon\Carbon::now(),
        	'Updated_at' => \Carbon\Carbon::now(),
        ]);
        }
    }
}
