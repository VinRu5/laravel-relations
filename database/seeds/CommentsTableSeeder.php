<?php

use App\Comment;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($x = 0; $x < 50; $x++) {
            $newComment = new Comment();
            $newComment->text = $faker->paragraphs(2, true);
            $newComment->user = $faker->name();
            $newComment->article_id = rand(1, 30);
            $newComment->save();
        }
    }
}
