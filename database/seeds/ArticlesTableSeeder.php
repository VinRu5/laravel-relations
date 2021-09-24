<?php

use App\Article;
use App\Author;
use App\Tag;
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

        $tags = [
            'cultura',
            'varietà',
            'occhiali',
            'montagna',
            'specialista',
            'computers',
            'idea',
            'sostenibilità',
            'musica',
            'insieme',
            'vip'
        ];

        $listOfTags = [];

        foreach($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->save();
            $listOfTags[] = $newTag->id;
        }

        for ($i = 0; $i < 30; $i++) {
            $article = new Article();
            $article->title = $faker->words(3, true);
            $article->text = $faker->paragraphs(4, true);
            $article->photo = 'https://loremflickr.com/320/240/news';
            $authorKey= array_rand($listOfAuthor);
            $authorRand = $listOfAuthor[$authorKey];
            $article->author_id = $authorRand;
            $article->save();

            $tagKey = array_rand($listOfTags, 3);
            $tag1 = $listOfTags[$tagKey[0]];
            $tag2 = $listOfTags[$tagKey[1]];
            $tag3 = $listOfTags[$tagKey[2]];

            $article->tag()->attach($tag1);
            $article->tag()->attach($tag2);
            $article->tag()->attach($tag3);

        }
    }
}
