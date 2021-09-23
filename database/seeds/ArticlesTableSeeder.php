<?php

use App\Article;
use App\Author;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $listOfAuthor= [];

        for($i = 0; $i < 10; $i++) {
            $author = new Author();
            $author->name = $faker->firstName();
            $author->surname = $faker->lastName();
            $author->email = $faker->safeEmail();
            $author->password = $faker->password();
            $author->picture = 'https://www.iochatto.com/wp-content/uploads/2011/05/Immagine-profilo-Facebook.jpg';
            $author->save();
            $listOfAuthor[] = $author->id;
        }

        for ($i = 0; $i < 30; $i++) {
            $article = new Article();
            $article->title = $faker->words(3, true);
            $article->text = $faker->paragraphs(4, true);
            $article->photo = 'https://loremflickr.com/';
            $authorKey= array_rand($listOfAuthor);
            $authorRand = $listOfAuthor[$authorKey];
            $article->author_id = $authorRand;
            $article->save();

        }
    }
}
